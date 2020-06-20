<?php 
/*
Template Name: Blog Small Thumb
*/
get_header(); 

$col_md  =  $col_sm = $right_sidebar = $left_sidebar = '';
if( $lipi_theme_options['blog_small_thumb_landing_pg_sidebar_layout'] == 3 ) {
	$col_md_sm = 9;
	$right_sidebar = true;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_small_thumb_landing_pg_sidebar_layout'] == 1 ) {
	$col_md_sm = 12;
	$right_sidebar = false;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_small_thumb_landing_pg_sidebar_layout'] == 2 ) {
	$col_md_sm = 9;
	$right_sidebar = false;
	$left_sidebar = true;
} else {
	$col_md_sm = 9;
	$right_sidebar = true;
	$left_sidebar = false;
}

// get paged
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$container_call = lipi__website_global_full_width_design_control();   
?>
    <div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60">
    <div class="left-widget-sidebar fix-blog-left-sidebar-small-thumb"><?php if( $left_sidebar == true )  get_sidebar(); ?></div>
        <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12">
          <?php 
		  		
				query_posts('post_type=post&paged='. $paged );
		  
                if ( have_posts() ) : 
                	
					echo '<div class="blog-small-thumb">';
						while ( have_posts() ) : the_post();
							echo '<div class="entry clearfix">';
								get_template_part( 'template/content', 'small-thumb' );
							echo '</div>'; 
						endwhile;
					echo '</div>';
        
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
				wp_reset_postdata();
                ?>
        </div>
    <?php if( $right_sidebar == true )  get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>