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

    <div class="ui grid">
        <div class="three column row">
            @foreach($projects as $project)
                <div class="column">
                    <div class="ui fluid card" style="margin:1px;">
                        <div class="ui medium image">
                            <?php if(isset($project->cover->url)) : ?>
                            <img src="<% $project->cover->url %>?w=300&h=300"/>
                            <?php else : ?>
                            <img src="/images/daniel.jpg?w=300&h=300"/>
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <a class="header"><% $project->name %></a>
                            <p>
                                <% str_limit($project->abstract,100,'...') %>
                            </p>
                            <% $project->id %>
                            <p>
                                <a href = "/users/project/<%$project->id%>" >อ่านต่อ>>>></a>
                            </p>
                        </div>
                        <div class="extra content">
                            <% $project->faculty->name_th %>
                        </div>
                    </div>
                </div>
            @endforeach
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
    <script src="/app/admin/loader.js"></script>


@stop