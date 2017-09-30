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
        <div class="col-md-12 noPadding bg-white">
            <div class="col-md-12 header noPadding">
                <div class="col-md-12 text-center readjustOrientation" style=" overflow: hidden">
                    <div class="col-md-2 col-md-offset-5">
                        <img id="imgEl" src="{{asset(auth()->user()->img)}}" class="img-responsive center-block img-circle" style="margin: 5px;" alt="">
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
                    <h2><b>Edit Profile Information</b></h2>
                    <hr>
                    <div class="col-md-12 noPadding textLeftOnXs">
                        <div class="form-group">
                            <h5 class="col-md-3 text-right "><b>Student ID: </b></h5>
                            <div class="form-group col-md-9 noPadding" style="border-bottom: 2px solid green;">
                                <input class="form-control" disabled
                                       value="{{ucwords(strtolower(auth()->user()->student_number))}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <h5 class="col-md-3 text-right "><b>First Name: </b></h5>
                            <div class="form-group col-md-9 noPadding">
                                <input type="text" class="form-control"
                                       value="{{ucwords(strtolower(auth()->user()->firstname))}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <h5 class="col-md-3 text-right "><b>Last Name: </b></h5>
                            <div class="form-group col-md-9 noPadding">
                                <input type="text" class="form-control"
                                       value="{{ucwords(strtolower(auth()->user()->lastname))}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <h5 class="col-md-3 text-right "><b>Phone: </b></h5>
                            <div class="form-group col-md-9 noPadding">
                                <input type="text" class="form-control"
                                       value="{{ucwords(strtolower(auth()->user()->phone))}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <h5 class="col-md-3 text-right "><b>Email: </b></h5>
                            <div class="form-group col-md-9 noPadding">
                                <input type="text" class="form-control" value="{{auth()->user()->email}}">
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <a href="#" type="button" class="btn buttons btn-info">Change Password</a>
                            <a type="submit" class="btn buttons btn-success">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
