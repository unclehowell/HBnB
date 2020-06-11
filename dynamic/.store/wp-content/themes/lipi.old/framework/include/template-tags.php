<?php 

/*-----------------------------------------------------------------------------------*/
/*	POST EXCERPT
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'lipi__excerpt' ) ) {
	function lipi__excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) { ?>
			<div class="<?php echo esc_attr($class); ?>">
				<?php the_excerpt(); ?>
			</div>
		<?php }
	}
}


if ( ! function_exists( 'lipi__chk_excerpt_content' ) ) {
	function lipi__chk_excerpt_content( $post_excerpt, $content, $display_morelink_status, $blog_content_limit, $format, $excerpt_content_limit ){
		global $lipi_theme_options;
		$post_excerpt = trim($post_excerpt);
		if( !empty($post_excerpt) && trim($post_excerpt) != "" ) { 
			if( $format == 'audio' ) {
				echo '<p>'.substr( $content, 0, $excerpt_content_limit ).'</p>';
			} else if( $format == 'video' ) {
				echo '<p>'.substr( $content, 0, $excerpt_content_limit ).'</p>';
			} else {
				echo '<p>'.substr( get_the_excerpt(), 0, $excerpt_content_limit ).'</p>';
			}
			
			if( $display_morelink_status == 2 ) {
				echo '<p> <a href="'.esc_url( get_permalink() ).'" class="more-link hvr-icon-wobble-horizontal">'.($lipi_theme_options['blog_read_more_text']!=""?$lipi_theme_options['blog_read_more_text']:'CONTINUE READING').'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';
			}
			
		} else { 
			echo '<p>'.wp_trim_words( $content, $blog_content_limit, '...' ).'</p>';	
			echo '<p class="bloglinkp"> <a href="'.esc_url( get_permalink() ).'" class="more-link hvr-icon-wobble-horizontal">'.($lipi_theme_options['blog_read_more_text']!=""?$lipi_theme_options['blog_read_more_text']:'CONTINUE READING').'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';	
		}
		
	}
}


/*-----------------------------------------------------------------------------------*/
/*	VC EXPORT CONTENT
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'get_lipi__chk_excerpt_content' ) ) {
	function get_lipi__chk_excerpt_content( $post_excerpt, $content, $display_morelink_status, $blog_content_limit, $format, $excerpt_content_limit ){
		global $lipi_theme_options;
		$return = '';
		$post_excerpt = trim($post_excerpt);
		if( !empty($post_excerpt) && trim($post_excerpt) != "" ) { 
			if( $format == 'audio' ) {
				$return .= '<p>'.substr( $content, 0, $excerpt_content_limit ).'</p>';
			} else if( $format == 'video' ) {
				$return .= '<p>'.substr( $content, 0, $excerpt_content_limit ).'</p>';
			} else {
				$return .= '<p>'.substr( get_the_excerpt(), 0, $excerpt_content_limit ).'</p>';
			}
			
			if( $display_morelink_status == 2 ) {
				$return .= '<p> <a href="'.esc_url( get_permalink() ).'" class="more-link hvr-icon-wobble-horizontal">'.$lipi_theme_options['blog_read_more_text'].'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';
			}
			
		} else { 
			$return .= '<p>'.wp_trim_words( $content, $blog_content_limit, '...' ).'</p>';	
			if( $display_morelink_status == 2 ) $return .= '<p> <a href="'.esc_url( get_permalink() ).'" class="more-link hvr-icon-wobble-horizontal">'.$lipi_theme_options['blog_read_more_text'].'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';	
		}
		
		return $return;
	}
}



/*-----------------------------------------------------------------------------------*/
/*	POST THUMBNAIL
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'lipi__post_thumbnail' ) ) {

	function lipi__post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
	
		if ( is_singular() ) {
		?>
	
		<div class="post-thumbnail">
			<?php the_post_thumbnail('full'); ?>
		</div>
	
		<?php } else { ?>
	
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'portfolio-FitRows', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</a>
	
		<?php }
	}

}


/*-----------------------------------------------------------------------------------*/
/*	POST META
 * Prints meta information
/*-----------------------------------------------------------------------------------*/ 
if ( ! function_exists( 'lipi__entry_meta' ) ) {
	
	function lipi__entry_meta($special = '') {
		global $lipi_theme_options;
		
		if ( 'lipi_kb' === get_post_type() ) {
			
			if( ($lipi_theme_options['kb-single-pg-post-impression-status'] == true && is_single()) || ($lipi_theme_options['kb-categorypg-impression-status'] == true && is_archive()) ) {
				echo '<i class="fa fa-eye"></i><span>';
					if( get_post_meta( get_the_ID(), 'display_post_impression', true ) != '' ) { 
						echo get_post_meta( get_the_ID(), 'display_post_impression', true );
						echo esc_html_e( '&nbsp;views ', 'lipi' );
					} else { echo '0 views'; }
				echo ' / </span>&nbsp;';
			}
			
			if( $lipi_theme_options['kb-single-pg-like-dislike-status'] == true && is_single() ) {
					echo '<i class="far fa-thumbs-up"></i><span>';
						if( get_post_meta( get_the_ID(), 'rating_like_count_post', true ) == '' ) { 
							echo '0 like'; 
						} else { 
							echo get_post_meta( get_the_ID(), 'rating_like_count_post', true ); 
							echo esc_html_e( '&nbsp;likes ', 'lipi' );
						} 
					echo ' / </span>&nbsp;';
			}
			
			
			if( ( ($lipi_theme_options['kb-catpost-like-status'] == true && is_archive()) || ($lipi_theme_options['kb-catpost-like-status'] == true && !is_single()) ) && $lipi_theme_options['kb-single-pg-like-dislike-status'] == true ) {
				echo '<i class="far fa-thumbs-up"></i><span>';
					if( get_post_meta( get_the_ID(), 'rating_like_count_post', true ) == '' ) { 
						echo '0 like'; 
					} else { 
						echo get_post_meta( get_the_ID(), 'rating_like_count_post', true ); 
						echo esc_html_e( '&nbsp;likes ', 'lipi' );
					} 
				echo ' / </span>&nbsp;';
			}
			
		}
		
		if ( in_array( get_post_type(), array( 'post', 'attachment', 'lipi_kb' ) ) ) {
			if ( 'lipi_kb' === get_post_type() ) {
				if( ($lipi_theme_options['kb-single-pg-post-date'] == true && is_single()) || ($lipi_theme_options['kb-catpost-date'] == true && is_archive()) ) {
				lipi__entry_date();
				}
			} else {
				lipi__entry_date();
			}
		}
		
		// seprate post_type handle
		if ( 'lipi_kb' === get_post_type() && is_archive() ) { 
			
		} else if ( 'lipi_kb' === get_post_type() ) {
			if( $lipi_theme_options['kb-single-pg-post-author-qs-status'] == true ) {
				echo '<i class="fa fa-user"></i> <span class="author">'. get_the_author() .'</span><span class="meta-seprate">/</span>';
			}
			if (class_exists('WP_Print_O_Matic')) { echo do_shortcode('[print-me printstyle="pom-small-grey" tag="span" target=".blog.lipi_kb"]');  }
			
		} else {
			
			if( $special != 1 ) {
				if ( 'post' === get_post_type() ) {  
					lipi__entry_taxonomies();
				}
				if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {  
					echo '<span class="meta-seprate">/</span><span class="comments-link"><i class="far fa-comments"></i>';
					comments_popup_link( sprintf( __( 'Post a Comment', 'lipi' ), get_the_title() ) );
					echo '</span>';
				}
			}
	    }
		
		
		$format = get_post_format();
		if ( current_theme_supports( 'post-formats', $format ) ) {
			if( $format == 'gallery' ) $icon = 'far fa-images';
			else if( $format == 'image' ) $icon = 'fas fa-image';
			else if( $format == 'audio' ) $icon = 'fas fa-music';
			else if( $format == 'video' ) $icon = 'fas fa-video';
			else if( $format == 'link' ) $icon = 'fas fa-link';
			else if( $format == 'quote' ) $icon = 'fas fa-quote-left';
			else $icon = '';
			printf( '<span class="meta-seprate">/</span><i class="'.$icon.'"></i><span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
				sprintf( '', _x( 'Format', 'Used before post format.', 'lipi' ) ),
				esc_url( get_post_format_link( $format ) ),
				get_post_format_string( $format )
			);
		}
		
	   edit_post_link(
			sprintf(
				esc_html__( 'Edit', 'lipi' ),
				get_the_title()
			),
			'<span class="meta-seprate">&nbsp;</span><i class="fa fa-edit"></i><span class="edit-link">',
			'</span>'
		);
		
	}
	
}


/*-----------------------------------------------------------------------------------*/
/*	POST DATE
 *  Prints date information for current post.
/*-----------------------------------------------------------------------------------*/ 
if ( ! function_exists( 'lipi__entry_date' ) ) {

	function lipi__entry_date() {
		global $lipi_theme_options;
		$time_string = '<i class="far fa-calendar-alt"></i><span><time class="entry-date published updated" datetime="%1$s">%2$s</time></span><span class="meta-seprate">/</span>';
	
		if( ( 'post' === get_post_type() && $lipi_theme_options['blog_post_modified_date_status'] == true) || ('lipi_kb' === get_post_type() && $lipi_theme_options['kb_post_modified_date_status'] == true) ) {
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) { 
				$time_string = '<i class="far fa-calendar-alt"></i><span><time class="entry-date published" datetime="%1$s" title="Post Published Date">%2$s</time></span><span class="meta-seprate">/</span><i class="fas fa-calendar-plus"></i><time class="updated" datetime="%3$s" title="Post Modified Date">%4$s</time><span class="meta-seprate">/</span>';
			}
		}
	
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);
	
		printf( '<span class="posted-on">%3$s</span>',
			_x( 'Posted on', 'Used before publish date.', 'lipi' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}
	
}


/*-----------------------------------------------------------------------------------*/
/*	POST TEXONOMIES
 *  Prints category for current post.
/*-----------------------------------------------------------------------------------*/ 
if ( ! function_exists( 'lipi__entry_taxonomies' ) ) {

	function lipi__entry_taxonomies() {
		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'lipi' ) );
			printf( '<i class="far fa-folder-open"></i><span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'lipi' ),
				$categories_list
			);
	}

}



/*-----------------------------------------------------------------------------------*/
/*	POST TEXONOMIES
 *  @return bool True if there is more than one category, false otherwise.
/*-----------------------------------------------------------------------------------*/ 
function lipi__categorized_blog() {
	
	if ( false === ( $all_the_cool_cats = get_transient( 'bind_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bind_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so lipi_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so lipi_categorized_blog should return false.
		return false;
	}
}

?>