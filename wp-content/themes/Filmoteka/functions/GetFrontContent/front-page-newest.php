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
          $html .='<div class="img_box d-flex justify-content-center">';
          $html .='<a href="'.$movie->guid.'"><img src="'.get_the_post_thumbnail_url($movie->ID).'" style="width:150px;height;250px"/> </a>';
          $html .='</div></div>';

        }
      }
      return $html;
}

?>