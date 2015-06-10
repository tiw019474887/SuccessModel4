@extends('researcher.layout')


@section('content')
    <div ng-app="FacultyProject">
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
    <script type="text/javascript" src="/app/faculty/FacultyService.js"></script>
    <script src="/app/admin/loader.js"></script>
    <script src="/app/faculty/project/app.js"></script>

@stop