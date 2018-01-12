<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cosbis') }}</title>
    @yield('css')
</head>
<body class="noPadding noMargin" style="background-color: #eaecf3">
<div class="container-fluid noPadding noMargin">
    <style>
        .el-message-box__message {
            margin-left: 40px !important;
        }

        body, html, .container-fluid {
            height: 100%;
            width: 100%;
            font-family: 'Work Sans', Raleway, Arial;
        }

        .container {
            height: 200px;
            border: 1px solid;
        }

        .right {
            height: 100%;
            width: auto;
            background: #eaecf3;
            overflow: hidden;
            background-size: 100% auto;
        }

        .left {
            width: 250px;
            background: blue;
            float: left;
            padding-left: 10px;
            height: 100%;
        }

        .sidebar {
            padding-top: 50px;
            background-color: #234567;
            height: 100%;
            border: none !important;
            color: white;
            font-weight: 600;
            z-index: 999;
        }

        .sidebar a {
            color: white;
            transition: all .4s ease-in-out;
        }

        .sidebar a:hover {
            text-decoration: none;
            color: #4eabbf;
        }

        .sidebar li {
            padding-top: 15px;
            margin: 0;
        }

        #accordion {
            padding-top: 0px
        }

        #accordion ul {
            border-right: 5px solid #4eabbf;
        }

        #accordion ul a {
            display: block;
            padding-left: 2em;
        }

        @media (max-width: 768px) {
            .showOnXs {
                display: block !important;
                background-color: #234567;
            }

            .sidebar {
                width: 100%;
                height: 500px !important;
                margin-left: 0px !important;
                background-color: rgba(35, 69, 103, .8);
                position: absolute;
            }

            .right {
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

        <nav class="left sidebar collapse navbar-collapse" id="sideNav"
             style="overflow-y: auto !important; height: 100%; min-height: 100% !important;">
            <img src="{{auth()->user()->img}}" alt="Account Image" class="img-circle"
                 style="width: 50px; background-color: white; padding: 3px">
            <span>{{auth()->user()->firstname." ".auth()->user()->lastname}}</span>
            <ul class="list-unstyled">
                <a href="/profile">
                    <li><span class="glyphicon glyphicon-home"></span> Home</li>
                </a>
                @if((auth()->user()->is_admin() || auth()->user()->is_superadmin()))
                    <a data-toggle="collapse" data-parent="#accordion" href="#accountsCollapse">
                        <li><span class="glyphicon glyphicon-user"></span> Accounts
                            <small><span class="glyphicon glyphicon-arrow-up"></span><span
                                        class="glyphicon glyphicon-arrow-down"></span></small>
                        </li>
                    </a>
                    <li id="accordion">
                        <ul id="accountsCollapse"
                            class="list-unstyled panel-collapse collapse {{Request::is("accounts*") ? "in" :  ''}}">
                            <li><a href="/accounts">Accounts</a></li>
                            <li><a href="/accounts/create">Create Account</a></li>
                        </ul>
                    </li>
                @endif
                <a data-toggle="collapse" data-parent="#accordion" href="#eventsCollapse">
                    <li><span class="glyphicon glyphicon-tags"></span> Events
                        <small><span class="glyphicon glyphicon-arrow-up"></span><span
                                    class="glyphicon glyphicon-arrow-down"></span></small>
                    </li>
                </a>
                <li id="accordion">
                    <ul id="eventsCollapse"
                        class="list-unstyled panel-collapse collapse {{Request::is("events*") ? "in" :  ''}}">
                        <li><a href="/events">Official Events List</a></li>
                        <li><a href="/events/create">Create Event</a></li>
                    </ul>
                </li>
                <a href="/organizations">
                    <li><span class="glyphicon glyphicon-tag"></span> Organizations</li>
                </a>
                <a href="/files">
                    <li><span class="glyphicon glyphicon-file"></span> Files</li>
                </a>
                <a href="">
                    <li><span class="glyphicon glyphicon-cog"></span> Settings</li>
                </a>
            </ul>

            <ul class="list-unstyled" style="margin-top: 50px">
                @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
                    <a href="/reports">
                        <li><span class="glyphicon glyphicon-envelope"></span> Report</li>
                    </a>
                    <a href="/print">
                        <li><span class="glyphicon glyphicon-tags"></span> Print</li>
                </a>
                @endif
                @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
                    <a data-toggle="collapse" data-parent="#accordion" href="#electionCollapse">
                        <li><span class="glyphicon glyphicon-list-alt"></span> Election
                            <small><span class="glyphicon glyphicon-arrow-up"></span><span
                                        class="glyphicon glyphicon-arrow-down"></span></small>
                        </li>
                    </a>
                    <li id="accordion">
                        <ul id="electionCollapse"
                            class="list-unstyled panel-collapse collapse {{Request::is("election*") ? "in" :  ''}}">
                            <li><a href="/election">Home</a></li>
                            <li><a href="/election/candidates/create">Create candidate</a></li>
                            <li><a href="/election/parties/create">Create Party</a></li>
                            <li><a href="/election/results">Election Results</a></li>
                            <a href="/election/vote">
                                <li><span class="glyphicon glyphicon-tags"></span> Election</li>
                            </a>
                        </ul>
                    </li>
                @endif
                @if(auth()->user()->is_student())
                    <a href="/election/vote">
                        <li><span class="glyphicon glyphicon-tags"></span> Election</li>
                    </a>
                @endif
                @if((auth()->user()->is_admin() || auth()->user()->is_superadmin()))
                    <a href="">
                        <li><span class="glyphicon glyphicon-scissors"></span> CMS</li>
                    </a>
                @endif
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <li><span class="glyphicon glyphicon-off"></span> Logout</li>
                </a>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">{{ csrf_field() }}</form>
        </nav>
        <script>
            var Main = {}
        </script>

        <div class="right">
            <div class="col-md-12" style="height: 100%; overflow: auto;">
                <div class="col-md-12 bg-white" style="padding: 15px" id="crumbs">
                    <el-breadcrumb separator-class="el-icon-arrow-right">
                        <span class="pull-left"><a href="/profile" style="color: black"><span
                                        class="glyphicon glyphicon-home"></span> Home</a></span>
                        @php $count= 0; @endphp
                        @foreach(explode('/',\Request::getRequestUri()) as $url_string)
                            @php $path= ''; @endphp
                            @for($index=0; $index<$count; $index++)
                                @if(!(strcmp(explode('/', \Request::getRequestUri())[$count], '')==0))
                                    @php $path.= '/'.explode('/',\Request::getRequestUri())[$index+1]; @endphp
                                @endif
                            @endfor
                            <el-breadcrumb-item><a href="{{env('APP_URL')}}{{$path}}"
                                                   style="color: black !important; font-weight: bold !important; font-size: 14px!important;">{{ucfirst(explode('?',explode('/',\Request::getRequestUri())[$index])[0])}}</a>
                            </el-breadcrumb-item>
                            @php $count++; @endphp
                        @endforeach
                    </el-breadcrumb>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        new Vue().$mount('#crumbs')
    </script>
</body>
</html>
