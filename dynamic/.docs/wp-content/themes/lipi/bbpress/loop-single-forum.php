<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

	<li class="bbp-forum-info">

		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<div class=" <?php echo (is_single()?'bbp-forum-title-container':'bbp-forum-header'); ?>" style=" <?php if(is_single()) { echo 'width:100%;'; } ?>">

			<?php do_action( 'bbp_theme_before_forum_title' ); ?>

			<a class="<?php echo (is_single()?'bbp-forum-link':'bbp-forum-title'); ?>" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>

			<?php do_action( 'bbp_theme_after_forum_title' ); ?>

			<?php do_action( 'bbp_theme_before_forum_description' ); ?>

			<div class="<?php echo (is_single()?'bbp-forum-description':'bbp-forum-content'); ?>"><?php bbp_forum_content(); ?></div>

			<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		</div>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

			<?php if (is_single()) {
			
			bbp_list_forums();
			
			} else {
			
			lipi__bbp_list_forums( array (
			'before'            => '<ul class="bbp-forums-list">',
			'after'             => '</ul>',
			'link_before'       => '<li class="bbp-forum clearfix">',
			'link_after'        => '</li>',
			'count_before'      => '<div class="topic-reply-counts">',
			'count_after'       => '</div>',
			'count_sep'         => ' / ',
			'separator'         => '<div style="clear:both;"></div>',
			'forum_id'          => '',
			'show_topic_count'  => true,
			'show_reply_count'  => true,
			'show_freshness_link' => true,
			)); 
			
			} ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php bbp_forum_row_actions(); ?>

	</li>

	<?php if (is_single()) { ?>

	<li class="bbp-forum-topic-count"><?php bbp_forum_topic_count(); ?></li>

	<li class="bbp-forum-reply-count"><?php  bbp_forum_post_count(); ?></li>

	<li class="bbp-forum-freshness">

		<?php 
		$forum_topic_count = bbp_get_forum_topic_count();
		if ( $forum_topic_count == 0 ) {
			echo "<div class='last-posted-topic-title no-topics'>";
			echo _e('No Topics', 'lipi');
			echo '</div>';
		} else {
			
			echo '<div class="bbp-update-author bbp-landing-forum-wrap">';
				do_action( 'bbp_theme_before_topic_author' );
				echo '<span class="bbp-topic-freshness-author">'.bbp_get_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 50 ) ).'</span>';
				do_action( 'bbp_theme_after_topic_author' );
            echo '</div>';
			
			echo '<div class="landing-forum-wrap-content">';
				$topic_last_reply_title = bbp_get_topic_last_reply_title( bbp_get_forum_last_active_id( ) );
				$topic_last_reply_title_print = ht_mb_safe_substr($topic_last_reply_title, 53);
				echo "<div class='last-posted-topic-title'>";
				echo "<a href='". bbp_get_forum_last_topic_permalink() ."'>" . $topic_last_reply_title_print . "</a>";
				echo '</div>';
				
				echo "<div class='last-posted-topic-time'>";
				echo bbp_get_forum_last_active_time();
				echo "</div>";
			echo '</div>';
			
			
			
		}
		?>

	</li>

	<?php } ?>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
