<?php 
function helpcenter_kb_ajaxloadcontent($post){
error_reporting(0);
global $withcomments;
$withcomments = true; 
 
$lipi_theme_options = lipi__theme_option_global(); 
WPBMap::addAllMappedShortcodes();

// Get extra meta data
$access_meta = get_post_meta( $post->ID, 'kb_single_article_access', true );
$check_post_user_level_access = get_post_meta( $post->ID, 'kb_single_article_user_access', true );
// eof get extra meta data

/**************************************
** Check For SINGLE RECORD Login ACCESS **
***************************************/
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
	** Check USER ROLE AFTER USER LOGIN**
	***************************************/
	if( !empty($check_post_user_level_access) )  $access_status = lipi__useraccesslevel(serialize($check_post_user_level_access));
	else  $access_status = true;
	if( isset($access_meta['login']) && $access_meta['login'] == 1 && is_user_logged_in() && $access_status == false ) {
		echo '<div class="kb_login_box"> <div class="custom_login_form">';
		echo esc_html($lipi_theme_options['kb-single-page-access-control-message']);
		echo '</div></div>';
	} else {
?>
<div class="body-content kbpg">	
<div id="post-<?php $post->ID; ?>" <?php post_class('blog kb '.$fix_search_class.' '); ?>>

	<div class="kb-single">
        <div class="entry-header">
            <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        </div><!-- .entry-header -->
        
        <div class="entry-meta">
            <?php 
			
			if( $lipi_theme_options['kb-single-pg-post-impression-status'] == true ) {
				echo '<i class="fa fa-eye"></i><span>';
					if( get_post_meta( $post->ID, 'display_post_impression', true ) != '' ) { 
						echo get_post_meta( $post->ID, 'display_post_impression', true );
						echo esc_html_e( '&nbsp;views ', 'lipi' );
					} else { echo '0 views'; }
				echo ' / </span>&nbsp;';
			}
			if( $lipi_theme_options['kb-single-pg-like-dislike-status'] == true ) {
					echo '<i class="far fa-thumbs-up"></i><span>';
						if( get_post_meta( $post->ID, 'rating_like_count_post', true ) == '' ) { 
							echo '0 like'; 
						} else { 
							echo get_post_meta( $post->ID, 'rating_like_count_post', true ); 
							echo esc_html_e( '&nbsp;likes ', 'lipi' );
						} 
					echo ' / </span>&nbsp;';
			}
			if ( in_array( get_post_type(), array( 'post', 'attachment', 'lipi_kb' ) ) ) {
				if(  $lipi_theme_options['kb-single-pg-post-date'] == true ) {
				lipi__entry_date();
				}
			}
			if( $lipi_theme_options['kb-single-pg-post-author-qs-status'] == true ) {
				echo '<i class="fa fa-user"></i> <span class="author">'. get_the_author_meta('user_nicename', $post->post_author) .'</span><span class="meta-seprate">/</span>';
			}
			if (class_exists('WP_Print_O_Matic')) { echo do_shortcode('[print-me printstyle="pom-small-grey" tag="span" target=".body-content.kbpg"]');  }
			
			 edit_post_link(
				sprintf(
					esc_html__( 'Edit', 'lipi' ),
					get_the_title()
				),
				'<span class="meta-seprate">/</span><i class="fa fa-edit"></i><span class="edit-link">',
				'</span>'
			);
			
			?>
        </div><!-- .entry-meta -->
    </div>
    
    <?php 
	// DISPLAY SPECIAL POST CONTENT
	if( $format == 'audio' && get_post_meta( $post->ID, '__lipi_post_format_audio', true ) != '' ) {
		echo '<div class="sound-wrapper"><audio class="blog_audio" src="'.get_post_meta( $post->ID, '__lipi_post_format_audio', true ).'" controls="controls">';
		esc_html_e( 'Your browser don\'t support audio player', 'lipi' );
		echo '</audio></div>';
		
	} else if( $format == 'quote' && get_post_meta( $post->ID, '__lipi_post_format_quote', true ) != '' ) {
		echo '<blockquote>'. get_post_meta( $post->ID, '__lipi_post_format_quote', true ) .'</blockquote>';
		
	} else if( $format == 'link' && get_post_meta( $post->ID, '__lipi_post_format_link', true ) != '' ) {
		echo '<div class="linkformat"><h3><a href="'.get_post_meta( $post->ID, '__lipi_post_format_link', true ).'" target="_blank">'. get_the_title () .'</a></h3></div>';
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
				echo do_shortcode(apply_filters('the_content', $post->post_content));
			}
			
			// TAGS
			if (is_single() && has_term( '', 'lipi_kbtag' )) { ?>
			  <div class="tagcloud clearfix padding-top-bottom-30 singlepg"><span><i class="fa fa-tags"></i> <?php echo esc_html__( 'TAGS:', 'lipi' ); ?></span><?php the_terms( $post->ID, 'lipi_kbtag', '' , ''); ?> </div>
			 <?php } 
			 
			 // ATTACHMENT
			 if( get_post_meta( $post->ID, '__lipi_attachement_access_status', true ) == true && !is_user_logged_in() ) { 
				$message = get_post_meta( $post->ID, '__lipi_attachement_access_login_msg', true ); 
				lipi__access_control_attachment($message);
			 } else {
				$entries = get_post_meta( $post->ID, '__lipi_page_kb_group', true );
				if( !empty($entries) && $entries[0]['image_id'] != 0 ) {  
				echo '<div class="attached_file_section padding-top-bottom-10">
					  <h5>'.esc_attr($lipi_theme_options['attached-file-title']).'</h5>
					  <span class="separator small"></span>
					  <div class="wrapbox">
					  <table class="table table-hover"> 
						<thead> 
							<tr> 
								<th><h6>#</h6></th> 
								<th><h6>'.esc_attr($lipi_theme_options['attached-file-type']).'</h6></th> 
								<th><h6>'.esc_attr($lipi_theme_options['attached-file-size']).'</h6></th> 
								<th><h6>'.esc_attr($lipi_theme_options['attached-file-download']).'</h6></th> 
							</tr> 
						</thead>	
						 ';
						 
					$i = 1;	
					foreach ( (array) $entries as $key => $entry ) { 
						$file_size = filesize( get_attached_file( $entry['image_id'] ) );
						$attach_file_type = wp_check_filetype($entry['image']);
						$filename = ( get_the_title($entry['image_id'])?get_the_title($entry['image_id']):basename( get_attached_file( $entry['image_id'] ) )); 
						$img = $title = $desc = $caption = '';
						if ( isset( $entry['title'] ) ) $title = esc_html( $entry['title'] );
							if ( isset( $entry['image'] ) ) { 
								echo '<tbody> 
									<tr> 
										<th scope="row">'.esc_attr($i).'</th> 
										<td>'. '.'.esc_html($attach_file_type['ext']).'</td> 
										<td>'. esc_attr(size_format($file_size, 2)) .'</td> 
										<td><a href="'. esc_url(wp_get_attachment_url( $entry['image_id'] )) .'">'. $filename .'</a></td> 
									</tr> 
								</tbody>'; 
							}
					$i++;		
					}
					echo '</table></div></div>';
				}

			 }
             
             // SOCIAL SHARE + VOTING
			 if( $lipi_theme_options['kb-single-pg-social-share-status'] == true || $lipi_theme_options['kb-single-pg-like-dislike-status'] == true ) { 
				 echo '<div class="margin-top-12 social-kb-wrap">';
				 	
					 if( $lipi_theme_options['kb-single-pg-social-share-status'] == true ) { 
						 lipi__portfolio_social_share(get_permalink($post->ID)); 
					 }
					 
					 if( $lipi_theme_options['kb-single-pg-like-dislike-status'] == true ) {
						 $vote_like =  get_post_meta( $post->ID, 'rating_like_count_post', true );
						 $vote_unlike = get_post_meta( $post->ID, 'rating_unlike_count_post', true );
						 lipi__like_dislike_voting($post->ID, $vote_like, $vote_unlike);
					 }
				 echo '</div>';
			 }
             ?>
         <?php if( $lipi_theme_options['kb-single-pg-post-impression-status'] == true ) { ?>
         <span class="post-impression" id="post-impression-<?php echo esc_attr($post->ID); ?>"></span>
         <?php } ?>
	</div><!-- .entry-content -->
    
</div>
</div>	
<?php 

if( $lipi_theme_options['kb-single-pg-related-articles-status'] == true ) {
	echo '<div class="related_post_ajax_loadcontent">';
	lipi__kb_related_articles();
	echo '</div>';
}

if( $lipi_theme_options['kb-single-pg-author-status'] == true ) { 
	if ( '' !== get_the_author_meta( 'description' ) ) {
		echo '<div class="related_post_ajax_loadcontent">';
		get_template_part( 'template/biography' );
		echo '</div>';
	}
}

// comment box
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
// eof comment box

}}
die();
} ?>