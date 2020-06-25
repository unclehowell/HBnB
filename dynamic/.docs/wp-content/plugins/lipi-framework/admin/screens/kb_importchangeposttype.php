<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
$theme = lipi__admin_get_theme_info();
$theme_name = $theme['name'];
?>

<div class="wrap about-wrap">
	<?php lipi__admin_menu_tabs('kb-import'); ?>
    <div id="welcome-panel" class="welcome-panel">
      
      	  <br>
          <h3 style="margin: 10px 10px 10px 20px;"><span style="border-bottom: 5px solid #f5350a;padding: 10px;background: aliceblue;line-height: 50px;"><?php printf(__( 'Import ANY (WordPress/NON-WordPress) knowlegebase records to %s WordPress theme.', 'lipi-framework' ), $theme_name); ?></span></h3>
             <div style="margin: 10px 10px 10px 20px; color:red;"><?php _e( 'Highly recommended.', 'lipi-framework' ); ?></div>
            <div class="welcome-panel-column-container" style="margin:0px 0px 0px 25px;">
                <div class="welcome-panel-column" style="margin-bottom: 25px;">
                    <h3><?php _e( '1. Download Plugin', 'lipi-framework' ); ?></h3>
                    <p  style="padding:0px 20px 0px 0px;"><?php _e( 'Download Plugin "Import any XML or CSV File to WordPress"', 'lipi-framework' ); ?></p>
                    <a href="https://wordpress.org/plugins/wp-all-import/" target="_blank" style="font-weight:bold;"><?php esc_html_e( 'DOWNLOAD', 'lipi-framework' ); ?></a> 
                </div>
                
                <div class="welcome-panel-column">
                    <h3><?php _e( '2. Plugin Manual', 'lipi-framework' ); ?></h3>
                    <p style="padding:0px 20px 0px 0px;"> <?php printf(__( 'Plugin "Import any XML or CSV File to WordPress" - Complete Video Manual', 'lipi-framework' ), $theme_name); ?> </p>
                    <a href="http://www.wpallimport.com/documentation/getting-started/wp-all-import-in-depth-overview/" target="_blank" style="font-weight:bold;"> <?php esc_html_e( 'Watch Video Manual', 'lipi-framework' ); ?> </a>
                </div>
          </div>
          
          
          <!---->
          <div style="clear:both;"></div>
          <br>
          
            <h3 style="margin: 10px 10px 10px 20px;"><span style="border-bottom: 5px solid #f5d70a;padding: 10px;background: aliceblue;line-height: 50px;"><?php printf(__( 'Have a KnowledgeBase records in your current theme installation, use bulk "post type" convert method.', 'lipi-framework' ), $theme_name); ?></span></h3>
            <div style="margin: 10px 10px 10px 20px; color:red;"><?php _e( 'This process could really screw up your database. Please make a backup before proceeding.', 'lipi-framework' ); ?></div>
            <div class="welcome-panel-column-container" style="margin:0px 0px 0px 25px;">
                <div class="welcome-panel-column" style="margin-bottom: 25px;">
                    <h3><?php _e( '1. Download Plugin', 'lipi-framework' ); ?></h3>
                    <p  style="padding:0px 20px 0px 0px;"><?php _e( 'Download Plugin "Convert Post Types"', 'lipi-framework' ); ?></p>
                    <a href="https://wordpress.org/plugins/convert-post-types/" target="_blank" style="font-weight:bold;"><?php esc_html_e( 'DOWNLOAD', 'lipi-framework' ); ?></a> 
                </div>
          </div>
		  
          <div style="clear:both;"></div>
          <br><br>
          
  </div>
</div>