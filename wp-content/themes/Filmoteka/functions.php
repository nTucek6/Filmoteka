<?php
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
function inicijaliziraj_temu()
{
add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

add_theme_support( 'custom-background', apply_filters(
'test_custom_background_args', array(
'default-color' => 'ffffff',
'default-image' => '',
) ) );
add_theme_support( 'customize-selective-refresh-widgets' );
}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );

/* ======================= Includes ======================= */


include 'functions/Sidebar/sidebar.php'; // include sidebar

include 'functions/GetFrontContent/front-page-newest.php'; //include front page newest movies

include 'functions/ReturnTaxonomyTerm/getTaxonomy.php'; //include front page newest movies

include 'functions/PageFilmoviGenres/get-all-term-movies.php'; //include page Filmovi content

include 'functions/SearchMovies/search-movies.php'; //include funckiju za pretragu filmova

include 'functions/GetMovieCMB/movies-cmb.php'; // Dohvacanje dodatnih informacija filma;

include 'functions/GetActorCMB/actors-cmb.php'; // Dohvacanje dodatnih informacija glumaca;

include 'functions/GetRewardsCMB/rewards-cmb.php'; // Dohvacanje dodatnih informacija nagrada;

include 'functions/AjaxMovies/ajax-movie.php'; // Funckije za posudivaje filma

include 'functions/BorrowedMovies/find-borrowed-movies.php'; //Funckija vraca posuden filmove korisnika i admin tablicu

include 'functions/GetAllGenres/get-all-genres.php'; //Funckija vraca posuden filmove korisnika i admin tablicu

include 'functions/GetRewardArchive/reward.php'; //Funckija vraca archive reward sortirano


/* ======================= Includes ======================= */



/* ======================= Navwalker setup ======================= */

function register_navwalker(){
	if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory().'/class-wp-bootstrap-navwalker.php';
    }
}
add_action( 'after_setup_theme', 'register_navwalker' );


/* ======================= učitavanje css datoteka ======================= */

function ucitaj_glavni_css()
{
wp_enqueue_style( 'glavni-css', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'sporedni-css', get_template_directory_uri() . '/css/main.css' );
wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/plugins/BootstrapV4.6.0/css/bootstrap.min.css' );
//wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/plugins/BootstrapV5.0.2/css/bootstrap.min.css' );
}
add_action( 'wp_enqueue_scripts', 'ucitaj_glavni_css' );

/* ======================= učitavanje javascript datoteka ======================= */

function ucitaj_glavni_js()
{
wp_enqueue_script('glavni-js', get_template_directory_uri().'/js/script.js' ,array('jquery'),false, true);
wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/plugins/BootstrapV4.6.0/js/bootstrap.bundle.min.js','4.6.0',true);
//wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/plugins/BootstrapV5.0.2/js/bootstrap.bundle.min.js','5.0.2',true);
}
add_action( 'wp_enqueue_scripts', 'ucitaj_glavni_js', 1 );

function ucitaj_Select2()
{
    wp_enqueue_style( 'select2-css', get_template_directory_uri() . '/plugins/select2-4.1.0-rc.0/css/select2.min.css',array(),'4.1.0-rc.0' );
    wp_enqueue_script('select2-js', get_template_directory_uri().'/plugins/select2-4.1.0-rc.0/js/select2.min.js','jquery','4.1.0-rc.0'); 
    wp_enqueue_script('select2-init-js', get_template_directory_uri().'/plugins/select2-4.1.0-rc.0/select2-init.js','jquery','4.1.0-rc.0');
}
add_action( 'admin_enqueue_scripts', 'ucitaj_Select2',1);

function ucitaj_Swiper()
{
    wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/plugins/swiper-8.4.5/css/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', get_template_directory_uri().'/plugins/swiper-8.4.5/js/swiper-bundle.min.js','8.4.5',true); 
}
add_action( 'wp_enqueue_scripts', 'ucitaj_Swiper',1);


function ucitaj_fancyTable()
{
    wp_enqueue_script('fancyTable-js', get_template_directory_uri().'/plugins/jquery.fancyTable/js/fancyTable.min.js','1.0.33',true); 
}
add_action( 'wp_enqueue_scripts', 'ucitaj_fancyTable',1);


/* ======================= provjera login ======================= */

function GetLoginNav()
{
$html = "";
if(get_current_user_id() == 0)
{
    $html .= '<ul id="menu-navigacija" class="nav navbar-nav navigation d-flex justify-content-end" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
    <li class="menu-item menu-item-type-post_type_archive menu-item-object-rewards nav-item"><a itemprop="url" href="http://localhost/Filmoteka/login/" class="nav-link"><span itemprop="name">Prijava</span></a></li>
    </ul>';
}
else
{
    $html .= '<ul id="menu-navigacija" class="nav navbar-nav navigation d-flex justify-content-end" itemscope="" itemtype="http://www.schema.org/SiteNavigationElement">
    <li id="menu-navigacija" class="nav navbar-nav navigation d-flex justify-content-end menu-item-has-children dropdown menu-item-navigacija nav-item">
<a href="http://localhost/Filmoteka/user/" data-hover="dropdown" aria-expanded="false" class="dropdown-toggle nav-link" id="menu-item-dropdown-78">
<span itemprop="name">Profil</span>
</a>
<ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-78">
	<li id="menu-item-17" class="menu-item menu-item-type-custom menu-item-object-movies menu-item-17 nav-item">
    <a itemprop="url" href="http://localhost/Filmoteka/loans/" class="dropdown-item"><span itemprop="name">Posudbe</span></a></li>
    <li id="menu-item-17" class=""menu-item menu-item-type-custom_type_archive menu-item-object-movies menu-item-17 nav-item">
    <a itemprop="url" href="http://localhost/Filmoteka/logout/" class="dropdown-item text-danger"><span itemprop="name">Odjava</span></a></li> </ul>

</ul>
</li>';

}
return $html;
}

/* ======================= provjera login ======================= */


function is_admin_user() {
    return current_user_can( 'manage_options' );
}





?>
