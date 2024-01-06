<?php
    date_default_timezone_set("Europe/Istanbul");

    $today = date("Y-m-d");

    echo $today;
    require "dbConfig.php";

    $query = $db->query("SELECT food.Name, food.Calorie, Food.File_Name, menu.Date,food.Food_Type
                        from food_has_menu 
                        inner join food on food_has_menu.Food_ID = food.ID
                        inner join menu on food_has_menu.Menu_ID = menu.ID
                        Where menu.date = '$today'");
    
    echo "<br> $query->num_rows";
    while ($row = mysqli_fetch_assoc($query)) {
        print_r($row);
    }

    

?>