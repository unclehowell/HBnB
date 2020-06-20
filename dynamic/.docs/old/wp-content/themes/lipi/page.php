<?php 
/**
 * The template for displaying all single page
 */
 
get_header();

if( get_post_meta( get_the_ID(), "__lipi_page_sidebar_layout_status", true) == 'left' ) {
	$left_sidebar = true;
	$right_sidebar = false;
	$col_md_sm = 9;
}  else if( get_post_meta( get_the_ID(), "__lipi_page_sidebar_layout_status", true) == 'right' ) {
	$left_sidebar = false;
	$right_sidebar = true;
	$col_md_sm = 9;
} else {
	$left_sidebar = false;
	$right_sidebar = false;
	$col_md_sm = 12;
}

$container_call = lipi__website_global_full_width_design_control();   
?>
	<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60 margin-bottom-60">
    <?php if( $left_sidebar == true ) { ?><div class="left-widget-sidebar"><?php get_sidebar(); ?></div>  <?php } ?>
    	<div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12"> 
    	<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				echo '<div class="page-comment">';
				comments_template();
				echo '</div>';
			}

			// End of the loop.
		endwhile;
		?>
       </div>
        <?php if( $right_sidebar == true )  get_sidebar(); ?>
    </div>
</div>    

<?php get_footer(); ?>