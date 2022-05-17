
<?php
include "conn.php";

$aniname=$_GET['name'];
$aniage=$_GET['age'];
$anicolor=$_GET['color'];
$anisound=$_GET['sound'];
$anigender=$_GET['gender'];
//insert
$query="INSERT INTO animal(name,age,color,sound,gender)
VALUES ('$aniname','$aniage','$anicolor','$anisound','$anigender')";
if(mysqli_query($conn,$query))
  echo "new record in animals";
  else
  {
      echo "error". $query.mysqli_error($conn);
  }

  
//update
$query2="UPDATE animal SET name='Bear', age='2',color='black',sound='growl',gender='male' WHERE id=3" ;
 if(mysqli_query($conn,$query2))
 echo "record updated";
 else
 {
     echo "error". $query2.mysqli_error($conn);
 }

 //delete
 $query3="DELETE FROM animal WHERE id=5";
 if(mysqli_query($conn,$query3))
 echo "record deleted";
 else
 {
     echo "error". $query3.mysqli_error($conn);
 }

//select
$query4="SELECT * FROM animal";
$res = mysqli_query($conn,$query4);
echo('<table border="2">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Age</th>
      <th>Color</th>
      <th>Sound</th>
      <th>Gender</th>
    </tr>');  
  if ($res) {
    while($i= mysqli_fetch_array($res)) {
      echo "<tr><td>".$i["id"]."</td><td>".$i["name"].
      "</td><td>".$i["age"]."</td><td>".
      $i["color"]."</td><td>".$i["sound"]."</td><td>".$i["gender"]."</td></tr>";
    }
    echo "</table>";
     }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="animal.php" method="get">
        <label>animal name:</label>
       <input type="text" name="name">
    </br>
       <label>age:</label>
       <input type="text" name="age">
    </br>
    <label>color:</label>
    <input type="text" name="color">
    </br>
    <label>sound:</label>
    <input type="text" name="sound">
    </br>
    <select>
        <option selected>select menu</option>
        <option>sss</option>

    </select>
</br>
    <label>gender:</label>
    <input type="text" name="gender">
    </br>
    <button name="submit">submit</button>
    </form>
</body>
</html>
