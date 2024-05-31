<?php
/*
Plugin Name: Limit Custom Keyword Length
Plugin URI: https://github.com/suryatanjung/yourls-limit-custom-keyword-length/
Description: This plugin limits the min and max number of characters for custom keyword
Version: 1.1
Author: Surya Tanjung
Author URI: https://jung.bz/
*/

// Hook custom function into the 'shunt_add_new_link' filter
yourls_add_filter( 'shunt_add_new_link', 'limit_keyword_length' );

// Register the plugin settings page
yourls_add_action( 'plugins_loaded', 'limit_keyword_length_add_settings' );

// Add settings page
function limit_keyword_length_add_settings() {
    yourls_register_plugin_page( 'limit_keyword_length_settings', 'Limit Keyword Length Settings', 'limit_keyword_length_settings_page' );
}

// Display settings page
function limit_keyword_length_settings_page() {
    // Check if form was submitted
    if( isset( $_POST['min_length'] ) && isset( $_POST['max_length'] ) ) {
        // Verify nonce
        yourls_verify_nonce( 'limit_keyword_length_settings' );
        // Update settings
        limit_keyword_length_update_settings();
    }

    // Get current settings
    $min_length = yourls_get_option('limit_keyword_length_min', 4);
    $max_length = yourls_get_option('limit_keyword_length_max', 15);
    $nonce = yourls_create_nonce( 'limit_keyword_length_settings' );

    echo <<<HTML
        <h2>Limit Keyword Length Settings</h2>
        <p>Plugin by <a href="https://sor.bz/jung" target="_blank">Surya Tanjung</a></p>
        <form method="post">
            <input type="hidden" name="nonce" value="$nonce" />
            <p>
                <label for="min_length">Minimum Length:</label>
                <input type="number" id="min_length" name="min_length" min="1" value="$min_length" />
            </p>
            <p>
                <label for="max_length">Maximum Length:</label>
                <input type="number" id="max_length" name="max_length" min="1" value="$max_length" />
            </p>
            <p><input type="submit" value="Save" class="button" /></p>
        </form>
HTML;
}

// Update settings
function limit_keyword_length_update_settings() {
    $min_length = intval($_POST['min_length']);
    $max_length = intval($_POST['max_length']);

    if( $min_length > 0 && $max_length > 0 && $min_length <= $max_length ) {
        yourls_update_option( 'limit_keyword_length_min', $min_length );
        yourls_update_option( 'limit_keyword_length_max', $max_length );
    } else {
        echo "Error: Invalid length values.";
    }
}

// Check custom keyword length and return an error if it exceeds the max or min length limit
function limit_keyword_length( $error, $url, $keyword ) {
    $max_length = yourls_get_option('limit_keyword_length_max', 15); // Default max length
    $min_length = yourls_get_option('limit_keyword_length_min', 4);  // Default min length
    $length = strlen( $keyword );

    if ( $length > $max_length || ( $length < $min_length && $length > 0 ) ) {
        $error['status']  = 'fail';
        $error['code']    = 'error:keyword';
        $error['message'] = ( $length > $max_length )
            ? "The keyword is too long. It can't be more than {$max_length} characters."
            : "The keyword is too short. It needs to have at least {$min_length} characters.";
        return yourls_apply_filter( 'add_new_link_keyword_length_error', $error );
    }

    return false;
}
