<?php
get_header();
?>
<main>
<?php
if ( have_posts() )
{
while ( have_posts() )
{
the_post();


echo '<div class="container mt-4">';
echo '<div class=""><h1>'.$post->post_title . '</h1></div>';
echo '</div> <br />';

echo GetAwardMovies($post);

}

}
?>
<div class="d-flex justify-content-center">
</div>
</main>
<?php
get_footer();
?>