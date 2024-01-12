<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="takvimTablo.css">
</head>

<body>
<div class="textg" id="takvim1">
    <p>Yemek Takvimi</p>
  </div>
  <div class="takvim" id="takvim">
    <?php
    require "dbConfig.php";
    $today = date("Y-m-d");
    $month = date('Y-m', strtotime($today));
    $counter = 0;
    $days = array('Pazartesi','Salı','Çarşamba','Perşembe','Cuma');
    

    $row = array();

    for ($i = 1; $i <= 31; $i++) {
      $day = $month . "-" . $i;
      $dayofweek = date('w', strtotime($day));
      $query = $db->query("SELECT food.Name, food.Calorie, menu.Date 
                          from food_has_menu 
                          inner join food on food_has_menu.Food_ID = food.ID
                          inner join menu on food_has_menu.Menu_ID = menu.ID
                          Where menu.date = '$day'");

      if ($query->num_rows > 0) {

        $row[$counter] = $query->fetch_all();

        //print_r($row[$counter][0]);
        //print "<br>";
        $counter++;
      }
      else if($query->num_rows <= 0 && $dayofweek <= 5 && $dayofweek!=0)
      {
        for ($j = 0; $j <= 3; $j++)
        {
          $row[$counter][$j][0] = "Bugün Yemek Yoktur.";
          $row[$counter][$j][1] = 0;
          $row[$counter][$j][2] = $day;
        }
        
        $counter++;
      }

      
    }
    

    ?>
    <?php
      $newCounter = 0;
    
      while ($newCounter < $counter) {
        
        $date = $row[$newCounter][0][2];
        $formattedDate = date("d.W.Y", strtotime($date));
        $dayofweek = date('w', strtotime($date));

        
        $anaYemek = $row[$newCounter][0];
        $çorba = $row[$newCounter][1];
        $pilav = $row[$newCounter][2];
        $salata = $row[$newCounter][3];

        $vejetaryen;
        
        if(count($row[$newCounter]) > 4)
          $vejetaryen = $row[$newCounter][4];
        else
        {
          $vejetaryen[0] = "";
          $vejetaryen[1] = 0;
        }

        ?>
    <div <?php if($date == $today) { ?>style="background-color: rgba(187,227,250,255); " <?php }?>class="box-takvim">
      
        <table>
        
          <thead>
            <tr>
              <th >
                <form method="post" action="index.php">
          
        <button class="takvim-gun"style="height:50px; width: 100%; border:0.25px solid black;"type="submit" name="Date" value="<?php echo $date ?>">
        <?php echo $formattedDate ." ". $days[$dayofweek - 1]?>
        </button>
      </form>
                
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $çorba[0] ."<br>" . $çorba[1] . " Kalori" ?></td>
            </tr>
            <tr>
              <td><?php echo $anaYemek[0] ."<br>" . $anaYemek[1] . " Kalori" ?></td>
            </tr>
            <tr>
              <td><?php echo "*". $vejetaryen[0] ."<br>" . $vejetaryen[1] . " Kalori" ?></td>
            </tr>
            <tr>
              <td><?php echo $pilav[0] ." <br>" . $pilav[1] . " Kalori" ?></td>
            </tr>
            <tr>
              <td><?php echo $salata[0] ." <br>" . $salata[1] . " Kalori" ?></td>
            </tr>
            <tr>
              <td style="color: red;"><?php echo "Toplam: " . $çorba[1] + $anaYemek[1] + $pilav[1] + $salata[1] . " Kalori" ?></td>
            </tr>
          </tbody>
        </table>
        
    </div>
    <?php
        $newCounter++;
      }
      ?>
  </div>
</body>

</html>