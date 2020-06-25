<?php
/**
 * Lorem Ipsum Books & Media Store Framework: theme variables storage
 *
 * @package	lorem_ipsum_books_media_store
 * @since	lorem_ipsum_books_media_store 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('lorem_ipsum_books_media_store_storage_get')) {
	function lorem_ipsum_books_media_store_storage_get($var_name, $default='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		return isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]) ? $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('lorem_ipsum_books_media_store_storage_set')) {
	function lorem_ipsum_books_media_store_storage_set($var_name, $value) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('lorem_ipsum_books_media_store_storage_empty')) {
	function lorem_ipsum_books_media_store_storage_empty($var_name, $key='', $key2='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key]);
		else
			return empty($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('lorem_ipsum_books_media_store_storage_isset')) {
	function lorem_ipsum_books_media_store_storage_isset($var_name, $key='', $key2='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key]);
		else
			return isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('lorem_ipsum_books_media_store_storage_inc')) {
	function lorem_ipsum_books_media_store_storage_inc($var_name, $value=1) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (empty($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = 0;
		$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('lorem_ipsum_books_media_store_storage_concat')) {
	function lorem_ipsum_books_media_store_storage_concat($var_name, $value) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (empty($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = '';
		$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('lorem_ipsum_books_media_store_storage_get_array')) {
	function lorem_ipsum_books_media_store_storage_get_array($var_name, $key, $key2='', $default='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key]) ? $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key][$key2]) ? $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('lorem_ipsum_books_media_store_storage_set_array')) {
	function lorem_ipsum_books_media_store_storage_set_array($var_name, $key, $value) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = array();
		if ($key==='')
			$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][] = $value;
		else
			$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('lorem_ipsum_books_media_store_storage_set_array2')) {
	function lorem_ipsum_books_media_store_storage_set_array2($var_name, $key, $key2, $value) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = array();
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key][] = $value;
		else
			$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Add array element after the key
if (!function_exists('lorem_ipsum_books_media_store_storage_set_array_after')) {
	function lorem_ipsum_books_media_store_storage_set_array_after($var_name, $after, $key, $value='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = array();
		if (is_array($key))
			lorem_ipsum_books_media_store_array_insert_after($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name], $after, $key);
		else
			lorem_ipsum_books_media_store_array_insert_after($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('lorem_ipsum_books_media_store_storage_set_array_before')) {
	function lorem_ipsum_books_media_store_storage_set_array_before($var_name, $before, $key, $value='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = array();
		if (is_array($key))
			lorem_ipsum_books_media_store_array_insert_before($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name], $before, $key);
		else
			lorem_ipsum_books_media_store_array_insert_before($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('lorem_ipsum_books_media_store_storage_push_array')) {
	function lorem_ipsum_books_media_store_storage_push_array($var_name, $key, $value) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name], $value);
		else {
			if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] = array();
			array_push($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('lorem_ipsum_books_media_store_storage_pop_array')) {
	function lorem_ipsum_books_media_store_storage_pop_array($var_name, $key='', $defa='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]) && is_array($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]) && count($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]) > 0) 
				$rez = array_pop($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]);
		} else {
			if (isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key]) && is_array($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key]) && count($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('lorem_ipsum_books_media_store_storage_inc_array')) {
	function lorem_ipsum_books_media_store_storage_inc_array($var_name, $key, $value=1) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = array();
		if (empty($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] = 0;
		$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('lorem_ipsum_books_media_store_storage_concat_array')) {
	function lorem_ipsum_books_media_store_storage_concat_array($var_name, $key, $value) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if (!isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name] = array();
		if (empty($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key])) $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] = '';
		$LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('lorem_ipsum_books_media_store_storage_call_obj_method')) {
	function lorem_ipsum_books_media_store_storage_call_obj_method($var_name, $method, $param=null) {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]) ? $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]) ? $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('lorem_ipsum_books_media_store_storage_get_obj_property')) {
	function lorem_ipsum_books_media_store_storage_get_obj_property($var_name, $prop, $default='') {
		global $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]->$prop) ? $LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE[$var_name]->$prop : $default;
	}
}
?>