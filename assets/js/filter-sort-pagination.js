$(document).ready(function(){

    $('.brands').on('click',filter);

    $('#input-sort').on('change',sort);

    $('.search').on('keyup',searchByName);

    $('.pagination').on('click','.pag',pagination);

    function pagination(e){

        e.preventDefault();

        let limit = $(this).data('limit');

        $.ajax({
            url:"models/products/pagination.php",
            method:"GET",
            dataType:"JSON",
            data:
            {
                limit
            },
            success:function(data)
            {

                printProducts(data.products);
                printPagination(data.pagination);
                
            },
            error:function(error){

                $('#products').html(error);
            }
        })
    }

    function filter(){

        let cat_id = $(this).data('id');

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

    function sort()
    {
        let parametar = $(this).val();

        $.ajax({
            url:"models/products/sort.php",
            method:"POST",
            data:{
                parametar
            },
            dataType:'json',
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
        <div class="product-layout product-grid col-xs-12 col-lg-3">
            <div class="product-thumb">
          <div class="image product-imageblock"> 
            <a href="index.php?page=product&id=${product.productID}">
            <img src="${product.small}" alt="${product.name}" title="${product.name}" class="img-responsive">
            </a>
          </div>
        
          <div class="caption product-detail">
            <h4 class="product-name"> <a href="index.php?page=product&id=${product.productID}" title="${product.name}">${product.name}</a> </h4>
            <p class="price product-price"> $ ${product.price} </p>
          </div>
          </div>
      
      </div>


        `;
    
    }
    
    function searchByName(){

        let string = $(this).val();

        $.ajax({
            url:"models/products/search.php",
            method:"POST",
            dataType:"json",
            data:
            {
                string
            },
            success:function(products)
            {
                
                if(products.length=="0")
                {
                    $text = "We do not have watch with name like that";

                    $('#products').html($text);
                }
                else
                {
                    printProducts(products);
                }

                
                
                
            },
            error:function(error){

                $('#products').html(error);
            }
        })
    }

    function printPagination(number)
    {
        let html = ``;

        for(let i=0; i<number; i++)
        {
            html+=`
                <li><a href="#" class="pag" data-limit="${i}">${i+1}</a></li>
            `;
        }

        $('.pagination').html(html);
    }

   

})