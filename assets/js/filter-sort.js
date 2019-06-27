$(document).ready(function(){

    $('.brands').on('click',filter);

       function filter(){

        let cat_id = $(this).data('id');

        console.log()

        $.ajax({
            url:"models/products/filterByCategory.php",
            method:"POST",
            data:{
                
                cat_id
            },
            success:function(products){

                printProducts(products);

            },
            error:function(error){

                $('#products').html(error);
            }
        })

    

    }

    function printProducts(products)
    {
        let html = ``;
        for(product of products)
        {
            html+=singleProduct(product);
        }

        $('#products').html(html);
    }

    function singleProduct(product)
    {
        return `
        <div class="product-layout product-list col-xs-12">
        <div class="product-thumb">
          <div class="image product-imageblock"> <a href="index.php?page=product&id=${product.productID}"> <img src="assets/img/${product.small}" alt="<?=$product->name?>" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
          </div>
          <div class="caption product-detail">
            <h4 class="product-name"> <a href="index.php?page=product&id=${product.productID}" title="lorem ippsum dolor dummy">${product.name}</a> </h4>
            <p class="price product-price"> $ ${product.price} </p>
          </div>
          
        </div>
      </div>


        `;
    
    }
    

})