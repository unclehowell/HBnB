<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
} 
?>
<style>.tgmpa.wrap h1 { display:none;} </style>
<div class="wrap about-wrap">
	<?php lipi__admin_menu_tabs('plugins'); ?>
	<?php
	$tgm_page_plugins = new TGM_Plugin_Activation();
	$tgm_page_plugins->install_plugins_page();
	?>
</div>
