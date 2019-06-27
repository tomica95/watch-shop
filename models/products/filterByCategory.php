<?php 

    header("Content-Type:application/json");

    if(isset($_POST['cat_id'])){

        $id = $_POST['cat_id'];

        include "../../config/connection.php";

        include "functions.php";

        global $conn;

        try{

            $product = $conn->prepare("SELECT *,p.id as productID FROM products p INNER JOIN pictures s ON p.id=s.product_id INNER JOIN categories c ON p.cat_id=c.id WHERE cat_id= ?");

            $product->execute([
                $id
            ]);
    
            echo json_encode($product->fetchAll());

        }
        catch(PDOPDOException $e){

         
                handle($e->getMessage());
           


        }

        
    }
    else
    {
        http_response_code(400); // Bad request
        echo json_encode(["error"=> "You haven't checked category"]);
    }
   




?>