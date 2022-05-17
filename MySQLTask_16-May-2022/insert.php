<?php
    include_once 'connect.php';

    try {
        // if (!empty($_SESSION['pname'])) {
            $animal_name = $_POST['name'];
            $animal_age = $_POST['age'];
            $animal_color=$_POST['color'];
            $animal_sound=$_POST['sound'];
            $animal_gender=$_POST['gender'];
            $animal_category = $_POST['category'];

            $query1 = "INSERT INTO animal(name,age ,color,sound,gender,category)
            VALUES (:name, :age, :color,:sound,:gender,:category) ";
            $statment2 = $conn->prepare($query1);
            $statment2->execute([
                ':name' => $animal_name,
                ':age' => $animal_age,
                ':color'=>$animal_color,
                ':sound'=>$animal_sound,
                ':gender'=>$animal_gender,
                ':category' => $animal_category
            ]);
            echo "New record created successfully";
          
        }catch (PDOException $e) {
            echo $query1 . "<br>" . $e->getMessage();
             header('location:show.php');
        } finally {
            $conn = NULL;
        }
            ?>