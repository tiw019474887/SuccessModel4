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
            width : 2em !important;
            margin-top : -0.5em;
            margin-bottom:  -0.5em;
        }
    </style>
</head>

<body>

        <div class="ui large menu ">
            <div class="left menu">
                <div class="header item">
                    Success Model - ระบบฐานข้อมูลหนึ่งคณะหนึ่งโมเดล
                </div>
                <a class="item active">
                    Main Menu
                </a>
                <a class="item">
                    About Us
                </a>
            </div>

            <div class="right menu">
                <div class="item ui dropdown ">
                    <img class="ui avatar avatar-menu image" src="/images/square-image.png"> <span>UserName</span>
                    <div class="menu">
                        <a class="item">Change Profile</a>
                        <a class="item">Logout</a>
                    </div>

                </div>
                <div class="item">
                    Support
                </div>
                <a class="item">
                    FAQ
                </a>
                <a class="item">
                    E-mail Support
                </a>
            </div>
        </div>


<div class="ui padded  grid">
    <div class="ui centered row">
        <div class="ui three wide column">
            <div class="ui vertical menu">
                <div class="header item">
                    Administrator
                </div>
                <a class=" {{ Request::is('admin/dashboard') ? 'active' : '' }} item" href="/admin">
                    <i class="home icon"></i>
                    Dashboard
                </a>
                <a class=" {{ Request::is('admin/faculty') ? 'active' : '' }} item" href="/admin/faculty">
                   Faculty
                </a>

                <a class=" {{ Request::is('admin/user') ? 'active' : '' }} item" href="/admin/user">
                    Users
                </a>

                <a class=" {{ Request::is('admin/role') ? 'active' : '' }} item" href="/admin/role">
                    Roles
                </a>

                <div class="ui dropdown item">
                    More
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item"><i class="edit icon"></i> Edit Profile</a>
                        <a class="item"><i class="globe icon"></i> Choose Language</a>
                        <a class="item"><i class="settings icon"></i> Account Settings</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui twelve wide column">
            @yield('content')
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


@yield('javascript')

</body>
</html>