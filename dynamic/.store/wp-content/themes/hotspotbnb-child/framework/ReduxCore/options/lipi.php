<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data will stored.
    $opt_name = "_lipi_theme_options_";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Lipi Theme Options', 'lipi' ),
        'page_title'           => __( 'Lipi Theme Options', 'lipi' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'lipi_theme_options', 
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
		
		'forced_dev_mode_off'  => true,
		
		'use_cdn'              => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'lipi' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'lipi' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'lipi' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/TheWpSmartApps',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/wpsmartapps',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );




    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
		
    } else {

    }


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'lipi' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'lipi' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'lipi' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'lipi' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'lipi' );
    Redux::setHelpSidebar( $opt_name, $content );



	 
	 
/*-----------------------------------------------------------------------------------*/
/*	Start Theme Options
/*-----------------------------------------------------------------------------------*/
	 
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Logo', 'lipi' ),
        'id'     => 'general-theme-settings',
        'icon'   => 'el el-plus-sign',
        'fields' => array(
			
			array (
					'subtitle' => esc_html__('Choose a favicon image to be displayed', 'lipi'),
					'id' => 'general_bind_theme_favicon',
					'type' => 'media',
					'title' => esc_html__('Favicon Image', 'lipi'),
					'url' => true,
			),
				
			array(
                'id'       => 'general_bind_theme_logo_normal',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo Image - Dark Logo', 'lipi' ),
                'subtitle'     => esc_html__( 'Choose a default logo image to display', 'lipi' ),
            ),	
				
			array(
                'id'       => 'general_bind_theme_logo_white',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo Image - White Logo', 'lipi' ),
                'subtitle'     => esc_html__( 'Choose a default logo image to display', 'lipi' ),
            ),
			
			 array(
                'id'       => 'logo-normal-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Logo Adjustment', 'lipi' ),
				'subtitle' => esc_html__( 'Readjust logo if needed', 'lipi' ),
                'indent'   => true, 
            ),
		
            array(
                'id'             => 'logo-normal-dimensions-width',
                'type'           => 'dimensions',
                'units'          => array( 'px' ),    
                'units_extended' => 'true', 
                'title'          => esc_html__( 'Dimensions (Width)', 'lipi' ),
				'desc'           => esc_html__( 'Default: 120px', 'lipi' ),
                'height'         => false,
                'default'        => array(
                    'width'  => 120,
                )
            ),
			
		   array(
                'id'             => 'logo-normal-dimensions-width-responsive',
                'type'           => 'dimensions',
                'units'          => array( 'px' ),    
                'units_extended' => 'true', 
                'title'          => esc_html__( 'Responsive Dimensions (Width)', 'lipi' ),
				'desc'           => esc_html__( 'Default: 120px', 'lipi' ),
                'height'         => false,
                'default'        => array(
                    'width'  => 120,
                )
            ),
			
			array(
                'id'             => 'logo-padding-top-dimensions',
                'type'           => 'dimensions',
                'units'          => array( 'px' ),    
                'units_extended' => 'true',  
                'title'          => esc_html__( 'Padding Top', 'lipi' ),
				'desc'           => esc_html__( 'Default: 25px', 'lipi' ),
                'width'         => false,
                'default'        => array(
                    'height' => 25,
                )
            ),
			
			
			array(
					'id'       => 'logo-display-margin',
					'type'     => 'text',
					'title'    => esc_html__( 'Logo Margin', 'lipi' ),
					'desc'     => 'Example: 0px 0px 0px 0px (top, right, bottom, left)',
					'subtitle' => 'Distance between logo',
					'default'  => '0px 45px 0px 0px',
			),
			
			
			array(
                'id'       => 'logo-onscroll-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Sticky Menu', 'lipi' ),
				'subtitle' => esc_html__( 'Readjust sticky menu if needed', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'theme-sticky-menu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Disable Sticky Menu', 'lipi' ),
				'default'  => false,
				'subtitle' => 'Click <code>On</code> to disable (Global Effect)',
			),
			
			array(
                'id'             => 'logo-on-page-scroll-dimensions-width',
                'type'           => 'dimensions',
                'units'          => array( 'px' ),    
                'units_extended' => 'true', 
                'title'          => esc_html__( 'Dimensions (Height)', 'lipi' ),
				'desc'           => esc_html__( 'Default: 69px', 'lipi' ),
                'width'         => false,
                'default'        => array(
                    'height' => 69,
                )
            ),
			
			array(
                'id'             => 'logo-on-page-scroll-margin-top-dimensions',
                'type'           => 'dimensions',
                'units'          => array( 'px' ),    
                'units_extended' => 'true',  
                'title'          => esc_html__( 'Margin Top', 'lipi' ),
				'desc'           => esc_html__( 'Default: -12px', 'lipi' ),
                'width'         => false,
                'default'        => array(
                    'height' => -12,
                )
            ),
			
			
			
        )
    ) );
	
	
/*-----------------------------------------------------------------------------------*/
/*	STYLING OPTIONS
/*-----------------------------------------------------------------------------------*/

	 Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Custom Style', 'lipi' ),
		'id'               => 'theme-custom-style',
		'customizer_width' => '400px',
		'icon'             => 'el-icon-website'
	) );
	
	
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Website Style', 'lipi' ),
		'id'     => 'theme-global-website-looks',
		'subsection'  => true,
		'desc'   => esc_html__( 'global effect', 'lipi' ),
		'fields' => array(
		
		
			array(
				'id'       => 'website_full_width_layout_style',
				'type'     => 'section',
				'title'    => esc_html__( 'Full Width Layout Style', 'lipi' ),
				'indent'   => true, 
			 ),
		
			array(
				'id'       => 'theme-top-container-global-full-width',
				'type'     => 'switch',
				'title'    => esc_html__( 'Top Header', 'lipi' ),
				'subtitle' => esc_html__('Make top header area full width', 'lipi'),
				'desc' => esc_html__('On==Enable', 'lipi'),
				'default'  => false,
			),
			
			array(
				'id'       => 'header-nav-container-global-full-width',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header', 'lipi' ),
				'subtitle' => esc_html__('(manu+logo area) Make header area full width', 'lipi'),
				'desc' => esc_html__('On==Enable', 'lipi'),
				'default'  => false,
			),
			
			array(
				'id'       => 'site-body-container-global-full-width',
				'type'     => 'switch',
				'title'    => esc_html__( 'Body', 'lipi' ),
				'subtitle' => esc_html__('Make body area full width', 'lipi'),
				'desc' => esc_html__('On==Enable', 'lipi'),
				'default'  => false,
			),
			
			array(
				'id'       => 'footer-area-container-global-full-width',
				'type'     => 'switch',
				'title'    => esc_html__( 'Footer', 'lipi' ),
				'subtitle' => esc_html__('Make footer area full width', 'lipi'),
				'desc' => esc_html__('On==Enable', 'lipi'),
				'default'  => false,
			),
		
			 array(
				'id'       => 'website_box_layout_background',
				'type'     => 'section',
				'title'    => esc_html__( 'Box Layout Style', 'lipi' ),
				'indent'   => true, 
			 ),
			 
			 
			 array(
				'id'       => 'website_box_layout',
				'type'     => 'switch',
				'title'    => esc_html__( 'Box Style', 'lipi' ),
				'subtitle' => 'Website will appear in the box style <br><br><strong style="color:red;">If active, the settings will overwrite \'Full Width Layout Style\' settings</strong>', 
				'default'  => false,
			 ),
			 
			 array (
					'subtitle' => esc_html__('Choose a background image for your box layout', 'lipi'),
					'id' => 'website_box_layout_background_image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'lipi'),
					'url' => true,
			 ),
			 
			 array(
					'id'       => 'website_box_layout_background_image_size',
					'type'     => 'select',
					'title'    => esc_html__( 'Background Image Size', 'lipi' ),
					'options'  => array(
						'auto' => 'Auto',
						'cover' => 'Cover',
						'inherit' => 'Inherit',
					),
					'default'  => 'auto',
				),
			
			
			array(
				'id'       => 'website_box_layout_background_image_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Background Image Position', 'lipi' ),
				'options'  => array(
					'center top' => 'Center Top',
					'center center' => 'Center Center',
					'center bottom' => 'Center Bottom',
				),
				'default'  => 'center center',
			),
			
			array(
				'id'       => 'website_box_layout_background_image_repeat',
				'type'     => 'select',
				'title'    => esc_html__( 'Background Image Repeat', 'lipi' ),
				'options'  => array(
					'no-repeat' => 'No Repeat',
					'repeat' => 'Repeat',
					'inherit' => 'Inherit',
				),
				'default'  => 'repeat',
			),
		
		)
	) );
	
	
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'General', 'lipi' ),
		'id'     => 'theme-glogal-style',
		'subsection'  => true,
		'desc'   => esc_html__( 'global effect', 'lipi' ),
		'fields' => array(
		
					array(
						'id'       => 'website_colour',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Website Color', 'lipi' ),
						'subtitle'  => esc_html__('Applied to site globally', 'lipi'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular'   => '#fc5546',
						)
					),
		
					array(
						'id'       => 'standard_a_tag_link_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Standard "a" TAG :: Color', 'lipi' ),
						'subtitle'  => esc_html__('Standard color', 'lipi'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(   
							'regular'   => '#0e2b5c',
							'hover'   => '#fc5546',
						)
					),
					
					array(
						'id'       => 'standard_a_tag_link_color_inside_post',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Standard "a" TAG :: Color (inside post)', 'lipi' ),
						'subtitle'  => esc_html__('Standard color for the post content', 'lipi'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(   
							'regular'   => '#1e73be',
							'hover'   => '#fc5546',
						)
					),
		
					array(
						'id'       => 'text_link_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Custom Text :: Link Color', 'lipi' ),
						'subtitle'  => esc_html__('Custom text link with icon attached', 'lipi'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#0e2b5c',
							'hover'   => '#fc5546',
						)
					),
					
					array(
						'id'       => 'botton_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Botton Color', 'lipi' ),
						'subtitle'  => __('Botton with special CSS effects', 'lipi'),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#0e2b5c',
							'hover'   => '#fc5546',
						)
					),
					
					array(
						'id'       => 'botton_text_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Botton Text Color', 'lipi' ),
						'active'    => false, 
						'hover'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#ffffff',
						)
					),
					
					array(
						'id'       => 'blog-meta-icon-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Meta Icon :: Color', 'lipi' ),
						'subtitle'  => __('Appears Below the main blog title', 'lipi'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#fc5546',
						)
					),
					
					
					array(
						'id'       => 'widget-sidebar-top-border-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Widget Sidebar Top Border Color', 'lipi' ),
						'subtitle'  => __('Appears above the widget title (applied only on the blog section)', 'lipi'),
						'hover'    => false, 
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#002e5b',
						)
					),
					
					
					array(
						'id'       => 'blog-tag-hover-text-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Tag Cloud :: Hover Text Color', 'lipi' ),
						'active'    => false, 
						'visited'   => false, 
						'hover'   => false, 
						'default'  => array(
							'regular'   => '#ffffff',
						)
					),
					
					
					// WOO ICON COLOR
					array(
						'id'       => 'woocommerce-global-color-section',
						'type'     => 'section',
						'title'    => esc_html__( 'WooCommerce', 'lipi' ),
						'indent'   => true, 
					),
					
					array(
						'id'       => 'woo-menu-icon-color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Woo Menu Icon :: Color', 'lipi' ),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#0e2b5c',
							'hover'   => '#fc5546',
						)
					),
					
		)
	) );
	
	// TOP HEADER
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sticky Menu', 'lipi' ),
        'id'               => 'theme_sticky_menu_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
					array(
						'id'            => 'theme_sticky_menu_height',
						'type'          => 'slider',
						'title'         => esc_html__( 'Sticky Menu Height', 'lipi' ),
						'default'       => 70,
						'min'           => 1,
						'step'          => 1,
						'max'           => 100,
						'display_value' => 'label',
						'display_value' => 'text',
						'desc'          => 'Default: 70',
					),
					
					array(
						'id'        => 'theme_sticky_menu_background',
						'type'      => 'color_rgba',
						'title'    => esc_html__( 'Sticky Menu Background Color', 'lipi' ),
						'default'   => array(
							'color'     => '#fefefe',
							'alpha'     => 0.9
						),
						'options'       => array(
							'choose_text'               => 'Choose',
							'cancel_text'               => 'Cancel',
							'palette'                   => null,  // show default
							'input_text'                => 'Select Color'
						),                        
					),
					
					array(
						'id'       => 'theme_sticky_menu_text_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Font Color', 'lipi' ),
						'active'    => false, 
						'visited'   => false, 
						'default'  => array(
							'regular' => '#0e2b5c',
							'hover'   => '#fc5546',
						),
					),
		
		)
	) );
	
	
	// TOP HEADER
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header - Top Bar', 'lipi' ),
        'id'               => 'theme_top_header_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(	
		
					 array(
						'id'       => 'theme_top_header_status',
						'type'     => 'switch',
						'title'    => esc_html__( 'Globally Activate Top Header', 'lipi' ),
						'subtitle' => 'Header that will appear on the top of the page. <br><br> Settings can be overwrite while crating page using Pages->Add New',
						'default'  => false,
					),
					
					array(
						'id'       => 'theme_top_header_redesign_start',
						'type'     => 'section',
						'title'    => esc_html__( 'Design Top Header', 'lipi' ),
						'indent'   => true, 
					),
					
					array(
						'id'       => 'theme_top_header_background_color',
						'type'     => 'color',
						'title'    => esc_html__( 'Background Color', 'lipi' ),
						'default'  => '#001040',
						'transparent' => false,
					),
					
					array(
						'id'       => 'theme_top_header_text_link_color',
						'type'     => 'link_color',
						'title'    => esc_html__( 'Link Color', 'lipi' ),
						'active'    => false, 
						'visited'   => false, 
						'hover'   => false, 
						'default'  => array(
							'regular' => '#cbccce',
						)
					),
					
					array(
						'id'        => 'theme_top_header_border_bottom_color',
						'type'      => 'color_rgba',
						'title'    => esc_html__( 'Border Bottom Color', 'lipi' ),
						'default'   => array(
							'color'     => '#001040',
							'alpha'     => 1
						),
						'options'       => array(
							'choose_text'               => 'Choose',
							'cancel_text'               => 'Cancel',
							'palette'                   => null,  
							'input_text'                => 'Select Color'
						),                        
					),
					
					array(
						'id'            => 'theme_top_header_font_size',
						'type'          => 'slider',
						'title'         => esc_html__( 'Font Size', 'lipi' ),
						'default'       => 12,
						'min'           => 10,
						'step'          => 1,
						'max'           => 16,
						'display_value' => 'label',
						'display_value' => 'text',
					),
		
			)
    ) );
	
	
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header - Menu Controls', 'lipi' ),
		'id'     => 'theme-menu-style',
		'subsection'  => true,
		'fields' => array(
				
				
				array(
					'id'       => 'theme-typography-nav',
					'type'     => 'typography',
					'title'    => esc_html__( 'Navigation Font', 'lipi' ),
					'subtitle' => esc_html__('Specify the navigation font properties.', 'lipi' ),
					'google'   => true,
					'text-align' => false,
					'font-weight' => false,
					'font-style' => false,
					'letter-spacing' => true,
					'subsets' => false,
					'color' => false,
					'font-size' => false,
					'line-height' => false,
					'letter-spacing' => false,
					'units'  => '',
					'default'  => array(
						'font-family' => 'Montserrat',
						'google'      => true,
					),
				),
					
				array(
					'id'       => 'menu-first-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Menu First Level', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'first-level-menu-arrow',
					'type'     => 'switch',
					'title'    => esc_html__( 'Navigation Arrow', 'lipi' ),
					'subtitle' => esc_html__('Down arrow icon will appear if found sub menu', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => true,
				),
				
				array(
					'id'       => 'first-level-menu-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'lipi' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '600',
					'subtitle' => 'Font weight totally depens on "Navigation Font" you choose above',
				),
				
				array(
					'id'            => 'first-level-menu-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'lipi' ),
					'default'       => 15,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'first-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'lipi' ),
					'desc'     => 'reset letter specing as need, example: -0.4px, 1px, 2px, etc...',
					'default'  => '0.1px',
				),
				
				array(
					'id'       => 'first-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'lipi' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'capitalize'
				),
				
				array(
					'id'       => 'first-level-menu-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'lipi' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#0e2b5c',
						'hover'   => '#fc5546',
					),
				),
				
				array(
					'id'       => 'first-level-menu-transparent-bg-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color for the Transparent Image Background', 'lipi' ),
					'desc'     => esc_html__( 'For transparent image background', 'lipi'),
					'active'    => false, 
					'hover'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#ffffff',
					),
				),
				
				array(
					'id'            => 'first-level-menu-margin-left',
					'type'          => 'slider',
					'title'         => esc_html__( 'Text Margin Left', 'lipi' ),
					'default'       => 25,
					'min'           => 10,
					'step'          => 1,
					'max'           => 70,
					'display_value' => 'label',
					'display_value' => 'text',
					'subtitle'      => 'distance between text (ONLY, applied for header menu style 1, 2 & 6)',
					'desc'          => 'Default: 25',
				),
				
				array(
					'id'            => 'first-level-menu-margin-right',
					'type'          => 'slider',
					'title'         => esc_html__( 'Text Margin Right', 'lipi' ),
					'default'       => 25,
					'min'           => 10,
					'step'          => 1,
					'max'           => 70,
					'display_value' => 'label',
					'display_value' => 'text',
					'subtitle'      => 'distance between text (ONLY, applied for header menu style 3, 4 & 5)',
					'desc'          => 'Default: 25',
				),
				
				
				array(
					'id'            => 'first-level-menu-line-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Menu Text Line Height', 'lipi' ),
					'default'       => 100,
					'min'           => 10,
					'step'          => 1,
					'max'           => 140,
					'display_value' => 'label',
					'display_value' => 'text',
					'subtitle'      => 'ONLY, applied for header menu style 1, 2, 4, 5 and 7',
					'desc'          => 'Default: 100',
				),
				
				
				array(
					'id'            => 'first-level-menu-hamburger-height',
					'type'          => 'slider',
					'title'         => esc_html__( 'Hamburger Menu Height', 'lipi' ),
					'default'       => 36,
					'min'           => 1,
					'step'          => 1,
					'max'           => 100,
					'display_value' => 'label',
					'display_value' => 'text',
					'subtitle'      => 'ONLY, applied for header menu style 7',
					'desc'          => 'Default: 36',
				),
				
				// second level
				array(
					'id'       => 'menu-inner-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Menu Inner Level', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'menu-inner-level-background-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Background Color', 'lipi' ),
					'default'  => '#ffffff',
					'transparent' => false,
				),
				
				array(
					'id'       => 'menu-inner-level-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'lipi' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '500',
				),
				
				array(
					'id'            => 'menu-inner-level-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'lipi' ),
					'default'       => 13,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'menu-inner-level-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'lipi' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#0e2b5c',
						'hover'   => '#fc5546',
					),
				),
				
				array(
					'id'       => 'menu-inner-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'lipi' ),
					'desc'     => 'reset letter specing as need, example: -0.4px, 1px, 2px, etc...',
					'default'  => '-0.1px',
				),
				
				array(
					'id'       => 'menu-inner-level-menu-letter-line-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Line Height', 'lipi' ),
					'desc'     => 'Default: 21px',
					'default'  => '21px',
				),
				
				
				array(
					'id'       => 'menu-inner-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'lipi' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'capitalize'
				),
				
				
				// MOBILE
				array(
					'id'       => 'mobile-bgackground-holder',
					'type'     => 'section',
					'title'    => esc_html__( 'Mobile/Ipad - Menu Holder', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'mobile-hamburger-menu-icon-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Hamburger Menu Icon Color', 'lipi' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#0e2b5c',
						'hover'   => '#fc5546',
					),
				), 
				
				array(
					'id'       => 'mobile-bgackground-holder-background-color',
					'type'     => 'color',
					'title'    => esc_html__( 'Background Color', 'lipi' ),
					'default'  => '#F9F9F9',
					'transparent' => false,
				),
				
				array(
						'id'        => 'mobile-bgackground-holder-bottom-color',
						'type'      => 'color_rgba',
						'title'    => esc_html__( 'li Tag (<li>) Border Bottom Color', 'lipi' ),
						'default'   => array(
							'color'     => '#efefef',
							'alpha'     => 1
						),
						'options'       => array(
							'choose_text'               => 'Choose',
							'cancel_text'               => 'Cancel',
							'palette'                   => null,  
							'input_text'                => 'Select Color'
						),                        
					),
				
				
				array(
					'id'       => 'mobile-menu-first-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Mobile/Ipad - Menu First Level', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'            => 'mobile-first-level-menu-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'lipi' ),
					'default'       => 15,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'display_value' => 'text',
				),
			
				array(
					'id'       => 'mobile-first-level-menu-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'lipi' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '600',
				),
				
				array(
					'id'       => 'mobile-first-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'lipi' ),
					'desc'     => 'reset letter specing as need, example: -0.4px, 1px, 2px, etc...',
					'default'  => '0.1px',
				),
				
				array(
					'id'       => 'mobile-first-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'lipi' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'capitalize'
				),
				
				array(
					'id'       => 'mobile-first-level-menu-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'lipi' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#0e2b5c',
						'hover'   => '#fc5546',
					),
				), 
				
				array(
					'id'       => 'mobile-menu-inner-level',
					'type'     => 'section',
					'title'    => esc_html__( 'Mobile/Ipad - Menu Inner Level', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'            => 'mobile-menu-inner-level-font-size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'lipi' ),
					'default'       => 13,
					'min'           => 1,
					'step'          => 1,
					'max'           => 50,
					'display_value' => 'label',
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'mobile-menu-inner-level-weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Font Weight', 'lipi' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '500',
				),
				
				array(
					'id'       => 'mobile-menu-inner-level-menu-letter-spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'lipi' ),
					'desc'     => 'reset letter specing as need, example: -0.4px, 1px, 2px, etc...',
					'default'  => '-0.1px',
				),
				
				array(
					'id'       => 'mobile-menu-inner-level-menu-text-transform',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Transform', 'lipi' ),
					'options'  => array(
						'none' => 'none',
						'capitalize' => 'Capitalize',
						'uppercase' => 'Uppercase',
						'lowercase' => 'Lowercase',
					),
					'default'  => 'capitalize'
				),
				
				array(
					'id'       => 'mobile-menu-inner-level-menu-letter-line-height',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Line Height', 'lipi' ),
					'desc'     => 'Default: 28px',
					'default'  => '28px',
				),
				
				array(
					'id'       => 'mobile-menu-inner-level-text-color',
					'type'     => 'link_color',
					'title'    => esc_html__( 'Font Color', 'lipi' ),
					'active'    => false, 
					'visited'   => false, 
					'default'  => array(
						'regular' => '#0e2b5c',
						'hover'   => '#fc5546',
					),
				),
				
				// EOF MOBILE
	
		)
	) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header - Menu Style', 'lipi' ),
        'id'               => 'theme_navigation_header_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
					array(
						'id'    => 'theme_nav_header_menu_style_info_1',
						'type'  => 'info',
						'style' => 'info',
						'notice' => false,
						'title' => esc_html__( 'Infomration', 'lipi' ),
						'desc'  => __( 'Settings set for the "Header Navigation Style" are always global, BUT it can be overwrite while creating page (Pages-> Add New).', 'lipi' )
					),	
				
					array(
						'id'       => 'header-level-wrap-style',
						'type'     => 'section',
						'title'    => esc_html__( 'Header Style', 'lipi' ),
						'indent'   => true, 
					),
					
					array(
						'id'       => 'header-level-wrap-background-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Header Background Color', 'lipi' ),
						'default'  => '#ffffff',
						'transparent' => false,
						'subtitle' => 'header area background color',
						'desc'     => 'The settings may overwrite using "Page > Add New"',
					),
		
					array(
						'id'       => 'theme_nav_header_menu_style',
						'type'     => 'image_select',
						'title'    => esc_html__( 'Header Navigation Style', 'lipi' ),
						'subtitle' => esc_html__( 'Choose a navigation Style', 'lipi' ),
						'desc'     => esc_html__( 'GLOBAL EFFECT', 'lipi' ),
						'options'  => array(
							
							'1' => array(
								'alt' => 'Menu Default',
								'img' => trailingslashit(get_template_directory_uri()) .'framework/ReduxCore/options/nav-default.png'
							),
							
							'2' => array(
								'alt' => 'Logo Left Menu Left Same Line',
								'img' => trailingslashit(get_template_directory_uri())  . 'framework/ReduxCore/options/logo-left-menu-left-same-line.png'
							),
							
							'3' => array(
								'alt' => 'Logo Left Menu Left',
								'img' => trailingslashit(get_template_directory_uri())  . 'framework/ReduxCore/options/logo-left-menu-left.png'
							),
							
							'4' => array(
								'alt' => 'RTL - Logo Right Menu Left',
								'img' => trailingslashit(get_template_directory_uri())  . 'framework/ReduxCore/options/rtl-logo-right-menu-left.png'
							),
							
							'5' => array(
								'alt' => 'RTL - Logo Right Menu Right Same Line',
								'img' => trailingslashit(get_template_directory_uri())  . 'framework/ReduxCore/options/rtl-logo-right-menu-right-same-line.png'
							),
							
							'6' => array(
								'alt' => 'RTL - Logo Right Menu Right',
								'img' => trailingslashit(get_template_directory_uri())  . 'framework/ReduxCore/options/rtl-logo-right-menu-right.png'
							),
							
							'7' => array(
								'alt' => 'Hamburger Menu',
								'img' => trailingslashit(get_template_directory_uri())  . 'framework/ReduxCore/options/hamburger-menu.png'
							),
							
							'8' => array(
								'alt' => 'Center Logo',
								'img' => trailingslashit(get_template_directory_uri())  . 'framework/ReduxCore/options/center-logo.png'
							),
							
						),
						'default'  => '1'
					),
					
					array(
						'id'       => 'header-level-wrap-style-no-3',
						'type'     => 'section',
						'title'    => esc_html__( 'Header Style 3 Settings', 'lipi' ),
						'indent'   => true, 
					),
					
					array(
						'id'        => 'theme_nav_header_menu_style_3',
						'type'      => 'color_rgba',
						'title'    => esc_html__( 'Top Border Color', 'lipi' ),
						'subtitle' => esc_html__( 'appears above the menu bar', 'lipi' ),
						'desc'     => esc_html__( 'ONLY, applied for header style 3', 'lipi' ),
						'default'   => array(
							'color'     => '#F5F5F5',
							'alpha'     => 1
						),
						'options'       => array(
							'choose_text'               => 'Choose',
							'cancel_text'               => 'Cancel',
							'palette'                   => null,  // show default
							'input_text'                => 'Select Color'
						),                        
					),
					
					array(
						'id'        => 'theme_nav_header_menu_style_3_nav_bgcolor',
						'type'      => 'color_rgba',
						'title'    => esc_html__( 'Navigation Section Background Color', 'lipi' ),
						'default'   => array(
							'color'     => '#153e4d',
							'alpha'     => 1
						),
						'options'       => array(
							'choose_text'               => 'Choose',
							'cancel_text'               => 'Cancel',
							'palette'                   => null,  // show default
							'input_text'                => 'Select Color'
						),                        
					),
					
					
					array(
						'id'       => 'theme_nav_header_menu_style_3_nav_greadent_bgcolor',
						'type'     => 'color',
						'title'    => esc_html__( 'Navigation Background Linear Gradient Color', 'lipi' ),
						'default'  => '',
						'transparent' => false,
					),
					
					array(
						'id'            => 'theme_nav_header_menu_style_3_margin_top',
						'type'          => 'slider',
						'title'         => esc_html__( 'Icon With Text :: Margin Top', 'lipi' ),
						'default'       => 20,
						'min'           => 1,
						'step'          => 1,
						'max'           => 100,
						'display_value' => 'label',
						'display_value' => 'text',
						'subtitle' => esc_html__( 'icon with text margin top wrap', 'lipi' ),
					),
					
					array(
						'id'    => 'theme_nav_header_menu_style_3_info',
						'type'  => 'info',
						'style' => 'info',
						'notice' => false,
						'title' => esc_html__( 'Infomration', 'lipi' ),
						'desc'  => __( ' Please go to "Appearance > Widgets" and drag "Icon with text" widget and drop in a section "Header Nav - Icon With Text" for the header icon text field in the menu section. ', 'lipi' )
					),
					
					
		)
    ) );
	
	
	// HEADER BAR
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header - Bar', 'lipi' ),
        'id'               => 'theme_mid_header_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
		'desc'             => 'Appears below navigation menu',
        'fields'           => array(	
		
							array(
								'id'        => 'theme_header_mid_bar_background_color',
								'type'      => 'color_rgba',
								'title'    => esc_html__( 'Background Color', 'lipi' ),
								'default'   => array(
									'color'     => '#2F6075',
									'alpha'     => 0.11
								),
								'options'       => array(
									'choose_text'               => 'Choose',
									'cancel_text'               => 'Cancel',
									'palette'                   => null,  // show default
									'input_text'                => 'Select Color'
								),                        
							),
							
							array(
								'id'       => 'theme_header_mid_bar_greadent_background_color',
								'type'     => 'color',
								'title'    => esc_html__( 'Background Linear Gradient Color', 'lipi' ),
								'default'  => '',
								'transparent' => false,
								'subtitle' => 'header area background color',
								'desc'     => 'Header bar - background color must not be empty',
							),
							
							array(
								'id'       => 'theme_header_mid_bar_text_color',
								'type'     => 'color',
								'title'    => esc_html__( 'Text Color', 'lipi' ),
								'default'  => '',
								'transparent' => false,
							),
							
							array(
								'id'       => 'theme_header_mid_bar_breadcrumbs_regular_color',
								'type'     => 'color',
								'title'    => esc_html__( 'Breadcrumbs Regular Color', 'lipi' ),
								'default'  => '',
								'transparent' => false,
							),
							
			)
    ) );
	
	
	/*Site Widget Area*/
	Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Theme - Widget', 'lipi' ),
	'id'     => 'theme-global-sidebar-widget-style',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
	
			array(
				'id'       => 'theme_global_widget_area_tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Theme Widget Title Tag', 'lipi' ),
				'options'  => array(
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				),
				'default'  => 'h6',
			),
	
	
	)
	) );
	
	
	
	/*Footer Area*/
	Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Footer - Section', 'lipi' ),
	'id'     => 'theme-footer-section-style',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
	
	
			array(
                'id'       => 'theme_footer_redesign_start',
                'type'     => 'section',
                'title'    => esc_html__( 'Design Footer Widget Area', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'theme_footer_widget_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'lipi' ),
                'default'  => '#0e1336',
				'transparent' => false,
            ),
			
			array (
					'subtitle' => esc_html__('Choose a background image for your footer', 'lipi'),
					'id' => 'theme_footer_widget_bg_image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'lipi'),
					'url' => true,
			),
			
			array(
				'id'       => 'theme_footer_widget_bg_image_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Background Image Position', 'lipi' ),
				'options'  => array(
					'center top' => 'Center Top',
					'center center' => 'Center Center',
					'center bottom' => 'Center Bottom',
				),
				'default'  => 'center center',
			),
			
			array(
				'id'       => 'theme_footer_widget_title_tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'lipi' ),
				'options'  => array(
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
				),
				'default'  => 'h6',
			),
			
			array(
                'id'       => 'theme_footer_widget_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Title Color', 'lipi' ),
                'default'  => '#ffffff',
				'transparent' => false,
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Widget Text Color', 'lipi' ),
                'default'  => '#85838e',
				'transparent' => false,
            ),
			
			array(
                'id'       => 'theme_footer_widget_text_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'lipi' ),
                'active'    => false, 
                'visited'   => false, 
                'hover'   => false, 
                'default'  => array(
                    'regular' => '#9e9ab3',
                )
            ),
			
			array(
                'id'       => 'theme_footer_social_redesign_start',
                'type'     => 'section',
                'title'    => esc_html__( 'Design Footer Social/Copyright Area', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'theme_footer_social_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Color', 'lipi' ),
                'default'  => '#080d2d',
				'transparent' => false,
            ),
			
			array(
                'id'       => 'theme_footer_social_text_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Text Color', 'lipi' ),
                'default'  => '#85838e',
				'transparent' => false,
            ),
			
			array(
                'id'       => 'theme_footer_social_link_color',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Link Color', 'lipi' ),
                'active'    => false, 
                'visited'   => false, 
                'hover'   => false, 
                'default'  => array(
                    'regular' => '#9e9ab3',
                )
            ),
	
		)
	) );

	
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Go Up Arrow Styling', 'lipi' ),
		'id'     => 'theme-go-up-style',
		'subsection'  => true,
		'fields' => array(
		
				array(
					'id'            => 'go_up_arrow_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Font Size', 'lipi' ),
					'default'       => 24,
					'min'           => 1,
					'step'          => 1,
					'max'           => 60,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 24px', 'lipi' ),
					'display_value' => 'text',
				),
				
				array(
					'id'       => 'go_up_arrow_icon_style',
					'type'     => 'text',
					'title'    => esc_html__( 'Icon Name', 'lipi' ),
					'desc'     => __( 'Enter <a href=\'http://fortawesome.github.io/Font-Awesome/icons/\' target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\'https://www.elegantthemes.com/blog/resources/elegant-icon-font\' target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\'http://demo.wpsmartapps.com/themes/manual/et-line-font/\' target=\"_blank\">et line font</a> name', 'lipi' ),
					'default'  => 'far fa-arrow-alt-circle-up',
					'subtitle' => esc_html__( 'Default: far fa-arrow-alt-circle-up', 'lipi' ),
				),
				
				array(
					'id'       => 'go_up_icon_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Go Up Icon Color', 'lipi' ),
					'default'  => array(
						'color' => '#5a70f5',
						'alpha' => '1'
					),
					'mode'     => 'background',
				),
				
		
		)
		) );
		
		
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Search Box Style', 'lipi' ),
		'id'     => 'theme-search-box-style',
		'subsection'  => true,
		'fields' => array(
		
				array(
					'id'       => 'theme_search_box_border_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Search Box Border Color', 'lipi' ),
					'default'  => '',
					'transparent' => false,
				 ),
				 
				 array(
					'id'       => 'theme_search_box_icon_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Search Box Icon Color', 'lipi' ),
					'default'  => '#A8A8A8',
					'transparent' => false,
				 ),
		
				array(
					'id'            => 'theme_search_box_radius',
					'type'          => 'slider',
					'title'         => esc_html__( 'Search Box Radius', 'lipi' ),
					'default'       => 4,
					'min'           => 1,
					'step'          => 1,
					'max'           => 45,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 4px', 'lipi' ),
					'display_value' => 'text',
				),
				
				array(
					'id'            => 'theme_search_font_size',
					'type'          => 'slider',
					'title'         => esc_html__( 'Search Box Font Size', 'lipi' ),
					'default'       => 14,
					'min'           => 1,
					'step'          => 1,
					'max'           => 26,
					'display_value' => 'label',
					'subtitle' => esc_html__( 'Default: 14px', 'lipi' ),
					'display_value' => 'text',
				),
				
				
				array(
					'id'       => 'theme_search_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Font Weight', 'lipi' ),
					'options'  => array(
						'100' => '100',
						'200' => '200',
						'300' => '300',
						'400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
					),
					'default'  => '500',
					'subtitle' => 'Default: 500',
				),
				
				array(
					'id'       => 'theme_search_box_search_bottom',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Submit Buttom', 'lipi' ),
					'desc' => esc_html__('On==Disable', 'lipi'),
					'default'  => false,
				),
		
		)
		) );
		
		
		
		// Custom BBpress Header  
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom Bbpress Header', 'lipi' ),
		'id'     => 'theme-custom-bbpress-header',
		'subsection'  => true,
		'fields' => array(
		
				array(
					'id'       => 'avtivate-custom-bbpress-header',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Custom BBpress Header', 'lipi' ),
					'subtitle' => esc_html__('Create custom bbpress header', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				// Navigation start
				array(
					'id'       => 'custom_header_navigation_bbpress_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Navigation Configuration', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'bbpress_custom_header_style_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Nav Bar Style', 'lipi' ),
					'options'  => array(
						'standard' => 'Without Background (White Backgorund)',
						'custom' => 'With Transparent Background',
					),
					'default'  => 'standard',
				),
				
				array(
					'id'       => 'bbpress_header_nav_background',
					'type'     => 'switch',
					'title'    => esc_html__( 'Add Nav Background', 'lipi' ),
					'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar.', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'bbpress_header_nav_background_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Nav Background Color', 'lipi' ),
					'default'  => array(
						'color' => '#35373F',
						'alpha' => '0.3'
					),
					'mode'     => 'background',
				),
				
				array(
					'id'       => 'bbpress_custom_header_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Header Configuration', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'bbpress_custom_header_readjust_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Header Height/Padding', 'lipi' ),
					'desc'     => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT)',
					'default'  => '26px 15px 20px 15px',
				),
				
				array(
					'id'       => 'bbpress_custom_header_readjust_responsive_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Header Responsive Height/Padding', 'lipi' ),
					'desc'     => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT)',
					'default'  => '26px 15px 20px 15px',
				),
				
				array(
					'id'       => 'bbpress_custom_header_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Page Header Background Color', 'lipi' ),
					'default'  => '',
					'transparent' => false,
				),
				
				array (
					'subtitle' => esc_html__('Header Background Image', 'lipi'),
					'id' => 'bbpress_custom_header_image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'lipi'),
					'url' => true,
				),
				
				array(
					'id'       => 'bbpress_header_parallax_effect',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply Parallax Effect For the Upload Image', 'lipi' ),
					'subtitle' => esc_html__('If checked, Parallax effect will activate', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'bbpress_custom_header_image_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Background Image Display Position', 'lipi' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center',
				),
				
				array(
					'id'       => 'bbpress_header_remove_opacity',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Opacity (Transparency) For the Upload Image', 'lipi' ),
					'subtitle' => esc_html__('If checked, background opacity Will be removed', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'bbpress_header_opacity_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color For the Upload Image', 'lipi' ),
					'default'  => array(
						'color' => '',
						'alpha' => '1'
					),
					'mode'     => 'background',
				),
				
				array(
					'id'       => 'bbpress_header_search_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Search Box', 'lipi' ),
					'subtitle' => esc_html__('If checked, Lipi ajax search box will appear on the header', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'bbpress_header_search_box_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'lipi' ),
					'options'  => array(
						'6' => '50% Width',
						'7' => '58% Width',
						'8' => '66% Width',
						'9' => '75% Width',
						'10' => '83% Width',
						'11' => '91% Width',
						'12' => '100% Width',
					),
					'default'  => '12',
				),
				
				array(
					'id'       => 'bbpress_header_search_box_center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Make Search Box Appear Center', 'lipi' ),
					'subtitle' => esc_html__('Display search box on the center, NOTE: If activate, column layout will not work', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				// header text settings
				array(
					'id'       => 'bbpress_custom_header_text_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Header Text Settings', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'bbpress_custom_header_text_alignment',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Alignment', 'lipi' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
					),
					'default'  => 'left',
				),
				
				array(
					'id'       => 'bbpress_force_header_text_left',
					'type'     => 'switch',
					'title'    => esc_html__( 'Force Apply Header Text Left Alignement', 'lipi' ),
					'subtitle' => esc_html__('Text, Subtext & Breadcrumb will force align to left', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'bbpress_custom_header_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Text Color', 'lipi' ),
					'default'  => '#4d515c',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #4d515c (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
								
				array(
					'id'       => 'bbpress_custom_header_text_font',
					'type'     => 'text',
					'title'    => esc_html__( 'Text Size', 'lipi' ),
					'desc'     => 'Default:19px (please enter as: 19px)',
					'default'  => '19px',
				),
				
				array(
					'id'       => 'bbpress_custom_header_text_font_letter_spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'lipi' ),
					'desc'     => 'Default:0px (please enter as: 0px)',
					'default'  => '0px',
				),
				
				array(
					'id'       => 'bbpress_custom_header_text_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Weight', 'lipi' ),
					'options'  => array(
						'100' => 'Thin 100',
						'200' => 'Extra-Light 200',
						'300' => 'Light 300',
						'400' => 'Regular 400',
						'500' => 'Medium 500',
						'600' => 'Semi-Bold 600',
						'700' => 'Bold 700',
						'800' => 'Extra-Bold 800',
						'900' => 'Ultra-Bold 900',
					),
					'default'  => '700',
				),
				
				// sub title
				array(
					'id'       => 'bbpress_custom_header_subtitletext_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Sub Title Text Settings', 'lipi' ),
					'indent'   => true, 
				),
				array(
					'id'       => 'bbpress_custom_header_subtitle_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Sub Title Text Size', 'lipi' ),
					'desc'     => 'Default:14px (please enter as: 14px)',
					'default'  => '14px',
				),
				
				array(
					'id'       => 'bbpress_custom_header_subtext_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Sub Title Text Color', 'lipi' ),
					'default'  => '#4d515c',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #4d515c (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'bbpress_custom_header_subtitle_padding',
					'type'     => 'text',
					'title'    => esc_html__( 'Sub Title Padding', 'lipi' ),
					'desc'     => '0px 0px 0px 0px (top, right, buttom, left)',
					'default'  => '',
				),
				
				// breadcrumb
				array(
					'id'       => 'bbpress_custom_header_breadcrumb_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Breadcrumb Settings', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'bbpress_breadcrumb_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Breadcrumb Color', 'lipi' ),
					'default'  => '#F4F4F4',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #F4F4F4 (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'bbpress_breadcrumb_text_color_link',
					'type'     => 'color',
					'title'    => esc_html__( 'Breadcrumb Link Color', 'lipi' ),
					'default'  => '#333333',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #333333 (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'bbpress_breadcrumb_font_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Text Size', 'lipi' ),
					'desc'     => 'Default:12px (please enter as: 12px)',
					'default'  => '12px',
				),
				
				array(
					'id'       => 'bbpress_breadcrumb_margin',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Margin', 'lipi' ),
					'subtitle'    => esc_html__( 'Please enter only if required', 'lipi' ),
					'desc'     => '0px 0px 0px 0px (top, right, buttom, left)',
					'default'  => '',
				),
		
		
		)
		) );
		
		// custom knowledgebase header
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom KnowledgeBase Header', 'lipi' ),
		'id'     => 'theme-custom-knowledgebase-header',
		'subsection'  => true,
		'fields' => array(
		
				array(
					'id'       => 'avtivate-custom-kb-header-category',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Custom Header for KB Category Section', 'lipi' ),
					'subtitle' => esc_html__('Custom KB category header', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'avtivate-custom-kb-header-singlepage',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Custom Header for KB single post Section', 'lipi' ),
					'subtitle' => '<span style="color:red;">ALERT:: (GLOBAL EFFECT) if active, single post custom KB header will not work</span>',
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				// Navigation start
				array(
					'id'       => 'custom_header_navigation_knowledgebase_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Navigation Configuration', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_style_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Nav Bar Style', 'lipi' ),
					'options'  => array(
						'standard' => 'Without Background (White Backgorund)',
						'custom' => 'With Transparent Background',
					),
					'default'  => 'standard',
				),
				
				array(
					'id'       => 'knowledgebase_header_nav_background',
					'type'     => 'switch',
					'title'    => esc_html__( 'Add Nav Background', 'lipi' ),
					'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar.', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase_header_nav_background_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Nav Background Color', 'lipi' ),
					'default'  => array(
						'color' => '#35373F',
						'alpha' => '0.3'
					),
					'mode'     => 'background',
				),
				
				
				// header configuration
				array(
					'id'       => 'custom_header_kb_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Header Configuration', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_readjust_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Header Height/Padding', 'lipi' ),
					'desc'     => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT)',
					'default'  => '26px 15px 20px 15px',
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_readjust_responsive_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Header Responsive Height/Padding', 'lipi' ),
					'desc'     => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT)',
					'default'  => '26px 15px 20px 15px',
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Page Header Background Color', 'lipi' ),
					'default'  => '',
					'transparent' => false,
				),
				
				array (
					'subtitle' => esc_html__('Header Background Image', 'lipi'),
					'id' => 'knowledgebase_custom_header_image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'lipi'),
					'url' => true,
				),
				
				array(
					'id'       => 'knowledgebase_header_parallax_effect',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply Parallax Effect For the Upload Image', 'lipi' ),
					'subtitle' => esc_html__('If checked, Parallax effect will activate', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_image_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Background Image Display Position', 'lipi' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center',
				),
				
				array(
					'id'       => 'knowledgebase_header_remove_opacity',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Opacity (Transparency) For the Upload Image', 'lipi' ),
					'subtitle' => esc_html__('If checked, background opacity Will be removed', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase_header_opacity_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color For the Upload Image', 'lipi' ),
					'default'  => array(
						'color' => '',
						'alpha' => '1'
					),
					'mode'     => 'background',
				),
				
				array(
					'id'       => 'knowledgebase_header_search_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Search Box', 'lipi' ),
					'subtitle' => esc_html__('If checked, Lipi ajax search box will appear on the header', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase_header_search_box_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'lipi' ),
					'options'  => array(
						'6' => '50% Width',
						'7' => '58% Width',
						'8' => '66% Width',
						'9' => '75% Width',
						'10' => '83% Width',
						'11' => '91% Width',
						'12' => '100% Width',
					),
					'default'  => '12',
				),
				
				array(
					'id'       => 'knowledgebase_header_search_box_center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Make Search Box Appear Center', 'lipi' ),
					'subtitle' => esc_html__(' Display search box on the center', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				// text configuration
				array(
					'id'       => 'knowledgebase_custom_header_text_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Header Text Settings', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_text_alignment',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Alignment', 'lipi' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
					),
					'default'  => 'left',
				),
				
				array(
					'id'       => 'knowledgebase_force_header_text_left',
					'type'     => 'switch',
					'title'    => esc_html__( 'Force Apply Header Text Left Alignement', 'lipi' ),
					'subtitle' => esc_html__('Text, Breadcrumb will force align to left', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Text Color', 'lipi' ),
					'default'  => '#4d515c',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #4d515c (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_text_font',
					'type'     => 'text',
					'title'    => esc_html__( 'Text Size', 'lipi' ),
					'desc'     => 'Default:19px (please enter as: 19px)',
					'default'  => '19px',
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_text_font_letter_spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'lipi' ),
					'desc'     => 'Default:0px (please enter as: 0px)',
					'default'  => '0px',
				),
				
				array(
					'id'       => 'knowledgebase_custom_header_text_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Weight', 'lipi' ),
					'options'  => array(
						'100' => 'Thin 100',
						'200' => 'Extra-Light 200',
						'300' => 'Light 300',
						'400' => 'Regular 400',
						'500' => 'Medium 500',
						'600' => 'Semi-Bold 600',
						'700' => 'Bold 700',
						'800' => 'Extra-Bold 800',
						'900' => 'Ultra-Bold 900',
					),
					'default'  => '700',
				),
				
				array(
					'id'       => 'knowledgebase_custom_breadcrumb_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Breadcrumb Color', 'lipi' ),
					'default'  => '#8a8989',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #8a8989 (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'knowledgebase_custom_breadcrumb_text_color_link',
					'type'     => 'color',
					'title'    => esc_html__( 'Breadcrumb Link Color', 'lipi' ),
					'default'  => '#333333',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #333333 (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'knowledgebase_breadcrumb_font_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Text Size', 'lipi' ),
					'desc'     => 'Default:12px (please enter as: 12px)',
					'default'  => '12px',
				),
				
				array(
					'id'       => 'knowledgebase_breadcrumb_margin',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Margin', 'lipi' ),
					'subtitle'    => esc_html__( 'Please enter only if required', 'lipi' ),
					'desc'     => '0px 0px 0px 0px (top, right, buttom, left)',
					'default'  => '',
				),
		
		
		
		)
		) );
		
		
		
		
		
		// custom FAQ header
		Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom FAQ Header', 'lipi' ),
		'id'     => 'theme-custom-faq-header',
		'subsection'  => true,
		'fields' => array(
		
				array(
					'id'       => 'avtivate-custom-faq-header-category',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Custom Header for FAQ Category Section', 'lipi' ),
					'subtitle' => esc_html__('Custom FAQ category header', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				// navigation
				array(
					'id'       => 'custom_header_navigation_faq_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Navigation Configuration', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'faq_custom_header_style_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Nav Bar Style', 'lipi' ),
					'options'  => array(
						'standard' => 'Without Background (White Backgorund)',
						'custom' => 'With Transparent Background',
					),
					'default'  => 'standard',
				),
				
				array(
					'id'       => 'faq_header_nav_background',
					'type'     => 'switch',
					'title'    => esc_html__( 'Add Nav Background', 'lipi' ),
					'subtitle' => esc_html__('If checked, transparent background will be added on header nav bar.', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'faq_header_nav_background_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Nav Background Color', 'lipi' ),
					'default'  => array(
						'color' => '#35373F',
						'alpha' => '0.3'
					),
					'mode'     => 'background',
				),
				
				
					
				// header configuration
				array(
					'id'       => 'custom_header_faq_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Page Header Configuration', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'faq_custom_header_readjust_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Header Height/Padding', 'lipi' ),
					'desc'     => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT)',
					'default'  => '26px 15px 20px 15px',
				),
				
				array(
					'id'       => 'faq_custom_header_readjust_responsive_height',
					'type'     => 'text',
					'title'    => esc_html__( 'Re-adjust Header Responsive Height/Padding', 'lipi' ),
					'desc'     => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT)',
					'default'  => '26px 15px 20px 15px',
				),
				
				array(
					'id'       => 'faq_custom_header_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Page Header Background Color', 'lipi' ),
					'default'  => '',
					'transparent' => false,
				),
				
				array (
					'subtitle' => esc_html__('Header Background Image', 'lipi'),
					'id' => 'faq_custom_header_image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'lipi'),
					'url' => true,
				),
				
				array(
					'id'       => 'faq_header_parallax_effect',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply Parallax Effect For the Upload Image', 'lipi' ),
					'subtitle' => esc_html__('If checked, Parallax effect will activate', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'faq_custom_header_image_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Background Image Display Position', 'lipi' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center',
				),
				
				array(
					'id'       => 'faq_header_remove_opacity',
					'type'     => 'switch',
					'title'    => esc_html__( 'Remove Opacity (Transparency) For the Upload Image', 'lipi' ),
					'subtitle' => esc_html__('If checked, background opacity Will be removed', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'faq_header_opacity_color',
					'type'     => 'color_rgba',
					'title'    => esc_html__( 'Background Opacity Color For the Upload Image', 'lipi' ),
					'default'  => array(
						'color' => '',
						'alpha' => '1'
					),
					'mode'     => 'background',
				),
				
				array(
					'id'       => 'faq_header_search_box',
					'type'     => 'switch',
					'title'    => esc_html__( 'Activate Search Box', 'lipi' ),
					'subtitle' => esc_html__('If checked, Lipi ajax search box will appear on the header', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'faq_header_search_box_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Box Display Column Layout', 'lipi' ),
					'options'  => array(
						'6' => '50% Width',
						'7' => '58% Width',
						'8' => '66% Width',
						'9' => '75% Width',
						'10' => '83% Width',
						'11' => '91% Width',
						'12' => '100% Width',
					),
					'default'  => '12',
				),
				
				array(
					'id'       => 'faq_header_search_box_center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Make Search Box Appear Center', 'lipi' ),
					'subtitle' => esc_html__('Display search box on the center, NOTE: If activate, column layout will not work', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				// text configuration
				array(
					'id'       => 'faq_custom_header_text_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Header Text Settings', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'faq_custom_header_text_alignment',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Alignment', 'lipi' ),
					'options'  => array(
						'left' => 'Left',
						'center' => 'Center',
					),
					'default'  => 'left',
				),
				
				array(
					'id'       => 'faq_force_header_text_left',
					'type'     => 'switch',
					'title'    => esc_html__( 'Force Apply Header Text Left Alignement', 'lipi' ),
					'subtitle' => esc_html__('Text, Breadcrumb will force align to left', 'lipi'),
					'desc' => esc_html__('On==Enable', 'lipi'),
					'default'  => false,
				),
				
				array(
					'id'       => 'faq_custom_header_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Text Color', 'lipi' ),
					'default'  => '#4d515c',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #4d515c (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'faq_custom_header_text_font',
					'type'     => 'text',
					'title'    => esc_html__( 'Text Size', 'lipi' ),
					'desc'     => 'Default:19px (please enter as: 19px)',
					'default'  => '19px',
				),
				
				array(
					'id'       => 'faq_custom_header_text_font_letter_spacing',
					'type'     => 'text',
					'title'    => esc_html__( 'Letter Spacing', 'lipi' ),
					'desc'     => 'Default:0px (please enter as: 0px)',
					'default'  => '0px',
				),
				
				array(
					'id'       => 'faq_custom_header_text_font_weight',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Weight', 'lipi' ),
					'options'  => array(
						'100' => 'Thin 100',
						'200' => 'Extra-Light 200',
						'300' => 'Light 300',
						'400' => 'Regular 400',
						'500' => 'Medium 500',
						'600' => 'Semi-Bold 600',
						'700' => 'Bold 700',
						'800' => 'Extra-Bold 800',
						'900' => 'Ultra-Bold 900',
					),
					'default'  => '700',
				),
				
				array(
					'id'       => 'faq_custom_breadcrumb_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Breadcrumb Color', 'lipi' ),
					'default'  => '#8a8989',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #8a8989 (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'faq_custom_breadcrumb_text_color_link',
					'type'     => 'color',
					'title'    => esc_html__( 'Breadcrumb Link Color', 'lipi' ),
					'default'  => '#333333',
					'transparent' => false,
					'subtitle' => esc_html__('Default: #333333 (NOTE: for image background use #FFFFFF)', 'lipi'),
				),
				
				array(
					'id'       => 'faq_breadcrumb_font_size',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Text Size', 'lipi' ),
					'desc'     => 'Default:12px (please enter as: 12px)',
					'default'  => '12px',
				),
				
				array(
					'id'       => 'faq_breadcrumb_margin',
					'type'     => 'text',
					'title'    => esc_html__( 'Breadcrumb Margin', 'lipi' ),
					'subtitle'    => esc_html__( 'Please enter only if required', 'lipi' ),
					'desc'     => '0px 0px 0px 0px (top, right, buttom, left)',
					'default'  => '',
				),
					
		)
		) );
		

	
	

/*-----------------------------------------------------------------------------------*/
/*	TYPOGRAPHY
/*-----------------------------------------------------------------------------------*/

    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'lipi' ),
        'id'     => 'typography',
        'icon'   => 'el el-font',
        'fields' => array(
		
            array(
                'id'       => 'theme-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'lipi' ),
                'subtitle' => esc_html__('Specify the body font properties.', 'lipi' ),
                'google'   => true,
				'text-align' => false,
				'font-style' => false,
				'letter-spacing' => true,
				'subsets' => false,
				'units'  => '',
                'default'  => array(
                    'color'       => '#333333',
                    'font-size'   => '14',
                    'font-family' => 'Montserrat',
					'line-height' => '1.5',
					'letter-spacing' => '0.3',
					'google'      => true,
					'font-style'  => '500',
                ),
            ),
			
			array(
					'id'       => 'p-tag-line-height',
					'type'     => 'text',
					'title'    => esc_html__( 'P Tag (<p>) Line Height', 'lipi' ),
					'subtitle'    => esc_html__( 'Inside post content p tag line height', 'lipi' ),
					'desc'     => 'Default: 23px',
					'default'  => '',
				),
			
			array(
                'id'       => 'typography-h1-start',
                'type'     => 'section',
                'title'    => esc_html__( 'Font Style', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
                'id'          => 'theme-h1-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H1 style', 'lipi' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '40',
                    'line-height' => '45',
					'text-transform' => 'none',
					'letter-spacing' => '-2.3',
					'color' => '#0e2b5c',
                ),
            ),
			
			array(
                'id'          => 'theme-h2-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H2 style', 'lipi' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '34',
                    'line-height' => '45',
					'text-transform' => 'none',
					'letter-spacing' => '-2.3',
					'color' => '#0e2b5c',
                ),
            ),
			
			array(
                'id'          => 'theme-h3-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H3 style', 'lipi' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '28',
                    'line-height' => '35',
					'text-transform' => 'none',
					'letter-spacing' => '-1',
					'color' => '#0e2b5c',
                ),
            ),
			
			array(
                'id'          => 'theme-h4-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H4 style', 'lipi' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '22',
                    'line-height' => '28',
					'text-transform' => 'none',
					'letter-spacing' => '-1',
					'color' => '#0e2b5c',
                ),
            ),
			
			
			
			array(
                'id'          => 'theme-h5-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H5 style', 'lipi' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '18',
                    'line-height' => '25',
					'text-transform' => 'none',
					'letter-spacing' => '-0.4',
					'color' => '#0e2b5c',
                ),
            ),
			
			
			
			array(
                'id'          => 'theme-h6-typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H6 style', 'lipi' ),
                'google'      => true,
                'font-backup' => false,
				'text-align' => false,
				'text-transform' => true,
                'subsets'       => false, 
                'letter-spacing'=> true,  
                'all_styles'  => true,
                'units'       => 'px',
                'default'     => array(
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '16',
                    'line-height' => '20',
					'text-transform' => 'none',
					'letter-spacing' => '-0.4',
					'color' => '#0e2b5c',
                ),
            ),
			
			
			
        )
    ) );




/*-----------------------------------------------------------------------------------*/
/*	SEARCH
/*-----------------------------------------------------------------------------------*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Live Search', 'lipi' ),
        'id'               => 'theme_search',
        'customizer_width' => '400px',
        'icon'             => 'el el-search-alt'
    ) );


	Redux::setSection( $opt_name, array(
        'title'        => esc_html__( 'Global Settings', 'lipi' ),
        'id'           => 'search_global_settings',
		'subsection'   => true,
        'fields' => array(
		
		
				array(
					'id'       => 'global_live_search_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Live Search', 'lipi' ),
					'subtitle' => esc_html__('Globally disable live search', 'lipi'),
					'default'  => true,
				),
				
				array(
					'id'       => 'search-icon-bouncein',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Search Icon BounceIn', 'lipi' ),
					'subtitle' => esc_html__('Globally Enable', 'lipi'),
					'default'  => false,
				),


				array(
					'id'       => 'live-search-global-settings-text',
					'type'     => 'section',
					'title'    => esc_html__( 'Text Settings', 'lipi' ),
					'indent'   => true, 
				),

				
				array(
					'id'       => 'global-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Search Placeholder Text', 'lipi' ),
					'default'  => 'Have a question? Ask or enter a search term',
				),
				
				 array(
					'id'       => 'global-flip-search-text-paceholder',
					'type'     => 'text',
					'title'    => esc_html__( 'Flip Search Placeholder Text', 'lipi' ),
					'default'  => 'Please Let Us Know Your Problem',
				),
				
				array(
					'id'       => 'global_search_button_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Search Button Text', 'lipi' ),
					'default'  => 'Search',
				),
				
				array(
					'id'       => 'global_live_showallresult_search_text',
					'type'     => 'text',
					'title'    => esc_html__( ' \'Show All Result\' Text', 'lipi' ),
					'default'  => 'Show All Results',
					'subtitle' => esc_html__('Replace text \'Show All Results\' when user perform live search', 'lipi'),
				),
				
				array(
					'id'       => 'global_live_noresult_search_text',
					'type'     => 'text',
					'title'    => esc_html__( ' \'No Results\' Text', 'lipi' ),
					'default'  => 'No Results',
					'subtitle' => esc_html__('Replace text \'No Results\' when user perform live search', 'lipi'),
				),
								
		 )
    ) );


/*-----------------------------------------------------------------------------------*/
/*	FAQ'S
/*-----------------------------------------------------------------------------------*/
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'FAQ', 'lipi' ),
        'id'     => 'theme_faq_section',
        'icon'   => 'el el-question-sign',
        'fields' => array(
		
			array(
				'id'       => 'faq_categorypg_layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar to Display', 'lipi' ),
				'subtitle' => esc_html__( 'Choose a sidebar to display on category/tag page', 'lipi' ),
				'options'  => array(
					'1' => 'No Sidebar',
					'2' => 'Left Sidebar',
					'3' => 'Right Sidebar',
				),
				'default'  => '3'
			),
			
			array(
				'id'       => 'faq_categorypg_content_center',
				'type'     => 'switch',
				'title'    => esc_html__( 'Center Content', 'lipi' ),
				'default'  => false,
				'subtitle' => 'Click <code>on</code> <strong>to align</strong> content to center mode',
				'desc' => '<code>NOTE:</code> \'Sidebar to Display\' MUST be \'No Sidebar\' ',
			),
			
			array(
				'id'       => 'faq_categorypg_search_status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Search', 'lipi' ),
				'default'  => true,
				'subtitle' => 'Click <code>off</code> <strong>to disable</strong> search form from the category/tag page',
			),
		
			array(
				'id'       => 'faq_categorypg_order',
				'type'     => 'select',
				'title'    => esc_html__( 'Records Display Order', 'lipi' ),
				'subtitle' => esc_html__( 'FAQ records order', 'lipi' ),
				'options'  => array(
					'ASC' => 'Ascending Order (ASC)',
					'DESC' => 'Descending Order (DESC)',
				),
				'default'  => 'ASC'
			),
			
			array(
				'id'       => 'faq_categorypg_order_by',
				'type'     => 'select',
				'title'    => esc_html__( 'FAQ Display Order By', 'lipi' ),
				'subtitle' => esc_html__( 'FAQ records order by', 'lipi' ),
				'options'  => array(
					'date' => 'Order By Date',
					'modified' => 'Order By Last Modified Date',
					'title' => 'Order By Title',
					'rand' => 'Order By Random',
					'menu_order' => 'Order By Page Order',
					'comment_count' => 'Order By Number of Comments',
					'none' => 'None',
				),
				'default'  => 'date'
			),
		
		)
    ) );



/*-----------------------------------------------------------------------------------*/
/*	KNOWLEDGEBASE
/*-----------------------------------------------------------------------------------*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Knowledge Base', 'lipi' ),
        'id'               => 'theme_knowledgebase',
        'customizer_width' => '400px',
        'icon'             => 'el el-file-edit'
    ) );
	
	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'General', 'lipi' ),
	'id'               => 'theme_kb_general_settings',
	'subsection'       => true,
	'customizer_width' => '450px',
	'fields'           => array(
	
	
			array (
				'subtitle' => esc_html__('(Yes) button Text.', 'lipi'),
				'id' => 'yes-button-text',
				'type' => 'text',
				'title' => esc_html__('Like Button Text', 'lipi'),
				'default' => esc_html__('Yes', 'lipi'),
			),
			
			array (
				'subtitle' => esc_html__('(No) button Text.', 'lipi'),
				'id' => 'no-button-text',
				'type' => 'text',
				'title' => esc_html__('Unlike Button Text', 'lipi'),
				'default' => esc_html__('No', 'lipi'),
			),
	
			array (
				'subtitle' => esc_html__('This message will appear above Yes/No button.', 'lipi'),
				'id' => 'yes-no-above-message',
				'type' => 'text',
				'title' => esc_html__('Like/Dislike Message', 'lipi'),
				'default' => esc_html__('Was this helpful?', 'lipi'),
			),
			
			array (
				'subtitle' => esc_html__('Message appear if user has voted already', 'lipi'),
				'id' => 'already-voted-message',
				'type' => 'text',
				'title' => esc_html__('Already Voted', 'lipi'),
				'default' => esc_html__('already voted', 'lipi'),
			),
			
			array(
                'id'       => 'file-attachment-section',
                'type'     => 'section',
                'title'    => esc_html__( 'Attachment Settings', 'lipi' ),
                'indent'   => true, 
            ),
			
			array (
				'subtitle' => esc_html__('Will appear as title', 'lipi'),
				'id' => 'attached-file-title-for-login-user',
				'type' => 'text',
				'title' => esc_html__('Attached File Title [for login users]', 'lipi'),
				'default' => esc_html__('Please Login To Download Attachments', 'lipi'),
			),
			
			
			array (
				'subtitle' => esc_html__('Will appear as title', 'lipi'),
				'id' => 'attached-file-title',
				'type' => 'text',
				'title' => esc_html__('Attached File Title', 'lipi'),
				'default' => esc_html__('Attached Files', 'lipi'),
			),
			
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'lipi'),
				'id' => 'attached-file-type',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Type Title', 'lipi'),
				'default' => 'File Type',
			),
			
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'lipi'),
				'id' => 'attached-file-size',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Size Title', 'lipi'),
				'default' => 'File Size',
			),
			
			array (
				'subtitle' => esc_html__('Will appear on the table section as header', 'lipi'),
				'id' => 'attached-file-download',
				'type' => 'text',
				'title' => esc_html__('[Attached] File Download Title', 'lipi'),
				'default' => 'Download',
			),
			
			array(
                'id'       => 'related-post-section',
                'type'     => 'section',
                'title'    => esc_html__( 'Related Articles', 'lipi' ),
                'indent'   => true, 
            ),
			
			array (
				'id' => 'related-kb-post-title',
				'type' => 'text',
				'title' => esc_html__('Related Post Title', 'lipi'),
				'default' => 'Related Articles',
			),
			
			array(
                'id'       => 'category-post-section',
                'type'     => 'section',
                'title'    => esc_html__( 'Category Section', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'kb-cat-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Knowledgebase Category Access Control Message', 'lipi' ),
				'default'  => 'You do not have sufficient permissions to access this Knowledge-base Category.',
				'subtitle' => 'will appear if logged-in user has not sufficient permission to access the selected category',
			),
			
			array(
                'id'       => 'single-post-section',
                'type'     => 'section',
                'title'    => esc_html__( 'Single Post Section', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
				'id'       => 'kb-single-page-access-control-message',
				'type'     => 'text',
				'title'    => esc_html__( 'Knowledgebase Article Access Control Message', 'lipi' ),
				'default'  => 'You do not have sufficient permissions to access this Knowledge-base Article.',
				'subtitle' => 'will appear if logged-in user has not sufficient permission to access the selected article',
			),
	
	
	
			)
    ) );	


	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Name', 'lipi' ),
        'id'               => 'theme_kb_custom_name_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb_slug_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Single Post (Slug Name)', 'lipi' ),
					'subtitle'    => esc_html__( 'Enter if you wish to use a different slug name.', 'lipi' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>knowledgebase</strong>/created-post-name/ <br><br> <div style="color: #D01B0B;"><strong>WARNING: </strong>Single post slug name <strong>MUST BE unique. Mustn\'t</strong> match with the category slug name.</div> After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect', 'lipi' ),
					'default'  => '',
				),
				
				array(
					'id'       => 'kb_cat_slug_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Category (Slug Name)', 'lipi' ),
					'subtitle'    => esc_html__( 'Enter if you wish to use a different slug name.', 'lipi' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kb</strong>/category-name/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Slug Name <strong>MUST BE unique. Mustn\'t</strong> match with the single post slug name</div> After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect', 'lipi' ),
					'default'  => '',
				),
				
				array(
					'id'       => 'kb_tag_slug_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Tag (Slug Name)', 'lipi' ),
					'subtitle'    => esc_html__( 'Enter if you wish to use a different slug name.', 'lipi' ),
					'desc'     => __( '<strong>Will appear as: </strong> http://domain.com/<strong>kbtag</strong>/tag-name/ <br><br> <div style="color: #D01B0B;"><strong>WARNING:</strong> Slug Name <strong>MUST BE unique. Mustn\'t</strong> match with both single and category slug name</div> After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect', 'lipi' ),
					'default'  => '',
				),
				
				array(
					'id'       => 'kb_breadcrumb_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Breadcrumb Name', 'lipi' ),
					'subtitle'    => esc_html__( 'Replace breadcrumb name', 'lipi' ),
					'desc'     => __( '<strong>Will appear as:</strong>  Home / <strong>Knowledge Base</strong> / Customization /', 'lipi' ),
					'default'  => '',
				),
				
				array(
					'id'       => 'kb_breadcrumb_custom_home_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Knowledge Base Home Page URL', 'lipi' ),
					'desc'     => __( '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Knowledge Base</a> / Customization /', 'lipi' ),
					'subtitle' => __( 'Custom home page URL for your Knowledge Base', 'lipi' ),
					'default'  => '',
				),
		
		)
    ) );	
	
	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Category + Tag Page Settings', 'lipi' ),
		'id'               => 'theme_kb_category_pg_settings',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
				
				array(
					'id'       => 'kb-catpost-title-tag',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Tag', 'lipi' ),
					'options'  => array(
						'h4' => 'H4',
						'h5' => 'H5',
						'h6' => 'H6',
					),
					'default'  => 'h5',
					'subtitle' => 'Category page post title tag',
				),
				
				array(
					'id'       => 'kb-catpost-records-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Category Page Settings', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'kb-catpost-records-display-order',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Records Display Order', 'lipi' ),
					'subtitle' => esc_html__( 'Display order ', 'lipi' ),
					'options'  => array(
						'asc' => 'Ascending Order (ASC)',
						'desc' => 'Descending Order (DESC)',
					),
					'default'  => 'desc'
				),
			
				array(
					'id'       => 'kb-catpost-records-display-order-by',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Records Display Order By', 'lipi' ),
					'subtitle' => esc_html__( 'Display order by', 'lipi' ),
					'options'  => array(
						'date' => 'Order By Date',
						'modified' => 'Order By Last Modified Date',
						'title' => 'Order By Title',
						'rand' => 'Order By Random',
						'menu_order' => 'Order By Page Order',
						'comment_count' => 'Order By Number of Comments',
						'none' => 'None',
					),
					'default'  => 'date'
				),
				
				array(
					'id'       => 'kb-catpost-records-all-child-in-root',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display All Child Category Records in Parent Category', 'lipi' ),
					'default'  => false,
					'desc' => '<code>NOTE:</code> Off == Disable',
				),
				
				array(
					'id'       => 'kb-catpost-records-per-page',
					'type'     => 'text',
					'title'    => esc_html__( 'Records Per Page', 'lipi' ),
					'desc'     => __( 'NOTE: -1 (display all recods in the single page)', 'lipi' ),
					'subtitle' => __( 'Custom home page URL for your Knowledge Base', 'lipi' ),
					'default'  => '10',
				),
				
				array(
					'id'       => 'kb-catpost-other-settings',
					'type'     => 'section',
					'title'    => esc_html__( 'Other Settings', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'knowledgebase_categorypg_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar to Display', 'lipi' ),
					'subtitle' => esc_html__( 'Choose a sidebar to display on category/tag page', 'lipi' ),
					'options'  => array(
						'1' => 'No Sidebar',
						'2' => 'Left Sidebar',
						'3' => 'Right Sidebar',
					),
					'default'  => '3'
				),
				
				array(
					'id'       => 'kb-categorypg-content-center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Center Content', 'lipi' ),
					'default'  => false,
					'subtitle' => 'Click <code>on</code> <strong>to align</strong> content to center mode',
					'desc' => '<code>NOTE:</code> \'Sidebar to Display\' MUST be \'No Sidebar\' ',
				),
				
				array(
					'id'       => 'kb-categorypg-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> search form from the category/tag page',
				),
				
				array(
					'id'       => 'kb-categorypg-impression-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Impression (Quick Stats)', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> Post Impression that appears under knowledgebase post title',
				),
				
				array(
					'id'       => 'kb-catpost-like-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Likes', 'lipi' ),
					'default'  => false,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> Post Impression that appears under knowledgebase post title',
				),
				
				array(
					'id'       => 'kb-catpost-date',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Date', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> Post Date that appears under knowledgebase post title',
				),
				
				array(
					'id'       => 'kb-catpost-icon',
					'type'     => 'switch',
					'title'    => esc_html__( 'Title Icon', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> title icon that appears before knowledgebase post title',
				),
			
		)
    ) );

	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Settings', 'lipi' ),
        'id'               => 'theme_kb_single_pg_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'kb-singlepg-title-tag',
					'type'     => 'select',
					'title'    => esc_html__( 'Title Tag', 'lipi' ),
					'options'  => array(
						'h1' => 'H1',
						'h2' => 'H2',
					),
					'default'  => 'h2',
					'subtitle' => 'Single post title tag',
				),
		
				array(
					'id'       => 'knowledgebase_sidebar_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar to Display', 'lipi' ),
					'subtitle' => esc_html__( 'Choose a sidebar to display on Single KB page', 'lipi' ),
					'options'  => array(
						'1' => 'No Sidebar',
						'2' => 'Left Sidebar',
						'3' => 'Right Sidebar',
					),
					'default'  => '3'
				),
				
				array(
					'id'       => 'kb-single-pg-content-center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Center Content', 'lipi' ),
					'default'  => false,
					'subtitle' => 'Click <code>on</code> <strong>to align</strong> content to center mode',
					'desc' => '<code>NOTE:</code> \'Sidebar to Display\' MUST be \'No Sidebar\' ',
				),
				
				array(
					'id'       => 'kb-single-pg-header-search-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> search form from the single page',
				),
				
				array(
					'id'       => 'kb-single-pg-author-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author Info', 'lipi' ),
					'default'  => false,
					'subtitle' =>  'Click <code>on</code> <strong>to enable</strong> author info on the single page',
				),
				
				array(
					'id'       => 'kb-single-pg-social-share-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Share', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> social share on the single page',
				),
				
				array(
					'id'       => 'kb-single-pg-comment-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Comment', 'lipi' ),
					'default'  => false,
					'subtitle' => 'Click <code>on</code> <strong>to enable</strong> comment on the single page',
				),
				
				array(
					'id'       => 'kb-comment-box-on-thumbsdown',
					'type'     => 'switch',
					'title'    => '<span style="color:orange;">Display comment box, when user click on the thumbs down icon (red buttom) on an article</span>',
					'subtitle'    => 'NOTE: Above feature, <strong>\'Comment\'</strong> must be activate',
					'default'  => false,
				),
				
				
				array(
					'id'       => 'kb-single-pg-like-dislike-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Like/Dislike', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> like/dislike on the single/category pages <br><br> <span style="color:red">(This feature will also disable like that appears under knowledgebase post title, from the single/category pages)</span>',
				),
				
				array(
					'id'       => 'quick-stats-section-related-post',
					'type'     => 'section',
					'title'    => esc_html__( 'Related Articles Stats', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'kb-single-pg-related-articles-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Articles', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> related articles on the single page',
				),
				
				array (
					'id' => 'related-no-of-post',
					'type' => 'text',
					'title' => esc_html__('Number Of Related Post to Display', 'lipi'),
					'default' => '6',
				),
			
				
				array(
					'id'       => 'quick-stats-section-below-title',
					'type'     => 'section',
					'title'    => esc_html__( 'Quick Stats', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'kb-single-pg-post-impression-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Impression', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> Post Impression that appears under knowledgebase post title',
				),
				
				array(
					'id'       => 'kb-single-pg-post-author-qs-status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> Author that appear under knowledgebase post title',
				),
				
				array(
					'id'       => 'kb-single-pg-post-date',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Date', 'lipi' ),
					'default'  => true,
					'subtitle' => 'Click <code>off</code> <strong>to disable</strong> Post Date that appears under knowledgebase post title',
				),
				
				array(
					'id'       => 'kb_post_modified_date_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Post Modified Date', 'lipi' ),
					'default'  => false,
					'subtitle' => 'Click <code>on</code> <strong>to activate</strong> Post Modified Date that appear under knowledgebase post title',
				),
				
		)
    ) );	
	


/*-----------------------------------------------------------------------------------*/
/*	SERVICES
/*-----------------------------------------------------------------------------------*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Services', 'lipi' ),
        'id'               => 'theme_services',
        'customizer_width' => '400px',
        'icon'             => 'el el-briefcase'
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Name', 'lipi' ),
        'id'               => 'theme_services_custom_name_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			   array(
					'id'       => 'services-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Services Single Slug', 'lipi' ),
					'subtitle'  => esc_html__( 'Enter if you wish to use a different slug name.', 'lipi' ),
					'desc' => esc_html__( 'Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect', 'lipi' ),
					'default'  => '',
             ),
		
			   array(
					'id'       => 'services-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Services Name', 'lipi' ),
					'subtitle'    => esc_html__( 'Replace breadcrumb name', 'lipi' ),
					'desc'     => '<strong>Appear as:</strong>  Home / <strong>Services</strong> / Graphics /',
					'default'  => '',
				),
				
				array(
					'id'       => 'services-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Services Home Page URL', 'lipi' ),
					'desc'     => '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Services</a> / Graphics /',
					'subtitle' => esc_html__( 'Custom home page URL for your services', 'lipi' ),
					'default'  => '',
				),
		
			)
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Settings', 'lipi' ),
        'id'               => 'theme_services_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			 array(
                'id'       => 'services_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Comments', 'lipi' ),
                'subtitle' => esc_html__( 'This option will display comments on the services single page', 'lipi' ),
                'default'  => false,
                'desc'  => 'ON == Enable',
            ),
			
	
		)
    ) );
	




/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO
/*-----------------------------------------------------------------------------------*/
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio', 'lipi' ),
        'id'               => 'theme_portfolio',
        'customizer_width' => '400px',
        'icon'             => 'el el-qrcode'
    ) );
	
	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'General', 'lipi' ),
		'id'               => 'theme_portfolio_general_settings',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
		
							array(
								'id'       => 'portfolio_related_post_title',
								'type'     => 'text',
								'title'    => esc_html__( 'Related Post Title', 'lipi' ),
								'default'  => 'Related Projects',
							),
			)
	) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Name', 'lipi' ),
        'id'               => 'theme_portfolio_custom_name_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			   array(
					'id'       => 'portfolio-slug-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Single Slug', 'lipi' ),
					'subtitle'  => esc_html__( 'Enter if you wish to use a different slug name.', 'lipi' ),
					'desc' => esc_html__( 'Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect', 'lipi' ),
					'default'  => '',
             ),
		
			   array(
					'id'       => 'portfolio-breadcrumb-name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Breadcrumb Name', 'lipi' ),
					'subtitle'    => esc_html__( 'Replace breadcrumb name', 'lipi' ),
					'desc'     => '<strong>Appear as:</strong>  Home / <strong>Portfolio</strong> / Graphics /',
					'default'  => '',
				),
				
				array(
					'id'       => 'portfolio-breadcrumb-custom-home-url',
					'type'     => 'text',
					'title'    => esc_html__( 'Portfolio Home Page URL', 'lipi' ),
					'desc'     => '<strong>Will link breadcrumb as:</strong>  Home / <a href="">Portfolio</a> / Graphics /',
					'subtitle' => esc_html__( 'Custom home page URL for your portfolio', 'lipi' ),
					'default'  => '',
				),
		
			)
    ) );	

	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Landing Page Settings', 'lipi' ),
        'id'               => 'theme_portfolio_landingpg_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
		
			array(
                'id'            => 'portfolio-records-per-page',
                'type'          => 'slider',
                'title'         => esc_html__( 'Records Per Page', 'lipi' ),
                'subtitle'      => esc_html__( 'Number of protfolio records per page', 'lipi' ),
                'desc'          => esc_html__( 'Default value: -1 (value "-1" will display all records)', 'lipi' ),
                'default'       => 6,
                'min'           => -1,
                'step'          => 1,
                'max'           => 25,
                'display_value' => 'label',
				'display_value' => 'text',
            ),
		
			array(
				'id'       => 'portfolio-record-display-order',
				'type'     => 'select',
				'title'    => esc_html__( 'Display Order', 'lipi' ),
				'subtitle' => esc_html__( 'Portfolio records display order ', 'lipi' ),
				'options'  => array(
					'1' => 'Ascending Order (ASC)',
					'2' => 'Descending Order (DESC)',
				),
				'default'  => '2'
			),
				
			array(
				'id'       => 'portfolio-record-display-order-by',
				'type'     => 'select',
				'title'    => esc_html__( 'Display Order By', 'lipi' ),
				'subtitle' => esc_html__( 'Portfolio records display order by', 'lipi' ),
				'options'  => array(
					'title' => 'Order by Title',
					'date' => 'Order by Date',
					'rand' => 'Order by Random',
					'modified' => 'Order by Modified',
					'comment_count' => 'Order by Comment Count',
					'menu_order' => 'Order by Page Order',
				),
				'default'  => 'rand'
			),
		
		)
    ) );	


	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Page Settings', 'lipi' ),
        'id'               => 'theme_portfolio_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			 array(
                'id'       => 'portfolio_comments',
                'type'     => 'switch',
                'title'    => esc_html__( 'Comments', 'lipi' ),
                'subtitle' => esc_html__( 'This option will display comments on the portfolio single page', 'lipi' ),
                'default'  => false,
                'desc'  => 'ON == Enable',
            ),
			
			 array(
                'id'       => 'portfolio_footer_nav',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Navigation', 'lipi' ),
                'subtitle' => esc_html__( 'This option will display portfolio Navigation on the footer section', 'lipi' ),
                'default'  => true,
                'desc'  => 'ON == Enable',
            ),
			
			array(
                'id'       => 'portfolio_social_share_mailto',
                'type'     => 'text',
                'title'    => esc_html__( 'Social Share Mailto :: SUBJECT', 'lipi' ),
                'subtitle' => esc_html__( 'Subject added to the mailto command.', 'lipi' ),
                'default'  => '',
            ),
			
			array(
                'id'       => 'portfolio-related-post',
                'type'     => 'section',
                'title'    => esc_html__( 'Related Portfolio', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
                'id'       => 'portfolio_related_post',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Related Portfolios', 'lipi' ),
                'subtitle' => esc_html__( 'Enabling this option will display related portfolios on portfolio single page', 'lipi' ),
                'default'  => false,
            ),
			
			array(
                'id'            => 'portfolio_related_post_no_of_records',
                'type'          => 'slider',
                'title'         => esc_html__( 'Number Of Records', 'lipi' ),
                'subtitle'      => esc_html__( 'Number of related post to display', 'lipi' ),
                'default'       => 4,
                'min'           => 3,
                'step'          => 1,
                'max'           => 4,
                'display_value' => 'label',
				'display_value' => 'text',
            ),
			
		
	
		)
    ) );


/*-----------------------------------------------------------------------------------*/
/*	BLOG
/*-----------------------------------------------------------------------------------*/
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'lipi' ),
        'id'               => 'theme_blog',
        'customizer_width' => '400px',
        'icon'             => 'el el-blogger'
    ) );
	
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'General', 'lipi' ),
		'id'               => 'theme_blog_general_settings',
		'subsection'       => true,
		'customizer_width' => '450px',
		'fields'           => array(
					array(
						'id'       => 'blog_read_more_text',
						'type'     => 'text',
						'title'    => esc_html__( 'Read More Text', 'lipi' ),
						'default'  => 'Continue Reading',
					),
			)
	) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Settings', 'lipi' ),
        'id'               => 'theme_blog_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			array(
                'id'       => 'blog_post_modified_date_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Display Post Modified Date', 'lipi' ),
                'subtitle' => esc_html__( 'Post modified date will appear under post title', 'lipi' ),
                'default'  => false,
            ),
			
			array(
                'id'       => 'blog_post_excerpts_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Display Post Excerpts On The Single Post Page', 'lipi' ),
                'subtitle' => esc_html__( 'Summaries of your content will appear on the single page at the top', 'lipi' ),
                'default'  => false,
            ),
			
			array(
                'id'       => 'blog_post_title_quote_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Display Post Titile if, Post fall under Quote Format', 'lipi' ),
                'subtitle' => esc_html__( 'If status is On, Title will appear on the Post Quote Format', 'lipi' ),
                'default'  => true,
            ),
		
			array(
                'id'       => 'blog_post_title_quote_morelink_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Display More link (CONTINUE READING) if, Post fall under Quote Format', 'lipi' ),
                'subtitle' => esc_html__( 'If status is On, more link will appear on the Post Quote Format', 'lipi' ),
                'default'  => false,
            ),
			
			array(
					'id'       => 'blog_default_landing_pg_sidebar_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Layout (Default Landing Page)', 'lipi' ),
					'subtitle' => esc_html__( 'Choose a sidebar layout for Blog Landing pages', 'lipi' ),
					'options'  => array(
						'1' => 'No Sidebar',
						'2' => 'Left Sidebar',
						'3' => 'Right Sidebar',
					),
					'default'  => '2'
			),
			
			array(
					'id'       => 'blog_small_thumb_landing_pg_sidebar_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Layout (Small Thumb Landing Page)', 'lipi' ),
					'subtitle' => esc_html__( 'Choose a sidebar layout for Blog Small Thumb Landing pages', 'lipi' ),
					'options'  => array(
						'1' => 'No Sidebar',
						'2' => 'Left Sidebar',
						'3' => 'Right Sidebar',
					),
					'default'  => '3'
			),

			array(
                'id'       => 'blog-default-character-limit',
                'type'     => 'section',
                'title'    => esc_html__( 'Default Landing Post Character Limit', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
                'id'            => 'blog_default_charater_limit_excerpt',
                'type'          => 'slider',
                'title'         => esc_html__( 'Charater Limit For Your Excerpt Content', 'lipi' ),
                'subtitle'      => esc_html__( 'Limit excerpt by words', 'lipi' ),
                'desc'          => esc_html__( 'Only work for the default landing page, default value: 250', 'lipi' ),
                'default'       => 250,
                'min'           => 1,
                'step'          => 1,
                'max'           => 500,
                'display_value' => 'label',
				'display_value' => 'text',
            ),
			
			
			array(
                'id'            => 'blog_default_charater_limit_blog_main_content',
                'type'          => 'slider',
                'title'         => esc_html__( 'Charater Limit For Your Blog Main Content', 'lipi' ),
                'subtitle'      => esc_html__( 'Limit excerpt by words', 'lipi' ),
                'desc'          => esc_html__( 'Only work for the default landing page, default value: 40', 'lipi' ),
                'default'       => 40,
                'min'           => 1,
                'step'          => 1,
                'max'           => 250,
                'display_value' => 'label',
				'display_value' => 'text',
            ),
			
			array(
                'id'       => 'blog-small-thumb-character-limit',
                'type'     => 'section',
                'title'    => esc_html__( 'Small Thumb Landing Post Character Limit', 'lipi' ),
                'indent'   => true, 
            ),
			
			array(
                'id'            => 'blog_small_thumb_charater_limit_excerpt',
                'type'          => 'slider',
                'title'         => esc_html__( 'Charater Limit For Your Excerpt Content', 'lipi' ),
                'subtitle'      => esc_html__( 'Limit excerpt by words', 'lipi' ),
                'desc'          => esc_html__( 'Only work for the masonry landing page, default value: 125', 'lipi' ),
                'default'       => 125,
                'min'           => 1,
                'step'          => 1,
                'max'           => 500,
                'display_value' => 'label',
				'display_value' => 'text',
            ),
			
			
			array(
                'id'            => 'blog_small_thumb_charater_limit_blog_main_content',
                'type'          => 'slider',
                'title'         => esc_html__( 'Charater Limit For Your Blog Main Content', 'lipi' ),
                'subtitle'      => esc_html__( 'Limit excerpt by words', 'lipi' ),
                'desc'          => esc_html__( 'Only work for the masonry landing page, default value: 25', 'lipi' ),
                'default'       => 25,
                'min'           => 1,
                'step'          => 1,
                'max'           => 250,
                'display_value' => 'label',
				'display_value' => 'text',
            ),
			
		)
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Single', 'lipi' ),
        'id'               => 'theme_blog_single_page',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
			array(
				'id'       => 'blog-single-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'lipi' ),
				'options'  => array(
					'h1' => 'H1',
					'h2' => 'H2',
				),
				'default'  => 'h2',
			),
		
			array(
				'id'       => 'blog-single-title-layout-type',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Design Layout', 'lipi' ),
				'subtitle' => esc_html__( 'Design layout types', 'lipi' ),
				'options'  => array(
					'1' => 'Classic Layout',
				),
				'default'  => '1'
			),
			
			array(
				'id'       => 'blog_single_sidebar_layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'lipi' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'lipi' ),
				'options'  => array(
					'1' => 'No Sidebar',
					'2' => 'Left Sidebar',
					'3' => 'Right Sidebar',
				),
				'default'  => '3'
			),
		
		
	    )
    ) );	
	
/*-----------------------------------------------------------------------------------*/
/*	FOOTER
/*-----------------------------------------------------------------------------------*/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'lipi' ),
        'id'               => 'theme_footer',
        'customizer_width' => '400px',
        'icon'             => 'el el-credit-card'
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Section', 'lipi' ),
        'id'               => 'theme_footer_section_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
				array(
					'id'       => 'theme_footer_section_widget_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Widget Area', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'disable_widget_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Footer Widget Area', 'lipi' ),
					'default'  => false,
				),
				
				array(
					'id'            => 'theme_footer_noof_section_widget_area',
					'type'          => 'slider',
					'title'         => esc_html__( 'Number Of Widget', 'lipi' ),
					'default'       => 4,
					'min'           => 1,
					'step'          => 1,
					'max'           => 4,
					'display_value' => 'label'
				),
				
				// ADD NEW SECTION
				array(
					'id'    => 'info_warning',
					'type'  => 'info',
					'title' => esc_html__('IMPORTANT! Adjust, \'Widget Area Column\' based to the \'Number Of Widget\' size chosen above', 'lipi'),
					'style' => 'critical',
					'desc'  => '<br>1. If selected \'Number Of Widget\' == 4, the <strong>total sum (Footer One + Footer Two + Footer Three + Footer Four)</strong> must be 12 while adjusting column <br> 2. If selected \'Number Of Widget\' == 3, the <strong>total sum (Footer One + Footer Two + Footer Three)</strong> must be 12 while adjusting column <br> 3. If selected \'Number Of Widget\' == 2, the <strong>total sum (Footer One + Footer Two)</strong> must be 12 while adjusting column ',
				),
				
				array(
					'id'       => 'theme_footer_redesign_start_column',
					'type'     => 'section',
					'title'    => esc_html__( 'Adjust, Widget Area Column', 'lipi' ),
					'indent'   => true, 
				),
			
				array(
					'id'            => 'footer_one_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer One Column', 'lipi' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),
				
				array(
					'id'            => 'footer_two_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer Two Column', 'lipi' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),
			
				array(
					'id'            => 'footer_three_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer Three Column', 'lipi' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),
			
				array(
					'id'            => 'footer_four_widget_column',
					'type'          => 'slider',
					'title'         => esc_html__( 'Footer Four Column', 'lipi' ),
					'default'       => 3,
					'min'           => 1,
					'step'          => 1,
					'max'           => 12,
					'display_value' => 'label',
					'display_value' => 'text'
				),	
				// EOF ADD NEW SECTION
				
				array(
					'id'       => 'theme_footer_section_social_copyright_start',
					'type'     => 'section',
					'title'    => esc_html__( 'Social/Copyright Area', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => 'disable_social_copyright_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Footer Social/copyright Area', 'lipi' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'disable_social_icons_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Social Icons', 'lipi' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'disable_copyright_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Copyright Section', 'lipi' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'footer_copyright_text_here',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Copyright text', 'lipi' ),
					'validate' => 'html', 
					'default'  => '&copy; 2019 <a href="http://wpsmartapps.com">wpsmartapps.com</a>.  All Rights Reserved.',
					'subtitle' => esc_html__( 'HTML Allowed', 'lipi' ),
              ),
				
				array(
					'id'       => 'disable_footer_nav_area',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Footer Navigation Section', 'lipi' ),
					'default'  => false,
				),
			
				
			
			  )
    ) );
	
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Icon', 'lipi' ),
        'id'               => 'theme_footer_social_icon_settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
		
		
					array(
						'id'       => 'social_icon_facebook_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Facebook URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_twitter_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Twitter URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_youtube_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Youtube URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_google_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Google URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_instagram_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Instagram URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_linkedin_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Linkedin URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_pinterest_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Pinterest URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_vimo_url',
						'type'     => 'text',
						'title'    => esc_html__( 'vimo URL', 'lipi' ),
						'default'  => '#',
					),
					
					array(
						'id'       => 'social_icon_tumblr_url',
						'type'     => 'text',
						'title'    => esc_html__( 'Tumblr URL', 'lipi' ),
						'default'  => '#',
					),
		
			  )
    ) );




/*-----------------------------------------------------------------------------------*/
/*	404
/*-----------------------------------------------------------------------------------*/

Redux::setSection( $opt_name, array(
        'title'  => esc_html__( '404', 'lipi' ),
        'id'     => '404-settings',
        'icon'   => 'el el-error-alt',
        'fields' => array(
		
				array(
					'id'       => '404_background_color',
					'type'     => 'color',
					'title'    => esc_html__( '404 Page Background Color', 'lipi' ),
					'default'  => '#F7F9F9',
					'transparent' => false,
				 ),
				
				array (
					'subtitle' => esc_html__('404 Background Image', 'lipi'),
					'id' => '404_background_image',
					'type' => 'media',
					'title' => esc_html__('Background Image', 'lipi'),
					'url' => true,
				),
				
				array(
					'id'       => '404_background_image_display',
					'type'     => 'select',
					'title'    => esc_html__( 'Image Display Position', 'lipi' ),
					'subtitle' => esc_html__( 'select background image display position', 'lipi' ),
					'options'  => array(
						'center top' => 'Center Top',
						'center center' => 'Center Center',
						'center bottom' => 'Center Bottom',
					),
					'default'  => 'center center'
				),
				
				array(
					'id'       => '404_msg_box_area',
					'type'     => 'section',
					'title'    => esc_html__( 'Message Box Area', 'lipi' ),
					'indent'   => true, 
				),
				
				array(
					'id'       => '404_wrap_text_alignment',
					'type'     => 'select',
					'title'    => esc_html__( 'Text Position', 'lipi' ),
					'options'  => array(
						'center' => 'Center',
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'center'
				),
				
				array(
					'id'             => '404_msg_box_margin',
					'type'           => 'spacing',
					'mode'           => 'margin',
					'units'          => array('px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Message Box Margin', 'lipi'),
					'default'            => array(
						'margin-top'     => '120px', 
						'margin-right'   => '1px', 
						'margin-bottom'  => '120px', 
						'margin-left'    => '1px',
						'units'          => 'px', 
					)
				),
				
				array(
					'id'       => '404_title_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Title Text', 'lipi' ),
					'desc'     => esc_html__( 'Enter if you wish to use a different botton text)', 'lipi' ),
					'default'  => '404',
				 ),
			
				array(
					'id'       => '404_title',
					'type'     => 'typography',
					'title'    => esc_html__( 'Title Text properties', 'lipi' ),
					'subtitle' => esc_html__('Specify the title text properties.', 'lipi' ),
					'google'   => true,
					'text-align' => false,
					'preview' => array( 'always_display' => false, ),
					'font-style' => false,
					'letter-spacing' => true,
					'subsets' => false,
					'units'  => false,
					'font-family'  => false,
					'default'  => array(
						'color'       => '#002e5b',
						'font-size'   => '180',
						'line-height' => '170',
						'letter-spacing' => '0.3',
						'google'      => true,
						'font-weight'      => '800',
					),
				),
				
				array(
					'id'       => '404_subtitle_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Subtitle Text', 'lipi' ),
					'default'  => 'The link BROKEN, or the page has been REMOVED. Try search our site.',
				),
				
				array(
					'id'       => '404_subtitle_text_color',
					'type'     => 'color',
					'title'    => esc_html__( 'Subtitle Color', 'lipi' ),
					'default'  => '#002e5b',
					'transparent' => false,
				 ),
			  
		
		)
) );


/*-----------------------------------------------------------------------------------*/
/*	FORUMS
/*-----------------------------------------------------------------------------------*/

	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'bbPress', 'lipi' ),
        'id'               => 'theme_bbpress',
        'customizer_width' => '400px',
        'icon'             => 'el el-comment-alt'
    ) );
	
	
	Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'General', 'lipi' ),
	'id'         => 'theme_bbpress_general',
	'subsection' => true,
	'fields'     => array(
	
				array(
						'id'       => 'bbpress_title_text',
						'type'     => 'text',
						'title'    => esc_html__( 'Title Text', 'lipi' ),
						'default'  => 'Community Forums',
				),
				
				array(
						'id'       => 'bbpress_subtitle_text',
						'type'     => 'text',
						'title'    => esc_html__( 'Sub Title Text', 'lipi' ),
						'subtitle'    => esc_html__( 'Only appear on the forum landing page', 'lipi' ),
						'default'  => 'Receive professional support and assistance with any issues',
				),
				
				array(
					'id'       => 'bbpress_breadcrumb',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Root Forums', 'lipi' ),
					'subtitle'    => __( 'Display Root "Forums" on your bbPress Breadcrumb', 'lipi' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'bbpress_display_search_on_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Search', 'lipi' ),
					'subtitle'    => __( 'Display search form on the forum page', 'lipi' ),
					'default'  => true,
				),

				array(
					'id'       => 'bbpress_display_sidebar_on_page_status',
					'type'     => 'switch',
					'title'    => esc_html__( 'Display Sidebar', 'lipi' ),
					'subtitle'    => __( 'Display sidebar on the forum page', 'lipi' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'bbpress_display_sidebar_position_left_right',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'lipi' ),
					'subtitle' => esc_html__( 'Display sidebar either on left or right side of the forum page', 'lipi' ),
					'options'  => array(
						'left' => 'Left',
						'right' => 'Right',
						'none' => 'None',
					),
					'default'  => 'left'
				),
				
				array(
					'id'       => 'bbpress_display_content_center',
					'type'     => 'switch',
					'title'    => esc_html__( 'Center Content', 'lipi' ),
					'default'  => false,
					'subtitle' => 'Click <code>on</code> <strong>to align</strong> content to center mode',
					'desc' => '<code>NOTE:</code> \'Sidebar Position\' MUST be \'None\' ',
				),

			 )
    ) );
	


/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERCE
/*-----------------------------------------------------------------------------------*/

global $woocommerce;
if ($woocommerce) {
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'WooCommerce', 'lipi' ),
        'id'               => 'theme_woocommerce',
        'customizer_width' => '400px',
        'icon'             => 'el el-shopping-cart'
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'lipi' ),
        'id'         => 'theme_woocommerce_general',
        'subsection' => true,
        'fields'     => array(
		
				array(
					'id'       => 'shop_header_layout',
					'type'     => 'switch',
					'title'    => esc_html__( 'Apply Shop Header Layout On The Single Product Page', 'lipi' ),
					'subtitle'    => __( 'The default shop page <strong><i>(www.siteurl.com/shop)</i></strong> header will be applied to the single product page', 'lipi' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'woo_column_product_listing',
					'type'     => 'select',
					'title'    => esc_html__( 'Number Of Columns', 'lipi' ),
					'subtitle' => esc_html__( 'Choose number of columns for product listing', 'lipi' ),
					'options'  => array(
						'3' => '3 Columns',
						'4' => '4 Columns',
					),
					'default'  => '3'
				),
				
				array(
					'id'       => 'woo_hide_add_to_card_shop_cat',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Add To Cart (main shop & category page)', 'lipi' ),
					'subtitle'    => __( 'Disable Add To Cart from shop and category page', 'lipi' ),
					'default'  => false,
				),
				
				array(
					'id'       => 'woo_display_sidebar_on_product_listing_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Sidebar (main shop page)', 'lipi' ),
					'subtitle'    => __( 'Disable sidebar on the product listing page i.e on default shop page', 'lipi' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'woo_display_sidebar_on_single_product_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Sidebar (single product page)', 'lipi' ),
					'subtitle'    => __( 'Enable sidebar on the single product page', 'lipi' ),
					'default'  => true,
				),
				
				array(
					'id'       => 'woo_display_sidebar_position_left_right',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Position', 'lipi' ),
					'subtitle' => esc_html__( 'Display sidebar either on left or right side of the product listing page', 'lipi' ),
					'options'  => array(
						'left' => 'Left',
						'right' => 'Right',
					),
					'default'  => 'left'
				),
				
				array(
					'id'       => 'woo_no_of_related_products',
					'type'     => 'select',
					'title'    => esc_html__( 'Number Of Related Products', 'lipi' ),
					'subtitle' => esc_html__( 'Choose number of related products', 'lipi' ),
					'options'  => array(
						'3' => '3 Columns',
						'4' => '4 Columns',
					),
					'default'  => '3'
				),
	
		 )
    ) );
	
}



/**********************************
*   CSS/JS CUSTOM CODE SECTION
**********************************/
	
	 Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Code Editor (CSS,JS)', 'lipi' ),
        'id'               => 'theme_custom_code_add',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom CSS, JS Code', 'lipi' ),
        'id'         => 'theme_custom_code_add_css_js',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'theme-add-extra-css-code',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Custom Code', 'lipi' ),
                'desc'     => 'Enter your custom CSS here  <br><br> <strong>NOTE: Please do not include the  &lt;style&gt; tags.',
                'mode'     => 'css',
                'theme'    => 'monokai',
            ),
            array(
                'id'       => 'theme-add-extra-js-code',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'JS Custom Code', 'lipi' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'lipi' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'desc'     => 'Will appear before close body tag (&lt;/body&gt;) <br><br> <strong>NOTE: Please do not include the  &lt;script&gt; tags.</strong>',
            ),

        )
    ) );
	
	 
/*-----------------------------------------------------------------------------------*/
/*	Eof Theme Options
/*-----------------------------------------------------------------------------------*/
	 
    /*
     * <--- END SECTIONS
     */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            $sections[] = array(
                'title'  => __( 'Section via hook', 'lipi' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'lipi' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }