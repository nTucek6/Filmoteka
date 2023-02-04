<?php

function GetAwardContent()
{
  
    $terms = get_terms('award-type');

    $html = "";

    foreach($terms as $award)
    {
            $args = array(
              'post_type'   => 'rewards',
              'tax_query' => array(
              array(
                'taxonomy' =>  $award->taxonomy,
                'field' => 'slug',
                'terms' => $award->slug
                ))
            );
            
            $singleAward = get_posts( $args );
            
            $html .= "<div class='container mt-4'>";
            $html .= '<a href="'.get_term_link($award->slug,$award->taxonomy).'"><h3>'.$award->name.'</h3></a><hr>';
           
              foreach($singleAward as $s)
              {
               // $html .='<a href="'.$s->guid.'"><p class="d-flex justify-content-center">'.$s->post_title.'</p> </a>';
                $html .='<a href="'.$s->guid.'"><p class="">'.$s->post_title.'</p> </a>';
              }
            
            $html .= '<hr class="rewardHR"></div>';
    }

return $html;
    
}


?>
