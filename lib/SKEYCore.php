<?php

// Abbruch bei direktem Zugriff
if( !defined( 'ABSPATH' ) ) {
    die;
}

/**
 * SKEY-Core
 */
class SKEYCore
{

    protected $plugin_basename;

    function __construct()
    {
        $this->plugin_basename = plugin_basename(SKEY__PATH . SKEY__SLUG . '.php');
    }

    /**
     * Erzeugt im Backend einen Eintrag mit mehreren Seiten im Menü
     */
    public function admin_menu()
    {
        add_options_page(
            SKEY__TITLE,                                // Seitentitel
            SKEY__TITLE,                                // Menuetext
            'manage_options',                           // Zugriffslevel
            SKEY__SLUG . '-skeys',                      // URL des submenue
            array($this, 'admin_options_page_skeys'));  // Name der Funktion die ausgeführt wird
    }

    /**
     * Admin Optionen
     */
    public function admin_options_page_skeys()
    {
        require_once (plugin_dir_path(__FILE__) . '../templates/admin_options_page_skeys.php');
    }

    /**
     * Bindet Admin Skripte ein
     */
    public function enqueue_admin_scripts()
    {
        // Admin CSS
        wp_register_style('skey_admin_styles', plugins_url('../admin/css/skey_admin_style.css?v=' . SKEY__VERSION . time(), __FILE__));
        wp_enqueue_style('skey_admin_styles');
    }

    /**
     * Bindet Frontend Skripte ein
     */
    public function enqueue_frontend_scripts()
    {
        // Frontend CSS
        wp_register_style('skey_styles', plugins_url('../public/css/skey_style.css?v=' . SKEY__VERSION, __FILE__));
        wp_enqueue_style('skey_styles');
    }

    /**
     * Registriert grundlegende Komponenten in WP
     */
    public function register()
    {

        // Admin Scripte einbinden
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));

        // Frontend Scripte einbinden
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_scripts'));

        // Admin Menu
        add_action('admin_menu', array($this, 'admin_menu'));

        // Shortcode Key Ausgabe
        add_shortcode('skey', array($this, 'shortcode_key'));
    }

    public function shortcode_key($atts, $content = null)
    {

        $options = get_option('skey_options');

        $atts = shortcode_atts(
            array(
                'k' => ''
                ), $atts
        );

        $key = strtolower(htmlspecialchars($atts['k']));

        $output = $key;

        // Standard Tasten Umwandlung
        for ($i = 0; $i < count(SKEY__KEYS_STANDARD_INPUT); $i++) {

            if ($key == SKEY__KEYS_STANDARD_INPUT[$i]) {
                $output = SKEY__KEYS_STANDARD_OUTPUT[$options['output_layout']][$i];
            }
        }
        // Apple Tasten Umwandlung
        for ($i = 0; $i < count(SKEY__KEYS_APPLE_INPUT); $i++) {

            if ($key == SKEY__KEYS_APPLE_INPUT[$i]) {
                $output = SKEY__KEYS_APPLE_OUTPUT[$options['output_layout']][$i];
            }
        }
        // Windows Tasten Umwandlung
        for ($i = 0; $i < count(SKEY__KEYS_WINDOWS_INPUT); $i++) {

            if ($key == SKEY__KEYS_WINDOWS_INPUT[$i]) {
                $output = SKEY__KEYS_WINDOWS_OUTPUT[$options['output_layout']][$i];
            }
        }

        // Tasten in Großbuchstaben umwandeln
        if (in_array($key, SKEY__KEYS_UPPERCASE_INPUT)) {
            $output = strtoupper($key);
        }

        return '<kbd class="skey skey-light">' . $output . '</kbd>';
    }
}