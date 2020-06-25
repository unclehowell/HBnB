<?php
/**
 * Attachment page
 */
get_header(); 

while ( have_posts() ) { the_post();

	// Move lorem_ipsum_books_media_store_set_post_views to the javascript - counter will work under cache system
	if (lorem_ipsum_books_media_store_get_custom_option('use_ajax_views_counter')=='no') {
		lorem_ipsum_books_media_store_set_post_views(get_the_ID());
	}

	lorem_ipsum_books_media_store_show_post_layout(
		array(
			'layout' => 'attachment',
			'sidebar' => !lorem_ipsum_books_media_store_param_is_off(lorem_ipsum_books_media_store_get_custom_option('show_sidebar_main'))
		)
	);

}

get_footer();
?>