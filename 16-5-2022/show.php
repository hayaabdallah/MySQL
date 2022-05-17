<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
   

    try {

        $sql = "SELECT * FROM animal";
        echo ('<div class="table-responsive-sm" id="table-div"  style="width:80%; padding-left: 300px; padding-top: 50px; color: gray; " >
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">age</th>
                <th scope="col">Color</th>
                <th scope="col">sound</th>
                <th scope="col">Gender</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody id="info">');
        $statment = $conn->query($sql);

        $pro = $statment->fetchAll();
        if ($pro) {

            foreach ($pro as $value) {
                echo "<tr><td>" . $value["id"] . "</td><td>" . $value["name"] . "</td><td>" . $value["age"] . "</td><td>" . $value["color"] . "</td></td>"."</td><td>" . $value["sound"] . "</td></td>"
                ."</td><td>" . $value["gender"] . "</td></td>"."</td><td>" . $value["category"] . "</td></td>";
            }
            echo "</tbody></table>";
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    } finally {
        $conn = NULL;
    }
 

    echo ('<br><form action="add.php" ><button class="btn btn-primary" id="btn"> Add </a></button></form>
    ');

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>