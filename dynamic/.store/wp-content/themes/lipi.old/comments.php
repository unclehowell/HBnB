<?php
/**
 * The template for displaying comments
 */
 
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h5 id="reply-tag-title" class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'lipi' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'lipi'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h5>

		<?php the_comments_navigation(); ?>

            <ul class="comments">
				<?php wp_list_comments( 'type=all&callback=lipi__comment&avatar_size=56&style=ul&max_depth=3&short_ping=true' ); ?>
            </ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'lipi' ); ?></p>
	<?php endif; ?>

	<?php
		$aria_req = '';
		$fields = array(
					'author' => '<div class="col-sm-4 col-md-4 col-lg-4 padding-left-0 mobile-padding">
									<input id="author" name="author" class="comment-input" type="text"  placeholder="'.esc_attr__( 'Your Name',  'lipi' ).'"
											 value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /> 
								</div>',
											 
					'email' => '<div class="col-sm-4 col-md-4 col-lg-4 padding-left-0 mobile-padding">
									<input id="email" name="email" class="form-control" type="text"  placeholder="'.esc_attr__( 'Email Address',  'lipi' ).'"
									 value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
								 </div>',
					 
					 'url'    => '<div class="col-sm-4 col-md-4 col-lg-4 padding-left-0 padding-right-0">
					 				<input id="url" name="url" class="form-control" type="text"  placeholder="'.esc_attr__( 'Your Website',  'lipi' ).'"
									 value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"  />
								 </div>',
					 
				  );
				  
		comment_form( array(
			'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h5>',
			'comment_notes_before' => '<br>',
			'comment_field' => '<textarea id="comment" name="comment" class="comment-textarea" placeholder="'.  esc_attr__( 'Comment',  'lipi' ) .'" style="height: 100px;"></textarea>',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			'logged_in_as' => '<br>',
			'title_reply'=>  esc_html__( 'Post a Comment',  'lipi' ) ,		   
		) );
		
	?>
</div><!-- .comments-area -->