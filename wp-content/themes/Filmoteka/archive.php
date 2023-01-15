<?php
get_header();
?>
<main>
<?php
if ( have_posts() )
{
echo '<div class="container mt-5">';
echo '<div class="row row-cols-3">';
while ( have_posts() )
{
the_post();
echo '<div class="col">';
echo '<div class="d-flex justify-content-center"><img height="300" width="200" src="'.get_the_post_thumbnail_url().'"/></div>';
echo '<a class="text-center" href="'.$post->guid.'"><h4>'.$post->post_title . '</h4></a>';


if(get_the_post_thumbnail_url())
{

}
echo '</div>';
}
echo '</div>';
echo '</div>';
}
?>

<div class="d-flex justify-content-center">
<?php // posts_nav_link(' — ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
<?php previous_posts_link("<button class='btn btn-secondary m-1'>Previous</button>");  ?>
<?php next_posts_link("<button class='btn btn-secondary m-1'>Next</button>");  ?>
</div>
</main>
<?php
get_footer();
?>
