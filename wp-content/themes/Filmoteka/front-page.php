<?php
get_header();

    echo '<header class="masthead" style="background-image: url('. get_stylesheet_directory_uri()."/thumbnails/front-page-thumbnail.jpg".')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                <h1>'.get_bloginfo("name").'</h1>
                </div>
            </div>
        </div>
    </div>
</header>';

?>

<div class="mt-1 ml-2 mr-2">
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