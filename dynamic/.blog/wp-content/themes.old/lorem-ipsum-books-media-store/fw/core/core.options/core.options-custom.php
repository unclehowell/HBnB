<?php
/**
 * Lorem Ipsum Books & Media Store Framework: Theme options custom fields
 *
 * @package	lorem_ipsum_books_media_store
 * @since	lorem_ipsum_books_media_store 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_options_custom_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_options_custom_theme_setup' );
	function lorem_ipsum_books_media_store_options_custom_theme_setup() {

		if ( is_admin() ) {
			add_action("admin_enqueue_scripts",	'lorem_ipsum_books_media_store_options_custom_load_scripts');
		}
		
	}
}

// Load required styles and scripts for custom options fields
if ( !function_exists( 'lorem_ipsum_books_media_store_options_custom_load_scripts' ) ) {
	//Handler of add_action("admin_enqueue_scripts", 'lorem_ipsum_books_media_store_options_custom_load_scripts');
	function lorem_ipsum_books_media_store_options_custom_load_scripts() {
		wp_enqueue_script( 'lorem-ipsum-books-media-store-options-custom-script',	lorem_ipsum_books_media_store_get_file_url('core/core.options/js/core.options-custom.js'), array(), null, true );
	}
}


// Show theme specific fields in Post (and Page) options
if ( !function_exists( 'lorem_ipsum_books_media_store_show_custom_field' ) ) {
	function lorem_ipsum_books_media_store_show_custom_field($id, $field, $value) {
		$output = '';
		switch ($field['type']) {
			case 'reviews':
				$output .= '<div class="reviews_block">' . trim(lorem_ipsum_books_media_store_reviews_get_markup($field, $value, true)) . '</div>';
				break;
	
			case 'mediamanager':
				wp_enqueue_media( );
				$output .= '<a id="'.esc_attr($id).'" class="button mediamanager lorem_ipsum_books_media_store_media_selector"
					data-param="' . esc_attr($id) . '"
					data-choose="'.esc_attr(isset($field['multiple']) && $field['multiple'] ? esc_html__( 'Choose Images', 'lorem-ipsum-books-media-store') : esc_html__( 'Choose Image', 'lorem-ipsum-books-media-store')).'"
					data-update="'.esc_attr(isset($field['multiple']) && $field['multiple'] ? esc_html__( 'Add to Gallery', 'lorem-ipsum-books-media-store') : esc_html__( 'Choose Image', 'lorem-ipsum-books-media-store')).'"
					data-multiple="'.esc_attr(isset($field['multiple']) && $field['multiple'] ? 'true' : 'false').'"
					data-linked-field="'.esc_attr($field['media_field_id']).'"
					>' . (isset($field['multiple']) && $field['multiple'] ? esc_html__( 'Choose Images', 'lorem-ipsum-books-media-store') : esc_html__( 'Choose Image', 'lorem-ipsum-books-media-store')) . '</a>';
				break;
		}
		return apply_filters('lorem_ipsum_books_media_store_filter_show_custom_field', $output, $id, $field, $value);
	}
}
?>