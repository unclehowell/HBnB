<?php

/**
 * Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header();

$left_sidebar = false;
$right_sidebar = false;
$col_md_sm = 12;
$new_class = '';
if( $lipi_theme_options['bbpress_display_sidebar_on_page_status'] ==  true ) {  
	if( $lipi_theme_options['bbpress_display_sidebar_position_left_right'] == 'left' ) {
		$left_sidebar = true;
		$right_sidebar = false;
		if ( is_active_sidebar( 'bbpress-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	}  else if( $lipi_theme_options['bbpress_display_sidebar_position_left_right'] == 'right' ) {
		$left_sidebar = false;
		$right_sidebar = true;
		if ( is_active_sidebar( 'bbpress-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	} else {
		$left_sidebar = false;
		$right_sidebar = false;
		if( $lipi_theme_options['bbpress_display_content_center'] == true ) {
			$new_class = 'col-xs-12 col-md-offset-1';
			$col_md_sm = 10;
		} else {
			$col_md_sm = 12;
		}
	}
}

$container_call = lipi__website_global_full_width_design_control();  
?>
	<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60 margin-bottom-60">
    
    	<?php if( $left_sidebar == true ) { ?>
        	<div class="left-widget-sidebar">
                <aside class="col-md-3 col-sm-12 sidebar-widget-box">
                <?php 
                if ( is_active_sidebar( 'bbpress-widget-1' ) ) : 
                    dynamic_sidebar( 'bbpress-widget-1' ); 
                endif; 
                ?>
                </aside>
            </div>  
		<?php } ?>
    
        <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12 <?php echo esc_html($new_class); ?> forum-custom-pg">
        <!--Content Start-->  
  
			<?php if( $lipi_theme_options['bbpress_display_search_on_page'] ==  true ) { echo lipi__custom_search_form(); } ?>
			<?php do_action( 'bbp_before_main_content' ); ?>
            <?php do_action( 'bbp_template_notices' ); ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php if ( bbp_user_can_view_forum() ) : ?>
                    <div id="forum-<?php bbp_forum_id(); ?>" class="bbp-forum-content">
                            <?php bbp_get_template_part( 'content', 'single-forum' ); ?>
                    </div><!-- #forum-<?php bbp_forum_id(); ?> -->
                <?php else : // Forum exists, user no access ?>
                     <div><?php bbp_get_template_part( 'feedback', 'no-access' ); ?></div> 
                <?php endif; ?>
            <?php endwhile; ?>
            
            <?php do_action( 'bbp_after_main_content' ); ?>
        
        <!--Eof Content Start-->
		<div class="clearfix"></div>
        </div>
		
		<?php if( $right_sidebar == true ) { ?>
        <aside class="col-md-3 col-sm-12 sidebar-widget-box">
			<?php 
            if ( is_active_sidebar( 'bbpress-widget-1' ) ) : 
                dynamic_sidebar( 'bbpress-widget-1' ); 
            endif; 
            ?>
        </aside>
        <?php } ?>
        
    </div>
</div>
<?php get_footer(); ?>