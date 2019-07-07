<?php 

function getAllProductsWithPictureAndCategory()
{
    try{

    return executeQuery('SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id INNER JOIN categories c ON p.cat_id=c.id');
    }
    catch(PDOException $e){

        writeError($e->getMessage());
       
    }
    
}

?>