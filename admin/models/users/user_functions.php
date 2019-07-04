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

?>