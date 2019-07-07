<?php

if(isset($_POST['insert-product'])){
    
    require_once "../../../config/connection.php";
    require_once "product_functions.php";

    //working with product
    $product_name = $_POST['product-name'];

    $code = $_POST['code'];

    $price = $_POST['price'];

    $description = $_POST['description'];

    $category_id = $_POST['category_id'];

    $date = date("Y-m-d H:i:s");

    $greske = [];

    if(empty($product_name)){
        $greske[]="Please insert name of product";
    }
    if(empty($code)){
        $greske[]="Please insert code";
    }
    else if(!is_numeric($code))
    {
        $greske[]="Code must be number";
    }
    if(empty($description)){
        $greske[]="Please insert description of product";
    }
    if(empty($price)){
        $greske[]="Please insert price of product";
    }
    else if(!is_numeric($price))
    {
        $greske[]="Your price must be number";
    }
    if(!is_numeric($category_id))
    {
        $greske[]="You must enter the category";
    }
    if(count($greske)>0){
        echo "<ul>";
        foreach($greske as $error){
            echo "<li>".$error."</li>";
        }
        echo "</ul>";
    }
    else
    {
  
    // working with picture
    $file_name = $_FILES['picture']['name'];
    $tmp_Location = $_FILES['picture']['tmp_name'];
    $file_type = $_FILES['picture']['type'];
    $file_size = $_FILES['picture']['size'];
    

 
    $errors = [];

    $alow_types = ['image/jpg', 'image/jpeg', 'image/png'];

    if(!in_array($file_type, $alow_types)){
        array_push($errors, "Wrong type, try again");
    }
    if($file_size > 3000000){
        array_push($errors, "To heavy");
    }

    
    if(count($errors) == 0){
       

        list($width, $height) = getimagesize($tmp_Location);

       
        
        $permanent_picture = null;
        switch($file_type){
            case 'image/jpeg':
                $permanent_picture = imagecreatefromjpeg($tmp_Location);
                break;
            case 'image/png':
                $permanent_picture = imagecreatefrompng($tmp_Location);
                break;
        }

        $newWidth = 320;
        $newHeight = ($newWidth/$width) * $height; 
        $newPicture = imagecreatetruecolor($newWidth, $newHeight);
        
    
        imagecopyresampled($newPicture, $permanent_picture, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        
        $name = time().$file_name;
        $srcNewPicture = 'assets/img/small/'.$name;

        switch($file_type){
            case 'image/jpeg':
                imagejpeg($newPicture,'../../../'.$srcNewPicture, 75);
                break;
            case 'image/png':
                imagepng($newPicture,'../../../'.$srcNewPicture);
                break;
        }

        $srcOriginalPicture = 'assets/img/'.$name;

        if(move_uploaded_file($tmp_Location, '../../../'.$srcOriginalPicture)){
            

            try {
                insertProduct($product_name,$code,$price,$description,$category_id,$date);
                $product_id = $conn->lastInsertId();
                $isInserted = insertPicture($srcOriginalPicture, $srcNewPicture,$product_id);

                if($isInserted){
                    
                    header("Location:../../index.php?page=products");
                }
                
            } catch(PDOException $e){

                writeError($e->getMessage());
               
            }
        }

       
        imagedestroy($permanent_picture);
        imagedestroy($newPicture);

    } else {
        echo "<ul>";
        foreach($errors as $error)
        {
            echo "<li>".$error."</li>";
        }
    }
}

}