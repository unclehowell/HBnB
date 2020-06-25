<?php
/**
 * Plugin Name: Responsive Grid Shortcode
 * Plugin URI: http://justin-greer.com
 * Version: 1.2
 * Description: Crazy simple and light weight plugin for using shortcode to create a responsive grid.
 * Author: justingreerbbi
 * Author URI: http://justin-greer.com
 * License: GPL2
 *
 * This program is GLP but; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of.
 */
function rgs_grid_wrapper_shortcode( $params, $content = "" ) {
    $params = shortcode_atts( array(
        'class' => 'rgs-section',
    ), $params, 'grid_section' );

    $output = '<div class="rgs_section rgs_group '.$params['class'].'">';
    $output .= do_shortcode( shortcode_unautop( $content ) );
    $output .= '</div>';
    return $output;
}
add_shortcode( 'grid_section', 'rgs_grid_wrapper_shortcode' );

function rgs_grid_col_shortcode( $params, $content = "" ) {
    $params = shortcode_atts( array(
        'size' => '6',
        'class' => 'rgs-col',
    ), $params, 'grid_col' );
    $output = '<div class="rgs_col span_'.$params['size'].'_of_12">';
    $output .= do_shortcode( shortcode_unautop( $content ) );
    $output .= '</div>';
    return $output;
}
add_shortcode( 'grid_col', 'rgs_grid_col_shortcode' );

function rgs_styles_load() {
    wp_enqueue_style( 'responsive-grid-shortcode', plugins_url('css/grid.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'rgs_styles_load' );

// Don't get run over.
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);