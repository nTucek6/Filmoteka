<?php

/* ======================= Taxonomy for movies ======================= */

    function register_taxonomy_genres() {
        $labels = array(
        'name' => _x( 'Žanrovi po raspoloženju', 'Taxonomy General Name',
        'vuv' ),
        'singular_name' => _x( 'Žanr po raspoloženju', 'Taxonomy Singular Name',
        'vuv' ),
        'menu_name' => __( 'Žanrovi po raspoloženju', 'vuv' ),
        'all_items' => __( 'Svi žanrovi po raspoloženju', 'vuv' ),
        'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
        'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
        'new_item_name' => __( 'Novi žanr po raspoloženju', 'vuv' ),
        'add_new_item' => __( 'Dodaj novi žanr po raspoloženju', 'vuv' ),
        'edit_item' => __( 'Uredi žanr po raspoloženju', 'vuv' ),
        'update_item' => __( 'Ažuiriraj žanr po raspoloženju', 'vuv' ),
        'view_item' => __( 'Pogledaj žanr po raspoloženju', 'vuv' ),
        'separate_items_with_commas' => __( 'Odvojite žanrove po raspoloženju sa zarezima', 'vuv' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni žanr po raspoloženju', 'vuv' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
        'popular_items' => __( 'Popularni žanrovi po raspoloženju', 'vuv' ),
        'search_items' => __( 'Pretraga', 'vuv' ),
        'not_found' => __( 'Nema rezultata', 'vuv' ),
        'no_terms' => __( 'Nema žanrova po raspoloženju', 'vuv' ),
        'items_list' => __( 'Lista žanrova po raspoloženju', 'vuv' ),
        'items_list_navigation' => __( 'Navigacija', 'vuv' ),
        );
        $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        );
        register_taxonomy( 'genres', array( 'movies' ), $args );
        }
        add_action( 'init', 'register_taxonomy_genres', 0 );


/* ======================= Taxonomy for movies ======================= */


/* ======================= Taxonomy for movies format ======================= */

function register_taxonomy_genres_format() {
    $labels = array(
    'name' => _x( 'Žanrovi po formatu filma', 'Taxonomy General Name',
    'vuv' ),
    'singular_name' => _x( 'Žanr po formatu filma', 'Taxonomy Singular Name',
    'vuv' ),
    'menu_name' => __( 'Žanrovi po formatu filma', 'vuv' ),
    'all_items' => __( 'Svi žanrovi po formatu filma', 'vuv' ),
    'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
    'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
    'new_item_name' => __( 'Novi žanr po formatu filma', 'vuv' ),
    'add_new_item' => __( 'Dodaj novi žanr po formatu filma', 'vuv' ),
    'edit_item' => __( 'Uredi žanr po formatu filma', 'vuv' ),
    'update_item' => __( 'Ažuiriraj žanr po formatu filma', 'vuv' ),
    'view_item' => __( 'Pogledaj žanr po formatu filma', 'vuv' ),
    'separate_items_with_commas' => __( 'Odvojite žanrove po formatu filma sa zarezima', 'vuv' ),
    'add_or_remove_items' => __( 'Dodaj ili ukloni žanr po formatu filma', 'vuv' ),
    'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
    'popular_items' => __( 'Popularni žanrovi po formatu filma', 'vuv' ),
    'search_items' => __( 'Pretraga', 'vuv' ),
    'not_found' => __( 'Nema rezultata', 'vuv' ),
    'no_terms' => __( 'Nema žanrova po formatu filma', 'vuv' ),
    'items_list' => __( 'Lista žanrova po formatu filma', 'vuv' ),
    'items_list_navigation' => __( 'Navigacija', 'vuv' ),
    );
    $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    );
    register_taxonomy( 'genres_movie_format', array( 'movies' ), $args );
    }
    add_action( 'init', 'register_taxonomy_genres_format', 0 );


/* ======================= Taxonomy for movies format ======================= */






?>