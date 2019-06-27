<div class="container">
  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">
        <div class="columnblock-title">Brands</div>
        <div class="category_block">
          <ul class="box-category treeview-list treeview">
          <?php

              include "models/categories/functions.php";

              $categories = getAllCategories();

              foreach($categories as $category):

          ?>
            <li class="brands" data-id="<?=$category->id?>"><a href="#"><?=$category->name?></a></li>
              <?php endforeach;  ?>
          </ul>
        </div>
      </div>     
      
    </div>
    <div id="content" class="col-sm-9">
      <h2 class="category-title">Products</h2>
      <div class="category-page-wrapper">
        <div class="col-md-6 list-grid-wrapper">
          <div class="btn-group btn-list-grid">
            <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
          </div>
           </div>
       
        <div class="col-md-2 text-right sort-wrapper">
          <label class="control-label" for="input-sort">Sort By :</label>
          <div class="sort-inner">
            <select id="input-sort" class="form-control">
              <option value="ASC" selected="selected">Default</option>
              <option value="ASC">Name (A - Z)</option>
              <option value="DESC">Name (Z - A)</option>
              <option value="ASC">Price (Low &gt; High)</option>
              <option value="DESC">Price (High &gt; Low)</option>
              <option value="DESC">Rating (Highest)</option>
              <option value="ASC">Rating (Lowest)</option>
              <option value="ASC">Model (A - Z)</option>
              <option value="DESC">Model (Z - A)</option>
            </select>
          </div>
        </div>
      </div>
      <br />
      <div class="grid-list-wrapper">
        <?php 

          include "models/products/functions.php";

          $products = getAllProductsWithPicture();

          foreach($products as $product):
        
        ?>
        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image product-imageblock"> <a href="index.php?page=product&id=<?=$product->productID?>"> <img src="assets/img/<?=$product->small?>" alt="<?=$product->name?>" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"> <a href="index.php?page=product&id=<?=$product->productID?>" title="lorem ippsum dolor dummy"><?=$product->name ?></a> </h4>
              <p class="price product-price"> $ <?=$product->price?> </p>
            </div>
            
          </div>
        </div>
          <?php endforeach; ?>
      </div>
      <div class="category-page-wrapper">
        
        <div class="pagination-inner">
          <ul class="pagination">
            <li class="active"><span>1</span></li>
            <li><a href="index.php?page=shop">2</a></li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
