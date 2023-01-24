<?php
function GetUserMovies()
{
    $link = home_url().'/wp-admin/admin-ajax.php';
    global $wpdb;
    $borrowed_movies = $wpdb->prefix."borrowed_movies";
    $result = $wpdb->get_results("Select * from ".$borrowed_movies. " where user_id=".get_current_user_id()."  ORDER BY borrow_date ASC");

  //  $html = '<div class="container mt-3"><input id="search" type="text" class="form-control" placeholder="Pretraži..." onkeyup=SearchTableUser("'.$link.'",'.get_current_user_id().') /></div>'; 
    $html .= '<table class="table table-light container mt-3" id="tableData" >';
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

        $timestamp = strtotime($movie->borrow_date);

        $date = $new_date = date("d-m-Y H:i:s", $timestamp);

// <td>'.$movie->borrow_date.'</td>

        $html.= '<tr> 
        <td>'.$c.'</td>
        <td>'.$post->post_title.'</td>
        <td>'.$date.'</td>
        <td><button class="btn btn-danger" onclick=ReturnMovie('.get_current_user_id().','.$movie->movie_id.',"'.$link.'")>Vrati</button></td>
        </tr>';
        $c = $c+1;
    }
    $html .='</tbody>';
    $html .='</table>';

    if(count($result) > 0)
   {
    return $html;
   }
   else
   {
    return "<div class='container'><p class='text-center'>Korisnik nije posudio film.</p></div>";
   }


 //   
}


function GetBorrowedMovies()
{
   // get_user_by()
   global $wpdb;
   $borrowed_movies = $wpdb->prefix."borrowed_movies";
   $result = $wpdb->get_results("Select * from ".$borrowed_movies.' ORDER BY borrow_date ASC');
   $link = home_url().'/wp-admin/admin-ajax.php';

  // $html = '<div  class="container mt-3"><input id="search" type="text" class="form-control" placeholder="Pretraži..." onkeyup=SearchTableAdmin("'.$link.'") /></div>'; 
   $html .= '<table id="tableData" class="table table-light table-hover container mt-3">';
   $html .= '<thead class="thead-light"> 
           <tr>
           <th>Rbr.</th>
           <th>Naziv filma</th>
           <th>Datum posudbe</th>
           <th>Korisnik</th>
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
       <td>'.$user->display_name.'</td>
       <td><button class="btn btn-danger" onclick=ReturnMovie('.$user->ID.','.$movie->movie_id.',"'.$link.'")>Vrati</button></td>
       </tr>';
       $c = $c+1;
   }
   $html .='</tbody>';
   $html .='</table>';

   if(count($result) > 0)
   {
    return $html;
   }
   else
   {
    return "<div class='container'><p class='align-center'>Nitko nije posudio film.</p></div>";
   }

   die();

}


?>