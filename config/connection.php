<?php

require_once "config.php";
try {

    
    
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
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

function writeError($error){
    $file = fopen(BASE_URL . "data/errors.txt", "a");
    $string = date("d.m.Y H:i:s") ."\t" . $error . "\n";
    fwrite($file, $string);
    fclose($file);
}


