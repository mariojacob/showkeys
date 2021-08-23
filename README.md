# ShowKeys

![screenshot-1](https://plugins.svn.wordpress.org/showkeys/assets/banner-1544x500.png)

[![ShowKeys](https://img.shields.io/wordpress/plugin/wp-version/showkeys)](https://wordpress.org/plugins/showkeys/) [![ShowKeys](https://img.shields.io/wordpress/plugin/tested/showkeys)](https://wordpress.org/plugins/showkeys/) [![ShowKeys](https://img.shields.io/wordpress/plugin/required-php/showkeys)](https://wordpress.org/plugins/showkeys/)

### Simple representation of key combinations

With this WordPress plugin you can either output individual keys or key combinations.

Ideal for anyone who writes tutorials for software and is looking for a simple solution to represent keyboard keys.

-   [ShowKeys website](https://code.urban-base.net/showkeys/?utm_source=github)
-   [ShowKeys on wordpress.org](https://wordpress.org/plugins/showkeys/)

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

The individual symbols are separated from each other with a separator "+".

This separator can be changed in the settings.

### Miscellaneous

Wenn du Alt Shift + ausgeben willst, aber dein Separator Symbol ist „+“, dann kannst du die Option `s="#"` verwenden um das Separator Symbol nur für diese Shortcode-Ausgabe auf „#“, oder ein anderes beliebiges Zeichen zu ändern.

```TXT
[skey k="Alt#Shift#+" s="#"]
```

## Translation

The plugin is by default in English and completely translated in German. It works with .pot files for internationalization. To translate the plugin into a language you need a tool like [Poedit](https://www.poedit.net/).

The individual language files should have the following names such as:: `skey-fr_FR`, `skey-fr_CA`, `skey-nl_NL`

You can find the latest .pot file here: [https://plugins.svn.wordpress.org/showkeys/trunk/languages/skey.po](https://plugins.svn.wordpress.org/showkeys/trunk/languages/skey.po)

## Release notes

[code.urban-base.net/showkeys/release-notes](https://code.urban-base.net/showkeys/release-notes/?utm_source=github)
