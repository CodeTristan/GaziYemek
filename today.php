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
      $dayofweek = date('w', strtotime($today));
      if($dayofweek == 6)
      {
        $today = date('Y-m-d',strtotime("+2 days"));
      }
      else if($dayofweek == 0)
      {
        $today = date('Y-m-d',strtotime("+1 days"));
      }
    }

    

?>