<?php
/*
Template Name: Blog streampage
*/

/**
 * Make empty page with this template 
 * and put it into menu
 * to display all posts as streampage
 */

lorem_ipsum_books_media_store_storage_set('blog_streampage', true);

get_header(); 

if (empty($blog_style))	$blog_style = lorem_ipsum_books_media_store_get_custom_option('blog_style');
$blog_columns	= max(1, (int) lorem_ipsum_books_media_store_substr($blog_style, -1));
$show_sidebar 	= lorem_ipsum_books_media_store_get_custom_option('show_sidebar_main');
$show_filters 	= lorem_ipsum_books_media_store_get_custom_option('show_filters');
$ppp			= (int) lorem_ipsum_books_media_store_get_custom_option('posts_per_page');
$hover			= lorem_ipsum_books_media_store_get_custom_option('hover_style');
$hover_dir		= lorem_ipsum_books_media_store_get_custom_option('hover_dir');
if (lorem_ipsum_books_media_store_strpos($blog_style, 'colored')===false) {
	if (empty($hover)) $hover = 'square effect_shift';
	if (empty($hover_dir)) $hover_dir = 'left_to_right';
}

$page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

$args = lorem_ipsum_books_media_store_get_query_vars();
$args['post_status'] = current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish';

if ( is_page() || lorem_ipsum_books_media_store_storage_get('blog_filters')!='' ) {
	unset($args['p']);
	unset($args['page_id']);
	unset($args['pagename']);
	unset($args['name']);
	$args['posts_per_page'] = $ppp;
	if ($page_number > 1) {
		$args['paged'] = $page_number;
		$args['ignore_sticky_posts'] = true;
	}
	$args = lorem_ipsum_books_media_store_query_add_sort_order($args);
	$args = lorem_ipsum_books_media_store_query_add_filters($args, lorem_ipsum_books_media_store_storage_get('blog_filters'));
	query_posts( $args );
}

$per_page = lorem_ipsum_books_media_store_get_query_vars('posts_count');
$post_number = 0;
$parent_tax_id = (int) lorem_ipsum_books_media_store_get_custom_option('taxonomy_id');
$flt_ids = array();

$container = apply_filters('lorem_ipsum_books_media_store_filter_blog_container', lorem_ipsum_books_media_store_get_template_property($blog_style, 'container'), array('style'=>$blog_style, 'dir'=>'horizontal'));
$container_start = $container_end = '';
if (!empty($container)) {
	$container = explode('%s', $container);
	$container_start = !empty($container[0]) ? $container[0] : '';
	$container_end = !empty($container[1]) ? $container[1] : '';
}

$container2 = apply_filters('lorem_ipsum_books_media_store_filter_blog_container2', lorem_ipsum_books_media_store_get_template_property($blog_style, 'container2'), array('style'=>$blog_style, 'dir'=>'horizontal'));
$container2_start = $container2_end = '';
if (!empty($container2)) {
	$container2 = explode('%s', $container2);
	$container2_start = !empty($container2[0]) ? $container2[0] : '';
	$container2_end = !empty($container2[1]) ? $container2[1] : '';
}

lorem_ipsum_books_media_store_show_layout($container_start . $container2_start);

if (lorem_ipsum_books_media_store_get_template_property($blog_style, 'need_columns') && $blog_columns > 1) {
	?>
	<div class="columns_wrap <?php echo esc_attr(lorem_ipsum_books_media_store_get_template_property($blog_style, 'container_classes')); ?>">
	<?php
}

if (lorem_ipsum_books_media_store_get_template_property($blog_style, 'need_isotope')) {
	if (!lorem_ipsum_books_media_store_param_is_off($show_filters)) {
		?>
		<div class="isotope_filters"></div>
		<?php
	}
	?>
	<div class="isotope_wrap <?php echo esc_attr(lorem_ipsum_books_media_store_get_template_property($blog_style, 'container_classes')); ?>" data-columns="<?php echo esc_attr($blog_columns); ?>">
	<?php
}

while ( have_posts() ) { the_post(); 
	$post_number++;
	$post_args = array(
		'layout' => $blog_style,
		'number' => $post_number,
		'add_view_more' => false,
		'posts_on_page' => $per_page,
		'columns_count' => $blog_columns,
		// Get post data
		'strip_teaser' => false,
		'content' => lorem_ipsum_books_media_store_get_template_property($blog_style, 'need_content'),
		'terms_list' => !lorem_ipsum_books_media_store_param_is_off($show_filters) || lorem_ipsum_books_media_store_get_template_property($blog_style, 'need_terms'),
		'parent_tax_id' => $parent_tax_id,
		'descr' => lorem_ipsum_books_media_store_get_custom_option('post_excerpt_maxlength'.($blog_columns > 1 ? '_masonry' : '')),
		'sidebar' => !lorem_ipsum_books_media_store_param_is_off($show_sidebar),
		'filters' => $show_filters != 'hide' ? $show_filters : '',
		'hover' => $hover,
		'hover_dir' => $hover_dir
	);

	$post_data = lorem_ipsum_books_media_store_get_post_data($post_args);

	lorem_ipsum_books_media_store_show_post_layout($post_args, $post_data);

	if ($show_filters=='tags') {					// Use tags as filter items
		if (!empty($post_data['post_terms'][$post_data['post_taxonomy_tags']]->terms)) {
			foreach ($post_data['post_terms'][$post_data['post_taxonomy_tags']]->terms as $tag) {
				$flt_ids[$tag->term_id] = $tag->name;
			}
		}
	}
}

if (lorem_ipsum_books_media_store_get_template_property($blog_style, 'need_isotope')) {
	?>
	</div> <!-- /.isotope_wrap -->
	<?php 
}

if (lorem_ipsum_books_media_store_get_template_property($blog_style, 'need_columns') && $blog_columns > 1) {
	?>
	</div> <!-- /.columns_wrap -->
	<?php
}

lorem_ipsum_books_media_store_show_layout($container2_end . $container_end);

if (!$post_number) { 
	if ( is_search() ) {
		lorem_ipsum_books_media_store_show_post_layout( array('layout' => 'no-search'), false );
	} else {
		lorem_ipsum_books_media_store_show_post_layout( array('layout' => 'no-articles'), false );
	}
} else {
	// Isotope filters list
	$filters = '';
	$filter_button_classes = 'isotope_filters_button';
	if ($show_filters == 'categories') {			// Use categories as filter items
		$taxonomy = lorem_ipsum_books_media_store_is_taxonomy();
		$cur_term = $taxonomy ? lorem_ipsum_books_media_store_get_current_term($taxonomy) : 0;
		$cur_term_id = $cur_term ? $cur_term->term_id : 0;
		$portfolio_parent = $cur_term_id ? max(0, lorem_ipsum_books_media_store_get_parent_taxonomy_by_property($cur_term_id, 'show_filters', 'yes', true, $taxonomy)) : 0;
		$args2 = array(
			'type'			=> !empty($args['post_type']) ? $args['post_type'] : 'post',
			'child_of'		=> $portfolio_parent,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $taxonomy,
			'pad_counts'	=> false
		);
		$portfolio_list = get_categories($args2);
		if (is_array($portfolio_list) && count($portfolio_list) > 0) {
			$filters .= '<a href="#" data-filter="*" class="'.esc_attr($filter_button_classes . ($portfolio_parent==$cur_term_id ? ' active' : '')) . '">' . esc_html__('All', 'lorem-ipsum-books-media-store').'</a>';
			foreach ($portfolio_list as $cat) {
				if (isset($cat->term_id)) $filters .= '<a href="#" data-filter=".flt_'.esc_attr($cat->term_id).'" class="'.esc_attr($filter_button_classes . ($cat->term_id==$cur_term_id ? ' active' : '')).'">'.($cat->name).'</a>';
			}
		}
	} else if ($show_filters == 'tags') {																	// Use tags as filter items
		if (is_array($flt_ids) && count($flt_ids) > 0) {
			$filters .= '<a href="#" data-filter="*" class="'.esc_attr($filter_button_classes).' active">'.esc_html__('All', 'lorem-ipsum-books-media-store').'</a>';
			foreach ($flt_ids as $flt_id=>$flt_name) {
				$filters .= '<a href="#" data-filter=".flt_'.esc_attr($flt_id).'" class="'.esc_attr($filter_button_classes).'">'.($flt_name).'</a>';
			}
		}
	}
	if ($filters) {
		lorem_ipsum_books_media_store_storage_set_array('js_vars', 'ppp', $ppp);
		lorem_ipsum_books_media_store_storage_concat('js_code', '
			jQuery(".isotope_filters").append("'.addslashes($filters).'");
		');
	}
}

if ($post_number > 0) {
	// Pagination
	$pagination = lorem_ipsum_books_media_store_get_custom_option('blog_pagination');
	if (in_array($pagination, array('viewmore', 'infinite'))) {
		if ($page_number < lorem_ipsum_books_media_store_get_query_vars('max_num_pages')) {
			lorem_ipsum_books_media_store_storage_set_array('js_vars', 'viewmore_page', $page_number);
			lorem_ipsum_books_media_store_storage_set_array('js_vars', 'viewmore_data', $args);
			lorem_ipsum_books_media_store_storage_set_array('js_vars', 'viewmore_vars', array(
							'blog_style' => $blog_style,
							'columns_count' => $blog_columns,
							'parent_tax_id' => $parent_tax_id,
							'show_sidebar' => $show_sidebar,
							'filters' => $show_filters!='hide' ? $show_filters : '',
							'hover' => $hover,
							'hover_dir' => $hover_dir,
							'ppp' => $ppp
						));
			?>
			<div id="viewmore" class="pagination_wrap pagination_<?php echo esc_attr($pagination); ?>">
				<a href="#" id="viewmore_link" class="theme_button viewmore_button"><span class="icon-spin3 animate-spin viewmore_loading"></span><span class="viewmore_text_1"><?php esc_html_e('LOAD MORE', 'lorem-ipsum-books-media-store'); ?></span><span class="viewmore_text_2"><?php esc_html_e('Loading ...', 'lorem-ipsum-books-media-store'); ?></span></a>
				<span class="viewmore_loader"></span>
			</div>
			<?php
		}
	} else {
		lorem_ipsum_books_media_store_show_pagination(array(
			'class' => 'pagination_wrap pagination_'.esc_attr($pagination),
			'style' => $pagination,
			'button_class' => '',
			'first_text'=> '',
			'last_text' => '',
			'prev_text' => 'Prev',
			'next_text' => 'Next',
			'pages_in_group' => $pagination=='pages' ? 10 : 20
			)
		);
	}
}

// Add template specific scripts and styles
do_action('lorem_ipsum_books_media_store_action_blog_scripts', $blog_style);

get_footer();
?>