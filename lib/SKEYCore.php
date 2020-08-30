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
     * Erzeugt im Backend eine Einstellungs-Seite im Reiter Einstellungen
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
     * Admin Einstellungen
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

        // Admin CSS 2
        wp_register_style('skey_admin_styles_2', plugins_url('../public/css/skey_style.css?v=' . SKEY__VERSION, __FILE__));
        wp_enqueue_style('skey_admin_styles_2');
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

    /**
     * Konvertiert die eingegebenen Werte
     *
     * @param string $key
     * @return string
     */
    public function key_validate($key)
    {

        $options = get_option('skey_options');

        $key = trim($key);

        $output = $key;

        // Tasten in Großbuchstaben umwandeln
        if (in_array($key, SKEY__KEYS_UPPERCASE_INPUT)) {
            $output = strtoupper($key);
        }

        // Standard Tasten Umwandlung
        for ($i = 0; $i < count(SKEY__KEYS_STANDARD_INPUT); $i++) {

            if ($key == SKEY__KEYS_STANDARD_INPUT[$i]) {
                $output = SKEY__KEYS_STANDARD_OUTPUT[$options['key_layout']][$i];
            }
        }
        // Apple Tasten Umwandlung
        for ($i = 0; $i < count(SKEY__KEYS_APPLE_INPUT); $i++) {

            if ($key == SKEY__KEYS_APPLE_INPUT[$i]) {
                $output = SKEY__KEYS_APPLE_OUTPUT[$options['key_layout']][$i];
            }
        }
        // Windows Tasten Umwandlung
        for ($i = 0; $i < count(SKEY__KEYS_WINDOWS_INPUT); $i++) {

            if ($key == SKEY__KEYS_WINDOWS_INPUT[$i]) {
                $output = SKEY__KEYS_WINDOWS_OUTPUT[$options['key_layout']][$i];
            }
        }

        return $output;
    }

    /**
     * Shortcode für einzelne Taste
     *
     * @param string $atts
     * @param string $content
     * @return string HTML-String
     */
    public function shortcode_key($atts, $content = null)
    {

        $options = get_option('skey_options');

        $atts = shortcode_atts(
            array(
                'k' => '',
                's' => ''
                ), $atts
        );

        $key = strtolower(htmlspecialchars($atts['k']));
        if ($atts['s'] != '') {
            $key_separator = htmlspecialchars($atts['s']);
        } else {
            $key_separator = $options['key_separator'];
        }

        $keys_array = explode($key_separator, $key);

        $output_keys = '';
        if ($keys_array[0] != '') {

            $output[0] = $this->key_validate($keys_array[0]);
            $output_keys .= '<kbd class="skey skey-' . $options['style'] . '" title="' . esc_html__('Taste', 'skey') . ': ' . $output[0] . '">' . $output[0] . '</kbd>';
        }

        if (count($keys_array) >= 1) {

            for ($i=1; $i < count($keys_array); $i++) {

                if ($keys_array[$i] != '') {

                    if ($keys_array[$i-1] != '') {
                        $output_keys .= ' + ';
                    }
    
                    $output[$i] = $this->key_validate($keys_array[$i]);
                    $output_keys .= '<kbd class="skey skey-' . $options['style'] . '" title="' . esc_html__('Taste', 'skey') . ': ' . $output[$i] . '">' . $output[$i] . '</kbd>';
                }
            }
            return $output_keys;
        } else {
            $output = $this->key_validate($key);
            return '<kbd class="skey skey-' . $options['style'] . '" title="' . esc_html__('Taste', 'skey') . ': ' . $output . '">' . $output . '</kbd>';
        }
    }
}