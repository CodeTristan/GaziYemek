<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
          <li><a href="adminPaneli.php">Admin paneli</a></li>
          <li><a href="#">Duyurular</a></li>
          <li><a href="#">Aylık Yemek Liste</a></li>
          <li><a href="#">İletişim</a></li>
          <li><a href="#">Giriş Yap</a></li>
        </ul>
        <ul>
          <li><a href="#">Gazi Yemekhane</a></li>
          <li class="hideOnMobile">
            <a href="adminPaneli.php">Admin paneli</a>
          </li>

          <li class="hideOnMobile"><a href="#">Duyurular</a></li>
          <li class="hideOnMobile"><a href="#">Aylık Yemek Liste</a></li>
          <li class="hideOnMobile"><a href="#">İletişim</a></li>
          <li class="hideOnMobile"><a href="#">Giriş Yap</a></li>
          <li class="hideOnMobile"> <img src="images/profile.png" class="user-pic" height="50px" onclick="toggleMenu()" /></li>

          <li class="menu-button" onclick="showSidebar()">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
              </svg></a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="label">
      <p>ADMİN</p>
    </div>

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
        <option value="Anayemek1">Antep Usulü Patates</option>
        <option value="Anayemek2">Bahçevan Kebap</option>
        <option value="Anayemek3">Çiftlik Köfte</option>
        <option value="Anayemek4">Dalyan Köfte</option>
        <option value="Anayemek5">Etli Bamya</option>
        <option value="Anayemek6">Etli Kuru Fasulye</option>
        <option value="Anayemek7">Etli Mevsim Türlü</option>
        <option value="Anayemek8">Etli Taze Fasulye</option>
        <option value="Anayemek9">Etsiz Kuru Fasulye</option>
        <option value="Anayemek10">Etsiz Nohut</option>
        <option value="Anayemek11">Kadınbudu Köfte</option>
        <option value="Anayemek12">Kaşarlı Köfte</option>
        <option value="Anayemek13">Kıymalı fırında patates</option>
        <option value="Anayemek14">Kıymalı Ispanak</option>
        <option value="Anayemek15">Kıymalı Karnabahar</option>
        <option value="Anayemek16">Köfte</option>
        <option value="Anayemek17">Mantarlı Tavuk Sote</option>
        <option value="Anayemek18">Özbek Pilavı</option>
        <option value="Anayemek19">Pilav</option>
        <option value="Anayemek20">Püreli Tavuk Şinitzel</option>
        <option value="Anayemek21">Şehriyeli Güveç</option>
        <option value="Anayemek22">Tas Kebap</option>
        <option value="Anayemek23">Tavuk Baget</option>
        <option value="Anayemek24">Yoğurtlu Tire Köfte</option>
        <option value="Anayemek25">Yumurtalı Ispanak</option>
      </select>

      <label for="corba">Çorba Seçiniz:</label>
      <select id="corba" name="corba">
        <option value="" disabled selected>- Seçiniz -</option>
        <option value="corba1">Arabaşı Çorbası</option>
        <option value="corba2">Brokoli Çorbası</option>
        <option value="corba3">Domates Çorbası</option>
        <option value="corba4">Düğün Çorbası</option>
        <option value="corba5">Ezogelin Çorbası</option>
        <option value="corba6">Hanımağa Çorbası</option>
        <option value="corba7">Köylü Çorbası</option>
        <option value="corba8">Mantar Çorbası</option>
        <option value="corba9">Mercimek Çorbası</option>
        <option value="corba10">Pekülta Çorbası</option>
        <option value="corba11">Sebze Çorbası</option>
        <option value="corba12">Şehriye Çorbası</option>
        <option value="corba13">Tarhana Çorbası</option>
        <option value="corba14">Yayla Çorbası</option>

      </select>

      <label for="pilavAraSicak">Pilav veya Ara Sıcak Seçiniz:</label>
      <select id="pilavAraSicak" name="pilavAraSicak">
        <option value="" disabled selected>- Seçiniz -</option>
        <option value="pilavAraSicak1">Bulgur Pilavı</option>
        <option value="pilavAraSicak2">Erişte</option>
        <option value="pilavAraSicak3">Kısır</option>
        <option value="pilavAraSicak4">Makarna</option>
        <option value="pilavAraSicak5">Nohutlu Pirinç Pilavı</option>
        <option value="pilavAraSicak6">Patates Salata</option>
        <option value="pilavAraSicak7">Pirinç Pilavı</option>
        <option value="pilavAraSicak8">Portakallı Kereviz</option>
        <option value="pilavAraSicak9">Yoğurtlu Havuç Salata</option>
        <option value="pilavAraSicak10">Zeytinyağlı Pırasa</option>

      </select>

      <label for="tatliMeyveSalata">Tatlı, Meyve veya Salata Seçiniz:</label>
      <select id="tatliMeyveSalata" name="tatliMeyveSalata">
        <option value="" disabled selected>- Seçiniz -</option>
        <option value="tatliMeyveSalata1">Ayran</option>
        <option value="tatliMeyveSalata2">Cacık</option>
        <option value="tatliMeyveSalata3">Keşkül</option>
        <option value="tatliMeyveSalata4">Meyve-1</option>
        <option value="tatliMeyveSalata5">Meyve-2</option>
        <option value="tatliMeyveSalata6">Meyve-3</option>
        <option value="tatliMeyveSalata7">portakal</option>
        <option value="tatliMeyveSalata8">Salata</option>
        <option value="tatliMeyveSalata9">Sup</option>
        <option value="tatliMeyveSalata10">Triliçe</option>
        <option value="tatliMeyveSalata11">Turşu</option>
        <option value="tatliMeyveSalata12">Yoğurt</option>
      </select>
      <div class="form-group">
  <label for="selectedDate">Tarih Seçiniz:</label><br />
  <input class="labelbox" type="text" name="selectedDate" id="selectedDate" placeholder="Tarih Seçiniz" />
</div>
  

    </div>
  </div>

  <script src="index.js"></script>
</body>

</html>