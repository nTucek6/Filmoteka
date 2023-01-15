<?php
function return_termSlug($post,$taxonomy)
{
$terms = wp_get_post_terms( $post->ID, $taxonomy );
$term = "-";
if(sizeof($terms)>0)
{
 return $terms[0]->slug;
}
}

function return_term($post,$taxonomy)
{
$terms = wp_get_post_terms( $post->ID, $taxonomy );

$term = "";
if(sizeof($terms)>0)
{
    $count = 1;
 foreach($terms as $tName)
 {
    if(sizeof($terms) != $count)
    {
        $term .= '<a href="'.get_term_link($tName->slug,$tName->taxonomy).'">'.$tName->name ."</a>".", ";
    }
    else
    {
        $term .= '<a href="'.get_term_link($tName->slug,$tName->taxonomy).'">'.$tName->name ."</a>";
    }
    $count =$count + 1;
    
 }

 return $term; //= $terms[0]->name;
}

}
?>