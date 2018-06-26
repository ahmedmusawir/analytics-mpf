jQuery(document).ready(function($) {

	// alert('working');

	// $('body').prepend("WTF is the internet");
	$( 'body' ).prepend("<script><?php do_action('after_body'); ?></script>");
	
});