<?php
add_action( 'wp_enqueue_scripts', 'ps_child_theme_scripts' );
function ps_child_theme_scripts() {
    wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}
?>