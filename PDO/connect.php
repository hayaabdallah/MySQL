<?php
//data source name
$dsn='mysql:host=localhost;dbname=student';
$user='root';
$password='';


try
{
//start new connection with PDO
$db= new PDO($dsn,$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//echo "you are connected";
$q="INSERT INTO tbl (name, color) VALUES ('p3', 'pink')";
$db=exec($q);
}

catch(PDOException $e)
{
  echo "failed" . $e->getMessage();

}




?>
