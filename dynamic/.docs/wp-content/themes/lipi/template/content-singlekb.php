<?php
/**
 * The template part for displaying single posts
 */
 
$lipi_theme_options = lipi__theme_option_global();
$format = get_post_format();
?>

<!--SEARCH-->
<?php 
$title_tag = 'h2';
if( isset($lipi_theme_options['kb-singlepg-title-tag']) && $lipi_theme_options['kb-singlepg-title-tag'] != '' ) {
	$title_tag = $lipi_theme_options['kb-singlepg-title-tag'];	
}
if( $lipi_theme_options['kb-single-pg-header-search-status'] == true ) {  
	$fix_search_class = 'fix-single-kb-search';
	echo lipi__custom_search_form(); 
} else {
	$fix_search_class = '';
}
?>
<!--EOF SEARCH-->

<div id="post-<?php the_ID(); ?>" <?php post_class('blog kb '.$fix_search_class.' '); ?>>

	<div class="kb-single">
        <div class="entry-header">
            <?php the_title( '<'.$title_tag.' class="entry-title">', '</'.$title_tag.'>' ); ?>
        </div><!-- .entry-header -->
        
        <div class="entry-meta">
            <?php lipi__entry_meta(); ?>
        </div><!-- .entry-meta -->
    </div>
    
    <?php 
	// DISPLAY SPECIAL POST CONTENT
	if( $format == 'audio' && get_post_meta( get_the_ID(), '__lipi_post_format_audio', true ) != '' ) {
		echo '<div class="sound-wrapper"><audio class="blog_audio" src="'.get_post_meta( get_the_ID(), '__lipi_post_format_audio', true ).'" controls="controls">';
		esc_html_e( 'Your browser don\'t support audio player', 'lipi' );
		echo '</audio></div>';
		
	} else if( $format == 'quote' && get_post_meta( get_the_ID(), '__lipi_post_format_quote', true ) != '' ) {
		echo '<blockquote>'. get_post_meta( get_the_ID(), '__lipi_post_format_quote', true ) .'</blockquote>';
		
	} else if( $format == 'link' && get_post_meta( get_the_ID(), '__lipi_post_format_link', true ) != '' ) {
		echo '<div class="linkformat"><h3><a href="'.get_post_meta( get_the_ID(), '__lipi_post_format_link', true ).'" target="_blank">'. get_the_title() .'</a></h3></div>';
	}
	?>
    
	<div class="entry-content">
		<?php
			$format = get_post_format();
			if( $format == 'gallery' ) {
				$post_content = get_the_content();
				preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
				$array_id = explode(",", isset($ids[1]) ? $ids[1] : null );
				$count_array = count($array_id); 
				// Content handle
				$content =  str_replace(  isset($ids[0]) ? $ids[0] : null , "", $post_content);
				$filtered_content = apply_filters( 'the_content', $content);
				if( $count_array >= 1 && $array_id[0] != ''  ) { 
					echo '<div class="blog-flexslider"><ul class="slides">';
					foreach($array_id as $img_id){ 
						echo '<li><a href="'.get_permalink().'">'. wp_get_attachment_image( $img_id, 'full' ).'</a></li>';
					}
					echo '</ul></div>';
				}
				echo do_shortcode($filtered_content);
			} else {
				the_content();
			}
			
			// TAGS
			if (is_single() && has_term( '', 'lipi_kbtag' )) { ?>
			  <div class="tagcloud clearfix padding-top-bottom-30 singlepg"><h6><i class="fa fa-tags"></i> <?php echo esc_html__( 'Tags:', 'lipi' ); ?></h6><?php the_terms( get_the_ID(), 'lipi_kbtag', '' , ''); ?> </div>
			 <?php } 
			 
			 // ATTACHMENT
			 if( get_post_meta( $post->ID, '__lipi_attachement_access_status', true ) == true && !is_user_logged_in() ) { 
				$message = get_post_meta( $post->ID, '__lipi_attachement_access_login_msg', true ); 
				lipi__access_control_attachment($message);
			 } else {
				 lipi__attached_files();
			 }
             
             // SOCIAL SHARE + VOTING
			 if( $lipi_theme_options['kb-single-pg-social-share-status'] == true || $lipi_theme_options['kb-single-pg-like-dislike-status'] == true ) { 
				 echo '<div class="margin-top-12 social-kb-wrap">';
				 	
					 if( $lipi_theme_options['kb-single-pg-social-share-status'] == true ) { 
						 lipi__portfolio_social_share(get_permalink()); 
					 }
					 
					 if( $lipi_theme_options['kb-single-pg-like-dislike-status'] == true ) {
						 $vote_like =  get_post_meta( get_the_ID(), 'rating_like_count_post', true );
						 $vote_unlike = get_post_meta( get_the_ID(), 'rating_unlike_count_post', true );
						 lipi__like_dislike_voting(get_the_ID(), $vote_like, $vote_unlike);
					 }
				 echo '</div>';
			 }
             ?>
         <?php if($lipi_theme_options['kb-single-pg-post-impression-status'] == true) { ?>    
         <span class="post-impression" id="post-impression-<?php echo esc_attr($post->ID); ?>"></span>
         <?php } ?>
	</div><!-- .entry-content -->
    
</div>
<?php 
if( $lipi_theme_options['kb-single-pg-related-articles-status'] == true ) {
	lipi__kb_related_articles();
}

if( $lipi_theme_options['kb-single-pg-author-status'] == true ) { 
	if ( '' !== get_the_author_meta( 'description' ) ) {
		get_template_part( 'template/biography' );
	}
}
?>