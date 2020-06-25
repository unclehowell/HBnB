<?php 
/*
Template Name: Full Width
*/ 

get_header(); 
$container_call = lipi__website_global_full_width_design_control();
	
	// Start the loop.
	while ( have_posts() ) : the_post();
	
		// Include the single post content template.
		get_template_part( 'template/content', 'dynamicpage' );
    
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			echo '<div class="'.esc_html($container_call).' full-width-comment-fix">
				  <div class="row">
				  <div class="page-comment">';
			comments_template();
			echo '</div></div></div>';
		}
	
		// End of the loop.
	endwhile;
		
		
get_footer(); 

?>