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

function deleteProduct($id)
{
    try{
        global $conn;

        $delete = $conn->prepare("DELETE FROM products WHERE id=?");

        $delete->execute([
            $id
            ]);

        }
        catch(Exception $e){
 
            writeError($e->getMessage());
        }
}

function deletePictureofProduct($id)
{
    try{
        global $conn;

        $delete = $conn->prepare("DELETE FROM pictures WHERE product_id=?");

        $delete->execute([
            $id
            ]);

        }
        catch(Exception $e){
 
            writeError($e->getMessage());
    }
}

function findProduct($id)
{
    global $conn;
    try
    {
        $product = $conn->prepare("SELECT *,p.id AS productID FROM products p JOIN pictures s ON p.id=s.product_id WHERE p.id=?");

        $product->execute([
            $id
        ]);

        $result = $product->fetch();

        return $result;
    }
    catch(PDOException $e){
         
        writeError($e->getMessage());
    }
}

function allCategories()
{
    try{

    return executeQuery("SELECT * FROM categories");

    }
    catch(PDOException $e){
         
        writeError($e->getMessage());
    }

}

function updateProduct($name,$price,$code,$description,$category_id,$date,$id)
{
    try
    {
        global $conn;
        
        $query = $conn->prepare("UPDATE products SET name=:name,code=:code,price=:price,description=:desc,cat_id=:cat_id,date=:date WHERE id=:id");

                $query->execute([
                    "name"=>$name,
                    "code"=>$code,
                    "price"=>$price,
                    "desc"=>$description,
                    "cat_id"=>$category_id,
                    "date"=>$date,
                    "id"=>$id
                ]);
                
    }
    catch(PDOException $e){
         
        writeError($e->getMessage());
    }
    
}

function updatePicture($srcOriginalPicture,$srcNewPicture,$id)
{
    try
    {
        global $conn; 
        
        $update = $conn->prepare("UPDATE pictures SET big=:big,small=:small WHERE product_id=:product_id");
                            
                            $update->execute([
                                "big"=>$srcOriginalPicture,
                                "small"=>$srcNewPicture,
                                "product_id"=>$id
                            ]);
    }
    catch(PDOException $e){
         
        writeError($e->getMessage());
    }
    
}


?>