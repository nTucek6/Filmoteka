<?php

function add_meta_box_movieActors()
{
add_meta_box('filmoteka_movie_movieActors', 'Glumci', 'html_meta_box_movieActors', 'movies');
}

function html_meta_box_movieActors($post)
{
wp_nonce_field('save_movie_actors', 'actors_nonce');

//dohvaćanje meta vrijednosti
$actors = get_post_meta($post->ID, 'actors', true);

echo '
<div>
<select class="js-example-basic-multiple actors-movies" multiple="multiple" style="width: 75%" name="actors[]" id="actors">';
    echo GetActors($actors); 
    echo ' </select>
    </div>
</div>';
}


function save_movie_actors($post_id)
{
$is_autosave = wp_is_post_autosave( $post_id );
$is_revision = wp_is_post_revision( $post_id );

$is_valid_nonce_relaseDate = ( isset( $_POST[ 'actors_nonce' ] ) && wp_verify_nonce(
$_POST[ 'actors_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

if ( $is_autosave || $is_revision || !$is_valid_nonce_relaseDate ) 
{return;}


/* ======================= Input awards ======================= */
if(!empty($_POST['actors']))
{
update_post_meta($post_id, 'actors', implode(',',$_POST['actors']));
}
else
{
delete_post_meta($post_id, 'actors');
}
/* ======================= Input awards ======================= */


}
add_action( 'add_meta_boxes', 'add_meta_box_movieActors' );
add_action( 'save_post', 'save_movie_actors' );


function GetActors($actorsString)
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'actors',
        'post_status' => 'publish'
    );
   
    $actors = get_posts( $args );

    $option = "";
    if(!empty($actorsString))
    {
        $actorsArray = explode(",",$actorsString);

        foreach($actors as $actor)
        {
            $bool = true;
            foreach($actorsArray as $id)
            {
                if($id == $actor->ID)
                {
                    $option .= '<option value="'.$actor->ID.'" selected>'.$actor->post_title.'</option>';
                    $bool = false; 
                }
            }
            if($bool)
                {
                    $option .= '<option value="'.$actor->ID.'">'.$actor->post_title.'</option>';
                } 
        }
    }
    else
    {
        foreach($actors as $actor)
        {
            $option .= '<option value="'.$actor->ID.'">'.$actor->post_title.'</option>';
        }
    }
    return $option;
}


?>