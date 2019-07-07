<?php 

function getAllProductsWithPictureAndCategory()
{
    try{

    return executeQuery('SELECT *,p.id as productID,p.name as productName,c.name as categoryName FROM products p INNER JOIN pictures s ON p.id=s.product_id INNER JOIN categories c ON p.cat_id=c.id ORDER BY date ASC');
    }
    catch(PDOException $e){

        writeError($e->getMessage());
       
    }
    
}

function insertProduct($name,$code,$price,$description,$category_id,$date){

    try
    {
        global $conn;

        $insert = $conn->prepare("INSERT INTO products VALUES('',?,?,?,?,?,?)");

        $inserted = $insert->execute([
            $name,$code,$description,$price,$category_id,$date
        ]);
    }
    catch(PDOException $e){

        writeError($e->getMessage());
       
    }
    
}

function insertPicture($srcOriginalPicture, $srcNewPicture, $product_id){
    try{
    global $conn;
    $insert = $conn->prepare("INSERT INTO pictures VALUES('', ?, ?,?)");
    $isInserted = $insert->execute([$srcOriginalPicture, $srcNewPicture,$product_id]);
    return $isInserted;
    }
    catch(PDOException $e){

        writeError($e->getMessage());
       
    }
}


?>