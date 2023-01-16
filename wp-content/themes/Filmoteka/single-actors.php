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

$ActorInfo = GetActorInfo($post);

echo '<div class="container mt-3">';
echo '<div class="row">';
echo '<div class="col-md-3">';
echo '<div class="d-flex justify-content-left"><h3>'.$post->post_title . '</h3></div>';
if(get_the_post_thumbnail_url())
{
echo '<div class="d-flex justify-content-left"><img height="300" width="200" src="'.get_the_post_thumbnail_url().'"/></div> <br />';
}
echo '</div>';

echo '<div class="col-md-4">';
echo '<p>Država rođenja: '.$ActorInfo->country.'</p>';
echo '<p>Datum rođenja: '.$ActorInfo->birthDate.'</p>';
echo '<p>Visina: '.$ActorInfo->height.'</p>';
echo '</div>';

echo '</div>';
echo '<div style="text-align:center;">'.$post->post_content . '</div>';
echo '</div> <br />';
}


}
?>

</main>
<?php
get_footer();
?>