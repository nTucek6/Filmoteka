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
               
                </div>
            </div>
        </div>
    </div>
</header>';
}

?>


<!-- <div class="row"> -->
<?php

//echo get_current_user_id();

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