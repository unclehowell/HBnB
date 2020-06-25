<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_related_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_related_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_related_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'related',
			'mode'   => 'blog',
			'need_columns' => true,
			'need_terms' => true,
			'title'  => esc_html__('Related posts /no columns/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Small related image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 146,
			'h'		 => 221
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'related_2',
			'template' => 'related',
			'mode'   => 'blog',
			'need_columns' => true,
			'need_terms' => true,
			'title'  => esc_html__('Related posts /2 columns/', 'lorem-ipsum-books-media-store'),
            'thumb_title'  => esc_html__('Small related image (crop)', 'lorem-ipsum-books-media-store'),
            'w'		 => 146,
            'h'		 => 221
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'related_3',
			'template' => 'related',
			'mode'   => 'blog',
			'need_columns' => true,
			'need_terms' => true,
			'title'  => esc_html__('Related posts /3 columns/', 'lorem-ipsum-books-media-store'),
            'thumb_title'  => esc_html__('Small related image (crop)', 'lorem-ipsum-books-media-store'),
            'w'		 => 146,
            'h'		 => 221
		));
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'related_4',
			'template' => 'related',
			'mode'   => 'blog',
			'need_columns' => true,
			'need_terms' => true,
			'title'  => esc_html__('Related posts /4 columns/', 'lorem-ipsum-books-media-store'),
            'thumb_title'  => esc_html__('Small related image (crop)', 'lorem-ipsum-books-media-store'),
            'w'		 => 146,
            'h'		 => 221
		));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_related_output' ) ) {
	function lorem_ipsum_books_media_store_template_related_output($post_options, $post_data) {
		$show_title = true;	//!in_array($post_data['post_format'], array('aside', 'chat', 'status', 'link', 'quote'));
		$parts = explode('_', $post_options['layout']);
		$style = $parts[0];
		$columns = max(1, min(12, empty($post_options['columns_count']) 
									? (empty($parts[1]) ? 1 : (int) $parts[1])
									: $post_options['columns_count']
									));
		$tag = lorem_ipsum_books_media_store_in_shortcode_blogger(true) ? 'div' : 'article';
		if ($columns > 1) {
			?><div class="<?php echo 'column-1_'.esc_attr($columns); ?> column_padding_bottom"><?php
		}
		?>
		<<?php lorem_ipsum_books_media_store_show_layout($tag); ?> class="post_item post_item_<?php echo esc_attr($style); ?> post_item_<?php echo esc_attr($post_options['number']); ?>">

			<div class="post_content">
				<?php if ($post_data['post_video'] || $post_data['post_thumb'] || $post_data['post_gallery']) { ?>
				<div class="post_featured">
					<?php
					lorem_ipsum_books_media_store_template_set_args('post-featured', array(
						'post_options' => $post_options,
						'post_data' => $post_data
					));
					get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/post-featured.php'));
					?>
				</div>
				<?php } ?>

				<?php if ($show_title) { ?>
					<div class="post_content_wrap">
						<?php
						if (!isset($post_options['links']) || $post_options['links']) { 
							?><h5 class="post_title"><a href="<?php echo esc_url($post_data['post_link']); ?>"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></a></h5><?php
						} else {
							?><h5 class="post_title"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></h5><?php
						}
//                        if (!$post_data['post_protected'] && $post_options['info']) {
//                            $post_options['info_parts'] = array('date'=>false, 'counters'=>false, 'terms'=>false, 'author'=>true);
//                            lorem_ipsum_books_media_store_template_set_args('post-info', array(
//                                'post_options' => $post_options,
//                                'post_data' => $post_data
//                            ));
//                            get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/post-info.php'));
//                        }
                        //var_dump($post_data['post_type']);
                        if($post_data['post_type'] == 'product') {
                            global $product;
                            $author = get_post_meta($product->get_id(), 'product_author', true);
                            if (!empty($author)) {
                                echo '<div class="post_info"><span class="post_info_item post_info_author"> ' . esc_html__('By ', 'lorem-ipsum-books-media-store') . '<span class="post_info_author_name">' . esc_html($author) . '</span>' . '</span></div>';
                            }
                        }
						?>
					</div>
				<?php } ?>
			</div>	<!-- /.post_content -->
		</<?php lorem_ipsum_books_media_store_show_layout($tag); ?>>	<!-- /.post_item -->
		<?php
		if ($columns > 1) {
			?></div><?php
		}
	}
}
?>