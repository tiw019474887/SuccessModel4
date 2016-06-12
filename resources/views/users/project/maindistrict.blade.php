@extends('users.layout')

@section('header')
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

    <link rel="stylesheet" type="text/css" href="/packages/flexslider/flexslider.css">
@stop



@section('content')

    <div class="ui attached stackable menu">
        <div class="ui container">
            <a class="item" href="/users">
                โครการทั้งหมด
            </a>
            <a class="item" href="/users/district">
                อำเภอ
            </a>
            <a class="item" href="/users/faculty ">
                คณะ
            </a>
        </div>
    </div>

    <h2 class="condensed container">โมเดลที่สำเร็จ</h2>
    <div class="ui divider condensed"></div>
    <div class=" column container">

        <div class="ui grid">
            <div class=" row container">
                <div class="ui divider condensed"></div>
                <div class="thirteen wide column">
                    <h3 class="condensed container"><a name="1">อำเภอเมือง</a> <a href="#1">ไปด้านบน</a></h3>
                    @include('users.district.maung',['name_th' => 'อำเภอเมือง'])
                    <h3 class="condensed container"><a name="2">อำเภอแม่ใจ</a></h3>
                    @include('users.district.maechai',['name_th' => 'อำเภอแม่ใจ'])
                    <h3 class="condensed container"><a name="3">อำเภอเชียงม่วน</a></h3>
                    @include('users.district.chiangmuan',['name_th' => 'อำเภอเชียงม่วน'])
                    <h3 class="condensed container"><a name="4">อำเภอดอกคำใต</a>้</h3>
                    @include('users.district.dokkhamtai',['name_th' => 'อำเภอดอกคำใต'])
                    <h3 class="condensed container"><a name="5">อำเภอภูกามยาว</a></h3>
                    @include('users.district.phukamyao',['name_th' => 'อำเภอภูกามยาว'])
                    <h3 class="condensed container"><a name="6"> อำเภอภูซาง</a></h3>
                    @include('users.district.phusang',['name_th' => 'อำเภอภูซาง'])
                    <h3 class="condensed container"><a name="7">อำเภอเชียงคำ</a></h3>
                    @include('users.district.chiangkham',['name_th' => 'อำเภอเชียงคำ'])
                    <h3 class="condensed container"><a name="8"> อำเภอจุน</a></h3>
                    @include('users.district.chun',['name_th' => 'อำเภอจุน'])
                    <h3 class="condensed container"><a name="9"> อำเภอปง</a></h3>
                    @include('users.district.pong',['name_th' => 'อำเภอปง'])
                </div>

                <div class="three wide right floated column container">
                    <div class="clounm">
                        <h3 class="condensed">อำเภอ</h3>

                        <div><a href="#1">อำเภอเมือง</a></div>
                        <div><a href="#2">อำเภอแม่ใจ</a></div>
                        <div><a href="#3">อำเภอเชียงม่วน</a></div>
                        <div><a href="#4">อำเภอดอกคำใต้</a></div>
                        <div><a href="#5">อำเภอภูกามยาว</a></div>
                        <div><a href="#6">อำเภอภูซาง</a></div>
                        <div><a href="#7">อำเภอเชียงคำ</a></div>
                        <div><a href="#8">อำเภอจุน</a></div>
                        <div><a href="#9">อำเภอปง</a></div>

                        <h3 class="condensed">ลิ้งต่างๆ</h3>

                        <div class="ui divider condensed"></div>

                        <div class="clounm">
                            <div class="image">
                                <a href="http://www.up.ac.th">
                                    <img class="ui medium image" src="/images/UP.jpg">
                                </a>
                            </div>
                            <div class="ui divider condensed"></div>
                            <div class="image">
                                <a href="http://www.up.ac.th/V7/Pkynews.aspx">
                                    <img class="ui medium image" src="/images/PKYN.jpg">
                                </a>
                            </div>
                            <div class="ui divider condensed"></div>
                            <div class="image">
                                <a href="https://www.youtube.com/channel/UCeVCgKGfBPhR68INbfcL4vg?feature=watch">
                                    <img class="ui medium image" src="/images/UPCH.jpg">
                                </a>
                            </div>
                            <div class="ui divider condensed"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('javascript')



    <script type="text/javascript" src="/packages/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/packages/angular-flexslider/angular-flexslider.js"></script>
    <script type="text/javascript" src="/packages/showdown/compressed/Showdown.js"></script>
    <script type="text/javascript" src="/packages/angular-sanitize/angular-sanitize.min.js"></script>
    <script type="text/javascript" src="/packages/angular-markdown-directive/markdown.js"></script>
    <script type="text/javascript" src="/packages/bxslider/jquery.bxSlider.min.js"></script>
    <script type="text/javascript" src="/app/admin/UserService.js"></script>
    <script type="text/javascript" src="/app/admin/RoleService.js"></script>
    <script type="text/javascript" src="/app/admin/FacultyService.js"></script>
    <script src="/app/admin/loader.js"></script>
    <script src="/app/users/project/app.js"></script>

@stop