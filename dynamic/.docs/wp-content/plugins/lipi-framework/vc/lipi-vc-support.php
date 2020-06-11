<?php 
/*************************************
***    ADD VC SC 1 :: COUNTER     ***
**************************************/
if(!function_exists("lipi__theme_counter")){
	function lipi__theme_counter( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"position"         => "",
			"digit"            => "",
			"digit_font_size"  => "",
			"font_weight"      => "",
			"font_color"       => "",
			"text"             => "",
			"text_transform"   => "",
			"text_color"       => "",
			"text_font_weight" => "",
			"text_font_size"   => "",
			"separator"        => "",
			"separator_color"  => "",
			"digit_tag"        => "h5",
		), $atts ) );
		
		// Countdown Font Size
		if( isset($digit_font_size) && $digit_font_size != '' ) { $font_size_digit = 'font-size:'.$digit_font_size.'px;';  
		} else { $font_size_digit = ''; }
		
		// Countdown Color
		if( isset($font_color) && $font_color != '' ) { $font_color = 'color:'.$font_color.';';  
		} else { $font_color = ''; }
		
		// Countdown Font Weight
		if( isset($font_weight) && $font_weight != '' ) { $font_weight = 'font-weight:'.$font_weight.';'; 
		} else { $font_weight = ''; }
		
		// Text Color
		if( isset($text_color) && $text_color != '' ) { $text_color =  $text_color = 'color:'.$text_color.';';  
		} else { $text_color = ''; }
		
		// Text Size
		if( isset($text_font_size) && $text_font_size != '' ) { $font_size_text = 'font-size:'.$text_font_size.'px;';  
		} else { $font_size_text = ''; }
		
		// Text Font Weight
		if( isset($text_font_weight) && $text_font_weight != '' ) { $text_font_weight = 'font-weight:'.$text_font_weight.';'; 
		} else { $text_font_weight = ''; }
		
		// Separator Color
		if( isset($separator_color) && $separator_color != '' ) { $separator_color = $separator_color;
		} else { $separator_color = ''; }
		
		// Text Transform 
		if( isset($text_transform) && $text_transform != '' ) { $text_transform = 'text-transform:'.$text_transform.';'; 
		} else { $text_transform = ''; }
		
		// Separator yes/no
		if( $separator == 'yes' ) { 
			$vcfunact__separator_color = '';
			if( isset($separator_color) && $separator_color != "" ) {
				$vcfunact__separator_color = 'background:'.$separator_color.'';
			}
			$separator_html = '<span class="separator small '.$position.'" style=" '.$vcfunact__separator_color.' "></span>';
			$count_down_value_height = '';
		} else { 
			$separator_html = '';
			$count_down_value_height = ''; //height: 85px;'; 
		}
		
		$return  = '<div class="counter-main-div counter-box" style="text-align:'.$position.'">
						<div class="timer funact" data-speed="10000" data-to="'.$digit.'" style="'.$font_weight.' '.$font_color.' '.$count_down_value_height.' '.$font_size_digit.'" ></div>
						'.$separator_html.'
						<'.$digit_tag.' style="'.$text_font_weight.' '.$text_transform.' '.$text_color.' '.$font_size_text.'" >'.$text.'</'.$digit_tag.'>
					</div>';
		
		return $return;
	}
}
add_shortcode('lipi__theme_counter', 'lipi__theme_counter');



/*************************************
***    ADD VC SC 2 :: TEAM     ***
**************************************/
if(!function_exists("lipi__theme_team")){
	function lipi__theme_team( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"team_image"       => "",
			"team_name"        => "",
			"name_color"       => "",
			"team_position"    => "",
			"position_color"   => "",
			"show_separator"   => "",
			"separator_color"  => "",
			"icons_color"      => "",
			"title_tag"      => "h5",
			// social - 1
			"team_social_icon_1"         => "",
			"team_social_icon_1_link"    => "",
			"team_social_icon_1_target"  => "_parent",
			// social - 2
			"team_social_icon_2"         => "",
			"team_social_icon_2_link"    => "",
			"team_social_icon_2_target"  => "_parent",
			// social - 3
			"team_social_icon_3"         => "",
			"team_social_icon_3_link"    => "",
			"team_social_icon_3_target"  => "_parent",
			// social - 4
			"team_social_icon_4"         => "",
			"team_social_icon_4_link"    => "",
			"team_social_icon_4_target"  => "_parent",
		), $atts ) );
		
		
		if (is_numeric($team_image) && isset($team_image)) {
			$image_src = wp_get_attachment_url($team_image);
		} else {
			$image_src = trailingslashit( get_template_directory_uri() ). 'img/team-blank.png';
		}
		if( $show_separator == 'yes' || $show_separator == '' ) {
			$seprator = '<div class="separator" style="background-color:'.$separator_color.'"></div>';
		} else {
			$seprator = '<div class="no-separator"></div>';
		}
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		$vcteamstyle_icons_color = '';
		if( isset($icons_color) && $icons_color != "" ){
			$vcteamstyle_icons_color = 'color:'.$icons_color.';';
		}
		echo '<style>.vc_team_'.$time_start[1].' { '.$vcteamstyle_icons_color.' }</style>';
		
		$vcteam__name_color = $vcteam__position_color = '';
		if( isset($name_color) && $name_color != '' ) {
			$vcteam__name_color = 'color:'.$name_color.'!important;';	
		}
		if( isset($position_color) && $position_color != '' ) {
			$vcteam__position_color = 'color:'.$position_color.';';	
		}
$return = '<div class="team_members">
		  <div class="team_members_inner">
			<div class="image_wrap"><img src="'.$image_src.'" alt=""></div>
			<div class="team_text_wrap" style="padding-top:0px;">
				<div class="team_title_holder">
				<'.$title_tag.' style=" '.$vcteam__name_color.' ">'.$team_name.'</'.$title_tag.'>
				<span style=" '.$vcteam__position_color.' ">'.$team_position.'</span> '.$seprator.'
					<div class="team_social_holder">
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_1_link.'" target="'.$team_social_icon_1_target.'"><i class="'.$team_social_icon_1.' simple_social vc_team_'.$time_start[1].' "></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_2_link.'" target="'.$team_social_icon_2_target.'"><i class="'.$team_social_icon_2.' simple_social vc_team_'.$time_start[1].'"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_3_link.'" target="'.$team_social_icon_3_target.'"><i class="'.$team_social_icon_3.' simple_social vc_team_'.$time_start[1].'"></i></a></span>
					<span class="team_social_holder normal_social"><a href="'.$team_social_icon_4_link.'" target="'.$team_social_icon_4_target.'"><i class="'.$team_social_icon_4.' simple_social vc_team_'.$time_start[1].'"></i></a></span>
					</div>
				</div>
			</div>
		  </div>
		</div>';
		
		return $return;
	}
}
add_shortcode('lipi__theme_team', 'lipi__theme_team');



/*****************************************
***    ADD VC SC 3 :: LINK URL   ***
******************************************/
if(!function_exists("lipi__sc_link_url")){
	function lipi__sc_link_url( $atts, $content = null ) {
		$link_html = '';
		$a_open  = '';
		$a_close = '';
		extract( shortcode_atts( array( 
			"link"        => "",
			"link_align"  => "",
			"link_color"  => "",
		), $atts ) );
		
		$return = '';
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		$linkurl__link_color = '';
		if( isset($link_color) && $link_color != "" ) {
			$linkurl__link_color = 'color:'.$link_color.'!important;';
			$return .= ''; '<style>.vc_link_color_'.$time_start[1].' { '.$linkurl__link_color.' }</style>';
		}
		
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( !empty($link['title']) ) {
			if( empty($link['target']) ) $link_target = '_parent';
			else $link_target = $link['target'];
			$return .= '<div style="text-align:'.$link_align.'"><a href="'.$link['url'].'" target="'.$link_target.'" class="more-link hvr-icon-wobble-horizontal vc_link_color_'.$time_start[1].'">'.$link['title'].'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a></div>';
		} else {
			$return .= '';
		}
		
		return $return;
	}
}
add_shortcode('lipi__sc_link_url', 'lipi__sc_link_url');


/*************************************
***  ADD VC SC 4 :: TEXT WITH ICON ***
**************************************/
if(!function_exists("lipi__sc_icon_with_text")){
	function lipi__sc_icon_with_text( $atts, $content = null ) {
		$link_html = $display_text_position = $icon_text__box_background_color = $icon_text__box_border_radius = $icon_text__display_icon_top_margin = $icon_text__new_custom_icon_size = $icon_text__icon_color = $icon_text__title_font_weight = $icon_text__title_color = $icon_text__title_font_size = $icon_text__title_font_transform = $icon_text__custom_title_margin = $icon_text__text_color = $icon_text__custom_top_margin_maintext_and_text = $a_box_link_open = $a_box_link_close = $box_shadow_css = '';
		$a_open  = '';
		$a_close = '';
		extract( shortcode_atts( array( 
			"icon_name"  => "",
			"title"      => "",
			"text"      => "",
			"use_custom_icon_size" => "",
			"custom_icon_size" => "",
			"text_color" => "",
			"title_font_weight" => "",
			"custom_title_padding" => "0 0 0 65px",
			"title_color" => "",
			"icon_color" => "",
			"display_icon_position" => "",
			"display_icon_top_margin" => "",
			"activate_link" => "",
			"link_icon" => "",
			"link"     => "",
			"link_color"  => "",
			"custom_top_margin_maintext_and_text"  => "",
			"custom_icon_margin"  => "",
			"title_font_size"  => "",
			"title_font_transform"  => "",
			"vc_link_font_transform" => "",
			"vc_link_font_size" => "",
			"vc_link_font_weight" => "",
			"icon_with_text_box_padding" => "0px 0px 30px 0px",
			"custom_title_margin" => "",
			"title_tag" => "h5",
			"top_text_position" => "",
			"box_background_color" => "",
			"box_border_radius" => "",
			"box_border_color" => "",
			"box_css_animation" => "",
			"box_shadow" => "no",
			"link_margin_top" => "0px",
		), $atts ) );
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		if( $box_border_color != "" ) $box_border_color = 'border:1px solid '.$box_border_color.';';
		else $box_border_color = '';
		
		if( $use_custom_icon_size == "yes" ) {
			$new_custom_icon_size = $custom_icon_size.'px';
		} else {
			$new_custom_icon_size = '';
		}
		
		if( $display_icon_position == 'left' || $display_icon_position == 'left_from_title' ) { 
			$icon_position_class = '';
		} else if( $display_icon_position == 'top' ) { 
			$icon_position_class = 'top';
			$display_icon_top_margin = $display_icon_top_margin;
		} else {
			$display_icon_top_margin = '';
			$icon_position_class = '';
		}
		
		if( $box_shadow == 'yes' ) { 
			$box_shadow_css = '-webkit-box-shadow: 2px 2px 24px -11px rgba(0,0,0,0.75);-moz-box-shadow: 2px 2px 24px -11px rgba(0,0,0,0.75);box-shadow: 2px 2px 24px -11px rgba(0,0,0,0.75);';
		}
		
		// activate link
		if( $activate_link == 'yes' ) {
			$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
			if( empty($link['target']) ) $link_target = '_parent';
			else $link_target = $link['target'];
			
			 if( $link_icon == 'no' || $link_icon == 'both' ) {  
				if( isset($link['title']) && $link['title'] != '' ) {
					
					$vctexticon__vc_link_font_weight = $vctexticon__link_color = $vctexticon__vc_link_font_transform = $vctexticon__vc_link_font_size = '';
					if( isset($vc_link_font_weight) && $vc_link_font_weight != "" ) {
						$vctexticon__vc_link_font_weight = 'font-weight:'.$vc_link_font_weight.';';
					}
					if( isset($link_color) && $link_color != "" ) {
						$vctexticon__link_color = 'color:'.$link_color.'!important;';
					}
					if( isset($vc_link_font_transform) && $vc_link_font_transform != "" ) {
						$vctexticon__vc_link_font_transform = 'text-transform:'.$vc_link_font_transform.';';
					}
					if( isset($vc_link_font_size) && $vc_link_font_size != "" ) {
						$vctexticon__vc_link_font_size = 'font-size:'.$vc_link_font_size.';';
					}
					
					$link_html = '<p style="padding-top:10px;font-size:13px;text-transform: capitalize;letter-spacing: 0.6px;margin-top:'.$link_margin_top.';"> <a href="'.$link['url'].'" class="more-link hvr-icon-wobble-horizontal" style=" '.$vctexticon__vc_link_font_weight.' '.$vctexticon__link_color.' '.$vctexticon__vc_link_font_transform.' '.$vctexticon__vc_link_font_size.' " target="'.$link_target.'">'.$link['title'].'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a> </p>';
				} else {  
					$link_html = '';
				}
			} 
			
			if( $link_icon == 'yes' || $link_icon == 'both' ) {
				$a_open  = '<a href="'.$link['url'].'" target="'.$link_target.'" class="hvr-wobble-to-bottom-right">';
				$a_close = '</a>';
			}
			
			if( $link_icon == 'box' ) {
				$a_box_link_open  = '<a href="'.$link['url'].'" target="'.$link_target.'">';
				$a_box_link_close = '</a>';
			}
			
		} // end of link
		
		
		if( isset($box_background_color) && $box_background_color != "" ) {
			$icon_text__box_background_color = 'background:'.$box_background_color.';';
		}
		if( isset($box_border_radius) && $box_border_radius != "" ) {
			$icon_text__box_border_radius = 'border-radius:'.$box_border_radius.';';
		}
		// icons
		if( isset($display_icon_top_margin) && $display_icon_top_margin != "" ) {
			$icon_text__display_icon_top_margin = 'margin-bottom:'.$display_icon_top_margin.'px;';
		}
		if( isset($new_custom_icon_size) && $new_custom_icon_size != "" ) {
			$icon_text__new_custom_icon_size = 'font-size:'.$new_custom_icon_size.';';
		}
		if( isset($icon_color) && $icon_color != "" ) {
			$icon_text__icon_color = 'color:'.$icon_color.';';
		}
		// title
		if( isset($title_font_weight) && $title_font_weight != "" ) {
			$icon_text__title_font_weight = 'font-weight:'.$title_font_weight.'!important;';
		}
		if( isset($title_color) && $title_color != "" ) {
			$icon_text__title_color = 'color:'.$title_color.'!important;';
		}
		if( isset($title_font_size) && $title_font_size != "" ) {
			$icon_text__title_font_size = 'font-size:'.$title_font_size.'px!important;';
		}
		if( isset($title_font_transform) && $title_font_transform != "" ) {
			$icon_text__title_font_transform = 'text-transform:'.$title_font_transform.'!important;';
		}
		if( isset($custom_title_margin) && $custom_title_margin != "" ) {
			$icon_text__custom_title_margin = 'margin:'.$custom_title_margin.'!important;';
		}
		// text 
		if( isset($text_color) && $text_color != "" ) {
			$icon_text__text_color = 'color:'.$text_color.';';
		}
		if( isset($custom_top_margin_maintext_and_text) && $custom_top_margin_maintext_and_text != "" ) {
			$icon_text__custom_top_margin_maintext_and_text = 'margin-top:'.$custom_top_margin_maintext_and_text.'px;';
		}
		
		if( $display_icon_position == 'left_from_title' ) {
			$return = '';
			if( is_rtl() ) { $return .= '<style>.icon_with_text_title i.icon_text_holder_rtl_'.$time_start[1].' { padding: 0 0px 0 20px!important; }</style>'; } 
			$return .= $a_box_link_open;
			$return .= '<div class="icon_with_text_title '.$box_css_animation.'" style="padding:'.$icon_with_text_box_padding.'; '.$icon_text__box_background_color.' '.$icon_text__box_border_radius.' '.$box_border_color.' '.$box_shadow_css.' ">
			  
			  <div class="icon_holder '.$icon_position_class.' " style=" '.$icon_text__display_icon_top_margin.' width: 100%;display: -webkit-box;">
				'.$a_open.'<span class=""><i class="'.$icon_name.' icon_text_holder_rtl_'.$time_start[1].' " style=" '.$icon_text__new_custom_icon_size.' '.$icon_text__icon_color.' padding: 0 20px 0 0;"></i></span>'.$a_close.'
				<'.$title_tag.' style=" '.$icon_text__title_font_weight.' '.$icon_text__title_color.' '.$icon_text__title_font_size.' '.$icon_text__title_font_transform.' '.$icon_text__custom_title_margin.' ">'.$title.'</'.$title_tag.'>
			  </div>
			  
			  <div class="icon_text_holder '.$icon_position_class.'" style="padding:0px;padding-top:10px;clear: both;">
				<div class="icon_text_inner" style=" '.$icon_text__custom_top_margin_maintext_and_text.' ">
				  <p class="desc" style=" '.$icon_text__text_color.' ">'.$text.'</p>
				  '.$link_html.'
				</div>
			  </div>
			  
			</div>';
			$return .= $a_box_link_close;
				
		} else {
			$return = '';
			if( $display_icon_position == 'left' ) { 
				$icon_text__custom_icon_margin = '';
				if( isset($custom_icon_margin) && $custom_icon_margin != "" ) {
					$icon_text__custom_icon_margin = 'padding-left:'.$custom_icon_margin.'px;';
				}
				$custom_icon_margin_left = $icon_text__custom_icon_margin;
				$replace_padding_text = $custom_title_padding;
				if( is_rtl() ) { $return .= '<style>.icon_text_holder.icon_text_holder_rtl_'.$time_start[1].' { padding: 0 65px 0 0px!important; }</style>'; }
			} else { 
				$custom_icon_margin_left = $replace_padding_text = '';
			}
			
			if( $display_icon_position == 'top' ) { $display_text_position = 'text-align:'.$top_text_position.';';  }  // change
			$icontext_replace_padding_text = '';
			if( isset($replace_padding_text) && $replace_padding_text != '' ) {
				$icontext_replace_padding_text = 'padding:'.$replace_padding_text.';';
			}
			
			$return .= $a_box_link_open;
			$return .= '<div class="icon_with_text_title '.$box_css_animation.'" style="padding:'.$icon_with_text_box_padding.'; '.$icon_text__box_background_color.' '.$icon_text__box_border_radius.' '.$box_border_color.' '.$box_shadow_css.'">
			  
			  <div class="icon_holder '.$icon_position_class.' " style=" '.$icon_text__display_icon_top_margin.' '.$display_text_position.'">
			  '.$a_open.'<span class=""><i class="'.$icon_name.'" style=" '.$icon_text__new_custom_icon_size.' '.$icon_text__icon_color.' "></i></span>'.$a_close.'
			  </div>
			  
			  <div class="icon_text_holder '.$icon_position_class.' icon_text_holder_rtl_'.$time_start[1].'  " style=" '.$icontext_replace_padding_text.' '.$display_text_position.' '.$custom_icon_margin_left.' ">
				<div class="icon_text_inner">
				  <'.$title_tag.' style=" '.$icon_text__title_font_weight.' '.$icon_text__title_color.' '.$icon_text__title_font_size.' '.$icon_text__title_font_transform.' ">'.$title.'</'.$title_tag.'>
				  <p class="desc" style=" '.$icon_text__text_color.' '.$icon_text__custom_top_margin_maintext_and_text.' ">'.$text.'</p>
				  '.$link_html.'
				</div>
			  </div>
			  
			</div>';
			$return .= $a_box_link_close;
		}

		return $return;
	}
}
add_shortcode('lipi__sc_icon_with_text', 'lipi__sc_icon_with_text');



/*****************************************
***    ADD VC SC 5 :: BUTTON   ***
******************************************/
if(!function_exists("lipi__sc_button_url")){
	function lipi__sc_button_url( $atts, $content = null ) {
		$text_readjust_padding = $text_readjust_size = $border_bottom = $text_shadow = '';
		extract( shortcode_atts( array( 
			"link"        => "",
			"bottom_margin"  => "",
			"button_css_animation"  => "",
			"link_align"  => "",
			"link_color"  => "",
			"button_color"  => "",
			"text_size"  => "",
			"text_padding"  => "",
			"remove_border_buttom" => "",
			"border_radius" => "",
			"remove_text_shadow" => "",
		), $atts ) );
		
		$return = '';
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		$vcbtm__button_color = $vcbtm__link_color = '';
		
		if( (isset($button_color) && $button_color != "") || (isset($link_color) && $link_color != "") ) {
			if( isset($button_color) && $button_color != "" ) {
				$vcbtm__button_color = 'background-color:'.$button_color.';';
			}
			if( isset($link_color) && $link_color != "" ) {
				$vcbtm__link_color = 'color:'.$link_color.';';
			}
			$return .= '<style>.vc_btm_'.$time_start[1].' { '.$vcbtm__button_color.' '.$vcbtm__link_color.' }</style>';
		}
		
		if( !empty($text_size) ) $text_readjust_size = 'font-size:'.$text_size.';';
		if( !empty($text_padding) ) $text_readjust_padding = 'padding:'.$text_padding.';';
		
		if( $remove_border_buttom == true ) $border_bottom = "border-bottom:0px;";
		if( $remove_text_shadow == true ) $text_shadow = "text-shadow:none;";
		if( !empty($border_radius) )  $border_radius = 'border-radius:'.$border_radius.';';
		
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( !empty($link['title']) ) {
			if( empty($link['target']) ) $btm_target = '_parent';
			else $btm_target = $link['target'];
			
			$btm__link_align = $btm__bottom_margin = '';
			if(isset($link_align) && $link_align!= '') {
				$btm__link_align = 'text-align:'.$link_align.';';
			}
			if(isset($bottom_margin) && $bottom_margin!= '') {
				$btm__bottom_margin = 'margin:'.$bottom_margin.';';
			}
			
			$return .= '<div  style=" '.$btm__link_align.' '.$btm__bottom_margin.' " class="'.$button_css_animation.'"><a href="'.$link['url'].'" target="'.$btm_target.'" style="padding: 10px 22px;text-transform:none; height:auto!important; '.$text_shadow.' '.$border_radius.' '.$text_readjust_size.' '.$text_readjust_padding.' '.$border_bottom.'" class="custom-botton vc_btm_'.$time_start[1].'" >'.$link['title'].'</a></div>';
		} else {
			$return .= '';
		}
		
		return $return;
	}
}
add_shortcode('lipi__sc_button_url', 'lipi__sc_button_url');



/*****************************************
***    ADD VC SC 6 :: MESSAGE BOX   ***
******************************************/
if(!function_exists("lipi__sc_message_box")){
	function lipi__sc_message_box( $atts, $content = null ) {
		$title_text_replace_color = $short_message_text_replace_color = $title_text_replace_weight  = $short_message_text_replace_weight = $title_text_replace_font_size = $short_message_replace_text_font_size = $button_text_replace_color = $button_bg_replace_color = $message_box_border_replace_color = $button_replace_margin_top = $margin_right =$message_box_background_replace_color = '';
		extract( shortcode_atts( array( 
			"message_box_border"    => "",
			"message_box_background_color"    => "",
			"message_box_border_color"    => "",
			"title_text"    => "",
			"title_text_color"  => "",
			"title_text_weight" => "",
			"title_text_font_size" => "",
			"short_message_text"  => "",
			"short_message_text_color"  => "",
			"short_message_text_weight"  => "",
			"short_message_text_font_size"  => "",
			"link" => "",
			"button_text_color" => "",
			"button_bg_color" => "",
			"button_margin_top" => "",
			"title_tag" => "h3",
		), $atts ) );
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		if( !empty($message_box_border) && $message_box_border == 'yes' ) {
			$border_status = '';
			$border_padding = '';
			if( !empty($message_box_border_color) ) $message_box_border_replace_color = 'border:1px solid'.$message_box_border_color.'!important;';
		} else {
			$border_status = 'border:none;';
			$border_padding = 'padding:0px;';
		}
		
		if( !empty($message_box_background_color) ) $message_box_background_replace_color = 'background:'.$message_box_background_color.';';
		if( !empty($title_text_font_size) ) $title_text_replace_font_size = 'font-size:'.$title_text_font_size.'!important;';
		if( !empty($title_text_weight) ) $title_text_replace_weight = 'font-weight:'.$title_text_weight.'!important;';
		if( !empty($title_text_color) ) $title_text_replace_color = 'color:'.$title_text_color.'!important;';
		if( !empty($short_message_text_color) ) $short_message_text_replace_color = 'color:'.$short_message_text_color.'!important;';
		if( !empty($short_message_text_weight) ) $short_message_text_replace_weight = 'font-weight:'.$short_message_text_weight.'!important;';
		if( !empty($short_message_text_font_size) ) $short_message_replace_text_font_size = 'font-size:'.$short_message_text_font_size.'!important;';
		$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
		if( !empty($button_text_color) ) $button_text_replace_color = 'color:'.$button_text_color.'!important;';
		if( !empty($button_bg_color) ) $button_bg_replace_color = 'background-color:'.$button_bg_color.';';
		if( !empty($button_margin_top) ) $button_replace_margin_top = 'margin-top:'.$button_margin_top.'!important;';
		
		$return =  '<div class="promo" style="'.$border_status.' '.$message_box_border_replace_color.' '.$border_padding.' '.$message_box_background_replace_color.'">';
		
		if( !empty($title_text) ) {	
		if( empty($link['title']) ) $margin_right = 'margin-right:0px!important;';
		$return .= '<'.$title_tag.' style="'.$title_text_replace_color.' '.$title_text_replace_weight.' '.$title_text_replace_font_size.' '.$margin_right.' ">'.$title_text.'</'.$title_tag.'>';
		}
		
		if( !empty($short_message_text) ) {			
		$return .= '<p style="'.$short_message_text_replace_color.' '.$short_message_text_replace_weight.' '.$short_message_replace_text_font_size.'">'.$short_message_text.'</p>';
		} 
		
		if( !empty($link['title']) ) {
			
		if( empty($link['target']) ) $link_target = '_parent';
		else $link_target = $link['target'];
		
		echo '<style>.vc_btm_color_'.$time_start[1].' { '.$button_bg_replace_color.' }</style>';
					
		$return .= '<a href="'.$link['url'].'" target="'.$link_target.'" class="custom-botton vc_btm_color_'.$time_start[1].'" style="'.$button_text_replace_color.' '.$button_replace_margin_top.'">'.$link['title'].'</a>';
		}
		
		$return .= '</div>';
		
		return $return;
	}
}
add_shortcode('lipi__sc_message_box', 'lipi__sc_message_box');



/*****************************************
***    ADD VC SC 7 :: PORTFOLIO   ***
******************************************/
if(!function_exists("lipi__theme_portfolio_list")){
	function lipi__theme_portfolio_list( $atts, $content = null ) {
		$filter_padding_align_li = $padding_zero_class = '';
		global $post;
		extract( shortcode_atts( array( 
			"portfolio_type"             => "Masonry",
			"padding_zero"               => "",
			"portfolio_shorting"         => "yes",
			"filter_padding"             => "",
			"filter_color"               => "",
			"filter_align"               => "",
			"sorting_order"              => "ASC",
			"sorting_order_by"           => "name",
			"category"                   => "",
			"selected_projects"          => "",
			"number_of_post"             => "",
			"portfolio_order"            => "DESC",
			"portfolio_order_by"         => "date",
			"portfolio_column"           => "3",
			"show_title"                 => "yes",
			"link_color"                 => "",
			"show_categories"            => "yes",
			"link_cat_color"             => "",
			"show_load_more"        	 => "yes",
			"show_load_more_align"       => "center",
			"show_load_more_margin"      => "",
			"title_tag"                  => "h4",
			"cat_text_size"              => "",
		), $atts ) );
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		// Portfolio Type
		if( isset($portfolio_type) && $portfolio_type != '') {
			if( $portfolio_type == 'FitRows' ) {
				$image_handler_size = 'lipi-image-700x525';
				$portfolio_type_class = 'isotope-container-grid';
				if( $portfolio_shorting == 'yes' ) $portfolio_sorting_group = 'portfolio-sorting-fitrows-section';
			} else {
				$image_handler_size = 'large';
				$portfolio_type_class = 'isotope-container-masnory';
				if( $portfolio_shorting == 'yes' ) $portfolio_sorting_group = 'portfolio-sorting-section';
			}
		} else {
			$image_handler_size = 'large';
			$portfolio_type_class = 'isotope-container-masnory';
			if( $portfolio_shorting == 'yes' ) $portfolio_sorting_group = 'portfolio-sorting-section';
		}
		
		$return = '';
		$newstyle__link_color = '';	
		if( isset($link_color) && $link_color != "" ){
			$newstyle__link_color = 'color:'.$link_color.';';
			$return .= '<style>.title_color_'.$time_start[1].' { '.$newstyle__link_color.' }</style>';
		}
		$return .= '<span></span>';
		
		// Portfolio shorting 
		if( isset($portfolio_shorting) && $portfolio_shorting != '' && $portfolio_shorting == 'yes') {
			
			if( isset($filter_padding) && !empty($filter_padding) ) $filter_padding = $filter_padding;
			else $filter_padding = '50px';
			
			if( !empty($filter_align) ) {
				if( $filter_align == 'left' ) $filter_padding_align_li = 'padding:10px 18px 10px 0px;';
				else if( $filter_align == 'center' ) $filter_padding_align_li = 'padding: 10px 10px;';
				else if( $filter_align == 'right' ) $filter_padding_align_li = 'padding: 10px 0px 10px 18px;';
			}
			
			$cat_slug_name = array();
			if( !empty($category) ) {
				$category = preg_replace('/\s+/', '', $category);
				$cat_slug_name = explode(",", $category);
			}
			
			$args = array(
				'hide_empty'    => 1,
				'child_of' 		=> 0,
				'pad_counts' 	=> 1,
				'hierarchical'	=> 1,
				'order'         => $sorting_order,
				'orderby'       => $sorting_order_by,
			); 
			$tax_terms = get_terms('lipiptfocategory', $args);
			$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
			
			// css control
			$vcportfolio__filter_align = $vcportfolio__filter_padding = $vcportfolio__filter_color = '';
			if( isset($filter_align) && $filter_align != "" ){
				$vcportfolio__filter_align = 'text-align:'.$filter_align.';';
			}
			if( isset($filter_padding) && $filter_padding != "" ){
				$vcportfolio__filter_padding = 'padding:'.$filter_padding.' 0px;';
			}
			if( isset($filter_color) && $filter_color != "" ){
				$vcportfolio__filter_color = 'color:'.$filter_color.';';
			}
			
			$return .= '<div class="'.$portfolio_sorting_group.'" style=" '.$vcportfolio__filter_align.' '.$vcportfolio__filter_padding.' '.$vcportfolio__filter_color.' "><ul>';
			
			if( ! empty($tax_terms) ) { 
				
				$return .= '<li style="'.$filter_padding_align_li.'" data-filter-masnory="*" class="selected"><span>'. esc_html__( 'All', 'lipi-framework' ) .'</span></li>';
				foreach ($tax_terms as $tax_term) { 
					 if ( !empty($cat_slug_name) && !in_array( trim($tax_term->slug), $cat_slug_name ) ) continue; 
					 $cat_title = $tax_term->name; 
					 $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
					 $cat_title_filter = strtolower($cat_title);
					 $cat_title_filter = preg_replace("/[\s_]/", "-", $cat_title_filter);
					 $return .= '<li style="'.$filter_padding_align_li.'" data-filter-masnory=".'.strtolower($cat_title_filter).'"><span>'. $cat_title .'</span></li>';
			 	}
				
			}
			$return .= '</ul></div>';
			
		}
		// Eof portfolio shorting
		
		if( isset($number_of_post) && $number_of_post != '' ) $number_of_post = $number_of_post;
		else $number_of_post = '-1';
		
		$return .= '<div class="portfolio-readjust-container">';	
		$term_slug = get_query_var( 'term' );
		
		// pagination solved for the landing page.
		global $paged;
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		
		if ($category == "") {
				$args = array(
	 				'post_type' => 'lipi_portfolio',
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		} else {
				$args = array(
	 				'post_type' => 'lipi_portfolio',
					'lipiptfocategory' => $category,
					'posts_per_page' => $number_of_post,
					'orderby' => $portfolio_order_by,
					'post_status' => 'publish',
					'order' => $portfolio_order,
					'paged' => $paged,
				);
		}
		
		$project_ids = null;
		if ($selected_projects != "") {
			$selected_projects = preg_replace('/\s+/', '', $selected_projects);
			$project_ids = explode(",", $selected_projects);
			$args['post__in'] = $project_ids;
		}
		
		if( $padding_zero == true ) $padding_zero_class = 'fix-padding-left-0 fix-padding-right-0 portfolio-margin-btm-0';
				
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
			$return .= '<div class="projects_holder portfolio-define-section '.$portfolio_type_class.'">';
			
			while($wp_query->have_posts()) : $wp_query->the_post();
				$taxonomies = get_object_taxonomies( $post->post_type, 'objects' ); 
				$out = array();
				$data_category = array();
				foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
					// get the terms related to post
					$terms = get_the_terms( $post->ID, $taxonomy_slug );
					if ( !empty( $terms ) ) {
						foreach ( $terms as $term ) {
							$out[] = $term->name;
							$data_category[] = $term->name;
						}
					}
				}
				
				$return .= '<div class="col-md-'.$portfolio_column.' col-sm-6 element-item portfolio-section-records '.$padding_zero_class.' ';
				foreach( $data_category as $val ) { $return .=  preg_replace("/[\s_]/", "-", strtolower($val)).' '; }
				$return .= '">';
					// Image section
					$return .= '<div class="portfolio-image"><a href="'.get_permalink($wp_query->post->ID).'">';
					if ( has_post_thumbnail()) { 
						$return .= get_the_post_thumbnail( $wp_query->post->ID, $image_handler_size, array( 'class' => 'hvr-float' ) );
					} else {
						$return .= '<img width="700" height="525" src="'. trailingslashit( get_template_directory_uri() ).'img/no-portfolio-img.jpg" class="hvr-float wp-post-image" alt="">';
					}
					$return .= '</a></div>';
					// Content section
					$return .= '<div class="portfolio-desc">';
					if( $show_title == 'yes' ) {
						$no_title_br = '';
						$return .= '<a href="'. get_permalink($wp_query->post->ID).'"><'.$title_tag.' class="entry-title title_color_'.$time_start[1].'"> ';
						$title = get_the_title(); 
						$return .= html_entity_decode($title, ENT_QUOTES, "UTF-8");
						$return .= '</'.$title_tag.'></a>';
					} else { 
						$no_title_br = '<div style="height:9px"></div>'; 
					}
					
					$vcportfolio__link_cat_color = $vcportfolio__cat_text_size = '';
					if( isset( $link_cat_color ) && $link_cat_color != "" ) {
						$vcportfolio__link_cat_color = 'color:'.$link_cat_color.';';
					}
					if( isset( $cat_text_size ) && $cat_text_size != "" ) {
						$vcportfolio__cat_text_size = 'font-size:'.$cat_text_size.';';
					}
					if( $show_categories == 'yes' ) $return .= $no_title_br.'<span style=" '.$vcportfolio__link_cat_color.' '.$vcportfolio__cat_text_size.'  ">'. implode(', ', $out ).' </span>';
					$return .= '</div>';
				$return .= '</div>';
			 endwhile;
			 
			 	$i = 1;
                while ($i <= $portfolio_column) {
                    $i++;
                    if ($portfolio_column != 1) {
                        $return .= "<div class='filler'></div>\n";
                    }
                }
				
			  $return .= '</div>';
		} else {
			$return .= '<p class="no-records"> '. esc_html__('Sorry, no posts matched your criteria.', 'lipi-framework') .'</p>';
		}
		$return .= '</div>';
		
		if ($show_load_more == "yes" && $wp_query->max_num_pages != 0 && ($wp_query->found_posts > $number_of_post) ) { 
		if( isset($show_load_more_margin) && $show_load_more_margin != '' ) $show_load_more_margin = $show_load_more_margin;
		else $show_load_more_margin = '20px';
			$return .= '<div style="text-align:'.$show_load_more_align.'; margin: '.$show_load_more_margin.' 0px;">';
			$return .= '<div class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="ajax_load_more_post custom-botton hvr-icon-spin" style="padding: 9px 37px 10px 24px;">' . get_next_posts_link(esc_html__('Show more', 'lipi-framework'), $wp_query->max_num_pages) . '&nbsp;&nbsp;<i class="fas fa-sync-alt hvr-icon"></i></span></div>';
			$return .= '<div class="portfolio_paging_loading"><a href="javascript: void(0)" class="custom-botton" style="padding: 9px 37px 10px 24px;">'.esc_html__('Loading...', 'lipi-framework').'</a></div>';
			$return .= '</div>';
		}
		
		wp_reset_query();
		
		return $return;
	}
}
add_shortcode('lipi__theme_portfolio_list', 'lipi__theme_portfolio_list');



/*************************************
***    ADD VC SC 8 :: LOGO SLIDER  ***
**************************************/
if(!function_exists("lipi__logo_carousel")){
	function lipi__logo_carousel( $atts, $content = null ) {
		$filter_padding_align_li = '';
		global $post;
		extract( shortcode_atts( array( 
			"logo_image"  => "",
			"image_width"  => "",
		), $atts ) );
		
		$return = '';
		if( $logo_image != '' && isset($logo_image) ) {
			$logo_image = explode(",", $logo_image);
			$return .= '<div class="logo-slider"><ul class="slides">';
			foreach ( (array) $logo_image as $key => $val ){
				$logo_image = wp_get_attachment_image_src( $val, 'full');
				$return .= '<li><img alt="" src="'.$logo_image[0].'" style="width:'.$image_width.'" ></li>'; // class="lazyOwl"
			}
			$return .= '</ul></div>';
				
		} else {
			$return .= '';
		}
		
	return $return;
	}
}
add_shortcode('lipi__logo_carousel', 'lipi__logo_carousel');


/*************************************
***    ADD VC SC 9 :: TESTIMONIAL  ***
**************************************/
if(!function_exists("lipi__theme_user_testimonial")){
	function lipi__theme_user_testimonial( $atts, $content = null ) {
		
		global $post;
		extract( shortcode_atts( array( 
			"no_of_testimonial"  => "",
			"order"              => "",
			"order_by"           => "",
			"text_color"         => "",
			"font_size"          => "",
			"testimonial_weight"  => "400",
			"testimonial_line_height"  => "",
			"client_name_color"  => "",
			"client_designation_color"  => "",
			"category"  => "",
		), $atts ) );
		
		if( !empty($no_of_testimonial) ) $no_of_testimonial = $no_of_testimonial;
		else $no_of_testimonial = '-1';
		
		if( isset($order) && $order != '' ) $order = $order;
		else $order = 'DESC';
		
		if( isset($order_by) && $order_by != '' ) $order_by = $order_by;
		else $order_by = 'rand';
		
		$return = '<div class="testimonial-slider"><ul class="slides">';
			
			if( $category == "" ) { 
				$args = array(
					'post_type' => 'lipi_testo',
					'posts_per_page' => $no_of_testimonial,
					'orderby' => $order_by,
					'post_status' => 'publish',
					'order' => $order,
				);
			} else {  
				$args = array(
					'post_type' => 'lipi_testo',
					'posts_per_page' => $no_of_testimonial,
					'orderby' => $order_by,
					'post_status' => 'publish',
					'order' => $order,
					'bindtestimonialcat' => $category,
				);
			}
			
			$testo__text_color = $testo__font_size = $testo__testimonial_weight = $testo__testimonial_line_height = $testo__client_designation_color = $testo__client_name_color = '';
			if( isset($text_color) && $text_color != '' ) {
				$testo__text_color = 'color:'.$text_color.';';	
			}
			if( isset($font_size) && $font_size != '' ) {
				$testo__font_size = 'font-size:'.$font_size.';';	
			}
			if( isset($testimonial_weight) && $testimonial_weight != '' ) {
				$testo__testimonial_weight = 'font-weight:'.$testimonial_weight.';';	
			}
			if( isset($testimonial_line_height) && $testimonial_line_height != '' ) {
				$testo__testimonial_line_height = 'line-height:'.$testimonial_line_height.';';	
			}
			if( isset($client_designation_color) && $client_designation_color != '' ) {
				$testo__client_designation_color = 'color:'.$client_designation_color.';';	
			}
			if( isset($client_name_color) && $client_name_color != '' ) {
				$testo__client_name_color = 'color:'.$client_name_color.';';	
			}
			
			$return .= '';
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()) { 
					$i = 0;
					while($wp_query->have_posts()) { $wp_query->the_post();
					
					$return .= '<li>
									<div class="testo_img_wrap">
										<img alt="" src="'.get_post_meta( $wp_query->post->ID, '__lipi_testo_user_image', true ).'">
									</div>
									 <p class="vc_testimonial_msg" style=" '.$testo__text_color.' '.$testo__font_size.' '.$testo__testimonial_weight.' '.$testo__testimonial_line_height.' letter-spacing: 0px;">
									'.get_post_meta( $wp_query->post->ID, '__lipi_testo_user_message', true ).'
									 </p>
									 <h5 style=" '.$testo__client_name_color.' ">'.get_post_meta( $wp_query->post->ID, '__lipi_testo_user_name', true ).' 
									 <br><span class="author_designation" style=" '.$testo__client_designation_color.' "> '.get_post_meta( $wp_query->post->ID, '__lipi_testo_user_designation', true ).'</span>
									 </h5>
								</li>';
						 
					}
				} else {
					$return .= '<li><p class="no-records"> '. esc_html__('Sorry, no posts matched your criteria.', 'lipi-framework') .'</p></li>';
				}
				wp_reset_postdata(); 
				
		$return .= '</ul></div>';

	return $return;
	}
}
add_shortcode('lipi__theme_user_testimonial', 'lipi__theme_user_testimonial');



/*************************************
***    ADD VC SC 10 :: PRODUCT LIST  ***
**************************************/
if (!function_exists('lipi__theme_shop_product_list')) {
    function lipi__theme_shop_product_list($atts, $content = null) {
        $args = array(
            "post_per_page"     => "-1",
            "columns"           => "",
            "category"          => "",
            "order_by"          => "",
            "order"             => "",
            "title_tag"         => "h4",
            "holder_padding"    => "",
            "category_color"    => "",
			"title_color"       => "",
            "separator_color"   => "",
            "price_color"       => "",
            "price_font_size"   => "",
			"price_font_weight" => "",
            "button_color"      => "",
            "button_text_color"  => "",
			"button_hover_style" => "", 
			"background_color" => "#f8f8f8",
			"disable_add_to_card" => "", 
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
		
        $q = new WP_Query(
            array('post_type' => 'product', 'posts_per_page' => $post_per_page, 'product_cat' => $category, 'orderby' => $order_by, 'order' => $order)
        );
		
        $return = "";
        $return .= "<div class='shop_product_list_holder $columns'><ul>";
		
		$loop_li = 1;
        while ($q->have_posts()) : $q->the_post();

            global $product;

            $holder_style = '';
            if($holder_padding !== '') {
                $holder_style .= ' style="padding: '.$holder_padding.';"';
            }

            $image = '';
            if ( has_post_thumbnail() ) {
                $image = get_the_post_thumbnail( $q->post->ID, 'lipi-image-woo-600x600', array( 'class' => 'hvr-float' ) );
            }
			
            $cat = str_replace(' ', '&nbsp;' , strip_tags(wc_get_product_category_list('')) );

            $title = get_the_title();

            $separator_style = '';
            if($separator_color !== '') {
                $separator_style .= ' style="background-color: '.$separator_color.';"';
            }

            $price = $product->get_price_html();

            $price_style = '';
            if($price_color !== '' || $price_font_size !== '' || $price_font_weight !== '') {
                $price_style .= ' style="';

                if($price_color !== '') {
                    $price_style .= 'color:'.$price_color.';';
                }
                if($price_font_size !== '') {
                    $price_style .= 'font-size:'.$price_font_size.'px;';
                }
				if($price_font_weight !== '') {
                    $price_style .= 'font-weight:'.$price_font_weight.';';
                }

                $price_style .= '"';
            }

            $button_color_style = '';
            $button_hover_type_class = ''; 
            if ($button_hover_style != '') {
                $button_hover_type_class = $button_hover_style;
            }
			
			
			$time_start = microtime(true);
			$time_start = explode(".", $time_start);
			
			$productlist__button_color = $productlist__button_text_color = '';
			if( isset($button_color) && $button_color != "" ) {
				$productlist__button_color = 'background:'.$button_color.';';
			}
			if( isset($button_text_color) && $button_text_color != "" ) {
				$productlist__button_text_color = 'color:'.$button_text_color.';';
			}
			
			if($button_color !== '' || $button_text_color !== '' ) {	
				echo '<style>.vc_product_button_'.$time_start[1].' { '.$productlist__button_color.' '.$productlist__button_text_color.' }</style>';
			}

            $button = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s vc_product_button_'.$time_start[1].'">%s</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                esc_attr( $product->get_id() ),
                esc_attr( $product->get_sku() ),
                esc_attr( 'custom-botton woo-custom-replce-button '.$button_hover_type_class ),
                esc_html( $product->add_to_cart_text() )
            );
			
			$new_li_class = '';
			if( $background_color != '' ) {
				
				if( $columns == 'three_columns' ) { 
					if (($loop_li % 2) == 0) $new_li_class = 'style="background:'.$background_color.';"';
				} else {
					$vcproductlist_background_color = '';
					if( isset($background_color) && $background_color != '' ) {
						$vcproductlist_background_color = 'background-color: '.$background_color.';';
					}
					echo '<style>.shop_product_list_holder.two_columns ul li:nth-child(4n+2), .shop_product_list_holder.two_columns ul li:nth-child(4n+3) { '.$vcproductlist_background_color.' }</style>';
				}
			}
			
            $return .= '<li '.$new_li_class.' class="woo_li_replace">';
            $return .= '<div class="product_list_inner" '.$holder_style.'>';

            $return .= '<div class="product_category" style="color:'.$category_color.'">'.$cat.'</div>';

            $return .= '<'.$title_tag.' itemprop="name" class="product_title entry-title" style="color:'.$title_color.'">'. $title .'</'.$title_tag.'>';

            $return .= '<div class="product_separator separator small center" '.$separator_style.'></div>';

            if($image !== '') {
                $return .= '<div class="product_image">'.$image.'</div>';
            }

            $return .= '<div class="product_price" '.$price_style.'>'.$price.'</div>';

            if( $disable_add_to_card == false ) $return .= '<div class="product_button">'.$button.'</div>';

            $return .= '</div>';
            $return .= '<a class="product_list_link" href="'.get_the_permalink().'" target="_self"></a>';
            $return .= '</li>';
		
		$loop_li++;
        endwhile;
        wp_reset_postdata();

        $return .= "</ul></div>";

        return $return;
    }
    add_shortcode('lipi__theme_shop_product_list', 'lipi__theme_shop_product_list');
}




/*************************************
***    ADD VC SC 10 - 1 :: PRODUCT LIST HOVER  ***
**************************************/
if (!function_exists('lipi__theme_shop_product_list_masonry')) {
    function lipi__theme_shop_product_list_masonry($atts, $content = null) {
        $args = array(
            "per_page"                  => "-1",
            "columns"                   => "",
            "category"                  => "",
            "order_by"                  => "",
            "order"                     => "",
            "title_tag"                 => "h5",
            "hover_background_color"    => "",
            "category_color"            => "",
            "title_text_color"          => "",
            "price_color"               => "",
            "price_font_size"           => "",
        );

        extract(shortcode_atts($args, $atts));

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

        $category_style = '';
        if($category_color !== '') {
            $category_style .= ' style="color: '.$category_color.';"';
        }

        $title_text_style = '';
        if($title_text_color !== '') {
            $title_text_style .= ' style="color: '.$title_text_color.';"';
        }
		

        $price_style = '';
        if( $price_color !== '' || $price_font_size !== '') {
            $price_style .= ' style="';

            if($price_color !== '') {
                $price_style .= 'color:'.$price_color.';';
            }
            if($price_font_size !== '') {
                $price_style .= 'font-size:'.$price_font_size.'px;';
            }

            $price_style .= '"';
        }		

        $product_item_style = '';
        if($hover_background_color !== ''){
            $product_item_style .= 'style="background-color:'.$hover_background_color.';"';
        }

        $q = new WP_Query(
            array('post_type' => 'product', 'posts_per_page' => $per_page, 'product_cat' => $category, 'orderby' => $order_by, 'order' => $order)
        );

        $return = "";
        $return .= "<div class='shop_product_list_hover woo-masonry-grid'>";
        while ($q->have_posts()) : $q->the_post();

            global $product;

            $price = $product->get_price_html();

            $image = '';
            if ( has_post_thumbnail() ) {
				$image = get_the_post_thumbnail( $q->post->ID, 'large' );
            }

			$cat = str_replace(' ', '&nbsp;' , strip_tags(wc_get_product_category_list('')) );

            $title = get_the_title();

			$return .= "<div class='woo-masonry-item $columns'>";
            $return .= '<div class="shop_product_list_hover_item">';
            if($image !== '') {
                $return .= '<div class="product_image">'.$image.'</div>';
            }
            $return .= '<div class="product_list_item_inner" '.$product_item_style.'><div class="product_list_item_table"><div class="product_list_item_table_cell">';
            $return .= '<div class="product_category" '.$category_style.'>'.$cat.'</div>';
            $return .= '<'.$title_tag.' class="qode_product_title entry-title" '.$title_text_style.' >'. $title .'</'.$title_tag.'>';
            $return .= '<div class="product_price" '.$price_style.'>'.$price.'</div>';
            $return .= '</div>';

            $return .= '<a class="list_link" href="'.get_the_permalink().'" target="_self"></a>';
            $return .= '</div></div></div>';
			$return .= '</div>';

        endwhile;
        wp_reset_postdata();

        $return .= "</div>";

        return $return;
    }
    add_shortcode('lipi__theme_shop_product_list_masonry', 'lipi__theme_shop_product_list_masonry');
}

/*************************************
***    ADD VC SC 11 :: LATEST POST ***
**************************************/
if (!function_exists('lipi__theme_blog_post')) {
    function lipi__theme_blog_post($atts, $content = null) {
		
		$columns_number = "";
		
        $args = array(
            "type"       			=> "",
            "number_of_posts"       => "3",   
            "number_of_colums"      => "",   
            "order_by"              => "",   
            "order"                 => "", 
            "category"              => "",
			"title_tag"             => "h4",
			"title_weight"          => "700",
	        "text_letter_specing"   => "",
			"text_line_height"      => "",
            "display_excerpt_read"  => "",
            "blog_content_limit"    => "15",
            "excerpt_content_limit" => "15",
            "display_continue_read" => "2",
            "content_background"    => "",
            "excerpt_content_padding" => "",
			"show_load_more"          => "",
			"show_load_more_align"    => "center",
			"show_load_more_margin"   => "",
			"blog_title_color_htag"   => "",
        );
		
		extract(shortcode_atts($args, $atts));
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		
		$return = "";
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		$latestpost__blog_title_color_htag = '';
		if( isset($blog_title_color_htag) && $blog_title_color_htag !='' ) {
			$latestpost__blog_title_color_htag = 'color:'.$blog_title_color_htag.';';
			$return .= '<style>.vc_blog_title_color'.$time_start[1].' { '.$latestpost__blog_title_color_htag.' }</style>';
		}
		
		//get correct heading value. 
        $title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];
		
		if(is_home() || is_front_page()) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		
		$q = new WP_Query(
			array('orderby' => $order_by, 'order' => $order, 'posts_per_page' => $number_of_posts, 'category_name' => $category, 'paged' => $paged )
		);
		
		// columns
		if($number_of_colums == 2){
			$columns_number = "col-md-6 col-sm-6"; 
		} else if ($number_of_colums == 3) {
			$columns_number = "col-md-4 col-sm-6";
		} else if ($number_of_colums == 4) {
			$columns_number = "col-md-3 col-sm-6";
		}

		$return .= "<div class='vc_theme_blog_post_holder masonry-grid body-content'>";
		
		if($q->have_posts()) {
        while ($q->have_posts()) : $q->the_post();
		
		$return .= "<div class='blog projects_holder_blog masonry-item blog-section-records ".$columns_number."'>";	
		
		$format = get_post_format();
		if( $format == 'gallery' ) {
				
			$post_content = get_the_content();
			preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
			$array_id = explode(",", isset($ids[1]) ? $ids[1] : null );
			$count_array = count($array_id); 
			// Content handle
			$content =  str_replace(  isset($ids[0]) ? $ids[0] : null , "", $post_content);
			$filtered_content = apply_filters( 'the_content', $content);
			
			if( $count_array >= 1 && $array_id[0] != ''  ) { 
			
				$return .= '<div class="blog-flexslider"><ul class="slides">';
				foreach($array_id as $img_id){ 
					$return .= '<li><a href="'.get_permalink().'">'. wp_get_attachment_image( $img_id, 'lipi-image-700x525' ).'</a></li>';
				}
				$return .= '</ul></div>';
				
			} else {
				$return .= '<a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'lipi-image-700x525').'</a>'; 
			}
			
		} else if( $format == 'quote' ) {
				
			$blockquote = get_post_meta( get_the_ID(), '__lipi_post_format_quote', true );
			if( !empty($blockquote) ) $return .= '<blockquote>'. $blockquote .'</blockquote>';
			
		// HANDLE AUDIO	
		} else if( $format == 'audio' ) {
				
			$post_audio = get_post_meta( get_the_ID(), '__lipi_post_format_audio', true );
			if( !empty($post_audio) ) {
				
				 $return .= '<audio class="blog_audio" src="'.get_post_meta( get_the_ID(), '__lipi_post_format_audio', true ).'" controls="controls">';
				 esc_html_e( "Your browser don't support audio player", "bind" );
				 $return .= '</audio>';
				 // Handle export content
				 $excerpt_audio_frame = get_the_excerpt();
				 $excerpt_audio_frame = trim($excerpt_audio_frame);
				 if( !empty($excerpt_audio_frame) ) {    
					 preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $excerpt_audio_frame, $audio_matches);
					 $filtered_audio_content =  str_replace(  isset($audio_matches[0]) ? $audio_matches[0] : null , "", $excerpt_audio_frame);
				 }
				 
			} else {
				$excerpt_audio_frame = get_the_excerpt();
				$excerpt_audio_frame = trim($excerpt_audio_frame);
				if( !empty($excerpt_audio_frame) ) {  
					preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $excerpt_audio_frame, $audio_matches);
					$filtered_audio_content =  str_replace(  isset($audio_matches[0]) ? $audio_matches[0] : null , "", $excerpt_audio_frame);
					if( isset($audio_matches[0]) ) $return .= '<div class="sound-wrapper">'.$audio_matches[0].'</div>';
				} else {
					$filtered_audio_content = '';
				}
			}
		
		// HANDLE VIDEO	
		} else if( $format == 'video' ) {
				
				$excerpt_video_frame = get_the_excerpt();
				$excerpt_video_frame = trim($excerpt_video_frame);
				if( !empty($excerpt_video_frame) ) { 
					preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $excerpt_video_frame, $video_matches);
					$filtered_video_content =  str_replace(  isset($video_matches[0]) ? $video_matches[0] : null , "", $excerpt_video_frame);
					if( isset($video_matches[0]) ) $return .= '<div class="video-wrapper">'.$video_matches[0].'</div>';
				} else {  
					$filtered_video_content = '';
				}
				
		} else {
				$return .= '<a href="'.get_permalink().'">'.get_the_post_thumbnail(get_the_ID(), 'lipi-image-700x525').'</a>';
		}
            
		// entry content
		$vcblogcss__content_background = $vcblogcss__excerpt_content_padding = '';
		if( isset($content_background) && $content_background != '' ) {
			$vcblogcss__content_background = 'background:'.$content_background.';';
		}
		if( isset($excerpt_content_padding) && $excerpt_content_padding != '' ) {
			$vcblogcss__excerpt_content_padding = 'padding:'.$excerpt_content_padding.';';
		}
		$return .= '<div class="entry-content" style=" '.$vcblogcss__content_background.' '.$vcblogcss__excerpt_content_padding.' ">';
		
		// title
		$vcblogcss__text_line_height = $vcblogcss__title_weight = $vcblogcss__text_letter_specing = '';
		if( isset($text_line_height) && $text_line_height != '' ) {
			$vcblogcss__text_line_height = 'line-height:'.$text_line_height.';';
		}
		if( isset($title_weight) && $title_weight != '' ) {
			$vcblogcss__title_weight = 'font-weight:'.$title_weight.';';
		}
		if( isset($text_letter_specing) && $text_letter_specing != '' ) {
			$vcblogcss__text_letter_specing = 'letter-spacing:'.$text_letter_specing.'!important;';
		}
		$return .= '<div class="entry-header">
					<a href="' . get_permalink() . '"><'.$title_tag.' class="vc_latest_post_title vc_blog_title_color'.$time_start[1].'" style=" '.$vcblogcss__text_line_height.' '.$vcblogcss__title_weight.' '.$vcblogcss__text_letter_specing.' ">' . get_the_title() . '</'.$title_tag.'></a>
				   </div>';
		
		
		if ($type == "dividers" ) {
			if(  $format != 'quote' ) {
				$return .= '<div class="latest_post_date">';
				$return .= '<i class="far fa-calendar-alt"></i> <div class="latest_post_day">'.get_the_time('d').'</div>';
				$return .= '<div class="latest_post_month">'.get_the_time('M').'</div>';
				$return .= '</div>';
			}
		} else {
		
			// meta
			$return .= '<div class="entry-meta">';	
			$return .= '<span class="posted-on"><i class="far fa-calendar-alt"></i></span><span class="entry-date published updated">' . get_the_time('d F, Y') . '</span>';	
			// format
			if ( current_theme_supports( 'post-formats', $format ) ) {
				if( $format == 'gallery' ) $icon = 'fa fa-image';
				else if( $format == 'image' ) $icon = 'fa fa-file-image-o';
				else if( $format == 'audio' ) $icon = 'fa fa-music';
				else if( $format == 'video' ) $icon = 'fa fa-film';
				else if( $format == 'link' ) $icon = 'fa fa-link';
				else if( $format == 'quote' ) $icon = 'fa fa-quote-left';
				else $icon = '';
				$return .= '<span class="meta-seprate">/</span> ';
				$return .= '<i class="'.$icon.'"></i><span class="entry-format"><a href="'.esc_url( get_post_format_link( $format ) ).'">'.get_post_format_string( $format ).'</a></span>';
			}
			$return .= '</div>';
		
		}
		
		// content
		$blog_content = get_the_content();
		
		if( $display_excerpt_read != 1 ) {
		$return .= '<div style=" display: table-cell;">';
		$bind_post_format_quote_fix = get_post_meta( get_the_ID(), '__lipi_post_format_quote', true );
		if( $format == 'gallery' ) {
			$gallery_content = do_shortcode($filtered_content);
			$return .= get_lipi__chk_excerpt_content( $q->post_excerpt, $gallery_content, $display_continue_read, $blog_content_limit, $format, $excerpt_content_limit );
			
		} else if( $format == 'quote' && !empty($bind_post_format_quote_fix) ) {
			
		} else if( $format == 'audio' ) {
			$return .= get_lipi__chk_excerpt_content( $q->post_excerpt, $filtered_audio_content, $display_continue_read, $blog_content_limit, $format, $excerpt_content_limit );
			
		} else if( $format == 'video' ) {
			$return .= get_lipi__chk_excerpt_content( $q->post_excerpt, $filtered_video_content, $display_continue_read, $blog_content_limit, $format, $excerpt_content_limit );
			
		} else {  
			$return .= get_lipi__chk_excerpt_content( $q->post_excerpt, $blog_content, $display_continue_read, $blog_content_limit, $format, $excerpt_content_limit );
		}
        $return .= '</div>';
		}
		

        $return .= '</div>';
		// eof entry  content
		$return .= "</div>";	
		endwhile;
		
		$k = 1;
		while ($k <= $number_of_colums) {
			$k++;
			if ($number_of_colums != 1) {
				$return .= "<div class='filler'></div>\n";
			}
		}
		
	    } else {
			$return .= '<p class="no-records"> '. esc_html__('Sorry, no posts matched your criteria.', 'lipi-framework') .'</p>';
		}
        $return .= "</div>";
		
		if ( $show_load_more == "yes" && ($q->max_num_pages != 0) && ($q->found_posts > $number_of_posts) ) {
			
			$vcblogcss__show_load_more_align = $vcblogcss__show_load_more_margin = '';
			if( isset($show_load_more_align) && $show_load_more_align != '' ) {
				$vcblogcss__show_load_more_align = 'text-align:'.$show_load_more_align.';';
			}
			if( isset($show_load_more_margin) && $show_load_more_margin != '' ) {
				$vcblogcss__show_load_more_margin = 'margin:'.$show_load_more_margin.' 0px;';
			}
			 
			$return .= '<div style=" '.$vcblogcss__show_load_more_align.' '.$vcblogcss__show_load_more_margin.' ">';
			$return .= '<div class="blog_vc_paging"><span rel="' . $q->max_num_pages . '" class="ajax_load_more_post_record custom-botton hvr-icon-spin" style="padding: 9px 37px 10px 24px;">' . get_next_posts_link(esc_html__('Show more', 'lipi-framework'), $q->max_num_pages) . '&nbsp;&nbsp;<i class="fas fa-sync-alt hvr-icon"></i></span></div>';
			$return .= '<div class="blog_vc_paging_loading"><a href="javascript: void(0)" class="custom-botton" style="padding: 9px 37px 10px 24px;">'.esc_html__('Loading...', 'lipi-framework').'</a></div>';
			$return .= '</div>';
		}
		
		wp_reset_postdata();
        return $return;
    }
    add_shortcode('lipi__theme_blog_post', 'lipi__theme_blog_post');
}




/*************************************
***    ADD VC SC 12 :: IMAGE SLIDER ***
**************************************/
if (!function_exists('lipi__theme_image_slider')) {
    function lipi__theme_image_slider($atts, $content = null) {
		
        global $post;
		extract( shortcode_atts( array( 
			"sliding_image"  => "",
			"image_size"  => "medium",
			"image_margin" => "",
			"image_align"  => "center",
			"enable_image_title" => '',
			"text_padding" => '0px',
			"text_color" => '',
			'title_tag'  => 'h6',
			'enable_popup_image_display' => '',
			'title_weight' => '',
		), $atts ) );
		
		$image_size_new = '';
		if( $image_size != '' ) { 
			$filter_image_size =  preg_replace("/([0-9]+)-([0-9]+)/","",$image_size);
			if( (int) $filter_image_size ) { 
				$new_image_size = $filter_image_size;
				$new_image_size = explode("x", $new_image_size);
				$new_image_size = array($new_image_size[0], $new_image_size[1]);
			} else {  
				$new_image_size = $image_size;
			}
		} else {
			$new_image_size = $image_size;
		}
		
		$return = '';
		if( $sliding_image != '' && isset($sliding_image) ) {
			$sliding_image = explode(",", $sliding_image);
			$return .= '<div class="owl-image-slider">';
			
			$total_loop = count($sliding_image);
			foreach ( (array) $sliding_image as $key => $val ){
				
				$attachment_title = get_the_title($val);
				$sliding_image = wp_get_attachment_image( $val, $new_image_size);
				$popup_image_url = wp_get_attachment_image_url( $val, $new_image_size);
				$return .= '<div class="owl-inner-wrap" style="text-align:'.$image_align.'; margin:'.$image_margin.';">
								<div class="owl-inner-wrap-media">';
								
				if( $enable_popup_image_display == true ) $return .= '<a href="'. $popup_image_url .'" data-lightbox="true">';
				$return .= $sliding_image;
				if( $enable_popup_image_display == true ) $return .= '</a>';
				
				
				$return .= '</div>';
				if( $enable_image_title == true ) {				
					$return .= '<div class="owl-inner-wrap-desc" style="padding:'.$text_padding.'">
										<'.$title_tag.' style="color:'.$text_color.';font-weight:'.$title_weight.';">'.$attachment_title.'</'.$title_tag.'>
								</div>';
				}
							
				$return .= '</div>';
				
			 }
			
			$return .= '</div>';
				
		} else {
			$return .= '';
		}

		return $return;
    }
    add_shortcode('lipi__theme_image_slider', 'lipi__theme_image_slider');
}




/*************************************
***    ADD VC SC 13 :: BBPRESS LOGIN ***
**************************************/
if (!function_exists('lipi__theme_login')) {
	function lipi__theme_login($atts, $content = null) {
		
		extract( shortcode_atts( array(
			"login_message" => "Login, to access this site",
			"bbpress_login"  => "Login",
			"text_color"  => "",
			"register_link_url"  => "",
			"lost_password_link_url"  => "",
			"username_text" => "Username",
			"password_text" => "Password",
			"keep_me_signed_in_text" => "Keep me signed in",
			"top_border_color" => "",
		), $atts ) );
		
		$register_link = (function_exists("vc_build_link") ? vc_build_link($register_link_url) : $register_link_url);
		$lost_password_link = (function_exists("vc_build_link") ? vc_build_link($lost_password_link_url) : $lost_password_link_url);
		
		$return = '';
		
		if( isset($top_border_color) && $top_border_color != '' ) {
			$top_border_color_4 = 'border-top: 4px solid '.$top_border_color.';';
		} else {
			$top_border_color_4 = '';
		}
		
		if( isset($text_color) && $text_color != '' ) {
			$text_color = 'color:'.$text_color.'';
		}
		
		if ( ! is_user_logged_in() ) { 
		$return .=  '<div class="vc-theme-user-login"><form method="post" action="'. site_url( '/wp-login.php' ).'" class="vc-theme-user-login" style=" '.$top_border_color_4.'"><h4>'.esc_html($login_message).'</h4>
	<fieldset class="bbp-form">

		<div class="bbp-username">
			<h6 style="'.$text_color.'">'.esc_html($username_text).': </h6>
			<input type="text" name="log" value="" size="20" id="user_login" />
		</div>

		<div class="bbp-password">
			<h6 style="'.$text_color.'">'.esc_html($password_text).': </h6>
			<input type="password" name="pwd" value="" size="20" id="user_pass" />
		</div>

		<div class="bbp-remember-me">
			<input type="checkbox" name="rememberme" value="forever" id="rememberme" />
			<label for="rememberme"  style="'.$text_color.'">'. esc_html($keep_me_signed_in_text) .'</label>
		</div>

		'. do_action( 'login_form' ) .'

		<div class="submit-wrapper ">
			<button type="submit" name="user-submit" class="custom-botton">'. esc_html($bbpress_login) .'</button>
		</div>';
		
		
		if( !empty($register_link['title']) ) {
			if( isset($register_link['target']) && $register_link['target'] == true ) $target_link_target = ' target="'.$register_link['target'].'" ';
			else $target_link_target = '';
			$return .= '<div><a href="'.$register_link['url'].'" '.$target_link_target.' class="more-link hvr-icon-wobble-horizontal">'.$register_link['title'].'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a></div>';
		}
		
		if( !empty($lost_password_link['title']) ) {
			if( isset($lost_password_link['target']) && $lost_password_link['target'] == true ) $target_passlink_target = ' target="'.$lost_password_link['target'].'" ';
			else $target_passlink_target = '';
			$return .= '<div><a href="'.$lost_password_link['url'].'" '.$target_passlink_target.' class="more-link hvr-icon-wobble-horizontal">'.$lost_password_link['title'].'</a></div>';
		}
		
	$return .= '</fieldset>
</form></div>';
		} else {
			$return .= '<div class="vc-theme-user-login-loggedin" style=" '.$top_border_color_4.'">';
			$loginout = wp_loginout($_SERVER['REQUEST_URI'], false );
			$return .= $loginout;
			$return .= '</div>';
		}
		
		return $return;
	}
	add_shortcode('lipi__theme_login', 'lipi__theme_login');
}
	



/*************************************
***    ADD VC SC 13 - 1 :: BBPRESS REGISTER ***
**************************************/
if (!function_exists('lipi__theme_bbpress_register')) {
	function lipi__theme_bbpress_register($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"bbpress_register_msg"  => "Your username must be unique, and cannot be changed later. We use your email address to email you a secure password and verify your account.",
			"text_color"  => "",
			"button_bg_color"  => "",
			"button_text_color"  => "",
		), $atts ) );
		
		$return = '<form method="post" action=" '. site_url( '/wp-login.php?action=register' ) .'" class="vc-theme-user-login">
	<fieldset class="bbp-form">

		<div class="bbp-register-notice">
			<h4 style="color:'.$text_color.'">'.$bbpress_register_msg.'</h4>
		</div>

		<div class="bbp-username">
			<h6 for="user_login">'.esc_html__( 'Username', 'lipi-framework' ).':</h6>
			<input type="text" name="user_login" value=" " size="20" id="user_login" />
		</div>

		<div class="bbp-email">
			<h6 for="user_email">'.esc_html__( 'Email', 'lipi-framework' ).': </h6>
			<input type="text" name="user_email" value="" size="20" id="user_email" />
		</div>

		'. do_action( 'register_form' ) .'

		<div class="bbp-submit-wrapper">
			<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'.esc_html__( 'Register', 'lipi-framework' ).'</button>
			'. bbp_user_register_fields() .'

		</div>
	</fieldset>
</form>
';
		
		return $return;
	}
	add_shortcode('lipi__theme_bbpress_register', 'lipi__theme_bbpress_register');
}



/*************************************
***    ADD VC SC 13 - 2 :: BBPRESS LOST PASSWORD ***
**************************************/
if (!function_exists('lipi__theme_bbpress_lost_password')) {
	function lipi__theme_bbpress_lost_password($atts, $content = null) {
		
		extract( shortcode_atts( array( 
			"button_bg_color"  => "",
			"button_text_color"  => "",
		), $atts ) );
		
		$return = '<form method="post" action="'. bbp_get_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ) .'" class="bbp-login-form">
		<fieldset class="bbp-form">
			<legend>'.esc_html__( 'Lost Password', 'lipi-framework' ).'</legend>
			<div class="bbp-username">
				<p>
					<label for="user_login">'.esc_html__( 'Username or Email', 'lipi-framework' ).': </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" />
				</p>
			</div>
			'. do_action( 'login_form', 'resetpass' ) .'
			<div class="bbp-submit-wrapper">
				<button type="submit" name="user-submit" class="custom-botton" style="background:'.$button_bg_color.';color:'.$button_text_color.'">'.esc_html__( 'Reset My Password', 'lipi-framework' ).'</button>
				'. bbp_user_lost_pass_fields() .'
			</div>
		</fieldset>
	</form>';
		
		return $return;
	}
	add_shortcode('lipi__theme_bbpress_lost_password', 'lipi__theme_bbpress_lost_password');
}


/*************************************
***    ADD VC SC 14 :: KNOWLEDGE BASE  ***
**************************************/
if (!function_exists('lipi__theme_knowledgebase_articles')) {
	function lipi__theme_knowledgebase_articles($atts, $content = null) {
	$cat_display_order  = $cat_display_order_by = $page_display_order = $display_page_order_by = '';	
	global $lipi_theme_options;	
	
		extract( shortcode_atts( array( 
			"knowledgebase_column"  => "4",
			"knowledgebase_category_display_order"  => "ASC",
			"knowledgebase_category_display_orderby"  => "name",
			"knowledgebase_page_article_display_order"  => "ASC",
			"knowledgebase_page_article_display_orderby"  => "date",
			"knowledgebase_child_cat_as_root"  => "no",
			"knowledgebase_no_of_articles"  => "5",
			"knowledgebase_view_all"  => "View All",
			"kbgroupcatid"  => "",
			"category_title_tag" => "h5",
			"kb_private_category" => 'Private Category',
			"kb_private_category_text_color" => '#F13C2A',
			"icon_color" => '#818A97',
			"knowledgebase_style_type" => '1',
			"read_more_text_display" => 'yes',
			"total_post_count_cat_title" => 'no',
			"post_count_color" => '',
			"kb_no_of_category_records" => '0',
		), $atts ) );
		
		// knowledgebase column 
		$class = ''; 
		if( $knowledgebase_column == 4 ) {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid'; }
			$col_md = 4;
		} else if( $knowledgebase_column == 6 ) {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid-without-sidebar'; }
			$col_md = 6;
		} else {
			if( $knowledgebase_style_type == 1 ) { $class = 'masonry-grid'; }
			$col_md = 4;
		}

		// main code
		if( isset($knowledgebase_category_display_order) && $knowledgebase_category_display_order != ''  ) {
			$cat_display_order = $knowledgebase_category_display_order;
		}
		if( isset($knowledgebase_category_display_orderby) && $knowledgebase_category_display_orderby != ''  ) {
			$cat_display_order_by = $knowledgebase_category_display_orderby;
		} 
		// pages
		if( isset($knowledgebase_page_article_display_order) && $knowledgebase_page_article_display_order != ''  ) {
			$page_display_order = $knowledgebase_page_article_display_order;
		}
		if( isset( $knowledgebase_page_article_display_orderby ) && $knowledgebase_page_article_display_orderby != '' ) {
			$display_page_order_by = $knowledgebase_page_article_display_orderby;	
		}
		
		$kb_catIDs = '';
		if( isset( $kbgroupcatid ) && $kbgroupcatid != '' ) {
			$kb_catIDs = explode(',', $kbgroupcatid); 
		}
		
		//list terms in a given taxonomy
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'order'         => $cat_display_order,
			'orderby'       => $cat_display_order_by,
			'number'        => $kb_no_of_category_records,
		); 
		$tax_terms = get_terms('lipikbcat', $args);
		if( $knowledgebase_child_cat_as_root == 'no' ) $tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
				
		$return = '<div class="'.$class.'" style="margin-left: -15px;margin-right: -15px;">';
	    
		// FIXROW
		if( $knowledgebase_style_type == 2 && ($knowledgebase_column == 4 || $knowledgebase_column == 6) ) {
			$return .= '<div class="row row-eq-height" style="margin: 0px;">'; // control every 3 loop
		}
		// EOF FIXROW
		
		$i = 1;
		foreach ($tax_terms as $tax_term) { 
		
		// get extra meta value
		$icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
		$login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
		$check_user_role = get_option( 'kb_cat_user_role_'.$tax_term->term_id );
		// eof extra meta value
			
		if ( !empty($kb_catIDs) && !in_array( $tax_term->term_id, $kb_catIDs)) continue;
		
		$return .= '<div class="col-md-'.$col_md.' col-sm-12 masonry-item body-content">';
		$return .= '<div class="knowledgebase-body">';
		if( isset($icon_name) && $icon_name != '' ) { 
			$return .= '<div class="kb-masonry-icon"><'.$category_title_tag.'><i class="'.$icon_name.'" style="color:'.$icon_color.';" ></i></'.$category_title_tag.'></div><div class="vc-kb-masonry-tag-right">';
		}
		 $return .= '<'.$category_title_tag.'><a href="'.esc_attr(get_term_link($tax_term, 'lipikbcat')).'">'; 
		 $cat_title = $tax_term->name; 
		 $return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
		 $post_countcolor = '';
		 if( isset($post_count_color) && $post_count_color != '' ) { $post_countcolor = 'color:'.$post_count_color.''; }
		 if( $total_post_count_cat_title == 'yes' ) $return .= '&nbsp;<span class="title_post_count_kb" style="'.$post_countcolor.'">('.$tax_term->count.')</span>';
		 $return .= '</a></'.$category_title_tag.'>';
		 if( isset($icon_name) && $icon_name != '' ) { $return .= '</div>'; }
		 $return .= '<span class="separator small"></span>';
					 
		if( isset($login_check) && $login_check == true && !is_user_logged_in() ) { 
		$return .= '<div class="kb_login_box"> <div class="custom_login_form no-shadow"><i class="fas fa-lock" style="color:'.$kb_private_category_text_color.'"></i>&nbsp; '.$kb_private_category.'</div></div>';
		} else {
			
			/**************************************
			** Check USER ROLE AFTER USER LOGIN**
			***************************************/
			$access_status = lipi__useraccesslevel($check_user_role);
			if( $login_check == 1 && is_user_logged_in() && $access_status == false ) { 
				$return .= '<div class="kb_login_box"> <div class="custom_login_form no-shadow">';
				$return .= esc_html($lipi_theme_options['kb-cat-page-access-control-message']);
				$return .= '</div></div>';
			} else {

			 // start displaying records			 
			 $return .= '<ul class="kbse">';
			 if( isset( $knowledgebase_no_of_articles ) && $knowledgebase_no_of_articles != '' ) {
					$display_on_of_records_under_cat = $knowledgebase_no_of_articles;	
			 } else {
				 $display_on_of_records_under_cat = 5;
			 }	 
	
			  $args = array( 
				'post_type'  => 'lipi_kb',
				'posts_per_page' => $display_on_of_records_under_cat,
				'orderby' => $display_page_order_by,
				'order'  => $page_display_order,
				'tax_query' => array(
					array(
						'taxonomy' => 'lipikbcat',
						'field' => 'term_id',
						'include_children' => true,
						'terms' => $tax_term->term_id
					)
				)
			 );
			 $st_cat_posts = get_posts( $args );
			 foreach( $st_cat_posts as $post ) : 
			 $return .= '<li class="cat inner"> <a href="'. get_permalink($post->ID).'">';
			 $org_title = $post->post_title; 
			 $return .= html_entity_decode($org_title, ENT_QUOTES, "UTF-8");
			 $return .= '</a> </li>';
			 endforeach;
			 wp_reset_postdata(); 
			 $return .= '</ul>';
			 
			 if( $knowledgebase_no_of_articles <= $tax_term->count ) { 
			 if( $read_more_text_display == 'yes' ) {
			 $return .= '<div style="padding:10px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'lipikbcat')).'" class="custom-link hvr-icon-wobble-horizontal">
				   '.$knowledgebase_view_all.'
				   '. $tax_term->count .'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a></div>';
			 }
			 }
			 // eof display records
			 
			} // eof check user role
		 }
				
		 $return .= '</div></div>';
		 
		 // FIXROW
		if( $knowledgebase_style_type == 2 && $knowledgebase_column == 4 ) { 
			if($i % 3 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		} else if( $knowledgebase_style_type == 2 && $knowledgebase_column == 6 ) {
			if($i % 2 == 0) $return .= '</div><div class="row row-eq-height" style="margin: 0px;">'; 
		}
		// EOF FIXROW
		 
		 $i++; }
		 
		  // FIXROW
		if( $knowledgebase_style_type == 2 && ($knowledgebase_column == 4 || $knowledgebase_column == 6) ) { 
			$return .= '</div>'; 
		}
		// EOF FIXROW
		 
		 $return .= '</div>';
		// Eof main code
		return $return;
		
	}
	add_shortcode('lipi__theme_knowledgebase_articles', 'lipi__theme_knowledgebase_articles');
}


/*************************************
***    ADD VC SC 14.1 :: KNOWLEDGE BASE STYLE ***
**************************************/
if (!function_exists('lipi__theme_kb_style')) {
	function lipi__theme_kb_style($atts, $content = null) {
		global $lipi_theme_options;	

		extract( shortcode_atts( array( 
			"knowledgebase_style_type" => "1",
			"knowledgebase_style_type_display_order" => "ASC",
			"knowledgebase_style_type_display_orderby" => "date",
			"title_tag" => "h5",
			"total_article_count" => "no",
			"border_color" => "",
			"article_count_box_title" => 'articles in this collection',
			"icon_color" => '#818A97',
			"kb_private_categpry" => 'Private Category',
			"kb_private_category_text_color" => '#F13C2A',
			"exclude_kb_category" => '',
			"kb_no_ofrecords" => "0",
			"disable_description" => "no",
			"icon_size" => "",
			"default_icon_code" => "icon_documents_alt",
			"limit_description_char" => "",
			"background_color" => '#ffffff',
			"border_radius" => '4px',
		), $atts ) );
		
		$return = '';
		
		// args
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'order'         => $knowledgebase_style_type_display_order,
			'orderby'       => $knowledgebase_style_type_display_orderby,
			'exclude'       => $exclude_kb_category,
			'number'        => $kb_no_ofrecords,
		); 
		
		$tax_terms = get_terms('lipikbcat', $args);
		$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));

		if( $knowledgebase_style_type == 1 ) {
			
			if( isset($border_color) && $border_color != '' ) $border_color = $border_color;
			else $border_color = '#d4dadf';
			
			if( isset($icon_size) && $icon_size != '' ) $icon_size = $icon_size;
			else $icon_size = '55px';
			
			
			$i = 1;
	        foreach ($tax_terms as $tax_term) {
			// get extra meta value
			$icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
			if( isset($icon_name) && $icon_name != '' ) { $icon_name = $icon_name;
			} else { $icon_name = $default_icon_code; }
			$login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
			// eof exta meta value
			$return .= '<div class="kb_style1_box"> <div class="wrap_kbstyle" style="border: 1px solid '.$border_color.';background:'.$background_color.';border-radius:'.$border_radius.';">';
			if( isset($login_check) && $login_check == true ) { 
				if ( !is_user_logged_in() ) {
					$return .= '<div class="private-kb-cat"><i class="fas fa-lock" style="color:'.$kb_private_category_text_color.';"></i>&nbsp; '.$kb_private_categpry.'</div>';
				}
			}
			$return .= '<div class="wrap_stylekb">
								<!--icon or image-->
								<div class="icon_image_kbstyle">';
			if( isset($icon_name) && $icon_name != '' ) $return .= '<i class="'.$icon_name.'" style="color:'.$icon_color.';font-size:'.$icon_size.';"></i>';
			$return .= '</div>
								<!--Content-->';
			$return .= '<div class="kbcontent">';
			$return .= '<'.$title_tag.'><a href="'.esc_attr(get_term_link($tax_term, 'lipikbcat')).'">';
			$cat_title = $tax_term->name;
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			if( $disable_description == 'no' ) { 
				if( isset($limit_description_char) && $limit_description_char != '' ) {
					$return .= '<p>'.  mb_strimwidth(esc_attr($tax_term->description), 0, $limit_description_char, "...").'</p>';
				} else {
					$return .= '<p>'.esc_attr($tax_term->description).'</p>';
				}
			}
			if( $total_article_count == 'no' ) {
			$return .= '<div style="padding:5px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'lipikbcat')).'" class="custom-link hvr-icon-wobble-horizontal">
               '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).' </a></div>';
			}
			$return .= '</div>
							</div>
						</div></div>';
						
			}
		} else if( $knowledgebase_style_type == 2 ) {
			
			if( isset($border_color) && $border_color != '' ) $border_color = $border_color;
			else $border_color = '#ededed';
			
			if( isset($icon_size) && $icon_size != '' ) $icon_size = $icon_size;
			else $icon_size = '45px';
			
			// FIX ROW
			$return .= '<div class="row-eq-height">';
			// EOF FIX ROW
			
			$j = 0;
	        foreach ($tax_terms as $tax_term) {
				
			// get extra meta value
			$icon_name = get_option( 'kb_cat_icon_name_'.$tax_term->term_id );
			if( isset($icon_name) && $icon_name != '' ) { $icon_name = $icon_name;
			} else { $icon_name = $default_icon_code; }
			$login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
			// eof exta meta value
			
			$return .= '<div class="KbCategory__box_layout2" style="border: 1px solid '.$border_color.';background:'.$background_color.';border-radius:'.$border_radius.';"><div class="KbCategory__box_layout2__boxInner">';
			$return .= '<div class="flex">';
			$return .= '<div class="mediaFigure">';
			if( isset($icon_name) && $icon_name != '' ) $return .= '<i class="'.$icon_name.'" style="color:'.$icon_color.';font-size:'.$icon_size.';"></i>';
			$return .= '</div>';
			
			$return .= '<div class="mediaContent">';
			if( isset($login_check) && $login_check == true ) { 
				if ( !is_user_logged_in() ) {
					$return .= '<div class="private-kb-cat"><i class="fas fa-lock" style="color:'.$kb_private_category_text_color.';"></i>&nbsp; '.$kb_private_categpry.'</div>';
				}
			}
			$return .= '<'.$title_tag.'><a href="'.esc_attr(get_term_link($tax_term, 'lipikbcat')).'">';
			$cat_title = $tax_term->name;
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			
			if( $disable_description == 'no' ) { 
				if( isset($limit_description_char) && $limit_description_char != '' ) {
					$return .= '<p>'.  mb_strimwidth(esc_attr($tax_term->description), 0, $limit_description_char, "...").'</p>';
				} else {
					$return .= '<p>'.esc_attr($tax_term->description).'</p>';
				}
			}
			
			if( $total_article_count == 'no' ) {
			$return .= '<div style="padding:5px 0px;"> <a href="'. esc_attr(get_term_link($tax_term, 'lipikbcat')).'" class="custom-link hvr-icon-wobble-horizontal">
               '. $tax_term->count .'&nbsp; '.esc_attr($article_count_box_title).' </a></div>';
			}
			
			$return .= '</div>';
			$return .= '</div> </div> </div>';
						
			// FIX ROW	
			if($j % 2 == 1) $return .= ' </div><div class="row-eq-height">';  // control every 3 loop
			// EOF FIX ROW
						
			$j++;			
			}
			
			$return .= '</div>';
			
		} // eof else
	
		return $return;
	}
	add_shortcode('lipi__theme_kb_style', 'lipi__theme_kb_style');
}



/*************************************
***    ADD VC SC 15 :: KNOWLEDGE BASE CATEGORY WIDGET  ***
**************************************/
if(!function_exists("lipi__theme_knowledgebase_widget_cat")){
	function lipi__theme_knowledgebase_widget_cat( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"kb_category_title"            => "",
			"kb_category_show_post_count"  => "",
			"count_text_color"   => "",
			"count_bg_color"   => "",
		), $atts ) );
		
		$kbcat__count_text_color = $kbcat__count_bg_color = '';
		if( isset($count_text_color) && $count_text_color != '' ){
			$kbcat__count_text_color = 'color:'.$count_text_color.';';
		}
		if( isset($count_bg_color) && $count_bg_color != '' ){
			$kbcat__count_bg_color = 'background:'.$count_bg_color.';';
		}
		
		$categories = get_categories('taxonomy=lipikbcat&post_type=lipi_kb');
		$return = '<div class="theme-widget vc-kb-cat-widget">';
		$return .= '<h6>' . $kb_category_title . '</h6>';
		$return .= '<ul>';
		foreach ($categories as $category) {
			$category_link = get_category_link( $category->term_id );

			if( $category->category_parent  == 0  ) {
				$return .= '<li>';
					$return .= '<a href="'. esc_url($category_link) .'">'. $category->name .' ' ;
					$return .= '</a>';
					if( $kb_category_show_post_count == 'true' ) { $return .= '&nbsp;<span class="kb_cat_post_count" style=" '.$kbcat__count_text_color.' '.$kbcat__count_bg_color.' ">('.$category->count.')</span>'; }
					
				$subcategories = get_categories('taxonomy=lipikbcat&post_type=lipi_kb&child_of='.$category->term_id.'');
				if( !empty($subcategories) ) {
					$return .= '<ul class="kbchildren">';
					foreach ($subcategories as $category) {
						$return .= '<li>';
						$return .= '<a href="'. esc_url($category_link) .'">'. $category->name .' ' ;
						$return .= '</a>';
						if( $kb_category_show_post_count == 'true' ) { $return .= '&nbsp;<span class="kb_cat_post_count" style=" '.$kbcat__count_text_color.' '.$kbcat__count_bg_color.' ">('.$category->count.')</span>'; }
					    $return .= '</li>';
					}
					$return .= '</ul>';
				}
				$return .= '</li>'; // end of main category
			}
		}
		$return .= '</ul>';
		wp_reset_postdata();
		$return .= '</div>';
		return $return;
	}
}
add_shortcode('lipi__theme_knowledgebase_widget_cat', 'lipi__theme_knowledgebase_widget_cat');





/*************************************
***    ADD VC SC 16 :: KNOWLEDGE BASE ARTICLES (WIDGET)  ***
**************************************/
if(!function_exists("lipi__theme_knowledgebase_widget_articles")){
	function lipi__theme_knowledgebase_widget_articles( $atts, $content = null ) {
		
		extract( shortcode_atts( array( 
			"title"   => "",
			"title_tag"   => "h6",
			"title_align" => 'left',
			"knowledgebase_article_display_type"   => "",
			"knowledgebase_article_number"   => "4",
			"knowledgebase_article_order"   => "",
		), $atts ) );
		//print_r($atts);
		$return = '<div class="theme-widget vc_kb_article_type">';
		$return .= '<'.$title_tag.' style="text-align:'.$title_align.';"><span>' . $title . '</span></'.$title_tag.'>';
		
		$args = '';
		if( $knowledgebase_article_display_type == 1 ) { // Latest Article
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'lipi_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		} else if( $knowledgebase_article_display_type == 2 ) { // Popular Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'lipi_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'display_post_impression'
						);
		} else if( $knowledgebase_article_display_type == 3 ) { // Top Rated Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'lipi_kb',
							'orderby' => 'meta_value',
							'order'	=>	$knowledgebase_article_order,
							'meta_key' => 'rating_like_count_post'
						);
		} else if( $knowledgebase_article_display_type == 4 ) { // Most Commented Article
			$args = array( 
							'posts_per_page' => $knowledgebase_article_number, 
							'post_type'  => 'lipi_kb',
							'orderby' => 'comment_count',
							'order'	=>	$knowledgebase_article_order,
						);
						
		} else { // Default latest
			$args = array( 
						'posts_per_page' => $knowledgebase_article_number, 
						'post_type'  => 'lipi_kb',
						'orderby' => 'date',
						'order'	=>	$knowledgebase_article_order,
					);
		}
		
		$query = new WP_Query($args);
		$return .= '<ul class="clearfix">';
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		$return .= '<li class="articles"><a href="'.get_permalink($query->post->ID).'" rel="bookmark">'.get_the_title($query->post->ID).'</a></li>';
		endwhile; endif;
		$return .= '</ul>'; 
		wp_reset_query();
		$return .= '</div>';

		return $return;
	}
}
add_shortcode('lipi__theme_knowledgebase_widget_articles', 'lipi__theme_knowledgebase_widget_articles');



/*************************************
***    ADD VC SC 17 :: KB SINGLE CATEGORY ARTICLE   ***
**************************************/
if(!function_exists("lipi__theme_knowledgebase_widget_single_cat_records")){
	function lipi__theme_knowledgebase_widget_single_cat_records( $atts, $content = null ) {
		global $post, $lipi_theme_options, $paged;
		extract( shortcode_atts( array( 
			"page_per_post"   => "",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"kbsinglecatid"   => "",
			"view_text"   => "views",
			"title_tag"   => "h5",
		), $atts ) );
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;

		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		
		$return = '';
		if( isset($kbsinglecatid) && $kbsinglecatid != '' ) {
			
			$args = array( 
				'posts_per_page' => $page_per_post, 
				'paged' => $paged,
				'post_type'  => 'lipi_kb',
				'orderby' => $post_orderby,
				'order'  => $post_order,
				'tax_query' => array(
					array(
						'taxonomy' => 'lipikbcat',
						'field' => 'id',
						'include_children' => $include_child_post,
						'terms' => $kbsinglecatid
					)
				)
			 );
			 
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				 $return .= '<div class="body-content"><div class="kb-categorypg" style="clear:both">';
				 while ( $the_query->have_posts() ) : $the_query->the_post();
				   $return .= '<div class="kb-box-single"> <div class="kb-single blog"> ';
				   $return .= '<div class="entry-header"><'.$title_tag.'><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></'.$title_tag.'></div>';
				   $return .= '<div class="entry-meta">'; 
				   $return .= '<i class="fa fa-eye"></i>&nbsp;<span>';
						if( get_post_meta( $post->ID, 'display_post_impression', true ) != '' ) { 
							$return .= get_post_meta( $post->ID, 'display_post_impression', true ).'&nbsp;'.$view_text;
						} else { $return .= '0&nbsp;'.$view_text; }
				   $return .= ' / </span>';
				   $return .= '&nbsp;<i class="fa fa-calendar"></i> <span>'.get_the_time( get_option('date_format') ).'</span>';
				   $return .= '</div>';
				   $return .= '</div></div>';
				 endwhile;
				$return .= '</div></div>'; 
			} 
			wp_reset_postdata();
			
		}
		
		
		return $return;
	}
}
add_shortcode('lipi__theme_knowledgebase_widget_single_cat_records', 'lipi__theme_knowledgebase_widget_single_cat_records');


/*************************************
***    ADD VC SC KB.1 :: KNOWLEDGE BASE TREE MENU ***
**************************************/
if(!function_exists("lipi__knowledgebase_tree_menu")){
	function lipi__knowledgebase_tree_menu( $atts, $content = null ) {
		global $post, $lipi_theme_options;
		
		extract( shortcode_atts( array( 
			"title_tag"   => "h6",
			"root_tag_li_padding" => "11px 10px 1px 10px",
			"root_tag_color" => "",
			"kb_no_of_category_records" => "",
			"knowledgebase_category_display_order" => "",
			"knowledgebase_category_display_orderby" => "",
			"kb_private_category" => "Private Records",
			"knowledgebase_records_display_order" => "",
			"knowledgebase_records_display_orderby" => "",
			"border_radius" => "0px",
		), $atts ) );
		
		
		if( isset($root_tag_li_padding) && $root_tag_li_padding != '' ) $root_tag_li_padding = 'padding:'.$root_tag_li_padding.';';
		else $root_tag_li_padding = '';
		
		if( isset($root_tag_color) && $root_tag_color != '' ) $root_tag_color = 'background:'.$root_tag_color.';';
		else $root_tag_color = '';
		
		if( isset($border_radius) && $border_radius != '' ) $border_radius = 'border-radius:'.$border_radius.';';
		else $border_radius = '';
		
		$return = '';
		$return .= '<div class="kb_tree_viewmenu">';
		//list terms in a given taxonomy
		$args = array(
			'hide_empty'    => 1,
			'child_of' 		=> 0,
			'pad_counts' 	=> 1,
			'hierarchical'	=> 1,
			'parent'        => 0,
			'order'         => $knowledgebase_category_display_order,
			'orderby'       => $knowledgebase_category_display_orderby,
			'number'        => $kb_no_of_category_records,
		); 
		$tax_terms = get_terms('lipikbcat', $args);
		$i = 1;
		/***********************
		***  START MAIN ROOT CATEGORY  ***
		***********************/
		$return .= '<ul class="kb_tree_view_wrap">';
		foreach ($tax_terms as $tax_term) {
			
		// get extra meta value
		$root_cat_login_check = get_option( 'kb_cat_check_login_'.$tax_term->term_id );
		$root_cat_check_user_role = get_option( 'kb_cat_user_role_'.$tax_term->term_id );
		// eof exta meta value	
			
		if( $i == 1 ) { 
			$call_css = 'open-ul-first';
		} else {  
			$call_css = '';	
		}
		$return .= '<li class="root_cat" style="'.$root_tag_li_padding.' '.$root_tag_color.' '.$border_radius.' ">';
			// Root Category
			$return .= '<'.$title_tag.'><a rel="'.$tax_term->term_id.'" class="kb-tree-recdisplay '.$call_css.'">';
			$cat_title = $tax_term->name; 
			$return .= html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
			$return .= '</a></'.$title_tag.'>';
			
			/***********************
			***  CHECK CHILD CATEGORY  ***
			***********************/
			$kb_subcat_args = array(
			  'orderby' => 'name',
			  //'order'   => $cat_display_order,
			  'child_of' => $tax_term->term_id,
			  'parent' => $tax_term->term_id
			);
			$kb_sub_categories = get_terms('lipikbcat', $kb_subcat_args);
			if ($kb_sub_categories) {
				$return .= '<ul class="kb-tree-chidcat-'.$tax_term->term_id.' kb_tree_chid_cat_wrap close_record">'; // hide
				foreach($kb_sub_categories as $kb_sub_category_list) {
					
					// get extra meta value
					$root_subcat_login_check = get_option( 'kb_cat_check_login_'.$kb_sub_category_list->term_id );
					$root_subcat_check_user_role = get_option( 'kb_cat_user_role_'.$kb_sub_category_list->term_id );
					// eof exta meta value	
					
					$return .= '<li class="root_cat_child">';
					$subcat_title = $kb_sub_category_list->name; 
					$return .= '<'.$title_tag.'><a rel="'.$kb_sub_category_list->term_id.'" class="kb-tree-recdisplay">';
					$return .= html_entity_decode($subcat_title, ENT_QUOTES, "UTF-8");
					$return .= '</a></'.$title_tag.'>';
						/***********************
						***  DISPLAY RECORDS  ***
						***********************/
						$kb_childargs_list = array( 
							'post_type'  => 'lipi_kb',
							'orderby' => $knowledgebase_records_display_order,
							'order'  => $knowledgebase_records_display_orderby,
							'tax_query' => array(
								array(
									'taxonomy' => 'lipikbcat',
									'field' => 'id',
									'include_children' => false,
									'terms' => $kb_sub_category_list->term_id
								)
							)
						);
						$kb_childposts = get_posts( $kb_childargs_list );
						$return .= '<ul class="kb-tree-records-'.$kb_sub_category_list->term_id.' tree_child_records close_record">';
						
						// check login 
						if( isset($root_subcat_login_check) && $root_subcat_login_check == true && !is_user_logged_in() ) {
							$return .='<li class="kb_tree_title" style="color:red;">'.$kb_private_category.'</li>';
						} else {
						/**************************************
						** Check USER ROLE AFTER USER LOGIN**
						***************************************/
						$access_status_subcat = lipi__useraccesslevel($root_subcat_check_user_role);
						if( $root_subcat_login_check == 1 && is_user_logged_in() && $access_status_subcat == false ) { 
							$return .= '<li class="kb_tree_title" style="color:red;">';
							$return .= esc_html($lipi_theme_options['kb-cat-page-access-control-message']);
							$return .= '</li>';
						} else {
							foreach( $kb_childposts as $kbchildpost ) {
								$return .='<li class="kb_tree_title">';
								$return .='<i class="arrow_carrot-right"></i> <a href="'.get_permalink($kbchildpost->ID).'" class="kb_tree_title">';
								$return .= html_entity_decode($kbchildpost->post_title, ENT_QUOTES, "UTF-8");
								$return .='</a>';
								$return .='</li>';
							}
						}
						}
						$return .= '</ul>';
						/***********************
						***  EOF DISPLAY RECORDS  ***
						***********************/
					$return .= '</li>';
				}
				$return .= '</ul>';
			}
			/***********************
			***  EOF CHILD CATEGORY  ***
			***********************/
			
			/***********************
			***  DISPLAY ROOT RECORDS  ***
			***********************/
				$kbroot_args = array(
					'post_type' => 'lipi_kb',
					'orderby' => $knowledgebase_records_display_order,
					'order'  => $knowledgebase_records_display_orderby,
					'posts_per_page' => '-1',
					'tax_query' => array(
							array(
								'taxonomy' => 'lipikbcat',
								'field' => 'id',
								'include_children' => false,
								'terms' => $tax_term->term_id
								)
							),
				);
				$kb_rootposts = get_posts( $kbroot_args );
				$return .= '<ul class="kb-tree-records-'.$tax_term->term_id.' kbroot_cat_records close_record">';
					// check login 
					if( isset($root_cat_login_check) && $root_cat_login_check == true && !is_user_logged_in() ) {
						$return .='<li class="kb_tree_title" style="color:red;">'.$kb_private_category.'</li>';
					} else {
						/**************************************
						** Check USER ROLE AFTER USER LOGIN**
						***************************************/
						$access_status = lipi__useraccesslevel($root_cat_check_user_role);
						if( $root_cat_login_check == 1 && is_user_logged_in() && $access_status == false ) { 
							$return .= '<li class="kb_tree_title" style="color:red;">';
							$return .= esc_html($lipi_theme_options['kb-cat-page-access-control-message']);
							$return .= '</li>';
						} else {
							foreach( $kb_rootposts as $kbpost_list ) {
								$return .='<li class="kb_tree_title">';
								$return .='<i class="arrow_carrot-right"></i> <a href="'.get_permalink($kbpost_list->ID).'" >';
								$return .= html_entity_decode($kbpost_list->post_title, ENT_QUOTES, "UTF-8");
								$return .='</a>';
								$return .='</li>';
							}
						}
					}
				$return .= '</ul>';
			/***********************
			*** EOF DISPLAY ROOT RECORDS  ***
			***********************/
			
		$return .= '</li>';
		$i++;
		}
		$return .= '</ul>';
		/***********************
		***  EOF MAIN ROOT CATEGORY  ***
		***********************/
		wp_reset_postdata();
		$return .= '</div>';
		return $return;
	}
}
add_shortcode('lipi__knowledgebase_tree_menu', 'lipi__knowledgebase_tree_menu');


/*************************************
***    ADD VC SC 17 :: FAQ SINGLE CATEGORY ARTICLE   ***
**************************************/
if(!function_exists("lipi__theme_faq_articles")){
	function lipi__theme_faq_articles( $atts, $content = null ) {
		global $post, $lipi_theme_options;
		extract( shortcode_atts( array( 
			"page_per_post"   => "",
			"post_order"   => "",
			"post_orderby" => "",
			"include_child_post" => "",
			"faqsinglecatid"   => "",
			"hide_pagination"   => "no",
		), $atts ) );
		
		if( $page_per_post != '' ) $page_per_post = $page_per_post;
		else $page_per_post = '-1';
		
		if( $post_order != '' ) $post_order = $post_order;
		else $post_order = 'DESC';
		
		if( $post_orderby != '' ) $post_orderby = $post_orderby;
		else $post_orderby = 'none';
		
		if( $include_child_post != '' && $include_child_post == 'yes' ) $include_child_post = true;
		else if( $include_child_post != '' && $include_child_post == 'no' ) $include_child_post = false;
		else $include_child_post = true;
		
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
		$args = array( 
			'posts_per_page' => $page_per_post, 
			'paged' => $paged,
			'post_type'  => 'lipi_faq',
			'orderby' => $post_orderby,
			'order'  => $post_order,
			'tax_query' => array(
				array(
					'taxonomy' => 'lipifaqcat',
					'field' => 'id',
					'include_children' => $include_child_post,
					'terms' => $faqsinglecatid
				)
			)
		 );
		
		$return = '';
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
		
			$return = '<div style="clear:both" class="knowledgebase-cat-body sc-kb-single">';
			
			$return .= '<div class="display-faq-section">';
			 while ( $the_query->have_posts() ) : $the_query->the_post();
			 
			 	$content = get_the_content();
			 	$content = apply_filters('the_content', $content);
			    $content = str_replace(']]>', ']]&gt;', $content);
			 
				$return .= '<div class="collapsible-panels theme-faq-cat-pg" id="'. $post->ID .'">
							  <h5 class="title-faq-cat"><a href="#">'. $post->post_title .'</a></h5>
							  <div class="entry-content clearfix">
								'. $content .' ';
				$return .= '</div>
							</div>';
			
			 endwhile;
			 $return .= '</div>';
			
		}
		
		if( $hide_pagination == 'no' ) {
		// pagination here 
        $return .= '<div class="vc_sc_kb_single_cat">
						<ul class="pagination">
							<li class="vc_sc_kb_single_cat_page">'. get_next_posts_link( 'Next Page', $the_query->max_num_pages ).'</li>
							<li class="vc_sc_kb_single_cat_page">'. get_previous_posts_link( 'Previous Page' ).'</li>
						</ul>
					</div>';
		}
		
		wp_reset_postdata(); 
		$return .= '</div>';
		
		return $return;
	}
}
add_shortcode('lipi__theme_faq_articles', 'lipi__theme_faq_articles');



/*************************************
***    ADD VC SC 18 :: IMAGE FRAME   ***
**************************************/
if(!function_exists("lipi__theme_image_frame")){
	function lipi__theme_image_frame( $atts, $content = null ) {
		global $post, $lipi_theme_options;
		extract( shortcode_atts( array( 
			"image_frame"   => "",
			"image_title"   => "",
			"font_color" => "",
			"text_align" => "",
			"image_align" => "",
			"font_size"   => "",
			"font_weight" => "",
			"image_hover_style" => "hvr-bob",
			"remove_box_shadow" => "",
			"image_box_padding" => "",
			"imageshortinfo" => "",
			"description_font_color" => "",
			"description_font_size" => "13px",
			"description_font_weight" => "",
			"title_tag" => "h5",
			"title_text_margin" => "",
			"image_radius" => "",
		), $atts ) );
		
		$title_link = (function_exists("vc_build_link") ? vc_build_link($image_title) : $image_title);
		$image_src = '';
		
		if (is_numeric($image_frame) && isset($image_frame)) {
			$box_shadow_replace = $imagealign = $img_box_padding = '';
			if( $remove_box_shadow == true ) $box_shadow_replace = 'box-shadow:none;';
			//$image_src = wp_get_attachment_image($image_frame, 'lipi-image-700x525', false);
			$image_src = wp_get_attachment_image_src($image_frame, '', false);
			$image_url = $image_src[0];
			
			if(isset($image_align) && $image_align != '') $imagealign = 'text-align:'.$image_align.';';
			if( isset($image_box_padding) && $image_box_padding != '' ) $img_box_padding = 'padding:'.$image_box_padding.';';
			
			if( empty($title_link['target']) ) $link_target = '_parent';
			else $link_target = $title_link['target'];
			
			$imageframe__image_radius = $imageframe__title_text_margin = $imageframe__description_font_color = $imageframe__description_font_size = $imageframe__description_font_weight = $imageframe__font_size = $imageframe__font_color = $imageframe__font_weight = '';
			if( isset($image_radius) && $image_radius != '' ){
				$imageframe__image_radius = 'border-radius:'.$image_radius.';';
			}
			if( isset($title_text_margin) && $title_text_margin != '' ){
				$imageframe__title_text_margin = 'margin:'.$title_text_margin.'!important;';
			}
			if( isset($description_font_color) && $description_font_color != '' ){
				$imageframe__description_font_color = 'color:'.$description_font_color.';';
			}
			if( isset($description_font_size) && $description_font_size != '' ){
				$imageframe__description_font_size = 'font-size:'.$description_font_size.';';
			}
			if( isset($description_font_weight) && $description_font_weight != '' ){
				$imageframe__description_font_weight = 'font-weight:'.$description_font_weight.';';
			}
			if( isset($font_size) && $font_size != '' ){
				$imageframe__font_size = 'font-size:'.$font_size.';';
			}
			if( isset($font_color) && $font_color != '' ){
				$imageframe__font_color = 'color:'.$font_color.';';
			}
			if( isset($font_weight) && $font_weight != '' ){
				$imageframe__font_weight = 'font-weight:'.$font_weight.';';
			}
			
			$return = '<div class="image_frame_holder">
		
					<div class="image_holder '.$image_hover_style.'" style="'.$box_shadow_replace.''.$imagealign.''.$img_box_padding.' ">
						<span class="image">
							<a href="'.$title_link['url'].'" target="_blank">
							    <img class="lazy" data-src="'.$image_url.'" width="'.$image_src[1].'" height="'.$image_src[2].'" alt="" style=" '.$imageframe__image_radius.' ">
							</a>
						</span>
					</div>
					
					<div class="title_holder" style="text-align:'.$text_align.';">
						<'.$title_tag.' class="title_name" style=" '.$imageframe__title_text_margin.' ">
							<a href="'.$title_link['url'].'" style=" '.$imageframe__font_size.' '.$imageframe__font_color.' '.$imageframe__font_weight.' " target="'.$link_target.'" class="link">'.$title_link['title'].'</a>
						</'.$title_tag.'>';
			if( isset($imageshortinfo) && $imageshortinfo != '' ) $return .= '<p style=" '.$imageframe__description_font_color.' '.$imageframe__description_font_size.' '.$imageframe__description_font_weight.' ">'.$imageshortinfo.'</p>';
			$return .= '</div></div>';
		  return $return;
		} 
	}
}
add_shortcode('lipi__theme_image_frame', 'lipi__theme_image_frame');




/*************************************
***    ADD VC SC 19 :: PORTFOLIO - IMAGE  ***
**************************************/
if(!function_exists("lipi__portfolio_images")){
	function lipi__portfolio_images( $atts, $content = null ) {
		
		global $post;
		extract( shortcode_atts( array( 
			"upload_images"  => "",
			"image_display_type"  => "",
			"image_size"  => "",
			"masonry_column"  => "4",
		), $atts ) );
		
		$return = '';
		
		if( $upload_images != '' && isset($upload_images) ) {
			$upload_images = explode(",", $upload_images);
			
			if( $image_display_type == 'masonry' ) {
				$return .= '<div class="masonry-grid">';
				foreach ( (array) $upload_images as $key => $val ){
					$image = wp_get_attachment_image_src( $val, $image_size);
					$return .= '<div class="masonry-item col-md-'.$masonry_column.' col-sm-6 fix-padding-right-0 fix-padding-left-0" >';
					$return .= '<a href="'. $image[0] .'" data-lightbox="true"><img alt="" src="'. esc_url($image[0]) .'" /></a>';
					$return .= '</div>';
				}
				$return .= '</div>';
				
			} else if( $image_display_type == 'slider' ) {
				$return .= '<div class="blog-flexslider background-none"><ul class="slides">';
				foreach ( (array) $upload_images as $key => $val ){
					$image = wp_get_attachment_image_src( $val, $image_size);
					$return .= '<li><img alt="" src="'. esc_url($image[0]) .'"></li>';
				}
				$return .= '</ul></div>';

			} else {
				foreach ( (array) $upload_images as $key => $val ){
					$image = wp_get_attachment_image_src( $val, $image_size);
					$return .= '<img alt="" src="'. esc_url($image[0]) .'" />';
				}
			}
			
		} else {
			$return .= '';
		}
		
	return $return;
	}
}
add_shortcode('lipi__portfolio_images', 'lipi__portfolio_images');



/*************************************
***    ADD VC SC 20 :: SOCIAL SHARE  ***
**************************************/
if(!function_exists("lipi__social_share")){
	function lipi__social_share( $atts, $content = null ) {
		
		global $post;
		extract( shortcode_atts( array( 
			"display_social_share"  => "",
			"position"  => "",
		), $atts ) );
		
		$return = '';
		if($display_social_share == true) $return .= lipi__portfolio_social_share(get_permalink(), true, $position); 
		
		return $return;
	}
}
add_shortcode('lipi__social_share', 'lipi__social_share');




/*****************************************
***    ADD VC SC 21 :: SERVICES   ***
******************************************/
if(!function_exists("lipi__theme_services_list")){
	function lipi__theme_services_list( $atts, $content = null ) {
		$filter_padding_align_li = $padding_zero_class = '';
		global $post;
		extract( shortcode_atts( array( 
			"services_type"             => "Masonry",
			"padding_zero"               => "",
			"services_shorting"         => "yes",
			"filter_padding"             => "",
			"filter_color"               => "",
			"filter_align"               => "",
			"sorting_order"              => "ASC",
			"sorting_order_by"           => "name",
			"category"                   => "",
			"selected_projects"          => "",
			"number_of_post"             => "",
			"services_order"            => "DESC",
			"services_order_by"         => "date",
			"services_column"           => "3",
			"show_title"                 => "yes",
			"link_color"                 => "",
			"show_categories"            => "yes",
			"link_cat_color"             => "",
			"show_load_more"        	 => "yes",
			"show_load_more_align"       => "center",
			"show_load_more_margin"      => "",
			"title_tag"                  => "h4",
		), $atts ) );
		
		$time_start = microtime(true);
		$time_start = explode(".", $time_start);
		
		// Portfolio Type
		if( isset($services_type) && $services_type != '') {
			if( $services_type == 'FitRows' ) {
				$image_handler_size = 'lipi-image-700x525';
				$services_type_class = 'isotope-container-grid';
				if( $services_shorting == 'yes' ) $portfolio_sorting_group = 'portfolio-sorting-fitrows-section';
			} else {
				$image_handler_size = 'large';
				$services_type_class = 'isotope-container-masnory';
				if( $services_shorting == 'yes' ) $portfolio_sorting_group = 'portfolio-sorting-section';
			}
		} else {
			$image_handler_size = 'large';
			$services_type_class = 'isotope-container-masnory';
			if( $services_shorting == 'yes' ) $portfolio_sorting_group = 'portfolio-sorting-section';
		}
		
		$vcservices__link_color = '';
		if( isset($link_color) && $link_color != "" ) {
			$vcservices__link_color = 'color:'.$link_color.'';
		}
		$return = '<style>.title_color_'.$time_start[1].' { '.$vcservices__link_color.' }</style><span></span>';
		
		// Portfolio shorting 
		if( isset($services_shorting) && $services_shorting != '' && $services_shorting == 'yes') {
			
			if( isset($filter_padding) && !empty($filter_padding) ) $filter_padding = $filter_padding;
			else $filter_padding = '50px';
			
			if( !empty($filter_align) ) {
				if( $filter_align == 'left' ) $filter_padding_align_li = 'padding:10px 18px 10px 0px;';
				else if( $filter_align == 'center' ) $filter_padding_align_li = 'padding: 10px 10px;';
				else if( $filter_align == 'right' ) $filter_padding_align_li = 'padding: 10px 0px 10px 18px;';
			}
			
			$cat_slug_name = array();
			if( !empty($category) ) {
				$category = preg_replace('/\s+/', '', $category);
				$cat_slug_name = explode(",", $category);
			}
			
			$args = array(
				'hide_empty'    => 1,
				'child_of' 		=> 0,
				'pad_counts' 	=> 1,
				'hierarchical'	=> 1,
				'order'         => $sorting_order,
				'orderby'       => $sorting_order_by,
			); 
			$tax_terms = get_terms('lipisvscat', $args);
			$tax_terms = wp_list_filter($tax_terms,array('parent'=>0));
			
			// css control
			$vcportfolio__filter_align = $vcportfolio__filter_padding = $vcportfolio__filter_color = '';
			if( isset($filter_align) && $filter_align != "" ){
				$vcportfolio__filter_align = 'text-align:'.$filter_align.';';
			}
			if( isset($filter_padding) && $filter_padding != "" ){
				$vcportfolio__filter_padding = 'padding:'.$filter_padding.' 0px;';
			}
			if( isset($filter_color) && $filter_color != "" ){
				$vcportfolio__filter_color = 'color:'.$filter_color.';';
			}
			
			$return .= '<div class="'.$portfolio_sorting_group.'" style=" '.$vcportfolio__filter_align.' '.$vcportfolio__filter_padding.' '.$vcportfolio__filter_color.' "><ul>';
			
			if( ! empty($tax_terms) ) { 
				
				$return .= '<li style="'.$filter_padding_align_li.'" data-filter-masnory="*" class="selected"><span>'. esc_html__( 'All', 'lipi-framework' ) .'</span></li>';
				foreach ($tax_terms as $tax_term) { 
					 if ( !empty($cat_slug_name) && !in_array( trim($tax_term->slug), $cat_slug_name ) ) continue; 
					 $cat_title = $tax_term->name; 
					 $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
					 $cat_title_filter = strtolower($cat_title);
					 $cat_title_filter = preg_replace("/[\s_]/", "-", $cat_title_filter);
					 $return .= '<li style="'.$filter_padding_align_li.'" data-filter-masnory=".'.strtolower($cat_title_filter).'"><span>'. $cat_title .'</span></li>';
			 	}
				
			}
			$return .= '</ul></div>';
			
		}
		// Eof portfolio shorting
		
		if( isset($number_of_post) && $number_of_post != '' ) $number_of_post = $number_of_post;
		else $number_of_post = '-1';
		
		$return .= '<div class="portfolio-readjust-container">';	
		$term_slug = get_query_var( 'term' );
		
		// pagination solved for the landing page.
		global $paged;
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }
		
		if ($category == "") {
				$args = array(
	 				'post_type' => 'lipi_services',
					'posts_per_page' => $number_of_post,
					'orderby' => $services_order_by,
					'post_status' => 'publish',
					'order' => $services_order,
					'paged' => $paged,
				);
		} else {
				$args = array(
	 				'post_type' => 'lipi_services',
					'lipisvscat' => $category,
					'posts_per_page' => $number_of_post,
					'orderby' => $services_order_by,
					'post_status' => 'publish',
					'order' => $services_order,
					'paged' => $paged,
				);
		}
		
		$project_ids = null;
		if ($selected_projects != "") {
			$selected_projects = preg_replace('/\s+/', '', $selected_projects);
			$project_ids = explode(",", $selected_projects);
			$args['post__in'] = $project_ids;
		}
		
		if( $padding_zero == true ) $padding_zero_class = 'fix-padding-left-0 fix-padding-right-0 portfolio-margin-btm-0';
				
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
			$return .= '<div class="projects_holder portfolio-define-section '.$services_type_class.'">';
			
			while($wp_query->have_posts()) : $wp_query->the_post();
				$taxonomies = get_object_taxonomies( $post->post_type, 'objects' ); 
				$out = array();
				$data_category = array();
				foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
					// get the terms related to post
					$terms = get_the_terms( $post->ID, $taxonomy_slug );
					if ( !empty( $terms ) ) {
						foreach ( $terms as $term ) {
							$out[] = $term->name;
							$data_category[] = $term->name;
						}
					}
				}
				
				$return .= '<div class="col-md-'.$services_column.' col-sm-6 element-item portfolio-section-records '.$padding_zero_class.' ';
				foreach( $data_category as $val ) { $return .=  preg_replace("/[\s_]/", "-", strtolower($val)).' '; }
				$return .= '">';
					// Image section
					$return .= '<div class="portfolio-image"><a href="'.get_permalink($wp_query->post->ID).'">';
					if ( has_post_thumbnail()) { 
						$return .= get_the_post_thumbnail( $wp_query->post->ID, $image_handler_size, array( 'class' => 'hvr-float' ) );
					} else {
						$return .= '<img width="700" height="525" src="'. trailingslashit( get_template_directory_uri() ).'img/no-portfolio-img.jpg" class="hvr-float wp-post-image" alt="">';
					}
					$return .= '</a></div>';
					// Content section
					$return .= '<div class="portfolio-desc">';
					if( $show_title == 'yes' ) {
						$no_title_br = '';
						$return .= '<a href="'. get_permalink($wp_query->post->ID).'"><'.$title_tag.' class="entry-title title_color_'.$time_start[1].'"> ';
						$title = get_the_title(); 
						$return .= html_entity_decode($title, ENT_QUOTES, "UTF-8");
						$return .= '</'.$title_tag.'></a>';
					} else { 
						$no_title_br = '<div style="height:9px"></div>'; 
					}
					$services__link_cat_color = '';	
					if( isset($link_cat_color) && $link_cat_color != '' ) {
						$services__link_cat_color = 'color:'.$link_cat_color.'';	
					}
					if( $show_categories == 'yes' ) $return .= $no_title_br.'<span style=" '.$services__link_cat_color.' ">'. implode(', ', $out ).' </span>';
					$return .= '</div>';
				$return .= '</div>';
			 endwhile;
			 
			 	$i = 1;
                while ($i <= $services_column) {
                    $i++;
                    if ($services_column != 1) {
                        $return .= "<div class='filler'></div>\n";
                    }
                }
				
			  $return .= '</div>';
		} else {
			$return .= '<p class="no-records"> '. esc_html__('Sorry, no posts matched your criteria.', 'lipi-framework') .'</p>';
		}
		$return .= '</div>';
		
		if ($show_load_more == "yes" && $wp_query->max_num_pages != 0 && ($wp_query->found_posts > $number_of_post) ) { 
		if( isset($show_load_more_margin) && $show_load_more_margin != '' ) $show_load_more_margin = $show_load_more_margin;
		else $show_load_more_margin = '20px';
			
			$services__show_load_more_align = $services__show_load_more_margin = '';
			if(isset($show_load_more_align) && $show_load_more_align != '' ) {
				$services__show_load_more_align = 'text-align:'.$show_load_more_align.';';
			}
			if(isset($show_load_more_margin) && $show_load_more_margin != '' ) {
				$services__show_load_more_margin = 'margin:'.$show_load_more_margin.' 0px;';
			}
			
			$return .= '<div style=" '.$services__show_load_more_align.' '.$services__show_load_more_margin.' ">';
			$return .= '<div class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="ajax_load_more_post custom-botton hvr-icon-spin" style="padding: 9px 37px 10px 24px;">' . get_next_posts_link(esc_html__('Show more', 'lipi-framework'), $wp_query->max_num_pages) . '&nbsp;&nbsp;<i class="fas fa-sync-alt hvr-icon"></i></span></div>';
			$return .= '<div class="portfolio_paging_loading"><a href="javascript: void(0)" class="custom-botton" style="padding: 9px 37px 10px 24px;">'.esc_html__('Loading...', 'lipi-framework').'</a></div>';
			$return .= '</div>';
		}
		
		wp_reset_query();
		
		return $return;
	}
add_shortcode('lipi__theme_services_list', 'lipi__theme_services_list');	
}



/*************************************
***    ADD VC SC 22 :: PAGES     ***
**************************************/
if(!function_exists("lipi__theme_pages_list")){
	function lipi__theme_pages_list( $atts, $content = null ) {
		global $post;
		$currentpost = $post->ID;
		$class = '';
		extract( shortcode_atts( array( 
			"title"   => "",
			"title_tag"   => "h5",
			"post_type"   => "lipi_services",
			"category"   => "",
			"number_of_records"   => "-1",
			"page_order"   => "",
			"page_order_by"   => "",
			"page_by_id"   => "",
		), $atts ) );
		
		$return = '';
		if( $title != '' ) $return .= '<'.$title_tag.'>'.$title.'</'.$title_tag.'>';
		
		if( $post_type == 'lipi_services' ) $category_name = 'lipisvscat';
		else if( $post_type == 'lipi_portfolio' ) $category_name = 'lipiptfocategory';
		else $category_name = '';
		
		$args = array(
			'post_type' => $post_type,
			//$category_name => $category,
			'posts_per_page' => $number_of_records,
			'orderby' => $page_order_by,
			'post_status' => 'publish',
			'order' => $page_order,
		);
		
		$project_ids = null;
		if ($page_by_id != "") {
			$page_by_id = preg_replace('/\s+/', '', $page_by_id);
			$page_by_ids = explode(",", $page_by_id);
			$args['post__in'] = $page_by_ids;
		}
		
		if($category_name != "") {
		   $args[$category_name] = $category;
		}
		
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()) {
			$return .= '<div class="display-faq-section"><ul>';
			while($wp_query->have_posts()) : $wp_query->the_post();
					if($currentpost == $wp_query->post->ID) { $class = 'class="current-cat"'; } else { $class = ''; }
					$return .= '<li '.$class.'><a href="'. get_permalink($wp_query->post->ID).'">';
					$title = get_the_title(); 
					$return .= html_entity_decode($title, ENT_QUOTES, "UTF-8");
					$return .= '</a></li>';
			endwhile;
			$return .= '</ul></div>';
		}
		wp_reset_query();
		
		
	    return $return;
	}
add_shortcode('lipi__theme_pages_list', 'lipi__theme_pages_list');	
}





/*************************************
***    ADD VC SC 23 :: VIDEO     ***
**************************************/
if(!function_exists("lipi__theme_popup")){
	function lipi__theme_popup( $atts, $content = null ) {
		global $post;
		$currentpost = $post->ID;
		$class = '';
		extract( shortcode_atts( array( 
			"video_url"   => "",
			"video_image"   => "",
			"player_icon_color"   => "#ffffff",
			"player_icon_font_size" => "60px",
			"player_icon_margin" => "-45px 0px 0px -23px",
		), $atts ) );
		
		if (is_numeric($video_image) && isset($video_image)) {
			$image_src = wp_get_attachment_url($video_image);
		} else {
			$image_src = '';
		}
		
		$return = '';
		$return .= '<a class="theme-video-play" href="'.$video_url.'"><img src="'.$image_src.'" alt="video" class="theme_image_fade_vc">
						<i class="fas fa-play" style="position: absolute;top: 50%;left: 50%;font-size: '.$player_icon_font_size.';color:'.$player_icon_color.';margin:'.$player_icon_margin.';"></i>
					</a>';

	    return $return;
	}
add_shortcode('lipi__theme_popup', 'lipi__theme_popup');	
}


/*************************************
***    ADD VC SC 11.2 :: BLOG POST ***
**************************************/
if (!function_exists('lipi__theme_blog_post_style')) {
    function lipi__theme_blog_post_style($atts, $content = null) {
		
		$columns_number = "";
		
        $args = array(
            "type"       			=> "list",
			"title_tag"             => "h4",
			"order_by"              => "",   
            "order"                 => "", 
			"number_of_posts"       => "3",
			"category"              => "",
			"list_margin_bottom"	=> "30px",
			"trim_content_text"     => "15",
			"offset_post"           => "",
        );
		
		extract(shortcode_atts($args, $atts));
		
		if(is_home() || is_front_page()) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		
		$return = '';
		
		$q = new WP_Query(
			array('orderby' => $order_by, 'order' => $order, 'posts_per_page' => $number_of_posts, 'category_name' => $category, 'paged' => $paged, 'offset' => $offset_post, )
		);
		if($q->have_posts()) {
			
		/*** LIST VIEW ***/	
		if( $type == 'list' ) {
			while ($q->have_posts()) : $q->the_post();
			$return .= '<div class="list-content"><'.$title_tag.'><a href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'></div>';
			//<p style="color: #989898;"><span class="entry-date published updated">' . get_the_time('d F, Y') . '</span></p>
			endwhile;
		} else if( $type == 'title_content' ) {
			while ($q->have_posts()) : $q->the_post();
			$blog_content = get_the_content();	
			$return .= '<div class="list-with-content" style="margin-bottom:'.$list_margin_bottom.';"> 
						<'.$title_tag.'><a href="' . get_permalink() . '">' . get_the_title() . '</a></'.$title_tag.'>
						<p>'. wp_trim_words( $blog_content, $trim_content_text, '...' ) .'</p>
						</div>'; // <p style="color: #989898;"><span class="entry-date published updated">' . get_the_time('d F, Y') . '</span></p>
			endwhile;	
		} // eof list view
		
		} else {
			$return .= '<p class="no-records"> '. esc_html__('Sorry, no posts matched your criteria.', 'lipi-framework') .'</p>';
		}
		
		wp_reset_postdata();
	    return $return;
	}
add_shortcode('lipi__theme_blog_post_style', 'lipi__theme_blog_post_style');	
}		
?>