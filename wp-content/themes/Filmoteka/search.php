<?php
get_header();


$search = $_GET['s'];//get_query_var("s");
$filter = $_GET['filter'];

$results = Search($search,$filter);
$f = "";
if($filter == "movies")
{
    $f = "filmova";
}
else if($filter == "actors")
{
    $f = "glumaca";
}
else if($filter == "awards")
{
    $f = "nagrade";
}

?>

<div class="container mt-3">

<h1>Rezultati pretrage <?php echo $f; ?>: <?php echo $search ?></h1>

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
else
{
    echo '<div class="mt-3">';
    echo '<p>Nema rezultata!</p>';
    echo '</div>';

}
?>

</div>

<?php get_footer(); ?>