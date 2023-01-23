<?php

/* ======================= Taxonomy for reward ======================= */

    function register_taxonomy_award_type() {
        $labels = array(
        'name' => _x( 'Tip nagrade', 'Taxonomy General Name',
        'vuv' ),
        'singular_name' => _x( 'Tip nagrade', 'Taxonomy Singular Name',
        'vuv' ),
        'menu_name' => __( 'Tip nagrade', 'vuv' ),
        'all_items' => __( 'Svi Tipovi nagrade ', 'vuv' ),
        'parent_item' => __( 'Roditeljsko zvanje', 'vuv' ),
        'parent_item_colon' => __( 'Roditeljsko zvanje', 'vuv' ),
        'new_item_name' => __( 'Novi tip nagrade', 'vuv' ),
        'add_new_item' => __( 'Dodaj novi tip nagrade', 'vuv' ),
        'edit_item' => __( 'Uredi tip nagrade', 'vuv' ),
        'update_item' => __( 'Ažuiriraj tip nagrade', 'vuv' ),
        'view_item' => __( 'Pogledaj tip nagrade', 'vuv' ),
        'separate_items_with_commas' => __( 'Odvojite tip nagrade sa zarezima', 'vuv' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni tip nagrade', 'vuv' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vuv' ),
        'popular_items' => __( 'Popularni tip nagrade', 'vuv' ),
        'search_items' => __( 'Pretraga', 'vuv' ),
        'not_found' => __( 'Nema rezultata', 'vuv' ),
        'no_terms' => __( 'Nema tip nagrade', 'vuv' ),
        'items_list' => __( 'Lista tipa nagrada', 'vuv' ),
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
        register_taxonomy( 'award-type', array( 'rewards' ), $args );
        }
        add_action( 'init', 'register_taxonomy_award_type', 0 );


/* ======================= Taxonomy for reward ======================= */


?>