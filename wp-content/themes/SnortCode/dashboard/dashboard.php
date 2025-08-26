<?php get_header(); ?>

<?php get_template_part('navigation/navigation'); ?>

<?php if (is_snortcode_user()) {
    echo 'User';
} else if (is_snortcode_admin()) {
    echo 'Admin';
}
?>

<?php get_footer(); ?>