<?php

/*************************************
***      
One Click Import 
https://github.com/proteusthemes/one-click-demo-import     
***
**************************************/

	// START IMPORT
	function ocdi_import_files() {  
	  return array(
	  
		array(
            'import_file_name'             => 'Product Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'one/demo-content-1.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'one/widgets-1.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'one/redux-1.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_1.jpg',
			'preview_url' => 'http://demo.wpsmartapps.com/themes/lipi/one/',
        ),
		
		// Import TWO
		array(
            'import_file_name'             => 'Business Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'two/demo-content-2.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'two/widgets-2.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'two/redux-2.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_2.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/two/',
        ),
		
		// Import THREE
		array(
            'import_file_name'             => 'App Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'three/demo-content-3.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'three/widgets-3.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'three/redux-3.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_3.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/three/',
        ),
		
		// Import FOUR
		array(
            'import_file_name'             => 'University Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'four/demo-content-4.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'four/widgets-4.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'four/redux-4.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_4.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/four/',
        ),
		
		// Import FIVE
		array(
            'import_file_name'             => 'Hospital Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'five/demo-content-5.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'five/widgets-5.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'five/redux-5.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_5.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/five/',
        ),
		
		// Import SIX
		array(
            'import_file_name'             => 'Online Service Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'six/demo-content-6.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'six/widgets-6.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'six/redux-6.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_6.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/six/',
        ),
		
		// Import SEVEN
		array(
            'import_file_name'             => 'Online Product Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'seven/demo-content-7.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'seven/widgets-7.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'seven/redux-7.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_7.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/seven/',
        ),

		// Import EIGHT
		array(
            'import_file_name'             => 'Portfolio',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'eight/demo-content-8.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'eight/widgets-8.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'eight/redux-8.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_8.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/eight/',
        ),

		// Import NINE
		array(
            'import_file_name'             => 'consulting',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'nine/demo-content-9.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'nine/widgets-9.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'nine/redux-9.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_9.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/nine/',
            'import_notice' => __( 'After you import this demo, you will have to setup the slider separately from; "Slider Revolution -> Import Slider". <br><br>Please download theme slider using link: <a href="http://demo.wpsmartapps.com/themes/lipi/RevSliDer/" target="_blank">CLICK HERE</a> ', 'lipi' ),
        ),


		// Import TEN
		array(
            'import_file_name'             => 'Web Hosting Support Desk',
            'categories'                   => array( 'lipi'),
            'local_import_file'            => plugin_dir_path( __FILE__ ) . 'ten/demo-content-10.xml',
            'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'ten/widgets-10.wie',
            'local_import_redux'           => array(
                array(
                    'file_path'   => plugin_dir_path( __FILE__ ) . 'ten/redux-10.json',
                    'option_name' => '_lipi_theme_options_',
                ),
            ),
            'import_preview_image_url' =>  plugin_dir_url( __FILE__ ) . 'img/preview_import_10.jpg',
			'preview_url'   => 'http://demo.wpsmartapps.com/themes/lipi/ten/',
        ),

		
		
	  );
	}
	add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
	
	
	// AUTOMATICALLY ASSIGN 'FRONT PAGE' & MENU LOCATION AFTER THE IMPORT IS DONE.
	function ocdi_after_import_setup($selected_import) {
		
			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
			$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
			$header_top_left_menu = get_term_by( 'name', 'Header Top Left', 'nav_menu' );
			set_theme_mod( 'nav_menu_locations', array(
					'primary' => $main_menu->term_id,
					'footer' => $footer_menu->term_id,
					'header-top-left' => $header_top_left_menu->term_id,
				)
			);
			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Landing' );
			$blog_page_id  = get_page_by_title( 'Blog' );
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );
	
	}
	add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
	
	
	// CHANGE THE LOCATION
	function ocdi_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = 'admin.php';
		$default_settings['page_title']  = esc_html__( 'Lipi Demo Import' , 'lipi' );
		$default_settings['menu_title']  = esc_html__( 'Lipi Demo Import' , 'lipi' );
		$default_settings['capability']  = 'import';
		$default_settings['menu_slug']   = 'lipi-demo-import';
		return $default_settings;
	}
	add_filter( 'pt-ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );
	
	
	// CHANGE PLUGIN INTRO
	function ocdi_plugin_intro_text( $default_text ) {
		$default_text .= '<div class="ocdi__intro-text" style="padding: 10px;background: #e2e263;margin-bottom: 10px;">This upgrade process requires PHP version of at least 5.3.x, but we recommend version 5.6.x or better yet 7.x. Please contact your hosting company and ask them to update the PHP version for your site, if hosting using low PHP version.</div>';
		return $default_text;
	}
	add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );
	add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
?>