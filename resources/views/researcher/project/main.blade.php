@extends('admin.master')

@section('sidemenu')

@stop

@section('content')
    <div ng-app="ResearcherProjectAdmin">
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
    <script type="text/javascript" src="/app/researcher/ResearcherService.js"></script>
    <script src="/app/admin/loader.js"></script>
    <script src="/app/researcher/project/app.js"></script>

@stop