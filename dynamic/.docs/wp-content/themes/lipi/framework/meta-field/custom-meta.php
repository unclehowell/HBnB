<?php 
/*-----------------------------------------------------------------------------------*/
/*	META BOX :: TESTIMONIAL BLOCK
/*-----------------------------------------------------------------------------------*/ 
function lipi__testimonial_metaboxes() {

	$prefix = '__lipi_';
	
	$cmb = new_cmb2_box( array(
        'id'            => 'user_testimonial_meta',
        'title'         => esc_html__( 'Testimonial', 'lipi' ),
        'object_types'  => array( 'lipi_testo', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );
	
	$cmb->add_field( array(
	    'name' => esc_html__( 'Image', 'lipi' ), 
		'desc' => 'Upload an image or enter an URL.',
		'id'   => $prefix . 'testimonial_user_image',
		'type' => 'file',
	) );
	
	$cmb->add_field( array(
	    'name' =>  esc_html__( 'Person Name', 'lipi' ),
		'id' => $prefix . 'testimonial_user_name',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
	    'name' =>  esc_html__( 'Person Designation', 'lipi' ),
		'id' => $prefix . 'testimonial_user_designation',
		'type' => 'text',
	) );
	
	$cmb->add_field( array(
	    'name' =>  esc_html__( 'Message', 'lipi' ),
		'desc' => 'The text below the block heading (optional)',
		'id' => $prefix . 'testimonial_user_message',
		'type' => 'wysiwyg',
		'options' => array(	'textarea_rows' => 5, ),
	) );
	

}
add_filter( 'cmb2_admin_init', 'lipi__testimonial_metaboxes' );
?>