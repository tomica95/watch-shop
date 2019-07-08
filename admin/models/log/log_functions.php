<?php 
function countLoggedInUsers()
{
    global $conn;

    try
    {
        $query = $conn->prepare("SELECT COUNT(*) as numOfLogged FROM users WHERE logged=?");

        $query->execute([
            '1'
        ]);

        return $query->fetch();
        

    }
    catch(PDOException $e){
     
        writeError($e->getMessage());
    }

}

function logFiles(){

    $file = fopen("../data/log.txt","r");

    $podaci = file("../data/log.txt");

    return $podaci;

}

?>