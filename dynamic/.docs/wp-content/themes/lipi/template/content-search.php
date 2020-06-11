<?php
/**
 * The template part for displaying results in search pages
*/
$lipi_theme_options = lipi__theme_option_global();
$col_md = $col_sm = $right_sidebar = $left_sidebar = '';
if( $lipi_theme_options['blog_default_landing_pg_sidebar_layout'] == 3 ) { 
	$col_md_sm = 9;
	$right_sidebar = true;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_default_landing_pg_sidebar_layout'] == 1 ) { 
	$col_md_sm = 12;
	$right_sidebar = false;
	$left_sidebar = false;
} else if( $lipi_theme_options['blog_default_landing_pg_sidebar_layout'] == 2 ) {  
	$col_md_sm = 9;
	$right_sidebar = false;
	$left_sidebar = true;
} else {
	$col_md_sm = 9;
	$right_sidebar = true;
	$left_sidebar = false;
}
$container_call = lipi__website_global_full_width_design_control(); 
?>

<!-- /start container -->
<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60 margin-bottom-60">
    <?php if( $left_sidebar == true ) { ?><div class="left-widget-sidebar"><?php get_sidebar(); ?></div>  <?php } ?>
         <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-<?php echo esc_html($col_md_sm); ?> catkbpg"> 
         <div class="kb-categorypg">
          <?php 
		  		
				$is_plugin_active = lipi__plugin_active('ReduxFramework');
				if($is_plugin_active == true){
					if( is_search() ) {
						echo '<div class="global-search">';
						echo lipi__custom_search_form();
						echo '</div>';
					}
				}
			  
                if ( have_posts() ) : 
                // Start the loop.
                while ( have_posts() ) : the_post(); 
				$post_type = get_post_type( get_the_ID() );
				/**************************************
				** CONTROL KB ARTICLE DISPLAY :: Check For ONLY Login ACCESS **
				***************************************/
				if ( $post_type == "lipi_kb" ) {
					$terms = get_the_terms( get_the_ID() , 'lipikbcat' ); 
					$check_if_login_call = get_option( 'kb_cat_check_login_'.$terms[0]->term_id );
					$check_user_role = get_option( 'kb_cat_user_role_'.$terms[0]->term_id );
					// Check if user loggedin for the private KB article
					if( $check_if_login_call == 1 && !is_user_logged_in() ) {
						// display none
					} else {
						// check if user grop has access
						$access_status = lipi__useraccesslevel($check_user_role);
						if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
							// display none
						} else {
						?>	
                        <div class="kb-box-single searchpg clearboth">
                            <div id="post-<?php the_ID(); ?>">
                                <div class="kb-single blog searchpg">
                                    <div class="entry-header">
                                    <?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                                    </div><!-- .entry-header -->
                                <p class="searchpg_excerpt"><?php echo get_the_excerpt(); ?></p>
                                </div>    
                            </div>
                        </div>	
						<?php 	
						}
					} // eof else
				} else {
				/**************************************
				** FOR NORMAL RECORDS **
				***************************************/
                   ?>
                   <div class="kb-box-single searchpg clearboth">
                   <div id="post-<?php the_ID(); ?>">
                       <div class="kb-single blog searchpg">
                            <div class="entry-header">
                                <?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                            </div><!-- .entry-header -->
                            <p class="searchpg_excerpt"><?php echo get_the_excerpt(); ?></p>
                        </div>    
                    </div>
                    </div>
                   <?php 
				} // eof else
                endwhile;
                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => esc_html__( '&lt;', 'lipi' ),
                    'next_text'          => esc_html__( '&gt;', 'lipi' ),
                ) );
            // If no content, include the "No posts found" template.
            else :
                esc_html_e( 'Sorry!! nothing found related to your search topic, please try search again.', 'lipi' );
            endif;
            ?>
          <div class="clearfix"></div>
        </div>
        </div>
        <?php if( $right_sidebar == true )  get_sidebar(); ?>
    </div>
</div>