<?php
/*
	Template Name: Home
*/
	get_header();
?>

<?php if ( function_exists( 'ot_get_option' ) ) {						  
	$et_sections = ot_get_option( 'et_home_sections', array() );
		if ( ! empty( $et_sections ) ) {
			foreach( $et_sections as $et_section ) {
				get_template_part( 'includes/sections/'.$et_section['et_add_home_section'] );
			}
		}
} ?>

<?php get_footer(); ?>
