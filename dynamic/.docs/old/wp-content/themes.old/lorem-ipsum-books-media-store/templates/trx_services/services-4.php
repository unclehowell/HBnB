<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_services_4_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_services_4_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_services_4_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'services-4',
			'template' => 'services-4',
			'mode'   => 'services',
			'need_columns' => true,
			'title'  => esc_html__('Services /Style 4/', 'lorem-ipsum-books-media-store')
		));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_services_4_output' ) ) {
	function lorem_ipsum_books_media_store_template_services_4_output($post_options, $post_data) {
		$show_title = !empty($post_data['post_title']);
		$parts = explode('_', $post_options['layout']);
		$style = $parts[0];
		$columns = max(1, min(12, empty($parts[1]) ? (!empty($post_options['columns_count']) ? $post_options['columns_count'] : 1) : (int) $parts[1]));
		if (lorem_ipsum_books_media_store_param_is_on($post_options['slider'])) {
			?><div class="swiper-slide" data-style="<?php echo esc_attr($post_options['tag_css_wh']); ?>" style="<?php echo esc_attr($post_options['tag_css_wh']); ?>"><div class="sc_services_item_wrap"><?php
		} else if ($columns > 1) {
			?><div class="column-1_<?php echo esc_attr($columns); ?>"><?php
		}
		?>
			<div<?php echo !empty($post_options['tag_id']) ? ' id="'.esc_attr($post_options['tag_id']).'"' : ''; ?>
				class="sc_services_item sc_services_item_<?php echo esc_attr($post_options['number']) . ($post_options['number'] % 2 == 1 ? ' odd' : ' even') . ($post_options['number'] == 1 ? ' first' : '') . (!empty($post_options['tag_class']) ? ' '.esc_attr($post_options['tag_class']) : ''); ?>"
				<?php echo (!empty($post_options['tag_css']) ? ' style="'.esc_attr($post_options['tag_css']).'"' : '') 
					. (!lorem_ipsum_books_media_store_param_is_off($post_options['tag_animation']) ? ' data-animation="'.esc_attr(lorem_ipsum_books_media_store_get_animation_classes($post_options['tag_animation'])).'"' : ''); ?>>
				<?php 
				if ((!isset($post_options['links']) || $post_options['links']) && !empty($post_data['post_link'])) {
					?><a href="<?php echo esc_url($post_data['post_link']); ?>"><?php
				}
				if (empty($post_data['post_icon'])) $post_data['post_icon']='icon-right';
                    lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_do_shortcode('[trx_icon icon="'.esc_attr($post_data['post_icon']).'" shape="round"]'));
				?><span class="sc_services_item_title"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_title']); ?></span><?php
				if ((!isset($post_options['links']) || $post_options['links']) && !empty($post_data['post_link'])) {
					?></a><?php
				}
				?>
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