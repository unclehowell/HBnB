<?php
/**
 * Lorem Ipsum Books & Media Store Framework: strings manipulations
 *
 * @package	lorem_ipsum_books_media_store
 * @since	lorem_ipsum_books_media_store 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Check multibyte functions
if ( ! defined( 'LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE' ) ) define( 'LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE', function_exists('mb_strpos') ? 'UTF-8' : false );

if (!function_exists('lorem_ipsum_books_media_store_strlen')) {
	function lorem_ipsum_books_media_store_strlen($text) {
		return LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE ? mb_strlen($text) : strlen($text);
	}
}

if (!function_exists('lorem_ipsum_books_media_store_strpos')) {
	function lorem_ipsum_books_media_store_strpos($text, $char, $from=0) {
		return LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE ? mb_strpos($text, $char, $from) : strpos($text, $char, $from);
	}
}

if (!function_exists('lorem_ipsum_books_media_store_strrpos')) {
	function lorem_ipsum_books_media_store_strrpos($text, $char, $from=0) {
		return LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE ? mb_strrpos($text, $char, $from) : strrpos($text, $char, $from);
	}
}

if (!function_exists('lorem_ipsum_books_media_store_substr')) {
	function lorem_ipsum_books_media_store_substr($text, $from, $len=-999999) {
		if ($len==-999999) { 
			if ($from < 0)
				$len = -$from; 
			else
				$len = lorem_ipsum_books_media_store_strlen($text)-$from;
		}
		return LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE ? mb_substr($text, $from, $len) : substr($text, $from, $len);
	}
}

if (!function_exists('lorem_ipsum_books_media_store_strtolower')) {
	function lorem_ipsum_books_media_store_strtolower($text) {
		return LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE ? mb_strtolower($text) : strtolower($text);
	}
}

if (!function_exists('lorem_ipsum_books_media_store_strtoupper')) {
	function lorem_ipsum_books_media_store_strtoupper($text) {
		return LOREM_IPSUM_BOOKS_MEDIA_STORE_MULTIBYTE ? mb_strtoupper($text) : strtoupper($text);
	}
}

if (!function_exists('lorem_ipsum_books_media_store_strtoproper')) {
	function lorem_ipsum_books_media_store_strtoproper($text) { 
		$rez = ''; $last = ' ';
		for ($i=0; $i<lorem_ipsum_books_media_store_strlen($text); $i++) {
			$ch = lorem_ipsum_books_media_store_substr($text, $i, 1);
			$rez .= lorem_ipsum_books_media_store_strpos(' .,:;?!()[]{}+=', $last)!==false ? lorem_ipsum_books_media_store_strtoupper($ch) : lorem_ipsum_books_media_store_strtolower($ch);
			$last = $ch;
		}
		return $rez;
	}
}

if (!function_exists('lorem_ipsum_books_media_store_strrepeat')) {
	function lorem_ipsum_books_media_store_strrepeat($str, $n) {
		$rez = '';
		for ($i=0; $i<$n; $i++)
			$rez .= $str;
		return $rez;
	}
}

if (!function_exists('lorem_ipsum_books_media_store_strshort')) {
	function lorem_ipsum_books_media_store_strshort($str, $maxlength, $add='...') {
		if ($maxlength < 0) 
			return $str;
		if ($maxlength == 0) 
			return '';
		if ($maxlength >= lorem_ipsum_books_media_store_strlen($str)) 
			return strip_tags($str);
		$str = lorem_ipsum_books_media_store_substr(strip_tags($str), 0, $maxlength - lorem_ipsum_books_media_store_strlen($add));
		$ch = lorem_ipsum_books_media_store_substr($str, $maxlength - lorem_ipsum_books_media_store_strlen($add), 1);
		if ($ch != ' ') {
			for ($i = lorem_ipsum_books_media_store_strlen($str) - 1; $i > 0; $i--)
				if (lorem_ipsum_books_media_store_substr($str, $i, 1) == ' ') break;
			$str = trim(lorem_ipsum_books_media_store_substr($str, 0, $i));
		}
		if (!empty($str) && lorem_ipsum_books_media_store_strpos(',.:;-', lorem_ipsum_books_media_store_substr($str, -1))!==false) $str = lorem_ipsum_books_media_store_substr($str, 0, -1);
		return ($str) . ($add);
	}
}

// Clear string from spaces, line breaks and tags (only around text)
if (!function_exists('lorem_ipsum_books_media_store_strclear')) {
	function lorem_ipsum_books_media_store_strclear($text, $tags=array()) {
		if (empty($text)) return $text;
		if (!is_array($tags)) {
			if ($tags != '')
				$tags = explode($tags, ',');
			else
				$tags = array();
		}
		$text = trim(chop($text));
		if (is_array($tags) && count($tags) > 0) {
			foreach ($tags as $tag) {
				$open  = '<'.esc_attr($tag);
				$close = '</'.esc_attr($tag).'>';
				if (lorem_ipsum_books_media_store_substr($text, 0, lorem_ipsum_books_media_store_strlen($open))==$open) {
					$pos = lorem_ipsum_books_media_store_strpos($text, '>');
					if ($pos!==false) $text = lorem_ipsum_books_media_store_substr($text, $pos+1);
				}
				if (lorem_ipsum_books_media_store_substr($text, -lorem_ipsum_books_media_store_strlen($close))==$close) $text = lorem_ipsum_books_media_store_substr($text, 0, lorem_ipsum_books_media_store_strlen($text) - lorem_ipsum_books_media_store_strlen($close));
				$text = trim(chop($text));
			}
		}
		return $text;
	}
}

// Return slug for the any title string
if (!function_exists('lorem_ipsum_books_media_store_get_slug')) {
	function lorem_ipsum_books_media_store_get_slug($title) {
		return lorem_ipsum_books_media_store_strtolower(str_replace(array('\\','/','-',' ','.'), '_', $title));
	}
}

// Replace macros in the string
if (!function_exists('lorem_ipsum_books_media_store_strmacros')) {
	function lorem_ipsum_books_media_store_strmacros($str) {
		return str_replace(array("{{", "}}", "((", "))", "||"), array("<i>", "</i>", "<b>", "</b>", "<br>"), $str);
	}
}

// Unserialize string (try replace \n with \r\n)
if (!function_exists('lorem_ipsum_books_media_store_unserialize')) {
	function lorem_ipsum_books_media_store_unserialize($str) {
		if ( is_serialized($str) ) {
			try {
				$data = unserialize($str);
			} catch (Exception $e) {
				dcl($e->getMessage());
				$data = false;
			}
			if ($data===false) {
				try {
					$data = @unserialize(str_replace("\n", "\r\n", $str));
				} catch (Exception $e) {
					dcl($e->getMessage());
					$data = false;
				}
			}
			return $data;
		} else
			return $str;
	}
}
?>