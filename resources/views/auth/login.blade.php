<!DOCTYPE HTML5>
<html>
<head>
    <link rel="stylesheet" href="/packages/semantic-ui/dist/semantic.min.css"/>
    <link rel="stylesheet" href="/packages/semantic-ui/dist/components/dropdown.min.css"/>

    <script src="/packages/jquery/dist/jquery.min.js"></script>
    <script src="/packages/semantic-ui/dist/semantic.min.js" type="text/javascript"></script>
    <script src="/packages/semantic-ui/dist/components/dropdown.min.js" type="text/javascript"></script>
    <style>
        .avatar-menu {
            height: 2em !important;
            width: 2em !important;
            margin-top: -0.5em;
            margin-bottom: -0.5em;
        }
    </style>
</head>

<body ng-app="MainApp">

<div class="ui" style="background-color: #4c1d6e">

    <h2 class="ui header inverted" style="padding: 10px;">
        <img src="/images/uplogo.png">

        <div class="content">
            Success Model
            <div class="sub header">ระบบฐานข้อมูลโครงการหนึ่งคณะหนึ่งโมเดล</div>
        </div>
    </h2>

</div>

<div class="ui padded  grid ">
    <div class="twelve wide column">
        <div class="ui purple segment">
            Purple
        </div>
    </div>
    <div class="four wide column">

        <div ng-controller="loadCtrl" ng-class="{active:active}" class="ui inverted dimmer ">
            <div class="ui large text loader">
                Loading
            </div>
        </div>

        <div ng-controller="LoginCtrl">

            <div class="ui top attached purple inverted  segment">
                <h4>เข้าใช้งานระบบ / Sign in</h4>
            </div>
            <div class="ui attached segment" ng-if="message">
                <div class="ui negative message">
                    <div class="header">We had some issues</div>
                    <ul class="list" ng-if="message">
                        <li ng-repeat="m in message" ng-bind="m"></li>
                    </ul>
                </div>
            </div>

            <div class="ui attached segment">
                <form class="ui form" ng-submit="login()">
                    <div class="ui fluid left icon input field">
                        <i class="mail icon"></i>
                        <input ng-model="user.email" type="text" placeholder="E-Mail Address">
                    </div>
                    <div class="ui fluid left icon input field">
                        <i class="lock icon"></i>
                        <input ng-model="user.password" type="password" placeholder="Password">
                    </div>
                    <div class="ui grid">
                        <div class="row two column">
                            <div class="column">
                                <button type="submit" class="fluid ui primary button">User Login</button>
                            </div>
                            <div class="column">
                                <a href="#" class="fluid ui positive button">Register</a>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    $('.ui.dropdown').dropdown();
</script>

<script type="text/javascript" src="/packages/flow.js/dist/flow.min.js"></script>
<script type="text/javascript" src="/packages/angular/angular.min.js"></script>
<script type="text/javascript" src="/packages/angular-semantic-ui/dist/angular-semantic-ui.min.js"></script>
<script type="text/javascript" src="/packages/angular-ui-router/release/angular-ui-router.min.js"></script>
<script type="text/javascript" src="/packages/ng-flow/dist/ng-flow.min.js"></script>


<script type="text/javascript" src="/app/admin/AuthService.js"></script>
<script type="text/javascript" src="/app/admin/loader.js"></script>

<script type="text/javascript">
    var app = angular.module("MainApp", ['Auth', 'AppConfig']);
    app.controller("LoginCtrl", function ($scope, AuthService) {
        $scope.user = {}
        $scope.message = null;
        $scope.login = function () {
            $scope.user.csrf_token = "<?php echo csrf_token();?>";
            AuthService.login($scope.user).success(function (response) {
                window.location = "/admin";
                //console.log(response);
            }).error(function (response) {
                //console.log(response);
                $scope.message = response;
            })
        }
    })
</script>
</body>
</html>