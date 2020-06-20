<?php
/**
 * Theme custom styles
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if (!function_exists('lorem_ipsum_books_media_store_action_theme_styles_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_action_theme_styles_theme_setup', 1 );
	function lorem_ipsum_books_media_store_action_theme_styles_theme_setup() {
	
		// Add theme fonts in the used fonts list
		add_filter('lorem_ipsum_books_media_store_filter_used_fonts',			'lorem_ipsum_books_media_store_filter_theme_styles_used_fonts');
		// Add theme fonts (from Google fonts) in the main fonts list (if not present).
		add_filter('lorem_ipsum_books_media_store_filter_list_fonts',			'lorem_ipsum_books_media_store_filter_theme_styles_list_fonts');

		// Add theme stylesheets
		add_action('lorem_ipsum_books_media_store_action_add_styles',			'lorem_ipsum_books_media_store_action_theme_styles_add_styles');
		// Add theme inline styles
		add_filter('lorem_ipsum_books_media_store_filter_add_styles_inline',		'lorem_ipsum_books_media_store_filter_theme_styles_add_styles_inline');

		// Add theme scripts
		add_action('lorem_ipsum_books_media_store_action_add_scripts',			'lorem_ipsum_books_media_store_action_theme_styles_add_scripts');
		// Add theme scripts inline
		add_filter('lorem_ipsum_books_media_store_filter_localize_script',		'lorem_ipsum_books_media_store_filter_theme_styles_localize_script');

		// Add theme less files into list for compilation
		add_filter('lorem_ipsum_books_media_store_filter_compile_less',			'lorem_ipsum_books_media_store_filter_theme_styles_compile_less');


		/* Color schemes
		
		// Block's border and background
		bd_color		- border for the entire block
		bg_color		- background color for the entire block
		// Next settings are deprecated
		//bg_image, bg_image_position, bg_image_repeat, bg_image_attachment  - first background image for the entire block
		//bg_image2,bg_image2_position,bg_image2_repeat,bg_image2_attachment - second background image for the entire block
		
		// Additional accented colors (if need)
		accent2			- theme accented color 2
		accent2_hover	- theme accented color 2 (hover state)		
		accent3			- theme accented color 3
		accent3_hover	- theme accented color 3 (hover state)		
		
		// Headers, text and links
		text			- main content
		text_light		- post info
		text_dark		- headers
		text_link		- links
		text_hover		- hover links
		
		// Inverse blocks
		inverse_text	- text on accented background
		inverse_light	- post info on accented background
		inverse_dark	- headers on accented background
		inverse_link	- links on accented background
		inverse_hover	- hovered links on accented background
		
		// Input colors - form fields
		input_text		- inactive text
		input_light		- placeholder text
		input_dark		- focused text
		input_bd_color	- inactive border
		input_bd_hover	- focused borde
		input_bg_color	- inactive background
		input_bg_hover	- focused background
		
		// Alternative colors - highlight blocks, form fields, etc.
		alter_text		- text on alternative background
		alter_light		- post info on alternative background
		alter_dark		- headers on alternative background
		alter_link		- links on alternative background
		alter_hover		- hovered links on alternative background
		alter_bd_color	- alternative border
		alter_bd_hover	- alternative border for hovered state or active field
		alter_bg_color	- alternative background
		alter_bg_hover	- alternative background for hovered state or active field 
		// Next settings are deprecated
		//alter_bg_image, alter_bg_image_position, alter_bg_image_repeat, alter_bg_image_attachment - background image for the alternative block
		
		*/

		// Add color schemes
		lorem_ipsum_books_media_store_add_color_scheme('original', array(

			'title'					=> esc_html__('Original', 'lorem-ipsum-books-media-store'),
			
			// Whole block border and background
			'bd_color'				=> '#ffffff',
			'bg_color'				=> '#f4f7f9',
			
			// Headers, text and links colors
			'text'					=> '#616466',
			'text_light'			=> '#b1b7ba',
			'text_dark'				=> '#041721',
			'text_link'				=> '#00bfc5',
			'text_hover'			=> '#0ce682',

			// Inverse colors
			'inverse_text'			=> '#ffde3c',
			'inverse_light'			=> '#ffde3c',
			'inverse_dark'			=> '#ffde3c',
			'inverse_link'			=> '#ffde3c',
			'inverse_hover'			=> '#ffde3c',
		
			// Input fields
			'input_text'			=> '#616466',
			'input_light'			=> '#b1b7ba',
			'input_dark'			=> '#041721',
			'input_bd_color'		=> '#f4f7f9',
			'input_bd_hover'		=> '#06eaf3',
			'input_bg_color'		=> '#f4f7f9',
			'input_bg_hover'		=> '#f4f7f9',
		
			// Alternative blocks (submenu items, etc.)
			'alter_text'			=> '#ffde3c',
			'alter_light'			=> '#ffde3c',
			'alter_dark'			=> '#ffde3c',
			'alter_link'			=> '#ffde3c',
			'alter_hover'			=> '#ffde3c',
			'alter_bd_color'		=> '#ffde3c',
			'alter_bd_hover'		=> '#ffde3c',
			'alter_bg_color'		=> '#ffde3c',
			'alter_bg_hover'		=> '#ffde3c',

            // Additional colors
            'accent2'               => '#0ce682',
            'accent2_hover'         => '#06eaf3',
            'accent3'               => '#ffde3c',
            'accent3_hover'         => 'transparent'
			)
		);

        lorem_ipsum_books_media_store_add_color_scheme('blue', array(

                'title'					=> esc_html__('Blue', 'lorem-ipsum-books-media-store'),

                // Whole block border and background
                'bd_color'				=> '#ffffff',
                'bg_color'				=> '#f4f7f9',

                // Headers, text and links colors
                'text'					=> '#6f7375',
                'text_light'			=> '#b1b7ba',
                'text_dark'				=> '#041721',
                'text_link'				=> '#f9a825',
                'text_hover'			=> '#00bfa5',

                // Inverse colors
                'inverse_text'			=> '#ffbe1a',
                'inverse_light'			=> '#ffbe1a',
                'inverse_dark'			=> '#ffbe1a',
                'inverse_link'			=> '#ffbe1a',
                'inverse_hover'			=> '#ffbe1a',

                // Input fields
                'input_text'			=> '#6f7375',
                'input_light'			=> '#b1b7ba',
                'input_dark'			=> '#041721',
                'input_bd_color'		=> '#f4f7f9',
                'input_bd_hover'		=> '#26c6da',
                'input_bg_color'		=> '#f4f7f9',
                'input_bg_hover'		=> '#f4f7f9',

                // Alternative blocks (submenu items, etc.)
                'alter_text'			=> '#ffbe1a',
                'alter_light'			=> '#ffbe1a',
                'alter_dark'			=> '#ffbe1a',
                'alter_link'			=> '#ffbe1a',
                'alter_hover'			=> '#ffbe1a',
                'alter_bd_color'		=> '#ffbe1a',
                'alter_bd_hover'		=> '#ffbe1a',
                'alter_bg_color'		=> '#ffbe1a',
                'alter_bg_hover'		=> '#ffbe1a',

                // Additional colors
                'accent2'               => '#00bfa5',
                'accent2_hover'         => '#26c6da',
                'accent3'               => '#ffbe1a',
                'accent3_hover'         => 'transparent'
            )
        );

        lorem_ipsum_books_media_store_add_color_scheme('orange', array(

                'title'					=> esc_html__('Orange', 'lorem-ipsum-books-media-store'),

                // Whole block border and background
                'bd_color'				=> '#ffffff',
                'bg_color'				=> '#f4f7f9',

                // Headers, text and links colors
                'text'					=> '#6f7375',
                'text_light'			=> '#b1b7ba',
                'text_dark'				=> '#041721',
                'text_link'				=> '#df5151',
                'text_hover'			=> '#f98b60',

                // Inverse colors
                'inverse_text'			=> '#ffc057',
                'inverse_light'			=> '#ffc057',
                'inverse_dark'			=> '#ffc057',
                'inverse_link'			=> '#ffc057',
                'inverse_hover'			=> '#ffc057',

                // Input fields
                'input_text'			=> '#6f7375',
                'input_light'			=> '#b1b7ba',
                'input_dark'			=> '#041721',
                'input_bd_color'		=> '#f4f7f9',
                'input_bd_hover'		=> '#ea5959',
                'input_bg_color'		=> '#f4f7f9',
                'input_bg_hover'		=> '#f4f7f9',

                // Alternative blocks (submenu items, etc.)
                'alter_text'			=> '#ffc057',
                'alter_light'			=> '#ffc057',
                'alter_dark'			=> '#ffc057',
                'alter_link'			=> '#ffc057',
                'alter_hover'			=> '#ffc057',
                'alter_bd_color'		=> '#ffc057',
                'alter_bd_hover'		=> '#ffc057',
                'alter_bg_color'		=> '#ffc057',
                'alter_bg_hover'		=> '#ffc057',

                // Additional colors
                'accent2'               => '#f98b60',
                'accent2_hover'         => '#ea5959',
                'accent3'               => '#ffc057',
                'accent3_hover'         => 'transparent'
            )
        );

        lorem_ipsum_books_media_store_add_color_scheme('green', array(

                'title'					=> esc_html__('Green', 'lorem-ipsum-books-media-store'),

                // Whole block border and background
                'bd_color'				=> '#ffffff',
                'bg_color'				=> '#f4f7f9',

                // Headers, text and links colors
                'text'					=> '#6f7375',
                'text_light'			=> '#b1b7ba',
                'text_dark'				=> '#041721',
                'text_link'				=> '#ff9845',
                'text_hover'			=> '#76d27f',

                // Inverse colors
                'inverse_text'			=> '#f6d532',
                'inverse_light'			=> '#f6d532',
                'inverse_dark'			=> '#f6d532',
                'inverse_link'			=> '#f6d532',
                'inverse_hover'			=> '#f6d532',

                // Input fields
                'input_text'			=> '#6f7375',
                'input_light'			=> '#b1b7ba',
                'input_dark'			=> '#041721',
                'input_bd_color'		=> '#f4f7f9',
                'input_bd_hover'		=> '#67d7d9',
                'input_bg_color'		=> '#f4f7f9',
                'input_bg_hover'		=> '#f4f7f9',

                // Alternative blocks (submenu items, etc.)
                'alter_text'			=> '#f6d532',
                'alter_light'			=> '#f6d532',
                'alter_dark'			=> '#f6d532',
                'alter_link'			=> '#f6d532',
                'alter_hover'			=> '#f6d532',
                'alter_bd_color'		=> '#f6d532',
                'alter_bd_hover'		=> '#f6d532',
                'alter_bg_color'		=> '#f6d532',
                'alter_bg_hover'		=> '#f6d532',

                // Additional colors
                'accent2'               => '#76d27f',
                'accent2_hover'         => '#67d7d9',
                'accent3'               => '#f6d532',
                'accent3_hover'         => 'transparent'
            )
        );

        lorem_ipsum_books_media_store_add_color_scheme('blue_alter', array(

                'title'					=> esc_html__('Blue Alter', 'lorem-ipsum-books-media-store'),

                // Whole block border and background
                'bd_color'				=> '#ffffff',
                'bg_color'				=> '#f4f7f9',

                // Headers, text and links colors
                'text'					=> '#6f7375',
                'text_light'			=> '#b1b7ba',
                'text_dark'				=> '#041721',
                'text_link'				=> '#f9a825',
                'text_hover'			=> '#4ad5c0',

                // Inverse colors
                'inverse_text'			=> '#ffd15f',
                'inverse_light'			=> '#ffd15f',
                'inverse_dark'			=> '#ffd15f',
                'inverse_link'			=> '#ffd15f',
                'inverse_hover'			=> '#ffd15f',

                // Input fields
                'input_text'			=> '#6f7375',
                'input_light'			=> '#b1b7ba',
                'input_dark'			=> '#041721',
                'input_bd_color'		=> '#f4f7f9',
                'input_bd_hover'		=> '#80dcff',
                'input_bg_color'		=> '#f4f7f9',
                'input_bg_hover'		=> '#f4f7f9',

                // Alternative blocks (submenu items, etc.)
                'alter_text'			=> '#ffd15f',
                'alter_light'			=> '#ffd15f',
                'alter_dark'			=> '#ffd15f',
                'alter_link'			=> '#ffd15f',
                'alter_hover'			=> '#ffd15f',
                'alter_bd_color'		=> '#ffd15f',
                'alter_bd_hover'		=> '#ffd15f',
                'alter_bg_color'		=> '#ffd15f',
                'alter_bg_hover'		=> '#ffd15f',

                // Additional colors
                'accent2'               => '#4ad5c0',
                'accent2_hover'         => '#80dcff',
                'accent3'               => '#ffd15f',
                'accent3_hover'         => 'transparent'
            )
        );

		/* Font slugs:
		h1 ... h6	- headers
		p			- plain text
		link		- links
		info		- info blocks (Posted 15 May, 2015 by John Doe)
		menu		- main menu
		submenu		- dropdown menus
		logo		- logo text
		button		- button's caption
		input		- input fields
		*/

		// Add Custom fonts
		lorem_ipsum_books_media_store_add_custom_font('h1', array(
			'title'			=> esc_html__('Heading 1', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Lato',
			'font-size' 	=> '3.75em',
			'font-weight'	=> '900',
			'font-style'	=> '',
			'line-height'	=> '1.0833em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '0.6667em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('h2', array(
			'title'			=> esc_html__('Heading 2', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Lato',
			'font-size' 	=> '3em',
			'font-weight'	=> '900',
			'font-style'	=> '',
			'line-height'	=> '1.0417em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '0.375em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('h3', array(
			'title'			=> esc_html__('Heading 3', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Lato',
			'font-size' 	=> '1.5em',
			'font-weight'	=> '900',
			'font-style'	=> '',
			'line-height'	=> '1.1667em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '0.8333em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('h4', array(
			'title'			=> esc_html__('Heading 4', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Lato',
			'font-size' 	=> '1.125em',
			'font-weight'	=> '900',
			'font-style'	=> '',
			'line-height'	=> '1.3333em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '1.0555em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('h5', array(
			'title'			=> esc_html__('Heading 5', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Lato',
			'font-size' 	=> '1em',
			'font-weight'	=> '900',
			'font-style'	=> '',
			'line-height'	=> '1.25em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '1.3125em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('h6', array(
			'title'			=> esc_html__('Heading 6', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '0.75em',
			'font-weight'	=> '400',
			'font-style'	=> '',
			'line-height'	=> '1.5em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '2.1667em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('p', array(
			'title'			=> esc_html__('Text', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Lato',
			'font-size' 	=> '16px',
			'font-weight'	=> '300',
			'font-style'	=> '',
			'line-height'	=> '1.5em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '1.5625em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('link', array(
			'title'			=> esc_html__('Links', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> '',
			'font-size' 	=> '',
			'font-weight'	=> '',
			'font-style'	=> ''
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('info', array(
			'title'			=> esc_html__('Post info', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '0.6875em',
			'font-weight'	=> '400',
			'font-style'	=> '',
			'line-height'	=> '1.1818em',
			'margin-top'	=> '1em',
			'margin-bottom'	=> '1.9091em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('menu', array(
			'title'			=> esc_html__('Main menu items', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '0.75em',
			'font-weight'	=> '400',
			'font-style'	=> '',
			'line-height'	=> '1.4167em',
			'margin-top'	=> '1.5em',
			'margin-bottom'	=> '1.6667em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('submenu', array(
			'title'			=> esc_html__('Dropdown menu items', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '0.75em',
			'font-weight'	=> '400',
			'font-style'	=> '',
			'line-height'	=> '1.4167em',
			'margin-top'	=> '0.4167em',
			'margin-bottom'	=> '0.4167em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('logo', array(
			'title'			=> esc_html__('Logo', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '0.6875em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '1.1818em',
			'margin-top'	=> '0em',
			'margin-bottom'	=> '0em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('button', array(
			'title'			=> esc_html__('Buttons', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Montserrat',
			'font-size' 	=> '0.875em',
			'font-weight'	=> '700',
			'font-style'	=> '',
			'line-height'	=> '3.2857em'
			)
		);
		lorem_ipsum_books_media_store_add_custom_font('input', array(
			'title'			=> esc_html__('Input fields', 'lorem-ipsum-books-media-store'),
			'description'	=> '',
			'font-family'	=> 'Lato',
			'font-size' 	=> '1em',
			'font-weight'	=> '300',
			'font-style'	=> '',
			'line-height'	=> '1.5em'
			)
		);

	}
}





//------------------------------------------------------------------------------
// Theme fonts
//------------------------------------------------------------------------------

// Add theme fonts in the used fonts list
if (!function_exists('lorem_ipsum_books_media_store_filter_theme_styles_used_fonts')) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_used_fonts', 'lorem_ipsum_books_media_store_filter_theme_styles_used_fonts');
	function lorem_ipsum_books_media_store_filter_theme_styles_used_fonts($theme_fonts) {
		//$theme_fonts['Lato'] = 1;
        $theme_fonts['Montserrat'] = 1;
		return $theme_fonts;
	}
}

// Add theme fonts (from Google fonts) in the main fonts list (if not present).
// To use custom font-face you not need add it into list in this function
// How to install custom @font-face fonts into the theme?
// All @font-face fonts are located in "theme_name/css/font-face/" folder in the separate subfolders for the each font. Subfolder name is a font-family name!
// Place full set of the font files (for each font style and weight) and css-file named stylesheet.css in the each subfolder.
// Create your @font-face kit by using Fontsquirrel @font-face Generator (http://www.fontsquirrel.com/fontface/generator)
// and then extract the font kit (with folder in the kit) into the "theme_name/css/font-face" folder to install
if (!function_exists('lorem_ipsum_books_media_store_filter_theme_styles_list_fonts')) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_list_fonts', 'lorem_ipsum_books_media_store_filter_theme_styles_list_fonts');
	function lorem_ipsum_books_media_store_filter_theme_styles_list_fonts($list) {
		// Example:
		// if (!isset($list['Advent Pro'])) {
				$list['Lato'] = array(
					'family' => 'sans-serif',																						// (required) font family
					'link'   => 'Lato:300,300italic,400,400italic,700,700italic,900,900italic',	// (optional) if you use Google font repository
					'css'    => lorem_ipsum_books_media_store_get_file_url('/css/font-face/Advent-Pro/stylesheet.css')									// (optional) if you use custom font-face
					);
		// }
		if (!isset($list['Lato']))	$list['Lato'] = array('family'=>'sans-serif');
		return $list;
	}
}



//------------------------------------------------------------------------------
// Theme stylesheets
//------------------------------------------------------------------------------

// Add theme.less into list files for compilation
if (!function_exists('lorem_ipsum_books_media_store_filter_theme_styles_compile_less')) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_compile_less', 'lorem_ipsum_books_media_store_filter_theme_styles_compile_less');
	function lorem_ipsum_books_media_store_filter_theme_styles_compile_less($files) {
		if (file_exists(lorem_ipsum_books_media_store_get_file_dir('css/theme.less'))) {
		 	$files[] = lorem_ipsum_books_media_store_get_file_dir('css/theme.less');
		}
		return $files;	
	}
}

// Add theme stylesheets
if (!function_exists('lorem_ipsum_books_media_store_action_theme_styles_add_styles')) {
	//Handler of add_action('lorem_ipsum_books_media_store_action_add_styles', 'lorem_ipsum_books_media_store_action_theme_styles_add_styles');
	function lorem_ipsum_books_media_store_action_theme_styles_add_styles() {
		// Add stylesheet files only if LESS supported
		if ( lorem_ipsum_books_media_store_get_theme_setting('less_compiler') != 'no' ) {
			wp_enqueue_style( 'lorem-ipsum-books-media-store-theme-style', lorem_ipsum_books_media_store_get_file_url('css/theme.css'), array(), null );
			wp_add_inline_style( 'lorem-ipsum-books-media-store-theme-style', lorem_ipsum_books_media_store_get_inline_css() );
		}
	}
}

// Add theme inline styles
if (!function_exists('lorem_ipsum_books_media_store_filter_theme_styles_add_styles_inline')) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_add_styles_inline', 'lorem_ipsum_books_media_store_filter_theme_styles_add_styles_inline');
	function lorem_ipsum_books_media_store_filter_theme_styles_add_styles_inline($custom_style) {
		// Todo: add theme specific styles in the $custom_style to override
		//       rules from style.css and shortcodes.css
		// Example:
		//		$scheme = lorem_ipsum_books_media_store_get_custom_option('body_scheme');
		//		if (empty($scheme)) $scheme = 'original';
		//		$clr = lorem_ipsum_books_media_store_get_scheme_color('text_link');
		//		if (!empty($clr)) {
		// 			$custom_style .= '
		//				a,
		//				.bg_tint_light a,
		//				.top_panel .content .search_wrap.search_style_default .search_form_wrap .search_submit,
		//				.top_panel .content .search_wrap.search_style_default .search_icon,
		//				.search_results .post_more,
		//				.search_results .search_results_close {
		//					color:'.esc_attr($clr).';
		//				}
		//			';
		//		}

		// Submenu width
		$menu_width = lorem_ipsum_books_media_store_get_theme_option('menu_width');
		if (!empty($menu_width)) {
			$custom_style .= "
				/* Submenu width */
				.menu_side_nav > li ul,
				.menu_main_nav > li ul {
					width: ".intval($menu_width)."px;
				}
				.menu_side_nav > li > ul ul,
				.menu_main_nav > li > ul ul {
					left:".intval($menu_width+4)."px;
				}
				.menu_side_nav > li > ul ul.submenu_left,
				.menu_main_nav > li > ul ul.submenu_left {
					left:-".intval($menu_width+1)."px;
				}
			";
		}
	
		// Logo height
		$logo_height = lorem_ipsum_books_media_store_get_custom_option('logo_height');
		if (!empty($logo_height)) {
			$custom_style .= "
				/* Logo header height */
				.sidebar_outer_logo .logo_main,
				.top_panel_wrap .logo_main,
				.top_panel_wrap .logo_fixed {
					height:".intval($logo_height)."px;
				}
			";
		}
	
		// Logo top offset
		$logo_offset = lorem_ipsum_books_media_store_get_custom_option('logo_offset');
		if (!empty($logo_offset)) {
			$custom_style .= "
				/* Logo header top offset */
				.top_panel_wrap .logo {
					margin-top:".intval($logo_offset)."px;
				}
			";
		}

		// Logo footer height
		$logo_height = lorem_ipsum_books_media_store_get_theme_option('logo_footer_height');
		if (!empty($logo_height)) {
			$custom_style .= "
				/* Logo footer height */
				.contacts_wrap .logo img {
					height:".intval($logo_height)."px;
				}
			";
		}

		// Custom css from theme options
		$custom_style .= lorem_ipsum_books_media_store_get_custom_option('custom_css');

		return $custom_style;	
	}
}


//------------------------------------------------------------------------------
// Theme scripts
//------------------------------------------------------------------------------

// Add theme scripts
if (!function_exists('lorem_ipsum_books_media_store_action_theme_styles_add_scripts')) {
	//Handler of add_action('lorem_ipsum_books_media_store_action_add_scripts', 'lorem_ipsum_books_media_store_action_theme_styles_add_scripts');
	function lorem_ipsum_books_media_store_action_theme_styles_add_scripts() {
		if (lorem_ipsum_books_media_store_get_theme_option('show_theme_customizer') == 'yes' && file_exists(lorem_ipsum_books_media_store_get_file_dir('js/theme.customizer.js')))
			wp_enqueue_script( 'lorem-ipsum-books-media-store-theme_styles-customizer-script', lorem_ipsum_books_media_store_get_file_url('js/theme.customizer.js'), array(), null );
	}
}

// Add theme scripts inline
if (!function_exists('lorem_ipsum_books_media_store_filter_theme_styles_localize_script')) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_localize_script',		'lorem_ipsum_books_media_store_filter_theme_styles_localize_script');
	function lorem_ipsum_books_media_store_filter_theme_styles_localize_script($vars) {
		if (empty($vars['theme_font']))
			$vars['theme_font'] = lorem_ipsum_books_media_store_get_custom_font_settings('p', 'font-family');
		$vars['theme_color'] = lorem_ipsum_books_media_store_get_scheme_color('text_dark');
		$vars['theme_bg_color'] = lorem_ipsum_books_media_store_get_scheme_color('bg_color');
		return $vars;
	}
}
?>