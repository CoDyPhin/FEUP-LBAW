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
                        role="tab" aria-controls="top" aria-selected="true">Top News
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="recent-tab" data-bs-toggle="tab" data-bs-target="#recent" type="button"
                        role="tab" aria-controls="recent" aria-selected="false">Recent News
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="top" role="tabpanel" aria-labelledby="top-tab">
                <a class="text-decoration-none text-reset" href="./thread.php">
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
                            <div class="title">League of Legends 11.3 Patch Notes</div>
                            <div class="text">This patch, we’re looking in on bot lane, where shorter range champs like
                                Samira have been slashing, dashing, and bashing things up. This hasn’t gone unnoticed,
                                which is why Samira's an especially hot potato: although her win rates are fine, her ban
                                rates are high.
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
                                    <span class="full-icondescription">Posted by rechartex</span>
                                    <span class="short-icondescription">rechartex</span>
                                </div>
                                <div class="time">
                      <span class="material-icons">
                        access_time
                      </span>
                                    <span class="full-icondescription">1:15 PM  25/02/2021</span>
                                    <span class="short-icondescription">1:15 PM</span>
                                </div>
                            </div>
                            <div class="image">
                                <img src="../assets/lol.png" class=".figure-img">
                            </div>
                        </div>
                    </div>
                </a>
                <a class="text-decoration-none text-reset" href="./thread.php">
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
                            <div class="title">The Last Of Us Part II Wins Game of the Year Award</div>
                            <div class="text">Naughty Dog’s The Last Of Us Part II is one of those video games that’s
                                pretty much destined to win Game Of The Year, whether or not it deserves the award.
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
                                    <span class="full-icondescription">Posted by CoDyPhin</span>
                                    <span class="short-icondescription">CoDyPhin</span>
                                </div>
                                <div class="time">
                          <span class="material-icons">
                            access_time
                          </span>
                                    <span class="full-icondescription">3:35 PM  24/02/2021</span>
                                    <span class="short-icondescription">3:35 PM</span>
                                </div>
                            </div>
                            <div class="image">
                                <img src="../assets/thelastofus.png" class=".figure-img">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
                <a class="text-decoration-none text-reset" href="./thread.php">
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
                            <div class="title">League of Legends 11.3 Patch Notes</div>
                            <div class="text">This patch, we’re looking in on bot lane, where shorter range champs like
                                Samira have been slashing, dashing, and bashing things up. This hasn’t gone unnoticed,
                                which is why Samira's an especially hot potato: although her win rates are fine, her ban
                                rates are high.
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
                                    <span class="full-icondescription">Posted by rechartex</span>
                                    <span class="short-icondescription">rechartex</span>
                                </div>
                                <div class="time">
                          <span class="material-icons">
                            access_time
                          </span>
                                    <span class="full-icondescription">1:15 PM  25/02/2021</span>
                                    <span class="short-icondescription">1:15 PM</span>
                                </div>
                            </div>
                            <div class="image">
                                <img src="../assets/lol.png" class=".figure-img">
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