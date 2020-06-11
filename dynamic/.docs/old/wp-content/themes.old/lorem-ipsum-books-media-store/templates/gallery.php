<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_gallery_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_gallery_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_gallery_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'gallery_2',
			'template' => 'gallery',
			'mode'   => 'blog',
			'need_isotope' => true,
            'need_terms' => true,
			'title'  => esc_html__('Gallery tile with preview mode /2 columns/', 'lorem-ipsum-books-media-store'),
            'thumb_title'  => esc_html__('Medium course image (crop)', 'lorem-ipsum-books-media-store'),
            'w'		 => 370,
            'h'		 => 330
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'gallery_3',
			'template' => 'gallery',
			'mode'   => 'blog',
			'need_isotope' => true,
            'need_terms' => true,
			'title'  => esc_html__('Gallery tile /3 columns/', 'lorem-ipsum-books-media-store'),
            'thumb_title'  => esc_html__('Medium course image (crop)', 'lorem-ipsum-books-media-store'),
            'w'		 => 370,
            'h'		 => 330
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'gallery_4',
			'template' => 'gallery',
			'mode'   => 'blog',
			'need_isotope' => true,
            'need_terms' => true,
			'title'  => esc_html__('Gallery tile /4 columns/', 'lorem-ipsum-books-media-store'),
            'thumb_title'  => esc_html__('Medium course image (crop)', 'lorem-ipsum-books-media-store'),
            'w'		 => 370,
            'h'		 => 330
		));
		// Add template specific scripts
		add_action('lorem_ipsum_books_media_store_action_blog_scripts', 'lorem_ipsum_books_media_store_template_gallery_add_scripts');
	}
}

// Add template specific scripts
if (!function_exists('lorem_ipsum_books_media_store_template_gallery_add_scripts')) {
	//Handler of add_action('lorem_ipsum_books_media_store_action_blog_scripts', 'lorem_ipsum_books_media_store_template_gallery_add_scripts');
	function lorem_ipsum_books_media_store_template_gallery_add_scripts($style) {
		if (lorem_ipsum_books_media_store_substr($style, 0, 8) == 'gallery_') {
			wp_enqueue_script( 'isotope', lorem_ipsum_books_media_store_get_file_url('js/jquery.isotope.min.js'), array(), null, true );
			wp_enqueue_style(  'lorem-ipsum-books-media-store-gallery-style', lorem_ipsum_books_media_store_get_file_url('css/core.gallery.css'), array(), null );
		}
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_gallery_output' ) ) {
	function lorem_ipsum_books_media_store_template_gallery_output($post_options, $post_data) {
		$show_title = !in_array($post_data['post_format'], array('aside', 'chat', 'status', 'link', 'quote'));
		$parts = explode('_', $post_options['layout']);
		$style = $parts[0];
		$columns = max(1, min(12, empty($post_options['columns_count'])
									? (empty($parts[1]) ? 1 : (int) $parts[1])
									: $post_options['columns_count']
									));
		$tag = lorem_ipsum_books_media_store_in_shortcode_blogger(true) ? 'div' : 'article';
		$link_start = !isset($post_options['links']) || $post_options['links'] ? '<a href="'.esc_url($post_data['post_link']).'">' : '';
		$link_end = !isset($post_options['links']) || $post_options['links'] ? '</a>' : '';
		?>
		<div class="isotope_item isotope_item_<?php echo esc_attr($style); ?> isotope_item_<?php echo esc_attr($post_options['layout']); ?> isotope_column_<?php echo esc_attr($columns); ?>
			<?php
			if ($post_options['filters'] != '') {
				if ($post_options['filters']=='categories' && !empty($post_data['post_terms'][$post_data['post_taxonomy']]->terms_ids))
					echo ' flt_' . esc_attr(join(' flt_', $post_data['post_terms'][$post_data['post_taxonomy']]->terms_ids));
				else if ($post_options['filters']=='tags' && !empty($post_data['post_terms'][$post_data['post_taxonomy_tags']]->terms_ids))
					echo ' flt_' . esc_attr(join(' flt_', $post_data['post_terms'][$post_data['post_taxonomy_tags']]->terms_ids));
			}
			?>">
			<<?php lorem_ipsum_books_media_store_show_layout($tag); ?> class="post_item post_item_<?php echo esc_attr($style); ?> post_item_<?php echo esc_attr($post_options['layout']); ?>
				<?php echo 'post_format_'.esc_attr($post_data['post_format'])
					. ($post_options['number']%2==0 ? ' even' : ' odd')
					. ($post_options['number']==0 ? ' first' : '')
					. ($post_options['number']==$post_options['posts_on_page'] ? ' last' : '');
				?>">
				<div class="post_content isotope_item_content">
					<div class="post_featured img"><?php
                        lorem_ipsum_books_media_store_show_layout($post_data['post_thumb']);
						$new = lorem_ipsum_books_media_store_get_custom_option('mark_as_new', '', $post_data['post_id'], $post_data['post_type']);			// !!!!!! Get option from specified post
						if ($new && $new > date('Y-m-d')) {
							?><div class="post_mark_new"><?php esc_html_e('NEW', 'lorem-ipsum-books-media-store'); ?></div><?php
						}
						?>

					</div>

					<?php
        if($post_data['post_type'] == 'courses'){
            $course_product = get_permalink(lorem_ipsum_books_media_store_get_custom_option('product', '', $post_data['post_id'], $post_data['post_type']));
            ?>
            <div class="course_hover">
                <div class="course_descr">
                    <?php lorem_ipsum_books_media_store_show_layout(substr($post_data['post_excerpt'], 0, $post_options['descr'])) . '...'; ?>
                </div>
                <div class="course_buttons">
                    <?php if(function_exists('lorem_ipsum_books_media_store_sc_button')) lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_button(array('size'=>'small', 'link'=>$post_data['post_link'], 'style'=> 'border', 'color_preset' => '6'), esc_html__('MORE', 'lorem-ipsum-books-media-store'))); ?>
                    <?php if(function_exists('lorem_ipsum_books_media_store_sc_button')) echo (!empty($course_product) ? trim(lorem_ipsum_books_media_store_sc_button(array('size'=>'small', 'link'=>$course_product, 'style'=> 'border', 'color_preset' => '6'), esc_html__('Buy Now', 'lorem-ipsum-books-media-store'))) : ''); ?>
                </div>
            </div>
        <?php
        }
        ?>
                <div class="post_inner">
                    <div class="post_inner_position">
                        <h5 class="post_title"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title'], $link_start, $link_end); ?></h5>
                        <div class="post_descr">
                            <?php
        $category = !empty($post_data['post_terms'][$post_data['post_taxonomy']]->terms)
            ? ($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->link ? '<a href="'.esc_url($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->link).'">' : '')
            . ($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->name)
            . ($post_data['post_terms'][$post_data['post_taxonomy']]->terms[0]->link ? '</a>' : '')
            : '';
        ?>
                            <div class="post_category"><?php lorem_ipsum_books_media_store_show_layout($category); ?></div>
                        </div>
                    </div>
                </div>





				</div>
			</<?php lorem_ipsum_books_media_store_show_layout($tag); ?>>
		</div>
		<?php
	}
}
?>