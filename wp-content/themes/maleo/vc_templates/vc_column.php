<?php
$output = $el_class = $width =  $ps_animation = $ps_animation_delay = $align_text = $inner_columns = '';
extract(shortcode_atts(array(
    'el_class' => '',
	'ps_animation' => '',
	'ps_animation_delay' => '',
	'align_text' => '',
    'width' => '1/1',
	'inner_columns' => '',
    'css' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);
$column_width = wpb_translateColumnWidthToSpan($width);

$inner_class = $this->settings['base'];

$animation = '';
$animation_delay = '';
$data_animation = '';

if($ps_animation != 'noAnimation') { 
		$animation = ' mo-animate '; $data_animation = psAnimation($ps_animation); 
	};
if($ps_animation != 'noAnimation' && $ps_animation_delay != '' ) {
		$animation_delay = 'data-delay="'.$ps_animation_delay.'"';
	}
$el_class .= ' columns ' . $animation . $align_text;
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $column_width.$el_class.vc_shortcode_custom_css_class($css, ' '),$this->settings['base'],$atts );
if(!$inner_columns) {$output .= "\n\t".'<div class="'.$css_class.'" '.$data_animation.' '.$animation_delay.'>';}
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
if(!$inner_columns) {$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";}
echo $output;