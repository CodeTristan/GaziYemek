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
            require "dbConfig.php";
            //kullanıcı adı çekme
        ?>
            <label for="fullName">İsim Soyisim:</label>
            <p id="fullName">Anonym</p>

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