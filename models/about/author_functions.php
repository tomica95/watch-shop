<?php 

function author_of_site(){
        
    global $conn;
    try{
    $author = $conn->prepare("SELECT * FROM author WHERE id=?");
    $author_id = "1";
    $author->execute([$author_id]);
    $res = $author->fetch();
    return $res;
    }
    catch(PDOException $e){
         
        writeError($e->getMessage());
    }
}
    

?>