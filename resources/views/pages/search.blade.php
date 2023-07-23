@extends('layouts.app')

@section('content')

<script>
    var selectionCounter = 0;
    function showSelect() {
        if(selectionCounter >= 9){
            var bttn = document.getElementById("categorybttn");
            bttn.className = "add-category-button d-none";
            return;
        }
        selectionCounter++;
        selid = "selector" + selectionCounter;
        var select = document.getElementById(selid);
        if(select.getAttribute('hidden')!=null){
            select.removeAttribute("hidden");
        }
        else{
            showSelect();
        }
    }
</script>

<div class="row m-0 w-100">
    <div class="col-md-7 mt-5 mx-md-auto me-md-0">
        <div class="results-title">
            <h2>{{($searchstr == "") ? "Results for current filters" : "Results for \"".$searchstr."\""}}</h2>
            <a href="/search_user?squery={{$searchstr}}">
                <p class="secondary-title">Search for Users Instead</p>
            </a>
        </div>
        <ul class="nav nav-tabs d-block d-sm-flex" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                        role="tab" aria-controls="all" aria-selected="true">All
                </button>
            </li>
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button"
                        role="tab" aria-controls="reviews" aria-selected="false">Reviews
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button"
                        role="tab" aria-controls="news" aria-selected="false">News
                </button>
            </li>-->
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show scroll active" id="all" role="tabpanel" aria-labelledby="all-tab">
                @if($threads->count() == 0)
                    <h4 class="mt-3"> No results found. Please check your filters. </h4>
                @endif
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
                                        <span class="full-icondescription">Posted by {{ $thread->owner->username }} </span>
                                        <span class="short-icondescription">{{ $thread->owner->username }}</span>
                                    </div>
                                    <div class="time">
                                        <span class="material-icons"> access_time </span>
                                        <span class="full-icondescription">{{ $thread->creation_date }}</span>
                                        <span class="short-icondescription"> {{ explode(' ', $thread->creation_date)[1] }}</span>
                                    </div>
                                </div>
                                @if($thread->images->count() != 0)
                                    <div class="image">
                                        <img src="data:image;base64,{{stream_get_contents($thread->images[0]->image)}}" alt="thread-image" class=".figure-img">
                                    </div>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card col col-md-3 p-3 mx-md-auto m-3 m-md-5 mb-0 order-first order-md-last mw-25" style="height: 100%">
        <h5>Filters</h5>
        <form action="/search" method="post">
            @csrf
            <div class="form-group">
                <label class="mt-2" for="exampleFormControlSelect1">Text</label>
                <input class="form-control" type="search" name="searchstr" placeholder="Search" aria-label="Search" value="{{$searchstr}}">
                <label class="mt-2" for="exampleFormControlSelect1">Categories</label>
                <div id="categories">
                    <div>
                        <select class="categories-select" name="category0" aria-placeholder="Select a Category">
                            <option value="-1" {{ $prevreq->category0 == -1 ? "selected" : "" }}>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value={{$category->id}} {{ $prevreq->category0 == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @for($i = 1; $i < 10; $i++)
                        <div id={{"selector".$i}} {{ $prevreq->{'category'.$i} == -1 || $prevreq->{'category'.$i} == null? "hidden" : ""}}>
                            <select class="categories-select" name="{{"category".$i}}" aria-placeholder="Select a Category">
                                <option value="-1" {{ $prevreq->{'category'.$i} == -1 ? "selected" : "" }}>Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value={{$category->id}} {{ $prevreq->{'category'.$i} == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endfor
                </div>
                <div class="add-category-button d-flex" id="categorybttn" onclick="showSelect()">
                    <span class="material-icons">
                      add_circle_outline
                    </span>
                    <p>Add Another Category</p>
                </div>
                <label for="exampleFormControlSelect1">Order By</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="orderby">
                    <option value="cdesc" {{ $prevreq->orderby == "cdesc" ? "selected" : "" }}>Most Relevant</option>
                    <option value="tdesc" {{ $prevreq->orderby == "tdesc" ? "selected" : "" }}>Rating &darr;</option>
                    <option value="tasc" {{ $prevreq->orderby == "tasc" ? "selected" : "" }}>Rating &uarr;</option>
                    <option value="rdesc" {{ $prevreq->orderby == "rdesc" ? "selected" : "" }}>Most Recent</option>
                    <option value="rasc" {{ $prevreq->orderby == "rasc" ? "selected" : "" }}>Oldest</option>
                </select>
                <label class="mt-2" for="exampleFormControlSelect1">Rating</label>
                <div class="mb-3">
                    <input type="number" value={{ $prevreq->minrating == NULL ? NULL : $prevreq->minrating }} step="1" class="form-control" name="minrating" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Minimum Rating" style="margin-bottom: 5px;">
                    <input type="number" value={{ $prevreq->minrating == NULL ? NULL : $prevreq->maxrating }} step="1" class="form-control" name="maxrating" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Maximum Rating">
                </div>
                <label for="before">Before</label>
                <div class="mb-3">
                    <input class="form-control" value="{{ $prevreq->maxdate == NULL ? NULL : $prevreq->maxdate }}" type="date" name="maxdate">
                </div>
                <label for="after">After</label>
                <div class="mb-3">
                    <input class="form-control" value="{{ $prevreq->mindate == NULL ? NULL : $prevreq->mindate }}" type="date" name="mindate">
                </div>
                <label for="exampleFormControlSelect1">Other</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="description" id="flexCheckChecked" {{ $prevreq->has('description') ? "checked" : "" }}>
                    <label class="form-check-label" for="flexCheckChecked"
                           style="font-size: 12px; margin-bottom: 15px;">
                        Include Description
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>
    </div>
</div>

@endsection
