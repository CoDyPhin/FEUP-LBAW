<?php
include_once("../templates/tpl_common.php");
draw_head();
draw_navbar();
?>

<div class="row m-0 w-100">
    <div class="col-md-7 mt-5 mx-md-auto me-md-0">
        <div class="results-title">
            <h2>Results for "FIFA"</h2>
            <a href="./search_user.php">
                <p class="secondary-title">Search for Users Instead</p>
            </a>
        </div>
        <ul class="nav nav-tabs d-block d-sm-flex" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                        role="tab" aria-controls="all" aria-selected="true">All
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button"
                        role="tab" aria-controls="reviews" aria-selected="false">Reviews
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button"
                        role="tab" aria-controls="news" aria-selected="false">News
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
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
                            <div class="title">FIFA 21 "What If" promo revealed: Kante, Sancho, Gomez</div>
                            <div class="text">"What If?" ⁠— it’s the age-old question people ask every day. Now, EA
                                SPORTS has turned their heads to the same hypothetical, with a brand-new FIFA 21
                                Ultimate Team promo that is all set to dish out a new lineup of Live Cards.
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
                                <img src="../assets/whatif.jpg" class=".figure-img">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
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
            <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
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
                            <div class="title">FIFA 21 "What If" promo revealed: Kante, Sancho, Gomez</div>
                            <div class="text">"What If?" ⁠— it’s the age-old question people ask every day. Now, EA
                                SPORTS has turned their heads to the same hypothetical, with a brand-new FIFA 21
                                Ultimate Team promo that is all set to dish out a new lineup of Live Cards.
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
                                <img src="../assets/whatif.jpg" class=".figure-img">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="card col col-md-3 p-3 mx-md-auto m-3 m-md-5 mb-0 order-first order-md-last mw-25" style="height: fit-content">
        <h5>Filters</h5>
        <form action="" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Categories</label>
                <div id="categories">
                    <select class="categories-select form-select form-select-sm" aria-label=".form-select-sm example"
                            id="category" name="category">
                        <option value="1" selected>Select an Option</option>
                        <option value="2">Cyberpunk 2077</option>
                        <option value="3">FIFA</option>
                        <option value="4">League of Legends</option>
                    </select>
                </div>
                <div class="add-category-button d-flex" onclick="cloneSelect()">
                    <span class="material-icons">
                      add_circle_outline
                    </span>
                    <p>Add Another Category</p>
                </div>
                <label for="exampleFormControlSelect1">Rating</label>
                <div class="mb-3">
                    <input type="number" step="1" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Minimum Rating" style="margin-bottom: 5px;">
                    <input type="number" step="1" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Maximum Rating">
                </div>
                <label for="before">Before</label>
                <div class="mb-3">
                    <input class="form-control" type="date" id="birthday" name="birthday">
                </div>
                <label for="after">After</label>
                <div class="mb-3">
                    <input class="form-control" type="date" id="birthday" name="birthday">
                </div>
                <label for="exampleFormControlSelect1">Only</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked"
                           style="font-size: 12px; margin-bottom: 15px;">
                        Friends Only
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </form>
    </div>
</div>

<script>
    var selectionCounter = 0

    function cloneSelect() {
        event.preventDefault();
        var select = document.getElementById("category")
        var clone = select.cloneNode(true)
        var name = select.getAttribute("name") + selectionCounter++
        clone.id = name
        clone.setAttribute("name", name)
        document.getElementById("categories").appendChild(clone)
    }
</script>
</body>
</html>