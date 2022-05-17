<?php

//connect to database
$pdo = new PDO('mysql:host=localhost;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



$errors=[];


$title= '';
$price='';
$description='';


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
$title=$_POST['title'];
$description=$_POST['description'];
$price=$_POST['price'];
$date= date('Y-m-d H:i:s');


  if(!$title){
    $errors[] = 'Product title is required';

  }

  if(!$price){
    $errors[] = 'Product price is required';
  }

//if images folder not exist will make images folder
if(!is_dir('images')){

  mkdir('images');

}

//if the title and price is empty don't add record to database
 if(empty($errors))
  {
  //upload an image
  $image=$_FILES['image'] ?? null;
  $imagePath='';
     if($image)
       {
         
          $imagePath='images/'.randomString(8).'/'.$image['name'];
          //return path of the image
          mkdir(dirname($imagePath));

          move_uploaded_file($image['tmp_name'],$imagePath);
        }


//insert record to database
$statement= $pdo->prepare("INSERT INTO products (title ,image ,description,price,create_date) 
       VALUES (:title,:image,:description,:price,:date) ");
       
$statement->bindValue(':title',$title);
$statement->bindValue(':image',$imagePath);
$statement->bindValue(':description',$description);
$statement->bindValue(':price',$price);
$statement->bindValue(':date',$date);
$statement->execute();
    }
}

//function to generate random string and 'n' is length of string
function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str= '';
    for($i=0 ;$i< $n ; $i++)
    {
        $index = round(0, strlen($characters)-1);
        $str.=$characters[$index];
    }

}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Products Crud</title>
  </head>
  <body>
    <h1>Create new Product</h1>


<div class="alert alert-danger">
  <?php foreach ($errors as $error):  ?>
    <div> <?php echo $error ?> </div>
  <?php endforeach; ?>
</div>


    <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Product Image</label>
</br>
    <input type="file" name="image">
  </div>
  <div class="form-group">
    <label>Product Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
  </div>
  <div class="form-group">
    <label>Product Description</label>
    <textarea name="description" class="form-control"><?php echo $description?></textarea>
  </div>
  <div class="form-group">
    <label>Product Price</label>
    <input type="number" name="price" step=".01" value="<?php echo "$price" ?>" class="form-control">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </body>
</html>