<?php 

    if(isset($_POST['string']))
    {
        require_once "../../config/connection.php";
        require_once "functions.php";

        $string = "%".strtolower($_POST['string'])."%";

        $searchQuery = searchQuery();

        $searchQuery .= " WHERE LOWER(name) LIKE :name";

        $result = $conn->prepare($searchQuery);

        $result->bindParam(":name",$string);

        $result->execute();

        $products = $result->fetchAll();

        echo json_encode($products);

    }
    else {

        http_response_code(400);
        echo json_encode(["error"=> "You must enter a letter from a name"]);
    }

?>