@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/election.css')}}">
    <style>
        .roundedCorners {
            padding-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-12 noPadding" id="app">
        <div class="col-md-12 jumbotron text-center bg-white roundedCorners fade_out" style="display: none">
            <h1 style="color: green"><b>Welcome to the Annual Student Council Election</b></h1>
        </div>
        <div class="col-md-12 bg-white roundedCorners fade_out" style="display: none">
            <div class="container"
                 style="border:none; height: 100%; margin-top: 50px; margin-bottom: 10px; max-width: 100%">
                <h3 class="text-center"><b>Before you proceed with the election</b></h3>
                <h4 class="text-center">there are a few things we would like you to know first</h4>
                <hr>
                <div class="col-md-12">
                    <ol class="panel-group list-unstyled remindersDiv" id="accordion">
                        <li class="panel panel-default" data-toggle="collapse" data-parent="#accordion"
                            href="#rule1">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a>
                                        Please take this election seriously</a>
                                </h4>
                            </div>
                            <div id="rule1" class="panel-collapse collapse in">
                                <div class="panel-body">This year's election, as well as all of the other previous and
                                    futures elections, will determine the students that will represent your student body
                                    for an entire academic year. It is extremely important for everyone that the right
                                    people are voted in. We ask of you not to take this election lightly as this is our
                                    chance of choosing the people who can lead the school to another fun and
                                    unforgettable academic year.
                                </div>
                            </div>
                        </li>
                        <li class="panel panel-default" data-toggle="collapse" data-parent="#accordion"
                            href="#rule2">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a>
                                        Your vote will remain anonymous.</a>
                                </h4>
                            </div>
                            <div id="rule2" class="panel-collapse collapse in">
                                <div class="panel-body">In order to preserve each and everyone's privacy, the student
                                    council organization and the office of student affairs will not use any information
                                    you enter in any form that is not permitted by you.
                                </div>
                            </div>
                        </li>
                        <li class="panel panel-default" data-toggle="collapse" data-parent="#accordion"
                            href="#rule3">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a>
                                        Slow and Steady!</a>
                                </h4>
                            </div>
                            <div id="rule3" class="panel-collapse collapse in">
                                <div class="panel-body">Lastly, we would like everyone to take their time in completing
                                    their ballots. Once you have entered your votes, there will be no chance of change
                                    your ballot. It is very important that you have carefully reviewed and reread your
                                    ballot before submitting it to the system.
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-md-12 fade_out" style="margin-top: 20px; display: none">
            <div class="container text-center" style="border:none">
                <button class="btn btn-success" @click="start()">Start Voting</button>
            </div>
        </div>

        <div class="col-md-12 voting_form noPadding" style="display: block">
            <div class="col-md-12 bg-white roundedCorners">
                <div class="container" style="max-width: 100%; border: none; height: 100%">
                    <h4><b>Ballot Summary</b></h4>
                    <hr>
                    <div class="col-md-12">
                        <div class="col-md-5 col-md-offset-1">
                            <h5><b>Name:</b> {{auth()->user()->firstname}} {{auth()->user()->lastname}}</h5>
                            <h5><b>Email Address:</b> {{auth()->user()->email }}</h5>
                            <h5><b>Address:</b> {{auth()->user()->address }}</h5>
                            <h5><b>Phone Number:</b> {{auth()->user()->phone }}</h5>
                            <h5><b>Date: </b>{{now()->toFormattedDateString()}}</h5>
                        </div>
                        <div class="col-md-5">
                            <h5 style="color: green" v-if="ballot.president.id!=null"><b>President: @{{
                                    ballot.president.name }}</b>
                            </h5>
                            <h5 style="color: green" v-if="ballot.vp_operations.id!=null"><b>VP Operations: @{{
                                    ballot.vp_operations.name }}</b></h5>
                            <h5 style="color: green" v-if="ballot.vp_activities.id!=null"><b>VP Activities: @{{
                                    ballot.vp_activities.name }}</b></h5>
                            <h5 style="color: green" v-if="ballot.vp_academics.id!=null"><b>VP Academics: @{{
                                    ballot.vp_academics.name
                                    }}</b></h5>
                            <h5 style="color: green" v-if="ballot.vp_finance.id!=null"><b>VP Finance: @{{
                                    ballot.vp_finance.name
                                    }}</b></h5>
                            <h5 style="color: green" v-if="ballot.secretary.id!=null"><b>Secretary: @{{
                                    ballot.secretary.name }} </b>
                            </h5>

                            <h5 style="color: red" v-if="ballot.president.id==null"><b>President: None Selected</b></h5>
                            <h5 style="color: red" v-if="ballot.vp_operations.id==null"><b>VP Operations: None
                                    Selected</b>
                            </h5>
                            <h5 style="color: red" v-if="ballot.vp_activities.id==null"><b>VP Activities: None
                                    Selected</b>
                            </h5>
                            <h5 style="color: red" v-if="ballot.vp_academics.id==null"><b>VP Academics: None
                                    Selected</b></h5>
                            <h5 style="color: red" v-if="ballot.vp_finance.id==null"><b>VP Finance: None Selected </b>
                            </h5>
                            <h5 style="color: red" v-if="ballot.secretary.id==null"><b>Secretary: None Selected </b>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 bg-white roundedCorners">
                <div class="container" style="max-width: 100%; border:none; height: 100%">
                    <h4><b>Position Details</b></h4>
                    <hr>
                    <div class="col-md-5 col-md-offset-1">
                        <h5 style="color: green"><b style="color: black">Title:</b> @{{ position_details.title[page-1]
                            }}</h5>
                        <h5 style="color: green"><b style="color: black">Description:</b> @{{
                            position_details.description[page-1] }}</h5>
                        <h5><b>Number of Candidates: </b></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-12 bg-white roundedCorners">
                <div class="container" style="max-width: 100%; border:none; height: 100%;">
                    <h1 style="border-bottom: 2px dashed green; padding-bottom: 15px"><b>Candidates List</b></h1>
                    <h1>
                        <small>Click the panel of your desired candidate</small>
                    </h1>
                    <ol>
                        <div class="col-md-12 candidate_cubes roundedCorners" v-for="candidate in active_candidates"
                             @click="choose_candidate(candidate)">
                            <li style="font-size: 2em">
                                <h4><b><img :src="candidate.election_party.banner" alt=""
                                            style="max-width: 80px; max-height: 50px"> Party:</b> @{{
                                    candidate.election_party.name
                                    }}</h4>
                                <hr style="border-color: green">
                                <div class="col-md-12 noPadding">
                                    <div class="col-md-3">
                                        <img :src="candidate.user.img" alt="" style="width: 100%">
                                    </div>
                                    <div class="col-md-9">
                                        <h4><b>Candidate Information</b></h4>
                                        <h5><b>Name:</b> @{{ candidate.user.firstname + ' ' + candidate.user.lastname }}
                                        </h5>
                                        <h5><b>Email:</b> @{{ candidate.user.email }}</h5>
                                        <h5><b>Birthdate:</b> @{{ candidate.user.birthdate }}</h5>
                                        <h5><b>Slogan:</b> @{{ candidate.slogan }}</h5>
                                        <h5><b>Statement:</b> @{{ candidate.statement }}</h5>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ol>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-5">
                <button class="btn btn-warning" @click="move_page('prev')" v-if="page>1">Back</button>
                <button class="btn btn-success" @click="move_page('next')" v-if="page<6">Next</button>
                <button class="btn btn-success" v-if="page==6">Submit</button>
            </div>
        </div>
        <form action="/election/vote" method="post">
            {{csrf_field()}}

            <input type="hidden" name="president" v-model="ballot.president.name">
            <input type="hidden" name="vp_operations" v-model="ballot.vp_operations.id">
            <input type="hidden" name="vp_activities" v-model="ballot.vp_activities.id">
            <input type="hidden" name="vp_academics" v-model="ballot.vp_academics.id">
            <input type="hidden" name="vp_finance" v-model="ballot.vp_finance.id">
            <input type="hidden" name="secretary" v-model="ballot.secretary.id">
        </form>
    </div>

    <script>
        var candidates = {!! json_encode($candidates) !!};
        var active_candidates = candidates.filter(function (candidate) {
            return candidate.position_id == 1
        });
        var Main = {
            data() {
                return {
                    page: 1,
                    candidates: candidates,
                    active_candidates: active_candidates,
                    position_details: {
                        title: [
                            'President',
                            'Vice President of Operations',
                            'Vice President of Activities',
                            'Vice President of Academics',
                            'Vice President of Finance',
                            'Secretary'
                        ],
                        description: [
                            'The president is the Head of the Student Council. He or she is assigned to oversee all of the important decisions and planning. It is the responsibility of the president to lead and maintain the performance of the student council oranization.',
                            'The Vice President of operations oversees day-to-day operations to support the growth and add to the bottom line of the student council organization. They focus on strategic planning and goal-setting, and direct the operations of the student council in support of its goals.',
                            'The Vice President of Activities is responsible in planning and handling student related activities around the campus. Student life generally revolves around the quality of in-school activities, hence the important of the abilities of the VP of Activities',
                            'The Vice President of Academics has primary leadership responsibilities for planning, implementing, and coordinating the educational programs of the College. In assuming these responsibilities, the Vice President must work closely with Academic Deans, other administrators, and members of the faculty.',
                            'The Vice President of Finance ensures that the student council and the student body\'s finances are managed appropriately and effectively',
                            'The Secretary is primarily responsible in routine clerical and administrative functions such as drafting correspondence, scheduling appointments, organizing and maintaining paper and electronic files, or providing information to students.'
                        ],
                    },
                    ballot: {
                        president: {
                            id: null,
                            name: null
                        },
                        vp_operations: {
                            id: null,
                            name: null
                        },
                        vp_activities: {
                            id: null,
                            name: null
                        },
                        vp_academics: {
                            id: null,
                            name: null
                        },
                        vp_finance: {
                            id: null,
                            name: null
                        },
                        secretary: {
                            id: null,
                            name: null
                        }
                    },
                    positions: ['president', 'vp_operations', 'vp_activities', 'vp_academics', 'vp_finance', 'secretary']

                };
            },
            methods: {
                start: function () {
                    $('.fade_out').css({'opacity': 0});
                    setTimeout(function () {
                        $('.fade_out').css({'display': 'none'});
                        $('.voting_form').css({'display': 'block'});
                    }, 400)
                },
                move_page: function (direction) {
                    if (this.page < 6 && direction == 'next') {
                        var new_page = ++this.page;
                        this.active_candidates = this.candidates.filter(function (candidate) {
                            return candidate.position_id == new_page
                        });
                    } else if (this.page > 1 && direction == 'prev') {
                        var new_page = --this.page;
                        this.active_candidates = this.candidates.filter(function (candidate) {
                            return candidate.position_id == new_page
                        });
                    }
                },
                choose_candidate: function (candidate) {
                    this.ballot[this.positions[this.page - 1]].id = candidate.id;
                    this.ballot[this.positions[this.page - 1]].name = candidate.user.firstname + ' ' + candidate.user.lastname;
                    this.move_page('next');
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
