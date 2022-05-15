<?php

$server="localhost";
$user="root";
$password="";
$dbname="animals";

$conn=mysqli_connect($server,$user,$password,$dbname);

if($conn)
{
    echo "connected successfully";
}
else
{
    die("there is a problem".mysqli_connect_error());
}



?>