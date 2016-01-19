@extends('admin.layout')

@section('header')

    <link rel="stylesheet" href="/packages/openlayers/build/ol.css" />

@stop

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
    <script src="https://maps.google.com/maps/api/js?sensor=false&libraries=drawing&v=3.22&key=AIzaSyCyb1w6ezK3C0k64_1AiB0vK-qjmQkCrcI"></script>

    <script type="text/javascript" src="/app/admin/UserService.js"></script>
    <script type="text/javascript" src="/app/admin/FacultyService.js"></script>
    <script type="text/javascript" src="/app/admin/AreaService.js"></script>
    <script type="text/javascript" src="/app/admin/area/app.js"></script>

    <script type="text/javascript" src="/packages/openlayers/build/ol.js"></script>
    <script type="text/javascript" src="/packages/angular-google-maps/node_modules/lodash/chain/lodash.js"></script>
    <script type="text/javascript" src="/packages/angular/angular.min.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-openlayers-directive/dist/angular-openlayers-directive.js"></script>


    <script type="text/javascript" src="/packages/angular-google-maps/node_modules/angular-simple-logger/dist/angular-simple-logger.min.js"></script>
    <script type="text/javascript" src="/packages/angular-google-maps/dist/angular-google-maps.min.js"></script>

@stop