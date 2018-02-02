@extends('layouts.admin')

@section('css')
@endsection

@section('content')
    <div class="col-md-12 noPadding" id="app">
        <div class="col-md-12 bg-white roundedCorners noPadding">
            <div class="container"
                 style="height: 100%; max-width: 100%; border: none;">

                <div class="col-md-12">
                    <h3><b>User Reports Monitoring Log</b></h3>
                    <hr>
                    <h5 style="color:green"><b><span class="glyphicon glyphicon-book"></span> Total Reports:
                        </b>{{$total_reports_count}}</h5>
                    <h5 style="color:red"><b><span class="glyphicon glyphicon-exclamation-sign"></span> Events Reported:
                        </b>{{$reports->where('type', 'event')->count()}}</h5>
                    <h5 style="color:red"><b><span class="glyphicon glyphicon-user"></span> Users Reported:
                        </b>{{$reports->where('type', 'user')->count()}}</h5>
                    <h5 style="color:green"><b><span class="glyphicon glyphicon-eye-close"></span> Unread Reports:
                        </b>{{$reports->where('read', 0)->count()}}</h5>

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
                </div>

                <form action="/reports" method="post" id="form">
                    {{csrf_field()}}
                    {{method_field('patch')}}

                    <input type="hidden" name="id" v-model="id">
                </form>

                <div class="col-md-12" v-if="tableData == undefined">
                    <hr>
                    <h2><b style="color: green">There are currently no reported events or users...</b></h2>
                </div>

                <div class="col-md-12" style="padding-bottom: 30px;">
                    <hr>
                    <vue-good-table
                            :columns="columns"
                            :rows="rows"
                            :paginate="true"
                            :lineNumbers="true"
                            styleClass="table table-bordered table-striped condensed">
                        <template slot="table-row" scope="scope">
                            <td class="fancy">@{{ scope.row.id }}</td>
                            <td class="has-text-right" style="min-width: 200px">@{{ scope.row.type}}</td>
                            <td class="has-text-right">@{{ scope.row.description}}</td>
                            <td class="has-text-right">
                                <b>Reported User: </b><span v-if="scope.row.reported_user !== null">@{{ scope.row.reported_user.firstname + ' ' + scope.row.reported_user.lastname }}</span>
                                <br>
                                <b>Reported Event: </b><span v-if="scope.row.event !==null">@{{ scope.row.event.title }}</span>
                            </td>
                            <td class="has-text-right">@{{ scope.row.user.firstname + ' ' + scope.row.user.lastname }}</td>
                            <td class="has-text-right" style="width: 155px">
                                <el-tooltip class="item" effect="dark" content="View event related to this report"
                                            placement="top">
                                    <el-button size="small" @click="redirectEvents(scope.row.event_id, scope.row.reported_user_id)" type="info"><span
                                                class="glyphicon glyphicon-bookmark" style="color: green"></span>
                                    </el-button>
                                </el-tooltip>
                                <el-tooltip class="item" effect="dark" content="View user related to this report"
                                            placement="top">
                                    <el-button size="small" @click="redirectUsers(scope.row.reported_user_id)" type="info"><span
                                                class="glyphicon glyphicon-user"></span>
                                    </el-button>
                                </el-tooltip>
                                <el-tooltip class="item" effect="dark" content="Mark as read"
                                            placement="top">
                                    <el-button size="small" @click="markAsRead(scope.row.id)" type="danger"><span
                                                class="glyphicon glyphicon-eye-open"></span>
                                    </el-button>
                                </el-tooltip>
                            </td>
                        </template>
                    </vue-good-table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var reports ={!! json_encode($reports) !!};
        var Main = {
            data() {
                return {
                    tableData: reports,
                    id: reports[0].id,
                    columns: [
                        {
                            label: 'ID',
                            sortable: 'true',
                            field: 'id',
                            filterable: true
                        },
                        {
                            label: 'Type',
                            sortable: 'true',
                            field: 'type',
                            filterable: true
                        },
                        {
                            label: 'Description',
                            sortable: 'true',
                            field: 'description',
                            filterable: true
                        },
                        {
                            label: 'Details',
                        },
                        {
                            label: 'Submitted by',
                            sortable: 'true',
                            filterable: true
                        },
                        {
                            label: 'Action',
                        }
                    ],
                    rows: reports
                }
            },
            methods: {
                redirectEvents(id, r_id) {
                    window.location.href = '/events/' + id + "/?hl=" + r_id
                },
                redirectUsers(id) {
                    window.location.href = '/accounts/' + id + '/edit'
                },
                markAsRead(id){
                    this.id= id;
                    document.getElementById('form').submit();
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
