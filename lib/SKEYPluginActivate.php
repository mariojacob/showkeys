<?php

// Abort by direct access
if( !defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Plugin activation
 */
class SKEYPluginActivate
{

    public static function activate()
    {

        flush_rewrite_rules();

        // Create options
        if (get_option('skey_options')) {
            update_option('skey_options', SKEY__OPTIONS);
        } else {
            add_option('skey_options', SKEY__OPTIONS);
        }
    }
}
