<?php 
/**
 * The template for displaying all single page
 */
 
get_header();
$url = '';

$is_plugin_active = lipi__plugin_active('ReduxFramework');
	if($is_plugin_active == true){
	// background color
	$background_color = esc_attr($lipi_theme_options['404_background_color']);
	// background image
	if( !empty($lipi_theme_options['404_background_image']) && $lipi_theme_options['404_background_image']['url'] != "" ) {
		$url = esc_url($lipi_theme_options['404_background_image']['url']);
	}
	// background image position
	$background_image_position = esc_html($lipi_theme_options['404_background_image_display']);
	
	// margin	
$margin = esc_html($lipi_theme_options['404_msg_box_margin']['margin-top']).' '.esc_html($lipi_theme_options['404_msg_box_margin']['margin-right']).' '.esc_html($lipi_theme_options['404_msg_box_margin']['margin-bottom']).' '.esc_html($lipi_theme_options['404_msg_box_margin']['margin-left']);

	// h1 style
	$h1_font_size = esc_html($lipi_theme_options['404_title']['font-size']);
	if( $lipi_theme_options['404_title']['line-height'] == '170' ) {
		$pagenotfound_lineheight = esc_html($lipi_theme_options['404_title']['line-height']).'px';
	} else { 
		$pagenotfound_lineheight = esc_html($lipi_theme_options['404_title']['line-height']);
	}
	$h1_letter_spacing = esc_html($lipi_theme_options['404_title']['letter-spacing']);
	$h1_letter_color = esc_html($lipi_theme_options['404_title']['color']);
	$h1_font_weight = esc_html($lipi_theme_options['404_title']['font-weight']);
	
	// h1 text
	$h1_text = esc_attr($lipi_theme_options['404_title_text']);
	
	// subtitle text
	$p_class_color = esc_html( $lipi_theme_options['404_subtitle_text_color'] );
	$p_text = esc_attr($lipi_theme_options['404_subtitle_text']);
	
	// test position
	$p_text_position = esc_attr($lipi_theme_options['404_wrap_text_alignment']);
	$h3_text = esc_html__( 'Oops! That page can\'t be found' , 'lipi' );
	} else {
	$background_color =	'#F7F9F9';
	$background_image_position = 'center center';
	$h1_font_size = '180px';
	$pagenotfound_lineheight = '170px';
	$h1_letter_spacing = '0.3px';
	$h1_letter_color = '#002e5b';
	$h1_font_weight = '';
	$h1_text = esc_html__( '404' , 'lipi' ); 
	$p_class_color = '#002e5b';
	$p_text = esc_html__( 'The link BROKEN, or the page has been REMOVED. Try search our site.' , 'lipi' ); 
	$margin = '100px 1px 100px 1px';
	$p_text_position = 'center';
	$h3_text = esc_html__( 'Oops! That page can\'t be found' , 'lipi' ); 
	}
$container_call = lipi__website_global_full_width_design_control();
?>
<div class="content-page-404" style=" background: <?php echo esc_attr($background_color); ?> url('<?php echo esc_url($url); ?>') <?php echo esc_html($background_image_position); ?> / cover no-repeat; ">
    	<div class="<?php echo esc_html($container_call); ?> content-wrapper body-content">
        <div class="row">
        
                <div class="col-md-12 col-sm-12 404page_open" style="margin:<?php echo esc_html($margin); ?>; text-align:<?php echo esc_html($p_text_position); ?>;">
                    <h1 class="title" style="font-size:<?php echo esc_html($h1_font_size); ?>; line-height:<?php echo esc_html($pagenotfound_lineheight); ?>; letter-spacing:<?php echo esc_html($h1_letter_spacing); ?>; color:<?php echo esc_html($h1_letter_color); ?>; font-weight:<?php echo esc_html($h1_font_weight); ?>;"><?php echo esc_attr($h1_text); ?></h1>	
                    <?php if($h3_text!='') { ?><h3><?php echo esc_attr($h3_text); ?></h3><?php } ?>
                    <p class="text" style="color:<?php echo esc_html($p_class_color); ?>"><?php echo esc_attr($p_text); ?></p>
                    <div class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
					<?php echo lipi__custom_search_form(); ?>
                    </div>
                </div>
    
        </div>
    </div>
</div>    
<?php get_footer(); ?>