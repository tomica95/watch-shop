<?php 
    header("Content-Type:application/json");
    
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        require_once "user_functions.php";

        require_once "../../../config/connection.php";

        $user = findUser($id);

        $roles = allRoles();

        $data['user']=$user;
        $data['roles']=$roles;

        echo json_encode($data);
    }
    else {

        http_response_code(400); 
        echo json_encode(["error"=> "You haven't sent id"]);
    }

?>