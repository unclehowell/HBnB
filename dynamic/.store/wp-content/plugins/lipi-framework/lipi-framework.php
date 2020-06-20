<?php 
/* 
 * Plugin Name:   Lipi Framework  
 * Version:       1.1
 * Plugin URI:    http://www.wpsmartapps.com/
 * Description:   <strong>Support Lipi WordPress Theme</strong>.
 * Author:        Jabin Kadel
 * Author URI:    http://www.jabinkadel.com
 *
 * License: Copyright (c) 2018 WpSmartApps.com. All rights reserved.
 *  
 */

define( 'LIPI_PLUGIN', __FILE__ );
define( 'LIPI_PLUGIN_DIR', untrailingslashit( dirname( LIPI_PLUGIN ) ) );

/********************************
*** ACTIVATE PLUGIN ACTION  ***
***********************************/
$lipi_framework_path     = preg_replace('/^.*wp-content[\\\\\/]plugins[\\\\\/]/', '', __FILE__);
$lipi_framework_path     = str_replace('\\','/',$lipi_framework_path);

// Langauge Support
add_action('plugins_loaded', 'lipi__vc_support_load_textdomain');
function lipi__vc_support_load_textdomain() {  
	load_plugin_textdomain( 'lipi-framework', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

// Version Upgrade
add_action('activate_'.$lipi_framework_path, 'lipi__framework_plugin_active_version'); 
function lipi__framework_plugin_active_version() {
	update_option( 'lipi__framework_active_version', '1.1' );
	return true;
}

// Ajax Call
require LIPI_PLUGIN_DIR . '/include/hook.php';
// Demo Import
require LIPI_PLUGIN_DIR . '/import/one-click-import.php';
// Include Pages
require LIPI_PLUGIN_DIR . '/post-type/lipi-post-type.php';
// Include VC
require LIPI_PLUGIN_DIR . '/vc/lipi-vc-support.php';
// Post Type
require LIPI_PLUGIN_DIR . '/lipi-add-meta-field.php';
// widget
require LIPI_PLUGIN_DIR . '/widget/widget.php';
require LIPI_PLUGIN_DIR . '/widget/widget-social.php';
if(is_admin()) { 
	require LIPI_PLUGIN_DIR . '/admin/admin.php'; 
	require LIPI_PLUGIN_DIR . '/admin/announcement/main.php'; 
}

/*-----------------------------------------------------------------------------------*/
/*	JS Call
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'lipi__plugin_scripts' );
function lipi__plugin_scripts() {
	wp_enqueue_script('lipi-requestcall', plugins_url('/js/requestcall.js', __FILE__), array('jquery'), '1.0', true );
	wp_enqueue_script('lipi-after-pageload-requestcall', plugins_url('/js/after-load-requestcall.js', __FILE__), array('jquery'), '1.0', true );
}

/*-----------------------------------------------------------------------------------*/
/*	WOO :: SOCIAL SHARE
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__woocommerce_social_share' ) ) {
function lipi__woocommerce_social_share($url, $get = false, $align = 'center' ){
	global $lipi_theme_options;
	if( isset($lipi_theme_options['portfolio_social_share_mailto']) ){
		$mailto = esc_attr($lipi_theme_options['portfolio_social_share_mailto']);
	} else {
		$mailto = '';
	}
	
	$return = '';
    $return .= '<div class="social-box" style="text-align:'.$align.'">
	<a target="_blank" href="https://twitter.com/home?status='. esc_url($url).'"><i class="fab fa-twitter social-share-box"></i></a>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='. esc_url($url).'" title="facebook"><i class="fab fa-facebook-f social-share-box"></i></a>
    <a target="_blank" href="https://pinterest.com/pin/create/button/?url='. esc_url($url).'&media=&description="><i class="fab fa-pinterest-p social-share-box"></i></a>
    <a target="_blank" href="https://plus.google.com/share?url='. esc_url($url).'"><i class="fab fa-google-plus-g social-share-box"></i></a>
    <a target="_blank" href="mailto:?subject='.$mailto.'"><i class="far fa-envelope social-share-box"></i></a>
    </div>';
	
	if( $get == true ) {
		return $return;
	} else {
		echo ''.$return;	
	}
    
}
}
?>