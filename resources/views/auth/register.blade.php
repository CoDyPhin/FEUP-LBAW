@extends('layouts.app')

@section('content')
<div style="position: relative;">
  <div class="backgroundimg">
  </div>
    <div class="signup-container">
        <div class="signup-form-text-grid">
            <div class="container signup-form2" >
                <form onsubmit="return registerValidate(this)" class="modal-dialog" method="post" action="/register">
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <div class="container-fluid">
                        <div class="row"><h5 class="modal-title" style="font-size: x-large" id="exampleModalLabel">Sign Up</h5></div>
                        <div class="row"><h6 class="small" style="font-size: small">By continuing, you agree to our User Agreement and Privacy Policy</h6></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Username" title="Usernames must be between 3 and 12 characters" required>
                        <label for="username" class="form-label required">Username</label>
                        @if ($errors->register->has('username'))
                            <span class="error">
                                {{ $errors->register->first('username') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" title="Example email: name@example.com" placeholder="name@example.com" required>
                            <label for="email" class="form-label required" >Email</label>
                            @if ($errors->register->has('email'))
                                <span class="error">
                                    {{ $errors->register->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" title="Password must be at least 6 characters long" placeholder="Password" required>
                            <label for="password" class="form-label required" >Password</label>
                            @if ($errors->register->has('password'))
                                <span class="error">
                                    {{ $errors->register->first('password') }}
                                </span>
                                @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" title="Password must be at least 6 characters long" placeholder="Confirm Password" required>
                            <label for="password-confirm" class="form-label required" >Confirm Password</label>
                            </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="container-fluid">
                        <div class="row mb-2">
                            <button type="submit" class="btn btn-lg btn-primary" >Create an Account</button>
                        </div>
                        <div class="row">
                            <div class="col"><hr></div>
                            <div class="col-auto">OR</div>
                            <div class="col"><hr></div>
                        </div>
                        <div class="row mb-2"></div>
                            <div class="row mb-2">
                                <button type="button" class="btn btn-lg btn-outline-primary"><img src="https://cdn.iconscout.com/icon/free/png-256/google-231-432517.png" width="20"></img> Sign Up With Google</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <div class="container signupform1 text-center col">
                <h1 style="color: white;">Become a part of our Community!</h1>
                <h3 style="color: white;">Keep up with the latest reviews and news in Gaming.</h3>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
