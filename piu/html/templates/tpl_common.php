<?php

function draw_head(){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> RNG - Reviews & News In Gaming </title>
    
        <!-- Bootstrap CSS file -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../index.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
                integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
                integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
                crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <?php
    
}

function draw_navbar(){
?>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../pages/homepage.php">
            <img src="../assets/logo.png"
                 width=100>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto d-flex w-100 ms-md-4">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../pages/reviews.php">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/news.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/faq.php">FAQs</a>
                </li>
                <li class="nav-item me-md-4 ms-md-4 ms-lg-5 me-lg-5 mt-auto w-50">
                    <form action="./search.php">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </li>
            </ul>
            <div class="administration-button me-3 mt-3 mt-md-0">
                <button type="button" class="admin-btn btn btn-primary btn-sm d-flex"
                        onclick="window.location.href='./administration.php'">
                        <span class="shield material-icons m-lg-0">
                        shield
                        </span>
                    <span class="administration-title ps-1 d-md-none d-lg-block">
                            Administration
                        </span>
                </button>
            </div>
            <div class="user-notifications dropdown me-1 mt-2 mt-md-0" style="width: 53px;">
                <span class="count badge bg-secondary">2</span>
                <button class="d-flex btn btn-secondary dropdown-toggle ps-1" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="bell material-icons">
                    notifications
                    </span>
                </button>

                <ul class="dropdown-menu dropdown-menu-md-end" aria-labelledby="dropdownMenuButton1">
                    <p class="text-center notifications pb-2">Notifications</p>
                    <li>
                        <div class="notification p-2">
                            <div class="d-flex ms-2">
                                <img src="../assets/filipe.jpg" class="rounded-circle" width="30" height="30">
                                <p class="notification">
                                    <b>Filipe</b> sent you a friend request</p>
                            </div>
                            <div class="d-flex px-2 gap-2">
                                <button type="button" class="btn btn-success w-50">Accept</button>
                                <button type="button" class="btn btn-danger w-50">Decline</button>
                            </div>
                        </div>
                    </li>
                    <hr>
                    <li>
                        <div class="notification">
                            <div class="d-flex ms-2">
                                <img src="../assets/david.jpg" class="rounded-circle" width="30" height="30">
                                <p class="notification">
                                    <b>David</b> sent you a friend request</p>
                            </div>
                            <div class="d-flex px-2 gap-2">
                                <button type="button" class="btn btn-success w-50">Accept</button>
                                <button type="button" class="btn btn-danger w-50">Decline</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-button dropdown">
                <button class="d-flex btn btn-secondary dropdown-toggle ps-1" type="button" id="dropdownMenuButton2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/carlos.jpg" class="rounded-circle" width="30" height="30">
                    <span class="ps-2 d-md-none d-lg-block">CoDyPhin</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-start dropdown-menu-md-end"
                    aria-labelledby="dropdownMenuButton2">
                    <li>
                        <a class="dropdown-item" href="./profile.php">
                            <div class="icontext d-flex">
                                <span class="material-icons">
                                    person
                                </span>
                                <p>Profile<p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="./settings.php">
                            <div class="icontext d-flex">
                                <span class="material-icons">
                                    settings
                                </span>
                                <p>Settings<p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="./homepage.php">
                            <div class="icontext d-flex">
                                <span class="material-icons">
                                    logout
                                </span>
                                <p>Sign Out<p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php

}

function draw_navbar_not_loged_in(){
?>
<body>
    <header></header>
    <nav class="navbar navbar-expand-md navbar-light bg-light w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="../pages/homepage.php">
                <img src="../assets/logo.png"
                    width=100>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto d-flex w-100 ms-md-4">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../pages/reviews.php">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/faq.php">FAQs</a>
                    </li>
                    <li class="nav-item me-md-4 ms-md-4 ms-lg-5 mt-auto w-50">
                        <form action="./search.php">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                </ul>

                <div class="login-signup d-block d-md-flex mt-md-0" style="width: 40%">
                    <button type="button" class="btn btn-outline-primary container-fluid text-nowrap mt-2 mt-md-0"
                            data-bs-toggle="modal" data-bs-target="#loginModal">Log In
                    </button>
                    <button type="button" class="btn btn-primary container-fluid text-nowrap mt-2 mt-md-0"
                            onclick="window.location.href='../pages/signup.php'">Sign Up
                    </button>
                </div>
            </div>

            <div class="modal fade" id="recoveryModal" tabindex="-1" aria-labelledby="recoveryModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="row text-center">
                                            <h5><span class="material-icons" style="color: rgb(220, 53, 69); font-size: 70px;">
                                            https
                                            </span></h5>
                                        </div>
                                        <div class="row text-center">
                                            <h5 class="modal-title" style="font-size: x-large" id="recoveryModalLabel">Forgot your Password?</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-4"><h6 style="font-size: medium">Please enter the email associated with your account and we'll send you a link with steps to recover your password.</h6></div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" required>
                                        <label for="floatingInput">Email Address</label>
                                    </div>
                                </div>
                                <form class="modal-footer d-flex justify-content-center" method="post">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Send Recovery Email</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form class="modal-content" method="post" action="../pages/profile.php">
                            <div class="modal-header">
                                <div class="container-fluid">
                                <div class="row"><h5 class="modal-title" style="font-size: x-large" id="loginModalLabel">Log In</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                <div class="row"><h6 class="small" style="font-size: small">By continuing, you agree to our User Agreement and Privacy Policy</h6></div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username" required>
                                <label for="floatingInput">Username</label>
                                </div>
                                <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Log In</button>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <h6 class="small">New to RNG? <a href="./signup.php">Sign Up </a></h6>
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
                                    <button type="button" class="btn btn-lg btn-outline-primary"><img src="https://cdn.iconscout.com/icon/free/png-256/google-231-432517.png" width="20em"></img> Sign In With Google</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<?php
}


function draw_footer(){
?>
<footer>
    <div class="d-none d-md-block footer-content">
        <h2>RNG Inc © 2021. All rights reserved</h2>
    </div>
</footer>
</body>
</html>

<?php

}

?>

