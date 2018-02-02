@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/studentIndex.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="border: none; margin-top: 10px">
        <div class="col-md-12 noPadding">
            <div class="col-md-12 header noPadding">
                <div class="col-md-12" style="margin-top: 0px; border:none;">
                    <div class="col-md-12">
                        <div class="col-md-6 col-sm-6 textCenterOnXs">
                            <img id="imgEl" src="{{asset(auth()->user()->img)}}" class="img-circle pull-right"
                                 style="margin: 5px; width: 100%; max-width: 170px" alt="image">
                        </div>
                        <div class="col-md-6 col-sm-6 textCenterOnXs">
                            <div class="col-md-12" style="color: white">
                                <h3>{{auth()->user()->firstname.' '.auth()->user()->lastname}}</h3>
                                <p>{{auth()->user()->email}}</p>
                                @switch(auth()->user()->role_id)
                                    @case(1)
                                    <p>OSA Head</p>
                                    @break
                                    @case(2)
                                    <p>Student Council Member</p>
                                    @break
                                    @case(3)
                                    <p>Student Account</p>
                                    @break
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 bg-white" style="height: auto">
            <form action="/profile/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {!! method_field("PATCH") !!}

                <div class="container" style="border: none; height: auto; max-width: 100%">
                    <div class="col-md-12" style="margin-top: 2em">

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('success')}}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('error')}}
                            </div>
                        @endif

                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseBasic" data-parent="#accordion" data-toggle="collapse">Basic
                                            Information</a>
                                    </h4>
                                </div>
                                <div id="collapseBasic" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">
                                            <input type="hidden" value="{{auth()->user()->id}}" name="id">

                                            <div class="col-md-12 noPadding textLeftOnXs">
                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding "><b>Student ID: </b></h5>
                                                    <div class="form-group col-md-9 noPadding"
                                                         style="border-bottom: 2px solid green;">
                                                        <input class="form-control" disabled required
                                                               value="{{ucwords(strtolower(auth()->user()->student_number))}}">
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding "><b>First Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="firstname"
                                                               value="{{ucwords(strtolower(auth()->user()->firstname))}}">

                                                        @if ($errors->has('firstname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('firstname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding    "><b>Last Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="lastname"
                                                               value="{{ucwords(strtolower(auth()->user()->lastname))}}">

                                                        @if ($errors->has('lastname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('lastname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding "><b>Phone: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="phone"
                                                               value="{{auth()->user()->phone}}">

                                                        @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding"><b>Email: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="email"
                                                               value="{{auth()->user()->email}}">

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding"><b>Birthday: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="date" class="form-control"
                                                               name="birthdate" value="{{auth()->user()->birthdate}}">

                                                        @if ($errors->has('birthdate'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('birthdate') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding"><b>Address: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <textarea style="resize:none;" class="form-control"
                                                                  name="address" rows="4"
                                                                  required>{{auth()->user()->address}}</textarea>
                                                        @if ($errors->has('address'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhoto">Change
                                            Photo</a>
                                    </h4>
                                </div>
                                <div id="collapsePhoto" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-12 form-group">
                                            <input class="form-control" type="file" name="img" id="img"
                                                   accept="image/png, image/jpg">
                                        </div>
                                        <script>
                                            $('#img').on('change', function () {
                                                var reader = new FileReader();

                                                $(reader).on("load", function () {
                                                    $('#imgEl').attr('src', this.result);
                                                });

                                                reader.readAsDataURL(this.files[0]);
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseStatus">Account
                                            Status</a>
                                    </h4>
                                </div>
                                <div id="collapseStatus" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="col-md-12 form-group">
                                                <h5 class="col-md-3 noPadding "><b>Status: </b></h5>
                                                <div class="col-md-9 form-group noPadding">
                                                    @if(auth()->user()->is_suspended==0)
                                                        <h5 style="color: green">Active Account</h5>
                                                    @else
                                                        <h5 style="color: red">Account Suspended</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePassword">Change
                                            Password</a>
                                    </h4>
                                </div>
                                <div id="collapsePassword" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="col-md-12 form-group">
                                                <button class="btn btn-info form-control noStyleOnHover"><a
                                                            href="/profile/password"
                                                            class="col-md-10 col-md-offset-1 noStyleOnHover"
                                                            style="color: white">
                                                        Change Password</a></button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-3" style="padding-bottom: 20px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" style="width: 100%"><span
                                            class="glyphicon glyphicon-pencil"></span> Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

