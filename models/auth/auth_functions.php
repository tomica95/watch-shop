<?php

function registerUser($email,$password)
    {
        global $conn;
        try{
            $register = $conn->prepare("INSERT INTO users VALUES('',?,?,?,?)");
            $inserted = $register->execute([$email,md5($password),"0","2"]);
            return $inserted;
        }
        catch(PDOException $e){
         
            handle($e->getMessage());
        }
    }

function ifExist($email)
{
    global $conn;

    $checking_if_exist = $conn->prepare("SELECT * FROM users WHERE email=?");
    $checking_if_exist->execute([
        $email
    ]);
    
    $exist = $checking_if_exist->fetch();

    return $exist;
}

?>