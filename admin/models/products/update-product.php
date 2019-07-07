<?php 
    header("Content-Type:application/json");

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        require_once "../../../config/connection.php";

        require_once "product_functions.php";

        $data['product'] = findProduct($id);

        $data['categories'] = allCategories();

        echo json_encode($data);
    }
    else
    {
        http_response_code(400); 
        echo json_encode(["error"=> "You haven't sent id"]);
    }

?>