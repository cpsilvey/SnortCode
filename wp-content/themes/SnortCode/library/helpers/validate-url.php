<?php
function validate_url( $url ) {
    if ( empty( $url ) ) {
        return false;
    }

    // Reject if HTML tags are found
    if ( $url !== wp_strip_all_tags( $url ) ) {
        return false;
    }

    // Step 1: Sanitize
    $sanitized_url = esc_url_raw( trim( $url ), array( 'http', 'https' ) );

    // Step 2: Validate
    if ( filter_var( $sanitized_url, FILTER_VALIDATE_URL ) ) {
        return $sanitized_url;
    }

    return false;
}