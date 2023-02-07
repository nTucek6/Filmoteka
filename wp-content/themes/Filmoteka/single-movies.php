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

$movieInfo = GetMovieInfo($post);

$stringRewards = GetRewardInfo($post);

if(!empty($movieInfo->actors))
{
    $stringGlumci = GetMovieActors($movieInfo->actors);
} 

echo '<div class="container mt-4">';
echo '<div class=""><h1>'.$post->post_title . '</h1></div>'; //d-flex justify-content-center d-flex justify-content-center
echo 'Datum izlaska: '. $movieInfo->releaseDate;
if(get_the_post_thumbnail_url())
{
echo '<div class="mt-2"><img height="300" width="200" src="'.get_the_post_thumbnail_url().'"/>';
echo '<div>'. return_term($post,'genres') ."</div>";
echo '<div>'. return_term($post,'language') ."</div>";
echo '</div> <br />';

}
echo '<div style="text-align:center;">'.$post->post_content . '</div>';
echo '</div> <br />';

echo '<div class="container">';
echo '<hr class="single-hr">';

echo '<p>Direktor: '. $movieInfo->director.'</p>';
echo '<hr class="single-hr">';

if(!empty($movieInfo->budget))
{
  echo '<p>Budžet filma: '. $movieInfo->budget.'</p>'; 
  echo '<hr class="single-hr">';
}
if(!empty($movieInfo->actors))
{
echo 'Glumci: '.$stringGlumci;
}
if(!empty($stringRewards))
{
    echo '<hr class="single-hr">';

echo 'Nagrade: '.$stringRewards;
}
echo '</div>';
}
}
?>

<div id="addBtnBorrow" class="mt-3 container"></div>

<?php

if(get_current_user_id() != 0)
{
if(!is_admin_user())
{
    echo '<script>
    jQuery(function($) {
      SetValues('.get_current_user_id().' ,'.$post->ID.',"'.home_url()."/wp-admin/admin-ajax.php" .'");
    });
    </script>';

 echo '<script>
 jQuery(function($) {
   GetButton();
 });
 </script>';
}
}

?>

</main>
<?php
get_footer();
?>