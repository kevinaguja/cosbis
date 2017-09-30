@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/events.css')}}">

@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <div class="col-md-12 noPadding bg-white">
            {{--<div class="col-md-12 dark-bottom-border">
                <div>
                    <h3><b>Suggest an Event - <small>We would like to hear from you. Suggest something fun, creative, and lasting.</small></b></h3>
                    <div class="green-bottom-border col-md-2 col-xs-3"></div>
                </div>
            </div>--}}

            <div class="col-md-12 noPadding" id="app" style="padding-bottom: 25px">
                <div class="col-md-12 suggestionFaq" id="suggestionFaq">
                    <div class="col-md-12 dark-bottom-border">
                        <h3><b>What you need to know</b></h3>
                        <div class="green-bottom-border col-md-2 col-xs-3"></div>
                    </div>
                    <div class="col-md-12 noPadding">
                        <ol class="panel-group list-unstyled" id="accordion">
                            <li class="panel panel-default" data-toggle="collapse" data-parent="#accordion"
                                href="#rule1">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a>
                                            We value every feedback we can get from the students</a>
                                    </h4>
                                </div>
                                <div id="rule1" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </div>
                                </div>
                            </li>
                            <li class="panel panel-default" data-toggle="collapse" data-parent="#accordion"
                                href="#rule2">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a>
                                            The student handbook is your friend</a>
                                    </h4>
                                </div>
                                <div id="rule2" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </div>
                                </div>
                            </li>
                            <li class="panel panel-default" data-toggle="collapse" data-parent="#accordion"
                                href="#rule3">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a>
                                            Be fun, be creative, be cool!</a>
                                    </h4>
                                </div>
                                <div id="rule3" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </div>
                                </div>
                            </li>
                        </ol>
                        </ol>
                    </div>
                    <button class="btn btn-success" @click="proceedToCreate()">Proceed</button>
                </div>
                <div class="col-md-12 noPadding noMargin suggestionForm" id="suggestionForm">
                    <img src="{{asset('img/events/default.jpg')}}" alt="" style="width:100%">
                    <form action="/events/create" method="POST" enctype="multipart/form-data" class="col-md-12">
                        {{csrf_field()}}

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <br>
                                <label for="title">Title</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="Title..." value="{{old('title')}}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                <label for="title">Venue</label>
                                <input class="form-control" type="location" name="location" id="location" placeholder="location..." value="{{old('location')}}">
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-12 content-2-div">
                                <div class="col-md-6 form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type">Type</label>
                                    <input class="form-control" type="text" name="type" id="type" placeholder="Type..." value="{{old('type')}}">
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('theme') ? ' has-error' : '' }}">
                                    <label for="theme">Theme</label>
                                    <input class="form-control" type="text" name="theme" id="theme"
                                           placeholder="Theme..." value="{{old('theme')}}">
                                    @if ($errors->has('theme'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('theme') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-12 content-2-div">
                                <div class="col-md-6 form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="theme">Date</label>
                                    <input class="form-control" type="date" name="date" id="date">
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                                    <label for="theme">Time</label>
                                    <input type="hidden" v-model="value1" name="time">
                                    <el-time-select v-model="value1" style="width:100%" name="time" :picker-options="{
                                        start: '08:00',
                                        step: '00:15',
                                        end: '18:30'
                                      }" placeholder="Select time">
                                    </el-time-select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Description</label>
                                <textarea class="form-control" type="text" name="description" id="description"
                                          placeholder="description..." rows="8" style="resize: none">{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="img" class="text-center" id="imgLabel" style="width: 100%">UPLOAD PHOTO<br>
                                <input type="file" style="display:none" name="img" id="img"
                                       accept="image/jpeg, image/png">
                                <small>Optional</small>
                            </label>

                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var Main = {
            data() {
                return {
                    value1: ''
                };
            },
            methods: {
                proceedToCreate: function(){
                    $('#suggestionFaq').fadeOut(function(){
                        $('#suggestionForm').fadeIn();
                    });
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
