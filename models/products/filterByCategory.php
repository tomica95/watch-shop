<?php 

    header("Content-Type:application/json");

    if(isset($_POST['cat_id'])){

        $id = $_POST['cat_id'];

        include "../../config/connection.php";

        include "functions.php";

        $products = filterByCategory($id);

        echo json_encode($products);

        
    }
    else
    {
        http_response_code(400); // Bad request
        echo json_encode(["error"=> "You haven't checked category"]);
    }
   




?>