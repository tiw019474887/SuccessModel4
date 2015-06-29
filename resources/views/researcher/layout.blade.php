@extends('dashboard_master')

@section('header')
    @yield('header')
@stop


@section('sidemenu')
    <div class="ui fluid vertical menu">
        <div class="header item">
            Administrator
        </div>
        <a class=" <% Request::is('admin/dashboard') ? 'active' : '' %> item" href="/admin">
            <i class="home icon"></i>
            Dashboard
        </a>

        <div class="header item">
            Faculty Management
        </div>

        <a class=" <% Request::is('admin/faculty') ? 'active' : '' %> item" href="/admin/faculty">
            Faculty
        </a>

        <div class="header item">
            Success Model Management
        </div>

        <a class=" <% Request::is('admin/project') ? 'active' : '' %> item" href="/admin/project">
            Projects
        </a>

        <a class=" <% Request::is('admin/project-status') ? 'active' : '' %> item" href="/admin/project-status">
            Project Status
        </a>

        <div class="header item">
            User Management
        </div>

        <a class=" <% Request::is('admin/user') ? 'active' : '' %> item" href="/admin/user">
            Users
        </a>

        <a class=" <% Request::is('admin/role') ? 'active' : '' %> item" href="/admin/role">
            Roles
        </a>
    </div>
@stop

@section('content')
    @yield('content')
@stop


@section('javascript')
    @yield('javascript')
@stop