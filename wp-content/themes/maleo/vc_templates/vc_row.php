<?php
$output = $el_class = $section_id = $bg_image = $bg_color = $gmap_lat = $gmap_long = $gmap_marker = $bg_image_repeat =  $font_color = $wrapdiv = $padding = $margin_bottom = $css = $ps_class = $type = $options_bg = $video_webm = $video_mp4 = $video_ogv = $video_yt = $video_image = $use_raster = $start_at = $content_layout = $mute = $mute_btn = '';
extract(shortcode_atts(array(
    'el_class'        => '',
	'ps_class'        => '',	
	'content_layout'  => 'grid',
    'bg_image'        => '',
    'bg_color'        => '',	
	'gmap_lat'		=> '52.52315',
	'gmap_long'	   => '13.40696',
	'gmap_marker'	 => '',
	'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
	'parallax_bg'	 => '',
	'section_id'	  => '',	
	'options_bg'	  => 'default',
	'video_webm'      => '',
	'video_mp4'       => '',
	'video_ogv'       => '',	
	'video_image'     => '',
	'wrapdiv'         => '',
    'margin_bottom'   => '',
	'use_raster'      => '',
	'start_at'        => '',
	'mute'			=> 'muted',
	'mute_btn'        => '',
    'css' => ''
), $atts));

wp_enqueue_style('js_composer_front');
wp_enqueue_script('wpb_composer_front_js');
wp_enqueue_style( 'js_composer_custom_css' );

if($gmap_marker !='' ) {
		$image_data = wp_get_attachment_image_src( $gmap_marker, 'full');
		$marker_src = $image_data['0'];
	} else { 
		$marker_src = ''.get_template_directory_uri().'/img/map-marker.png';
	}

$ps_section_id = '';
if($section_id) {$ps_section_id = 'id="'.$section_id.'"';}

$el_class = $this->getExtraClass($el_class);
$ps_inner_row = $this->settings['base'];

if($content_layout != 'full-width') {$ps_class = 'mo-content ';} else {$ps_class = 'mo-contentfull ';}
$parallax_class = '';
if($options_bg == 'parallaxbg' || $options_bg == 'parallaxbgoverlay'  ) {$parallax_class = ' parallax ';}
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ''.get_row_css_class().$el_class.vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

if ($ps_inner_row != 'vc_row_inner') :
	switch ($options_bg) {
		
		case 'default':
			switch($content_layout) {
				case 'grid':
					$output .= '<section class="'.$ps_class.$parallax_class.$css_class.'"'.$style.' '.$ps_section_id.'>';
						$output .= '<div class="row">';
							$output .= wpb_js_remove_wpautop($content);
						$output .= '</div>';
					$output .= '</section>';
				break;
				case 'full-width':
					$output .= '<section class="'.$ps_class.$parallax_class.$css_class.'"'.$style.' '.$ps_section_id.'>';
						$output .= '<div class="rowfull">';
							$output .= wpb_js_remove_wpautop($content);
						$output .= '</div>';
					$output .= '</section>';
				break;
				case 'separator':
					$output .= '<div class="mo-contentfull separator-inner">';
						$output .= '<div class="row">';
						$output .= '<hr>';
						$output .= '</div>';
					$output .= '</div>';
				break;
			}			
		break;
		
		case 'overlay':
			switch($content_layout) {
				case 'grid':
					$output .= '<section class="'.$ps_class.$parallax_class.$css_class.'"'.$style.' '.$ps_section_id.'>';
						$output .= '<div class="overlay"></div><div class="row">';
							$output .= wpb_js_remove_wpautop($content);
						$output .= '</div>';
					$output .= '</section>';
				break;
				case 'full-width':
					$output .= '<section class="'.$ps_class.$parallax_class.$css_class.'"'.$style.' '.$ps_section_id.'>';
						$output .= '<div class="overlay"></div><div class="rowfull">';
							$output .= wpb_js_remove_wpautop($content);
						$output .= '</div>';
					$output .= '</section>';
				break;				
			}			
		break;
		
		
		case 'parallaxbg':
			$output .= '<section class="'.$ps_class.$parallax_class.$css_class.'"'.$style.' '.$ps_section_id.'>';
			if ($content_layout != 'full-width') {
					$output .= '<div class="row">';
				} else {
					$output .= '<div class="full-wrapper">';
				}
			$output .= wpb_js_remove_wpautop($content);		
			$output .= '</div><div class="clear"></div>';
			$output .= '</section>'.$this->endBlockComment('row');
			wp_enqueue_script( 'ps-parallax' );
		break;
		
		case 'parallaxbgoverlay':
			$output .= '<section class="'.$ps_class.$parallax_class.$css_class.'"'.$style.' '.$ps_section_id.'><div class="overlay-inner"></div>';
			if ($content_layout != 'full-width') {
					$output .= '<div class="row">';
				} else {
					$output .= '<div class="full-wrapper">';
				}
			$output .= wpb_js_remove_wpautop($content);		
			$output .= '</div><div class="clear"></div>';
			$output .= '</section>'.$this->endBlockComment('row');
			wp_enqueue_script( 'ps-parallax' );
		break;
		
		case 'googlebg':
			$output .= '<section class="mo-contentfull" id="map-warpper"><div class="rowfull"><div id="map"><h3>Google Map</h3></div></div></section>'.$this->endBlockComment('row');
			$output .= '<script>
							var glong = "'.$gmap_long.'";
							var glat = "'.$gmap_lat.'";
							var gmarker = "'.$marker_src.'";
				
				</script>';
			wp_enqueue_script( 'google-map-api-js' );
			wp_enqueue_script( 'gmaps' );
			wp_enqueue_script( 'maleo-gmaps' );
			
		break;
		
		case 'html5videobg':
			$output .= '<section class="'.$ps_class.$css_class.'"'.$style.' '.$ps_section_id.'>';
				$output .= '<div id="video-container">';
                $output .= '<video autoplay loop ';
				if ($mute == 'muted') $output .= 'muted '; 
				$output .= 'class="fillWidth video-'.$row_id.'">';
                if ($video_mp4 !='') {  
                $output .= '<source src="'.$video_mp4.'" type="video/mp4"/>';
                }
                if ($video_webm !='') {  
                $output .= '<source src="'.$video_webm .'" type="video/webm"/>';
                }
                if ($video_ogv !='') { 
                $output .= '<source src="'.$video_ogv.'" type="video/ogg"/>'; 
                }
                $output .= 'Your browser does not support the video tag. I suggest you upgrade your browser.'; 
                $output .= '</video>'; 
				if ($mute == 'muted') {
				if(strtolower($mute_btn) == 'true') {$output .= '<a class="ps-video-mute-button mute"></a>';}
				} else {
				if(strtolower($mute_btn) == 'true') {$output .= '<a class="ps-video-mute-button unmute"></a>';}
				}
                $output .= '</section>'; 
            if (strtolower($mute_btn) == 'true') { 
            $output .= '<script type="text/javascript">
            jQuery(document).ready(function(){
            jQuery("#'.$row_id.' .ps-video-mute-button").click(function(event){
                event.preventDefault();
                if( jQuery("#'.$row_id.' .dp-video-mute-button").hasClass("unmute") ) {
                                            jQuery(this).removeClass("unmute").addClass("mute");														
											if( jQuery(".video-'.$row_id.'").prop("muted") ) {
													  jQuery(".video-'.$row_id.'").prop("muted", false);
												} else {
												  jQuery(".video-'.$row_id.'").prop("muted", true);
												}
											  } else {
                                            jQuery(this).removeClass("mute").addClass("unmute");
											if( jQuery(".video-'.$row_id.'").prop("muted") ) {
													  jQuery(".video-'.$row_id.'").prop("muted", false);
												} else {
												  jQuery(".video-'.$row_id.'").prop("muted", true);
												}
                                        }
                });
            
            });
            </script>'; }
				if ($content_layout != 'full-width') {
					$output .= '<div class="row">';
				} else {
					$output .= '<div class="full-wrapper">';
				}
			$output .= wpb_js_remove_wpautop($content);		
			$output .= '</div>';
			$output .= '</div>'.$this->endBlockComment('row');
		break;
		}
	
	 else: 
	 		if($wrapdiv == 'true'){$output .= '<div class="row">';}				 	
			$output .= wpb_js_remove_wpautop($content);
			if($wrapdiv == 'true'){$output .= '</div>';}
	 endif;	
	
echo $output;