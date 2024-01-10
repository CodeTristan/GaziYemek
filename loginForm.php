<?php
require "dbConfig.php";
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM user WHERE Mail='$email'";

$result = mysqli_query($db,$sql);

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    $temp = $row['UserPassword'];
    if(password_verify($password,$temp)){
        header("Location: index.php");
        exit();
    }
    else{
        header("Location: login.php?error=Wrong password!");
        exit();
    }
    
}
else{
    header("Location: login.php?error=That e-mail is not registered!");
    exit();
}
?>
