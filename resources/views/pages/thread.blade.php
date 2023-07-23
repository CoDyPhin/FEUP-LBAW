@extends('layouts.app')

@section('content')

<div class="row m-0 w-100">
    <div class="post-comments col-md-7 mt-md-5 mx-md-auto me-md-0 ">
        <section id="post">
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
            <div class="post-text p-2">
                <div class="post-title">
                    {{$thread->title}}
                </div>
                <div class="post-tags">
                    @foreach($categories as $category)
                        <button class="post-tag">
                            {{$category->name}}
                        </button>
                    @endforeach
                </div>
                <div class="post-summary">
                    <b>Summary:</b> {{$thread->summary}}
                </div>
                @if ($images->count() != 0)
                    <div class="carousel-container">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @for($index = 0; $index < $images->count(); $index++)
                                    @if ($index == 0)
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" class="active" aria-current="true" aria-label="Slide {{$index}}"></button>
                                    @else
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" aria-label="Slide {{$index}}"></button>
                                    @endif

                                @endfor
                            </div>
                            <div class="carousel-inner">
                                @for($index = 0; $index < $images->count(); $index++)
                                    @if ($index == 0)
                                        <div class="carousel-item active">
                                    @else
                                        <div class="carousel-item">
                                    @endif
                                        <img src="data:image;base64,{{stream_get_contents($images[$index]->image)}}" alt="thread-image" class="d-block">
                                    </div>
                                @endfor
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="post-coretext">
                    {{$thread->description}}
                </div>
                <div class="post-buttons align-items-center">
                    <div class="comments">
                            <span class="material-icons">
                                mode_comment
                            </span>
                        <span class="full-icondescription">{{$thread->comments->count()}} comments</span>
                        <span class="short-icondescription">{{$thread->comments->count()}}</span>
                    </div>
                    <div class="postedby">
                            <span class="material-icons">
                                person
                            </span>
                        <span class="full-icondescription">Posted by {{$thread->owner->username}}</span>
                        <span class="short-icondescription">{{$thread->owner->username}}</span>
                    </div>
                    <div class="time">
                            <span class="material-icons">
                                access_time
                            </span>
                        <span class="full-icondescription">{{$thread->creation_date}}</span>
                        <span class="short-icondescription">{{$thread->creation_date}}</span>
                    </div>
                    @auth
                        @if (Auth::user()->id === $thread->owner->id)
                            <button class="edit">
                                <a href="/threads/{{$thread->id}}/edit" class="text-decoration-none text-reset">
                                    <span class="material-icons">
                                        create
                                    </span>
                                </a>
                                <span class="full-icondescription">Edit</span>
                            </button>
                            <button class="delete" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                <span class="material-icons">
                                    delete
                                </span>
                                <span class="full-icondescription">Delete</span>
                            </button>
                            <div class="modal fade text-dark" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="exampleModalCenterTitle">Confirmation</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Are you sure want to delete this thread?</div>
                                    <div class="modal-footer">
                                        <form action="/threads/{{$thread->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-success delete-thread">Yes! Delete it</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @else
                                <button class="{{ $reported ? 'report undo' : 'report' }}"  data-bs-toggle="modal" data-thread-id="{{$thread->id}}" data-user-id="{{Auth::user()->id}}" data-bs-target="#confirmReportThreadModal">
                                    <span class="material-icons">
                                        outlined_flag
                                    </span>
                                    <span class="full-icondescription">{{ $reported ? 'Undo Report' : 'Report' }}</span>
                                </button>
                                <div class="modal fade text-dark" id="confirmReportThreadModal" tabindex="-1" role="dialog" aria-labelledby="reportArea" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="reportArea">Confirmation</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">{{ $reported ? 'Are you sure want to undo your report on this thread?' : 'Are you sure want to report this thread?' }}</div>
                                            <div class="modal-footer">
                                                <button type=button class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                <button type=button class="btn btn-success {{ $reported ? 'undoReportConfirm' : 'reportConfirm' }}" data-bs-dismiss="modal">{{ $reported ? 'Yes! Undo' : 'Yes! Report' }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endauth
                </div>
            </div>
        </section>
        @auth
            <form class="add-comment" method="post">
                @csrf
                <div class="form-group">
                    <label for="comment"> Comment as {{Auth::user()->username}} </label>
                    <textarea name="comment" class="form-control" name="text" rows="3" required></textarea>
                </div>
                <div class="post-border">
                    <button type="submit" class="btn btn-primary btn-default float-end add-comment" data-id="{{$thread->id}}">Post</button>
                </div>
            </form>
            <div class="modal fade text-dark" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyArea" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="replyArea">Reply</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="reply-form" method="POST">
                            @csrf
                            <textarea name="comment" class="form-control" name="text" rows="3" required></textarea>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="reply-form" class="btn btn-primary btn-default add-reply" data-dismiss="modal">Reply</button>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal fade text-dark" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editArea" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="editArea">Edit Comment</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-form" method="POST">
                            @csrf
                            <textarea name="comment" class="form-control" name="text" rows="3" required></textarea>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="edit-form" class="btn btn-primary btn-default edit-comment" data-dismiss="modal">Edit</button>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="deleteComment" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="deleteComment">Confirmation</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Are you sure want to delete this comment?</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                      <button type="button" class="btn btn-success delete-comment" data-bs-dismiss="modal">Yes! Delete it</button>
                    </div>
                  </div>
                </div>
            </div>
        @endauth
            <div class="comment-thread">
                <!--for each comment-->
                @include('partials.comment' , ['comments' => $comments])
            </div>
    </div>

    <div class="newpost col col-md-2 mx-md-auto m-3 m-md-5 mb-0 order-first order-md-last">
        <div class="card mb-4">
            <div class="card-body p-3">
                <h5 class="card-title info text-center pb-3 m-0">
                    Create New Post
                </h5>
                <div class="card-category text-center">Want to participate in the community? Create your own post!</div>
                @if (!Auth::guest())
                    <form id="form_ask_question" name="ask_question" action="/create_thread">
                        <button type="submit" class="btn btn-outline-primary w-100"> LET'S DO IT!</button>
                    </form>
                @else
                    <form id="form_ask_question" name="ask_question">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#loginModal"> LET'S DO IT!</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="card d-none d-md-block mb-3 p-3">
            <div class="card-title info m-0 pb-3 posting-to-rng-title d-flex text-center">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{asset('images/logoshort.png')}}" alt="thread-image" width="32px" height="22px" class="me-2 align-self-center">
                    <h5 class="m-0">Posting to RNG</h5>
                </div>
            </div>
            <div class="card-category">
                <h6 class="m-0">1. Don't be offensive</h6>
            </div>
            <div class="card-category">
                <h6 class="m-0">2. Behave like you would in real life</h6>
            </div>
            <div class="card-category">
                <h6 class="m-0">3. Look for the original source of content</h6>
            </div>
            <div class="card-category">
                <h6 class="m-0">4. Search for duplicates before posting</h6>
            </div>
            <div class="card-category">
                <h6 class="m-0">5. Read the FAQs</h6>
            </div>
        </div>
        <footer>
            <div class="d-none d-md-block footer-content">
                <h2>RNG Inc © 2021. All rights reserved</h2>
            </div>
        </footer>
    </div>
</div>


@endsection
