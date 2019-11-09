<?php

// Abbruch bei direktem Zugriff
if( !defined( 'ABSPATH' ) ) {
    die;
}

// Apple
define('SKEY__KEYS_APPLE_INPUT', [
    'cmd',
    'command',
    'befehl'
]);
define('SKEY__KEYS_APPLE_OUTPUT', array(
    array(
        'Befehl',
        'Befehl'
    ),
    array(
        'Befehl',
        'Befehl'
    )
));

// Windows
define('SKEY__KEYS_WINDOWS_INPUT', [
    'win',
    'windows'
]);
define('SKEY__KEYS_WINDOWS_OUTPUT', array(
    array(
        'Windows',
        'Windows'
    ),
    array(
        'Windows',
        'Windows'
    )
));

// Standardwerte
define('SKEY__KEYS_STANDARD_INPUT', [
    'ctrl',
    'control',
    'steuerung',
    'enter',
    'eingabe',
    'return',
    'shift',
    'umschalt',
    'tab',
    'tabulator'
]);
define('SKEY__KEYS_STANDARD_OUTPUT',  array(
    array(
        'Steuerung',
        'Steuerung',
        'Steuerung',
        'Eingabe',
        'Eingabe',
        'Eingabe',
        'Umschalt',
        'Umschalt',
        'Tab',
        'Tab'
    ),
    array(
        'Steuerung',
        'Steuerung',
        'Steuerung',
        'Eingabe',
        'Eingabe',
        'Eingabe',
        'Umschalt',
        'Umschalt',
        'Tab',
        'Tab'
    )
));
define('SKEY__KEYS_UPPERCASE_INPUT', [
    'a',
    'b',
    'c',
    'd',
    'e',
    'f',
    'g',
    'h',
    'i',
    'j',
    'k',
    'l',
    'm',
    'n',
    'o',
    'p',
    'q',
    'r',
    's',
    't',
    'u',
    'v',
    'w',
    'x',
    'y',
    'z',
    'ä',
    'ö',
    'ü',
    'f1',
    'f2',
    'f3',
    'f4',
    'f5',
    'f6',
    'f7',
    'f8',
    'f9',
    'f10',
    'f11',
    'f12'
]);