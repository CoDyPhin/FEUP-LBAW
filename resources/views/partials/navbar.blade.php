<!--verify if the user is logged in or not-->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src={{asset('images/logo.png')}}
                 width=100 alt="Logo's Icon Photo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto d-flex w-100 ms-md-4">
                <li class="nav-item">
                    <a class="nav-link @isset($reviewflag) {{  ($reviewflag) ? "active" : "" }} @endisset" aria-current="page" href="/reviews">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @isset($newsflag){{ ($newsflag) ? "active" : "" }} @endisset" href="/news">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @isset($aboutflag){{ ($aboutflag) ? "active" : "" }} @endisset" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @isset($faqflag){{ ($faqflag) ? "active" : "" }} @endisset" href="/faq">FAQs</a>
                </li>
                <li class="nav-item me-md-4 ms-md-4 ms-lg-5 me-lg-5 mt-auto w-50">
                    <form action="/search" method="GET" role="search">
                        <input class="form-control" type="search" name="squery" placeholder="Search" aria-label="Search">
                    </form>
                </li>
            </ul>

            @if (!Auth::guest())
                @if (Auth::user()->is_admin)
                    <div class="administration-button me-3 mt-3 mt-md-0">
                        <button type="button" class="admin-btn btn btn-primary btn-sm d-flex"
                                onclick="window.location.href='/administration'">
                                <span class="shield material-icons m-lg-0">
                                shield
                                </span>
                            <span class="administration-title ps-1 d-md-none d-lg-block">
                                    Administration
                                </span>
                        </button>
                    </div>
                @endif
                <div class="user-notifications dropdown me-1 mt-2 mt-md-0" style="width: 53px;">
                    @if(count(Auth::user()->notifications) !== 0)
                        <span class="count badge bg-secondary">{{count(Auth::user()->notifications)}}</span>
                    @endif
                    <button class="d-flex btn btn-secondary dropdown-toggle ps-1" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="bell material-icons">
                        notifications
                        </span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-md-end p-2" aria-labelledby="dropdownMenuButton1">
                        <li>
                        <h5 class="card-title text-center notifications pb-2">Notifications</h5>
                        @if(count(Auth::user()->notifications) === 0)
                            <div class="no-notifications px-3 text-center w-100">You don't have notifications</div>
                        </li>
                        @else
                        </li>
                            @foreach($user_requests as $user_request)
                                <li class="lirequest-{{$user_request->id}}">
                                    <div class="notification p-2">
                                        <div class="d-flex ms-2">
                                            <img src='data:image;base64,{{stream_get_contents($user_request->profile_image)}}' class="rounded-circle" width="30" height="30" alt="User's Profile Photo">
                                            <p class="notification">
                                                <b>{{$user_request->username}}</b> sent you a friend request</p>
                                        </div>
                                        <div class="d-flex px-2 gap-2">
                                            <button type="button" class="btn btn-success w-50 acceptRequest" data-sender-id="{{$user_request->id}}" data-receiver-id="{{Auth::user()->id}}">Accept</button>
                                            <button type="button" class="btn btn-danger w-50 declineRequest" data-sender-id="{{$user_request->id}}" data-receiver-id="{{Auth::user()->id}}">Decline</button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="user-button dropdown">
                    <button class="d-flex btn btn-secondary dropdown-toggle ps-1" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="data:image;base64,{{stream_get_contents(Auth::user()->profile_image)}}" class="rounded-circle" width="30" height="30" alt="User's Profile Photo">
                        <span class="ps-2 d-md-none d-lg-block">{{Auth::user()->username}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start dropdown-menu-md-end"
                        aria-labelledby="dropdownMenuButton2">
                        <li>
                            <a class="dropdown-item" href="/users/{{Auth::user()->id}}">
                                <div class="icontext d-flex">
                                    <span class="material-icons">
                                        person
                                    </span>
                                    <p>Profile<p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/settings/{{Auth::user()->id}}">
                                <div class="icontext d-flex">
                                    <span class="material-icons">
                                        settings
                                    </span>
                                    <p>Settings<p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/logout">
                                <div class="icontext d-flex">
                                    <span class="material-icons">
                                        logout
                                    </span>
                                    <p>Sign Out<p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <div class="login-signup d-block d-md-flex mt-md-0" style="width: 40%">
                    <button type="button" class="btn btn-outline-primary container-fluid text-nowrap mt-2 mt-md-0"
                            data-bs-toggle="modal" data-bs-target="#loginModal">Log In
                    </button>
                    <button type="button" class="btn btn-primary container-fluid text-nowrap mt-2 mt-md-0"
                            onclick="window.location.href='/register'">Sign Up
                    </button>
                </div>
                @include('auth.recovery')
                @include('auth.login')
            @endif
        </div>
    </div>
</nav>
