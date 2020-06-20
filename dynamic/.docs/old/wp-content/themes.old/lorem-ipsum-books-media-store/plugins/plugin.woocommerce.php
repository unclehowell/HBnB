<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_woocommerce_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_woocommerce_theme_setup', 1 );
	function lorem_ipsum_books_media_store_woocommerce_theme_setup() {

		if (lorem_ipsum_books_media_store_exists_woocommerce()) {
            add_theme_support( 'woocommerce' );
            // Next setting from the WooCommerce 3.0+ enable built-in image slider on the single product page
            add_theme_support( 'wc-product-gallery-slider' );
            // Next setting from the WooCommerce 3.0+ enable built-in image lightbox on the single product page
            add_theme_support( 'wc-product-gallery-lightbox' );

			add_action('lorem_ipsum_books_media_store_action_add_styles', 				'lorem_ipsum_books_media_store_woocommerce_frontend_scripts' );

			// Detect current page type, taxonomy and title (for custom post_types use priority < 10 to fire it handles early, than for standard post types)
			add_filter('lorem_ipsum_books_media_store_filter_get_blog_type',				'lorem_ipsum_books_media_store_woocommerce_get_blog_type', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_blog_title',			'lorem_ipsum_books_media_store_woocommerce_get_blog_title', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_current_taxonomy',		'lorem_ipsum_books_media_store_woocommerce_get_current_taxonomy', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_is_taxonomy',				'lorem_ipsum_books_media_store_woocommerce_is_taxonomy', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_title',		'lorem_ipsum_books_media_store_woocommerce_get_stream_page_title', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_link',		'lorem_ipsum_books_media_store_woocommerce_get_stream_page_link', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_id',		'lorem_ipsum_books_media_store_woocommerce_get_stream_page_id', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_detect_inheritance_key',	'lorem_ipsum_books_media_store_woocommerce_detect_inheritance_key', 9, 1);
			add_filter('lorem_ipsum_books_media_store_filter_detect_template_page_id',	'lorem_ipsum_books_media_store_woocommerce_detect_template_page_id', 9, 2);
			add_filter('lorem_ipsum_books_media_store_filter_orderby_need',				'lorem_ipsum_books_media_store_woocommerce_orderby_need', 9, 2);

			add_filter('lorem_ipsum_books_media_store_filter_show_post_navi', 			'lorem_ipsum_books_media_store_woocommerce_show_post_navi');
			add_filter('lorem_ipsum_books_media_store_filter_list_post_types', 			'lorem_ipsum_books_media_store_woocommerce_list_post_types');

			add_action('lorem_ipsum_books_media_store_action_shortcodes_list', 			'lorem_ipsum_books_media_store_woocommerce_reg_shortcodes', 20);
            add_action('woocommerce_product_options_pricing',       'lorem_ipsum_books_media_store_add_author_field');
            add_action('save_post',                                 'lorem_ipsum_books_media_store_save_author_field');
            add_action('woocommerce_single_product_summary',        'lorem_ipsum_books_media_store_show_author_field_single_page', 39);
            add_action('woocommerce_shop_loop_item_title',          'lorem_ipsum_books_media_store_show_author_field_category_page');
            remove_action('woocommerce_before_shop_loop',           'woocommerce_result_count', 20);
            remove_action('woocommerce_before_main_content',        'woocommerce_breadcrumb', 20);
            remove_action('woocommerce_single_product_summary',     'woocommerce_template_single_sharing', 50);
            add_action('woocommerce_single_product_summary',        'lorem_ipsum_books_media_store_add_single_sharing', 51);

            // Author tags
            if (!function_exists('lorem_ipsum_books_media_store_book_author')) {
                function lorem_ipsum_books_media_store_book_author()
                {

                    lorem_ipsum_books_media_store_require_data('taxonomy', 'authors', array(
                            'post_type' => array('product'),
                            'hierarchical' => true,
                            'labels' => array(
                                'name' => _x('Authors', 'Taxonomy General Name', 'lorem-ipsum-books-media-store'),
                                'singular_name' => _x('Author', 'Taxonomy Singular Name', 'lorem-ipsum-books-media-store'),
                                'menu_name' => __('Author', 'lorem-ipsum-books-media-store'),
                                'all_items' => __('All Authors', 'lorem-ipsum-books-media-store'),
                                'parent_item' => __('Parent Author', 'lorem-ipsum-books-media-store'),
                                'parent_item_colon' => __('Parent Author:', 'lorem-ipsum-books-media-store'),
                                'new_item_name' => __('New Author Name', 'lorem-ipsum-books-media-store'),
                                'add_new_item' => __('Add New Author', 'lorem-ipsum-books-media-store'),
                                'edit_item' => __('Edit Author', 'lorem-ipsum-books-media-store'),
                                'update_item' => __('Update Author', 'lorem-ipsum-books-media-store'),
                                'separate_items_with_commas' => __('Separate authors with commas', 'lorem-ipsum-books-media-store'),
                                'search_items' => __('Search authors', 'lorem-ipsum-books-media-store'),
                                'add_or_remove_items' => __('Add or remove authors', 'lorem-ipsum-books-media-store'),
                                'choose_from_most_used' => __('Choose from the most used authors', 'lorem-ipsum-books-media-store'),
                            ),
                            'show_ui' => true,
                            'show_admin_column' => true,
                            'query_var' => true,
                            'rewrite' => array('slug' => 'authors')
                        )
                    );

                }
            }

            // Hook into the 'init' action
            add_action('init', 'lorem_ipsum_books_media_store_book_author', 0);


            if (function_exists('lorem_ipsum_books_media_store_exists_visual_composer') && lorem_ipsum_books_media_store_exists_visual_composer())
				add_action('lorem_ipsum_books_media_store_action_shortcodes_list_vc',	'lorem_ipsum_books_media_store_woocommerce_reg_shortcodes_vc', 20);

		}

		if (is_admin()) {
			add_filter( 'lorem_ipsum_books_media_store_filter_required_plugins',					'lorem_ipsum_books_media_store_woocommerce_required_plugins' );
		}
	}
}

// Add 'Author' field
if ( !function_exists( 'lorem_ipsum_books_media_store_add_author_field' ) ) {
    function lorem_ipsum_books_media_store_add_author_field() {
        woocommerce_wp_text_input( array( 'id' => 'product_author', 'class' => 'wc_input_author', 'label' => esc_html__( 'Author', 'lorem-ipsum-books-media-store' ) ) );
    }
}

// Save 'Author' field
if ( !function_exists( 'lorem_ipsum_books_media_store_save_author_field' ) ) {
    function lorem_ipsum_books_media_store_save_author_field($product_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (isset($_POST['product_author'])) {
            update_post_meta($product_id, 'product_author', $_POST['product_author']);
        }
    }
}

// Show 'Author' field in single product page
if ( !function_exists( 'lorem_ipsum_books_media_store_show_author_field_single_page' ) ) {
    function lorem_ipsum_books_media_store_show_author_field_single_page() {?>
        <div class="data-top">
            <div class="woocommerce_product_author">
                <span class="woocommerce_product_author_name">
                    <?php
                    global $post, $authors, $product;
                    $old_author = get_post_meta( $product->get_id(), 'product_author', true );
                    $authors = wp_get_object_terms($post->ID, 'authors');
                    if (!empty($authors) || !empty($old_author) ){
                        echo esc_attr(__('Author: ', 'lorem-ipsum-books-media-store'));
                        if (!empty($authors)){
                            foreach ($authors as $author) { ?>
                            <a href="<?php echo get_term_link($author->slug, 'authors'); ?>"><?php echo  esc_html($author->name) . ' '; ?></a>
                            <?php
                            }
                         }
                        if (empty($authors) && !empty($old_author)){
                            echo '<span> ' . esc_html($old_author) . '</span>';
                        }
                    }?>
                </span>
            </div>
        </div>
        <?php
    }
}

// Show 'Author' field in category page
if ( !function_exists( 'lorem_ipsum_books_media_store_show_author_field_category_page' ) ) {
    function lorem_ipsum_books_media_store_show_author_field_category_page() {
        ?>
        <div class="woocommerce_product_author">
            <span class="woocommerce_product_author_name">
                <?php
                global $post, $authors, $product;
                $old_author = get_post_meta( $product->get_id(), 'product_author', true );
                $authors = wp_get_object_terms($post->ID, 'authors');
                if (!empty($authors) || !empty($old_author) ){
                    echo esc_html(__('By', 'lorem-ipsum-books-media-store'));
                    if (is_array($authors) && count($authors)>0) {
                        foreach ($authors as $author) {
                            ?>
                            <a href="<?php echo get_term_link($author->slug, 'authors'); ?>"><?php echo  esc_html($author->name) . ' '; ?></a>
                            <?php
                        }
                    }
                    if (empty($authors) && !empty($old_author)){
                        echo ' ' . esc_html($old_author);
                    }
                }?>
            </span>
        </div>
        <?php
    }
}

// Add sharing buttons on single product page
if ( !function_exists( 'lorem_ipsum_books_media_store_add_single_sharing' ) ) {
    function lorem_ipsum_books_media_store_add_single_sharing() {
        $show_share = lorem_ipsum_books_media_store_get_custom_option("show_share");
        if (!lorem_ipsum_books_media_store_param_is_off($show_share)) {
            $rez = lorem_ipsum_books_media_store_show_share_links(array(
                'post_id'    => get_the_ID(),
                'post_link'  => get_post_permalink(),
                'post_title' => get_the_title(),
                'post_descr' => strip_tags(get_the_excerpt()),
                'post_thumb' => get_the_post_thumbnail(),
                'type'		 => 'block',
                'echo'		 => false
            ));
            if ($rez) {
                ?>
                <div class="woocommerce_product_share woocommerce_product_share_<?php echo esc_attr($show_share); ?>"><?php lorem_ipsum_books_media_store_show_layout($rez); ?></div>
            <?php
            }
        }
    }
}

// Redefine post_type if number of related products == 0
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_related_products_args' ) ) {
    add_filter( 'woocommerce_related_products_args', 'lorem_ipsum_books_media_store_woocommerce_related_products_args' );
    function lorem_ipsum_books_media_store_woocommerce_related_products_args($args) {
        if ($args['posts_per_page'] == 0)
            $args['post_type'] .= '_';
        return $args;
    }
}

if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_settings_theme_setup2' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_woocommerce_settings_theme_setup2', 3 );
	function lorem_ipsum_books_media_store_woocommerce_settings_theme_setup2() {
		if (lorem_ipsum_books_media_store_exists_woocommerce()) {
			// Add WooCommerce pages in the Theme inheritance system
			lorem_ipsum_books_media_store_add_theme_inheritance( array( 'woocommerce' => array(
				'stream_template' => 'blog-woocommerce',		// This params must be empty
				'single_template' => 'single-woocommerce',		// They are specified to enable separate settings for blog and single wooc
				'taxonomy' => array('product_cat'),
				'taxonomy_tags' => array('product_tag'),
				'post_type' => array('product'),
				'override' => 'page'
				) )
			);

			// Add WooCommerce specific options in the Theme Options

			lorem_ipsum_books_media_store_storage_set_array_before('options', 'partition_service', array(

				"partition_woocommerce" => array(
					"title" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
					"icon" => "iconadmin-basket",
					"type" => "partition"),

				"info_wooc_1" => array(
					"title" => esc_html__('WooCommerce products list parameters', 'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("Select WooCommerce products list's style and crop parameters", 'lorem-ipsum-books-media-store'),
					"type" => "info"),

				"shop_mode" => array(
					"title" => esc_html__('Shop list style',  'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("WooCommerce products list's style: thumbs or list with description", 'lorem-ipsum-books-media-store'),
					"std" => "thumbs",
					"divider" => false,
					"options" => array(
						'thumbs' => esc_html__('Thumbs', 'lorem-ipsum-books-media-store'),
						'list' => esc_html__('List', 'lorem-ipsum-books-media-store')
					),
					"type" => "hidden"), //checklist

				"show_mode_buttons" => array(
					"title" => esc_html__('Show style buttons',  'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("Show buttons to allow visitors change list style", 'lorem-ipsum-books-media-store'),
					"std" => "no",
					"options" => lorem_ipsum_books_media_store_get_options_param('list_yes_no'),
					"type" => "hidden"), //switch

				"shop_loop_columns" => array(
					"title" => esc_html__('Shop columns',  'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("How many columns used to show products on shop page", 'lorem-ipsum-books-media-store'),
					"std" => "3",
					"step" => 1,
					"min" => 1,
					"max" => 6,
					"type" => "spinner"),

				"show_currency" => array(
					"title" => esc_html__('Show currency selector', 'lorem-ipsum-books-media-store'),
					"desc" => esc_html__('Show currency selector in the user menu', 'lorem-ipsum-books-media-store'),
					"std" => "no",
					"options" => lorem_ipsum_books_media_store_get_options_param('list_yes_no'),
					"type" => "switch"),

				"show_cart" => array(
					"title" => esc_html__('Show cart button', 'lorem-ipsum-books-media-store'),
					"desc" => esc_html__('Show cart button in the user menu', 'lorem-ipsum-books-media-store'),
					"std" => "always",
					"options" => array(
						'hide'   => esc_html__('Hide', 'lorem-ipsum-books-media-store'),
						'always' => esc_html__('Always', 'lorem-ipsum-books-media-store'),
						'shop'   => esc_html__('Only on shop pages', 'lorem-ipsum-books-media-store')
					),
					"type" => "checklist"),

				"crop_product_thumb" => array(
					"title" => esc_html__("Crop product's thumbnail",  'lorem-ipsum-books-media-store'),
					"desc" => esc_html__("Crop product's thumbnails on search results page or scale it", 'lorem-ipsum-books-media-store'),
					"std" => "no",
					"options" => lorem_ipsum_books_media_store_get_options_param('list_yes_no'),
					"type" => "switch")

				)
			);

		}
	}
}

// WooCommerce hooks
if (!function_exists('lorem_ipsum_books_media_store_woocommerce_theme_setup3')) {
	add_action( 'lorem_ipsum_books_media_store_action_after_init_theme', 'lorem_ipsum_books_media_store_woocommerce_theme_setup3' );
	function lorem_ipsum_books_media_store_woocommerce_theme_setup3() {

		if (lorem_ipsum_books_media_store_exists_woocommerce()) {

			add_action(    'woocommerce_before_subcategory_title',		'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper', 9 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper', 9 );

			add_action(    'woocommerce_before_subcategory_title',		'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper', 20 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper', 20 );

			add_action(    'woocommerce_after_subcategory',				'lorem_ipsum_books_media_store_woocommerce_close_item_cat_wrapper', 20 );
			add_action(    'woocommerce_after_shop_loop_item',			'lorem_ipsum_books_media_store_woocommerce_close_item_wrapper', 20 );

			add_action(    'woocommerce_after_shop_loop_item_title',	'lorem_ipsum_books_media_store_woocommerce_after_shop_loop_item_title', 7);

			add_action(    'woocommerce_after_subcategory_title',		'lorem_ipsum_books_media_store_woocommerce_after_subcategory_title', 10 );

			// Remove link around product item
			remove_action('woocommerce_before_shop_loop_item',			'woocommerce_template_loop_product_link_open', 10);
			remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_product_link_close', 5);

			// Remove link around product category
			//remove_action('woocommerce_before_subcategory',				'woocommerce_template_loop_category_link_open', 10);
			remove_action('woocommerce_after_subcategory',				'woocommerce_template_loop_category_link_close', 10);

            // Remove native 'Add to cart' button and adding new one
            remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_add_to_cart', 10);
            add_action('woocommerce_before_shop_loop_item_title',       'lorem_ipsum_books_media_store_before_button_container', 11);
            add_action('woocommerce_before_shop_loop_item_title',       'woocommerce_template_loop_add_to_cart', 12);
            add_action('woocommerce_before_shop_loop_item_title',       'lorem_ipsum_books_media_store_after_button_container', 13);

            remove_action( 'woocommerce_shop_loop_item_title',          'woocommerce_template_loop_product_title', 10);
            add_action(    'woocommerce_shop_loop_item_title',          'lorem_ipsum_books_media_store_linked_product_title', 9);

            remove_action( 'woocommerce_shop_loop_subcategory_title',          'woocommerce_template_loop_category_title', 10);
            add_action(    'woocommerce_shop_loop_subcategory_title',          'lorem_ipsum_books_media_store_woocommerce_template_loop_category_title', 10);

		}

		if (lorem_ipsum_books_media_store_is_woocommerce_page()) {

			remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );					// Remove WOOC sidebar

			remove_action( 'woocommerce_before_main_content',			'woocommerce_output_content_wrapper', 10);
			add_action(    'woocommerce_before_main_content',			'lorem_ipsum_books_media_store_woocommerce_wrapper_start', 10);

			remove_action( 'woocommerce_after_main_content',			'woocommerce_output_content_wrapper_end', 10);
			add_action(    'woocommerce_after_main_content',			'lorem_ipsum_books_media_store_woocommerce_wrapper_end', 10);

			add_action(    'woocommerce_show_page_title',				'lorem_ipsum_books_media_store_woocommerce_show_page_title', 10);

			remove_action( 'woocommerce_single_product_summary',		'woocommerce_template_single_title', 5);
			add_action(    'woocommerce_single_product_summary',		'lorem_ipsum_books_media_store_woocommerce_show_product_title', 5 );

			add_action(    'woocommerce_before_shop_loop', 				'lorem_ipsum_books_media_store_woocommerce_before_shop_loop', 10 );

			remove_action( 'woocommerce_after_shop_loop',				'woocommerce_pagination', 10 );
			add_action(    'woocommerce_after_shop_loop',				'lorem_ipsum_books_media_store_woocommerce_pagination', 10 );

			add_action(    'woocommerce_product_meta_end',				'lorem_ipsum_books_media_store_woocommerce_show_product_id', 10);

			add_filter(    'woocommerce_output_related_products_args',	'lorem_ipsum_books_media_store_woocommerce_output_related_products_args' );




			add_filter(    'woocommerce_product_thumbnails_columns',	'lorem_ipsum_books_media_store_woocommerce_product_thumbnails_columns' );

			add_filter(    'get_product_search_form',                  'lorem_ipsum_books_media_store_woocommerce_get_product_search_form' );

			add_filter(    'post_class',								'lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class' );
			add_filter(    'product_cat_class',							'lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class', 10, 3 );

			lorem_ipsum_books_media_store_enqueue_popup();
		}
	}
}



// Check if WooCommerce installed and activated
if ( !function_exists( 'lorem_ipsum_books_media_store_exists_woocommerce' ) ) {
	function lorem_ipsum_books_media_store_exists_woocommerce() {
		return class_exists('Woocommerce');
	}
}

// Return true, if current page is any woocommerce page
if ( !function_exists( 'lorem_ipsum_books_media_store_is_woocommerce_page' ) ) {
	function lorem_ipsum_books_media_store_is_woocommerce_page() {
		$rez = false;
		if (lorem_ipsum_books_media_store_exists_woocommerce()) {
			if (!lorem_ipsum_books_media_store_storage_empty('pre_query')) {
				$id = lorem_ipsum_books_media_store_storage_get_obj_property('pre_query', 'queried_object_id', 0);
				$rez = lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'post_type')=='product'
						|| $id==wc_get_page_id('shop')
						|| $id==wc_get_page_id('cart')
						|| $id==wc_get_page_id('checkout')
						|| $id==wc_get_page_id('myaccount')
						|| lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'is_tax', 'product_cat')
						|| lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'is_tax', 'product_tag')
						|| lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'is_tax', get_object_taxonomies('product'));

			} else
				$rez = is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page();
		}
		return $rez;
	}
}

// Filter to detect current page inheritance key
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_detect_inheritance_key' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_detect_inheritance_key',	'lorem_ipsum_books_media_store_woocommerce_detect_inheritance_key', 9, 1);
	function lorem_ipsum_books_media_store_woocommerce_detect_inheritance_key($key) {
		if (!empty($key)) return $key;
		return lorem_ipsum_books_media_store_is_woocommerce_page() ? 'woocommerce' : '';
	}
}

// Filter to detect current template page id
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_detect_template_page_id' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_detect_template_page_id',	'lorem_ipsum_books_media_store_woocommerce_detect_template_page_id', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_detect_template_page_id($id, $key) {
		if (!empty($id)) return $id;
		if ($key == 'woocommerce_cart')				$id = get_option('woocommerce_cart_page_id');
		else if ($key == 'woocommerce_checkout')	$id = get_option('woocommerce_checkout_page_id');
		else if ($key == 'woocommerce_account')		$id = get_option('woocommerce_account_page_id');
		else if ($key == 'woocommerce')				$id = get_option('woocommerce_shop_page_id');
		return $id;
	}
}

// Filter to detect current page type (slug)
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_blog_type' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_get_blog_type',	'lorem_ipsum_books_media_store_woocommerce_get_blog_type', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_get_blog_type($page, $query=null) {
		if (!empty($page)) return $page;

		if (is_shop()) 					$page = 'woocommerce_shop';
		else if ($query && $query->get('post_type')=='product' || is_product())		$page = 'woocommerce_product';
		else if ($query && $query->get('product_tag')!='' || is_product_tag())		$page = 'woocommerce_tag';
		else if ($query && $query->get('product_cat')!='' || is_product_category())	$page = 'woocommerce_category';
		else if (is_cart())				$page = 'woocommerce_cart';
		else if (is_checkout())			$page = 'woocommerce_checkout';
		else if (is_account_page())		$page = 'woocommerce_account';
		else if (is_woocommerce())		$page = 'woocommerce';
		return $page;
	}
}

// Filter to detect current page title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_blog_title' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_get_blog_title',	'lorem_ipsum_books_media_store_woocommerce_get_blog_title', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_get_blog_title($title, $page) {
		if (!empty($title)) return $title;

		if ( lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false ) {
			if ( $page == 'woocommerce_category' ) {
				$term = get_term_by( 'slug', get_query_var( 'product_cat' ), 'product_cat', OBJECT);
				$title = $term->name;
			} else if ( $page == 'woocommerce_tag' ) {
				$term = get_term_by( 'slug', get_query_var( 'product_tag' ), 'product_tag', OBJECT);
				$title = esc_html__('Tag:', 'lorem-ipsum-books-media-store') . ' ' . esc_html($term->name);
			} else if ( $page == 'woocommerce_cart' ) {
				$title = esc_html__( 'Your cart', 'lorem-ipsum-books-media-store' );
			} else if ( $page == 'woocommerce_checkout' ) {
				$title = esc_html__( 'Checkout', 'lorem-ipsum-books-media-store' );
			} else if ( $page == 'woocommerce_account' ) {
				$title = esc_html__( 'Account', 'lorem-ipsum-books-media-store' );
			} else if ( $page == 'woocommerce_product' ) {
				$title = lorem_ipsum_books_media_store_get_post_title();
			} else if (($page_id=get_option('woocommerce_shop_page_id')) > 0) {
				$title = lorem_ipsum_books_media_store_get_post_title($page_id);
			} else {
				$title = esc_html__( 'Shop', 'lorem-ipsum-books-media-store' );
			}
		}

		return $title;
	}
}

// Filter to detect stream page title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_stream_page_title' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_title',	'lorem_ipsum_books_media_store_woocommerce_get_stream_page_title', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_get_stream_page_title($title, $page) {
		if (!empty($title)) return $title;
		if (lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false) {
			if (($page_id = lorem_ipsum_books_media_store_woocommerce_get_stream_page_id(0, $page)) > 0)
				$title = lorem_ipsum_books_media_store_get_post_title($page_id);
			else
				$title = esc_html__('Shop', 'lorem-ipsum-books-media-store');
		}
		return $title;
	}
}

// Filter to detect stream page ID
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_stream_page_id' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_id',	'lorem_ipsum_books_media_store_woocommerce_get_stream_page_id', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_get_stream_page_id($id, $page) {
		if (!empty($id)) return $id;
		if (lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false) {
			$id = get_option('woocommerce_shop_page_id');
		}
		return $id;
	}
}

// Filter to detect stream page link
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_stream_page_link' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_get_stream_page_link',	'lorem_ipsum_books_media_store_woocommerce_get_stream_page_link', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_get_stream_page_link($url, $page) {
		if (!empty($url)) return $url;
		if (lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false) {
			$id = lorem_ipsum_books_media_store_woocommerce_get_stream_page_id(0, $page);
			if ($id) $url = get_permalink($id);
		}
		return $url;
	}
}

// Filter to detect current taxonomy
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_current_taxonomy' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_get_current_taxonomy',	'lorem_ipsum_books_media_store_woocommerce_get_current_taxonomy', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_get_current_taxonomy($tax, $page) {
		if (!empty($tax)) return $tax;
		if ( lorem_ipsum_books_media_store_strpos($page, 'woocommerce')!==false ) {
			$tax = 'product_cat';
		}
		return $tax;
	}
}

// Return taxonomy name (slug) if current page is this taxonomy page
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_is_taxonomy' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_is_taxonomy',	'lorem_ipsum_books_media_store_woocommerce_is_taxonomy', 9, 2);
	function lorem_ipsum_books_media_store_woocommerce_is_taxonomy($tax, $query=null) {
		if (!empty($tax))
			return $tax;
		else
			return $query!==null && $query->get('product_cat')!='' || is_product_category() ? 'product_cat' : '';
	}
}

// Return false if current plugin not need theme orderby setting
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_orderby_need' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_orderby_need',	'lorem_ipsum_books_media_store_woocommerce_orderby_need', 9, 1);
	function lorem_ipsum_books_media_store_woocommerce_orderby_need($need) {
		if ($need == false || lorem_ipsum_books_media_store_storage_empty('pre_query'))
			return $need;
		else {
			return lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'post_type')!='product'
					&& lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'product_cat')==''
					&& lorem_ipsum_books_media_store_storage_call_obj_method('pre_query', 'get', 'product_tag')=='';
		}
	}
}

// Add custom post type into list
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_list_post_types' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_list_post_types', 	'lorem_ipsum_books_media_store_woocommerce_list_post_types', 10, 1);
	function lorem_ipsum_books_media_store_woocommerce_list_post_types($list) {
		$list['product'] = esc_html__('Products', 'lorem-ipsum-books-media-store');
		return $list;
	}
}



// Enqueue WooCommerce custom styles
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_frontend_scripts' ) ) {
	//Handler of add_action( 'lorem_ipsum_books_media_store_action_add_styles', 'lorem_ipsum_books_media_store_woocommerce_frontend_scripts' );
	function lorem_ipsum_books_media_store_woocommerce_frontend_scripts() {
		if (lorem_ipsum_books_media_store_is_woocommerce_page() || lorem_ipsum_books_media_store_get_custom_option('show_cart')=='always')
			if (file_exists(lorem_ipsum_books_media_store_get_file_dir('css/plugin.woocommerce.css')))
				wp_enqueue_style( 'lorem-ipsum-books-media-store-plugin.woocommerce-style',  lorem_ipsum_books_media_store_get_file_url('css/plugin.woocommerce.css'), array(), null );
	}
}

// Before main content
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_wrapper_start' ) ) {
	//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	//Handler of add_action('woocommerce_before_main_content', 'lorem_ipsum_books_media_store_woocommerce_wrapper_start', 10);
	function lorem_ipsum_books_media_store_woocommerce_wrapper_start() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			<article class="post_item post_item_single post_item_product">
			<?php
		} else {
			?>
			<div class="list_products shop_mode_<?php echo !lorem_ipsum_books_media_store_storage_empty('shop_mode') ? lorem_ipsum_books_media_store_storage_get('shop_mode') : 'thumbs'; ?>">
			<?php
		}
	}
}

// After main content
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_wrapper_end' ) ) {
	//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	//Handler of add_action('woocommerce_after_main_content', 'lorem_ipsum_books_media_store_woocommerce_wrapper_end', 10);
	function lorem_ipsum_books_media_store_woocommerce_wrapper_end() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			</article>	<!-- .post_item -->
			<?php
		} else {
			?>
			</div>	<!-- .list_products -->
			<?php
		}
	}
}

// Check to show page title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_page_title' ) ) {
	//Handler of add_action('woocommerce_show_page_title', 'lorem_ipsum_books_media_store_woocommerce_show_page_title', 10);
	function lorem_ipsum_books_media_store_woocommerce_show_page_title($defa=true) {
		return lorem_ipsum_books_media_store_get_custom_option('show_page_title')=='no';
	}
}

// Check to show product title
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_product_title' ) ) {
	//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
	//Handler of add_action( 'woocommerce_single_product_summary', 'lorem_ipsum_books_media_store_woocommerce_show_product_title', 5 );
	function lorem_ipsum_books_media_store_woocommerce_show_product_title() {
		if (lorem_ipsum_books_media_store_get_custom_option('show_post_title')=='yes' || lorem_ipsum_books_media_store_get_custom_option('show_page_title')=='no') {
			wc_get_template( 'single-product/title.php' );
		}
	}
}

// Add list mode buttons
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_before_shop_loop' ) ) {
	//Handler of add_action( 'woocommerce_before_shop_loop', 'lorem_ipsum_books_media_store_woocommerce_before_shop_loop', 10 );
	function lorem_ipsum_books_media_store_woocommerce_before_shop_loop() {
//
        echo '';
	}
}


// Open thumbs wrapper for categories and products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper' ) ) {
	//Handler of add_action( 'woocommerce_before_subcategory_title', 'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper', 9 );
	//Handler of add_action( 'woocommerce_before_shop_loop_item_title', 'lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper', 9 );
	function lorem_ipsum_books_media_store_woocommerce_open_thumb_wrapper($cat='') {
		lorem_ipsum_books_media_store_storage_set('in_product_item', true);
		?>
		<div class="post_item_wrap">
			<div class="post_featured">
				<div class="post_thumb">
		<?php
	}
}

// Add 'Add to cart' button wrapper into thumbnail wrapper
if ( !function_exists('lorem_ipsum_books_media_store_before_button_container') ) {
    function lorem_ipsum_books_media_store_before_button_container() {
        ?>
        <span class="woocommerce_add_to_cart_button_container">
            <span class="woocommerce_add_to_cart_button_box">
        <?php
    }
}
if ( !function_exists('lorem_ipsum_books_media_store_after_button_container') ) {
    function lorem_ipsum_books_media_store_after_button_container() {
        ?>
            </span>
        </span>
        <?php
    }
}

// Open item wrapper for categories and products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper' ) ) {
	//Handler of add_action( 'woocommerce_before_subcategory_title', 'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper', 20 );
	//Handler of add_action( 'woocommerce_before_shop_loop_item_title', 'lorem_ipsum_books_media_store_woocommerce_open_item_wrapper', 20 );
	function lorem_ipsum_books_media_store_woocommerce_open_item_wrapper($cat='') {
		?>
			</div>
		</div>
		<div class="post_content">
		<?php
	}
}

// Close item wrapper for products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_close_item_wrapper' ) ) {
	//Handler of add_action( 'woocommerce_after_shop_loop_item', 'lorem_ipsum_books_media_store_woocommerce_close_item_wrapper', 20 );
	function lorem_ipsum_books_media_store_woocommerce_close_item_wrapper($cat='') {
		?>
			    </div>
		    </div>
		<?php
		lorem_ipsum_books_media_store_storage_set('in_product_item', false);
	}
}

// Close item wrapper for categories
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_close_item_cat_wrapper' ) ) {
    //Handler of add_action( 'woocommerce_after_subcategory', 'lorem_ipsum_books_media_store_woocommerce_close_item_cat_wrapper', 20 );
    function lorem_ipsum_books_media_store_woocommerce_close_item_cat_wrapper($cat='') {
        ?>
			    </div>
		    </div>
		</a>
		<?php
        lorem_ipsum_books_media_store_storage_set('in_product_item', false);
    }
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_after_shop_loop_item_title' ) ) {
	//Handler of add_action( 'woocommerce_after_shop_loop_item_title', 'lorem_ipsum_books_media_store_woocommerce_after_shop_loop_item_title', 7);
	function lorem_ipsum_books_media_store_woocommerce_after_shop_loop_item_title() {
		if (lorem_ipsum_books_media_store_storage_get('shop_mode') == 'list') {
		    $excerpt = apply_filters('the_excerpt', get_the_excerpt());
			echo '<div class="description">'.trim($excerpt).'</div>';
		}
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_after_subcategory_title' ) ) {
	//Handler of add_action( 'woocommerce_after_subcategory_title', 'lorem_ipsum_books_media_store_woocommerce_after_subcategory_title', 10 );
	function lorem_ipsum_books_media_store_woocommerce_after_subcategory_title($category) {
		if (lorem_ipsum_books_media_store_storage_get('shop_mode') == 'list')
			echo '<div class="description">' . trim($category->description) . '</div>';
	}
}

// Add Product ID for single product
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_product_id' ) ) {
	//Handler of add_action( 'woocommerce_product_meta_end', 'lorem_ipsum_books_media_store_woocommerce_show_product_id', 10);
	function lorem_ipsum_books_media_store_woocommerce_show_product_id() {
		global $post, $product;
		echo '<span class="product_id">'.esc_html__('Product ID: ', 'lorem-ipsum-books-media-store') . '<span>' . ($post->ID) . '</span></span>';
	}
}

// Redefine number of related products
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_output_related_products_args' ) ) {
	//Handler of add_filter( 'woocommerce_output_related_products_args', 'lorem_ipsum_books_media_store_woocommerce_output_related_products_args' );
	function lorem_ipsum_books_media_store_woocommerce_output_related_products_args($args) {
		$ppp = $ccc = 0;
		if (lorem_ipsum_books_media_store_param_is_on(lorem_ipsum_books_media_store_get_custom_option('show_post_related'))) {
			$ccc_add = in_array(lorem_ipsum_books_media_store_get_custom_option('body_style'), array('fullwide', 'fullscreen')) ? 1 : 0;
			$ccc =  lorem_ipsum_books_media_store_get_custom_option('post_related_columns');
			$ccc = $ccc > 0 ? $ccc : (lorem_ipsum_books_media_store_param_is_off(lorem_ipsum_books_media_store_get_custom_option('show_sidebar_main')) ? 3+$ccc_add : 2+$ccc_add);
			$ppp = lorem_ipsum_books_media_store_get_custom_option('post_related_count');
			$ppp = $ppp > 0 ? $ppp : $ccc;
		}
		$args['posts_per_page'] = $ppp;
		$args['columns'] = $ccc;
		return $args;
	}
}

// Number columns for product thumbnails
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_product_thumbnails_columns' ) ) {
	//Handler of add_filter( 'woocommerce_product_thumbnails_columns', 'lorem_ipsum_books_media_store_woocommerce_product_thumbnails_columns' );
	function lorem_ipsum_books_media_store_woocommerce_product_thumbnails_columns($cols) {
		return 4;
	}
}

// Add column class into product item in shop streampage
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class' ) ) {
	//Handler of add_filter( 'post_class', 'lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class' );
	function lorem_ipsum_books_media_store_woocommerce_loop_shop_columns_class($class) {
		global $woocommerce_loop;
		if (is_product()) {
			if (!empty($woocommerce_loop['columns']))
			$class[] = ' column-1_'.esc_attr($woocommerce_loop['columns']);
		} else if (!is_product() && !is_cart() && !is_checkout() && !is_account_page()) {
            if (!is_product() && !is_cart() && !is_checkout() && !is_account_page()) {
                $cols = function_exists('wc_get_default_products_per_row') ? wc_get_default_products_per_row() : 2;
                $class[] = ' column-1_' . $cols;
            }
        }
        return $class;
	}
}

// Search form
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_get_product_search_form' ) ) {
	//Handler of add_filter( 'get_product_search_form', 'lorem_ipsum_books_media_store_woocommerce_get_product_search_form' );
	function lorem_ipsum_books_media_store_woocommerce_get_product_search_form($form) {
		return '
		<form role="search" method="get" class="search_form" action="' . esc_url(home_url('/')) . '">
			<input type="text" class="search_field" placeholder="' . esc_attr__('Search', 'lorem-ipsum-books-media-store') . '" value="' . get_search_query() . '" name="s" title="' . esc_attr__('Search for products:', 'lorem-ipsum-books-media-store') . '" /><button class="search_button icon-search" type="submit"></button>
			<input type="hidden" name="post_type" value="product" />
		</form>
		';
	}
}

// Wrap product title into link
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_the_title' ) ) {
	//Handler of add_filter( 'the_title', 'lorem_ipsum_books_media_store_woocommerce_the_title' );
	function lorem_ipsum_books_media_store_woocommerce_the_title($title) {
		if (lorem_ipsum_books_media_store_storage_get('in_product_item') && get_post_type()=='product') {
			$title = '<a href="'.get_permalink().'">'.($title).'</a>';
		}
		return $title;
	}
}
if ( !function_exists( 'lorem_ipsum_books_media_store_linked_product_title' ) ) {
    //Handler of add_action( 'woocommerce_shop_loop_item_title', 'lorem_ipsum_books_media_store_linked_product_title', 9 );
    function lorem_ipsum_books_media_store_linked_product_title() {
        ?>
        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
        <?php
    }
}

// Category shortcode title replace
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_template_loop_category_title' ) ) {
    //Handler of add_action( 'woocommerce_shop_loop_subcategory_title', 'lorem_ipsum_books_media_store_woocommerce_template_loop_category_title', 9 );
    function lorem_ipsum_books_media_store_woocommerce_template_loop_category_title( $category ) {
        ?>
        <h3>
            <?php
            lorem_ipsum_books_media_store_show_layout($category->name);

            if ( $category->count > 0 )
                echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
            ?>
        </h3>
    <?php
    }
}

// Show pagination links
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_pagination' ) ) {
	//Handler of add_filter( 'woocommerce_after_shop_loop', 'lorem_ipsum_books_media_store_woocommerce_pagination', 10 );
	function lorem_ipsum_books_media_store_woocommerce_pagination() {
        if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
            return;
        }
        $style = lorem_ipsum_books_media_store_get_custom_option('blog_pagination');
		lorem_ipsum_books_media_store_show_pagination(array(
			'class' => 'pagination_wrap pagination_' . esc_attr($style),
			'style' => $style,
			'button_class' => '',
			'first_text'=> '',
			'last_text' => '',
			'prev_text' => 'Prev',
			'next_text' => 'Next',
			'pages_in_group' => $style=='pages' ? 10 : 20
			)
		);
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_required_plugins' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_required_plugins',	'lorem_ipsum_books_media_store_woocommerce_required_plugins');
	function lorem_ipsum_books_media_store_woocommerce_required_plugins($list=array()) {
		if (in_array('woocommerce', lorem_ipsum_books_media_store_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> 'WooCommerce',
					'slug' 		=> 'woocommerce',
					'required' 	=> false
				);

		return $list;
	}
}

// Show products navigation
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_show_post_navi' ) ) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_show_post_navi', 'lorem_ipsum_books_media_store_woocommerce_show_post_navi');
	function lorem_ipsum_books_media_store_woocommerce_show_post_navi($show=false) {
		return $show; //|| (lorem_ipsum_books_media_store_get_custom_option('show_page_title')=='yes' && is_single() && lorem_ipsum_books_media_store_is_woocommerce_page());
	}
}


// Register shortcodes to the internal builder
//------------------------------------------------------------------------
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_reg_shortcodes' ) ) {
	//Handler of add_action('lorem_ipsum_books_media_store_action_shortcodes_list', 'lorem_ipsum_books_media_store_woocommerce_reg_shortcodes', 20);
	function lorem_ipsum_books_media_store_woocommerce_reg_shortcodes() {

		// WooCommerce - Cart
		lorem_ipsum_books_media_store_sc_map("woocommerce_cart", array(
			"title" => esc_html__("Woocommerce: Cart", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show Cart page", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array()
			)
		);

		// WooCommerce - Checkout
		lorem_ipsum_books_media_store_sc_map("woocommerce_checkout", array(
			"title" => esc_html__("Woocommerce: Checkout", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show Checkout page", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array()
			)
		);

		// WooCommerce - My Account
		lorem_ipsum_books_media_store_sc_map("woocommerce_my_account", array(
			"title" => esc_html__("Woocommerce: My Account", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show My Account page", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array()
			)
		);

		// WooCommerce - Order Tracking
		lorem_ipsum_books_media_store_sc_map("woocommerce_order_tracking", array(
			"title" => esc_html__("Woocommerce: Order Tracking", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show Order Tracking page", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array()
			)
		);

		// WooCommerce - Shop Messages
		lorem_ipsum_books_media_store_sc_map("shop_messages", array(
			"title" => esc_html__("Woocommerce: Shop Messages", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show shop messages", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array()
			)
		);

		// WooCommerce - Product Page
		lorem_ipsum_books_media_store_sc_map("product_page", array(
			"title" => esc_html__("Woocommerce: Product Page", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: display single product page", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"sku" => array(
					"title" => esc_html__("SKU", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("SKU code of displayed product", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"id" => array(
					"title" => esc_html__("ID", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("ID of displayed product", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"posts_per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => "1",
					"min" => 1,
					"type" => "spinner"
				),
				"post_type" => array(
					"title" => esc_html__("Post type", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Post type for the WP query (leave 'product')", 'lorem-ipsum-books-media-store') ),
					"value" => "product",
					"type" => "text"
				),
				"post_status" => array(
					"title" => esc_html__("Post status", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Display posts only with this status", 'lorem-ipsum-books-media-store') ),
					"value" => "publish",
					"type" => "select",
					"options" => array(
						"publish" => esc_html__('Publish', 'lorem-ipsum-books-media-store'),
						"protected" => esc_html__('Protected', 'lorem-ipsum-books-media-store'),
						"private" => esc_html__('Private', 'lorem-ipsum-books-media-store'),
						"pending" => esc_html__('Pending', 'lorem-ipsum-books-media-store'),
						"draft" => esc_html__('Draft', 'lorem-ipsum-books-media-store')
						)
					)
				)
			)
		);

		// WooCommerce - Product
		lorem_ipsum_books_media_store_sc_map("product", array(
			"title" => esc_html__("Woocommerce: Product", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: display one product", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"sku" => array(
					"title" => esc_html__("SKU", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("SKU code of displayed product", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"id" => array(
					"title" => esc_html__("ID", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("ID of displayed product", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
					)
				)
			)
		);

		// WooCommerce - Best Selling Products
		lorem_ipsum_books_media_store_sc_map("best_selling_products", array(
			"title" => esc_html__("Woocommerce: Best Selling Products", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show best selling products", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
					)
				)
			)
		);

		// WooCommerce - Recent Products
		lorem_ipsum_books_media_store_sc_map("recent_products", array(
			"title" => esc_html__("Woocommerce: Recent Products", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show recent products", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
					)
				)
			)
		);

		// WooCommerce - Related Products
		lorem_ipsum_books_media_store_sc_map("related_products", array(
			"title" => esc_html__("Woocommerce: Related Products", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show related products", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"posts_per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
						)
					)
				)
			)
		);

		// WooCommerce - Featured Products
		lorem_ipsum_books_media_store_sc_map("featured_products", array(
			"title" => esc_html__("Woocommerce: Featured Products", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show featured products", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
					)
				)
			)
		);

		// WooCommerce - Top Rated Products
		lorem_ipsum_books_media_store_sc_map("featured_products", array(
			"title" => esc_html__("Woocommerce: Top Rated Products", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show top rated products", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
					)
				)
			)
		);

		// WooCommerce - Sale Products
		lorem_ipsum_books_media_store_sc_map("featured_products", array(
			"title" => esc_html__("Woocommerce: Sale Products", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: list products on sale", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
					)
				)
			)
		);

		// WooCommerce - Product Category
		lorem_ipsum_books_media_store_sc_map("product_category", array(
			"title" => esc_html__("Woocommerce: Products from category", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: list products in specified category(-ies)", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
				),
				"category" => array(
					"title" => esc_html__("Categories", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Comma separated category slugs", 'lorem-ipsum-books-media-store') ),
					"value" => '',
					"type" => "text"
				),
				"operator" => array(
					"title" => esc_html__("Operator", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Categories operator", 'lorem-ipsum-books-media-store') ),
					"value" => "IN",
					"type" => "checklist",
					"size" => "medium",
					"options" => array(
						"IN" => esc_html__('IN', 'lorem-ipsum-books-media-store'),
						"NOT IN" => esc_html__('NOT IN', 'lorem-ipsum-books-media-store'),
						"AND" => esc_html__('AND', 'lorem-ipsum-books-media-store')
						)
					)
				)
			)
		);

		// WooCommerce - Products
		lorem_ipsum_books_media_store_sc_map("products", array(
			"title" => esc_html__("Woocommerce: Products", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: list all products", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"skus" => array(
					"title" => esc_html__("SKUs", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Comma separated SKU codes of products", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"ids" => array(
					"title" => esc_html__("IDs", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Comma separated ID of products", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
					)
				)
			)
		);

		// WooCommerce - Product attribute
		lorem_ipsum_books_media_store_sc_map("product_attribute", array(
			"title" => esc_html__("Woocommerce: Products by Attribute", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show products with specified attribute", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"per_page" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
				),
				"attribute" => array(
					"title" => esc_html__("Attribute", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Attribute name", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"filter" => array(
					"title" => esc_html__("Filter", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Attribute value", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
					)
				)
			)
		);

		// WooCommerce - Products Categories
		lorem_ipsum_books_media_store_sc_map("product_categories", array(
			"title" => esc_html__("Woocommerce: Product Categories", 'lorem-ipsum-books-media-store'),
			"desc" => wp_kses_data( __("WooCommerce shortcode: show categories with products", 'lorem-ipsum-books-media-store') ),
			"decorate" => false,
			"container" => false,
			"params" => array(
				"number" => array(
					"title" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many categories showed", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 1,
					"type" => "spinner"
				),
				"columns" => array(
					"title" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("How many columns per row use for categories output", 'lorem-ipsum-books-media-store') ),
					"value" => 4,
					"min" => 2,
					"max" => 4,
					"type" => "spinner"
				),
				"orderby" => array(
					"title" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "date",
					"type" => "select",
					"options" => array(
						"date" => esc_html__('Date', 'lorem-ipsum-books-media-store'),
						"title" => esc_html__('Title', 'lorem-ipsum-books-media-store')
					)
				),
				"order" => array(
					"title" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
					"value" => "desc",
					"type" => "switch",
					"size" => "big",
					"options" => lorem_ipsum_books_media_store_get_sc_param('ordering')
				),
				"parent" => array(
					"title" => esc_html__("Parent", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Parent category slug", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"ids" => array(
					"title" => esc_html__("IDs", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Comma separated ID of products", 'lorem-ipsum-books-media-store') ),
					"value" => "",
					"type" => "text"
				),
				"hide_empty" => array(
					"title" => esc_html__("Hide empty", 'lorem-ipsum-books-media-store'),
					"desc" => wp_kses_data( __("Hide empty categories", 'lorem-ipsum-books-media-store') ),
					"value" => "yes",
					"type" => "switch",
					"options" => lorem_ipsum_books_media_store_get_sc_param('yes_no')
					)
				)
			)
		);
	}
}



// Register shortcodes to the VC builder
//------------------------------------------------------------------------
if ( !function_exists( 'lorem_ipsum_books_media_store_woocommerce_reg_shortcodes_vc' ) ) {
	//Handler of add_action('lorem_ipsum_books_media_store_action_shortcodes_list_vc', 'lorem_ipsum_books_media_store_woocommerce_reg_shortcodes_vc');
	function lorem_ipsum_books_media_store_woocommerce_reg_shortcodes_vc() {

		if (false && function_exists('lorem_ipsum_books_media_store_exists_woocommerce') && lorem_ipsum_books_media_store_exists_woocommerce()) {

			// WooCommerce - Cart
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "woocommerce_cart",
				"name" => esc_html__("Cart", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show cart page", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_wooc_cart',
				"class" => "trx_sc_alone trx_sc_woocommerce_cart",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => false,
				"params" => array(
					array(
						"param_name" => "dummy",
						"heading" => esc_html__("Dummy data", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Dummy data - not used in shortcodes", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => "",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Woocommerce_Cart extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeAlone {}


			// WooCommerce - Checkout
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "woocommerce_checkout",
				"name" => esc_html__("Checkout", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show checkout page", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_wooc_checkout',
				"class" => "trx_sc_alone trx_sc_woocommerce_checkout",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => false,
				"params" => array(
					array(
						"param_name" => "dummy",
						"heading" => esc_html__("Dummy data", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Dummy data - not used in shortcodes", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => "",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Woocommerce_Checkout extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeAlone {}


			// WooCommerce - My Account
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "woocommerce_my_account",
				"name" => esc_html__("My Account", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show my account page", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_wooc_my_account',
				"class" => "trx_sc_alone trx_sc_woocommerce_my_account",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => false,
				"params" => array(
					array(
						"param_name" => "dummy",
						"heading" => esc_html__("Dummy data", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Dummy data - not used in shortcodes", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => "",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Woocommerce_My_Account extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeAlone {}


			// WooCommerce - Order Tracking
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "woocommerce_order_tracking",
				"name" => esc_html__("Order Tracking", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show order tracking page", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_wooc_order_tracking',
				"class" => "trx_sc_alone trx_sc_woocommerce_order_tracking",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => false,
				"params" => array(
					array(
						"param_name" => "dummy",
						"heading" => esc_html__("Dummy data", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Dummy data - not used in shortcodes", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => "",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Woocommerce_Order_Tracking extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeAlone {}


			// WooCommerce - Shop Messages
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "shop_messages",
				"name" => esc_html__("Shop Messages", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show shop messages", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_wooc_shop_messages',
				"class" => "trx_sc_alone trx_sc_shop_messages",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => false,
				"params" => array(
					array(
						"param_name" => "dummy",
						"heading" => esc_html__("Dummy data", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Dummy data - not used in shortcodes", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => "",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Shop_Messages extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeAlone {}


			// WooCommerce - Product Page
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "product_page",
				"name" => esc_html__("Product Page", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: display single product page", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_product_page',
				"class" => "trx_sc_single trx_sc_product_page",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "sku",
						"heading" => esc_html__("SKU", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("SKU code of displayed product", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "id",
						"heading" => esc_html__("ID", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("ID of displayed product", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "posts_per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "post_type",
						"heading" => esc_html__("Post type", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Post type for the WP query (leave 'product')", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => "product",
						"type" => "textfield"
					),
					array(
						"param_name" => "post_status",
						"heading" => esc_html__("Post status", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Display posts only with this status", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => array(
							esc_html__('Publish', 'lorem-ipsum-books-media-store') => 'publish',
							esc_html__('Protected', 'lorem-ipsum-books-media-store') => 'protected',
							esc_html__('Private', 'lorem-ipsum-books-media-store') => 'private',
							esc_html__('Pending', 'lorem-ipsum-books-media-store') => 'pending',
							esc_html__('Draft', 'lorem-ipsum-books-media-store') => 'draft'
						),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Product_Page extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Product
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "product",
				"name" => esc_html__("Product", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: display one product", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_product',
				"class" => "trx_sc_single trx_sc_product",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "sku",
						"heading" => esc_html__("SKU", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Product's SKU code", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "id",
						"heading" => esc_html__("ID", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Product's ID", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Product extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}


			// WooCommerce - Best Selling Products
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "best_selling_products",
				"name" => esc_html__("Best Selling Products", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show best selling products", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_best_selling_products',
				"class" => "trx_sc_single trx_sc_best_selling_products",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Best_Selling_Products extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Recent Products
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "recent_products",
				"name" => esc_html__("Recent Products", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show recent products", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_recent_products',
				"class" => "trx_sc_single trx_sc_recent_products",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"

					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Recent_Products extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Related Products
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "related_products",
				"name" => esc_html__("Related Products", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show related products", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_related_products',
				"class" => "trx_sc_single trx_sc_related_products",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "posts_per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Related_Products extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Featured Products
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "featured_products",
				"name" => esc_html__("Featured Products", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show featured products", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_featured_products',
				"class" => "trx_sc_single trx_sc_featured_products",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Featured_Products extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Top Rated Products
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "top_rated_products",
				"name" => esc_html__("Top Rated Products", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show top rated products", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_top_rated_products',
				"class" => "trx_sc_single trx_sc_top_rated_products",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Top_Rated_Products extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Sale Products
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "sale_products",
				"name" => esc_html__("Sale Products", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: list products on sale", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_sale_products',
				"class" => "trx_sc_single trx_sc_sale_products",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Sale_Products extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Product Category
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "product_category",
				"name" => esc_html__("Products from category", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: list products in specified category(-ies)", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_product_category',
				"class" => "trx_sc_single trx_sc_product_category",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					),
					array(
						"param_name" => "category",
						"heading" => esc_html__("Categories", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Comma separated category slugs", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "operator",
						"heading" => esc_html__("Operator", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Categories operator", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('IN', 'lorem-ipsum-books-media-store') => 'IN',
							esc_html__('NOT IN', 'lorem-ipsum-books-media-store') => 'NOT IN',
							esc_html__('AND', 'lorem-ipsum-books-media-store') => 'AND'
						),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Product_Category extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Products
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "products",
				"name" => esc_html__("Products", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: list all products", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_products',
				"class" => "trx_sc_single trx_sc_products",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "skus",
						"heading" => esc_html__("SKUs", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Comma separated SKU codes of products", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "ids",
						"heading" => esc_html__("IDs", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Comma separated ID of products", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					)
				)
			) );

			class WPBakeryShortCode_Products extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}




			// WooCommerce - Product Attribute
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "product_attribute",
				"name" => esc_html__("Products by Attribute", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show products with specified attribute", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_product_attribute',
				"class" => "trx_sc_single trx_sc_product_attribute",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "per_page",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many products showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					),
					array(
						"param_name" => "attribute",
						"heading" => esc_html__("Attribute", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Attribute name", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "filter",
						"heading" => esc_html__("Filter", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Attribute value", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					)
				)
			) );

			class WPBakeryShortCode_Product_Attribute extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}



			// WooCommerce - Products Categories
			//-------------------------------------------------------------------------------------

			vc_map( array(
				"base" => "product_categories",
				"name" => esc_html__("Product Categories", 'lorem-ipsum-books-media-store'),
				"description" => wp_kses_data( __("WooCommerce shortcode: show categories with products", 'lorem-ipsum-books-media-store') ),
				"category" => esc_html__('WooCommerce', 'lorem-ipsum-books-media-store'),
				'icon' => 'icon_trx_product_categories',
				"class" => "trx_sc_single trx_sc_product_categories",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array(
					array(
						"param_name" => "number",
						"heading" => esc_html__("Number", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many categories showed", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "4",
						"type" => "textfield"
					),
					array(
						"param_name" => "columns",
						"heading" => esc_html__("Columns", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("How many columns per row use for categories output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "1",
						"type" => "textfield"
					),
					array(
						"param_name" => "orderby",
						"heading" => esc_html__("Order by", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array(
							esc_html__('Date', 'lorem-ipsum-books-media-store') => 'date',
							esc_html__('Title', 'lorem-ipsum-books-media-store') => 'title'
						),
						"type" => "dropdown"
					),
					array(
						"param_name" => "order",
						"heading" => esc_html__("Order", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Sorting order for products output", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => array_flip(lorem_ipsum_books_media_store_get_sc_param('ordering')),
						"type" => "dropdown"
					),
					array(
						"param_name" => "parent",
						"heading" => esc_html__("Parent", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Parent category slug", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "date",
						"type" => "textfield"
					),
					array(
						"param_name" => "ids",
						"heading" => esc_html__("IDs", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Comma separated ID of products", 'lorem-ipsum-books-media-store') ),
						"admin_label" => true,
						"class" => "",
						"value" => "",
						"type" => "textfield"
					),
					array(
						"param_name" => "hide_empty",
						"heading" => esc_html__("Hide empty", 'lorem-ipsum-books-media-store'),
						"description" => wp_kses_data( __("Hide empty categories", 'lorem-ipsum-books-media-store') ),
						"class" => "",
						"value" => array("Hide empty" => "1" ),
						"type" => "checkbox"
					)
				)
			) );

			class WPBakeryShortCode_Products_Categories extends LOREM_IPSUM_BOOKS_MEDIA_STORE_VC_ShortCodeSingle {}

		}
	}
}
?>