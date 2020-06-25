<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_essgrids_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_essgrids_theme_setup', 1 );
	function lorem_ipsum_books_media_store_essgrids_theme_setup() {
		// Register shortcode in the shortcodes list

		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_importer_required_plugins',	'lorem_ipsum_books_media_store_essgrids_importer_required_plugins', 10, 2 );
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',				'lorem_ipsum_books_media_store_essgrids_required_plugins' );
		}
	}
}


// Check if Ess. Grid installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_essgrids' ) ) {
	function lorem_ipsum_books_media_store_exists_essgrids() {
		return defined('EG_PLUGIN_PATH');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_essgrids_required_plugins' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_essgrids_required_plugins');
	function lorem_ipsum_books_media_store_essgrids_required_plugins($list=array()) {
		if (in_array('essgrids', lorem_ipsum_books_media_store_storage_get('required_plugins'))) {
			$path = lorem_ipsum_books_media_store_get_file_dir('plugins/install/essential-grid.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('Essential Grid', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'essential-grid',
					'source'	=> $path,
					'required' 	=> false
					);
			}
		}
		return $list;
	}
}