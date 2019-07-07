<?php 

    if(isset($_POST['update-category']))
    {
        $id = $_POST['id'];

        $name = $_POST['category'];

        $greske = [];

        if(empty($name))
        {
            $greske[]="You must enter category";
        }

        

        if(count($greske)>0)
        {
            foreach($greske as $greska)
            {
                echo "<h2>".$greska."</h2>";
            }
        }
        else
        {

            require_once "../../../config/connection.php";

            require_once "category_functions.php";

            
            updateCategory($id,$name);

            header("Location:../../index.php?page=categories");
        }
    }


?>