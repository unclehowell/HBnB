<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$theme = lipi__admin_get_theme_info();
$theme_name = $theme['name'];
?>

<div class="wrap about-wrap">
  <?php lipi__admin_menu_tabs('support'); ?>
  <div id="welcome-panel" class="welcome-panel">
  
      <h2 style="margin: 10px 0px;"><?php printf(__( '%s comes with <strong>6 months of free support</strong> for every license you purchase. Support can be <strong>extended</strong> through subscriptions via ThemeForest.', 'lipi-framework' ), $theme_name); ?></h2>
        
        <div class="welcome-panel-column-container" style="margin:0px 20px;">
            <div class="welcome-panel-column" style="margin-bottom: 25px;">
                <h3><?php _e( 'Ticket System', 'lipi-framework' ); ?></h3>
                <p  style="padding:0px 20px 0px 0px;"><?php _e( 'Use our private ticket sytem for issue that need to be take closer look.', 'lipi-framework' ); ?></p>
                <a href="http://support.wpsmartapps.com/" target="_blank"><?php esc_html_e( 'Submit a ticket', 'lipi-framework' ); ?></a> 
            </div>
            
            <div class="welcome-panel-column">
                <h3><?php _e( 'Documentation', 'lipi-framework' ); ?></h3>
                <p style="padding:0px 20px 0px 0px;"> <?php printf(__( 'Use our online documentaiton for learning the every aspect and features of %s.', 'lipi-framework' ), $theme_name); ?> </p>
                <a href="https://wpsmartapps.com/documentation/" target="_blank"> <?php esc_html_e( 'Learn more', 'lipi-framework' ); ?> </a>
            </div>
            
          <div class="welcome-panel-column">
                <h3><?php _e( 'Community Forum', 'lipi-framework' ); ?></h3>
                <p> <?php printf(__( 'Ask a question or help each other using our community forum.', 'lipi-framework' ), $theme_name); ?> </p>
                <a href="http://forums.wpsmartapps.com/" target="_blank"><?php esc_html_e( 'Visit Our Forum', 'lipi-framework' ); ?></a> 
          </div>
      </div>
      
  </div>
</div>
