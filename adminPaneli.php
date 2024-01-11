<?php
require 'vendor/autoload.php';


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$jwtkey = '70f98e89f063c9ed5f4dd3f1aeb699792b301ebbafa217fab19049b21e174d597f75f48fefa9c299eb95fc97515e4af86034f0a28a42e72643150737e8607c3a';

if(isset($_COOKIE['token'])){
    $decoded = JWT::decode($_COOKIE['token'], new Key($jwtkey, 'HS256'));
}else{
    header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="adminPanelCss.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
  <?php include 'header.php' ?>

  <div class="label">
    <p>ADMİN</p>
  </div>
  <div class="takvimharic">
    <div class="Form">
      <form action="adminPaneliAddingFood.php" method="post">
        <div class="form-group">
          <label for="mealName">Yemek İsmi</label><br />
          <input class="labelbox" type="text" name="mealName" id="mealName" placeholder="Yemek İsmi" required />
        </div>
        <div class="form-group">
          <label for="mealType">Yemek türü giriniz</label><br />
          <select id="mealType" name="mealType" required>
            <option value="" disabled selected>- Seçiniz -</option>
            <option value="Ana Yemek">- Ana Yemek -</option>
            <option value="Çorba">- Çorbalar -</option>
            <option value="Pilav-Ara Sıcak">- Ara Sıcak / Pilav -</option>
            <option value="Tatlı-Meyve-Salata">- Tatlı / Meyve / Salata -</option>


          </select>
        </div>

        <div class="form-group">
          <label for="calories">Yemek kalorisi giriniz</label><br />
          <input class="labelbox" type="number" name="calories" id="calories" placeholder="Yemek kalorisi giriniz" required />
        </div>

        <div class="form-group">
          <label for="vegetarian">Vejetaryen mi?</label><br />
          <input type="checkbox" value="true" name="isVegetarian" id="vegetarian" />
        </div>

        <div class="form-group">
          <label for="mealImage">Yemek Resmi:</label><br />
          <input type="file" name="mealImage" accept="image/*" required onchange="previewMealImage(this)" />
        </div>

        <img id="previewImage" alt="Yemek Resmi Görüntüsü" />

        <button type="submit" onclick="addMeal()">Ekle</button>
        <button type="button" onclick="clearMeals()">Temizle</button>

      </form>
    </div>
    <div class="meal-list" id="mealList">
      <form action="adminPaneliAddingMenu.php" method="post">
        <label for="anaYemek">Ana Yemek Seçiniz:</label>
        <div class="anaYemekveVejetaryen">
          <select id="anaYemek" name="anaYemek">
            <option value="" disabled selected>- Seçiniz -</option>
            <?php
            require "dbconfig.php";
            $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Ana Yemek' and isVegetarian = 0");
            $i = 0;
            while ($row = $query->fetch_assoc()) {
            ?>
              <option value="<?php echo $row["Name"] ?>"><?php echo $row["Name"] ?></option>

            <?php
              $i++;
            }
            ?>
          </select>
          <label for="vejetaryen">*Vejetaryen Yemek Seçiniz:</label>
          <select id="VejetaryenSelect" name="VejetaryenSelect">
            <option value="" disabled selected>- Seçiniz -</option>
            <?php
            require "dbconfig.php";
            $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Ana Yemek' and isVegetarian = 1");
            $i = 0;
            while ($row = $query->fetch_assoc()) {
            ?>
              <option value="<?php echo $row["Name"] ?>"><?php echo $row["Name"] ?></option>

            <?php
              $i++;
            }
            ?>
          </select>
        </div>

        <label for="corba">Çorba Seçiniz:</label>
        <select id="corba" name="corba" required>
          <option value="" disabled selected>- Seçiniz -</option>
          <?php
          require "dbconfig.php";
          $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Çorba'");
          $i = 0;
          while ($row = $query->fetch_assoc()) {
          ?>
            <option value="<?php echo $row["Name"] ?>"><?php echo $row["Name"] ?></option>

          <?php
            $i++;
          }
          ?>

        </select>

        <label for="pilavAraSicak">Pilav veya Ara Sıcak Seçiniz:</label>
        <select id="pilavAraSicak" name="pilavAraSicak" required>
          <option value="" disabled selected>- Seçiniz -</option>
          <?php
          require "dbconfig.php";
          $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Pilav-Ara Sıcak'");
          $i = 0;
          while ($row = $query->fetch_assoc()) {
          ?>
            <option value="<?php echo $row["Name"] ?>"><?php echo $row["Name"] ?></option>

          <?php
            $i++;
          }
          ?>


        </select>

        <label for="tatliMeyveSalata">Tatlı, Meyve veya Salata Seçiniz:</label>
        <select id="tatliMeyveSalata" name="tatliMeyveSalata" required>
          <option value="" disabled selected>- Seçiniz -</option>
          <?php
          require "dbconfig.php";
          $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Tatlı-Meyve-Salata'");
          $i = 0;
          while ($row = $query->fetch_assoc()) {
          ?>
            <option value="<?php echo $row["Name"] ?>"><?php echo $row["Name"] ?></option>

          <?php
            $i++;
          }
          ?>

        </select>
        <div class="form-group">
          <label for="selectedDate">Tarih Seçiniz:</label><br />
          <input class="labelbox" type="text" name="selectedDate" id="selectedDate" placeholder="Tarih Seçiniz" required />
          <button> Submit</button>

        </div>


      </form>
    </div>
  </div>
  <?php include 'takvim.php' ?>
  <?php include "footer.php" ?>
  </div>

  
  <script src="index.js"></script>
</body>

</html>