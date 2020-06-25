<?php
add_action( 'wp_enqueue_scripts', 'lipi__child_enqueue_styles' );
function lipi__child_enqueue_styles() {
    wp_enqueue_style( 'lipi-style', get_template_directory_uri() . '/style.css' );

}
?>