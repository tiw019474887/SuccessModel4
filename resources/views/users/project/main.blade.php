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
    <link rel="stylesheet" href="/packages/openlayers/build/ol.css"/>

@stop



@section('content')
    <div style="display:none;" id="myDiv" class="animate-bottom">
        <div class="ui small breadcrumb">
            <a class="active section">Home</a>
            <i class="right chevron icon divider"></i>
            <div class="active section">Project</div>
        </div>
        <div class="ui attached stackable menu">
            <div class="ui container">
                <a class="active item" href="/users">
                    โครการทั้งหมด
                </a>
                <div class="ui simple dropdown item">
                    โครการในแต่ละอำเภอ
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item"><a href="/users/district/maindistrictMaung"> อำเภอเมือง</a></div>
                        <div class="item"><a href="/users/district/maindistrictMaechai">อำเภอแม่ใจ</a></div>
                        <div class="item"><a href="/users/district/maindistrictChiangmuan">อำเภอเชียงม่วน</a></div>
                        <div class="item"><a href="/users/district/maindistrictDokkhamtai">อำเภอดอกคำใต้</a></div>
                        <div class="item"><a href="/users/district/maindistrictPhukamyao">อำเภอภูกามยาว</a></div>
                        <div class="item"><a href="/users/district/maindistrictPhusang">อำเภอภูซาง</a></div>
                        <div class="item"><a href="/users/district/maindistrictChiangkham">อำเภอเชียงคำ</a></div>
                        <div class="item"><a href="/users/district/maindistrictChun">อำเภอจุน</a></div>
                        <div class="item"><a href="/users/district/maindistrictPong">อำเภอปง</a></div>
                    </div>
                </div>
                <div class="ui simple dropdown item">
                    โครการในแต่ละคณะ
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item"><a href="/users/faculty/Ag">คณะเกษตรศาสตร์และทรัพยากรธรรมชาติ</a></div>
                        <div class="item"><a href="/users/faculty/Dt">คณะทันตแพทยศาสตร์</a></div>
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
                    โครการในแต่ละปี
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item"><a href="/users/year/mainYear2555"> 2555</a></div>
                        <div class="item"><a href="/users/year/mainYear2556">2556</a></div>
                        <div class="item"><a href="/users/year/mainYear2557">2557</a></div>
                        <div class="item"><a href="/users/year/mainYear2558">2558</a></div>
                        <div class="item"><a href="/users/year/mainYear2559">2559</a></div>
                        <div class="item"><a href="/users/year/mainYear2560">2560</a></div>
                        <div class="item"><a href="/users/year/mainYear2561">2561</a></div>
                        <div class="item"><a href="/users/year/mainYear2562">2562</a></div>
                        <div class="item"><a href="/users/year/mainYear2563">2563</a></div>
                        <div class="item"><a href="/users/year/mainYear2564">2564</a></div>
                        <div class="item"><a href="/users/year/mainYear2565">2565</a></div>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="condensed container">Success Model</h2>
        <h4 class="condensed container">จำนวนโมเดลทั้งหมด <% count($projects)%> โมเดล</h4>
        <div class="ui divider condensed"></div>
        <div class=" column container">
            <div class="ui grid">
                <div class=" row container">
                    <div class="ui divider condensed"></div>
                    <div class="thirteen wide column">
                        <div class="three column row">
                            <div class="ui link cards">
                                <div class="ui recent-works vertical segment">
                                    <div class="fourteen wide column">
                                        <div class="ui three column aligned stackable  grid">
                                            @foreach($projects as $project)
                                                <div class="column">
                                                    <div class="ui fluid card" style="margin:1px;">
                                                        <div class="image">
                                                            <?php if(isset($project->logo->url)) : ?>
                                                            <img src="<% $project->logo->url %>?w=640&h=380&fit=stretch"/>
                                                            <?php else : ?>
                                                            <img src="/images/fff.png?w=640&h=280&fit=stretch"/>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="content">
                                                            <a class="header"><h3><% $project->name %></h3>

                                                                <h4><% $project->nameEN %></h4></a>

                                                            <div class="meta"><% $project->updated_at->diffForHumans()
                                                                %>
                                                            </div>

                                                            <p>
                                                                <% str_limit($project->abstract,100,'...') %>
                                                            </p>
                                                        </div>
                                                        <div class="extra content">
                                                            <div>
                                                                ผู้วิจัย
                                                                : <?php if(isset($project->createdBy->firstname)) : ?>
                                                                <% $project->createdBy->firstname %>
                                                                <?php else : ?>
                                                                ไม่ทราบผู้วิจัย
                                                                <?php endif; ?>
                                                            </div>
                                                            <div>
                                                                พื้นที่ : <?php if(isset($project->area->name_th)) : ?>
                                                                <% $project->area->name_th %>
                                                                <?php else : ?>
                                                                ไม่ทราบพื้นที่
                                                                <?php endif; ?>
                                                            </div>
                                                            <div>
                                                                <?php if(isset($project->faculty->name_th)) : ?>
                                                                <% $project->faculty->name_th %>
                                                                <?php else : ?>
                                                                ไม่ทราบผู้วิจัย
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>

                                                        <a href="/users/project/<%$project->id%>">
                                                            <div class="ui two bottom attached buttons">
                                                                <div class="ui inverted violet button">
                                                                    <p>
                                                                        อ่านต่อ
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui center">
                            <?php echo (new App\Pagination($projects))->render(); ?>
                        </div>
                    </div>
                    <div class="three wide right floated column container">
                        <div class="clounm">
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