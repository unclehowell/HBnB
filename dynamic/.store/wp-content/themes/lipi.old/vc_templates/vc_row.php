<?php
$plx_bg_opacity = $plx_bg_opacity = $data_image_src = $plx_vc_fix = $_image = $parallax_class = $data_parallax = $display_bg_opacity = $v_image = $replace_background_image = $replace_bk_image_css = $row_css = $css = $el_class = $el_id = $row_id = $plx_bg_position = $new_full_width_class = $row_container_css = $display_bg_opacity_container = $row_bg_linear = '';
extract(shortcode_atts(array(
	'el_id' => '',
	'el_class' => '',
	'disable_element' => '',
	'css' => '',
	'row_content_display' => 'in_grid',
	'row_content_display_align' => is_rtl() ? 'right' : 'left',
	'row_type' => 'row',
	'stretch_row_type' => '',
	'background_color' => '',
	'background_replace_color_by_image' => '',
	'background_replace_img_opacity' => '',
	'background_opacity_color' => '',
	'background_linear_gradient_color_stretch' => '',
	'video' => '',
	'video_webm' => '',
	'video_mp4' => '',
	'video_ogv' => '',
	'video_image' => '',
	'background_image' => '',
	'plx_background_image_position' => 'center center',
	'plx_background_opacity' => '',
	'plx_background_opacity_color' => '',
	'normal_background_image_position' => 'center center',
	'equal_height' => '',
), $atts));

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row section vc_row-fluid '. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

// row id
if($el_id !== '') {
    $row_id = 'id="'.esc_attr($el_id).'"';
}

// Conduction Tags 
if($row_type == 'row'){  
	if( $stretch_row_type == 'yes' && ( $video != 'show_video' ) ) { 
	
		if( !empty($background_replace_color_by_image) ) { 
			$replace_background_image = wp_get_attachment_image_src( $background_replace_color_by_image, 'full');
			$replace_bk_image_css = "background:url(".$replace_background_image[0].") ".$normal_background_image_position." / cover no-repeat;";
		} else {
			if( (isset($background_color) && $background_color != "") &&
				isset($background_linear_gradient_color_stretch) && $background_linear_gradient_color_stretch != '' ) {
				$row_bg_linear = "background:".$background_color.";
								  background: -moz-linear-gradient(-45deg, ".$background_color." 35%, ".$background_linear_gradient_color_stretch." 100%);
								  background: -webkit-linear-gradient(-45deg, ".$background_color." 35%,".$background_linear_gradient_color_stretch." 100%);
								  background: linear-gradient(135deg, ".$background_color." 35%,".$background_linear_gradient_color_stretch." 100%);";
			} else if( (isset($background_color) && $background_color != "") ) {
				$row_bg_linear = "background:".$background_color."; ";
			} else {
				$row_bg_linear = '';
			}
		}
		$row_css = "display:block; ".$row_bg_linear." ".$replace_bk_image_css." ";
		if( $background_replace_img_opacity == true ) $display_bg_opacity = 1;
		
	} else if( $stretch_row_type == 'no' && ( $video != 'show_video' ) ) { 
	   if( !empty($background_replace_color_by_image) ) { 
			$replace_background_image = wp_get_attachment_image_src( $background_replace_color_by_image, 'full');
			$replace_bk_image_css = "background:url(".$replace_background_image[0].") ".$normal_background_image_position." / cover no-repeat;";
	   }  else {
			if( (isset($background_color) && $background_color != "") &&
				isset($background_linear_gradient_color_stretch) && $background_linear_gradient_color_stretch != '' ) {
				$row_bg_linear = "background:".$background_color.";
								  background: -moz-linear-gradient(-45deg, ".$background_color." 35%, ".$background_linear_gradient_color_stretch." 100%);
								  background: -webkit-linear-gradient(-45deg, ".$background_color." 35%,".$background_linear_gradient_color_stretch." 100%);
								  background: linear-gradient(135deg, ".$background_color." 35%,".$background_linear_gradient_color_stretch." 100%);";
			} else if( (isset($background_color) && $background_color != "") ) {
				$row_bg_linear = "background:".$background_color.";";
			} else {
				$row_bg_linear = '';
			}
	   }
	   $row_container_css = "display: block; ".$row_bg_linear." ".$replace_bk_image_css." ";
	}
	
	$plx_vc_fix = 'margin-left:0px;margin-right:0px;';
} else if($row_type == 'parallax'){
	$parallax_class = 'parallax-window';
	$data_parallax = 'data-parallax="scroll"';
	if( !empty($background_image) ) { 
		$_image = wp_get_attachment_image_src( $background_image, 'full');
		$data_image_src = 'data-image-src="'.$_image[0].'"';
		if( $plx_background_opacity == true ) $plx_bg_opacity = 1;
	}
	$plx_vc_fix = 'margin-left:0px;margin-right:0px;';
	$plx_bg_position = 'data-position="'.$plx_background_image_position.'"';
}


if( $row_content_display == 'full_width') $new_full_width_class = 'container-fluid';//'vc_custom_full_width';


// Display Result
if( $disable_element != 'yes' ) {
	$output .='<div '.$row_id.' class=" pg-custom-vc '.$new_full_width_class.' '.$el_class.' '.$parallax_class.' '.$css_class.'" style="text-align:'.$row_content_display_align.'; '.$row_css.' '.$plx_vc_fix.'"  '.$data_image_src.' '.$data_parallax.' '.$plx_bg_position.' >';
	
	if( $display_bg_opacity == 1 ) { 
		$output .= '<div style="background:'.$background_opacity_color.';width: 100%;">'; 
	}
	
	if( $plx_bg_opacity == 1 ) { 
		$output .= '<div style="background:'.$plx_background_opacity_color.';width: 100%;">'; 
	}
			
		if( $row_content_display == 'in_grid' || $plx_bg_opacity == 1 ) $output .= '<div class="container" style="padding: 0px 0px; '.$row_container_css.' ">';	
		if( $equal_height == true ) $output .= '<div class="vc-row-eq-height">';  // row equal height	
			
			if( $video == 'show_video' ) { 
				$v_image = wp_get_attachment_url($video_image);
				$output .= '<div class="mobile-video-image" style="background-image: url('.$v_image.')"></div>
							<div class="video-wrap">
							<video class="video" poster="'.$v_image.'" controls="controls" preload="auto" loop autoplay muted>';
								if(!empty($video_webm)) { $output .= '<source type="video/webm" src="'.$video_webm.'">'; }
								if(!empty($video_mp4)) { $output .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
								if(!empty($video_ogv)) { $output .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
				$output .='</video>
						   </div>';
			}
			
			$output .= wpb_js_remove_wpautop($content);
		
		if( $equal_height == true ) $output .= '</div>'; // eof row equal height	
		if( $row_content_display == 'in_grid' || $plx_bg_opacity == 1 ) $output .= '</div>';	
			
	if( $display_bg_opacity == 1 ) $output .= '</div>';
	if( $plx_bg_opacity == 1 ) $output .= '</div>';
	$output .= "</div>".$this->endBlockComment('row');
	echo ''.$output;
}
?>