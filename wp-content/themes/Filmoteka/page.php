<?php
get_header();
?>

<?php

if ( have_posts() )
{
while ( have_posts() )
{
the_post();

echo the_content();

}
}
?>

<?php 
echo '<div class="col-md-4">';
dynamic_sidebar('glavni-sidebar');
echo '</div>';
?>

</div>

<?php get_footer(); ?>