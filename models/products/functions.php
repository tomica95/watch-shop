<?php 

    function getAllProductsWithPicture()
    {
        try{

        return executeQuery('SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id');
        }
        catch(PDOException $e){

            writeError($e->getMessage());
           
        }
        
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
        catch(PDOException $e){

            writeError($e->getMessage());
           
        }
    }
    function sortProducts(){

        try{

            return "SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id ";

        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }
    }
    function getProductWithPictureById($id)
    {
        try{
            global $conn;

            $product = $conn->prepare("SELECT *,p.name as productName,c.name as categoryName,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id INNER JOIN categories c ON p.cat_id=c.id WHERE p.id=?");
            
            $product->execute([
                $id
            ]);
            $result = $product->fetch();

            return $result;

            }
            catch(PDOException $e){
    
                writeError($e->getMessage());
               
            }

    }

    function latestProducts(){

        try {

            return executeQuery("SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id ORDER BY date DESC LIMIT 3 ");

        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }
    }

    function bestProducts()
    {
        try {

            return executeQuery("SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id ORDER BY price DESC LIMIT 5 ");

        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }
    }

    function searchQuery()
    {
        return "SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id";
    }



?>