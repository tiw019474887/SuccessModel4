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
    <h2>project</h2>

    <div class="ui grid">
        <div class="three column row">
            @foreach($projects as $project)
                <div class="column">
                    <div class="ui fluid card" style="margin:1px;">
                        <div class="image">
                            <img src="<% $project->cover->url or '/images/daniel.jpg'%>......">
                        </div>
                        <div class="content">
                            <a class="header"><% $project->name %></a>

                            <p>
                                <% str_limit($project->abstract,100,'...') %>
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


@stop