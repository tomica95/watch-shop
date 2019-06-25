<?php 
  
  include "models/about/author_functions.php";

  $author = author_of_site();

?>
<div class="container">
  <div class="row">
    <div class="wwd">
      <div class="col-sm-6"><img class="img-responsive" src="assets/image/blog/blog_4.jpg" alt="<?=$author->alt?>"></div>
      <div class="col-sm-6">
        <div class="column-inner ">
          <div class="wrapper">
            <h4 class="tf"><?=$author->name_surname?> </h4>
            <div class="desc">
              <p><?=$author->description?></p>
            </div>
            <div class="buttton">
              <form method="POST" action="models/about/export.php">
                <input type="submit" value="Export about author" class="btn btn-default" name="export">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>