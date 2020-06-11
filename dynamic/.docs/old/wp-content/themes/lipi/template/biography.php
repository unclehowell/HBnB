<?php
/**
 * The template part for displaying an Author biography
 */
?>

<div class="author-desc">
    <div class="heading">
        <h5><?php esc_html_e( 'Author:', 'lipi' ); ?> <?php echo get_the_author(); ?> </h5>
    </div>
    
    <div class="panel-body">
        <div class="author-image">
        <?php
		$author_bio_avatar_size = apply_filters( 'bind_author_bio_avatar_size', 42 );
		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
        </div>
        <p><?php the_author_meta( 'description' ); ?></p>
        <p> 
          <a class="more-link hvr-icon-wobble-horizontal" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php printf( esc_html__( 'View all posts by %s', 'lipi' ), get_the_author() ); ?>&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i>
          </a>
        </p>
    </div>
    
</div>