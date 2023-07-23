@extends('layouts.app')

@section('content')
<div style="position: relative;">
  <div class="backgroundimg">
  </div>
  <div class="signup-container ">
      <div class="signup-form-text ">
          <div class="container signupform2" >
              <form class="modal-dialog" method="post" action="/reset">
                @csrf
                  <div class="modal-content">
                  <div class="modal-header">
                      <div class="container-fluid">
                      <div class="row"><h5 class="modal-title" style="font-size: x-large" id="exampleModalLabel">Recover Password</h5></div>
                      <div class="row"><h6 class="small" style="font-size: small">By continuing, you agree to our User Agreement and Privacy Policy</h6></div>
                      </div>
                  </div>
                  <input hidden name="token" placeholder="token" value="{{request()->get('token')}}">
                  <div class="modal-body">
                      <div class="form-floating mb-3">
                          <input type="email" class="form-control" id="email" name="email" value="{{request()->get('email')}}" required>
                          <label for="email">Email</label>
                          @if ($errors->has('email'))
                            <span class="error">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                      </div>
                      <div class="form-floating mb-3">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                          <label for="password">New Password</label>
                          @if ($errors->has('password'))
                            <span class="error">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required>
                        <label for="password-confirm">Confirm New Password</label>
                        </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                      <div class="container-fluid">
                      <div class="row mb-2">
                          <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
                      </div>
                  </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection