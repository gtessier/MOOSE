<?php
$output = $title = $alias = $el_class = '';
extract( shortcode_atts( array(
    'title' => '',
    'alias' => '',
    'el_class' => ''
), $atts ) );

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $el_class, $this->settings['base'], $atts );
$output .= '<div class="banner">';
//$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_revslider_heading'));
$output .= apply_filters('vc_revslider_shortcode', do_shortcode('[rev_slider '.$alias.']'));
$output .= '</div>';

echo $output;