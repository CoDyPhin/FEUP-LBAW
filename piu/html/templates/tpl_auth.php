<?php

function draw_login(){
    ?>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <div class="container-fluid">
                <div class="row"><h5 class="modal-title" style="font-size: x-large" id="exampleModalLabel">Log In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="row"><h6 class="small" style="font-size: small">By continuing, you agree to our User Agreement and Privacy Policy</h6></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                <div class="container-fluid">
                <div class="row mb-2">
                    <button type="button" class="btn btn-lg btn-primary">Log In</button>
                </div>
                <div class="row">
                    <div class="col">
                    <h6 class="small">New to RNG? <a href="./signup.html">Sign Up </a></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><hr></div>
                    <div class="col-auto">OR</div>
                    <div class="col"><hr></div>
                </div>
                <div class="row mb-2"></div>
                <div class="row mb-2">
                    <button type="button" class="btn btn-lg btn-outline-primary"><img src="https://cdn.iconscout.com/icon/free/png-256/google-231-432517.png" width="20em"></img> Sign In With Google</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

<?php

function draw_sign_up(){
    ?>
    <div style="position: relative;">
        <div class="backgroundimg"></div>
        <div class="container signupform1">
            <div class="container signupform2">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <div class="container-fluid">
                        <div class="row"><h5 class="modal-title" style="font-size: x-large" id="exampleModalLabel">Sign Up</h5></div>
                        <div class="row"><h6 class="small" style="font-size: small">By continuing, you agree to our User Agreement and Privacy Policy</h6></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                        <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password">
                            <label for="floatingPassword">Confirm Password</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                        <div class="container-fluid">
                        <div class="row mb-2">
                            <button type="button" class="btn btn-lg btn-primary">Create an Account</button>
                        </div>
                        <div class="row">
                            <div class="col"><hr></div>
                            <div class="col-auto">OR</div>
                            <div class="col"><hr></div>
                        </div>
                        <div class="row mb-2"></div>
                        <div class="row mb-2">
                            <button type="button" class="btn btn-lg btn-outline-primary"><img src="https://cdn.iconscout.com/icon/free/png-256/google-231-432517.png" width="20em"></img> Sign Up With Google</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container signupform1 text-center">
            <h1 style="color: white;">Become a part of our Community!</h1>
            <h3 style="color: white;">Keep up with the latest reviews and news in Gaming.</h3>
        </div>
    </div>

<?php

}}

?>