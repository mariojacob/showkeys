![ShowKeys Title](https://user-images.githubusercontent.com/8767638/156455013-19a4a069-13eb-4155-99cb-5614a67bc819.png)

# ShowKeys

[![ShowKeys Release](https://img.shields.io/github/v/release/mariojacob/showkeys)](https://github.com/mariojacob/showkeys/releases/) ![](https://img.shields.io/github/repo-size/mariojacob/showkeys) ![](https://img.shields.io/wordpress/plugin/wp-version/showkeys) ![](https://img.shields.io/wordpress/plugin/tested/showkeys) ![](https://img.shields.io/wordpress/plugin/required-php/showkeys)

Sprache auswählen: DE | [EN](./README.md)

Ein WordPress Plugin für eine einfache Darstellung von Tastenkombinationen.

Du kannst mit diesem WordPress Plugin entweder einzelne Tasten oder Tastenkombinationen ausgeben.

Ideal für jeden der Tutorials für Software schreibt und eine einfache Lösung zum darstellen der Tastatur Tasten sucht.

-   [ShowKeys Webseite](https://code.urban-base.net/showkeys/?utm_source=github)
-   [ShowKeys auf wordpress.org](https://wordpress.org/plugins/showkeys/)

## Screenshot von den Admin Einstellungen

![screenshot-1](https://ps.w.org/showkeys/assets/screenshot-1.png)

## Shortcodes

### Einfache Ausgabe

Gibt ein einzelnes Symbol aus.

```TXT
[skey k="T"]
```

### Mehrfach Ausgabe

Um eine Tastenkombination mit einem Shortcode auszugeben, verwende diese Schreibweise.

```TXT
[skey k="Alt+Shift+T"]
```

Die einzelnen Symbole werden standardmäßig mit einem Trennzeichen „+“ von einander getrennt.

Dieses Trennzeichen kann in den Einstellungen geändert werden.

### Explizite Ausnahmen

Wenn du willst dass genau die Zeichen ausgegeben werden die du angibst, dann füge im Shortcode einfach `ex="on"` hinzu und die automatische Umwandlung wird deaktiviert für diese eine Shortcode Ausgabe.

```TXT
[skey k="Win+Shift+Tab" ex="on"]
```

### Sonstiges

Wenn du Alt Shift + ausgeben willst, aber dein Separator Symbol ist „+“, dann kannst du die Option `s="#"` verwenden um das Separator Symbol nur für diese Shortcode-Ausgabe auf „#“, oder ein anderes beliebiges Zeichen zu ändern.

```TXT
[skey k="Alt#Shift#+" s="#"]
```

## Übersetzung

Das Plugin ist standardmäßig in Englisch und vollständig in Deutsch übersetzt. Es funktioniert mit .pot-Dateien für die Internationalisierung. Um das Plugin in eine Sprache zu übersetzen benötigst du ein Tool wie [Poedit](https://www.poedit.net/).

Die einzelnen Sprachdateien sollten folgende Namen haben wie: `skey-fr_FR`, `skey-fr_CA`, `skey-nl_NL`

Die neueste .pot-Datei findest du hier: [https://plugins.svn.wordpress.org/showkeys/trunk/languages/skey.po](https://plugins.svn.wordpress.org/showkeys/trunk/languages/skey.po)

## Release notes

[code.urban-base.net/showkeys/release-notes](https://code.urban-base.net/showkeys/release-notes/?utm_source=github)
