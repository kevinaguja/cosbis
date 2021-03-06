@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/party.css')}}">
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="border:none; max-width: 100%;">
        <form action="/election/parties/create" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-12 noPadding" style="max-width: 100%; border: none">
                <div class="col-md-12 header noPadding img-responsive text-center" style="background-color: #555">
                    <img id="imgBanner" name="banner" src="{{asset('img/elections/parties/banners/default.png')}}"
                         alt="party banner" style="width: auto; max-height: 600px; max-width: 100%;">
                </div>
                <div class="container bg-white" style="border: none; height: 100%; max-width: 100%;padding-top: 10px; background-color: white; padding-bottom: 20px">
                    <div class="col-md-12">
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert"
                                   aria-label="close">&times;</a>
                                {{session('error')}}
                            </div>
                        @endif

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert"
                                   aria-label="close">&times;</a>
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="col-md-7">
                            <h1><b>Register New Party</b></h1>
                            <hr>
                            <div class="col-md-12 noPadding text-center">
                                <div class="form-group col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <h5 class="col-md-3"><b>Party Name: </b></h5>
                                    <div class="form-group col-md-9 noPadding">
                                        <input type="text" class="form-control" name="name" required
                                               placeholder="Slogan" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12{{ $errors->has('slogan') ? ' has-error' : '' }}">
                                    <h5 class="col-md-3"><b>Slogan: </b></h5>
                                    <div class="form-group col-md-9 noPadding">
                                        <input type="text" class="form-control" name="slogan" required
                                               placeholder="Slogan" value="{{old('slogan')}}">
                                        @if ($errors->has('slogan'))
                                            <span class="help-block">
                                                                <strong>{{ $errors->first('slogan') }}</strong>
                                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <h5 class="col-md-3" style="word-break: break-all"><b>Description: </b></h5>
                                    <div class="form-group col-md-9 noPadding">
                                        <textarea class="form-control" name="description" rows="6" required
                                                  placeholder="Description"
                                                  style="resize: none">{{old('description')}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="col-md-4 col-md-push-3" style="padding-top: 20px">
                                        <label class="uploadLogo text-center"> UPLOAD LOGO
                                            <input type="file" accept="image/jpeg, image/png" name="logo" id="logo"
                                                   style="visibility: hidden">
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
                                            <input type="file" accept="image/jpeg, image/png" name="banner" id="banner"
                                                   style="visibility: hidden">
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
                                <img src="{{asset('img/elections/parties/logos/default.png')}}" class="img-responsive"
                                     id="imgLogo" alt="Party Logo">
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