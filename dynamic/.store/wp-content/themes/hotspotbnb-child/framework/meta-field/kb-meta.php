<?php
/*-----------------------------------------------------------------------------------*/
/*	 KNOWLEDGE BASE 
/*-----------------------------------------------------------------------------------*/

add_action( 'cmb2_admin_init', 'lipi__kb_attachment' );
function lipi__kb_attachment() {

    $prefix = '__lipi_';

    $cmb = new_cmb2_box( array(
        'id'            => 'page_kb_attachment',
        'title'         => esc_html__( 'Attached Files', 'lipi' ),
        'object_types'  => array( 'lipi_kb', ), 
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );
	
	$cmb->add_field( array(
	    'name'    => esc_html__( 'Allow attached files access to only login users', 'lipi' ),
		'id'      => $prefix.'attachement_access_status',
		'desc' => 'If checked only login users can download attachment',
		'type'    => 'checkbox',
	) );

	$cmb->add_field( array(
	    'name'    => esc_html__( 'Login Message', 'lipi' ),
		'desc' => 'Your short description',
		'id'      => $prefix.'attachement_access_login_msg',
		'type'    => 'text',
	) );

	$bind_attachment_field_id = $cmb->add_field( array(
		'id'          => $prefix.'page_kb_group',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => esc_html__( 'File {#}', 'lipi' ), 
			'add_button'    => esc_html__( 'Add Another File', 'lipi' ),
			'remove_button' => esc_html__( 'Remove Add File', 'lipi' ),
			'sortable'      => true, // beta
			'closed'        => true, // true to have the groups closed by default
		),
	) );
	
	$cmb->add_group_field( $bind_attachment_field_id, array(
		'name' => esc_html__( 'Upload Files/Image', 'lipi' ), 
		'id'   => 'image',
		'type' => 'file',
	) );

}


/*-----------------------------------------------------------------------------------*/
/*	ADD FIELDS TO KNOWLEDGE BASE CATEGORY
/*-----------------------------------------------------------------------------------*/

/** ADD CUSTOM FIELD To Category Form */
add_action( 'lipikbcat_add_form_fields', 'lipi__kb_category_field_add', 10 );
add_action( 'lipikbcat_edit_form_fields', 'lipi__kb_category_field_edit', 10, 2 );

function lipi__kb_category_field_add( $taxonomy ) {
	global $wp_roles;
	echo '<label for="tag-description">Icon Name</label>';
	echo '<input type="text" name="kb_cat_icon_name" id="kb_cat_icon_name" size="40" />';
	echo '<p>Custom icon that will appear before category name</p>';
	echo '<p class="cmb2-metabox-description">Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name</p>';
	echo '<br>';
	// Control User Access
	echo '<label for="tag-description" style="color:#0cc124;font-weight:bold;">Make Category PRIVATE</label>';
	echo '<input type="checkbox" name="kb_cat_check_login" id="kb_cat_check_login" value="1" />';
	echo '<p>Only login users can have access, to this category</p>';
	echo '<br>';
	// Control User Access By Role
	echo '<label for="tag-description">Allow Category Access, BY USER ROLE</label>';
	$wp_roles = new WP_Roles();
    $roles = $wp_roles->get_names();
    foreach ($roles as $role_value => $role_name) {
        echo '<p><input type="checkbox" name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
    }
	echo '<br>';
	// Login Message
	echo '<label for="tag-description">Login Message</label>';
	echo '<input type="text" name="kb_cat_login_message" id="kb_cat_login_message" size="50" />';
	echo '<p>Appear inside login box</p>';
	echo '<br>';
}

function lipi__kb_category_field_edit( $tag, $taxonomy ) {
	global $wp_roles;
	$option_name = 'kb_cat_check_login_' . $tag->term_id;
    $category_custom_order = get_option( $option_name );
	
	$option_role = 'kb_cat_user_role_' . $tag->term_id;
    $accessby_user_role = get_option( $option_role );
	
	$icon_name = 'kb_cat_icon_name_' . $tag->term_id;
    $icon_name_code = get_option( $icon_name );
	
	$option_name_msg = 'kb_cat_login_message_' . $tag->term_id;
    $category_custom_login_message = get_option( $option_name_msg );
	
	echo '<tr class="form-field">
		  <th scope="row" valign="top"><label for="category_custom_order">Icon Name</label></th>
		  <td>
			<input type="text" name="kb_cat_icon_name" id="kb_cat_icon_name" size="40" value="'.$icon_name_code.'" />
			<span class="description">Custom icon that will appear before category name</span>
			<p class="cmb2-metabox-description">Enter <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">fontawesome</a> name (eg: fa fa-file-o) -OR- <br>Enter <a href="https://www.elegantthemes.com/blog/resources/elegant-icon-font" target="_blank">elegant icon font</a> name -OR- <br>Enter <a href="http://demo.wpsmartapps.com/themes/manual/et-line-font/" target="_blank">et line font</a> name</p>
		  </td>
		</tr>';
	// Control User Access
	echo '<tr class="form-field">
		  <th scope="row" valign="top"><label for="category_custom_order" style="color:#0cc124;font-weight:bold;">Make Category PRIVATE</label></th>
		  <td>
		  <input type="checkbox" name="kb_cat_check_login" id="kb_cat_check_login" value="1" '. (esc_attr( $category_custom_order == 1 ) ? 'checked' : '') .' />
		  <p>Only login users can have access, to this category</p>
		  </td>
		</tr>';
	// Control User Access By Role
	echo '<tr class="form-field">
		  <th scope="row" valign="top"><label for="category_user_access">User Role</label></th>
		  <td>';
		$wp_roles = new WP_Roles();
		$roles = $wp_roles->get_names();
		$current_value = unserialize($accessby_user_role);
		foreach ($roles as $role_value => $role_name) {
			if ( $current_value != '' && in_array($role_value, $current_value)) $checked = 'checked';
			else $checked = '';
			echo '<p><input type="checkbox" '.$checked.' name="user_role['.$role_value.']" id="user_role['.$role_value.']" value="' . $role_value . '">'.$role_name.'</p>';
		}
	  echo '</td>
		</tr>';	
	 // login message
	 echo '<tr class="form-field">
	  <th scope="row" valign="top"><label for="category_custom_order">Login Message</label></th>
	  <td>
		<input type="text" name="kb_cat_login_message" id="kb_cat_login_message" value="'.$category_custom_login_message.'" />
		<span class="description">Appear inside login box</span>
	  </td>
	</tr>';
}

/**SAVE CUSTOM FIELD Of Category Form */
add_action( 'created_lipikbcat', 'lipi__kb_category_field_save', 10, 2 ); 
add_action( 'edited_lipikbcat', 'lipi__kb_category_field_save', 10, 2 );

function lipi__kb_category_field_save( $term_id, $tt_id ) {
	
	$option_name = 'kb_cat_check_login_' . $term_id;
	$option_role = 'kb_cat_user_role_' . $term_id;
	$option_login_message = 'kb_cat_icon_name_' . $term_id;
	$option_loginbox_message = 'kb_cat_login_message_' . $term_id;
	
	if ( isset( $_POST['kb_cat_check_login'] ) && $_POST['kb_cat_check_login'] != '' ) {           
        update_option( $option_name, $_POST['kb_cat_check_login'] );
    } else {
        update_option( $option_name, '' );
	}
	
	if ( isset( $_POST['user_role'] ) && $_POST['user_role'] != '' ) {           
        update_option( $option_role, serialize($_POST['user_role']) );
    } else {
        update_option( $option_role, '' );
	}
	
	if ( isset( $_POST['kb_cat_icon_name'] ) && $_POST['kb_cat_icon_name'] != '' ) {           
        update_option( $option_login_message, stripslashes($_POST['kb_cat_icon_name']) );
    } else {
        update_option( $option_login_message, '' );
	}
	
	if ( isset( $_POST['kb_cat_login_message'] ) && $_POST['kb_cat_login_message'] != '' ) {           
        update_option( $option_loginbox_message, stripslashes($_POST['kb_cat_login_message']) );
    } else {
        update_option( $option_loginbox_message, '' );
	}
}

?>