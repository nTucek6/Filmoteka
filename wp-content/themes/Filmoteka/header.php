<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/7f2e2e8007.js" crossorigin="anonymous"></script>
<title>
    <?php 

      
         if(is_page() || is_single())
        {
         echo get_the_title()." | ".get_bloginfo('name');
        }
        else if(is_post_type_archive())
        {
          echo post_type_archive_title( '', false )." | ".get_bloginfo('name');
        }
        else if( is_home())
        {
            echo get_the_title( get_option('page_for_posts', true) )." | ".get_bloginfo('name');
        }
        else
        {
            single_cat_title();
        }
    ?></title>
<?php wp_head();?>
</head>
<body>
<header>
<nav class="navbar navbar-expand-md navbar-light navigationMain" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display    -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php echo "";  ?>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse d-flex justify-content-center',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav navigation',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ));
    ?>
        <?php echo get_search_form(); ?>
    </div>
    <?php   echo GetLoginNav(); ?>
</nav>

<?php
if(!is_home() && !is_category() && !is_single() && !is_archive() && get_the_post_thumbnail_url(get_the_ID()) && !is_search()) // is_home() - provjerava ako je stranica post page
{
   
    echo '<header class="masthead" style="background-image: url('.get_the_post_thumbnail_url(get_the_ID()).')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>'.$post->post_title.'</h1>
                </div>
            </div>
        </div>
    </div>
</header>';


}
?>

</header>