<?php

// Abbruch bei direktem Zugriff
if( !defined( 'ABSPATH' ) ) {
    die;
}

// Einstellungen
define('SKEY__SETTINGS_KEY_LAYOUT', [
    __('Kurzform', 'zdm'),
    __('Deutsch', 'zdm'),
    __('Englisch', 'zdm')
]);
define('SKEY__SETTINGS_KEY_LAYOUT_VAL', [
    0,
    1,
    2
]);
define('SKEY__SETTINGS_STYLE', [
    __('Hell', 'zdm'),
    __('Dunkel', 'zdm')
]);
define('SKEY__SETTINGS_STYLE_VAL', [
    'light',
    'dark'
]);

// Apple
define('SKEY__KEYS_APPLE_INPUT', [
    'cmd',
    'command',
    'befehl',
    'apple',
    'apfel',
    'alt',
    'wahl',
    'opt',
    'option',
    'fn',
    'entf',
    'entfernen',
    'delete'
]);
define('SKEY__KEYS_APPLE_OUTPUT', array(
    array(
        'cmd',
        'cmd',
        'cmd',
        'cmd',
        'cmd',
        'alt',
        'alt',
        'alt',
        'alt',
        'fn',
        'delete',
        'delete',
        'delete'
    ),
    array(
        'Befehl',
        'Befehl',
        'Befehl',
        'Befehl',
        'Befehl',
        'Wahl',
        'Wahl',
        'Wahl',
        'Wahl',
        'fn',
        'entfernen',
        'entfernen',
        'entfernen'
    ),
    array(
        'command',
        'command',
        'command',
        'command',
        'command',
        'option',
        'option',
        'option',
        'option',
        'fn',
        'delete',
        'delete',
        'delete'
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
    'strg',
    'steuerung',
    'enter',
    'eingabe',
    'return',
    'shift',
    'umschalt',
    'tab',
    'tabulator',
    'fn',
    'funktion',
    'function',
    'alt',
    'alt gr',
    'space',
    'leer',
    'leertaste',
    'leerzeichen'
]);
define('SKEY__KEYS_STANDARD_OUTPUT', array(
    array(
        'Ctrl',
        'Ctrl',
        'Ctrl',
        'Ctrl',
        'Enter',
        'Enter',
        'Enter',
        'Shift',
        'Shift',
        'Tab',
        'Tab',
        'fn',
        'fn',
        'fn',
        'Alt',
        'Alt Gr',
        'space',
        'space',
        'space',
        'space'
    ),
    array(
        'Steuerung',
        'Steuerung',
        'Steuerung',
        'Steuerung',
        'Eingabe',
        'Eingabe',
        'Eingabe',
        'Umschalt',
        'Umschalt',
        'Tabulator',
        'Tabulator',
        'Funktion',
        'Funktion',
        'Funktion',
        'Alt',
        'Alt Gr',
        'Leerzeichen',
        'Leerzeichen',
        'Leerzeichen',
        'Leerzeichen'
    ),
    array(
        'Control',
        'Control',
        'Control',
        'Control',
        'Return',
        'Return',
        'Return',
        'Shift',
        'Shift',
        'Tab',
        'Tab',
        'Function',
        'Function',
        'Function',
        'Alt',
        'Alt Gr',
        'space',
        'space',
        'space',
        'space'
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