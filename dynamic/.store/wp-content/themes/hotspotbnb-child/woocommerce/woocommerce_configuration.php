<?php 
if(function_exists("is_woocommerce")){
	
	// theme support woo zoom
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	// end of theme support
	
	function lipi__woo_wrapper_start() {
	  echo '<section id="main">';
	}
	function lipi__woo_wrapper_end() {
	  echo '</section>';
	}
	add_action('woocommerce_before_main_content', 'lipi__woo_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'lipi__woo_wrapper_end', 10);
	
	// support compatible
	add_action( 'after_setup_theme', 'lipi__woocommerce_support' );
	function lipi__woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	
	// Disable breadcrum
	function lipi__woocommerce_remove_breadcrumb(){
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	}
	add_action('woocommerce_before_main_content', 'lipi__woocommerce_remove_breadcrumb');
	
	// custom breadcrumb
	function lipi__woocommerce_custom_breadcrumb(){
		woocommerce_breadcrumb();
	}
	add_action( 'woo_custom_breadcrumb', 'lipi__woocommerce_custom_breadcrumb' );
	
	// hide page title. 
	add_filter( 'woocommerce_show_page_title' , 'lipi__woocommerce_hide_page_title' );
	function lipi__woocommerce_hide_page_title() {
		return false;
	}
	
	// Social share
	function lipi__woocommerce_share_icon() {
		global $post;
		$url = get_permalink( $post->ID );
		if( function_exists('lipi__woocommerce_social_share') ) {
			lipi__woocommerce_social_share($url, false, 'left');
		}
	}
	add_action('woocommerce_product_meta_end', 'lipi__woocommerce_share_icon');
	
	// display an 'Out of Stock' label on archive pages
	add_action( 'woocommerce_before_shop_loop_item_title', 'lipi__woocommerce_template_loop_stock', 10 );
	function lipi__woocommerce_template_loop_stock() {
		global $product;
		if ( ! $product->managing_stock() && ! $product->is_in_stock() )
			echo '<span class="onsale out-of-stock-button">'. esc_html__('Out of Stock', 'lipi') .'</span>';
	}
	
	// Change number or products per row to 3
	add_filter('loop_shop_columns', 'lipi__per_row_records');
	if (!function_exists('lipi__per_row_records')) {
		function lipi__per_row_records() {
			$rows = '';
			$is_plugin_active = lipi__plugin_active('ReduxFramework');
			if( $is_plugin_active == false ){
				$rows = 3;	
			} else {
				global $lipi_theme_options;
				$rows = $lipi_theme_options['woo_column_product_listing'];
			}
			return $rows ; // 3,4 products per row
		}
	}
	
	/**
	 * Change number of products that are displayed per page (shop page), diplay 12 product per page
	 */
	add_filter( 'loop_shop_per_page', 'lipi__woo_product_perpage', 20 );
	function lipi__woo_product_perpage( $cols ) {
	  $cols = 12;
	  return $cols;
	}
	
	// Change the breadcrumb separator
	add_filter( 'woocommerce_breadcrumb_defaults', 'lipi__change_breadcrumb_delimiter' );
	function lipi__change_breadcrumb_delimiter( $defaults ) {
		// Change the breadcrumb delimeter from '/' to '>'
		$defaults['delimiter'] = ' <span class="sep"><i class="fa fa-angle-right"></i></span> ';
		return $defaults;
	}
	
	// related product.
	add_filter( 'woocommerce_output_related_products_args', 'lipi__related_products_args' );
	function lipi__related_products_args( $args ) {
		global $lipi_theme_options;
		$is_plugin_active = lipi__plugin_active('ReduxFramework');
		if( $is_plugin_active == false ){
			$args['posts_per_page'] = 3; 
			$args['columns'] = 3;	
		} else {
			global $lipi_theme_options;
			$args['posts_per_page'] = $lipi_theme_options['woo_no_of_related_products'];
			$args['columns'] = $lipi_theme_options['woo_no_of_related_products'];
		}
		return $args;
	}
	
	
	add_action( 'woocommerce_after_shop_loop_item', 'lipi__woo_remove_loop_button', 1 );
	function lipi__woo_remove_loop_button() {
		global $lipi_theme_options;
		if( $lipi_theme_options['woo_hide_add_to_card_shop_cat'] == true ) {
			if( is_product_category() || is_shop()) { 
				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
			}
		}
	}
	
	
}
?>