<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_no_search_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_no_search_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_no_search_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'no-search',
			'mode'   => 'internal',
			'title'  => esc_html__('No search results found', 'lorem-ipsum-books-media-store')
		));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_no_search_output' ) ) {
	function lorem_ipsum_books_media_store_template_no_search_output($post_options, $post_data) {
		?>
		<article class="post_item">
			<div class="post_content">
				<h2 class="post_title"><?php echo sprintf(esc_html__('Search: %s', 'lorem-ipsum-books-media-store'), get_search_query()); ?></h2>
				<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'lorem-ipsum-books-media-store' ); ?></p>
				<p><?php echo wp_kses_data( sprintf(__('Go back, or return to <a href="%s">%s</a> home page to choose a new page.', 'lorem-ipsum-books-media-store'), esc_url(home_url('/')), get_bloginfo()) ); ?>
				<br><?php esc_html_e('Please report any broken links to our team.', 'lorem-ipsum-books-media-store'); ?></p>
				<?php if(function_exists('lorem_ipsum_books_media_store_sc_search')) lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_sc_search(array('state'=>"fixed"))); ?>
			</div>	<!-- /.post_content -->
		</article>	<!-- /.post_item -->
		<?php
	}
}
?>