@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection

@section('content')
    <div class="container authDiv passwordReset">
        <div class="row">
            <div class="container">
                <div class="panel panel-default col-md-4 col-md-offset-4">
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissable text-center noMargin">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {!! Session::get('success') !!}</div>
                        @endif
                        @if (Session::has('failure'))
                            <div class="alert alert-danger alert-dismissable text-center noMargin">
                                <a href="#" class="close" data-dismiss="alert"
                                   aria-label="close">&times;</a>{!! Session::get('failure') !!}</div>
                        @endif
                        <div class="panel-heading text-center">
                            <h5><b>Change Password</b></h5>
                            <small><b>Regularly update your password, <br>please provide your current password.</b>
                            </small>
                        </div>
                        <form class="form-horizontal" method="POST" action="/profile/password"
                              style="padding: 0px 45px">
                            {{ csrf_field() }}
                            {!! method_field('PATCH') !!}
                            <div class="form-group{{ $errors->has('password_old') ? ' has-error' : '' }} noMargin">
                                <label for="password_old" class="control-label">Current Password</label>

                                <input id="password_old" type="password" class="form-control" name="password_old"
                                       required>

                                @if ($errors->has('password_old'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password_old') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} noMargin">
                                <label for="password" class=" control-label">New Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} noMargin">
                                <label for="password-confirm" class="control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group" style="margin-top: 15px">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success form-control">Change Password</button>
                                    <a href="/profile" class="btn btn-danger form-control" style="margin-top: 10px">Go Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
