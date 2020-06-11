<?php 

class lipi__Customize {

		public static function register( $wp_customize ) {
		
		} // eof register
		
		/**
		* This will output the custom WordPress settings to the live theme's WP head.
		*/
	    public static function header_output() {
			global $post,$lipi_theme_options;
			echo '<style type="text/css">';
			
			/********
			* CONDITION
			********/
			
			// if bbpress active
			if ( class_exists('bbPress') && is_bbPress() ) {
				if ( bbp_is_forum_archive() ) {
					lipi__bbpress_wp_default_settings();
				} else {
					lipi__wp_default_settings();
				}
			} else 
			// If Woo Active
			if(function_exists("is_woocommerce") && (is_shop() || is_checkout() || is_account_page())){ 
				if(is_shop() ){
					$page_id = get_option('woocommerce_shop_page_id');
					lipi__woo_shop_column_css_handler();		
				} elseif(is_checkout()) {
					$page_id = get_option('woocommerce_pay_page_id'); 
				} elseif(is_account_page()) {
					$page_id = get_option('woocommerce_myaccount_page_id'); 
				} elseif(is_account_page()) {
					$page_id = get_option('woocommerce_edit_address_page_id'); 
				} elseif(is_account_page()) {
					$page_id = get_option('woocommerce_view_order_page_id'); 
				}
				$woopage  = get_post( $page_id );
				if( isset($woopage->ID) && $woopage->ID != '' ) lipi__page_post_customizer( $woopage->ID );
				else {}
				
			} else if(function_exists("is_product") && is_product()){
				
				if( $lipi_theme_options['shop_header_layout'] == true ) {
					$page_id = get_option('woocommerce_shop_page_id');	
					$woopage  = get_post( $page_id );
					lipi__page_post_customizer( $woopage->ID );
				} else {
					lipi__wp_default_settings();
					lipi__woo_replace_default_settings();
				}
				
			} else if(function_exists("is_product_category") && is_product_category()) {	
					
					lipi__wp_default_settings();
					lipi__woo_replace_default_settings();
					lipi__woo_shop_column_css_handler();	
					
			// Normal WordPress	
			} else if( is_front_page() && is_home() ) {
				lipi__wp_default_settings();
			} else if( is_front_page() ) {
				lipi__page_post_customizer( get_the_ID() );
			} else if( is_home() ) {
				$blog_pgID = get_option('page_for_posts');
				lipi__page_post_customizer( $blog_pgID );
			} else {
				if( is_page() ) { 
					lipi__page_post_customizer( get_the_ID() );
				} else if( is_archive() ) {
					lipi__wp_default_settings();
				} else if( is_single() ) { 
					lipi__page_post_customizer( get_the_ID() );
				} else {  
					lipi__wp_default_settings();
				}
			}
			
			/********
			* ONE TIME :: CALL ONLY ONCE
			********/
			lipi__check_redux_plugin_install();
			
			/********
			* GLOBAL :: ALWAYS THIRD LAST
			********/
			lipi__dynamic_settings();
			
			/********
			* GLOBAL :: ALWAYS SECOND LAST
			********/
			lipi__vc_dynamic_css();
			
			/*****
			*  ALWAYS AT THE END LINE
			******/
			if( isset($lipi_theme_options['theme-add-extra-css-code']) && $lipi_theme_options['theme-add-extra-css-code'] != '' ) { echo esc_html($lipi_theme_options['theme-add-extra-css-code']); }
			echo '</style>';
		}
		
		public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
		  $return = '';
		  $mod = get_theme_mod($mod_name);
		  if ( ! empty( $mod ) ) {
			 $return = sprintf('%s { %s:%s; }',
				$selector,
				$style,
				$prefix.$mod.$postfix
			 );
			 if ( $echo ) {
				echo ''.$return;
			 }
		  }
		  return $return;
		}
		
		
	   /**
		* This outputs the javascript needed to automate the live settings preview.
		*/
	   public static function live_preview() { }
		

}
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'lipi__Customize' , 'register' ) );
// Output custom CSS to live site
add_action( 'wp_head' , array( 'lipi__Customize' , 'header_output' ) );
// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'lipi__Customize' , 'live_preview' ) );
?>