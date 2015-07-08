<!DOCTYPE HTML>
<html>
<head>
    <meta name="csrf_token" value="<?php echo csrf_token(); ?>">
    <link rel="stylesheet" href="/packages/semantic/dist/semantic.min.css"/>
    <link rel="stylesheet" href="/packages/semantic/dist/components/dropdown.min.css"/>

    <script src="/packages/jquery/dist/jquery.min.js"></script>
    <script src="/packages/semantic/dist/semantic.min.js" type="text/javascript"></script>
    <script src="/packages/semantic/dist/components/dropdown.min.js" type="text/javascript"></script>
    <style>
        .avatar-menu {
            height: 2em !important;
            width: 2em !important;
            margin-top: -0.5em;
            margin-bottom: -0.5em;
        }
        .ui.inverted.purple.segment {
            background-color: #4c1d6e !important;
        }
    </style>

    @yield('header')


</head>

<body>

<div class="ui grid">
    <div class="one column row">
        <div class="column" style="background-color: #4c1d6e">
            <div class="ui grid container">
                <div class="column">
                    <h2 class="ui header inverted" style="padding: 10px;">
                        <img src="/images/uplogo.png">

                        <div class="content">
                            Success Model
                            <div class="sub header">ระบบฐานข้อมูลโครงการหนึ่งคณะหนึ่งโมเดล</div>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui container">
                <div class="ui large stackable menu " id="MainMenu" style="border-radius: 0px;">

                    <a id="main-sidebar-btn" class="item">
                        <i class="sidebar icon"></i>
                        Menu
                    </a>
                    <a class="item active">
                        <%$role_name%>
                    </a>

                    <div class="right menu">
                        <div class="item ui dropdown" ng-controller="UserCtrl">
                            @if(Auth::user()->logo)
                                <img class="ui avatar avatar-menu image" src="<%Auth::user()->logo->url%>?h=200">
                            @else
                                <img class="ui avatar avatar-menu image" src="/images/square-image.png">
                            @endif
                            @if(Auth::user())
                                <span><%Auth::user()->email%></span>
                            @endif
                            <div class="menu">
                                <div class="header">
                                    <i class="tags icon"></i>
                                    เลือกสิทธิ์การใช้งาน
                                </div>
                                @foreach( Auth::user()->roles as $role)
                                    <a class=" <% Request::is("$role->key/*") ? 'active' : '' %> item"
                                       href="/<%$role->key%>">
                                        <% $role->name %>
                                    </a>
                                @endforeach
                                <div class="divider"></div>
                                <a class="item">Change Profile</a>
                                <a class="item" ng-click="logout()">Logout</a>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="main-content" class="pushable">
    <div id="main-sidebar" class="ui inverted labeled vertical sidebar menu">
        @yield('sidemenu')
    </div>
    <div class="pusher">
        <div class="ui container" style="padding-top: 14px;">
            @yield('content')
        </div>
    </div>
</div>

<div class="ui centered padded grid" style="">

    <div class="column" style="text-align: left">
        © 2015 University of Phayao. ALL Rights Reserved
    </div>
</div>
<script type="text/javascript">
    $('.ui.dropdown').dropdown();

    $('#main-sidebar')
            .sidebar({
                context: $('#main-content'),
                transition: 'overlay'
            })
    ;

    $('#main-sidebar-btn').bind('click', function () {
        $('#main-sidebar').sidebar('toggle');
    })

</script>

@include('admin.js')

<script type="text/javascript">
    angular.module("MainMenuApp", ['AppConfig'])
            .controller("UserCtrl", function ($scope, $http) {
                $scope.current_user = {};
                console.log("UserCtrl MainMenuApp Start...")

//                $http.get('/api/auth/user').success(function (response) {
//                    $scope.current_user = response;
//                })

                $scope.logout = function () {
                    var logout = $http.get('/api/auth/user');

                    logout.success(function () {
                        window.location = '/auth/login';
                    })
                }
            })

    angular.bootstrap($("#MainMenu"), ['MainMenuApp']);

</script>

@yield('javascript')


</body>
</html>