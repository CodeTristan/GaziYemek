<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" >
  <link rel="stylesheet" href="header.css">
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
  <?php include 'header.php' ?>

    <div class="sub-menu-wrap" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
          <img src="images/profile.png" class="user-pic" />
          <h2>Mehmet Furkan Utlu</h2>
        </div>
        <hr />
        <a href="#" class="sub-menu-link">
          <img src="images/profile.png" width="100px" height="70px" />
          <p>profili düzenle</p>
          <span>></span>
        </a>
        <a href="#" class="sub-menu-link">
          <img src="images/logout.png" width="100px" height="50px" />
          <p>Çıkış yap</p>
          <span>></span>
        </a>
      </div>
    </div>

    <div class="Form">
      <form action="form.php" method="post">
        <div class="form-group">
          <label for="mealName">Yemek İsmi</label><br />
          <input class="labelbox" type="text" name="mealName" id="mealName" placeholder="Yemek İsmi" />
        </div>
        <div class="form-group">
          <label for="mealType">Yemek türü giriniz</label><br />
          <input class="labelbox" type="text" name="mealType" id="mealType" placeholder="Yemek türü giriniz" />
        </div>

        <div class="form-group">
          <label for="calories">Yemek kalorisi giriniz</label><br />
          <input class="labelbox" type="number" name="calories" id="calories" placeholder="Yemek kalorisi giriniz" />
        </div>

        <div class="form-group">
          <label for="vegetarian">Vejetaryen mi?</label><br />
          <input type="checkbox" name="vegetarian" id="vegetarian" />
        </div>

        <div class="form-group">
          <label for="mealImage">Yemek Resmi:</label><br />
          <input type="file" name="mealImage" accept="image/*" />
        </div>

        <img id="previewImage" alt="Yemek Resmi Görüntüsü" />

        <button onclick="addMeal()">Ekle</button>
        <button onclick="clearMeals()">Temizle</button>



        <
      </form>
    </div>
    <div class="meal-list" id="mealList">
      <label for="anaYemek">Ana Yemek Seçiniz:</label>
      <select id="anaYemek" name="anaYemek">
        <option value="" disabled selected>- Seçiniz -</option>
        <?php
            require "dbconfig.php";
            $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Ana Yemek'");
            $i = 0;
            while ($row = $query->fetch_assoc()) 
            {
              ?>
              <option value=<?php echo "Anayemek" . $i ?>><?php echo $row["Name"]?></option>

              <?php
              $i++;
            }
        ?>      
      </select>

      <label for="corba">Çorba Seçiniz:</label>
      <select id="corba" name="corba">
        <option value="" disabled selected>- Seçiniz -</option>
        <?php
            require "dbconfig.php";
            $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Çorba'");
            $i = 0;
            while ($row = $query->fetch_assoc()) 
            {
              ?>
              <option value=<?php echo "Çorba" . $i ?>><?php echo $row["Name"]?></option>

              <?php
              $i++;
            }
        ?>

      </select>

      <label for="pilavAraSicak">Pilav veya Ara Sıcak Seçiniz:</label>
      <select id="pilavAraSicak" name="pilavAraSicak">
        <option value="" disabled selected>- Seçiniz -</option>
        <?php
            require "dbconfig.php";
            $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Pilav-Ara Sıcak'");
            $i = 0;
            while ($row = $query->fetch_assoc()) 
            {
              ?>
              <option value=<?php echo "Anayemek" . $i ?>><?php echo $row["Name"]?></option>

              <?php
              $i++;
            }
        ?>
       

      </select>

      <label for="tatliMeyveSalata">Tatlı, Meyve veya Salata Seçiniz:</label>
      <select id="tatliMeyveSalata" name="tatliMeyveSalata">
        <option value="" disabled selected>- Seçiniz -</option>
        <?php
            require "dbconfig.php";
            $query = $db->query("SELECT * FROM food WHERE Food_Type = 'Tatlı-Meyve-Salata'");
            $i = 0;
            while ($row = $query->fetch_assoc()) 
            {
              ?>
              <option value=<?php echo "Anayemek" . $i ?>><?php echo $row["Name"]?></option>

              <?php
              $i++;
            }
        ?>
        
      </select>
  <div class="form-group">
  <label for="selectedDate">Tarih Seçiniz:</label><br />
  <input class="labelbox" type="text" name="selectedDate" id="selectedDate" placeholder="Tarih Seçiniz" />
  <button> Submit</button>
</div>

  

    </div>
    
  </div>

  <script src="index.js"></script>
</body>

</html>