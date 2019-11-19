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

        // Grundeinstellungen festlegen
        $options = array(
            'version'           => SKEY__VERSION,
            'key_layout'        => 0,
            'key_separator'     => '+',
            'style'             => 'light'
        );

        // Optionen erstellen
        if (get_option('skey_options')) {
            update_option('skey_options', $options);
        } else {
            add_option('skey_options', $options);
        }
    }
}
