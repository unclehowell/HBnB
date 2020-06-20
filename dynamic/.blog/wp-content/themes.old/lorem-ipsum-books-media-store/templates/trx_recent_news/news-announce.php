<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_news_announce_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_news_announce_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_news_announce_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'news-announce',
			'template' => 'news-announce',
			'mode'   => 'news',
			'title'  => esc_html__('Recent News /Style Announce/', 'lorem-ipsum-books-media-store')
		));

		// Add thumb sizes into list
		lorem_ipsum_books_media_store_add_thumb_sizes( array( 'thumb_slug' => 'full', 'add_image_size' => false, 'w' => 1170, 'h' => 659 ) );
		lorem_ipsum_books_media_store_add_thumb_sizes( array( 'thumb_slug' => 'big', 'add_image_size' => false, 'w' => 770, 'h' => 434 ) );
		lorem_ipsum_books_media_store_add_thumb_sizes( array( 'thumb_slug' => 'medium', 'add_image_size' => false, 'w' => 770, 'h' => 217 ) );
		lorem_ipsum_books_media_store_add_thumb_sizes( array( 'thumb_slug' => 'small', 'add_image_size' => false, 'w' => 370, 'h' => 209 ) );
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_news_announce_output' ) ) {
	function lorem_ipsum_books_media_store_template_news_announce_output($post_options, $post_data) {
		$style = $post_options['layout'];
		$number = $post_options['number'];
		$count = $post_options['posts_on_page'];
		$post_format = $post_data['post_format'];
		$grid = array(
			array('full'),
			array('big', 'big'),
			array('big', 'medium', 'medium'),
			array('big', 'medium', 'small', 'small'),
			array('big', 'small', 'small', 'small', 'small'),
			array('medium', 'medium', 'small', 'small', 'small', 'small'),
			array('medium', 'small', 'small', 'small', 'small', 'small', 'small'),
			array('small', 'small', 'small', 'small', 'small', 'small', 'small', 'small')
		);
		$thumb_slug = $grid[$count-$number >= 8 ? 8 : ($count-1)%8][($number-1)%8];
		$thumb_sizes = lorem_ipsum_books_media_store_get_thumb_sizes(array(
			'thumb_slug' => $thumb_slug
		));
		$post_data['post_thumb'] = lorem_ipsum_books_media_store_get_resized_image_tag($post_data['post_attachment'], $thumb_sizes['w'], $post_data['post_type']=='product' && lorem_ipsum_books_media_store_get_theme_option('crop_product_thumb')=='no' ? null :  $thumb_sizes['h']);
		?><article id="post-<?php echo esc_html($post_data['post_id']); ?>" 
			<?php post_class( 'post_item post_layout_'.esc_attr($style)
							.' post_format_'.esc_attr($post_format)
							.' post_size_'.esc_attr($thumb_slug)
							); ?>
			>
		
			<?php if ($post_data['post_flags']['sticky']) {	?>
				<span class="sticky_label"></span>
			<?php } ?>

			<div class="post_featured">
				<?php
				if (!empty($post_options['dedicated'])) {
                    lorem_ipsum_books_media_store_show_layout($post_options['dedicated']);
				} else if ($post_data['post_thumb']) {
					$post_data['post_video'] = $post_data['post_audio'] = $post_data['post_gallery'] = '';
					lorem_ipsum_books_media_store_template_set_args('post-featured', array(
						'post_options' => $post_options,
						'post_data' => $post_data
					));
					get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/post-featured.php'));
				}
				?>
				<div class="post_info">
					<span class="post_categories"><?php echo join(', ', $post_data['post_terms'][$post_data['post_taxonomy']]->terms_links); ?></span>
					<h5 class="post_title entry-title"><a href="<?php echo esc_url($post_data['post_link']); ?>" rel="bookmark"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></a></h5>
					<?php if ( in_array($post_data['post_type'], array('post', 'attachment')) ) { ?>
						<div class="post_meta">
							<span class="post_meta_author"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_author_link']); ?></span>
							<span class="post_meta_date"><a href="<?php echo esc_url($post_data['post_link']); ?>"><?php echo esc_html($post_data['post_date']); ?></a></span>
						</div>
					<?php } ?>
				</div>
			</div>
		</article>
		<?php
	}
}
?>