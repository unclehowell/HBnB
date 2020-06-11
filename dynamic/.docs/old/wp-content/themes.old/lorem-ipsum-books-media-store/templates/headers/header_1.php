<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_header_1_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_header_1_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_header_1_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'header_1',
			'mode'   => 'header',
			'title'  => esc_html__('Header 1', 'lorem-ipsum-books-media-store'),
			'icon'   => lorem_ipsum_books_media_store_get_file_url('templates/headers/images/1.jpg')
			));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_header_1_output' ) ) {
	function lorem_ipsum_books_media_store_template_header_1_output($post_options, $post_data) {

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

		<header class="top_panel_wrap top_panel_style_1 scheme_<?php echo esc_attr($post_options['scheme']); ?>">
			<div class="top_panel_wrap_inner top_panel_inner_style_1 top_panel_position_<?php echo esc_attr(lorem_ipsum_books_media_store_get_custom_option('top_panel_position')); ?>">
			
			<?php if (lorem_ipsum_books_media_store_get_custom_option('show_top_panel_top')=='yes') { ?>
				<div class="top_panel_top">
					<div class="content_wrap clearfix">
						<?php
						lorem_ipsum_books_media_store_template_set_args('top-panel-top', array(
							'top_panel_top_components' => array('contact_info', 'login', 'socials')
						));
						get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/headers/_parts/top-panel-top.php'));
						?>
					</div>
				</div>
			<?php } ?>

			<div class="top_panel_middle" <?php lorem_ipsum_books_media_store_show_layout($header_css); ?>>
				<div class="content_wrap">
					<div class="columns_wrap columns_fluid">
						<div class="column-3_5 contact_logo">
							<?php lorem_ipsum_books_media_store_show_logo(true, true, false, false, true, false); ?>
						</div><?php
						
						// Phone and email
						$contact_phone=trim(lorem_ipsum_books_media_store_get_custom_option('contact_phone'));
						$contact_email=trim(lorem_ipsum_books_media_store_get_custom_option('contact_email'));
						if (!empty($contact_phone) || !empty($contact_email)) {
							?><div class="column-1_5 contact_field contact_phone">
                                <div class="top_panel_phone_button">
                                    <span class="contact_icon icon-iconmonstr-phone-5"></span>
                                    <span class="contact_label contact_phone"><a href="tel:<?php lorem_ipsum_books_media_store_show_layout($contact_phone); ?>"><?php lorem_ipsum_books_media_store_show_layout($contact_phone); ?></a></span>
                                    <span class="contact_email"><a href="mailto:<?php lorem_ipsum_books_media_store_show_layout($contact_email); ?>"><?php lorem_ipsum_books_media_store_show_layout($contact_email); ?></a></span>
                                </div>
							</div><?php
						}
						
						// Woocommerce Cart
						if (function_exists('lorem_ipsum_books_media_store_exists_woocommerce') && lorem_ipsum_books_media_store_exists_woocommerce() && (lorem_ipsum_books_media_store_is_woocommerce_page() && lorem_ipsum_books_media_store_get_custom_option('show_cart')=='shop' || lorem_ipsum_books_media_store_get_custom_option('show_cart')=='always') && !(is_checkout() || is_cart() || defined('WOOCOMMERCE_CHECKOUT') || defined('WOOCOMMERCE_CART'))) {
							?><div class="column-1_5 contact_field contact_cart"><?php get_template_part(lorem_ipsum_books_media_store_get_file_slug('templates/headers/_parts/contact-info-cart.php')); ?></div><?php
						}
						?></div>
				</div>
			</div>

			<div class="top_panel_bottom">
				<div class="content_wrap clearfix">
					<nav class="menu_main_nav_area menu_hover_<?php echo esc_attr(lorem_ipsum_books_media_store_get_theme_option('menu_hover')); ?>">
						<?php
						$menu_main = lorem_ipsum_books_media_store_get_nav_menu('menu_main');
						if (empty($menu_main)) $menu_main = lorem_ipsum_books_media_store_get_nav_menu();
                        lorem_ipsum_books_media_store_show_layout($menu_main);
						?>
					</nav>
					<?php if (lorem_ipsum_books_media_store_get_custom_option('show_search')=='yes' && function_exists('lorem_ipsum_books_media_store_sc_search')) lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_search(array('state' => lorem_ipsum_books_media_store_get_theme_option('search_style')=='default' ? 'fixed' : 'closed', 'style' => lorem_ipsum_books_media_store_get_theme_option('search_style') ))); ?>
				</div>
			</div>

			</div>
		</header>

		<?php
		lorem_ipsum_books_media_store_storage_set('header_mobile', array(
			 'open_hours' => true,
			 'login' => true,
			 'socials' => true,
			 'bookmarks' => true,
			 'contact_address' => true,
			 'contact_phone_email' => true,
			 'woo_cart' => true,
			 'search' => true
			)
		);
	}
}
?>