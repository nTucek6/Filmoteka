<?php

/* ======================= Taxonomy for actor ======================= */

    function register_taxonomy_gender() {
        $labels = array(
        'name' => _x( 'Spol', 'Taxonomy General Name',
        'vuv' ),
        'singular_name' => _x( 'Spol', 'Taxonomy Singular Name',
        'vuv' ),
        'menu_name' => __( 'Spol', 'vuv' ),
        'all_items' => __( 'Svi spolovi', 'vuv' ),
        'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
        'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
        'new_item_name' => __( 'Novi spol', 'vuv' ),
        'add_new_item' => __( 'Dodaj novi spol', 'vuv' ),
        'edit_item' => __( 'Uredi spol', 'vuv' ),
        'update_item' => __( 'Ažuiriraj spol', 'vuv' ),
        'view_item' => __( 'Pogledaj spol', 'vuv' ),
        'separate_items_with_commas' => __( 'Odvojite spol sa zarezima', 'vuv' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni spol', 'vuv' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
        'popular_items' => __( 'Popularni spol', 'vuv' ),
        'search_items' => __( 'Pretraga', 'vuv' ),
        'not_found' => __( 'Nema rezultata', 'vuv' ),
        'no_terms' => __( 'Nema spola', 'vuv' ),
        'items_list' => __( 'Lista spola', 'vuv' ),
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
        register_taxonomy( 'gender', array( 'actors' ), $args );
        }
        add_action( 'init', 'register_taxonomy_gender', 0 );


/* ======================= Taxonomy for actor ======================= */


?>