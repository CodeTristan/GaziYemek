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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="index.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
  
</head>

<body>
  <?php include 'header.php' ?>


  <div class="textg" style="background:transparent;">
  <?php
    require "today.php";
    $days = array('Pazartesi','Salı','Çarşamba','Perşembe','Cuma');
    $dayofweek = date('w', strtotime($today));
    $tarih = date('d.m.Y', strtotime($today));
  ?>
    <p><?php echo $tarih . " " . $days[$dayofweek - 1]?></p>
  </div>
  <!---------------- SLIDER --------------->
  <div id="myCarousel" style="padding-bottom:10%; justify-content:center; align-items:center;" class="carousel slide" data-bs-ride="carousel" carousel-fade>
    <ul class="carousel-indicators">
      <?php
      require 'dbConfig.php';
      date_default_timezone_set('Europe/Istanbul');
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
          <li id="<?php echo $slideID ?>" style="border: 0.5px solid black; margin-left: 2.5%; background-image: url('<?php echo $imageURL ?>');height:10vh; width: 10vh; background-position: center;background-size: contain;background-repeat: no-repeat;" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $active ?>">
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

          $vote = $db->query("SELECT vote.Overall_Vote FROM vote
                          inner join score on vote.ID = score.Vote_ID
                          inner join food_has_menu on score.food_ID = food_has_menu.ID
                          inner join food on food.ID = food_has_menu.Food_ID
                          where food.Name = '$name';
                          ")->fetch_all();
          
          $score = 0;
          for ($i=0; $i < count($vote); $i++) 
          { 
              $score += $vote[$i][0];
          }
          if(count($vote) > 0)
            $score = $score / count($vote);
            $score = round($score, 1);
      ?>
          
          <div class="carousel-item <?php echo $activeSlide ?>" >
            <div class="overlay-image" style="background-image:url('<?php echo $imageURL ?>');">
              <div class="content">
                <h6><br><?php echo $name ?><br>Kalori:<?php echo $calori ."   Skor: ";?><?php echo $score . "/5"?></h6>
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

  <?php if($today == date("Y-m-d"))include 'ratingImages.php' ?>
  <div class="textg">
    <p>Duyurular</p>
  </div>

  <?php include 'duyuru.php' ?>
  <?php
  //require "mainDBConnection.php";
  ?>
 
  <?php include 'takvim.php' ?>
  <?php include "footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="rating.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
  // Hammer.js'yi başlatın
  var myCarousel = document.getElementById("myCarousel");
  var hammer = new Hammer(myCarousel);

  // Karusel için sürükleme özelliğini etkinleştirin
  hammer.on("panleft panright", function (e) {
    if (e.type === "panleft") {
      $("#myCarousel").carousel("next");
    } else if (e.type === "panright") {
      $("#myCarousel").carousel("prev");
    }
  });
});
  </script>

</body>

</html>