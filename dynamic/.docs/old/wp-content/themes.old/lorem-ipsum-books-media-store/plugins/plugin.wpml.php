<?php
/* WPML support functions
------------------------------------------------------------------------------- */

// Check if WPML installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_wpml' ) ) {
	function lorem_ipsum_books_media_store_exists_wpml() {
		return defined('ICL_SITEPRESS_VERSION') && class_exists('sitepress');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_wpml_required_plugins' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_wpml_required_plugins');
	function lorem_ipsum_books_media_store_wpml_required_plugins($list=array()) {
		if (in_array('wpml', lorem_ipsum_books_media_store_storage_get('required_plugins'))) {
			$path = lorem_ipsum_books_media_store_get_file_dir('plugins/install/wpml.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('WPML', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'wpml',
					'source'	=> $path,
					'required' 	=> false
					);
			}
		}
		return $list;
	}
}
?>