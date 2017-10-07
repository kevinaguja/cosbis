@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/accounts.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <div class="col-md-12 col-sm-12 bg-white">
            <div class="col-md-12 noPadding noMargin">
                <div class="col-md-12 dark-bottom-border">
                    <div>
                        <h3><b>Accounts - <small>List of student accounts</small></b></h3>
                        <div class="green-bottom-border col-md-2 col-xs-3"></div>
                    </div>
                </div>
            </div>
            <form action="/accounts/delete" method="POST" id="deleteForm">
                {{csrf_field()}}
                {!! method_field('delete') !!}

                <input type="hidden" name="id" id="idField">
            </form>
            <div class="col-md-12" style="padding-top: 20px; padding-bottom: 25px">
                <div id="app">
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
                                    <el-button size="small" type="info" @click="handleView(scope.row.id)"><span class="glyphicon glyphicon-eye-open"></span>
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
    </div>
    <script>
        var accounts={!! json_encode($accounts) !!};
        var Main = {
            data() {
                return {
                    tableData: accounts
                }
            },
            methods: {
                handleView(id) {
                    window.location.href= '/accounts/'+id;
                },
                handleEdit(id) {
                    window.location.href='/accounts/'+id+'/edit'
                },
                handleDeactivate(id) {
                    document.getElementById('idField').value= id;
                    document.getElementById('deleteForm').submit();
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
