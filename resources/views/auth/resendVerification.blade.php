@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('content')
    <div class="container authDiv">
        <div class="row">
            <div class="container">
                <div class="panel panel-default col-md-6 col-md-offset-3">
                    <div class="panel-body">
                        <div class="col-md-12 authBanner">
                            <img src="{{asset('/img/cosbis/authImg.jpg')}}" style="width: 100%">
                        </div>
                    </div>
                    <div class="panel-body text-center" style="padding-bottom: 25px">
                        <hr style="width: 50%">
                        <h3>Please verify your account</h3>
                        <form action="/verify" method="POST">
                            {{csrf_field()}}

                            <button type="submit" class="btn btn-success">Resend Verification Email</button>
                        </form>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                    class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
