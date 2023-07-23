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
@php $images = array(); @endphp
<div class="row m-0 w-100">
    <div class="col-md-7 mt-5 mx-md-auto me-md-0">
        <div class="results-title">
            <h2>{{($searchstr == "") ? "Results for current filters" : "Results for \"".$searchstr."\""}}</h2>
            <a href="/search?squery={{$searchstr}}">
                <p class="secondary-title">Search for Posts Instead</p>
            </a>
        </div>
        <ul class="nav nav-tabs d-block d-sm-flex" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                        type="button" role="tab" aria-controls="all" aria-selected="true">All
                </button>
            </li>
            @if (!Auth::guest())
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends"
                        type="button" role="tab" aria-controls="friends" aria-selected="false">Friends
                </button>
            </li>
            @endif
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins" type="button"
                        role="tab" aria-controls="admins" aria-selected="false">Administrators
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                @if($users->count() == 0)
                    <h4 class="mt-3"> No results found. Please check your filters. </h4>
                @endif
                @foreach($users as $user)
                <a class="text-decoration-none text-reset" href="/users/{{$user->id}}">
                    <div class="friend-card card m-2 mt-3 p-2">
                        <div class="row">
                            <div class="col-auto d-flex align-items-center">
                                <div class="friend-image">
                                    @php $images[$user->id] = stream_get_contents($user->profile_image) @endphp
                                    <img src="data:image;base64,{{$images[$user->id]}}">
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="card-title">{{$user->username}}</h5>
                                <p class="d-flex align-items-center"><span class="material-icons" >
                                    military_tech
                                    </span> {{$user->reputation}} Reputation
                                </p>
                                <p class="d-flex align-items-center">{{$user->description}}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @if (!Auth::guest())
                <div class="tab-pane fade show" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                    @php $count = 0; @endphp
                    @foreach($users as $user)
                        @if($user->friendCheck(Auth::user()->id))
                        @php $count += 1; @endphp
                            <a class="text-decoration-none text-reset" href="/users/{{$user->id}}">
                                <div class="friend-card card m-2 mt-3 p-2">
                                    <div class="row">
                                        <div class="col-auto d-flex align-items-center">
                                            <div class="friend-image">
                                                <img src="data:image;base64,{{$images[$user->id]}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h5 class="card-title">{{$user->username}}</h5>
                                            <p class="d-flex align-items-center"><span class="material-icons" >
                                                military_tech
                                                </span> {{$user->reputation}} Reputation
                                            </p>
                                            <p class="d-flex align-items-center">{{$user->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                    @if($count == 0)
                        <h4 class="mt-3"> No results found. Please check your filters. </h4>
                    @endif
                </div>
            @endif
            <div class="tab-pane fade show" id="admins" role="tabpanel" aria-labelledby="admins-tab">
                @php $count = 0; @endphp
                @foreach($users as $user)
                    @if($user->is_admin)
                    @php $count += 1; @endphp
                        <a class="text-decoration-none text-reset" href="/users/{{$user->id}}">
                            <div class="friend-card card m-2 mt-3 p-2">
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <div class="friend-image">
                                            <img src="data:image;base64,{{$images[$user->id]}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title">{{$user->username}}</h5>
                                        <p class="d-flex align-items-center"><span class="material-icons" >
                                            military_tech
                                            </span> {{$user->reputation}} Reputation
                                        </p>
                                        <p class="d-flex align-items-center">{{$user->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
                @if($count == 0)
                    <h4 class="mt-3"> No results found. Please check your filters. </h4>
                @endif
            </div>
        </div>
    </div>

    <div class="card col col-md-3 p-3 mx-md-auto m-3 m-md-5 mb-0 order-first order-md-last"
         style="height: 100%">
        <h5>Filters</h5>
        <form action="/search_user" method="post">
            @csrf
            <div class="form-group">
                <label class="mt-2" for="exampleFormControlSelect1">Text</label>
                <input class="form-control" type="search" name="searchstr" placeholder="Search" aria-label="Search" value="{{$searchstr}}">
                <label class="mt-2" for="exampleFormControlSelect1">Posted on Categories</label>
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
                    <option value="rdesc" {{ $prevreq->orderby == "rdesc" ? "selected" : "" }}>Reputation &darr;</option>
                    <option value="rasc" {{ $prevreq->orderby == "rasc" ? "selected" : "" }}>Reputation &uarr;</option>
                </select>
                <label class="mt-2" for="exampleFormControlSelect1">Reputation</label>
                <div class="mb-3">
                    <input type="number" value={{ $prevreq->minrating == NULL ? NULL : $prevreq->minrating }} step="1" class="form-control mb-1" id="exampleInputEmail1" name="minrating" 
                           aria-describedby="emailHelp" placeholder="Minimum Reputation">
                    <input type="number" value={{ $prevreq->maxrating == NULL ? NULL : $prevreq->maxrating }} step="1" class="form-control" id="exampleInputEmail1" name="maxrating" 
                           aria-describedby="emailHelp" placeholder="Maximum Reputation">
                </div>
                <label for="exampleFormControlSelect1">Other</label>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckChecked"
                           style="font-size: 12px; margin-bottom: 15px;">
                        Include biography
                    </label>
                    <input class="form-check-input" name="description" type="checkbox" id="flexCheckChecked" {{ $prevreq->has('description') ? "checked" : "" }}>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>
    </div>
</div>

@endsection