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
echo '</div> <br />';

}
echo '<div style="text-align:center;">'.$post->post_content . '</div>';
echo '</div> <br />';

echo '<div class="container">';
echo '<hr class="single-hr">';

echo '<p>Direktor: '. $movieInfo->director.'</p>'; //dodaj funckiciju da nade direktora
echo '<hr class="single-hr">';

echo 'Glumci: '.$stringGlumci;

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

<div class="d-flex justify-content-center">
<?php //previous_post_link( '%link', "<button class='btn btn-secondary m-1'>Previous post</button>", true ); ?>
<?php //next_post_link( '%link', "<button class='btn btn-secondary m-1'>Next post</button>", true ); ?>
</div>

<?php

if(get_current_user_id() != 0)
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

?>



</main>
<?php
get_footer();
?>