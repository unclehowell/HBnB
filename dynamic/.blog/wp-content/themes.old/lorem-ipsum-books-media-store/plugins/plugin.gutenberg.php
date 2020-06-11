<?php
/* Gutenberg support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_gutenberg_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_gutenberg_theme_setup', 1 );
	function lorem_ipsum_books_media_store_gutenberg_theme_setup() {
		add_action( 'enqueue_block_editor_assets', 'lorem_ipsum_books_media_store_gutenberg_editor_scripts' );
		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins', 'lorem_ipsum_books_media_store_gutenberg_required_plugins' );
		}
	}
}

// Check if Instagram Widget installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_gutenberg' ) ) {
	function lorem_ipsum_books_media_store_exists_gutenberg() {
		return function_exists( 'the_gutenberg_project' ) && function_exists( 'register_block_type' );
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_gutenberg_required_plugins' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_gutenberg_required_plugins');
	function lorem_ipsum_books_media_store_gutenberg_required_plugins($list=array()) {
		if (in_array('gutenberg', (array)lorem_ipsum_books_media_store_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Gutenberg', 'lorem-ipsum-books-media-store'),
					'slug' 		=> 'gutenberg',
					'required' 	=> false
				);
		return $list;
	}
}

// Save CSS with custom colors and fonts to the gutenberg-editor-style.css
if ( ! function_exists( 'lorem_ipsum_books_media_store_gutenberg_save_css' ) ) {
//	add_action( 'wp_ajax_lorem_ipsum_books_media_store_options_save', 'lorem_ipsum_books_media_store_gutenberg_save_css', 30 );
	add_action( 'lorem_ipsum_books_media_store_action_compile_less', 'lorem_ipsum_books_media_store_gutenberg_save_css', 99 );
	function lorem_ipsum_books_media_store_gutenberg_save_css() {

		$msg = '/* ' . esc_html__( "ATTENTION! This file was generated automatically! Don't change it!!!", 'lorem-ipsum-books-media-store' )
			. "\n----------------------------------------------------------------------- */\n";

		// Get main styles
		$css = lorem_ipsum_books_media_store_fgc( lorem_ipsum_books_media_store_get_file_dir( 'style.css' ) );

		// Append theme-vars styles
		$css .= lorem_ipsum_books_media_store_fgc( lorem_ipsum_books_media_store_get_file_dir( 'css/theme.css' ) );

		// Add context class to each selector
		if ( function_exists( 'trx_utils_css_add_context' ) ) {
			$css = str_replace('@charset "utf-8";', '', $css );
			$css = preg_replace('!/\*.*?\*/!s', '', $css);
			$css = preg_replace('/\n\s*\n/', "\n", $css);
			$css = trx_utils_css_add_context($css, '.edit-post-visual-editor');
		}

		// Save styles to the file
		lorem_ipsum_books_media_store_fpc( lorem_ipsum_books_media_store_get_file_dir( 'css/gutenberg-preview.css' ), $msg . $css );
	}
}

if (!function_exists('lorem_ipsum_books_media_store_gutenberg_editor_scripts')) {
	function lorem_ipsum_books_media_store_gutenberg_editor_scripts() {
		// Editor styles
		wp_enqueue_style( 'lorem-ipsum-books-media-store-gutenberg-preview', lorem_ipsum_books_media_store_get_file_url( 'css/gutenberg-preview.css' ), array(), null );

		//Editor scripts
		wp_enqueue_script( 'lorem-ipsum-books-media-store-gutenberg-preview', lorem_ipsum_books_media_store_get_file_url( 'js/gutenberg-preview.js' ), array( 'jquery' ), null, true );

		$body_scheme = lorem_ipsum_books_media_store_get_custom_option('body_scheme');
		if (empty($body_scheme)  || lorem_ipsum_books_media_store_is_inherit_option($body_scheme)) $body_scheme = 'original';

		wp_localize_script('lorem-ipsum-books-media-store-gutenberg-preview','LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE', array(
			'color_scheme' => trim($body_scheme)
		));
	}
}