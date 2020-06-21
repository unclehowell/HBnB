<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_menuitems_1_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_menuitems_1_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_menuitems_1_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'menuitems-1',
			'template' => 'menuitems-1',
			'mode'   => 'menuitems',
			'title'  => esc_html__('MenuItems /Style 1/', 'lorem-ipsum-books-media-store'),
			'thumb_title'  => esc_html__('Avatar (small)', 'lorem-ipsum-books-media-store'),
			'w'		 => 75,
			'h'		 => 75
		));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_menuitems_1_output' ) ) {
	function lorem_ipsum_books_media_store_template_menuitems_1_output($post_options, $post_data) {
		$show_title = !empty($post_data['post_title']);
		$parts = explode('_', $post_options['layout']);
		$style = $parts[0];
		$columns = max(1, min(12, empty($parts[1]) ? (!empty($post_options['columns_count']) ? $post_options['columns_count'] : 1) : (int) $parts[1]));
		if (lorem_ipsum_books_media_store_param_is_on($post_options['slider'])) {
			?><div class="swiper-slide" data-style="<?php echo esc_attr($post_options['tag_css_wh']); ?>" style="<?php echo esc_attr($post_options['tag_css_wh']); ?>"><?php
		} else if ($columns > 1) {
			?><div class="column-1_<?php echo esc_attr($columns); ?> column_padding_bottom"><?php
		}
		?>
			<div<?php echo !empty($post_options['tag_id']) ? ' id="'.esc_attr($post_options['tag_id']).'"' : ''; ?> 
				class="sc_menuitems_item sc_menuitems_item_<?php echo esc_attr($post_options['number']) . ($post_options['number'] % 2 == 1 ? ' odd' : ' even') . ($post_options['number'] == 1 ? ' first' : '').(!empty($post_options['tag_class']) ? ' '.esc_attr($post_options['tag_class']) : ''); ?>"
				<?php echo (!empty($post_options['tag_css']) ? ' style="'.esc_attr($post_options['tag_css']).'"' : '') 
				. (!lorem_ipsum_books_media_store_param_is_off($post_options['tag_animation']) ? ' data-animation="'.esc_attr(lorem_ipsum_books_media_store_get_animation_classes($post_options['tag_animation'])).'"' : '');?>>
				<?php
				if ($post_options['menuitem_image']) {
					?><div class="sc_menuitem_image"><?php
					if ($post_options['popup'] == 'yes')
						echo '<a class="show_popup_menuitem" href="#" rel="'.$post_data['post_id'].'" >';
					else
						echo '<a href="'.esc_url($post_data['post_link']).'">';
                        lorem_ipsum_books_media_store_show_layout($post_options['menuitem_image']) . '</a>';
					?></div><?php
				}
				
				if ( ($post_options['menuitem_price'] != 'inherit') and ( strlen($post_options['menuitem_price']) != 0 ) ) {
					?><div class="sc_menuitem_price"><?php
                        lorem_ipsum_books_media_store_show_layout($post_options['menuitem_price']);
					?></div><?php
				}
				
				if ($show_title) {
					?><h5 class="sc_menuitem_title"><?php
					if ($post_options['popup'] == 'yes')
						echo '<a class="show_popup_menuitem" href="#" rel="'.$post_data['post_id'].'" >';
					else
						echo '<a href="'.esc_url($post_data['post_link']).'">';
                        lorem_ipsum_books_media_store_show_layout($post_data['post_title']) . '</a>';
					?></h5><?php 
				}
				?>
				
				<div class="sc_menuitem_description"><?php lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_strshort($post_data['post_excerpt'], isset($post_options['descr']) ? $post_options['descr'] : lorem_ipsum_books_media_store_get_custom_option('post_excerpt_maxlength_masonry'))) ?></div>
				
			</div>
		<?php
		if (lorem_ipsum_books_media_store_param_is_on($post_options['slider']) || $columns > 1) {
			?></div><?php
		}
	}
}
?>