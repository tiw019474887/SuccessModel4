<!DOCTYPE HTML5>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/packages/semantic/dist/semantic.min.css"/>
    <link rel="stylesheet" href="/packages/semantic/dist/components/dropdown.min.css"/>

    <script src="/packages/jquery/dist/jquery.min.js"></script>
    <script src="/packages/semantic/dist/semantic.min.js" type="text/javascript"></script>
    <script src="/packages/semantic/dist/components/dropdown.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/css/style.css"/>
</head>

<body>

<div id="menu-grid" class="ui grid">
    <div class="one column row">
        <div class="column" style="background-color: #4c1d6e">
            <div class="ui grid container">
                <div class="column">
                    <h2 class="ui header inverted" style="padding: 10px;">
                        <img src="/images/uplogo.png">

                        <div class="content">
                            Success Model
                            <div class="sub header">ระบบฐานข้อมูลหนึ่งคณะหนึ่งโมเดล</div>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="main-content">
    @yield('content')
</div>

<div id="footer-grid" class="ui inverted vertical footer segment" style="background-color: #4c1d6e">
    <div class="ui center aligned container">
        <div class="ui horizontal inverted small divided link list">
            © 2015 University of Phayao. ALL Rights Reserved
        </div>
    </div>
</div>


<script>
    function initialResizeWindows() {
        var bodyheight = $(window).height();
        var menuheight = $("#menu-grid").height();
        var footerheight = $("#footer-grid").height();
        var contentHeight = $("#main-content").height() + 55;

        var minusHeight = menuheight + footerheight;

        $("#main-content").height(bodyheight - minusHeight);

    }
    $(window).resize(function () {
        initialResizeWindows();
    })

    initialResizeWindows();
</script>

@yield('javascript')


</body>
</html>