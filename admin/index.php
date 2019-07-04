<?php 

        session_start();

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

        }  
    
        }
        else
        {
                include "views/pages/main.php";
        }
    

        include "views/fixed/footer.php"
?>

