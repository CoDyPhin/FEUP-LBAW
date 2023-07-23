<?php
    include_once("../templates/tpl_common.php");
    draw_head();
    draw_navbar();
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
</body>

<?php
    draw_footer();
?>