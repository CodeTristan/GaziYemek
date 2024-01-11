<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="takvim1.css">
</head>

<body>
<div class="textg">
    <p>Takvim</p>
  </div>
  <div class="takvim" id="takvim">
    <?php
    require "dbConfig.php";
    date_default_timezone_set('Europe/Istanbul');
    $today = date("Y-m-d");
    $month = date('Y-m', strtotime($today));
    $counter = 0;
    $days = array('Pazartesi','Salı','Çarşamba','Perşembe','Cuma');
    

    $row = array();

    for ($i = 1; $i <= 31; $i++) {
      $day = $month . "-" . $i;
      $query = $db->query("SELECT food.Name, food.Calorie, menu.Date 
                          from food_has_menu 
                          inner join food on food_has_menu.Food_ID = food.ID
                          inner join menu on food_has_menu.Menu_ID = menu.ID
                          Where menu.date = '$day'");

      if ($query->num_rows > 0) {
        $row[$counter] = $query->fetch_assoc();
        $counter++;
      }

    }

    ?>
    <?php
      $newCounter = 0;
    
      while ($newCounter < $counter) {
        
        $date = $row[$newCounter]["Date"];
        $formattedDate = date("d.W.Y", strtotime($date));
        $dayofweek = date('w', strtotime($date));
        ?>
    <div class="box-takvim">
      
        <table>
          <thead>
            <tr>
              <th>
                <?php echo $formattedDate ." ". $days[$dayofweek - 1]?>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>EZOGELİN ÇORBASI</td>
            </tr>
            <tr>
              <td>ETSİZ ANTEP USULÜ PATATES</td>
            </tr>
            <tr>
              <td>PİRİNÇ PİLAVI</td>
            </tr>
            <tr>
              <td>TURŞU</td>
            </tr>
            <tr>
              <td>Kalori:1050</td>
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