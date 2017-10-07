<div class="sideScroll noPadding" id="sideScroll">
    <div class="sidebar collapse navbar-collapse noPadding" id="sideNav">
        <ul>
            <li class="identityDiv">
                <div style="display:inline-block;">
                    <img src="{{auth()->user()->img}}" alt="" class="img-circle">
                </div>
                <div style="display: inline-block" class="changeColorOnXs">
                    <br>
                    <b>{{auth()->user()->firstname." ".auth()->user()->lastname}}</b>
                    <br>
                    <small><span class="glyphicon glyphicon-map-marker"></span> {{auth()->user()->email}}</small>
                    <br>
                </div>
            </li>
            <hr class="light-hr">
            <li><a {{Request::is("profile*") ? " class= active" :  ''}} href="/profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            @if(auth()->user()->is_superadmin())
                <li id="accordion">
                    <a data-toggle="collapse" data-parent="#accordion" href="#accountsCollapse"><span class="glyphicon glyphicon-th-list"></span> Accounts <small><span class="glyphicon glyphicon-arrow-up"></span><span class="glyphicon glyphicon-arrow-down"></span></small></a>
                    <div id="accountsCollapse" class="panel-collapse collapse {{Request::is("accounts*") ? "in" :  ''}}">
                        <a href="/accounts/" {{Request::is("accounts*")  && !Request::is("accounts/create") ? " class=active" :  ''}}>Accounts</a>
                        <a href="/accounts/create" {{Request::is("accounts/create")  ? " class=active" :  ''}}>Create Account</a>
                    </div>
                </li>
            @endif
            <li><a {{Request::is("announcements*") ? " class= ac    tive" :  ''}} href="/announcements"><span class="glyphicon glyphicon-info-sign"></span> Accouncements</a></li>
            <li id="accordion">
                <a data-toggle="collapse" data-parent="#accordion" href="#eventsCollapse"><span class="glyphicon glyphicon-cloud"></span> Events <small><span class="glyphicon glyphicon-arrow-up"></span><span class="glyphicon glyphicon-arrow-down"></span></small></a>
                <div id="eventsCollapse" class="panel-collapse collapse {{Request::is("events*") || Request::is("suggestions*") ? "in" :  ''}}">
                    <a href="/events/calendar" {{Request::is("events/calendar*")  ? " class=active" :  ''}}>Weekly</a>
                    <a href="/events" {{(Request::is("events*") && !Request::is('events/calendar'))  ? " class=active" :  ''}}>Events</a>
                    <a href="/suggestions" {{Request::is("suggestions*")  ? " class=active" :  ''}}>Suggested Events</a>
                </div>
            </li>
            <li id="accordion">
                <a data-toggle="collapse" data-parent="#accordion" href="#orgCollapse"><span class="glyphicon glyphicon-cloud"></span> Organizations <small><span class="glyphicon glyphicon-arrow-up"></span><span class="glyphicon glyphicon-arrow-down"></span></small></a>
                <div id="orgCollapse" class="panel-collapse collapse">
                    <a href="#">Home</a>
                    <a href="#">Announcements</a>
                </div>
            </li>
            <li id="accordion">
                <a data-toggle="collapse" data-parent="#accordion" href="#scCollapse"><span class="glyphicon glyphicon-envelope"></span> Student Council <small><span class="glyphicon glyphicon-arrow-up"></span><span class="glyphicon glyphicon-arrow-down"></span></small></a>
                <div id="scCollapse" class="panel-collapse collapse">
                    <a href="#">Report</a>
                    <a href="#">Feedback</a>
                    <a href="#">Message</a>
                </div>
            </li>
            <li id="accordion">
                <a data-toggle="collapse" data-parent="#accordion" href="#preferencesCollapse"><span class="glyphicon glyphicon-paperclip"></span> Settings <small><span class="glyphicon glyphicon-arrow-up"></span><span class="glyphicon glyphicon-arrow-down"></span></small></a>
                <div id="preferencesCollapse" class="panel-collapse collapse">
                    <a href="#">Preference 1</a>
                    <a href="#">Preference 2</a>
                    <a href="#">Preference 3</a>
                    <a href="#">Preference 4</a>
                    <a href="#">Preference 5</a>
                </div>
            </li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                            class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
            <li class="text-center" style="padding-top: 25px; padding-bottom: 70px;">
                <label class="col-md-12 text-center">
                    <small>
                        College of San Benildo-Rizal
                        <br>
                        <span class="glyphicon glyphicon-copyright-mark"></span> {{Carbon\Carbon::parse(Carbon\Carbon::now())->year}}
                    </small>
                </label>
                <img src="{{asset('img/cosbis/cosbr-logo.png')}}" alt="" style="width: 30%">
            </li>
        </ul>
    </div>
</div>
