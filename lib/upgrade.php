<?php

// Abort by direct access
if( !defined( 'ABSPATH' ) )
    die;

$skey_options = get_option('skey_options');

if ($skey_options['version'] < SKEY__VERSION) {
    $skey_options['version'] = SKEY__VERSION;
    update_option('skey_options', $skey_options);
}