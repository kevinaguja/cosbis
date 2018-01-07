@extends('layouts.admin')

@section('css')
    <style xmlns:v-bind="http://www.w3.org/1999/xhtml" xmlns:v-bind="http://www.w3.org/1999/xhtml">
        @import url("//unpkg.com/element-ui@2.0.10/lib/theme-chalk/index.css");
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/accounts.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection
@section('content')
    <div class="col-md-12 noPadding" style="border: none" id="app">
        <div class="col-md-12 bg-white roundedCorners">
            <div class="col-md-8 col-md-offset-2" style="border:none; height: auto">
                <div style="height: 100%">
                    <el-steps :active="active_tab">
                        <el-step title="Step 1"
                                 description="{{ $errors->has('student_number') ||$errors->has('firstname') ||$errors->has('lastname') ||$errors->has('birthdate') ||$errors->has('role_id') ? 'Check Here' : 'Basic Info' }}"
                                 v-on:click.native="change_tab(1)"></el-step>
                        <el-step title="Step 2"
                                 description="{{ $errors->has('phone') || $errors->has('email') || $errors->has('address') ? 'Check Here' : 'Contact Info'}}"
                                 v-on:click.native="change_tab(2)"></el-step>
                        <el-step title="Step 3"
                                 description="{{ $errors->has('suspend') ? 'Check Here': 'Other Essentials' }}"
                                 v-on:click.native="change_tab(3)"></el-step>
                        <el-step title="Step 4" description="Review & Submit"
                                 v-on:click.native="change_tab(4)"></el-step>
                    </el-steps>
                </div>
            </div>
        </div>

        @if(!$errors->isEmpty())
            <div class="col-md-12" style="border: 2px solid red;">
                <div class="container text-center" style="border: none; max-width: 100%; height: auto !important; padding-top: 50px; padding-bottom: 50px">
                    <h4><b>It seems that there are issues with one or more of your inputs. Please check the form for
                            possible errors.</b></h4>
                    <h5><b>Possible Errors:</b></h5>
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}<br/></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <transition name="slide-fade">
            <div class="col-md-12 noPadding bg-white roundedCorners animateForms" v-if="active_tab===1">
                <div class="container text-center"
                     style="padding-top: 10px; border:none; width: auto; height: auto">
                    <h4><b>Create Account</b></h4>

                    <div class="col-md-4 col-md-offset-4{{ $errors->has('student_number') ? ' has-error' : '' }}">
                        <hr>
                        <div class="form-group">
                            <label for="">Student Number</label>
                            <input type="text" class="form-control text-center" name="student_number"
                                   placeholder="2017-02-00235" v-model="form.student_number"
                                   value="{{old('student_number')}}">
                            @if ($errors->has('student_number'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('student_number') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control text-center" name="firstname"
                                   placeholder="Juan Carlos" v-model="form.firstname" value="{{old('lastname')}}">
                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control text-center" name="lastname"
                                   placeholder="Dela Cruz" v-model="form.lastname" value="{{old('lastname')}}">
                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="">Birthdate</label>
                            <input type="date" class="form-control text-center" name="birthdate"
                                   v-model="form.birthdate" value="{{old('birthdate')}}">
                            @if ($errors->has('birthdate'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <label for="">Account Type</label>
                            <select name="role" class="form-control" v-model="form.role_id">
                                <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>Student</option>
                                <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Student Council</option>
                            </select>
                        </div>

                        <label for="" class="btn btn-primary form-control" @click="next()" style="margin-bottom: 10px">Next</label>
                    </div>
                </div>
            </div>
        </transition>

        <transition name="slide-fade">
            <div class="col-md-12 noPadding bg-white roundedCorners animateForms" v-if="active_tab===2">
                <div class="container text-center"
                     style="padding-top: 10px; border:none; width: auto; height: auto">
                    <h4><b>Contact Information</b></h4>
                    <div class="col-md-4 col-md-offset-4{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <hr>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" class="form-control text-center" name="phone"
                                   placeholder="09#########" max="11" min="11" v-model="form.phone"
                                   value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control text-center" name="email"
                                   placeholder="student@gmail.com" v-model="form.email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4{{ $errors->has('address') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <textarea type="text" class="form-control text-center" name="address"
                                      placeholder="#123 Di Mahanap St., Brgy. Nawawala, Asan City"
                                      v-model="form.address" value="{{old('address')}}">
                                </textarea>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <label for="" class="btn btn-primary form-control" @click="next()" style="margin-bottom: 10px">Next</label>
                        <label for="" class="btn btn-warning form-control" @click="prev()" style="margin-bottom: 10px">Back</label>
                    </div>
                </div>
            </div>
        </transition>

        <transition name="slide-fade">
            <div class="col-md-12 noPadding bg-white roundedCorners animateForms" v-if="active_tab===3">
                <div class="container text-center"
                     style="padding-top: 10px; padding-bottom: 10px; border:none; width: auto; height: auto">
                    <h4><b>Suspend Account</b></h4>
                    <div class="col-md-4 col-md-offset-4">
                        <img src="{{asset('img/account_img/default.png')}}" alt="" class="img-thumbnail" id="imgEl">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <select name="suspend" id="suspend" v-model="form.suspend" class="form-control"
                                style="margin-bottom: 10px">
                            <option value="0" {{ old('suspend') ==0 ? 'selected' : '' }}>Do not suspend</option>
                            <option value="1" {{ old('suspend') ==1 ? 'selected' : '' }}>Suspend</option>
                        </select>

                        <label for="" class="btn btn-primary form-control" @click="next()" style="margin-bottom: 10px">Next</label>
                        <label for="" class="btn btn-warning form-control" @click="prev()" style="margin-bottom: 10px">Back</label>
                    </div>
                    {{--<div class="col-md-4 col-md-offset-4">
                        <hr>
                        <div class="form-group">
                            <input class="form-control" @change="previewFile()" type="file" name="img" id="img"
                                   accept="image/png, image/jpg">

                        </div>
                    </div>--}}
                </div>
            </div>
        </transition>

        <transition name="slide-fade">
            <div class="col-md-12 noPadding bg-white roundedCorners animateForms" v-if="active_tab===4">
                <div class="container" style="padding-top: 10px; border:none; width: auto; height: auto">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        <h4><b>Account Summary</b></h4>
                        <hr>
                        <p v-if="checkMissingFields()"><b>Completed Fields</b></p>
                        <label for="" class="col-md-12" v-if="this.form.student_number != ''">@{{ form.student_number
                            }}</label>
                        <label for="" class="col-md-12" v-if="this.form.firstname != '' || this.form.lastname != ''">@{{
                            form.firstname }} @{{ form.lastname }}</label>
                        <label for="" class="col-md-12" v-if="this.form.phone != ''">@{{ form.phone }}</label>
                        <label for="" class="col-md-12" v-if="this.form.email != ''">@{{ form.email }}</label>
                        <label for="" class="col-md-12" v-if="this.form.address != ''">@{{ form.address }}</label>
                        <label for="" class="col-md-12" v-if="form.role_id==3">Student Account</label>
                        <label for="" class="col-md-12" v-if="form.role_id==2">Student Council Account</label>
                        <label for="" class="col-md-12" v-if="form.suspend==1" style="color: red">Suspended</label>
                        <label for="" class="col-md-12" v-if="form.suspend==0" style="color: green">Active</label>

                        <div class="col-md-12 noPadding" v-if="checkMissingFields()">
                            <hr>
                            <p><b>Missing Fields</b></p>
                            <label for="" style="color:red" class="col-md-12" v-if="this.form.student_number == ''">*Student
                                Number</label>
                            <label for="" style="color:red" class="col-md-12" v-if="this.form.firstname == '' ">*First
                                Name</label>
                            <label for="" style="color:red" class="col-md-12" v-if="this.form.lastname == '' ">*Last
                                Name</label>
                            <label for="" style="color:red" class="col-md-12" v-if="this.form.phone == '' ">*Phone
                                Number</label>
                            <label for="" style="color:red" class="col-md-12" v-if="this.form.email == '' ">*Email
                                Address</label>
                            <label for="" style="color:red" class="col-md-12"
                                   v-if="this.form.address == '' ">*Address</label>

                        </div>
                        <form action="/accounts/create" method="post" enctype="multipart/form-data" id="form">
                            {{ csrf_field() }}


                            <input type="hidden" name="student_number" v-model="form.student_number">
                            <input type="hidden" name="firstname" v-model="form.firstname">
                            <input type="hidden" name="lastname" v-model="form.lastname">
                            <input type="hidden" name="phone" v-model="form.phone">
                            <input type="hidden" name="email" v-model="form.email">
                            <input type="hidden" name="address" v-model="form.address">
                            <input type="hidden" name="role_id" v-model="form.role_id">
                            <input type="hidden" name="birthdate" v-model="form.birthdate">
                            <input type="hidden" name="suspend" v-model="form.suspend">
                            <label class="btn btn-primary form-control" @click="submitForm()"
                                   style="margin-bottom: 10px">Create Account</label>
                        </form>
                        <label for="" class="btn btn-warning form-control" @click="prev()"
                               style="margin-bottom: 10px">Back</label>
                    </div>
                </div>
            </div>
        </transition>
    </div>

    <script>
        var initializeData = function (old) {
            var initialized_data = {
                student_number: '',
                firstname: '',
                lastname: '',
                birthdate: '1994-01-01',
                role_id: 2,
                phone: '',
                email: '',
                address: '',
                suspend: 0
            };

            if (old.student_number)
                initialized_data.student_number = old.student_number;
            if (old.firstname)
                initialized_data.firstname = old.firstname;
            if (old.lastname)
                initialized_data.lastname = old.lastname;
            if (old.role_id)
                initialized_data.role_id = old.role_id;
            if (old.birthdate)
                initialized_data.birthdate = old.birthdate;
            if (old.phone)
                initialized_data.phone = old.phone;
            if (old.email)
                initialized_data.email = old.email;
            if (old.address)
                initialized_data.address = old.address;
            if (old.suspend)
                initialized_data.suspend = old.suspend;
            return initialized_data;
        };

        var form_data = initializeData({!! json_encode(session()->getOldInput()) !!});
        var active_tab = 1;
        var Main = {
            data() {
                return {
                    active_tab: active_tab,
                    form: form_data
                }
            },
            methods: {
                change_active: function (id) {
                    event.preventDefault();
                    this.active_tab = id;
                },
                prev: function () {
                    if (this.active_tab > 1)
                        this.active_tab--;
                },
                next: function () {
                    if (this.active_tab < 4)
                        this.active_tab++;
                },
                change_tab: function (index) {
                    if (this.active_tab - index == -1)
                        this.next();
                    else if (this.active_tab - index > 0)
                        this.active_tab = index;
                },
                previewFile: function () {
                    var preview = document.getElementById('imgEl');
                    var file = document.querySelector('input[type=file]').files[0];
                    var reader = new FileReader();

                    reader.addEventListener("load", function () {
                        preview.src = reader.result;
                    }, false);

                    if (file) {
                        this.form.img = reader.readAsDataURL(file);
                    }
                },
                submitForm: function () {
                    event.preventDefault();

                    if (this.form.student_number == '' || this.form.firstname == '' || this.form.lastname == '' || this.form.birthdate == '' || this.form.role_id == '' || this.form.phone == '' || this.form.email == '' || this.form.address == '' || this.form.suspend == null) {
                        alert('Please Check that all fields were properly filled up');

                        return false;
                    }

                    document.getElementById('form').submit();
                },
                checkMissingFields: function () {
                    return this.form.student_number == '' || this.form.firstname == '' || this.form.lastname == '' || this.form.birthdate == '' || this.form.role_id == '' || this.form.phone == '' || this.form.email == '' || this.form.address == '' || this.form.suspend == null;
                },
                test: function () {
                    console.log(this.form);
                }
            }
        };

        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
