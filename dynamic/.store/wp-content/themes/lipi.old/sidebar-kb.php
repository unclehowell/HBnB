<?php
/**
 * The sidebar containing the main widget area
 */
?>
<aside class="col-md-3 col-sm-12 sidebar-widget-box">
    <?php 
    if ( is_active_sidebar( 'kb-widget-1' ) ) : 
		dynamic_sidebar( 'kb-widget-1' ); 
    endif; 
	?>
</aside>