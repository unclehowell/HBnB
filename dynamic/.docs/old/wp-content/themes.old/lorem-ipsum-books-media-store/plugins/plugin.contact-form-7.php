<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_cf7_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_cf7_theme_setup', 1 );
	function lorem_ipsum_books_media_store_cf7_theme_setup() {
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins', 'lorem_ipsum_books_media_store_cf7_required_plugins' );
		}
	}
}

// Check if Instagram Widget installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_cf7' ) ) {
	function lorem_ipsum_books_media_store_exists_cf7() {
		return class_exists('WPCF7') && class_exists('WPCF7_ContactForm');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_cf7_required_plugins' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_cf7_required_plugins');
	function lorem_ipsum_books_media_store_cf7_required_plugins($list=array()) {
		if (in_array('contact-form-7', (array)lorem_ipsum_books_media_store_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Contact Form 7', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'contact-form-7',
					'required' 	=> false
				);
		return $list;
	}
}
