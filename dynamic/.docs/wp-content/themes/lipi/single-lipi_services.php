<?php
/**
 * The template for displaying portfolio records
 */

get_header(); 
$container_call = lipi__website_global_full_width_design_control();

// check use of vc
$vc_enabled = get_post_meta($post->ID, '_wpb_vc_js_status', true);
if( $vc_enabled == 'false' || $vc_enabled == '' ) {	 
echo '<div class="'.esc_html($container_call).' content-wrapper body-content">
	  <div class="row margin-top-40">
	  <div class="col-md-12 col-sm-12">';  
} // eofcheck use of vc


	// Start the loop.
	while ( have_posts() ) : the_post();
	
		// Include the single post content template.
		get_template_part( 'template/content', 'dynamicpage' );
    
		// If comments are open or we have at least one comment, load up the comment template.
		if( $lipi_theme_options['services_comments'] == true ) {
			if ( comments_open() || get_comments_number() ) {
				echo '<div class="'.esc_html($container_call).' full-width-comment-fix">
					  <div class="row">
					  <div class="page-comment">';
				comments_template();
				echo '</div></div></div>';
			}
		}
	
		// End of the loop.
	endwhile;
	
// check use of vc
if( $vc_enabled == 'false' || $vc_enabled == '' ) { echo '</div></div></div>'; }
// eof check use of vc
get_footer(); 
?>