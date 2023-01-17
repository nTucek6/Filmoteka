<?php

function CheckMovie()
{  
global $wpdb;

$id = $_POST['id'];

$borrowed_movies = $wpdb->prefix."borrowed_movies";
$result = $wpdb->get_results("Select * from ".$borrowed_movies);

$count = 0;
foreach($result as $movie)
{
    if($movie->movie_id == $id)
    {
        $count .= $count+1;
    }

}

if($count == 0)
{
    echo "true";
}
else
{
    echo "false";
} 
    die();
}
add_action('wp_ajax_CheckMovie', 'CheckMovie');   
add_action('wp_ajax_nopriv_CheckMovie', 'CheckMovie');


function BorrowMovie()
{
    global $wpdb;

    $user_id = $_POST['user_id'];
    $movie_id = $_POST['movie_id'];

    $borrowed_movies=$wpdb->prefix.'borrowed_movies';

    $data=array(
        'user_id' => $user_id, 
        'movie_id' => $movie_id,
        'borrow_date' => date('d-m-y h:i:s')
      );

     $wpdb->insert( $borrowed_movies, $data);
}

add_action('wp_ajax_BorrowMovie', 'BorrowMovie');   
add_action('wp_ajax_nopriv_BorrowMovie', 'BorrowMovie');



?>