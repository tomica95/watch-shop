<?php 
function getAllCategories()
{
    return executeQuery("SELECT * FROM categories");
}

function deleteCategory($id)
{
    try{
        global $conn;

        $delete = $conn->prepare("DELETE FROM categories WHERE id=?");

        $delete->execute([$id]);
        }
        catch(Exception $e){
 
            writeError($e->getMessage());
        }
}


?>