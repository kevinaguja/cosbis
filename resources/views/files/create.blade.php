@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/files.css')}}">
    <style>
        @import url("//unpkg.com/element-ui@2.0.11/lib/theme-chalk/index.css");

        .el-icon-close{
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-12 noPadding">
        <div class="col-md-12 col-xs-12 col-sm-12 noPadding noMargin">
            <div class="col-md-12 bg-white roundedCorners">
                <div class="container" style="border: none; height: 100%; max-width: 100%">
                    <div class="col-md-12 jumbotron text-center" id="app">
                        <h3 style="color: green"><b>Student Council Portal <br> File Archives</b></h3>
                        <form action="/files/create" method="POST" enctype="multipart/form-data"
                              class="container" style="border:none; height: auto; max-width: 100%;">
                            {{csrf_field()}}

                            <el-upload class="upload-demo" :on-change="clearFiles" drag action="/files/create"
                                       list-type="picture" name="files[]" :auto-upload="false" multiple id="files">
                                <i class="el-icon-upload"></i>
                                <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
                                <div class="el-upload__tip" slot="tip">Files uploads are limited to 10MB</div>
                            </el-upload>

                            <label for="" class="text-left col-md-6 col-md-offset-3 col-sm-12 col-xs-12 noPadding" style="margin-top: 15px">
                                <span class="glyphicon glyphicon-lock"></span> Set File Visibility:
                            </label>

                            <div class="col-md-12 noPadding">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 noPadding">
                                    <select class="form-control" name="visibility">
                                        <option value="3">Open for everyone</option>
                                        <option value="1">Personal File/s</option>
                                        <option value="2">Student Council File/s</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success col-md-offset-3 col-md-6 col-sm-12 col-xs-12" style="margin-top: 15px"><span class="glyphicon glyphicon-upload"></span> Upload Files</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var Main = {
            methods: {
                clearFiles: function () {
                    $('.el-upload-list__item').fadeOut();
                    var file= $('input[type="file"]')[0];
                    var FileSize = file.files[0].size / 1024 / 1024; // in MB
                    if (FileSize > 10) {
                        setTimeout(function(){
                            file.value = '';
                            $('.el-upload-list__item').fadeOut();
                        }, 200);
                    } else {

                    }
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
