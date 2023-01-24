<?php

function SearchMovies($search)
{
    if(!empty($search))
    {
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'movies',
            'post_status' => 'publish');
    
        $movies = get_posts($args);
    
        $searchResult = array();
    
        foreach($movies as $movie)
        {
            if(str_contains(strtolower($movie->post_title),strtolower($search)))
            {
                array_push($searchResult,$movie);
            }
        }

        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'actors',
            'post_status' => 'publish');
    
        $actors = get_posts($args);
    
        foreach($actors as $actor)
        {
            if(str_contains(strtolower($actor->post_title),strtolower($search)))
            {
                array_push($searchResult,$actor);
            }
        }
        
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'rewards',
            'post_status' => 'publish');
    
        $rewards = get_posts($args);
    
        foreach($rewards as $reward)
        {
            if(str_contains(strtolower($reward->post_title),strtolower($search)))
            {
                array_push($searchResult,$reward);
            }
        }
      
        return $searchResult;
    }
    else
    {
        return null;
    }
}


?>