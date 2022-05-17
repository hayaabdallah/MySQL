<?php
require 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


  <form action="insert.php" method="post">
  <div class="form-group">
    <label>Animal Name:</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
    <label>Age</label>
    <input type="number" class="form-control" name="age">
  </div>
  <div class="form-group">
    <label>Color</label>
    <input type="text" class="form-control" name="color">
  </div>
  <div class="form-group">
    <label>Sound</label>
    <input type="text" class="form-control" name="sound">
  </div>

  <div class="form-group">
    <label>Gender</label>
    <input type="text" class="form-control" name="gender">
  </div>


  <?php
  //to return options from the another table category
            $sql = 'SELECT * FROM category order by id';

            $statment = $conn->query($sql);

            $categories = $statment->fetchAll();
            ?>
            <div class="form-group">
                <label for="category"><b> Category: </b></label>
                <select name="category" class="form-control" Required>
                    <option>Select Category</option>
                    <?php foreach ($categories as $value) : ?>
                        <option value="<?php echo $value['category']; ?>"><?php echo $value['category']; ?></option>
                    <?php endforeach ?>
                </select>
            </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>




  





      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>