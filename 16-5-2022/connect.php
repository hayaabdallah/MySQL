<?php


$server="localhost";
$user="root";
$password="";
$db="animals";

try{

$conn=new PDO("mysql:host=$server;dbname=animals",$user,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "connected success";
}

catch (PDOException $e){

    echo "Connection failed: " . $e->getMessage();
}

?>