<?php
    include_once("../templates/tpl_common.php");
    draw_head();
    draw_navbar();
?>

<div class="row friends-list m-2 m-sm-5 ms-sm-5">
    <h2 class="ms-2"> Friends List </h2>
    <div class="col-md-6">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-auto">
            <div class="friend-image">
              <img src="../assets/carlos.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">CoDyPhin</h5>
            <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
            </p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end">
              <span class="material-icons">
                 delete
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-6 ">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-auto">
            <div class="friend-image" style="align-self: center;">
              <img src="../assets/david.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">David</h5>
            <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
            </p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end">
              <span class="material-icons">
                 delete
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 ">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-auto">
            <div class="friend-image">
              <img src="../assets/filipe.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">Filipe</h5>
            <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
            </p>
          </div>
          <div class="col" style="align-self: center; width: 20px">
            <button class="delete-button float-end">
              <span class="material-icons">
                 delete
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 ">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-auto">
            <div class="friend-image">
              <img src="../assets/logo.png">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">kaka34</h5>
            <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
            </p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end">
              <span class="material-icons">
                 delete
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="friend-card card m-2 p-2">
        <div class="row">
          <div class="col-auto">
            <div class="friend-image">
              <img src="../assets/queijos.jpg">
            </div>
          </div>
          <div class="col">
            <h5 class="card-title">Pedro</h5>
            <p class="d-flex align-items-center"><span class="material-icons" >
                military_tech
                </span> 178 Reputation
            </p>
          </div>
          <div class="col" style="align-self: center;">
            <button class="delete-button float-end">
              <span class="material-icons">
                 delete
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>