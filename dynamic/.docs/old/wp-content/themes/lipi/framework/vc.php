<?php

/*************************************
***       Removing shortcodes      ***
**************************************/

// Ultimate Addons for WPBakery Page Builder
define('BSF_PRODUCTS_NOTICES', false);
vc_set_as_theme( $disable_updater = true );  // disable vc activation notice

/*** 1 - Deprecated ***/
vc_remove_element("vc_button");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element('vc_button2');
vc_remove_element("vc_tour");
vc_remove_element("vc_accordion");
vc_remove_element("vc_tabs");
/*** 2 - WP ***/ 
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");




/*************************************
***    ADD VC SC 1 :: COUNTER     ***
**************************************/
vc_map( array(
		"name" => esc_html__("Counter", 'lipi'), 
		"base" => "lipi__theme_counter",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Position",
				"param_name" => "position",
				"value" => array(
					"Left" => "left",
					"Right" => "right",	
					"Center" => "center"	
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit",
				"param_name" => "digit",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit Font Size (px)",
				"param_name" => "digit_font_size",
				"description" => "NOTE: Omit using px"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Digit Font Weight",
				"param_name" => "font_weight",
				"value" => array(
					"Default" 			=> "",
					"Thin 100"			=> "100",
					"Extra-Light 200" 	=> "200",
					"Light 300"			=> "300",
					"Regular 400"		=> "400",
					"Medium 500"		=> "500",
					"Semi-Bold 600"		=> "600",
					"Bold 700"			=> "700",
					"Extra-Bold 800"	=> "800",
					"Ultra-Bold 900"	=> "900"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Font Digit Color",
				"param_name" => "font_color",
				"description" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "text",
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Text Tag",
				"param_name" => "digit_tag",
				"value" => array(
					""   => "",
					"h3" => "h3",	
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Font Size (px)",
				"param_name" => "text_font_size",
				"description" => "NOTE: Omit using px"
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Font Weight",
				"param_name" => "text_font_weight",
				"value" => array(
					"Default" => "",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900"
				)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Transform",
				"param_name" => "text_transform",
				"value" => array(
					"Default" 			=> "uppercase",
					"None"				=> "none",
					"Capitalize" 		=> "capitalize",
					"Uppercase"			=> "uppercase",
					"Lowercase"			=> "lowercase"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Text Color",
				"param_name" => "text_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator",
				"param_name" => "separator",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"
				),
				'save_always' => true,
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Separator Color",
				"param_name" => "separator_color",
				"description" => "",
				"dependency" => array('element' => "separator", 'value' => array('yes'))
			),
			
	)
) );



/*************************************
***    ADD VC SC 2 :: TEAM       ***
**************************************/

vc_map( array(
		"name" => esc_html__("Team", 'lipi'), 
		"base" => "lipi__theme_team",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Image", 'lipi'), 
				"param_name" => "team_image"
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Name", 'lipi'), 
				"param_name" => "team_name"
			),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Name Tag",
				"param_name" => "title_tag",
				"value" => array(
					""   => "",
					"h3" => "h3",	
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
			),
				
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Name Color", 'lipi'), 
				"param_name" => "name_color",
				"description" => ""
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Position", 'lipi'),
				"param_name" => "team_position"
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Position Color", 'lipi'), 
				"param_name" => "position_color",
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Show Separator", 'lipi'), 
				"param_name" => "show_separator",
				"value" => array(
					"Yes" => "yes",
					"No" => "no"
				),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Separator Color", 'lipi'), 
				"param_name" => "separator_color",
				"value" => "#1abc9c",
				"dependency" => array('element' => "show_separator", 'value' => array('yes','')),
				"description" => ""
			),
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icons Color", 'lipi'),
				"param_name" => "icons_color",
				"value" => "",
				"description" => ""
			),
			// social icons - 1
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 1", 'lipi'), 
				"param_name" => "team_social_icon_1",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 1 Link", 'lipi'), 
				"param_name" => "team_social_icon_1_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Social Icon 1 Target", 'lipi'), 
                "param_name" => "team_social_icon_1_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// social icons - 2
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 2", 'lipi'), 
				"param_name" => "team_social_icon_2",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 2 Link", 'lipi'), 
				"param_name" => "team_social_icon_2_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Social Icon 2 Target", 'lipi'), 
                "param_name" => "team_social_icon_2_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// social icons - 3
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 3", 'lipi'), 
				"param_name" => "team_social_icon_3",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 3 Link", 'lipi'), 
				"param_name" => "team_social_icon_3_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Social Icon 3 Target", 'lipi'), 
                "param_name" => "team_social_icon_3_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// social icons - 4
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 4", 'lipi'), 
				"param_name" => "team_social_icon_4",
				"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Social Icon 4 Link", 'lipi'), 
				"param_name" => "team_social_icon_4_link"
			),
			array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Social Icon 4 Target", 'lipi'), 
                "param_name" => "team_social_icon_4_target",
                "value" => array(
                    "" => "",
                    "Self" => "_self",
                    "Blank" => "_blank",
                    "Parent" => "_parent"
                ),
                "description" => ""
            ),
			// Eof social
		
	)
) );



/*****************************************
***    ADD VC SC 3 :: LINK URL   ***
******************************************/

vc_map( array(
		"name" => esc_html__("Link URL", 'lipi'), 
		"base" => "lipi__sc_link_url",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				 array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", 'lipi'),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", 'lipi'),
				 ),
				 
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Align', 'lipi'),
					"param_name" => "link_align",
					"value" => array(
						"Left" => "left",
						"Center" => "center",
						"Right" => "right",
					),
					'save_always' => true,
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Color', 'lipi'),
					"param_name" => "link_color",
					"description" => ""
				),
			
			
			)
		)
) );



/*****************************************
***    ADD VC SC 4 :: TEXT WITH ICON   ***
******************************************/

vc_map( array(
		"name" => esc_html__("Icon With Text", 'lipi'), 
		"base" => "lipi__sc_icon_with_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Box Background Color", 'lipi'),
					"param_name" => "box_background_color",
					"description" => "",
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Border Radius', 'lipi'),
					"param_name" => "box_border_radius",
					"value" => "",
					"description" => "Default: 0px",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Box Border Color", 'lipi'),
					"param_name" => "box_border_color",
					"description" => "",
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Add Box Shadow', 'lipi'), 
					"param_name" => "box_shadow",
					"value" => array(
						'No' => 'no',
						'Yes' => 'yes',
					),
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Padding', 'lipi'),
					"param_name" => "icon_with_text_box_padding",
					"value" => "",
					"description" => "Default: 0px 0px 30px 0px (top, right, buttom, left)",
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Box CSS Animation', 'lipi'), 
					"param_name" => "box_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Icon Name", 'lipi'),
					"param_name" => "icon_name",
					"value" => "",
					"description" => "Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Position', 'lipi'),
					"param_name" => "display_icon_position",
					"value" => array(
						"Left" => "left",
						"Top" => "top",
						"Left From Title" => "left_from_title",
					),
					'save_always' => true,
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Text Position",
					"param_name" => "top_text_position",
					"value" => array(
						"Center" => "center",
						"Left" => "left",
						"Right" => "right"	
					),
					'save_always' => true,
					"description" => "",
					"dependency" => Array('element' => "display_icon_position", 'value' => array('top'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Margin (px)', 'lipi'),
					"param_name" => "display_icon_top_margin",
					"value" => "",
					"description" => "Margin should be set in a top right bottom left format",
					"dependency" => array('element' => "display_icon_position", 'value' => array('top'))
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Use Custom Icon Size', 'lipi'), 
					"param_name" => "use_custom_icon_size",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"
					),
					'save_always' => true,
					"description" => "Select Yes if you want to use custom icon size and margin"
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Icon Size (px)', 'lipi'), 
					"param_name" => "custom_icon_size",
					"value" => "",
					"description" => "Enter just number, omit px",
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Icon Margin (px)', 'lipi'),
					"param_name" => "custom_icon_margin",
					"value" => "",
					"description" => "Spacing between icon and text (for left icon/margin position). Enter just number, omit px",
					"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', 'lipi'),
					"param_name" => "icon_color",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title', 'lipi'), 
					"param_name" => "title",
					"value" => ""
				),
				array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => "Title Tag",
                    "param_name" => "title_tag",
                    "value" => array(
                        ""   => "",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    ),
                    "description" => ""
                ),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Color', 'lipi'), 
					"param_name" => "title_color",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Font Size (px)', 'lipi'), 
					"param_name" => "title_font_size",
					"value" => "",
					"description" => "Omit px"
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Text Transform', 'lipi'), 
					"param_name" => "title_font_transform",
					"value" => array(
						"Default" 		=> "",
						"capitalize"	=> "capitalize",
						"lowercase" 	=> "lowercase",
						"none" 	=> "none",
						),
					"description" => ""
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Font Weight', 'lipi'), 
					"param_name" => "title_font_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Padding', 'lipi'),
					"param_name" => "custom_title_padding",
					"value" => "",
					"description" => "Default: 0px 0px 0px 65px (top, right, button, left) <br> NOTE: Only work for Icon Position: Left ",
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Margin', 'lipi'),
					"param_name" => "custom_title_margin",
					"value" => "",
					"description" => "Default: 0px 0px 12px 0px (top, right, button, left) <br> NOTE: Only work for Icon Position: Left From Title",
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text', 'lipi'), 
					"param_name" => "text",
					"value" => ""
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text Color', 'lipi'),  
					"param_name" => "text_color",
					"description" => ""
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Custom Top Margin (px)', 'lipi'), 
					"param_name" => "custom_top_margin_maintext_and_text",
					"value" => "",
					"description" => "Spacing between title text and text. Enter just number, omit px",
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Activate Link', 'lipi'), 
					"param_name" => "activate_link",
					"value" => array(
						'' => '',
						'Yes' => 'yes',
						'No' => 'no'
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Options', 'lipi'), 
					"param_name" => "link_icon",
					"value" => array(
						'' => '',
						'Link Only Icon' => 'yes',
						'Link Only Text' => 'no',
						'Link Icon & Text' => 'both',
						'Link Only Box' => 'box'
					),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes'))
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", 'lipi'),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", 'lipi'),
					"dependency" => Array('element' => "activate_link", 'value' => array('yes','box')),
				 ),
				 
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Link Text Transform', 'lipi'), 
					"param_name" => "vc_link_font_transform",
					"value" => array(
						"Default" 		=> "",
						"none"	=> "none",
						),
					"description" => "",
					"dependency" => Array('element' => "link_icon", 'value' => array('no','','both'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Link Text Font Size', 'lipi'), 
					"param_name" => "vc_link_font_size",
					"value" => array(
						"Default" 		=> "",
						"9px"	=> "9px",
						"10px"	=> "10px",
						"11px"	=> "11px",
						"12px"	=> "12px",
						"13px"	=> "13px",
						"14px"	=> "14px",
						"15px"	=> "15px",
						"16px"	=> "16px",
						),
					"description" => "",
					"dependency" => Array('element' => "link_icon", 'value' => array('no','','both'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Link Text Font Weight', 'lipi'), 
					"param_name" => "vc_link_font_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => "",
					"dependency" => Array('element' => "link_icon", 'value' => array('no','','both'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Link Color", 'lipi'),
					"param_name" => "link_color",
					"description" => "",
					"dependency" => Array('element' => "link_icon", 'value' => array('no','','both'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Link Top Margin', 'lipi'), 
					"param_name" => "link_margin_top",
					"value" => "",
					"description" => "Spacing between title text and link. Example: 12px, -12px",
				),
				

			)
		)
) );



/*****************************************
***    ADD VC SC 5 :: BUTTON   ***
******************************************/

vc_map( array(
		"name" => esc_html__("Button", 'lipi'), 
		"base" => "lipi__sc_button_url",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Botton Margin", 'lipi'),
					"param_name" => "bottom_margin",
					"value" => "0px 0px 0px 0px",
					"description" => "(Default: 0px 0px 0px 0px;) == top right button left (Include px)",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Botton CSS Animation', 'lipi'), 
					"param_name" => "button_css_animation",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => ""
				),
			
				 array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Link", 'lipi'),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", 'lipi'),
				 ),
				 
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Align', 'lipi'),
					"param_name" => "link_align",
					"value" => array(
						"Left" => "left",
						"Center" => "center",
						"Right" => "right",
					),
					'save_always' => true,
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Text Color', 'lipi'),
					"param_name" => "link_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Text Size", 'lipi'),
					"param_name" => "text_size",
					"value" => "",
					"description" => "Include px example:17px",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Text Padding", 'lipi'),
					"param_name" => "text_padding",
					"value" => "",
					"description" => "Default: 0px 22px; (top/button left/right) Include px",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Color', 'lipi'),
					"param_name" => "button_color",
					"description" => ""
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Remove Border Bottom', 'lipi'),  
					"param_name" => "remove_border_buttom",
					"description" => ""
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Remove Text Shadow', 'lipi'),  
					"param_name" => "remove_text_shadow",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Border Radius', 'lipi'),  
					"param_name" => "border_radius",
					"value" => "",
					"description" => "Include px (example: 3px)"
				),
			
			
			)
		)
) );



/*****************************************
***    ADD VC SC 5 :: MESSAGE BOX   ***
******************************************/

vc_map( array(
		"name" => esc_html__("Message Box", 'lipi'), 
		"base" => "lipi__sc_message_box",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Message Box Border', 'lipi'), 
					"param_name" => "message_box_border",
					"value" => array(
						"Default" => "",
						"No"	  => "no",
						"Yes" 	  => "yes",
						),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Message Box Background Color", 'lipi'),
					"param_name" => "message_box_background_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Border Color", 'lipi'),
					"param_name" => "message_box_border_color",
					"description" => "",
					"dependency" => Array('element' => "message_box_border", 'value' => array('yes'))
				),
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title Text", 'lipi'),
					"param_name" => "title_text",
					"value" => "",
					"description" => "",
				),
				
				 array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
	                    ""   => "",
						"h2" => "h2",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
	            ),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title Font Size", 'lipi'),
					"param_name" => "title_text_font_size",
					"value" => "",
					"description" => "Default:24px (Enter value as: 24px)",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Text Weight', 'lipi'), 
					"param_name" => "title_text_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Text Color', 'lipi'),
					"param_name" => "title_text_color",
					"description" => ""
				),
				
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Short Message Text", 'lipi'),
					"param_name" => "short_message_text",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Short Message Font Size", 'lipi'),
					"param_name" => "short_message_text_font_size",
					"value" => "",
					"description" => "Default:16px (Enter value as: 16px)",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Short Message Text Weight', 'lipi'), 
					"param_name" => "short_message_text_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Short Message Text Color', 'lipi'),
					"param_name" => "short_message_text_color",
					"description" => ""
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Button Link", 'lipi'),
					"param_name"  => "link",
					"value"       => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Text Color', 'lipi'),
					"param_name" => "button_text_color",
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Background Color', 'lipi'),
					"param_name" => "button_bg_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Readjust Button Margin Top", 'lipi'),
					"param_name" => "button_margin_top",
					"value" => "",
					"description" => "adjust value only if needed (Default: -63px)",
				),
			
			)
		)
) );



/*************************************
***  ADD VC SC 6 :: PRICING TABLE  ***
**************************************/

 vc_map( array(
	"name" => esc_html__("Pricing Table", 'lipi'),
	"base" => "theme_pricing_table_section",
	"category" => 'lipi',
	"as_parent" => array('only' => 'theme_pricing_option'),
	"content_element" => true,
	"show_settings_on_create" => true,
	"js_view" => 'VcColumnView',
	"params"            => array(
	
				 array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => esc_html__("Title", 'lipi'),
					"param_name"  => "title",
					"value"       => "",
					"description" => esc_html__("The title of the service section", 'lipi')
				 ),
				 
				 array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				 
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Price", 'lipi'), 
					"param_name" => "price",
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Price Color', 'lipi'), 
					"param_name" => "price_color",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Price Weight', 'lipi'), 
					"param_name" => "price_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Price Font Size", 'lipi'),
					"param_name" => "price_size",
					"description" => "Default: 60px"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Currency", 'lipi'),
					"param_name" => "currency",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Price Period", 'lipi'),
					"param_name" => "price_period",
					"description" => ""
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Button Link", 'lipi'),
					"param_name"  => "link",
					"value"       => "",
					"description" => esc_html__("Link URL", 'lipi')
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Make Box Standout", 'lipi'),
					"param_name" => "active",
					"value" => array(
						"No" => "no",
						"Yes" => "yes"	
					),
					'save_always' => true,
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Standout Border Color', 'lipi'), 
					"param_name" => "standout_border_color",
					"description" => "",
					"dependency" => Array('element' => "active", 'value' => array('yes')),
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Disable Box Shadow', 'lipi'), 
					"param_name" => "standout_border_no_shadow",
					"description" => "",
					"dependency" => Array('element' => "active", 'value' => array('yes')),
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Background Color', 'lipi'), 
					"param_name" => "background_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Box Border Color', 'lipi'), 
					"param_name" => "box_border_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__('Text Color', 'lipi'), 
					"param_name" => "text_color",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Color', 'lipi'),
					"param_name" => "buttom_color",
					"value" => array(
						"" => "",
						"Custom Button" => "custom-button",
					),
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Color', 'lipi'), 
					"param_name" => "buttom_color_custom",
					"description" => "",
					"dependency" => Array('element' => "buttom_color", 'value' => array('custom-button'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Button Text Color', 'lipi'), 
					"param_name" => "buttom_text_color_custom",
					"description" => "",
					"dependency" => Array('element' => "buttom_color", 'value' => array('custom-button'))
				),
				
	  )
   ) );
   
   
   vc_map( array(
	  "name"              => esc_html__("Pricing Option", 'lipi'),
	  "base"              => "theme_pricing_option",
	  "content_element"   => true,
	  "as_child"          => array('only' => 'theme_pricing_table'),
	  "category"          => 'lipi',
	  "allowed_container_element" => 'vc_row',
	  "params"            => array(
		 array(
			"type"        => "textarea_html",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_html__("Option Text", 'lipi'),
			"param_name"  => "content",
			"value" => "<li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li><li style=\"border-bottom: 1px solid #F0F0F0;\">content content content</li>",
			"description" => esc_html__("An option this Service table includes", 'lipi')
		 ),
	  )
   ) );
   
   
   if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	   class WPBakeryShortCode_Theme_Pricing_Table_Section extends WPBakeryShortCodesContainer {}
   }
   if ( class_exists( 'WPBakeryShortCode' ) ) {
	   class WPBakeryShortCode_Theme_Pricing_Option extends WPBakeryShortCode {}
   }



/*************************************
***    ADD VC SC 7 :: PORTFOLIO     ***
**************************************/
vc_map( array(
		"name" => esc_html__("Portfolio List", 'lipi'), 
		"base" => "lipi__theme_portfolio_list",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Type", 'lipi'),
					"param_name" => "portfolio_type",
					"value" => array(
						"Default" => "",
						"FitRows" => "FitRows",
						"Masonry" => "Masonry",
						)
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Apply Padding Left/Right Zero", 'lipi'),
					"param_name" => "padding_zero",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Portfolio Filter", 'lipi'),
					"param_name" => "portfolio_shorting",
					"value" => array(
						"Yes" => "yes",
						"No" => "no",
						)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Padding", 'lipi'),
					"param_name" => "filter_padding",
					"value" => "50px",
					"description" => "Will distribute equal top/bottom height (Default:50px)",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Filter Color', 'lipi'), 
					"param_name" => "filter_color",
					"description" => "",
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Align", 'lipi'),
					"param_name" => "filter_align",
					"value" => array(
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "portfolio_shorting", 'value' => array('yes'))	
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Order", 'lipi'),
					"param_name" => "sorting_order",
					"value" => array(
							"Default" => "",
							"Ascending Order" => "ASC",
							"Descending Order" => "DESC",
						),
					"dependency" => array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Filter Order By",
					"param_name" => "sorting_order_by",
					"value" => array(
						"Name" => "name",
						"Slug" => "slug",
						"ID" => "id",
						"Description" => "description"
					),
					"description" => "",
					"dependency" => array('element' => "portfolio_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio by Selected Category", 'lipi'),
					"param_name" => "category",
					"value" => "",
					"description" => "Enter Category Slug Name seprated by comma (leave empty for all)"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio by Selected Projects", 'lipi'),
					"param_name" => "selected_projects",
					"value" => "",
					"description" => "Enter portfolio ID seprated by comma"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number of portfolio records per page", 'lipi'),
					"param_name" => "number_of_post",
					"value" => "-1",
					"description" => esc_html__("NOTE: value -1 display all result", 'lipi'),
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Order", 'lipi'),
					"param_name" => "portfolio_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Order By", 'lipi'),
					"param_name" => "portfolio_order_by",
					"value" => array(
						"Default" => "",
						"Title" => "title",
						"Name" => "name",
						"Date" => "date",
						"Modified" => "modified",
						"Random" => "rand",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Portfolio Column", 'lipi'),
					"param_name" => "portfolio_column",
					"value" => array(
						"Default" => "",
						"Two Column" => "6",
						"Three Column" => "4",
						"Four Column" => "3",
						)
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Title",
					"param_name" => "show_title",
					"value" => array(
						"Yes"	=>	"yes",
						"No"   	=>	"no"
					),
					"description" => ""
				),
				
				 array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => "Title Tag",
                    "param_name" => "title_tag",
                    "value" => array(
                        ""   => "",
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    ),
                    "description" => ""
                ),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Link Color', 'lipi'), 
					"param_name" => "link_color",
					"description" => "",
					"dependency" => Array('element' => "show_title", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Categories",
					"param_name" => "show_categories",
					"value" => array(
						"Yes"	=>	"yes",
						"No"   	=>	"no"
					),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Category Text Color', 'lipi'), 
					"param_name" => "link_cat_color",
					"description" => "",
					"dependency" => Array('element' => "show_categories", 'value' => array('yes'))
				),
				
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Text Size", 'lipi'),
					"param_name" => "cat_text_size",
					"value" => "",
					"description" => "Example:20px",
					"dependency" => Array('element' => "show_categories", 'value' => array('yes'))	
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Show Load More', 'lipi'),
					"param_name" => "show_load_more",
					"value" => array(
						"Yes" => "yes",
						"No" => "no"	
					),
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More Text Align", 'lipi'),
					"param_name" => "show_load_more_align",
					"value" => array(
								"Default" => "",
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More margin", 'lipi'),
					"param_name" => "show_load_more_margin",
					"value" => "20px",
					"description" => "Will distribute equal top/bottom height (Default:20px)",
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
			)
		)
) );



/*************************************
***    ADD VC SC 8 :: LOGO SLIDER  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Logo Carousel", 'lipi'), 
		"base" => "lipi__logo_carousel",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				
				array(
					"type" => "attach_images",
					"class" => "",
					"heading" => esc_html__('Attached Logo', 'lipi'),
					"param_name" => "logo_image",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Logo Width",
					"param_name" => "image_width",
					"description" => "Default:100%, (Enter like: 50%, 80%, etc...)"
				),
				
			)
		)
) );


/*************************************
***    ADD VC SC 9 :: TESTIMONIAL  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Carousel Testimonial", 'lipi'), 
		"base" => "lipi__theme_user_testimonial",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('No. Of Testimonial', 'lipi'),
					"param_name" => "no_of_testimonial",
					"value" => "-1",
					"description" =>  esc_html__(' -1 will display all records', 'lipi'), 
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Testimonial by Selected Category", 'lipi'),
					"param_name" => "category",
					"value" => "",
					"description" => "Enter Category Slug Name seprated by comma (leave empty for all)"
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Testimonial Order Type', 'lipi'),
					"param_name" => "order",
					"value" => array(
						"" => "",
						"Ascending" => "ASC",
						"Descending" => "DESC",
					),
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Order By', 'lipi'),
					"param_name" => "order_by",
					"value" => array(
						"" => "",
						"Title" => "title",
						"Date" => "date",
						"Random" => "rand"
					),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Testimonial Color', 'lipi'), 
					"param_name" => "text_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Testimonial Font Size', 'lipi'),
					"param_name" => "font_size",
					"value" => "",
					"description" =>  esc_html__('Default: 24px', 'lipi'), 
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Testimonial Weight', 'lipi'), 
					"param_name" => "testimonial_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => "Default: 400"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Testimonial Line Height', 'lipi'),
					"param_name" => "testimonial_line_height",
					"value" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Client Name Color', 'lipi'), 
					"param_name" => "client_name_color",
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Client Designation Color', 'lipi'), 
					"param_name" => "client_designation_color",
					"description" => ""
				),
				
			)
		)
) );


/*************************************
***    ADD VC SC 10 :: SHOP :: PRODUCT LIST  ***
**************************************/

if(function_exists("is_woocommerce")) {

	vc_map( 
		array(
			"name" => esc_html__("Shop - Product List", 'lipi'), 
			"base" => "lipi__theme_shop_product_list",
			"icon" => "icon-wpb-icon_text",
			"category" => 'lipi',
			"allowed_container_element" => 'vc_row',
			"params" => array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Per Page",
					"param_name" => "post_per_page",
					"value" => "",
					"description" =>  esc_html__(' Default: -1 will display all records', 'lipi'), 
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Columns",
					"param_name" => "columns",
					"value" => array(
					    "Three" => "three_columns",
						"Two" => "two_columns",
					),
					'save_always' => true,
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Category Slug",
					"param_name" => "category"
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Order By",
					"param_name" => "order_by",
					"value" => array(
						"Date" => "date",
						"Title" => "title",
                        "Menu Order" => "menu_order"
					),
					'save_always' => true,
					"description" => ""
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Order",
					"param_name" => "order",
					"value" => array(
						"ASC" => "ASC",
						"DESC" => "DESC"
					),
					'save_always' => true,
					"description" => ""
				),
				
	            array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Product Title Tag",
					"param_name" => "title_tag",
					"value" => array(
	                    ""   => "",
						"h2" => "h2",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
	            ),
				
	            array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Box Inner Padding (top right bottom left)",
					"param_name" => "holder_padding",
					"description" => "Default 10%, (always use percentage values)"
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Background Color",
					"param_name" => "background_color",
					"description" => "Default:#f8f8f8 (display only on even count loop)",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Category Color",
					"param_name" => "category_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Color",
					"param_name" => "title_color",
					"description" => "",
				),
				
	            array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Separator Color",
					"param_name" => "separator_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Price Color",
					"param_name" => "price_color",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Price Font Size (px)",
					"param_name" => "price_font_size",
					"description" => "Do not include px"
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Price Font Weight",
					"param_name" => "price_font_weight",
					"value" => array(
						"Default" => "",
						"Thin 100" => "100",
						"Extra-Light 200" => "200",
						"Light 300" => "300",
						"Regular 400" => "400",
						"Medium 500" => "500",
						"Semi-Bold 600" => "600",
						"Bold 700" => "700",
						"Extra-Bold 800" => "800",
						"Ultra-Bold 900" => "900"
					)
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Color",
					"param_name" => "button_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Text Color",
					"param_name" => "button_text_color",
					"description" => "",
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Disable Add To Cart', 'lipi'), 
					"param_name" => "disable_add_to_card",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Botton CSS Animation', 'lipi'), 
					"param_name" => "button_hover_style",
					"value" => array(
						"Default"    => "",
						"Grow"	     => "hvr-grow",
						"Shrink" 	 => "hvr-shrink",
						"Pulse" 	 => "hvr-pulse",
						"Pulse Grow" 	=> "hvr-pulse-grow",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Push" 	  => "hvr-push",
						"Pop" 	  => "hvr-pop",
						"Bounce In"  => "hvr-bounce-in",
						"Bounce Out" => "hvr-bounce-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => ""
				),
				
			)
		) 
	);
	
	
	/*************************************
	***    ADD VC SC 10 - 1 :: SHOP :: PRODUCT LIST 2  ***
	**************************************/
    vc_map(
        array(
            "name" => "Shop - Product List Masonry",
            "base" => "lipi__theme_shop_product_list_masonry",
            "icon" => "icon-wpb-icon_text",
			"category" => 'lipi',
			"allowed_container_element" => 'vc_row',
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Per Page",
                    "param_name" => "per_page",
                    "value" => "",
                    "description" => "Default: -1 will display all records",
					
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Columns",
                    "param_name" => "columns",
                    "value" => array(
                        "Three" => "col-md-4 col-sm-12",
                    ),
                    'save_always' => true,
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Category Slug",
                    "param_name" => "category"
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Order By",
                    "param_name" => "order_by",
                    "value" => array(
                        "Date" => "date",
                        "Title" => "title",
                        "Menu Order" => "menu_order"
                    ),
                    'save_always' => true,
                    "description" => ""
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Order",
                    "param_name" => "order",
                    "value" => array(
                        "ASC" => "ASC",
                        "DESC" => "DESC"
                    ),
                    'save_always' => true,
                    "description" => ""
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => "Product Title Tag",
                    "param_name" => "title_tag",
                    "value" => array(
                        ""   => "",
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    ),
                    "description" => ""
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Hover Background Color",
                    "param_name" => "hover_background_color",
                    "description" => "",
                    'group'       => 'Design Options',
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Category Color",
                    "param_name" => "category_color",
                    "description" => "",
                    'group'       => 'Design Options',
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Title Color",
                    "param_name" => "title_text_color",
                    "description" => "",
                    'group'       => 'Design Options',
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Price Color",
                    "param_name" => "price_color",
                    "description" => "",
                    'group'       => 'Design Options',
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => "Price Font Size (px)",
                    "param_name" => "price_font_size",
                    'group'       => 'Design Options',
					"description" => "Omit px",
                ),
               
            )
        )
    );
	
}



/*************************************
***    ADD VC SC 11 :: LATEST POST  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Masonry Blog Posts", 'lipi'), 
		"base" => "lipi__theme_blog_post",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Design Type", 'lipi'),
				"param_name" => "type",
				"value" => array(
					"Box" => "boxes",
					"Box Content With Dividers" => "dividers"
				),
				'save_always' => true,
				"description" => ""
			),
			
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Posts",
                "param_name" => "number_of_posts",
                "description" => "-1 will display all records",
                "value" => "3",
            ),
			
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Colums",
                "param_name" => "number_of_colums",
                "value" => array(
				    "Three" => "3",
					"Two" => "2",
					"Four" => "4"
				),
				'save_always' => true,
                "description" => "",
            ),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"Title" => "title",
					"Date" => "date"
				),
				'save_always' => true,
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"ASC" => "ASC",
					"DESC" => "DESC"
				),
				'save_always' => true,
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Slug",
				"param_name" => "category",
				"description" => "Leave empty for all or use comma for list"
			),
			
			 array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			
			array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Color",
					"param_name" => "blog_title_color_htag",
				),
			
			array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Weight', 'lipi'), 
					"param_name" => "title_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => "Default: 600"
				),
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Letter Specing",
				"param_name" => "text_letter_specing",
				"description" => "Example:1px"
			),	
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title Line Height",
				"param_name" => "text_line_height",
				"description" => "Example:34px"
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Display Content",
				"param_name" => "display_excerpt_read",
				"value" => array(
				    "Default" => "",
					"Yes" => "2",
					"No" => "1"
				),
				"description" => ''
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Blog Post Content Length",
				"param_name" => "blog_content_limit",
				"description" => "Number of characters (Default:15)"
			),

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Post Excerpt Length",
				"param_name" => "excerpt_content_limit",
				"description" => "Number of characters (Default:15)"
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Display Continue Reading",
				"param_name" => "display_continue_read",
				"value" => array(
				    "Default" => "",
					"Yes" => "2",
					"No" => "1"
				),
				"description" => ''
			),
			
			array(
				"type" => "colorpicker",
				"holder" => "div",
				"class" => "",
				"heading" => "Content Background",
				"param_name" => "content_background",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Content Padding",
				"param_name" => "excerpt_content_padding",
				"description" => "Default 0px 0px 0px 0px (Top, Right, Bottom, Left)"
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Show Load More', 'lipi'),
				"param_name" => "show_load_more",
				"value" => array(
				    "No" => "no",
					"Yes" => "yes",	
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Load More - Text Align", 'lipi'),
				"param_name" => "show_load_more_align",
				"value" => array(
							"Default" => "",
							"Left" => "left",
							"Center" => "center",
							"Right" => "right",
						   ),
				"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Load More - Margin", 'lipi'),
				"param_name" => "show_load_more_margin",
				"value" => "20px",
				"description" => "Will distribute equal top/bottom height (Default:20px)",
				"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
			),
			
			
		)
) );


/*************************************
***    ADD VC SC 11 :: BLOG POST  ***
**************************************/

vc_map( array(
		"name" => esc_html__("Blog Posts", 'lipi'), 
		"base" => "lipi__theme_blog_post_style",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Blog Post Style", 'lipi'),
				"param_name" => "type",
				"value" => array(
					"List View (only title)" => "list",
					"List View (title with content)" => "title_content",
				),
				'save_always' => true,
				"description" => ""
			),
			
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Trim Content Text (Enter Number)",
                "param_name" => "trim_content_text",
                "description" => "Default: 15, trimmed content text",
                "value" => "",
				"dependency" => Array('element' => "type", 'value' => array('title_content'))	
            ),
			
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Margin Buttom",
                "param_name" => "list-margin-bottom",
                "description" => "Default: 30px, space between records",
                "value" => "",
				"dependency" => Array('element' => "type", 'value' => array('title_content'))	
            ),
			
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Title Tag",
				"param_name" => "title_tag",
				"value" => array(
                    ""   => "",
					"h3" => "h3",
					"h4" => "h4",	
					"h5" => "h5",	
					"h6" => "h6",	
				),
				"description" => ""
            ),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order",
				"param_name" => "order",
				"value" => array(
					"ASC" => "ASC",
					"DESC" => "DESC"
				),
				'save_always' => true,
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Order By",
				"param_name" => "order_by",
				"value" => array(
					"Title" => "title",
					"Date" => "date"
				),
				'save_always' => true,
				"description" => ""
			),
			
			
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Posts",
                "param_name" => "number_of_posts",
                "description" => "-1 will display all records",
                "value" => "3",
            ),
			
			
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => "Number of Offset Posts",
                "param_name" => "offset_post",
                "description" => "no of offset post",
                "value" => "",
            ),
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Slug",
				"param_name" => "category",
				"description" => "Leave empty for all or use comma for list"
			),
			
			


		)
) );



/*************************************
***    ADD VC SC 12 :: SLIDER IMAGE  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Image Carousel Slider", 'lipi'), 
		"base" => "lipi__theme_image_slider",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
				array(
					"type" => "attach_images",
					"class" => "",
					"heading" => esc_html__('Attached Image', 'lipi'),
					"param_name" => "sliding_image",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Image Size', 'lipi'),
					"param_name" => "image_size",
					"description" => "Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'medium' size.",
					"value" => "medium",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Image Margin', 'lipi'),
					"param_name" => "image_margin",
					"description" => "Default: 0px 0px 0px 0px == Top Right Bottom Left",
					"value" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Image Align', 'lipi'),
					"param_name" => "image_align",
					"value" => array(
						""   => "",
						"left" => "Left",
						"center" => "Center",	
						"right" => "Right",	
					),
					"description" => ""
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Enable Image Title', 'lipi'), 
					"param_name" => "enable_image_title",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Padding', 'lipi'),
					"param_name" => "text_padding",
					"description" => "Default: 0px 0px 0px 0px == Top Right Bottom Left",
					"value" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Text Color",
					"param_name" => "text_color",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Title Weight', 'lipi'), 
					"param_name" => "title_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
						),
					"description" => "Default: 600"
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Enable Popup Image Display', 'lipi'), 
					"param_name" => "enable_popup_image_display",
					"description" => "",
				),

		)
) );



/*************************************
***    ADD VC SC 13 :: LOGIN ***
**************************************/
vc_map( array(
		"name" => esc_html__("Login", 'lipi'), 
		"base" => "lipi__theme_login",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Login Message",
					"param_name" => "login_message",
					"description" => "Custom Login Message"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Username Text",
					"param_name" => "username_text",
					"description" => "Custom Username Text"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Password Text",
					"param_name" => "password_text",
					"description" => "Custom Password Text"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Keep me signed in Text",
					"param_name" => "keep_me_signed_in_text",
					"description" => "Custom Password Text"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Login Button Text",
					"param_name" => "bbpress_login",
					"description" => "Custom Login Text"
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Text Color",
					"param_name" => "text_color",
					"description" => "",
				),

				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Top Border Color",
					"param_name" => "top_border_color",
					"description" => "",
				),

				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Register Link", 'lipi'),
					"param_name"  => "register_link_url",
					"value"       => "",
					"description" => esc_html__("Register Link URL", 'lipi'),
				),

				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Lost Password Link", 'lipi'),
					"param_name"  => "lost_password_link_url",
					"value"       => "",
					"description" => esc_html__("Lost Password Link URL", 'lipi'),
				),

		)
) );
	
	
/*************************************
***    ADD VC SC 13 - 1 :: REGISTER ***
**************************************/
vc_map( array(
		"name" => esc_html__("Register", 'lipi'), 
		"base" => "lipi__theme_bbpress_register",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Message",
					"param_name" => "bbpress_register_msg",
					"value" => "",
					"description" => 'The pre-define message will overwrite',
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Message Text Color",
					"param_name" => "text_color",
					"description" => "",
				),

				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Background Color",
					"param_name" => "button_bg_color",
					"description" => "",
				),

				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Text Color",
					"param_name" => "button_text_color",
					"description" => "",
				),

		)
) );
	
	
/*************************************
***    ADD VC SC 13 - 2 :: LOST PASSWORD ***
**************************************/
vc_map( array(
		"name" => esc_html__("Lost Password", 'lipi'), 
		"base" => "lipi__theme_bbpress_lost_password",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Background Color",
					"param_name" => "button_bg_color",
					"description" => "",
				),

				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Button Text Color",
					"param_name" => "button_text_color",
					"description" => "",
				),
		
		)
) );





/*************************************
***    ADD VC SC 14 :: KNOWLEDGE BASE  ***
**************************************/

vc_map( array(
		"name" => esc_html__("KnowledgeBase Category Articles Landing Style", 'lipi'), 
		"base" => "lipi__theme_knowledgebase_articles",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__("Knowledgebase Style", 'lipi'), 
				"param_name" => "knowledgebase_style_type",
				"value" => array(
					"Masonry" => "1",
					"FitRows" => "2",
					)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Category Records", 'lipi'),
					"param_name" => "kb_no_of_category_records",
					"value" => "0",
					"description" => "0 == all category records",
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__("Knowledgebase Columns", 'lipi'), 
				"param_name" => "knowledgebase_column",
				"value" => array(
					"Default" => "",
					"Columns 4 (Full Width)" => "4",
					"Columns 6 (Best Fit Sidebar)" => "6",
					)
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Category Display Order", 'lipi'),
				"param_name" => "knowledgebase_category_display_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Display OrderBy", 'lipi'),
					"param_name" => "knowledgebase_category_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Description" => "description",
							"Number Of Records Count"  => "count",
							"Slug Name"  => "slug",
							"Name"  => "name",
						)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "No Of Articles Under Category",
					"param_name" => "knowledgebase_no_of_articles",
					"description" => 'No of articles under category (Default:5)',  
					"value"       => "5",
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Page Records Display Order", 'lipi'),
				"param_name" => "knowledgebase_page_article_display_order",
				"description" => 'Order pages that\'s under category',
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Page Records Display Order By", 'lipi'),
					"param_name" => "knowledgebase_page_article_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Child Category as Main Category", 'lipi'),
					"param_name" => "knowledgebase_child_cat_as_root",
					"value" => array(
							"No" => "no",
							"Yes" => "yes",
						)
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Category Title Tag",
					"param_name" => "category_title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Private Category Text", 'lipi'),
					"param_name" => "kb_private_category",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Private Category Text Color', 'lipi'), 
					"param_name" => "kb_private_category_text_color",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', 'lipi'), 
					"param_name" => "icon_color",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Read More Text",
					"param_name" => "knowledgebase_view_all",
					"value" => "View All",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__("Display Read More Text", 'lipi'), 
					"param_name" => "read_more_text_display",
					"value" => array(
						"Yes" => "yes",
						"No" => "no",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" =>  esc_html__("Display Total Post Count on the Category Title", 'lipi'), 
					"param_name" => "total_post_count_cat_title",
					"value" => array(
						"No" => "no",
						"Yes" => "yes",
						)
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Post Count Color', 'lipi'), 
					"param_name" => "post_count_color",
					"description" => "",
					"dependency" => Array('element' => "total_post_count_cat_title", 'value' => array('yes')),
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Knowledgebase Category ID (comma seprated ID)", 'lipi' ),
					"param_name" => "kbgroupcatid",
					"value" => "",
					"description" => "<span style='color:blue'><strong>Leave empty to display all category</strong></span> <br><br><strong>How to find knowledgebase category ID??</strong> <br><br> 1. Click On \"Knowledge Base &minus;&gt; Knowledge Base Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\", You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=lipikbcat<strong>&tag_ID=13</strong>&post_type=lipi_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
				
				
			)
		)
) );


/*************************************
***    ADD VC SC 14.1 :: KnowledgeBase Style***
**************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase Category Landing Style", 'lipi'), 
		"base" => "lipi__theme_kb_style",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__("Knowledgebase Style", 'lipi'), 
				"param_name" => "knowledgebase_style_type",
				"value" => array(
					"Style 1" => "1",
					"Style 2" => "2",
					)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Records", 'lipi'),
					"param_name" => "kb_no_ofrecords",
					"value" => "0",
					"description" => "0 == all records",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Disable Count Total Article Section",
					"param_name" => "total_article_count",
					"value" => array(
						"No"   => "no",
						"Yes" => "yes",	
					),
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Disable Description",
					"param_name" => "disable_description",
					"value" => array(
						"No"   => "no",
						"Yes" => "yes",	
					),
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Limit Description to Define Character Length",
					"param_name" => "limit_description_char",
					"value" => "",
					"description" => esc_html__("Limit your description characters", 'lipi'),
					"dependency" => Array('element' => "disable_description", 'value' => array('no'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Article count text box", 'lipi'),
					"description" => esc_html__("Default text: articles in this collection", 'lipi'),
					"param_name" => "article_count_box_title",
					"value" => "",
					"dependency" => Array('element' => "total_article_count", 'value' => array('no'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Background Color', 'lipi'), 
					"param_name" => "background_color",
					"description" => "",
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Border Color', 'lipi'), 
					"param_name" => "border_color",
					"description" => "",
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Border Radius", 'lipi'),
					"param_name" => "border_radius",
					"value" => "4px",
					"description" => "Example: 4px",
				),
				
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Icon Color', 'lipi'), 
					"param_name" => "icon_color",
					"description" => "",
					"dependency" => Array('element' => "knowledgebase_style_type", 'value' => array('1','2'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Default Icon Code Name", 'lipi'),
					"param_name" => "default_icon_code",
					"value" => "",
					"description" => "If found knowledgebase category icon code blank, system will use default icon code <br>Enter <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href=\"https://www.elegantthemes.com/blog/resources/elegant-icon-font\" target=\"_blank\">elegant icon font</a> name -OR- <br>Enter <a href=\"http://demo.wpsmartapps.com/themes/manual/et-line-font/\" target=\"_blank\">et line font</a> name",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Icon Size", 'lipi'),
					"param_name" => "icon_size",
					"value" => "",
					"description" => "Example:55px",
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Page Records Display Order", 'lipi'),
				"param_name" => "knowledgebase_style_type_display_order",
				"description" => 'Order pages that\'s under category',
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Page Records Display Order By", 'lipi'),
					"param_name" => "knowledgebase_style_type_display_orderby",
					"value" => array(
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						)
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Private Category Text", 'lipi'),
					"param_name" => "kb_private_categpry",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Private Category Text Color', 'lipi'), 
					"param_name" => "kb_private_category_text_color",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Exclude Knowledge Base Category (comma seprated ID)", 'lipi' ),
					"param_name" => "exclude_kb_category",
					"value" => "",
					"description" => "<span style='color:blue'><strong>Leave empty to display all category</strong></span> <br><br><strong>How to find knowledgebase category ID??</strong> <br><br> 1. Click On \"Knowledge Base &minus;&gt; Knowledge Base Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\", You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=lipikbcat<strong>&tag_ID=13</strong>&post_type=lipi_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
				


			)
		)
) );



/*************************************
***    ADD VC SC 15 :: KNOWLEDGE BASE CATEGORY WIDGET  ***
**************************************/

vc_map( array(
		"name" => esc_html__("KnowledgeBase Widget Category", 'lipi'), 
		"base" => "lipi__theme_knowledgebase_widget_cat",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", 'lipi'),
					"param_name" => "kb_category_title",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show post counts", 'lipi'),
					"param_name" => "kb_category_show_post_count",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Text Color', 'lipi'), 
					"param_name" => "count_text_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Count Background Color', 'lipi'), 
					"param_name" => "count_bg_color",
					"description" => "",
					"dependency" => Array('element' => "kb_category_show_post_count", 'value' => array('true'))
				),
			)
		)
) );


/*************************************
***    ADD VC SC 16 :: KNOWLEDGE BASE ARTICLES (WIDGET) ***
**************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase Widget Articles", 'lipi'), 
		"base" => "lipi__theme_knowledgebase_widget_articles",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", 'lipi'),
					"param_name" => "title",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title Align", 'lipi'), 
					"param_name" => "title_align",
					"value" => array(
						"None" => "",
						"Left" => "left",
						"Right" => "right",	
						"Center" => "center"	
					),
					'save_always' => true,
				),
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Display", 'lipi'),
				"param_name" => "knowledgebase_article_display_type",
				"value" => array(
					"Select Article Display Type" => "",
					"Latest Articles (using date)" => "1",
					"Popular Article (using number of views)" => "2",
					"Top Rated Article (using like)" => "3",
					"Most Commented Article" => "4",
					)
				),
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Number Of Article", 'lipi'),
				"param_name" => "knowledgebase_article_number",
				"value" => array(
					"Four" => "4",
					"Five" => "5",
					"Six" => "6",
					"Seven" => "7",
					"Eight" => "8",
					"Nine" => "9",
					"Ten" => "10",
					)
				),
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Article Order", 'lipi'),
				"param_name" => "knowledgebase_article_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
			)
		)
) );


/*************************************
***    ADD VC SC 17 :: KNOWLEDGE BASE CATEGORY WIDGET ***
**************************************/
vc_map( array(
		"name" => esc_html__("KnowledgeBase Single Category Record Widget", 'lipi'), 
		"base" => "lipi__theme_knowledgebase_widget_single_cat_records",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Records Per Page", 'lipi'),
					"param_name" => "page_per_post",
					"value" => "-1",
					"description" => "Note: -1 shows all post",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("view Text", 'lipi'),
					"param_name" => "view_text",
					"value" => "views",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order", 'lipi'),
					"param_name" => "post_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order By", 'lipi'),
					"param_name" => "post_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Include Child Post", 'lipi'),
					"param_name" => "include_child_post",
					"value" => array(
							"yes" => "yes",
							"No" => "no",
						)
				),
				 
			   array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Knowledgebase Category ID (ENTER ONLY SINGLE ID)", 'lipi' ),
					"param_name" => "kbsinglecatid",
					"value" => "",
					"description" => "<span style='color:blue'>How to find knowledgebase category ID??</span> <br><br> 1. Click On \"Knowledge Base &minus;&gt; Knowledge Base Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\", You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=lipikbcat<strong>&tag_ID=13</strong>&post_type=lipi_kb\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
		 
					
			)
		)
) );


/*************************************
***    ADD VC SC KB.1 :: KNOWLEDGE BASE TREE MENU ***
**************************************/
vc_map( array(
		"name" => esc_html__("Knowledgebase Tree Menu", 'lipi'), 
		"base" => "lipi__knowledgebase_tree_menu",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Root tag <li> padding", 'lipi'),
					"param_name" => "root_tag_li_padding",
					"value" => "",
					"description" => "Default: 11px 10px 1px 10px (top, left, buttom, right)"
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Root tag <li> Background Color', 'lipi'), 
					"param_name" => "root_tag_color",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Border Radius', 'lipi'), 
					"param_name" => "border_radius",
					"value" => "",
					"description" => "Ecample: 11px"
				),
				
				// root cat
				
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Category Records", 'lipi'),
					"param_name" => "kb_no_of_category_records",
					"value" => "0",
					"description" => "0 == all category records",
				),
                
                
                array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Category Display Order", 'lipi'),
				"param_name" => "knowledgebase_category_display_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
                
                array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Display OrderBy", 'lipi'),
					"param_name" => "knowledgebase_category_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Description" => "description",
							"Number Of Records Count"  => "count",
							"Slug Name"  => "slug",
							"Name"  => "name",
						)
				),
				
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Private Category Text", 'lipi'),
					"param_name" => "kb_private_category",
					"value" => "",
					"description" => "",
				),

				
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Records Under Category Display Order", 'lipi'),
					"param_name" => "knowledgebase_records_display_order",
					"description" => 'Order pages that\'s under category',
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
                
                
                array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Records Under Category Display Order By", 'lipi'),
					"param_name" => "knowledgebase_records_display_orderby",
					"value" => array(
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						)
				),


			)
		)
) );


/*************************************
***    ADD VC SC KB.1 :: KNOWLEDGE BASE AJAX CONTENT LOAD ***
**************************************/
vc_map( array(
		"name" => esc_html__("Knowledgebase Ajax Content Load", 'lipi'), 
		"base" => "lipi__knowledgebase_ajax_content_load",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"content_element" => true,
		"show_settings_on_create" => true,
		"js_view" => 'VcColumnView',
		"as_parent" => array('except' => 'lipi__knowledgebase_ajax_content_load'),
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Root tag <li> padding", 'lipi'),
					"param_name" => "root_tag_li_padding",
					"value" => "",
					"description" => "Default: 11px 10px 1px 10px (top, left, buttom, right)"
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Root tag <li> Background Color', 'lipi'), 
					"param_name" => "root_tag_color",
					"description" => "",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Border Radius', 'lipi'), 
					"param_name" => "border_radius",
					"value" => "",
					"description" => "Ecample: 11px"
				),
				
				// root cat
				
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Category Records", 'lipi'),
					"param_name" => "kb_no_of_category_records",
					"value" => "0",
					"description" => "0 == all category records",
				),
				
				
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Open X Loop Category Records", 'lipi'),
					"param_name" => "kb_x_loop_category_records",
					"value" => "",
					"description" => "(Default value == 1) ALERT: Make sure value does not exceed no of root category records",
				),
                
                
                array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Category Display Order", 'lipi'),
				"param_name" => "knowledgebase_category_display_order",
				"value" => array(
					"Ascending Order" => "ASC",
					"Descending Order" => "DESC",
					)
				),
                
                array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Category Display OrderBy", 'lipi'),
					"param_name" => "knowledgebase_category_display_orderby",
					"value" => array(
							"None" => "none",
							"Order By Description" => "description",
							"Number Of Records Count"  => "count",
							"Slug Name"  => "slug",
							"Name"  => "name",
						)
				),
				
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Private Category Text", 'lipi'),
					"param_name" => "kb_private_category",
					"value" => "",
					"description" => "",
				),

				
				 array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Records Under Category Display Order", 'lipi'),
					"param_name" => "knowledgebase_records_display_order",
					"description" => 'Order pages that\'s under category',
					"value" => array(
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
                
                
                array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Records Under Category Display Order By", 'lipi'),
					"param_name" => "knowledgebase_records_display_orderby",
					"value" => array(
							"Order By Date" => "date",
							"Order By Last Modified Date"  => "modified",
							"Order By Title"  => "title",
							"Order By Random"  => "rand",
							"Order By Page Order"  => "menu_order",
							"Order By Number of Comments"  => "comment_count",
						)
				),


			)
		)
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
   class WPBakeryShortCode_Lipi__Knowledgebase_Ajax_Content_Load extends WPBakeryShortCodesContainer {}
}



/*************************************
***    ADD VC SC 18 :: FAQ SINGLE CATEGORY ARTICLE  ***
**************************************/
vc_map( array(
		"name" => esc_html__("FAQ", 'lipi'), 
		"base" => "lipi__theme_faq_articles",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number Of Post Per Page", 'lipi'),
					"param_name" => "page_per_post",
					"value" => "-1",
					"description" => "Note: -1 shows all post",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order", 'lipi'),
					"param_name" => "post_order",
					"value" => array(
						"None" => "",
						"Ascending"  => "ASC",
						"Descending" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Post Order By", 'lipi'),
					"param_name" => "post_orderby",
					"value" => array(
							"None" => "none",
							"Title" => "title",
							"Date"  => "date",
							"Last Modified Date"  => "modified",
							"Random"  => "rand",
							"Number of Comments"  => "comment_count",
							"Page Order"  => "menu_order",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Include Child Post", 'lipi'),
					"param_name" => "include_child_post",
					"value" => array(
							"yes" => "yes",
							"No" => "no",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Hide Pagination", 'lipi'),
					"param_name" => "hide_pagination",
					"value" => array(
							"No" => "no",
							"yes" => "yes",
						)
				),
				 
			   array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Category ID (ENTER ONLY SINGLE ID)", 'lipi' ),
					"param_name" => "faqsinglecatid",
					"value" => "",
					"description" => "<strong>How to find FAQ category ID??</strong> <br><br> 1. Click On \"FAQs &minus;&gt; FAQs Categories\" (left sidebar menu) <br><br> 2. Click on \"Category Name\" You like to display, You will land on \"Edit Category\" page. <br><br> 3. <strong>Just view browser URL</strong>, you will see something like this: \"wp-admin/term.php?taxonomy=lipifaqcat<strong>&tag_ID=13</strong>&post_type=lipi_faq\" <br><br> 4. <strong>Your category ID == 13 (tag_ID=13)</strong>  ",
				 ),
		 
					
			)
		)
) );




/*************************************
***    ADD VC SC 18 :: IMAGE FRAME  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Image Frame", 'lipi'), 
		"base" => "lipi__theme_image_frame",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Image", 'lipi'), 
					"param_name" => "image_frame"
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Image Align", 'lipi'), 
					"param_name" => "image_align",
					"value" => array(
						"None" => "",
						"Left" => "left",
						"Right" => "right",	
						"Center" => "center"	
					),
					'save_always' => true,
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Remove Box Shadow', 'lipi'),  
					"param_name" => "remove_box_shadow",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Image Box Padding", 'lipi'),
					"param_name" => "image_box_padding",
					"value" => "",
					"description" => "Default: 0px 0px 0px 0px (top, right, buttom, left)",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Image Radius", 'lipi'),
					"param_name" => "image_radius",
					"value" => "",
					"description" => "Default: 0px",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__('Image Animation', 'lipi'), 
					"param_name" => "image_hover_style",
					"value" => array(
						"Default"    => "",
						"Push"	     => "hvr-push",
						"Pop" 	 => "hvr-pop",
						"Bob" 	 => "hvr-bob",
						"Curl Top Left" 	=> "hvr-curl-top-left",
						"Pulse Shrink" 	=> "hvr-pulse-shrink",
						"Buzz Out" => "hvr-buzz-out",
						"Float" 	 => "hvr-float",
						"Wobble Horizontal" => "hvr-wobble-horizontal",
						"Wobble Vertical" 	=> "hvr-wobble-vertical",
						),
					"description" => ""
				),
				
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => esc_html__("Title", 'lipi'),
					"param_name"  => "image_title",
					"value"       => "",
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Title Tag",
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h3" => "h3",	
						"h4" => "h4",	
						"h5" => "h5",	
						"h6" => "h6",	
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title Text Margin", 'lipi'),
					"param_name" => "title_text_margin",
					"value" => "",
					"description" => "Default: 0px 0px 0px 0px (top, right, buttom, left)",
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Font Color", 'lipi'),
					"param_name" => "font_color",
					"description" => ""
				),	
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Text Align", 'lipi'), 
					"param_name" => "text_align",
					"value" => array(
						"Left" => "left",
						"Right" => "right",	
						"Center" => "center"	
					),
					'save_always' => true,
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Font Weight",
					"param_name" => "font_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
					),
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Title Font Size",
					"param_name" => "font_size",
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Image short description", 'lipi' ),
					"param_name" => "imageshortinfo",
					"value" => "",
					"description" => "",
				 ),
				 
				 array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => "Description Font Size",
					"param_name" => "description_font_size",
					"description" => "Default: 13px"
				),
				 
				 array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Description Font Color", 'lipi'),
					"param_name" => "description_font_color",
					"description" => ""
				),	
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Font Weight",
					"param_name" => "description_font_weight",
					"value" => array(
						"Default" 			=> "",
						"Thin 100"			=> "100",
						"Extra-Light 200" 	=> "200",
						"Light 300"			=> "300",
						"Regular 400"		=> "400",
						"Medium 500"		=> "500",
						"Semi-Bold 600"		=> "600",
						"Bold 700"			=> "700",
						"Extra-Bold 800"	=> "800",
						"Ultra-Bold 900"	=> "900"
					),
					"description" => ""
				),
			
			)
		)
) );



/*************************************
***    ADD VC SC 19 :: PORTFOLIO - IMAGE  ***
**************************************/
vc_map( array(
		"name" => esc_html__("Portfolio Images", 'lipi'), 
		"base" => "lipi__portfolio_images",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				
				array(
					"type" => "attach_images",
					"class" => "",
					"heading" => esc_html__('Attached Logo', 'lipi'),
					"param_name" => "upload_images",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Image Display Type",
					"param_name" => "image_display_type",
					"value" => array(
						"Masonry" => "masonry",
						"Slider" => "slider",	
						"Standard" => "standard"	
					),
					'save_always' => true,
					"description" => ""
				),
				
				
				array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" =>  esc_html__("Masonry Columns", 'lipi'), 
				"param_name" => "masonry_column",
				"dependency" => array('element' => "image_display_type", 'value' => array('masonry')),
				"value" => array(
					"Default" => "",
					"Columns 4" => "4",
					"Columns 2" => "6",
					)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Image Size",
					"param_name" => "image_size",
					"value" => array(
						"Full" => "full",
						"Medium" => "medium",	
						"FitRows" => "lipi-image-700x525"	
					),
					'save_always' => true,
					"description" => ""
				),
				
				
				
			)
		)
) );



/*************************************
***    ADD VC SC 20 :: SOCIAL SHARE  ***
**************************************/

vc_map( array(
		"name" => esc_html__("Social Share", 'lipi'), 
		"base" => "lipi__social_share",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display Social Share", 'lipi'),
					"param_name" => "display_social_share",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Position",
					"param_name" => "position",
					"value" => array(
						"Left" => "left",
						"Right" => "right",	
						"Center" => "center"	
					),
					'save_always' => true,
					"description" => ""
				),
				
				
			)
		)
) );






/*************************************
***    ADD VC SC 21 :: SERVICES     ***
**************************************/
vc_map( array(
		"name" => esc_html__("Services", 'lipi'), 
		"base" => "lipi__theme_services_list",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Services Type", 'lipi'),
					"param_name" => "services_type",
					"value" => array(
						"Default" => "",
						"FitRows" => "FitRows",
						"Masonry" => "Masonry",
						)
				),
				
				array(
					"type" => "checkbox",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Apply Padding Left/Right Zero", 'lipi'),
					"param_name" => "padding_zero",
					"value" => "",
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Display services Filter", 'lipi'),
					"param_name" => "services_shorting",
					"value" => array(
						"Yes" => "yes",
						"No" => "no",
						)
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Padding", 'lipi'),
					"param_name" => "filter_padding",
					"value" => "50px",
					"description" => "Will distribute equal top/bottom height (Default:50px)",
					"dependency" => Array('element' => "services_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Filter Color', 'lipi'), 
					"param_name" => "filter_color",
					"description" => "",
					"dependency" => Array('element' => "services_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Align", 'lipi'),
					"param_name" => "filter_align",
					"value" => array(
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "services_shorting", 'value' => array('yes'))	
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Filter Order", 'lipi'),
					"param_name" => "sorting_order",
					"value" => array(
							"Default" => "",
							"Ascending Order" => "ASC",
							"Descending Order" => "DESC",
						),
					"dependency" => array('element' => "services_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => "Filter Order By",
					"param_name" => "sorting_order_by",
					"value" => array(
						"Name" => "name",
						"Slug" => "slug",
						"ID" => "id",
						"Description" => "description"
					),
					"description" => "",
					"dependency" => array('element' => "services_shorting", 'value' => array('yes'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Services by Selected Category", 'lipi'),
					"param_name" => "category",
					"value" => "",
					"description" => "Enter Category Slug Name seprated by comma (leave empty for all)"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Services by Selected Projects", 'lipi'),
					"param_name" => "selected_projects",
					"value" => "",
					"description" => "Enter portfolio ID seprated by comma"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number of portfolio records per page", 'lipi'),
					"param_name" => "number_of_post",
					"value" => "-1",
					"description" => esc_html__("NOTE: value -1 display all result", 'lipi'),
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Services Order", 'lipi'),
					"param_name" => "services_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Services Order By", 'lipi'),
					"param_name" => "services_order_by",
					"value" => array(
						"Default" => "",
						"Title" => "title",
						"Name" => "name",
						"Date" => "date",
						"Modified" => "modified",
						"Random" => "rand",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Services Column", 'lipi'),
					"param_name" => "services_column",
					"value" => array(
						"Default" => "",
						"Two Column" => "6",
						"Three Column" => "4",
						"Four Column" => "3",
						)
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Title",
					"param_name" => "show_title",
					"value" => array(
						"Yes"	=>	"yes",
						"No"   	=>	"no"
					),
					"description" => ""
				),
				
				 array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => "Title Tag",
                    "param_name" => "title_tag",
                    "value" => array(
                        ""   => "",
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    ),
                    "description" => ""
                ),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Title Link Color', 'lipi'), 
					"param_name" => "link_color",
					"description" => "",
					"dependency" => Array('element' => "show_title", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => "Show Categories",
					"param_name" => "show_categories",
					"value" => array(
						"Yes"	=>	"yes",
						"No"   	=>	"no"
					),
					"description" => ""
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Category Text Color', 'lipi'), 
					"param_name" => "link_cat_color",
					"description" => "",
					"dependency" => Array('element' => "show_categories", 'value' => array('yes'))
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__('Show Load More', 'lipi'),
					"param_name" => "show_load_more",
					"value" => array(
						"Yes" => "yes",
						"No" => "no"	
					),
					"description" => "",
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More Text Align", 'lipi'),
					"param_name" => "show_load_more_align",
					"value" => array(
								"Default" => "",
								"Left" => "left",
								"Center" => "center",
								"Right" => "right",
							   ),
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Show Load More margin", 'lipi'),
					"param_name" => "show_load_more_margin",
					"value" => "20px",
					"description" => "Will distribute equal top/bottom height (Default:20px)",
					"dependency" => Array('element' => "show_load_more", 'value' => array('yes'))	
				),
				
			)
		)
) );




/*************************************
***    ADD VC SC 22 :: PAGES     ***
**************************************/
vc_map( array(
		"name" => esc_html__("Pages", 'lipi'), 
		"base" => "lipi__theme_pages_list",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(
			
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Title", 'lipi'),
					"param_name" => "title",
					"value" => "",
				),
			
				 array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => "Title Tag",
                    "param_name" => "title_tag",
                    "value" => array(
                        ""   => "",
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    ),
                    "description" => ""
                ),
				
				array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => "Post Type",
                    "param_name" => "post_type",
                    "value" => array(
                        "Services"   => "lipi_services",
						"Portfolio" => "lipi_portfolio",
						"Page" => "page",
                    ),
                    "description" => ""
                ),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Enter Page ID", 'lipi'),
					"param_name" => "page_by_id",
					"value" => "",
					"description" => esc_html__("Page ID seprated by comma", 'lipi'),
					"dependency" => array('element' => "post_type", 'value' => array('page'))
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Pages by Selected Category", 'lipi'),
					"param_name" => "category",
					"value" => "",
					"description" => "Enter Category Slug Name seprated by comma (leave empty for all)"
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Number of Pages records per page", 'lipi'),
					"param_name" => "number_of_records",
					"value" => "-1",
					"description" => esc_html__("NOTE: value -1 display all result", 'lipi'),
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Page Order", 'lipi'),
					"param_name" => "page_order",
					"value" => array(
						"Default" => "",
						"Ascending Order" => "ASC",
						"Descending Order" => "DESC",
						)
				),
				
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Page Order By", 'lipi'),
					"param_name" => "page_order_by",
					"value" => array(
						"Default" => "",
						"Title" => "title",
						"Name" => "name",
						"Date" => "date",
						"Modified" => "modified",
						"Random" => "rand",
						)
				),


			)
		)
) );


/*************************************
***    ADD VC SC 23 :: VIDEO     ***
**************************************/
vc_map( array(
		"name" => esc_html__("Video", 'lipi'), 
		"base" => "lipi__theme_popup",
		"icon" => "icon-wpb-icon_text",
		"category" => 'lipi',
		"allowed_container_element" => 'vc_row',
		"params" => array_merge(
			array(

				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Video URL", 'lipi'),
					"param_name" => "video_url",
					"value" => "",
					 "description" => "Example: https://www.youtube.com/watch?v=NS0txu_Kzl8"
				),
				
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Video Image", 'lipi'), 
					"param_name" => "video_image"
				),
				
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => "Player Icon Color",
					"param_name" => "player_icon_color",
					"description" => ""
				),
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Player Icon Font Size", 'lipi'),
					"param_name" => "player_icon_font_size",
					"value" => "",
					 "description" => "Default: 60px"
				),
				
				
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__("Player Icon Margin", 'lipi'),
					"param_name" => "player_icon_margin",
					"value" => "",
					 "description" => "Default: -45px 0px 0px -23px (top, right, bottom, left)"
				),


			)
		)
) );
?>