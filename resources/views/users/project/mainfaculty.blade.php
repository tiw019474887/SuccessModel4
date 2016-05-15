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
                    <h3 class="condensed container"><a name="1">คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ</a></h3>
                    @include('users.faculty.ag',['name_th' => 'คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ'])
                    <h3 class="condensed container"><a name="2">คณะทันตแพทยศาสตร์</a></h3>
                    @include('users.faculty.dt',['name_th' => 'คณะทันตแพทยศาสตร์'])
                    <h3 class="condensed container"><a name="3">คณะเทคโนโลยีสารสนเทศและการสื่อสาร</a></h3>
                    @include('users.faculty.ict',['name_th' => 'คณะเทคโนโลยีสารสนเทศและการสื่อสาร'])
                    <h3 class="condensed container" ><a name="4" >คณะนิติศาสตร์</a>้</h3>
                    @include('users.faculty.law',['name_th' => 'คณะนิติศาสตร์'])
                    <h3 class="condensed container" ><a name="5">คณะพยาบาลศาสตร์</a></h3>
                    @include('users.faculty.nu',['name_th' => 'คณะพยาบาลศาสตร์'])
                    <h3 class="condensed container" ><a name="6"> คณะแพทยศาสตร์</a></h3>
                    @include('users.faculty.md',['name_th' => 'คณะแพทยศาสตร์'])
                    <h3 class="condensed container"><a name="7">คณะเภสัชศาสตร์</a></h3>
                    @include('users.faculty.md',['name_th' => 'คณะเภสัชศาสตร์'])
                    <h3 class="condensed container" ><a name="8"> คณะวิทยาการจัดการและสารสนเทศศาสตร์</a></h3>
                    @include('users.faculty.mis',['name_th' => 'คณะวิทยาการจัดการและสารสนเทศศาสตร์'])
                    <h3 class="condensed container"><a name="9"> คณะวิทยาศาสตร์</a></h3>
                    @include('users.faculty.sc',['name_th' => 'คณะวิทยาศาสตร์'])
                    <h3 class="condensed container"><a name="10"> คณะวิทยาศาสตร์การแพทย์</a></h3>
                    @include('users.faculty.medsci',['name_th' => 'คณะวิทยาศาสตร์การแพทย์'])
                    <h3 class="condensed container"><a name="11"> คณะวิศวกรรมศาสตร์ </a></h3>
                    @include('users.faculty.en',['name_th' => 'คณะวิศวกรรมศาสตร์'])
                    <h3 class="condensed container"><a name="12"> คณะศิลปศาสตร์</a></h3>
                    @include('users.faculty.fa',['name_th' => 'คณะศิลปศาสตร์'])
                    <h3 class="condensed container"><a name="13"> คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์</a></h3>
                    @include('users.faculty.ar',['name_th' => 'คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์'])
                    <h3 class="condensed container"><a name="14"> คณะสหเวชศาสตร์</a></h3>
                    @include('users.faculty.ahs',['name_th'=> 'คณะสหเวชศาสตร์'])
                    <h3 class="condensed container"><a name="15"> วิทยาลัยการศึกษา</a></h3>
                    @include('users.faculty.edu',['name_th' => 'วิทยาลัยการศึกษา'])
                    <h3 class="condensed container"><a name="16"> วิทยาลัยพลังงานและสิ่งแวดล้อม</a></h3>
                    @include('users.faculty.seen',['name_th' => 'วิทยาลัยพลังงานและสิ่งแวดล้อม'])


                    <div class="ui center">
                        <?php echo (new App\Pagination($projects))->render(); ?>
                    </div>
                </div>
                <div class="three wide right floated column container">
                    <div class="clounm">
                        <h3 class="condensed">คณะ</h3>
                        <div><a href="#1">คณะเกษตรศาสตร์</a></div>
                        <div><a href="#2">คณะทันตแพทยศาสตร์</a></div>
                        <div><a href="#3">คณะเทคโนโลยีสารสนเทศและการสื่อสาร</a></div>
                        <div><a href="#4">คณะนิติศาสตร์</a></div>
                        <div><a href="#5">คณะพยาบาลศาสตร์</a></div>
                        <div><a href="#6">คณะแพทยศาสตร์</a></div>
                        <div><a href="#7">คณะเภสัชศาสตร์</a></div>
                        <div><a href="#8">คณะวิทยาการจัดการและสารสนเทศศาสตร์</a></div>
                        <div><a href="#9">คณะวิทยาศาสตร์</a></div>
                        <div><a href="#10">คณะวิทยาศาสตร์การแพทย์</a></div>
                        <div><a href="#11">คณะวิศวกรรมศาสตร์ </a></div>
                        <div><a href="#12">คณะศิลปศาสตร์</a></div>
                        <div><a href="#13">คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์</a></div>
                        <div><a href="#14">คณะสหเวชศาสตร์</a></div>
                        <div><a href="#15">วิทยาลัยการศึกษา</a></div>
                        <div><a href="#16">วิทยาลัยพลังงานและสิ่งแวดล้อม</a></div>

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
