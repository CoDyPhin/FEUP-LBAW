<?php
include_once("../templates/tpl_common.php");
draw_head();
draw_navbar();
?>

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
            <div class="mt-3">
                <div class="profile-settings">
                    <h5>Profile Image</h5>
                    <div class="username-settings p-2">
                        <div class="row w-100 m-0">
                            <div class="friend-image col-md-auto p-0" style="align-self: center;">
                                <img src="../assets/carlos.jpg">
                            </div>
                            <div class="col ps-0 ms-md-3 mt-0 w-100">
                                <label for="exampleFormControlFile1"></label>
                                <input type="file" class="w-100 form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                    <h5>Profile Header</h5>
                    <div class="username-settings p-2">
                        <div class="row w-100 m-0">
                            <div class="col-md-4 p-0">
                                <div class="profile-header" style="background: url('https://picsum.photos/500')"></div>
                            </div>
                            <div class="col ps-0 ms-md-3 mt-0 w-100">
                                <label for="exampleFormControlFile1"></label>
                                <input type="file" class="w-100 form-control-file" id="exampleFormControlFile1">
                            </div>

                        </div>
                    </div>
                <div class="personal-settings">
                    <h5>Profile Settings</h5>
                    <form class="username-settings" method="post">
                        <div class="username-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="username" class="form-control" id="username" value="CoDyPhin" required>
                                <p>Change your username</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Hearthstone Player representing FTW Esports; Studying Computer Engineering in Universidade do Porto (FEUP); Current FTW Academy LGW Challenge champion; 5th-6th in RedBull MEO National Finals; 192nd in Masters Tour Asia-Pacific: Online; Overall gaming addict</textarea>
                                <p>Must not exceed 200 characters</p>
                                <button type="submit" class="confirm-profile-settings btn btn-primary">Save Settings
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="profile-settings m-3">
                <form class="personal-settings" method="post">
                    <h5>Password</h5>
                    <div class="username-settings">
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Old Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword6" class="form-control"
                                       aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword6" class="form-control"
                                       aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword6" class="form-control"
                                       aria-describedby="passwordHelpInline" required>
                                <p>Repeat your password</p>
                                <button type="submit" class="confirm-profile-settings btn btn-primary">Save Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="personal-settings" method="post">
                    <h5>Email Address</h5>
                    <div class="username-settings">
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">New Email Address</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword6" class="form-control"
                                       aria-describedby="passwordHelpInline" required>
                            </div>
                        </div>
                        <div class="password-only-settings mb-3 row">
                            <label for="text" class="col-sm-2 col-form-label">Confirm Email Address</label>
                            <div class="col-sm-10">
                                <input type="password" id="inputPassword6" class="form-control"
                                       aria-describedby="passwordHelpInline" required>
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
</body>
</html>