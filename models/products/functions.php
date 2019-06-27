<?php 

    function getAllProductsWithPicture()
    {
        return executeQuery('SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id');
    }

    function filterByCategory($id)
    {
        global $conn;

        try{

            $products = $conn->prepare("SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id INNER JOIN categories c ON p.cat_id=c.id WHERE cat_id= ?");

            $products->execute([
                $id
            ]);
    
            $result = $products->fetchAll();

            return $result;

        }
        catch(PDOPDOException $e){

         
                handle($e->getMessage());
           


        }
    }

?>