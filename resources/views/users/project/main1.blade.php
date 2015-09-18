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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="jquery.flexslider.js"></script>
@stop




@section('content')
    <h2></h2>

    <div id="contents">
        <div class="row">
            <h2><% $project->name%></h2>
        </div>
        <div class="ui grid">
            <div class="row">
                <div class="ten wide column">
                        <div class="ten wide column">
                            <div class="one column row" style="">
                                <div class="column">
                                    <div class="flexslider" style="margin-bottom: 0px;">
                                        <ul class="slides">
                                            <?php if(isset($project->images->url)) : ?>
                                            <img src="<% $project->images->url %>?w=640&h=380"/>
                                            <?php else : ?>
                                            <img src="/images/fff.png?w=640&h=380"/>
                                            <?php endif; ?>
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

                        <?php if(isset($project->faculty->logo->url)) : ?>
                        <img class="ui avatar image" src="<% $project->faculty->logo->url %>?w=300&h=300"/>
                        <?php else : ?>
                        <img class="ui avatar image" src="/images/daniel.jpg?w=300&h=300"/>
                        <?php endif; ?>
                        <% $project->faculty->name_th %>
                    </div>

                    <div class="six wide column">
                        <h3>นักวิจัย</h3>

                        <div class="ui segment" style="padding: 14px;">
                            <div class="ui two columns grid">
                                <div class="ui column" ng-repeat="member in members">
                                    <?php if(isset($project->member->logo->url)) : ?>
                                    <img class="ui avatar image" src="<% $project->member->logo->url %>?w=300&h=300"/>
                                    <?php else : ?>
                                    <div></div>
                                    <?php endif; ?>
                                   <?php if (isset ($project->members->title,$project->members->firstname,$project->members->lastname)) :?>
                                     <div>
                                    <%$project->members->title%><%$project->members->firstname%><%$project->members->lastname%>
                                     </div>
                                    <?php else : ?>
                                    <div></div>
                                    <?php endif; ?>

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
    <script type='text/javascript'>
        $(window).load(function() {
        $(‘.flexslider’).flexslider();
        });
    </script>
@stop