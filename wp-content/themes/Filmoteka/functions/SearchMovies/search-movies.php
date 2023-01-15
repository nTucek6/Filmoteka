<?php

function SearchMovies($search)
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
    return $searchResult;
}



?>