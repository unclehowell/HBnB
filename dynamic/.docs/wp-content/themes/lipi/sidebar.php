<?php
/**
 * The sidebar containing the main widget area
 */

    if ( is_active_sidebar( 'blog-widget-1' ) ) : 
		echo '<aside class="col-md-3 col-sm-12 sidebar-widget-box">';
		dynamic_sidebar( 'blog-widget-1' ); 
		echo '</aside>';
    endif; 
	?>
