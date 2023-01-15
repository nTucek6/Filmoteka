<?php
function register_movie_cpt() {
    $labels = array(
    'name' => _x( 'Filmovi', 'Post Type General Name', 'vuv' ),
    'singular_name' => _x( 'Film', 'Post Type Singular Name', 'vuv' ),
    'menu_name' => __( 'Filmovi', 'vuv' ),
    'name_admin_bar' => __( 'Filmovi', 'vuv' ),
    'archives' => __( 'Filmovi arhiva', 'vuv' ),
    'attributes' => __( 'Atributi', 'vuv' ),
    'parent_item_colon' => __( 'Roditeljski element', 'vuv' ),
    'all_items' => __( 'Svi filmovi', 'vuv' ),
    'add_new_item' => __( 'Dodaj novi film', 'vuv' ),
    'add_new' => __( 'Dodaj novi', 'vuv' ),
    'new_item' => __( 'Novi film', 'vuv' ),
    'edit_item' => __( 'Uredi film', 'vuv' ),
    'update_item' => __( 'Ažuriraj film', 'vuv' ),
    'view_item' => __( 'Pogledaj film', 'vuv' ),
    'view_items' => __( 'Pogledaj filmove', 'vuv' ),
    'search_items' => __( 'Pretraži filmove', 'vuv' ),
    'not_found' => __( 'Nije pronađeno', 'vuv' ),
    'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vuv' ),
    'featured_image' => __( 'Glavna slika', 'vuv' ),
    'set_featured_image' => __( 'Postavi glavnu sliku', 'vuv' ),
    'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vuv' ),
    'use_featured_image' => __( 'Postavi za glavnu sliku', 'vuv' ),
    'insert_into_item' => __( 'Umentni', 'vuv' ),
    'uploaded_to_this_item' => __( 'Preneseno', 'vuv' ),
    'items_list' => __( 'Lista', 'vuv' ),
    'items_list_navigation' => __( 'Navigacija među filmovima', 'vuv' ),
    'filter_items_list' => __( 'Filtriranje filmova', 'vuv' ),
    );
    $args = array(
    'label' => __( 'Filmovi', 'vuv' ),
    'description' => __( 'Filmovi post type', 'vuv' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-format-video',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => false,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    );
    register_post_type( 'movies', $args );
    }
    add_action( 'init', 'register_movie_cpt', 0 );


/* ======================= Include taxonomy ======================= */
    include 'taxonomy/genres.php';
    include 'taxonomy/language.php';
/* ======================= Include taxonomy ======================= */


/* ======================= Include custom meta box ======================= */
    include 'custom-meta-box/cmb-movies-info.php';
    include 'custom-meta-box/cmb-movies-awards.php';
/* ======================= Include custom meta box ======================= */

?>