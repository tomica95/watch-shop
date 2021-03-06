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
          
           </div>
       
        <div class="col-md-2 text-right sort-wrapper">
          <label class="control-label" for="input-sort">Sort By :</label>
          <div class="sort-inner">
            <select id="input-sort" class="form-control">
              <option value="default" selected="selected">Default</option>
              <option value="name-asc">Name (A - Z)</option>
              <option value="name-desc">Name (Z - A)</option>
              <option value="price-asc">Price (Low &gt; High)</option>
              <option value="price-desc">Price (High &gt; Low)</option>
            </select>
          </div>
        </div>
      </div>
      <br />
      <div class="grid-list-wrapper">
        <div class="container" id="products">
        <?php 

          include "models/products/functions.php";

          $limit =  isset($_GET['limit'])? $_GET['limit'] : 0;
          $products = getProductsWithPicturePag($limit);
          foreach($products as $product):
        
        ?>
        <div class="product-layout product-grid col-xs-12 col-lg-3">
          <div class="product-thumb">
            <div class="image product-imageblock"> <a href="index.php?page=product&id=<?=$product->productID?>"> <img src="<?=$product->small?>" alt="<?=$product->name?>" title="<?=$product->name?>" class="img-responsive" /> </a>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"> <a href="index.php?page=product&id=<?=$product->productID?>" title="<?=$product->name?>"><?=$product->name ?></a> </h4>
              <p class="price product-price"> $ <?=$product->price?> </p>
            </div>
            
          </div>
        </div>
          <?php endforeach; ?>
          </div>


          





      </div>
      <div class="category-page-wrapper">
        
        <div class="pagination-inner">
          <ul class="pagination">
          <?php 
          $number_of_products = countPag();

						for($i=0; $i<$number_of_products; $i++): ?>
            <li><a href="#" class="pag" data-limit="<?=$i ?>"><?=$i+1?></a></li>
          <?php endfor; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
