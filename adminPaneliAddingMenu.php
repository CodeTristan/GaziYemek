<?php

    $AnaYemek = $_POST["anaYemek"];
    $corba = $_POST["corba"];
    $pilavAraSicak = $_POST["pilavAraSicak"];
    $tatliMeyveSalata = $_POST["tatliMeyveSalata"];
    $vejetaryen = $_POST["VejetaryenSelect"];
    $selectedDate = $_POST["selectedDate"];

    $yemekler = array();
    $yemekler[0] = $AnaYemek;
    $yemekler[1] = $corba;
    $yemekler[2] = $pilavAraSicak;
    $yemekler[3] = $tatliMeyveSalata;
    $yemekler[4] = $vejetaryen;

    require "dbConfig.php";

    
    if($db->query("SELECT * FROM menu where date = '$selectedDate'")->num_rows > 0)
    {
        echo "Bu tarihte zaten bir menü var";
        
    }
    
    $sql1 = "INSERT INTO menu (ID,Date) 
            VALUES (NULL,'$selectedDate')";
    
    if (mysqli_query($db, $sql1))
    {
        echo "Menü başarıyla eklendi!";
    } 
    else 
    {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
    }

    $selectedMenuID = $db->query("SELECT ID FROM menu where date = '$selectedDate'")->fetch_assoc()["ID"];
    for($i = 0; $i < 5; $i++)
    {
        $yemek = $yemekler[$i];
        $selectedFoodID = $db->query("SELECT ID FROM food where food.Name = '$yemek'")->fetch_assoc()["ID"];
        $sql2 = "INSERT INTO food_has_menu (ID,Food_ID,Menu_ID) 
        VALUES (NULL,'$selectedFoodID','$selectedMenuID')";
        
        echo "food: " . $yemek . " food id: " . $selectedFoodID . " menu ID: " . $selectedMenuID; 
        if (mysqli_query($db, $sql2))
        {
            echo "Menü başarıyla eklendi!";
        } 
        else 
        {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($db);
        }
    }
    

    mysqli_close($db);

?>