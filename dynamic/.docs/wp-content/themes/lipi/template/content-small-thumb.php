<?php 
/**
 * The template part for displaying posts
 */
 
$lipi_theme_options = lipi__theme_option_global();

// excerpt
if( !empty( $lipi_theme_options['blog_small_thumb_charater_limit_excerpt'] ) ) {
	$excerpt_content_limit = $lipi_theme_options['blog_small_thumb_charater_limit_excerpt'];
} else {
	$excerpt_content_limit = 25;
}
// blog main content		
if( !empty( $lipi_theme_options['blog_small_thumb_charater_limit_blog_main_content'] ) ) {
	$blog_content_limit = $lipi_theme_options['blog_small_thumb_charater_limit_blog_main_content'];
} else {
	$blog_content_limit = 25;
}

$format = get_post_format();
$display_status = '';
if( $format == 'quote' ) { 
	if( $lipi_theme_options['blog_post_title_quote_status'] == false ){  
		$display_status = 1; 
	} else { 
		$display_status = 2; 	
	} 
	// continue read status
	if( $lipi_theme_options['blog_post_title_quote_morelink_status'] == false ){  
		$display_morelink_status = 1; 
	} else { 
		$display_morelink_status = 2; 	
	}
} else {
	$display_status = 2;
	$display_morelink_status = 2; 	
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog smallthumb'); ?>>

    <div class="entry-image" style=" <?php  if( $format == 'quote' ) { echo "width:100%;float:none";  } ?>">
	<?php
	$post_content = get_the_content();
	if( $format == 'gallery' ) {
		
		preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
		$array_id = explode(",", isset($ids[1]) ? $ids[1] : null );
		$count_array = count($array_id); 
		// Content handle
		$content =  str_replace(  isset($ids[0]) ? $ids[0] : null , "", $post_content);
		$filtered_content = apply_filters( 'the_content', $content);
		
		if( $count_array >= 1 && $array_id[0] != ''  ) { 
		
			echo '<div class="blog-flexslider"><ul class="slides">';
			
			if( is_single() ) $gallery_img_resize = 'full';
			else $gallery_img_resize = 'portfolio-FitRows';
			
			foreach($array_id as $img_id){ 
				echo '<li><a href="'.get_permalink().'">'. wp_get_attachment_image( $img_id, $gallery_img_resize ).'</a></li>';
			}
			echo '</ul></div>';
			
		} else {
			lipi__post_thumbnail(); 
		}
		
	} else if( $format == 'quote' ) {
				
		$blockquote = get_post_meta( get_the_ID(), '__lipi_post_format_quote', true );
		if( !empty($blockquote) ) echo '<blockquote>'. $blockquote .'</blockquote>';
				
			
	// HANDLE AUDIO		
	} else if( $format == 'audio' ) {
				
			$post_audio = get_post_meta( get_the_ID(), '__lipi_post_format_audio', true );
			if( !empty($post_audio) ) {
				
				 echo '<div class="sound-wrapper"><audio class="blog_audio" src="'.get_post_meta( get_the_ID(), '__lipi_post_format_audio', true ).'" controls="controls">';
				 esc_html_e( 'Your browser don\'t support audio player', 'lipi' );
				 echo '</audio></div>';
				 // Handle export content
				 $excerpt_audio_frame = get_the_excerpt();
				 $excerpt_audio_frame = trim($excerpt_audio_frame);
				 if( !empty($excerpt_audio_frame) ) {    
					 preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $excerpt_audio_frame, $audio_matches);
					 $filtered_audio_content =  str_replace(  isset($audio_matches[0]) ? $audio_matches[0] : null , "", $excerpt_audio_frame);
				 }
				 
			} else {
				$excerpt_audio_frame = get_the_excerpt();
				$excerpt_audio_frame = trim($excerpt_audio_frame);
				if( !empty($excerpt_audio_frame) ) {  
					preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $excerpt_audio_frame, $audio_matches);
					$filtered_audio_content =  str_replace(  isset($audio_matches[0]) ? $audio_matches[0] : null , "", $excerpt_audio_frame);
					if( isset($audio_matches[0]) ) echo '<div class="sound-wrapper">'.$audio_matches[0].'</div>';
				} else {
					$filtered_audio_content = '';
				}
			}
			
	// HANDLE VIDEO	
	} else if( $format == 'video' ) {
				
			$excerpt_video_frame = get_the_excerpt();
			$excerpt_video_frame = trim($excerpt_video_frame);
			if( !empty($excerpt_video_frame) ) { 
				preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $excerpt_video_frame, $video_matches);
				$filtered_video_content =  str_replace(  isset($video_matches[0]) ? $video_matches[0] : null , "", $excerpt_video_frame);
				if( isset($video_matches[0]) )echo '<div class="video-wrapper">'.$video_matches[0].'</div>';
			} else {  
				$filtered_video_content = '';
			}
				
	} else {
		lipi__post_thumbnail(); 
	}
	?>
    </div>
    
    
    <div class="entry-c">
    <?php 
		if( !is_page() ) { 
		if( $display_status == 2 ) {
	?>
        <div class="entry-header">
            <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                <span class="sticky-post"><?php esc_html_e( 'Featured', 'lipi' ); ?></span>
            <?php endif; ?>
    
            <?php the_title( sprintf( '<a href="%s" rel="bookmark"><h4 class="entry-title">', esc_url( get_permalink() ) ), '</h4></a>' ); ?>
        </div><!-- .entry-header -->
        <?php } ?>
        
        <div class="entry-meta fix-blog-meta">
        <?php lipi__entry_meta(); ?>
        </div><!-- .entry-meta -->
    <?php } ?>
    
	<div class="entry-content">
	<?php
		
		if ( is_single() )  {  
				if( $lipi_theme_options['blog_post_excerpts_status'] == true ) lipi__excerpt();
				if( $format == 'gallery' ) {
					echo do_shortcode($filtered_content);
				} else {
					the_content();
				}
		} else { 
			$bind_post_format_quote_fix = get_post_meta( get_the_ID(), '__lipi_post_format_quote', true );
			if( $format == 'gallery' ) {
				$gallery_content = do_shortcode($filtered_content);
				lipi__chk_excerpt_content( $post->post_excerpt, $gallery_content, $display_morelink_status, $blog_content_limit, $format, $excerpt_content_limit );
				
			} else if( $format == 'audio' ) {
				lipi__chk_excerpt_content( $post->post_excerpt, $filtered_audio_content, $display_morelink_status, $blog_content_limit, $format, $excerpt_content_limit );
				
			} else if( $format == 'video' ) {
				lipi__chk_excerpt_content( $post->post_excerpt, $filtered_video_content, $display_morelink_status, $blog_content_limit, $format, $excerpt_content_limit );
				
			} else if( $format == 'quote' && !empty($bind_post_format_quote_fix) ) {
				
			} else {  
				lipi__chk_excerpt_content( $post->post_excerpt, $post_content, $display_morelink_status, $blog_content_limit, $format, $excerpt_content_limit );
			}
			
		}
			
	?>
	</div><!-- .entry-content -->
    </div>

</div><!-- #post-## -->