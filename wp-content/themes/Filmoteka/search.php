<?php
get_header();


$search = get_query_var("s");
$movies = SearchMovies($search);

?>

<div class="container">

<h1>Rezultati pretrage: </h1>

<?php

if(count($movies) > 0)
{
    echo '<div >';
    foreach($movies as $movie)
    {
    echo '<div class=" d-flex justify-content-center">';
    echo '<a href="'.$movie->guid.'">'.$movie->post_title.'</a>';
    echo '</div>';
    }
    echo '</div>';
}

?>

</div>

<?php get_footer(); ?>