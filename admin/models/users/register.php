<?php 
session_start();

if(isset($_SESSION['user'])&&$_SESSION['user']->role_id=="1")
{
    if(isset($_POST['register']))
    {
        $email = $_REQUEST['email'];
        $regMail = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
        $password = $_REQUEST['password'];
        $regPassword = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";
        $conf_password = $_REQUEST['confirm-password'];
        $regPassword2 = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";
        $role_id = $_REQUEST['id_role'];
        $greske = [];
        if(!preg_match($regMail,$email)){
            $greske[]="Mail not good";
        }
        if(!preg_match($regPassword,$password)){
       
            $greske[]="Password not good";
        }
        if(!preg_match($regPassword2,$conf_password)){
            $greske[]="Password2 not good";
        }
        if($password!=$conf_password)
        {
            $greske[]= "Passwords not the same";    
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



            $exist = ifExist($email);

            if($exist)
            {
                $Message = urlencode("Your email is already registered");
                header("Location:../../index.php?page=register&Message=".$Message);
                die;
            }
            else
            {
                $registered = registerUser($email,$password,$role_id);
                if($registered){
    
                    header("Location:../../index.php?page=users");
                }
                else
                {
                    echo "Try again";
                }
            }
            
        }
    }
}


?>