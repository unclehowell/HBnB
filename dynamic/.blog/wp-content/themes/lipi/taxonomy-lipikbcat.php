<?php
/**
 * The template for displaying all single posts and attachments
 */
$terms = get_the_terms( $post->ID , 'lipikbcat' ); 
if( !empty($terms) ) { 

get_header(); 

$col_md  =  $col_sm = $right_sidebar = $left_sidebar = $new_class = '';
if( $lipi_theme_options['knowledgebase_categorypg_layout'] == 3 ) {
	if ( is_active_sidebar( 'kb-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = true;
	$left_sidebar = false;
} else if( $lipi_theme_options['knowledgebase_categorypg_layout'] == 1 ) {
	$right_sidebar = false;
	$left_sidebar = false;
	if( $lipi_theme_options['kb-categorypg-content-center'] == true ) {
		$new_class = 'col-xs-12 col-md-offset-1';
		$col_md_sm = 10;
	} else {
		$col_md_sm = 12;
	}
} else if( $lipi_theme_options['knowledgebase_categorypg_layout'] == 2 ) {
	if ( is_active_sidebar( 'kb-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = false;
	$left_sidebar = true;
} else {
	if ( is_active_sidebar( 'kb-widget-1' ) ) { $col_md_sm = 9; } else { $col_md_sm = 12; }
	$right_sidebar = false;
	$left_sidebar = true;
}

// Get extra meta data
$term_slug = get_query_var( 'term' );
$current_term = get_term_by( 'slug', $term_slug, 'lipikbcat' );
$check_if_login_call = get_option( 'kb_cat_check_login_'.$current_term->term_id );
$check_user_role = get_option( 'kb_cat_user_role_'.$current_term->term_id );
$custom_login_message = get_option( 'kb_cat_login_message_'.$current_term->term_id );
// eof get extra meta data

$container_call = lipi__website_global_full_width_design_control();   
?>
	<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60 margin-bottom-60">
    <div class="left-widget-sidebar"><?php if( $left_sidebar == true )  get_template_part('sidebar', 'kb');  ?></div>
        <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12 <?php echo esc_html($new_class); ?> catkbpg"> 
        
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
		** Search **
		***************************************/
		
		if( $lipi_theme_options['kb-categorypg-search-status'] == true ) {
			echo lipi__custom_search_form();
		}
		
        /**************************************
		** Display Records Related To CHILD Category **
		***************************************/
		$st_term_data =	$wp_query->queried_object;
		$term_slug = get_query_var( 'term' );
		$current_term = get_term_by( 'slug', $term_slug, 'lipikbcat' );
		$term_id = $current_term->term_id;

		$st_subcat_args = array(
		  'orderby' => 'name',
		  'order'   => 'ASC',
		  'child_of' => $term_id,
		  'parent' => $term_id
		);
		$st_sub_categories = get_terms('lipikbcat', $st_subcat_args);
		
		if ($st_sub_categories) {
			 // If the category has sub categories 
			$st_subcat_args = array(
			  'orderby' => 'name',
			  'order'   => 'ASC',
			  'child_of' => $term_id,
			  'parent' => $term_id
			);
			$st_sub_categories = get_terms('lipikbcat', $st_subcat_args);
			echo '<div class="kb_sub_category_section_wrap">'; 
			foreach($st_sub_categories as $st_sub_category) {
				echo '<div class="kb_sub_category_section">';
				  echo '<h5><a href="'.get_term_link($st_sub_category->slug, 'lipikbcat').'">';
                         $cat_title = $st_sub_category->name; 
                         echo html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
                   echo '</a>';
				   echo '</h5>&nbsp;('.$st_sub_category->count.')';
				   echo '<span class="separator small"></span>';
            	echo '</div>';
			} 
			echo '</div>';  
		} 


        /**************************************
		** Display Records Related To ROOT Category **
		***************************************/
		if( $lipi_theme_options['kb-catpost-icon'] == true ) {  $no_icon = '';
		} else {  $no_icon = 'padding: 0px 0px 0px 0px;';  }
		
        // PARENT CAT
		echo '<div class="kb-categorypg">';
		
		// custom post filter
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'lipi_kb',
			'paged' => $paged,
			'posts_per_page' => ((isset($lipi_theme_options['kb-catpost-records-per-page']) && $lipi_theme_options['kb-catpost-records-per-page'] != '')?$lipi_theme_options['kb-catpost-records-per-page']:'-1'),
			'order'  => ((isset($lipi_theme_options['kb-catpost-records-display-order']) && $lipi_theme_options['kb-catpost-records-display-order'] != '')?$lipi_theme_options['kb-catpost-records-display-order']:'DESC'),
			'orderby' => ((isset($lipi_theme_options['kb-catpost-records-display-order-by']) && $lipi_theme_options['kb-catpost-records-display-order-by'] != '')?$lipi_theme_options['kb-catpost-records-display-order-by']:'date'),
			'tax_query' => array(
							array(
								'taxonomy' => 'lipikbcat',
								'field' => 'slug',
								'include_children' => (($lipi_theme_options['kb-catpost-records-all-child-in-root'] == false)? false : true ),
								'terms' => $term_slug
								)
							),
								
		);
		$wp_query = new WP_Query($args);
		// eof custom post filter
		
			if ( $wp_query->have_posts() ) {
				while($wp_query->have_posts()) { $wp_query->the_post();
				?>
					  <div class="kb-box-single" style=" <?php echo esc_html($no_icon); ?> ">
						<div class="kb-single blog">
							<div class="entry-header">
								<<?php echo esc_attr($lipi_theme_options['kb-catpost-title-tag']); ?>><a href="<?php the_permalink(); ?>">
									 <?php 
										 $org_title = get_the_title(); 
										 echo html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
									 ?>
								</a></<?php echo esc_attr($lipi_theme_options['kb-catpost-title-tag']); ?>>
							</div><!-- .entry-header -->
							<div class="entry-meta">
								<?php lipi__entry_meta(); ?>
							</div>
						</div>
					  </div>
				<?php 
				} 
			
				// page navigation.
				the_posts_pagination( array(
					'prev_text'          => esc_html__( '&lt;', 'lipi' ),
					'next_text'          => esc_html__( '&gt;', 'lipi' ),
				) );
				// Eof page navigation.
				
			} else {
				 esc_html_e( '', 'lipi' );
			}			
		echo '</div>';	
		
		?> 
        <!--Eof Display Records Related To Category-->
        
        
        <div class="clearfix"></div>
        <?php
			} // user access level
			} // eof login access else ?>
        </div>
	<?php if( $right_sidebar == true )  get_template_part('sidebar', 'kb');  ?>
    </div>
</div>
<?php get_footer(); 
} else {
 esc_html_e( 'Please assign category for your Knowledge Base RECORD', 'lipi' );	
} 
?>
