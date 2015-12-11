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
            <h2><% $project->name %></h2>
        </div>

        <div class="ui grid">

            <div class="row">
                <div class="ten wide column">

                    <div class="one column row" style="">
                        <div class="column">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li ng-repeat="youtube in youtubes">
                                        <div class="videoWrapper">
                                            <iframe class="youtube" width="640" height="380"
                                                    ng-src="{{getYoutubeEmbedUrl(youtube.vid)}}">
                                            </iframe>
                                        </div>
                                    </li>
                                    <li ng-repeat="image in images">
                                        <img ng-src="{{image.url}}?w=640&h=380&fit=stretch"/>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div clas="row" style="margin-bottom: 14px;">

                    </div>
                    <div class="row" style="margin-bottom: 14px;">
                        <div class="wide column">

                            <div class="ui right aligned segment">
                            <span style="font-weight: bold;">
                                {{ project.current_file.origin_name | limitTo: 75}}{{project.current_file.origin_name.length > 75 ? '...' : ''}}
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
                        <form class="ui reply form">
                            <div class="field">
                                <textarea></textarea>
                            </div>
                            <div class="ui yellow button">
                                Comment
                            </div>
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
                        <img ng-if="!project.faculty.logo" class="ui avatar image" src="/images/square-image.png"/>
                        <img ng-if="project.faculty.logo" class="ui avatar image"
                             ng-src="{{project.faculty.logo.url}}?w=35&h=35&fit=crop"/>
                        <% $project->faculty->name_th %>
                    </div>

                    <div class="six wide column">
                        <h3>นักวิจัย</h3>

                        <div class="ui segment" style="padding: 14px;">
                            <div class="ui two columns grid">
                                <div class="ui column" ng-repeat="member in members">
                                    <img ng-if="!member.logo" class="ui avatar image" src="/images/square-image.png"/>
                                    <img ng-if="member.logo" class="ui avatar image"
                                         ng-src="{{member.logo.url}}?w=35&h=35&fit=crop"/>
                                    <% $member->title %><% $member->firstname %> <% $member->lastname %>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            <div class="row">
                <h2>แนะนำโปรเจค</h2>
            </div>
            </div>
        </div>
    </div>
@stop


@section('javascript')


@stop