<?php
$args = array(
    "title"        => "",
    "price"        => "",
    "price_color"  => "",
    "price_weight" => "",
    "price_size"   => "",
    "currency"     => "",
    "price_period" => "",
	"link"         => "",
	"active"       => "",
	"standout_border_color" => "",
	"standout_border_no_shadow" => "",
	"background_color"  => "",
	"box_border_color"  => "",
	"text_color"  => "",
	"buttom_color"  => "",
	"buttom_color_custom"  => "",
	"buttom_text_color_custom"  => "",
	"title_tag" => "h4",
);
extract(shortcode_atts($args, $atts));

$standout_border_shadow_no = $btm_new_css = '';

$link = (function_exists("vc_build_link") ? vc_build_link($link) : $link);
if( isset($link['target']) && $link['target'] != ''  ) { 
	$add_parm = 'target="_blank"';
} else { 
	$add_parm = '';
}

if( $buttom_color == 'custom-button' ) {
	$time_start = microtime(true);
	$time_start = explode(".", $time_start);
	echo '<style>.vc_btm_'.$time_start[1].' { background-color:'.$buttom_color_custom.'; color:'.$buttom_text_color_custom.'; }</style>';
	$btm_new_css = 'vc_btm_'.$time_start[1];
}

if( isset($link['title']) && $link['title'] != '' ) {
	$link_html = '<div class="pricing-action"> <a href="'.$link['url'].'" class="custom-botton '.$btm_new_css.' " '.$add_parm .'>'.$link['title'].'</a> </div>';
} else {
	$link_html = '';
}

if( $active == 'yes' ) {
	$standout = 'standout';
	$standout_border_color = 'background-color:'.$standout_border_color.';';
	if( $standout_border_no_shadow == true ) $standout_border_shadow_no = 'box-shadow:none;';
} else {
	$standout = $standout_border_color = $standout_border_shadow_no = '';
}

$pricetablecss__text_color = $pricetablecss__background_color = $pricetablecss__box_border_color = $pricetablecss__price_color = $pricetablecss__price_weight = $pricetablecss__price_size = '';
if( isset($text_color) && $text_color != '' ) {
	$pricetablecss__text_color = 'color:'.$text_color.'!important;';
}
if( isset($background_color) && $background_color != '' ) {
	$pricetablecss__background_color = 'background:'.$background_color.';';
}
if( isset($box_border_color) && $box_border_color != '' ) {
	$pricetablecss__box_border_color = 'border-color:'.$box_border_color.';';
}
//price
if( isset($price_color) && $price_color != '' ) {
	$pricetablecss__price_color = 'color:'.$price_color.';';
}
if( isset($price_weight) && $price_weight != '' ) {
	$pricetablecss__price_weight = 'font-weight:'.$price_weight.';';
}
if( isset($price_size) && $price_size != '' ) {
	$pricetablecss__price_size = 'font-size:'.$price_size.';';
}

echo '<div class="service_table_holder pricing-table '.$standout.' hvr-float" style=" '.$pricetablecss__text_color.' '.$standout_border_color.' '.$standout_border_shadow_no.'">
  <ul class="service_table_inner" style=" '.$pricetablecss__background_color.' '.$pricetablecss__box_border_color.' ">
    <li class="service_table_title_holder">
      <'.$title_tag.' style=" '.$pricetablecss__text_color.' ">'.$title.'</'.$title_tag.'>
	  <div class="price_in_table">
		  <sup class="value">'.$currency.'</sup>
		  <span class="price" style=" '.$pricetablecss__price_color.' '.$pricetablecss__price_weight.' '.$pricetablecss__price_size.' ">'.$price.'</span>
		  <span class="mark">'.$price_period.'</span>
	  </div>
    </li>
    <li class="service_table_content">
      '.do_shortcode($content).'
      '.$link_html.'
    </li>
  </ul>
</div>';
?>