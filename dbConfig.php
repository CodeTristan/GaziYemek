<?php

$dbHost ="localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName="users";


$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if($db->connect_error)
{
    die("Connection failed: ". $db->connect_error);
}

?>