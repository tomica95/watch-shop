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

    function banner(){

        try
        {
            return executeQuery("SELECT * FROM banner");
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

    define("PRODUCT_ONPAGE",3);

    function getProductsWithPicturePag($limit=0)
    {
        try{
        global $conn;
        
        $select = $conn->prepare("SELECT * FROM products p INNER JOIN pictures i ON p.id=i.product_id LIMIT :limit, :offset");

        $limit = ((int) $limit)* PRODUCT_ONPAGE;

        $select->bindParam(":limit",$limit,PDO::PARAM_INT);

        $number = PRODUCT_ONPAGE;

        $select->bindParam(":offset",$number,PDO::PARAM_INT);

        $select->execute();

        $products = $select->fetchAll();

        return $products;
        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }


    }

    function getNumOfProducts()
    {
        try{
        return executeQueryOneRow("SELECT COUNT(*) AS num FROM products");
        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }
    }

    function getPaginationCount()
    {
        try{
        $number = getNumOfProducts();

        $numberOfProducts = $number->num;

        return ceil($numberOfProducts /  PRODUCT_ONPAGE);

        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }
    }



?>