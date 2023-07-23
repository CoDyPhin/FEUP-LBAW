<?php
    include_once("../templates/tpl_common.php");
    draw_head();
?>

<div style="position: relative;">
        <div class="backgroundimg">
        </div>
        <?php draw_navbar_not_loged_in()?>
        <div class="signup-container signupform1 d-flex">
            <div class="signup-form-text row align-items-center vh-100 ms-auto me-auto">
                <div class="container signupform2 col-10 col-md-5" >
                    <form class="modal-dialog" method="post">
                        <div class="modal-content">
                        <div class="modal-header">
                            <div class="container-fluid">
                            <div class="row"><h5 class="modal-title" style="font-size: x-large" id="exampleModalLabel">Sign Up</h5></div>
                            <div class="row"><h6 class="small" style="font-size: small">By continuing, you agree to our User Agreement and Privacy Policy</h6></div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username" required>
                            <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" required>
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <div class="container-fluid">
                            <div class="row mb-2">
                                <button type="submit" class="btn btn-lg btn-primary">Create an Account</button>
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
</body>



