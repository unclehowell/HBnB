<?php
// Get template args
extract(lorem_ipsum_books_media_store_template_get_args('counters'));

$show_all_counters = !isset($post_options['counters']);
$counters_tag = 'span';

// Comments
if ($show_all_counters || lorem_ipsum_books_media_store_strpos($post_options['counters'], 'comments')!==false) {
	?>
	<span class="post_counters_item post_counters_comments" title="<?php echo esc_attr( sprintf(__('Comments - %s', 'lorem-ipsum-books-media-store'), $post_data['post_comments']) ); ?>"><span class="post_counters_number"><?php echo esc_html__('Comments - ', 'lorem-ipsum-books-media-store') . trim($post_data['post_comments']); ?></span></span>
	<?php
}

// Views
if ($show_all_counters || lorem_ipsum_books_media_store_strpos($post_options['counters'], 'views')!==false) {
    ?>
    <<?php lorem_ipsum_books_media_store_show_layout($counters_tag); ?> class="post_counters_item post_counters_views" title="<?php echo esc_attr( sprintf(__('Views - %s', 'lorem-ipsum-books-media-store'), $post_data['post_views']) ); ?>"><span class="post_counters_number"><?php echo esc_html__('Views - ', 'lorem-ipsum-books-media-store') . trim($post_data['post_views']); ?></span></<?php lorem_ipsum_books_media_store_show_layout($counters_tag); ?>>
	<?php
}

// Rating
$rating = $post_data['post_reviews_'.(lorem_ipsum_books_media_store_get_theme_option('reviews_first')=='author' ? 'author' : 'users')];
if ($show_all_counters || lorem_ipsum_books_media_store_strpos($post_options['counters'], 'rating')!==false) {
	?>
	<<?php lorem_ipsum_books_media_store_show_layout($counters_tag); ?> class="post_counters_item post_counters_rating icon-star" title="<?php echo esc_attr( sprintf(__('Rating - %s', 'lorem-ipsum-books-media-store'), $rating) ); ?>"><span class="post_counters_number"><?php lorem_ipsum_books_media_store_show_layout($rating); ?></span></<?php lorem_ipsum_books_media_store_show_layout($counters_tag); ?>>
	<?php
}

// Likes
if ($show_all_counters || lorem_ipsum_books_media_store_strpos($post_options['counters'], 'likes')!==false) {
	// Load core messages
	lorem_ipsum_books_media_store_enqueue_messages();
	$likes = isset($_COOKIE['lorem_ipsum_books_media_store_likes']) ? $_COOKIE['lorem_ipsum_books_media_store_likes'] : '';
	$allow = lorem_ipsum_books_media_store_strpos($likes, ','.($post_data['post_id']).',')===false;
	?>
	<span class="post_counters_item post_counters_likes icon-heart <?php echo !empty($allow) ? 'enabled' : 'disabled'; ?>" title="<?php echo !empty($allow) ? esc_attr__('Like', 'lorem-ipsum-books-media-store') : esc_attr__('Dislike', 'lorem-ipsum-books-media-store'); ?>"
		data-postid="<?php echo esc_attr($post_data['post_id']); ?>"
		data-likes="<?php echo esc_attr($post_data['post_likes']); ?>"
		data-title-like="<?php esc_attr_e('Like', 'lorem-ipsum-books-media-store'); ?>"
		data-title-dislike="<?php esc_attr_e('Dislike', 'lorem-ipsum-books-media-store'); ?>"><span class="post_counters_number"><?php lorem_ipsum_books_media_store_show_layout($post_data['post_likes']); ?></span><?php if (lorem_ipsum_books_media_store_strpos($post_options['counters'], 'captions')!==false) echo ' '.esc_html__('Likes', 'lorem-ipsum-books-media-store'); ?></span>
	<?php
}

// Edit page link
if (lorem_ipsum_books_media_store_strpos($post_options['counters'], 'edit')!==false) {
	edit_post_link( esc_html__( 'Edit', 'lorem-ipsum-books-media-store' ), '<span class="post_edit edit-link">', '</span>' );
}

// Markup for search engines
if (is_single() && lorem_ipsum_books_media_store_strpos($post_options['counters'], 'markup')!==false) {
	?>
	<meta itemprop="interactionCount" content="User<?php echo esc_attr(lorem_ipsum_books_media_store_strpos($post_options['counters'],'comments')!==false ? 'Comments' : 'PageVisits'); ?>:<?php echo esc_attr(lorem_ipsum_books_media_store_strpos($post_options['counters'], 'comments')!==false ? $post_data['post_comments'] : $post_data['post_views']); ?>" />
	<?php
}
?>