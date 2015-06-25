<?php
/* Load the Theme class. */
function theme_enqueue_child_style(){
	wp_enqueue_style('theme-child-style', get_stylesheet_directory_uri(). '/style.css',array('theme-style','theme-skin'),false,'all');
}
add_action('wp_print_styles', 'theme_enqueue_child_style');