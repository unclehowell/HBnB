<?php 
/*-----------------------------------------------------------------------------------*/
/*	THEME FAVICON
/*-----------------------------------------------------------------------------------*/ 

function lipi__header_call() {
	global $lipi_theme_options;
	if(!empty($lipi_theme_options['general_bind_theme_favicon']['url'])){  
		echo '<link href="'.esc_url($lipi_theme_options['general_bind_theme_favicon']['url']).'" rel="shortcut icon">'; 
	}
}
add_action('wp_head', 'lipi__header_call');


/*-----------------------------------------------------------------------------------*/
/*	Enqueue scripts and styles.
/*-----------------------------------------------------------------------------------*/ 
function lipi__scripts() {
	
	global  $post, $woocommerce, $lipi_theme_options;
	
	// Internet Explorer HTML5 support 
    wp_enqueue_script( 'html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', array(), '3.7.3', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    // Internet Explorer 8 media query support
    wp_enqueue_script( 'respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '1.4.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	

	// other support
	wp_enqueue_script( 'bootstrap', trailingslashit(get_template_directory_uri()) . 'js/lib/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'jquery-flexslider', trailingslashit(get_template_directory_uri()) . 'js/flexslider/jquery.flexslider.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lipi-parallax-main', trailingslashit( get_template_directory_uri() ) . 'js/parallax/parallax.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lipi-parallax', trailingslashit( get_template_directory_uri() ) . 'js/parallax/parallax.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'owl-carousel', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.carousel.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'isotope', trailingslashit( get_template_directory_uri() ) . 'js/isotope/isotope.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'imagesloaded', trailingslashit( get_template_directory_uri() ) . 'js/isotope/imagesloaded.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'mediaelement' );
	wp_enqueue_script( 'lightbox', trailingslashit( get_template_directory_uri() ) . 'js/lightbox/lightbox.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'jquery-appear', trailingslashit( get_template_directory_uri() ) . 'js/appear.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lipi-timer', trailingslashit( get_template_directory_uri() ) . 'js/timer.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lipi-advsearch', trailingslashit( get_template_directory_uri() ) . 'js/advsearch.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'lazyloadxt', trailingslashit( get_template_directory_uri() ) . 'js/lazyload/lazyload.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'magnific-popup', trailingslashit( get_template_directory_uri() ) . 'js/magnific/magnific-popup.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'jquery-history', trailingslashit( get_template_directory_uri() ) . 'js/handler/jquery.history.js', array('jquery'), true );
	wp_enqueue_script( 'lipi-custom-script', trailingslashit(get_template_directory_uri()) . 'js/theme.js', array( 'jquery' ), false, true );
	
	
	/*** Add dynamic value ***/ 
	
	if ( $lipi_theme_options['theme-sticky-menu'] == false ){ $sticky_menu_status = 1; } else { $sticky_menu_status = 2; }
	// flip search text
	if( isset($lipi_theme_options['global-flip-search-text-paceholder']) ){ 
		$replace_flip_search_txt = str_replace("'", "", $lipi_theme_options['global-flip-search-text-paceholder']); 
	} else {
		$replace_flip_search_txt = '';
	}
	// faq
	$footer_js_faq_slug = get_query_var( 'term' );
	$footer_js_faq_current_term = get_term_by( 'slug', $footer_js_faq_slug, 'lipifaqcat' ); 
	if(  isset($footer_js_faq_current_term->taxonomy) == 'lipifaqcat'  ) { 
		$faq_js_handler = "var faq_search = location.href.split('#');if ( faq_search[1] != null ){var faq_search_id = faq_search[1];} else {var faq_search_id = '';}";
	} else {
		$faq_js_handler = "var faq_search_id = '';";
	}
	// add extra js code
	if(!empty($lipi_theme_options['theme-add-extra-js-code'])){
		$extra_js_code = $lipi_theme_options['theme-add-extra-js-code'];
	} else {
		$extra_js_code = '';
	}
	
	// wrap -- add extra JS script that is required
	$post_type_info = get_post_type( $post );
	if( ($post_type_info == 'lipi_kb' && is_single() ) && $lipi_theme_options['kb-comment-box-on-thumbsdown'] == true ) {
		if( comments_open($post->ID) == true ) { 
			$kb_display_feedback_form_onclick_thumbsdown = 1;
		} else {
			$kb_display_feedback_form_onclick_thumbsdown = 2;
		}
	} else { 
		$kb_display_feedback_form_onclick_thumbsdown = 2;
	}
	
	if( $lipi_theme_options['kb-comment-box-on-thumbsdown'] == true ) { 
		$kb_vc_comment_onclick_thumbsdown = 1;
	} else {
		$kb_vc_comment_onclick_thumbsdown = 2;
	}
	
	
	$js_tracking_code = '';
	wp_add_inline_script( 'lipi-custom-script', 'var kb_vc_comment_form = "'.$kb_vc_comment_onclick_thumbsdown.'"; var kb_onclickdisplay_feedback_form = "'.$kb_display_feedback_form_onclick_thumbsdown.'"; var go_up_icon = "'.esc_js($lipi_theme_options['go_up_arrow_icon_style']).'";var sticky_menu = '.esc_js($sticky_menu_status).';var live_search_active = '.( ($lipi_theme_options['global_live_search_status'] == false )?2:1).';var live_search_url ="'.home_url('/').'"; var filed_searchmsg = "'.esc_js($replace_flip_search_txt).'";'.sanitize_text_field($faq_js_handler).'  '.sanitize_text_field($extra_js_code).' '.sanitize_text_field($js_tracking_code) );
	/*** Eof add dynamic value ***/
	
	
	// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
	wp_localize_script('lipi-requestcall', 'lipi__ajax_var', array(
		'url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('lipi-ajax-nonce')
	));	
	
	/*
	* Adds JavaScript to pages with the comment form to support
	*/
	if ( is_singular() && comments_open() ) {  
			wp_enqueue_script( 'comment-reply' );
	}
		
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'fontawesome', trailingslashit(get_template_directory_uri()) . 'css/font-awesome/css/all.css', array(), '3.3.1' );
	wp_enqueue_style( 'et-line-font', trailingslashit(get_template_directory_uri()) . 'css/et-line-font/style.css', array(), '3.3.1' );
	wp_enqueue_style( 'elegent-font', trailingslashit(get_template_directory_uri()) . 'css/elegent-font/style.css', array(), '3.3.1' );
	wp_enqueue_style( 'lipi-style', get_stylesheet_uri(), array(), '1.0' );
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'lipi-fonts', lipi__fonts_url(), array(), null );
	wp_enqueue_style( 'bootstrap', trailingslashit(get_template_directory_uri()) . 'css/lib/bootstrap.min.css', array(), '3.3.1' );
	wp_enqueue_style( 'lipi-custom-flexslider', trailingslashit(get_template_directory_uri()) . 'css/flexslider/flexslider.css', array(), '2.5.0' );
	wp_enqueue_style( 'owlcarousel-custom-style', trailingslashit( get_template_directory_uri() ) . 'js/owl/owl.carousel.css', array(), '' );
	wp_enqueue_style( 'lipi-effect', trailingslashit(get_template_directory_uri()) . 'css/hover.css', array(), '' );
	wp_enqueue_style( 'lipi-mediaelementplayer', trailingslashit(get_template_directory_uri()) . 'css/mediaelementplayer/mediaelementplayer.min.css', array(), '' );
	wp_enqueue_style( 'lipi-lightbox', trailingslashit(get_template_directory_uri()) . 'css/lightbox/lightbox.css', array(), '' );
	
	 if ($woocommerce) {
		wp_enqueue_style("lipi-custom-woocommerce", trailingslashit(get_template_directory_uri()) . "css/woocommerce.min.css");
	}
	
	
}
add_action( 'wp_enqueue_scripts', 'lipi__scripts' );


/*-----------------------------------------------------------------------------------*/
/*	ADMIN :: Enqueue scripts and styles.
/*-----------------------------------------------------------------------------------*/ 
function lipi__admin_scripts() {
	 wp_enqueue_script( 'lipi-admin', trailingslashit(get_template_directory_uri()) . 'js/admin/admin.js' );
}
add_action( 'admin_enqueue_scripts', 'lipi__admin_scripts' );


/*-----------------------------------------------------------------------------------*/
/*	lipi__scripts() FOLLOW (FONT URL)
/*-----------------------------------------------------------------------------------*/ 
function lipi__fonts_url() {
	global $lipi_theme_options; 
	
	$fonts_url = $font_add = '';
	$fonts = $user_define_fonts = array();
	$subsets = 'latin,latin-ext';
	$subset = _x( 'no-subset', 'PT Sans font: add new subset (greek, cyrillic, vietnamese)', 'lipi' );

	if ( 'cyrillic' == $subset )
		$subsets .= ',cyrillic,cyrillic-ext';
	elseif ( 'greek' == $subset )
		$subsets .= ',greek,greek-ext';
	elseif ( 'vietnamese' == $subset )
		$subsets .= ',vietnamese';
	
	// Google Dynamic Fonts
	$font_weight_str  = '100,200,300,400,500,600,700,800,900';
	$fonts_array = array('Montserrat:'.$font_weight_str, 'Rubik:'.$font_weight_str, 'Poppins:'.$font_weight_str);
	$user_define_fonts = array($lipi_theme_options['theme-typography-body']['font-family'].':'.$font_weight_str, $lipi_theme_options['theme-h1-typography']['font-family'].':'.$font_weight_str, $lipi_theme_options['theme-h2-typography']['font-family'].':'.$font_weight_str, $lipi_theme_options['theme-h3-typography']['font-family'].':'.$font_weight_str, $lipi_theme_options['theme-h4-typography']['font-family'].':'.$font_weight_str, $lipi_theme_options['theme-h5-typography']['font-family'].':'.$font_weight_str, $lipi_theme_options['theme-h6-typography']['font-family'].':'.$font_weight_str, $lipi_theme_options['theme-typography-nav']['font-family'].':'.$font_weight_str );
	$is_plugin_active = lipi__plugin_active('ReduxFramework');
	if($is_plugin_active == false){
		$process_font_1 = array_unique($fonts_array);
	} else {
		$process_font_1 = array_unique(array_merge($fonts_array, $user_define_fonts));
	}
	$google_fonts_string = implode( '%7C', $process_font_1);
	
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = add_query_arg(array(
						'family' =>  str_replace(' ', '+', $google_fonts_string),
						'subset' => $subsets,
					), '//fonts.googleapis.com/css');

	return $query_args;
}




/*-----------------------------------------------------------------------------------*/
/*	 Plugin Activation
/*-----------------------------------------------------------------------------------*/
require_once trailingslashit( get_template_directory() ) . 'framework/tgm/tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'lipi__register_required_plugins' );
function lipi__register_required_plugins() {
	$theme_url = trailingslashit( get_template_directory() );
	$plugins = array(
		// Contact Form 7
		array(
			'name'         => 'Contact Form 7', // The plugin name.
			'slug'         => 'contact-form-7', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
		// VC
		array(
			'name'         => 'Visual Composer', // The plugin name.
			'slug'         => 'js_composer', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/js_composer.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/js_composer.zip', // If set, overrides default API URL and points to an external URL.
		),
		// Ultimate_VC_Addons
		array(
			'name'         => 'Ultimate Addons for WPBakery Page Builder', // The plugin name.
			'slug'         => 'Ultimate_VC_Addons', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/Ultimate_VC_Addons.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/Ultimate_VC_Addons.zip', // If set, overrides default API URL and points to an external URL.
		),
		// Slider R
		array(
			'name'         => 'Slider Revolution', // The plugin name.
			'slug'         => 'revslider', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/revslider.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/revslider.zip', // If set, overrides default API URL and points to an external URL.
		),
		// Lipi Framework
		array(
			'name'         => 'Lipi Framework', // The plugin name.
			'slug'         => 'lipi-framework', // The plugin slug (typically the folder name).
			'source'       => $theme_url.'install/lipi-framework.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => $theme_url.'install/lipi-framework.zip', // If set, overrides default API URL and points to an external URL.
		),
		// CMB2
		array(
			'name'         => 'CMB2', // The plugin name.
			'slug'         => 'cmb2', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		// Redux Framework
		array(
			'name'         => 'Redux Framework', // The plugin name.
			'slug'         => 'redux-framework', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		// bbPress
		array(
			'name'         => 'bbPress', // The plugin name.
			'slug'         => 'bbpress', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
		// One Click Demo Import
		array(
			'name'         => 'One Click Demo Import', // The plugin name.
			'slug'         => 'one-click-demo-import', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
		// Print
		array(
			'name'         => 'Print-O-Matic', // The plugin name.
			'slug'         => 'print-o-matic', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
		// Taxonomy Terms Order
		array(
			'name'         => 'Taxonomy Terms Order', // The plugin name.
			'slug'         => 'taxonomy-terms-order', // The plugin slug (typically the folder name).
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
		),
		
		
	);
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}


/*-----------------------------------------------------------------------------------*/
/*	 Widget
/*-----------------------------------------------------------------------------------*/
function lipi__widgets_init() {
	global $lipi_theme_options;
	if( isset( $lipi_theme_options['theme_footer_widget_title_tag'] ) && $lipi_theme_options['theme_footer_widget_title_tag'] != '' ) {
		$footer_tag = $lipi_theme_options['theme_footer_widget_title_tag'];	
	} else {
		$footer_tag = 'h6';
	}
	
	if( isset( $lipi_theme_options['theme_global_widget_area_tag'] ) && $lipi_theme_options['theme_global_widget_area_tag'] != '' ) {
		$global_widget_title_tag = $lipi_theme_options['theme_global_widget_area_tag'];	
	} else {
		$global_widget_title_tag = 'h6';
	}
	// Sidebar - Blog
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lipi' ),
		'id'            => 'blog-widget-1',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$global_widget_title_tag.'>',
		'after_title'   => '</'.$global_widget_title_tag.'>',
		'description'   => esc_html__( 'Blog/Page Sidebar', 'lipi' ),
	) );
	// Footer - 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Box 1', 'lipi' ),
		'id'            => 'footer-box-1',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$footer_tag.'>',
		'after_title'   => '</'.$footer_tag.'>',
		'description'   => esc_html__( 'Footer First Block Sidebar', 'lipi' ),
	) );
	// Footer - 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Box 2', 'lipi' ),
		'id'            => 'footer-box-2',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$footer_tag.'>',
		'after_title'   => '</'.$footer_tag.'>',
		'description'   => esc_html__( 'Footer Second Block Sidebar', 'lipi' ),
	) );
	// Footer - 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Box 3', 'lipi' ),
		'id'            => 'footer-box-3',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$footer_tag.'>',
		'after_title'   => '</'.$footer_tag.'>',
		'description'   => esc_html__( 'Footer Third Block Sidebar', 'lipi' ),
	) );
	// Footer - 4
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Box 4', 'lipi' ),
		'id'            => 'footer-box-4',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$footer_tag.'>',
		'after_title'   => '</'.$footer_tag.'>',
		'description'   => esc_html__( 'Footer Fourth Block Sidebar', 'lipi' ),
	) );
	// Sidebar - KB
	register_sidebar( array(
		'name'          => esc_html__( 'KB Category Sidebar', 'lipi' ),
		'id'            => 'kb-widget-1',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$global_widget_title_tag.'>',
		'after_title'   => '</'.$global_widget_title_tag.'>',
		'description'   => esc_html__( 'Knowledge Base Category Page Sidebar', 'lipi' ),
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'KB Single Post Sidebar', 'lipi' ),
		'id'            => 'kb-widget-2',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$global_widget_title_tag.'>',
		'after_title'   => '</'.$global_widget_title_tag.'>',
		'description'   => esc_html__( 'Knowledge Base Single Page Sidebar', 'lipi' ),
	) );
	// Sidebar - FAQ
	register_sidebar( array(
		'name'          => esc_html__( 'FAQ Sidebar', 'lipi' ),
		'id'            => 'faq-widget-1',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$global_widget_title_tag.'>',
		'after_title'   => '</'.$global_widget_title_tag.'>',
		'description'   => esc_html__( 'FAQ Category Page Sidebar', 'lipi' ),
	) );

	
	if(function_exists("is_woocommerce")){
		// Sidebar - Woo
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce', 'lipi' ),
			'id'            => 'woocommerce-widget-1',
			'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
			'description'   => esc_html__( 'WooCommerce Shop/Product Page Sidebar', 'lipi' ),
		) );
		// Header - Woo Dropdown
		register_sidebar( array(
			'name'          => esc_html__( 'Header Nav - Woo Menu', 'lipi' ),
			'id'            => 'woocommerce-widgetnav-1',
			'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<'.$global_widget_title_tag.'>',
			'after_title'   => '</'.$global_widget_title_tag.'>',
			'description'   => esc_html__( 'WooCommerce Shopping Basket', 'lipi' ),
		) );

	}
	
	// Sidebar - bbPress
	register_sidebar( array(
		'name'          => esc_html__( 'bbPress', 'lipi' ),
		'id'            => 'bbpress-widget-1',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<'.$global_widget_title_tag.'>',
		'after_title'   => '</'.$global_widget_title_tag.'>',
		'description'   => esc_html__( 'bbPress Sidebar', 'lipi' ),
	) );
	
	// Header - Social Icon
	register_sidebar( array(
		'name'          => esc_html__( 'Header - Social Icon', 'lipi' ),
		'id'            => 'header-social-widgetnav-1',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'description'   => esc_html__( 'Header Social Icons Section', 'lipi' ),
	) );
	
	// Header - Text with Icon Box
	register_sidebar( array(
		'name'          => esc_html__( 'Header - Icon With Text', 'lipi' ),
		'id'            => 'header-icon-with-text-widget',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'description'   => esc_html__( 'Header Custom Text Section', 'lipi' ),
	) );
	
	// Header - Text with Icon Box
	register_sidebar( array(
		'name'          => esc_html__( 'Top Header - Icon With Text', 'lipi' ),
		'id'            => 'header-top-icon-with-text-widget',
		'before_widget' => '<div id="%1$s" class="theme-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
		'description'   => esc_html__( 'Top Header Custom Text Section', 'lipi' ),
	) );
	
	
	
	
}
add_action( 'widgets_init', 'lipi__widgets_init' );


/*-----------------------------------------------------------------------------------*/
/*	 Knowledge Base Additional Hook
/*-----------------------------------------------------------------------------------*/
add_filter('manage_edit-lipi__kb_columns', 'lipi__kb_additional_columns');
function lipi__kb_additional_columns($columns) {
	$new_columns = array(
					'rating_yes' => esc_html__('Post Like', 'lipi'),
					'rating_no' => esc_html__('Post Unlike', 'lipi'),
					'visitors_stats' => esc_html__('Post Visitors', 'lipi'),
				   );
    return array_merge($columns, $new_columns);
}

add_action('manage_lipi__kb_posts_custom_column', 'lipi__kb_show_additional_columns');
function lipi__kb_show_additional_columns($name) {
		global $post;
		switch ($name) {
		case 'rating_yes':
			$yes = get_post_meta($post->ID, 'rating_like_count_post', true);
			if ($yes) {
				echo esc_attr($yes) .esc_html__(' like', 'lipi');
			} else {
				echo esc_html__('--', 'lipi');
			}
			break;
			
		 case 'rating_no':
		 	$no = get_post_meta($post->ID, 'rating_unlike_count_post', true);
			if ($no) {
				echo esc_attr($no) .esc_html__(' unlike', 'lipi');
			} else {
				echo esc_html__('--', 'lipi');
			}
			break;
			
		 case 'visitors_stats':
		 	echo get_post_meta($post->ID, 'display_post_impression', true);
			break;
			
		}
}

/*-----------------------------------------------------------------------------------*/
/*	Woo Hook
/*-----------------------------------------------------------------------------------*/

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_add_to_cart_header');
function woocommerce_add_to_cart_header( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="header_cart_span"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span>
	<?php
		$fragments['span.header_cart_span'] = ob_get_clean();
		return $fragments;	
}


/*-----------------------------------------------------------------------------------*/
/*	FAQ SINGLE PG REDIRECT
/*-----------------------------------------------------------------------------------*/ 
function lipi__faq_post_red() {
  global $post;
  $queried_post_type = get_query_var('post_type');
  $term_slug = get_query_var( 'term' );
  
  // Faq
  $current_term_faq = get_term_by( 'slug', $term_slug, 'lipifaqcat' );
  if ( is_single() && 'lipi_faq' ==  $queried_post_type ) {
     // current post ID
	 $postID = get_the_ID();
	 // Post category ID
	 $terms = get_the_terms( $postID , 'lipifaqcat' );
	 if( !empty($terms) ) { 
		 $term = array_pop($terms);
		 $catID = $term->term_taxonomy_id;
		 $category_link = esc_url( get_category_link( $catID ) ).'#'.$postID;
		 wp_redirect( $category_link, 301 );
		 exit;
	 } else {
		 esc_html_e( 'Please assign category for your FAQ RECORD', 'lipi' );
		 exit;
	 }
  } else if(  isset($current_term_faq->taxonomy) == 'lipifaqcat'  ) {
	 setcookie("lipiFaqSingleID", '', time() - 3600, '/'); 
  }
}
add_action( 'template_redirect', 'lipi__faq_post_red' );


/*-----------------------------------------------------------------------------------*/
/*	pingback url auto-discovery header
/*-----------------------------------------------------------------------------------*/ 
function lipi__pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'lipi__pingback_header' );


/*-----------------------------------------------------------------------------------*/
/*	Remove Links from Admin Bar
/*-----------------------------------------------------------------------------------*/
function lipi__remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('lipi');
}
add_action( 'wp_before_admin_bar_render', 'lipi__remove_admin_bar_links' );


/*-----------------------------------------------------------------------------------*/
/*	ReduxFrameworkPlugin MODIFY
/*-----------------------------------------------------------------------------------*/ 
function lipi__admin_custom_style() {
  wp_enqueue_style('lipi-admin-styles', trailingslashit(get_template_directory_uri()) . 'css/admin.css', array(), '' );
}
add_action('admin_enqueue_scripts', 'lipi__admin_custom_style');

/** REMOVE REDUX MESSAGES */
function lipi__remove_redux_messages() {
	if(class_exists('ReduxFramework')){
		remove_action( 'admin_notices', array( get_redux_instance('_lipi_theme_options_'), '_admin_notices' ), 99);
	}
}
add_action('init', 'lipi__remove_redux_messages');


/*-----------------------------------------------------------------------------------*/
/*	HANDLING BODY CLASS
/*-----------------------------------------------------------------------------------*/
function lipi__body_class( $classes ) {
    $global_website_presentation = lipi__website_global_design_control();
	$classes[] = $global_website_presentation;
    return $classes;
}
add_filter( 'body_class','lipi__body_class' );


/*-----------------------------------------------------------------------------------*/
/*	FIX KNOWLEDGEBASE CATEGORY PAGINATION
/*-----------------------------------------------------------------------------------*/
function lipi__fix_postcount( $query ) {
  if (!is_admin() && $query->is_main_query() ){
	  if( $query->is_archive('lipi_kb') && lipi__plugin_active('woocommerce') == false ) {
		  if( isset($query->queried_object->taxonomy) && $query->queried_object->taxonomy == 'lipikbcat' ) { 
		  $query->set('posts_per_page', 1); } else {}
	  } else if(  $query->is_archive('lipi_kb') && (lipi__plugin_active('woocommerce') == true  && !is_woocommerce())) {
		  if( isset($query->queried_object->taxonomy) && $query->queried_object->taxonomy == 'lipikbcat' ) { 
		  $query->set('posts_per_page', 1); } else {}
	  } else {
		  
	  }
  }
}
add_action( 'pre_get_posts', 'lipi__fix_postcount' );
?>