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
                            <img id="imgEl" src="{{asset($account->img)}}" class="img-circle pull-right" style="margin: 5px; width: 100%; max-width: 170px" alt="image">
                        </div>
                        <div class="col-md-6 col-sm-6 textCenterOnXs">
                            <div class="col-md-12" style="color: white">
                                <h3>{{$account->firstname.' '.$account->lastname}}</h3>
                                <p>{{$account->email}}</p>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px">
                                <form action="/accounts/{{$account->id}}/suspend"  method="post">
                                    {{ csrf_field() }}
                                    {!! method_field('PATCH') !!}
                                    <input type="hidden" value="{{$account->id}}" name="id">
                                    <div class="col-md-12">
                                        @if($account->is_suspended == 0)
                                            <input type="text" hidden value="1" name="is_suspended">
                                            <button type="submit" class="btn btn-suspend">Suspend Account</button>
                                        @else
                                            <input type="text" hidden value="0" name="is_suspended">
                                            <button type="submit" class="btn btn-success">Activate Account</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 bg-white" style="height: auto">
            <form action="/accounts/{{$account->id}}/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {!! method_field("PATCH") !!}

                <div class="container" style="border: none; height: auto; max-width: 100%">
                    <div class="col-md-12" style="margin-top: 2em">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseBasic" data-parent="#accordion" data-toggle="collapse">Basic Information</a>
                                    </h4>
                                </div>
                                <div id="collapseBasic" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">
                                            <input type="hidden" value="{{$account->id}}" name="id">

                                            <div class="col-md-12 noPadding textLeftOnXs">
                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding "><b>Student ID: </b></h5>
                                                    <div class="form-group col-md-9 noPadding" style="border-bottom: 2px solid green;">
                                                        <input class="form-control" disabled required
                                                               value="{{ucwords(strtolower($account->student_number))}}">
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding "><b>First Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="firstname" required
                                                               value="{{ucwords(strtolower($account->firstname))}}">

                                                        @if ($errors->has('firstname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('firstname') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding"><b>Last Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="lastname" required
                                                               value="{{ucwords(strtolower($account->lastname))}}">
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
                                                        <input type="text" class="form-control" name="phone" required
                                                               value="{{$account->phone}}">
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
                                                        <input type="text" class="form-control" required name="email" value="{{$account->email}}">
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
                                                        <input type="date" class="form-control" required name="birthdate" value="{{$account->birthdate}}">
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
                                                        <textarea style="resize:none;" class="form-control" required name="address" rows="4">{{$account->address}}</textarea>
                                                        @if ($errors->has('address'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($account->role_id!=1)
                                                    <div class="form-group">
                                                        <h5 class="col-md-3 noPadding "><b>Role: </b></h5>
                                                        <div class="form-group col-md-9 noPadding">
                                                            <select name="role" class="form-control">
                                                                @foreach($roles as $role)
                                                                    @if($role->id==$account->role_id)
                                                                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                                    @else
                                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhoto">Change Photo</a>
                                    </h4>
                                </div>
                                <div id="collapsePhoto" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-12 form-group">
                                            <input class="form-control" type="file" name="img" id="img" accept="image/png, image/jpg">
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseStatus">Account Status</a>
                                    </h4>
                                </div>
                                <div id="collapseStatus" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="col-md-12 form-group">
                                                <h5 class="col-md-3 noPadding "><b>Status: </b></h5>
                                                <div class="col-md-9 form-group noPadding">
                                                    @if($account->is_suspended==0)
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

                            @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#printAccount">Print Account</a>
                                        </h4>
                                    </div>
                                    <div id="printAccount" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="col-md-12 form-group">
                                                    <button class="btn btn-info form-control noStyleOnHover"><a
                                                                href="/print/accounts/{{$account->id}}"
                                                                class="col-md-10 col-md-offset-1 noStyleOnHover"
                                                                style="color: white">
                                                            Print Account</a></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 col-md-offset-3" style="padding-bottom: 20px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" style="width: 100%">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

