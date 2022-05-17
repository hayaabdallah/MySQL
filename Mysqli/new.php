<?php
include "conn.php";
$aniname=$_GET['name'];
$aniage=$_GET['age'];
$anicolor=$_GET['color'];




$query="INSERT INTO animal(name,age,color)
VALUES ('$aniname','$aniage','$anicolor')";
if(mysqli_query($conn,$query))
  echo "new record in animals";
  else
  {
      echo "error". $query.mysqli_error($conn);
  }

?>