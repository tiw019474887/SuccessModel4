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

<body ng-app="RegisterApp">

<div class="ui" style="background-color: #4c1d6e">

    <h2 class="ui header inverted" style="padding: 10px;">
        <img src="/images/uplogo.png">

        <div class="content">
            Success Model
            <div class="sub header">ระบบฐานข้อมูลโครงการหนึ่งคณะหนึ่งโมเดล</div>
        </div>
    </h2>

</div>

<div class="ui padded  grid">
    <div class="twelve wide column">
        <div class="ui purple segment">
            <div ng-controller="loadCtrl" ng-class="{active:active}" class="ui inverted dimmer ">
                <div class="ui large text loader">
                    Loading
                </div>
            </div>

            <div ng-controller="RegisterCtrl">

                <div class="ui top attached purple inverted  segment">
                    <h4>ลงทะเบียน / Register</h4>
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
                    <form id="register" class="ui form" ng-submit="register()">
                        <div class="ui fluid left icon input field">
                            <i class="mail icon"></i>
                            <input ng-model="user.firstname" name="firstname" type="text" placeholder="First Name">
                        </div>
                        <div class="ui fluid left icon input field">
                            <i class="mail icon"></i>
                            <input ng-model="user.lastname" name="lastname" type="text" placeholder="Last Name">
                        </div>
                        <div class="ui fluid left icon input field">
                            <i class="mail icon"></i>
                            <input ng-model="user.email" name="email" type="text" placeholder="E-Mail Address">
                        </div>
                        <div class="ui fluid left icon input field">
                            <i class="lock icon"></i>
                            <input ng-model="user.password" name="password" type="password" placeholder="Password">
                        </div>

                        <div class="ui fluid left icon input field">
                            <i class="lock icon"></i>
                            <input ng-model="user.vpassword" name="vpassword" type="password" placeholder="Verify Password">
                        </div>

                        <button type="submit" class="ui primary button">Register</button>
                    </form>
                </div>
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
    var app = angular.module("RegisterApp", ['Auth', 'AppConfig']);
    app.controller('RegisterCtrl',function($scope){

    })

</script>
</body>
</html>