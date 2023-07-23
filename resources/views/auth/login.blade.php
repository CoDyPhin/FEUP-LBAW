@if ($errors->has('username') || $errors->has('password'))
<script>
    $(document).ready(function () {
        $('#loginModal').modal('show');
    });
</script>
@endif

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="post" action="/login">
            @csrf
            <div class="modal-header">
                <div class="container-fluid">
                    <div class="row"><h5 class="modal-title" style="font-size: x-large" id="loginModalLabel">Log In</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="row"><h6 class="small" style="font-size: small">By continuing, you agree to our User Agreement and Privacy Policy</h6></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <label for="username">Username or Email</label>
                    @if ($errors->has('username'))
                        <span class="error">
                        {{ $errors->first('username') }}
                        </span>
                    @endif
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                        <span class="error">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 class="small">New to RNG? <a href="/register">Sign Up </a></h6>
                        </div>
                        <div class="d-flex justify-content-end">
                            <h6 class="small"><a href="#recoveryModal" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#recoveryModal">Forgot your password? </a></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><hr></div>
                        <div class="col-auto">OR</div>
                        <div class="col"><hr></div>
                    </div>
                    <div class="row mb-2"></div>
                    <div class="row mb-2">
                    <button type="button" class="btn btn-lg btn-outline-primary"><img src="https://cdn.iconscout.com/icon/free/png-256/google-231-432517.png" width="20"></img> Sign In With Google</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
