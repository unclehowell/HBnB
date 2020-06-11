<?php 
if (is_singular()) {
	if (lorem_ipsum_books_media_store_get_theme_option('use_ajax_views_counter')=='yes') {
		lorem_ipsum_books_media_store_storage_set_array('js_vars', 'ajax_views_counter', array(
			'post_id' => get_the_ID(),
			'post_views' => lorem_ipsum_books_media_store_get_post_views(get_the_ID())
		));
	} else
		lorem_ipsum_books_media_store_set_post_views(get_the_ID());
}
?>