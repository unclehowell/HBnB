<?php
/* Mega Main Menu support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_megamenu_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_megamenu_theme_setup', 1 );
	function lorem_ipsum_books_media_store_megamenu_theme_setup() {
		if (lorem_ipsum_books_media_store_exists_megamenu()) {
			if (is_admin()) {
				add_filter( 'lorem_ipsum_books_media_store_filter_importer_options',				'lorem_ipsum_books_media_store_megamenu_importer_set_options' );
			}
		}
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_importer_required_plugins',		'lorem_ipsum_books_media_store_megamenu_importer_required_plugins', 10, 2 );
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_megamenu_required_plugins' );
		}
	}
}

// Check if MegaMenu installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_megamenu' ) ) {
	function lorem_ipsum_books_media_store_exists_megamenu() {
		return class_exists('mega_main_init');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_megamenu_required_plugins' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_megamenu_required_plugins');
	function lorem_ipsum_books_media_store_megamenu_required_plugins($list=array()) {
		if (in_array('mega_main_menu', lorem_ipsum_books_media_store_storage_get('required_plugins'))) {
			$path = lorem_ipsum_books_media_store_get_file_dir('plugins/install/mega_main_menu.zip');
			if (file_exists($path)) {
				$list[] = array(
					'name' 		=> esc_html__('Mega Main Menu', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'mega_main_menu',
					'source'	=> $path,
					'required' 	=> false
				);
			}
		}
		return $list;
	}
}



// One-click import support
//------------------------------------------------------------------------

// Check Mega Menu in the required plugins
if ( !function_exists( 'lorem_ipsum_books_media_store_megamenu_importer_required_plugins' ) ) {
	//Handler of add_filter( 'lorem_ipsum_books_media_store_filter_importer_required_plugins',	'lorem_ipsum_books_media_store_megamenu_importer_required_plugins', 10, 2 );
	function lorem_ipsum_books_media_store_megamenu_importer_required_plugins($not_installed='', $list='') {
		if (lorem_ipsum_books_media_store_strpos($list, 'mega_main_menu')!==false && !lorem_ipsum_books_media_store_exists_megamenu())
			$not_installed .= '<br>' . esc_html__('Mega Main Menu', 'lorem-ipsum-books-media-store');
		return $not_installed;
	}
}

// Set options for one-click importer
if ( !function_exists( 'lorem_ipsum_books_media_store_megamenu_importer_set_options' ) ) {
	//Handler of add_filter( 'lorem_ipsum_books_media_store_filter_importer_options',	'lorem_ipsum_books_media_store_megamenu_importer_set_options' );
	function lorem_ipsum_books_media_store_megamenu_importer_set_options($options=array()) {
		if ( in_array('mega_main_menu', lorem_ipsum_books_media_store_storage_get('required_plugins')) && lorem_ipsum_books_media_store_exists_megamenu() ) {
			// Add slugs to export options for this plugin
			$options['additional_options'][] = 'mega_main_menu_options';

		}
		return $options;
	}
}
?>