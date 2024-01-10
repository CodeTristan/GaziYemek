<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Gazi Yemek</title>
  <link rel="stylesheet" href="AnaSayfaSlider.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fontawesome Link for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="index.js" defer></script>
</head>

<body>
  <?php include 'header.php' ?>


  <div class="textg">
    <p>20.12.2023 Çarşamba</p>
  </div>
  <!---------------- SLIDER --------------->
  <div id="myCarousel" style="padding-bottom:10%; justify-content:center; align-items:center;" class="carousel slide" data-bs-ride="carousel" carousel-fade>
    <ul class="carousel-indicators">
      <?php
      require 'dbConfig.php';
      date_default_timezone_set('Europe/Istanbul');
      $today = date("Y-m-d");
      $query = $db->query("SELECT food.Name, food.Calorie, Food.File_name, menu.Date,food.Food_Type
                          from food_has_menu 
                          inner join food on food_has_menu.Food_ID = food.ID
                          inner join menu on food_has_menu.Menu_ID = menu.ID
                          Where menu.date = '$today'");


      if ($query->num_rows > 0) {
        $slide = 0;
        $active = "active";
        $slideID = 0;

        while ($row = $query->fetch_assoc()) {
          $imageURL = 'images/' . $row["Food_Type"] . '/' . $row["File_name"];
          $name = $row["Name"];
      ?>
          <li id="<?php echo $slideID ?>" style="border: 1px solid black; margin-left: 2.5%; background-image: url('<?php echo $imageURL ?>');height:10vh; width: 10vh; background-position: center;background-size: contain;background-repeat: no-repeat;" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $active ?>">
          </li>
      <?php
          $slide++;
          $active = "";
          $slideID++;
        }
      }
      ?>
    </ul>
    <div class="carousel-inner">

      <?php
      require 'dbConfig.php';
      $today = date("Y-m-d");
      $query = $db->query("SELECT food.Name, food.Calorie, Food.File_name, menu.Date,food.Food_Type
                        from food_has_menu 
                        inner join food on food_has_menu.Food_ID = food.ID
                        inner join menu on food_has_menu.Menu_ID = menu.ID
                        Where menu.date = '$today'");

      if ($query->num_rows > 0) {
        $id = 0;
        $activeSlide = "active";
        while ($row = $query->fetch_assoc()) {

          $imageURL = 'images/' . $row["Food_Type"] . '/' . $row["File_name"];
          $name = $row["Name"];
          $calori = $row["Calorie"];
      ?>

          <div class="carousel-item <?php echo $activeSlide ?>">
            <div class="overlay-image" style="background-image:url('<?php echo $imageURL ?>')">
              <div class="content">
                <h6><br><?php echo $name ?><br>Kalori:<?php echo $calori ?></h6>
              </div>
            </div>

          </div>
        <?php
          $activeSlide = "";
        }
        ?>
        <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
          <span class="sr-only">Previous</span>
          <span class="carousel-control-prev-icon" style="background-color: rgba(0,0,0,1); border-radius:30px; height:30px; width: 30px;" aria-hidden="true"></span>
        </a>
        <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
          <span class="sr-only">Next</span>
          <span class="carousel-control-next-icon" style="background-color: rgba(0,0,0,1); border-radius:30px; height:30px; width: 30px;" aria-hidden="true"></span>
        </a>
    </div>
  <?php
        $id++;
      }
  ?>
  </div>

  <div id="Yemekpuan" class="rating-wrapper">

    
    <form action="rating.php" method="post">
      
      <div class="textg">
    <p>Günün Yemeğini Puanla!</p>
  </div>
        <?php
        require 'dbConfig.php';
        $today = date("Y-m-d");
        $query = $db->query("SELECT food.Name, food.Calorie, Food.File_name, menu.Date,food.Food_Type
                        from food_has_menu 
                        inner join food on food_has_menu.Food_ID = food.ID
                        inner join menu on food_has_menu.Menu_ID = menu.ID
                        Where menu.date = '$today'");

        if ($query->num_rows > 0) {
          $id = 1;
          while ($row = $query->fetch_assoc()) {

            $imageURL = 'images/' . $row["Food_Type"] . '/' . $row["File_name"];
            $name = $row["Name"];
            $calori = $row["Calorie"];
        ?>
            <div class="rating-container">
              <img src="<?php echo $imageURL ?>" class="rating-image">
              <h3><?php echo $name ?></h3>
              
              <div class="rating" id="rating<?php echo $id ?>">
                <input type="radio" name="rating<?php echo $id ?>" id="star1_<?php echo $id ?>" value="1">
                <label for="star1_<?php echo $id ?>"></label>
                <input type="radio" name="rating<?php echo $id ?>" id="star2_<?php echo $id ?>" value="2">
                <label for="star2_<?php echo $id ?>"></label>
                <input type="radio" name="rating<?php echo $id ?>" id="star3_<?php echo $id ?>" value="3">
                <label for="star3_<?php echo $id ?>"></label>
                <input type="radio" name="rating<?php echo $id ?>" id="star4_<?php echo $id ?>" value="4">
                <label for="star4_<?php echo $id ?>"></label>
                <input type="radio" name="rating<?php echo $id ?>" id="star5_<?php echo $id ?>" value="5">
                <label for="star5_<?php echo $id ?>"></label>
              </div>
            </div>
          <?php
            $id++;
          }
          ?>
        <?php

        }
        ?>
      <input class="rating-submit" type="submit" value="Gönder">
    </form>
  </div>

  <div class="textg">
    <p>Duyurular</p>
  </div>

  <div id="duyuru-slider">
    <div class="duyuru">
      <img src="images/duyuru1.png" alt="Duyuru 1" />
    </div>
    <div class="duyuru">
      <img src="images/yemekücret.png" alt="Yemek Ücreti" />
    </div>
  </div>
  <div id="dots-container">

  </div>
  <?php
  //require "mainDBConnection.php";
  ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="rating.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>