
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="header.css">
  
</head>
<body>
  
    <div class="header">
      <nav>
        <ul class="sidebar">
          <li onclick="hideSidebar()">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
              </svg></a>
          </li>
          <li><a href="adminPaneli.php">Admin paneli</a></li>
          <li><a href="#duyuru-slider">Duyurular</a></li>
          <li><a href="#">Aylık Yemek Liste</a></li>
         
          <li><a href="login.php">Giriş Yap</a></li>
        </ul>
        
        <ul>
          
          <li style="display: flex;">
          <img src="images/logo.png" style="width: 50px;margin-left:30px""> <a href="index.php">Gazi Yemekhane</a>
          </li>
          <li class="hideOnMobile">
            <a href="adminPaneli.php">Admin paneli</a>
          </li>

          <li class="hideOnMobile"><a href="#duyuru-slider">Duyurular</a></li>
          <li class="hideOnMobile"><a href="#">Aylık Yemek Liste</a></li>
          
          <li class="hideOnMobile"><a href="login.php">Giriş Yap</a></li>
          <li class="hideOnMobile"> <img src="images/profile.png" class="user-pic" height="50px" onclick="toggleMenu()" /></li>

          <li class="menu-button" onclick="showSidebar()">
            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
              </svg></a>
          </li>
        </ul>
      </nav>
    
    <div class="sub-menu-wrap" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
          <img src="images/profile.png" class="user-pic" />
          <h2>İsim</h2>
        </div>
        <hr />
        <a href="profilduzenle.php" class="sub-menu-link">
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
</body>
</html>
