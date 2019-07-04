<?php 

function allUsers(){

    try{

    return executeQuery("SELECT * , u.id AS id FROM users u INNER JOIN roles r ON u.role_id=r.id");
    }
    catch(Exception $e){
     
        writeError($e->getMessage());
    }
}
function deleteUser($id)
{
            try{
            global $conn;

            $delete = $conn->prepare("DELETE FROM users WHERE id=?");

            $delete->execute([$id]);
            }
            catch(Exception $e){
     
                writeError($e->getMessage());
            }

}
function allRoles()
{
    try
    {
        return executeQuery("SELECT * FROM roles");
    }
    catch(Exception $e){
     
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
function registerUser($email,$password,$role_id)
    {
        global $conn;
        try{
            $register = $conn->prepare("INSERT INTO users VALUES('',?,?,?,?)");
            $inserted = $register->execute([$email,md5($password),"0",$role_id]);
            return $inserted;
        }
        catch(PDOException $e){
         
            writeError($e->getMessage());
        }
    }

?>