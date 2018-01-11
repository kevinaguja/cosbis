@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
    <link rel="stylesheet" href="{{asset('css/events.css')}}">
@endsection

@section('navigation')
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="margin-top: 10px" id="app">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" style="color: red"><b>Report User!</b></h3>
                    </div>
                    <form action="/messages" method="POST">
                        {{csrf_field()}}

                        <input type="hidden" name="reported_user_id" :value="user_id">
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <input type="hidden" name="type" value="user">
                        <div class="modal-body">
                            <label for="">Tell us more on how we can help on improving your experience with the
                                site.</label>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Tell us more"
                                      class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 eventDetails noPadding">
            <div class="col-md-12 noPadding noMargin eventBannerDiv">
                <img src="{{$event->img}}" alt="" style="width:100%;">
            </div>
            <div class="container"
                 style="padding-left: 0px; padding-right: 0px; height: auto; border: none; max-width: 100%    ">
                <div class="col-md-12 noMargin bg-white roundedCorners">
                    <h3>
                        @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
                            <div class="pull-right">
                                <span><span class="glyphicon glyphicon-thumbs-up"
                                            style="color: green"></span> {{$event->huzzahs->count()}}</span>
                                <span><span class="glyphicon glyphicon-thumbs-down"
                                            style="color: red"></span> {{$event->boos->count()}}</span>
                            </div>
                        @endif
                        <p><b>{{$event->title}}
                                <small style="color:red">({{Carbon\Carbon::parse($event->date)->diffForHumans()}})
                                </small>
                            </b></p>
                        <p style="text-indent: 1em" class="text-justify">
                            <small>{{$event->description}}</small>
                        </p>
                        <br>
                        @if((strcmp('new', $event->status)===0 && $event->user_id === auth()->user()->id) || auth()->user()->is_admin() || auth()->user()->is_superadmin())
                            <button class="btn btn-success" style="background-color: #4CAF50">Edit</button>
                            <template>
                                <el-button type="text" @click="openDeleteModal"
                                           style="color:white; background-color: rgba(255, 0, 0, .7)">Delete
                                </el-button>
                            </template>
                            <form action="/events/{{$event->id}}/delete" style="display: inline" method="post"
                                  id="deleteForm">
                                {{csrf_field()}}
                                {!! method_field('delete')  !!}
                            </form>
                        @endif
                        @if((strcmp('new', $event->status)===0 && !$event->checkForVotes() && $event->user_id !== auth()->user()->id))
                            <form action="/events/{{$event->id}}/vote" method="POST" style="display: inline">
                                {{csrf_field()}}

                                <button class="btn btn-success" style="background-color: #4CAF50" name="vote" value="1">
                                    Huzzah!
                                </button>
                                <button class="btn btn-danger" name="vote" value="0">Boo!</button>
                            </form>
                        @endif
                    </h3>
                    <hr>
                    <p><b>Theme: </b>{{$event->theme}}</p>
                    <p><b>Type: </b>{{$event->type}}</p>
                    <p><b>Date: </b>{{Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</p>
                    <p><b>Time: </b>{{Carbon\Carbon::parse($event->time)->format('g:i A')}}</p>
                    <p><b>Venue: </b>{{$event->location}}</p>
                    @switch($event->status)
                        @case('approved')
                        <p><b>Status: <span class="alert-success">Official Event</span></b></p>
                        @break;
                        @case('rejected')
                        <p><b>Status: <span class="alert-danger">Rejected</span></b></p>
                        @break;
                        @case('new')
                        <p><b>Status: <span class="alert-info">New Entry</span></b></p>
                        @break;
                    @endswitch
                    <form action="/messages" method="POST" v-if="showForm" class="col-md-12">
                        {{ csrf_field() }}

                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <input type="hidden" name="reported_user_id" value="{{$event->user->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <input type="hidden" name="type" value="event">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label for="" style="color: red">Tell us more</label>
                                <textarea name="description" id="description" cols="30" rows="10"
                                          class="form-control"
                                          placeholder="Tell us how we can help improve your experience with the site"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 15px">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-danger form-control">
                            </div>
                        </div>
                    </form>
                    <a href="#" v-if="!showForm" @click="showForm=1" style="color: red">Do not like this event?</a>
                    <h5><b>
                            <img src="{{$event->user->img}}" style="width: 50px; height: 50px;"
                                 class="img-circle">
                            <p><b>{{$event->user->firstname}} {{$event->user->lastname}}
                                    <br> {{Carbon\Carbon::parse($event->created_at)->toFormattedDateString()}}</b>
                                <small>({{Carbon\Carbon::parse($event->created_at)->diffForHumans()}})</small>
                            </p>
                        </b>
                    </h5>
                    <hr>
                    @if(session()->has('error'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('error')}}
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('error')}}
                        </div>
                    @endif
                    <form action="/events/{{$event->id}}" method="POST" style="margin-bottom: 15px">
                        {{csrf_field()}}

                        <div class="form-group">
                            <textarea name="comment" id="" rows="10" class="form-control" style="resize: none"
                                      placeholder="Tell us what you think..." required></textarea>
                        </div>
                        <button class="btn btn-primary">Comment</button>
                    </form>
                </div>
                <div class="col-md-12 noMargin bg-white roundedCorners" style="margin-bottom: 15px">
                    @foreach($comments as $comment)
                        <div class="col-md-12 noPadding commentBox{{ Request('hl') !=null && Request('hl') == $comment->user_id ? ' bg-danger':'' }}"
                             style="border-left-color: {{$comment->user->is_student()? 'green': ($comment->user->is_superadmin()? 'red':'yellow')}}">
                            <div class="col-md-1 col-sm-2 pullLeftOnXs text-right">
                                <img src="{{$comment->user->img}}" alt="user_image" style="width: 50px; height: 50px"
                                     class="img-circle">
                            </div>
                            <div class="col-md-11 col-sm-10">
                                <p>
                                    <b>{{$comment->user->firstname}} {{$comment->user->lastname}}</b>
                                    <small>{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                                    <span class="glyphicon glyphicon-exclamation-sign pull-right pointerOnHover"
                                          style="color: red" data-toggle="modal" data-target="#myModal"
                                          @click="updateReportUserModal({{$comment->user->id}})"></span>
                                </p>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 text-right">
                        {{$comments->appends(request()->input())->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var Main = {
            data() {
                return {
                    showForm: false,
                    user_id: null,
                }
            },
            methods: {
                openDeleteModal() {
                    this.$confirm('Are you sure you want to delete this Event?', 'Warning', {
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Cancel',
                        type: 'warning'
                    }).then(() => {
                        this.$message({
                            type: 'success',
                            message: 'Delete completed'
                        });
                        document.getElementById('deleteForm').submit();
                    }).catch(() => {
                        this.$message({
                            type: 'info',
                            message: 'Delete canceled'
                        });
                    });
                },
                updateReportUserModal(id) {
                    this.user_id = id;
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
