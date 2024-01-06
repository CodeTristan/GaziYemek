<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Infinite Card Slider JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="index.js" defer></script>
  </head>
  <body>
    </ul>
    <div class="wrapper-calendar">
        <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
        <?php
        require 'dbConfig.php';
        $today = date("Y-m-d");
        $query = $db->query("SELECT food.Name, food.Calorie, Food.File_name, menu.Date,food.Food_Type
                        from food_has_menu 
                        inner join food on food_has_menu.Food_ID = food.ID
                        inner join menu on food_has_menu.Menu_ID = menu.ID
                        Where menu.date = '$today'");

        if($query->num_rows>0)
        {
            while($row=$query->fetch_assoc())
            {
                
                $imageURL='images/'.$row["Food_Type"].'/'.$row["File_name"];
                $name=$row["Name"];
                $calori=$row["Calorie"];
                ?>
                <li class="card">
                <div class="img"><img src="<?php echo $imageURL?>" alt="img" draggable="false"></div>
                <h2><?php echo $name ?></h2>
                <h4>Kalori:<?php echo $calori ?></h4>
                </li>
                <?php
            }
                        
            
        }
        ?>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
        <!--CALENDAR -->
    </div>
    
    <?php
        //require "mainDBConnection.php";
    ?>
  </body>
</html>