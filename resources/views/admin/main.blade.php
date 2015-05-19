@extends('admin.layout')
@section('header')
    <link rel="stylesheet" href="/packages/angular-chart.js/dist/angular-chart.css">
@stop
@section('content')
    <h2>Dashboard</h2>

    <div ng-app="DashboardApp">
        <div class="ui two column grid">
            <div class="column">
                <div ng-controller="ProjectFacultyChartCtrl">
                    <canvas id="bar" class="chart chart-bar" data="data" labels="labels"></canvas>
                </div>
            </div>

        </div>

    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/packages/chart.js/Chart.min.js"></script>
    <script type="text/javascript" src="/packages/angular-chart.js/dist/angular-chart.min.js"></script>

    <script type="text/javascript" src="/app/admin/ChartService.js"></script>
    <script type="text/javascript">
        var app = angular.module("DashboardApp",['chart.js',"SuccessChart"]);
        app.controller("ProjectFacultyChartCtrl",function($scope,ChartService){
            ChartService.facultyProjectChart().success(function(response){
                $scope.labels = response.labels;
                $scope.data = response.data;
                $scoep.series = response.series;
            })
        })
    </script>
@stop
