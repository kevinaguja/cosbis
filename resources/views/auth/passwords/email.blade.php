@extends('layouts.master')

@section('content')
    <div class="container" style="margin-top: 50px; border-radius: 15px;">
        <div class="row">
            <div class="container">
                <div class="panel panel-default col-md-4 col-md-offset-4">
                    <div class="panel-body noPadding" style="padding-bottom: 30px">
                        <div class="panel-heading text-center">
                            <h4 style="letter-spacing: .1em; color: green;"><b>Reset Password</b></h4>
                            @if (session('status'))
                                <h5><small><b style="color: lawngreen">{{session('status')}}</b></small></h5>
                            @endif
                            <small><b>Enter your email address to receive a <br> password reset link</b></small>
                        </div>

                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" style="padding: 0px 45px">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12 noPadding noMargin">
                                    <label for="email" class="control-label">E-Mail Address</label>

                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 noPadding">
                                    <button style="background-color: green; color: white" type="submit" class="btn form-control">Send Password Reset Link</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection