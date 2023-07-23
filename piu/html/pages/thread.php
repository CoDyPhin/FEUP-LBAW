<?php
    include_once("../templates/tpl_common.php");
    draw_head();
    draw_navbar_not_loged_in();
?>

<div class="row m-0 w-100">
    <div class="post-comments col-md-7 mt-md-5 mx-md-auto me-md-0">
        <section id="post">
            <div class="votes">
                <button class="material-icons upvote d-flex justify-content-center">
                    keyboard_arrow_up
                </button>
                <p style="font-size: 20px; display: flex; justify-content: center; position: relative; top: 5px;"> 100</p>
                <button class="material-icons downvote d-flex justify-content-center">
                        keyboard_arrow_down
                </button>
            </div>
            <div class="post-text pt-2">
                <div class="post-title">
                    CyberPunk 2077 Review
                </div>
                <div class="post-tags">
                    <button class="post-tag">
                        Playstation 4
                    </button>
                    <button class="post-tag">
                        New Games
                    </button>
                    <button class="post-tag">
                        CyberPunk 2077
                    </button>
                </div>
                <div class="post-summary">
                    Summary: Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis
                    obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going
                    after a one-of-a-kind implant that is the key to immortality.
                </div>
                <div class="carousel-container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../assets/cyberpunk.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/cyberpunk1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/cyberpunk2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../assets/cyberpunk3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="post-coretext">
                    The problem is that when it works, it works, but when it doesn’t, it really doesn’t. Luckily, the
                    game’s low points like the horrible binary stealth system and the bugs and lack of QoL are either
                    fixable or vastly outweighted by the good bits, and the overall tally still ends up being much
                    higher than the average of many other games out there. That’s helped a lot by the moment-to-moment
                    gameplay, which pays off just as much as the story beats; the movement system lets you climb almost
                    any short object, vehicles are weighty to drive and have fantastic interior and exterior designs,
                    and guns feel properly loud and heavy. It’s story and narrative kept me glued to the screen, and
                    everything – from sex scenes and romance options to Keanu Reeves trying to kill you or help you
                    throughout the game – are remarkably well done. Cyberpunk 2077 is a game crafted with love, and it
                    shows...A remarkably well-executed open world game whose great heights exceed its profound depths.
                </div>
                <div class="post-buttons align-items-center">
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
                        <span class="short-icondescription">27/02/2021</span>
                    </div>
                    <button class="report">
                        <span class="material-icons">
                            outlined_flag
                        </span>
                        <span class="full-icondescription">Report</span>
                    </button>
                </div>
            </div>
        </section>
        <div class="comment-thread">
            <div class="comment" id="comment-1">
                <a href="#comment-1" class="comment-border-link">
                    <span class="sr-only">Jump to comment-1</span>
                </a>
                <div class="comment-heading">
                    <div class="profile-pic">
                        <img src="../assets/david.jpg">
                    </div>
                    <div class="comment-info">
                        <a href="#" class="comment-author">davidrocha9</a>
                    </div>
                </div>

                <div class="comment-body">
                    <p>
                        Great game, story keeps the interest, combat very real, along with driving.... can’t speak for
                        other platforms......

                        This isn’t EAs anthem; the story is good and although has bugs to fix, which they are currently
                        working on, this isn’t some boring duck taped mess of a game.
                    </p>
                    <div class="comment-icons align-items-center">
                        <div class="comment-votes align-items-center">
                            <button class="material-icons upvote">
                                keyboard_arrow_up
                            </button>
                            <span class="rating">1</span>
                            <button class="material-icons downvote">
                                keyboard_arrow_down
                            </button>
                        </div>
                        <button class="comments">
                            <span class="material-icons">
                                mode_comment
                            </span>
                            <span class="full-icondescription">Reply</span>
                        </button>
                        <div class="time">
                            <span class="material-icons">
                                access_time
                            </span>
                            <span class="full-icondescription">3:37 PM  27/02/2021</span>
                        </div>
                        <button class="report">
                            <span class="material-icons">
                                outlined_flag
                            </span>
                            <span class="full-icondescription">Report</span>
                        </button>
                    </div>
                </div>

                <div class="replies">
                    <div class="comment" id="comment-2">
                        <a href="#comment-2" class="comment-border-link">
                            <span class="sr-only">Jump to comment-2</span>
                        </a>
                        <div class="comment-heading">
                            <div class="profile-pic">
                                <img src="../assets/queijos.jpg">
                            </div>
                            <div class="comment-info">
                                <a href="#" class="comment-author">Pinguinpanic</a>
                            </div>
                        </div>

                        <div class="comment-body">
                            <p>
                                The best game ever. For me, it's Game of the Year 2020. Masterpiece storyline and
                                gameplay.
                            </p>
                            <div class="comment-icons align-items-center">
                                <div class="comment-votes align-items-center">
                                    <button class="material-icons upvote">
                                        keyboard_arrow_up
                                    </button>
                                    <span class="rating">1</span>
                                    <button class="material-icons downvote">
                                        keyboard_arrow_down
                                    </button>
                                </div>
                                <button class="comments">
                                    <span class="material-icons">
                                        mode_comment
                                    </span>
                                    <span class="full-icondescription">Reply</span>
                                </button>
                                <div class="time">
                                    <span class="material-icons">
                                        access_time
                                    </span>
                                    <span class="full-icondescription">3:37 PM  27/02/2021</span>
                                </div>
                                <button class="report">
                                    <span class="material-icons">
                                        outlined_flag
                                    </span>
                                    <span class="full-icondescription">Report</span>
                                </button>
                            </div>
                        </div>

                        <div class="replies">
                            <div class="comment" id="comment-2">
                                <a href="#comment-2" class="comment-border-link">
                                    <span class="sr-only">Jump to comment-2</span>
                                </a>
                                <div class="comment-heading">
                                    <div class="profile-pic">
                                        <img src="../assets/logo.png">
                                    </div>
                                    <div class="comment-info">
                                        <a href="#" class="comment-author">kaka34</a>
                                    </div>
                                </div>

                                <div class="comment-body">
                                    <p>
                                        No. It's bad.
                                    </p>
                                    <div class="comment-icons align-items-center">
                                        <div class="comment-votes align-items-center">
                                            <button class="material-icons upvote">
                                                keyboard_arrow_up
                                            </button>
                                            <span class="rating">1</span>
                                            <button class="material-icons downvote">
                                                keyboard_arrow_down
                                            </button>
                                        </div>
                                        <button class="comments">
                                            <span class="material-icons">
                                                mode_comment
                                            </span>
                                            <span class="full-icondescription">Reply</span>
                                        </button>
                                        <div class="time">
                                            <span class="material-icons">
                                                access_time
                                            </span>
                                            <span class="full-icondescription">3:37 PM  27/02/2021</span>
                                        </div>
                                        <button class="report">
                                            <span class="material-icons">
                                                outlined_flag
                                            </span>
                                            <span class="full-icondescription">Report</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment" id="comment-1">
                <a href="#comment-1" class="comment-border-link">
                    <span class="sr-only">Jump to comment-1</span>
                </a>
                <div class="comment-heading">
                    <div class="profile-pic">
                        <img src="../assets/filipe.jpg">
                    </div>
                    <div class="comment-info">
                        <a href="#" class="comment-author">rechartex</a>
                    </div>
                </div>

                <div class="comment-body">
                    <p>
                        The best open world game I've played. At release it has plenty of visual and other bugs. These
                        will get patched out eventually so wait it out if it bothers you.
                    </p>
                    <div class="comment-icons align-items-center">
                        <div class="comment-votes align-items-center">
                            <button class="material-icons upvote">
                                keyboard_arrow_up
                            </button>
                            <span class="rating">1</span>
                            <button class="material-icons downvote">
                                keyboard_arrow_down
                            </button>
                        </div>
                        <button class="comments">
                            <span class="material-icons">
                                mode_comment
                            </span>
                            <span class="full-icondescription">Reply</span>
                        </button>
                        <div class="time">
                            <span class="material-icons">
                                access_time
                            </span>
                            <span class="full-icondescription">3:37 PM  27/02/2021</span>
                        </div>
                        <button class="report">
                            <span class="material-icons">
                                outlined_flag
                            </span>
                            <span class="full-icondescription">Report</span>
                        </button>
                    </div>
                </div>

                <div class="replies">
                    <div class="comment" id="comment-2">
                        <a href="#comment-2" class="comment-border-link">
                            <span class="sr-only">Jump to comment-2</span>
                        </a>
                        <div class="comment-heading">
                            <div class="profile-pic">
                                <img src="../assets/carlos.jpg">
                            </div>
                            <div class="comment-info">
                                <a href="#" class="comment-author">CoDyPhin</a>
                            </div>
                            <span class="material-icons">
                                    campaign
                                </span>
                        </div>

                        <div class="comment-body">
                            <p>
                                For sure dude! If you liked this game, you should definitely try out Battlegrounds!
                            </p>
                            <div class="comment-icons align-items-center">
                                <div class="comment-votes align-items-center">
                                    <button class="material-icons upvote">
                                        keyboard_arrow_up
                                    </button>
                                    <span class="rating">1</span>
                                    <button class="material-icons downvote">
                                        keyboard_arrow_down
                                    </button>
                                </div>
                                <button class="comments">
                                    <span class="material-icons">
                                        mode_comment
                                    </span>
                                    <span class="full-icondescription">Reply</span>
                                </button>
                                <div class="time">
                                    <span class="material-icons">
                                        access_time
                                    </span>
                                    <span class="full-icondescription">3:37 PM  27/02/2021</span>
                                </div>
                                <button class="report">
                                    <span class="material-icons">
                                        outlined_flag
                                    </span>
                                    <span class="full-icondescription">Report</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment" id="comment-1">
                <a href="#comment-1" class="comment-border-link">
                    <span class="sr-only">Jump to comment-1</span>
                </a>
                <div class="comment-heading">
                    <div class="profile-pic">
                        <img src="../assets/logo.png">
                    </div>
                    <div class="comment-info">
                        <a href="#" class="comment-author">kaka34</a>
                    </div>
                </div>

                <div class="comment-body">
                    <p>
                        Assassin's Creed is so much better than Cyberpunk 2077
                    </p>
                    <div class="comment-icons align-items-center">
                        <div class="comment-votes align-items-center">
                            <button class="material-icons upvote">
                                keyboard_arrow_up
                            </button>
                            <span class="rating">1</span>
                            <button class="material-icons downvote">
                                keyboard_arrow_down
                            </button>
                        </div>
                        <button class="comments">
                            <span class="material-icons">
                                mode_comment
                            </span>
                            <span class="full-icondescription">Reply</span>
                        </button>
                        <div class="time">
                            <span class="material-icons">
                                access_time
                            </span>
                            <span class="full-icondescription">3:37 PM  27/02/2021</span>
                        </div>
                        <button class="report">
                            <span class="material-icons">
                                outlined_flag
                            </span>
                            <span class="full-icondescription">Report</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="newpost col col-md-2 mx-md-auto m-3 m-md-5 order-first order-md-last">
        <div class="card">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title">
                    <p>
                        Create New Post
                    </p>
                </h5>
                <h6 class="card-title">Want to participate in the community? Create your own post!</h6>
                <form id="form_ask_question" name="ask_question" action="./signup.php">
                    <button type="submit" class="btn btn-outline-primary w-100"> LET'S DO IT!</button>
                </form>
            </div>
        </div>
        <?php
        draw_footer();
        ?>
    </div>
</div>

</body>
</html>