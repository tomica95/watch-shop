<?php 
    session_start();

    if(isset($_SESSION['user'])&&$_SESSION['user']->role_id=="1")
    {
        require_once "user_functions.php";

        if(isset($_POST['id']))
        {
            $id = $_POST['id'];

            include "../../../config/connection.php";

            deleteUser($id);

            header("Location:../../index.php?page=users");

            
        }
    }
    

?>