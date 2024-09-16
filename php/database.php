<?php
    $servername="localhost";
    $username = "bidyh";
    $password = "MySecureP@ssw0rd";
    $dbname = "scol";
    try{
        $conn= new PDO('mysql:host=localhost;dbname=scol','bidyh','MySecureP@ssw0rd');
    }catch(Exception $e){
        die(''. $e->getMessage());
    }
?>