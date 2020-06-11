<?php
/*-----------------------------------------------------------------------------------*/
/*	Post Impression
/*-----------------------------------------------------------------------------------*/
add_action('wp_ajax_nopriv_post-impression', 'lipi__post_impression');
add_action('wp_ajax_post-impression', 'lipi__post_impression');
function lipi__post_impression()
{  
	// Check for nonce security
    $nonce = esc_attr($_POST['nonce']);
    if ( ! wp_verify_nonce( $nonce, 'lipi-ajax-nonce' ) )
        die ( 'Busted!');
		
	 if(isset($_POST['post_id'])) {
		$post_id = esc_attr($_POST['post_id']);
		$meta_visitors = get_post_meta($post_id, "display_post_impression", true);
		update_post_meta($post_id, "display_post_impression", ++$meta_visitors);
	}
	
	 exit;
}


/*-----------------------------------------------------------------------------------*/
/*	Voting Ajax Call
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_nopriv_post-like', 'lipi__voting_postlike');
add_action('wp_ajax_post-like', 'lipi__voting_postlike');
add_action('wp_ajax_nopriv_post-unlike', 'lipi__voting_postunlike');
add_action('wp_ajax_post-unlike', 'lipi__voting_postunlike');
add_action('wp_ajax_nopriv_post-reset-stats', 'lipi__stats_reset');
add_action('wp_ajax_post-reset-stats', 'lipi__stats_reset');

function lipi__stats_reset() {
	
    // Check for nonce security
    $nonce = esc_attr($_POST['nonce']);
  
    if ( ! wp_verify_nonce( $nonce, 'lipi-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_reset'])) { 
		$post_id = esc_attr($_POST['post_id']);  
		update_post_meta($post_id, "voted_IP", '');
		update_post_meta($post_id, "rating_like_count_post", '');
		update_post_meta($post_id, "rating_unlike_count_post", '');
		update_post_meta($post_id, "display_post_impression", '');
	}
	exit;
}


function lipi__voting_postlike() {
	global $lipi_theme_options;
    // Check for nonce security
    $nonce = esc_attr($_POST['nonce']);
  
    if ( ! wp_verify_nonce( $nonce, 'lipi-ajax-nonce' ) )
        die ( 'Busted!');
	
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = getenv('REMOTE_ADDR');
        $post_id = esc_attr($_POST['post_id']);
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
		if (!empty($meta_IP)) {
			$voted_IP = $meta_IP[0];
		} else {
			$voted_IP = '';
		}
 
        if(!is_array($voted_IP))
            $voted_IP = array();
			// Get votes count for the current post
			$meta_count = get_post_meta($post_id, "rating_like_count_post", true);
 
        // User has already voted ?
        if(!lipi__hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "rating_like_count_post", ++$meta_count);
            // Display count (ie jQuery return value)
            echo esc_attr($meta_count);
        } else {
             echo esc_attr($lipi_theme_options['already-voted-message']);
		}
    }
    exit;
	
}


function lipi__voting_postunlike()
{
	global $lipi_theme_options;
    // Check for nonce security
    $nonce = esc_attr($_POST['nonce']);
  
    if ( ! wp_verify_nonce( $nonce, 'lipi-ajax-nonce' ) )
        die ( 'Busted!');
		
    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = getenv('REMOTE_ADDR');
        $post_id = esc_attr($_POST['post_id']);
        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
		if (!empty($meta_IP)) {
			$voted_IP = $meta_IP[0];
		} else {
			$voted_IP = '';
		}
 
        if(!is_array($voted_IP))
            $voted_IP = array();
			// Get votes count for the current post
			$meta_count = get_post_meta($post_id, "rating_unlike_count_post", true);
 
        // Use has already voted ?
        if(!lipi__hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();
            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "rating_unlike_count_post", ++$meta_count);
            // Display count (ie jQuery return value)
            echo esc_attr($meta_count);
        }
        else {
            echo esc_attr($lipi_theme_options['already-voted-message']);
		}
    }
    exit;
}

$timebeforerevote = 30; // = 30 mins
function lipi__hasAlreadyVoted($post_id)
{
    global $timebeforerevote;
 
    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "voted_IP");
	if (!empty($meta_IP)) {
		$voted_IP = $meta_IP[0];
	} else {
		$voted_IP = '';
	}
     
    if(!is_array($voted_IP))
        $voted_IP = array();
         
    // Retrieve current user IP
    $ip = getenv('REMOTE_ADDR');
     
    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();
         
        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;
             
        return true;
    }
     
    return false;
}


/*-----------------------------------------------------------------------------------*/
/* KB AJAX LOAD CONTENT
/*-----------------------------------------------------------------------------------*/ 
add_action('wp_ajax_nopriv_kb-load-post-ajax', 'lipi__kb_loadcontent_viaajax');
add_action('wp_ajax_kb-load-post-ajax', 'lipi__kb_loadcontent_viaajax');
function lipi__kb_loadcontent_viaajax() {
	global $post;
	if(isset($_POST['post_id'])) {
		$post = get_post($_POST['post_id']);
		helpcenter_kb_ajaxloadcontent($post);
	}
	exit();
}

?>