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
            <a class="active item" href="/users">
                โครการทั้งหมด
            </a>
            <div class="ui simple dropdown item">
                โครการในแต่ละอำเภอ
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item">อำเภอเมือง</div>
                    <div class="item">อำเภอแม่ใจ</div>
                    <div class="item">อำเภอเชียงม่วน</div>
                    <div class="item">อำเภอดอกคำใต้</div>
                    <div class="item">อำเภอภูกามยาว</div>
                    <div class="item">อำเภอภูซาง</div>
                    <div class="item">อำเภอเชียงคำ</div>
                    <div class="item">อำเภอจุน</div>
                    <div class="item">อำเภอปง</div>
                </div>
            </div>
            <div class="ui simple dropdown item">
                โครการในแต่ละคณะ
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item"><a href="/users/faculty/Ag">คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ</a></div>
                    <div class="item"><a  href="/users/faculty/Dt">คณะทันตแพทยศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Ict">คณะเทคโนโลยีสารสนเทศและการสื่อสาร</a></div>
                    <div class="item"><a href="/users/faculty/Law">คณะนิติศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Nu">คณะพยาบาลศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Md">คณะแพทยศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Ps">คณะเภสัชศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Mis">คณะวิทยาการจัดการและสารสนเทศศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Sc">คณะวิทยาศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Medsci">คณะวิทยาศาสตร์การแพทย์</a></div>
                    <div class="item"><a href="/users/faculty/Fa">คณะศิลปศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/En">คณะวิศวกรรมศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Ar">คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Ash">คณะสหเวชศาสตร์</a></div>
                    <div class="item"><a href="/users/faculty/Edu">วิทยาลัยการศึกษา</a></div>
                    <div class="item"><a href="/users/faculty/Seen">วิทยาลัยพลังงานและสิ่งแวดล้อม</a></div>
                </div>
            </div>
            <div class="ui simple dropdown item">
                ปีที่ดำเนินการ
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item">2555</div>
                    <div class="item">2556</div>
                    <div class="item">2557</div>
                    <div class="item">2558</div>
                    <div class="item">2559</div>
                    <div class="item">2560</div>
                    <div class="item">2561</div>
                    <div class="item">2562</div>
                    <div class="item">2563</div>
                    <div class="item">2564</div>
                    <div class="item">2565</div>
                </div>
            </div>

        </div>
    </div>

    <h2 class="condensed container">โมเดลที่สำเร็จ</h2>
    <div class="ui divider condensed"></div>
    <div class=" column container">

        <div class="ui grid">
            <div class=" row container">
                <div class="ui divider condensed"></div>
                <div class="thirteen wide column">
                    <h3 class="condensed container"><a name="13"> คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์</a></h3>
                    @include('users.faculty.ar',['name_th' => 'คณะสถาปัตยกรรมศาสตร์และศิลปกรรมศาสตร์'])
                    <div class="ui center">
                        <?php echo (new App\Pagination($projects))->render(); ?>
                    </div>
                </div>
                <div class="three wide right floated column container">
                    <div class="clounm">

                        <h3 class="condensed">Link</h3>

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
