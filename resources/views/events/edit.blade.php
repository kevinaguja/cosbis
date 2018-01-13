@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/events.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
@endsection

@section('navigation')
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="margin-top: 10px">
        <div class="col-md-12 col-sm-12 col-xs-12 noPadding bg-white">
            <div class="col-md-12 noPadding" id="app" style="padding-bottom: 25px;">
                <div class="col-md-12 noPadding noMargin suggestionForm" id="suggestionForm" style="display: block">
                    <img src="{{asset($event->img)}}" alt="" style="max-width: 1920px; max-height: 1000px; width: 100%"
                         id="imgBanner">
                    <form action="/events/{{$event->id}}/edit" method="POST" enctype="multipart/form-data"
                          class="container" style="border:none; height: auto; max-width: 100%">
                        {{csrf_field()}}
                        {!! method_field('PATCH') !!}

                        <div class="col-md-12">
                            @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
                                <div class="col-md-12 noPadding" style="margin-top: 10px">
                                    <div class="col-md-3 col-md-offset-9 noPadding">
                                        <select name="organization" id="organization"
                                                class="form-control">
                                            <option value="0" selected>None</option>
                                            @foreach($organizations as $organization)
                                                @if($organization->id==$event->organization_id)
                                                    <option selected value="{{$organization->id}}">{{$organization->id}}
                                                        . {{$organization->description}}</option>
                                                @else

                                                    <option value="{{$organization->id}}">{{$organization->id}}
                                                        . {{$organization->description}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <br>
                                <label for="title">Title</label>
                                <input class="form-control" type="text" name="title" id="title"
                                       placeholder="Title..." value="{{$event->title}}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                                                <strong>{{ $errors->first('title') }}</strong>
                                                            </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                <label for="title">Venue</label>
                                <input class="form-control" type="location" name="location"
                                       id="location" placeholder="location..."
                                       value="{{$event->location}}">
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                                                <strong>{{ $errors->first('location') }}</strong>
                                                            </span>
                                @endif
                            </div>

                            <div class="form-group col-md-12 content-2-div">
                                <div class="col-md-6 form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type">Type</label>
                                    <input class="form-control" type="text" name="type"
                                           id="type" placeholder="Type..."
                                           value="{{$event->type}}">
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                                                    <strong>{{ $errors->first('type') }}</strong>
                                                                </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('theme') ? ' has-error' : '' }}">
                                    <label for="theme">Theme</label>
                                    <input class="form-control" type="text" name="theme"
                                           id="theme"
                                           placeholder="Theme..." value="{{$event->theme}}">
                                    @if ($errors->has('theme'))
                                        <span class="help-block">
                                                                    <strong>{{ $errors->first('theme') }}</strong>
                                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }} col-md-12 content-2-div">
                                <div class="col-md-6 form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    <label for="theme">Date</label>
                                    <input class="form-control" type="date" name="date"
                                           value="{{$event->date->format('Y-m-d')}}" id="date">

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                                                <strong>{{ $errors->first('date') }}</strong>
                                                            </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                                    <label for="theme">Time</label>
                                    <input type="hidden" v-model="value1" name="time">
                                    <el-time-select v-model="value1" style="width:100%"
                                                    name="time" :picker-options="{
                                                                                start: '08:00',
                                                                                step: '00:15',
                                                                                end: '18:30'
                                                                              }" placeholder="Select time">
                                    </el-time-select>

                                    @if ($errors->has('time'))
                                        <span class="help-block">
                                                                    <strong>{{ $errors->first('time') }}</strong>
                                                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Description</label>
                                <textarea class="form-control" type="text" name="description"
                                          id="description"
                                          placeholder="description..." rows="8"
                                          style="resize: none">{{$event->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                @endif
                            </div>

                            <label for="img" class="text-center" id="imgLabel"
                                   style="width: 100%">UPLOAD PHOTO<br>
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
                    value1: {!! json_encode($event->time) !!}
                };
            },
            mounted: function () {
                //set default date
                $('#img').on('change', function () {
                    var input = this;
                    var url = $(this).val();
                    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                    if (input.files && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {

                        console.log(input.files[0]);
                        var reader = new FileReader();

                        $(reader).on("load", function (e) {
                            $('#imgBanner').attr('src', e.target.result);
                        });

                        reader.readAsDataURL(input.files[0]);
                    }
                });
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')


    </script>
@endsection
