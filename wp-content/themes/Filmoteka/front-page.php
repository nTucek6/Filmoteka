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

//'.dynamic_sidebar('search-bar-sidebar').'
?>




<!-- <div class="row"> -->
<?php
if ( have_posts() )
{
while ( have_posts() )
{
the_post();
echo '<div class="col-md-8">';
echo '<div class="container">';
echo '<div>'.the_content(). '</div>';
echo '</div>';
echo '</div>';
}
}
?>

<div class="mt-4">
<h3>Najnoviji filmovi</h3>
<hr/>
<div class="swiper movies_slider_frontpage">
<div class="swiper-wrapper">
<?php echo GetContent(); ?>
</div>
<div class="swiper-pagination"></div>
</div>
</div>

<?php 
echo '<div class="col-md-4">';
dynamic_sidebar('glavni-sidebar');
echo '</div>';
?>

</div>

<?php get_footer(); ?>