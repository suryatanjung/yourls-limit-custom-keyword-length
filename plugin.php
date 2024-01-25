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
