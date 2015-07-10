@extends('university.layout')



@section('content')
    <div ng-app="UniversityProject">
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
    <script type="text/javascript" src="/app/university/UniversityService.js"></script>
    <script type="text/javascript" src="/app/admin/YoutubeService.js"></script>
    <script type="text/javascript" src="/app/admin/UserService.js"></script>
    <script type="text/javascript" src="/app/admin/ProjectService.js"></script>
    <script src="/app/admin/loader.js"></script>
    <script src="/app/university/project/app.js"></script>

@stop