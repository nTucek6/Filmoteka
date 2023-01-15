<?php
function register_reward_cpt() {
    $labels = array(
    'name' => _x( 'Nagrade', 'Post Type General Name', 'vuv' ),
    'singular_name' => _x( 'Nagrada', 'Post Type Singular Name', 'vuv' ),
    'menu_name' => __( 'Nagrade', 'vuv' ),
    'name_admin_bar' => __( 'Nagrade', 'vuv' ),
    'archives' => __( 'Nagrade arhiva', 'vuv' ),
    'attributes' => __( 'Atributi', 'vuv' ),
    'parent_item_colon' => __( 'Roditeljski element', 'vuv' ),
    'all_items' => __( 'Sve nagrade', 'vuv' ),
    'add_new_item' => __( 'Dodaj novu nagradu', 'vuv' ),
    'add_new' => __( 'Dodaj novi', 'vuv' ),
    'new_item' => __( 'Nova nagrada', 'vuv' ),
    'edit_item' => __( 'Uredi nagradu', 'vuv' ),
    'update_item' => __( 'Ažuriraj nagradu', 'vuv' ),
    'view_item' => __( 'Pogledaj nagradu', 'vuv' ),
    'view_items' => __( 'Pogledaj nagrade', 'vuv' ),
    'search_items' => __( 'Pretraži nagrade', 'vuv' ),
    'not_found' => __( 'Nije pronađeno', 'vuv' ),
    'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vuv' ),
    'featured_image' => __( 'Glavna slika', 'vuv' ),
    'set_featured_image' => __( 'Postavi glavnu sliku', 'vuv' ),
    'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vuv' ),
    'use_featured_image' => __( 'Postavi za glavnu sliku', 'vuv' ),
    'insert_into_item' => __( 'Umentni', 'vuv' ),
    'uploaded_to_this_item' => __( 'Preneseno', 'vuv' ),
    'items_list' => __( 'Lista', 'vuv' ),
    'items_list_navigation' => __( 'Navigacija među nagradama', 'vuv' ),
    'filter_items_list' => __( 'Filtriranje nagrada', 'vuv' ),
    );
    $args = array(
    'label' => __( 'Nagrade', 'vuv' ),
    'description' => __( 'Nagrade post type', 'vuv' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-awards',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => false,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    );
    register_post_type( 'rewards', $args );
    }
    add_action( 'init', 'register_reward_cpt', 0 );


/* ======================= Include taxonomy ======================= */

/* ======================= Include taxonomy ======================= */


/* ======================= Include custom meta box ======================= */
    
/* ======================= Include custom meta box ======================= */



?>