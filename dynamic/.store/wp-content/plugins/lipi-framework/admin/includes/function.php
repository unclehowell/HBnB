<?php 
/******************
**** THEME INFO ***
******************/
function lipi__admin_get_theme_info() {
	$theme = wp_get_theme();
	$theme_name = $theme->get('Name');
	$theme_v = $theme->get('Version');
	$theme_info = array(
		'name' => $theme_name,
		'slug' => sanitize_file_name(strtolower($theme_name)),
		'v'    => $theme_v,
	);
	return $theme_info;
}

/*******************
**** THEME GLOGAL MENU ***
*******************/
function lipi__admin_menu_tabs($screen='welcome') {
	$theme = lipi__admin_get_theme_info();
	$theme_name = $theme['name'];
	if(empty($screen)) { $screen = 'lipi-admin'; }
	?>
	<div class="clearfix">
		<div><?php echo $theme_name.'&nbsp;'.substr($theme['v'], 0, 3); ?></div>
        <h1><?php printf(esc_html__('Welcome to %s', 'lipi-framework'), $theme_name); ?></h1>
        <div class="about-text" style="margin-bottom:-10px;"><?php printf(esc_html__('%s is now installed and ready to use!', 'lipi-framework'), $theme_name); ?></div>
        <br>
	</div>
	<h2 class="nav-tab-wrapper">
            <a href="<?php echo ( 'welcome' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=lipi-admin' ) ); ?>" class="<?php echo ( 'welcome' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e( 'General', 'lipi-framework' ); ?></a>
            <a href="<?php echo ( 'support' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=lipi-admin-support' ) ); ?>" class="<?php echo ( 'support' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e( 'Support', 'lipi-framework' ); ?></a>
            <a href="<?php echo ( 'plugins' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=lipi-admin-plugins' ) ); ?>" class="<?php echo ( 'plugins' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e( 'Plugins', 'lipi-framework' ); ?></a>
            <a href="<?php echo ( 'demos' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=lipi-demo-import' ) ); ?>" class="<?php echo ( 'demos' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e( 'Demo Import', 'lipi-framework' ); ?></a>
            <a href="<?php echo ( 'system-status' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=lipi-admin-system-status' ) ); ?>" class="<?php echo ( 'system-status' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e( 'System Status', 'lipi-framework' ); ?></a>
            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=lipi&tab=1')); ?>" class="nav-tab"><?php esc_attr_e('Theme Options', 'lipi-framework'); ?></a>
            <a href="<?php echo ( 'kb-import' === $screen ) ? '#' : esc_url_raw( admin_url( 'admin.php?page=lipi-admin-kb-import' ) ); ?>" class="<?php echo ( 'kb-import' === $screen ) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e( 'Knowledgebase Import', 'lipi-framework' ); ?></a>
    </h2>
	<?php
}


/*******************
**** THEME SYSTEM REPORT ***
*******************/

function lipi__server_memory($size) {
	$l   = substr( $size, -1 );
	$ret = substr( $size, 0, -1 );
	switch ( strtoupper( $l ) ) {
		case 'P':
			$ret *= 1024;
		case 'T':
			$ret *= 1024;
		case 'G':
			$ret *= 1024;
		case 'M':
			$ret *= 1024;
		case 'K':
			$ret *= 1024;
	}
	return $ret;
}
?>