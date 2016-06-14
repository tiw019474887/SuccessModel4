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
    <link rel="stylesheet" href="/packages/openlayers/build/ol.css"/>
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
                    <div class="one column row" style="">
                        <div class="column">
                            <div class="flexslider" style="margin-bottom: 0px;">
                                <ul class="slides">
                                    @foreach($project->images as $image)
                                        <li>
                                            <?php if(isset($image->url)) : ?>
                                            <img src="<% $image->url %>?w=640&h=380&fit=stretch"/>
                                            <?php else : ?>
                                            <img src="/images/fff.png?w=640&h=380&fit=stretch"/>
                                            <?php endif; ?>
                                        </li>
                                    @endforeach
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

                <div class="six wide column">
                    <div class="row preview">
                        <h3 class="condensed">บทคัดย่อ</h3>
                        <div class="ui divider condensed"></div>
                        <div class="ui segment">
                            <p><% ($project->abstract) %></p>

                            <p><% ($project->abstractEN) %></p>
                        </div>
                    </div>
                    <br>
                    <div class="row preview">
                        <h3 class="condensed">ดำเนินการโดย</h3>

                        <div class="ui divider condensed"></div>
                        <div class="ui segment">
                            <?php if(isset($project->faculty->logo->url)) : ?>
                            <img class="ui avatar image" src="<% $project->faculty->logo->url %>?w=300&h=300"/>
                            <?php else : ?>
                            <img class="ui avatar image" src="/images/daniel.jpg?w=300&h=300"/>
                            <?php endif; ?>

                            <?php if(isset($project->faculty->name_th)) : ?>
                            <% $project->faculty->name_th %>
                            <?php else : ?>
                            ไม่ทราบผู้ดำเนินการ
                            <?php endif; ?>

                        </div>
                    </div>
                    <br>
                    <div class="row preview">
                        <h3 class="condensed">นักวิจัย</h3>
                        <div class="ui divider condensed"></div>
                        <div class="ui segment" style="padding: 14px;">
                            @foreach($project->members as $project->member)
                                <div class="ui two columns grid">
                                    <div class="ui column">
                                        <?php if(isset($project->member->logo->url)) : ?>
                                        <img class="ui avatar image"
                                             src="<% $project->member->logo->url %>?w=300&h=300"/>
                                        <?php else : ?>
                                        <img class="ui avatar image" src="/images/daniel.jpg?w=300&h=300"/>
                                        <?php endif; ?>
                                        <?php if (isset ($project->member->title, $project->member->firstname, $project->member->lastname)) : ?>
                                        <% $project->member->title %>.<% $project->member->firstname %> <%
                                        $project->member->lastname %>
                                        <?php else : ?>
                                        <div></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ten wide column">
                    <div class="row preview">
                        <h3 class="condensed">รายละเอียดโครงการ</h3>
                        <div class="ui divider condensed"></div>
                        <div class="ui segment" id="tinymce_content" style="padding: 14px;">
                            <?php echo $project->content ?>
                            <?php echo $project->contentEN ?>
                        </div>
                        @if(Auth::user())
                        <h3 class="condensed">ความคิดเห็น</h3>
                        <div class="ui divider condensed"></div>
                            <div class="ui segment">
                                <div class="ui comments">
                                    @foreach($project->comments as $comment)
                                        <div class="comment" style="background-color: #E8E8E8">

                                            <a class="ui avatar image">
                                                <?php if(Auth::user()->logo) : ?>
                                                <img class="ui avatar avatar-menu image"
                                                     src="<%Auth::user()->logo->url%>?h=200">
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
                                                    <div class="date"><% $comment->updated_at->diffForHumans() %>
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <p><% $comment->comment %></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>

                    <div class="row ">
                        <div class="ui comments">

                            <form class="ui reply form" method="post"
                                  action="/users/project/<% $project->id %>/comment">
                                <input type="hidden" name="_token" value="<?php echo csrf_token()?>"/>

                                <div class="field">
                                    <textarea name="comment" required="required"></textarea>
                                </div>

                                <button type="submit" class="ui yellow button">Comment</button>
                            </form>
                        </div>
                        @else

                        @endif
                    </div>

                </div>

                <div class="six wide column">
                    <h3>แผนที่/Map</h3>
                    <div class="ui divider condensed"></div>
                    <div class="six wide column">
                        <div class="column">
                            <div class="ui segment">
                                <?php if(isset($project->area->lat)) : ?>
                                <div ng-app="demoapp">
                                    <div ng-controller="DemoController">
                                        <openlayers lat="<% $project->area->lat %>" lon="<% $project->area->lon %>"
                                                    zoom="<% $project->area->zoom%>" height="300px">
                                            <ol-marker lat="<% $project->area->lat %>"
                                                       lon="<% $project->area->lon %>"></ol-marker>
                                        </openlayers>
                                    </div>
                                </div>
                                <?php else : ?>
                                <div>ไม่ได้แสดงต่ำแหน่งบนพื้นที่</div>
                                <?php endif; ?>
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
            angular.extend($scope, {});

        }]);

    </script>

    <script type="text/javascript">

        $('#logIn').click(function () {
            $('#modaldiv').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide"
            });
        });
    </script>



    <script type="text/javascript" src="/packages/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/packages/angular-flexslider/angular-flexslider.js"></script>
    <script type="text/javascript" src="/packages/showdown/compressed/Showdown.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-markdown-directive/markdown.js"></script>
    <script type="text/javascript" src="/packages/tinymce-dist/tinymce.min.js"></script>
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


@stop