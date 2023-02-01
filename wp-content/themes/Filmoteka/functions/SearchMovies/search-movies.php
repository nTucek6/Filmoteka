<?php

function Search($search,$filter)
{
    if(!empty($search))
    {
        $searchResult = array();

     if($filter == "all")
     {
        $m = SearchMovies($search);
        $a = SearchActors($search);
        $r = SearchRewards($search);
        if(!empty($m))
        {
            foreach($m as $result)
            {
                array_push($searchResult,$result);
            }
        }
        if(!empty($a) )
        {
            foreach($a as $result)
            {
                array_push($searchResult,$result);
            }
        }
        if(!empty($r))
        {
            foreach($r as $result)
            {
                array_push($searchResult,$result);
            }
        }
     }
     else if($filter == "movies")
     {
        $m = SearchMovies($search);
        if(!empty($m))
        {
            foreach($m as $result)
            {
                array_push($searchResult,$result);
            }
        }
     }
     else if($filter == "actors")
     {
        $a = SearchActors($search);
        if(!empty($a))
        {
            foreach($a as $result)
            {
                array_push($searchResult,$result);
            }
        }
     }
     else if($filter == "awards")
     {
        $r = SearchRewards($search);
        if(!empty($r))
        {
            foreach($r as $result)
            {
                array_push($searchResult,$result);
            }
        }
     }
    
     return $searchResult;
    }
    else
    {
        return null;
    }
}


function SearchMovies($search)
{
    $r = array();

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
            array_push($r,$movie);
        }
    }

    return $r;
}


function SearchActors($search)
{
    $r = array();

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'actors',
        'post_status' => 'publish');

    $actors = get_posts($args);

    foreach($actors as $actor)
    {
        if(str_contains(strtolower($actor->post_title),strtolower($search)))
        {
            array_push($r,$actor);
        }
    }
    return $r;
}


function SearchRewards($search)
{
    $r = array();

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'rewards',
        'post_status' => 'publish');

    $rewards = get_posts($args);

    foreach($rewards as $reward)
    {
        if(str_contains(strtolower($reward->post_title),strtolower($search)))
        {
            array_push($r,$reward);
        }
    }
  
    return $r;
}




?>