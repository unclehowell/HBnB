<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_header_4_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_header_4_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_header_4_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'header_4',
			'mode'   => 'header',
			'title'  => esc_html__('Header 4', 'lorem-ipsum-books-media-store'),
			'icon'   => lorem_ipsum_books_media_store_get_file_url('templates/headers/images/4.jpg')
			));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_header_4_output' ) ) {
	function lorem_ipsum_books_media_store_template_header_4_output($post_options, $post_data) {

		// WP custom header
		$header_css = '';
		if ($post_options['position'] != 'over') {
			$header_image = get_header_image();
			$header_css = $header_image!='' 
				? ' style="background-image: url('.esc_url($header_image).')"' 
				: '';
		}
		?>
		

		<div class="top_panel_fixed_wrap"></div>

		<header class="top_panel_wrap top_panel_style_4 scheme_<?php echo esc_attr($post_options['scheme']); ?>">
			<div class="top_panel_wrap_inner top_panel_inner_style_4 top_panel_position_<?php echo esc_attr(lorem_ipsum_books_media_store_get_custom_option('top_panel_position')); ?>">
			
			<?php if (lorem_ipsum_books_media_store_get_custom_option('show_top_panel_top')=='yes') { ?>
				<div class="top_panel_top">
					<div class="content_wrap clearfix">
						<?php
						lorem_ipsum_books_media_store_template_set_args('top-panel-top', array(
							'top_panel_top_components' => array('contact_info', 'search', 'login', 'cart'/*, 'socials'*/)
						));
						get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/headers/_parts/top-panel-top.php'));
						?>
					</div>
				</div>
			<?php } ?>

			<div class="top_panel_middle" <?php lorem_ipsum_books_media_store_show_layout($header_css); ?>>
				<div class="content_wrap">
					<div class="contact_logo">
						<?php lorem_ipsum_books_media_store_show_logo(true, true, false, false, true, false); ?>
					</div>
					<div class="menu_main_wrap">
						<nav class="menu_main_nav_area menu_hover_<?php echo esc_attr(lorem_ipsum_books_media_store_get_theme_option('menu_hover')); ?>">
							<?php
							$menu_main = lorem_ipsum_books_media_store_get_nav_menu('menu_main');
							if (empty($menu_main)) $menu_main = lorem_ipsum_books_media_store_get_nav_menu();
                            lorem_ipsum_books_media_store_show_layout($menu_main);
							?>
						</nav>
					</div>
				</div>
			</div>

			</div>
		</header>

		<?php
		lorem_ipsum_books_media_store_storage_set('header_mobile', array(
				 'open_hours' => false,
				 'login' => true,
				 'socials' => false,
				 'bookmarks' => false,
				 'contact_address' => false,
				 'contact_phone_email' => false,
				 'woo_cart' => true,
				 'search' => true
			)
		);
	}
}
?>