@extends('layouts.app')

@section('content')
@php
    $toppath = "/top".(($newsflag) ? "news" : "").(($reviewflag) ? "reviews" : "");
    $recentpath = "/recent".(($newsflag) ? "news" : "").(($reviewflag) ? "reviews" : "");
@endphp

<div class="row m-0 w-100">
    <div class="col-md-7 mt-md-4 mx-md-auto me-md-0">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ ($topflag) ? "active" : "" }}" onclick="window.location='{{ url($toppath) }}'" id="top-tab" data-bs-toggle="tab" data-bs-target="#top" type="button"
                        role="tab" aria-controls="top" aria-selected="true">{{"Top ".(($newsflag) ? "News" : "").(($reviewflag) ? "Reviews" : "")  }}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ ($topflag) ? "" : "active" }}" onclick="window.location='{{ url($recentpath) }}'" id="recent-tab" data-bs-toggle="tab" data-bs-target="#recent" type="button"
                        role="tab" aria-controls="recent" aria-selected="false">{{"Recent ".(($newsflag) ? "News" : "").(($reviewflag) ? "Reviews" : "")  }}
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show scroll {{ ($topflag) ? "active" : "" }}" id="top" role="tabpanel" aria-labelledby="top-tab">
            </div>
            <div class="tab-pane fade show scroll {{ ($topflag) ? "" : "active" }}" id="recent" role="tabpanel" aria-labelledby="recent-tab">
            </div>
        </div>
    </div>


    <div class="newpost col col-md-2 p-3 mx-md-auto m-3 m-md-5 mb-0 order-first order-md-last">
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
        <div class="card d-none d-md-block mb-3">
            <div class="card-body p-3">
                <h5 class="card-title info text-center pb-3 m-0">
                    Top Categories
                </h5>
                @for ($i = 0; $i < 5; $i++)
                    <form class="mb-1" action="/search" method="POST">
                        @csrf
                        <input type="number" value={{$topcat[$i]->id}} name="category0" hidden>
                        <button type="submit" class="btn btn-outline-primary w-100">{{$i+1}}. {{$topcat[$i]->name}}</button>
                    </form>
                @endfor
            </div>
        </div>
        <p class="d-none d-md-block" style="text-align: center; font-size: 0.75rem;"> RNG Inc © 2021. All rights reserved </p>
    </div>


</div>

@endsection
