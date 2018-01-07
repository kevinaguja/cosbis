@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    <div class="col-md-12 noPadding" id="app">
        <div class="col-md-12 jumbotron" style="margin-bottom: 15px; padding: 20px 0px 0px 0px;">
            <div class="col-md-12 noPadding bg-white roundedCorners textCenterOnXs padding-25">
                <img src="{{asset('img/cosbis/cosbr-logo.png')}}" alt="" style="width: 100px; margin-right: 20px"
                     class="pullLeftBeforeXs">
                <h3 style="padding-bottom: 0; margin-bottom: 0; line-height: .9em">
                    <b>College of San Benildo- Rizal</b>
                    <br>
                    <small>Cosbis - Events Management System Admin Panel</small>
                    <br>
                    <small>Sumulong Highway, Antipolo City</small>
                </h3>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 noPadding">
            <form action="/accounts/delete" method="POST" id="deleteForm">
                {{csrf_field()}}
                {!! method_field('delete') !!}

                <input type="hidden" name="id" id="idField">
            </form>
            <div class="col-md-12 col-sm-12 bg-white roundedCorners" style="padding-bottom: 25px;">
                <h4 class="col-md-8 col-sm-12">
                    <b><span class="glyphicon glyphicon-list-alt"></span> Student List</b>
                    <br>
                    <small style="padding-left: 1.7em">Tip: Watch out for delinquent and inactive accounts</small>
                </h4>
                <div class="col-md-4 col-sm-12 noPadding padding-bottom-25" style="margin-top: 15px; overflow: hidden;">
                    <a class="btn  btn-primary form-control" href="/accounts/create"><span
                                class="glyphicon glyphicon-pencil"></span> Create Account</a>
                </div>
                <div>
                    <template>
                        <div>
                            <vue-good-table
                                    :columns="columns"
                                    :rows="rows"
                                    :paginate="true"
                                    :lineNumbers="true"
                                    styleClass="table table-bordered table-striped condensed">
                                <template slot="table-row" scope="scope">
                                    <td class="fancy">@{{ scope.row.student_number }}</td>
                                    <td class="has-text-right">@{{ scope.row.name }}</td>
                                    <td class="has-text-right">@{{ scope.row.email}}</td>
                                    <td class="has-text-right">
                                        <a href="#account_details">
                                            <el-button size="small" type="info"
                                                       @click="updateChosenAccountDetails(scope.row.id, scope.row.firstname, scope.row.lastname, scope.row.email, scope.row.phone, scope.row.created_at_formatted, scope.row.updated_at_formatted, scope.row.img, scope.row.events)">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </el-button>
                                        </a>
                                        @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
                                            <el-button size="small" @click="handleEdit(scope.row.id)"><span
                                                        class="glyphicon glyphicon-pencil"></span>
                                            </el-button>
                                        @endif
                                        @if(auth()->user()->is_superadmin())
                                            <el-button size="small" type="danger"
                                                       @click="handleDeactivate(scope.row.id)"><span
                                                        class="glyphicon glyphicon-remove"></span>
                                            </el-button>
                                        @endif
                                    </td>
                                </template>
                            </vue-good-table>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12" style="padding-right: 0px">
            <div class="col-md-12 col-sm-12 bg-white roundedCorners padding-bottom-25">
                <div class="col-md-12">
                    <h4>
                        <b><span class="glyphicon glyphicon-check"></span> Select an Account:</b>
                        <br>
                        <small style="padding-left: 1.8em">View an account from the student list to access it's
                            details.
                        </small>
                    </h4>
                    <div class="col-md-12 noPadding" id="account_details">
                        <div class="col-md-3 profilePictureDiv" style="padding-left: 0px">
                            <img :src="chosenAccount.img" class="img-rounded img-thumbnail" alt="Account Image"
                                 style="width: 250px;">
                        </div>
                        <div class="col-md-8">
                            <h3 class="profilePictureDetails noMargin">
                                <b>@{{ chosenAccount.name }}</b>
                            </h3>
                            <h5 class="profilePictureDetails"><span
                                        class="glyphicon glyphicon-map-marker"></span> @{{ chosenAccount.email }}</h5>
                            <h5 class="profilePictureDetails"><span
                                        class="glyphicon glyphicon-phone"></span> @{{ chosenAccount.phone }}</h5>
                            <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-book"></span> Member
                                since: @{{ chosenAccount.created_at_formatted }}</h5>
                            <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-pencil"></span>Last
                                updated
                                on: @{{ chosenAccount.updated_at_formatted }}</h5>
                            <a :href="redirectUrl"><span class="glyphicon glyphicon-cog"></span> Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 bg-white roundedCorners padding-bottom-25">
                <div class="col-md-12">
                    <hr>
                    <h4>
                        <b><span class="glyphicon glyphicon-check"></span> Events Contributed</b>
                        <br>
                        <small style="padding-left: 1.8em"><b>Note:</b> Some events arent yet officially approved
                        </small>
                        <div class="col-md-12 padding-25">
                            <ol class="noPadding">
                                <li v-for="event in chosenAccount.events">
                                    <p>
                                        <small>Title: @{{event.title}}</small>
                                        <br>
                                        <small>Description: @{{event.description}}</small>
                                        <br>
                                        <small>Status: @{{event.status}}</small>
                                        <br>
                                        <small>Type: @{{event.type}}</small>
                                        <br>
                                        <small>Theme: @{{event.theme}}</small>
                                        <br>
                                        <small v-if="event.organization != null">Organization: @{{
                                            event.organization.description }}
                                        </small>
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <script>
        var accounts ={!! json_encode($accounts) !!};
        accounts.forEach(function(item, index){
            item.name= item.firstname + ' ' + item.lastname;
        });
        console.log(accounts);
        var Main = {
            data() {
                return {
                    tableData: accounts,
                    active_id: accounts[0]['id'],
                    chosenAccount: {
                        id: accounts[0]['id'],
                        name: accounts[0]['firstname'] + " " + accounts[0]['lastname'],
                        email: accounts[0]['email'],
                        phone: accounts[0]['phone'],
                        created_at_formatted: accounts[0]['created_at_formatted'],
                        updated_at_formatted: accounts[0]['updated_at_formatted'],
                        img: accounts[0]['img'],
                        events: accounts[0]['events']
                    },
                    columns: [
                        {
                            label: 'ID',
                            sortable: 'true',
                            field: 'student_number',
                            filterable: true
                        },
                        {
                            label: 'Name',
                            sortable: 'true',
                            field: 'name',
                            filterable: true
                        },
                        {
                            label: 'Email',
                            sortable: 'true',
                            field: 'email',
                            filterable: true
                        },
                        {
                            label: 'Action',
                            sortable: 'false',
                            field: 'phone',
                        }
                    ],
                    rows: accounts
                }
            },
            methods: {
                handleEdit(id) {
                    window.location.href = '/accounts/' + id + '/edit'
                },
                handleDeactivate(id) {
                    document.getElementById('idField').value = id;
                    document.getElementById('deleteForm').submit();
                },
                updateChosenAccountDetails(id, firstname, lastname, email, phone, created_at, updated_at, img, events) {
                    this.active_id = id;
                    this.chosenAccount.id = id;
                    this.chosenAccount.name = firstname + " " + lastname;
                    this.chosenAccount.email = email;
                    this.chosenAccount.phone = phone;
                    this.chosenAccount.created_at_formatted = created_at;
                    this.chosenAccount.updated_at_formatted = updated_at;
                    this.chosenAccount.img = img;
                    this.chosenAccount.events = events;
                }
            },
            computed: {
                redirectUrl() {
                    return "/accounts/" + this.chosenAccount.id + "/edit";
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
