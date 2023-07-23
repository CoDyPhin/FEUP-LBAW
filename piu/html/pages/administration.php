<?php 
    include_once("../templates/tpl_common.php");
    draw_head();
    draw_navbar();
?>

<div class="mt-4 ms-5">
    <div class ="post-content" style="font-size: 1em;">
      <ul class="nav nav-tabs d-block d-sm-flex" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="reported-users-tab" data-bs-toggle="tab" data-bs-target="#reported-users" type="button" role="tab" aria-controls="reported-users" aria-selected="true">Reported Users</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="banned-users-tab" data-bs-toggle="tab" data-bs-target="#banned-users" type="button" role="tab" aria-controls="banned-users" aria-selected="false">Banned Users</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="award-users-tab" data-bs-toggle="tab" data-bs-target="#award-users" type="button" role="tab" aria-controls="award-users" aria-selected="false">Award Admin</button>
        </li>
      </ul>
    </div>
  </div>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="reported-users" role="tabpanel" aria-labelledby="reported-users-tab">
      <div class="content ms-4 mt-5 me-4 ms-sm-5 me-sm-5">
        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/carlos.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">CoDyPhin</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
                </p>
              </div>
              <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-outline-secondary float-end w-100 mb-2 d-flex" onclick="window.location.href='./reported_posts.php'">
                  <p class="w-100 m-0">See Reported Posts </p>
                  <span class="material-icons">
                    keyboard_arrow_right
                  </span>
                </button>
                <button type="button" class="btn btn-danger float-end w-100">Ban User</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/david.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">David</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 10 Reputation
                </p>
              </div>
              <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-outline-secondary float-end w-100 mb-2 d-flex" onclick="window.location.href='./reported_posts.php'">
                  <p class="w-100 m-0">See Reported Posts </p>
                  <span class="material-icons">
                    keyboard_arrow_right
                  </span>
                </button>
                <button type="button" class="btn btn-danger float-end w-100">Ban User</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/filipe.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">Filipe</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 200 Reputation
            </p>
              </div>
              <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-outline-secondary float-end w-100 mb-2 d-flex" onclick="window.location.href='./reported_posts.php'">
                  <p class="w-100 m-0">See Reported Posts </p>
                  <span class="material-icons">
                    keyboard_arrow_right
                  </span>
                </button>
                <button type="button" class="btn btn-danger float-end w-100">Ban User</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="tab-pane fade show" id="banned-users" role="tabpanel" aria-labelledby="banned-users-tab">
      <div class="content ms-4 mt-5 me-4 ms-sm-5 me-sm-5">
        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/carlos.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">kaka34</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
                </p>
              </div>
               <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-success float-end w-100">Unban User</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/david.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
              <h5 class="card-title">David</h5>
              <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 10 Reputation
            </p>
              </div>
               <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-success float-end w-100">Unban User</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/filipe.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">Filipe</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 200 Reputation
            </p>
              </div>
               <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-success float-end w-100">Unban User</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>



    <div class="tab-pane fade show" id="award-users" role="tabpanel" aria-labelledby="award-users-tab">
      <div class="content ms-4 mt-5 me-4 ms-sm-5 me-sm-5">
        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/queijos.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">Pedro</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
            </p>
              </div>
              <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-outline-secondary float-end w-100 mb-2 d-flex" onclick="window.location.href='./top_posts.php'">
                  <p class="w-100 m-0">See Top Posts </p>
                  <span class="material-icons">
                    keyboard_arrow_right
                  </span>
                </button>
                <button type="button" class="btn btn-success float-end w-100">Award Administrator</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/filipe.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">Filipe</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 200 Reputation
            </p>
              </div>
              <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-outline-secondary float-end w-100 mb-2 d-flex" onclick="window.location.href='./top_posts.php'">
                  <p class="w-100 m-0">See Top Posts </p>
                  <span class="material-icons">
                    keyboard_arrow_right
                  </span>
                </button>
                <button type="button" class="btn btn-success float-end w-100">Award Administrator</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col col-lg-6 col-md-9">
          <div class="container friend-card card m-sm-2 mb-2 p-2">
            <div class="row">
              <div class="col-auto mb-2">
                <div class="friend-image">
                  <img src="../assets/carlos.jpg">
                </div>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-4 col-7">
                <h5 class="card-title">Carlos</h5>
                <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
            </p>
              </div>
              <div class="col" style="align-self: center;">
                <button type="button" class="btn btn-outline-secondary float-end w-100 mb-2 d-flex" onclick="window.location.href='./top_posts.php'">
                  <p class="w-100 m-0">See Top Posts </p>
                  <span class="material-icons">
                    keyboard_arrow_right
                  </span>
                </button>
                <button type="button" class="btn btn-success float-end w-100">Award Administrator</button>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </div>

  <!--<footer>
    <div class="footer-content">
        <h2>RNG Inc © 2021. All rights reserved</h2>
    </div>
  </footer>-->
</body>
</html>