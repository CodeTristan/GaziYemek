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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profilduzenle.css">
    <title>Profil Sayfası</title>
</head>
<body>
<?php include 'header.php' ?>

<div class="profile-container">
        <h1>Şifre Değiştirme</h1>
        <form action="changePasswordForm.php" method="post">
            <?php
                if(isset($_GET['success'])){ ?>
                    <div class="success-msg"><?php echo $_GET['success'];?></div>
            <?php  } ?>
            <?php
                if(isset($_GET['error'])){ ?>
                    <div class="error-msg"><?php echo $_GET['error'];?></div>
            <?php  } ?>
            <label for="fullName">İsim Soyisim:</label>
              <p id="fullName"><?php echo $decoded->data->UserName;?></p>

            <label for="oldPassword">Eski Şifre:</label>
            <input type="password" id="oldPassword" name="oldPassword" required>

            <label for="newPassword">Yeni Şifre:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="confirmPassword">Yeni Şifre Onayla:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit">Şifreyi Değiştir</button>
        </form>
    </div>
    <?php include "footer.php" ?>
   <script src="index.js"></script>
</body>
</html>