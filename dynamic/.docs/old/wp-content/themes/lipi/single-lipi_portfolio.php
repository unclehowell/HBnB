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
		if( $lipi_theme_options['portfolio_comments'] == true ) {
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



// Related portfolio
if( $lipi_theme_options['portfolio_related_post'] == true ) { ?>
<div class="divider divider-center"><i class="fa fa-circle"></i></div>
<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-bottom-30">
        <div class="col-md-12 col-sm-12 fix-padding-right-0 fix-padding-left-0"> 
        <?php 
        // RELATED PROJECTS
		lipi__related_portfolio($post->ID);
		?>
        <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php 
} // eof related portfolio

if( $lipi_theme_options['portfolio_footer_nav'] == true ) { ?>
<div class="portfolio_nav">
<div class="<?php echo esc_html($container_call); ?> margin-left-right-fix portfolio_nav_padding_fix">
  <div class="portfolio_prev col-md-5 col-sm-12"> <?php previous_post_link('<i class="fa fa-angle-left portfolio-single-nav"></i> <h5> %link </h5>'); ?> </div>
  <div class="portfolio_center col-md-2 col-sm-12"> <i class="fa fa-th-large portfolio-single-nav"></i> </div>
  <div class="portfolio_next col-md-5 col-sm-12"><?php next_post_link('<h5> %link </h5> <i class="fa fa-angle-right portfolio-single-nav"></i>'); ?> </div>
</div>
</div>
<?php } ?>

<!--Eof Next Previous-->

<?php 		
get_footer(); 
?>