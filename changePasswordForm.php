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
<?php

    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    require "dbConfig.php";
    
    $checkpassword = $decoded->data->UserPassword;
    if(!password_verify($oldPassword,$checkpassword)){
        header("location:profilduzenle.php?error=Eski şifre doğru değil!");
        exit();
    }

    else if($newPassword != $confirmPassword)
    {
        //check if password is same as confirmed
        //show error
        header("location:profilduzenle.php?error=Şifre onayla şifre ile uyuşmuyor!");
        exit();
        
    }
    else if(password_verify($newPassword,$checkpassword))
    {
        //check if new password is same as the old one
        //show error
        header("location:profilduzenle.php?error=Eski şifre ile yeni şifre aynı!");
        exit();
    }
    
    //If there is no error
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $UserName = $decoded->data->UserName;
    $db->query("UPDATE user SET UserPassword = '$newHashedPassword' Where UserName = '$UserName'");
    header("location:profilduzenle.php?success=Şifre değiştirildi");
    exit();

?>