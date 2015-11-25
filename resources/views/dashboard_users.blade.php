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
            <a class="item " href ="/users">
                User
            </a>
            <div class="right aligned right floated column">
                <a class="item">
                    <form class="ui form" method="get" action="/users/search">
                            <input type="text" name="keyword" placeholder="ค้นหา">
                    </form>
                </a>
            </div>
            <a class="item ">
                <form class="ui form"  action="/auth/login">
                <button  class="ui orange button" >Login</button>
                </form>
            </a>
        </div>
        </div>
        <div class="column" style="background-color: #4c1d6e">
            <div class="ui grid container">
                <div class="column">
                    <h2 class="ui header inverted" style="padding: 20px;">
                        <div class="ui small image" >
                            <a href ="/users">
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


<script type="text/javascript">
    $('.ui.dropdown').dropdown();

    function initialResizeWindows(){
        var bodyheight = $(window).height();
        var contentHeight = $("#real-content").height()+55;

//        console.log("BodyHeight :"+ (bodyheight - 165));
//        console.log("ContHeight :"+contentHeight);

        if(contentHeight > bodyheight-165){
            $("#resize-grid").height(contentHeight);
        }else {
            $("#resize-grid").height(bodyheight-165);
        }
        $("#main-pusher").height($("#resize-grid").height());
    }
    $(window).resize(function(){
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

<script type="text/javascript">
    var content = [
        { title: 'Andorra' },
        { title: 'United Arab Emirates' },
        { title: 'Afghanistan' },
        { title: 'Antigua' },
        { title: 'Anguilla' },
        { title: 'Albania' },
        { title: 'Armenia' },
        { title: 'Netherlands Antilles' },
        { title: 'Angola' },
        { title: 'Argentina' },
        { title: 'American Samoa' },
        { title: 'Austria' },
        { title: 'Australia' },
        { title: 'Aruba' },
        { title: 'Aland Islands' },
        { title: 'Azerbaijan' },
        { title: 'Bosnia' },
        { title: 'Barbados' },
        { title: 'Bangladesh' },
        { title: 'Belgium' },
        { title: 'Burkina Faso' },
        { title: 'Bulgaria' },
        { title: 'Bahrain' },
        { title: 'Burundi' }
        // etc
    ];
    $('.ui.search').search({
        type: 'standard',
        source : content,
        searchFields   : [
            'title'
        ],
        searchFullText: false
    });
</script>

@include('admin.js')

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

@yield('javascript')



<script>
    $(document).ready(function () {
        initialResizeWindows();
    })
</script>

</body>
