@foreach ($comments as $comment)
    @php $reported = $comment->hasReported() @endphp
    <div class="comment" id="comment-{{$comment->id}}">
        <a href="#comment-{{$comment->id}}" class="comment-border-link">
            <span class="sr-only">Jump to comment-{{$comment->id}}</span>
        </a>
        <div class="comment-heading">
            <div class="profile-pic">
                <img src="data:image;base64,{{stream_get_contents($comment->owner->profile_image)}}" alt="profile-image">
            </div>
            <div class="comment-info">
                <a href="/users/{{$comment->owner->id}}" class="comment-author">{{$comment->owner->username}}</a>
            </div>
        </div>

        <div class="comment-body">
            <p>
                {{$comment->comment_text}}
            </p>
            <div class="comment-icons align-items-center">
                <div class="comment-votes align-items-center">
                    <button class="material-icons upvote"
                    @auth
                        @if (Auth::check() && $comment->hasVoted(Auth::user()->id) != null && $comment->hasVoted(Auth::user()->id)->upvote == true)
                            style="color:{{'var(--logoblue);'}}"
                        @endif
                    @endauth data-id='{{$comment->id}}'>
                        keyboard_arrow_up
                    </button>
                    <span class="rating" data-id="{{$comment->id}}">{{$comment->rating}}</span>
                    <button class="material-icons downvote"
                    @auth
                        @if (Auth::check() && $comment->hasVoted(Auth::user()->id) != null && $comment->hasVoted(Auth::user()->id)->upvote == false)
                            style="color:{{'var(--dangercolor);'}}"
                        @endif
                    @endauth data-id='{{$comment->id}}'>
                        keyboard_arrow_down
                    </button>
                </div>
                <button class="comments" data-id="{{$comment->id}}" @if(Auth::check()) data-bs-toggle="modal" data-bs-target="#replyModal" @else data-bs-toggle="modal" data-bs-target="#loginModal" @endif>
                    <span class="material-icons">
                        mode_comment
                    </span>
                    <span class="full-icondescription">Reply</span>
                </button>
                <div class="time">
                    <span class="material-icons">
                        access_time
                    </span>
                    <span class="full-icondescription">{{$comment->creation_date}}</span>
                </div>
                @auth
                    @if (Auth::user()->id === $comment->owner->id)
                        <button class="edit" data-id="{{$comment->id}}" data-bs-toggle="modal" data-bs-target="#editModal">
                            <span class="material-icons">
                                create
                            </span>
                            <span class="full-icondescription">Edit</span>
                        </button>
                        <button class="delete" data-id="{{$comment->id}}" data-bs-toggle="modal" data-bs-target="#deleteCommentModal">
                            <span class="material-icons">
                                delete
                            </span>
                            <span class="full-icondescription">Delete</span>
                        </button>
                    @else
                        <button class="{{ $reported ? 'report undo comment-'.$comment->id : 'report comment-'.$comment->id }}"  data-bs-toggle="modal" data-bs-target="#confirmReportComment-{{$comment->id}}">
                                    <span class="material-icons">
                                        outlined_flag
                                    </span>
                            <span class="full-icondescription">{{ $reported ? 'Undo Report' : 'Report' }}</span>
                        </button>
                        <div class="modal fade text-dark" id="confirmReportComment-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="reportArea" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="reportArea">Confirmation</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">{{ $reported ? 'Are you sure want to undo your report on this comment?' : 'Are you sure want to report this comment?' }}</div>
                                    <div class="modal-footer">
                                        <button type=button class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                        <button type=button class="btn btn-success {{ $reported ? 'undoReportCommentConfirm' : 'reportCommentConfirm' }}" data-user-id="{{Auth::user()->id}}" data-comment-id="{{$comment->id}}" data-bs-dismiss="modal">{{ $reported ? 'Yes! Undo' : 'Yes! Report' }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>

        <div class="replies">
            @include('partials.comment', ['comments' => $comment->comments])
        </div>
    </div>
@endforeach
