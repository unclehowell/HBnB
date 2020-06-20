jQuery(document).ready(function() { 

	"use strict";

	
	/******
	META BOX SHOW HIDE POST FORMAT :: QUOTE
	********/
	if ( jQuery("#post-format-quote").is(":checked") ) { 
		jQuery( "#blog_admin_post_format_quote" ).removeClass( "hidden" );   
	} else {  
		jQuery( "#blog_admin_post_format_quote" ).addClass( "hidden" );	
	}
	jQuery( "input#post-format-quote" ).change( function() {
        if( jQuery(this).is(':checked') ){
            jQuery( "#blog_admin_post_format_quote" ).removeClass( "hidden" );
			jQuery( "#blog_admin_post_format_audio" ).addClass( "hidden" );
			jQuery( "#blog_admin_post_format_link" ).addClass( "hidden" );
        }
    } );
	
	
	/******
	META BOX SHOW HIDE POST FORMAT :: AUDIO
	********/
	if ( jQuery("#post-format-audio").is(":checked") ) { 
		jQuery( "#blog_admin_post_format_audio" ).removeClass( "hidden" );   
	} else {  
		jQuery( "#blog_admin_post_format_audio" ).addClass( "hidden" );	
	}
	jQuery( "input#post-format-audio" ).change( function() {
        if( jQuery(this).is(':checked') ){
            jQuery( "#blog_admin_post_format_audio" ).removeClass( "hidden" );
			jQuery( "#blog_admin_post_format_quote" ).addClass( "hidden" );
			jQuery( "#blog_admin_post_format_link" ).addClass( "hidden" );
        }
    } );
	
	
	
	/******
	META BOX SHOW HIDE POST FORMAT :: LINK
	********/
	if ( jQuery("#post-format-link").is(":checked") ) { 
		jQuery( "#blog_admin_post_format_link" ).removeClass( "hidden" );   
	} else {  
		jQuery( "#blog_admin_post_format_link" ).addClass( "hidden" );	
	}
	jQuery( "input#post-format-link" ).change( function() {
        if( jQuery(this).is(':checked') ){
            jQuery( "#blog_admin_post_format_link" ).removeClass( "hidden" );
			jQuery( "#blog_admin_post_format_quote" ).addClass( "hidden" );
			jQuery( "#blog_admin_post_format_audio" ).addClass( "hidden" );
        }
    } );
	
	
	/******
	META BOX SHOW HIDE POST FORMAT :: IMAGE, STANDARD, GALLERY
	********/
	jQuery( "input#post-format-image, input#post-format-0, input#post-format-gallery, #post-format-video" ).change( function() {
        if( jQuery(this).is(':checked') ){
            jQuery( "#blog_admin_post_format_audio" ).addClass( "hidden" );
			jQuery( "#blog_admin_post_format_quote" ).addClass( "hidden" );
			jQuery( "#blog_admin_post_format_link" ).addClass( "hidden" );
        }
    } );
	
	
	
});