<?php

function GetAllGenres()
{
    $genres_args = array(
        'orderby'       => 'name', 
        'order'         => 'ASC',
        'hide_empty'    => true, 
    );
    $terms = get_terms('genres', $genres_args);

//    var_dump($terms);

    $genre = "";
    foreach($terms as $term)
    {
        $genre .= '<li  class="menu-item menu-item-type-custom menu-item-object-movies menu-item-17 nav-item">
        <a itemprop="url" href="'.get_term_link($term->slug,$term->taxonomy).'" class="dropdown-item"><span itemprop="name">'.$term->name.'</span></a></li>';
    }


    $html .= '<ul id="menu-navigacija" class="nav navbar-nav navigation d-flex justify-content-end" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
        <li id="menu-navigacija" class="nav navbar-nav navigation d-flex justify-content-end menu-item-has-children dropdown menu-item-navigacija nav-item">
    <a data-hover="dropdown" aria-expanded="false" class="dropdown-toggle nav-link">
    <span itemprop="name">Žanrovi</span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-78">
      '.$genre.'
    </ul>
    </li>';


    return $html;
}


?>