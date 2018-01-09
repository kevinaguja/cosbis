@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/election/candidate.css')}}">
@endsection

@section('content')
    <div class="container" style="border:none;">
        <form action="/election/candidates/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-12 noPadding" >
                <div class="col-md-12 header noPadding img-responsive" >
                    <img id="imgBanner" name="banner" src="{{asset('img/cosbis/header.png')}}" alt="party banner" class="img-responsive">
                </div>
                <div class="container noPadding" style="border: none">
                    <div class="col-md-8 col-md-offset-2" style="margin-top: 2em">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseBasic" data-parent="#accordion" data-toggle="collapse">Candidate Information</a>
                                    </h4>
                                </div>
                                <div id="collapseBasic" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">

                                            <div class="col-md-12 noPadding textLeftOnXs">

                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Name: </b></h5>
                                                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} col-md-9 noPadding">
                                                        <select class="form-control" name="user_id" required>
                                                            @foreach($candidates as $candidate)
                                                                @if(strcmp(old('user_id'), $candidate->id)===0)
                                                                    <option value="{{$candidate->id}}" selected>{{$candidate->lastname.', '.$candidate->firstname}}</option>

                                                                @else
                                                                    <option selected disabled hidden>Choose Candidate...</option>
                                                                    <option value="{{$candidate->id}}">{{$candidate->lastname.', '.$candidate->firstname}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('user_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('user_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('position_id') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding "><b>Position: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <select class="form-control" name="position" required>
                                                            @foreach($positions as $position)
                                                                @if(strcmp(old('position'), $position->id)===0)
                                                                    <option selected value="{{$position->id}}">{{$position->name}}</option>
                                                                @else
                                                                    <option selected disabled hidden>Choose Position...</option>
                                                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('position_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('position_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('party_id') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding "><b>Party: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <select class="form-control" name="party_id" required>
                                                            @foreach($parties as $party)
                                                                @if(strcmp(old('party'), $party->id)===0)
                                                                    <option selected value="{{$party->id}}">{{$party->name}}</option>
                                                                @else
                                                                    <option selected disabled hidden>Choose Party...</option>
                                                                    <option value="{{$party->id}}">{{$party->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('party_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('party_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('slogan') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding "><b>Slogan: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <textarea rows="5" class="form-control" name="slogan" placeholder="Slogan . . .">{{ old('slogan') }}</textarea>
                                                        @if ($errors->has('slogan'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('slogan') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('statement') ? ' has-error' : '' }}">
                                                    <h5 class="col-md-3 noPadding "><b>Statement: </b></h5>
                                                    <div class="form-group col-md-9 noPadding">
                                                        <textarea rows="5" class="form-control" name="statement" placeholder="Statement . . .">{{ old('statement') }}</textarea>
                                                        @if ($errors->has('statement'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('statement') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhoto">Change Photo</a>
                                    </h4>
                                </div>
                                <div id="collapsePhoto" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="col-md-6">
                                                    <img src="{{asset('img/election/party/logo.png')}}" alt="Candidate Photo" name="imgCandidate"
                                                         id="imgCandidate" class="img-responsive candidateBorder">
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="padding-top: 30px">
                                                <div class="col-md-12">
                                                    <label class="btnUpload text-center">Upload Photo
                                                        <input type="file" name="img" id="img" accept="image/png, image/jpg" style="visibility: hidden">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $('#img').on('change', function () {
                                                var reader = new FileReader();

                                                $(reader).on("load", function () {
                                                    $('#imgCandidate').attr('src', this.result);
                                                });

                                                reader.readAsDataURL(this.files[0]);
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseStatus">Account Status</a>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-3" style="padding-bottom: 20px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success" style="width: 100%">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection