<?php

require_once "config.php";
try {

    
    
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOPDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($query){
    global $conn;
    return $conn->query($query)->fetchAll();
}

function executeQueryOneRow($query){
    global $conn;
    return $conn->query($query)->fetch();
}

// function writeAccess(){

//     $file = fopen(BASE_URL ."data/log.txt","a");

//     $text = date("d.m.Y") . "\t" . basename($_SERVER['REQUEST_URI']) . "\t" . $_SERVER['REMOTE_ADDR'] . "\n";

//     fwrite($file, $text);
//     fclose($file);

// }
