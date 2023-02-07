<?php
get_header();
?>
<?php

if(get_current_user_id() != 0)
{
if(is_admin_user())
{

echo '<div class="card" style="background-color:#2e2e2c;"><div class="container"><h2 class="mt-3">Posudbe </h2></div></div>';
echo GetBorrowedMovies();
}
else
{
  echo '<div class="card" style="background-color:#2e2e2c;"><div class="container"><h2 class="mt-3">Posudbe </h2></div></div>';
  echo GetUserMovies();
}
}

?>
</div>

<?php

echo '<script>
    jQuery(function($) {
        FancyTable();
    });
    </script>';

?>

<?php get_footer(); ?>