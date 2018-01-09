<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <base href="http://csbr.localhost.com">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    {{--<script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cosbis') }}</title>
    @yield('css')
</head>
<body class="noPadding noMargin" style="background-color: #eaecf3; background-image: url({{asset('/img/cosbis/loginbg.jpg')}}); background-size: cover">
<div class="container-fluid noPadding noMargin">
    <div class="container noPadding">
        @yield('navigation')
        @yield('content')
        @yield('js')
    </div>
</div>
</body>
</html>
