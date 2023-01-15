<?php


function GetMovieInfo($post)
{

    $releaseDate = get_post_meta($post->ID, 'releaseDate', true);
    $budget = get_post_meta($post->ID, 'budget', true);
    $director = get_post_meta($post->ID, 'director', true);
    $actors = get_post_meta($post->ID, 'actors', true);
    
    $arrayP = explode(",",$actors);

    $array = array(
     'releaseDate' => $releaseDate,
     'budget' => $budget,
     'director' => $director,
     'actors' => $arrayP
    );
    return (object)$array;
}

function GetMovieActors($arrayId)
{
        $args = array(
            'post_type' => 'actors',
            'post__in' => $arrayId
        );
       $actors = get_posts($args);

       $size = count($actors);
       
       $html = "";
       $count = 1;
        foreach($actors as $actor)
        {
            if($size == $count)
            {
                $html .= '<a href="'.$actor->guid.'">'.$actor->post_title.'</a>';
            }
            else
            {
                $html .= '<a href="'.$actor->guid.'">'.$actor->post_title.'</a>, ';
                
            }
            $count = $count+1;
        }

        return $html;
}



?>