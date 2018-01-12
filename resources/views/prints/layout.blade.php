<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cosbis') }}</title>
    @yield('css')
</head>
<style>
    @page {
        margin: 0.90in;
    }

    html {
        margin: 0.90in;
        font-family: "Times New Roman";
    }

    .logo {
        width: 100px;
        height: 100px;
    }

    .noBorder td, .tableDiv table {
        border: 0px;
        font-size: 15px;
    }

    .calibri {
        font-family: arial;
        padding: 0;
        margin: 0;
    }

    table {
        width: 100%;
    }

    table, td, th {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        font-family: "Times New Roman" !important;
        padding: 2px;
        text-align: left;
        font-size: 13px;
    }

    th {
        text-align: center;
    }

    td {
        text-indent: 3px;
    }

    .margin-top {
        margin-top: 0px;
    }
</style>
<body>
<div class="col-md-12 noPadding noMargin" style="background-color: white">
    <div class="col-md-12 noPadding noMargin">
        <div class="col-md-12 noPadding noMargin text-center">
            <div class="col-xs-1 noMargin noPadding" style="margin-left: 120px">
                <img class="logo" src="{{asset('img/cosbis/cosbr-logo.png')}}">
            </div>
            <div class="col-md-6 noMargin noPadding calibri" style="padding-top: 10px">
                <h4 class="noPadding noMargin"><b>COLLEGE OF SAN BENILDO-RIZAL</b></h4>
                <h6 class="noMargin noPadding"><b>COLLEGE DEPARTMENT</b></h6>
                <p class="noPadding noMargin">Sumulong Highway, Antipolo City</p>
                @if(now()->month <= 6)
                    <p class="noPadding noMargin">School
                        Year {{Carbon\Carbon::now()->addYear('-1')->year.'-'.Carbon\Carbon::now()->year}}</p>
                @else
                    <p class="noPadding noMargin">School
                        Year {{Carbon\Carbon::now()->year.'-'.Carbon\Carbon::now()->addYear('1')->year}}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12" style="border-top: 3px double black; margin-top: 20px;">
    </div>
    <div class="col-md-12 noPadding" style="padding-top: 20px">
        @yield('content')
    </div>
</div>
</body>
</html>
