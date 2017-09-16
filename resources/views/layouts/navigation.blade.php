<nav class="navbar navbar-inverse noMargin">
    <div class="col-md-12 text-center">
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">{{ csrf_field() }}</form>
        <div class="col-md-6 col-md-offset-3">
            <ul class="nav navbar-nav greenLinks">
                <li><a href="#">Home</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Calendar</a></li>
                <li><a href="#">School Blog</a></li>
                <li><a href="#">Report Abuse</a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="pull-right"><a href="{{ route('logout') }}"
                                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </div>
</nav>