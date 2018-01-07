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
                            <img id="imgEl" src="{{asset(auth()->user()->img)}}" class="img-circle pull-right" style="margin: 5px; width: 100%; max-width: 170px" alt="image">
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
                                            <input type="hidden" value="{{auth()->user()->id}}" name="id">

                                            <div class="col-md-12 noPadding textLeftOnXs">
                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding "><b>Student ID: </b></h5>
                                                    <div class="form-group col-md-9 noPadding" style="border-bottom: 2px solid green;">
                                                        <input class="form-control" disabled required
                                                               value="{{ucwords(strtolower(auth()->user()->student_number))}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding "><b>First Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="firstname" required
                                                               value="{{ucwords(strtolower(auth()->user()->firstname))}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding    "><b>Last Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="lastname" required
                                                               value="{{ucwords(strtolower(auth()->user()->lastname))}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding "><b>Phone: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="phone" required
                                                               value="{{auth()->user()->phone}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Email: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" required name="email" value="{{auth()->user()->email}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Birthday: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="date" class="form-control" required name="birthdate" value="{{auth()->user()->birthdate}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Address: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <textarea style="resize:none;" class="form-control" required name="address" rows="4">{{auth()->user()->address}}</textarea>
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
                                                    @if(auth()->user()->is_suspend==0)
                                                        <h5>Active Account</h5>
                                                    @else
                                                        <h5>Account Suspended</h5>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePassword">Change Password</a>
                                    </h4>
                                </div>
                                <div id="collapsePassword" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="col-md-12 form-group">
                                                <button class="btn btn-info form-control noStyleOnHover"><a href="/profile/password" class="col-md-10 col-md-offset-1 noStyleOnHover" style="color: white">
                                                    Change Password</a></button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-3" style="padding-bottom: 20px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" style="width: 100%"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

