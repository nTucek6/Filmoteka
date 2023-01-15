<?php
function aktiviraj_sidebar()
{
register_sidebar(
    array (
    'name' => "Glavni sidebar",
    'id' => 'glavni-sidebar',
    'description' => "Glavni sidebar",
    'before_widget' => '<div class="widget-content">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    )
    );
    register_sidebar(
        array (
        'name' => "Search Bar",
        'id' => 'search-bar-sidebar',
        'description' => "Search bar sidebar",
        'before_widget' => '<div class="widget-content">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        )
        );
    register_sidebar(
        array (
        'name' => "Footer sidebar 1",
        'id' => 'footer-sidebar1',
        'description' => "Footer sidebar 1",
        'before_widget' => '<div class="widget-content col-md-3 FooterSidebar">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title FooterSidebar">',
        'after_title' => '</h3>',
        )
        );
        register_sidebar(
            array (
            'name' => "Footer sidebar 2",
            'id' => 'footer-sidebar2',
            'description' => "Footer sidebar 2",
            'before_widget' => '<div class="widget-content col-md-3">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title FooterSidebar">',
            'after_title' => '</h3>',
            )
            );
            register_sidebar(
                array (
                'name' => "Footer sidebar 3",
                'id' => 'footer-sidebar3',
                'description' => "Footer sidebar 3",
                'before_widget' => '<div class="widget-content col-md-3 ">',
                'after_widget' => "</div>",
                'before_title' => '<h3 class="widget-title FooterSidebar">',
                'after_title' => '</h3>',
                )
                );
                register_sidebar(
                    array (
                    'name' => "Footer sidebar 4",
                    'id' => 'footer-sidebar4',
                    'description' => "Footer sidebar 4",
                    'before_widget' => '<div class="widget-content col-md-3 ">',
                    'after_widget' => "</div>",
                    'before_title' => '<h3 class="widget-title FooterSidebar">',
                    'after_title' => '</h3>',
                    )
                    );


}
add_action( 'widgets_init', 'aktiviraj_sidebar' );

?>