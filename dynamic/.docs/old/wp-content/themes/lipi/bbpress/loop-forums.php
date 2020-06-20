<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_forums_loop' ); ?>

<ul id="forums-list-<?php bbp_forum_id(); ?>" class="bbp-forums">

    <li class="bbp-header">
		<ul class="forum-titles">
			<li class="bbp-topic-title"><?php _e( 'Directory', 'lipi' ); ?></li>
			<li class="bbp-topic-voice-count"><?php _e( 'Topics', 'lipi' ); ?></li>
			<li class="bbp-topic-reply-count"><?php _e( 'Posts', 'lipi' ); ?></li>  
			<li class="bbp-topic-freshness"><?php _e( 'Last Post', 'lipi' ); ?></li>
		</ul>
	</li>
    

<?php if (is_single()) { ?>
<li class="bbp-forum-header">
		<div class="bbp-forum-title"><?php the_title(); ?></div>
        <div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>
</li>
<?php } ?>    
    
	<li class="bbp-body">
		<?php while ( bbp_forums() ) : bbp_the_forum(); ?>
			<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>
		<?php endwhile; ?>
	</li><!-- .bbp-body -->

</ul><!-- .forums-directory -->

<?php do_action( 'bbp_template_after_forums_loop' ); ?>
