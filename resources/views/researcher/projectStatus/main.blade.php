@extends('admin.layout')


@section('content')
    <div ng-app="ProjectStatusAdmin">
        <div ng-controller="loadCtrl" ng-class="{active:active}" class="ui inverted dimmer ">
            <div class="ui large text loader">
                Loading
            </div>
        </div>

        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script type="text/javascript" src="/app/admin/ProjectStatusService.js"></script>
    <script type="text/javascript" src="/app/admin/projectStatus/app.js"></script>
@stop