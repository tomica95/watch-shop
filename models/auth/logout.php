<?php 
    session_start();
    require_once "../../config/connection.php";
    require_once "auth_functions.php";
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']->id;
        userLoggedOut($id);
        unset($_SESSION['user']);
    }
    header('Location:../../index.php');

?>