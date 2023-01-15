<?php

function add_meta_box_actorInfo()
{
add_meta_box( 'filmoteka_actor_actorInfo', 'Dodatni podaci', 'html_meta_box_actorInfo', 'actors');
}

function html_meta_box_actorInfo($post)
{
wp_nonce_field('save_actor_info', 'birthDate_nonce');
wp_nonce_field('save_actor_info', 'country_nonce');
wp_nonce_field('save_actor_info', 'height_nonce');



//dohvaćanje meta vrijednosti
$birthDate = get_post_meta($post->ID, 'birthDate', true);
$country = get_post_meta($post->ID, 'country', true);
$heigth = get_post_meta($post->ID, 'heigth', true);


echo '
<div>
<div class="form-group">
<label for="birth date">Datum rođenja: </label>
<input type="text" id="birthDate" class="form-control"
name="birthDate" value="'.$birthDate.'" />
</div><br/>
<div>
<label for="country ">Država: </label>
<input type="text" id="country" class="form-control"
name="country" value="'.$country.'" />
</div>
<div class="form-group">
<label for="heigth">Visina: </label>
<input type="text" id="heigth" class="form-control"
name="heigth" value="'.$heigth.'" />
</div>';
}


function save_actor_info($post_id)
{
$is_autosave = wp_is_post_autosave( $post_id );
$is_revision = wp_is_post_revision( $post_id );

$is_valid_nonce_birthDate = ( isset( $_POST[ 'birthDate_nonce' ] ) && wp_verify_nonce(
$_POST[ 'birthDate_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

$is_valid_nonce_country = ( isset( $_POST[ 'country_nonce' ] ) && wp_verify_nonce(
$_POST[ 'country_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

$is_valid_nonce_heigth = ( isset( $_POST[ 'height_nonce' ] ) && wp_verify_nonce(
$_POST[ 'height_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';



if ( $is_autosave || $is_revision || 
     !$is_valid_nonce_birthDate || !$is_valid_nonce_country || !$is_valid_nonce_heigth) 
{return;}


/* ======================= Input birth date ======================= */
if(!empty($_POST['birthDate']))
{
update_post_meta($post_id, 'birthDate', $_POST['birthDate']);
}
else
{
delete_post_meta($post_id, 'birthDate');
}
/* ======================= Input birth date ======================= */

/* ======================= Input country ======================= */
if(!empty($_POST['country']))
{
update_post_meta($post_id, 'country', $_POST['country']);
}
else
{
delete_post_meta($post_id, 'country');
}
/* ======================= Input country ======================= */

/* ======================= Input heigth ======================= */
if(!empty($_POST['heigth']))
{
update_post_meta($post_id, 'heigth',
$_POST['heigth']);
}
else
{
delete_post_meta($post_id, 'heigth');
}
/* ======================= Input director ======================= */
}

add_action( 'add_meta_boxes', 'add_meta_box_actorInfo' );
add_action( 'save_post', 'save_actor_info' );

?>