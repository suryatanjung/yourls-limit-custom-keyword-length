<?php
/*
Plugin Name: Limit Custom Keyword Length
Plugin URI: https://github.com/suryatanjung/yourls-limit-custom-keyword-length/
Description: This plugin limits the min and max number of characters for custom keyword
Version: 1.0
Author: Surya Tanjung
Author URI: https://jung.bz/
*/

// Hook custom function into the 'shunt_add_new_link' filter
yourls_add_filter( 'shunt_add_new_link', 'limit_keyword_length' );

// Check custom keyword length and return an error if it exceeds the max or min length limit
function limit_keyword_length( $error, $url, $keyword ) {
	$max_length = 30; // Set max length limit for custom keyword
	$min_length = 3; // Set min length limit for custom keyword
	$length = strlen( $keyword );

	if ( $length > $max_length || ( $length < $min_length && $length > 0 ) ) {
		$error['status']  = 'fail';
		$error['code']    = 'error:keyword';
		$error['message'] = ( $length > $max_length )
			? "the keyword is too long. It can't be more than {$max_length} characters"
			: "the keyword is too short. It needs to have at least {$min_length} characters";
		return yourls_apply_filter( 'add_new_link_keyword_length_error', $error );
	}

	return false;
}
