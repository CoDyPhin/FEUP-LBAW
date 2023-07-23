<?php
include_once("../templates/tpl_common.php");
draw_head();
draw_navbar_not_loged_in();
?>

<div class="row m-0 w-100">
    <div class="col-md-7 mt-md-5 mx-md-auto me-md-0">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="top-tab" data-bs-toggle="tab" data-bs-target="#top" type="button"
                        role="tab" aria-controls="top" aria-selected="true">Top Reviews
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="recent-tab" data-bs-toggle="tab" data-bs-target="#recent" type="button"
                        role="tab" aria-controls="recent" aria-selected="false">Recent Reviews
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="top" role="tabpanel" aria-labelledby="top-tab">
                    <a class="text-decoration-none text-reset" href="thread.php">
                        <div class="thread-card m-2 mt-3">
                            <div class="card-grid">
                                <div class="vote d-flex justify-content-center align-content-center align-items-center">
                                    <div>
                                        <span class="material-icons upvote d-flex justify-content-center">
                                            keyboard_arrow_up
                                        </span>
                                        <p class="d-flex justify-content-center">100</p>
                                        <span class="material-icons downvote d-flex justify-content-center">
                                            keyboard_arrow_down
                                        </span>
                                    </div>
                                </div>
                                <div class="title">CyberPunk 2077 Review</div>
                                <div class="text">Cyberpunk 2077 is an open-world, action-adventure story set in Night
                                    City, a megalopolis obsessed with power, glamour and body modification. Assume the
                                    role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to
                                    immortality.
                                </div>
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
                                        <span class="full-icondescription">Posted by Pinguinpanic</span>
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
                    </a>
                    <a class="text-decoration-none text-reset" href="thread.php">
                        <div class="thread-card m-2 mt-3">
                            <div class="card-grid">
                                <div class="vote d-flex justify-content-center align-content-center align-items-center">
                                    <div>
                                        <span class="material-icons upvote d-flex justify-content-center">
                                            keyboard_arrow_up
                                        </span>
                                        <p class="d-flex justify-content-center">100</p>
                                        <span class="material-icons downvote d-flex justify-content-center">
                                            keyboard_arrow_down
                                        </span>
                                    </div>
                                </div>
                                <div class="title">FIFA 21 REVIEW</div>
                                <div class="text">On the street and in the stadium, FIFA 21 has more ways to play than
                                    ever before. FIFA 21 rewards you for your creativity and control all over the pitch.
                                    Create more scoring opportunities with all-new dynamic attacking systems in the most
                                    intelligent FIFA gameplay to date. A new Agile Dribbling system gives you the means
                                    to unleash your creativity in 1-on-1 situations. Use fast footwork, more responsive
                                    close control, and new skill moves like the ball roll fake to explode past
                                    defenders.
                                </div>
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
                                        <span class="full-icondescription">Posted by davidrocha9</span>
                                        <span class="short-icondescription">davidrocha9</span>
                                    </div>
                                    <div class="time">
                          <span class="material-icons">
                            access_time
                          </span>
                                        <span class="full-icondescription">10:11 AM  27/02/2021</span>
                                        <span class="short-icondescription">10:11 AM</span>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="../assets/fifa.png" class=".figure-img">
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
            <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                    <a class="text-decoration-none text-reset" href="thread.php">
                        <div class="thread-card m-2 mt-3">
                            <div class="card-grid">
                                <div class="vote d-flex justify-content-center align-content-center align-items-center">
                                    <div>
                                        <span class="material-icons upvote d-flex justify-content-center">
                                            keyboard_arrow_up
                                        </span>
                                        <p class="d-flex justify-content-center">100</p>
                                        <span class="material-icons downvote d-flex justify-content-center">
                                            keyboard_arrow_down
                                        </span>
                                    </div>
                                </div>
                                <div class="title">CyberPunk 2077 Review</div>
                                <div class="text">Cyberpunk 2077 is an open-world, action-adventure story set in Night
                                    City, a megalopolis obsessed with power, glamour and body modification. Assume the
                                    role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to
                                    immortality.
                                </div>
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
                                        <span class="full-icondescription">Posted by Pinguinpanic</span>
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
                    </a>
            </div>
        </div>
    </div>

    <div class="newpost col col-md-2 p-3 mx-md-auto m-3 m-md-5 mb-0 order-first order-md-last">
        <div class="card mb-4">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title">
                    <p>
                        Create New Post
                    </p>
                </h5>
                <h6 class="card-title">Want to participate in the community? Create your own post!</h6>
                <form id="form_ask_question" name="ask_question" action="createPost.html">
                    <button type="submit" class="btn btn-outline-primary w-100"> LET'S DO IT!</button>
                </form>
            </div>
        </div>
        <div class="card d-none d-md-block mb-3">
            <div class="card-body">
                <h5 class="card-title">
                    <p> Top Categories</p>
                </h5>
                <h6 class="card-title">
                    <p>
                        1. Playstation 5
                    </p>
                    <p>2. CyberPunk 2077
                    </p>
                    <p>3. FIFA
                    </p>
                    <p>4. League of Legends
                    </p>
                    <p>5. Valorant
                    </p>
                </h6>
            </div>
        </div>
        <p class="d-none d-md-block" style="text-align: center; font-size: 0.75rem;"> RNG Inc © 2021. All rights reserved </p>
    </div>
</div>

</body>
</html>