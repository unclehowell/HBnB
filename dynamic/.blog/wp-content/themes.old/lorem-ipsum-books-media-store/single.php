<?php
/**
 * Single post
 */
get_header(); 

$single_style = lorem_ipsum_books_media_store_storage_get('single_style');
if (empty($single_style)) $single_style = lorem_ipsum_books_media_store_get_custom_option('single_style');

while ( have_posts() ) { the_post();
	lorem_ipsum_books_media_store_show_post_layout(
		array(
			'layout' => $single_style,
			'sidebar' => !lorem_ipsum_books_media_store_param_is_off(lorem_ipsum_books_media_store_get_custom_option('show_sidebar_main')),
			'content' => lorem_ipsum_books_media_store_get_template_property($single_style, 'need_content'),
			'terms_list' => lorem_ipsum_books_media_store_get_template_property($single_style, 'need_terms')
		)
	);
}

get_footer();
?>