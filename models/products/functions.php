<?php 

    function getAllProductsWithPicture()
    {
        return executeQuery('SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id');
    }

?>