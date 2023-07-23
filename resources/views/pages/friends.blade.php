@extends('layouts.app')

@section('content')


<div class="row friends-list m-2 m-sm-5 ms-sm-5" data-id="{{$user->id}}">
    <h2 class="ms-2"> {{$user->username}}'s Friends List </h2>
    @if ($friends->count() == 0)
      <h5 class="mt-3 ms-2"> This user does not have friends yet. </h5>
    @endif
    @foreach($friends as $friend)
      <div class="col-md-6">
        <div class="friend-card card m-2 p-2" id="{{$friend->id}}">
          <div class="row">
            <div class="col-auto">
              <div class="friend-image">
                <img src="data:image;base64,{{stream_get_contents($friend->profile_image)}}" style="align-self: center;">
              </div>
            </div>
            <div class="col">
              <h5 class="card-title">{{$friend->username}}</h5>
              <p class="d-flex align-items-center"><span class="material-icons" >
                  military_tech
                  </span> {{$friend->reputation}} Reputation
              </p>
            </div>
            @auth
                @if (Auth::user()->id === $user->id)
                  <div class="remove-friend col" style="align-self: center;">
                    <button class="float-end delete-button" data-bs-toggle="modal" data-id="{{$friend->id}}" data-bs-target="#confirmModal">
                      <span class="material-icons">
                        delete
                      </span>
                    </button>
                  </div>
                @endif
            @endauth
          </div>
        </div>
      </div>
    @endforeach
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalCenterTitle">Confirmation</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Are you sure want to remove this friend?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-success delete-friend" data-bs-dismiss="modal">Yes! Remove it</button>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection
