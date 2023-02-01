<?php

function GetUsers()
{
    $users = get_users();

    if(count($users) > 0)
    {
        $link = home_url().'/user-loans/';

        $html .= '<table id="tableData" class="table table-light table-hover container mt-3">';
        $html .= '<thead class="thead-light"> 
                <tr>
                <th>Rbr.</th>
                <th>Naziv korisnika</th>
                <th>Email</th>
                </tr>
                </thead>';
    
        $html .='<tbody id="tableBody">';
        $c = 1;
        foreach($users as $user)
        {
           foreach($user->roles as $u)
           {
            if($u != "administrator")
            {
                $html .= '<tr style="cursor:pointer;" onclick=SetUserLoans('.$user->ID.',"'.$link.'")>';
                $html .= '<td>'.$c.'</td>';
                $html .= '<td>'.$user->display_name.'</td>';
                $html .= '<td>'.$user->user_email.'</td>';
                $html .= '</tr>';
                $c = $c + 1;
                break;
            }
           }  
        }
        $html .='</tbody>';
        $html .='</table>';
    
        return $html;
    }
    else
    {
        return "<p class='align-center'>Nema korisnika.</p>";
    }

   

}


?>