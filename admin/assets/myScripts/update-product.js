$(document).ready(function(){

   $('.update-product').on('click',function(){
    
        let id= $(this).data('id');

        $.ajax({
            url:"models/products/update-product.php",
            method:"POST",
            data:
            {
                id
            },
            dataType:"json",
            success:function(data)
            {
                let html=`
        <form action="models/products/update.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                    <label for="username">Product name</label>
                    <input type="text" name="product-name"  tabindex="1" class="form-control" placeholder="Product-name" value="${data.product.name}">
                  </div>
                  <div class="form-group">
                    <label for="username">Code</label>
                    <input type="text" name="code" tabindex="2" class="form-control" placeholder="Code" value="${data.product.code}">
                  </div>
                  <div class="form-group">
                    <label for="password">Price</label>
                    <input type="text" name="price" tabindex="2" class="form-control" placeholder="Price" value="${data.product.price}">
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Description</label>
                    <input type="text" name="description"  tabindex="2" class="form-control" placeholder="Description" value="${data.product.description}">
                  </div>

                  <input type="hidden" name="id" value="${data.product.id}">

                  <input type="hidden" name="category_id" value="${data.product.cat_id}">

                  <div class="input-field">
                          <button type="button" onclick="document.getElementById('productPicture').click()" class="btn btn-info">Add picture to product</button>
                          <span id="productPictureValue"></span>

                          <input type="file" name="picture" id="productPicture" style="display:none;" onchange="document.getElementById('productPictureValue').innerHTML=this.value;"/>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Update product" name="update-product" class="btn btn-success"/>
                        </div> 

                        
                      </form>`;

                      $('#product-update').html(html);


            },
            error:function(error){
                alert(error);
            }
        })

   })

   

 
})