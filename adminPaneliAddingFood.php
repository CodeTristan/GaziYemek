<?php

    $foodName = $_POST["mealName"];
    $foodType = $_POST["mealType"];
    $foodCalorie = $_POST["calories"];
    $foodImage = $_POST["mealImage"];
    $isVegetarian = !empty($_POST["isVegetarian"]) ? 1 : 0;


    require "dbConfig.php";

    $sql = "INSERT INTO food (ID,File_name,Name,Calorie,isVegetarian,Food_Type) 
            VALUES (NULL,'$foodImage','$foodName','$foodCalorie','$isVegetarian','$foodType')";

    if (mysqli_query($db, $sql)) {
        echo "Yemek başarıyla eklendi!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);

    header("Location:adminPaneli.php");
    exit();
?>