@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/studentIndex.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    <div class="container" style="border: none;">
        <form action="/accounts/{{$account->id}}/edit" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {!! method_field("PATCH") !!}
            <div class="col-md-12 noPadding bg-white">
                <div class="col-md-12 header noPadding">
                    <div class="col-md-12 text-center readjustOrientation" style=" overflow: hidden;">
                        <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4">
                            <img id="imgEl" src="{{asset($account->img)}}" class="img-responsive center-block img-circle" style="margin: 5px;" alt="">
                        </div>
                    </div>

                    <div class="col-md-12 text-center changePhoto noPadding readjustOrientation" style="height: 60px; padding: 0">
                        <label for="img" class="text-center" style="margin-top: 15px;">
                                <span>
                                    <img src="{{asset('img/cosbis/camera.png')}}" style="width: 27px">
                                </span>Change Profile Picture
                            <input type="file" style="display:none" name="img" id="img"
                                   accept="image/jpeg, image/png">
                        </label>
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
                <div class="col-md-11" style="padding-top: 10px">
                    <div class="col-md-8 col-md-offset-2">
                        <input type="hidden" value="{{$account->id}}" name="id">
                        <h2><b>Edit Profile Information</b></h2>
                        <hr>
                        <div class="col-md-12 noPadding textLeftOnXs">
                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Student ID: </b></h5>
                                <div class="form-group col-md-9 noPadding" style="border-bottom: 2px solid green;">
                                    <input class="form-control" disabled required
                                           value="{{ucwords(strtolower($account->student_number))}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>First Name: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" name="firstname" required
                                           value="{{ucwords(strtolower($account->firstname))}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Last Name: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" name="lastname" required
                                           value="{{ucwords(strtolower($account->lastname))}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Phone: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" name="phone" required
                                           value="{{$account->phone}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Email: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" required name="email" value="{{$account->email}}">
                                </div>
                            </div>

                            @if($account->role_id!=1)
                                <div class="form-group">
                                    <h5 class="col-md-3 text-right "><b>Role: </b></h5>
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
                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-3">
                        <div>
                            @if(count($errors))
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn buttons btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
