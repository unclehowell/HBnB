<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$theme = lipi__admin_get_theme_info();
$theme_name = $theme['name'];
?>

<div class="wrap about-wrap">
	<?php lipi__admin_menu_tabs(); ?>
    <div class="about-description">
        <?php printf(esc_html__('Thank you for choosing %s!', 'lipi-framework'), $theme_name); ?>
    </div>
    <br>
</div>