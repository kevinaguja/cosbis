@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/election/candidate.css')}}">
@endsection

@section('content')
    <div class="col-md-12" style="border:none;">
        <form action="/election/candidates/{{$candidate->id}}/edit" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            {!! method_field('PATCH') !!}

            <div class="col-md-12 noPadding" id="app">
                <div class="col-md-12 text-center header noPadding img-responsive" style="background-color: #555">
                    <img id="imgBanner" :src="parties[banner-1].banner" alt="party banner"
                         style="width: 100%; max-width: 1200px">
                </div>
                <div class="container noPadding" style="border: none">
                    <div class="col-md-12" style="margin-top: 2em; max-width: 100%;">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#collapseBasic" data-parent="#accordion" data-toggle="collapse"><b>Candidate
                                                Information</b></a>
                                    </h4>
                                </div>
                                <div id="collapseBasic" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-md-8 col-md-offset-2">
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
                                            <div class="col-md-12 noPadding textLeftOnXs">
                                                <div class="form-group">
                                                    <h5 class="col-md-3 noPadding"><b>Name: </b></h5>
                                                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} col-md-9 noPadding">
                                                        <select class="form-control" name="user_id" required>
                                                            <option value="{{$candidate->user->id}}"
                                                                    selected>{{$candidate->user->lastname.', '.$candidate->user->firstname}}</option>
                                                            @foreach($candidates as $candidate_option)
                                                                @if($candidate_option->id===$candidate->user_id)
                                                                    <option value="{{$candidate_option->id}}">{{$candidate_option->lastname.', '.$candidate_option->firstname}}</option>
                                                                @else
                                                                    <option value="{{$candidate_option->id}}">{{$candidate_option->lastname.', '.$candidate_option->firstname}}</option>
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
                                                            <option selected disabled hidden>Choose Position...</option>
                                                            @foreach($positions as $position)
                                                                @if($position->id === $candidate->position_id)
                                                                    <option selected
                                                                            value="{{$position->id}}">{{$position->name}}</option>
                                                                @else
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
                                                        <select class="form-control" name="party_id"
                                                                value="{{ old('party_id') }}" required v-model="banner">
                                                            <option selected disabled hidden>Choose Party...</option>
                                                            @foreach($parties as $party)
                                                                @if($party->id == $candidate->party)
                                                                    <option selected
                                                                            value="{{$party->id}}">{{$party->name}}</option>
                                                                @else
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
                                                        <textarea rows="5" class="form-control" name="slogan"
                                                                  placeholder="Slogan . . .">{{ $candidate->slogan }}</textarea>
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
                                                        <textarea rows="5" class="form-control" name="statement"
                                                                  placeholder="Statement . . .">{{ $candidate->statement }}</textarea>
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
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapsePhoto"><b>Party
                                                Photo</b></a>
                                    </h4>
                                </div>
                                <div id="collapsePhoto" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-md-4 col-md-offset-4">
                                                <img :src="parties[banner-1].logo" alt="Candidate Photo"
                                                     name="imgCandidate"
                                                     id="imgCandidate" class="img-responsive candidateBorder"
                                                     style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#deleteCandidate"><b>Remove Candidate</b></a>
                                    </h4>
                                </div>
                                <div id="deleteCandidate" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            <div class="col-md-4 col-md-offset-4">
                                                <el-button type="text" @click="deleteModal" style="color: red">Delete Candidate</el-button>
                                            </div>
                                        </div>
                                    </div>
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

        <form action="/election/candidates/{{$candidate->user_id}}/delete" method="post" id="deleteForm">
            {{csrf_field()}}
            {!! method_field('delete') !!}

        </form>
    </div>
    <script>
        var parties = {!! json_encode($parties) !!};
        var candidate = {!! json_encode($candidate) !!}
        var Main = {
            data() {
                return {
                    parties: parties,
                    banner: candidate.party
                }
            },
            methods: {
                deleteModal() {
                    this.$confirm('This will permanently delete the candidate. Continue?', 'Warning', {
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