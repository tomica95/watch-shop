<?php 

session_start();

if(isset($_SESSION['user'])&&$_SESSION['user']->role_id=="1")
{
    if(isset($_POST['update']))
    {
        $email = $_REQUEST['email'];
        $regMail = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
        $role_id = $_REQUEST['role_id'];
        $id= $_REQUEST['id'];
        $greske = [];



        if(!preg_match($regMail,$email)){
            $greske[]="Mail not good";
        }
        
        if($role_id=="0")
        {
            $greske[]="You must choose role";
        }
        if(count($greske)>0){
           echo "<ul>";
            foreach($greske as $greska)
            {
                echo "<li>".$greska."</li>";
            }
            echo "</ul>";
        }
        else
        {
            require_once "../../../config/connection.php";

            require_once "user_functions.php";

            
            updateUser($email,$role_id,$id);

            header("Location:../../index.php?page=users");
               
                
        }
    }
}

?>