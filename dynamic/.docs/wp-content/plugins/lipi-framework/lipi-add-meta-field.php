<?php 
/*-----------------------------------------------------------------------------------*/
/*	 KNOWLEDGE BASE - ACCESS CONTROL
/*-----------------------------------------------------------------------------------*/
function lipi__kb_postarticleaccess( $post_type, $post ) {
    add_meta_box( 
        'kb-postarticleaccess',
        esc_html__( 'Article Access Control' , 'lipi-framework' ),
        'lipi__kb_postarticleaccess_meta_box',
        'lipi_kb',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'lipi__kb_postarticleaccess', 10, 2 );

function lipi__kb_postarticleaccess_meta_box() {
	global $post; 
	$meta = get_post_meta( $post->ID, 'kb_single_article_access', true );
	$current_value = get_post_meta( $post->ID, 'kb_single_article_user_access', true );
	
	echo '<div style="padding: 15px 10px;">';
	
	// only login users
	echo '<div class="form-field">';
	echo '<input type="checkbox" name="kb_article_access[login]" id="kb_article_access[login]" value="1" ';
	if( isset($meta['login']) && $meta['login'] == 1 ) echo 'checked';
    echo '/>';
    echo '<span><strong>'.esc_html__( 'Allow only login users access' , 'lipi-framework' ).'</strong></span>
          <p class="description">'.esc_html__( 'Only login users can have access' , 'lipi-framework' ).'</p>
          </div><br><br>';
	
	// access level
	echo '<div class="form-field">
          <div><strong>'.esc_html__( 'User Role' , 'lipi-framework' ).'</strong></div>';
		  
	$wp_roles = new WP_Roles();
	$roles = $wp_roles->get_names();
	foreach ($roles as $role_value => $role_name) {
		if ( $current_value != '' && in_array($role_value, $current_value)) $checked = 'checked';
		else $checked = '';
		echo '<p><input type="checkbox" '.$checked.' name="kb_article_user_access['.$role_value.']" id="kb_article_user_access['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
	}
	echo '<p class="description">'.esc_html__( 'Publish Article will limit to above define user roles' , 'lipi-framework' ).'</p></div><br><br>';
	
	// login message
	echo '<div class="form-field"> <span><strong> '. esc_html__( 'Login Message' , 'lipi-framework' ).' </strong></span>';
    echo '<input type="text" name="kb_article_access[message]" id="kb_article_access[message]" value="';
	if(isset($meta['message']) && $meta['message'] != '' ) echo esc_html($meta['message']); 
    echo '" />';
    echo '</div><br>';
	
	echo '</div>'; // eof div 
}

function lipi__kbsinglearticle_save( $post_id ) {  
	if( isset($_POST['kb_article_access']) )  update_post_meta( $post_id, 'kb_single_article_access', $_POST['kb_article_access'] );
	if ( isset( $_POST['kb_article_user_access'] ) && $_POST['kb_article_user_access'] != '' ) {           
        update_post_meta( $post_id, 'kb_single_article_user_access', $_POST['kb_article_user_access']);
    } else {
        update_post_meta( $post_id, 'kb_single_article_user_access', '');
	}
}
add_action( 'save_post', 'lipi__kbsinglearticle_save' );

?>