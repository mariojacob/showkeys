![ShowKeys Title](https://user-images.githubusercontent.com/8767638/156455013-19a4a069-13eb-4155-99cb-5614a67bc819.png)

# ShowKeys

[![ShowKeys Release](https://img.shields.io/github/v/release/mariojacob/showkeys)](https://github.com/mariojacob/showkeys/releases/) ![](https://img.shields.io/github/repo-size/mariojacob/showkeys) ![](https://img.shields.io/wordpress/plugin/wp-version/showkeys) ![](https://img.shields.io/wordpress/plugin/tested/showkeys) ![](https://img.shields.io/wordpress/plugin/required-php/showkeys)

Select language: EN | [DE](./README_de_DE.md)

A WordPress plugin for the simple representation of keyboard shortcuts.

With this WordPress plugin you can either output individual keys or key combinations.

Ideal for anyone who writes tutorials for software and is looking for a simple solution to represent keyboard keys.

-   [ShowKeys website](https://code.urban-base.net/showkeys/?utm_source=github)
-   [ShowKeys on wordpress.org](https://wordpress.org/plugins/showkeys/)

## Screenshot of admin settings

![screenshot-1](https://ps.w.org/showkeys/assets/screenshot-1.png)

## Shortcodes

### Single output

Outputs a single symbol.

```TXT
[skey k="T"]
```

### Multiple output

To output a key combination with a shortcode, use this notation.

```TXT
[skey k="Alt+Shift+T"]
```

The individual symbols are separated from each other with a separator "+" by default.

This separator can be changed in the settings.

### Miscellaneous

If you want to output "Alt Shift +", but your separator symbol is "+", then you can use the option `s="#"` to change the separator symbol to "#" or any other character for this shortcode output only .

```TXT
[skey k="Alt#Shift#+" s="#"]
```

## Translation

The plugin is by default in English and completely translated in German. It works with .pot files for internationalization. To translate the plugin into a language you need a tool like [Poedit](https://www.poedit.net/).

The individual language files should have the following names such as: `skey-fr_FR`, `skey-fr_CA`, `skey-nl_NL`

You can find the latest .pot file here: [https://plugins.svn.wordpress.org/showkeys/trunk/languages/skey.po](https://plugins.svn.wordpress.org/showkeys/trunk/languages/skey.po)

## Release notes

[code.urban-base.net/showkeys/release-notes](https://code.urban-base.net/showkeys/release-notes/?utm_source=github)
