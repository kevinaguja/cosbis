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

    <title>{{ config('app.name', 'COSBR') }}</title>
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

        @include('layouts.sideBar')

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
