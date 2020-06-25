<?php 
get_header(); 
$col_md = $col_sm = $right_sidebar = $left_sidebar = '';
if( $lipi_theme_options['blog_default_landing_pg_sidebar_layout'] == 3 ) {
	if ( is_active_sidebar( 'blog-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = true;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_default_landing_pg_sidebar_layout'] == 1 ) {
	$col_md_sm = 12;
	$right_sidebar = false;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_default_landing_pg_sidebar_layout'] == 2 ) {
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
    <div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60">
    <div class="left-widget-sidebar fix-blog-left-sidebar"><?php if( $left_sidebar == true )  get_sidebar(); ?></div>
        <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12"> 
          <?php 
                if ( have_posts() ) : 
                
                    while ( have_posts() ) : the_post();
                    	get_template_part( 'template/content', get_post_format() );
                    endwhile;
        
                   // Previous/next page navigation.
				   echo '<div class="pagination-nav-links">';
                    the_posts_pagination( array(
                        'prev_text'          => '&lt;',
                        'next_text'          => '&gt;',
                    ) );
				   echo '</div>';
				   
				// If no content, include the "No posts found" template.    
                else :
                     get_template_part( 'template/content', 'none' );
                endif;
                ?>
          <div class="clearfix"></div>
        </div>
    <?php if( $right_sidebar == true )  get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>