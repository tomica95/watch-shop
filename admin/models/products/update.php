<?php 

session_start();

if(isset($_SESSION['user'])&&$_SESSION['user']->role_id=="1")
{
    if(isset($_POST['update-product']))
    {
        require_once "../../../config/connection.php";

        require_once "product_functions.php";

        $prname = $_POST['product-name'];
        
        $price = $_POST['price'];

        $code = $_POST['code'];

        $description = $_POST['description'];

        $category_id = $_POST['category_id'];

        $date = date("Y-m-d H:i:s");

        $id = $_POST['id'];

        

                $file_name = $_FILES['picture']['name'];
                $tmp_Location = $_FILES['picture']['tmp_name'];
                $file_type = $_FILES['picture']['type'];
                $file_size = $_FILES['picture']['size'];
                
            
             
                $errors = [];
            
                $alow_types = ['image/jpg', 'image/jpeg', 'image/png'];
            
                if(!in_array($file_type, $alow_types)){
                    array_push($errors, "Wrong type");
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
                        
                        updateProduct($prname,$price,$code,$description,$category_id,$date,$id);

                        updatePicture($srcOriginalPicture,$srcNewPicture,$id);                
                         
                    }
            
                   
                    imagedestroy($permanent_picture);
                    imagedestroy($newPicture);
                }
            
            

            header('Location:../../index.php?page=products');
    }
}

?>