<?php
get_header();

echo GetUsers();

echo '<script>
    jQuery(function($) {
        FancyTable();
    });
    </script>';

?>

<?php get_footer(); ?>