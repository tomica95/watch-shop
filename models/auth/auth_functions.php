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

function findUser($email,$password){
    global $conn;
    try{
        $result = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $result->execute([$email,md5($password)]);
        return $result->fetch();
    }
    catch(PDOException $e){
     
        handle($e->getMessage());
    }
}
function userLogged($id_user)
{
    global $conn;
    $query = $conn->prepare("UPDATE users SET logged=:log WHERE id=:id");
    $query->execute([
            'log'=>'1',
            'id'=>$id_user
            ]);

}
function userLoggedOut($id)
{
        global $conn;
        $query = $conn->prepare("UPDATE users SET logged=:log WHERE id=:id");
        $query->execute([
            'log'=>'0',
            'id'=>$id
        ]);

}


?>