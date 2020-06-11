<?php
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
	"kb_x_loop_category_records" => "1",
), $atts ) );


if( isset($root_tag_li_padding) && $root_tag_li_padding != '' ) $root_tag_li_padding = 'padding:'.$root_tag_li_padding.';';
else $root_tag_li_padding = '';

if( isset($root_tag_color) && $root_tag_color != '' ) $root_tag_color = 'background:'.$root_tag_color.';';
else $root_tag_color = '';

if( isset($border_radius) && $border_radius != '' ) $border_radius = 'border-radius:'.$border_radius.';';
else $border_radius = '';

$return = '';
$return .= '<div class="col-md-4 col-sm-12 kb-tree-viewmenu-col-wrap-menu">';
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
	
if( $i == $kb_x_loop_category_records ) { 
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
						$return .='<li class="kb_tree_title kb_contentcall_ajx">';
						$return .='<i class="arrow_carrot-right"></i> <a href="'.get_permalink($kbchildpost->ID).'" rel="'.$kbchildpost->ID.'" class="kb_tree_title">'; // 
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
						$return .='<li class="kb_tree_title kb_contentcall_ajx">';
						$return .='<i class="arrow_carrot-right"></i> <a href="'.get_permalink($kbpost_list->ID).'" rel="'.$kbpost_list->ID.'" >'; //
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
$return .= '</div>'; // eof colum tree menu
$return .= '<div class="kb-ajax-load-container col-md-8 col-sm-12 kb-tree-viewmenu-col-wrap-menu-ajx-load">';
$return .= do_shortcode($content);
$return .= '</div>';
echo ''.$return;
?>