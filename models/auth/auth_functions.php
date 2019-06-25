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
         
            writeError($e->getMessage());
        }
    }

function ifExist($email)
{
    global $conn;
    try{
    $checking_if_exist = $conn->prepare("SELECT * FROM users WHERE email=?");
    $checking_if_exist->execute([
        $email
    ]);
    
    $exist = $checking_if_exist->fetch();

    return $exist;
    }
    catch(PDOException $e){
         
        writeError($e->getMessage());
    }

}

function findUser($email,$password){
    global $conn;
    try{
        $result = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $result->execute([$email,md5($password)]);
        return $result->fetch();
    }
    catch(PDOException $e){
     
        writeError($e->getMessage());
    }
}
function userLogged($id_user)
{
    global $conn;
    try{
    $query = $conn->prepare("UPDATE users SET logged=:log WHERE id=:id");
    $query->execute([
            'log'=>'1',
            'id'=>$id_user
            ]);
    }
    catch(PDOException $e){
         
        writeError($e->getMessage());
    }

}
function userLoggedOut($id)
{
        global $conn;
        try{
        $query = $conn->prepare("UPDATE users SET logged=:log WHERE id=:id");
        $query->execute([
            'log'=>'0',
            'id'=>$id
        ]);
        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }
}


?>