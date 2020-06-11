<?php
/**
 * Lorem Ipsum Books & Media Store Framework: messages subsystem
 *
 * @package	lorem_ipsum_books_media_store
 * @since	lorem_ipsum_books_media_store 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Theme init
if (!function_exists('lorem_ipsum_books_media_store_messages_theme_setup')) {
	add_action( 'lorem_ipsum_books_media_store_action_before_init_theme', 'lorem_ipsum_books_media_store_messages_theme_setup' );
	function lorem_ipsum_books_media_store_messages_theme_setup() {
		// Core messages strings
		add_filter('lorem_ipsum_books_media_store_filter_localize_script', 'lorem_ipsum_books_media_store_messages_localize_script');
	}
}


/* Session messages
------------------------------------------------------------------------------------- */

if (!function_exists('lorem_ipsum_books_media_store_get_error_msg')) {
	function lorem_ipsum_books_media_store_get_error_msg() {
		return lorem_ipsum_books_media_store_storage_get('error_msg');
	}
}

if (!function_exists('lorem_ipsum_books_media_store_set_error_msg')) {
	function lorem_ipsum_books_media_store_set_error_msg($msg) {
		$msg2 = lorem_ipsum_books_media_store_get_error_msg();
		lorem_ipsum_books_media_store_storage_set('error_msg', trim($msg2) . ($msg2=='' ? '' : '<br />') . trim($msg));
	}
}

if (!function_exists('lorem_ipsum_books_media_store_get_success_msg')) {
	function lorem_ipsum_books_media_store_get_success_msg() {
		return lorem_ipsum_books_media_store_storage_get('success_msg');
	}
}

if (!function_exists('lorem_ipsum_books_media_store_set_success_msg')) {
	function lorem_ipsum_books_media_store_set_success_msg($msg) {
		$msg2 = lorem_ipsum_books_media_store_get_success_msg();
		lorem_ipsum_books_media_store_storage_set('success_msg', trim($msg2) . ($msg2=='' ? '' : '<br />') . trim($msg));
	}
}

if (!function_exists('lorem_ipsum_books_media_store_get_notice_msg')) {
	function lorem_ipsum_books_media_store_get_notice_msg() {
		return lorem_ipsum_books_media_store_storage_get('notice_msg');
	}
}

if (!function_exists('lorem_ipsum_books_media_store_set_notice_msg')) {
	function lorem_ipsum_books_media_store_set_notice_msg($msg) {
		$msg2 = lorem_ipsum_books_media_store_get_notice_msg();
		lorem_ipsum_books_media_store_storage_set('notice_msg', trim($msg2) . ($msg2=='' ? '' : '<br />') . trim($msg));
	}
}


/* System messages (save when page reload)
------------------------------------------------------------------------------------- */
if (!function_exists('lorem_ipsum_books_media_store_set_system_message')) {
	function lorem_ipsum_books_media_store_set_system_message($msg, $status='info', $hdr='') {
		update_option(lorem_ipsum_books_media_store_storage_get('options_prefix') . '_message', array('message' => $msg, 'status' => $status, 'header' => $hdr));
	}
}

if (!function_exists('lorem_ipsum_books_media_store_get_system_message')) {
	function lorem_ipsum_books_media_store_get_system_message($del=false) {
		$msg = get_option(lorem_ipsum_books_media_store_storage_get('options_prefix') . '_message', false);
		if (!$msg)
			$msg = array('message' => '', 'status' => '', 'header' => '');
		else if ($del)
			lorem_ipsum_books_media_store_del_system_message();
		return $msg;
	}
}

if (!function_exists('lorem_ipsum_books_media_store_del_system_message')) {
	function lorem_ipsum_books_media_store_del_system_message() {
		delete_option(lorem_ipsum_books_media_store_storage_get('options_prefix') . '_message');
	}
}


/* Messages strings
------------------------------------------------------------------------------------- */

if (!function_exists('lorem_ipsum_books_media_store_messages_localize_script')) {
	//Handler of add_filter('lorem_ipsum_books_media_store_filter_localize_script', 'lorem_ipsum_books_media_store_messages_localize_script');
	function lorem_ipsum_books_media_store_messages_localize_script($vars) {
		$vars['strings'] = array(
			'ajax_error'		=> esc_html__('Invalid server answer', 'lorem-ipsum-books-media-store'),
			'bookmark_add'		=> esc_html__('Add the bookmark', 'lorem-ipsum-books-media-store'),
            'bookmark_added'	=> esc_html__('Current page has been successfully added to the bookmarks. You can see it in the right panel on the tab \'Bookmarks\'', 'lorem-ipsum-books-media-store'),
            'bookmark_del'		=> esc_html__('Delete this bookmark', 'lorem-ipsum-books-media-store'),
            'bookmark_title'	=> esc_html__('Enter bookmark title', 'lorem-ipsum-books-media-store'),
            'bookmark_exists'	=> esc_html__('Current page already exists in the bookmarks list', 'lorem-ipsum-books-media-store'),
			'search_error'		=> esc_html__('Error occurs in AJAX search! Please, type your query and press search icon for the traditional search way.', 'lorem-ipsum-books-media-store'),
			'email_confirm'		=> esc_html__('On the e-mail address "%s" we sent a confirmation email. Please, open it and click on the link.', 'lorem-ipsum-books-media-store'),
			'reviews_vote'		=> esc_html__('Thanks for your vote! New average rating is:', 'lorem-ipsum-books-media-store'),
			'reviews_error'		=> esc_html__('Error saving your vote! Please, try again later.', 'lorem-ipsum-books-media-store'),
			'error_like'		=> esc_html__('Error saving your like! Please, try again later.', 'lorem-ipsum-books-media-store'),
			'error_global'		=> esc_html__('Global error text', 'lorem-ipsum-books-media-store'),
			'name_empty'		=> esc_html__('The name can\'t be empty', 'lorem-ipsum-books-media-store'),
			'name_long'			=> esc_html__('Too long name', 'lorem-ipsum-books-media-store'),
			'email_empty'		=> esc_html__('Too short (or empty) email address', 'lorem-ipsum-books-media-store'),
			'email_long'		=> esc_html__('Too long email address', 'lorem-ipsum-books-media-store'),
			'email_not_valid'	=> esc_html__('Invalid email address', 'lorem-ipsum-books-media-store'),
			'subject_empty'		=> esc_html__('The subject can\'t be empty', 'lorem-ipsum-books-media-store'),
			'subject_long'		=> esc_html__('Too long subject', 'lorem-ipsum-books-media-store'),
			'text_empty'		=> esc_html__('The message text can\'t be empty', 'lorem-ipsum-books-media-store'),
			'text_long'			=> esc_html__('Too long message text', 'lorem-ipsum-books-media-store'),
			'send_complete'		=> esc_html__("Send message complete!", 'lorem-ipsum-books-media-store'),
			'send_error'		=> esc_html__('Transmit failed!', 'lorem-ipsum-books-media-store'),
			'not_agree'			=> esc_html__('Please, check \'I agree with Terms and Conditions\'', 'lorem-ipsum-books-media-store'),
			'login_empty'		=> esc_html__('The Login field can\'t be empty', 'lorem-ipsum-books-media-store'),
			'login_long'		=> esc_html__('Too long login field', 'lorem-ipsum-books-media-store'),
			'login_success'		=> esc_html__('Login success! The page will be reloaded in 3 sec.', 'lorem-ipsum-books-media-store'),
			'login_failed'		=> esc_html__('Login failed!', 'lorem-ipsum-books-media-store'),
			'password_empty'	=> esc_html__('The password can\'t be empty and shorter then 4 characters', 'lorem-ipsum-books-media-store'),
			'password_long'		=> esc_html__('Too long password', 'lorem-ipsum-books-media-store'),
			'password_not_equal'	=> esc_html__('The passwords in both fields are not equal', 'lorem-ipsum-books-media-store'),
			'registration_success'	=> esc_html__('Registration success! Please log in!', 'lorem-ipsum-books-media-store'),
			'registration_failed'	=> esc_html__('Registration failed!', 'lorem-ipsum-books-media-store'),
			'geocode_error'			=> esc_html__('Geocode was not successful for the following reason:', 'lorem-ipsum-books-media-store'),
			'googlemap_not_avail'	=> esc_html__('Google map API not available!', 'lorem-ipsum-books-media-store'),
			'editor_save_success'	=> esc_html__("Post content saved!", 'lorem-ipsum-books-media-store'),
			'editor_save_error'		=> esc_html__("Error saving post data!", 'lorem-ipsum-books-media-store'),
			'editor_delete_post'	=> esc_html__("You really want to delete the current post?", 'lorem-ipsum-books-media-store'),
			'editor_delete_post_header'	=> esc_html__("Delete post", 'lorem-ipsum-books-media-store'),
			'editor_delete_success'	=> esc_html__("Post deleted!", 'lorem-ipsum-books-media-store'),
			'editor_delete_error'	=> esc_html__("Error deleting post!", 'lorem-ipsum-books-media-store'),
			'editor_caption_cancel'	=> esc_html__('Cancel', 'lorem-ipsum-books-media-store'),
			'editor_caption_close'	=> esc_html__('Close', 'lorem-ipsum-books-media-store')
			);
		return $vars;
	}
}
?>