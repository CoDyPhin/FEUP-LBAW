<?php
    include_once("../templates/tpl_common.php");
    draw_head();
    draw_navbar();
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
</body>

<?php
    draw_footer();
?>