<?php
/**
 * The template for displaying all single posts and attachments
 */
$terms = get_the_terms( $post->ID , 'lipikbcat' ); 
if( !empty($terms) ) { 

get_header(); 

$col_md  =  $col_sm = $right_sidebar = $left_sidebar = $new_class = '';
if( $lipi_theme_options['knowledgebase_sidebar_layout'] == 3 ) {
	if ( is_active_sidebar( 'kb-widget-2' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = true;
	$left_sidebar = false;
} else if( $lipi_theme_options['knowledgebase_sidebar_layout'] == 1 ) {
	$right_sidebar = false;
	$left_sidebar = false;
	if( $lipi_theme_options['kb-single-pg-content-center'] == true ) {
		$new_class = 'col-xs-12 col-md-offset-1';
		$col_md_sm = 10;
	} else {
		$col_md_sm = 12;
	}
} else if( $lipi_theme_options['knowledgebase_sidebar_layout'] == 2 ) {
	if ( is_active_sidebar( 'kb-widget-2' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = false;
	$left_sidebar = true;
} else {
	if ( is_active_sidebar( 'kb-widget-2' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = false;
	$left_sidebar = true;
}

// Get extra meta data
$current_term = $terms[0];
$term_id = $current_term->term_id; // cat id
$check_if_login_call = get_option( 'kb_cat_check_login_'.$terms[0]->term_id );
$check_user_role = get_option( 'kb_cat_user_role_'.$terms[0]->term_id );
$custom_login_message = get_option( 'kb_cat_login_message_'.$terms[0]->term_id );
// eof get extra meta data

$container_call = lipi__website_global_full_width_design_control();   
?>
    <div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60 margin-bottom-60">
    <div class="left-widget-sidebar"><?php if( $left_sidebar == true )  get_template_part('sidebar', 'kb-single');  ?></div>
        <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12 <?php echo esc_html($new_class); ?> kbpg"> 
        
		<?php
		
		 /**************************************
		** Check For ONLY Login ACCESS **
		***************************************/
		if( $check_if_login_call == 1 && !is_user_logged_in() ) {
			
			echo '<div class="kb_login_box"> <div class="custom_login_form">';
				 if( $custom_login_message != '' ) {
				  echo '<h4> '.stripslashes($custom_login_message).'</h4>';
				 }
				 wp_login_form();
			 echo '<ul class="custom_register">';
				 if ( get_option( 'users_can_register' ) ) { wp_register(); }
			 echo '<li><a href="'.wp_lostpassword_url().'" class="more-link hvr-icon-wobble-horizontal">';
			 echo esc_html_e( 'Lost Password', 'lipi' );
			 echo '&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a></li> </ul> </div> </div>';
			 
		} else {
			
		/**************************************
		** Check USER ROLE AFTER USER LOGIN**
		***************************************/
		$access_status = lipi__useraccesslevel($check_user_role);
		if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
			echo '<div class="kb_login_box"> <div class="custom_login_form">';
			echo esc_html($lipi_theme_options['kb-cat-page-access-control-message']);
			echo '</div></div>';
		} else {
			
				/**************************************
				** SINGLE ARTICLE ACCESS CONTROL **
				***************************************/
				$access_meta = get_post_meta( $post->ID, 'kb_single_article_access', true );
				$check_post_user_level_access = get_post_meta( $post->ID, 'kb_single_article_user_access', true );
				if( isset($access_meta['login']) && $access_meta['login'] == 1 && !is_user_logged_in() ) {
					echo '<div class="kb_login_box"> <div class="custom_login_form">';
						 if( isset($access_meta['message']) && $access_meta['message'] != '' ) {
						  echo '<h4> '.stripslashes($access_meta['message']).'</h4>';
						 }
						 wp_login_form();
					 echo '<ul class="custom_register">';
						 if ( get_option( 'users_can_register' ) ) { wp_register(); }
					 echo '<li><a href="'.wp_lostpassword_url().'" class="more-link hvr-icon-wobble-horizontal">';
					 echo esc_html_e( 'Lost Password', 'lipi' );
					 echo '&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a></li> </ul> </div> </div>';		
				} else {
					
					/**************************************
					** USER ROLE :: SINGLE ARTICLE ACCESS CONTROL  **
					***************************************/
					if( !empty($check_post_user_level_access) )  $access_status = lipi__useraccesslevel(serialize($check_post_user_level_access));
					else  $access_status = true;
					if( isset($access_meta['login']) && $access_meta['login'] == 1 && is_user_logged_in() && $access_status == false ) {
						echo '<div class="kb_login_box"> <div class="custom_login_form">';
						echo esc_html($lipi_theme_options['kb-single-page-access-control-message']);
						echo '</div></div>';
					} else {
					
						/**************************************
						** START POST DISPLAY  **
						***************************************/
						while ( have_posts() ) : the_post();
				
							// Include the single post content template.
							get_template_part( 'template/content', 'singlekb' );
				
							if( $lipi_theme_options['kb-single-pg-comment-status'] == true ) { 
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) {
									if( $lipi_theme_options['kb-comment-box-on-thumbsdown'] == true ){ 
										echo '<div class="kb-respond-no-message"><div class="kb-feedback-showhide" style="display:none;">';
									}
									comments_template(); 
									if( $lipi_theme_options['kb-comment-box-on-thumbsdown'] == true ){ 
										echo '</div></div>'; 
									}
								}
							}
				
							// End of the loop.
						endwhile;
		?>
        <div class="clearfix"></div>
        <?php } // user access level
			} // eof inner access level ?>
        <?php } // user access level
			} // eof login access else ?>	
        </div>
	<?php if( $right_sidebar == true )  get_template_part('sidebar', 'kb-single');  ?>
    </div>
</div>
<?php get_footer(); 
} else {
 esc_html_e( 'Please assign category for your Knowledge Base RECORD', 'lipi' );	
} 
?>