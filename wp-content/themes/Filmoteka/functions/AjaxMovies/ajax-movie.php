<?php

header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Origin: *');
header('Content-type: text/json; charset=utf-8');

function CheckMovie()
{  
global $wpdb;

$id = $_POST['id'];

$borrowed_movies = $wpdb->prefix."borrowed_movies";
$result = $wpdb->get_results("Select * from ".$borrowed_movies. " where movie_id=".$id);

if(count($result) == 0)
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

    date_default_timezone_set('Europe/Zagreb');

    

    $data=array(
        'user_id' => $user_id, 
        'movie_id' => $movie_id,
        'borrow_date' => date("Y-m-d H:i:s", time())
      );

     $wpdb->insert( $borrowed_movies, $data);
}

add_action('wp_ajax_BorrowMovie', 'BorrowMovie');   
add_action('wp_ajax_nopriv_BorrowMovie', 'BorrowMovie');


function ReturnMovie()
{
    global $wpdb;

    $user_id = $_POST['user_id'];
    $movie_id = $_POST['movie_id'];

    $borrowed_movies=$wpdb->prefix.'borrowed_movies';
    $result = $wpdb->get_results("Delete from ".$borrowed_movies. " where movie_id=".$movie_id." and user_id=".$user_id);

    die();
 
}
add_action('wp_ajax_ReturnMovie', 'ReturnMovie');   
add_action('wp_ajax_nopriv_ReturnMovie', 'ReturnMovie');


function SearchTableAdmin()
{
    $search = $_POST['search'];

    global $wpdb;

   $bmTable = $wpdb->get_results('SELECT wp_borrowed_movies.ID, wp_borrowed_movies.user_id, wp_borrowed_movies.movie_id, wp_users.display_name, wp_posts.post_title, wp_borrowed_movies.borrow_date FROM `wp_borrowed_movies` 
    LEFT JOIN wp_posts ON wp_borrowed_movies.movie_id = wp_posts.ID 
    LEFT JOIN wp_users ON wp_borrowed_movies.user_id = wp_users.ID WHERE wp_posts.post_type = "movies"');
   
    $link = home_url().'/wp-admin/admin-ajax.php';
  
    $html = "";
    if(!empty($search))
    {
        $c = 1;
        foreach($bmTable as $q)
        {
            if(str_contains(strtolower($q->post_title),strtolower($search)))
            {
                $html.= '<tr> 
                <td>'.$c.'</td>
                <td>'.$q->post_title.'</td>
                <td>'.$q->borrow_date.'</td>
                <td>'.$q->display_name.'</td>
                <td><button class="btn btn-danger" onclick=ReturnMovie('.$q->user_id.','.$q->movie_id.',"'.$link.'")>Vrati</button></td>
                </tr>';
                $c = $c+1;
            }
        }
      
    }
    else
    {
        $c = 1;
        foreach($bmTable as $q)
        {
                $html.= '<tr> 
                <td>'.$c.'</td>
                <td>'.$q->post_title.'</td>
                <td>'.$q->borrow_date.'</td>
                <td>'.$q->display_name.'</td>
                <td><button class="btn btn-danger" onclick=ReturnMovie('.$q->user_id.','.$q->movie_id.',"'.$link.'")>Vrati</button></td>
                </tr>';
                $c = $c+1;
        }
    }
 

    echo $html;
 
    
    die();
}
add_action('wp_ajax_SearchTableAdmin', 'SearchTableAdmin');   
add_action('wp_ajax_nopriv_SearchTableAdmin', 'SearchTableAdmin');


function SearchTableUser()
{
    $search = $_POST['search'];
    $user = $_POST['user_id'];

    global $wpdb;
 
   $bmTable = $wpdb->get_results('SELECT 
   wp_borrowed_movies.ID,
   wp_borrowed_movies.user_id,
   wp_borrowed_movies.movie_id,
   wp_users.display_name,
   wp_posts.post_title,
   wp_borrowed_movies.borrow_date 
   FROM wp_borrowed_movies 
   LEFT JOIN wp_posts ON wp_borrowed_movies.movie_id = wp_posts.ID
   LEFT JOIN wp_users ON wp_borrowed_movies.user_id = wp_users.ID
   WHERE wp_posts.post_type = "movies" AND wp_borrowed_movies.user_id ='.$user);
   
    $link = home_url().'/wp-admin/admin-ajax.php';
  
    $html = "";
    if(!empty($search))
    {
        $c = 1;
        foreach($bmTable as $q)
        {
            if(str_contains(strtolower($q->post_title),strtolower($search)))
            {
                $html.= '<tr> 
                <td>'.$c.'</td>
                <td>'.$q->post_title.'</td>
                <td>'.$q->borrow_date.'</td>
                <td><button class="btn btn-danger" onclick=ReturnMovie('.$user.','.$q->movie_id.',"'.$link.'")>Vrati</button></td>
                </tr>';
                $c = $c+1;
            }
        }
      
    }
    else
    {
        $c = 1;
        foreach($bmTable as $q)
        {
            $html.= '<tr> 
            <td>'.$c.'</td>
            <td>'.$q->post_title.'</td>
            <td>'.$q->borrow_date.'</td>
            <td><button class="btn btn-danger" onclick=ReturnMovie('.$user.','.$q->movie_id.',"'.$link.'")>Vrati</button></td>
            </tr>';
            $c = $c+1;
        }
    }
 

    echo $html;
 
    
    die();
}
add_action('wp_ajax_SearchTableUser', 'SearchTableUser');   
add_action('wp_ajax_nopriv_SearchTableUser', 'SearchTableUser');


function GetUserLoans()
{
    global $wpdb;

    $user_id = $_POST['user_id'];

    $link = home_url().'/wp-admin/admin-ajax.php';

    $borrowed_movies = $wpdb->prefix."borrowed_movies";
    $result = $wpdb->get_results("Select * from ".$borrowed_movies. " where user_id= ".$user_id);

    $user = get_user_by('ID', $user_id);

    echo '<div class="container">Korisnik: '.$user->display_name.'</div>';

    $html .= '<table id="tableData" class="table table-light table-hover container mt-3">';
    $html .= '<thead class="thead-light"> 
            <tr>
            <th>Rbr.</th>
            <th>Naziv filma</th>
            <th>Datum posudbe</th>
            <th>Vrati film</th>
            </tr>
            </thead>';
 
    $c = 1;

    
    $html .='<tbody id="tableBody">';
    foreach($result as $movie)
    {
        $post = get_post( $movie->movie_id );
        $user = get_user_by("id",$movie->user_id);
     
        $timestamp = strtotime($movie->borrow_date);
 
        $date = $new_date = date("d-m-Y H:i:s", $timestamp);
 
        $html.= '<tr> 
        <td>'.$c.'</td>
        <td>'.$post->post_title.'</td>
        <td>'.$date.'</td>
        <td><button class="btn btn-danger" onclick=ReturnMovie('.$user->ID.','.$movie->movie_id.',"'.$link.'")>Vrati</button></td>
        </tr>';
        $c = $c+1;
    }
    $html .='</tbody>';
    $html .='</table>';
 
    if(count($result) > 0)
    {
        echo $html;
    }
    else
    {
     echo "<div class='container'><p>Korisnik nije posudio film.</p></div>";
    }

    
 die();
}
add_action('wp_ajax_GetUserLoans', 'GetUserLoans');   
add_action('wp_ajax_nopriv_GetUserLoans', 'GetUserLoans');


?>