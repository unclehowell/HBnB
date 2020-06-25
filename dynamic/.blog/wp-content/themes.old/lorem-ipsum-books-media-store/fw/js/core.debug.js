/**
 * Lorem Ipsum Books & Media Store Framework: Debug utilities
 *
 * @package	lorem_ipsum_books_media_store
 * @since	lorem_ipsum_books_media_store 1.0
 */


function lorem_ipsum_books_media_store_debug_object(obj) {
	"use strict";
	var html = arguments[1] ? arguments[1] : false;				// Tags decorate
	var recursive = arguments[2] ? arguments[2] : false;		// Show inner objects (arrays)
	var showMethods = arguments[3] ? arguments[3] : false;		// Show object's methods
	var level = arguments[4] ? arguments[4] : 0;				// Nesting level (for internal usage only)
	var dispStr = "";
	var addStr = "";
	if (level>0) {
		dispStr += (obj===null ? "null" : typeof(obj)) + (html ? "\n<br />" : "\n");
		addStr = lorem_ipsum_books_media_store_replicate(html ? '&nbsp;' : ' ', level*2);
	}
	if (obj!==null) {
		for (var prop in obj) {
			if (!showMethods && typeof(obj[prop])=='function')	// || prop=='innerHTML' || prop=='outerHTML' || prop=='innerText' || prop=='outerText')
				continue;
			if (recursive && (typeof(obj[prop])=='object' || typeof(obj[prop])=='array') && obj[prop]!=obj)
				dispStr += addStr + (html ? "<b>" : "")+prop+(html ? "</b>" : "")+'='+lorem_ipsum_books_media_store_debug_object(obj[prop], html, recursive, showMethods, level+1);
			else
				dispStr += addStr + (html ? "<b>" : "")+prop+(html ? "</b>" : "")+'='+(typeof(obj[prop])=='string' ? '"' : '')+obj[prop]+(typeof(obj[prop])=='string' ? '"' : '')+(html ? "\n<br />" : "\n");
		}
	}
	return dispStr;	//decodeURI(dispStr);
}

function lorem_ipsum_books_media_store_debug_log(s) {
	if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['user_logged_in']) {
		if (jQuery('.debug_log').length == 0) {
			jQuery('body').append('<pre class="debug_log"><span class="debug_log_close" onclick="jQuery(\'.debug_log\').hide();">x</span></pre>'); 
		}
		jQuery('.debug_log').append('<br>'+s);
		jQuery('.debug_log').show();
	}
}

if (window.dcl===undefined) function dcl(s) { console.log(s); }
if (window.dco===undefined) function dco(s,r) { console.log(lorem_ipsum_books_media_store_debug_object(s,false,r)); }
if (window.dal===undefined) function dal(s) { if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['user_logged_in']) alert(s); }
if (window.dao===undefined) function dao(s,h,r) { if (LOREM_IPSUM_BOOKS_MEDIA_STORE_STORAGE['user_logged_in']) alert(lorem_ipsum_books_media_store_debug_object(s,h,r)); }
if (window.ddl===undefined) function ddl(s) { lorem_ipsum_books_media_store_debug_log(s); }
if (window.ddo===undefined) function ddo(s,h,r) { lorem_ipsum_books_media_store_debug_log(lorem_ipsum_books_media_store_debug_object(s,h,r)); }
