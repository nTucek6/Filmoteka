<?php
    function register_taxonomy_language() {
        $labels = array(
        'name' => _x( 'Jezik', 'Taxonomy General Name',
        'vuv' ),
        'singular_name' => _x( 'Jezik', 'Taxonomy Singular Name',
        'vuv' ),
        'menu_name' => __( 'Jezik', 'vuv' ),
        'all_items' => __( 'Svi jezici', 'vuv' ),
        'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
        'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
        'new_item_name' => __( 'Novi jezik', 'vuv' ),
        'add_new_item' => __( 'Dodaj novi jezik', 'vuv' ),
        'edit_item' => __( 'Uredi jezik', 'vuv' ),
        'update_item' => __( 'Ažuiriraj jezik', 'vuv' ),
        'view_item' => __( 'Pogledaj jezik', 'vuv' ),
        'separate_items_with_commas' => __( 'Odvojite jezik sa zarezima', 'vuv' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni jezik', 'vuv' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
        'popular_items' => __( 'Popularni jezici', 'vuv' ),
        'search_items' => __( 'Pretraga', 'vuv' ),
        'not_found' => __( 'Nema rezultata', 'vuv' ),
        'no_terms' => __( 'Nema jezika', 'vuv' ),
        'items_list' => __( 'Lista jezika', 'vuv' ),
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
        register_taxonomy( 'language', array( 'movies' ), $args );
        }
        add_action( 'init', 'register_taxonomy_language', 0 );
?>