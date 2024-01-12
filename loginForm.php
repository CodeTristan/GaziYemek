<?php
require "dbConfig.php";
require 'vendor/autoload.php';

use Firebase\JWT\JWT;
$jwtkey = '70f98e89f063c9ed5f4dd3f1aeb699792b301ebbafa217fab19049b21e174d597f75f48fefa9c299eb95fc97515e4af86034f0a28a42e72643150737e8607c3a';
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE Mail='admin'";

$result = mysqli_query($db,$sql);

$row = mysqli_fetch_array($result);
$temp = $row['UserPassword'];

if($email == "admin" && password_verify($password,$temp)){
    $token = JWT::encode(
        array(
            'iat'       =>  time(),
            'nbf'       =>  time(),
            'exp'       =>  time() + 3600,
            'data'  => array(
                'ID'    =>  $row['ID'],
                    'Mail'  =>  $row['Mail'],
                    'UserName'  =>  $row['UserName'],
                    'UserPassword'  =>  $row['UserPassword']
            )
        ),
        $jwtkey,
        'HS256'
    );
    setcookie("token", $token, time() + 3600, "/", "", true, true);
    header("location:adminPaneli.php");
    exit();
}
elseif($email == "admin" && !password_verify($password,$temp)){
    header("Location: login.php?error=Admin şifresi yanlış!");
    exit();
}

$sql = "SELECT * FROM user WHERE Mail='$email'";

$result = mysqli_query($db,$sql);

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    $temp = $row['UserPassword'];
    if(password_verify($password,$temp)){
        $token = JWT::encode(
            array(
                'iat'       =>  time(),
                'nbf'       =>  time(),
                'exp'       =>  time() + 3600,
                'data'  => array(
                    'ID'    =>  $row['ID'],
                    'Mail'  =>  $row['Mail'],
                    'UserName'  =>  $row['UserName'],
                    'UserPassword'  =>  $row['UserPassword']
                )
            ),
            $jwtkey,
            'HS256'
        );
        setcookie("token", $token, time() + 3600, "/", "", true, true);
        header("Location: index.php");
        exit();
    }
    else{
        header("Location: login.php?error=Şifre yanlış!");
        exit();
    }
    
}
else{
    header("Location: login.php?error=Bu e-postaya sahip bir hesap yok!");
    exit();
}
?>
