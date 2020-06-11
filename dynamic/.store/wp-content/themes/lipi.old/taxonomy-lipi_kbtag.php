<?php
/**
 * The template for displaying all single posts and attachments
 */
$terms = get_the_terms( $post->ID , 'lipikbcat' ); 
if( !empty($terms) ) { 

get_header(); 

$col_md  =  $col_sm = $right_sidebar = $left_sidebar = $new_class = '';
if( $lipi_theme_options['knowledgebase_categorypg_layout'] == 3 ) {  
	$col_md_sm = 9;
	$right_sidebar = true;
	$left_sidebar = false;
} else if( $lipi_theme_options['knowledgebase_categorypg_layout'] == 1 ) {  
	$col_md_sm = 12;
	$right_sidebar = false;
	$left_sidebar = false;
	if( $lipi_theme_options['kb-categorypg-content-center'] == true ) {
		$new_class = 'col-xs-12 col-md-offset-1';
		$col_md_sm = 10;
	} else {
		$col_md_sm = 12;
	}
} else if( $lipi_theme_options['knowledgebase_categorypg_layout'] == 2 ) {  
	$col_md_sm = 9;
	$right_sidebar = false;
	$left_sidebar = true;
}

$container_call = lipi__website_global_full_width_design_control();   
?>
	<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
    <div class="row margin-top-60 margin-bottom-60">
    <div class="left-widget-sidebar"><?php if( $left_sidebar == true )  get_template_part('sidebar', 'kb');  ?></div>
        <div class="col-md-<?php echo esc_html($col_md_sm); ?> col-sm-12 <?php echo esc_html($new_class); ?> catkbpg"> 
        
        <?php 
		
        /**************************************
		** Search **
		***************************************/
		
		if( $lipi_theme_options['kb-categorypg-search-status'] == true ) {
			echo lipi__custom_search_form();
		}
		

        /**************************************
		** Display TAG Records **
		***************************************/
		if( $lipi_theme_options['kb-catpost-icon'] == true ) {  $no_icon = '';
		} else {  $no_icon = 'padding: 0px 0px 0px 0px;';  }
		
        // PARENT CAT
		echo '<div class="kb-categorypg">';
			if ( have_posts() ) {
				while(have_posts()) { the_post(); 
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
        </div>
	<?php if( $right_sidebar == true )  get_template_part('sidebar', 'kb');  ?>
    </div>
</div>
<?php get_footer(); 
} else {
 esc_html_e( 'Please assign category for your Knowledge Base RECORD', 'lipi' );	
} 
?>
