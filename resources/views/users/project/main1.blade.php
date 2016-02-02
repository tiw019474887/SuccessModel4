@extends('users.layout')

@section('header')
    <style>
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="/packages/flexslider/flexslider.css">


@stop




@section('content')

    <h2></h2>

    <div id="contents">
        <div class="row">
            <h2><% $project->name%>/<% $project->nameEN%></h2>
        </div>
        <div class="ui grid">
            <div class="row">
                <div class="ten wide column">
                    <div class="ten wide column">
                        <div class="one column row" style="">
                            <div class="column">
                                <div id="slider" class="flexslider" style="margin-bottom: 0px;">
                                    <ul class="slides">
                                        @foreach($project->youtubes as $youtube)
                                            <li>
                                                <?php if(isset($youtube->vid)) : ?>
                                                <div class="videoWrapper">
                                                    <iframe class="youtube" width="640" height="380"
                                                            src="http://www.youtube.com/embed/<?php echo $youtube->vid ?>?autoplay=0&enablejsapi=1&version=3&playerapiid=ytplayer">
                                                    </iframe>
                                                </div>
                                                <?php endif; ?>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                        @foreach($project->youtubes as $youtube)
                                            <li>
                                                <?php if(isset($youtube->vid)) : ?>
                                                <div class="videoWrapper">
                                                    <iframe class="youtube" width="640" height="380"
                                                            src="http://www.youtube.com/embed/<?php echo $youtube->vid ?>?autoplay=0&enablejsapi=1&version=3&playerapiid=ytplayer">
                                                    </iframe>
                                                </div>
                                                <?php endif; ?>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div clas="row" style="margin-bottom: 14px;"></div>
                    <div class="row" style="margin-bottom: 14px;">
                        <div class="wide column">

                            <div class="ui right aligned segment">
                            <span style="font-weight: bold;">
                                .................................
                            </span>
                            </div>


                            <h3>รายละเอียดโครงการ/Description</h3>

                            <div class="ui segment" id="tinymce_content" style="padding: 14px;">
                                <p><% $project->content %></P>

                                <p><% $project->contentEN %></p>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="ui comments">
                        @foreach($project->comments as $comment)
                            <div class="comment">
                                <a class="avatar">
                                    <?php if(Auth::user()->logo) : ?>
                                    <img class="ui avatar avatar-menu image" src="<%Auth::user()->logo->url%>?h=200">
                                    <?php else : ?>
                                    <img class="ui avatar avatar-menu image" src="/images/square-image.png">
                                    <?php endif; ?>
                                </a>

                                <div class="content">
                                    <?php if(isset($comment->createdBy->firstname)) : ?>
                                    <a class="author"><% $comment->createdBy->firstname %></a>
                                    <?php else : ?>
                                    <a class="author">Unknown</a>
                                    <?php endif; ?>

                                    <div class="metadata">
                                        <div class="date"><% $comment->updated_at->diffForHumans() %></div>
                                    </div>
                                    <div class="text">
                                        <p><% $comment->comment %></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <form class="ui reply form" method="post" action="/users/project/<% $project->id %>/comment">
                            <input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>

                            <div class="field">
                                <textarea name="comment" required="required"></textarea>
                            </div>
                            <button type="submit" class="ui yellow button">Comment</button>
                        </form>
                    </div>
                </div>
                <div class="six wide column">
                    <div class="column">
                        <h3>บทคัดย่อ/Abstract</h3>

                        <div class="ui segment">
                            <p><% ($project->abstract) %></p>

                            <p><% ($project->abstractEN) %></p>
                        </div>
                    </div>

                    <h3>ดำเนินการโดย/Operator</h3>

                    <div class="ui segment">
                        <?php if(isset($project->faculty->logo->url)) : ?>
                        <img class="ui avatar image" src="<% $project->faculty->logo->url %>?w=300&h=300"/>
                        <?php else : ?>
                        <img class="ui avatar image" src="/images/daniel.jpg?w=300&h=300"/>
                        <?php endif; ?>
                    </div>

                    <div class="six wide column">
                        <h3>นักวิจัย/Researcher</h3>
                        <?php
                        //print_r($project->members);
                        ?>
                        <div class="ui segment" style="padding: 14px;">
                            @foreach($project->members as $project->member)
                                <div class="ui two columns grid">
                                    <div class="ui column">
                                        <?php if(isset($project->member->logo->url)) : ?>
                                        <img class="ui avatar image"
                                             src="<% $project->member->logo->url %>?w=300&h=300"/>
                                        <?php else : ?>
                                        <div>//</div>
                                        <?php endif; ?>
                                        <?php if (isset ($project->member->title, $project->member->firstname, $project->member->lastname)) : ?>
                                        <% $project->member->title %>
                                        .<% $project->member->firstname %> <% $project->member->lastname %>
                                        <?php else : ?>
                                        <div>----</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <h3>แผนที่/Map</h3>
                    <div class="six wide column">
                        <div class="column">
                            <div class="ui segment">
                                <div ng-app="demoapp">
                                    <div ng-controller="DemoController">
                                        <openlayers  lat="<% $project->area->lat %>" lon="<% $project->area->lon %>" zoom="<% $project->area->zoom%>" height="400px">
                                            <ol-marker lat="<% $project->area->lat %>" lon="<% $project->area->lon %>"  ></ol-marker>
                                        </openlayers>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        var app = angular.module('demoapp', ['Project', 'Area', 'openlayers-directive']);
        app.controller('DemoController', ['$scope', function ($scope) {
            angular.extend($scope, {
                
            });

        }]);

    </script>
    <script type="text/javascript">
        $(window).load(function () {
            // The slider being synced must be initialized first
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 210,
                itemMargin: 5,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });
        });
    </script>



    <script type="text/javascript" src="/packages/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/packages/angular-flexslider/angular-flexslider.js"></script>
    <script type="text/javascript" src="/packages/showdown/compressed/Showdown.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-markdown-directive/markdown.js"></script>
    <script type="text/javascript" src="/packages/bxslider/jquery.bxSlider.min.js"></script>
    <script type="text/javascript" src="/app/researcher/ResearcherService.js"></script>
    <script type="text/javascript" src="/app/users/UsersService.js"></script>
    <script type="text/javascript" src="/app/admin/AreaService.js"></script>
    <script type="text/javascript" src="/app/admin/ProjectService.js"></script>
    <script src="/app/admin/loader.js"></script>
    <script src="/app/users/project/app.js"></script>

    <script type="text/javascript" src="/packages/openlayers/build/ol.js"></script>
    <script type="text/javascript" src="/packages/angular/angular.min.js"></script>
    <script type="text/javascript"
            src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript"
            src="/packages/angular-openlayers-directive/dist/angular-openlayers-directive.js"></script>
    <link rel="stylesheet" href="/packages/openlayers/build/ol.css"/>

@stop