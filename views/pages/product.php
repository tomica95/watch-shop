<?php

    include "models/products/functions.php";

    $id = $_GET['id'];

    $product = getProductWithPictureById($id);

?>
<div class="container">
  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
    </div>
    <div id="content" class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <div class="thumbnails">

            <div><a class="thumbnail" href="<?=$product->small?>" title="<?=$product->name?>"><img src="<?=$product->small?>" title="<?=$product->productName?>" alt="<?=$product->productName?>" /></a></div>

            <div id="product-thumbnail" class="owl-carousel">
              <div class="item">
                <div class="image-additional"><a class="thumbnail  " href="<?=$product->big?>" title="<?=$product->productName?>"> <img src="<?=$product->big?>" title="<?=$product->productName?>" alt="<?=$product->productName?>" /></a></div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <h1 class="productpage-title"><?=$product->name?></h1>
         
          <ul class="list-unstyled productinfo-details-top">
            <li>
              <h2 class="productpage-price">$ <?=$product->price?></h2>
            </li>
            
          </ul>
          <hr>
          <ul class="list-unstyled product_info">
            <li>
              <label>Brand:</label>
              <span> <a href="#"><?=$product->categoryName?></a></span></li>
              <?php if(isset($_SESSION['user'])): ?>
            <li>
              <label>Product Code:</label>
              <span> <?=$product->code?></span></li>
            <?php endif; ?>
            <?php if(!isset($_SESSION['user'])): ?>
            <li>
              <label>Product Code:</label>
              <span>Please log in for product code...</span></li>
            <?php endif; ?>
          </ul>
          <hr>
          <p class="product-desc"><?=$product->description?></p>
          <form method="POST" action="models/products/export-excel.php">
                <input type="submit" value="Export to excel" class="btn btn-default" name="export-excel">
                <input type="hidden" value="<?=$product->productID?>" name="id" >
          </form>
        </div>
      </div>
    </div>
  </div>
</div>