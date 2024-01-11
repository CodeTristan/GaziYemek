<?php

    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    require "dbConfig.php";
    
    
    
    

    if($newPassword == $confirmPassword)
    {
        //check if password is same as confirmed
        //show error
    }
    else if($oldPassword == $newPassword)
    {
        //check if new password is same as the old one
        //show error
    }
    
    //If there is no error
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $UserName = "za";
    $db->query("UPDATE user SET UserPassword = '$newHashedPassword' Where UserName = '$UserName'");


?>