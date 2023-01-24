<?php
get_header();


$search = get_query_var("s");
$results = SearchMovies($search);

?>

<div class="container mt-3">

<h1>Rezultati pretrage: <?php echo $search ?></h1>

<?php
if(!empty($results))
{
    if(count($results) > 0)
    {
        echo '<div class="mt-3">';
        foreach($results as $result)
        {
        echo '<div class="d-flex justify-content-center mb-2">';
        echo '<a href="'.$result->guid.'">'.$result->post_title.'</a>';
        echo '</div>';
        }
        echo '</div>';
    }
}
?>

</div>

<?php get_footer(); ?>