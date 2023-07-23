@extends('layouts.app')

@section('content')

<?php
use App\Models\Thread;
?>

<div class="reports-page row m-md-5 m-sm-4 m-3" >
    <div class="reported-cards col-md-8 mx-md-auto">
      <h2>Reported Posts from {{$user->username}}</h2>
      <div class="card-div me-md-5 d-flex" style="flex-direction: column;  margin-bottom: 3vh;">
        @foreach($reportedthreads as $thread)
          <div class="w-100">
            <div class="number-reports text-center float-end px-2">
              {{$thread->reports->count()}} Users Reported
            </div>
          </div>
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
      
      @foreach($reportedcomments as $comment)
        <div class="card-div me-md-5 d-flex" style="flex-direction: column;  margin-bottom: 3vh;">
          <div class="w-100">
            <div class="comment-reply-box text-center float-start px-2">
              @if (!is_null($comment->inThread))
                Replying to {{$comment->inThread->owner->username}}'s post "{{$comment->inThread->title}}"
              @else
              Replying to {{$comment->inComment->owner->username}}'s comment
              @endif
            </div>
            <div class="number-reports text-center float-end px-2">
              {{$comment->reports->count()}} Users Reported
            </div>
          </div>
          <!--for each reported comment-->
          <div class="comment-card">
            <div class="comment" id="comment-2">
              <a href="" class="comment-border-link">
                  <span class="sr-only">Jump to comment-2</span>
              </a>
              <div class="comment-heading">
                  <div class="profile-pic">
                    <img src="data:image;base64,{{stream_get_contents($comment->owner->profile_image)}}">
                  </div>
                  <div class="comment-info">
                      <a href="#" class="comment-author">{{$comment->owner->username}}</a>
                  </div>
              </div>
      
              <div class="comment-body">
                  <p>
                    {{$comment->comment_text}}
                  </p>
                  <div class="comment-icons">
                      <div class="comment-votes">
                          <span class="material-icons">
                              keyboard_arrow_up
                          </span>
                          <span class="full-icondescription">{{$comment->rating}}</span>
                          <span class="material-icons">
                              keyboard_arrow_down
                          </span>
                      </div>
                      <div class="comments">
                          <span class="material-icons">
                              mode_comment
                          </span>
                          <span class="full-icondescription">Reply</span>
                      </div>
                      <div class="time">
                          <span class="material-icons">
                              access_time
                          </span>
                          <span class="full-icondescription">{{$comment->creation_date}}</span>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="profile-report-container col-md-3 mb-3 mx-md-auto order-first order-md-last">
      
      @include('partials.profileCard') <!--user information-->

      <button type="button" class="btn btn-danger mt-2 w-100" onclick="window.location.href='/banWithRedirect/{{$user->id}}'">Ban User</button>
        <?php
        //draw_footer();
        ?>
    </div>
  </div>
  <!--<footer>
    <div class="footer-content">
        <h2>RNG Inc © 2021. All rights reserved</h2>
    </div>
  </footer>-->
</div>

@endsection