<?php

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }


/* Theme setup section
-------------------------------------------------------------------- */

if ( !function_exists( 'lorem_ipsum_books_media_store_template_form_custom_theme_setup' ) ) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_template_form_custom_theme_setup', 1 );
	function lorem_ipsum_books_media_store_template_form_custom_theme_setup() {
		lorem_ipsum_books_media_store_add_template(array(
			'layout' => 'form_custom',
			'mode'   => 'forms',
			'title'  => esc_html__('Custom Form', 'lorem-ipsum-books-media-store')
			));
	}
}

// Template output
if ( !function_exists( 'lorem_ipsum_books_media_store_template_form_custom_output' ) ) {
	function lorem_ipsum_books_media_store_template_form_custom_output($post_options, $post_data) {
		$form_style = lorem_ipsum_books_media_store_get_theme_option('input_hover');
		?>
		<form <?php echo !empty($post_options['id']) ? ' id="'.esc_attr($post_options['id']).'_form"' : ''; ?>
			class="sc_input_hover_<?php echo esc_attr($form_style); ?>"
			data-formtype="<?php echo esc_attr($post_options['layout']); ?>" 
			method="post" 
			action="<?php echo esc_url($post_options['action'] ? $post_options['action'] : admin_url('admin-ajax.php')); ?>">
			<?php
			lorem_ipsum_books_media_store_sc_form_show_fields($post_options['fields']);
            lorem_ipsum_books_media_store_show_layout($post_options['content']);
			?>
			<div class="result sc_infobox"></div>
		</form>
		<?php
	}
}
?>