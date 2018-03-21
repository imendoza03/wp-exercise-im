<?php

/*
	Plugin Name: WF3 user box
	Description: This plugin will enable the use of a new shortcode [wf3user email="true"] to be used inside the wordpress admin editor
	Author: Ivan Mendoza
	Version: 1.0
	Author URI: http://wwww.ivanmendoza.tk
*/

/**
 * Create shortcode
 * [wf3user email="true"]
 */

function wf3user_shortcode( $atts ){
	
	//logic here

	$attributes = shortcode_atts( array(
        'email' => 'false',
    ), $atts );

	$html = '';

	if( is_user_logged_in() ): 

		//retrieve current user WP_User Object
		$current_user = wp_get_current_user();

		$html = '<div class="user-connected-box">';
		$html .= 'Welcome <strong>' . $current_user->display_name .  '</strong><br>';
		if($attributes['email'] == 'true'):
			$html .= 'You are connected as : ';
			$html .= $current_user->user_email;
		endif;
		$html .= '</div>'; 
	
	endif;

	return $html;
}
add_shortcode( 'wf3user', 'wf3user_shortcode' );

?>