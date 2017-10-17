@extends('layouts.mainpage')

@section('css')
@endsection

@section('navigation')
@endsection

@section('content')

    <style>
        body,html, .container-fluid{
            height: 100%;
            width: 100%;
        }

        .container {
            height:200px;
            border:1px solid;
        }
        .right {
            height: 100%;
            width:auto;
            background:#eaecf3;
            overflow:hidden;
        }
        .left {
            width:220px;
            background:blue;
            float:left;
            padding-left: 10px;
            height: 100%;
        }

        .sidebar{
            padding-top: 50px;
            background-color: #234567;
            height: 100%;
            border: none !important;
            color: white;
            font-weight: 600;
            z-index: 999;
        }

        .sidebar a{
            color: white;
            transition: all .4s ease-in-out;
        }

        .sidebar a:hover{
            text-decoration: none;
            color: #4eabbf;
        }

        .sidebar li{
            padding-top: 15px;
            margin: 0;
        }

        #accordion{
            padding-top :0px
        }

        #accordion ul{
            border-right: 5px solid #4eabbf;
        }

        #accordion ul a{
            display: block;
            padding-left: 2em;
        }

        @media (max-width: 768px){
            .showOnXs{
                display: block !important;
                background-color: #234567;
            }

            .sidebar{
                width: 100%;
                height: 500px !important;
                margin-left: 0px !important;
                background-color: rgba(35,69,103, .8);
                position: absolute;
            }

            .right{
                padding-top: 50px;
            }
        }
    </style>
<div class="container-fluid noPadding noMargin" style="background-color: #234567">
    <nav class="navbar navbar-inverse navbar-fixed-top noMargin showOnXs" style="display: none">
        <div class="">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sideNav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
            </div>
        </div>
    </nav>

    <nav class="left sidebar collapse navbar-collapse" id="sideNav">
        <img src="https://onsemble.net/wp-content/themes/Onsemble-2015/images/icon-account.png" alt="Account Image" class="img-circle" style="width: 50px; background-color: white; padding: 1px">
        <span>
            Earl Kevin Aguja
        </span>
        <ul class="list-unstyled">
            <a href=""><li><span class="glyphicon glyphicon-home"></span> Home</li></a>
            <a data-toggle="collapse" data-parent="#accordion" href="#accountsCollapse"><li><span class="glyphicon glyphicon-user"></span> Accounts <small><span class="glyphicon glyphicon-arrow-up"></span><span class="glyphicon glyphicon-arrow-down"></span></small></li></a>
            <li id="accordion">
                <ul id="accountsCollapse" class="list-unstyled panel-collapse collapse {{Request::is("accounts*") ? "in" :  ''}}">
                    <li><a href="">Accounts</a></li>
                    <li><a href="">Create Account</a></li>
                </ul>
            </li>
            <a href=""><li><span class="glyphicon glyphicon-book"></span> Announcements</li></a>
            <a href=""><li><span class="glyphicon glyphicon-tags"></span> Events</li></a>
            <a href=""><li><span class="glyphicon glyphicon-tag"></span> Organizations</li></a>
            <a href=""><li><span class="glyphicon glyphicon-cog"></span> Settings</li></a>
        </ul>

        <ul class="list-unstyled" style="margin-top: 50px">
            <a href=""><li><span class="glyphicon glyphicon-envelope"></span> Messages</li></a>
            <a href=""><li><span class="glyphicon glyphicon-tags"></span> Reports</li></a>
            <a href=""><li><span class="glyphicon glyphicon-list-alt"></span> Election</li></a>
            <a href=""><li><span class="glyphicon glyphicon-scissors"></span> CMS</li></a>
            <a href=""><li><span class="glyphicon glyphicon-off"></span> Logout</li></a>
        </ul>
    </nav>
    <div class="right">
        <div class="col-md-12" style="height: 100%; overflow: auto">
            @yield('content')
        </div>

        <!-- <footer class="col-md-12 text-center" style="bottom:0; margin-top: -20px">
            <small><span class="glyphicon glyphicon-copyright-mark"></span> COSBR, 2017</small>
        </footer> -->
    </div>
</div>
@endsection
</html>
