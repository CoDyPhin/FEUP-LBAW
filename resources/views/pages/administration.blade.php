@extends('layouts.app')

@section('content')

<div class="mt-4 ms-5" style="width: 60%;">
    <div class ="post-content" style="font-size: 1em;">
      <ul class="nav nav-tabs d-block d-sm-flex" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="reported-users-tab" data-bs-toggle="tab" data-bs-target="#reported-users" type="button" role="tab" aria-controls="reported-users" aria-selected="true">Reported Users</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="banned-users-tab" data-bs-toggle="tab" data-bs-target="#banned-users" type="button" role="tab" aria-controls="banned-users" aria-selected="false">Banned Users</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="award-users-tab" data-bs-toggle="tab" data-bs-target="#award-users" type="button" role="tab" aria-controls="award-users" aria-selected="false">Award Admin</button>
        </li>
      </ul>
    </div>
  </div>
  <div class="tab-content" id="myTabContent" style="position: relative; bottom: 25px;">
    <div class="tab-pane fade show active" id="reported-users" role="tabpanel" aria-labelledby="reported-users-tab">
      <div class="content ms-4 mt-5 me-4 ms-sm-5 me-sm-5">

        <!-- for each reported user-->
        @foreach($reported as $user)
          <div class="col col-lg-6 col-md-9">
            <div class="container friend-card card m-sm-2 mb-2 p-2" id="{{$user->id}}" data-id="{{$user->id}}">
              <div class="row">
                <div class="col-auto mb-2">
                  <div class="friend-image">
                    <img src="data:image;base64,{{stream_get_contents($user->profile_image)}}">
                  </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                  <h5 class="card-title">{{$user->username}}</h5>
                  <p class="d-flex align-items-center"><span class="material-icons" >
                  military_tech
                  </span> {{$user->reputation}} Reputation
                  </p>
                </div>
                <div class="col" style="align-self: center;">
                  <button type="button" class="btn btn-outline-secondary float-end w-75 mb-2 d-flex" onclick="window.location.href='reported/{{$user->id}}'">
                    <p class="w-100 m-0">See Reported Posts </p>
                    <span class="material-icons">
                      keyboard_arrow_right
                    </span>
                  </button>
                  <button type="button" class="btn btn-danger ban-user float-end w-75">Ban User</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>


    <div class="tab-pane fade show" id="banned-users" role="tabpanel" aria-labelledby="banned-users-tab">
      <div class="banned-users-list content ms-4 mt-5 me-4 ms-sm-5 me-sm-5">

        @foreach($banned as $user)
          <div class="col col-lg-6 col-md-9 banned-users-card" data-id="{{$user->id}}">
            <div class="container friend-card card m-sm-2 mb-2 p-2" id="{{$user->id}}" data-id="{{$user->id}}">
              <div class="row">
                <div class="col-auto mb-2">
                  <div class="friend-image">
                    <img src="data:image;base64,{{stream_get_contents($user->profile_image)}}">
                  </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                  <h5 class="card-title">{{$user->username}}</h5>
                  <p class="d-flex align-items-center">
                    <span class="material-icons" >
                    military_tech
                    </span>
                    {{$user->reputation}} Reputation
                  </p>
                </div>
                <div class="col" style="align-self: center;">
                  <button type="button" class="btn btn-success unban-user float-end w-75">Unban User</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>



    <div class="tab-pane fade show" id="award-users" role="tabpanel" aria-labelledby="award-users-tab">
      <div class="content admin-list ms-4 mt-5 me-4 ms-sm-5 me-sm-5">

        @foreach($admins as $user)
          <div class="col col-lg-6 col-md-9">
            <div class="container friend-card card m-sm-2 mb-2 p-2" id="{{$user->id}}" data-id="{{$user->id}}">
              <div class="row">
                <div class="col-auto mb-2">
                  <div class="friend-image">
                    <img src="data:image;base64,{{stream_get_contents($user->profile_image)}}">
                  </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                  <h5 class="card-title">{{$user->username}}</h5>
                  <p class="d-flex align-items-center"><span class="material-icons" >
                  military_tech
                  </span> {{$user->reputation}} Reputation
              </p>
                </div>
                <div class="col" style="align-self: center;">
                  <button type="button" class="btn btn-outline-secondary float-end w-75 mb-2 d-flex" onclick="window.location.href='./topposts/{{$user->id}}'">
                    <p class="w-100 m-0">See Top Posts </p>
                    <span class="material-icons">
                      keyboard_arrow_right
                    </span>
                  </button>
                  <button type="button" class="btn btn-success float-end w-75" onclick="window.location.href='/awardadmin/{{$user->id}}'">Award Administrator</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>

@endsection
