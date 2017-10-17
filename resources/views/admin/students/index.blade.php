@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    <div class="col-md-12" id="app">
        <div class="col-md-12 jumbotron" style="margin-bottom: 15px; padding: 20px 15px 0px 15px;">
            <div class="col-md-12 bg-white roundedCorners textCenterOnXs padding-25">
                <img src="{{asset('img/cosbis/cosbr-logo.png')}}" alt="" style="width: 100px; margin-right: 20px" class="pullLeftBeforeXs">
                <h3 style="padding-bottom: 0; margin-bottom: 0; line-height: .9em">
                    <b>College of San Benildo- Rizal</b>
                    <br>
                    <small>Cosbis - Events Management System Admin Panel</small>
                    <br>
                    <small>Sumulong Highway, Antipolo City</small>
                </h3>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
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
                    <a class="btn  btn-primary form-control" href="/accounts/create"><span class="glyphicon glyphicon-pencil"></span> Create Account</a>
                </div>
                <div>
                    <template>
                        <el-table :data="tableData" border style="width: 100%">
                            <el-table-column label="ID" prod="id" width="120">
                                <template scope="scope">
                                    <span style="margin-left: 10px">@{{ scope.row.id }}</span>
                                </template>
                            </el-table-column>
                            <el-table-column label="Name">
                                <template scope="scope">
                                    <span for="">@{{scope.row.firstname}}</span>
                                    <span for="">@{{scope.row.lastname}}</span>
                                </template>
                            </el-table-column>
                            <el-table-column label="Operations" width="180">
                                <template scope="scope">
                                    <el-button size="small" type="info" @click="updateChosenAccountDetails(scope.row.id, scope.row.firstname, scope.row.lastname, scope.row.email, scope.row.phone, scope.row.created_at_formatted, scope.row.updated_at_formatted, scope.row.img)"><span class="glyphicon glyphicon-eye-open"></span>
                                    </el-button>
                                    <el-button size="small" @click="handleEdit(scope.row.id)"><span class="glyphicon glyphicon-pencil"></span>
                                    </el-button>
                                    <el-button size="small" type="danger" @click="handleDeactivate(scope.row.id)"><span class="glyphicon glyphicon-remove"></span>
                                    </el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </template>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12">
            <div class="col-md-12 col-sm-12 bg-white roundedCorners padding-bottom-25">
                <div class="col-md-12">
                    <h4>
                        <b><span class="glyphicon glyphicon-check"></span> Select an Account:</b>
                        <br>
                        <small style="padding-left: 1.8em">View an account from the student list to access it's details.</small>
                    </h4>
                    <div class="col-md-12 noPadding">
                        <div class="col-md-3 profilePictureDiv" style="padding-left: 0px">
                            <img :src="chosenAccount.img" class="img-rounded img-thumbnail" alt="Account Image"
                                 style="width: 250px;">
                        </div>
                        <div class="col-md-8">
                            <h3 class="profilePictureDetails noMargin">
                                <b @click="asd">@{{ chosenAccount.name }}</b>
                            </h3>
                            <h5 class="profilePictureDetails"><span
                                        class="glyphicon glyphicon-map-marker"></span> @{{ chosenAccount.email }}</h5>
                            <h5 class="profilePictureDetails"><span
                                        class="glyphicon glyphicon-phone"></span> @{{ chosenAccount.phone }}</h5>
                            <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-book"></span> Member
                                since: @{{ chosenAccount.created_at_formatted }}</h5>
                            <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-pencil"></span>Last updated
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
                        <b><span class="glyphicon glyphicon-check"></span> Student Participation</b>
                        <br>
                        <small style="padding-left: 1.8em">Data is accurate up to the last month only</small>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <script>
        var accounts={!! json_encode($accounts) !!};
        var Main = {
            data() {
                return {
                    tableData: accounts,
                    chosenAccount: {
                        id: accounts[0]['id'],
                        name: accounts[0]['firstname'] + " " + accounts[0]['lastname'],
                        email: accounts[0]['email'],
                        phone: accounts[0]['phone'],
                        created_at_formatted: accounts[0]['created_at_formatted'],
                        updated_at_formatted: accounts[0]['updated_at_formatted'],
                        img: accounts[0]['img']
                    }
                }
            },
            methods: {
                handleEdit(id) {
                    window.location.href='/accounts/'+id+'/edit'
                },
                handleDeactivate(id) {
                    document.getElementById('idField').value= id;
                    document.getElementById('deleteForm').submit();
                },
                updateChosenAccountDetails(id, firstname, lastname, email, phone, created_at, updated_at, img){
                    this.chosenAccount.id= id;
                    this.chosenAccount.name= firstname + " " + lastname;
                    this.chosenAccount.email= email;
                    this.chosenAccount.phone= phone;
                    this.chosenAccount.created_at_formatted= created_at;
                    this.chosenAccount.updated_at_formatted=updated_at;
                    this.chosenAccount.img=img;
                }
            },
            computed: {
                redirectUrl(){
                    return "/accounts/" + this.chosenAccount.id + "/edit";
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
