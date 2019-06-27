<?php


    header("Content-Type:application/json");

    if(isset($_POST['parametar'])){
        
        $parametar = $_POST['parametar'];

        include "../../config/connection.php";

        include "functions.php";

        $result = sortProducts();

        switch($parametar){

            case "default":
            $result;
            break;

            case "name-asc":
            $result .="ORDER BY name ASC";
            break;

            case "name-desc":
            $result .="ORDER BY name DESC";
            break;

            case "price-asc":
            $result .="ORDER BY price ASC";
            break;

            case "price-desc":
            $result .="ORDER BY price DESC";
            break;
        }

        $products = executeQuery($result);

        echo json_encode($products);

    }
    else
    {
        http_response_code(400); // Bad request
        echo json_encode(["error"=> "You haven't any parametar"]);
        
    }


?>