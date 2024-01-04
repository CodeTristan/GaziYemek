<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Infinite Card Slider JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="index.js" defer></script>
  </head>
  <body>
    <div class="wrapper-calendar">
        <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
            <li class="card">
            <?php
                require 'dbConfig.php';
                $query = $db->query("SELECT * FROM users WHERE status = 1 AND id = 4");
                if($query->num_rows>0){

                    while($row=$query->fetch_assoc())
                    {
                        $imageURL='images/'.$row["file_name"];
                        $name=$row["title"];
                        $calori=$row["kalori"];
                        ?>
                        <div class="img"><img src="<?php echo $imageURL?>" alt="img" draggable="false"></div>
                        <h2><?php echo $name ?></h2>
                        <h4>Kalori:<?php echo $calori ?></h4>
                        <?php
                    }
                
                }
                ?>
            </li>
            <li class="card">
                <?php
                    require 'dbConfig.php';
                    $query = $db->query("SELECT * FROM users WHERE status = 1 AND id = 1");
                    if($query->num_rows>0){

                        while($row=$query->fetch_assoc())
                        {
                            $imageURL='images/'.$row["file_name"];
                            $name=$row["title"];
                            $calori=$row["kalori"];
                            ?>
                            <div class="img"><img src="<?php echo $imageURL?>" alt="img" draggable="false"></div>
                            <h2><?php echo $name ?></h2>
                            <h4>Kalori:<?php echo $calori ?></h4>
                            <?php
                        }
                    
                    }
                ?>
            </li>
            <li class="card">
                <?php
                    require 'dbConfig.php';
                    $query = $db->query("SELECT * FROM users WHERE status = 1 AND id = 2");
                    if($query->num_rows>0){

                        while($row=$query->fetch_assoc())
                        {
                            $imageURL='images/'.$row["file_name"];
                            $name=$row["title"];
                            $calori=$row["kalori"];
                            ?>
                            <div class="img"><img src="<?php echo $imageURL?>" alt="img" draggable="false"></div>
                            <h2><?php echo $name ?></h2>
                            <h4>Kalori:<?php echo $calori ?></h4>
                            <?php
                        }
                    
                    }
                ?>
            </li>
            <li class="card">
                <?php
                    require 'dbConfig.php';
                    $query = $db->query("SELECT * FROM users WHERE status = 1 AND id = 3");
                    if($query->num_rows>0){

                        while($row=$query->fetch_assoc())
                        {
                            $imageURL='images/'.$row["file_name"];
                            $name=$row["title"];
                            $calori=$row["kalori"];
                            ?>
                            <div class="img"><img src="<?php echo $imageURL?>" alt="img" draggable="false"></div>
                            <h2><?php echo $name ?></h2>
                            <h4>Kalori:<?php echo $calori ?></h4>
                            <?php
                        }
                    
                    }
                ?>
            </li>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
        <!--CALENDAR -->
    </div>
    

  </body>
</html>