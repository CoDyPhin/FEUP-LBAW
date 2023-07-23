<?php

function draw_create_post_form(){
    ?>

    <div class="about-div w-75 mx-auto my-5 text-center">
        <h1 class="my-4">Create a Post</h1>
        </div>
        <div class="container w-75">
            <form>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" style="font-size: x-large;" class="form-label">Title</label>
                    <input class="form-control form-control-lg" type="text" placeholder="Title" aria-label=".form-control-lg example" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label">Summary</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 150px" placeholder="Summary" aria-label="default input example" maxlength="300" required></textarea>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label">Categories</label></div>
                <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Sports</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">First Person Shooter</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">MMO RPG</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option4">
                    <label class="form-check-label" for="inlineCheckbox3">Story Games</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option5">
                    <label class="form-check-label" for="inlineCheckbox3">Playstation 5</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option6">
                    <label class="form-check-label" for="inlineCheckbox3">FIFA 21</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option7">
                    <label class="form-check-label" for="inlineCheckbox3">Cyberpunk 2077</label>
                </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 500px" placeholder="Description" aria-label="default input example" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" style="font-size: large;" class="form-label">Upload Images</label>
                </div>
                <div class="row justify-content-center mb-3">
                    <input class="form-control-file" type="file" id="formFileMultiple" multiple>
                </div>
                <div class="col12 d-flex justify-content-end">
                    <button class="btn-lg btn-primary btn-primary text-center w-25 p-2" type="submit">POST</button>
                </div>
            </form>
        </div>

<?php
}

function draw_edit_post_form(){
    ?>

<div class="about-div w-75 mx-auto my-5 text-center">
      <h1 class="my-4">Edit Post</h1>
    </div>
    <div class="container w-75">
        <form>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" style="font-size: x-large;" class="form-label">Title</label>
                <input class="form-control form-control-lg" type="text" placeholder="Title" aria-label=".form-control-lg example" maxlength="100" value="CyberPunk 2077 Review" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label">Summary</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 150px" placeholder="Summary" aria-label="default input example" maxlength="300" required>Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.</textarea>
            </div>
            <div class="mb-1">
                <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label">Categories</label></div>
            <div class="mb-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Sports</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">First Person Shooter</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" checked>
                <label class="form-check-label" for="inlineCheckbox3">New Games</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                <label class="form-check-label" for="inlineCheckbox4">Story Games</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5" checked>
                <label class="form-check-label" for="inlineCheckbox5">Playstation 4</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                <label class="form-check-label" for="inlineCheckbox6">FIFA 21</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7" checked>
                <label class="form-check-label" for="inlineCheckbox7">Cyberpunk 2077</label>
              </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" style="font-size: large;" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 500px" placeholder="Description" aria-label="default input example" required>The problem is that when it works, it works, but when it doesn’t, it really doesn’t. Luckily, the game’s low points like the horrible binary stealth system and the bugs and lack of QoL are either fixable or vastly outweighted by the good bits, and the overall tally still ends up being much higher than the average of many other games out there. That’s helped a lot by the moment-to-moment gameplay, which pays off just as much as the story beats; the movement system lets you climb almost any short object, vehicles are weighty to drive and have fantastic interior and exterior designs, and guns feel properly loud and heavy. It’s story and narrative kept me glued to the screen, and everything – from sex scenes and romance options to Keanu Reeves trying to kill you or help you throughout the game – are remarkably well done. Cyberpunk 2077 is a game crafted with love, and it shows...A remarkably well-executed open world game whose great heights exceed its profound depths.</textarea>
            </div>
            <div class="mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="" checked>
                <label class="form-check-label" for="inlineCheckbox8">image1.png</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="" checked>
                <label class="form-check-label" for="inlineCheckbox9">image2.jpg</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="" checked>
                <label class="form-check-label" for="inlineCheckbox10">image3.jpg</label>
              </div>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" style="font-size: large;" class="form-label">Upload Images</label>
            </div>
            <div class="row justify-content-center mb-3">
                <input class="form-control-file" type="file" id="formFileMultiple" multiple>
            </div>
            <div class="col12 d-flex justify-content-end">
                <button class="btn-lg  btn-primary text-center w-25 p-2" type="submit">UPDATE</button>
              </div>
        </form>
    </div>

<?php
}


function draw_thread_and_replies(){
    ?>
    <div class="d-flex" style="width: 95%;">
        <div class="post-comments">
            <section id="post">
                <div class = "votes">
                    <span class="material-icons d-flex justify-content-center">
                        keyboard_arrow_up
                    </span>
                    <p style="font-size: 20px; display: flex; justify-content: center; position: relative; top: 5px;">100</p>
                    <span class="material-icons d-flex justify-content-center">
                        keyboard_arrow_down
                    </span>
                </div>
                <div class="post-text">
                    <div class="post-title">
                        CyberPunk 2077 Review
                    </div>
                    <div class="post-tags">
                        <div class="post-tag">
                            Playstation 4
                        </div>
                        <div class="post-tag">
                            New Games
                        </div>
                        <div class="post-tag">
                            CyberPunk 2077
                        </div>
                    </div>
                    <div class="post-summary">
                        Summary: Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. Assume the role of V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality.
                    </div>
                    <div class="post-coretext">
                        The problem is that when it works, it works, but when it doesn’t, it really doesn’t. Luckily, the game’s low points like the horrible binary stealth system and the bugs and lack of QoL are either fixable or vastly outweighted by the good bits, and the overall tally still ends up being much higher than the average of many other games out there. That’s helped a lot by the moment-to-moment gameplay, which pays off just as much as the story beats; the movement system lets you climb almost any short object, vehicles are weighty to drive and have fantastic interior and exterior designs, and guns feel properly loud and heavy. It’s story and narrative kept me glued to the screen, and everything – from sex scenes and romance options to Keanu Reeves trying to kill you or help you throughout the game – are remarkably well done. Cyberpunk 2077 is a game crafted with love, and it shows...A remarkably well-executed open world game whose great heights exceed its profound depths.
                    </div>
                    <div class="post-buttons">
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
                        <div class="report">
                            <span class="material-icons">
                                outlined_flag
                            </span>
                            <span class="full-icondescription">Report</span>
                        </div>
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
                            Great game, story keeps the interest, combat very real, along with driving.... can’t speak for other platforms......

                            This isn’t EAs anthem; the story is good and although has bugs to fix, which they are currently working on, this isn’t some boring duck taped mess of a game.
                        </p>
                        <div class="comment-icons">
                            <div class="comment-votes">
                                <span class="material-icons">
                                    keyboard_arrow_up
                                </span>
                                <p>1</p>
                                <span class="material-icons">
                                    keyboard_arrow_down
                                </span>
                            </div>
                            <div class="comments">
                                <span class="material-icons">
                                    mode_comment
                                </span>
                                <span class="full-icondescription">Reply</span>
                            </div>
                            <div class="time">
                                <span class="material-icons">
                                    access_time
                                </span>
                                <span class="full-icondescription">3:37 PM  27/02/2021</span>
                            </div>
                            <div class="comments">
                                <span class="material-icons">
                                    outlined_flag
                                </span>
                                <span class="full-icondescription">Report</span>
                            </div>
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
                                    The best game ever. For me, it's Game of the Year 2020. Masterpiece storyline and gameplay.
                                </p>
                                <div class="comment-icons">
                                    <div class="comment-votes">
                                        <span class="material-icons">
                                            keyboard_arrow_up
                                        </span>
                                        <p>1</p>
                                        <span class="material-icons">
                                            keyboard_arrow_down
                                        </span>
                                    </div>
                                    <div class="comments">
                                        <span class="material-icons">
                                            mode_comment
                                        </span>
                                        <span class="full-icondescription">Reply</span>
                                    </div>
                                    <div class="time">
                                        <span class="material-icons">
                                            access_time
                                        </span>
                                        <span class="full-icondescription">3:37 PM  27/02/2021</span>
                                    </div>
                                    <div class="comments">
                                        <span class="material-icons">
                                            outlined_flag
                                        </span>
                                        <span class="full-icondescription">Report</span>
                                    </div>
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
                                        <div class="comment-icons">
                                            <div class="comment-votes">
                                                <span class="material-icons">
                                                    keyboard_arrow_up
                                                </span>
                                                <p>1</p>
                                                <span class="material-icons">
                                                    keyboard_arrow_down
                                                </span>
                                            </div>
                                            <div class="comments">
                                                <span class="material-icons">
                                                    mode_comment
                                                </span>
                                                <span class="full-icondescription">Reply</span>
                                            </div>
                                            <div class="time">
                                                <span class="material-icons">
                                                    access_time
                                                </span>
                                                <span class="full-icondescription">3:37 PM  27/02/2021</span>
                                            </div>
                                            <div class="comments">
                                                <span class="material-icons">
                                                    outlined_flag
                                                </span>
                                                <span class="full-icondescription">Report</span>
                                            </div>
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
                            <="filipe.jpg">
                        </div>
                        <div class="comment-info">
                            <a href="#" class="comment-author">rechartex</a>
                        </div>
                    </div>
        
                    <div class="comment-body">
                        <p>
                            The best open world game I've played. At release it has plenty of visual and other bugs. These will get patched out eventually so wait it out if it bothers you.
                        </p>
                        <div class="comment-icons">
                            <div class="comment-votes">
                                <span class="material-icons">
                                    keyboard_arrow_up
                                </span>
                                <p>1</p>
                                <span class="material-icons">
                                    keyboard_arrow_down
                                </span>
                            </div>
                            <div class="comments">
                                <span class="material-icons">
                                    mode_comment
                                </span>
                                <span class="full-icondescription">Reply</span>
                            </div>
                            <div class="time">
                                <span class="material-icons">
                                    access_time
                                </span>
                                <span class="full-icondescription">3:37 PM  27/02/2021</span>
                            </div>
                            <div class="comments">
                                <span class="material-icons">
                                    outlined_flag
                                </span>
                                <span class="full-icondescription">Report</span>
                            </div>
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
                                <div class="comment-icons">
                                    <div class="comment-votes">
                                        <span class="material-icons">
                                            keyboard_arrow_up
                                        </span>
                                        <p>1</p>
                                        <span class="material-icons">
                                            keyboard_arrow_down
                                        </span>
                                    </div>
                                    <div class="comments">
                                        <span class="material-icons">
                                            mode_comment
                                        </span>
                                        <span class="full-icondescription">Reply</span>
                                    </div>
                                    <div class="time">
                                        <span class="material-icons">
                                            access_time
                                        </span>
                                        <span class="full-icondescription">3:37 PM  27/02/2021</span>
                                    </div>
                                    <div class="comments">
                                        <span class="material-icons">
                                            outlined_flag
                                        </span>
                                        <span class="full-icondescription">Report</span>
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
                        <div class="comment-icons">
                            <div class="comment-votes">
                                <span class="material-icons">
                                    keyboard_arrow_up
                                </span>
                                <p>1</p>
                                <span class="material-icons">
                                    keyboard_arrow_down
                                </span>
                            </div>
                            <div class="comments">
                                <span class="material-icons">
                                    mode_comment
                                </span>
                                <span class="full-icondescription">Reply</span>
                            </div>
                            <div class="time">
                                <span class="material-icons">
                                    access_time
                                </span>
                                <span class="full-icondescription">3:37 PM  27/02/2021</span>
                            </div>
                            <div class="comments">
                                <span class="material-icons">
                                    outlined_flag
                                </span>
                                <span class="full-icondescription">Report</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="newpost">
            <div class="card">
              <div class="card-body d-flex flex-column justify-content-center">
                  <h5 class="card-title">
                    <p>
                      Create New Post
                    </p>
                  </h5>
                  <h6 class="card-title">Want to participate in the community? Create your own post!</h6>
                  <form id="form_ask_question" name="ask_question" action="{{ url('ask_question') }}">
                      <button type="submit" class="btn btn-outline-primary w-100"> LET'S DO IT! </button>
                  </form>
              </div>
            </div>
            <p style="text-align: center; font-size: 0.75rem;"> RNG Inc © 2021. All rights reserved </p>
        </div>
    </div>

<?php
}
?>