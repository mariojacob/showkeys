<?php
/**
 * Plugin Name:     ShowKeys
 * Version:         0.1.0
 * Plugin URI:      https://code.urban-base.net/showkeys?utm_source=skey_plugin_uri
 * Description:     Simple presentation of keyboard shortcuts
 * Author:          URBAN BASE
 * Author URI:      https://urban-base.net/?utm_source=skey_author_uri
 * Copyright:       Mario Maier
 * Text Domain:     skey
 * Domain Path:     /languages
 * License:         GPLv2
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

// Abbruch bei direktem Zugriff
if( !defined( 'ABSPATH' ) ) {
    die;
}

// Konstanten
define('SKEY__PATH', plugin_dir_path(__FILE__));
define('SKEY__PLUGIN_URL', plugin_dir_url(__FILE__));
define('SKEY__SLUG', 'showkeys');
define('SKEY__TITLE', 'ShowKeys');
define('SKEY__VERSION', '0.1.0');
define('SKEY__STANDARD_USER_ROLE', 'manage_options');
require_once(dirname(__FILE__) . '/lib/constants.php');

// Lade Sprachdateien
load_plugin_textdomain( 'skey', false, dirname(plugin_basename(__FILE__)) . '/languages' );

// Core Klasse laden
if( class_exists('SKEYCore') === false ) {
	require_once(dirname(__FILE__) . '/lib/SKEYCore.php');
    $skeyCore = new SKEYCore();
    $skeyCore->register();
}

// Plugin Aktivierung
require_once (plugin_dir_path(__FILE__) . 'lib/SKEYPluginActivate.php');
register_activation_hook(__FILE__, array('SKEYPluginActivate', 'activate'));