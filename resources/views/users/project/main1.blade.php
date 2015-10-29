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

    <div id="contents" ng-app = "ProjectApp">
        <div class="row">
            <h2><% $project->name%></h2>
        </div>
        <div class="ui grid">
            <div class="row">
                <div class="ten wide column">
                        <div class="ten wide column">
                            <div class="one column row" style="">
                                <div class="column">
                                    <div  id="slider" class="flexslider" style="margin-bottom: 0px;">
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

                                            @foreach($project->images as $image)
                                            <li>
                                            <?php if(isset($image->url)) : ?>
                                            <img src="<% $image->url %>?w=640&h=380"/>
                                            <?php else : ?>
                                            <img src="/images/fff.png?w=640&h=380"/>
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

                                            @foreach($project->images as $image)
                                                <li>
                                                    <?php if(isset($image->url)) : ?>
                                                    <img src="<% $image->url %>?w=640&h=380"/>
                                                    <?php else : ?>
                                                    <img src="/images/fff.png?w=640&h=380"/>
                                                    <?php endif; ?>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div clas="row" style="margin-bottom: 14px;">

                    </div>
                    <div class="row" style="margin-bottom: 14px;">
                        <div class="wide column">

                            <div class="ui right aligned segment">
                            <span style="font-weight: bold;">
                                .................................
                            </span>
                            </div>

                            <h3>รายละเอียดโครงการ</h3>

                            <div class="ui segment" id="tinymce_content" style="padding: 14px;">
                                <% $project->content %>
                            </div>
                        </div>
                    </div>
                    <div class="ui comments">
                        <div class="comment">
                            <a class="avatar">
                                <img src="/images/daniel.jpg">
                            </a>

                            <div class="content">
                                <a class="author">Joe Henderson</a>

                                <div class="metadata">
                                    <div class="date">1 day ago</div>
                                </div>
                                <div class="text">
                                    <p>The hours, minutes and seconds stand as visible reminders that your effort put
                                        them all there. </p>

                                    <p>Preserve until your next run, when the watch lets you see how Impermanent your
                                        efforts are.</p>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <a class="avatar">
                                <img src="/images/daniel.jpg">
                            </a>

                            <div class="content">
                                <a class="author">Christian Rocha</a>

                                <div class="metadata">
                                    <div class="date">2 days ago</div>
                                </div>
                                <div class="text">
                                    I re-tweeted this.
                                </div>
                            </div>
                        </div>


                        <form class="ui reply form"  ng-submit="save()">
                            <div class="field">
                                <textarea ng-model="project.comment" required="required" ></textarea>
                            </div>
                            <button type="submit" class="ui yellow button">Comment</button>
                        </form>




                    </div>
                </div>
                <div class="six wide column">
                    <div class="column">
                    <h3>บทคัดย่อ</h3>

                    <div class="ui segment">
                        <% ($project->abstract) %>
                    </div>
                    </div>
                    <h3>ดำเนินการโดย</h3>

                    <div class="ui segment">

                        <?php if(isset($project->faculty->logo->url)) : ?>
                        <img class="ui avatar image" src="<% $project->faculty->logo->url %>?w=300&h=300"/>
                        <?php else : ?>
                        <img class="ui avatar image" src="/images/daniel.jpg?w=300&h=300"/>
                        <?php endif; ?>
                        <% $project->faculty->name_th %>
                    </div>

                    <div class="six wide column">
                        <h3>นักวิจัย</h3>
                        <?php
                            //print_r($project->members);
                        ?>
                        <div class="ui segment" style="padding: 14px;">
                            @foreach($project->members as $project->member)
                            <div class="ui two columns grid">
                                <div class="ui column">
                                    <?php if(isset($project->member->logo->url)) : ?>
                                    <img class="ui avatar image" src="<% $project->member->logo->url %>?w=300&h=300"/>
                                    <?php else : ?>
                                    <div>//</div>
                                    <?php endif; ?>
                                      <?php if (isset ($project->member->title,$project->member->firstname,$project->member->lastname)) : ?>
                                          <% $project->member->title %>.<% $project->member->firstname %><% $project->member->lastname %>
                                        <?php else : ?>
                                          <div>----</div>
                                      <?php endif; ?>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop




@section('javascript')
    <script type="text/javascript">
        $(window).load(function() {
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


<script>
    var app = angular.module('ProjectAdd', ['ui.router', 'ui.tinymce', 'AppConfig'
        , 'angularify.semantic', 'flow', 'ngCookies', 'btford.markdown'
        , 'Faculty', 'User', 'Project', 'ProjectStatus', 'Youtube'
    ]);


    app.config(function ($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise("/");

        $stateProvider
                .state('add', {
                    url: "/add",
                    templateUrl:"/app/admin/project/main1.blade.php",
                    controller: "AddCtrl",
                    resolve: {
                        project: function (ProjectService) {
                            return {data: {}}
                        }
                    }
                })

    });

    app.controller("ViewCtrl", function () {
    });

    app.controller("AddCtrl", function ($scope, $state, $timeout, $cookies, $filter,
                                         UserService, UserSearchService, ProjectService,
                                         statuses, faculties, project) {
        console.log("AddCtrl Start...");

        $scope.project = project.data;

        $scope.save = function () {
            ProjectService.save($scope.project).success(function (resposne) {
                $state.go("home")
            }).error(function (response) {
                $scope.message = response;
            });
        }

    });







</script>




    <script type="text/javascript" src="/packages/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/packages/angular-flexslider/angular-flexslider.js"></script>
    <script type="text/javascript" src="/packages/showdown/compressed/Showdown.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-markdown-directive/markdown.js"></script>
    <script type="text/javascript" src="/packages/bxslider/jquery.bxSlider.min.js"></script>
    <script type="text/javascript" src="/app/users/UsersService.js"></script>
    <script src="/app/admin/loader.js"></script>
    <script src="/app/users/project/app.js"></script>
@stop