@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/frontpage.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigation')
@endsection

@section('content')
    <div class="container-fluid loginbg noPadding">
        <div class="col-md-12 noPadding noMargin latestHappeningsDiv">
            <div class="col-md-12 noPadding jumbotron">
                <h1 class="text-center">Learn. Live. Grow.</h1>
                <h5 class="text-center">Be up to date with every happenings around the school whenever and wherever you
                    are, <br>signup now at
                    the Office of the Student Affairs!</h5>
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
                        <img src="{{asset('img/frontpage/live.jpeg')}}" alt="item1">
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
                        <img src="{{asset('img/frontpage/learn.jpeg')}}" alt="item1">
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
                        <img src="{{asset('img/frontpage/live.jpeg')}}" alt="item1">
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
                        <img src="{{asset('img/frontpage/learn.jpeg')}}" alt="item1">
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
                        <img src="{{asset('img/frontpage/live.jpeg')}}" alt="item1">
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
                        <img src="{{asset('img/frontpage/learn.jpeg')}}" alt="item1">
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

{{--        <div class="col-md-12 col-xs-12 headlinesDiv">
            <div class="col-md-1 col-xs-12 noPadding" style="opacity: .6">
                <div class="col-md-12 col-xs-4 noPadding">
                    <img data-target="#myCarousel" data-slide-to="0" src="{{asset('img/slideshow/slide1.jpg')}}" style="width: 100%">
                </div>
                <div class="col-md-12 col-xs-4 noPadding">
                    <img data-target="#myCarousel" data-slide-to="1" src="{{asset('img/slideshow/slide2.jpg')}}" style="width: 100%">
                </div>
                <div class="col-md-12 col-xs-4 noPadding">
                    <img data-target="#myCarousel" data-slide-to="2" src="{{asset('img/slideshow/slide3.jpg')}}" style="width: 100%">
                </div>
            </div>
            <div class="newsItem col-md-10 col-xs-12">
                <div class="newsImageDiv col-md-4 noPadding">
                    <div class="container-fluid">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 200px; overflow: hidden">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{asset('img/slideshow/slide1.jpg')}}" style="width: 100%">
                                </div>

                                <div class="item">
                                    <img src="{{asset('img/slideshow/slide2.jpg')}}"  style="width: 100%">
                                </div>

                                <div class="item">
                                    <img src="{{asset('img/slideshow/slide3.jpg')}}"  style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h4>Academic Life</h4>
                    <h4><small>By: <b>Earl Kevin A. Aguja</b>, <small>4th - BSIT</small></small></h4>
                    <h5 class="text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores blanditiis doloremque
                        ducimus ea eveniet, illo ipsa ipsum mollitia nobis obcaecati officia omnis perferendis rem rerum
                        saepe similique suscipit tempora ut?
                    </h5>
                    <button class="btn btn-primary">Read</button>
                </div>
            </div>
        </div>--}}

{{--        <div class="container" style="margin-bottom: 50px">
            <div class="col-md-12 studentCouncil jumbotron text-center" style="padding-bottom: 0px">
                <h1>Supreme <br> Student Council</h1>
                <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad alias aperiam asperiores est
                    ipsam libero</h5>
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
        </div>--}}

        <div class="col-md-12 noPadding feedbackDiv">
            <div class="container jumbotron text-center">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <h1><b>Send us a quick feedback</b></h1>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <div class="form-group">
                            <input type="email" placeholder="Enter you email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">Type of Feedback</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-8 noPadding">
                                <button class="feedbackBtn">Send Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
@endsection

