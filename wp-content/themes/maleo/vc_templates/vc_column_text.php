<?php
$output = $el_class = $css_animation = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'ps_animation' => '',
    'css' => ''
), $atts));
$el_class = $this->getExtraClass($el_class);

$animation = '';
$data_animation = '';
if($ps_animation != 'noAnimation') { $animation = ' triggerAnimation animated '; $data_animation = psAnimation($ps_animation); };

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'ps_text_column '.$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.' '.$animation.'" '.$data_animation.'>';
//$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content, true);
//$output .= "\n\t\t".'</div> ' . $this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> ' . $this->endBlockComment('.wpb_text_column');

echo $output;