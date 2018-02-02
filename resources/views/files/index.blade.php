@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/files.css')}}">
@endsection

@section('content')
    <div class="col-md-12 noPadding">
        <div class="col-md-12 col-xs-12 col-sm-12 noPadding noMargin">
            @if(auth()->user()->is_superadmin())
                <div class="col-md-12 bg-white padding-25 roundedCorners">
                    <div class="container" style="border: none; max-width: 100%; height: auto">
                        <div class="col-md-12 noPadding">
                            <h3 class="pull-left"><b>COSBR File Archives </b><small>- All Files</small></h3>
                            <div class="col-md-5 noPadding pull-right">
                                <form action="/files">
                                    <div class="col-md-12 noPadding">
                                        <div class="col-md-6 noPadding paddingRightOnMd">
                                            <select name="" id="" class="form-control navbar-text">
                                                <option value="">All Files</option>
                                                <option value="">Student Council Files</option>
                                                <option value="">Student Only Files</option>
                                                <option value="">My Files</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 noPadding paddingLeftOnMd">
                                            <input type="text" class="form-control navbar-text" name="search" placeholder="Search files...">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="border-top: 3px solid green; padding-top: 30px">
                            <ol>
                                @foreach($files as $file)
                                    <li class="col-md-12" style="font-weight: bold">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <div class="col-md-6 filePreviewImg text-right centerOnSm">
                                                    <span class="glyphicon glyphicon-file" style="font-size: 8em; color: darkgrey; text-shadow: 1px 1px 5px black"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right centerOnSm" style="border-right: 2px solid grey">
                                                <span class="glyphicon glyphicon-download" class="col-md-12"> {{explode('/', $file->name)[1]}}</span>
                                                <label for="" class="col-md-12 noPadding">by: Mr. Louie Reyes <small>on Jan 1, 2018</small></label>
                                            </div>
                                            <div class="col-md-6 text-left centerOnSm toolTips">
                                                <span class="glyphicon glyphicon-eye-open" style="color: blue; margin-right: 1em"> View</span>
                                                <span class="glyphicon glyphicon-remove" style="color: red; margin-right: 1em"> Remove</span>
                                                <span class="glyphicon glyphicon-download-alt" style="color: green"> Download</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                {{$files->links()}}
                            </ol>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
