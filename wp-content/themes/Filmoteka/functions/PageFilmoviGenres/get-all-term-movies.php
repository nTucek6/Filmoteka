<?php

function GetFilmoviContent()
{
    $genres_args = array(
        'orderby'       => 'name', 
        'order'         => 'ASC',
        'hide_empty'    => true, 
    );
    
    $terms = get_terms('genres', $genres_args);

    //var_dump($terms);

    $html = "";

    foreach($terms as $genre)
    {
     /*   $args = array(
            'posts_per_page' => -1,
            'post_type' => 'movies',
            'post_status' => 'publish',
            'tax_query' => array(
            array(
            'taxonomy' =>  $genre->taxonomy,
            'field' => 'slug',
            'terms' => $genre->slug
            )
            )); */

            $args = array(
              'numberposts' => 5,
              'post_type'   => 'movies',
              'order'       => 'DESC',
              'orderby'     => 'date',
              'tax_query' => array(
              array(
                'taxonomy' =>  $genre->taxonomy,
                'field' => 'slug',
                'terms' => $genre->slug
                ))
            );
            
            $movies = get_posts( $args );

            $html .= "<div class='container mt-4'>";
            $html .= '<a href="'.get_term_link($genre->slug,$genre->taxonomy).'"><h3>'.$genre->name.'</h3></a><hr>';
            $html .= '<div class="swiper movies_slider"><div class="swiper-wrapper">';

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
            
            $html.= '</div><div class="swiper-pagination"></div></div></div>';

    }

return $html;
    
}


?>
