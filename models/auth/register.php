<?php 
require_once "../../config/connection.php";
require_once "auth_functions.php";

    if(isset($_POST['register'])){
        $email = $_REQUEST['email'];
        $regMail = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
        $password = $_REQUEST['password'];
        $regPassword = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";
        $conf_password = $_REQUEST['confirm-password'];
        $regPassword2 = "/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}/";
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
        if(count($greske)>0){
            Header("Location:../../index.php?page=register");
        }
        else
        {
           $exist = ifExist($email);

            if($exist)
            {
                $Message = urlencode("Your email is already registered");
                header("Location:../../index.php?page=register&Message=".$Message);
                die;
            }
            else
            {
                $registered = registerUser($email,$password);
                if($registered){
    
                    header("Location:../../index.php?page=login");
                }
                else
                {
                    echo "Try again";
                }
            }
            
        }
        
      
        
    }
?>