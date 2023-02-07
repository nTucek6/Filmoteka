<?php

function GetFilmoviContent()
{
    $genres_args = array(
        'orderby'       => 'name', 
        'order'         => 'ASC',
        'hide_empty'    => true, 
    );
    
    $terms = get_terms('genres', $genres_args);

    $html = "";

    foreach($terms as $genre)
    {
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
                $html .='<div class="img_box d-flex justify-content-center card h-100" style="background-color:#2e2e2c;">';
                $html .='<a href="'.$movie->guid.'"><img src="'.get_the_post_thumbnail_url($movie->ID).'" />
                 <p class="d-flex justify-content-center"><small>'.$movie->post_title.'</small></p> </a>';
                $html .='</div>';
                $html .='</div>';
              }
            }
            $html.= '</div><div class="swiper-pagination spagination swiper-button-white"></div></div></div>';
            $html .= '<div class="container"><hr class="hrColor"></div>';
    }

return $html;
    
}


?>
