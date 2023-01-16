<?php


function GetActorInfo($post)
{

    $birthDate = get_post_meta($post->ID, 'birthDate', true);
    $country = get_post_meta($post->ID, 'country', true);
    $height = get_post_meta($post->ID, 'heigth', true);
    
    $arrayP = explode(",",$actors);

    $array = array(
     'birthDate' => $birthDate,
     'country' => $country,
     'height' => $height,
   
    );
    return (object)$array;
}



?>