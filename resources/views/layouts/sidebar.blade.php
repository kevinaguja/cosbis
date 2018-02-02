<nav class="left sidebar collapse navbar-collapse" id="sideNav"
     style="overflow-y: auto !important; height: 100%; min-height: 100% !important;">
    <img src="{{auth()->user()->img}}" alt="Account Image" class="img-circle"
         style="width: 50px; background-color: white; padding: 3px">
    <span>{{auth()->user()->firstname." ".auth()->user()->lastname}}</span>
    <ul class="list-unstyled">
        <a href="/profile">
            <li><span class="glyphicon glyphicon-home"></span> Home</li>
        </a>
        @if((auth()->user()->is_admin() || auth()->user()->is_superadmin()))
            <a data-toggle="collapse" data-parent="#accordion" href="#accountsCollapse">
                <li><span class="glyphicon glyphicon-user"></span> Accounts
                    <small><span class="glyphicon glyphicon-arrow-up"></span><span
                                class="glyphicon glyphicon-arrow-down"></span></small>
                </li>
            </a>
            <li id="accordion">
                <ul id="accountsCollapse"
                    class="list-unstyled panel-collapse collapse {{Request::is("accounts*") ? "in" :  ''}}">
                    <li><a href="/accounts">Accounts</a></li>
                    <li><a href="/accounts/create">Create Account</a></li>
                </ul>
            </li>
        @endif
        <a data-toggle="collapse" data-parent="#accordion" href="#eventsCollapse">
            <li><span class="glyphicon glyphicon-tags"></span> Events
                <small><span class="glyphicon glyphicon-arrow-up"></span><span
                            class="glyphicon glyphicon-arrow-down"></span></small>
            </li>
        </a>
        <li id="accordion">
            <ul id="eventsCollapse"
                class="list-unstyled panel-collapse collapse {{Request::is("events*") ? "in" :  ''}}">
                <li><a href="/events">Official Events List</a></li>
                <li><a href="/events/create">Create Event</a></li>
            </ul>
        </li>
        <a href="/organizations">
            <li><span class="glyphicon glyphicon-tag"></span> Organizations</li>
        </a>
        <a data-toggle="collapse" data-parent="#accordion" href="#filesCollapse">
            <li><span class="glyphicon glyphicon-file"></span> Files
                <small><span class="glyphicon glyphicon-arrow-up"></span><span
                            class="glyphicon glyphicon-arrow-down"></span></small>
            </li>
        </a>
        <li id="accordion">
            <ul id="filesCollapse"
                class="list-unstyled panel-collapse collapse {{Request::is("files*") ? "in" :  ''}}">
                <li><a href="/files">Archives</a></li>
                <li><a href="/files/create">Upload Files</a></li>
            </ul>
        </li>
        <a href="">
            <li><span class="glyphicon glyphicon-cog"></span> Settings</li>
        </a>
    </ul>

    <ul class="list-unstyled" style="margin-top: 50px">
        @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
            <a href="/reports">
                <li><span class="glyphicon glyphicon-envelope"></span> Report</li>
            </a>
            {{--<a href="/print">
                <li><span class="glyphicon glyphicon-tags"></span> Print</li>
        </a>--}}
        @endif
        @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
            <a data-toggle="collapse" data-parent="#accordion" href="#electionCollapse">
                <li><span class="glyphicon glyphicon-list-alt"></span> Election
                    <small><span class="glyphicon glyphicon-arrow-up"></span><span
                                class="glyphicon glyphicon-arrow-down"></span></small>
                </li>
            </a>
            <li id="accordion">
                <ul id="electionCollapse"
                    class="list-unstyled panel-collapse collapse {{Request::is("election*") ? "in" :  ''}}">
                    <li><a href="/election">Home</a></li>
                    <li><a href="/election/candidates/create">Create candidate</a></li>
                    <li><a href="/election/parties/create">Create Party</a></li>
                    @if(\App\ElectionLog::latest()->first()->date_ended == null)
                        <a href="/election/vote">
                            <li>Election</li>
                        </a>
                    @endif
                </ul>
            </li>
        @endif
        @if(auth()->user()->is_student() && \App\ElectionLog::latest()->first()->date_ended == null)
            <a href="/election/vote">
                <li><span class="glyphicon glyphicon-tags"></span> Election</li>
            </a>
        @endif
        @if((auth()->user()->is_admin() || auth()->user()->is_superadmin()))
            <a href="">
                <li><span class="glyphicon glyphicon-scissors"></span> CMS</li>
            </a>
        @endif
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <li><span class="glyphicon glyphicon-off"></span> Logout</li>
        </a>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST"
          style="display: none;">{{ csrf_field() }}</form>
</nav>