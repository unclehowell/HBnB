<?php
/**
* Set the content width based on the theme's design and stylesheet.
*/


if ( ! isset( $content_width ) ) $content_width = 700;

/*-----------------------------------------------------------------------------------*/
/*	Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__setup' ) ) {
	function lipi__setup() {
		
        /*	Load Text Domain */
		load_theme_textdomain( 'lipi', trailingslashit( get_template_directory() ) . 'languages' );
		
        /*	Add Automatic Feed Links Support */
        add_theme_support( 'automatic-feed-links' );
		
        /* Add Post Formats Support */
        add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'video', 'audio'));
		
		/* Let WordPress manage the document title. */
		add_theme_support( 'title-tag' );
		
		/* Add Post Thumbnails Support and Related Image Sizes */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );
		
		/** This theme uses wp_nav_menu() in one location. */
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu',  'lipi' ),
			'footer'  => esc_html__( 'Footer Menu',  'lipi' ),
			'header-top-left'  => esc_html__( 'Header Top Left',  'lipi' ),
		) );
		
		/** Custom image sizes */ 
		add_image_size( 'lipi-image-700x525', 700, 525, true ); 
		if(function_exists("is_woocommerce")) { 
			add_image_size( 'lipi-image-woo-400x300', 400, 300, true );
			add_image_size( 'lipi-image-woo-600x600', 600, 600, true );
		}
		
		/*** If BBPress is active, add theme support */
		if ( class_exists( 'bbPress' ) ) { add_theme_support( 'bbpress' ); }

		
	}
}
add_action( 'after_setup_theme', 'lipi__setup' );



/*-----------------------------------------------------------------------------------*/
/*	Include Theme Options Framework
/*-----------------------------------------------------------------------------------*/
require_once( trailingslashit( get_template_directory() ) . 'framework/ReduxCore/options/lipi.php' );

/*-----------------------------------------------------------------------------------*/
/*	Add MetaBox Library :: CMB2
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/meta-field/kb-meta.php';
require trailingslashit( get_template_directory() ) . 'framework/meta-field/page-meta.php';
require trailingslashit( get_template_directory() ) . 'framework/meta-field/custom-meta.php';

/*-----------------------------------------------------------------------------------*/
/*	Re-Write Lipi
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/customizer.php';
/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/include/menu.php';
/*-----------------------------------------------------------------------------------*/
/*	SUPPORT FUNCTION
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/include/functions.php';
require trailingslashit( get_template_directory() ) . 'template/kb/content-ajaxload.php';
/*-----------------------------------------------------------------------------------*/
/*	HOOK
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/include/hook.php';
/*-----------------------------------------------------------------------------------*/
/*	TAGS
/*-----------------------------------------------------------------------------------*/ 
require trailingslashit( get_template_directory() ) . 'framework/include/template-tags.php';
/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERCE
/*-----------------------------------------------------------------------------------*/
require trailingslashit( get_template_directory() ) . 'woocommerce/woocommerce_configuration.php';


/*-----------------------------------------------------------------------------------*/
/*	CHECKER SR PLUGIN
/*-----------------------------------------------------------------------------------*/ 
$is_plugin_revslider_active = lipi__plugin_active('RevSliderFront');
if ( $is_plugin_revslider_active == true ) {
global $revSliderVersion;
if( version_compare( $revSliderVersion, '5.4.8.3', '<' ) ) {
	add_action('admin_notices', 'lipi__plugin_slider_revolution_update_notify');
}
}
function lipi__plugin_slider_revolution_update_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('bind_adminmsg'),),'strong' => array(),'span' => array(),);
printf( wp_kses( __('<div class="bind_adminmsg"><span>PLEASE UPGRADE "Slider Revolution" to new version 5.4.8.3</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "Slider Revolution" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Click on "Begin installing plugin" -OR - go to "Apperance > Install Plugins"</strong>, to install new version.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>', 'lipi' ), $allowed_html_array) );
}


/*-----------------------------------------------------------------------------------*/
/*	ACTIVATE VC
/*-----------------------------------------------------------------------------------*/
$is_plugin_js_composer_active = lipi__plugin_active('Vc_Manager');
if ( $is_plugin_js_composer_active == true ) {
	// check the latest vc version
	if( version_compare(WPB_VC_VERSION, '5.7', '<' ) ) {
		add_action('admin_notices', 'lipi__plugin_vc_update_notify');
	}
	require trailingslashit( get_template_directory() ) . 'framework/vc-include/row.php';
	require trailingslashit( get_template_directory() ) . 'framework/vc.php';
}

function lipi__plugin_vc_update_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('bind_adminmsg'),),'strong' => array(),'span' => array(),);
printf( wp_kses( __('<div class="bind_adminmsg"><span>PLEASE UPGRADE "WPBakery Visual Composer" to new version 5.7</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "WPBakery Visual Composer" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Click on "Begin installing plugin" -OR - go to "Apperance > Install Plugins"</strong>, to install new version. <strong></span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>', 'lipi' ), $allowed_html_array) );
}


/*-----------------------------------------------------------------------------------*/
/*	Ultimate_VC_Addons
/*-----------------------------------------------------------------------------------*/
$is_plugin_ultimate_addons_for_wpbakery_page_builder_active = lipi__plugin_active('Ultimate_VC_Addons');
if ( $is_plugin_ultimate_addons_for_wpbakery_page_builder_active == true ) {
	// check the latest vc version
	if( version_compare(ULTIMATE_VERSION, '3.18.0', '<' ) ) {
		add_action('admin_notices', 'lipi__plugin_ultimate_addons_for_wpbakery_update_notify');
	}
}

function lipi__plugin_ultimate_addons_for_wpbakery_update_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('bind_adminmsg'),),'strong' => array(),'span' => array(),);
printf( wp_kses( __('<div class="bind_adminmsg"><span>PLEASE UPGRADE "Ultimate Addons for WPBakery Page Builder" to new version 3.18.0</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "Ultimate Addons for WPBakery Page Builder" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Click on "Begin installing plugin" -OR - go to "Apperance > Install Plugins"</strong>, to install new version.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>', 'lipi' ), $allowed_html_array) );
}



/*-----------------------------------------------------------------------------------*/
/*	LIPI FRAMEWORK UPDATE CHECKER
/*-----------------------------------------------------------------------------------*/ 
$lipi_framework_version_check = "1.1"; 
$is_plugin_required_fortheme_active = lipi__chkfunction_plugin_active('lipi__portfolio_post_type');
if ( $is_plugin_required_fortheme_active == true ) {
	$db_plugin_framework_version = get_option( 'lipi__framework_active_version' );
	if( $db_plugin_framework_version != $lipi_framework_version_check || $db_plugin_framework_version == '' ) {  
		add_action('admin_notices', 'lipi__plugin_lipi_framework_notify');
	}
}

add_filter( 'global_terms_enabled', '__return_false' );

function lipi__plugin_lipi_framework_notify() {
$allowed_html_array = array('a' => array('href' => array(),'title' => array()),'br' => array(),'div' => array('class' => array('bind_adminmsg'),),'strong' => array(),'span' => array(),);
printf( wp_kses( __('<div class="bind_adminmsg"><span>PLEASE UPGRADE "Lipi Framework (Post Type)" to new version 1.1</span> <br><br> 1. Go to: Plugins -> Installed Plugins. <br>2. <strong>DELETE plugin</strong> "Lipi Framework (Post Type)" for the system. <strong><i>(you must DEACTIVATE plugin first and DELETE it)</i></strong> <br> 3. <strong>Click on "Begin installing plugin" -OR - go to "Apperance > Install Plugins"</strong>, to install new version.</span> <br><br><i>Note: No data will be loss in this upgrade process.</i> </div>', 'lipi' ), $allowed_html_array) );
}

add_filter('woocommerce_single_product_image_thumbnail_html', 'remove_featured_image', 10, 2);
function remove_featured_image($html, $attachment_id ) {
    global $post, $product;

    $featured_image = get_post_thumbnail_id( $post->ID );

    if ( $attachment_id == $featured_image )
        $html = '';

    return $html;
}

/**
* @snippet       Display FREE if Price Zero or Empty - WooCommerce Single Product
* @how-to        Get CustomizeWoo.com FREE
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 3.8
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
  
add_filter( 'woocommerce_get_price_html', 'bbloomer_price_free_zero_empty', 9999, 2 );
   
function bbloomer_price_free_zero_empty( $price, $product ){
    if ( '' === $product->get_price() || 0 == $product->get_price() ) {
        $price = '<span class="woocommerce-Price-amount amount">FREE</span>';
    }  
    return $price;
}

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Details' );		// Rename the description tab
	return $tabs;

}
?>
