<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <style>
    .form-group {
      margin-bottom: 10px;
    }

    #mealImage {
      margin-bottom: 10px;
    }

    #previewImage {
      max-width: 300px;
      margin-top: 10px;
    }

    .Form
    {
      margin: 5%;
      border: 1px solid black;
      width: 30%;
      padding: 30px;
    }
  </style>
</head>

<body>
  <div class="adminPanel">
    <div class="header">
      <nav>
        <ul class="sidebar">
          <li onclick="hideSidebar()">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
              </svg></a>
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
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
              </svg></a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="Form">
      <form action="form.php" method="post">
        <div class="form-group">
          <label for="mealName">Yemek İsmi:</label>
          <input type="text" name="mealName" id="mealName" />
        </div>
        <div class="form-group">
          <label for="mealType">Yemek Türü:</label>
          <input type="text" name="mealType" id="mealType" />
        </div>

        <div class="form-group">
          <label for="calories">Yemek Kalorisi:</label>
          <input type="number" name="calories" />
        </div>

        <div class="form-group">
          <label for="vegetarian">Vejetaryen:</label>
          <input type="checkbox" name="vegetarian" />
        </div>

        <div class="form-group">
          <label for="mealImage">Yemek Resmi:</label>
          <input type="file" name="mealImage" accept="image/*" />
        </div>

        <img id="previewImage" alt="Yemek Resmi Görüntüsü" />

        <button onclick="addMeal()">Ekle</button>
        <button onclick="clearMeals()">Temizle</button>

        <div class="meal-list" id="mealList">
          <!-- Yemek listesi burada görüntülenecek -->
        </div>

        <input type="submit" name="submit" value="tıkla la" />
      </form>
    </div>

  </div>



</body>

</html>