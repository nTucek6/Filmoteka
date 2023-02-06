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
echo '<div class=""><h1>'.$post->post_title . '</h1></div>'; //d-flex justify-content-center d-flex justify-content-center
//echo '<div style="text-align:center;">'.$post->post_content . '</div>';
echo '</div> <br />';

echo GetAwardMovies($post);

}

}
?>
<div class="d-flex justify-content-center">
<?php //previous_post_link( '%link', "<button class='btn btn-secondary m-1'>Previous post</button>", true ); ?>
<?php //next_post_link( '%link', "<button class='btn btn-secondary m-1'>Next post</button>", true ); ?>
</div>
</main>
<?php
get_footer();
?>