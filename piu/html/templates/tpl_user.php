<?php

function draw_friends(){
    ?>
    <div class="row friends-list m-5 ms-5">
    <div class="col-md-6">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-sm-auto">
            <div class="friend-image">
              <img src="../assets/carlos.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">CoDyPhin</h5>
            <p><i class="fas fa-medal"></i> 178 Reputation</p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 ">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-sm-auto">
            <div class="friend-image" style="align-self: center;">
              <img src="../assets/carlos.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">CoDyPhin</h5>
            <p><i class="fas fa-medal"></i> 178 Reputation</p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 ">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-sm-auto">
            <div class="friend-image">
              <img src="../assets/carlos.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">CoDyPhin</h5>
            <p><i class="fas fa-medal"></i> 178 Reputation</p>
          </div>
          <div class="col" style="align-self: center; width: 20px">
            <button class="delete-button float-end"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 ">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-sm-auto">
            <div class="friend-image">
              <img src="../assets/carlos.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">CoDyPhin</h5>
            <p><i class="fas fa-medal"></i> 178 Reputation</p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 ">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-sm-auto">
            <div class="friend-image">
              <img src="../assets/carlos.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">CoDyPhin</h5>
            <p><i class="fas fa-medal"></i> 178 Reputation</p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
}



function draw_profile(){
    ?>
    <div class="profile">
    <div class="profile-container container-fluid mt-5">
      <div class="row">
        <div class=" main-section text-center">
            <div class="row">
                <div class="profile-header" style="background: url('https://picsum.photos/200')"></div>
            </div>
            <div class="row user-detail">
                <div class="user-info">
                  <div class="profile-image">
                    <img src="../assets/carlos.jpg">
                  </div>
                    <h5>CoDyPhin</h5>
                    <div class="user-stats">
                      <button class="friends-button"><i class="fas fa-users"></i> 53 Friends</button>
                      <button class="reputation-button"><i class="fas fa-medal"></i> 178 Reputation</button>
                    </div>
                    <span>Hearthstone Player representing FTW Esports; Studying Computer Engineering in Universidade do Porto (FEUP); Current FTW Academy LGW Challenge champion; 
                      5th-6th in RedBull MEO National Finals; 192nd in Masters Tour Asia-Pacific: Online; Overall gaming addict </span>
                </div>
            </div>
        </div>
      </div>
      <button type="button" class="btn btn-primary mt-2" style="width:100%;">SEND FRIEND REQUEST</button>
    </div>

    <!-- probably this is not need here-->
    <div class="card-body d-flex flex-column">
      <h5>Posts from CoDyPhin</h5>
      <div class ="post-content-profile">
        <div class="tab-content" id="myTabContent">
            <div class="threads" style="display:flex; flex-direction: column; gap: 2.5vh; position: relative;">
              <div class="thread-card">
                <div class="card-grid" style="position:relative;">
                  <div class="vote" style="display: flex; justify-content: center; align-items: center; ">
                    <div>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_up
                      </span>
                      <p style="font-size: 25px; display: flex; justify-content: center;">100</p>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_down
                      </span>
                    </div>
                  </div>
                  <div class="title">CyberPunk 2077 Review</div>
                  <div class="text">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.</div>
                  <div class="buttons">
                    <div class="comments">
                      <span class="material-icons">
                        mode_comment
                      </span>
                      <span class="full-icondescription">2 comments</span>
                      <span class="short-icondescription">2</span>
                    </div>
                    <div class="postedby">
                      <span class="material-icons">
                        person
                      </span>
                      <span class="full-icondescription">Posted by CoDyPhin</span>
                      <span class="short-icondescription">CoDyPhin</span>
                    </div>
                    <div class="time">
                      <span class="material-icons">
                        access_time
                      </span>
                      <span class="full-icondescription">3:35 PM  27/02/2021</span>
                      <span class="short-icondescription">3:35 PM</span>
                    </div>
                  </div>
                  <div class="image">
                    <img src="../assets/cyberpunk.png" class=".figure-img">
                  </div>
                </div>
              </div>
              <div class="thread-card">
                <div class="card-grid" style="position:relative;">
                  <div class="vote" style="display: flex; justify-content: center; align-items: center; ">
                    <div>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_up
                      </span>
                      <p style="font-size: 25px; display: flex; justify-content: center;">100</p>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_down
                      </span>
                    </div>
                  </div>
                  <div class="title">CyberPunk 2077 Review</div>
                  <div class="text">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.</div>
                  <div class="buttons">
                    <div class="comments">
                      <span class="material-icons">
                        mode_comment
                      </span>
                      <span class="full-icondescription">2 comments</span>
                      <span class="short-icondescription">2</span>
                    </div>
                    <div class="postedby">
                      <span class="material-icons">
                        person
                      </span>
                      <span class="full-icondescription">Posted by CoDyPhin</span>
                      <span class="short-icondescription">CoDyPhin</span>
                    </div>
                    <div class="time">
                      <span class="material-icons">
                        access_time
                      </span>
                      <span class="full-icondescription">3:35 PM  27/02/2021</span>
                      <span class="short-icondescription">3:35 PM</span>
                    </div>
                  </div>
                  <div class="image">
                    <img src="../assets/cyberpunk.png" class=".figure-img">
                  </div>
                </div>
              </div>
              <div class="thread-card">
                <div class="card-grid" style="position:relative;">
                  <div class="vote" style="display: flex; justify-content: center; align-items: center; ">
                    <div>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_up
                      </span>
                      <p style="font-size: 25px; display: flex; justify-content: center;">100</p>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_down
                      </span>
                    </div>
                  </div>
                  <div class="title">CyberPunk 2077 Review</div>
                  <div class="text">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.</div>
                  <div class="buttons">
                    <div class="comments">
                      <span class="material-icons">
                        mode_comment
                      </span>
                      <span class="full-icondescription">2 comments</span>
                      <span class="short-icondescription">2</span>
                    </div>
                    <div class="postedby">
                      <span class="material-icons">
                        person
                      </span>
                      <span class="full-icondescription">Posted by CoDyPhin</span>
                      <span class="short-icondescription">CoDyPhin</span>
                    </div>
                    <div class="time">
                      <span class="material-icons">
                        access_time
                      </span>
                      <span class="full-icondescription">3:35 PM  27/02/2021</span>
                      <span class="short-icondescription">3:35 PM</span>
                    </div>
                  </div>
                  <div class="image">
                    <img src="../assets/cyberpunk.png" class=".figure-img">
                  </div>
                </div>
              </div>
              <div class="thread-card">
                <div class="card-grid" style="position:relative;">
                  <div class="vote" style="display: flex; justify-content: center; align-items: center; ">
                    <div>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_up
                      </span>
                      <p style="font-size: 25px; display: flex; justify-content: center;">100</p>
                      <span class="material-icons" style="font-size: 60px; display: flex; justify-content: center;">
                        keyboard_arrow_down
                      </span>
                    </div>
                  </div>
                  <div class="title">CyberPunk 2077 Review</div>
                  <div class="text">Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.</div>
                  <div class="buttons">
                    <div class="comments">
                      <span class="material-icons">
                        mode_comment
                      </span>
                      <span class="full-icondescription">2 comments</span>
                      <span class="short-icondescription">2</span>
                    </div>
                    <div class="postedby">
                      <span class="material-icons">
                        person
                      </span>
                      <span class="full-icondescription">Posted by CoDyPhin</span>
                      <span class="short-icondescription">CoDyPhin</span>
                    </div>
                    <div class="time">
                      <span class="material-icons">
                        access_time
                      </span>
                      <span class="full-icondescription">3:35 PM  27/02/2021</span>
                      <span class="short-icondescription">3:35 PM</span>
                    </div>
                  </div>
                  <div class="image">
                    <img src="../assets/cyberpunk.png" class=".figure-img">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

<?php
} 

function draw_settings(){
    ?>

    <section id="settings-grid">
        <label class="settings-grid-title">Settings</label>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Security</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="profile-settings">
                    <div class="profile-image">
                        <p>Profile Image</p>
                        
                    </div>
                    <div class="personal-settings">
                        <p>Profile Settings</p>
                        <div class="username-settings">
                            <div class="username-only-settings mb-3 row">
                                <label for="text" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                <input type="username" class="form-control" id="username">
                                <p>Change your username</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="text" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    <p>Must not exceed 200 characters</p>
                                    <button type="button" class="confirm-profile-settings btn btn-primary">Save Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="profile-settings">
                    <div class="personal-settings">
                        <p>Password</p>
                        <div class="username-settings">
                            <div class="password-only-settings mb-3 row">
                                <label for="text" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                </div>
                            </div>
                            <div class="password-only-settings mb-3 row">
                                <label for="text" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                </div>
                            </div>
                            <div class="password-only-settings mb-3 row">
                                <label for="text" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                    <p>Repeat your password</p>
                                    <button type="button" class="confirm-profile-settings btn btn-primary">Save Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="personal-settings">
                        <p>Email Address</p>
                        <div class="username-settings">
                            <div class="password-only-settings mb-3 row">
                                <label for="text" class="col-sm-2 col-form-label">New Email Address</label>
                                <div class="col-sm-10">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                </div>
                            </div>
                            <div class="password-only-settings mb-3 row">
                                <label for="text" class="col-sm-2 col-form-label">Confirm Email Address</label>
                                <div class="col-sm-10">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                    <p>Repeat your email address</p>
                                    <button type="button" class="confirm-profile-settings btn btn-primary">Save Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
}

?>