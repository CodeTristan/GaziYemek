<?php

$ratings = array();

$j = 0;
for( $i = 0; $i < 5; $i++ )
{
    $rating[$i] = array($isVegetarian = !empty($_POST["rating".$j++]) ? 1 : 0,
                        $isVegetarian = !empty($_POST["rating".$j++]) ? 1 : 0,
                        $isVegetarian = !empty($_POST["rating".$j++]) ? 1 : 0,
                        $isVegetarian = !empty($_POST["rating".$j++]) ? 1 : 0,
                        $isVegetarian = !empty($_POST["rating".$j++]) ? 1 : 0);
}


print_r(json_encode($rating));
?>