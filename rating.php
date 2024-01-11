
<?php

//cookie yükleme
require 'vendor/autoload.php';


use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$jwtkey = '70f98e89f063c9ed5f4dd3f1aeb699792b301ebbafa217fab19049b21e174d597f75f48fefa9c299eb95fc97515e4af86034f0a28a42e72643150737e8607c3a';

if(isset($_COOKIE['token'])){
    $decoded = JWT::decode($_COOKIE['token'], new Key($jwtkey, 'HS256'));
}
else
{
    header('location:login.php');
}

// PHP dosyasını alma
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonString = $_POST['ratings'];
    $ratings = json_decode($jsonString, true);

    
    // Burada $ratings dizisini kullanabilirsiniz
    
} else {
    echo 'Invalid request';
}


//Database'e bilgi gönderme
require "dbConfig.php";

$userID = $decoded->data->ID;
$today = date("Y-m-d");

$menuID = $db->query("SELECT ID from menu where Date = '$today'")->fetch_assoc()["ID"];
foreach ($ratings as $rating) 
{
    $voteID = $db->query("SELECT vote.ID from vote 
                        where vote.Overall_Vote = '$rating'")->fetch_assoc()["ID"];

    echo "Vote ID: " . $voteID . " Menü ID: " . $menuID;
    $db->query("INSERT INTO user_has_vote (ID,Vote_ID,User_ID) Values (null,'$voteID','$userID')");
    
    $db->query("INSERT INTO score (ID,Vote_ID,Menu_ID) Values (null,'$voteID','$menuID')");

    echo "Vote Added!";
}
?>