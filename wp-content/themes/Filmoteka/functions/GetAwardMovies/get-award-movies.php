<?php


function GetAwardMovies($post)
{
    $args = array(
        'post_type'   => 'movies',
        'post_status' => 'publish',
        'numberposts' => -1
      );
      $movies = get_posts( $args );

    if(count($movies)> 0)
    {
        $result = array();

        foreach($movies as $movie)
        {
            $awards = get_post_meta($movie->ID, 'awards', true);
            $arrayP = explode(",",$awards);
            
            if(count($arrayP)> 0)
            {
                foreach($arrayP as $id)
                {
                    
                    if($id == $post->ID)
                    {
                        
                        array_push($result,$movie);
                    }
                }
            }
        }
        if(count($result)> 0)
        {
    
            $html .= '<div class="container mt-5">';
            $html .= '<div class="row row-cols-3">';

            foreach($result as $movie)
            {
                //$html .= '<a href="'.$movie->guid.'"><h3>'.$movie->post_title.'</h3></a>';

                $html .= '<div class="col">';
                $html .= '<div class="mb-4"><a href="'.$movie->guid.'"><div class="d-flex justify-content-center mb-1"><img class="archive-img" src="'.get_the_post_thumbnail_url($movie->ID).'"/></div>';
                $html .= '<h4 class="text-center archive-title">'.$movie->post_title .'</h4></a></div>';
                $html .= '</div>';
                
            }
            $html .= '</div>';
            $html .= '</div>';

            return $html;
        }
        else
        {
            return "<div class='container card mt-3' style='background-color:#2e2e2c;'><p class='text-center'>Stranica nema filmove za odabranu nagradu.</p></div>";
        }
    }

}





?>