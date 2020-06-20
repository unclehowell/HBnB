<?php
/**
 * The template part for displaying single page
 */
 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog page'); ?>>
    
	<div class="entry-content">
		<?php 
		
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
		?>
        
        <?php
			wp_link_pages( array(
				'before'      => '<div class="page page-links"><span class="page-links-title">' . __( 'Pages:', 'lipi' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'lipi' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

</div>