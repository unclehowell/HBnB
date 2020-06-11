<?php
/*
 * The template for displaying "Page 404"
*/

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_404_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_404_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_404_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => '404',
			'mode'   => 'internal',
			'title'  => 'Page 404',
			'theme_options' => array(
				'article_style' => 'stretch'
			)
		));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_404_output' ) ) {
	function lorem_ipsum_books_media_store_template_404_output() {
		?>
		<article class="post_item post_item_404">
			<div class="post_content">
				<h1 class="page_title"><?php esc_html_e( '404', 'lorem-ipsum-books-media-store' ); ?></h1>
				<h3 class="page_subtitle"><?php esc_html_e('This Page Could Not Be Found!', 'lorem-ipsum-books-media-store'); ?></h3>
				<p class="page_description"><?php echo wp_kses( sprintf( __('Can\'t find what you need? Take a moment and do a search below or start from <a href="%s">our homepage</a>.', 'lorem-ipsum-books-media-store'), esc_url(home_url('/')) ), lorem_ipsum_books_media_store_storage_get('allowed_tags') ); ?></p>
				<div class="page_button"><a href="<?php echo esc_url(home_url('/')); ?>" class="sc_button sc_button_square sc_button_style_border sc_button_size_large sc_button_color_preset_1 button"><?php esc_html_e( 'Go Home', 'lorem-ipsum-books-media-store' ); ?></a></div>
			</div>
		</article>
		<?php
	}
}
?>