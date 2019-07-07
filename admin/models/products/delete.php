<?php 

session_start();

if(isset($_SESSION['user'])&&$_SESSION['user']->role_id=="1")
{
    if(isset($_POST['id']))
    {
        include "../../../config/connection.php";
        require_once "product_functions.php";

        $id = $_POST['id'];

        deleteProduct($id);

        deletePictureofProduct($id);

        header("Location:../../index.php?page=products");


    }
}

?>