<?php
/* Instagram Widget support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_instagram_widget_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_instagram_widget_theme_setup', 1 );
	function lorem_ipsum_books_media_store_instagram_widget_theme_setup() {
		if (lorem_ipsum_books_media_store_exists_instagram_widget()) {
			add_action( 'lorem_ipsum_books_media_store_action_add_styles', 						'lorem_ipsum_books_media_store_instagram_widget_frontend_scripts' );
		}
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_importer_required_plugins',		'lorem_ipsum_books_media_store_instagram_widget_importer_required_plugins', 10, 2 );
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_instagram_widget_required_plugins' );
		}
	}
}

// Check if Instagram Widget installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_instagram_widget' ) ) {
	function lorem_ipsum_books_media_store_exists_instagram_widget() {
		return function_exists('wpiw_init');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_instagram_widget_required_plugins' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_instagram_widget_required_plugins');
	function lorem_ipsum_books_media_store_instagram_widget_required_plugins($list=array()) {
		if (in_array('wp_instagram_widget', lorem_ipsum_books_media_store_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Instagram Widget', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'wp-instagram-widget',
					'required' 	=> false
				);
		return $list;
	}
}

// Enqueue custom styles
if ( !function_exists( 'lorem_ipsum_books_media_store_instagram_widget_frontend_scripts' ) ) {
	//Handler of add_action( 'lorem_ipsum_books_media_store_action_add_styles', 'lorem_ipsum_books_media_store_instagram_widget_frontend_scripts' );
	function lorem_ipsum_books_media_store_instagram_widget_frontend_scripts() {
		if (file_exists(lorem_ipsum_books_media_store_get_file_dir('css/plugin.instagram-widget.css')))
			wp_enqueue_style( 'lorem-ipsum-books-media-store-plugin.instagram-widget-style',  lorem_ipsum_books_media_store_get_file_url('css/plugin.instagram-widget.css'), array(), null );
	}
}



// One-click import support
//------------------------------------------------------------------------

// Check Instagram Widget in the required plugins
if ( !function_exists( 'lorem_ipsum_books_media_store_instagram_widget_importer_required_plugins' ) ) {
	//Handler of add_filter( 'lorem_ipsum_books_media_store_filter_importer_required_plugins',	'lorem_ipsum_books_media_store_instagram_widget_importer_required_plugins', 10, 2 );
	function lorem_ipsum_books_media_store_instagram_widget_importer_required_plugins($not_installed='', $list='') {
		if (lorem_ipsum_books_media_store_strpos($list, 'instagram_widget')!==false && !lorem_ipsum_books_media_store_exists_instagram_widget() )
			$not_installed .= '<br>' . esc_html__('WP Instagram Widget', 'lorem-ipsum-books-media-store');
		return $not_installed;
	}
}
?>