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
        <div class="header">
          <nav>
          <ul class="sidebar">
            <li onclick="hideSidebar()">
              <a href="#"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="24"
                  viewBox="0 -960 960 960"
                  width="24"
                >
                  <path
                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"
                  /></svg
              ></a>
            </li>
            <li><a href="adminPaneli.php">Günün Yemeği</a></li>
            <li><a href="#">Duyurular</a></li>
            <li><a href="#">Aylık Yemek Liste</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">İletişim</a></li>
            <li><a href="#">Giriş Yap</a></li>
          </ul>
          <ul>
            <li><a href="#">Gazi Yemekhane</a></li>
            <li class="hideOnMobile"><a href="adminPaneli.php">Günün Yemeği</a></li>
            <li class="hideOnMobile"><a href="#">Duyurular</a></li>
            <li class="hideOnMobile"><a href="#">Aylık Yemek Liste</a></li>
            <li class="hideOnMobile"><a href="#">Forum</a></li>
            <li class="hideOnMobile"><a href="#">İletişim</a></li>
            <li class="hideOnMobile"><a href="#">Giriş Yap</a></li>
            <li class="menu-button" onclick="showSidebar()">
              <a href="#"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="24"
                  viewBox="0 -960 960 960"
                  width="24"
                >
                  <path
                    d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"
                  /></svg
              ></a>
            </li>
          </ul>
        </nav>
        </div>
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
            $id = 0;
            while($row=$query->fetch_assoc())
            {
                
                $imageURL='images/'.$row["Food_Type"].'/'.$row["File_name"];
                $name=$row["Name"];
                $calori=$row["Calorie"];
                ?>
                <li class="card" id="<?php echo $id ?>">
                <div class="img"><img src="<?php echo $imageURL?>" alt="img" draggable="false"></div>
                <h2><?php echo $name ?></h2>
                <h4>Kalori:<?php echo $calori ?></h4>
                </li>
                <?php
                $id++;
            }
                        
            
        }
        ?>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
        <?php
        ?>
        <!--CALENDAR -->
    </div>
    
    <?php
        //require "mainDBConnection.php";
    ?>
  </body>
</html>