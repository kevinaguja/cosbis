@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/frontpage.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigation')
@endsection

@section('content')
    <div class="container-fluid loginbg noPadding">
        <header class="container jumbotron text-center">
            <h1>Learn. Live. Grow.</h1>
            <h5>Be up to date with every happenings around the school whenever and wherever you are, <br>signup now at
                the
                Office of the Student Affairs!</h5>
        </header>

        <div class="col-md-12 headlinesDiv">
            <div class="newsItem col-md-4">
                <div class="newsImageDiv col-md-12 noPadding">
                    <img src="{{asset('img/frontpage/learn.jpeg')}}" alt="item1">
                </div>
                <h4>Academic Life</h4>
                <h4 class="text-justify">
                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis doloremque
                        ducimus ea eveniet, illo ipsa ipsum mollitia nobis obcaecati officia omnis perferendis rem rerum
                        saepe similique suscipit tempora ut?
                    </small>
                </h4>
                <button class="btn btn-primary">Read</button>
            </div>

            <div class="newsItem col-md-4">
                <div class="newsImageDiv col-md-12 noPadding">
                    <img src="{{asset('img/frontpage/live.jpeg')}}" alt="item1">
                </div>
                <h4>Academic Life</h4>
                <h4 class="text-justify">
                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis doloremque
                        ducimus ea eveniet, illo ipsa ipsum mollitia nobis obcaecati officia omnis perferendis rem rerum
                        saepe similique suscipit tempora ut?
                    </small>
                </h4>
                <button class="btn btn-primary">Read</button>
            </div>

            <div class="newsItem col-md-4">
                <div class="newsImageDiv col-md-12 noPadding">
                    <img src="{{asset('img/frontpage/grow.jpeg')}}" alt="item1">
                </div>
                <h4>Academic Life</h4>
                <h4 class="text-justify">
                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis doloremque
                        ducimus ea eveniet, illo ipsa ipsum mollitia nobis obcaecati officia omnis perferendis rem rerum
                        saepe similique suscipit tempora ut?
                    </small>
                </h4>
                <button class="btn btn-primary">Read</button>
            </div>
        </div>

        <div class="col-md-12 noPadding noMargin latestHappeningsDiv">
            <div class="col-md-12 noPadding">
                <h1 class="text-center">Latest Events</h1>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-4">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#">Events</a></li>
                            <li><a href="#">Announcements</a></li>
                            <li><a href="#">Suggestions</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="newsItem col-md-4">
                    <div class="newsImageDiv col-md-12 noPadding">
                        <img src="{{asset('img/frontpage/grow.jpeg')}}" alt="item1">
                    </div>
                    <h4>Academic Life</h4>
                    <h4 class="text-justify">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis
                            doloremque
                            ducimus ea eveniet, illo ipsa ipsum mollitia nobis obcaecati officia omnis perferendis rem
                            rerum
                            saepe similique suscipit tempora ut?
                        </small>
                    </h4>
                    <button class="btn btn-primary">Read</button>
                </div>

                <div class="newsItem col-md-4">
                    <div class="newsImageDiv col-md-12 noPadding">
                        <img src="{{asset('img/frontpage/grow.jpeg')}}" alt="item1">
                    </div>
                    <h4>Academic Life</h4>
                    <h4 class="text-justify">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis
                            doloremque
                            ducimus ea eveniet, illo ipsa ipsum mollitia nobis obcaecati officia omnis perferendis rem
                            rerum
                            saepe similique suscipit tempora ut?
                        </small>
                    </h4>
                    <button class="btn btn-primary">Read</button>
                </div>

                <div class="newsItem col-md-4">
                    <div class="newsImageDiv col-md-12 noPadding">
                        <img src="{{asset('img/frontpage/grow.jpeg')}}" alt="item1">
                    </div>
                    <h4>Academic Life</h4>
                    <h4 class="text-justify">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis
                            doloremque
                            ducimus ea eveniet, illo ipsa ipsum mollitia nobis obcaecati officia omnis perferendis rem
                            rerum
                            saepe similique suscipit tempora ut?
                        </small>
                    </h4>
                    <button class="btn btn-primary">Read</button>
                </div>
            </div>
        </div>

        <div class="col-md-12 noPadding newsLetterDiv">
            <div class="container jumbotron text-center">
                <h1><b>School Newsletter</b></h1>
                <h5>Keep up to date with current and planned events. Live that campus life.</h5>
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-9">
                            <input type="email" placeholder="Enter you email" name="email" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-info form-control">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-12 studentCouncil jumbotron" style="padding-bottom: 0px">
                <h1 class="text-center">We are your Supreme Student Council</h1>
            </div>

            <div class="col-md-12" style="padding: 20px">
                <div class="col-md-4 col-sm-6 text-center">
                    <div class="col-md-12 scImgDiv">
                        <img class="scImg" src="{{asset('img/council/male.png')}}" alt="President">
                    </div>
                    <div class="col-md-12 sc">
                        <h3>John Doe</h3>
                        <h6>President</h6>
                        <div class="col-md-12 noPadding">
                            <small><q>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit...</q></small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 text-center">
                    <div class="col-md-12 scImgDiv">
                        <img class="scImg" src="{{asset('img/council/female.png')}}" alt="President">
                    </div>
                    <div class="col-md-12 sc">
                        <h3>Jane Doe</h3>
                        <h6>Vice President</h6>
                        <div class="col-md-12 noPadding">
                            <small><q>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit...</q></small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 text-center">
                    <div class="col-md-12 scImgDiv">
                        <img class="scImg" src="{{asset('img/council/male.png')}}" alt="President">
                    </div>
                    <div class="col-md-12 sc">
                        <h3>John John Doe</h3>
                        <h6>Secretary</h6>
                        <div class="col-md-12 noPadding">
                            <small><q>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit...</q></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="padding: 20px">
                <div class="col-md-4 col-sm-6 text-center">
                    <div class="col-md-12 scImgDiv">
                        <img class="scImg" src="{{asset('img/council/female.png')}}" alt="President">
                    </div>
                    <div class="col-md-12 sc">
                        <h3>Jane Doe</h3>
                        <h6>Representative</h6>
                        <div class="col-md-12 noPadding">
                            <small><q>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit...</q></small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 text-center">
                    <div class="col-md-12 scImgDiv">
                        <img class="scImg" src="{{asset('img/council/female.png')}}" alt="President">
                    </div>
                    <div class="col-md-12 sc">
                        <h3>Jane Doe</h3>
                        <h6>Representative</h6>
                        <div class="col-md-12 noPadding">
                            <small><q>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit...</q></small>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 text-center">
                    <div class="col-md-12 scImgDiv">
                        <img class="scImg" src="{{asset('img/council/male.png')}}" alt="President">
                    </div>
                    <div class="col-md-12 sc">
                        <h3>John John Doe</h3>
                        <h6>Representative</h6>
                        <div class="col-md-12 noPadding">
                            <small><q>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit...</q></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

