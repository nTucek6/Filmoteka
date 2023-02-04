<?php
get_header();


echo '<div id="table" class="mt-3"></div>';

$link = home_url().'/wp-admin/admin-ajax.php';
echo '<script>
        jQuery(function($){
            GetUserLoans("'.$link.'");
        });
</script>';

?>

<?php get_footer(); ?>


