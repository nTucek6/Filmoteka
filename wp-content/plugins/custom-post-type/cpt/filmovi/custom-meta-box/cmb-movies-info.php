<?php

function add_meta_box_movieInfo()
{
add_meta_box( 'filmoteka_movie_movieInfo', 'Dodatni podaci', 'html_meta_box_movieInfo', 'movies');
}

function html_meta_box_movieInfo($post)
{
wp_nonce_field('save_movie_info', 'releaseDate_nonce');
wp_nonce_field('save_movie_info', 'budget_nonce');
wp_nonce_field('save_movie_info', 'director_nonce');



//dohvaćanje meta vrijednosti
$relaseDate = get_post_meta($post->ID, 'releaseDate', true);
$budget = get_post_meta($post->ID, 'budget', true);
$director = get_post_meta($post->ID, 'director', true);


echo '
<div>
<div class="form-group">
<label for="movie relase date">Datum izlaska filma: </label>
<input type="text" id="releaseDate" class="form-control"
name="releaseDate" value="'.$relaseDate.'" />
</div><br/>
<div>
<label for="movie cost">Budžet filma: </label>
<input type="text" id="budget" class="form-control"
name="budget" value="'.$budget.'" />
</div>
<div class="form-group">
<label for="movie director">Direktor: </label>
<input type="text" id="director" class="form-control"
name="director" value="'.$director.'" />
</div>';
}


function save_movie_info($post_id)
{
$is_autosave = wp_is_post_autosave( $post_id );
$is_revision = wp_is_post_revision( $post_id );

$is_valid_nonce_relaseDate = ( isset( $_POST[ 'releaseDate_nonce' ] ) && wp_verify_nonce(
$_POST[ 'releaseDate_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

$is_valid_nonce_budget = ( isset( $_POST[ 'budget_nonce' ] ) && wp_verify_nonce(
$_POST[ 'budget_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

$is_valid_nonce_director = ( isset( $_POST[ 'director_nonce' ] ) && wp_verify_nonce(
$_POST[ 'director_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';



if ( $is_autosave || $is_revision || 
     !$is_valid_nonce_relaseDate || !$is_valid_nonce_budget || !$is_valid_nonce_director) 
{return;}


/* ======================= Input relase date ======================= */
if(!empty($_POST['releaseDate']))
{
update_post_meta($post_id, 'releaseDate', $_POST['releaseDate']);
}
else
{
delete_post_meta($post_id, 'releaseDate');
}
/* ======================= Input relase date ======================= */

/* ======================= Input budget ======================= */
if(!empty($_POST['budget']))
{
update_post_meta($post_id, 'budget', $_POST['budget']);
}
else
{
delete_post_meta($post_id, 'budget');
}
/* ======================= Input budget ======================= */

/* ======================= Input director ======================= */
if(!empty($_POST['director']))
{
update_post_meta($post_id, 'director',
$_POST['director']);
}
else
{
delete_post_meta($post_id, 'director');
}
/* ======================= Input director ======================= */
}

add_action( 'add_meta_boxes', 'add_meta_box_movieInfo' );
add_action( 'save_post', 'save_movie_info' );

?>