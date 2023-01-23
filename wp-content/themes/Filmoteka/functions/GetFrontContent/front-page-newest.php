<?php

function GetContent()
{
    $args = array(
        'numberposts' => 7,
        'post_type'   => 'movies',
        'order'       => 'DESC',
        'orderby'     => 'date'
      );
      $movies = get_posts( $args );
      
      $html = "";
      if(count($movies) < 1)
      {
        for($i=0;$i<4;$i++)
        {
        $html .='<div class="swiper-slide">';
        $html .='<div class="img_box">';
        $html .='<img heigth="250px" width="150px" />';
        $html .='</div></div>';
        }
      }
      else
      {
        foreach($movies as $movie)
        {
          $html .='<div class="swiper-slide">';
          $html .='<div class="img_box d-flex justify-content-center card" style="background-color:#2e2e2c;">';
          $html .='<a href="'.$movie->guid.'"><img src="'.get_the_post_thumbnail_url($movie->ID).'" />
          <p class=" d-flex justify-content-center"><small>'.$movie->post_title.'</small></p> </a>'; 
          $html .='</div>';
          $html .='</div>';

        }
      }
      return $html;
}

?>