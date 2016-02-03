@extends('researcher.layout')

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
    <link rel="stylesheet" href="/packages/openlayers/build/ol.css" />
@stop


@section('content')
    <div ng-app="ResearcherProject">
        <div ng-controller="loadCtrl" ng-class="{active:active}" class="ui inverted dimmer ">
            <div class="ui large text loader">
                Loading
            </div>
        </div>

        <ui-view>

        </ui-view>
    </div>

@stop


@section('javascript')
    <script type="text/javascript" src="/packages/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/packages/angular-flexslider/angular-flexslider.js"></script>
    <script type="text/javascript" src="/packages/showdown/compressed/Showdown.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-markdown-directive/markdown.js"></script>
    <script type="text/javascript" src="/packages/bxslider/jquery.bxSlider.min.js"></script>
    <script type="text/javascript" src="/app/researcher/ResearcherService.js"></script>
    <script type="text/javascript" src="/app/admin/UserService.js"></script>
    <script type="text/javascript" src="/app/admin/AreaService.js"></script>
    <script type="text/javascript" src="/app/admin/ProjectService.js"></script>
    <script type="text/javascript" src="/app/admin/YoutubeService.js"></script>
    <script type="text/javascript" src="/app/admin/project/app.js"></script>
    <script type="text/javascript" src="/app/researcher/project/app.js"></script>
    <script src="/app/admin/loader.js"></script>

    <script type="text/javascript" src="/packages/openlayers/build/ol.js"></script>
    <script type="text/javascript" src="/packages/angular/angular.min.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-openlayers-directive/dist/angular-openlayers-directive.js"></script>


@stop