<?php
// Columns
function et_column($atts, $content = null) {
    extract( shortcode_atts( array(
        'width' => '1/2',
        'place' => 'alpha',
        'custom_class' => ''
        ), $atts ) );

    switch ( $width ) {
        case "full" :
        $w = "columns sixteen";
        break;
        
        case "1/2" :
        $w = "columns eight";
        break;

        case "1/3" :
        $w = "column one-third";
        break;

        case "2/3" :
        $w = "column two-thirds";
        break;

        case "1/4" :
        $w = "four columns";
        break;

        case "3/4" :
        $w = "twelve columns";
        break;

        case "one" : $w = "one columns"; break;
        case "two" : $w = "two columns"; break;
        case "three" : $w = "three columns"; break;
        case "four" : $w = "four columns"; break;
        case "five" : $w = "five columns"; break;
        case "six" : $w = "six columns"; break;
        case "seven" : $w = "seven columns"; break;
        case "eight" : $w = "eight columns"; break;
        case "nine" : $w = "nine columns"; break;
        case "ten" : $w = "ten columns"; break;
        case "eleven" : $w = "eleven columns"; break;
        case "twelve" : $w = "twelve columns"; break;
        case "thirteen" : $w = "thirteen columns"; break;
        case "fourteen" : $w = "fourteen columns"; break;
        case "fifteen" : $w = "fifteen columns"; break;
        case "sixteen" : $w = "sixteen columns"; break;
        

        default :
        $w = 'columns sixteen';
    }

    $column ='<div class="'.$w.' '.$custom_class.' ';
    $column .= '">'.do_shortcode( $content ).'</div>';
    if($place=='last') $column .= '<br class="clear" />';
    return $column;
} add_shortcode('column', 'et_column');

// Titles
function et_titles($atts, $content = null) {
    extract( shortcode_atts( array('type' => 'h3'), $atts ) );

    switch ( $type ) {
        case "h1" : $h = "h1"; break;	
        case "h2" : $h = "h2"; break;
        case "h3" : $h = "h3"; break;
        case "h4" : $h = "h4"; break;
        case "h5" : $h = "h5"; break;
        case "h6" : $h = "h6";  break;
        default : $h = 'h3';
    }
	
    $title ='<'.$h.' class="'.$h.'">'.do_shortcode( $content ).'</'.$h.'>';
	if($h == 'h1') $title .= '<span class="section-title-bullet"></span>';
    return $title;
} add_shortcode('title', 'et_titles');

// Divider
function et_divider(){
	return '<div class="text-divider"></div>';
} add_shortcode('divider','et_divider');

// Buttons
function et_button($atts, $content = null) {
    extract(shortcode_atts(array(
        "url" => '',
        "size" => 'medium',
		"color" => 'color'
    ), $atts));

    $output = '<a href="'. $url .'" class="button '. $color .' '. $size .'"> '. $content .'</a>';
    return $output;
}
add_shortcode('button', 'et_button');
?>