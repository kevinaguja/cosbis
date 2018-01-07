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
                                <div class="col-md-12">
                                    <div class="btn btn-suspend">Suspend Account</div>
                                </div>
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

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding "><b>First Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="firstname" required
                                                               value="{{ucwords(strtolower($account->firstname))}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding    "><b>Last Name: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="lastname" required
                                                               value="{{ucwords(strtolower($account->lastname))}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding "><b>Phone: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" name="phone" required
                                                               value="{{$account->phone}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Email: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="text" class="form-control" required name="email" value="{{$account->email}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Birthday: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <input type="date" class="form-control" required name="birthdate" value="{{$account->birthdate}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Address: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <textarea style="resize:none;" class="form-control" required name="address" rows="4">{{$account->address}}</textarea>
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
                                                    @if($account->is_suspend==0)
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

