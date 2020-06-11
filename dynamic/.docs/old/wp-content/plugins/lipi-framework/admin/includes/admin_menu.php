<?php
//Register Startup page in admin menu
function lipi__admin_startup_screen() {
	$theme = lipi__admin_get_theme_info();
	$theme_name = $theme['name'];
		/*Item Registration*/
		add_menu_page( $theme_name, $theme_name, 'manage_options', 'lipi-admin' , 'lipi__admin_page', plugin_dir_url( __FILE__ ) . 'favicon.png',
			'2' );
		/*Support page*/
		add_submenu_page('lipi-admin', esc_html__('Support', 'lipi-framework'), esc_html__('Support', 'lipi-framework'), 'manage_options', 'lipi-admin-support', 'lipi__admin_support_page' );
		
		/*Plugins*/
		add_submenu_page( 'lipi-admin', esc_html__('Plugins', 'lipi-framework'), esc_html__('Plugins', 'lipi-framework'), 'manage_options', 'lipi-admin-plugins', 'lipi__admin_plugins_page' );

		/*Demo Import*/
		add_submenu_page( 'lipi-admin', esc_html__('Demo import', 'lipi-framework'), esc_html__('Demo import', 'lipi-framework'), 'manage_options', 'lipi-demo-import', 'lipi__admin_demo_install_page' );

		/*System status*/
		add_submenu_page( 'lipi-admin', esc_html__('System status', 'lipi-framework'), esc_html__('System status', 'lipi-framework'), 'manage_options', 'lipi-admin-system-status', 'lipi__admin_status_page' );

		/*KnowledgeBase Import*/
		add_submenu_page( 'lipi-admin', esc_html__('KnowledgeBase import/convert post type', 'lipi-framework'), esc_html__('KnowledgeBase import/convert post type', 'lipi-framework'), 'manage_options', 'lipi-admin-kb-import', 'lipi__admin_kb_import_page' );


}
add_action( 'admin_menu', 'lipi__admin_startup_screen' );


function lipi__admin_page_templates($path) {
	$path = LIPI_PLUGIN_DIR.'/admin/screens/' . $path . '.php';
	if($path)  require_once $path;
}

//Startup screen menu page welcome
function lipi__admin_page() {
	lipi__admin_page_templates('startup');
}

/*Support Screen*/
function lipi__admin_support_page() {
	lipi__admin_page_templates('support');
}

/*Install Plugins*/
function lipi__admin_plugins_page() {
	lipi__admin_page_templates('plugins');
}

/*Install Demo*/
function lipi__admin_demo_install_page() {
	lipi__admin_page_templates('install_demo');
}

/*System status*/
function lipi__admin_status_page() {
	lipi__admin_page_templates('system_status');
}

/*KnowledgeBase Import*/
function lipi__admin_kb_import_page() {
	lipi__admin_page_templates('kb_importchangeposttype');
}