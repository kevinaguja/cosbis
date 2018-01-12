@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/election/candidate.css')}}">
@endsection

@section('content')
    <div class="col-md-12 noPadding" id="app">
        <div class="col-md-12 noPadding">
            <div class="col-md-12 bg-white noPadding roundedCorners"
                 style="padding-bottom: 20px; padding-bottom: 0px;">
                <div class="container noPadding"
                     style="height: 100%; border:none; max-width: 100%; padding-bottom: 0px">
                    <div class="col-m12 noPadding text-center">
                        <img src="{{asset('img/cosbis/cosbr-logo.png')}}" alt="" style="max-width: 150px;">
                        <h3><b>Currently Displaying Details of the {{now()->year}} election</b></h3>
                    </div>
                    <hr>
                    <form action="/election" method="get">
                        <div class="col-md-3" style="padding: 10px">
                            <div class="form-group">
                                <select name="year" id="year" class="form-control">
                                    @for($year= 2018; $year <= now()->year; $year++)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-3" style="padding: 10px">
                        <div class="form-group ">
                            <button class="btn btn-success form-control">Search</button>
                        </div>
                    </div>

                    <div class="col-md-3 col-md-offset-3" style="padding: 10px">
                        <div class="form-group">
                            @if(empty($election_log) || $election_log->date_ended !=null)
                                <form action="/election/start" method="post">
                                    {{csrf_field()}}
                                    <button class="btn btn-success form-control"><span
                                                class="glyphicon glyphicon-folder-open" type="submit"></span> Start
                                        Election
                                    </button>
                                </form>
                            @else
                                <form action="/election/close" method="post">
                                    {{csrf_field()}}
                                    <button class="btn btn-warning form-control"><span
                                                class="glyphicon glyphicon-folder-close"
                                                type="submit"></span> Close
                                        Election
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 bg-white noPadding roundedCorners">
                <div class="container noPadding"
                     style="height: 100%; border:none; max-width: 100%; padding-bottom: 0px">
                    <button class="btn" style="background-color: transparent; border-bottom: 1px solid green"
                            onclick="window.location.href='/print/elections?year={{ app('request')->input('year') }}'">
                        Print Election Result
                    </button>
                    <button class="btn" style="background-color: transparent; border-bottom: 1px solid green"
                            onclick="window.location.href='/print/elections_summary?year={{ app('request')->input('year') }}'">
                        Print Election Summary
                    </button>
                    <hr>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h5><b>President</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 1)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5><b>VP of Operations</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 2)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5><b>VP of Activities</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 3)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5><b>VP of Academics</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 4)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5><b>VP of Finance</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 5)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-6">
                            <h5><b>Secretary</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 6)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($parties as $party)
                @if($party->id==1)
                    <div class="col-md-12 bg-white noPadding roundedCorners"
                         style="padding-bottom: 20px">
                        <div class="container noPadding" style="height: 100%; border:none; max-width: 100%">
                            <div class="col-md-12">
                                <h3><b>{{ucwords(strtolower($party->name))}}</b><span> <small> - <q>{{$party->slogan}}</q></small></span>
                                </h3>
                                <hr class="col-md-5" style="padding-top: 0; margin-top: 0; border-color: GREEN; ">
                            </div>

                            <div class="col-md-6" style="">
                                <div class="col-md-12">
                                    <img src="{{$party->banner}}" alt="Party Banner" style="width: 100%;"
                                         class="topLeft img-thumbnail">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    @foreach($candidates as $candidate)
                                        @if($party->id==$candidate->party)
                                            <h6 style="text-indent: 20px"><b>{{$candidate->position->name}}:</b>
                                                <span>{{$candidate->user->firstname.' '.$candidate->user->lastname}}</span>
                                                <a href="/election/candidates/{{$candidate->id}}/edit"><span
                                                            class="glyphicon glyphicon-pencil"></span></a>
                                            </h6>
                                        @endif
                                    @endforeach
                                    <h6 style="text-indent: 20px"><b>Description:</b>
                                        <span>{{$party->description}}</span>
                                    </h6>
                                    <h6 style="text-indent: 10px">
                                        <a href="/election/parties/{{$party->id}}/edit"><span
                                                    class="glyphicon glyphicon-pencil"></span> Edit Party</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 bg-white noPadding roundedCorners"
                         style="padding-bottom: 20px">
                        <div class="container noPadding" style="height: 100%; border:none; max-width: 100%">
                            <div class="col-md-12">
                                <h3><b>{{ucwords(strtolower($party->name))}}</b><span> <small> - <q>{{$party->slogan}}</q></small></span>
                                </h3>
                                <hr class="col-md-5" style="padding-top: 0; margin-top: 0; border-color: GREEN; ">
                            </div>

                            <div class="col-md-6 " style="">
                                <div class="col-md-12">
                                    <img src="{{$party->banner}}" alt="Party Banner" style="width: 100%;"
                                         class="topLeft img-thumbnail">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    @foreach($candidates as $candidate)
                                        @if($party->id==$candidate->party)
                                            <h6 style="text-indent: 20px"><b>{{$candidate->position->name}}:</b>
                                                <span>{{$candidate->user->firstname.' '.$candidate->user->lastname}}</span>
                                                <a href="/election/candidates/{{$candidate->id}}/edit"><span
                                                            class="glyphicon glyphicon-pencil"></span></a>
                                            </h6>
                                        @endif
                                    @endforeach
                                    <h6 style="text-indent: 20px"><b>Description:</b>
                                        <span>{{$party->description}}</span>
                                    </h6>
                                    @if($party->created_at->year == now()->year)
                                        <h6 style="text-indent: 10px">
                                            <a href="/election/parties/{{$party->id}}/edit"><span
                                                        class="glyphicon glyphicon-pencil"></span> Edit Party</a>
                                        </h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <style>@import url("//unpkg.com/element-ui@2.0.11/lib/theme-chalk/index.css");</style>

    <script>
        var status= {!! json_encode(session('success')) !!};
        var Main = {
            methods: {
                showOpenElection() {
                    this.$message({
                        message: 'The Election has been started!',
                        type: 'success'
                    });
                },

                showCloseElection() {
                    this.$message({
                        message: 'The Election has been ended!',
                        type: 'warning'
                    });
                },
            },
            mounted: function(){
                if(status==0)
                    this.showCloseElection();
                else if(status==1)
                    this.showOpenElection();
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection