@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/election/party.css')}}">
@endsection

@section('content')
    <div class="container" style="border:none;">
        <form action="/election/parties/create" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-12 noPadding" >
                <div class="col-md-12 header noPadding img-responsive" >
                    <img id="imgBanner" name="banner" src="{{asset('img/cosbis/header.png')}}" alt="party banner" class="img-responsive">
                </div>
                <div class="col-md-12" style="padding-top: 10px; background-color: white; padding-bottom: 20px">
                    <div class="col-md-12">
                        <div class="col-md-7">
                            <h1><b>Register New Party</b></h1>
                            <hr>
                            <div class="col-md-12 noPadding text-center">

                                <div class="form-group">
                                    <h5 class="col-md-3"><b>Party Name: </b></h5>
                                    <div class="form-group col-md-9 noPadding">
                                        <input type="text" class="form-control" name="name" required placeholder="Party Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 class="col-md-3"><b>Slogan: </b></h5>
                                    <div class="form-group col-md-9 noPadding">
                                        <input type="text" class="form-control" name="slogan" required placeholder="Slogan">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 class="col-md-3 "><b>Description: </b></h5>
                                    <div class="form-group col-md-9 noPadding">
                                        <textarea  class="form-control" name="description" rows="6" required placeholder="Description" style="resize: none"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="col-md-4 col-md-push-3" style="padding-top: 20px">
                                        <label class="uploadLogo text-center"> UPLOAD LOGO
                                            <input type="file" accept="image/jpeg, image/png" name="logo" id="logo" style="visibility: hidden">
                                        </label>
                                        <script>
                                            $('#logo').on('change', function () {
                                                var reader = new FileReader();

                                                $(reader).on("load", function () {
                                                    $('#imgLogo').attr('src', this.result);
                                                });

                                                reader.readAsDataURL(this.files[0]);
                                            });
                                        </script>
                                    </div>

                                    <div class="col-md-4 col-md-push-4" style="padding-top: 20px">
                                        <label class="uploadBanner text-center"> UPLOAD BANNER
                                            <input type="file" accept="image/jpeg, image/png" name="banner" id="banner" style="visibility: hidden">
                                            <script>
                                                $('#banner').on('change', function () {
                                                    var reader = new FileReader();

                                                    $(reader).on("load", function () {
                                                        $('#imgBanner').attr('src', this.result);
                                                    });

                                                    reader.readAsDataURL(this.files[0]);
                                                });
                                            </script>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="col-md-8 col-md-offset-2 text-center">
                                <img src="{{asset('img/election/party/logo.png')}}" class="img-responsive" id="imgLogo"  alt="Party Logo">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="padding-top: 50px">
                        <div class="col-md-4 col-md-offset-4 form-group">
                            <button class="form-control btn btn-success">Create Party</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection