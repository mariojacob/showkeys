<?php

// Abbruch bei direktem Zugriff
if( !defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Plugin Aktivierung
 */
class SKEYPluginActivate
{

    public static function activate()
    {

        flush_rewrite_rules();

        // Optionen erstellen
        if (get_option('skey_options')) {
            update_option('skey_options', SKEY__OPTIONS);
        } else {
            add_option('skey_options', SKEY__OPTIONS);
        }
    }
}
