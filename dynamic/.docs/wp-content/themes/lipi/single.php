<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); 

$col_md  =  $col_sm = $right_sidebar = $left_sidebar = '';
if( $lipi_theme_options['blog_single_sidebar_layout'] == 3 ) {
	if ( is_active_sidebar( 'blog-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = true;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_single_sidebar_layout'] == 1 ) {
	$col_md_sm = 12;
	$right_sidebar = false;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_single_sidebar_layout'] == 2 ) {
	if ( is_active_sidebar( 'blog-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = false;
	$left_sidebar = true;
} else {
	if ( is_active_sidebar( 'blog-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = true;
	$left_sidebar = false;
}

$container_call = lipi__website_global_full_width_design_control();    
?>
    <div class="<?php echo esc_html($container_call); ?> content-wrapper body-content single">
    <div class="row margin-top-60 margin-bottom-60">
    <div class="left-widget-sidebar"><?php if( $left_sidebar == true )  get_sidebar(); ?></div>
        <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12"> 
        
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
        <div class="clearfix"></div>
        </div>
	<?php if( $right_sidebar == true )  get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>