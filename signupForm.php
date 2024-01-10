<?php

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

if ($confirmPassword != $password) {
    //show error kaan buraya bak sonra tmm eyw
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

require "dbConfig.php";

$sql = "INSERT INTO user (ID,UserName,Mail,UserPassword) VALUES (NULL,'$name','$email','$hashed_password')";

if (mysqli_query($db, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

mysqli_close($db);

include "index.php";
