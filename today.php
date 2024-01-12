<?php 

date_default_timezone_set('Europe/Istanbul');
    $today = date("Y-m-d");

    if (isset($_POST["Date"]))
    {
      $today = $_POST["Date"];
    }
    else
    {
      $today = date("Y-m-d");
    }

    

?>