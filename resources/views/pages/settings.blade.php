@extends('layouts.app')

@section('content')

@if ($errors->has('password'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert" onclick="slideUp()">x</button>	
        <strong>Passwords either don't match or are too short!</strong>
    </div>
@endif

<section id="settings-grid">
    <label class="settings-grid-title">Settings</label>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Profile
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Security
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form class="mt-3" method="post" action="/users/{{$user->id}}/edit" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile-settings">
                    <h5>Profile Image</h5>
                    <div class="username-settings p-2">
                        <div class="row w-100 m-0">
                            <div class="friend-image col-md-auto p-0" style="align-self: center;">
                                <img class="friend-image profile-image" src="data:image;base64,{{stream_get_contents($user->profile_image)}}">
                            </div>
                            <div class="col ps-0 ms-md-3 mt-0 w-100">
                                <label for="exampleFormControlFile1"></label>
                                <input type="file" class="w-100 form-control-file submit-profile-pic" id="exampleFormControlFile1" name="profile_image">
                            </div>
                        </div>
                    </div>
                    <h5>Profile Header</h5>
                    <div class="username-settings p-3">
                        <div class="row w-100 m-0">
                            <div class="col-md-auto p-0">
                                <div class="header-image col-md-auto p-0" style="align-self: center;">
                                    @if (!is_null($user->header_image))
                                        <img class="profile-header header-image" src="data:image;base64,{{stream_get_contents($user->header_image)}}">
                                    @else
                                        <img class="profile-no-header header-image" style="background-image: url('../images/esports.jpg'); border-radius: 0px;">
                                    @endif
                                </div>
                            </div>
                            <div class="col ps-0 ms-md-3 mt-0 w-100">
                                <label for="exampleFormControlFile1"></label>
                                <input type="file" class="w-100 form-control-file submit-header-pic" id="exampleFormControlFile1" name="header_image">
                            </div>

                        </div>
                    </div>
                    <h5>Profile Settings</h5>
                    <div class="username-settings p-3">
                        <div class="username-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="username" class="form-control" id="username" name="username" value="{{$user->username}}" required>
                                <p>Change your username</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$user->description}}</textarea>
                                <p>Must not exceed 200 characters</p>
                                <input type="submit" class="confirm-profile-settings btn btn-primary" value="Save Settings">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="profile-settings m-3">
                <form class="personal-settings" method="post" action="/users/{{$user->id}}/deleteaccount" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5>Account Deletion</h5>
                    <div class="username-settings">
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword2" class="form-control"
                                       aria-describedby="passwordHelpInline" name="password" required>
                            </div>
                        </div>
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword3" class="form-control"
                                       aria-describedby="passwordHelpInline" name="password_confirmation" required>
                                <p>Repeat your password</p>
                                <button type="submit" class="confirm-profile-settings btn btn-primary">Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="personal-settings" method="post" action="/users/{{$user->id}}/editpassword" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5>Password</h5>
                    <div class="username-settings">
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword1" class="form-control"
                                       aria-describedby="passwordHelpInline" name="old_password" required>
                            </div>
                        </div>
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword2" class="form-control"
                                       aria-describedby="passwordHelpInline" name="password" required>
                            </div>
                        </div>
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword3" class="form-control"
                                       aria-describedby="passwordHelpInline" name="password_confirmation" required>
                                <p>Repeat your password</p>
                                <button type="submit" class="confirm-profile-settings btn btn-primary">Save Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="personal-settings" method="post" action="/users/{{$user->id}}/editemail" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5>Email Address</h5>
                    <div class="username-settings">
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">New Email Address</label>
                            <div class="col-sm-10">
                                <input type="text" id="inputPassword4" class="form-control"
                                       aria-describedby="passwordHelpInline" name="email" required>
                            </div>
                        </div>
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Confirm Email Address</label>
                            <div class="col-sm-10">
                                <input type="text" id="inputPassword5" class="form-control"
                                       aria-describedby="passwordHelpInline" name="email_confirmation" required>
                                <p>Repeat your email address</p>
                                <button type="submit" class="confirm-profile-settings btn btn-primary">Save Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection