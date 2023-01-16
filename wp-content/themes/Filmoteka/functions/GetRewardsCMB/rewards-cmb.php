<?php


function GetRewardInfo($post)
{

    $awards = get_post_meta($post->ID, 'awards', true);
    
    $arrayP = explode(",",$awards);

    
    $args = array(
        'post_type' => 'rewards',
        'post__in' => $arrayP
    );
   $rewards = get_posts($args);


   $size = count($rewards);
   $html = "";

    if($size > 0)
    {
       
        $count = 1;
         foreach($rewards as $reward)
         {
             if($size == $count)
             {
                 $html .= '<a href="'.$reward->guid.'">'.$reward->post_title.'</a>';
             }
             else
             {
                 $html .= '<a href="'.$reward->guid.'">'.$reward->post_title.'</a>, ';
                 
             }
             $count = $count+1;
         } 
    }

    return $html;

}



?>