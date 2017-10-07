<style>
    .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
        background-color: transparent;
        color: #fff;
    }

    #navDropdown li a{
        color: black !important;
    }

    #navDropdown li a:hover{
        background-color: #4CAF50 !important;
        color: white !important;
    }

    @media (max-width: 768px) {
        .navbar{
            position: fixed !important;
            width: 100%;
            z-index: 999;
        }

        .navScroll{
            max-height: 300px;
            overflow-y:auto;
        }
    }

    @media (max-width: 768px) and  (max-height: 1000px) {
        .navScroll{
            max-height: none !important;
        }
    }

    @media (max-width: 768px) and  (max-height:700px) {
        .navScroll{
            max-height: 400px !important;
            overflow-y:auto !important;
        }
    }

    @media (max-width: 768px) and  (max-height:400px) {
        .navScroll{
            max-height: 200px !important;
            overflow-y:auto !important;
        }
    }
</style>

<nav class="navbar navbar-inverse navbar-fixed-top noMargin" style="background-color: #4CAF50">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sideNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
        </div>
        <div class="col-md-12 text-center navScroll">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown list-transparent">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{auth()->user()->firstname}} {{auth()->user()->lastname}}
                            <img src="{{auth()->user()->img}}" class="img-circle">
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" id="navDropdown">
                            <li><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>