<?php 

    include "config/connection.php";

    include "views/fixed/head.php";

    include "views/fixed/header.php";

    if(isset($_GET['page']))
    {
      switch($_GET['page']){
        
        case 'index':
        include "views/pages/main.php";
        break;

        case 'shop':
        include "views/pages/shop.php";
        break;

        case 'register':
        include "views/pages/register.php";
        break;

        case 'login':
        include "views/pages/login.php";
        break;

        case 'about':
        include "views/pages/about.php";
        break;

        case 'product':
        include "views/pages/product.php";
        break;

      }  
    }
    else
    {
      include "views/pages/main.php";
    }

    include "views/fixed/footer.php";

?>
