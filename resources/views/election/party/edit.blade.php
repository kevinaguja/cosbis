@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/party.css')}}">
@endsection

@section('content')
    <div class="col-md-12" style="border:none;" id="app">
        <form action="/election/parties/{{$party->id}}/edit" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {!! method_field("PATCH") !!}
            <div class="container noPadding" style="max-width: 100%; border: none">
                <div class="col-md-12 header noPadding img-responsive text-center" style="background-color: #555">
                    <img id="imgBanner" name="banner" src="{{asset($party->banner)}}" alt="party banner"
                         style="width: auto; max-width: 100%; max-height: 800px">
                </div>
                <div class="col-md-12" style="padding-top: 10px; background-color: white; padding-bottom: 20px">
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
                            <h1><b>Edit Party</b></h1>
                            <hr>
                            <div class="col-md-12 noPadding text-center">

                                <div class="form-group col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <h5 class="col-md-3"><b>Party Name: </b></h5>
                                    <div class="form-group col-md-9 noPadding">
                                        <input type="text" class="form-control" name="slogan" required
                                               placeholder="Slogan" value="{{$party->name}}">
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
                                               placeholder="Slogan" value="{{$party->slogan}}">
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
                                                  placeholder="Description" style="resize: none"
                                        >{{$party->description}}</textarea>
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
                                <img src="{{asset($party->logo)}}" class="img-responsive" id="imgLogo" alt="Party Logo">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="padding-top: 50px">
                        <div class="col-md-4 form-group">
                            <button class="form-control btn btn-success">Update</button>
                        </div>
                        <div class="col-md-4">
                            <el-button type="text" @click="deleteModal" style="color: white" class="btn btn-danger form-control">Delete Candidate</el-button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="/election/parties/{{$party->id}}/delete" method="post" id="deleteForm">
            {{csrf_field()}}
            {!! method_field('delete') !!}
        </form>
    </div>

    <script>
        var Main = {
                methods: {
                    deleteModal() {
                        this.$confirm('Party will be deleted and all candidates will be reassigned to as Independent. Continue?', 'Warning', {
                            confirmButtonText: 'OK',
                            cancelButtonText: 'Cancel',
                            type: 'warning'
                        }).then(() => {
                            document.getElementById('deleteForm').submit();
                            this.$message({
                                type: 'success',
                                message: 'Delete completed'
                            });
                        }).catch(() => {
                            this.$message({
                                type: 'info',
                                message: 'Delete canceled'
                            });
                        });
                    }
                }
            };

        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection