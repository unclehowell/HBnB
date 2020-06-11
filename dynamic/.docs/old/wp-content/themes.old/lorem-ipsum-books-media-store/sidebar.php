<?php
/**
 * The Sidebar containing the main widget areas.
 */

$sidebar_show   = lorem_ipsum_books_media_store_get_custom_option('show_sidebar_main');
$sidebar_scheme = lorem_ipsum_books_media_store_get_custom_option('sidebar_main_scheme');
$sidebar_name   = lorem_ipsum_books_media_store_get_custom_option('sidebar_main');
$sidebar_align  = lorem_ipsum_books_media_store_get_custom_option('align_sidebar_main');

if (!lorem_ipsum_books_media_store_param_is_off($sidebar_show) && is_active_sidebar($sidebar_name)) {
	?>
	<div class="sidebar widget_area scheme_<?php echo esc_attr($sidebar_scheme); ?> sidebar_align_<?php echo esc_attr($sidebar_align); ?>" role="complementary">
		<div class="sidebar_inner widget_area_inner">
			<?php
			ob_start();
			do_action( 'before_sidebar' );
			if (($reviews_markup = lorem_ipsum_books_media_store_storage_get('reviews_markup')) != '') {
                lorem_ipsum_books_media_store_show_layout('<aside class="column-1_1 widget widget_reviews">' . $reviews_markup . '</aside>');
			}
			lorem_ipsum_books_media_store_storage_set('current_sidebar', 'main');
			if ( !dynamic_sidebar($sidebar_name) ) {
				// Put here html if user no set widgets in sidebar
			}
			do_action( 'after_sidebar' );
			$out = ob_get_contents();
			ob_end_clean();
            lorem_ipsum_books_media_store_show_layout(chop(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $out)));
			?>
		</div>
	</div> <!-- /.sidebar -->
	<?php
}
?>