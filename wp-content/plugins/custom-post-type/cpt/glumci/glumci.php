<?php
function register_actor_cpt() {
    $labels = array(
    'name' => _x( 'Glumci', 'Post Type General Name', 'vuv' ),
    'singular_name' => _x( 'Glumac', 'Post Type Singular Name', 'vuv' ),
    'menu_name' => __( 'Glumci', 'vuv' ),
    'name_admin_bar' => __( 'Glumci', 'vuv' ),
    'archives' => __( 'Glumci arhiva', 'vuv' ),
    'attributes' => __( 'Atributi', 'vuv' ),
    'parent_item_colon' => __( 'Roditeljski element', 'vuv' ),
    'all_items' => __( 'Svi glumci', 'vuv' ),
    'add_new_item' => __( 'Dodaj novog glumca', 'vuv' ),
    'add_new' => __( 'Dodaj novi', 'vuv' ),
    'new_item' => __( 'Novi glumac', 'vuv' ),
    'edit_item' => __( 'Uredi glumca', 'vuv' ),
    'update_item' => __( 'Ažuriraj glumca', 'vuv' ),
    'view_item' => __( 'Pogledaj glumca', 'vuv' ),
    'view_items' => __( 'Pogledaj glumce', 'vuv' ),
    'search_items' => __( 'Pretraži glumce', 'vuv' ),
    'not_found' => __( 'Nije pronađeno', 'vuv' ),
    'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vuv' ),
    'featured_image' => __( 'Glavna slika', 'vuv' ),
    'set_featured_image' => __( 'Postavi glavnu sliku', 'vuv' ),
    'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vuv' ),
    'use_featured_image' => __( 'Postavi za glavnu sliku', 'vuv' ),
    'insert_into_item' => __( 'Umentni', 'vuv' ),
    'uploaded_to_this_item' => __( 'Preneseno', 'vuv' ),
    'items_list' => __( 'Lista', 'vuv' ),
    'items_list_navigation' => __( 'Navigacija među glumcima', 'vuv' ),
    'filter_items_list' => __( 'Filtriranje glumaca', 'vuv' ),
    );
    $args = array(
    'label' => __( 'Glumci', 'vuv' ),
    'description' => __( 'Glumci post type', 'vuv' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-admin-users',
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => false,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    );
    register_post_type( 'actors', $args );
    }
    add_action( 'init', 'register_actor_cpt', 0 );


/* ======================= Include taxonomy ======================= */
    include 'taxonomy/gender.php';
/* ======================= Include taxonomy ======================= */


/* ======================= Include custom meta box ======================= */
    include 'custom-meta-box/cmb-actor-info.php';
/* ======================= Include custom meta box ======================= */



?>