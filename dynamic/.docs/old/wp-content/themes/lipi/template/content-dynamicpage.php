<?php
/**
 * The template part for displaying full width page
 */
 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog page'); ?>>
    
	<div class="clearfix">
		<?php the_content(); ?>
	</div>

</div>