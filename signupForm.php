<?php
require "dbConfig.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

$duplicate = "SELECT * FROM user WHERE Mail='$email'";

$result = mysqli_query($db,$duplicate);
if(mysqli_num_rows($result) > 0){
    header("Location: login.php?errorsu=A user with this e-mail already exists");
    exit();
}

if ($cpassword != $password) {
        header("Location: login.php?errorsu=Confirm Password not matching with Password");
        exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);



$sql = "INSERT INTO user (ID,UserName,Mail,UserPassword) VALUES (NULL,'$name','$email','$hashed_password')";

if (mysqli_query($db, $sql)) {
    header("Location: login.php?success=You have been successfully registered!");
    mysqli_close($db);
    exit();
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);

include "index.php";
