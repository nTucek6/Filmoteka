<?php
get_header();

    echo '<header class="masthead" style="background-image: url('.get_the_post_thumbnail_url(get_the_ID()).')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>'.$post->post_title.'</h1>
                </div>
            </div>
        </div>
    </div>
</header>';

?>
<main>

<?php
 $language = get_terms('language',array('orderby' => 'name'));


 echo '<div class="container mt-5">';
 echo '<div class="row row-cols-3">';

 foreach($language as $l)
 {
    echo '<div class="col">';
    echo '<div class="d-flex justify-content-center mb-4"><a href="'.get_term_link($l->slug,$l->taxonomy).'"><h3>'.$l->name.'</h3> </div>';    
    echo '</div>';
 }

 echo '</div>';
 echo '</div>';

?>

</main>
<?php
get_footer();
?>
