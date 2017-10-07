@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentIndex.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection
@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <form action="/accounts/create" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-12 noPadding bg-white">
                <div class="col-md-12 header noPadding">
                    <div class="col-md-12 text-center readjustOrientation" style=" overflow: hidden">
                        <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4">
                            <img id="imgEl" src="{{asset('img/account_img/default.png')}}" class="img-responsive center-block img-circle" style="margin: 5px;" alt="">
                        </div>
                    </div>

                    <div class="col-md-12 text-center changePhoto noPadding readjustOrientation" style="height: 60px; padding: 0">
                        <label for="img" class="text-center" style="margin-top: 15px">
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
                        <h2><b>Create Account</b></h2>
                        <hr>
                        <div class="col-md-12 noPadding textLeftOnXs">
                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Student ID: </b></h5>
                                <div class="form-group col-md-9 noPadding" style="border-bottom: 2px solid green;">
                                    <input type="text" name="student_number" class="form-control" required placeholder="Student ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>First Name: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" name="firstname" required placeholder="First Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Last Name: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" name="lastname" required placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Phone: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" name="phone" required placeholder="09xxxxxxxxx">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Email: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <input type="text" class="form-control" required name="email" placeholder="example@gmail.com">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="col-md-3 text-right "><b>Role: </b></h5>
                                <div class="form-group col-md-9 noPadding">
                                    <select name="role" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                            <button type="submit" class="btn buttons btn-success">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
