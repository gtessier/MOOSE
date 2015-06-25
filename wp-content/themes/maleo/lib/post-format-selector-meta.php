<?php
/**
 * Plugin Name: Post Formats and Meta Boxes Visibility
 * Description: Show and hide Meta Boxes based on the current selected Post Format
 * Plugin URI:  http://wpkrauts.com/2013/post-formats-and-custom-meta-boxes-visibility/
 * Version:     2013.05.14
 * Author:      Rodolfo Buaiz
 * Author URI:  http://rodbuaiz.com
 * License:     GPLv3
 */

if( is_admin() )
{
	add_action(
		'init',
		array ( B5F_Post_Formats::get_instance(), 'plugin_setup' )
	);
}	

class B5F_Post_Formats
{
	/**
	 * Plugin instance.
	 * @type object
	 */
	protected static $instance = NULL;

	/**
	 * URL to this plugin's directory.
	 * @type string
	 */
	public $plugin_url = '';

	/**
	 * Post Format and corresponding visible DIVs
	 * Formated for jQuery
	 * @type array
	 */
	public $formats_and_divs = array(
		// 'standard'     => "#postexcerpt, #postdivrich"
		//,'aside'  	=> "#titlediv, #categorydiv"
		//,'chat' 	=> "#trackbacksdiv, #postcustom"
		'gallery'      => "#prodigystudio_post_gallery"
		,'image' 	=> "#commentsdiv"
		,'link' 	=> "#slugdiv"
		,'quote' 	=> "#post_quote_metabox"
		//,'status' 	=> "#revisionsdiv"
		,'video' 	=> "#post_media_metabox"
		,'audio' 	=> "#post_audio_metabox"
	);

	/**
	 * The first radio input of the list has value of 0 (zero), unlike the rest
	 *
	 * When using default post formats, "standard" is the first one
	 * Adjust this when using custom set ups
	 * Haven't found a JS solution, see: http://stackoverflow.com/q/4491272
	 *
	 * @type string
	 */
	public $first_radio_button = "standard";
	
	/**
	 * Access this plugin’s working instance
	 *
	 * @wp-hook plugins_loaded
	 * @since   2012.09.13
	 * @return  object of this class
	 */
	public static function get_instance()
	{
		NULL === self::$instance and self::$instance = new self;
		return self::$instance;
	}

	/**
	 * Used for regular plugin work.
	 *
	 * @wp-hook plugins_loaded
	 * @since   2012.09.10
	 * @return  void
	 */
	public function plugin_setup()
	{
		$this->plugin_url    = get_template_directory_uri().'/';

		global $pagenow;
		$hooks = array( 'post.php', 'post-new.php' );
		if( !in_array( $pagenow, $hooks ) )
			return;
				
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_script' ) );
	}

	/**
	 * Constructor. Intentionally left empty and public.
	 *
	 * @see plugin_setup()
	 * @since 2012.09.12
	 */
	public function __construct() {}

	/**
	 * Javascript enqueue and localization
	 *
	 * @since 2013.05.14
	 */
	public function enqueue_script()
	{
		wp_enqueue_script( 
			 'post-formats' 
			, get_template_directory_uri() . '/lib/assets/js/pf-and-mb.js'
			, array( 'jquery' )
			, null
			, true
		);

	    wp_localize_script( 
			 'post-formats' 
			,'pfs' 
			,array( 
				 'formats'  => $this->formats_and_divs
				,'first_radio' => $this->first_radio_button
			) 
		);
	}
}
?>