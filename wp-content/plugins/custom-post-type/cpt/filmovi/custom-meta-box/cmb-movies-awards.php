<?php

function add_meta_box_movieAwards()
{
add_meta_box( 'filmoteka_movie_movieAwards', 'Nagrade', 'html_meta_box_movieAwards', 'movies');
}

function html_meta_box_movieAwards($post)
{
wp_nonce_field('save_movie_awards', 'awards_nonce');

//dohvaćanje meta vrijednosti
$awards = get_post_meta($post->ID, 'awards', true);

echo '
<div>
<select class="js-example-basic-multiple" multiple="multiple" style="width: 75%" name="awards[]" id="awards">';
    echo GetAwards($awards); 
    echo ' </select>
    </div>
</div>';
}


function save_movie_awards($post_id)
{
$is_autosave = wp_is_post_autosave( $post_id );
$is_revision = wp_is_post_revision( $post_id );

$is_valid_nonce_relaseDate = ( isset( $_POST[ 'awards_nonce' ] ) && wp_verify_nonce(
$_POST[ 'awards_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

if ( $is_autosave || $is_revision || !$is_valid_nonce_relaseDate ) 
{return;}


/* ======================= Input awards ======================= */
if(!empty($_POST['awards']))
{
update_post_meta($post_id, 'awards', implode(',',$_POST['awards']));
}
else
{
delete_post_meta($post_id, 'awards');
}
/* ======================= Input awards ======================= */


}
add_action( 'add_meta_boxes', 'add_meta_box_movieAwards' );
add_action( 'save_post', 'save_movie_awards' );


function GetAwards($awards)
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'rewards',
        'post_status' => 'publish'
    );
   
    $rewards = get_posts( $args );

    $option = "";
    if(!empty($awards))
    {
        $awardsArray = explode(",",$awards);

        foreach($rewards as $reward)
        {
            $bool = true;
            foreach($awardsArray as $id)
            {
                if($id == $reward->ID)
                {
                    $option .= '<option value="'.$reward->ID.'" selected>'.$reward->post_title.'</option>';
                    $bool = false; 
                }
            }
            if($bool)
                {
                    $option .= '<option value="'.$reward->ID.'">'.$reward->post_title.'</option>';
                } 
        }
    }
    else
    {
        foreach($rewards as $reward)
        {
            $option .= '<option value="'.$reward->ID.'">'.$reward->post_title.'</option>';
        }
    }
    return $option;
}


?>