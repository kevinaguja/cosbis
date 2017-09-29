<style>

    @media (max-width: 768px) {
        .navbar{
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
<nav class="navbar navbar-inverse navbar-fixed-top noMargin">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navToggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
        </div>
        <div class="col-md-12 text-center navScroll">
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">{{ csrf_field() }}</form>
            <div class="col-md-6 collapse navbar-collapse navToggle">
                <ul class="nav navbar-nav greenLinks">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Calendar</a></li>
                    <li><a href="#">School Blog</a></li>
                    <li><a href="#">Report Abuse</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse navToggle">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/profile">Account</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>