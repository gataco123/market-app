<?php
    //data base connection
    $host     = "127.0.0.1"; //local host
    $user     = "postgres";
    $dbname   = "marketapp";
    $password = "unicesmag";
    $port     = "5432";
    
    $data_connection = "
        host = $host
        user = $user
        password = $password
        dbname = $dbname
        port = $port
    ";
    
    $conn =pg_connect($data_connection);

    if(!$conn){
        echo "error";
    }else{
        echo "connection succesfully :::";
    }


?>