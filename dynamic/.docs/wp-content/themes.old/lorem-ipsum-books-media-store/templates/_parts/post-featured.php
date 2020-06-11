<?php
// Get template args
extract(lorem_ipsum_books_media_store_template_get_args('post-featured'));

if (!empty($post_data['post_video'])) {
    lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_get_video_frame($post_data['post_video'], $post_data['post_video_image'] ? $post_data['post_video_image'] : $post_data['post_thumb']));

} else if (!empty($post_data['post_audio'])) {
	if (lorem_ipsum_books_media_store_get_custom_option('substitute_audio')=='no' || !lorem_ipsum_books_media_store_in_shortcode_blogger(true))
        lorem_ipsum_books_media_store_show_layout(lorem_ipsum_books_media_store_get_audio_frame($post_data['post_audio'], $post_data['post_audio_image'] ? $post_data['post_audio_image'] : $post_data['post_thumb_url']));
	else
        lorem_ipsum_books_media_store_show_layout($post_data['post_audio']);

} else if (!empty($post_data['post_thumb']) && ($post_data['post_format']!='gallery' || empty($post_data['post_gallery']) || lorem_ipsum_books_media_store_get_custom_option('gallery_instead_image')=='no')) {
	?>
	<div class="post_thumb" data-title="<?php echo esc_attr($post_data['post_title']); ?>">
	<?php
	if ($post_data['post_format']=='link' && $post_data['post_url']!='' && $post_options['layout']!='services-1')
		echo '<a class="hover_icon hover_icon_link" href="'.esc_url($post_data['post_url']).'"'.($post_data['post_url_target'] ? ' target="'.esc_attr($post_data['post_url_target']).'"' : '').'>'.($post_data['post_thumb']).'</a>';
	else if ($post_data['post_link']!='' && $post_options['layout']!='services-1')
		echo '<a class="hover_icon hover_icon_link" href="'.esc_url($post_data['post_link']).'">'.($post_data['post_thumb']).'</a>';
	else
        lorem_ipsum_books_media_store_show_layout($post_data['post_thumb']);
	?>
	</div>
	<?php

} else if (!empty($post_data['post_gallery'])) {
	lorem_ipsum_books_media_store_enqueue_slider();
    lorem_ipsum_books_media_store_show_layout($post_data['post_gallery']);
}
?>