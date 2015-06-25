<?php
/* Define the custom box */

add_action( 'add_meta_boxes', 'psrv_add_custom_box' );

// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'myplugin_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'psrv_save_team_details' );

/* Adds a box to the main column on the Post and Page edit screens */
function psrv_add_custom_box() {
    //metabox for review details
    add_meta_box( 'ps-team-details', __( 'Team Options', 'psrv' ), 'ps_team_details', 'team', 'normal','high' );
}

//review details function 
function ps_team_details( $post ) {
	include dirname( __FILE__ ) . '/tpls/social-list.php';
}
 
function psrv_save_team_details( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( !current_user_can( 'edit_post', $post_id ) ) return;
    
    if(isset($_POST['_ps_team_details'])){
    update_post_meta($post_id,'_ps_team_details',$_POST['_ps_team_details']);
    }
	
    if(isset($_POST['_ps_team_social'])){
    update_post_meta($post_id,'_ps_team_social',$_POST['_ps_team_social']);
    }else{
       update_post_meta($post_id,'_ps_team_social',"");
    }
    
}
add_action('wp_ajax_psrv_save_details','psrv_save_details'); 
 