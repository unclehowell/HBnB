<?php
/* WPBakery PageBuilder support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_vc_theme_setup')) {
    add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_vc_theme_setup', 1 );
    function lorem_ipsum_books_media_store_vc_theme_setup() {
        if (lorem_ipsum_books_media_store_exists_visual_composer()) {
            if (is_admin()) {
                add_filter( 'lorem_ipsum_books_media_store_filter_importer_options',				'lorem_ipsum_books_media_store_vc_importer_set_options' );
            }
            add_action('lorem_ipsum_books_media_store_action_add_styles',		 				'lorem_ipsum_books_media_store_vc_frontend_scripts' );
        }
        if (is_admin()) {
            add_filter( 'lorem_ipsum_books_media_store_filter_importer_required_plugins',		'lorem_ipsum_books_media_store_vc_importer_required_plugins', 10, 2 );
            add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_vc_required_plugins' );
        }
    }
}

// Check if WPBakery PageBuilder installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_visual_composer' ) ) {
    function lorem_ipsum_books_media_store_exists_visual_composer() {
        return class_exists('Vc_Manager');
    }
}

// Check if WPBakery PageBuilder in frontend editor mode
if ( !function_exists( 'lorem_ipsum_books_media_store_vc_is_frontend' ) ) {
    function lorem_ipsum_books_media_store_vc_is_frontend() {
        return (isset($_GET['vc_editable']) && $_GET['vc_editable']=='true')
        || (isset($_GET['vc_action']) && $_GET['vc_action']=='vc_inline');
    }
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_vc_required_plugins' ) ) {
    //Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_vc_required_plugins');
    function lorem_ipsum_books_media_store_vc_required_plugins($list=array()) {
        if (in_array('visual_composer', lorem_ipsum_books_media_store_storage_get('required_plugins'))) {
            $path = lorem_ipsum_books_media_store_get_file_dir('plugins/install/js_composer.zip');
            if (file_exists($path)) {
                $list[] = array(
                    'name' 		=> esc_html__('WPBakery PageBuilder', 'lorem-ipsum-books-media-store'),
                    'slug' 		=> 'js_composer',
                    'source'	=> $path,
                    'required' 	=> false
                );
            }
        }
        return $list;
    }
}

// Enqueue VC custom styles
if ( !function_exists( 'lorem_ipsum_books_media_store_vc_frontend_scripts' ) ) {
    //Handler of add_action( 'lorem_ipsum_books_media_store_action_add_styles', 'lorem_ipsum_books_media_store_vc_frontend_scripts' );
    function lorem_ipsum_books_media_store_vc_frontend_scripts() {
        if (file_exists(lorem_ipsum_books_media_store_get_file_dir('css/plugin.visual-composer.css')))
            wp_enqueue_style( 'lorem-ipsum-books-media-store-plugin.visual-composer-style',  lorem_ipsum_books_media_store_get_file_url('css/plugin.visual-composer.css'), array(), null );
    }
}



// One-click import support
//------------------------------------------------------------------------

// Check VC in the required plugins
if ( !function_exists( 'lorem_ipsum_books_media_store_vc_importer_required_plugins' ) ) {
    //Handler of add_filter( 'lorem_ipsum_books_media_store_filter_importer_required_plugins',	'lorem_ipsum_books_media_store_vc_importer_required_plugins', 10, 2 );
    function lorem_ipsum_books_media_store_vc_importer_required_plugins($not_installed='', $list='') {
        if (!lorem_ipsum_books_media_store_exists_visual_composer() )		// && lorem_ipsum_books_media_store_strpos($list, 'visual_composer')!==false
            $not_installed .= '<br>' . esc_html__('WPBakery PageBuilder', 'lorem-ipsum-books-media-store');
        return $not_installed;
    }
}

// Set options for one-click importer
if ( !function_exists( 'lorem_ipsum_books_media_store_vc_importer_set_options' ) ) {
    //Handler of add_filter( 'lorem_ipsum_books_media_store_filter_importer_options',	'lorem_ipsum_books_media_store_vc_importer_set_options' );
    function lorem_ipsum_books_media_store_vc_importer_set_options($options=array()) {
        if ( in_array('visual_composer', lorem_ipsum_books_media_store_storage_get('required_plugins')) && lorem_ipsum_books_media_store_exists_visual_composer() ) {
            // Add slugs to export options for this plugin
            $options['additional_options'][] = 'wpb_js_templates';
        }
        return $options;
    }
}
?>