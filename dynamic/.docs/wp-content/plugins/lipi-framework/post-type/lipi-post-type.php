<?php 
/********************************
*** PORTFOLIO POST TYPE  ***
***********************************/
if ( ! function_exists( 'lipi__portfolio_post_type' ) ) {
	function lipi__portfolio_post_type() {
		
		global $lipi_theme_options;
	
		if( isset($lipi_theme_options['portfolio-slug-name']) && $lipi_theme_options['portfolio-slug-name'] != ''  ) {
			$single_slug_name = $lipi_theme_options['portfolio-slug-name'];
		} else {
			$single_slug_name = 'work';
		}
		
		register_post_type( 'lipi_portfolio',
			array(
			'labels' => array(
					'name' => esc_html__( 'Portfolio', 'lipi-framework' ),
					'singular_name' => esc_html__( 'Portfolio', 'lipi-framework' ),
					'add_new' => esc_html__('Add Portfolio', 'lipi-framework'),  
					'add_new_item' => esc_html__('Add New Portfolio', 'lipi-framework'),  
					'edit_item' => esc_html__('Edit Portfolio', 'lipi-framework'),  
					'new_item' => esc_html__('New Portfolio', 'lipi-framework'),  
					'view_item' => esc_html__('View Portfolio', 'lipi-framework'),  
					'search_items' => esc_html__('Search Portfolio', 'lipi-framework'),  
					'not_found' =>  esc_html__('No Portfolio found', 'lipi-framework'),  
					'not_found_in_trash' => esc_html__('No Portfolio found in Trash', 'lipi-framework')
				),
			'taxonomies'  => array( 'lipiptfocategory' ),	
			'public' => true,
			'menu_position' => 5,
			'rewrite' => array(	'slug' => $single_slug_name,
								'hierarchical' => 'true',
								'with_front' => false),
			'supports' => array(
				'title',
				'editor',
				'page-attributes','thumbnail', 'comments'), // add page attribute comments
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_nav_menus'  => false,
			'taxonomies' => array('post_tag'),
			'menu_icon'  => 'dashicons-portfolio',
			//'has_archive'   => true
			)
		);	
		flush_rewrite_rules();
	}
add_action( 'init', 'lipi__portfolio_post_type' );	
}


if ( ! function_exists('lipi__portfolio_category_taxonomy') ) {
	// Register faq Category Custom Taxonomy
	function lipi__portfolio_category_taxonomy()  {
		
		$labels = array(
			'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'lipi-framework' ),
			'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'lipi-framework' ),
			'menu_name'                  => esc_html__( 'Portfolio Categories', 'lipi-framework' ),
			'all_items'                  => esc_html__( 'All Categories', 'lipi-framework' ),
			'parent_item'                => esc_html__( 'Parent Category', 'lipi-framework' ),
			'parent_item_colon'          => esc_html__( 'Parent Category:', 'lipi-framework' ),
			'new_item_name'              => esc_html__( 'New Category Name', 'lipi-framework' ),
			'add_new_item'               => esc_html__( 'Add New Category', 'lipi-framework' ),
			'edit_item'                  => esc_html__( 'Edit Category', 'lipi-framework' ),
			'update_item'                => esc_html__( 'Update Category', 'lipi-framework' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'lipi-framework' ),
			'search_items'               => esc_html__( 'Search categories', 'lipi-framework' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'lipi-framework' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'lipi-framework' ),
		);
	
		$rewrite = array(
			'slug'                       => 'pfocat',  // change cat slug name
			'with_front'                 => false,
			'hierarchical'               => true,
		);
	
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'query_var'                  => true,
			'rewrite'                    => $rewrite,
		);
	
		register_taxonomy( 'lipiptfocategory', 'lipi_portfolio', $args );
		flush_rewrite_rules();
	}
add_action( 'init', 'lipi__portfolio_category_taxonomy', 0 );	
}






/********************************
*** TESTIMONIAL BLOCKS  ***
***********************************/
if ( ! function_exists( 'lipi__testimonial_menu_block' ) ) {
	function lipi__testimonial_menu_block() {
		register_post_type( 'lipi_testo',
			array(
				'public' => true,
				'publicly_queryable' => false,
				'show_in_nav_menus' => false,
				'show_in_admin_bar' => true,
				'menu_position' => 5,
				'exclude_from_search' => true,
				'hierarchical' => false,
				'map_meta_cap' => true,
				'menu_icon'  => 'dashicons-testimonial',
				'labels' => array(
						'name' => esc_html__( 'Testimonial', 'lipi-framework' ),
						'singular_name' => esc_html__( 'Testimonial', 'lipi-framework' ),
						'add_new' => esc_html__('Add New Testimonial', 'lipi-framework'),  
						'add_new_item' => esc_html__('Add New Testimonial', 'lipi-framework'),  
						'edit_item' => esc_html__('Edit Testimonial', 'lipi-framework'),  
						'new_item' => esc_html__('New Testimonial', 'lipi-framework'),  
						'view_item' => esc_html__('View Testimonial', 'lipi-framework'),  
						'search_items' => esc_html__('Search Testimonial', 'lipi-framework'),  
						'not_found' =>  esc_html__('No Testimonial found', 'lipi-framework'),  
						'not_found_in_trash' => esc_html__('No Testimonial Found In Trash', 'lipi-framework')
					),
				'supports' => array('title','page-attributes'),
				'taxonomies'  => array( 'bindtestimonialcat' ),
				)
		);
	}
add_action( 'init', 'lipi__testimonial_menu_block' );	
}

if ( ! function_exists('lipi__testimonial_category_taxonomy') ) {
function lipi__testimonial_category_taxonomy()  {
	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'lipi-framework' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'lipi-framework' ),
		'menu_name'                  => esc_html__( 'Categories', 'lipi-framework' ),
		'all_items'                  => esc_html__( 'All Categories', 'lipi-framework' ),
		'parent_item'                => esc_html__( 'Parent Category', 'lipi-framework' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:', 'lipi-framework' ),
		'new_item_name'              => esc_html__( 'New Category Name', 'lipi-framework' ),
		'add_new_item'               => esc_html__( 'Add New Category', 'lipi-framework' ),
		'edit_item'                  => esc_html__( 'Edit Category', 'lipi-framework' ),
		'update_item'                => esc_html__( 'Update Category', 'lipi-framework' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'lipi-framework' ),
		'search_items'               => esc_html__( 'Search categories', 'lipi-framework' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'lipi-framework' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'lipi-framework' ),
	);
	$rewrite = array(
		'slug'                       => 'testimonials_category',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'query_var'                  => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'bindtestimonialcat', 'lipi_testo', $args );
	flush_rewrite_rules();
}
add_action( 'init', 'lipi__testimonial_category_taxonomy', 0 );
}	



/********************************
*** KNOWLEDGEBASE POST TYPES  ***
***********************************/
if ( ! function_exists('lipi__kbase_post_type') ) {
	function lipi__kbase_post_type() {
		global $lipi_theme_options;
	
		if( isset($lipi_theme_options['kb_slug_name']) && $lipi_theme_options['kb_slug_name'] != ''  ) {
			$single_slug_name = $lipi_theme_options['kb_slug_name'];
		} else {
			$single_slug_name = 'knowledgebase';
		}
		
		$labels = array(
			'name'                => esc_html__( 'Knowledge Base', 'lipi-framework' ),
			'singular_name'       => esc_html__( 'Knowledge Base', 'lipi-framework' ),
			'menu_name'           => esc_html__( 'Knowledge Base', 'lipi-framework' ),
			'parent_item_colon'   => esc_html__( 'Parent Knowledge Base:', 'lipi-framework' ),
			'all_items'           => esc_html__( 'All Knowledge Base', 'lipi-framework' ),
			'view_item'           => esc_html__( 'View Knowledge Base', 'lipi-framework' ),
			'add_new_item'        => esc_html__( 'Add New Knowledge Base', 'lipi-framework' ),
			'add_new'             => esc_html__( 'New Knowledge Base', 'lipi-framework' ),
			'edit_item'           => esc_html__( 'Edit Knowledge Base', 'lipi-framework' ),
			'update_item'         => esc_html__( 'Update Knowledge Base', 'lipi-framework' ),
			'search_items'        => esc_html__( 'Search Knowledge Base', 'lipi-framework' ),
			'not_found'           => esc_html__( 'No Knowledge Base found', 'lipi-framework' ),
			'not_found_in_trash'  => esc_html__( 'No Knowledge Base found in Trash', 'lipi-framework' ),
		);
		$rewrite = array(
			'slug'                => $single_slug_name,
			'with_front'          => false,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => 'lipi_kb',
			'description'         => esc_html__( 'Knowledge Base Post Type', 'lipi-framework' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'author', 'revisions', 'editor', 'page-attributes', 'thumbnail', 'comments', 'post-formats' ),
			'taxonomies'          => array( 'lipikbcat' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-book',
		);
		register_post_type( 'lipi_kb', $args );
		flush_rewrite_rules();
	} // eof function
add_action( 'init', 'lipi__kbase_post_type', 0 );	
} // eof if.


// CATEGORY POST TYPE KB
if ( ! function_exists('lipi__kbcat_taxonomy') ) {
	function lipi__kbcat_taxonomy()  {
		global $lipi_theme_options;
		
		if( isset($lipi_theme_options['kb_cat_slug_name']) && $lipi_theme_options['kb_cat_slug_name'] != ''  ) {
			$new_cat_slug_name = $lipi_theme_options['kb_cat_slug_name'];
		} else {
			$new_cat_slug_name = 'kb';
		}
	
		$labels = array(
			'name'                       => esc_html__( 'Knowledge Base Categories', 'lipi-framework' ),
			'singular_name'              => esc_html__( 'Knowledge Base Category', 'lipi-framework' ),
			'menu_name'                  => esc_html__( 'Knowledge Base Categories', 'lipi-framework' ),
			'all_items'                  => esc_html__( 'All Categories', 'lipi-framework' ),
			'parent_item'                => esc_html__( 'Parent Category', 'lipi-framework' ),
			'parent_item_colon'          => esc_html__( 'Parent Category:', 'lipi-framework' ),
			'new_item_name'              => esc_html__( 'New Category Name', 'lipi-framework' ),
			'add_new_item'               => esc_html__( 'Add New Category', 'lipi-framework' ),
			'edit_item'                  => esc_html__( 'Edit Category', 'lipi-framework' ),
			'update_item'                => esc_html__( 'Update Category', 'lipi-framework' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'lipi-framework' ),
			'search_items'               => esc_html__( 'Search categories', 'lipi-framework' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'lipi-framework' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'lipi-framework' ),
		);
		$rewrite = array(
			'slug'                       => $new_cat_slug_name,
			'with_front'                 => false,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'query_var'                  => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'lipikbcat', 'lipi_kb', $args );
		flush_rewrite_rules();
	} //eof function
add_action( 'init', 'lipi__kbcat_taxonomy', 0 );
} // eof if


// TAG POST TYPE KB
if ( ! function_exists('lipi__kbtag_taxonomy') ) {
	function lipi__kbtag_taxonomy()  {
		global $lipi_theme_options;
	
		if( isset($lipi_theme_options['kb_tag_slug_name']) && $lipi_theme_options['kb_tag_slug_name'] != ''  ) {
			$kb_tag_slug_name = $lipi_theme_options['kb_tag_slug_name'];
		} else {
			$kb_tag_slug_name = 'kbtag';
		}
		
		$labels = array(
			'name'                       => esc_html__( 'Knowledge Base Tags', 'lipi-framework' ),
			'singular_name'              => esc_html__( 'Knowledge Base Tag', 'lipi-framework' ),
			'menu_name'                  => esc_html__( 'Knowledge Base Tags', 'lipi-framework' ),
			'all_items'                  => esc_html__( 'All Tags', 'lipi-framework' ),
			'parent_item'                => esc_html__( 'Parent Tag', 'lipi-framework' ),
			'parent_item_colon'          => esc_html__( 'Parent Tag:', 'lipi-framework' ),
			'new_item_name'              => esc_html__( 'New Tag Name', 'lipi-framework' ),
			'add_new_item'               => esc_html__( 'Add New Tag', 'lipi-framework' ),
			'edit_item'                  => esc_html__( 'Edit Tag', 'lipi-framework' ),
			'update_item'                => esc_html__( 'Update Tag', 'lipi-framework' ),
			'separate_items_with_commas' => esc_html__( 'Separate tags with commas', 'lipi-framework' ),
			'search_items'               => esc_html__( 'Search tags', 'lipi-framework' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove tags', 'lipi-framework' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used tags', 'lipi-framework' ),
		);
		$rewrite = array(
			'slug'                       => $kb_tag_slug_name,
			'with_front'                 => false,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'query_var'                  => 'article_tag',
			'rewrite'                    => $rewrite,
		);
	register_taxonomy( 'lipi_kbtag', 'lipi_kb', $args );
	} // eof function
add_action( 'init', 'lipi__kbtag_taxonomy', 0 );
}


/********************************
*** FAQ POST TYPE  ***
***********************************/
if ( ! function_exists( 'lipi__faq_post_type' ) ) {
	function lipi__faq_post_type() {
		register_post_type( 'lipi_faq',
			array(
			'labels' => array(
					'name' => esc_html__( 'FAQs', 'lipi-framework' ),
					'singular_name' => esc_html__( 'FAQ', 'lipi-framework' ),
					'add_new' => esc_html__('Add FAQ', 'lipi-framework'),  
					'add_new_item' => esc_html__('Add New FAQ', 'lipi-framework'),  
					'edit_item' => esc_html__('Edit FAQ', 'lipi-framework'),  
					'new_item' => esc_html__('New FAQ', 'lipi-framework'),  
					'view_item' => esc_html__('View FAQ', 'lipi-framework'),  
					'search_items' => esc_html__('Search FAQs', 'lipi-framework'),  
					'not_found' =>  esc_html__('No FAQs found', 'lipi-framework'),  
					'not_found_in_trash' => esc_html__('No FAQs found in Trash', 'lipi-framework')
				),
			'taxonomies'  => array( 'lipifaqcat' ),	
			'public' => true,
			'menu_position' => 5,
			'rewrite' => array(	'slug' => 'faqs',
								'hierarchical' => 'true',
								'with_front' => false),
			'supports' => array(
				'title',
				'editor',
				'page-attributes','thumbnail'),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_nav_menus'  => false,
			'menu_icon'  => 'dashicons-editor-help',
 			//'has_archive'   => true
			)
		);	
		flush_rewrite_rules();
	} // eof function
add_action( 'init', 'lipi__faq_post_type' );
}

if ( ! function_exists('lipi__faq_category_taxonomy1') ) {
function lipi__faq_category_taxonomy1()  {
	$labels = array(
		'name'                       => _x( 'FAQ Categories', 'Taxonomy General Name', 'lipi-framework' ),
		'singular_name'              => _x( 'FAQ Category', 'Taxonomy Singular Name', 'lipi-framework' ),
		'menu_name'                  => esc_html__( 'FAQ Categories', 'lipi-framework' ),
		'all_items'                  => esc_html__( 'All Categories', 'lipi-framework' ),
		'parent_item'                => esc_html__( 'Parent Category', 'lipi-framework' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:', 'lipi-framework' ),
		'new_item_name'              => esc_html__( 'New Category Name', 'lipi-framework' ),
		'add_new_item'               => esc_html__( 'Add New Category', 'lipi-framework' ),
		'edit_item'                  => esc_html__( 'Edit Category', 'lipi-framework' ),
		'update_item'                => esc_html__( 'Update Category', 'lipi-framework' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'lipi-framework' ),
		'search_items'               => esc_html__( 'Search categories', 'lipi-framework' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'lipi-framework' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'lipi-framework' ),
	);
	$rewrite = array(
		'slug'                       => 'faq',
		'with_front'                 => false,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'query_var'                  => 'article_category',
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'lipifaqcat', 'lipi_faq', $args );
	flush_rewrite_rules();
}
add_action( 'init', 'lipi__faq_category_taxonomy1', 0 );
}	



/********************************
*** SERVICES POST TYPE  ***
***********************************/
if ( ! function_exists( 'lipi__services_post_type' ) ) {
	function lipi__services_post_type() {
		
		global $lipi_theme_options;
	
		if( isset($lipi_theme_options['services-slug-name']) && $lipi_theme_options['services-slug-name'] != ''  ) {
			$single_slug_name = $lipi_theme_options['services-slug-name'];
		} else {
			$single_slug_name = 'case';
		}
		
		register_post_type( 'lipi_services',
			array(
			'labels' => array(
					'name' => esc_html__( 'Services', 'lipi-framework' ),
					'singular_name' => esc_html__( 'Services', 'lipi-framework' ),
					'add_new' => esc_html__('Add Services', 'lipi-framework'),  
					'add_new_item' => esc_html__('Add New Services', 'lipi-framework'),  
					'edit_item' => esc_html__('Edit Services', 'lipi-framework'),  
					'new_item' => esc_html__('New Services', 'lipi-framework'),  
					'view_item' => esc_html__('View Services', 'lipi-framework'),  
					'search_items' => esc_html__('Search Services', 'lipi-framework'),  
					'not_found' =>  esc_html__('No Services found', 'lipi-framework'),  
					'not_found_in_trash' => esc_html__('No Services found in Trash', 'lipi-framework')
				),
			'taxonomies'  => array( 'lipisvscat' ),	
			'public' => true,
			'menu_position' => 5,
			'rewrite' => array(	'slug' => $single_slug_name, 'hierarchical' => 'true', 'with_front' => false),
			'supports' => array( 'title', 'editor', 'page-attributes','thumbnail', 'comments'), 
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'exclude_from_search' => false,
			'show_in_nav_menus'  => false,
			'menu_icon'  => 'dashicons-clipboard',
			)
		);	
		flush_rewrite_rules();
	}
add_action( 'init', 'lipi__services_post_type' );	
}

if ( ! function_exists('lipi__services_category_taxonomy') ) {
	// Register faq Category Custom Taxonomy
	function lipi__services_category_taxonomy()  {
		
		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'lipi-framework' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'lipi-framework' ),
			'menu_name'                  => esc_html__( 'Categories', 'lipi-framework' ),
			'all_items'                  => esc_html__( 'All Categories', 'lipi-framework' ),
			'parent_item'                => esc_html__( 'Parent Category', 'lipi-framework' ),
			'parent_item_colon'          => esc_html__( 'Parent Category:', 'lipi-framework' ),
			'new_item_name'              => esc_html__( 'New Category Name', 'lipi-framework' ),
			'add_new_item'               => esc_html__( 'Add New Category', 'lipi-framework' ),
			'edit_item'                  => esc_html__( 'Edit Category', 'lipi-framework' ),
			'update_item'                => esc_html__( 'Update Category', 'lipi-framework' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'lipi-framework' ),
			'search_items'               => esc_html__( 'Search categories', 'lipi-framework' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'lipi-framework' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'lipi-framework' ),
		);
	
		$rewrite = array(
			'slug'                       => 'bservicescat',  // change cat slug name
			'with_front'                 => false,
			'hierarchical'               => true,
		);
	
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'query_var'                  => true,
			'rewrite'                    => $rewrite,
		);
	
		register_taxonomy( 'lipisvscat', 'lipi_services', $args );
		flush_rewrite_rules();
	}
add_action( 'init', 'lipi__services_category_taxonomy', 0 );	
}
?>