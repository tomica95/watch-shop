<?php 

        session_start();

        if(isset($_SESSION['user'])&&$_SESSION['user']->role_id=="1")
        {
        
        include "../config/connection.php";

        include "views/fixed/head.php";

        include "views/fixed/left-panel.php";

        include "views/fixed/right-panel.php";

        if(isset($_GET['page'])){
        
        switch($_GET['page']){
        
        case 'users':
        include "views/pages/users.php";
        break;

        case 'register':
        include "views/pages/register-user.php";
        break;

        case 'categories':
        include "views/pages/categories.php";
        break;

        case "insert-category":
        include "views/pages/insert-category.php";
        break;

        case "products":
        include "views/pages/products.php";
        break;

        case "insert-product":
        include "views/pages/insert-product.php";
        break;

        }  
    
        }
        else
        {
                include "views/pages/main.php";
        }
    

        include "views/fixed/footer.php";

        }
        else
        {
                echo "You don't have permission to be here!";
        }

        

        
?>

