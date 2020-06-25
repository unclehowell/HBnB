<?php 
/*-----------------------------------------------------------------------------------*/
/*	THEME SLIDER :: FLEX SLIDER
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__flex_slider')) { 
function lipi__flex_slider($id) {
	$entries = get_post_meta( $id, '__lipi_header_flex_group', true );
	$container_call = lipi__website_global_full_width_design_control();
	echo '<div class="flexslider"><ul class="slides">';
	foreach ( (array) $entries as $key => $entry ) {
		$img = $title = $sub_title = $padding = $margin_top = $title_font_size = $redefine_title_weight = $redefine_msgbox_align = $redefine_title_font = $sub_title_font_size = $redefine_sub_title_weight = $redefine_sub_title_font = $bind_slider_color = $apply_opacity = '';
		
		if ( isset( $entry['flex-title'] ) ) {
			$title = esc_html( $entry['flex-title'] );
		}
		
		if ( isset( $entry['bind_slider_title_size'] ) ) {
			$title_font_size = esc_html( $entry['bind_slider_title_size'] );
			$title_font_size = 'font-size:'.$title_font_size.'!important;';
		}
		
		if ( isset( $entry['redefine_title_weight'] ) ) {  
			$redefine_title_weight = esc_html( $entry['redefine_title_weight'] );
			$redefine_title_weight = 'font-weight:'.$redefine_title_weight.'!important;';
		}
		
		if ( isset( $entry['redefine_title_font'] ) ) { 
			$redefine_title_font = esc_html( $entry['redefine_title_font'] );
			$redefine_title_font = 'font-family:'.$redefine_title_font.'!important;';
		}
	
		if ( isset( $entry['flex-sub-title'] ) ) {
			$sub_title = esc_html( $entry['flex-sub-title'] );
		}
		
		if ( isset( $entry['bind_slider_sub_title_size'] ) ) {
			$sub_title_font_size = esc_html( $entry['bind_slider_sub_title_size'] );
			$sub_title_font_size = 'font-size:'.$sub_title_font_size.'!important;';
		}
		
		if ( isset( $entry['redefine_sub_title_weight'] ) ) {  
			$redefine_sub_title_weight = esc_html( $entry['redefine_sub_title_weight'] );
			$redefine_sub_title_weight = 'font-weight:'.$redefine_sub_title_weight.'!important;';
		}
		
		if ( isset( $entry['redefine_sub_title_font'] ) ) { 
			$redefine_sub_title_font = esc_html( $entry['redefine_sub_title_font'] );
			$redefine_sub_title_font = 'font-family:'.$redefine_sub_title_font.'!important;';
		}
	
		if ( isset( $entry['image'] ) ) {  
			$img = $entry['image'];
		}
		
		if ( isset( $entry['flex-title-margin-top'] ) ) {  
			$margin_top = esc_html( $entry['flex-title-margin-top'] );
			$margin_top = 'margin-top:'.$margin_top.';';
		}
		
		if ( isset( $entry['flex-message-box-padding'] ) ) {  
			$padding = esc_html($entry['flex-message-box-padding']);
			$padding = 'padding:'.$padding.'!important;';
		}
		
		if ( isset( $entry['redefine_message_box_alignment'] ) ) {
			$redefine_msgbox_align = esc_html( $entry['redefine_message_box_alignment'] );
			$redefine_msgbox_align = 'text-align:'.$redefine_msgbox_align.'!important;';
		}
		
		if ( isset( $entry['bind_slider_color'] ) ) {
			$bind_slider_color = esc_html($entry['bind_slider_color']);
			$bind_slider_color = 'color:'.$bind_slider_color.';';
		}
		
		if ( isset( $entry['slider_img_display_position'] ) ) {
			$bind_slider_bg_position = 'background-position:'.esc_html($entry['slider_img_display_position']).'!important;';
		}
		
		if( isset($entry['image_opacity']) && $entry['image_opacity'] == true ) $apply_opacity = 1;
		
		echo '<li><div class="background-image-holder" style="background: url('.esc_url($img).');'.$bind_slider_bg_position.'">';
		  if ( $apply_opacity ==  1 ) echo '<div style="background: rgba(0,0,0,0.3);min-height: inherit;position: absolute;width: 100%;height: 100%;">';
				echo '<div class="'.$container_call.'">
						<div class="row">   
						<div class="slide-text" style=" '.$padding.' '.$margin_top.' '.$redefine_msgbox_align.' ">
							<h2 style="'.$title_font_size.''.$redefine_title_weight.' '.$redefine_title_font.' '.$bind_slider_color.' ">'.$title.'</h2>
							<p style="'.$sub_title_font_size.''.$redefine_sub_title_weight.' '.$redefine_sub_title_font.' '.$bind_slider_color.' ">'.$sub_title.'</p>
						</div>
					</div> 
				 </div>';
		  if ( $apply_opacity ==  1 ) echo '</div>';
		echo '</div></li>';

	}
	echo '</ul></div>';
}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME HEADER BACKGROUND
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lipi__header_process')) {
function lipi__header_process($id){
	global $lipi_theme_options;
	$post_type = get_post_type();
	$assignID = ''; 
	// If bbpress
	if ( class_exists('bbPress') && is_bbPress() ) {
		if( $lipi_theme_options['avtivate-custom-bbpress-header'] == true ) {
			lipi__custombbpress_background();	
		} else { 
			lipi__header_background( $assignID, 1 );
		}
		
	} else 
	// If Woo Active
	if(function_exists("is_woocommerce") && (is_shop() || is_checkout() || is_account_page())){
		if(is_shop()){  
			$page_id = get_option('woocommerce_shop_page_id');		
		} elseif(is_checkout()) {
			$page_id = get_option('woocommerce_pay_page_id'); 
		} elseif(is_account_page()) {
			$page_id = get_option('woocommerce_myaccount_page_id'); 
		} elseif(is_account_page()) {
			$page_id = get_option('woocommerce_edit_address_page_id'); 
		} elseif(is_account_page()) {
			$page_id = get_option('woocommerce_view_order_page_id'); 
		}
		if( isset($page_id) && $page_id != "" ) { 
			$woopage  = get_post( $page_id );
		} else {
			$woopage = '';
		}
		if( isset($woopage->ID) && $woopage->ID != '' ) { 
			lipi__header_background( $woopage->ID );
		} else { 
		    $page = get_page_by_title( 'shop' );
			if( isset($page->ID) && $page->ID != "" ) { 
				$pageID = $page->ID;
				lipi__header_background( $pageID );
			} else {  
				$pageID = $assignID;
				lipi__header_background( $pageID, 'woo' );
			}
		}
		
	} else if(function_exists("is_product") && is_product()){
			
		if( $lipi_theme_options['shop_header_layout'] == true ) {
			$page_id = get_option('woocommerce_shop_page_id');
			$woopage  = get_post( $page_id );
			lipi__header_background( $woopage->ID );
		} else {
			lipi__header_background( $assignID, 'woo' );
		}
	
	} else if(function_exists("is_product_category") && is_product_category()){	
	
		lipi__header_background( $assignID, 'woo' );
					
	// Normal WordPress	
	} else if( is_front_page() && is_home() ) { 
		lipi__header_background( $assignID );
	} else if( is_front_page() ) {  
		lipi__header_background( $id );
	} else if( is_home() ) {      
		$blog_pgID = get_option('page_for_posts');
		lipi__header_background( $blog_pgID );
	} else {   
		if( is_page() ) {
			lipi__header_background( $id );
		} else if( is_archive() ) { 
			if( $post_type == 'lipi_kb' && $lipi_theme_options['avtivate-custom-kb-header-category'] == true ) {
				lipi__customheader_replace($lipi_theme_options['knowledgebase_custom_header_image']['url'],$lipi_theme_options['knowledgebase_custom_header_color'], $lipi_theme_options['knowledgebase_custom_header_image_position'], $lipi_theme_options['knowledgebase_header_remove_opacity'], $lipi_theme_options['knowledgebase_header_parallax_effect'], true, $lipi_theme_options['knowledgebase_header_search_box'], $lipi_theme_options['knowledgebase_header_search_box_center'],$lipi_theme_options['knowledgebase_header_search_box_position']);
			} else if( $post_type == 'lipi_faq' && $lipi_theme_options['avtivate-custom-faq-header-category'] == true ) { 
				lipi__customheader_replace($lipi_theme_options['faq_custom_header_image']['url'],$lipi_theme_options['faq_custom_header_color'], $lipi_theme_options['faq_custom_header_image_position'], $lipi_theme_options['faq_header_remove_opacity'], $lipi_theme_options['faq_header_parallax_effect'], true, $lipi_theme_options['faq_header_search_box'], $lipi_theme_options['faq_header_search_box_center'], $lipi_theme_options['faq_header_search_box_position']);
			} else {
				lipi__header_background( $assignID, 1 );
			}
		} else if( is_single() ) { 
			if( $post_type == 'lipi_kb' && $lipi_theme_options['avtivate-custom-kb-header-singlepage'] == true ) {
				lipi__customheader_replace($lipi_theme_options['knowledgebase_custom_header_image']['url'],$lipi_theme_options['knowledgebase_custom_header_color'], $lipi_theme_options['knowledgebase_custom_header_image_position'], $lipi_theme_options['knowledgebase_header_remove_opacity'], $lipi_theme_options['knowledgebase_header_parallax_effect'], true, $lipi_theme_options['knowledgebase_header_search_box'], $lipi_theme_options['knowledgebase_header_search_box_center'],$lipi_theme_options['knowledgebase_header_search_box_position']);
			} else {
				lipi__header_background( $id );
			}
		} else {
			lipi__header_background( $assignID );
		}
	}
	
}
}

// custom header
if (!function_exists('lipi__customheader_replace')) {
function lipi__customheader_replace($header_image,$header_background_color, $image_background_position, $image_transparency_status, $parallax_image_status, $breadcrumb, $header_search_box_status, $header_search_box_center, $header_search_box_position){
	global $lipi_theme_options, $post;
	$post_type = get_post_type();
	$container_call = lipi__website_global_full_width_design_control();
	$data_image_src = $data_parallax = $date_plx_window_css = $date_plx_window_css = $add_style = $plx_bg_position = $background_display_position = $opacity = '';
	
	if( isset($header_image) && $header_image != '' ){ 
		$add_style = 'background: '.$header_background_color.' url('.$header_image.');'; 
		if( $image_transparency_status == false ) { $opacity = 1; }
		$background_display_position = 'background-position:'.$image_background_position.'!important;background-size: cover;';
	} else if( $header_image == '' && (isset($header_background_color) && $header_background_color != '') ){
		$add_style = 'background: '.$header_background_color.';'; 
	}
	if( isset($parallax_image_status) && $parallax_image_status == true && isset($header_image) && $header_image != ''  ) {  
		$data_image_src = 'data-image-src="'.$header_image.'"';
		$data_parallax = 'data-parallax="scroll"';
		$date_plx_window_css = 'parallax-window';
		$add_style = 'background:none;';
		$plx_bg_position = 'data-position="'.$image_background_position.'"';
	}
	
	echo '<div class="header_normal_design '.$date_plx_window_css.'" '.$data_image_src.' '.$data_parallax.' '.$plx_bg_position.' style=" '.$add_style.' '.$background_display_position.'" >';
	  if( $opacity == 1 ) { echo '<div class="opacity">'; }
		  echo '<div class="'.$container_call.' padding-top-100">';
			
			$display_title = '';
			if( $post_type == 'lipi_kb' ) {
				$kb_catname = get_term_by( 'slug', get_query_var( 'term' ), 'lipikbcat' );
				if( !empty($kb_catname) ) {
					$display_title = $kb_catname->name;
				} else {
					if ( is_tax() ) { 
						$current_term = get_term_by( 'slug', get_query_var( 'term' ), 'lipi_kbtag' );
						$display_title = $current_term->name;
					} else { 
						$terms = get_the_terms( $post->ID , 'lipikbcat' ); 
						if( !empty($terms) ) $display_title = $terms[0]->name;
					}
				}
			} else if( $post_type == 'lipi_faq' ) {
				$faq_catname = get_term_by( 'slug', get_query_var( 'term' ), 'lipifaqcat' );
				if( !empty($faq_catname) ) {
					$display_title = $faq_catname->name;
				}
			}
			 
			 echo '<h1 class="replace_bbpress_header_h1">'.$display_title.'</h1>';
			 if( $breadcrumb ==  true ) { 
			 	echo '<div class="header-breadcrumbs">';
			 	echo lipi__breadcrumb();
				echo '</div>';
			 }
			 
			// Search
			 if( $header_search_box_status == true ) {
				 if( $header_search_box_center == true ) { 
				 	$search_class = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1 padding-top-bottom-10';
				 } else { 
				 	if( isset($header_search_box_position) && $header_search_box_position != '' ) { 
						$header_search_box_position = $header_search_box_position;
					} else { 
						$header_search_box_position = 12;
					}
				 	$search_class = 'col-md-'.$header_search_box_position.' col-sm-12 padding-top-bottom-10 padding-left-right-0 full-width-search';
				 }
				 echo '<div class="'.$search_class.' theme-top-header-searchbox">'; //
				 echo lipi__custom_search_form();
				 echo '</div>';
			 }
			 // Eof search	 
			 
		  echo '</div>';
	  if( $opacity == 1 ) { echo '</div>'; }		
	echo '</div>'; 
		
}
}

// Custom BBPress Header
if (!function_exists('lipi__custombbpress_background')) {
function lipi__custombbpress_background(){
	global $lipi_theme_options;
	$container_call = lipi__website_global_full_width_design_control();
	$data_image_src = $data_parallax = $date_plx_window_css = $date_plx_window_css = $add_style = $plx_bg_position = $background_display_position = $opacity = $parallax_image_status = '';
	
	$header_image = $lipi_theme_options['bbpress_custom_header_image']['url'];
	$header_background_color = $lipi_theme_options['bbpress_custom_header_color'];
	$image_background_position = $lipi_theme_options['bbpress_custom_header_image_position'];
	$image_transparency_status = $lipi_theme_options['bbpress_header_remove_opacity'];
	$parallax_image_status = $lipi_theme_options['bbpress_header_parallax_effect'];
	$breadcrumb = true;
	$header_search_box_status = $lipi_theme_options['bbpress_header_search_box'];
	$header_search_box_center = $lipi_theme_options['bbpress_header_search_box_center'];
	
	if( isset($header_image) && $header_image != '' ){ 
		$add_style = 'background: '.$header_background_color.' url('.$header_image.');'; 
		if( $image_transparency_status == false ) { $opacity = 1; }
		$background_display_position = 'background-position:'.$image_background_position.'!important;background-size: cover;';
	} else if( $header_image == '' && (isset($header_background_color) && $header_background_color != '') ){
		$add_style = 'background: '.$header_background_color.';'; 
	}
	if( isset($parallax_image_status) && $parallax_image_status == true && isset($header_image) && $header_image != ''  ) {  
		$data_image_src = 'data-image-src="'.$header_image.'"';
		$data_parallax = 'data-parallax="scroll"';
		$date_plx_window_css = 'parallax-window';
		$add_style = 'background:none;';
		$plx_bg_position = 'data-position="'.$image_background_position.'"';
	}
	
	$bbpress_forum_args = array(
		'before'          => '',
		'after'           => '',
		'sep'             => '<span class="sep"><i class="fa fa-angle-right"></i></span>', 
		'home_text'       => esc_html__('Home', 'lipi'),
		(($lipi_theme_options['bbpress_breadcrumb'] ==  true )?'':'include_root') => ( ($lipi_theme_options['bbpress_breadcrumb'] ==  true )? '' : false ),
	);
	
	
	echo '<div class="header_normal_design '.$date_plx_window_css.'" '.$data_image_src.' '.$data_parallax.' '.$plx_bg_position.' style=" '.$add_style.' '.$background_display_position.'" >';
	  if( $opacity == 1 ) { echo '<div class="opacity">'; }
		  echo '<div class="'.$container_call.' padding-top-100">';
			
			 echo '<h1 class="replace_bbpress_header_h1">'.esc_attr($lipi_theme_options['bbpress_title_text']).'</h1>';
			 
			 if( (isset($lipi_theme_options['bbpress_subtitle_text']) && $lipi_theme_options['bbpress_subtitle_text'] != '' ) && bbp_is_forum_archive() ) { 
				echo '<p class="desc">'.esc_attr($lipi_theme_options['bbpress_subtitle_text']).'</p>';
			 }
			 
			 if( $breadcrumb ==  true && !bbp_is_forum_archive() ) { 
			 	echo '<div class="header-breadcrumbs">';
			 	bbp_breadcrumb($bbpress_forum_args);
				echo '</div>';
			 }
			 
			// Search
			 if( $header_search_box_status == true ) {
				 if( $header_search_box_center == true ) { 
				 	$search_class = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1 padding-top-bottom-10';
				 } else { 
				 	if( isset($lipi_theme_options['bbpress_header_search_box_position']) && $lipi_theme_options['bbpress_header_search_box_position'] != '' ) {
						$bbpress_header_search_box_position = $lipi_theme_options['bbpress_header_search_box_position'];
					} else {
						$bbpress_header_search_box_position = 12;
					}
				 	$search_class = 'col-md-'.esc_attr($bbpress_header_search_box_position).' col-sm-12 padding-top-bottom-10 padding-left-right-0 full-width-search';
				 }
				 echo '<div class="'.$search_class.' theme-top-header-searchbox">'; //
				 echo lipi__custom_search_form();
				 echo '</div>';
			 }
			 // Eof search	 
			 
		  echo '</div>';
	  if( $opacity == 1 ) { echo '</div>'; }		
	echo '</div>'; 
		
}
}

if (!function_exists('lipi__header_background')) {
function lipi__header_background($id, $custom_content = '' ) { 
	global $lipi_theme_options;
	$container_call = lipi__website_global_full_width_design_control();
	$post_type = get_post_type();
	if( $id == '' ) {
		
		if( $custom_content == 'woo' ) {
		
			echo '<div class="header_normal_design non_define_pg woo_replace_header_layout">
				<div class="'.$container_call.' padding-top-100 fix-padding-top-0">
					<div class="inner-padding">';
						woocommerce_breadcrumb();
				  echo '</div>
			  </div></div>';
		
		} else if( $custom_content == 1 ) {
			if ( class_exists('bbPress') && is_bbPress() ) { 
				if ( bbp_is_forum_archive() ) {
					$add_forum_css = 'forum';
				} else {
					$add_forum_css = ''; 
				}
			}  else { 
				$add_forum_css = ''; 
			}
			echo '<div class="header_normal_design non_define_pg '.$add_forum_css.'">
				  	<div class="'.$container_call.' padding-top-100 fix-padding-top-0">
				  		<div class="inner-padding">';
							if( get_post_type() == 'lipi_faq' ) {
								$faq_catname = get_term_by( 'slug', get_query_var( 'term' ), 'lipifaqcat' );
								if( !empty($faq_catname) ) {
									echo '<h1 style="font-weight: 500!important;">'.$faq_catname->name.'</h1>';
								} else {
									the_archive_title( '<h1>', '</h1>' );
								}
							} else if( get_post_type() == 'lipi_kb' ) {
								$kb_catname = get_term_by( 'slug', get_query_var( 'term' ), 'lipikbcat' );
								if( !empty($kb_catname) ) {
									echo '<h1 style="font-weight: 500!important;">'.$kb_catname->name.'</h1>';
								} else {
									the_archive_title( '<h1>', '</h1>' );
								}
							} else {  
								
								if ( class_exists('bbPress') && is_bbPress() ) {
									if ( bbp_is_forum_archive() ) { 
										echo '<h1>'.esc_attr($lipi_theme_options['bbpress_title_text']).'&nbsp;</h1>';
									} else {
										echo '<h1>'.esc_attr($lipi_theme_options['bbpress_title_text']).'&nbsp;</h1>';
									}
								} else if( is_archive() ) { 
									 the_archive_title( '<h1>', '</h1>' );
								} else {
									 echo '<h1></h1>';
								}
							}
							if ( class_exists('bbPress') && is_bbPress() ) { 
								$bbpress_forum_args = array(
									'before'          => '',
									'after'           => '',
									'sep'             => '<span class="sep"><i class="fa fa-angle-right"></i></span>', 
									'home_text'       => esc_html__('Home', 'lipi'),
									(($lipi_theme_options['bbpress_breadcrumb'] ==  true )?'':'include_root') => ( ($lipi_theme_options['bbpress_breadcrumb'] ==  true )? '' : false ),
								);
								echo '<div class="header-breadcrumbs">';
								if ( bbp_is_forum_archive() ) {
									bbp_breadcrumb($bbpress_forum_args);
								} else {
									bbp_breadcrumb($bbpress_forum_args);
								}
								echo '</div>';
							} else {
								echo lipi__breadcrumb();
							}
					  echo '</div>
			      </div></div>';
		} else {
			echo '<div class="theme_no_select_any_normal_bar"></div>'; 
		}
		
	} else {
		$background_display_position = $image_background_position = $bind_slider_status = $header_image = $replacement_title = $desc = $breadcrumb = $header_image = $add_style = $data_image_src = $data_parallax = $date_plx_window_css = $opacity = $plx_bg_position = $bind_nav_bar_style = $bind_title_bar_display_control = $header_search_box_status = '';
		$bind_slider_status = get_post_meta( $id, '__lipi_slider_active_status', true );
		
		if( $bind_slider_status == 'on' ) {
			lipi__flex_slider($id);
		} else { 
			$rev_silder = get_post_meta( $id, '__lipi_slider_revolution_shortcode', true );
			if (!empty($rev_silder)){ 
				echo '<div class="slider_rv_shortcode_display">';
				echo do_shortcode($rev_silder);
				echo '</div>';
			} else {
			// Title bar control
			$bind_nav_bar_style = get_post_meta( $id, '__lipi_header_menu_bar_type', true );
			$bind_title_bar_display_control = get_post_meta( $id, '__lipi_header_hide_header_bar', true );
			if( $bind_title_bar_display_control == true ) { 
				$hide_title_bar = 1;
			} else { 
				$hide_title_bar = 2; 
			}
			
			if( $hide_title_bar == 2 ) {  
					  
				$replacement_title = get_post_meta( $id, '__lipi_replacement_title', true );
				$desc = get_post_meta( $id, '__lipi_desc_under_title', true );
				$breadcrumb = get_post_meta( $id, '__lipi_header_breadcrumb_status', true );
				$header_image = esc_url(get_post_meta( $id, '__lipi_header_background_image', true ));
				$parallax_image_status = get_post_meta( $id, '__lipi_header_parallax_status', true );
				$image_transparency_status = get_post_meta( $id, '__lipi_header_image_opacity_status', true );
				$image_background_position = get_post_meta( $id, '__lipi_background_img_display_position', true );
				$header_search_box_status = get_post_meta( $id, '__lipi_header_searchbox_status', true );
				$header_background_color = get_post_meta( $id, '__lipi_header_background_color', true );
				$header_search_box_center = get_post_meta( $id, '__lipi_header_searchbox_status_center', true );
				$header_search_box_display_grid = get_post_meta( $id, '__lipi_search_box_display_grid', true );
				
				if( isset($header_image) && $header_image != '' ){ 
					$add_style = 'background: '.$header_background_color.' url('.$header_image.');'; 
					if( $image_transparency_status == false ) { $opacity = 1; }
					$background_display_position = 'background-position:'.$image_background_position.'!important;background-size: cover;';
				}
				if( isset($parallax_image_status) && $parallax_image_status == 'on' && isset($header_image) && $header_image != ''  ) {  
					$data_image_src = 'data-image-src="'.$header_image.'"';
					$data_parallax = 'data-parallax="scroll"';
					$date_plx_window_css = 'parallax-window';
					$add_style = 'background:none;';
					$plx_bg_position = 'data-position="'.$image_background_position.'"';
				}
				if( is_single() && $post_type != 'lipi_portfolio' ) { 
					$add_h1_class = '';
					$add_p_class = 'style="padding-bottom: 8px;"';
				} else { 
					$add_h1_class = '';
					$add_p_class = '';
				}
				
				// Woo Handle
				if(function_exists("is_product") && is_product() && is_single()){	
					$add_hide_class_style = '';
					$h1_no_title = 2;
				// end of woo handle
				} else  if( is_single() && $post_type != 'lipi_portfolio' && $post_type != 'lipi_services' && $post_type != 'lipi_kb' && ($lipi_theme_options['blog-single-title-layout-type'] == 1) ) {  
					$add_hide_class_style = 'single-blog-align';
					$h1_no_title = 1;	
				} else {
					$add_hide_class_style = '';
					$h1_no_title = 2;	
				}
				
				echo '<div class="header_normal_design '.$date_plx_window_css.'" '.$data_image_src.' '.$data_parallax.' '.$plx_bg_position.' style=" '.$add_style.' '.$background_display_position.'" >';
					  if( $opacity == 1 ) { echo '<div class="opacity">'; }
						  echo '<div class="'.$container_call.' padding-top-100">';
						     if( $breadcrumb != 'on' ) echo lipi__breadcrumb();
							 echo ' <div class="inner-padding '.$add_hide_class_style.'">';
								if( get_post_meta( $id, '__lipi_header_disable_main_replacement_title', true ) == false ) { 
									// For KB posts
									if( get_post_type() == 'lipi_kb' ) {
										$kb_terms = get_the_terms( $id , 'lipikbcat' ); 
										$term = array_pop($kb_terms);
										echo '<h1 '.$add_h1_class.'>'.($replacement_title?$replacement_title:$term->name).'</h1>';
									} else { 
										if( $h1_no_title != 1 ) { 
											if( trim($replacement_title) == '' && trim(get_the_title($id)) == '' ) {
												echo '<h1 '.$add_h1_class.'>&nbsp;</h1>';
											} else {
												echo '<h1 '.$add_h1_class.'>'.($replacement_title?$replacement_title:get_the_title($id)).'</h1>';
											}
										}
									}
								} else { 
									if( 
										get_post_meta( $id, '__lipi_header_disable_main_replacement_title', true ) == true &&
										$breadcrumb == 'on'
									) { 
										echo ''; 
									} else {
										echo '<h1 '.$add_h1_class.'>&nbsp;</h1>';
									}
								}
								if( !empty($desc) ) { echo '<p class="desc" '.$add_p_class.'>'.$desc.'</p>'; }
								if( is_single() && $post_type != 'lipi_portfolio' && $post_type != 'lipi_kb' && $lipi_theme_options['blog-single-title-layout-type'] == 2 ) { 
									echo '<p class="singe-post-entry-meta">'; lipi__entry_meta(); echo '</p>'; 
								}
								// Search
								 if( $header_search_box_status == true ) {
									 if( $header_search_box_center == true ) {
									 	$search_class = 'col-md-10 col-sm-12 col-xs-12 col-md-offset-1 padding-top-bottom-10';
									 } else { 
									 	if( isset($header_search_box_display_grid) && $header_search_box_display_grid != '' ) {
											$header_search_box_display_grid = $header_search_box_display_grid;
										} else {
											$header_search_box_display_grid = 12;
										} 
									 	$search_class = 'col-md-'.$header_search_box_display_grid.' col-sm-12 padding-top-bottom-10 padding-left-right-0 full-width-search';
									 }
									 echo '<div class=" '.$search_class.' theme-top-header-searchbox">'; //
									 echo lipi__custom_search_form();
									 echo '</div>';
								 }
								 // Eof search	 
							 echo '</div>'; // eof inner padding
						  echo '</div>';
					  if( $opacity == 1 ) { echo '</div>'; }		
				echo '</div>'; 
				
			
			}// end header control if
			}
		} // end else
		
		
	} // end if else without id blank
}
}

/*-----------------------------------------------------------------------------------*/
/*	BREADCRUM
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__breadcrumb')) {
function lipi__breadcrumb() {
	global $lipi_theme_options;
    //Variable (symbol >> encoded) and can be styled separately.
    //Use >> for different level categories (parent >> child >> grandchild)
    $delimiter = '<span class="sep"><i class="fa fa-angle-right"></i></span>';
    //Use bullets for same level categories ( parent . parent )
    $delimiter1 = '<span class="delimiter1"> &bull; </span>';
     
    //text link for the 'Home' page
    $main = esc_html__('Home', 'lipi'); 
    //Display only the first 30 characters of the post title.
    $maxLength = 30;
     
    //variable for archived year
    $arc_year = get_the_time('Y', true);
    //variable for archived month
    $arc_month = get_the_time('F', true);
    //variables for archived day number + full
    $arc_day = get_the_time('d', true);
    $arc_day_full = get_the_time('l', true); 
     
    //variable for the URL for the Year
    $url_year = get_year_link($arc_year);
    //variable for the URL for the Month   
    $url_month = get_month_link($arc_year,$arc_month);
	
	//Get the blog page ID
	$posts_page_id = get_option('page_for_posts');

    //Check if NOT the front page (whether your latest posts or a static page) is displayed. Then add breadcrumb trail.
    if (!is_front_page()) { 
	
		global $post, $cat; 
		$homeLink = home_url(); 
		      
        $return_result =  '<div class="header-breadcrumbs">';
        $return_result .=  '<a href="' . $homeLink . '">' . $main . '</a>' . $delimiter;   
		
		if (is_home()) {
			$return_result .=  '<a href="' . get_permalink( $posts_page_id ) . '">' . get_the_title($posts_page_id) .'</a>' . $delimiter;
		} else if (is_tax( 'lipiptfocategory' ) || get_post_type() == 'lipi_portfolio') {
			$portfolio_home_url = esc_url($lipi_theme_options['portfolio-breadcrumb-custom-home-url']);
			$portfolio_data = get_post_type_object('lipi_portfolio');
			$return_result .= '<a href="' . $portfolio_home_url . '">' . ($lipi_theme_options['portfolio-breadcrumb-name']?esc_attr($lipi_theme_options['portfolio-breadcrumb-name']):$portfolio_data->labels->singular_name) .'</a>' . $delimiter;
		} else if (is_tax( 'lipikbcat' ) || get_post_type() == 'lipi_kb') {
			$kb_home_url = esc_url($lipi_theme_options['kb_breadcrumb_custom_home_url']);
			$kb_data = get_post_type_object('lipi_kb');
			$return_result .= '<a href="' . $kb_home_url . '">' . ($lipi_theme_options['kb_breadcrumb_name']?esc_attr($lipi_theme_options['kb_breadcrumb_name']):$kb_data->labels->singular_name) .'</a>' . $delimiter;
		}  else if (is_tax( 'lipifaqcat' ) || get_post_type() == 'lipi_faq') {
			$faq_data = get_post_type_object('lipi_faq');
			$return_result .= '<a href="' . get_post_type_archive_link( 'lipi_faq' ) . '">' . $faq_data->labels->singular_name .'</a>' . $delimiter;
		}  else if (is_tax( 'lipisvscat' ) || get_post_type() == 'lipi_services') {
			$services_home_url = esc_url($lipi_theme_options['services-breadcrumb-custom-home-url']);
			$services_data = get_post_type_object('lipi_services');
			$return_result .= '<a href="' . $services_home_url . '">' . ($lipi_theme_options['services-breadcrumb-name']?esc_attr($lipi_theme_options['services-breadcrumb-name']):$services_data->labels->singular_name) .'</a>' . $delimiter;
		}
       
        //Display breadcrumb for single post
        if (is_single()) {
			
			 if( get_post_type() == 'lipi_kb' ) {
				
				$terms = get_the_terms( $post->ID , 'lipikbcat' );
				$term = array_pop($terms);
				$st_term_ancestors = get_ancestors( $term->term_id, 'lipikbcat' );
				$st_term_ancestors = array_reverse( $st_term_ancestors );
				foreach( $st_term_ancestors as $st_term_ancestor ) {
					// Get the taxonomy link
					$st_category_link = get_term_link( $st_term_ancestor, 'lipikbcat' );
					// Get the taxonomy name
					$st_category_data = get_term( $st_term_ancestor, 'lipikbcat' );
					$return_result .= '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
				}
				$return_result .= '<a href="'.get_term_link($term->slug, 'lipikbcat').'">'.$term->name.'</a>';

			
			} else if( get_post_type() == 'lipi_portfolio' ) {
				
				$terms = get_the_terms( $post->ID , 'lipiptfocategory' );
				$term = array_pop($terms);
				$st_term_ancestors = get_ancestors( $term->term_id, 'lipiptfocategory' );
				$st_term_ancestors = array_reverse( $st_term_ancestors );
				foreach( $st_term_ancestors as $st_term_ancestor ) {
					// Get the taxonomy link
					$st_category_link = get_term_link( $st_term_ancestor, 'lipiptfocategory' );
					// Get the taxonomy name
					$st_category_data = get_term( $st_term_ancestor, 'lipiptfocategory' );
					$return_result .= '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
				}
				$return_result .= '<a href="'.get_term_link($term->slug, 'lipiptfocategory').'">'.$term->name.'</a>';

			
			} else if( get_post_type() == 'lipi_services' ) {
				
				$terms = get_the_terms( $post->ID , 'lipisvscat' );
				$term = array_pop($terms);
				$st_term_ancestors = get_ancestors( $term->term_id, 'lipisvscat' );
				$st_term_ancestors = array_reverse( $st_term_ancestors );
				foreach( $st_term_ancestors as $st_term_ancestor ) {
					// Get the taxonomy link
					$st_category_link = get_term_link( $st_term_ancestor, 'lipisvscat' );
					// Get the taxonomy name
					$st_category_data = get_term( $st_term_ancestor, 'lipisvscat' );
					$return_result .= '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
				}
				$return_result .= '<a href="'.get_term_link($term->slug, 'lipisvscat').'">'.$term->name.'</a>';
				
				
			} else {
		
				$category_name = get_the_category( $posts_page_id );
				$array_count = count($category_name);
				    if( $array_count > 0 ) {
						// Get the ID of a given category
						$category_id = get_cat_ID( $category_name[0]->cat_name );
						// Get the URL of this category
						$category_link = get_category_link( $category_id );
					}
					if( get_post_type() == 'post' ) {
						$check_static_blog_page = get_option( 'page_for_posts' );
						if( $check_static_blog_page != 0 ) {
							$return_result .=  '<a href="' . get_permalink( $posts_page_id ) . '">' . get_the_title($posts_page_id) .'</a>' . $delimiter;	
						} else {
							$return_result .= '';
						}
					} else {
						$return_result .=  '<a href="' . get_permalink( $posts_page_id ) . '">' . get_the_title($posts_page_id) .'</a>' . $delimiter;	
					}
					$post_categories = get_the_category();
					$post_output = '';
					if ( ! empty( $post_categories ) ) {
						$arrount_count = count($post_categories);
						$loop_array = 1;
						$comma = '';
						foreach( $post_categories as $category ) {
							if( $arrount_count > 1 ) { 
								if( $arrount_count == $loop_array ) $comma = '';
								else $comma = ', ';
							}
							$return_result .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>'.$comma;
							$loop_array++;
						}
					}
					// if no post page define
					if( get_post_type() == 'post' ) {
						$check_static_blog_page = get_option( 'page_for_posts' );
						if( $check_static_blog_page == 0 ) {
							$return_result .=  $delimiter. '<a href="' . get_permalink( $posts_page_id ) . '">' . get_the_title($posts_page_id) .'</a>';	
						}
					}
					
			}
			
			
		} else if (is_tax( 'lipifaqcat' )) {
			// Get term data to retrive parent
			$st_term_data = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$st_term_parent_data = get_term($st_term_data->term_id, get_query_var('taxonomy') );
			$st_term_parent_id = $st_term_parent_data->term_id;
			$st_term_ancestors = get_ancestors( $st_term_parent_id, 'lipifaqcat' );
			$st_term_ancestors = array_reverse( $st_term_ancestors );
			foreach( $st_term_ancestors as $st_term_ancestor ) {
				// Get the taxonomy link
				$st_category_link = get_term_link( $st_term_ancestor, 'lipifaqcat' );
				// Get the taxonomy name
				$st_category_data = get_term( $st_term_ancestor, 'lipifaqcat' );
				$return_result .= '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
			}
			$return_result .= single_cat_title("", false);
			
			
		} else if (is_tax( 'lipikbcat' )) {
			// Get term data to retrive parent
			$st_term_data = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$st_term_parent_data = get_term($st_term_data->term_id, get_query_var('taxonomy') );
			$st_term_parent_id = $st_term_parent_data->term_id;
			$st_term_ancestors = get_ancestors( $st_term_parent_id, 'lipikbcat' );
			$st_term_ancestors = array_reverse( $st_term_ancestors );
			foreach( $st_term_ancestors as $st_term_ancestor ) {
				// Get the taxonomy link
				$st_category_link = get_term_link( $st_term_ancestor, 'lipikbcat' );
				// Get the taxonomy name
				$st_category_data = get_term( $st_term_ancestor, 'lipikbcat' );
				$return_result .= '<a href="'. $st_category_link .'">'. $st_category_data->name .'</a>' . $delimiter;
			}
			$return_result .= single_cat_title("", false);
		
		
        } else if (is_category()) { //Check if Category archive page is being displayed.
           if ( is_wp_error( $cat_parents = get_category_parents($cat, TRUE, $delimiter) )) 	{ 
			$return_result .=  $cat_parents; 
			} else {
			$return_result .=  single_cat_title( '', false );
			}
        }
		//Display breadcrumb for archive
		elseif (is_archive()) {
			// Check If Woo Active
			if(function_exists("is_woocommerce") && is_shop()){
				$woopage_id = get_option('woocommerce_shop_page_id');
				if( isset($woopage_id) && $woopage_id != '' ) {
					$wooID  = get_post( $woopage_id );
					$return_result .= get_the_title($wooID->ID);
				} else {
					$page = get_page_by_title( 'shop' );
					if( isset($page->ID) && $page->ID != "" ) { 
						$pageID = $page->ID;
						$return_result .= get_the_title($pageID);
					} else {  
						$return_result .= get_the_title();
					}
				}
			// Normal			
			} else if ( is_day() ) {
				$return_result .=  get_the_date();
			} elseif ( is_month() ) {
				$return_result .=  get_the_date( _x( 'F Y', 'monthly archives date format', 'lipi' ) );
			} elseif ( is_year() ) {
				 $return_result .=  get_the_date( _x( 'Y', 'yearly archives date format', 'lipi' ) );
			} else {
				$return_result .= esc_html__( 'Archives', 'lipi' );
			}
		}
        //Display breadcrumb for tag archive       
        elseif ( is_tag() ) { 
            $return_result .=  single_tag_title("", false);
        }       
        //Display breadcrumb for calendar (day, month, year) archive
        elseif ( is_day()) { 
            $return_result .=  '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . ' ';
            $return_result .=  '<a href="' . $url_month . '">' . $arc_month . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
			
        }
        elseif ( is_month() ) {  //Check if the page is a date (month) based archive page.
            $return_result .=  '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . $arc_month;
			
        }
        elseif ( is_year() ) {  //Check if the page is a date (year) based archive page.
            $return_result .=  $arc_year;
			
        }      
        //Display breadcrumb for search result page
        elseif ( is_search() ) { 
			$return_result .=  esc_html__('Search Results for: ', 'lipi') . get_search_query();
			
        }      
        //Display breadcrumb for top-level pages (top-level menu)
        elseif ( is_page() && !$post->post_parent ) { 
            $return_result .=  get_the_title();
			
        }          
        //Display breadcrumb trail for multi-level subpages (multi-level submenus)
        elseif ( is_page() && $post->post_parent ) {    
            $post_array = get_post_ancestors($post);
            krsort($post_array);
            foreach($post_array as $key=>$postid){
                //returns the object $post_ids
                $post_ids = get_post($postid);
                //returns the name of the currently created objects
                $title = $post_ids->post_title;
                //Create the permalink of $post_ids
                $return_result .=  '<a href="' . get_permalink($post_ids) . '">' . $title . '</a>' . $delimiter;
            }
            $return_result .= get_the_title(); //returns the title of the current page. 
			             
        }          
        //Display breadcrumb for author archive  
        elseif ( is_author() ) {
            global $author;
            $user_info = get_userdata($author);
            $return_result .=   $user_info->display_name;
			
        }      
        //Display breadcrumb for 404 Error
        elseif ( is_404() ) {

        }      
        else {
            //All other cases that I missed. No Breadcrumb trail.
        }
       $return_result .=  '</div>';    
    return $return_result;
	} 
}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME SLIDER :: THEME LOGO
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__theme_logo')) {
function lipi__theme_logo() {
	global $lipi_theme_options;
	
	$dark_logo = $white_logo = '';
	
	if( isset($lipi_theme_options['general_bind_theme_logo_normal']['url']) && $lipi_theme_options['general_bind_theme_logo_normal']['url'] != '' ) {
		$dark_logo = $lipi_theme_options['general_bind_theme_logo_normal']['url'];
	} else {
		$dark_logo = get_template_directory_uri().'/img/logo-dark.png';
	}
	
	if( isset($lipi_theme_options['general_bind_theme_logo_white']['url'])  && $lipi_theme_options['general_bind_theme_logo_white']['url'] != '' ) {
		$white_logo = $lipi_theme_options['general_bind_theme_logo_white']['url'];
	} else {
		$white_logo = get_template_directory_uri().'/img/logo.png';
	}
	
	return '<img src="'.esc_url($dark_logo).'" class="logo-image logo-hide dark" alt="'.get_bloginfo( 'name' ).'">
		  <img class="logo-image white" src="'.esc_url($white_logo).'" alt="'.get_bloginfo( 'name' ).'">'; 
	
}
}

/*-----------------------------------------------------------------------------------*/
/*	FOOTER :: WIDGET AREA
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__theme_footer_widget')) {
function lipi__theme_footer_widget() {
	$is_plugin_active = lipi__plugin_active('ReduxFramework');
	if($is_plugin_active == true){
	global $lipi_theme_options;
	
	$col_md = $col_sm = '';
	$hide_widget = 4;
	
	if( isset( $lipi_theme_options['theme_footer_noof_section_widget_area'] ) && $lipi_theme_options['theme_footer_noof_section_widget_area'] != '' ) {
		$col_footer_one = $lipi_theme_options['footer_one_widget_column'];
		$col_footer_two = $lipi_theme_options['footer_two_widget_column'];
		$col_footer_three = $lipi_theme_options['footer_three_widget_column'];
		$col_footer_four = $lipi_theme_options['footer_four_widget_column'];
		if( $lipi_theme_options['theme_footer_noof_section_widget_area'] == 4 ) {
			$col_sm = 12;
			$hide_widget = 4;
		} else if( $lipi_theme_options['theme_footer_noof_section_widget_area'] == 3 ) {
			$col_sm = 12;
			$hide_widget = 3;
		} else if( $lipi_theme_options['theme_footer_noof_section_widget_area'] == 2 ) {
			$col_sm = 12;
			$hide_widget = 2;
		} else if( $lipi_theme_options['theme_footer_noof_section_widget_area'] == 1 ) {
			$col_sm = 12;
			$hide_widget = 1;
		}
	}
	
	if( isset($lipi_theme_options['theme_footer_widget_bg_image']['url']) && $lipi_theme_options['theme_footer_widget_bg_image']['url'] != '' ) { 
		$footerurl = 'background: '.$lipi_theme_options['theme_footer_widget_bg_color'].' url('.$lipi_theme_options['theme_footer_widget_bg_image']['url'].') '.$lipi_theme_options['theme_footer_widget_bg_image_position'].' / cover no-repeat;';
	} else {
		$footerurl = '';
	}
	
	if( ($lipi_theme_options['disable_widget_area'] == false) && (is_active_sidebar( 'footer-box-1' ) || is_active_sidebar( 'footer-box-2' ) || is_active_sidebar( 'footer-box-3' ) || is_active_sidebar( 'footer-box-4' )) ) {
	
	echo '<div class="footer-layer-1" style="'.$footerurl.'">';
	
    if( isset( $lipi_theme_options['footer-area-container-global-full-width'] ) && $lipi_theme_options['footer-area-container-global-full-width'] == true ) { 
		echo '<div class="container-fluid">';
	} else { 
		echo '<div class="container">';
	}

    echo '<div class="row">';
		  	
          echo '<div class="col-md-'.$col_footer_one.' col-sm-'.$col_sm.'">';
				dynamic_sidebar( 'footer-box-1' ); 
          echo '</div>';
		  
		  if( $hide_widget == 4 || $hide_widget == 3 || $hide_widget == 2  ) { 
			  echo '<div class="col-md-'.$col_footer_two.' col-sm-'.$col_sm.'">';
				dynamic_sidebar( 'footer-box-2' ); 
			  echo '</div>';
		  }
		  
		 if( $hide_widget == 4 || $hide_widget == 3 && $hide_widget != 2  ) { 
			 echo '<div class="col-md-'.$col_footer_three.' col-sm-'.$col_sm.'">';
				dynamic_sidebar( 'footer-box-3' ); 
			 echo '</div>';
		 }
		 
		 if( $hide_widget == 4 && $hide_widget != 3 && $hide_widget != 2  ) {  
			 echo '<div class="col-md-'.$col_footer_four.' col-sm-'.$col_sm.'">';
				dynamic_sidebar( 'footer-box-4' ); 
			 echo '</div>';
		 }
		  
	echo '</div>
      </div>
    </div>';
	}
}
}
}

/*-----------------------------------------------------------------------------------*/
/*	FOOTER :: END AREA
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__theme_footer_end')) {
function lipi__theme_footer_end() {
	global $lipi_theme_options;
	
	$float_left = $float_right = '';
	
	if( $lipi_theme_options['disable_social_copyright_area'] == false ) {
	echo '<div class="footer-layer-2">';
    if( isset( $lipi_theme_options['footer-area-container-global-full-width'] ) && $lipi_theme_options['footer-area-container-global-full-width'] == true ) { 
		echo '<div class="container-fluid">';
	} else { 
		echo '<div class="container">';
	}
    echo '<div class="text-center">';
         
	 if( $lipi_theme_options['disable_social_icons_area'] == false ) {
		echo '<ul class="social-footer">';
		
	  if( $lipi_theme_options['social_icon_twitter_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_twitter_url']).'" title="Twitter" target="_blank"><i class="fab fa-twitter social-footer-icon twitter"></i></a></li>';
	  }
	  if( $lipi_theme_options['social_icon_facebook_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_facebook_url']).'" title="Facebook" target="_blank"><i class="fab fa-facebook social-footer-icon facebook"></i></a></li>';
	  }
	  if( $lipi_theme_options['social_icon_youtube_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_youtube_url']).'" title="YouTube" target="_blank"><i class="fab fa-youtube social-footer-icon youtube"></i></a> </li>';
	  }
	  if( $lipi_theme_options['social_icon_google_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_google_url']).'" title="Google+" target="_blank"><i class="fab fa-google-plus-g social-footer-icon google-plus"></i></a></li>';
	  }
	  if( $lipi_theme_options['social_icon_instagram_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_instagram_url']).'" title="Instagram" target="_blank"><i class="fab fa-instagram social-footer-icon instagram"></i></a></li>';
	  }
	  if( $lipi_theme_options['social_icon_linkedin_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_linkedin_url']).'" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in social-footer-icon linkedin"></i></a> </li>';
	  }
	  if( $lipi_theme_options['social_icon_pinterest_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_pinterest_url']).'" title="Pinterest" target="_blank"><i class="fab fa-pinterest-p social-footer-icon pinterest"></i></a> </li>';
	  }
	  if( $lipi_theme_options['social_icon_vimo_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_vimo_url']).'" title="Vimo" target="_blank"><i class="fab fa-vimeo-v social-footer-icon vimo"></i></a> </li>';
	  }
	  if( $lipi_theme_options['social_icon_tumblr_url'] != '' ) {
		echo '<li><a href="'.esc_url($lipi_theme_options['social_icon_tumblr_url']).'" title="Tumblr" target="_blank"><i class="fab fa-tumblr social-footer-icon tumblr"></i></a> </li>';
	  }
	  
        echo '</ul>';
	 } else {
		 
		 if( $lipi_theme_options['disable_footer_nav_area'] == true && $lipi_theme_options['disable_copyright_area'] == false ) {
			 $float_left = '';
			 $float_right = '';
		 } else {
			 $float_left = 'pull-left';
			 $float_right = 'pull-right';
		 }
	 }
	 
	 
	     if( $lipi_theme_options['disable_copyright_area'] == false ) { 
			 echo '<p class="footer-copyright-area '.esc_attr($float_right).'"> '.($lipi_theme_options['footer_copyright_text_here']).'  </p>';
		 }
		 if( $lipi_theme_options['disable_footer_nav_area'] == false ) { 
			if ( has_nav_menu( 'footer' ) ) { 
				wp_nav_menu( array( 'theme_location' => 'footer', 'container' => 'div', 'container_class' => 'copyright-links '.esc_attr($float_left).' ', 'link_before' => '', 'link_after' => '', 'fallback_cb' => false, 'menu_id' => 'footer_menu', 'depth' => 1 )); 	
			}
		 }
       echo '</div>
      </div>
    </div>';
	}
}
}

/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERSE ::  REPLACE HEADER CSS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__woo_replace_default_settings')) {
function lipi__woo_replace_default_settings(){
	echo '.woo_replace_header_layout .woocommerce-breadcrumb{ float: left; margin-top: 0px!important; font-size: 12px; margin:0px; padding-top: 22px;} .woo_replace_header_layout .woocommerce-breadcrumb a { color: #666; } @media (max-width:767px) { .woo_replace_header_layout .woocommerce-breadcrumb { margin-top: 0px!important; } }';
}
}
/*-----------------------------------------------------------------------------------*/
/*	WOOCOMMERSE ::  REPLACE HEADER CSS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__woo_shop_column_css_handler')) {
function lipi__woo_shop_column_css_handler(){
	global $lipi_theme_options;
	$page_id = get_option('woocommerce_shop_page_id');
	if( (isset($page_id) && $page_id != '' ) || $page_id == '' ) { echo '.header_normal_design .padding-top-100 .inner-padding h1 {float: left;}.header-breadcrumbs { float: right; }'; }
	if( $lipi_theme_options['woo_column_product_listing'] == 4  ) {
		echo '@media (max-width:767px) { .woocommerce ul.products li.product{ width: 99%; } }';
	} else if( $lipi_theme_options['woo_column_product_listing'] == 3  ) {
		echo '.woocommerce ul.products li.product{ width: 30.7%; } @media (max-width:767px) { .woocommerce ul.products li.product{ width: 99.5%; } }';
	}
}
}


/*-----------------------------------------------------------------------------------*/
/*	CUSTOMIZER DEFAULT SETTINGS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__wp_default_settings')) {
function lipi__wp_default_settings() {
	// default with no title
	echo '.site-header {position: relative;} .header_normal_design .inner-padding h1 { display:none; } .header-breadcrumbs { float: left; } .site-header .logo-image.white { display: none; } .site-header .logo-image.logo-hide {display: block; } .header-breadcrumbs { margin-top: 19px; } @media (max-width: 767px){  .header-breadcrumbs { text-align: left; margin-top: 19px!important; } }';
}
}
if (!function_exists('lipi__bbpress_wp_default_settings')) {
function lipi__bbpress_wp_default_settings() {
	// default with no title
	echo '.site-header {position: relative;} .header_normal_design .inner-padding h1 { display:block; } .header-breadcrumbs { float: right; } .site-header .logo-image.white { display: none; } .site-header .logo-image.logo-hide {display: block; } .header-breadcrumbs { margin-top: 19px; } .header_normal_design .padding-top-100 { margin-top: 26px;
}   @media (max-width:767px) { .header_normal_design.non_define_pg.forum .header-breadcrumbs {  margin-top: -4px; } }';
}
}


/*-----------------------------------------------------------------------------------*/
/*	CUSTOMIZER 
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__page_post_customizer')) {
function lipi__page_post_customizer($postID) {
	global $lipi_theme_options;
	$current_post_type = get_post_type();
	
	$nav_background_status = $header_menu_bar_type = $bind_slider_status = $bind_slider_height = $slider_rev_code_stauts = $header_background_stauts = $desc = $nav_border_status = $readjust_padding_height = $readjust_alignment_header = $font_weight = $font_size = $font_text_transform = $font_title_text_padding = '';
	// Header Navigation
	$nav_background_status = get_post_meta( $postID, '__lipi_header_nav_bar_bg_color_status', true );
	$nav_initally_hide_status = get_post_meta( $postID, '__lipi_header_nav_hide_initally', true );
	$nav_border_status = get_post_meta( $postID, '__lipi_header_nav_transparent_border_status', true );
	$header_menu_bar_type = get_post_meta( $postID, '__lipi_header_menu_bar_type', true );
	$bind_slider_status = get_post_meta( $postID, '__lipi_slider_active_status', true );
	$bind_slider_height = get_post_meta( $postID, '__lipi_slider_height', true );
	$bind_breadcrumb_status = get_post_meta( $postID, '__lipi_header_breadcrumb_status', true );
	// check background
	$slider_rev_code_stauts = get_post_meta( $postID, '__lipi_slider_revolution_shortcode', true );
	$header_background_stauts = get_post_meta( $postID, '__lipi_header_background_image', true );
	$desc = get_post_meta( $postID, '__lipi_desc_under_title', true );
	$readjust_padding_height = get_post_meta( $postID, '__lipi_readjust_padding_height', true );
	$readjust_alignment_header = get_post_meta( $postID, '__lipi_header_text_alignment_tye', true );
	$nav_section_border_bottom_color = get_post_meta( $postID, '__lipi_nav_border_color', true );
	$nav_section_border_bottom_color_opacity = get_post_meta( $postID, '__lipi_nav_border_opacity', true );
	$add_nav_box_shadow = get_post_meta( $postID, '__lipi_add_nav_box_shadow', true );
	$nav_bar_bg_color = get_post_meta( $postID, '__lipi_nav_bar_bg_color', true );
	$nav_bar_bg_color_opacity = get_post_meta( $postID, '__lipi_nav_bar_bg_color_opacity', true );
	$header_background_color = get_post_meta( $postID, '__lipi_header_background_color', true );
	$header_background_linear_gradient_color = get_post_meta( $postID, '__lipi_header_linear_background_color', true );
	$header_bg_image_opacity_color = get_post_meta( $postID, '__lipi_header_bg_image_opacity_color', true );
	$header_bg_image_opacity_color_depth = get_post_meta( $postID, '__lipi_header_bg_image_opacity_color_depth', true );
	$header_image_opacity_status = get_post_meta( $postID, '__lipi_header_image_opacity_status', true );
	$readjust_padding_height_responsive = get_post_meta( $postID, '__lipi_readjust_padding_height_responsive', true );
	
	/*****
	*  HEADER START
	******/
	$theme_header_mid_bar_text_color = $theme_header_mid_bar_breadcrumbs_regular_color = '';
	if( isset($lipi_theme_options['theme_header_mid_bar_text_color']) && $lipi_theme_options['theme_header_mid_bar_text_color'] != "" ) {
		$theme_header_mid_bar_text_color = 'color:'.esc_attr($lipi_theme_options['theme_header_mid_bar_text_color']).';';
	}
	if( isset($lipi_theme_options['theme_header_mid_bar_breadcrumbs_regular_color']) && 
		$lipi_theme_options['theme_header_mid_bar_breadcrumbs_regular_color'] != "" ) {
		$theme_header_mid_bar_breadcrumbs_regular_color = 'color:'.esc_attr($lipi_theme_options['theme_header_mid_bar_breadcrumbs_regular_color']).';';
	}
	
	if( is_page() ) { 
		echo '.header-breadcrumbs{ float:right; }'; 
		if( $header_background_color == ""  ) { lipi__header_mid_global_bar(); }
		if( $header_background_stauts == '' ) { 
			echo '.header_normal_design .inner-padding h1, .header-breadcrumbs { '.$theme_header_mid_bar_text_color.' } .header_normal_design  .header-breadcrumbs a{ '.$theme_header_mid_bar_breadcrumbs_regular_color.'  }'; 
		}
	}
	
	// for other custom pages
	if( !is_page() && $header_background_stauts  == '' ) {
		if( $header_background_stauts == '' ) { 
			echo '.header_normal_design .inner-padding h1, .header-breadcrumbs { '.$theme_header_mid_bar_text_color.' } .header_normal_design  .header-breadcrumbs a{ '.$theme_header_mid_bar_breadcrumbs_regular_color.'  }'; 
		}	
	}
	
	// - Navigation Header Section (logo N menu bar)
	if( $nav_initally_hide_status == 'on' ) { 
		if( $header_menu_bar_type == 'standard' ) {
			echo '@media (min-width:991px) and (max-width:4000px) { .site-header { display:none; } nav.site-header.after-scroll-wrap { display:block; } }'; 
		} else {
			echo '.site-header { z-index: 0; }'; 
		}
	}
	
	// - READJUST, header height
	if( isset($readjust_padding_height) && $readjust_padding_height != '' ) { echo '.header_normal_design .padding-top-100 {padding: '.esc_attr($readjust_padding_height).';} @media (max-width: 991px) and (min-width: 768px) { .header_normal_design .padding-top-100 { padding:'.esc_attr($readjust_padding_height_responsive).'; } } @media (max-width:767px) {  .header_normal_design .padding-top-100 { padding:'.esc_attr($readjust_padding_height_responsive).'; }  } '; }
	
	// standard header fix
	if( ($header_menu_bar_type == 'standard' || $header_menu_bar_type == 'custom') && $header_background_stauts != ''  && ($header_bg_image_opacity_color != '' && $header_image_opacity_status != 'on') && $bind_slider_status != 'on' && $slider_rev_code_stauts == '' ) {
		// Header Opacity
		$header_bg_image_opacity_color_depth = ($header_bg_image_opacity_color_depth != ''?$header_bg_image_opacity_color_depth:'0.3');
		$bg_image_opacity_color_rgb = lipi__hex2rgb($header_bg_image_opacity_color);
		$rgb_bg_image_opacity_color_rgb = 'rgba('.$bg_image_opacity_color_rgb[0].', '.$bg_image_opacity_color_rgb[1].', '.$bg_image_opacity_color_rgb[2].', '.$header_bg_image_opacity_color_depth.')';
		echo '.header_normal_design .opacity {background:'.$rgb_bg_image_opacity_color_rgb.'!important;}'; 
	}
	
	// - Header Type == - If APPLIED, background image OR active Rev Slider OR active Custom Slider
	if( ($bind_slider_status == 'on' || $slider_rev_code_stauts != '' || $header_background_stauts != '' || $header_background_color != '') && $header_menu_bar_type == 'custom'  ) {
		if( $nav_background_status == 'on' ) { 
			$nav_bar_bg_color_opacity = ($nav_bar_bg_color_opacity!=''?$nav_bar_bg_color_opacity:'0.3');
			$nav_bar_bg_color_rgb = lipi__hex2rgb($nav_bar_bg_color);
			$rgb_nav_bar_bg_color = 'rgba('.$nav_bar_bg_color_rgb[0].', '.$nav_bar_bg_color_rgb[1].', '.$nav_bar_bg_color_rgb[2].', '.$nav_bar_bg_color_opacity.')';
			echo '.site-header, .special-apperance-menu.item-block {background:'.$rgb_nav_bar_bg_color.'!important;}'; 
		} else {
			echo '.site-header{background: transparent!important;}';
		}
		
		// Header Opacity
		if( $nav_background_status != '' && ($header_bg_image_opacity_color != '' && $header_image_opacity_status != 'on') ) {  
			$header_bg_image_opacity_color_depth = ($header_bg_image_opacity_color_depth != ''?$header_bg_image_opacity_color_depth:'0.3');
			$bg_image_opacity_color_rgb = lipi__hex2rgb($header_bg_image_opacity_color);
			$rgb_bg_image_opacity_color_rgb = 'rgba('.$bg_image_opacity_color_rgb[0].', '.$bg_image_opacity_color_rgb[1].', '.$bg_image_opacity_color_rgb[2].', '.$header_bg_image_opacity_color_depth.')';
			echo '.header_normal_design .opacity {background:'.$rgb_bg_image_opacity_color_rgb.'!important;}'; 
		}
		
		// - change text color
		echo '.site-header .site-header-category-links li > .menu_arrow_first_level, .site-header .site-header-category-links a, .site-header li.cn-fa-icon a, .site-header .nav_style_3_icon_text .icon_text .text, .site-header .nav_style_3_icon_text .icon_text .icon, .site-header .nav_style_3_icon_text .icon_text .text a, .shopping_cart_header a.header_cart, .theme_header_menu_social ul li a { color:'.esc_attr($lipi_theme_options['first-level-menu-transparent-bg-text-color']['regular']).'!important; } .hamburger-menu span { background: #ffffff; }';
		
		// on scroll
		echo 'nav.site-header.after-scroll-wrap {background:'.esc_attr($lipi_theme_options['theme_sticky_menu_background']['rgba']).'!important; box-shadow: none;}';
	} else {
	// - DEFAULT MODE	
		 echo '.site-header {position: relative;} .site-header .logo-image.logo-hide{ display: block; }.site-header .logo-image.white{ display:none; }'; 
		 if( $nav_background_status == 'on' ) { 
			$nav_bar_bg_color_opacity = ($nav_bar_bg_color_opacity!=''?$nav_bar_bg_color_opacity:'0.3');
			$nav_bar_bg_color_rgb = lipi__hex2rgb($nav_bar_bg_color);
			$rgb_nav_bar_bg_color = 'rgba('.$nav_bar_bg_color_rgb[0].', '.$nav_bar_bg_color_rgb[1].', '.$nav_bar_bg_color_rgb[2].', '.$nav_bar_bg_color_opacity.')';
			echo '.site-header, .special-apperance-menu.item-block {background:'.$rgb_nav_bar_bg_color.'!important;}'; 
		} 
		echo 'nav.site-header.after-scroll-wrap {background:'.esc_attr(isset($lipi_theme_options['theme_sticky_menu_background']['rgba'])?$lipi_theme_options['theme_sticky_menu_background']['rgba']:'rgba(254, 254, 254, 0.96)').'!important; box-shadow: none;}';
	}
	
	// Header Backgground Color
	if( $current_post_type == 'lipi_portfolio' ) { 
		echo '.header_normal_design { background:'.esc_attr($lipi_theme_options['theme_header_mid_bar_background_color']['rgba']).'; }';
	}
	if( $header_background_color != '' ) {
		echo '.header_normal_design { background:'.$header_background_color.'; }';
		if( $header_background_linear_gradient_color != '' ) {
		echo '.header_normal_design{ background: -moz-linear-gradient(-45deg, '.$header_background_color.' 35%, '.$header_background_linear_gradient_color.' 100%); background: -webkit-linear-gradient(-45deg, '.$header_background_color.' 35%, '.$header_background_linear_gradient_color.' 100%); background: linear-gradient(135deg, '.$header_background_color.' 35%,'.$header_background_linear_gradient_color.' 100%); }';
		}
	}
	
	// Nav Header - Border  
	if( $nav_border_status == 'on' ) { 
		$nav_section_border_bottom_color_opacity = ($nav_section_border_bottom_color_opacity!=''?$nav_section_border_bottom_color_opacity:'0.12');
		$nav_border_btn_color_rgb = lipi__hex2rgb($nav_section_border_bottom_color);
		$rgb_nav_border_btn_color = 'rgba('.$nav_border_btn_color_rgb[0].', '.$nav_border_btn_color_rgb[1].', '.$nav_border_btn_color_rgb[2].', '.$nav_section_border_bottom_color_opacity.')';
		if( $add_nav_box_shadow != 'on' ) {
			echo '.site-header { border-bottom: 1px solid '.$rgb_nav_border_btn_color.'; } nav.site-header.after-scroll-wrap { border-bottom:none; }';
		}
		echo '.special-apperance-menu .special-apperance-menu-inner{ border-top: 1px solid '.$rgb_nav_border_btn_color.'!important; }';	
	}

	// Nav Header - Shadow
	if( $add_nav_box_shadow == 'on' ) {
		echo '.site-header { box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); } nav.site-header.after-scroll-wrap { box-shadow:none; }';
	}
	
	// - If ACTIVE, custom slider
	if( $bind_slider_status == 'on' ) {  if( isset($bind_slider_height) ) { echo '.flexslider .slides li { height: '.$bind_slider_height.'!important; }'; } }
	
	// global 
	if( isset($lipi_theme_options['header-level-wrap-background-color']) && $lipi_theme_options['header-level-wrap-background-color'] != '#ffffff') {
		$site_header_level_wrap_background_color = 'background:'.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'!important;';
	} else {
		$site_header_level_wrap_background_color = 'background:#ffffff!important;';
	}
	echo '@media (max-width: 991px) and (min-width: 768px) { .site-header { '.$site_header_level_wrap_background_color.' border-bottom:none!important;box-shadow:none!important; } }  @media (max-width: 767px) { .site-header {  '.$site_header_level_wrap_background_color.' border-bottom:none!important;box-shadow:none!important; }  }';

	// - If BREADCURM, active
	if( $bind_breadcrumb_status == 'on' ) { echo '.header_normal_design .padding-top-100 .inner-padding h1 { width: 100%; } .header_normal_design .padding-top-100 .inner-padding p.desc { width: 100%;  }'; }
	
	// - If ALIGNMENT, text
	if( isset($readjust_alignment_header) && $readjust_alignment_header != '' && /*!is_single()*/ $current_post_type != 'post' ) {
		if( $readjust_alignment_header == 'left' ) {
			echo '.header-breadcrumbs { float: right; }';
		} else if( $readjust_alignment_header == 'center' ) {
			echo '.header_normal_design .padding-top-100 .inner-padding h1 {width: 100%; text-align: center; } .header_normal_design .padding-top-100 .inner-padding p.desc { width: 100%; text-align: center; } .header-breadcrumbs { text-align: center; float: none; }.header-breadcrumbs { margin-top: 0px; }';	
		} else if( $readjust_alignment_header == 'right' ) {
			echo '.header_normal_design .padding-top-100 .inner-padding h1 {width: 100%; text-align: right; } .header_normal_design .padding-top-100 .inner-padding p.desc { width: 100%; text-align: right; } .header-breadcrumbs { float: left; }  @media (max-width:767px) {  .header-breadcrumbs { text-align: center ; float: none; }  .header_normal_design .padding-top-100 .inner-padding h1 { text-align: center; } .header_normal_design .padding-top-100 .inner-padding p.desc { text-align: center; } }  @media (max-width: 767px){ .header-breadcrumbs { margin-top:0px; } }';
		}
	}
	
	// Title style
	$title_text_style = get_post_meta( $postID, '__lipi_title_text_settings', true );
	foreach ( (array) $title_text_style as $key => $entry ) {
		$title_text_color = $title_text_size = $title_text_weight = $font_title_text_line_height = $font_title_text_font_family = $font_title_text_letterspecing = '';
		if ( isset( $entry['title_text_color'] ) && $entry['title_text_color'] != '' ) {
			$title_text_color = 'color: '.esc_attr($entry['title_text_color']).'!important;';
		}
		if ( isset( $entry['title_text_size'] ) && $entry['title_text_size'] != ''  ) {
			$font_size = 'font-size: '.esc_attr($entry['title_text_size']).'!important;';
		}
		if ( isset( $entry['title_text_weight'] ) && $entry['title_text_weight'] != ''  ) {
			$font_weight = 'font-weight: '.esc_attr($entry['title_text_weight']).'!important;';
		}
		if ( isset( $entry['title_text_transform'] ) && $entry['title_text_transform'] != ''  ) {
			if( $entry['title_text_transform'] != 'none' ) {
				$font_text_transform = 'text-transform: '.esc_attr($entry['title_text_transform']).';';
			} else {
				$font_text_transform = '';	
			}
		}
		if ( isset( $entry['title_text_padding'] ) && $entry['title_text_padding'] != ''  ) {
			$font_title_text_padding = 'padding: '.esc_attr($entry['title_text_padding']).';';
		}
		if ( isset( $entry['title_text_line_height'] ) && $entry['title_text_line_height'] != ''  ) {
			$font_title_text_line_height = 'line-height: '.esc_attr($entry['title_text_line_height']).'!important;';
		}
		if ( isset( $entry['title_text_font_family'] ) && $entry['title_text_font_family'] != ''  ) {
			$font_title_text_font_family = 'font-family: '.esc_attr($entry['title_text_font_family']).'!important;';
		}
		if ( isset( $entry['title_text_letterspecing'] ) && $entry['title_text_letterspecing'] != ''  ) {
			$font_title_text_letterspecing = 'letter-spacing: '.esc_attr($entry['title_text_letterspecing']).'!important;';
		}
		
		echo '.header_normal_design .padding-top-100 .inner-padding h1 { '.$font_weight.' '.$font_size.' '.$title_text_color.' '.$font_text_transform.' '.$font_title_text_padding.' '.$font_title_text_line_height.' '.$font_title_text_font_family.' '.$font_title_text_letterspecing.' }';
	}
	
	// Sub-Title style
	$sub_title_text_style = get_post_meta( $postID, '__lipi_subtitle_text_settings', true );
	foreach ( (array) $sub_title_text_style as $key => $entry ) {
		$title_text_color = $title_text_size = $title_text_weight = $subtitle_font_family = $subtitle_font_transform = $subtitle_padding = $sub_title_text_letterspecing = '';
		if ( isset( $entry['title_text_color'] ) && $entry['title_text_color'] != '' ) {
			$title_text_color = 'color: '.esc_attr($entry['title_text_color']).'!important;';
		}
		if ( isset( $entry['title_text_size'] ) && $entry['title_text_size'] != ''  ) {
			$font_size = 'font-size: '.esc_attr($entry['title_text_size']).'!important;';
		}
		if ( isset( $entry['title_text_weight'] ) && $entry['title_text_weight'] != ''  ) {
			$font_weight = 'font-weight: '.esc_attr($entry['title_text_weight']).'!important;';
		}
		if ( isset( $entry['subtitle_font_family'] ) && $entry['subtitle_font_family'] != ''  ) {
			$subtitle_font_family = 'font-family: '.esc_attr($entry['subtitle_font_family']).'!important;';
		}
		if ( isset( $entry['subtitle_text_transform'] ) && $entry['subtitle_text_transform'] != ''  ) {
			$subtitle_font_transform = 'text-transform: '.esc_attr($entry['subtitle_text_transform']).'!important;';
		}
		if ( isset( $entry['sub_title_text_padding'] ) && $entry['sub_title_text_padding'] != ''  ) {
			$subtitle_padding = 'padding: '.esc_attr($entry['sub_title_text_padding']).'!important;';
		}
		if ( isset( $entry['sub_title_text_letterspecing'] ) && $entry['sub_title_text_letterspecing'] != ''  ) {
			$sub_title_text_letterspecing = 'letter-spacing: '.esc_attr($entry['sub_title_text_letterspecing']).'!important;';
		}
		
		echo '.header_normal_design .padding-top-100 .inner-padding p.desc { '.$font_weight.' '.$font_size.' '.$title_text_color.' '.$subtitle_font_family.' '.$subtitle_font_transform.' '.$subtitle_padding.' '.$sub_title_text_letterspecing.' }';
	}
	
	// Breadcrumb
	$breadcrumb_style = get_post_meta( $postID, '__lipi_breadcrumb_settings', true );
	foreach ( (array) $breadcrumb_style as $key => $entry ) {
		if ( isset( $entry['text_color'] ) && $entry['text_color'] != '' ) {
			echo '.header-breadcrumbs { color: '.esc_attr($entry['text_color']).'; }';
		}
		if ( isset( $entry['link_text_color'] ) && $entry['link_text_color'] != ''  ) {
			echo '.header-breadcrumbs a { color: '.esc_attr($entry['link_text_color']).'!important; }';
		}
		if ( isset( $entry['link_text_hover_color'] ) && $entry['link_text_hover_color'] != ''  ) {
			echo '.header-breadcrumbs a:hover { color: '.esc_attr($entry['link_text_hover_color']).'!important; }';
		}
		if ( isset( $entry['link_arrow_color'] ) && $entry['link_arrow_color'] != ''  ) {
			echo '.header-breadcrumbs .sep{ color: '.esc_attr($entry['link_arrow_color']).'!important; }';
		}
	}
	
	if ( !is_front_page() && is_home() ) {
		echo '.header-breadcrumbs { float: right; }';
	}
	
	// - Menu Control
	if( $header_menu_bar_type == 'custom' && $lipi_theme_options['theme_nav_header_menu_style'] == 8 ) {
		echo '.site-header .logo-image.logo-hide { display: none!important; } @media (max-width: 991px) and (min-width: 768px){ .site-header .logo-image.logo-hide { display: block!important; } } @media (max-width: 767px) { .site-header .logo-image.logo-hide { display: block!important; } }nav.site-header.after-scroll-wrap .logo-image.dark { display: block!important; }';
	}
	
	/*****
	*  EOF HEADER START
	******/
}
}

/*-----------------------------------------------------------------------------------*/
/*	HEADER MID GLOBAL BAR
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__header_mid_global_bar')) {
function lipi__header_mid_global_bar(){
	global $lipi_theme_options;
	if( $lipi_theme_options['theme_header_mid_bar_greadent_background_color'] == '' && 
	    isset($lipi_theme_options['theme_header_mid_bar_background_color']['rgba']) &&
		$lipi_theme_options['theme_header_mid_bar_background_color']['rgba'] != '' ) {
		echo '.header_normal_design { background:'.$lipi_theme_options['theme_header_mid_bar_background_color']['rgba'].'; }'; 
	} else if( $lipi_theme_options['theme_header_mid_bar_greadent_background_color'] != '' && 
		$lipi_theme_options['theme_header_mid_bar_background_color']['rgba'] != '' ) {
		$header_background_color = $lipi_theme_options['theme_header_mid_bar_background_color']['rgba'];
		$header_background_linear_gradient_color = $lipi_theme_options['theme_header_mid_bar_greadent_background_color'];
	echo '.header_normal_design{ background: -moz-linear-gradient(-45deg, '.$header_background_color.' 35%, '.$header_background_linear_gradient_color.' 100%); background: -webkit-linear-gradient(-45deg, '.$header_background_color.' 35%, '.$header_background_linear_gradient_color.' 100%); background: linear-gradient(135deg, '.$header_background_color.' 35%,'.$header_background_linear_gradient_color.' 100%); }';
	}
}
}

/*-----------------------------------------------------------------------------------*/
/*	CUSTOMIZER DYNAMIC LAYOUTS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__dynamic_settings')) {
function lipi__dynamic_settings(){ 
	global $lipi_theme_options;
	$current_post_type = get_post_type();
	$is_plugin_active_ReduxFramework = lipi__plugin_active('ReduxFramework');
	
	$theme_header_mid_bar_text_color = $theme_header_mid_bar_breadcrumbs_regular_color = '';
	if( isset($lipi_theme_options['theme_header_mid_bar_text_color']) && $lipi_theme_options['theme_header_mid_bar_text_color'] !="" ) {
		$theme_header_mid_bar_text_color = 'color:'.esc_attr($lipi_theme_options['theme_header_mid_bar_text_color']).';';
	} 
	if( isset($lipi_theme_options['theme_header_mid_bar_breadcrumbs_regular_color']) && 
		$lipi_theme_options['theme_header_mid_bar_breadcrumbs_regular_color'] !="" ) {
		$theme_header_mid_bar_breadcrumbs_regular_color = 'color:'.esc_attr($lipi_theme_options['theme_header_mid_bar_breadcrumbs_regular_color']).';';
	}
	
	// If is not - page
	if(!is_page()) { 
		if(($current_post_type != 'lipi_portfolio')) lipi__header_mid_global_bar(); 
		echo '.woo_replace_header_layout .inner-padding .woocommerce-breadcrumb, .header_normal_design .inner-padding h1, .header-breadcrumbs { '.$theme_header_mid_bar_text_color.' } .woo_replace_header_layout .inner-padding .woocommerce-breadcrumb a, .header_normal_design  .header-breadcrumbs a{ '.$theme_header_mid_bar_breadcrumbs_regular_color.'  }';
	}
	if(is_single() && $current_post_type == 'post') { echo '.header-breadcrumbs{margin-top: -7px;}'; }
	if(is_search()){echo '.site-header {box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -moz-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04); -webkit-box-shadow: 0 2px 9px -1px rgba(0,0,0,.04);}';}
	
	if( $current_post_type == 'post' ) { echo '.left-widget-sidebar .theme-widget, .sidebar-widget-box .theme-widget{  border-top: 3px solid '.(isset($lipi_theme_options['widget-sidebar-top-border-color']['regular'])?esc_attr($lipi_theme_options['widget-sidebar-top-border-color']['regular']):'#002e5b').'; padding-top: 1.75em; } .left-widget-sidebar .theme-widget:first-child, .sidebar-widget-box .theme-widget:first-child { border-top:none; padding-top:0px; } '; }
	
	// search bounceIN
	if( $lipi_theme_options['search-icon-bouncein'] == true ) {
		echo 'form.searchform i.livesearch{ animation: bounceIn 750ms linear infinite alternate; -moz-animation: bounceIn 750ms linear infinite alternate;   -webkit-animation: bounceIn 750ms linear infinite alternate; -o-animation: bounceIn 750ms linear infinite alternate; } @-webkit-keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
keyframes bounceIn{0%,20%,40%,60%,80%,100%{-webkit-transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);transition-timing-function:cubic-bezier(0.215,0.610,0.355,1.000);}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);-ms-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}20%{-webkit-transform:scale3d(1.1,1.1,1.1);-ms-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1);}40%{-webkit-transform:scale3d(.9,.9,.9);-ms-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9);}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);-ms-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03);}80%{-webkit-transform:scale3d(.97,.97,.97);-ms-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97);}100%{opacity:1;-webkit-transform:scale3d(1,1,1);-ms-transform:scale3d(1,1,1);transform:scale3d(1,1,1);}}
.bounceIn{-webkit-animation-name:bounceIn;animation-name:bounceIn;-webkit-animation-duration:.75s;animation-duration:.75s;}';
	}

// Activate only if ReduxFramework Plugin Installed & Active	
if($is_plugin_active_ReduxFramework == true) {
	
	// site layout box style
	if( isset($lipi_theme_options['website_box_layout']) && $lipi_theme_options['website_box_layout'] == true ) {
		$box_layout_background = $box_layout_background_size = $box_layout_background_position = $box_layout_background_repeat = '';
		if( isset($lipi_theme_options['website_box_layout_background_image']['url']) && 
			$lipi_theme_options['website_box_layout_background_image']['url'] != "" ) {
				$box_layout_background = 'background-image:url('.esc_url($lipi_theme_options['website_box_layout_background_image']['url']).');';
		}
		if( isset($lipi_theme_options['website_box_layout_background_image_size']) && 
			$lipi_theme_options['website_box_layout_background_image_size'] != "" ) {
				$box_layout_background_size = 'background-size:'.esc_attr($lipi_theme_options['website_box_layout_background_image_size']).';';
		}
		if( isset($lipi_theme_options['website_box_layout_background_image_position']) && 
			$lipi_theme_options['website_box_layout_background_image_position'] != "" ) {
				$box_layout_background_position = 'background-position:'.esc_attr($lipi_theme_options['website_box_layout_background_image_position']).';';
		}
		if( isset($lipi_theme_options['website_box_layout_background_image_repeat']) && 
			$lipi_theme_options['website_box_layout_background_image_repeat'] != "" ) {
				$box_layout_background_repeat = 'background-repeat:'.esc_attr($lipi_theme_options['website_box_layout_background_image_repeat']).';';
		}
		echo 'body.boxed_layout{ '.$box_layout_background.' '.$box_layout_background_size.' '.$box_layout_background_position.' '.$box_layout_background_repeat.' }body.boxed_layout .parallax-mirror { z-index:0!important; }';
	}
	
	// Logo Readjust Settings
	if( $lipi_theme_options['logo-normal-dimensions-width']['width'] != '' ) {
		echo '.site-header .logo-image { width: '.esc_attr($lipi_theme_options['logo-normal-dimensions-width']['width']). ($lipi_theme_options['logo-normal-dimensions-width']['width'] == '120'?'px':'') .';';
		if( $lipi_theme_options['logo-padding-top-dimensions']['height'] != '' ) { echo 'padding-top: '.esc_attr($lipi_theme_options['logo-padding-top-dimensions']['height']). ($lipi_theme_options['logo-padding-top-dimensions']['height'] == '25'?'px':'') .';'; }
		echo '}';
	}
	if( $lipi_theme_options['logo-normal-dimensions-width-responsive']['width'] != '' ) {
		echo '@media (max-width: 991px) and (min-width: 768px) { .site-header .logo-image.logo-hide { width: '.esc_attr($lipi_theme_options['logo-normal-dimensions-width-responsive']['width']). ($lipi_theme_options['logo-normal-dimensions-width-responsive']['width'] == '120'?'px':'') .'; } } @media (max-width: 767px) { .site-header .logo-image.logo-hide {  width: '.esc_attr($lipi_theme_options['logo-normal-dimensions-width-responsive']['width']). ($lipi_theme_options['logo-normal-dimensions-width-responsive']['width'] == '120'?'px':'') .'; } }';
	}
	
	echo '.site-header .logo{ margin:'.esc_attr($lipi_theme_options['logo-display-margin']).'; }';
	
	if( $lipi_theme_options['logo-on-page-scroll-dimensions-width']['height'] != '' ) {
		echo 'nav.site-header.after-scroll-wrap .logo-image { height: '.esc_attr($lipi_theme_options['logo-on-page-scroll-dimensions-width']['height']). ( $lipi_theme_options['logo-on-page-scroll-dimensions-width']['height'] == '69'?'px':'' ) .';';
		if( $lipi_theme_options['logo-on-page-scroll-margin-top-dimensions']['height'] != '' ) { echo 'margin-top: '.esc_attr($lipi_theme_options['logo-on-page-scroll-margin-top-dimensions']['height']). ($lipi_theme_options['logo-on-page-scroll-margin-top-dimensions']['height'] == '-12'?'px':'')  .';'; }
		echo '}';
	}
	// Fonts
	if( $lipi_theme_options['theme-typography-body']['font-family'] != '' ) {
		echo 'body { font-weight:'.esc_attr(isset($lipi_theme_options['theme-typography-body']['font-weight'])?$lipi_theme_options['theme-typography-body']['font-weight']:'500').'; font-family:'.esc_attr($lipi_theme_options['theme-typography-body']['font-family']).'; color: '.esc_attr($lipi_theme_options['theme-typography-body']['color']).'; font-family:'.esc_attr($lipi_theme_options['theme-typography-body']['font-family']).'!important; font-size: '.esc_attr($lipi_theme_options['theme-typography-body']['font-size']). ($lipi_theme_options['theme-typography-body']['font-size'] == '14'?'px':'') .'; line-height: '. preg_replace( '/px/', '', esc_attr($lipi_theme_options['theme-typography-body']['line-height']) ).'; letter-spacing: '.esc_attr($lipi_theme_options['theme-typography-body']['letter-spacing']).($lipi_theme_options['theme-typography-body']['letter-spacing']=='0.3'?'px':'').'; }';
	}
	// p tag 
	if( $lipi_theme_options['p-tag-line-height'] != '' ) {
		echo '.blog.page .pg-custom-vc p, .body-content .blog p, .comments p, .display-faq-section .entry-content p { line-height: '.esc_attr($lipi_theme_options['p-tag-line-height']).'; }';
	}
	// h1
	if( $lipi_theme_options['theme-h1-typography']['font-family'] != '' ) { 
		if( isset($lipi_theme_options['theme-h1-typography']['font-weight']) && 
			$lipi_theme_options['theme-h1-typography']['font-weight'] != ''  ) {
			$h1_weight = esc_attr($lipi_theme_options['theme-h1-typography']['font-weight']);	
		} else {
			$h1_weight = esc_attr($lipi_theme_options['theme-h1-typography']['font-style']);
		}
		echo 'h1 {  font-family: '.esc_attr($lipi_theme_options['theme-h1-typography']['font-family']).'; font-weight:'.$h1_weight.'; font-size:'.esc_attr($lipi_theme_options['theme-h1-typography']['font-size']).( ($lipi_theme_options['theme-h1-typography']['font-size'] == '40')?'px':'' ).'; line-height: '.esc_attr($lipi_theme_options['theme-h1-typography']['line-height']).( ($lipi_theme_options['theme-h1-typography']['line-height'] == '45')?'px':'' ).'; text-transform:'.esc_attr($lipi_theme_options['theme-h1-typography']['text-transform']).'; letter-spacing: '.esc_attr($lipi_theme_options['theme-h1-typography']['letter-spacing']).( ($lipi_theme_options['theme-h1-typography']['letter-spacing'] == '-2.3')?'px':'' ).'; color: '.esc_attr($lipi_theme_options['theme-h1-typography']['color']).'; }';				
	}
	// h2
	if( $lipi_theme_options['theme-h2-typography']['font-family'] != '' ) {
		if( isset($lipi_theme_options['theme-h2-typography']['font-weight']) && 
			$lipi_theme_options['theme-h2-typography']['font-weight'] != ''  ) {
			$h2_weight = esc_attr($lipi_theme_options['theme-h2-typography']['font-weight']);	
		} else {
			$h2_weight = esc_attr($lipi_theme_options['theme-h2-typography']['font-style']);
		}
		echo '.bbp-topic-wrapper .entry-title, h2 {  font-family: '.esc_attr($lipi_theme_options['theme-h2-typography']['font-family']).'; font-weight:'.$h2_weight.'; font-size:'.esc_attr($lipi_theme_options['theme-h2-typography']['font-size']).( ($lipi_theme_options['theme-h2-typography']['font-size'] == '34')?'px':'' ).'; line-height: '.esc_attr($lipi_theme_options['theme-h2-typography']['line-height']).(($lipi_theme_options['theme-h2-typography']['line-height'] == '45')?'px':'' ).'; text-transform:'.esc_attr($lipi_theme_options['theme-h2-typography']['text-transform']).'; letter-spacing: '.esc_attr($lipi_theme_options['theme-h2-typography']['letter-spacing']).( ($lipi_theme_options['theme-h2-typography']['letter-spacing'] == '-2.3')?'px':'' ).'; color: '.esc_attr($lipi_theme_options['theme-h2-typography']['color']).'; }';				
	}
	// h3
	if( $lipi_theme_options['theme-h3-typography']['font-family'] != '' ) {
		if( isset($lipi_theme_options['theme-h3-typography']['font-weight']) && 
			$lipi_theme_options['theme-h3-typography']['font-weight'] != ''  ) {
			$h3_weight = esc_attr($lipi_theme_options['theme-h3-typography']['font-weight']);	
		} else {
			$h3_weight = esc_attr($lipi_theme_options['theme-h3-typography']['font-style']);
		}
		echo 'h3 {  font-family: '.esc_attr($lipi_theme_options['theme-h3-typography']['font-family']).'; font-weight:'.$h3_weight.'; font-size:'.esc_attr($lipi_theme_options['theme-h3-typography']['font-size']).( ($lipi_theme_options['theme-h3-typography']['font-size'] == '28')?'px':'' ).'; line-height: '.esc_attr($lipi_theme_options['theme-h3-typography']['line-height']).(($lipi_theme_options['theme-h3-typography']['line-height'] == '35')?'px':'' ).'; text-transform:'.esc_attr($lipi_theme_options['theme-h3-typography']['text-transform']).'; letter-spacing: '.esc_attr($lipi_theme_options['theme-h3-typography']['letter-spacing']).( ($lipi_theme_options['theme-h3-typography']['letter-spacing'] == '-1')?'px':'' ).'; color: '.esc_attr($lipi_theme_options['theme-h3-typography']['color']).'; }';
	}
	// h4
	if( $lipi_theme_options['theme-h4-typography']['font-family'] != '' ) {
		if( isset($lipi_theme_options['theme-h4-typography']['font-weight']) && 
			$lipi_theme_options['theme-h4-typography']['font-weight'] != ''  ) {
			$h4_weight = esc_attr($lipi_theme_options['theme-h4-typography']['font-weight']);	
		} else {
			$h4_weight = esc_attr($lipi_theme_options['theme-h4-typography']['font-style']);
		}
		echo 'h4 {  font-family: '.esc_attr($lipi_theme_options['theme-h4-typography']['font-family']).'; font-weight:'.$h4_weight.'; font-size:'.esc_attr($lipi_theme_options['theme-h4-typography']['font-size']).( ($lipi_theme_options['theme-h4-typography']['font-size'] == '22')?'px':'' ).'; line-height: '.esc_attr($lipi_theme_options['theme-h4-typography']['line-height']).(($lipi_theme_options['theme-h4-typography']['line-height'] == '28')?'px':'' ).'; text-transform:'.esc_attr($lipi_theme_options['theme-h4-typography']['text-transform']).'; letter-spacing: '.esc_attr($lipi_theme_options['theme-h4-typography']['letter-spacing']).( ($lipi_theme_options['theme-h4-typography']['letter-spacing'] == '-1')?'px':'' ).'; color: '.esc_attr($lipi_theme_options['theme-h4-typography']['color']).'; }';
	}
	// h5
	if( $lipi_theme_options['theme-h5-typography']['font-family'] != '' ) {
		if( isset($lipi_theme_options['theme-h5-typography']['font-weight']) && 
			$lipi_theme_options['theme-h5-typography']['font-weight'] != ''  ) {
			$h5_weight = esc_attr($lipi_theme_options['theme-h5-typography']['font-weight']);	
		} else {
			$h5_weight = esc_attr($lipi_theme_options['theme-h5-typography']['font-style']);
		}
		echo 'h5 {  font-family: '.esc_attr($lipi_theme_options['theme-h5-typography']['font-family']).'; font-weight:'.$h5_weight.'; font-size:'.esc_attr($lipi_theme_options['theme-h5-typography']['font-size']).( ($lipi_theme_options['theme-h5-typography']['font-size'] == '18')?'px':'' ).'; line-height: '.esc_attr($lipi_theme_options['theme-h5-typography']['line-height']).(($lipi_theme_options['theme-h5-typography']['line-height'] == '25')?'px':'' ).'; text-transform:'.esc_attr($lipi_theme_options['theme-h5-typography']['text-transform']).'; letter-spacing: '.esc_attr($lipi_theme_options['theme-h5-typography']['letter-spacing']).( ($lipi_theme_options['theme-h5-typography']['letter-spacing'] == '-0.4' || $lipi_theme_options['theme-h5-typography']['letter-spacing'] == '-0.7')?'px':'' ).'; color: '.esc_attr($lipi_theme_options['theme-h5-typography']['color']).'; }';
	}
	// h6
	if( $lipi_theme_options['theme-h6-typography']['font-family'] != '' ) {
		if( isset($lipi_theme_options['theme-h6-typography']['font-weight']) && 
			$lipi_theme_options['theme-h6-typography']['font-weight'] != ''  ) {
			$h6_weight = esc_attr($lipi_theme_options['theme-h6-typography']['font-weight']);	
		} else {
			$h6_weight = esc_attr($lipi_theme_options['theme-h6-typography']['font-style']);
		}
		echo '#bbpress-forums .bbp-forum-link, h6 {  font-family: '.esc_attr($lipi_theme_options['theme-h6-typography']['font-family']).'; font-weight:'.$h6_weight.'; font-size:'.esc_attr($lipi_theme_options['theme-h6-typography']['font-size']).( ($lipi_theme_options['theme-h6-typography']['font-size'] == '16')?'px':'' ).'; line-height: '.esc_attr($lipi_theme_options['theme-h6-typography']['line-height']).(($lipi_theme_options['theme-h6-typography']['line-height'] == '20')?'px':'' ).'; text-transform:'.esc_attr($lipi_theme_options['theme-h6-typography']['text-transform']).'; letter-spacing: '.esc_attr($lipi_theme_options['theme-h6-typography']['letter-spacing']).( ($lipi_theme_options['theme-h6-typography']['letter-spacing'] == '-0.4')?'px':'' ).'; color: '.esc_attr($lipi_theme_options['theme-h6-typography']['color']).'; }';
	}
	// Footer Widget
	echo '.footer-section .footer-layer-1 { background: '.esc_attr($lipi_theme_options['theme_footer_widget_bg_color']).'; } .footer-section .footer-layer-1 { color: '.esc_attr($lipi_theme_options['theme_footer_widget_text_color']).'!important; } .footer-section .theme-widget h6, .footer-section .theme-widget h5, .footer-section .theme-widget h4 { color: '.esc_attr($lipi_theme_options['theme_footer_widget_title_color']).'!important; } .footer-section .theme-widget a { color: '.esc_attr($lipi_theme_options['theme_footer_widget_text_link_color']['regular']).'; } ';
	// Footer Copyright/social
	echo '.footer-section .footer-layer-2 .social-footer-icon { color:'.esc_attr($lipi_theme_options['theme_footer_social_text_color']).' } .footer-section .footer-layer-2 { background: '.esc_attr($lipi_theme_options['theme_footer_social_bg_color']).'; color: '.esc_attr($lipi_theme_options['theme_footer_social_text_color']).'; } .footer-section .footer-layer-2 .copyright-links a, .footer-section .footer-layer-2 p a { color:'.esc_attr($lipi_theme_options['theme_footer_social_link_color']['regular']).'; }';
	// Top Header CSS
	if( isset($lipi_theme_options['theme_top_header_border_bottom_color']['rgba']) && 
	    $lipi_theme_options['theme_top_header_border_bottom_color']['rgba'] != '' ) {
		$top_header_border_btm_color = esc_attr($lipi_theme_options['theme_top_header_border_bottom_color']['rgba']);
	} else {
		$top_header_border_btm_color = '';
	}
	echo '.site-top-header{ background-color:'.esc_attr($lipi_theme_options['theme_top_header_background_color']).'; border-bottom: 1px solid '.esc_attr($top_header_border_btm_color).'; font-size:'.esc_attr($lipi_theme_options['theme_top_header_font_size']).'px; } .site-top-header ul li a { color: '.esc_attr($lipi_theme_options['theme_top_header_text_link_color']['regular']).'; } .wrap_site_top_header ul.lang_sel>li.menu-item-has-children>a:after {border-top: 5px solid '.esc_attr($lipi_theme_options['theme_top_header_text_link_color']['regular']).'; } .wrap_site_top_header ul.lang_sel li ul{background-color:'.esc_attr($lipi_theme_options['theme_top_header_background_color']).';}.site-top-header .shopping_cart_inner { height: auto; }  .site-top-header .shopping_cart_header a.header_cart { color: '.esc_attr($lipi_theme_options['theme_top_header_text_link_color']['regular']).'; } .site-top-header .shopping_cart_outer{ margin-top: 17px; margin-left: 20px; float:right; }';
	// Navigation adjustment
	if( $lipi_theme_options['theme_nav_header_menu_style'] == 1 ) {
		echo '.site-header .site-header-category-links a { margin-left:'.esc_attr($lipi_theme_options['first-level-menu-margin-left']).'px; } .site-header .theme-widget {  margin-bottom: 0px!important;  margin-top: 17px; margin-left: 25px; }';
		if( is_rtl() ) {  echo '.site-header .logo, .site-header .site-header-category-links li, nav.site-header.after-scroll-wrap .logo { float: right; } .site-header .site-header-category-links,nav.site-header.after-scroll-wrap .site-header-category-links { float: left; }.site-header .site-header-category-links a, nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 0px; margin-right: 25px;} nav.site-header.after-scroll-wrap .site-header-category-links li ul > li a { margin-right: 0px; }'; }
	} else if( $lipi_theme_options['theme_nav_header_menu_style'] == 2 ) {
		echo '.site-header .site-header-category-links {float: left;padding-left: 0px;}.site-header .site-header-category-links a { margin-left:'.esc_attr($lipi_theme_options['first-level-menu-margin-left']).'px; } .site-header .theme-widget {  margin-bottom: 0px!important;  margin-top: 17px; }';
		if( is_rtl() ) { echo '.site-header .logo, .site-header .site-header-category-links li, nav.site-header.after-scroll-wrap .logo, .site-header .site-header-category-links,nav.site-header.after-scroll-wrap .site-header-category-links { float: right; }.site-header .site-header-category-links a, nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 0px; margin-right: 25px;} nav.site-header.after-scroll-wrap .site-header-category-links li ul > li a { margin-right: 0px; } '; }
	} else if( $lipi_theme_options['theme_nav_header_menu_style'] == 3 ) { 
		echo ' .special-apperance-menu .special-apperance-menu-inner{border-top: 1px solid '.esc_attr($lipi_theme_options['theme_nav_header_menu_style_3']['rgba']).';} .site-header .logo { float: none; text-align: left; padding-bottom: 10px;  } .site-header .site-header-category-links { float: none; } .site-header .site-header-category-links li { margin-left: 0px; margin-right: 25px; } .site-header .site-header-category-links a{ line-height: 75px; } nav.site-header.after-scroll-wrap .logo{ border-bottom:none; }.shopping_cart_inner { height: 80px; }.hamburger-menu { margin: 0px 0; }.hamburger-menu.menu-open { margin: 0px 0; margin-left: 15px; } .site-header.after-scroll-wrap .site-header-category-links li { margin-left: 0px; } .site-header.after-scroll-wrap .site-header-category-links li ul li { margin-left: 0px; } .site-header .site-header-category-links a { line-height: 61px; }.shopping_cart_inner { height: 61px; } .site-header .site-header-category-links li { margin-left: 0px; margin-right:'.esc_attr($lipi_theme_options['first-level-menu-margin-right']).'px; } .site-header .logo { float: left; } .site-header ul.site-header-category-links{ padding-left:0px } .site-header .nav_style_3_icon_text { margin-top: '.esc_attr($lipi_theme_options['theme_nav_header_menu_style_3_margin_top']).'px; } .site-header.after-scroll-wrap .nav_style_3_icon_text { display:none; } .site-header .site-header-category-links a{ margin-left:0px; } nav.site-header.after-scroll-wrap .special-apperance-menu.item-block { background: rgba(254, 254, 254, 0.16)!important; } nav.site-header.after-scroll-wrap .special-apperance-menu.item-block { display: block; } nav.site-header.after-scroll-wrap .container.wrap-header-call{ display:none; } nav.site-header.after-scroll-wrap .site-header-category-links { float: left; }' ;
		if( $lipi_theme_options['theme_nav_header_menu_style_3_nav_bgcolor']['rgba'] != '' ) { 
			echo '.special-apperance-menu.item-block{ background:'.$lipi_theme_options['theme_nav_header_menu_style_3_nav_bgcolor']['rgba'].'; }';
			if( $lipi_theme_options['theme_nav_header_menu_style_3_nav_greadent_bgcolor'] != '' ) {
				$nav_background_linear_gradient_color = $lipi_theme_options['theme_nav_header_menu_style_3_nav_greadent_bgcolor'];
				$nav_background_bg_color = $lipi_theme_options['theme_nav_header_menu_style_3_nav_bgcolor']['rgba'];
				echo '.special-apperance-menu.item-block{ background: -moz-linear-gradient(45deg, '.$nav_background_bg_color.' 0%, '.$nav_background_linear_gradient_color.' 100%); background: -webkit-linear-gradient(45deg, '.$nav_background_bg_color.' 0%, '.$nav_background_linear_gradient_color.' 100%); background: linear-gradient(45deg, '.$nav_background_bg_color.' 0%,'.$nav_background_linear_gradient_color.' 100%); }';
			}
		}
		if( is_rtl() ) { echo '.site-header .logo { float: right; } .site-header .site-header-category-links li { margin-left: 25px; margin-right: 0px; }nav.site-header.after-scroll-wrap .site-header-category-links { float: right; } .site-header.after-scroll-wrap .site-header-category-links li { margin-left: 0px; padding-left: 25px; }'; }
	} else if( $lipi_theme_options['theme_nav_header_menu_style'] == 4 ) {
		echo '.site-header .logo { float: right; } .site-header .site-header-category-links{ float: left; } .site-header .site-header-category-links a { margin-left: 0px;  margin-right: 25px; } nav.site-header.after-scroll-wrap .logo{  float: right; text-align: right; } nav.site-header.after-scroll-wrap .site-header-category-links { float: left; } nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 0px; margin-right: 25px; } @media (max-width: 991px) and (min-width: 768px) { .site-header i.navbar-toggle {  float: left; } }  @media (max-width: 767px) { .site-header i.navbar-toggle {  float: left; } } .hamburger-menu { float: left;  margin-left: 0px; margin-right: 15px; } nav.site-header.after-scroll-wrap .hamburger-menu { margin-right: 15px; margin-left:0px; } .bind_woo_menu_cart { margin: 0px 25px 0px 25px; }  .site-header .site-header-category-links a { margin-left: 0px; margin-right:'.esc_attr($lipi_theme_options['first-level-menu-margin-right']).'px; } .site-header .theme-widget {  margin-bottom: 0px!important;  margin-top: 17px; margin-right: 0px; } .site-header ul.site-header-category-links{ padding-left:0px }.site-header .site-header-category-links li .fa-caret-down:before { margin-left: -44px; }.site-header .logo { margin: 0px 0px 0px 45px; }.shopping_cart_dropdown { right: auto; }';
	if( is_rtl() ) { echo 'nav.site-header.after-scroll-wrap .site-header-category-links li > ul li a{ padding-left: 0px; } nav.site-header.after-scroll-wrap .site-header-category-links li > ul li a { padding-right: 0px; padding-left: 20px;}'; }
	} else if( $lipi_theme_options['theme_nav_header_menu_style'] == 5 ) {
		echo '.site-header .logo{ float: right; } .site-header .site-header-category-links { float: right; } .site-header .site-header-category-links a { margin-left: 0px; margin-right: 25px; } nav.site-header.after-scroll-wrap .logo{  float: right; text-align: right; } nav.site-header.after-scroll-wrap .site-header-category-links { float: right; } nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 0px; margin-right: 25px; } @media (max-width: 991px) and (min-width: 768px) { .site-header i.navbar-toggle {  float: left; } }  @media (max-width: 767px) { .site-header i.navbar-toggle {  float: left; } }  .hamburger-menu { float: left;  margin-left: 0px; margin-right: 15px; }  nav.site-header.after-scroll-wrap .hamburger-menu { margin-left:0px; } .bind_woo_menu_cart { margin: 0px 25px 0px 0px; }  .site-header .site-header-category-links a { margin-left: 0px; margin-right:'.esc_attr($lipi_theme_options['first-level-menu-margin-right']).'px; } .site-header .theme-widget {  margin-bottom: 0px!important;  margin-top: 17px; margin-right: 25px; margin-left: 0px; } .theme_header_menu_social, .bind_woo_menu_cart { float: left; }.site-header .site-header-category-links li .fa-caret-down:before { margin-left: -44px; }.site-header .logo { margin: 0px 0px 0px 45px; } .shopping_cart_dropdown { right: auto; }';
		if( is_rtl() ) { echo 'nav.site-header.after-scroll-wrap .site-header-category-links li > ul li a{ padding-left: 0px; } nav.site-header.after-scroll-wrap .site-header-category-links li > ul li a { padding-right: 0px; padding-left: 20px;}'; }
	} else if( $lipi_theme_options['theme_nav_header_menu_style'] == 6 ) {
		echo '.special-apperance-menu .special-apperance-menu-inner{border-top: 1px solid '.esc_attr($lipi_theme_options['theme_nav_header_menu_style_3']['rgba']).';} .site-header .logo { float: right; padding-bottom: 10px;  width: 100%; } .site-header .logo-image { float: right;
} .site-header .site-header-category-links { float: right; } nav.site-header.after-scroll-wrap .logo{  float: right; text-align: right; width: auto; } .site-header .site-header-category-links a{ line-height: 75px; } nav.site-header.after-scroll-wrap .site-header-category-links { float: left; clear: none; } nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 0px; margin-right: 25px; } @media (max-width: 991px) and (min-width: 768px) { .site-header i.navbar-toggle {  float: left; } .site-header .logo { width: auto; } }  @media (max-width: 767px) { .site-header i.navbar-toggle {  float: left; } .site-header .logo { width: auto; } } nav.site-header.after-scroll-wrap .logo{ border-bottom:none; } .hamburger-menu { margin: 0px 0; margin-left: 15px; } .shopping_cart_inner { height: 80px; } nav.site-header.after-scroll-wrap .hamburger-menu { float: left; margin-left:0px; margin-right: 15px; } nav.site-header.after-scroll-wrap .bind_woo_menu_cart { margin: 0px 25px 0px 0px; }.site-header .site-header-category-links a { margin-left:'.esc_attr($lipi_theme_options['first-level-menu-margin-left']).'px; } .site-header .site-header-category-links a { line-height: 61px; }.shopping_cart_inner { height: 61px; } .site-header .theme-widget {  margin-bottom: 0px!important; margin-top: -2px; margin-right: 5px; margin-left: 0px; } .theme_header_menu_social, .bind_woo_menu_cart { float: left; } .bind_woo_menu_cart { margin: 0px 0px 0px 0px; } .bind_woo_menu_cart { margin: 0px 25px 0px 0px; } nav.site-header.after-scroll-wrap ul.site-header-category-links{ padding-left:0px } .special-apperance-menu.item-block{ background:'.esc_attr($lipi_theme_options['theme_nav_header_menu_style_3_nav_bgcolor']['rgba']).'; } .site-header .nav_style_3_icon_text .icon_text{ float: left; margin: 0px 62px 0px 0px;}.site-header .logo { margin: 0px 0px 0px 45px; } .shopping_cart_dropdown { right: auto; } nav.site-header.after-scroll-wrap .container.wrap-header-call { display: none; }nav.site-header.after-scroll-wrap .special-apperance-menu.item-block { display: block; background: none;}nav.site-header.after-scroll-wrap .site-header-category-links {
float: right; } nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 25px; margin-right: 0px; } nav.site-header.after-scroll-wrap .site-header-category-links li > ul li a{ padding-left: 0px; }';
	if( is_rtl() ) { echo '.site-header .site-header-category-links a, nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 0px; margin-right: 25px; }nav.site-header.after-scroll-wrap .site-header-category-links li > ul li a { padding-left: 20px; padding-right: 0px; }'; }
	} else if( $lipi_theme_options['theme_nav_header_menu_style'] == 7 ) {
		echo '.site-header { min-height: '.esc_attr($lipi_theme_options['first-level-menu-line-height']).'px!important; } nav.site-header.after-scroll-wrap{ min-height: 70px!important; } .site-header .site-header-category-links { float: left; display: none; }nav.site-header.after-scroll-wrap .site-header-category-links { float: left; }';
		if( is_rtl() ) { echo '.site-header .logo { float: right; } .hamburger-menu { float: left; margin-left: 0px; margin-right: 15px; } nav.site-header.after-scroll-wrap .logo { float: right; margin: 0px 0px 0px 45px; } nav.site-header.after-scroll-wrap .hamburger-menu { margin-left: 0px; margin-right: 15px; }';  }
	} else if( $lipi_theme_options['theme_nav_header_menu_style'] == 8 ) {
		
		echo '.site-header .logo { float: none; margin:0px; }.site-header .logo-image.logo-hide { display: inherit; } .site-header .site-header-category-links li { float: none; display:inline-block; } .site-header .site-header-category-links { float: none; } @media (max-width: 991px) and (min-width: 768px){ .site-header .logo {
    float: left; } } @media (max-width: 767px) { .site-header .logo { float: left; } } '; // center 
		
		echo '.site-header .site-header-category-links a { margin-left:'.esc_attr($lipi_theme_options['first-level-menu-margin-left']).'px; } .site-header .theme-widget {  margin-bottom: 0px!important;  margin-top: 17px; margin-left: 25px; }';
		if( is_rtl() ) {  echo '.site-header .logo, .site-header .site-header-category-links li, nav.site-header.after-scroll-wrap .logo { float: right; } .site-header .site-header-category-links,nav.site-header.after-scroll-wrap .site-header-category-links { float: left; }.site-header .site-header-category-links a, nav.site-header.after-scroll-wrap .site-header-category-links a { margin-left: 0px; margin-right: 25px;} nav.site-header.after-scroll-wrap .site-header-category-links li ul > li a { margin-right: 0px; }'; }
	}
	// knowledgebase adjustment
	if( $lipi_theme_options['kb-single-pg-social-share-status'] == true && $lipi_theme_options['kb-single-pg-like-dislike-status'] == false ) {  echo '.blog.kb .social-box { float: none; }'; } else { echo '.blog.kb .social-box { float: left; } @media (max-width:767px) { .blog.kb .social-box { float: none; } .kbpg .rate-buttons { text-align: left; margin-top: 20px; } }'; }
	// hamburger menu control
	if( $current_post_type == 'page' ) { 
		global $post;
		$page_hamburger_menu = get_post_meta( $post->ID, '__lipi_header_hamburger_menu_status', true );
		if( $page_hamburger_menu == true ) {
			 echo '.recall-hamburger{ display:none; }';
		}
	} else { }
	
	/** GLOBAL COLOR CHANGE **/
	// site color 
	echo '.woocommerce .star-rating, .woocommerce-page .star-rating, .woocommerce p.stars a, .woocommerce p.stars a:hover, .site-header .site-header-category-links li ul a:hover i.menu_arrow, .header-breadcrumbs .sep, .woocommerce-breadcrumb .sep, .body-content .blog .linkformat:before, .woocommerce-message::before, i.portfolio-single-nav, .display-faq-section .collapsible-panels h5.title-faq-cat:before, ul.live-searchresults li a:before, #bbpress-forums .bbp-forum-title-container a:before, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title:before, .kb-categorypg .kb-box-single:hover:before, .knowledgebase-body li.cat.inner:hover:before, .theme-widget.vc_kb_article_type li.articles:hover:before, .kb_article_bytype li.articles:hover:before, .kb_sub_category_section h5 :before, .related_kb_post .related_post_ul li.related_post_ul_li:hover:before, .attached_file_section h5:before, .portfolio-sorting-section ul li.selected span, .portfolio-sorting-fitrows-section ul li.selected span, .wpb_text_column ul li:before, .wpb_text_column ol li:before, .woocommerce a.button.add_to_cart_button::before, .woocommerce a.button::before, #scrollbkToTop .footer-go-uplink:hover, .tagcloud i, li.load_more_kb_records_widget.more-link i, li.portfolio_paging_loading i { color:'.esc_attr($lipi_theme_options['website_colour']['regular']).'!important; } ';
	echo '.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .quantity .minus:hover, .woocommerce #content .quantity .minus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page #content .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce #content .quantity .plus:hover, .woocommerce-page .quantity .plus:hover, .woocommerce-page #content .quantity .plus:hover, .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover, .woocommerce nav.woocommerce-pagination ul li span.current { background-color:'.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	echo '.sidebar-widget-box .widget_product_categories ul li.current-cat>a, .display-faq-section ul li.current-cat>a, .widget_kb_default_category ul li.current-cat>a { border-color:'.esc_attr($lipi_theme_options['website_colour']['regular']).'; } .woocommerce div.product .woocommerce-tabs ul.tabs li.active { border-top: 4px solid '.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	echo 'blockquote, .body-content .blog blockquote, .comments blockquote, .author-desc:hover, .author-desc > .heading:hover, .pagination .page-numbers.current, .pagination .page-numbers:hover, .pagination a.page-numbers:hover, .pagination .next.page-numbers:hover, .pagination .prev.page-numbers:hover { border-color:'.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	echo '.portfolio-sorting-section ul li span:hover, .portfolio-sorting-fitrows-section ul li span:hover, .portfolio-sorting-section ul li.selected span, .portfolio-sorting-fitrows-section ul li.selected span { border-bottom: 1px solid '.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	echo '.sidebar-widget-box .theme-widget.widget_tag_cloud .tagcloud a:hover, .footer-section .theme-widget.widget_tag_cloud .tagcloud a:hover, div.tagcloud a:hover { background-color:'.esc_attr($lipi_theme_options['website_colour']['regular']).'; border: 1px solid '.esc_attr($lipi_theme_options['website_colour']['regular']).'; color:'.esc_attr($lipi_theme_options['blog-tag-hover-text-color']['regular']).'!important; }';
	echo '.woocommerce-message { border-top-color:'.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	echo 'body table.booked-calendar td.today .date span { border: 2px solid '.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	echo '.custom_login_form, form.vc-theme-user-login, .vc-theme-user-login-loggedin, form.bbp-login-form, .bbp-logged-in { border-top: 4px solid '.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	
	
	// 1. "a" tag color change
	echo '.header_normal_design .singe-post-entry-meta .cat-links a, .header_normal_design .singe-post-entry-meta .entry-format a, .header_normal_design .singe-post-entry-meta .edit-link a, .theme-widget a, .body-content .blog .linkformat h3 a, .header-breadcrumbs a, .body-content .blog h1.entry-title a, .body-content .blog h2.entry-title a, .body-content .blog h4.entry-title a, .body-content .blog h5.entry-title a, .body-content .blog h6.entry-title a,h2.woocommerce-loop-product__title, .woocommerce div.product div.product_meta>span span, .woocommerce div.product div.product_meta>span a, .woo_replace_header_layout .woocommerce-breadcrumb a, .woocommerce-cart table.cart tbody tr td a, .woocommerce-checkout .checkout table tbody tr td a, .woocommerce a.added_to_cart, .woocommerce .woocommerce-MyAccount-navigation ul li a, a.woocommerce-review-link, .related_kb_post ul li.related_post_ul_li a, .knowledgebase-body li.cat a { color:'.esc_attr($lipi_theme_options['theme-typography-body']['color']).'; } a, .theme-widget a, .sidebar-widget-box .widget_product_categories ul li a, .display-faq-section ul li a, #bbpress-forums .bbp-forum-title, #bbpress-forums .bbp-forum-link, #bbpress-forums .bbp-topic-permalink, .vc-kb-cat-widget ul li a, .widget_kb_default_category ul li a, .body-content .blog h5.entry-title a {color:'.esc_attr($lipi_theme_options['standard_a_tag_link_color']['regular']).';} .body-content .blog .cat-links a:hover, .body-content .blog .comments-link a:hover, .body-content .blog .edit-link a:hover, .body-content .blog .entry-format a:hover, .header_normal_design .singe-post-entry-meta .cat-links a:hover, .header_normal_design .singe-post-entry-meta .entry-format a:hover, .header_normal_design .singe-post-entry-meta .edit-link a:hover, .theme-widget a:hover, .body-content .blog .linkformat h3 a:hover, .comment-by a:hover, a.comment-reply-link:hover, a#cancel-comment-reply-link:hover, .header-breadcrumbs a:hover, .body-content .blog h1.entry-title a:hover, .body-content .blog h2.entry-title a:hover, .body-content .blog h5.entry-title a:hover, .body-content .blog h4.entry-title a:hover, .body-content .blog h5.entry-title a:hover, .body-content .blog h6.entry-title a:hover,h2.woocommerce-loop-product__title:hover, .woocommerce div.product div.product_meta>span span:hover, .woocommerce div.product div.product_meta>span a:hover, .woo_replace_header_layout .woocommerce-breadcrumb a:hover, .woocommerce-cart table.cart tbody tr td a:hover, .woocommerce-checkout .checkout table tbody tr td a:hover, .woocommerce a.added_to_cart:hover, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, a.woocommerce-review-link:hover, .woocommerce ul.cart_list li a:hover, .woocommerce ul.product_list_widget li a:hover, .footer-section .theme-widget a:hover, .footer-section .footer-layer-2 p a:hover, .footer-section .footer-layer-2 .copyright-links a:hover, .site-top-header ul li a:hover, .portfolio-define-section h2.entry-title:hover, .portfolio-define-section h3.entry-title:hover, .portfolio-define-section h4.entry-title:hover, .portfolio-define-section h5.entry-title:hover, .portfolio-define-section h6.entry-title:hover, .body-content .blog h3:hover, .portfolio-sorting-section ul li span:hover, .portfolio-sorting-fitrows-section ul li span:hover, a:focus, a:hover, .sidebar-widget-box .widget_product_categories ul li a:hover, .display-faq-section ul li a:hover, ul.live-searchresults li a:hover, ul.live-searchresults li a:hover:before, #bbpress-forums .bbp-forum-title:hover, #bbpress-forums .bbp-forum-link:hover, #bbpress-forums .bbp-topic-permalink:hover, .knowledgebase-body li.cat a:hover, .vc-kb-cat-widget ul li a:hover, .widget_kb_default_category ul li a:hover, .related_kb_post ul li.related_post_ul_li a:hover, a.doc-active , .active-wig-sidebar a{ color:'.esc_attr((($lipi_theme_options['standard_a_tag_link_color']['hover'] !="")?$lipi_theme_options['standard_a_tag_link_color']['hover']:'#5f6368')).'; }';
	// inside post
	echo '.entry-content a{ color:'.esc_attr($lipi_theme_options['standard_a_tag_link_color_inside_post']['regular']).'; }.entry-content a:hover{ color:'.esc_attr($lipi_theme_options['standard_a_tag_link_color_inside_post']['hover']).'; }';

	// 2. other color change
	echo '.site-header i.navbar-toggle:hover, .portfolio-sorting-section ul li span:hover, .portfolio-sorting-fitrows-section ul li span:hover { color:'.esc_attr($lipi_theme_options['text_link_color']['hover']).'; } .custom-link, .more-link{color:'.esc_attr($lipi_theme_options['text_link_color']['regular']).'!important;} a.custom-link:hover, a.more-link:hover{ color:'.esc_attr($lipi_theme_options['text_link_color']['hover']).'!important;}  .portfolio-sorting-section ul li.selected span, .portfolio-sorting-fitrows-section ul li.selected span { border-bottom: 1px solid '.esc_attr($lipi_theme_options['text_link_color']['regular']).'; color: '.esc_attr($lipi_theme_options['text_link_color']['regular']).'; } .button, input[type="submit"], .custom-botton, .shopping_cart_dropdown .qbutton, .woocommerce a.button, .woocommerce .wc-proceed-to-checkout a.button.alt, .woocommerce p.return-to-shop a.button, .vc_btn3.vc_btn3-color-juicy-pink, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat { background-color: '.esc_attr($lipi_theme_options['botton_color']['regular']).'; color: '.esc_attr($lipi_theme_options['botton_text_color']['regular']).'!important; } .button:hover, input[type="submit"]:hover, .custom-botton:hover, .shopping_cart_dropdown .qbutton:hover, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:focus, .vc_btn3.vc_btn3-color-juicy-pink.vc_btn3-style-flat:hover, .vc_btn3.vc_btn3-color-juicy-pink:focus, .vc_btn3.vc_btn3-color-juicy-pink:hover { background-color:'.esc_attr($lipi_theme_options['botton_color']['hover']).'; color: '.esc_attr($lipi_theme_options['botton_text_color']['regular']).'!important; } .promo .hvr-bubble-float-right:before { border-color: transparent transparent transparent '.esc_attr($lipi_theme_options['botton_color']['regular']).'; } .social-share-box{ color: '.esc_attr($lipi_theme_options['botton_color']['regular']).'; border: 1px solid '.esc_attr($lipi_theme_options['botton_color']['regular']).'; } .social-share-box:hover { background:'.esc_attr($lipi_theme_options['botton_color']['hover']).'; border: 1px solid '.esc_attr($lipi_theme_options['botton_color']['hover']).'; }.woocommerce .social-share-box:hover { border: 1px solid '.esc_attr($lipi_theme_options['botton_color']['hover']).'; }.team_members .team_social_holder.normal_social i.simple_social:hover{ color:'.esc_attr($lipi_theme_options['botton_color']['hover']).'; } .load_more_kb_records_widget.more-link a { color:'.esc_attr($lipi_theme_options['text_link_color']['regular']).'!important; } .load_more_kb_records_widget.more-link a:hover { color:'.esc_attr($lipi_theme_options['text_link_color']['hover']).'!important; } .theme-widget.bbp_widget_login .bbp-logged-in a.button{  color: '.esc_attr($lipi_theme_options['botton_text_color']['regular']).'!important; background-color: '.esc_attr($lipi_theme_options['botton_color']['regular']).'!important; } .theme-widget.bbp_widget_login .bbp-logged-in a.button:hover{  background-color:'.esc_attr($lipi_theme_options['botton_color']['hover']).'!important;  } .kb_tree_viewmenu ul li.root_cat a.kb-tree-recdisplay:before, .kb_tree_viewmenu ul li.root_cat_child a.kb-tree-recdisplay:before { color:'.esc_attr($lipi_theme_options['text_link_color']['regular']).'; } .kb_tree_viewmenu ul li.root_cat a.dataicon:before, .kb_tree_viewmenu ul li.root_cat_child a.dataicon:before { color:'.esc_attr($lipi_theme_options['text_link_color']['hover']).'; }';
	
	
	//3. blog section 
	echo '.vc_theme_blog_post_holder.body-content .entry-content .latest_post_date i, .body-content .blog .entry-meta i{ color:'.esc_attr(($lipi_theme_options['blog-meta-icon-color']['regular']!=""?$lipi_theme_options['blog-meta-icon-color']['regular']:'#5f6368')).'!important; }';
	/** WOO **/
	echo '.woocommerce button.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, button, a.button{ color: '.esc_attr($lipi_theme_options['botton_text_color']['regular']).'; background-color:'.esc_attr($lipi_theme_options['botton_color']['regular']).'!important; } button:hover, .woocommerce .button:hover, .woocommerce-page .button:hover, .woocommerce button.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce a.button:hover { background-color: '.esc_attr($lipi_theme_options['botton_color']['hover']).'!important; } .shopping_cart_header a.header_cart{ color:'.esc_attr($lipi_theme_options['woo-menu-icon-color']['regular']).'; } .shopping_cart_header a.header_cart:hover{ color:'.esc_attr($lipi_theme_options['woo-menu-icon-color']['hover']).'!important; } .shopping_cart_header .header_cart .header_cart_span { background-color:'.esc_attr($lipi_theme_options['website_colour']['regular']).'; }';
	
	if( isset( $lipi_theme_options['woo_hide_add_to_card_shop_cat'] ) && $lipi_theme_options['woo_hide_add_to_card_shop_cat'] == true ) {
	echo '.woocommerce ul.products li.product .margin-bottom-30, .woocommerce-page ul.products li.product a.product-category .margin-bottom-30 {
    margin-bottom: 5px;
}';
	}
	
	// Search Box
	$search_btm_remove = $searhbox_theme_search_box_border_color = $scrollbkToTop_color = '';
	if( $lipi_theme_options['theme_search_box_search_bottom'] ==  true ) $search_btm_remove = '!important';
	if( isset($lipi_theme_options['theme_search_box_border_color']) && $lipi_theme_options['theme_search_box_border_color'] != "" ) {
		$searhbox_theme_search_box_border_color = 'border-color:'.esc_attr($lipi_theme_options['theme_search_box_border_color']).'!important;';
	}
	echo '.form-control.header-search{ border-radius:'.esc_attr($lipi_theme_options['theme_search_box_radius']).'px'.$search_btm_remove.'; font-size: '.$lipi_theme_options['theme_search_font_size'].'px; font-weight:'.$lipi_theme_options['theme_search_font_weight'].'; '.$searhbox_theme_search_box_border_color.' } form.searchform i.livesearch { color: '.$lipi_theme_options['theme_search_box_icon_color'].'!important; } .theme-top-header-searchbox .form-group .search-button-custom{ font-size: '.$lipi_theme_options['theme_search_font_size'].'px; font-weight:'.$lipi_theme_options['theme_search_font_weight'].'; }';
	 
	/** ICON **/
	echo '.theme_header_menu_social ul li a { color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['regular']).'; } .theme_header_menu_social ul li a:hover { color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['hover']).'!important; }';
	/** GO UP **/
	if( isset($lipi_theme_options['go_up_icon_color']['rgba']) && $lipi_theme_options['go_up_icon_color']['rgba'] != "" ) {
		$scrollbkToTop_color = 'color:'.esc_attr($lipi_theme_options['go_up_icon_color']['rgba']).';';
	}
	echo '#scrollbkToTop .footer-go-uplink { font-size: '.esc_attr($lipi_theme_options['go_up_arrow_font_size']).'px; '.esc_attr($scrollbkToTop_color).' }';
	
	/** MENU NAV **/
	if( isset($lipi_theme_options['first-level-menu-letter-spacing']) && $lipi_theme_options['first-level-menu-letter-spacing'] != '' ) { 
		$first_level_letter_spacing = esc_attr($lipi_theme_options['first-level-menu-letter-spacing']);
	} else {
		$first_level_letter_spacing = '1px';
	}
	echo '.site-header .site-header-category-links li > .menu_arrow_first_level{ color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['regular']).'; font-size: 9px; } .site-header { background-color:'.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'; }.site-header .site-header-category-links a{ font-family:'.esc_attr($lipi_theme_options['theme-typography-nav']['font-family']).'; color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['regular']).'; font-weight:'.esc_attr($lipi_theme_options['first-level-menu-weight']).';font-size:'.esc_attr($lipi_theme_options['first-level-menu-font-size']).'px; letter-spacing: '.$first_level_letter_spacing.'; text-transform:'.esc_attr($lipi_theme_options['first-level-menu-text-transform']).'; } .site-header .site-header-category-links li ul { background-color:'.esc_attr($lipi_theme_options['menu-inner-level-background-color']).'; } .site-header .site-header-category-links li ul a{ font-weight:'.esc_attr($lipi_theme_options['menu-inner-level-weight']).'; font-size:'.esc_attr($lipi_theme_options['menu-inner-level-font-size']).'px; color:'.esc_attr($lipi_theme_options['menu-inner-level-text-color']['regular']).'!important; letter-spacing:'.esc_attr($lipi_theme_options['menu-inner-level-menu-letter-spacing']).'; line-height:'.esc_attr($lipi_theme_options['menu-inner-level-menu-letter-line-height']).'; text-transform:'.esc_attr($lipi_theme_options['menu-inner-level-menu-text-transform']).';} .site-header .site-header-category-links li ul a:hover { color:'.esc_attr($lipi_theme_options['menu-inner-level-text-color']['hover']).'!important; }.site-header .site-header-category-links a:hover{ color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['hover']).'!important; } @media (max-width: 991px){ .mobile-menu-holder { background:'.esc_attr($lipi_theme_options['mobile-bgackground-holder-background-color']).'; } .mobile-menu-holder li a { font-family:'.esc_attr($lipi_theme_options['theme-typography-nav']['font-family']).'; font-size:'.esc_attr($lipi_theme_options['mobile-first-level-menu-font-size']).'px; font-weight:'.esc_attr($lipi_theme_options['mobile-first-level-menu-weight']).'; letter-spacing:'.esc_attr($lipi_theme_options['mobile-first-level-menu-letter-spacing']).'; text-transform:'.esc_attr($lipi_theme_options['mobile-first-level-menu-text-transform']).'; color:'.esc_attr($lipi_theme_options['mobile-first-level-menu-text-color']['regular']).'!important; } .mobile-menu-holder li a:hover { color:'.esc_attr($lipi_theme_options['mobile-first-level-menu-text-color']['hover']).'!important; } .mobile-menu-holder li > ul li a { font-size:'.esc_attr($lipi_theme_options['mobile-menu-inner-level-font-size']).'px; font-weight:'.esc_attr($lipi_theme_options['mobile-menu-inner-level-weight']).'; letter-spacing:'.esc_attr($lipi_theme_options['mobile-menu-inner-level-menu-letter-spacing']).'; text-transform:'.esc_attr($lipi_theme_options['mobile-menu-inner-level-menu-text-transform']).'; line-height:'.esc_attr($lipi_theme_options['mobile-menu-inner-level-menu-letter-line-height']).'; color:'.esc_attr($lipi_theme_options['mobile-menu-inner-level-text-color']['regular']).'!important; } .site-header i.navbar-toggle{ color:'.esc_attr($lipi_theme_options['mobile-hamburger-menu-icon-color']['regular']).'; } .site-header i.navbar-toggle:hover{ color:'.esc_attr($lipi_theme_options['mobile-hamburger-menu-icon-color']['hover']).';  } } .site-header ul.site-header-category-links > li.current-menu-ancestor > a, .site-header ul.site-header-category-links > li.current-menu-ancestor > i { color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['hover']).'!important; } .site-header .site-header-category-links li ul > li.current-menu-ancestor > a, .site-header ul > li.current_page_item.current > a{ color:'.esc_attr($lipi_theme_options['menu-inner-level-text-color']['hover']).'!important; } .shopping_cart_header a.header_cart {color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['regular']).'; } .site-header.after-scroll-wrap .site-header-category-links li > .menu_arrow_first_level { color:'.esc_attr( ($lipi_theme_options['first-level-menu-text-color']['regular'] == "#222222"?"#222222":$lipi_theme_options['first-level-menu-text-color']['regular']) ).'!important; } .site-header.after-scroll-wrap ul.site-header-category-links > li.current-menu-ancestor > a { color:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['hover']).'!important; }.site-header .site-header-category-links li ul a i.menu_arrow {color:'.esc_attr($lipi_theme_options['menu-inner-level-text-color']['regular']).'!important;} .hamburger-menu span {background:'.esc_attr($lipi_theme_options['first-level-menu-text-color']['regular']).';}  nav.site-header.after-scroll-wrap .site-header-category-links >li >a, .site-header.after-scroll-wrap .site-header-category-links li > .menu_arrow_first_level { color:'.esc_attr($lipi_theme_options['theme_sticky_menu_text_color']['regular']).'!important; } nav.site-header.after-scroll-wrap .site-header-category-links >li >a:hover { color:'.esc_attr($lipi_theme_options['theme_sticky_menu_text_color']['hover']).'!important; } .site-header.after-scroll-wrap .site-header-category-links li ul > li.current-menu-ancestor > a, .site-header.after-scroll-wrap ul > li.current_page_item.current > a { color:'.esc_attr($lipi_theme_options['theme_sticky_menu_text_color']['hover']).'!important; }nav.site-header.after-scroll-wrap .site-header-category-links >li >a, nav.site-header.after-scroll-wrap .site-header-category-links >li >a:hover { line-height: '.esc_attr($lipi_theme_options['theme_sticky_menu_height']).'px!important; }nav.site-header.after-scroll-wrap {background:'.esc_attr((isset($lipi_theme_options['theme_sticky_menu_background']['rgba'])?$lipi_theme_options['theme_sticky_menu_background']['rgba']:'rgba(254, 254, 254, 0.96)')).'!important; box-shadow: none;} @media (max-width: 767px){ .mobile-menu-holder ul > li > i { color:'.esc_attr($lipi_theme_options['mobile-first-level-menu-text-color']['regular']).'!important; } .mobile-menu-holder ul > li { border-bottom: 1px solid '.esc_attr(isset($lipi_theme_options['mobile-bgackground-holder-bottom-color']['rgba'])?$lipi_theme_options['mobile-bgackground-holder-bottom-color']['rgba']:'#efefef').'; } .mobile-menu-holder li.current a { color:'.esc_attr($lipi_theme_options['mobile-first-level-menu-text-color']['hover']).'!important; } } @media (max-width: 991px) and (min-width: 768px){ .mobile-menu-holder ul > li > i { color:'.esc_attr($lipi_theme_options['mobile-first-level-menu-text-color']['regular']).'!important; } .mobile-menu-holder ul > li { border-bottom: 1px solid '.esc_attr((isset($lipi_theme_options['mobile-bgackground-holder-bottom-color']['rgba'])?$lipi_theme_options['mobile-bgackground-holder-bottom-color']['rgba']:'#efefef')).'; } .mobile-menu-holder li.current a { color:'.esc_attr($lipi_theme_options['mobile-first-level-menu-text-color']['hover']).'!important; } }';
	
	// MENU - control height
	if( $lipi_theme_options['first-level-menu-line-height'] != "" && 
	    ($lipi_theme_options['theme_nav_header_menu_style'] == 1 || 
		 $lipi_theme_options['theme_nav_header_menu_style'] == 2 || 
		 $lipi_theme_options['theme_nav_header_menu_style'] == 4 ||
		 $lipi_theme_options['theme_nav_header_menu_style'] == 5 ||
		 $lipi_theme_options['theme_nav_header_menu_style'] == 7 ||
		 $lipi_theme_options['theme_nav_header_menu_style'] == 8 ) ) {
		/*.site-header{ min-height: auto; }*/	 
		echo '.site-header .site-header-category-links a { line-height:'.esc_attr($lipi_theme_options['first-level-menu-line-height']).'px; } .shopping_cart_inner { height:'.esc_attr($lipi_theme_options['first-level-menu-line-height']).'px; } .hamburger-menu { top: '.esc_attr($lipi_theme_options['first-level-menu-hamburger-height']).'px; } ';
	}
	
	if($lipi_theme_options['first-level-menu-arrow']== false) { echo '.site-header .site-header-category-links li > .menu_arrow_first_level{display:none!important;}'; }
	
	/** RESPONSIVE **/
	if( $lipi_theme_options['blog_default_landing_pg_sidebar_layout'] == 2 ) {
		echo '@media (max-width:767px) {.left-widget-sidebar.fix-blog-left-sidebar { display: none; }}';
	}
	if( $lipi_theme_options['blog_small_thumb_landing_pg_sidebar_layout'] == 2 ) {
		echo '@media (max-width:767px) {.left-widget-sidebar.fix-blog-left-sidebar-small-thumb { display: none; }}';
	}
	
	// KB
	if( $lipi_theme_options['kb-catpost-icon'] == false ) {
		echo '.kb-categorypg .kb-box-single:before {  content: " "!important; }';
	}
	if( $lipi_theme_options['kb-catpost-date'] == false && $lipi_theme_options['kb-catpost-like-status'] == false && $lipi_theme_options['kb-categorypg-impression-status'] == false  && $lipi_theme_options['kb-catpost-icon'] == true ) {
		echo '.kb-categorypg .kb-box-single:before { font-size: 25px; }';
	}
	if( $lipi_theme_options['kb-single-pg-like-dislike-status'] == false && $lipi_theme_options['kb-single-pg-post-impression-status'] == false && $lipi_theme_options['kb-single-pg-post-author-qs-status'] == false  && $lipi_theme_options['kb-single-pg-post-date'] == false && $lipi_theme_options['kb_post_modified_date_status'] == false ) {
		echo '.printomatic { float: right; margin-top: -30px; }';
	}
	
	// BBPRESS CUSTOM CSS
	if ( class_exists('bbPress') && is_bbPress() && $lipi_theme_options['avtivate-custom-bbpress-header'] == true ) {
		$bbpress_breadcrumb_font_size = $lipi_theme_options['bbpress_breadcrumb_font_size'];
		$bbpress_breadcrumb_margin = $lipi_theme_options['bbpress_breadcrumb_margin'];
		if( isset($bbpress_breadcrumb_font_size) && $bbpress_breadcrumb_font_size != '' ) $bbpress_breadcrumb_font_size = 'font-size:'.esc_attr($bbpress_breadcrumb_font_size).';';
		if( isset($bbpress_breadcrumb_margin) && $bbpress_breadcrumb_margin != '' ) $bbpress_breadcrumb_margin = 'margin:'.esc_attr($bbpress_breadcrumb_margin).';';
		echo '.header_normal_design .padding-top-100{ margin-top:0px;} .header_normal_design .padding-top-100 { padding: '.esc_attr($lipi_theme_options['bbpress_custom_header_readjust_height']).';  } .header_normal_design .opacity { background:'.(isset($lipi_theme_options['bbpress_header_opacity_color']['rgba'])?$lipi_theme_options['bbpress_header_opacity_color']['rgba']:'rgba(0,0,0,0.3)').'; }  ';
		if( $lipi_theme_options['bbpress_custom_header_text_alignment'] == 'center' ) {  
			echo 'p.desc {text-align:center;}.header-breadcrumbs { float: none; text-align: center; margin-bottom: 10px; '.esc_attr($bbpress_breadcrumb_font_size).' '.esc_attr($bbpress_breadcrumb_margin).' } .replace_bbpress_header_h1{ text-align: center; }';   
		} else { echo '.header-breadcrumbs { float: right; margin-top: -30px; '.esc_attr($bbpress_breadcrumb_font_size).' '.esc_attr($bbpress_breadcrumb_margin).' } @media (max-width:767px) { .replace_bbpress_header_h1{ text-align: center;  } .header-breadcrumbs { float: none; text-align: center; }  } @media (min-width:768px) and (max-width:991px) { .replace_bbpress_header_h1 { text-align: center; } .header-breadcrumbs { float: none; text-align: center;  } }';  }
		echo '.replace_bbpress_header_h1{ color:'.esc_attr($lipi_theme_options['bbpress_custom_header_text_color']).'; font-size:'.esc_attr($lipi_theme_options['bbpress_custom_header_text_font']).'; letter-spacing:'.esc_attr($lipi_theme_options['bbpress_custom_header_text_font_letter_spacing']).'!important;margin: 0px!important; font-weight:'.esc_attr($lipi_theme_options['bbpress_custom_header_text_font_weight']).'; } .header-breadcrumbs { color:'.esc_attr($lipi_theme_options['bbpress_breadcrumb_text_color']).'; } .header_normal_design .header-breadcrumbs a { color:'.esc_attr($lipi_theme_options['bbpress_breadcrumb_text_color_link']).'; } .header_normal_design .header-breadcrumbs a:hover{ color:'.esc_attr($lipi_theme_options['standard_a_tag_link_color']['hover']).';  }';
		if( isset($lipi_theme_options['bbpress_custom_header_style_type']) && $lipi_theme_options['bbpress_custom_header_style_type'] == 'custom' ) { 	
			 echo '.site-header .logo-image.dark { display: none; }.site-header .logo-image.white { display: block; } .site-header .site-header-category-links li > .menu_arrow_first_level, .site-header .site-header-category-links a{ color:'.$lipi_theme_options['first-level-menu-transparent-bg-text-color']['regular'].'; } .site-header { position: absolute; background: transparent!important; }  @media (max-width:767px) { .site-header .logo-image.dark { display: block; }.site-header .logo-image.white { display: none; } .site-header { position: relative; background: '.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'!important; } .header_normal_design .padding-top-100 { padding:'.esc_attr($lipi_theme_options['bbpress_custom_header_readjust_responsive_height']).'; } }  @media (min-width:768px) and (max-width:991px) { .site-header .logo-image.dark { display: block; }.site-header .logo-image.white { display: none; } .site-header { position: relative; background: '.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'!important; } .header_normal_design .padding-top-100 { padding:'.esc_attr($lipi_theme_options['bbpress_custom_header_readjust_responsive_height']).'; } }'; 
		} else if( isset($lipi_theme_options['bbpress_custom_header_style_type']) && $lipi_theme_options['bbpress_custom_header_style_type'] == 'standard' ) {
			echo '@media (max-width:767px) { .header_normal_design .padding-top-100 { padding:'.esc_attr($lipi_theme_options['bbpress_custom_header_readjust_responsive_height']).'; } } @media (min-width:768px) and (max-width:991px) { .header_normal_design .padding-top-100 { padding:'.esc_attr($lipi_theme_options['bbpress_custom_header_readjust_responsive_height']).'; } }';	
		}
		$header_desc_p = '';
		if( isset($lipi_theme_options['bbpress_custom_header_subtitle_padding']) && $lipi_theme_options['bbpress_custom_header_subtitle_padding'] != '' ) {
			$header_desc_p = 'padding:'.esc_attr($lipi_theme_options['bbpress_custom_header_subtitle_padding']).'';	
		}
		echo 'p.desc{ color:'.esc_attr($lipi_theme_options['bbpress_custom_header_subtext_color']).';font-size:'.esc_attr($lipi_theme_options['bbpress_custom_header_subtitle_size']).'; '.$header_desc_p.' }';
		
		if( $lipi_theme_options['bbpress_force_header_text_left'] == true ) { echo '.header_normal_design p.desc {text-align: left;} .header-breadcrumbs { float: none; text-align: left;} @media (max-width:767px) { .header_normal_design p.desc, .header-breadcrumbs {text-align: center;} }@media (min-width:768px) and (max-width:991px) { .header_normal_design p.desc, .header-breadcrumbs {text-align: center;} }'; }
		
		if( $lipi_theme_options['bbpress_header_nav_background'] == true ) { echo '.site-header{ background:'.esc_attr($lipi_theme_options['bbpress_header_nav_background_color']['rgba']).'!important; } @media (max-width: 767px) { .site-header { background:'.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'!important;} } @media (max-width: 991px) and (min-width: 768px) { .site-header { background: '.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'!important; } } '; }
		
	} // Eof bbpress custom header
	
	// custom other header call
	if ( $current_post_type == 'lipi_kb' && ( ( is_archive()  && $lipi_theme_options['avtivate-custom-kb-header-category'] == true ) || ( is_single() && $lipi_theme_options['avtivate-custom-kb-header-singlepage'] == true ) ) ) {
		lipi__custom_header_css_call($lipi_theme_options['knowledgebase_custom_header_readjust_height'],$lipi_theme_options['knowledgebase_header_opacity_color']['rgba'], $lipi_theme_options['knowledgebase_custom_header_text_color'], $lipi_theme_options['knowledgebase_custom_header_text_font'], $lipi_theme_options['knowledgebase_custom_header_text_font_letter_spacing'], $lipi_theme_options['knowledgebase_custom_header_text_font_weight'], $lipi_theme_options['knowledgebase_custom_breadcrumb_text_color'], $lipi_theme_options['knowledgebase_custom_breadcrumb_text_color_link'], $lipi_theme_options['standard_a_tag_link_color']['hover'], $lipi_theme_options['knowledgebase_custom_header_text_alignment'], $lipi_theme_options['knowledgebase_custom_header_style_type'], $lipi_theme_options['header-level-wrap-background-color'], $lipi_theme_options['knowledgebase_custom_header_readjust_responsive_height'], $lipi_theme_options['knowledgebase_breadcrumb_font_size'], $lipi_theme_options['knowledgebase_breadcrumb_margin'], $lipi_theme_options['knowledgebase_force_header_text_left'],$lipi_theme_options['knowledgebase_header_nav_background'], $lipi_theme_options['knowledgebase_header_nav_background_color']['rgba']);
	}
	if( $current_post_type == 'lipi_faq' && ( ( is_archive()  && $lipi_theme_options['avtivate-custom-faq-header-category'] == true ) ) ) {
		lipi__custom_header_css_call($lipi_theme_options['faq_custom_header_readjust_height'],$lipi_theme_options['faq_header_opacity_color']['rgba'], $lipi_theme_options['faq_custom_header_text_color'], $lipi_theme_options['faq_custom_header_text_font'], $lipi_theme_options['faq_custom_header_text_font_letter_spacing'], $lipi_theme_options['faq_custom_header_text_font_weight'], $lipi_theme_options['faq_custom_breadcrumb_text_color'], $lipi_theme_options['faq_custom_breadcrumb_text_color_link'], $lipi_theme_options['standard_a_tag_link_color']['hover'], $lipi_theme_options['faq_custom_header_text_alignment'], $lipi_theme_options['faq_custom_header_style_type'], $lipi_theme_options['header-level-wrap-background-color'], $lipi_theme_options['faq_custom_header_readjust_responsive_height'], $lipi_theme_options['faq_breadcrumb_font_size'], $lipi_theme_options['faq_breadcrumb_margin'], $lipi_theme_options['faq_force_header_text_left'], $lipi_theme_options['faq_header_nav_background'], $lipi_theme_options['faq_header_nav_background_color']['rgba']);
	}
	
} // END OF REDUX ACTIVE CLAUSE

	/** STICKY MENU FIX **/
	if( is_user_logged_in() == true && is_admin_bar_showing() ) {
		echo 'nav.site-header.after-scroll-wrap { top: 32px; }';
	}
}
}


if (!function_exists('lipi__custom_header_css_call')) {
function lipi__custom_header_css_call( $custom_header_readjust_height,$custom_header_opacity_color_rgba, $custom_header_text_color, $custom_header_text_font, $custom_header_text_font_letter_spacing, $custom_header_text_font_weight, $custom_breadcrumb_text_color, $custom_breadcrumb_text_color_link, $standard_a_tag_link_color_hover , $custom_header_text_alignment, $custom_header_style_type, $header_level_wrap_background_color, $custom_header_readjust_responsive_height, $breadcrumb_font_size, $breadcrumb_margin, $force_header_text_left, $header_nav_background, $header_nav_background_color){
		global $lipi_theme_options;
		if( isset($breadcrumb_font_size) && $breadcrumb_font_size != '' ) $breadcrumb_font_size = 'font-size:'.esc_attr($breadcrumb_font_size).';';
		if( isset($breadcrumb_margin) && $breadcrumb_margin != '' ) $breadcrumb_margin = 'margin:'.esc_attr($breadcrumb_margin).';';
		echo '.header_normal_design .padding-top-100{ margin-top:0px;} .header_normal_design .padding-top-100 { padding: '.$custom_header_readjust_height.';  } .header_normal_design .opacity { background:'.(isset($custom_header_opacity_color_rgba)?$custom_header_opacity_color_rgba:'rgba(0,0,0,0.3)').'; }';
		if( $custom_header_text_alignment == 'center' ) { 
		 echo '.header-breadcrumbs { float: none; text-align: center; margin-bottom: 10px; '.esc_attr($breadcrumb_font_size).' '.esc_attr($breadcrumb_margin).' } .replace_bbpress_header_h1{ text-align: center; }';   
		} else { echo '.header-breadcrumbs { float: right; margin-top: -18px; '.esc_attr($breadcrumb_font_size).' '.esc_attr($breadcrumb_margin).' }@media (max-width:767px) { .replace_bbpress_header_h1{ text-align: center;  } .header-breadcrumbs { float: none; text-align: center; }  } @media (min-width:768px) and (max-width:991px) { .replace_bbpress_header_h1 { text-align: center; } .header-breadcrumbs { float: none; text-align: center;  } }';  }
		echo '.replace_bbpress_header_h1{ color:'.esc_attr($custom_header_text_color).'; font-size:'.esc_attr($custom_header_text_font).'; letter-spacing:'.esc_attr($custom_header_text_font_letter_spacing).'!important;margin: 0px!important; font-weight:'.esc_attr($custom_header_text_font_weight).'; } .header-breadcrumbs { color:'.esc_attr($custom_breadcrumb_text_color).'; } .header_normal_design .header-breadcrumbs a { color:'.esc_attr($custom_breadcrumb_text_color_link).'; } .header_normal_design .header-breadcrumbs a:hover{ color:'.esc_attr($standard_a_tag_link_color_hover).';  }';
		if( isset($custom_header_style_type) && $custom_header_style_type == 'custom' ) { 	
			 echo '.site-header .logo-image.dark { display: none; }.site-header .logo-image.white { display: block; } .site-header .site-header-category-links li > .menu_arrow_first_level, .site-header .site-header-category-links a{ color:'.$lipi_theme_options['first-level-menu-transparent-bg-text-color']['regular'].'; } .site-header { position: absolute; background: transparent!important; }  @media (max-width:767px) { .site-header .logo-image.dark { display: block; }.site-header .logo-image.white { display: none; } .site-header { position: relative; background: '.esc_attr($header_level_wrap_background_color).'!important; } .header_normal_design .padding-top-100 { padding:'.esc_attr($custom_header_readjust_responsive_height).'; } }  @media (min-width:768px) and (max-width:991px) { .site-header .logo-image.dark { display: block; }.site-header .logo-image.white { display: none; } .site-header { position: relative; background: '.esc_attr($header_level_wrap_background_color).'!important; } .header_normal_design .padding-top-100 { padding:'.esc_attr($custom_header_readjust_responsive_height).'; } }'; 
		} else if( isset($custom_header_style_type) && $custom_header_style_type == 'standard' ) {
			echo '@media (max-width:767px) { .header_normal_design .padding-top-100 { padding:'.esc_attr($custom_header_readjust_responsive_height).'; } } @media (min-width:768px) and (max-width:991px) { .header_normal_design .padding-top-100 { padding:'.esc_attr($custom_header_readjust_responsive_height).'; } }';	
		}
		if( $force_header_text_left == true ) { echo '.header-breadcrumbs { float: none; text-align: left;}@media (max-width:767px) { .header-breadcrumbs {text-align: center;} }@media (min-width:768px) and (max-width:991px) { .header-breadcrumbs {text-align: center;} }'; }
		if( $header_nav_background == true ) { echo '.site-header{ background:'.esc_attr($header_nav_background_color).'!important; } @media (max-width: 767px) { .site-header { background:'.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'!important;} } @media (max-width: 991px) and (min-width: 768px) { .site-header { background: '.esc_attr($lipi_theme_options['header-level-wrap-background-color']).'!important; } } '; }
	}
}

/*-----------------------------------------------------------------------------------*/
/*	CUSTOMIZER VC DYNAMIC REPLACE CSS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__vc_dynamic_css')) {
function lipi__vc_dynamic_css() {
	echo '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-size-lg.vc_icon_element-have-style-inner { width: 7em!important; height: 7em!important;
} .blog.page .pg-custom-vc h2{ font-weight: 700; }';
}
}




/*-----------------------------------------------------------------------------------*/
/*	THEME COMMENT :: WAKER
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__comment' ) ) {

	function lipi__comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		//print_r($args);
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
<<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID() ?>"
<?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>>

<div class="comment"  id="<?php echo esc_attr($add_below); ?>-<?php comment_ID() ?>">
  <div class="img-thumbnail">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
  </div>
  <div class="comment-block">
  
    <div class="comment-arrow"></div>
    
    <div class="comment-by"> 
	   <?php printf( __( '%s' , 'lipi' ), get_comment_author_link() ); ?>
      <span class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );  ?>
      </span>
      <div class="date"> <?php printf( esc_html__('%1$s at %2$s', 'lipi'), get_comment_date(),  get_comment_time() ); ?>
       <?php edit_comment_link( esc_html__( '(Edit)', 'lipi' ), '  ', '' ); ?>
      </div>
    </div>
    
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <div class="moderation"> <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.' , 'lipi' ); ?></em> </div>
    <?php endif; ?>
    <?php comment_text(); ?>
    
    </div>
</div>
<?php
	}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME PORTFOLIO :: SORTING
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__portfolio_sorting' ) ) {
function lipi__portfolio_sorting( $align = '', $shorting_name = '' ) {
	
	$args = array(
		'hide_empty'    => 1,
		'child_of' 		=> 0,
		'pad_counts' 	=> 1,
		'hierarchical'	=> 1,
		'order'         => 'ASC',
	);
	$tax_terms = get_terms('lipiptfocategory', $args);
    $tax_terms = wp_list_filter( $tax_terms, array('parent'=>0) );

	echo '<div class="'.$shorting_name.'" style="text-align:'.$align.'">
		<ul>';
			 if( ! empty($tax_terms) ) { 
				echo '<li data-filter-masnory="*" class="selected"><span>'. esc_html__( 'All', 'lipi' ) .'</span></li>';
			 }    
				foreach ($tax_terms as $tax_term) { 
					 $cat_title = $tax_term->name; 
					 $cat_title = html_entity_decode($cat_title, ENT_QUOTES, "UTF-8");
					 $cat_title_filter = strtolower($cat_title);
					 $cat_title_filter = preg_replace("/[\s_]/", "-", $cat_title_filter);
				echo '<li data-filter-masnory=".'.strtolower($cat_title_filter).'"><span>'. $cat_title .'</span></li>';
			 } 
		echo '</ul>
	</div>';
	
}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME PORTFOLIO :: RETURN NAME
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__portfolio_cat_name' ) ) {
function lipi__portfolio_cat_name($postID, $post_type) {
	
	$taxonomies = get_object_taxonomies( $post_type, 'objects' ); 
	$out = array();
	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
		// get the terms related to post
		$terms = get_the_terms( $postID, $taxonomy_slug );
		if ( !empty( $terms ) ) {
			foreach ( $terms as $term ) {
				$out[] = $term->name;
			}
			return $out;
		}
	}
	
}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME PORTFOLIO :: RETURN ARGS
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__portfolio_args' ) ) {
function lipi__portfolio_args() {
	global $lipi_theme_options;
	
	if( !empty( $lipi_theme_options['portfolio-record-display-order'] ) ) {
		$display_order = $lipi_theme_options['portfolio-record-display-order'];
	} else {
		$display_order = 'DESC';
	}
	
	if( !empty( $lipi_theme_options['portfolio-record-display-order-by'] ) ) {
		$display_order_by = $lipi_theme_options['portfolio-record-display-order-by'];
	} else {
		$display_order_by = 'date';
	}
	
	if( !empty( $lipi_theme_options['portfolio-records-per-page'] ) && $lipi_theme_options['portfolio-records-per-page'] != 0 ) {
		$records_per_page = $lipi_theme_options['portfolio-records-per-page'];
	} else {
		$records_per_page = '-1';
	}
	
	$term_slug = get_query_var( 'term' );
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
					'post_type'  => array( 'lipi_portfolio' ), 
					'orderby' => $display_order_by,
					'posts_per_page' => $records_per_page,
					'paged' => $paged,
					'order' => $display_order, 
	);
	return $args;

}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME PORTFOLIO :: RELATED WORK
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__related_portfolio' ) ) {
function lipi__related_portfolio($postID) {
	global $lipi_theme_options; 
	
	// Number of records
	$col_md_sm = '';
	if( $lipi_theme_options['portfolio_related_post_no_of_records'] == 3 ) {
		$col_md_sm = 4;
	} else {
		$col_md_sm = 3;
	}
	
	$categories = get_the_terms($postID, 'lipiptfocategory');
	if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) 
			$category_ids[] = $individual_category->term_id;
			$args = array(
			'post_type' => 'lipi_portfolio',
			'tax_query' => array(
				array(
					'taxonomy' => 'lipiptfocategory',
					'field' => 'term_id',
					'terms' => $category_ids
				)
			),
			'post__not_in' => array($postID),
			'posts_per_page'=> $lipi_theme_options['portfolio_related_post_no_of_records'], // Number of related posts that will be shown.
			'ignore_sticky_posts'=> 1 // sticky post hide
	   );
	   $related_articles_query = new wp_query( $args );
	   if( $related_articles_query->have_posts() ) {
	   ?>
        <section class="related_articles">
            <h5 class="related_projetcs fix-padding-left-right-15" style="margin-bottom: 30px!important;"><?php echo esc_attr($lipi_theme_options['portfolio_related_post_title']); ?></h5>
            <div class="col-md-12 col-sm-12 fix-padding-right-0 fix-padding-left-0">
            <?php 
			 while( $related_articles_query->have_posts() ) {
	                $related_articles_query->the_post();
					echo '<div class="col-md-'.$col_md_sm.' col-sm-'.$col_md_sm.' related_projects_portfolio">';
					$out = lipi__portfolio_cat_name($related_articles_query->ID, 'lipi_portfolio');
					?>
					
                    <div class="portfolio-image"> 
                        <a href="<?php the_permalink(); ?>">
                        <?php 
                            if ( has_post_thumbnail()) { 
								the_post_thumbnail( 'lipi-image-700x525', array( 'class' => 'hvr-float' ) );
                            } else {
                                echo '<img width="825" height="510" src="'. trailingslashit( get_template_directory_uri() ).'img/no-portfolio-img.jpg" class="hvr-float wp-post-image">';
                            }
                        ?>
                        </a> 
                    </div>
                    
                    <div class="portfolio-desc" style="margin-top: 13px;">
                         <h6 class="entry-title"><a href="<?php the_permalink(); ?>">
                          <?php 
                            $title = get_the_title(); 
                            echo html_entity_decode($title, ENT_QUOTES, "UTF-8");
                           ?>
                         </a></h6>
                    </div>
					<?php 
					echo '</div>';
			 } 
			?>
            </div>
        </section>      
	   <?php 	   
	   }
	}
	wp_reset_postdata();
}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME PORTFOLIO :: SOCIAL SHARE
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__portfolio_social_share' ) ) {
function lipi__portfolio_social_share($url, $get = false, $align = 'center' ){
	global $lipi_theme_options;
	if( isset($lipi_theme_options['portfolio_social_share_mailto']) ){
		$mailto = esc_attr($lipi_theme_options['portfolio_social_share_mailto']);
	} else {
		$mailto = '';
	}
	
	$return = '';
    $return .= '<div class="social-box" style="text-align:'.esc_html($align).'">
	<a target="_blank" href="https://twitter.com/home?status='. esc_url($url).'"><i class="fab fa-twitter social-share-box"></i></a>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='. esc_url($url).'" title="facebook"><i class="fab fa-facebook-f social-share-box"></i></a>
    <a target="_blank" href="https://pinterest.com/pin/create/button/?url='. esc_url($url).'&media=&description="><i class="fab fa-pinterest-p social-share-box"></i></a>
    <a target="_blank" href="https://plus.google.com/share?url='. esc_url($url).'"><i class="fab fa-google-plus-g social-share-box"></i></a>
    <a target="_blank" href="mailto:?subject='.esc_attr($mailto).'"><i class="far fa-envelope social-share-box"></i></a>
    </div>';
	
	if( $get == true ) {
		return $return;
	} else {
		echo ''.$return;	
	}
    
}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME :: CUSTOM SEARCH FORM
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__custom_search_form' ) ) {
function lipi__custom_search_form() {
	global $lipi_theme_options;
	if($lipi_theme_options['theme_search_box_search_bottom'] == true) $search_box_css = 'no_buttom';
	else  $search_box_css = '';
	$search_form = '';
	$search_form .= '<div class="global-search">
			<input type="hidden" id="oldplacvalue" value="'.esc_attr($lipi_theme_options['global-search-text-paceholder']).'">
			<form role="search" method="get" id="searchform" class="searchform" action="'.esc_url( home_url( '/' ) ).'">
			  <i class="fa fa-search livesearch"></i>
			  <div class="form-group">
				<input type="text"  placeholder="'.esc_attr($lipi_theme_options['global-search-text-paceholder']).'" value="'.get_search_query().'" name="s" id="s" class="form-control header-search '.$search_box_css.' " />';
	if($lipi_theme_options['theme_search_box_search_bottom'] == false) {			
		$search_form .= '<input type="submit" class="search-button-custom" value="'.esc_attr(isset($lipi_theme_options['global_search_button_text'])?$lipi_theme_options['global_search_button_text']:'Search').'">';
	}
	$search_form .= '</div>
			</form>
			</div>';
	return $search_form;
}
}


/*-----------------------------------------------------------------------------------*/
/*	BIND :: LIVE SEARCH RESULT
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__live_search_result' ) ) {
function lipi__live_search_result() {
	global $lipi_theme_options;
	if (have_posts()) {
		echo '<ul class="live-searchresults">';
		while (have_posts()) { the_post();
			$post_type = get_post_type( get_the_ID() );
			/**************************************
			** CONTROL KB ARTICLE DISPLAY :: Check For ONLY Login ACCESS **
			***************************************/
			if ( $post_type == "lipi_kb" ) {
				$terms = get_the_terms( get_the_ID() , 'lipikbcat' ); 
				$check_if_login_call = get_option( 'kb_cat_check_login_'.$terms[0]->term_id );
				$check_user_role = get_option( 'kb_cat_user_role_'.$terms[0]->term_id );
				if( $check_if_login_call == 1 && !is_user_logged_in() ) {
					// display none
				} else {
					// check if user grop has access
					$access_status = lipi__useraccesslevel($check_user_role);
					if( $check_if_login_call == 1 && is_user_logged_in() && $access_status == false ) { 
						// display none
					} else {
						echo '<li> <a href="'.get_the_permalink().'">'.get_the_title().' </a> </li>';
					}
				}
			} else {
			/**************************************
			** FOR NORMAL RECORDS **
			***************************************/
			echo '<li> <a href="'.get_the_permalink().'">'.get_the_title().' </a> </li>';
			}
		}
			echo '<li class="live-searchresults-showall">';
			echo '<a href="'.home_url('/').'?s='.get_search_query().'">';
			echo esc_attr($lipi_theme_options['global_live_showallresult_search_text']);
			echo '</a>';
			echo '</li>';
		echo '</ul>';
	} else {
		echo '<ul class="live-searchresults">';
		echo '<li class="live-searchresults-noresults">'. esc_attr($lipi_theme_options['global_live_noresult_search_text']) .'</li>';
		echo '</ul>';
	}
	
}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME :: KNOWLEDGE-BASE RATING
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__like_dislike_voting' ) ) {
function lipi__like_dislike_voting($id, $vote_like, $vote_unlike){ 
	global $lipi_theme_options;
	
	echo '<div class="rate-buttons">';
	
	echo '<p class="helpfulmsg">'.esc_attr($lipi_theme_options['yes-no-above-message']).'</p>';
	
	echo '<span class="post-like"><a data-post_id="'.esc_attr($id).'" href="#"><span data-rating="1"><i class="glyphicon glyphicon-thumbs-up"></i> <span class="rating_likecount_display">'. esc_html($vote_like) .' </span> '.esc_attr($lipi_theme_options['yes-button-text']).'</span></a></span>&nbsp;&nbsp;'; 
	
	echo '<span class="post-unlike"><a data-post_id="'.$id.'" href="#"><span data-rating="0"> <i class="glyphicon glyphicon-thumbs-down"></i> <span class="rating_unlikecount_display">'. esc_html($vote_unlike).' </span> '.esc_attr($lipi_theme_options['no-button-text']).'</span></a></span>';
    
	if( is_super_admin() && is_user_logged_in() ) {
		echo '<span class="post-reset"><a data-post_id="'.esc_attr($id).'" href="#"><span class="btn btn-link" data-rating="0"> <i class="fa fa-refresh"></i> <span class="rating_reset_display"> Reset </span></span></a></span>';
	}
	
	echo '</div>';
}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME :: KNOWLEDGE-BASE ATTACHED FILES
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__attached_files' ) ) {
function lipi__attached_files() {
	global $lipi_theme_options;
	$entries = get_post_meta( get_the_ID(), '__lipi_page_kb_group', true );
	
	if( !empty($entries) && $entries[0]['image_id'] != 0 ) {  
	echo '<div class="attached_file_section padding-top-bottom-10">
		  <h5>'.esc_attr($lipi_theme_options['attached-file-title']).'</h5>
		  <span class="separator small"></span>
		  <div class="wrapbox">
		  <table class="table table-hover"> 
			<thead> 
				<tr> 
					<th><h6>#</h6></th> 
					<th><h6>'.esc_attr($lipi_theme_options['attached-file-type']).'</h6></th> 
					<th><h6>'.esc_attr($lipi_theme_options['attached-file-size']).'</h6></th> 
					<th><h6>'.esc_attr($lipi_theme_options['attached-file-download']).'</h6></th> 
				</tr> 
			</thead>	
			 ';
			 
		$i = 1;	
		foreach ( (array) $entries as $key => $entry ) { 
			$file_size = filesize( get_attached_file( $entry['image_id'] ) );
			$attach_file_type = wp_check_filetype($entry['image']);
			$filename = ( get_the_title($entry['image_id'])?get_the_title($entry['image_id']):basename( get_attached_file( $entry['image_id'] ) )); 
			$img = $title = $desc = $caption = '';
			if ( isset( $entry['title'] ) ) $title = esc_html( $entry['title'] );
				if ( isset( $entry['image'] ) ) { 
                    echo '<tbody> 
                        <tr> 
                            <th scope="row">'.esc_attr($i).'</th> 
                            <td>'. '.'.esc_html($attach_file_type['ext']).'</td> 
                            <td>'. esc_attr(size_format($file_size, 2)) .'</td> 
                            <td><a href="'. esc_url(wp_get_attachment_url( $entry['image_id'] )) .'">'. esc_html($filename) .'</a></td> 
                        </tr> 
                    </tbody>'; 
				}
		$i++;		
		}
		echo '</table></div></div>';
	}
}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME :: KNOWLEDGE-BASE ACCESS CONTROL
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__access_control_attachment' ) ) {
function lipi__access_control_attachment($message, $ajaxcall_login = '') {
	global $lipi_theme_options;
	echo '<div class="attached_file_section padding-top-bottom-10">';
	echo '<h5>'.esc_attr($lipi_theme_options['attached-file-title-for-login-user']).'</h5>';
	echo '<span class="separator small"></span>
	  <div class="wrapbox">
				<div class="manual_login_page">
				  <div class="custom_login_form">';
				   if( $message != '' ) { 
						echo '<h4>'.esc_attr(stripslashes($message)).'</h4>'; 
					}
					if( $ajaxcall_login == '' ) {
						$args = array(
							'echo' => false,
						);
						echo wp_login_form($args); 
                    } else {
						echo ' <form action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post"><input type="submit" class="button-primary" value="'.__('Log In', 'lipi').'"></form>';
					}
					echo '<ul class="custom_register">';
					if ( get_option( 'users_can_register' ) ) { wp_register(); }
					echo '<li><a href="'.wp_lostpassword_url().'" title="'.__('Lost Password', 'lipi').'" class="more-link hvr-icon-wobble-horizontal">'.__('Lost Password', 'lipi').'&nbsp;&nbsp;<i class="fa fa-arrow-right hvr-icon"></i></a></li>
					</ul>
				  </div>
				</div>
	  </div>
	</div>';	
}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME :: KNOWLEDGE-BASE RELATED ARTICKES
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'lipi__kb_related_articles' ) ) {
function lipi__kb_related_articles() {  
	global $post, $lipi_theme_options;
	if( isset($lipi_theme_options['related-no-of-post']) && $lipi_theme_options['related-no-of-post'] != '' ) {
		$posts_per_page = esc_attr($lipi_theme_options['related-no-of-post']);
	} else {
		$posts_per_page = 6;
	}
	$categories = get_the_terms($post->ID, 'lipikbcat');
	if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) 
			$category_ids[] = $individual_category->term_id;
			$args=array(
			'post_type' => 'lipi_kb',
			'tax_query' => array(
				array(
					'taxonomy' => 'lipikbcat',
					'field' => 'term_id',
					'terms' => $category_ids
				)
			),
			'post__not_in' => array($post->ID),
			'posts_per_page'=> $posts_per_page, // Number of related posts that will be shown.
			'ignore_sticky_posts'=>1 // sticky post hide
		   );
	   $related_articles_query = new wp_query( $args );
	   if( $related_articles_query->have_posts() ) {
	   ?>
        <div class="related_kb_post">
            <h5><?php echo esc_attr($lipi_theme_options['related-kb-post-title']); ?></h5>
            <ul class="related_post_ul">
            <?php 
			 while( $related_articles_query->have_posts() ) {
	                $related_articles_query->the_post();
			?>
            	<li class="related_post_ul_li"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></li>
             <?php } ?>
            </ul>
        </div>      
	   <?php 	   
	   }
	}
	wp_reset_postdata();
}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME :: BBPRESS SEARCH HACK
/*-----------------------------------------------------------------------------------*/

function lipi__bbp_topic_search( $topic_search ) {
	$topic_search['exclude_from_search'] = false;
	return $topic_search;
}
add_filter( 'bbp_register_topic_post_type', 'lipi__bbp_topic_search' );

/**
 * Include bbPress 'reply' custom post type in WordPress' search results
 */
function lipi__bbp_reply_search( $reply_search ) {
	$reply_search['exclude_from_search'] = false;
	return $reply_search;
}
add_filter( 'bbp_register_reply_post_type', 'lipi__bbp_reply_search' );

/**
 * Include bbPress 'forum' custom post type in WordPress' search results 
 */
function lipi__bbp_forum_search( $forum_search ) {
	$forum_search['exclude_from_search'] = false;
	return $forum_search;
}
add_filter( 'bbp_register_forum_post_type', 'lipi__bbp_forum_search' );



/*-----------------------------------------------------------------------------------*/
/*	THEME :: HAMBURGER MENU
/*-----------------------------------------------------------------------------------*/

if (!function_exists('lipi__hamburger_menu_control')) {
	function lipi__hamburger_menu_control(){
		global $lipi_theme_options;
		// UPGRADE RELEASE REQUIRED - Hamburger Menu //
		if( $lipi_theme_options['theme_nav_header_menu_style'] == 7 ) {
			echo '<div class="hamburger-menu">
					<span></span> <span></span> <span></span> <span></span>
				 </div>';
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME :: PLUGIN ACTIVE STAUTS
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__check_redux_plugin_install')) {
	function lipi__check_redux_plugin_install(){
			$is_plugin_active = lipi__plugin_active('ReduxFramework');
			if($is_plugin_active == false){
				echo 'body { color: #333333; font-family:Montserrat!important; font-size: 14px; line-height: 26px; letter-spacing: 0.3px; font-weight: 500; }h1,h2,h3,h4,h5,h6{ font-family: Montserrat; }h1 {font-weight: 700;font-size: 37px;line-height: 40px;text-transform: none;letter-spacing: -2.3px;color: #222222;}h2 {font-weight: 700;font-size: 32px;line-height: 35px;text-transform: none;letter-spacing: -2.3px;color: #222222; }h3 {font-weight:700; font-size:27px; line-height:30px; text-transform:none; letter-spacing:-1px; color:#222222;}h4 {font-weight: 700;font-size: 22px;line-height: 25px;text-transform: none;letter-spacing: -1px;color: #222222;}h5 {font-weight: 700;font-size: 19px;line-height: 22px;text-transform: none;letter-spacing: -0.7px;color: #222222;}h6 {font-weight: 700;font-size: 16px;line-height: 19px;text-transform: none;letter-spacing: -0.4px;color: #222222;}.body-content .blog h1.entry-title:hover, .body-content .blog h2.entry-title:hover, .body-content .blog h3.entry-title:hover, .body-content .blog h4.entry-title:hover, .body-content .blog h5.entry-title:hover, .body-content .blog h6.entry-title:hover{ color: #2198D1; } a{color: #002e5b;}.woocommerce ul.products li.product { width: 30.7%; } @media (max-width:767px) { .woocommerce ul.products li.product{ width: 99.5%; } }.custom-link, .more-link { color: #165695!important; font-weight: 600; } a.custom-link:hover, a.more-link:hover { color: #2198D1!important; } input[type="submit"]{background-color: #002e5b;}input[type="submit"]:hover{background-color: #fc5546;}.kb-categorypg .kb-box-single:hover:before, .knowledgebase-body li.cat.inner:hover:before { color: #fc5546!important; }.site-header .site-header-category-links a {letter-spacing: 0px!important;} .kb-categorypg .kb-box-single.searchpg:before { margin-top: 1px; } .site-header .site-header-category-links a {font-family: Montserrat;font-weight: 600;}.header_normal_design .padding-top-100 .inner-padding h1 { font-size: 24px!important; } @media (max-width: 767px) { .mobile-menu-holder ul > li { font-family: Montserrat; font-weight: 600; } .mobile-menu-holder li a { font-weight: 600; color:#222222!important; } .mobile-menu-holder li > ul li a { font-weight: 500; } } @media (max-width: 991px) and (min-width: 768px) { .mobile-menu-holder ul > li { font-family: Montserrat; font-weight: 600; } .mobile-menu-holder li a { font-weight: 600; color:#002e5b!important; } .mobile-menu-holder li > ul li a { font-weight: 500; } }.site-header i.navbar-toggle:hover{ color: #2198D1; } @media (max-width: 767px) { .mobile-menu-holder li a:hover { color: #2198D1!important; } } @media (max-width: 991px) and (min-width: 768px) { .mobile-menu-holder li a:hover { color: #2198D1!important; } }'; 
				if(is_page() || is_single()) { echo '.header-breadcrumbs{margin-top:5px!important;float: right;}'; } 
				if( is_single() ) { lipi__wp_default_settings(); echo '.header_normal_design .padding-top-100 { padding: 15px 15px 20px 15px; }';  }
			}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	THEME :: THEME OPTION GLOBAL VAR
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__theme_option_global')) {
	function lipi__theme_option_global(){
		global $lipi_theme_options;
		return $lipi_theme_options;
	}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME TOP HEADER CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__theme_top_header_display')) {
	function lipi__theme_top_header_display($pageID){ 
		global $lipi_theme_options;
		if( is_page() ) {
			if( get_post_meta( $pageID, '__lipi_top_header_activate_status', true ) == true ) {
				lipi__theme_top_header_display_html();
			}
		} else { 
			if( isset($lipi_theme_options['theme_top_header_status']) && $lipi_theme_options['theme_top_header_status'] == true ) {
				lipi__theme_top_header_display_html();	
			}
		} // eof else
	}
}

if (!function_exists('lipi__theme_top_header_display_html')) {
	function lipi__theme_top_header_display_html(){
		global $lipi_theme_options;
		echo '<nav class="site-top-header">';
		if( isset( $lipi_theme_options['theme-top-container-global-full-width'] ) && $lipi_theme_options['theme-top-container-global-full-width'] == true ) { 
			echo '<div class="container-fluid">';
		} else { 
			echo '<div class="container">';
		}
		echo '<div class="row">
					<div class="wrap_site_top_header">
					<div class="col-lg-4 side-top-header-left">';
		if ( has_nav_menu( 'header-top-left' ) ) {
			wp_nav_menu( array( 'theme_location' => 'header-top-left', 'menu_class' => 'pull-left top-left lang_sel', 'depth' => 2, ) );
		}
		echo '</div>
			  <div class="col-lg-8 side-top-header-right">';
				echo '<div class="nav_style_3_icon_text">';
				if ( is_active_sidebar( 'header-top-icon-with-text-widget' ) ) : 
					dynamic_sidebar( 'header-top-icon-with-text-widget' ); 
				endif;
				echo '</div>';
		echo '</div>
				</div>
				</div>';
		echo '</div>';
		echo '</nav>';
	}
}


/*-----------------------------------------------------------------------------------*/
/*	THEME HEADER CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__theme_header_control')) {
	function lipi__theme_header_control(){
		global $lipi_theme_options;
		
		// Menu Style
		if( $lipi_theme_options['theme_nav_header_menu_style'] == 3 || $lipi_theme_options['theme_nav_header_menu_style'] == 6 ) { 
			$after_scroll_menu_3_show = 'item-hide';
			$before_scroll_menu_3_show = 'item-block';
		} else {
			$menu_style_hide_1 = $menu_style_show_1 = $after_scroll_menu_3_show = $before_scroll_menu_3_show = '';
		}
		
		
		if( isset( $lipi_theme_options['header-nav-container-global-full-width'] ) && $lipi_theme_options['header-nav-container-global-full-width'] == true ) { 
			echo '<div class="container-fluid wrap-header-call">';
		} else { 
			echo '<div class="container wrap-header-call">';
		}
		
		echo '<i class="fa fa-bars navbar-toggle collapsed"></i>';
			  
			// - Logo
			echo '<div class="logo">
					<a class="logo-anchor" href="'.esc_url( get_home_url('/') ).'" rel="home"><span class="logo-wrapper">'.lipi__theme_logo().'</span></a>
				  </div>';
			
			if( $lipi_theme_options['theme_nav_header_menu_style'] == 3 || $lipi_theme_options['theme_nav_header_menu_style'] == 6 ) {
				echo '<div class="nav_style_3_icon_text">';	
					if ( is_active_sidebar( 'header-icon-with-text-widget' ) ) : 
							dynamic_sidebar( 'header-icon-with-text-widget' ); 
					endif;
				echo '</div>';		 	 
			}
			
			$is_plugin_active = lipi__plugin_active('ReduxFramework');
			if($is_plugin_active == false){ 
				
				// - Menu Content
				echo '<div class="navigation-section">';
						 echo '<div class="recall-hamburger '.$after_scroll_menu_3_show.'">';
							 // - shop
							 echo '<div class="bind_woo_menu_cart">';
									if ( is_active_sidebar( 'woocommerce-widgetnav-1' ) ) : 
										dynamic_sidebar( 'woocommerce-widgetnav-1' ); 
									endif;
							 echo '</div>';
							 
							 echo '<div class="theme_header_menu_social">';
								if ( is_active_sidebar( 'header-social-widgetnav-1' ) ) : 
									dynamic_sidebar( 'header-social-widgetnav-1' ); 
								endif;
							 echo '</div>';
							 
							 // - nav
							 if ( has_nav_menu( 'primary' ) ) { 
									wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'site-header-category-links menu-collapse',  'walker' => new lipi__menu_walker() )); 	
							 }
						 echo '</div>';	// eof recall-hamburger		
				 echo '</div>'; // eof Menu Content
				
			} else {
			
			if( $lipi_theme_options['theme_nav_header_menu_style'] == 1 || 
			$lipi_theme_options['theme_nav_header_menu_style'] == 2 || 
			$lipi_theme_options['theme_nav_header_menu_style'] == 4 ||
			$lipi_theme_options['theme_nav_header_menu_style'] == 5 ||
			$lipi_theme_options['theme_nav_header_menu_style'] == 7 ||
			$lipi_theme_options['theme_nav_header_menu_style'] == 8 
			) {	  
			// - Menu Content
			echo '<div class="navigation-section">';
					 // - hamburger
					 lipi__hamburger_menu_control();
		             // - recall hamburger
					 echo '<div class="recall-hamburger '.$after_scroll_menu_3_show.'">';
						 // - shop
						 echo '<div class="bind_woo_menu_cart">';
								if ( is_active_sidebar( 'woocommerce-widgetnav-1' ) ) : 
									dynamic_sidebar( 'woocommerce-widgetnav-1' ); 
								endif;
						 echo '</div>';
						 
						 echo '<div class="theme_header_menu_social">';
							if ( is_active_sidebar( 'header-social-widgetnav-1' ) ) : 
								dynamic_sidebar( 'header-social-widgetnav-1' ); 
							endif;
						 echo '</div>';
						 
						 // - nav
						 if ( has_nav_menu( 'primary' ) ) { 
								wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'site-header-category-links menu-collapse',  'walker' => new lipi__menu_walker() )); 	
						 }
			         echo '</div>';	// eof recall-hamburger		
			 echo '</div>'; // eof Menu Content
			}
			
		}
			 
			 
		echo '</div>'; // eof container
		
		// -- MENU STYLE 3
		if( $lipi_theme_options['theme_nav_header_menu_style'] == 3 || $lipi_theme_options['theme_nav_header_menu_style'] == 6 ) {
			echo '<div class="special-apperance-menu '.$before_scroll_menu_3_show.'">';
			if( isset( $lipi_theme_options['header-nav-container-global-full-width'] ) && $lipi_theme_options['header-nav-container-global-full-width'] == true ) {
				echo '<div class="container full-width">';
			} else { 
				echo '<div class="container">';
			}
			echo '<div class="special-apperance-menu-inner">';
					echo '<div class="bind_woo_menu_cart">';
						if ( is_active_sidebar( 'woocommerce-widgetnav-1' ) ) : 
							dynamic_sidebar( 'woocommerce-widgetnav-1' ); 
						endif; 
					echo '</div>';
					
					echo '<div class="theme_header_menu_social">';
						if ( is_active_sidebar( 'header-social-widgetnav-1' ) ) : 
							dynamic_sidebar( 'header-social-widgetnav-1' ); 
						endif;
					echo '</div>';
					
					if ( has_nav_menu( 'primary' ) ) { 
						wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'site-header-category-links menu-collapse',  'walker' => new lipi__menu_walker() )); 	
					}
			  echo '</div>';
			  echo '</div>';
			  echo '</div>';
		} // eof nav style 3
		
	}
}

/*-----------------------------------------------------------------------------------*/
/*	HEX 2 RGB :: COLOUR CODE
/*-----------------------------------------------------------------------------------*/ 
if (!function_exists('lipi__hex2rgb')) {
	function lipi__hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   return $rgb; // returns an array with the rgb values
	}
}


/*-----------------------------------------------------------------------------------*/
/*	CHECK PLUGIN EXIST USING CLASS NAME
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__plugin_active')) {
	function lipi__plugin_active($class_name) {
		if( class_exists($class_name) ) {
			return true;
		} else {
			return false;	
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	CHECK PLUGIN EXIST USING FUNCATION NAME
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__chkfunction_plugin_active')) {
	function lipi__chkfunction_plugin_active($function_name) {
		if( function_exists($function_name) ) {
			return true;
		} else {
			return false;	
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	WEBSITE DISIGN
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__website_global_design_control')) {
	function lipi__website_global_design_control() {
		global $lipi_theme_options;
		if( isset($lipi_theme_options['website_box_layout']) && $lipi_theme_options['website_box_layout'] == true ) {
			$return = 'boxed_layout';
		} else {
			$return = '';
		}
		return $return;
	}
}

if (!function_exists('lipi__website_global_full_width_design_control')) {
	function lipi__website_global_full_width_design_control() {
		global $lipi_theme_options;
		if( isset( $lipi_theme_options['site-body-container-global-full-width'] ) && $lipi_theme_options['site-body-container-global-full-width'] == true ) {
			return 'container-fluid';
		} else {
			return 'container';
		}   
		return $return;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	USER ACCESS CONTROL
/*-----------------------------------------------------------------------------------*/
if (!function_exists('lipi__useraccesslevel')) {
	function lipi__useraccesslevel($check_user_role) {
		if ( is_user_logged_in() &&  $check_user_role != '' && !is_super_admin() ) {  
			$value = '';
			$check_roles = unserialize($check_user_role);
			$current_user = wp_get_current_user();
			$wp_role = $current_user->roles;
			foreach ($wp_role as $role_value => $role_name) {
				if ( in_array($role_name, $check_roles) ) {
					$value = 1;
				} else {
					continue;	
				}
			}
			if( $value == 1 ) return true;
			else return false;
		}
		return true;
	}
}
?>
