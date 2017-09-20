<nav class="navbar navbar-inverse noMargin">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navToggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
        </div>
        <div class="col-md-12 text-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">{{ csrf_field() }}</form>
            <div class="col-md-6 col-md-offset-3 collapse navbar-collapse navToggle">
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
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>