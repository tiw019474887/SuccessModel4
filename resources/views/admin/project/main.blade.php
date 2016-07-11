@extends('admin.layout')

@section('header')
    <link rel="stylesheet" href="/packages/openlayers/build/ol.css"/>
    <link rel="stylesheet" type="text/css" href="/packages/flexslider/flexslider.css">

    <style>
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }
        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

    </style>

@stop

@section('content')
    <div ng-app="ProjectAdmin">
        <div ng-controller="loadCtrl" ng-class="{active:active}" class="ui inverted dimmer ">
            <div class="ui large text loader">
                Loading
            </div>
        </div>

        <ui-view></ui-view>
    </div>

@stop


@section('javascript')
    <script>
        var app = angular.module('demoapp', ['Project', 'Area', 'openlayers-directive']);
        app.controller('DemoController', ['$scope', function ($scope) {
            angular.extend($scope, {});

        }]);
    </script>

    <script type="text/javascript">

        $('#logIn').click(function () {
            $('#modaldiv').modal('show');
        });

    </script>

    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide"
            });
        });
    </script>

    <script type="text/javascript">
        function isThaichar(str,obj){
            var orgi_text="ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝ๑๒๓๔ู฿๕๖๗๘๙๐ฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦ";
            var str_length=str.length;
            var str_length_end=str_length-1;
            var isThai=true;
            var Char_At="";
            for(i=0;i<str_length;i++){
                Char_At=str.charAt(i);
                if(orgi_text.indexOf(Char_At)==-1){
                    isThai=false;
                }
            }
            if(str_length>=1){
                if(isThai==false){
                    obj.value=str.substr(0,str_length_end);
                }
            }
            return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
        }
    </script>

    <script type="text/javascript">
        function isEngchar(str,obj){
            var orgi_text="qwertyuiopasdfghjklzxcvbnm";
            var str_length=str.length;
            var str_length_end=str_length-1;
            var isThai=true;
            var Char_At="";
            for(i=0;i<str_length;i++){
                Char_At=str.charAt(i);
                if(orgi_text.indexOf(Char_At)==-1){
                    isThai=false;
                }
            }
            if(str_length>=1){
                if(isThai==false){
                    obj.value=str.substr(0,str_length_end);
                }
            }
            return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
        }
    </script>

    <script type="text/javascript" src="/app/researcher/ResearcherService.js"></script>
    <script type="text/javascript" src="/app/users/UsersService.js"></script>
    <script type="text/javascript" src="/app/admin/YoutubeService.js"></script>
    <script type="text/javascript" src="/app/admin/UserService.js"></script>
    <script type="text/javascript" src="/app/admin/AreaService.js"></script>
    <script type="text/javascript" src="/app/admin/ProjectService.js"></script>
    <script type="text/javascript" src="/app/admin/FacultyService.js"></script>
    <script type="text/javascript" src="/app/admin/ProjectStatusService.js"></script>
    <script type="text/javascript" src="/app/admin/YearProjectService.js"></script>
    <script type="text/javascript" src="/app/admin/project/app.js"></script>
    <script src="/app/admin/loader.js"></script>

    <script type="text/javascript" src="/packages/openlayers/build/ol.js"></script>
    <script type="text/javascript" src="/packages/angular/angular.min.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-openlayers-directive/dist/angular-openlayers-directive.js"></script>

    <script type="text/javascript" src="/packages/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/packages/angular-flexslider/angular-flexslider.js"></script>
    <script type="text/javascript" src="/packages/showdown/compressed/Showdown.js"></script>
    <script type="text/javascript" src="/packages/angular-markdown-directive/markdown.js"></script>
    <script type="text/javascript" src="/packages/bxslider/jquery.bxSlider.min.js"></script>





@stop

