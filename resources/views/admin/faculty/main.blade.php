@extends('admin.layout')


@section('content')
    <div ng-app="FacultyAdmin">
        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script type="text/javascript" src="/app/admin/FacultyService.js"></script>
    <script type="text/javascript" src="/app/admin/faculty/app.js"></script>
@stop