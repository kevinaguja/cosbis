@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
@endsection

@section('content')
    <div class="container-fluid loginbg noPadding">
        <div class="container loginPage">
            <div class="col-md-6 jumbotron">
                <h1><b>Learn, Live, Evolve</b></h1>

                <p>A great mind once said, "Success only comes by persevering despite failure". Balance your <span
                            style="color: white">academic life</span> with <span
                            style="color: white">social growth</span>. Life is <span style="color: white">too short to waste</span> on one or the other.</p>
            </div>
            <div class="col-md-5">
                <div class="loginFormDiv">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="student_number" class="control-label">
                                <small>Student Number</small>
                            </label>

                            <input id="student_number" type="student_number" class="form-control" name="student_number"
                                   value="{{ old('student_number') }}" placeholder="eg. 2017-1232-2213" required
                                   autofocus>

                            @if ($errors->has('student_number'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('student_number') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">
                                <small>Password</small>
                            </label>

                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class=" btn-green form-control">
                                    Login
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2 text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    <small>Forgot Your Password?</small>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.loginFormDiv').fadeIn();
        });
    </script>
@endsection
