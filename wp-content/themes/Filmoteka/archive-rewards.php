<?php
get_header();

if(true) 
{
    echo '<header class="masthead" style="background-image: url('. get_stylesheet_directory_uri()."/thumbnails/movies-thumbnail.jpg".')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>'.post_type_archive_title('',false).'</h1>
                </div>
            </div>
        </div>
    </div>
</header>';
}

?>


<main>
<?php
if ( have_posts() )
{

while ( have_posts() )
{
the_post();
echo '<div class="">';
echo '<a class="text-center" href="'.$post->guid.'"><h4>'.$post->post_title . '</h4></a>';
echo '</div>';
}

}
?>

<div class="d-flex justify-content-center">
<?php previous_posts_link("<button class='btn btn-secondary m-1'>Previous</button>");  ?>
<?php next_posts_link("<button class='btn btn-secondary m-1'>Next</button>");  ?>
</div>
</main>
<?php
get_footer();
?>
