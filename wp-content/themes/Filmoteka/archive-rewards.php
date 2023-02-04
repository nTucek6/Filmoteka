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

echo GetAwardContent();

?>

</main>
<?php
get_footer();
?>
