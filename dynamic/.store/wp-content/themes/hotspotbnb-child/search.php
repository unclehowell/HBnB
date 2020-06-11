<?php
/**
 * The template for displaying search results pages.
 */
 
if(!empty($_GET['ajax']) ? $_GET['ajax'] : null) { 
	lipi__live_search_result();
} else { 
	get_header();
		get_template_part( 'template/content', 'search' ); 
	get_footer(); 
} 
?>