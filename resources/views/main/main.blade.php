@extends('layout.main')

@section('content')
    <div class="ui container grid">
        <div class="row" style="padding-top: 0px;">
            <div class="wide column">
                <div class="ui menu">
                    <a class="active item">
                        Home
                    </a>
                    <a class="item">
                        Messages
                    </a>
                    <a class="item">
                        Friends
                    </a>

                    <div class="right menu">
                        <div class="item">
                            <div class="ui icon input">
                                <input type="text" placeholder="Search...">
                                <i class="search link icon"></i>
                            </div>
                        </div>
                        <div class="item ui dropdown" ng-controller="UserCtrl">
                            @if(Auth::user()->logo)
                                <img class="ui avatar avatar-menu image" src="<%Auth::user()->logo->url%>?h=200">
                            @else
                                <img class="ui avatar avatar-menu image" src="/images/square-image.png">
                            @endif
                            @if(Auth::user())
                                <span><%Auth::user()->email%></span>
                            @endif
                            <div class="menu">
                                <a class="item" href="/">หน้าหลัก</a>
                                <div class="divider"></div>
                                <div class="header">
                                    <i class="tags icon"></i>
                                    เลือกสิทธิ์การใช้งาน
                                </div>
                                @foreach( Auth::user()->roles as $role)
                                    <a class=" <% Request::is("$role->key/*") ? 'active' : '' %> item"
                                       href="/<%$role->key%>">
                                        <% $role->name %>
                                    </a>
                                @endforeach
                                <div class="divider"></div>
                                <a class="item">Change Profile</a>
                                <a class="item" ng-click="logout()">Logout</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script type="text/javascript" src="/packages/semantic/dist/semantic.min.js"></script>

    <script type="text/javascript">
        $('.ui.dropdown').dropdown();
    </script>
@endsection
