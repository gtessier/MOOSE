<?php $output = $title = $tabs_position = $tabs_style = $interval = $el_class = '';
extract( shortcode_atts( array(
	'title' => '',
	'interval' => 0,
	'tabs_position' => '',	
	'tabs_style' => '',
	'el_class' => ''
), $atts ) );

$animation = '';
$data_animation = '';
$animation_delay = '';
$el_class = $this->getExtraClass( $el_class );
$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode ) $element = 'wpb_tour';
// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();

/**
 * vc_tabs
 *
 */

if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}
if('vc_tour' == $this->shortcode && $tabs_style == 'maleo-index-tab') :

/*  Make the Tabs list  */
$tabs_nav = '';
$i = 0;
$tabs_nav .= '<ul class="resp-tabs-list">';
	
	foreach ( $tab_titles as $tab ) {
		$i++;
		$tab_atts = shortcode_parse_atts($tab[0]);
		if(isset($tab_atts['tab_description'])) { $tab_text = ' <p class="text-overflow">'.$tab_atts['tab_description'].'</p>';} else {$tab_text = '';} 		
		if(isset($tab_atts['title']) ) {
			$tabs_nav .= '<li class="clearfix">
						<div class="feature-left">
                           <div class="radius-shape">
                              <div class="shape-text">
                                 <p>'.$i.'</p>
                              </div>
                           </div>    
                           <div class="maleo-tab-text">   
                           <h6>' . $tab_atts['title'] . '</h6> 
                              '.$tab_text.'
                           </div>
                        </div>
					</li>';
		}
}
	$tabs_nav .= '</ul>' . "\n";

else :

/*  Make the Tabs list  */
$tabs_nav = '';
$tabs_nav .= '<ul class="resp-tabs-list">';
	foreach ( $tab_titles as $tab ) {
		$tab_atts = shortcode_parse_atts($tab[0]);
		if(isset($tab_atts['ps_animation']) && $tab_atts['ps_animation'] != 'noAnimation' ) {
			$animation = 'class="mo-animate"'; 
			$data_animation = psAnimation($tab_atts['ps_animation']); 	
		}
		if(isset($tab_atts['ps_animation_delay'])) {
			$animation_delay = 'data-delay="'.$tab_atts['ps_animation_delay'].'"'; 			
		}
		if(isset($tab_atts['icon'])) {		
		$tabs_nav .= '<li '.$animation.' '.$data_animation.' '.$animation_delay.'><i class="'. $tab_atts['icon'].'"></i> ' . $tab_atts['title'] . '</li>';
		} elseif(isset($tab_atts['title']) ) {
		$tabs_nav .= '<li '.$animation.' '.$data_animation.' '.$animation_delay.'>' . $tab_atts['title'] . '</li>';
		}
}
	$tabs_nav .= '</ul>' . "\n";


endif;

/*  Make the Tabs list  */
if($tabs_style == 'accordion') { $tabid = 'accordion';} else { $tabid = $tabs_position;}	
$output .= "\n\t" . '<div id="'.$tabid.'" class="'.$tabs_style.' '.$el_class.'">';	
$output .= "\n\t\t\t" . $tabs_nav;
$output .= "\n\t\t" . '<div class="resp-tabs-container">';
$output .= "\n\t\t\t" . wpb_js_remove_wpautop( $content );
$output .= "\n\t\t" . '</div> ' . $this->endBlockComment( '.wpb_wrapper' );
$output .= "\n\t" . '</div> ' . $this->endBlockComment( $element );
echo $output;