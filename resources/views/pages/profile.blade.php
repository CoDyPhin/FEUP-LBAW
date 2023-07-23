@extends('layouts.app')

@section('content')

<div class="profile row m-md-5 m-sm-4 m-3">
    <div class="col-md-8 mx-md-auto">
        <div class="w-100">
            @if ($threads->count() != 0)
                <h5 class="ms-md-5">Posts from {{ $user->username }}</h5>
            @else
            <h5 class="ms-md-5">This user does not have posts yet.</h5>
            @endif

            <div class="post-content-profile ms-md-5">
                <div class="tab-content" id="myTabContent">
                    <div class="threads" style="display:flex; flex-direction: column; gap: 2.5vh; position: relative;">

                        <!-- for each thread-->
                        @foreach($threads as $thread)
                            <div class="thread-card d-flex">
                                <div class="vote" style="display: flex; justify-content: center; align-items: center; ">
                                    <div class="votes">
                                        <button class="material-icons upvote d-flex justify-content-center"
                                            @auth
                                                @if (Auth::check() && $thread->hasVoted(Auth::user()->id) != null && $thread->hasVoted(Auth::user()->id)->upvote == true)
                                                style="color:{{'var(--logoblue);'}}"
                                                @endif
                                            @endauth data-id='{{$thread->id}}'>
                                                keyboard_arrow_up
                                        </button>
                                        <p style="font-size: 20px; display: flex; justify-content: center; position: relative; top: 5px;" data-id='{{$thread->id}}'> {{$thread->rating}}</p>
                                        <button class="material-icons downvote d-flex justify-content-center"
                                            @auth
                                                @if (Auth::check() && $thread->hasVoted(Auth::user()->id) != null && $thread->hasVoted(Auth::user()->id)->upvote == false)
                                                    style="color:{{'var(--dangercolor);'}}"
                                                @endif
                                            @endauth data-id='{{$thread->id}}'>
                                                    keyboard_arrow_down
                                        </button>
                                    </div>
                                </div>
                                <a class="text-decoration-none text-reset" href="/threads/{{$thread->id}}" style="width: 100%;">
                                    <div class="card-grid" style="position:relative;">
                                        <div class="title">{{$thread->title}}</div>
                                        <div class="text">{{$thread->summary}}</div>
                                        <div class="buttons">
                                            <div class="comments">
                                                <span class="material-icons">
                                                    mode_comment
                                                </span>
                                                <span class="full-icondescription">{{ $thread->comments->count() }} comments</span>
                                                <span class="short-icondescription">{{ $thread->comments->count() }}</span>
                                            </div>
                                            <div class="postedby">
                                                <span class="material-icons"> person</span>
                                                <span class="full-icondescription">Posted by {{ $user->username }} </span>
                                                <span class="short-icondescription">{{ $user->username }}</span>
                                            </div>
                                            <div class="time">
                                                <span class="material-icons"> access_time </span>
                                                <span class="full-icondescription">{{ $thread->creation_date }}</span>
                                                <span class="short-icondescription"> {{ explode(' ', $thread->creation_date)[1] }}</span>
                                            </div>
                                        </div>
                                        @if($thread->images->count() != 0)
                                            <div class="image">
                                                <img src="data:image;base64,{{stream_get_contents($thread->images[0]->image)}}" class=".figure-img">
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container col-md-3 mb-3 order-first order-md-last">

        @include('partials.profileCard', ['user'=>$user]) <!--user information-->
        @auth
            @if($user->id !== Auth::user()->id && !$areFriends && !$hasRequest)
                <button type="button" class="btn btn-primary mt-2 friend-request-button" data-receiver-id="{{$user->id}}" data-sender-id="{{Auth::user()->id}}" style="width:100%;">SEND FRIEND REQUEST</button>
            @elseif($hasRequest)
                <button type="button" class="btn btn-primary mt-2 friend-removerequest-button" data-receiver-id="{{$user->id}}" data-sender-id="{{Auth::user()->id}}" style="width:100%;">REMOVE FRIEND REQUEST</button>
            @endif
        @endauth
        <footer>
            <div class="d-none d-md-block footer-content">
                <h2>RNG Inc © 2021. All rights reserved</h2>
            </div>
        </footer>
    </div>

</div>

@endsection
