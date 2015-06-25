<?php
$output = $title = $link = $video_id = $video_source = $size = $el_class = '';
extract( shortcode_atts( array(
	'title' => '',
	'link' => 'http://vimeo.com/92033601',
	'size' => ( isset( $content_width ) ) ? $content_width : 500,
	'el_class' => '',
	'video_source' => '',
	'video_id' => '',
	'css' => ''

), $atts ) );

if ( $link == '' ) {
	return null;
}
$el_class = $this->getExtraClass( $el_class );

$video_w = ( isset( $content_width ) ) ? $content_width : 500;
$video_h = $video_w / 1.61; //1.61 golden ratio
global $wp_embed;
$embed = $wp_embed->run_shortcode( '[embed width="' . $video_w . '"' . $video_h . ']' . $link . '[/embed]' );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, '' . $el_class . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$output .= "\n\t" . '<div class="blog-video ' . $css_class . '">';
//$output .= "\n\t\t" . '<div class="wpb_wrapper">';
//$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_video_heading' ) );
//$output .= '<div class="wpb_video_wrapper">' . $embed . '</div>';
//$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
if($video_source == 'vimeo') {
	$output .= '<iframe src="//player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;color=59ba47"></iframe>';
} else {
	$output .= '<iframe width="560" height="315" src="//www.youtube.com/embed/'.$video_id.'" frameborder="0" allowfullscreen></iframe>';	
}
$output .= "\n\t" . '</div> ' . $this->endBlockComment( '.wpb_video_widget' );
echo $output;