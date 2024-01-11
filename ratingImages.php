<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="rating.css">
  <title>Document</title>
</head>

<body>
  <div id="Yemekpuan" class="rating-wrapper">
    <form action="rating.php" method="post">
      <div class="textg">
        <p class="gunun-yemegi">Günün yemeğini puanla!</p>
      </div>
      <div class="float-container">
        <div style="width:40%">
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
              <div class="resim-yazi">
                <h2>
                  <?php echo $name ?>
                </h2>
              </div>
              <?php
              $id++;
            }
            ?>
            <?php

          }
          ?>

        </div>
        <div style="width:40%">
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
                <div class="rating-stars">
                  <div class="rating" id="rating<?php echo $id ?>">
                    <input type="radio" name="rating<?php echo $id ?>" id="star1_<?php echo $id ?>" value="5">
                    <label for="star1_<?php echo $id ?>"></label>
                    <input type="radio" name="rating<?php echo $id ?>" id="star2_<?php echo $id ?>" value="4">
                    <label for="star2_<?php echo $id ?>"></label>
                    <input type="radio" name="rating<?php echo $id ?>" id="star3_<?php echo $id ?>" value="3">
                    <label for="star3_<?php echo $id ?>"></label>
                    <input type="radio" name="rating<?php echo $id ?>" id="star4_<?php echo $id ?>" value="2">
                    <label for="star4_<?php echo $id ?>"></label>
                    <input type="radio" name="rating<?php echo $id ?>" id="star5_<?php echo $id ?>" value="1">
                    <label for="star5_<?php echo $id ?>"></label>
                  </div>
                </div>
              </div>
              <?php
              $id++;
            }
            ?>
            <?php

          }
          ?>
        </div>
      </div>
    </form>
    <input class="rating-submit" type="submit" onclick="rateX()" value="Gönder">

  </div>

  <script>
    function rateX() 
    {
      const ratings = [];
      for (let index = 1; index <= 5; index++) 
      {
        var rest = "_" + index; 
        for(let index2 = 1; index2 <= 5; index2++)
        {
          const input = document.getElementById("star" + index2 + rest);
        const inputValue = input.checked ? input.value : null;

        if (inputValue !== null)
        {
          ratings.push(6-inputValue);
          console.log("Star" + index + "_" + index2 + " Value: " + ratings[index - 1]);
        }
        }
        
      }
      // AJAX ile PHP'ye gönderme
      var xhr = new XMLHttpRequest();
      var url = 'rating.php';
      var params = 'ratings=' + JSON.stringify(ratings);

      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(xhr.responseText);
        }
      };

      console.log("PHP sent");
      xhr.send(params);


    }

  </script>
</body>


</html>