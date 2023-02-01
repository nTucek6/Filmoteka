<?php
get_header();


echo '<div id="table"></div>';

$link = home_url().'/wp-admin/admin-ajax.php';
echo '<script>
        jQuery(function($){
            GetUserLoans("'.$link.'");
        });
</script>';


?>

<?php get_footer(); ?>


