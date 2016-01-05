@extends('admin.layout')

        <link rel="stylesheet" href="/packages/openlayers/build/ol.css" />

@section('content')
    <div ng-app="AreaAdmin">
        <div ng-controller="loadCtrl" ng-class="{active:active}" class="ui inverted dimmer ">
            <div class="ui large text loader">
                Loading
            </div>
        </div>

        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script type="text/javascript" src="/app/admin/UserService.js"></script>
    <script type="text/javascript" src="/app/admin/FacultyService.js"></script>
    <script type="text/javascript" src="/app/admin/AreaService.js"></script>
    <script type="text/javascript" src="/app/admin/area/app.js"></script>

    <script type="text/javascript" src="/packages/openlayers/build/ol.js"></script>
    <script type="text/javascript" src="/packages/angular/angular.min.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-openlayers-directive/dist/angular-openlayers-directive.js"></script>
@stop