<?php
include_once("../templates/tpl_common.php");
draw_head();
draw_navbar();
?>

<div class="row m-0 w-100">
    <div class="col-md-7 mt-5 mx-md-auto me-md-0">
        <div class="results-title">
            <h2>Results for "FIFA"</h2>
            <a href="./search.php">
                <p class="secondary-title">Search for Posts Instead</p>
            </a>
        </div>
        <ul class="nav nav-tabs d-block d-sm-flex" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                        type="button" role="tab" aria-controls="all" aria-selected="true">All
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="friends-tab" data-bs-toggle="tab" data-bs-target="#friends"
                        type="button" role="tab" aria-controls="friends" aria-selected="false">Friends
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins" type="button"
                        role="tab" aria-controls="admins" aria-selected="false">Administrators
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="friend-card card m-2 mt-3 p-2">
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
                    </div>
                </div>
                <div class="friend-card card m-2 mt-3 p-2">
                    <div class="row">
                        <div class="col-auto">
                            <div class="friend-image">
                                <img src="../assets/david.jpg">
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="card-title">davidrocha9</h5>
                            <p class="d-flex align-items-center"><span class="material-icons" >
                                military_tech
                                </span> 13 Reputation
                            </p>
                        </div>
                    </div>
                </div>
                <div class="friend-card card m-2 mt-3 p-2">
                    <div class="row">
                        <div class="col-auto">
                            <div class="friend-image">
                                <img src="../assets/queijos.jpg">
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="card-title">Pinguinpanic</h5>
                            <p class="d-flex align-items-center"><span class="material-icons" >
                                military_tech
                                </span> 11 Reputation
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                <div class="friend-card card m-2 mt-3 p-2">
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
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="admins" role="tabpanel" aria-labelledby="admins-tab">
                <div class="friend-card card m-2 mt-3 p-2">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card col col-md-3 p-3 mx-md-auto m-3 m-md-5 mb-0 order-first order-md-last"
         style="height: fit-content">
        <h5>Filters</h5>
        <form action="" method="get">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Posted on Categories</label>
                <div id="categories">
                    <select class="categories-select form-select form-select-sm"
                            aria-label=".form-select-sm example" id="category" name="category">
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
                <label for="exampleFormControlSelect1">Reputation</label>
                <div class="mb-3">
                    <input type="number" step="1" class="form-control mb-1" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Minimum Reputation">
                    <input type="number" step="1" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Maximum Reputation">
                </div>
                <label for="exampleFormControlSelect1">Other</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked"
                           style="font-size: 12px; margin-bottom: 15px;">
                        Include Description
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">primary</button>
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