<div class="row">
    <div class=" main-section text-center">
        <div class="row">
          @if ($user->header_image != null)
            <div class="profile-header" style="background: url('data:image;base64,{{stream_get_contents($user->header_image)}}')"></div>
          @else
            <div class="profile-header" style="background-image: url('https://picsum.photos/500')"></div>
          @endif
            
        </div>
        <div class="row user-detail">
            <div class="user-info p-0">
              <div class="profile-image">
                <img src="data:image;base64,{{stream_get_contents($user->profile_image)}}">               
              </div>
                <h5>{{$user->username}}</h5>
                <div class="user-stats">
                  <button class="friends-button d-flex align-items-center" onclick="location.href='{{$user->id}}/friends'"><span class="material-icons m-2">
                                groups
                            </span> {{$user->friends()->count()}} Friends</button>
                  <button class="reputation-button d-flex align-items-center"><span class="material-icons" >
                                military_tech
                            </span> {{$user->reputation}} Reputation</button>
                </div>
                <p>{{$user->description}}</p>
            </div>
        </div>
    </div>
  </div>