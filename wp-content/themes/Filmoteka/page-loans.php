<?php
get_header();

if(false) 
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
<?php

if(is_admin_user())
{
echo GetBorrowedMovies();
}
else
{
  echo GetUserMovies();
}

?>
</div>

<?php

echo '<script>
    jQuery(function($) {
        FancyTable();
    });
    </script>';

?>

<?php get_footer(); ?>