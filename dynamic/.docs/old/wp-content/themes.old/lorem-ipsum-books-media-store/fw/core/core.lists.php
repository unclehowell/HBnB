<?php
/**
 * Lorem Ipsum Books & Media Store Framework: return lists
 *
 * @package lorem_ipsum_books_media_store
 * @since lorem_ipsum_books_media_store 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }



// Return styles list
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_styles' ) ) {
	function lorem_ipsum_books_media_store_get_list_styles($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = sprintf(esc_html__('Style %d', 'lorem-ipsum-books-media-store'), $i);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the shortcodes margins
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_margins' ) ) {
	function lorem_ipsum_books_media_store_get_list_margins($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_margins'))=='') {
			$list = array(
				'null'		=> esc_html__('0 (No margin)',	'lorem-ipsum-books-media-store'),
				'tiny'		=> esc_html__('Tiny',		'lorem-ipsum-books-media-store'),
				'small'		=> esc_html__('Small',		'lorem-ipsum-books-media-store'),
				'medium'	=> esc_html__('Medium',		'lorem-ipsum-books-media-store'),
				'large'		=> esc_html__('Large',		'lorem-ipsum-books-media-store'),
				'huge'		=> esc_html__('Huge',		'lorem-ipsum-books-media-store'),
				'tiny-'		=> esc_html__('Tiny (negative)',	'lorem-ipsum-books-media-store'),
				'small-'	=> esc_html__('Small (negative)',	'lorem-ipsum-books-media-store'),
				'medium-'	=> esc_html__('Medium (negative)',	'lorem-ipsum-books-media-store'),
				'large-'	=> esc_html__('Large (negative)',	'lorem-ipsum-books-media-store'),
				'huge-'		=> esc_html__('Huge (negative)',	'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_margins', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_margins', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the line styles
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_line_styles' ) ) {
	function lorem_ipsum_books_media_store_get_list_line_styles($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_line_styles'))=='') {
			$list = array(
				'solid'	=> esc_html__('Solid', 'lorem-ipsum-books-media-store'),
				'dashed'=> esc_html__('Dashed', 'lorem-ipsum-books-media-store'),
				'dotted'=> esc_html__('Dotted', 'lorem-ipsum-books-media-store'),
				'double'=> esc_html__('Double', 'lorem-ipsum-books-media-store'),
				'image'	=> esc_html__('Image', 'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_line_styles', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_line_styles', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the animations
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_animations' ) ) {
	function lorem_ipsum_books_media_store_get_list_animations($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_animations'))=='') {
			$list = array(
				'none'			=> esc_html__('- None -',	'lorem-ipsum-books-media-store'),
				'bounce'		=> esc_html__('Bounce',		'lorem-ipsum-books-media-store'),
				'elastic'		=> esc_html__('Elastic',	'lorem-ipsum-books-media-store'),
				'flash'			=> esc_html__('Flash',		'lorem-ipsum-books-media-store'),
				'flip'			=> esc_html__('Flip',		'lorem-ipsum-books-media-store'),
				'pulse'			=> esc_html__('Pulse',		'lorem-ipsum-books-media-store'),
				'rubberBand'	=> esc_html__('Rubber Band','lorem-ipsum-books-media-store'),
				'shake'			=> esc_html__('Shake',		'lorem-ipsum-books-media-store'),
				'swing'			=> esc_html__('Swing',		'lorem-ipsum-books-media-store'),
				'tada'			=> esc_html__('Tada',		'lorem-ipsum-books-media-store'),
				'wobble'		=> esc_html__('Wobble',		'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_animations', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_animations', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the enter animations
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_animations_in' ) ) {
	function lorem_ipsum_books_media_store_get_list_animations_in($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_animations_in'))=='') {
			$list = array(
				'none'				=> esc_html__('- None -',			'lorem-ipsum-books-media-store'),
				'bounceIn'			=> esc_html__('Bounce In',			'lorem-ipsum-books-media-store'),
				'bounceInUp'		=> esc_html__('Bounce In Up',		'lorem-ipsum-books-media-store'),
				'bounceInDown'		=> esc_html__('Bounce In Down',		'lorem-ipsum-books-media-store'),
				'bounceInLeft'		=> esc_html__('Bounce In Left',		'lorem-ipsum-books-media-store'),
				'bounceInRight'		=> esc_html__('Bounce In Right',	'lorem-ipsum-books-media-store'),
				'elastic'			=> esc_html__('Elastic In',			'lorem-ipsum-books-media-store'),
				'fadeIn'			=> esc_html__('Fade In',			'lorem-ipsum-books-media-store'),
				'fadeInUp'			=> esc_html__('Fade In Up',			'lorem-ipsum-books-media-store'),
				'fadeInUpSmall'		=> esc_html__('Fade In Up Small',	'lorem-ipsum-books-media-store'),
				'fadeInUpBig'		=> esc_html__('Fade In Up Big',		'lorem-ipsum-books-media-store'),
				'fadeInDown'		=> esc_html__('Fade In Down',		'lorem-ipsum-books-media-store'),
				'fadeInDownBig'		=> esc_html__('Fade In Down Big',	'lorem-ipsum-books-media-store'),
				'fadeInLeft'		=> esc_html__('Fade In Left',		'lorem-ipsum-books-media-store'),
				'fadeInLeftBig'		=> esc_html__('Fade In Left Big',	'lorem-ipsum-books-media-store'),
				'fadeInRight'		=> esc_html__('Fade In Right',		'lorem-ipsum-books-media-store'),
				'fadeInRightBig'	=> esc_html__('Fade In Right Big',	'lorem-ipsum-books-media-store'),
				'flipInX'			=> esc_html__('Flip In X',			'lorem-ipsum-books-media-store'),
				'flipInY'			=> esc_html__('Flip In Y',			'lorem-ipsum-books-media-store'),
				'lightSpeedIn'		=> esc_html__('Light Speed In',		'lorem-ipsum-books-media-store'),
				'rotateIn'			=> esc_html__('Rotate In',			'lorem-ipsum-books-media-store'),
				'rotateInUpLeft'	=> esc_html__('Rotate In Down Left','lorem-ipsum-books-media-store'),
				'rotateInUpRight'	=> esc_html__('Rotate In Up Right',	'lorem-ipsum-books-media-store'),
				'rotateInDownLeft'	=> esc_html__('Rotate In Up Left',	'lorem-ipsum-books-media-store'),
				'rotateInDownRight'	=> esc_html__('Rotate In Down Right','lorem-ipsum-books-media-store'),
				'rollIn'			=> esc_html__('Roll In',			'lorem-ipsum-books-media-store'),
				'slideInUp'			=> esc_html__('Slide In Up',		'lorem-ipsum-books-media-store'),
				'slideInDown'		=> esc_html__('Slide In Down',		'lorem-ipsum-books-media-store'),
				'slideInLeft'		=> esc_html__('Slide In Left',		'lorem-ipsum-books-media-store'),
				'slideInRight'		=> esc_html__('Slide In Right',		'lorem-ipsum-books-media-store'),
				'wipeInLeftTop'		=> esc_html__('Wipe In Left Top',	'lorem-ipsum-books-media-store'),
				'zoomIn'			=> esc_html__('Zoom In',			'lorem-ipsum-books-media-store'),
				'zoomInUp'			=> esc_html__('Zoom In Up',			'lorem-ipsum-books-media-store'),
				'zoomInDown'		=> esc_html__('Zoom In Down',		'lorem-ipsum-books-media-store'),
				'zoomInLeft'		=> esc_html__('Zoom In Left',		'lorem-ipsum-books-media-store'),
				'zoomInRight'		=> esc_html__('Zoom In Right',		'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_animations_in', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_animations_in', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the out animations
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_animations_out' ) ) {
	function lorem_ipsum_books_media_store_get_list_animations_out($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_animations_out'))=='') {
			$list = array(
				'none'				=> esc_html__('- None -',			'lorem-ipsum-books-media-store'),
				'bounceOut'			=> esc_html__('Bounce Out',			'lorem-ipsum-books-media-store'),
				'bounceOutUp'		=> esc_html__('Bounce Out Up',		'lorem-ipsum-books-media-store'),
				'bounceOutDown'		=> esc_html__('Bounce Out Down',	'lorem-ipsum-books-media-store'),
				'bounceOutLeft'		=> esc_html__('Bounce Out Left',	'lorem-ipsum-books-media-store'),
				'bounceOutRight'	=> esc_html__('Bounce Out Right',	'lorem-ipsum-books-media-store'),
				'fadeOut'			=> esc_html__('Fade Out',			'lorem-ipsum-books-media-store'),
				'fadeOutUp'			=> esc_html__('Fade Out Up',		'lorem-ipsum-books-media-store'),
				'fadeOutUpBig'		=> esc_html__('Fade Out Up Big',	'lorem-ipsum-books-media-store'),
				'fadeOutDown'		=> esc_html__('Fade Out Down',		'lorem-ipsum-books-media-store'),
				'fadeOutDownSmall'	=> esc_html__('Fade Out Down Small','lorem-ipsum-books-media-store'),
				'fadeOutDownBig'	=> esc_html__('Fade Out Down Big',	'lorem-ipsum-books-media-store'),
				'fadeOutLeft'		=> esc_html__('Fade Out Left',		'lorem-ipsum-books-media-store'),
				'fadeOutLeftBig'	=> esc_html__('Fade Out Left Big',	'lorem-ipsum-books-media-store'),
				'fadeOutRight'		=> esc_html__('Fade Out Right',		'lorem-ipsum-books-media-store'),
				'fadeOutRightBig'	=> esc_html__('Fade Out Right Big',	'lorem-ipsum-books-media-store'),
				'flipOutX'			=> esc_html__('Flip Out X',			'lorem-ipsum-books-media-store'),
				'flipOutY'			=> esc_html__('Flip Out Y',			'lorem-ipsum-books-media-store'),
				'hinge'				=> esc_html__('Hinge Out',			'lorem-ipsum-books-media-store'),
				'lightSpeedOut'		=> esc_html__('Light Speed Out',	'lorem-ipsum-books-media-store'),
				'rotateOut'			=> esc_html__('Rotate Out',			'lorem-ipsum-books-media-store'),
				'rotateOutUpLeft'	=> esc_html__('Rotate Out Down Left','lorem-ipsum-books-media-store'),
				'rotateOutUpRight'	=> esc_html__('Rotate Out Up Right','lorem-ipsum-books-media-store'),
				'rotateOutDownLeft'	=> esc_html__('Rotate Out Up Left',	'lorem-ipsum-books-media-store'),
				'rotateOutDownRight'=> esc_html__('Rotate Out Down Right','lorem-ipsum-books-media-store'),
				'rollOut'			=> esc_html__('Roll Out',			'lorem-ipsum-books-media-store'),
				'slideOutUp'		=> esc_html__('Slide Out Up',		'lorem-ipsum-books-media-store'),
				'slideOutDown'		=> esc_html__('Slide Out Down',		'lorem-ipsum-books-media-store'),
				'slideOutLeft'		=> esc_html__('Slide Out Left',		'lorem-ipsum-books-media-store'),
				'slideOutRight'		=> esc_html__('Slide Out Right',	'lorem-ipsum-books-media-store'),
				'zoomOut'			=> esc_html__('Zoom Out',			'lorem-ipsum-books-media-store'),
				'zoomOutUp'			=> esc_html__('Zoom Out Up',		'lorem-ipsum-books-media-store'),
				'zoomOutDown'		=> esc_html__('Zoom Out Down',		'lorem-ipsum-books-media-store'),
				'zoomOutLeft'		=> esc_html__('Zoom Out Left',		'lorem-ipsum-books-media-store'),
				'zoomOutRight'		=> esc_html__('Zoom Out Right',		'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_animations_out', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_animations_out', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return classes list for the specified animation
if (!function_exists('lorem_ipsum_books_media_store_get_animation_classes')) {
	function lorem_ipsum_books_media_store_get_animation_classes($animation, $speed='normal', $loop='none') {
		// speed:	fast=0.5s | normal=1s | slow=2s
		// loop:	none | infinite
		return lorem_ipsum_books_media_store_param_is_off($animation) ? '' : 'animated '.esc_attr($animation).' '.esc_attr($speed).(!lorem_ipsum_books_media_store_param_is_off($loop) ? ' '.esc_attr($loop) : '');
	}
}


// Return list of the main menu hover effects
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_menu_hovers' ) ) {
	function lorem_ipsum_books_media_store_get_list_menu_hovers($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_menu_hovers'))=='') {
			$list = array(
				'fade'			=> esc_html__('Fade',		'lorem-ipsum-books-media-store'),
				'slide_line'	=> esc_html__('Slide Line',	'lorem-ipsum-books-media-store'),
				'slide_box'		=> esc_html__('Slide Box',	'lorem-ipsum-books-media-store'),
				'zoom_line'		=> esc_html__('Zoom Line',	'lorem-ipsum-books-media-store'),
				'path_line'		=> esc_html__('Path Line',	'lorem-ipsum-books-media-store'),
				'roll_down'		=> esc_html__('Roll Down',	'lorem-ipsum-books-media-store'),
				'color_line'	=> esc_html__('Color Line',	'lorem-ipsum-books-media-store'),
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_menu_hovers', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_menu_hovers', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the button's hover effects
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_button_hovers' ) ) {
	function lorem_ipsum_books_media_store_get_list_button_hovers($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_button_hovers'))=='') {
			$list = array(
				'default'		=> esc_html__('Default',			'lorem-ipsum-books-media-store'),
				'fade'			=> esc_html__('Fade',				'lorem-ipsum-books-media-store'),
				'slide_left'	=> esc_html__('Slide from Left',	'lorem-ipsum-books-media-store'),
				'slide_top'		=> esc_html__('Slide from Top',		'lorem-ipsum-books-media-store'),
				'arrow'			=> esc_html__('Arrow',				'lorem-ipsum-books-media-store'),
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_button_hovers', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_button_hovers', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the input field's hover effects
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_input_hovers' ) ) {
	function lorem_ipsum_books_media_store_get_list_input_hovers($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_input_hovers'))=='') {
			$list = array(
				'default'	=> esc_html__('Default',	'lorem-ipsum-books-media-store'),
				'accent'	=> esc_html__('Accented',	'lorem-ipsum-books-media-store'),
				'path'		=> esc_html__('Path',		'lorem-ipsum-books-media-store'),
				'jump'		=> esc_html__('Jump',		'lorem-ipsum-books-media-store'),
				'underline'	=> esc_html__('Underline',	'lorem-ipsum-books-media-store'),
				'iconed'	=> esc_html__('Iconed',		'lorem-ipsum-books-media-store'),
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_input_hovers', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_input_hovers', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the search field's styles
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_search_styles' ) ) {
	function lorem_ipsum_books_media_store_get_list_search_styles($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_search_styles'))=='') {
			$list = array(
				'default'	=> esc_html__('Default',	'lorem-ipsum-books-media-store'),
				'fullscreen'=> esc_html__('Fullscreen',	'lorem-ipsum-books-media-store'),
				'slide'		=> esc_html__('Slide',		'lorem-ipsum-books-media-store'),
				'expand'	=> esc_html__('Expand',		'lorem-ipsum-books-media-store'),
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_search_styles', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_search_styles', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of categories
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_categories' ) ) {
	function lorem_ipsum_books_media_store_get_list_categories($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_categories'))=='') {
			$list = array();
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
			$taxonomies = get_categories( $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;
				}
			}
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_categories', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of taxonomies
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_terms' ) ) {
	function lorem_ipsum_books_media_store_get_list_terms($prepend_inherit=false, $taxonomy='category') {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_taxonomies_'.($taxonomy)))=='') {
			$list = array();
			if ( is_array($taxonomy) || taxonomy_exists($taxonomy) ) {
				$terms = get_terms( $taxonomy, array(
					'child_of'                 => 0,
					'parent'                   => '',
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hide_empty'               => 0,
					'hierarchical'             => 1,
					'exclude'                  => '',
					'include'                  => '',
					'number'                   => '',
					'taxonomy'                 => $taxonomy,
					'pad_counts'               => false
					)
				);
			} else {
				$terms = lorem_ipsum_books_media_store_get_terms_by_taxonomy_from_db($taxonomy);
			}
			if (!is_wp_error( $terms ) && is_array($terms) && count($terms) > 0) {
				foreach ($terms as $cat) {
					$list[$cat->term_id] = $cat->name;	// . ($taxonomy!='category' ? ' /'.($cat->taxonomy).'/' : '');
				}
			}
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_taxonomies_'.($taxonomy), $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list of post's types
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_posts_types' ) ) {
	function lorem_ipsum_books_media_store_get_list_posts_types($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_posts_types'))=='') {
			// Return only theme inheritance supported post types
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_post_types', array());
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_posts_types', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list post items from any post type and taxonomy
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_posts' ) ) {
	function lorem_ipsum_books_media_store_get_list_posts($prepend_inherit=false, $opt=array()) {
		$opt = array_merge(array(
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'taxonomy'			=> 'category',
			'taxonomy_value'	=> '',
			'suppress_filters' => false,
			'posts_per_page'	=> -1,
			'orderby'			=> 'post_date',
			'order'				=> 'desc',
			'return'			=> 'id'
			), is_array($opt) ? $opt : array('post_type'=>$opt));

		$hash = 'list_posts_'.($opt['post_type']).'_'.($opt['taxonomy']).'_'.($opt['taxonomy_value']).'_'.($opt['orderby']).'_'.($opt['order']).'_'.($opt['return']).'_'.($opt['posts_per_page']);
		if (($list = lorem_ipsum_books_media_store_storage_get($hash))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'lorem-ipsum-books-media-store');
			$args = array(
				'post_type' => $opt['post_type'],
				'post_status' => $opt['post_status'],
				'posts_per_page' => $opt['posts_per_page'],
				'ignore_sticky_posts' => true,
				'orderby'	=> $opt['orderby'],
				'order'		=> $opt['order']
			);
			if (!empty($opt['taxonomy_value'])) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $opt['taxonomy'],
						'field' => (int) $opt['taxonomy_value'] > 0 ? 'id' : 'slug',
						'terms' => $opt['taxonomy_value']
					)
				);
			}
			$posts = get_posts( $args );
			if (is_array($posts) && count($posts) > 0) {
				foreach ($posts as $post) {
					$list[$opt['return']=='id' ? $post->ID : $post->post_title] = $post->post_title;
				}
			}
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set($hash, $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list pages
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_pages' ) ) {
	function lorem_ipsum_books_media_store_get_list_pages($prepend_inherit=false, $opt=array()) {
		$opt = array_merge(array(
			'post_type'			=> 'page',
			'post_status'		=> 'publish',
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'order'				=> 'asc',
			'return'			=> 'id'
			), is_array($opt) ? $opt : array('post_type'=>$opt));
		return lorem_ipsum_books_media_store_get_list_posts($prepend_inherit, $opt);
	}
}


// Return list of registered users
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_users' ) ) {
	function lorem_ipsum_books_media_store_get_list_users($prepend_inherit=false, $roles=array('administrator', 'editor', 'author', 'contributor', 'shop_manager')) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_users'))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'lorem-ipsum-books-media-store');
			$args = array(
				'orderby'	=> 'display_name',
				'order'		=> 'ASC' );
			$users = get_users( $args );
			if (is_array($users) && count($users) > 0) {
				foreach ($users as $user) {
					$accept = true;
					if (is_array($user->roles)) {
						if (is_array($user->roles) && count($user->roles) > 0) {
							$accept = false;
							foreach ($user->roles as $role) {
								if (in_array($role, $roles)) {
									$accept = true;
									break;
								}
							}
						}
					}
					if ($accept) $list[$user->user_login] = $user->display_name;
				}
			}
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_users', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return slider engines list, prepended inherit (if need)
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_sliders' ) ) {
	function lorem_ipsum_books_media_store_get_list_sliders($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_sliders'))=='') {
			$list = array(
				'swiper' => esc_html__("Posts slider (Swiper)", 'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_sliders', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_sliders', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return slider controls list, prepended inherit (if need)
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_slider_controls' ) ) {
	function lorem_ipsum_books_media_store_get_list_slider_controls($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_slider_controls'))=='') {
			$list = array(
				'no'		=> esc_html__('None', 'lorem-ipsum-books-media-store'),
				'side'		=> esc_html__('Side', 'lorem-ipsum-books-media-store'),
				'bottom'	=> esc_html__('Bottom', 'lorem-ipsum-books-media-store'),
				'pagination'=> esc_html__('Pagination', 'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_slider_controls', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_slider_controls', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return slider controls classes
if ( !function_exists( 'lorem_ipsum_books_media_store_get_slider_controls_classes' ) ) {
	function lorem_ipsum_books_media_store_get_slider_controls_classes($controls) {
		if (lorem_ipsum_books_media_store_param_is_off($controls))	$classes = 'sc_slider_nopagination sc_slider_nocontrols';
		else if ($controls=='bottom')			$classes = 'sc_slider_nopagination sc_slider_controls sc_slider_controls_bottom';
		else if ($controls=='pagination')		$classes = 'sc_slider_pagination sc_slider_pagination_bottom sc_slider_nocontrols';
		else									$classes = 'sc_slider_nopagination sc_slider_controls sc_slider_controls_side';
		return $classes;
	}
}

// Return list with popup engines
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_popup_engines' ) ) {
	function lorem_ipsum_books_media_store_get_list_popup_engines($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_popup_engines'))=='') {
			$list = array(
				"pretty"	=> esc_html__("Pretty photo", 'lorem-ipsum-books-media-store'),
				"magnific"	=> esc_html__("Magnific popup", 'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_popup_engines', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_popup_engines', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return menus list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_menus' ) ) {
	function lorem_ipsum_books_media_store_get_list_menus($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_menus'))=='') {
			$list = array();
			$list['default'] = esc_html__("Default", 'lorem-ipsum-books-media-store');
			$menus = wp_get_nav_menus();
			if (is_array($menus) && count($menus) > 0) {
				foreach ($menus as $menu) {
					$list[$menu->slug] = $menu->name;
				}
			}
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_menus', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return custom sidebars list, prepended inherit and main sidebars item (if need)
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_sidebars' ) ) {
	function lorem_ipsum_books_media_store_get_list_sidebars($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_sidebars'))=='') {
			if (($list = lorem_ipsum_books_media_store_storage_get('registered_sidebars'))=='') $list = array();
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_sidebars', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return sidebars positions
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_sidebars_positions' ) ) {
	function lorem_ipsum_books_media_store_get_list_sidebars_positions($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_sidebars_positions'))=='') {
			$list = array(
				'none'  => esc_html__('Hide',  'lorem-ipsum-books-media-store'),
				'left'  => esc_html__('Left',  'lorem-ipsum-books-media-store'),
				'right' => esc_html__('Right', 'lorem-ipsum-books-media-store')
				);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_sidebars_positions', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return sidebars class
if ( !function_exists( 'lorem_ipsum_books_media_store_get_sidebar_class' ) ) {
	function lorem_ipsum_books_media_store_get_sidebar_class() {
		$sb_main = lorem_ipsum_books_media_store_get_custom_option('show_sidebar_main');
		$sb_outer = lorem_ipsum_books_media_store_get_custom_option('show_sidebar_outer');
		return (lorem_ipsum_books_media_store_param_is_off($sb_main) ? 'sidebar_hide' : 'sidebar_show sidebar_'.($sb_main))
				. ' ' . (lorem_ipsum_books_media_store_param_is_off($sb_outer) ? 'sidebar_outer_hide' : 'sidebar_outer_show sidebar_outer_'.($sb_outer));
	}
}

// Return body styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_body_styles' ) ) {
	function lorem_ipsum_books_media_store_get_list_body_styles($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_body_styles'))=='') {
			$list = array(
				'boxed'	=> esc_html__('Boxed',		'lorem-ipsum-books-media-store'),
				'wide'	=> esc_html__('Wide',		'lorem-ipsum-books-media-store')
				);
			if (lorem_ipsum_books_media_store_get_theme_setting('allow_fullscreen')) {
				$list['fullwide']	= esc_html__('Fullwide',	'lorem-ipsum-books-media-store');
				$list['fullscreen']	= esc_html__('Fullscreen',	'lorem-ipsum-books-media-store');
			}
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_body_styles', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_body_styles', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return templates list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_templates' ) ) {
	function lorem_ipsum_books_media_store_get_list_templates($mode='') {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_templates_'.($mode)))=='') {
			$list = array();
			$tpl = lorem_ipsum_books_media_store_storage_get('registered_templates');
			if (is_array($tpl) && count($tpl) > 0) {
				foreach ($tpl as $k=>$v) {
					if ($mode=='' || in_array($mode, explode(',', $v['mode'])))
						$list[$k] = !empty($v['icon']) 
									? $v['icon'] 
									: (!empty($v['title']) 
										? $v['title'] 
										: lorem_ipsum_books_media_store_strtoproper($v['layout'])
										);
				}
			}
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_templates_'.($mode), $list);
		}
		return $list;
	}
}

// Return blog styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_templates_blog' ) ) {
	function lorem_ipsum_books_media_store_get_list_templates_blog($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_templates_blog'))=='') {
			$list = lorem_ipsum_books_media_store_get_list_templates('blog');
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_templates_blog', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return blogger styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_templates_blogger' ) ) {
	function lorem_ipsum_books_media_store_get_list_templates_blogger($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_templates_blogger'))=='') {
			$list = lorem_ipsum_books_media_store_array_merge(lorem_ipsum_books_media_store_get_list_templates('blogger'), lorem_ipsum_books_media_store_get_list_templates('blog'));
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_templates_blogger', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return single page styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_templates_single' ) ) {
	function lorem_ipsum_books_media_store_get_list_templates_single($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_templates_single'))=='') {
			$list = lorem_ipsum_books_media_store_get_list_templates('single');
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_templates_single', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return header styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_templates_header' ) ) {
	function lorem_ipsum_books_media_store_get_list_templates_header($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_templates_header'))=='') {
			$list = lorem_ipsum_books_media_store_get_list_templates('header');
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_templates_header', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return form styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_templates_forms' ) ) {
	function lorem_ipsum_books_media_store_get_list_templates_forms($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_templates_forms'))=='') {
			$list = lorem_ipsum_books_media_store_get_list_templates('forms');
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_templates_forms', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return article styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_article_styles' ) ) {
	function lorem_ipsum_books_media_store_get_list_article_styles($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_article_styles'))=='') {
			$list = array(
				"boxed"   => esc_html__('Boxed', 'lorem-ipsum-books-media-store'),
				"stretch" => esc_html__('Stretch', 'lorem-ipsum-books-media-store')
				);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_article_styles', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return post-formats filters list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_post_formats_filters' ) ) {
	function lorem_ipsum_books_media_store_get_list_post_formats_filters($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_post_formats_filters'))=='') {
			$list = array(
				"no"      => esc_html__('All posts', 'lorem-ipsum-books-media-store'),
				"thumbs"  => esc_html__('With thumbs', 'lorem-ipsum-books-media-store'),
				"reviews" => esc_html__('With reviews', 'lorem-ipsum-books-media-store'),
				"video"   => esc_html__('With videos', 'lorem-ipsum-books-media-store'),
				"audio"   => esc_html__('With audios', 'lorem-ipsum-books-media-store'),
				"gallery" => esc_html__('With galleries', 'lorem-ipsum-books-media-store')
				);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_post_formats_filters', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return portfolio filters list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_portfolio_filters' ) ) {
	function lorem_ipsum_books_media_store_get_list_portfolio_filters($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_portfolio_filters'))=='') {
			$list = array(
				"hide"		=> esc_html__('Hide', 'lorem-ipsum-books-media-store'),
				"tags"		=> esc_html__('Tags', 'lorem-ipsum-books-media-store'),
				"categories"=> esc_html__('Categories', 'lorem-ipsum-books-media-store')
				);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_portfolio_filters', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return hover styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_hovers' ) ) {
	function lorem_ipsum_books_media_store_get_list_hovers($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_hovers'))=='') {
			$list = array();
			$list['circle effect1']  = esc_html__('Circle Effect 1',  'lorem-ipsum-books-media-store');
			$list['circle effect2']  = esc_html__('Circle Effect 2',  'lorem-ipsum-books-media-store');
			$list['circle effect3']  = esc_html__('Circle Effect 3',  'lorem-ipsum-books-media-store');
			$list['circle effect4']  = esc_html__('Circle Effect 4',  'lorem-ipsum-books-media-store');
			$list['circle effect5']  = esc_html__('Circle Effect 5',  'lorem-ipsum-books-media-store');
			$list['circle effect6']  = esc_html__('Circle Effect 6',  'lorem-ipsum-books-media-store');
			$list['circle effect7']  = esc_html__('Circle Effect 7',  'lorem-ipsum-books-media-store');
			$list['circle effect8']  = esc_html__('Circle Effect 8',  'lorem-ipsum-books-media-store');
			$list['circle effect9']  = esc_html__('Circle Effect 9',  'lorem-ipsum-books-media-store');
			$list['circle effect10'] = esc_html__('Circle Effect 10',  'lorem-ipsum-books-media-store');
			$list['circle effect11'] = esc_html__('Circle Effect 11',  'lorem-ipsum-books-media-store');
			$list['circle effect12'] = esc_html__('Circle Effect 12',  'lorem-ipsum-books-media-store');
			$list['circle effect13'] = esc_html__('Circle Effect 13',  'lorem-ipsum-books-media-store');
			$list['circle effect14'] = esc_html__('Circle Effect 14',  'lorem-ipsum-books-media-store');
			$list['circle effect15'] = esc_html__('Circle Effect 15',  'lorem-ipsum-books-media-store');
			$list['circle effect16'] = esc_html__('Circle Effect 16',  'lorem-ipsum-books-media-store');
			$list['circle effect17'] = esc_html__('Circle Effect 17',  'lorem-ipsum-books-media-store');
			$list['circle effect18'] = esc_html__('Circle Effect 18',  'lorem-ipsum-books-media-store');
			$list['circle effect19'] = esc_html__('Circle Effect 19',  'lorem-ipsum-books-media-store');
			$list['circle effect20'] = esc_html__('Circle Effect 20',  'lorem-ipsum-books-media-store');
			$list['square effect1']  = esc_html__('Square Effect 1',  'lorem-ipsum-books-media-store');
			$list['square effect2']  = esc_html__('Square Effect 2',  'lorem-ipsum-books-media-store');
			$list['square effect3']  = esc_html__('Square Effect 3',  'lorem-ipsum-books-media-store');
			$list['square effect5']  = esc_html__('Square Effect 5',  'lorem-ipsum-books-media-store');
			$list['square effect6']  = esc_html__('Square Effect 6',  'lorem-ipsum-books-media-store');
			$list['square effect7']  = esc_html__('Square Effect 7',  'lorem-ipsum-books-media-store');
			$list['square effect8']  = esc_html__('Square Effect 8',  'lorem-ipsum-books-media-store');
			$list['square effect9']  = esc_html__('Square Effect 9',  'lorem-ipsum-books-media-store');
			$list['square effect10'] = esc_html__('Square Effect 10',  'lorem-ipsum-books-media-store');
			$list['square effect11'] = esc_html__('Square Effect 11',  'lorem-ipsum-books-media-store');
			$list['square effect12'] = esc_html__('Square Effect 12',  'lorem-ipsum-books-media-store');
			$list['square effect13'] = esc_html__('Square Effect 13',  'lorem-ipsum-books-media-store');
			$list['square effect14'] = esc_html__('Square Effect 14',  'lorem-ipsum-books-media-store');
			$list['square effect15'] = esc_html__('Square Effect 15',  'lorem-ipsum-books-media-store');
			$list['square effect_dir']   = esc_html__('Square Effect Dir',   'lorem-ipsum-books-media-store');
			$list['square effect_shift'] = esc_html__('Square Effect Shift', 'lorem-ipsum-books-media-store');
			$list['square effect_book']  = esc_html__('Square Effect Book',  'lorem-ipsum-books-media-store');
			$list['square effect_more']  = esc_html__('Square Effect More',  'lorem-ipsum-books-media-store');
			$list['square effect_fade']  = esc_html__('Square Effect Fade',  'lorem-ipsum-books-media-store');
			$list['square effect_pull']  = esc_html__('Square Effect Pull',  'lorem-ipsum-books-media-store');
			$list['square effect_slide'] = esc_html__('Square Effect Slide', 'lorem-ipsum-books-media-store');
			$list['square effect_border'] = esc_html__('Square Effect Border', 'lorem-ipsum-books-media-store');
			$list = apply_filters('lorem_ipsum_books_media_store_filter_portfolio_hovers', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_hovers', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the blog counters
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_blog_counters' ) ) {
	function lorem_ipsum_books_media_store_get_list_blog_counters($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_blog_counters'))=='') {
			$list = array(
				'views'		=> esc_html__('Views', 'lorem-ipsum-books-media-store'),
				'likes'		=> esc_html__('Likes', 'lorem-ipsum-books-media-store'),
				'rating'	=> esc_html__('Rating', 'lorem-ipsum-books-media-store'),
				'comments'	=> esc_html__('Comments', 'lorem-ipsum-books-media-store')
				);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_blog_counters', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_blog_counters', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list of the item sizes for the portfolio alter style, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_alter_sizes' ) ) {
	function lorem_ipsum_books_media_store_get_list_alter_sizes($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_alter_sizes'))=='') {
			$list = array(
					'1_1' => esc_html__('1x1', 'lorem-ipsum-books-media-store'),
					'1_2' => esc_html__('1x2', 'lorem-ipsum-books-media-store'),
					'2_1' => esc_html__('2x1', 'lorem-ipsum-books-media-store'),
					'2_2' => esc_html__('2x2', 'lorem-ipsum-books-media-store'),
					'1_3' => esc_html__('1x3', 'lorem-ipsum-books-media-store'),
					'2_3' => esc_html__('2x3', 'lorem-ipsum-books-media-store'),
					'3_1' => esc_html__('3x1', 'lorem-ipsum-books-media-store'),
					'3_2' => esc_html__('3x2', 'lorem-ipsum-books-media-store'),
					'3_3' => esc_html__('3x3', 'lorem-ipsum-books-media-store')
					);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_portfolio_alter_sizes', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_alter_sizes', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return extended hover directions list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_hovers_directions' ) ) {
	function lorem_ipsum_books_media_store_get_list_hovers_directions($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_hovers_directions'))=='') {
			$list = array(
				'left_to_right' => esc_html__('Left to Right',  'lorem-ipsum-books-media-store'),
				'right_to_left' => esc_html__('Right to Left',  'lorem-ipsum-books-media-store'),
				'top_to_bottom' => esc_html__('Top to Bottom',  'lorem-ipsum-books-media-store'),
				'bottom_to_top' => esc_html__('Bottom to Top',  'lorem-ipsum-books-media-store'),
				'scale_up'      => esc_html__('Scale Up',  'lorem-ipsum-books-media-store'),
				'scale_down'    => esc_html__('Scale Down',  'lorem-ipsum-books-media-store'),
				'scale_down_up' => esc_html__('Scale Down-Up',  'lorem-ipsum-books-media-store'),
				'from_left_and_right' => esc_html__('From Left and Right',  'lorem-ipsum-books-media-store'),
				'from_top_and_bottom' => esc_html__('From Top and Bottom',  'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_portfolio_hovers_directions', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_hovers_directions', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the label positions in the custom forms
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_label_positions' ) ) {
	function lorem_ipsum_books_media_store_get_list_label_positions($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_label_positions'))=='') {
			$list = array(
				'top'		=> esc_html__('Top',		'lorem-ipsum-books-media-store'),
				'bottom'	=> esc_html__('Bottom',		'lorem-ipsum-books-media-store'),
				'left'		=> esc_html__('Left',		'lorem-ipsum-books-media-store'),
				'over'		=> esc_html__('Over',		'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_label_positions', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_label_positions', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the bg image positions
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_bg_image_positions' ) ) {
	function lorem_ipsum_books_media_store_get_list_bg_image_positions($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_bg_image_positions'))=='') {
			$list = array(
				'left top'	   => esc_html__('Left Top', 'lorem-ipsum-books-media-store'),
				'center top'   => esc_html__("Center Top", 'lorem-ipsum-books-media-store'),
				'right top'    => esc_html__("Right Top", 'lorem-ipsum-books-media-store'),
				'left center'  => esc_html__("Left Center", 'lorem-ipsum-books-media-store'),
				'center center'=> esc_html__("Center Center", 'lorem-ipsum-books-media-store'),
				'right center' => esc_html__("Right Center", 'lorem-ipsum-books-media-store'),
				'left bottom'  => esc_html__("Left Bottom", 'lorem-ipsum-books-media-store'),
				'center bottom'=> esc_html__("Center Bottom", 'lorem-ipsum-books-media-store'),
				'right bottom' => esc_html__("Right Bottom", 'lorem-ipsum-books-media-store')
			);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_bg_image_positions', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the bg image repeat
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_bg_image_repeats' ) ) {
	function lorem_ipsum_books_media_store_get_list_bg_image_repeats($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_bg_image_repeats'))=='') {
			$list = array(
				'repeat'	=> esc_html__('Repeat', 'lorem-ipsum-books-media-store'),
				'repeat-x'	=> esc_html__('Repeat X', 'lorem-ipsum-books-media-store'),
				'repeat-y'	=> esc_html__('Repeat Y', 'lorem-ipsum-books-media-store'),
				'no-repeat'	=> esc_html__('No Repeat', 'lorem-ipsum-books-media-store')
			);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_bg_image_repeats', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the bg image attachment
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_bg_image_attachments' ) ) {
	function lorem_ipsum_books_media_store_get_list_bg_image_attachments($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_bg_image_attachments'))=='') {
			$list = array(
				'scroll'	=> esc_html__('Scroll', 'lorem-ipsum-books-media-store'),
				'fixed'		=> esc_html__('Fixed', 'lorem-ipsum-books-media-store'),
				'local'		=> esc_html__('Local', 'lorem-ipsum-books-media-store')
			);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_bg_image_attachments', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}


// Return list of the bg tints
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_bg_tints' ) ) {
	function lorem_ipsum_books_media_store_get_list_bg_tints($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_bg_tints'))=='') {
			$list = array(
				'white'	=> esc_html__('White', 'lorem-ipsum-books-media-store'),
				'light'	=> esc_html__('Light', 'lorem-ipsum-books-media-store'),
				'dark'	=> esc_html__('Dark', 'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_bg_tints', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_bg_tints', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return custom fields types list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_field_types' ) ) {
	function lorem_ipsum_books_media_store_get_list_field_types($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_field_types'))=='') {
			$list = array(
				'text'     => esc_html__('Text',  'lorem-ipsum-books-media-store'),
				'textarea' => esc_html__('Text Area','lorem-ipsum-books-media-store'),
				'password' => esc_html__('Password',  'lorem-ipsum-books-media-store'),
				'radio'    => esc_html__('Radio',  'lorem-ipsum-books-media-store'),
				'checkbox' => esc_html__('Checkbox',  'lorem-ipsum-books-media-store'),
				'select'   => esc_html__('Select',  'lorem-ipsum-books-media-store'),
				'date'     => esc_html__('Date','lorem-ipsum-books-media-store'),
				'time'     => esc_html__('Time','lorem-ipsum-books-media-store'),
				'button'   => esc_html__('Button','lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_field_types', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_field_types', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return Google map styles
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_googlemap_styles' ) ) {
	function lorem_ipsum_books_media_store_get_list_googlemap_styles($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_googlemap_styles'))=='') {
			$list = array(
				'default' => esc_html__('Default', 'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_googlemap_styles', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_googlemap_styles', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return iconed classes list
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_icons' ) ) {
	function lorem_ipsum_books_media_store_get_list_icons($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_icons'))=='') {
			$list = lorem_ipsum_books_media_store_parse_icons_classes(lorem_ipsum_books_media_store_get_file_dir("css/fontello/css/fontello-codes.css"));
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_icons', $list);
		}
		return $prepend_inherit ? array_merge(array('inherit'), $list) : $list;
	}
}

// Return socials list
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_socials' ) ) {
	function lorem_ipsum_books_media_store_get_list_socials($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_socials'))=='') {
            $list = lorem_ipsum_books_media_store_get_list_images(LOREM_IPSUM_BOOKS_MEDIA_STORE_FW_DIR."/images/socials", "png");
            if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_socials', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with 'Yes' and 'No' items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_yesno' ) ) {
	function lorem_ipsum_books_media_store_get_list_yesno($prepend_inherit=false) {
		$list = array(
			'yes' => esc_html__("Yes", 'lorem-ipsum-books-media-store'),
			'no'  => esc_html__("No", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with 'On' and 'Of' items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_onoff' ) ) {
	function lorem_ipsum_books_media_store_get_list_onoff($prepend_inherit=false) {
		$list = array(
			"on" => esc_html__("On", 'lorem-ipsum-books-media-store'),
			"off" => esc_html__("Off", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with 'Show' and 'Hide' items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_showhide' ) ) {
	function lorem_ipsum_books_media_store_get_list_showhide($prepend_inherit=false) {
		$list = array(
			"show" => esc_html__("Show", 'lorem-ipsum-books-media-store'),
			"hide" => esc_html__("Hide", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with 'Ascending' and 'Descending' items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_orderings' ) ) {
	function lorem_ipsum_books_media_store_get_list_orderings($prepend_inherit=false) {
		$list = array(
			"asc" => esc_html__("Ascending", 'lorem-ipsum-books-media-store'),
			"desc" => esc_html__("Descending", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with 'Horizontal' and 'Vertical' items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_directions' ) ) {
	function lorem_ipsum_books_media_store_get_list_directions($prepend_inherit=false) {
		$list = array(
			"horizontal" => esc_html__("Horizontal", 'lorem-ipsum-books-media-store'),
			"vertical" => esc_html__("Vertical", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with item's shapes
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_shapes' ) ) {
	function lorem_ipsum_books_media_store_get_list_shapes($prepend_inherit=false) {
		$list = array(
			"round"  => esc_html__("Round", 'lorem-ipsum-books-media-store'),
			"square" => esc_html__("Square", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with item's sizes
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_sizes' ) ) {
	function lorem_ipsum_books_media_store_get_list_sizes($prepend_inherit=false) {
		$list = array(
			"tiny"   => esc_html__("Tiny", 'lorem-ipsum-books-media-store'),
			"small"  => esc_html__("Small", 'lorem-ipsum-books-media-store'),
			"medium" => esc_html__("Medium", 'lorem-ipsum-books-media-store'),
			"large"  => esc_html__("Large", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with slider (scroll) controls positions
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_controls' ) ) {
	function lorem_ipsum_books_media_store_get_list_controls($prepend_inherit=false) {
		$list = array(
			"hide" => esc_html__("Hide", 'lorem-ipsum-books-media-store'),
			"side" => esc_html__("Side", 'lorem-ipsum-books-media-store'),
			"bottom" => esc_html__("Bottom", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with float items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_floats' ) ) {
	function lorem_ipsum_books_media_store_get_list_floats($prepend_inherit=false) {
		$list = array(
			"none" => esc_html__("None", 'lorem-ipsum-books-media-store'),
			"left" => esc_html__("Float Left", 'lorem-ipsum-books-media-store'),
			"right" => esc_html__("Float Right", 'lorem-ipsum-books-media-store')
		);
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with alignment items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_alignments' ) ) {
	function lorem_ipsum_books_media_store_get_list_alignments($justify=false, $prepend_inherit=false) {
		$list = array(
			"none" => esc_html__("None", 'lorem-ipsum-books-media-store'),
			"left" => esc_html__("Left", 'lorem-ipsum-books-media-store'),
			"center" => esc_html__("Center", 'lorem-ipsum-books-media-store'),
			"right" => esc_html__("Right", 'lorem-ipsum-books-media-store')
		);
		if ($justify) $list["justify"] = esc_html__("Justify", 'lorem-ipsum-books-media-store');
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with horizontal positions
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_hpos' ) ) {
	function lorem_ipsum_books_media_store_get_list_hpos($prepend_inherit=false, $center=false) {
		$list = array();
		$list['left'] = esc_html__("Left", 'lorem-ipsum-books-media-store');
		if ($center) $list['center'] = esc_html__("Center", 'lorem-ipsum-books-media-store');
		$list['right'] = esc_html__("Right", 'lorem-ipsum-books-media-store');
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with vertical positions
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_vpos' ) ) {
	function lorem_ipsum_books_media_store_get_list_vpos($prepend_inherit=false, $center=false) {
		$list = array();
		$list['top'] = esc_html__("Top", 'lorem-ipsum-books-media-store');
		if ($center) $list['center'] = esc_html__("Center", 'lorem-ipsum-books-media-store');
		$list['bottom'] = esc_html__("Bottom", 'lorem-ipsum-books-media-store');
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return sorting list items
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_sortings' ) ) {
	function lorem_ipsum_books_media_store_get_list_sortings($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_sortings'))=='') {
			$list = array(
				"date" => esc_html__("Date", 'lorem-ipsum-books-media-store'),
				"title" => esc_html__("Alphabetically", 'lorem-ipsum-books-media-store'),
				"views" => esc_html__("Popular (views count)", 'lorem-ipsum-books-media-store'),
				"comments" => esc_html__("Most commented (comments count)", 'lorem-ipsum-books-media-store'),
				"author_rating" => esc_html__("Author rating", 'lorem-ipsum-books-media-store'),
				"users_rating" => esc_html__("Visitors (users) rating", 'lorem-ipsum-books-media-store'),
				"random" => esc_html__("Random", 'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_sortings', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_sortings', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list with columns widths
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_columns' ) ) {
	function lorem_ipsum_books_media_store_get_list_columns($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_columns'))=='') {
			$list = array(
				"none" => esc_html__("None", 'lorem-ipsum-books-media-store'),
				"1_1" => esc_html__("100%", 'lorem-ipsum-books-media-store'),
				"1_2" => esc_html__("1/2", 'lorem-ipsum-books-media-store'),
				"1_3" => esc_html__("1/3", 'lorem-ipsum-books-media-store'),
				"2_3" => esc_html__("2/3", 'lorem-ipsum-books-media-store'),
				"1_4" => esc_html__("1/4", 'lorem-ipsum-books-media-store'),
				"3_4" => esc_html__("3/4", 'lorem-ipsum-books-media-store'),
				"1_5" => esc_html__("1/5", 'lorem-ipsum-books-media-store'),
				"2_5" => esc_html__("2/5", 'lorem-ipsum-books-media-store'),
				"3_5" => esc_html__("3/5", 'lorem-ipsum-books-media-store'),
				"4_5" => esc_html__("4/5", 'lorem-ipsum-books-media-store'),
				"1_6" => esc_html__("1/6", 'lorem-ipsum-books-media-store'),
				"5_6" => esc_html__("5/6", 'lorem-ipsum-books-media-store'),
				"1_7" => esc_html__("1/7", 'lorem-ipsum-books-media-store'),
				"2_7" => esc_html__("2/7", 'lorem-ipsum-books-media-store'),
				"3_7" => esc_html__("3/7", 'lorem-ipsum-books-media-store'),
				"4_7" => esc_html__("4/7", 'lorem-ipsum-books-media-store'),
				"5_7" => esc_html__("5/7", 'lorem-ipsum-books-media-store'),
				"6_7" => esc_html__("6/7", 'lorem-ipsum-books-media-store'),
				"1_8" => esc_html__("1/8", 'lorem-ipsum-books-media-store'),
				"3_8" => esc_html__("3/8", 'lorem-ipsum-books-media-store'),
				"5_8" => esc_html__("5/8", 'lorem-ipsum-books-media-store'),
				"7_8" => esc_html__("7/8", 'lorem-ipsum-books-media-store'),
				"1_9" => esc_html__("1/9", 'lorem-ipsum-books-media-store'),
				"2_9" => esc_html__("2/9", 'lorem-ipsum-books-media-store'),
				"4_9" => esc_html__("4/9", 'lorem-ipsum-books-media-store'),
				"5_9" => esc_html__("5/9", 'lorem-ipsum-books-media-store'),
				"7_9" => esc_html__("7/9", 'lorem-ipsum-books-media-store'),
				"8_9" => esc_html__("8/9", 'lorem-ipsum-books-media-store'),
				"1_10"=> esc_html__("1/10", 'lorem-ipsum-books-media-store'),
				"3_10"=> esc_html__("3/10", 'lorem-ipsum-books-media-store'),
				"7_10"=> esc_html__("7/10", 'lorem-ipsum-books-media-store'),
				"9_10"=> esc_html__("9/10", 'lorem-ipsum-books-media-store'),
				"1_11"=> esc_html__("1/11", 'lorem-ipsum-books-media-store'),
				"2_11"=> esc_html__("2/11", 'lorem-ipsum-books-media-store'),
				"3_11"=> esc_html__("3/11", 'lorem-ipsum-books-media-store'),
				"4_11"=> esc_html__("4/11", 'lorem-ipsum-books-media-store'),
				"5_11"=> esc_html__("5/11", 'lorem-ipsum-books-media-store'),
				"6_11"=> esc_html__("6/11", 'lorem-ipsum-books-media-store'),
				"7_11"=> esc_html__("7/11", 'lorem-ipsum-books-media-store'),
				"8_11"=> esc_html__("8/11", 'lorem-ipsum-books-media-store'),
				"9_11"=> esc_html__("9/11", 'lorem-ipsum-books-media-store'),
				"10_11"=> esc_html__("10/11", 'lorem-ipsum-books-media-store'),
				"1_12"=> esc_html__("1/12", 'lorem-ipsum-books-media-store'),
				"5_12"=> esc_html__("5/12", 'lorem-ipsum-books-media-store'),
				"7_12"=> esc_html__("7/12", 'lorem-ipsum-books-media-store'),
				"10_12"=> esc_html__("10/12", 'lorem-ipsum-books-media-store'),
				"11_12"=> esc_html__("11/12", 'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_columns', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_columns', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return list of locations for the dedicated content
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_dedicated_locations' ) ) {
	function lorem_ipsum_books_media_store_get_list_dedicated_locations($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_dedicated_locations'))=='') {
			$list = array(
				"default" => esc_html__('As in the post defined', 'lorem-ipsum-books-media-store'),
				"center"  => esc_html__('Above the text of the post', 'lorem-ipsum-books-media-store'),
				"left"    => esc_html__('To the left the text of the post', 'lorem-ipsum-books-media-store'),
				"right"   => esc_html__('To the right the text of the post', 'lorem-ipsum-books-media-store'),
				"alter"   => esc_html__('Alternates for each post', 'lorem-ipsum-books-media-store')
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_dedicated_locations', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_dedicated_locations', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return post-format name
if ( !function_exists( 'lorem_ipsum_books_media_store_get_post_format_name' ) ) {
	function lorem_ipsum_books_media_store_get_post_format_name($format, $single=true) {
		$name = '';
		if ($format=='gallery')		$name = $single ? esc_html__('gallery', 'lorem-ipsum-books-media-store') : esc_html__('galleries', 'lorem-ipsum-books-media-store');
		else if ($format=='video')	$name = $single ? esc_html__('video', 'lorem-ipsum-books-media-store') : esc_html__('videos', 'lorem-ipsum-books-media-store');
		else if ($format=='audio')	$name = $single ? esc_html__('audio', 'lorem-ipsum-books-media-store') : esc_html__('audios', 'lorem-ipsum-books-media-store');
		else if ($format=='image')	$name = $single ? esc_html__('image', 'lorem-ipsum-books-media-store') : esc_html__('images', 'lorem-ipsum-books-media-store');
		else if ($format=='quote')	$name = $single ? esc_html__('quote', 'lorem-ipsum-books-media-store') : esc_html__('quotes', 'lorem-ipsum-books-media-store');
		else if ($format=='link')	$name = $single ? esc_html__('link', 'lorem-ipsum-books-media-store') : esc_html__('links', 'lorem-ipsum-books-media-store');
		else if ($format=='status')	$name = $single ? esc_html__('status', 'lorem-ipsum-books-media-store') : esc_html__('statuses', 'lorem-ipsum-books-media-store');
		else if ($format=='aside')	$name = $single ? esc_html__('aside', 'lorem-ipsum-books-media-store') : esc_html__('asides', 'lorem-ipsum-books-media-store');
		else if ($format=='chat')	$name = $single ? esc_html__('chat', 'lorem-ipsum-books-media-store') : esc_html__('chats', 'lorem-ipsum-books-media-store');
		else						$name = $single ? esc_html__('standard', 'lorem-ipsum-books-media-store') : esc_html__('standards', 'lorem-ipsum-books-media-store');
		return apply_filters('lorem_ipsum_books_media_store_filter_list_post_format_name', $name, $format);
	}
}

// Return post-format icon name (from Fontello library)
if ( !function_exists( 'lorem_ipsum_books_media_store_get_post_format_icon' ) ) {
	function lorem_ipsum_books_media_store_get_post_format_icon($format) {
		$icon = 'icon-';
		if ($format=='gallery')		$icon .= 'pictures';
		else if ($format=='video')	$icon .= 'video';
		else if ($format=='audio')	$icon .= 'note';
		else if ($format=='image')	$icon .= 'picture';
		else if ($format=='quote')	$icon .= 'quote';
		else if ($format=='link')	$icon .= 'link';
		else if ($format=='status')	$icon .= 'comment';
		else if ($format=='aside')	$icon .= 'doc-text';
		else if ($format=='chat')	$icon .= 'chat';
		else						$icon .= 'book-open';
		return apply_filters('lorem_ipsum_books_media_store_filter_list_post_format_icon', $icon, $format);
	}
}

// Return fonts styles list, prepended inherit
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_fonts_styles' ) ) {
	function lorem_ipsum_books_media_store_get_list_fonts_styles($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_fonts_styles'))=='') {
			$list = array(
				'i' => esc_html__('I','lorem-ipsum-books-media-store'),
				'u' => esc_html__('U', 'lorem-ipsum-books-media-store')
			);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_fonts_styles', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return Google fonts list
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_fonts' ) ) {
	function lorem_ipsum_books_media_store_get_list_fonts($prepend_inherit=false) {
		if (($list = lorem_ipsum_books_media_store_storage_get('list_fonts'))=='') {
			$list = array();
			$list = lorem_ipsum_books_media_store_array_merge($list, lorem_ipsum_books_media_store_get_list_font_faces());
			// Google and custom fonts list:
			//$list['Advent Pro'] = array(
			//		'family'=>'sans-serif',																						// (required) font family
			//		'link'=>'Advent+Pro:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic',	// (optional) if you use Google font repository
			//		'css'=>lorem_ipsum_books_media_store_get_file_url('/css/font-face/Advent-Pro/stylesheet.css')									// (optional) if you use custom font-face
			//		);
			$list = lorem_ipsum_books_media_store_array_merge($list, array(
				'Advent Pro' => array('family'=>'sans-serif'),
				'Alegreya Sans' => array('family'=>'sans-serif'),
				'Arimo' => array('family'=>'sans-serif'),
				'Asap' => array('family'=>'sans-serif'),
				'Averia Sans Libre' => array('family'=>'cursive'),
				'Averia Serif Libre' => array('family'=>'cursive'),
				'Bree Serif' => array('family'=>'serif',),
				'Cabin' => array('family'=>'sans-serif'),
				'Cabin Condensed' => array('family'=>'sans-serif'),
				'Caudex' => array('family'=>'serif'),
				'Comfortaa' => array('family'=>'cursive'),
				'Cousine' => array('family'=>'sans-serif'),
				'Crimson Text' => array('family'=>'serif'),
				'Cuprum' => array('family'=>'sans-serif'),
				'Dosis' => array('family'=>'sans-serif'),
				'Economica' => array('family'=>'sans-serif'),
				'Exo' => array('family'=>'sans-serif'),
				'Expletus Sans' => array('family'=>'cursive'),
				'Karla' => array('family'=>'sans-serif'),
				'Lato' => array('family'=>'sans-serif'),
				'Lekton' => array('family'=>'sans-serif'),
				'Lobster Two' => array('family'=>'cursive'),
				'Maven Pro' => array('family'=>'sans-serif'),
				'Merriweather' => array('family'=>'serif'),
				'Montserrat' => array('family'=>'sans-serif'),
				'Neuton' => array('family'=>'serif'),
				'Noticia Text' => array('family'=>'serif'),
				'Old Standard TT' => array('family'=>'serif'),
				'Open Sans' => array('family'=>'sans-serif'),
				'Orbitron' => array('family'=>'sans-serif'),
				'Oswald' => array('family'=>'sans-serif'),
				'Overlock' => array('family'=>'cursive'),
				'Oxygen' => array('family'=>'sans-serif'),
				'Philosopher' => array('family'=>'serif'),
				'PT Serif' => array('family'=>'serif'),
				'Puritan' => array('family'=>'sans-serif'),
				'Raleway' => array('family'=>'sans-serif'),
				'Roboto' => array('family'=>'sans-serif'),
				'Roboto Slab' => array('family'=>'sans-serif'),
				'Roboto Condensed' => array('family'=>'sans-serif'),
				'Rosario' => array('family'=>'sans-serif'),
				'Share' => array('family'=>'cursive'),
				'Signika' => array('family'=>'sans-serif'),
				'Signika Negative' => array('family'=>'sans-serif'),
				'Source Sans Pro' => array('family'=>'sans-serif'),
				'Tinos' => array('family'=>'serif'),
				'Ubuntu' => array('family'=>'sans-serif'),
				'Vollkorn' => array('family'=>'serif')
				)
			);
			$list = apply_filters('lorem_ipsum_books_media_store_filter_list_fonts', $list);
			if (lorem_ipsum_books_media_store_get_theme_setting('use_list_cache')) lorem_ipsum_books_media_store_storage_set('list_fonts', $list);
		}
		return $prepend_inherit ? lorem_ipsum_books_media_store_array_merge(array('inherit' => esc_html__("Inherit", 'lorem-ipsum-books-media-store')), $list) : $list;
	}
}

// Return Custom font-face list
if ( !function_exists( 'lorem_ipsum_books_media_store_get_list_font_faces' ) ) {
    function lorem_ipsum_books_media_store_get_list_font_faces($prepend_inherit=false) {
        static $list = false;
        if (is_array($list)) return $list;
        $fonts = lorem_ipsum_books_media_store_storage_get('required_custom_fonts');
        $list = array();
        if (is_array($fonts)) {
            foreach ($fonts as $font) {
                if (($url = lorem_ipsum_books_media_store_get_file_url('css/font-face/'.trim($font).'/stylesheet.css'))!='') {
                    $list[sprintf(esc_html__('%s (uploaded font)', 'lorem-ipsum-books-media-store'), $font)] = array('css' => $url);
                }
            }
        }
        return $list;
    }
}
?>