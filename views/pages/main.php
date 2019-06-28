<div class="container">
  <div class="mainbanner">
  <div id="main-banner" class="owl-carousel home-slider">
    <div class="item"> <a href="#"><img src="assets/image/banners/Main-Banner1.jpg" alt="main-banner1" class="img-responsive" /></a> </div>
    <div class="item"> <a href="#"><img src="assets/image/banners/Main-Banner2.jpg" alt="main-banner2" class="img-responsive" /></a> </div>
    <div class="item"> <a href="#"><img src="assets/image/banners/Main-Banner3.jpg" alt="main-banner3" class="img-responsive" /></a> </div>
  </div>
</div>
</div>
<div class="container">
  <div class="row">  
    <div id="brand_carouse" class="owl-carousel brand-logo">
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
        <div class="item text-center"> <a href="#"><img src="assets/image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
      </div>
  </div>
  <div class="row">
    <div id="content" class="col-sm-12">
      <div class="customtab">
        <div id="tabs" class="customtab-wrapper">
          <ul class='customtab-inner'>
            <li class='tab'><a href="#tab-latest">Latest Products</a></li>
         
          </ul>
        </div>
        <div id="tab-latest" class="tab-content">
          <div class="box">
            <div id="latest-slidertab" class="row owl-carousel product-slider">
            <?php 

                include "models/products/functions.php";

                $latest = latestProducts();

                foreach($latest as $product):

            ?>
            <!-- tab latest one item -->
              <div class="item">
                <div class="product-thumb transition">
                  <div class="image product-imageblock"> <a href="index.php?page=product&id=<?=$product->productID?>"><img src="assets/img/<?=$product->small?>" alt="<?=$product->name?>" title="<?=$product->name?>" class="img-responsive" /> </a>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"><a href="" title="<?=$product->name?>"><?=$product->name?></a></h4>
                    <p class="price product-price">$<?=$product->price?></p>
                  </div>
                </div>
              </div>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
        <!-- tab-latest-->
        
      
      </div>
      <h3 class="productblock-title">Best of our collection</h3>
      <div class="box">
        <div id="feature-slider" class="row owl-carousel product-slider">
          <?php 

              $best = bestProducts();

              foreach($best as $pr):
          
          ?>
          <div class="item product-slider-item">
            <div class="product-thumb transition">
              <div class="image product-imageblock"> <a href="index.php?page=product&id=<?=$pr->productID?>"> <img src="assets/img/<?=$pr->small?>" alt="<?=$pr->name?>" title="<?=$pr->name?>" class="img-responsive" /> </a>
              </div>
              <div class="caption product-detail">
                <h4 class="product-name"><a href="index.php?page=product&id=<?=$pr->productID?>" title="<?=$pr->name?>"><?=$pr->name?></a></h4>
                <p class="price product-price"> <span class="price-new">$ <?=$pr->price ?></span> </p>
              </div>
            </div>
          </div>
              <?php endforeach; ?>
        </div>
      </div>
   
      
    </div>
  </div>
    
</div>