<?php
/*-----------------------------------------------------------------------------------*/
/*	 POST :: FORMAT OPTIONS
/*-----------------------------------------------------------------------------------*/

/*** QUOTE POST FORMAT ***/
add_action( 'cmb2_admin_init', 'lipi__post_format_quote' );
function lipi__post_format_quote() {

    $prefix = '__lipi_';

    $cmb = new_cmb2_box( array(
        'id'            => 'blog_admin_post_format_quote',
        'title'         => esc_html__( 'Quote Post Format', 'lipi' ),
        'object_types'  => array( 'post', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );
	
	$cmb->add_field( array(
	    'name'    => esc_html__( 'Quote', 'lipi' ),
		'id'      => $prefix.'post_format_quote',
		'type'    => 'text',
	) );
	
}

/*** AUDIO POST FORMAT ***/
add_action( 'cmb2_admin_init', 'lipi__post_format_audio' );
function lipi__post_format_audio() {

    $prefix = '__lipi_';

    $cmb = new_cmb2_box( array(
        'id'            => 'blog_admin_post_format_audio',
        'title'         => esc_html__( 'Audio Post Format', 'lipi' ),
        'object_types'  => array( 'post', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );
	
	$cmb->add_field( array(
	    'name'    => esc_html__( 'Audio Link ', 'lipi' ),
		'id'      => $prefix.'post_format_audio',
		'type'    => 'text',
	) );
	
}

/*** LINK POST FORMAT ***/
add_action( 'cmb2_admin_init', 'lipi__post_format_link' );
function lipi__post_format_link() {

    $prefix = '__lipi_';

    $cmb = new_cmb2_box( array(
        'id'            => 'blog_admin_post_format_link',
        'title'         => esc_html__( 'Link Post Format', 'lipi' ),
        'object_types'  => array( 'post', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );
	
	$cmb->add_field( array(
	    'name'    => esc_html__( 'Link ', 'lipi' ),
		'id'      => $prefix.'post_format_link',
		'type'    => 'text',
	) );
	
}


/*-----------------------------------------------------------------------------------*/
/*	 PAGE :: Navigation Menu Control
/*-----------------------------------------------------------------------------------*/
add_action( 'cmb2_admin_init', 'lipi__page_navigation_menu_control' );
function lipi__page_navigation_menu_control() {
    $prefix = '__lipi_';
    $cmb = new_cmb2_box( array(
        'id'            => 'page_navigation_section_control',
        'title'         => esc_html__( 'Navigation Style Controls', 'lipi' ),
        'object_types'  => array( 'page', 'post', 'lipi_portfolio', 'lipi_kb', 'lipi_services' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => false,
    ) );
	
	// fields start
	$cmb->add_field( array(
    'name'             => esc_html__( 'Nav Bar Style', 'lipi' ),
    'desc'             => 'Select an option',
    'id'               => $prefix .'header_menu_bar_type',
    'type'             => 'select',
    'default'          => 'standard',
	'desc'             => 'To enable "Transparent Background" <strong>one of 4 available options below must be active;</strong>
						  <br> 1. If choose, "Page Header Background Color" OR
						  <br> 2. If upload, "Page Header Image" OR 
						  <br> 3. If enter, "Slider Revolution ShortCode"  OR 
						  <br> 4. If activate, "Header Slider". <br><br>
						  Please use "Page Header Configuration" below to configure one of 4 available option above.
						  ',
    'options'          => array(
        'standard' => esc_html__( 'Without Background (White Backgorund)', 'lipi' ),
        'custom'   => esc_html__( 'With Transparent Background', 'lipi' ),
		),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Hide Navigation Area Initially', 'lipi' ),
		'desc' => esc_html__( 'Enabling this option will initially hide the header, and it will only display when the user scrolls down the page. (NOTE: Sticky Menu, must be enable to display menu)', 'lipi' ),
		'id'   => $prefix .'header_nav_hide_initally',
		'type' => 'checkbox'
	) );
	
    $cmb->add_field( array(
		'name' => esc_html__( 'Add Nav Background', 'lipi' ),
		'desc' => 'If checked, transparent background will be added on header nav bar.',
		'id'   => $prefix .'header_nav_bar_bg_color_status',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Nav Background Color', 'lipi' ),
		'id'      => $prefix .'nav_bar_bg_color',
		'type'    => 'colorpicker',
		'default' => '#35373F',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Nav Background Color Opacity', 'lipi' ),
		'default' => '',
		'id'      => $prefix .'nav_bar_bg_color_opacity',
		'type'    => 'text_small',
		'desc' => 'Default:0.3 (Make sure opacity value is between 0.1 to 0.9)',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add Nav Border Bottom', 'lipi' ),
		'desc' => esc_html__( 'If checked, transparent border will be added on header nav bar (works best with header type "Transparent Background")', 'lipi' ),
		'id'   => $prefix .'header_nav_transparent_border_status',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Nav Border Bottom Color', 'lipi' ),
		'id'      => $prefix .'nav_border_color',
		'type'    => 'colorpicker',
		'default' => '#949494',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Nav Border Bottom Color Opacity', 'lipi' ),
		'default' => '',
		'id'      => $prefix .'nav_border_opacity',
		'type'    => 'text_small',
		'desc' => 'Default:0.12 (Make sure opacity value is between 0.1 to 0.9)',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Add Nav Box Shadow', 'lipi' ),
		'desc' => 'If checked, Box Shadow will be added on the header nav bar <strong style="color:#e6614b;">replacing Nav Border Bottom</strong>.',
		'id'   => $prefix .'add_nav_box_shadow',
		'type' => 'checkbox'
	) );
	// eof fields
}	
	


/*-----------------------------------------------------------------------------------*/
/*	 PAGE - POST :: OPTIONS
/*-----------------------------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'lipi__page_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function lipi__page_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '__lipi_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'page_options',
        'title'         => esc_html__( 'Page Header Configuration', 'lipi' ),
        'object_types'  => array( 'page', 'post', 'lipi_portfolio', 'lipi_kb', 'lipi_services' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate Top Header', 'lipi' ),
		'desc' => 'If checked, top header will activate replacing theme option settings <strong style="color:#e6614b;">Only, work for page</strong>',
		'id'   => $prefix .'top_header_activate_status',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Hide Header Bar', 'lipi' ),
		'desc' => 'Check to hide header bar that appear right after logo & menu bar.',
		'id'   => $prefix .'header_hide_header_bar',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
    'name'    => esc_html__( 'Re-adjust Header Height/Padding', 'lipi' ), 
    'desc'    => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT) <br> <strong style="color:#e6614b;">IMPORTANT: Make sure value of RIGHT, LEFT are always 15px</strong>', 
    'default' => '26px 15px 20px 15px',
    'id'      => $prefix.'readjust_padding_height',
    'type'    => 'text'
	) );
	
	$cmb->add_field( array(
    'name'    => esc_html__( 'Responsive :: Re-adjust Header Height/Padding', 'lipi' ), 
    'desc'    => 'Default: 26px 15px 20px 15px (TOP, RIGHT, BOTTOM, LEFT) <br> <strong style="color:#e6614b;">IMPORTANT: Make sure value of RIGHT, LEFT are always 15px</strong>', 
    'default' => '26px 15px 20px 15px',
    'id'      => $prefix.'readjust_padding_height_responsive',
    'type'    => 'text',
	'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Page Header Background Color', 'lipi' ),
		'desc' => 'Background color <strong>will NOT work</strong> if checked option <strong>\'Apply Parallax Effect For the Upload Image\'</strong> ',
		'id'   => $prefix .'header_background_color',
		'type' => 'colorpicker'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Page Header Background Linear Gradient Color', 'lipi' ),
		'id'   => $prefix .'header_linear_background_color',
		'desc' => '<strong style="color:#e6614b;">NOTE: Page Header Background Color must be enable to activate this feature.</strong>',
		'type' => 'colorpicker',
		'classes' => 'theme_metabox_margin_left_50',
	) );

	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Page Header Image', 'lipi' ), 
		'desc'    => esc_html__( 'Upload image for your header (Note: Does not work if, place Slider Revolution shortcode or checked Lipi slider) ' , 'lipi' ),
		'id'      => $prefix .'header_background_image',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => true, 
			'add_upload_file_text' => 'Add Or Upload File' 
		),
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Background Image Display Position', 'lipi' ),
		'desc'             => 'Select an option',
		'id'               => $prefix .'background_img_display_position',
		'type'             => 'select',
		'default'          => 'center center',
		'options'          => array(
			'center top'      => esc_html__( 'Center Top', 'lipi' ),
			'center center'   => esc_html__( 'Center Center', 'lipi' ),
			'center bottom'   => esc_html__( 'Center Bottom', 'lipi' ),
			),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Apply Parallax Effect For the Upload Image', 'lipi' ),
		'desc' => esc_html__( 'If checked, Parallax effect will activate', 'lipi' ),
		'id'   => $prefix .'header_parallax_status',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Remove Opacity (Transparency) For the Upload Image', 'lipi' ),
		'desc' => esc_html__( 'If checked, background opacity Will be removed', 'lipi' ),
		'id'   => $prefix .'header_image_opacity_status',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Background Opacity Color For the Upload Image', 'lipi' ),
		'desc' => esc_html__( 'Replace default opacity color', 'lipi' ),
		'id'   => $prefix .'header_bg_image_opacity_color',
		'type' => 'colorpicker',
		'classes' => 'theme_metabox_margin_left_50'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Background Color Opacity Depth', 'lipi' ),
		'id'   => $prefix .'header_bg_image_opacity_color_depth',
		'desc' => '(Default: 0.3) Make sure opacity value is between 0.1 to 0.9',
		'type' => 'text_small',
		'classes' => 'theme_metabox_margin_left_50',
	) );
	
	$cmb->add_field( array(
		'name'    => esc_html__( 'Slider Revolution ShortCode', 'lipi' ),
		'desc'    => 'Will replace header image or background color (Copy and paste your shortcode located in "Slider Revolution -> Slider Revolution -> Embed Slider")',
		'id'      => $prefix .'slider_revolution_shortcode',
		'type'    => 'text',
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate Search Box', 'lipi' ),
		'desc' => esc_html__( 'If checked, Lipi ajax search box will appear on the header', 'lipi' ),
		'id'   => $prefix .'header_searchbox_status',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Search Box Display Column Layout', 'lipi' ),
		'desc'             => 'Select an option',
		'id'               => $prefix .'search_box_display_grid',
		'type'             => 'select',
		'default'          => '12',
		'classes'          => 'theme_metabox_margin_left_50',
		'options'          => array(
			'6'      => esc_html__( '50% Width', 'lipi' ),
			'7'   => esc_html__( '58% Width', 'lipi' ),
			'8'   => esc_html__( '66% Width', 'lipi' ),
			'9'   => esc_html__( '75% Width', 'lipi' ),
			'10'   => esc_html__( '83% Width', 'lipi' ),
			'11'   => esc_html__( '91% Width', 'lipi' ),
			'12'   => esc_html__( '100% Width', 'lipi' ),
			),
	) );
	
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Make Search Box Appear Center', 'lipi' ),
		'desc' => esc_html__( 'Display search box on the center, NOTE: If activate, column layout will not work', 'lipi' ),
		'id'   => $prefix .'header_searchbox_status_center',
		'type' => 'checkbox',
		'classes' => 'theme_metabox_margin_left_50'
	) );
	
	
}


add_action( 'cmb2_admin_init', 'lipi__page_replacement_metaboxes' );
function lipi__page_replacement_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '__lipi_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'page_replacement_options',
        'title'         => esc_html__( 'Header Text Settings', 'lipi' ),
        'object_types'  => array( 'page', 'post', 'lipi_portfolio', 'lipi_kb', 'lipi_services' ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
    'name'             => esc_html__( 'Text Alignment', 'lipi' ),
    'desc'             => esc_html__( 'Specify Title, Subtitle text alignment', 'lipi' ),
    'id'               => $prefix .'header_text_alignment_tye',
    'type'             => 'select',
    'default'          => 'left',
    'options'          => array(
        'left'    => esc_html__( 'Left', 'lipi' ),
		'center'  => esc_html__( 'Center', 'lipi' ),
        'right'   => esc_html__( 'Right', 'lipi' ),
		),
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Disable Main/Replacement Title', 'lipi' ),
		'desc' => esc_html__( 'If checked, title will be disable', 'lipi' ),
		'id'   => $prefix .'header_disable_main_replacement_title',
		'type' => 'checkbox'
	) );
	
	$cmb->add_field( array(
    'name'    => esc_html__( 'Replacement Title', 'lipi' ),
    'desc'    => esc_html__( 'New page tagline', 'lipi' ), 
    'id'      => $prefix.'replacement_title',
    'type'    => 'text',
	) );

	$group_field_title_text_other_settings = $cmb->add_field( array(
    'id'          => $prefix.'title_text_settings',
    'type'        => 'group',
    'repeatable'  => false,
    'options'     => array(
        'group_title'   => esc_html__( '[+] Replacement Title Text Style', 'lipi' ), 
        'add_button'    => esc_html__( 'Add Another Entry', 'lipi' ),
        'remove_button' => esc_html__( 'Remove Entry', 'lipi' ),
        'sortable'      => true, 
        'closed'       => true, 
    ),
	) );
	
	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'    => esc_html__( 'Text Color', 'lipi' ),  
    'id'      => 'title_text_color',
    'type'    => 'colorpicker',
	'desc'    => '<strong>Default: #4d515c</strong>  (NOTE: for image background use #FFFFFF)',
	) );
	
	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'    => esc_html__( 'Text Size', 'lipi' ),
    'desc'    => '<strong>Default:19px</strong> (please enter as: 19px)',
    'default' => '19px',
    'id'      => 'title_text_size',
    'type'    => 'text_small'
	) );
	
	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'             => esc_html__( 'Title Weight', 'lipi' ),
    'id'               => 'title_text_weight',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => '600',
	'desc'    => '<strong>Default: Semi-Bold 600</strong>',
    'options'          => array(
        '100' => esc_html__( 'Thin 100', 'lipi' ),
        '200'   => esc_html__( 'Extra-Light 200', 'lipi' ),
        '300'     => esc_html__( 'Light 300', 'lipi' ),
        '400'     => esc_html__( 'Regular 400', 'lipi' ),
        '500'     => esc_html__( 'Medium 500', 'lipi' ),
        '600'     => esc_html__( 'Semi-Bold 600', 'lipi' ),
        '700'     => esc_html__( 'Bold 700', 'lipi' ),
        '800'     => esc_html__( 'Extra-Bold 800', 'lipi' ),
        '900'     => esc_html__( 'Ultra-Bold 900', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'             => esc_html__( 'Font Family', 'lipi' ),
    'id'               => 'title_text_font_family',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => array(
		'Poppins' => esc_html__( 'Poppins', 'lipi' ),
		'Montserrat' => esc_html__( 'Montserrat', 'lipi' ),
    ),
	) );

	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'             => esc_html__( 'Title Text Transform', 'lipi' ),
    'id'               => 'title_text_transform',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => 'none',
    'options'          => array(
        'uppercase' => esc_html__( 'Uppercase', 'lipi' ),
        'capitalize'   => esc_html__( 'Capitalize', 'lipi' ),
        'none'     => esc_html__( 'None', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'    => esc_html__( 'Letter Spacing', 'lipi' ),
    'desc'    => '<strong>Example: -1.2px, 2px ... etc</strong> ',
    'default' => '',
    'id'      => 'title_text_letterspecing',
    'type'    => 'text_small'
	) );
	
	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'    => esc_html__( 'Padding', 'lipi' ),
    'desc'    => '<strong>Default: 0px 0px 0px 0px (top, right, buttom, left)</strong> ',
    'default' => '',
    'id'      => 'title_text_padding',
    'type'    => 'text'
	) );
	
	$cmb->add_group_field( $group_field_title_text_other_settings, array(
    'name'    => esc_html__( 'Line Height', 'lipi' ),
    'desc'    => 'example:35px',
    'default' => '',
    'id'      => 'title_text_line_height',
    'type'    => 'text'
	) );
	
	
	$cmb->add_field( array(
    'name'    => esc_html__( 'Subtitle Text', 'lipi' ),
    'desc'    => esc_html__( 'Enter your subtitle text (will appear under title)', 'lipi' ), 
    'id'      => $prefix.'desc_under_title',
    'type'    => 'text',
	) );
	
	$group_field_subtitle_text_other_settings = $cmb->add_field( array(
    'id'          => $prefix.'subtitle_text_settings',
    'type'        => 'group',
    'repeatable'  => false,
    'options'     => array(
        'group_title'   => esc_html__( '[+] Subtitle Text Style', 'lipi' ), 
        'add_button'    => esc_html__( 'Add Another Entry', 'lipi' ),
        'remove_button' => esc_html__( 'Remove Entry', 'lipi' ),
        'sortable'      => true, 
        'closed'       => true, 
    ),
	) );
	
	$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
    'name'    => esc_html__( 'Text Color', 'lipi' ),  
    'id'      => 'title_text_color',
    'type'    => 'colorpicker',
	'desc'    => 'NOTE: for image background use #FFFFFF',
	) );
	
	$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
    'name'    => esc_html__( 'Text Size', 'lipi' ),
    'default' => '14px',
    'id'      => 'title_text_size',
    'type'    => 'text_small'
	) );
	
	$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
    'name'             => esc_html__( 'Title Weight', 'lipi' ),
    'id'               => 'title_text_weight',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => '400',
    'options'          => array(
        '100' => esc_html__( 'Thin 100', 'lipi' ),
        '200'   => esc_html__( 'Extra-Light 200', 'lipi' ),
        '300'     => esc_html__( 'Light 300', 'lipi' ),
        '400'     => esc_html__( 'Regular 400', 'lipi' ),
        '500'     => esc_html__( 'Medium 500', 'lipi' ),
        '600'     => esc_html__( 'Semi-Bold 600', 'lipi' ),
        '700'     => esc_html__( 'Bold 700', 'lipi' ),
        '800'     => esc_html__( 'Extra-Bold 800', 'lipi' ),
        '900'     => esc_html__( 'Ultra-Bold 900', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
    'name'             => esc_html__( 'Font Family', 'lipi' ),
    'id'               => 'subtitle_font_family',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => array(
		'Poppins' => esc_html__( 'Poppins', 'lipi' ),
		'Montserrat' => esc_html__( 'Montserrat', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
    'name'             => esc_html__( 'Text Transform', 'lipi' ),
    'id'               => 'subtitle_text_transform',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => 'none',
	'desc'    => '<strong>Default: none</strong>',
    'options'          => array(
        'uppercase' => esc_html__( 'Uppercase', 'lipi' ),
        'capitalize'   => esc_html__( 'Capitalize', 'lipi' ),
        'none'     => esc_html__( 'None', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
    'name'    => esc_html__( 'Letter Spacing', 'lipi' ),
    'desc'    => '<strong>Example: -1.2px, 2px ... etc</strong> ',
    'default' => '',
    'id'      => 'sub_title_text_letterspecing',
    'type'    => 'text_small'
	) );
	
	$cmb->add_group_field( $group_field_subtitle_text_other_settings, array(
    'name'    => esc_html__( 'Padding', 'lipi' ),
    'desc'    => '<strong>Default: 0px 0px 0px 0px (top right buttom left)</strong> ',
    'default' => '',
    'id'      => 'sub_title_text_padding',
    'type'    => 'text'
	) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Disable Breadcrumb', 'lipi' ),
		'desc' => esc_html__( 'If checked, breadcrumb will be disable', 'lipi' ),
		'id'   => $prefix .'header_breadcrumb_status',
		'type' => 'checkbox'
	) );
	
	$group_breadcrumb_other_settings = $cmb->add_field( array(
    'id'          => $prefix.'breadcrumb_settings',
    'type'        => 'group',
    'repeatable'  => false,
    'options'     => array(
        'group_title'   => esc_html__( '[+] Breadcrumb Style', 'lipi' ), 
        'add_button'    => esc_html__( 'Add Another Entry', 'lipi' ),
        'remove_button' => esc_html__( 'Remove Entry', 'lipi' ),
        'sortable'      => true, 
        'closed'       => true, 
    ),
	) );
	
	$cmb->add_group_field( $group_breadcrumb_other_settings, array(
    'name'    => esc_html__( 'Text Color', 'lipi' ),  
    'id'      => 'text_color',
    'type'    => 'colorpicker',
	'desc'    => 'NOTE: for image background use #F4F4F4',
	) );

	$cmb->add_group_field( $group_breadcrumb_other_settings, array(
    'name'    => esc_html__( 'Link Text Color', 'lipi' ),  
    'id'      => 'link_text_color',
    'type'    => 'colorpicker',
	'desc'    => 'NOTE: for image background use #FFFFFF',
	) );

	$cmb->add_group_field( $group_breadcrumb_other_settings, array(
    'name'    => esc_html__( 'Link Text Hover Color', 'lipi' ),  
    'id'      => 'link_text_hover_color',
    'type'    => 'colorpicker',
	) );
	
	$cmb->add_group_field( $group_breadcrumb_other_settings, array(
    'name'    => esc_html__( 'Breadcrumb Speration/Arrow color', 'lipi' ),  
    'id'      => 'link_arrow_color',
    'type'    => 'colorpicker',
	) );
	
}





/*-----------------------------------------------------------------------------------*/
/*	 PAGE :: Lipi SLIDER
/*-----------------------------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'lipi__page_metaboxes_bindslider' );
/**
 * Define the metabox and field configurations.
 */
function lipi__page_metaboxes_bindslider() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '__lipi_';
	
	 /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'page_bind_slider_options',
        'title'         => esc_html__( 'Lipi Slider (Header Slider)', 'lipi' ),
        'object_types'  => array( 'page', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
		'name' => esc_html__( 'Activate Lipi Slider', 'lipi' ),
		'desc' => 'If checked, Lipi slider will activate <strong>replacing slider revolution shortcode or background image or background color</strong>',
		'id'   => $prefix.'slider_active_status',
		'type' => 'checkbox'
	) );

	$cmb->add_field( array(
		'name'    => esc_html__( 'Lipi Slider Height', 'lipi' ), 
		'desc'    => '<strong>(Default: 520px)</strong> Re-adjust slider height',
		'default' => '520px',
		'id'      => $prefix.'slider_height',
		'type'    => 'text',
	) );
	
	$bind_slider_group_field_id = $cmb->add_field( array(
		'id'          => $prefix.'header_flex_group',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => esc_html__( 'Lipi Slider {#}', 'lipi' ), 
			'add_button'    => esc_html__( 'Add Another Entry', 'lipi' ),
			'remove_button' => esc_html__( 'Remove Entry', 'lipi' ),
			'sortable'      => true, // beta
			'closed'        => true, // true to have the groups closed by default
		),
	) );

	$cmb->add_group_field( $bind_slider_group_field_id, array(
		'name' => esc_html__( 'Upload Image', 'lipi' ), 
		'id'   => 'image',
		'type' => 'file',
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
		'name' => esc_html__( 'Apply Opacity (Transparency) For the Upload Image', 'lipi' ), 
		'id'   => 'image_opacity',
		'type' => 'checkbox',
		'desc' => esc_html__( 'If checked, background opacity will be added', 'lipi' ),
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name'             => esc_html__( 'Background Image Display Position', 'lipi' ),
    'id'               => 'slider_img_display_position',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => 'center center',
    'options'          => array(
        'center top'      => esc_html__( 'Center Top', 'lipi' ),
		'center center'   => esc_html__( 'Center Center', 'lipi' ),
		'center bottom'   => esc_html__( 'Center Bottom', 'lipi' ),
    ),
	) );

	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name' => esc_html__( 'Title', 'lipi' ),
    'id'   => 'flex-title',
    'type' => 'text',
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
	'name'    => esc_html__( 'Title Font Size', 'lipi' ),
	'desc'    => esc_html__( 'Default: 52px', 'lipi' ),
	'default' => '52px',
	'id'      => 'bind_slider_title_size',
	'type'    => 'text_small'
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name'             => esc_html__( 'Title Weight', 'lipi' ),
    'desc'             => esc_html__( '((Default: 900)) redefine weight of the title', 'lipi' ), 
    'id'               => 'redefine_title_weight',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => '900',
    'options'          => array(
        '100' => esc_html__( 'Thin 100', 'lipi' ),
        '200'   => esc_html__( 'Extra-Light 200', 'lipi' ),
        '300'     => esc_html__( 'Light 300', 'lipi' ),
        '400'     => esc_html__( 'Regular 400', 'lipi' ),
        '500'     => esc_html__( 'Medium 500', 'lipi' ),
        '600'     => esc_html__( 'Semi-Bold 600', 'lipi' ),
        '700'     => esc_html__( 'Bold 700', 'lipi' ),
        '800'     => esc_html__( 'Extra-Bold 800', 'lipi' ),
        '900'     => esc_html__( 'Ultra-Bold 900', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name'             => esc_html__( 'Title Font Family', 'lipi' ),
    'id'               => 'redefine_title_font',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => array(
        'Raleway' => esc_html__( 'Raleway', 'lipi' ),
		'Open Sans' => esc_html__( 'Open Sans', 'lipi' ),
		'Lato' => esc_html__( 'Lato', 'lipi' ),
		'Roboto' => esc_html__( 'Roboto', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name' => esc_html__( 'Title Margin Top', 'lipi' ),
    'id'   => 'flex-title-margin-top',
    'type' => 'text_small',
	'desc'    => '<strong>Default:</strong> 50px',
	'default' => '50px',
	) );
	
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name' => esc_html__( 'Sub Title', 'lipi' ),
    'id'   => 'flex-sub-title',
    'type' => 'text',
	) );

	$cmb->add_group_field( $bind_slider_group_field_id, array(
	'name'    => esc_html__( 'Sub Title Font Size', 'lipi' ),
	'desc'    => esc_html__( 'Default: 22px', 'lipi' ),
	'default' => '22px',
	'id'      => 'bind_slider_sub_title_size',
	'type'    => 'text_small'
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name'             => esc_html__( 'Sub Title Weight', 'lipi' ),
    'desc'             => esc_html__( '(Default: 300) redefine weight of the title', 'lipi' ), 
    'id'               => 'redefine_sub_title_weight',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => '300',
    'options'          => array(
        '100' => esc_html__( 'Thin 100', 'lipi' ),
        '200'   => esc_html__( 'Extra-Light 200', 'lipi' ),
        '300'     => esc_html__( 'Light 300', 'lipi' ),
        '400'     => esc_html__( 'Regular 400', 'lipi' ),
        '500'     => esc_html__( 'Medium 500', 'lipi' ),
        '600'     => esc_html__( 'Semi-Bold 600', 'lipi' ),
        '700'     => esc_html__( 'Bold 700', 'lipi' ),
        '800'     => esc_html__( 'Extra-Bold 800', 'lipi' ),
        '900'     => esc_html__( 'Ultra-Bold 900', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name'             => esc_html__( 'Sub Title Font Family', 'lipi' ),
    'id'               => 'redefine_sub_title_font',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => array(
        'Raleway' => esc_html__( 'Raleway', 'lipi' ),
		'Open Sans' => esc_html__( 'Open Sans', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name' => esc_html__( 'Message Box Padding', 'lipi' ),
    'id'   => 'flex-message-box-padding',
    'type' => 'text',
	'desc'    => '<strong>Format:</strong> (14% 10% 0px 10%) == (top right bottom left) <br>WARNING:: Make sure to keep space',
	'default' => '14% 10% 0px 10%',
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name'             => esc_html__( 'Message Box Text Align', 'lipi' ),
    'desc'             => esc_html__( 'redefine text alignment', 'lipi' ), 
    'id'               => 'redefine_message_box_alignment',
    'type'             => 'select',
    'show_option_none' => false,
    'default'          => 'center',
    'options'          => array(
        'left'    => esc_html__( 'Left', 'lipi' ),
        'center'  => esc_html__( 'Center', 'lipi' ),
        'right'   => esc_html__( 'Right', 'lipi' ),
    ),
	) );
	
	$cmb->add_group_field( $bind_slider_group_field_id, array(
    'name'    => esc_html__( 'Text Color', 'lipi' ),
    'id'      => 'bind_slider_color',
    'type'    => 'colorpicker',
    'default' => '#ffffff',
	'desc'    => esc_html__( '(Default: #FFFFFF)', 'lipi' ), 
	) );
	
}


/*-----------------------------------------------------------------------------------*/
/*	 PAGE :: SIDEBAR OPTIONS
/*-----------------------------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'lipi__page_format_sidebar' );
function lipi__page_format_sidebar() {

    $prefix = '__lipi_';

    $cmb = new_cmb2_box( array(
        'id'            => 'page_admin_sidebar',
        'title'         => esc_html__( 'Page Sidebar', 'lipi' ),
        'object_types'  => array( 'page', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
		'closed'     => true,
    ) );
	
	$cmb->add_field( array(
		'name'             => esc_html__( 'Sidebar Layout', 'lipi' ),
		'desc'             => 'Choose the sidebar layout <strong>(Only work for the page template: "default")</strong>',
		'id'               => $prefix .'page_sidebar_layout_status',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => '',
		'options'          => array(
			'left'    => esc_html__( 'Left', 'lipi' ),
			'right'   => esc_html__( 'Right', 'lipi' ),
			),
	) );
	
}

?>