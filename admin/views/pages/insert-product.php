<h2>Insert product with picture</h2>
                        <form action="models/products/insert.php" method="POST" enctype="multipart/form-data">

                        

                        <p style="color: #9e9e9e;font-size: 12px;font-weight:400;">Choose category:</p>
                  <select name="category_id">

                    
                    <?php 
                    require_once "models/categories/category_functions.php";

                    $categories = getAllCategories();
                    
                    foreach($categories as $category): ?>
                    <option value="<?=$category->id?>"><?=$category->name?></option>
                    <?php endforeach; ?>

                    </select>

                    <div class="form-group">
                    <label for="username">Product name</label>
                    <input type="text" name="product-name"  tabindex="1" class="form-control" placeholder="Product-name" value="">
                    </div>
                    <div class="form-group">
                    <label for="username">Product code</label>
                    <input type="text" name="code"  tabindex="1" class="form-control" placeholder="Code" value="">
                    </div>
                  <div class="form-group">
                    <label for="confirm-password">Description</label>
                    <input type="text" name="description"  tabindex="2" class="form-control" placeholder="Description">
                  </div>
                  <div class="form-group">
                    <label for="password">Price</label>
                    <input type="text" name="price" tabindex="2" class="form-control" placeholder="Price">
                  </div>
                  

                        <div class="input-field">
                          <button type="button" onclick="document.getElementById('productPicture').click()" class="btn btn-info">Add picture to product</button>
                          <span id="productPictureValue"></span>

                          <input type="file" name="picture" id="productPicture" style="display:none;" onchange="document.getElementById('productPictureValue').innerHTML=this.value;"/>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Insert product" name="insert-product" class="btn btn-success"/>
                        </div> 


                        
                      </form>
                      </br>