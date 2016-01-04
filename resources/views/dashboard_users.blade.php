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

    </style>

    @yield('header')


</head>

<body>

<div class="ui grid">
    <div class="one column row" style="padding-bottom: 10 px;">
        <div class="column" style="background-color: #4c1d6e">
            <div class="ui menu">
                <a id="main-sidebar-btn" class="item">
                    <i class="sidebar icon"></i>
                    Menu
                </a>
                <a class="item " href="/users">
                    User
                </a>

                <div class="right aligned right floated column">
                    <a class="item">
                        <form class="ui form" method="get" action="/users/search">
                            <input type="text" name="keyword" placeholder="ค้นหา">
                        </form>
                    </a>
                </div>
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
                        <a class="item" href="/">หน้าหลัก</a>
                        <div class="divider"></div>
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
        <div class="column" style="background-color: #4c1d6e">
            <div class="ui grid container">
                <div class="column">
                    <h2 class="ui header inverted" style="padding: 20px;">
                        <div class="ui small image">
                            <a href="/users">
                                <img src="/images/fff.png">
                            </a>
                        </div>
                        <div class="content">
                            Success Model
                            <div class="sub header">ระบบฐานข้อมูลโครงการหนึ่งคณะหนึ่งโมเดล</div>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="resize-grid" class="ui grid" style="margin-top: 0px; height: calc(100% - 165px);">
    <div class="one column row">
        <div id="main-content" class="column">
            <div id="main-sidebar" class="ui inverted labeled vertical sidebar menu" style="padding-left:15px;">
                @yield('sidemenu')
            </div>

            <div id="main-pusher" class="pusher">
                <div id="real-content" class="ui container" style="margin-bottom: 40px;padding-top: 15px;">
                    <div class="column">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<p></p>

<div class="ui inverted vertical footer segment" style="background-color: #4c1d6e">
    <div class="ui center aligned container">
        <div class="ui horizontal inverted small divided link list">
            © 2015 University of Phayao. ALL Rights Reserved
        </div>
    </div>
</div>


@include('admin.js')
@yield('javascript')
<script type="text/javascript">
    $('.ui.dropdown').dropdown();

    function initialResizeWindows() {
        var bodyheight = $(window).height();
        var contentHeight = $("#real-content").height() + 55;

        console.log("BodyHeight :" + (bodyheight));
        console.log("ContHeight :" + contentHeight);

        if (contentHeight > bodyheight - 165) {
            $("#resize-grid").height(contentHeight + 230);
        } else {
            $("#resize-grid").height(bodyheight - 165);
        }
        $("#main-pusher").height($("#resize-grid").height());
    }
    $(window).resize(function () {
        initialResizeWindows();
    })


    $('#main-sidebar')
            .sidebar({
                context: $('#main-content'),
                transition: 'push'
            })
    ;

    $('#main-sidebar-btn').bind('click', function () {
        $('#main-sidebar').sidebar('toggle');
    })


</script>

<script>
    $(document).ready(function () {
        initialResizeWindows();
    })
</script>
<script type="text/javascript">
    angular.module("MainMenuApp", ['AppConfig'])
            .controller("UserCtrl", function ($scope, $http) {
                $scope.current_user = {};
                console.log("UserCtrl MainMenuApp Start...")

                $scope.logout = function () {
                    var logout = $http.get('/api/auth/user');

                    logout.success(function () {
                        window.location = '/auth/login';
                    })
                }
            })

    angular.bootstrap($("#MainMenu"), ['MainMenuApp']);

</script>

</body>
