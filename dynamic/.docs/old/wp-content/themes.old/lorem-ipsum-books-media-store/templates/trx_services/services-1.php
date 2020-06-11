<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_services_1_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_services_1_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_services_1_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'services-1',
			'template' => 'services-1',
            'need_terms' => true,
			'mode'   => 'services',
			'title'  => esc_html__('Services /Style 1/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Full image', 'lorem-ipsum-books-media-store'),
			'w'		 => 87,
			'h'		 => 87,
            'h_crop' => null,
		));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_services_1_output' ) ) {
	function lorem_ipsum_books_media_store_template_services_1_output($post_options, $post_data) {
		$show_title = !empty($post_data['post_title']);
		$parts = explode('_', $post_options['layout']);
		$style = $parts[0];
		$columns = max(1, min(12, empty($parts[1]) ? (!empty($post_options['columns_count']) ? $post_options['columns_count'] : 1) : (int) $parts[1]));
		if (lorem_ipsum_books_media_store_param_is_on($post_options['slider'])) {
			?><div class="swiper-slide" data-style="<?php echo esc_attr($post_options['tag_css_wh']); ?>" style="<?php echo esc_attr($post_options['tag_css_wh']); ?>"><div class="sc_services_item_wrap"><?php
		} else if ($columns > 1) {
			?><div class="column-1_<?php echo esc_attr($columns); ?> column_padding_bottom"><?php
		}
		?>
			<div<?php echo !empty($post_options['tag_id']) ? ' id="'.esc_attr($post_options['tag_id']).'"' : ''; ?>
				class="sc_services_item sc_services_item_<?php echo esc_attr($post_options['number']) . ($post_options['number'] % 2 == 1 ? ' odd' : ' even') . ($post_options['number'] == 1 ? ' first' : '') . (!empty($post_options['tag_class']) ? ' '.esc_attr($post_options['tag_class']) : ''); ?>"
				<?php echo (!empty($post_options['tag_css']) ? ' style="'.esc_attr($post_options['tag_css']).'"' : '') 
					. (!lorem_ipsum_books_media_store_param_is_off($post_options['tag_animation']) ? ' data-animation="'.esc_attr(lorem_ipsum_books_media_store_get_animation_classes($post_options['tag_animation'])).'"' : ''); ?>>
				<?php 
				if ($post_data['post_icon'] && $post_options['tag_type']=='icons') {
					$html = lorem_ipsum_books_media_store_do_shortcode('[trx_icon icon="'.esc_attr($post_data['post_icon']).'" shape="round"]');
					if ((!isset($post_options['links']) || $post_options['links']) && !empty($post_data['post_link'])) {
						?><a href="<?php echo esc_url($post_data['post_link']); ?>"><?php lorem_ipsum_books_media_store_show_layout($html); ?></a><?php
					} else
                        lorem_ipsum_books_media_store_show_layout($html);
				} else {
					?>
					<div class="sc_services_item_featured post_featured">
						<?php
						lorem_ipsum_books_media_store_template_set_args('post-featured', array(
							'post_options' => $post_options,
							'post_data' => $post_data
						));
						get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/post-featured.php'));
						?>
					</div>
                    <div class="sc_services_item_groups">
                        <?php
                        if (!$post_data['post_protected'] && $post_options['info'] && isset($post_data['post_taxonomy'])) {
                            $post_options['info_parts'] = array('date'=>false, 'counters'=>false, 'terms'=>true, 'author'=>false);
                            lorem_ipsum_books_media_store_template_set_args('post-info', array(
                                'post_options' => $post_options,
                                'post_data' => $post_data
                            ));
                            get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/_parts/post-info.php'));
                        } else {
                            if (!empty($post_data['post_category'])) {
                                echo '<div class="post_info"><span class="post_info_item post_info_tags">' . esc_html($post_data['post_category']) . '</span></div>';
                            }
                        }
                        ?>
                    </div>
                    <?php
                    if ($show_title) {
                        if ((!isset($post_options['links']) || $post_options['links']) && !empty($post_data['post_link'])) {
                            ?><h4 class="sc_services_item_title"><a href="<?php echo esc_url($post_data['post_link']); ?>"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></a></h4><?php
                        } else {
                            ?><h4 class="sc_services_item_title"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></h4><?php
                        }
                    }
				}
				?>
				<div class="sc_services_item_content">
					<div class="sc_services_item_description">
						<?php
                        if (!empty($post_data['post_description'])) {
                            lorem_ipsum_books_media_store_show_layout(esc_html($post_data['post_description']));
                        } else {
                            if ($post_data['post_protected']) {
                                lorem_ipsum_books_media_store_show_layout($post_data['post_excerpt']);
                            } else {
                                if ($post_data['post_excerpt']) {
                                    echo in_array($post_data['post_format'], array('quote', 'link', 'chat', 'aside', 'status')) ? $post_data['post_excerpt'] : '<p>' . trim(lorem_ipsum_books_media_store_strshort($post_data['post_excerpt'], isset($post_options['descr']) ? $post_options['descr'] : lorem_ipsum_books_media_store_get_custom_option('post_excerpt_maxlength_masonry'))) . '</p>';
                                }
                                if (!empty($post_data['post_link']) && !lorem_ipsum_books_media_store_param_is_off($post_options['readmore'])) {
                                    ?><a href="<?php echo esc_url($post_data['post_link']); ?>"
                                         class="sc_services_item_readmore"><?php lorem_ipsum_books_media_store_show_layout($post_options['readmore']); ?></a><?php
                                }
                            }
                        }
						?>
					</div>
				</div>
			</div>
		<?php
		if (lorem_ipsum_books_media_store_param_is_on($post_options['slider'])) {
			?></div></div><?php
		} else if ($columns > 1) {
			?></div><?php
		}
	}
}
?>