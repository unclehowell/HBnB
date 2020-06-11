<?php
/**
/* GDPR Framework support functions
 */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_gdpr_framework_theme_setup')) {
    add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_gdpr_framework_theme_setup', 1 );
    function lorem_ipsum_books_media_store_gdpr_framework_theme_setup() {
        if (is_admin()) {
            add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins', 'lorem_ipsum_books_media_store_gdpr_framework_required_plugins' );
        }
    }
}

// Check if Instagram Feed installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_gdpr_framework' ) ) {
    function lorem_ipsum_books_media_store_exists_gdpr_framework() {
        return defined('GDPR_FRAMEWORK_VERSION');
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_gdpr_framework_required_plugins' ) ) {
//    add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_gdpr_framework_required_plugins');
    function lorem_ipsum_books_media_store_gdpr_framework_required_plugins($list=array()) {
        if (in_array('gdpr-framework', (array)lorem_ipsum_books_media_store_storage_get('required_plugins')))
            $list[] = array(
                'name' 		=> esc_html__('GDPR Framework', 'lorem-ipsum-books-media-store'),
                'slug' 		=> 'gdpr-framework',
                'required' 	=> false
            );
        return $list;
    }
}