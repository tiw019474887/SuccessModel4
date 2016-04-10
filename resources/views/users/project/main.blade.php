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


    <h2 class="condensed container">โมเดลที่สำเร็จ</h2>
    <h4 class="condensed container">จำนวนโมเดลทั้งหมด <% count($projects)%> โมเดล</h4>
    <div class="ui divider condensed"></div>
    <div class=" column container">
        <div class="ui grid">
            <div class=" row container">
                <div class="ui divider condensed"></div>
                <div class="thirteen wide column">
                    <div class="three column row">
                        <div class="ui link cards">
                            <div class="ui recent-works vertical segment">
                                <div class="fourteen wide column">
                                    <div class="ui three column aligned stackable  grid">
                                        @foreach($projects as $project)
                                            <div class="column">
                                                <div class="ui fluid card" style="margin:1px;">
                                                    <div class="image">
                                                        <?php if(isset($project->logo->url)) : ?>
                                                        <img src="<% $project->logo->url %>">
                                                        <?php else : ?>
                                                        <img src="/images/fff.png?w=300&h=300"/>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="content">
                                                        <a class="header"><h2><% $project->name %></h2>

                                                            <h3><% $project->nameEN %></h3></a>

                                                        <div class="meta"><% $project->updated_at->diffForHumans() %></div>

                                                        <p>
                                                            <% str_limit($project->abstract,100,'...') %>
                                                        </p>
                                                    </div>
                                                    <div class="extra content">
                                                        <?php if(isset($project->faculty->name_th)) : ?>
                                                            <% $project->faculty->name_th %>
                                                        <?php else : ?>

                                                        <?php endif; ?>
                                                    </div>
                                                    <a href="/users/project/<%$project->id%>">
                                                        <div class="ui two bottom attached buttons">
                                                            <div class="ui inverted violet button">
                                                                <p>
                                                                    อ่านต่อ
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui center">
                        <?php echo (new App\Pagination($projects))->render(); ?>
                    </div>
                </div>
                <div class="three wide right floated column container">
                    <div class="clounm">
                        <h3 class="condensed">ลิ้งต่างๆ</h3>

                        <div class="ui divider condensed"></div>

                        <div class="clounm">
                            <div class="image">
                                <a href="http://www.up.ac.th">
                                    <img class="ui medium image" src="/images/UP.jpg">
                                </a>
                            </div>
                            <div class="ui divider condensed"></div>
                            <div class="image">
                                <a href="http://www.up.ac.th/V7/Pkynews.aspx">
                                    <img class="ui medium image" src="/images/PKYN.jpg">
                                </a>
                            </div>
                            <div class="ui divider condensed"></div>
                            <div class="image">
                                <a href="https://www.youtube.com/channel/UCeVCgKGfBPhR68INbfcL4vg?feature=watch">
                                    <img class="ui medium image" src="/images/UPCH.jpg">
                                </a>
                            </div>
                            <div class="ui divider condensed"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('javascript')



    <script type="text/javascript" src="/packages/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/packages/angular-flexslider/angular-flexslider.js"></script>
    <script type="text/javascript" src="/packages/showdown/compressed/Showdown.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-markdown-directive/markdown.js"></script>
    <script type="text/javascript" src="/packages/bxslider/jquery.bxSlider.min.js"></script>
    <script type="text/javascript" src="/app/admin/UserService.js"></script>
    <script type="text/javascript" src="/app/admin/RoleService.js"></script>
    <script type="text/javascript" src="/app/admin/FacultyService.js"></script>
    <script src="/app/admin/loader.js"></script>
    <script src="/app/users/project/app.js"></script>

@stop