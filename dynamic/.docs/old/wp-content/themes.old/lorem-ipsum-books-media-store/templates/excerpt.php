<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_excerpt_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_excerpt_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_excerpt_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'excerpt',
			'mode'   => 'blog',
			'title'  => esc_html__('Excerpt', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Large excerpt image (crop)', 'lorem-ipsum-books-media-store'),
			'w'		 => 1100,
			'h'		 => 709
		));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_excerpt_output' ) ) {
	function lorem_ipsum_books_media_store_template_excerpt_output($post_options, $post_data) {
		$show_title = true;
		$tag = lorem_ipsum_books_media_store_in_shortcode_blogger(true) ? 'div' : 'article';
		?>
		<<?php lorem_ipsum_books_media_store_show_layout($tag); ?> <?php post_class('post_item post_item_excerpt post_featured_' . esc_attr($post_options['post_class']) . ' post_format_'.esc_attr($post_data['post_format']) . ($post_options['number']%2==0 ? ' even' : ' odd') . ($post_options['number']==0 ? ' first' : '') . ($post_options['number']==$post_options['posts_on_page']? ' last' : '') . ($post_options['add_view_more'] ? ' viewmore' : '')); ?>>
			<?php
			if ($post_data['post_flags']['sticky']) {
				?><span class="sticky_label"></span><?php
			}

			if ($show_title && $post_options['location'] == 'center' && !empty($post_data['post_title'])) {
				?><h3 class="post_title"><a href="<?php echo esc_url($post_data['post_link']); ?>"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></a></h3><?php
			}
			
			if (!$post_data['post_protected'] && (!empty($post_options['dedicated']) || $post_data['post_thumb'] || $post_data['post_gallery'] || $post_data['post_video'] || $post_data['post_audio'])) {
				?>
				<div class="post_featured">
				<?php
				if (!empty($post_options['dedicated'])) {
                    lorem_ipsum_books_media_store_show_layout($post_options['dedicated']);
				} else if ($post_data['post_thumb'] || $post_data['post_gallery'] || $post_data['post_video'] || $post_data['post_audio']) {
					lorem_ipsum_books_media_store_template_set_args('post-featured', array(
						'post_options' => $post_options,
						'post_data' => $post_data
					));
					get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/post-featured.php'));
				}
				?>
				</div>
			<?php
			}
			?>
	
			<div class="post_content clearfix">
				<?php
				if ($show_title && $post_options['location'] != 'center' && !empty($post_data['post_title'])) {
					?><h3 class="post_title"><a href="<?php echo esc_url($post_data['post_link']); ?>"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></a></h3><?php
				}
				
				if (!$post_data['post_protected'] && $post_options['info']) {
					lorem_ipsum_books_media_store_template_set_args('post-info', array(
						'post_options' => $post_options,
						'post_data' => $post_data
					));
					get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/post-info.php')); 
				}
				?>
		
				<div class="post_descr">
				<?php
                    if (empty($post_options['readmore'])) $post_options['readmore'] = esc_html__('Read more', 'lorem-ipsum-books-media-store');
					if ($post_data['post_protected']) {
                        if (!lorem_ipsum_books_media_store_param_is_off($post_options['readmore']) && !in_array($post_data['post_format'], array('quote', 'link', 'chat', 'aside', 'status'))) {
                            lorem_ipsum_books_media_store_show_layout($post_data['post_excerpt']);
							echo ' ' . trim('<a href="' . esc_url($post_data['post_link']) . '" class="readmore">' . esc_html($post_options['readmore']) . '</a>');
                        } else {
                            lorem_ipsum_books_media_store_show_layout($post_data['post_excerpt']);
                        }
					} else {
						if ($post_data['post_excerpt']) {
                            if (!lorem_ipsum_books_media_store_param_is_off($post_options['readmore']) && !in_array($post_data['post_format'], array('quote', 'link', 'chat', 'aside', 'status'))) {
                                echo '<p>'.trim(lorem_ipsum_books_media_store_strshort($post_data['post_excerpt'], isset($post_options['descr']) ? $post_options['descr'] : lorem_ipsum_books_media_store_get_custom_option('post_excerpt_maxlength'))) . '... ' . trim('<a href="' . esc_url($post_data['post_link']) . '" class="readmore">' . esc_html($post_options['readmore']) . '</a>') . '</p>';
                            } else {
                                lorem_ipsum_books_media_store_show_layout($post_data['post_excerpt']);
                            }
						}
					}
				?>
				</div>

			</div>	<!-- /.post_content -->

		</<?php lorem_ipsum_books_media_store_show_layout($tag); ?>>	<!-- /.post_item -->

	<?php
	}
}
?>