
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
    return;
}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

//Database'e bilgi gönderme
require "dbConfig.php";

$userID = $decoded->data->ID;
$today = date("Y-m-d");     

$menuID = $db->query("SELECT ID from menu where Date = '$today'")->fetch_assoc()["ID"];
$foodID = $db->query("SELECT ID from food_has_menu
                        where Menu_ID = '$menuID'")->fetch_all();

print_r($foodID);
$i = 0;
foreach ($ratings as $rating) 
{
    $db->query("INSERT INTO vote (ID,Overall_Vote) values (null,'$rating')");

    $voteIDs = $db->query("SELECT ID from vote 
                        where Overall_Vote = '$rating'")->fetch_all();
    
    print_r($voteIDs);
    $voteID = $voteIDs[count($voteIDs) -1][0];
    $sql = ("INSERT INTO user_has_vote (ID,Vote_ID,User_ID) Values (null,'$voteID','$userID')");

    if (mysqli_query($db, $sql)) {
        echo "kullanıcıya vote başarıyla eklendi! <br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    
    $fID = $foodID[$i][0];
    $sql = ("INSERT INTO score (ID,Vote_ID,food_ID) Values (null,'$voteID','$fID')");

    if (mysqli_query($db, $sql)) {
        echo "Score'a vote başarıyla eklendi! <br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    echo "Vote Added!";
    $i++;
}

//close the voting screen
header("Location:index.php");
?>