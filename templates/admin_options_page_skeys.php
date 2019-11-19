<?php

// Abbruch bei direktem Zugriff
if (!defined('ABSPATH')) {
    die;
}

if (current_user_can(SKEY__STANDARD_USER_ROLE)) {

    $skey_options = get_option('skey_options');

    if (isset($_POST['submit']) && wp_verify_nonce($_POST['nonce'], 'einstellungen-speichern')) {

        // Layout
        $skey_options['key_layout'] = trim(sanitize_text_field($_POST['key-layout']));
        // Style
        $skey_options['style'] = trim(sanitize_text_field($_POST['style']));
        // Separator Symbol
        $skey_options['key_separator'] = trim(sanitize_text_field($_POST['separator-symbol']));

        // Update Optionen
        if (add_option('skey_options', $skey_options) === FALSE) {
            update_option('skey_options', $skey_options);
            $status = 1;
        }

        $skey_options = get_option('skey_options');
    }

    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline"><?=SKEY__TITLE?> <?=esc_html__('Einstellungen', 'skey')?></h1>

        <hr class="wp-header-end">
        
        <form action="" method="post">

            <div class="postbox">
                <div class="inside">
                    <h3><?=esc_html__('Ausgabe', 'skey')?></h3>
                    <hr>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Layout', 'skey')?>:</th>
                                <td valign="middle">
                                    <select name="key-layout">
                                        <?php
                                        $skey_key_layout = '';

                                        for( $i = 0; $i < count(SKEY__SETTINGS_KEY_LAYOUT); $i++ ) {
                                          $skey_key_layout    .= '<option value="' . SKEY__SETTINGS_KEY_LAYOUT_VAL[$i] . '" ' 
                                                            . ( $skey_options['key_layout'] == SKEY__SETTINGS_KEY_LAYOUT_VAL[$i] ? 'selected="selected"' : '' ) . '>' 
                                                            . SKEY__SETTINGS_KEY_LAYOUT[$i] 
                                                            . '</option>';
                                        }
                                        
                                        echo $skey_key_layout;
                                        ?>
                                    </select>
                                    <br>
                                    <div class="skey-help-text"><?=esc_html__('Gibt an ob die Tasten in Kurzform oder in einer bestimmten Sprache (deutsch oder englisch) ausgegeben werden.', 'skey')?></div>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Style', 'skey')?>:</th>
                                <td valign="middle">
                                    <select name="style">
                                        <?php
                                        $skey_style = '';

                                        for( $i = 0; $i < count(SKEY__SETTINGS_STYLE); $i++ ) {
                                          $skey_style    .= '<option value="' . SKEY__SETTINGS_STYLE_VAL[$i] . '" ' 
                                                            . ( $skey_options['style'] == SKEY__SETTINGS_STYLE_VAL[$i] ? 'selected="selected"' : '' ) . '>' 
                                                            . SKEY__SETTINGS_STYLE[$i] 
                                                            . '</option>';
                                        }
                                        echo $skey_style;
                                        ?>
                                    </select>
                                    <br>
                                    <div class="skey-help-text"><?=esc_html__('Bestimmt den grundlegenden Look entweder hell oder dunkel.', 'skey')?></div>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Separator Symbol', 'skey')?>:</th>
                                <td valign="middle">
                                    <input type="text" name="separator-symbol" size="5" minlength="1" maxlength="5" value="<?=esc_attr($skey_options['key_separator'])?>" autocomplete="off">
                                    <br>
                                    <div class="skey-help-text"><?=esc_html__('Mit diesem Symbol trennst du die Tasten im Shortcode.', 'skey')?></div>
                                    <div class="skey-help-text"><?=esc_html__('Beispiel', 'skey')?>: <code>[skey k="Alt<?=esc_attr($skey_options['key_separator'])?>Shift<?=esc_attr($skey_options['key_separator'])?>T"]</code></div>
                                    <div class="skey-help-text"><?=esc_html__('Vorsicht: wenn du dieses Separator Symbol änderst, dann gilt das auch für alle bisher erstellten Shortcodes.', 'skey')?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table> <!-- end class="form-table" -->
                </div> <!-- end class="inside" -->
            </div> <!-- end class="postbox" -->

            <div class="postbox">
                <div class="inside">
                    <h3><?=esc_html__('Hilfe', 'skey')?></h3>
                    <hr>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Einfache Ausgabe', 'skey')?>:</th>
                                <td valign="middle">
                                    <p><?=esc_html__('Beispiel', 'skey')?>: <code>[skey k="T"]</code></p>
                                    <br>
                                    <p><?=esc_html__('Ausgabe', 'skey')?>: <kbd class="skey skey-<?=$skey_options['style']?>">T</kbd></p>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Mehrfach Ausgabe', 'skey')?>:</th>
                                <td valign="middle">
                                    <p><?=esc_html__('Beispiel', 'skey')?>: <code>[skey k="Alt+Shift+T"]</code></p>
                                    <br>
                                    <p><?=esc_html__('Ausgabe', 'skey')?>: <kbd class="skey skey-<?=$skey_options['style']?>">Alt</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">Shift</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">T</kbd></p>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Sonstiges', 'skey')?>:</th>
                                <td valign="middle">
                                    <p><?=esc_html__('Wenn du', 'skey')?> <code>Alt Shift +</code> <?=esc_html__('ausgeben willst, aber dein Separator Symbol ist "+", dann kannst du die Option', 'skey')?> <code>s="#"</code> <?=esc_html__('verwenden um das Separator Symbol nur für diese Shortcode-Ausgabe auf "#", oder ein anderes beliebiges Zeichen zu ändern', 'skey')?>.</p>
                                    <p><?=esc_html__('Beispiel', 'skey')?>: <code>[skey k="Alt#Shift#+" s="#"]</code></p>
                                    <br>
                                    <p><?=esc_html__('Ausgabe', 'skey')?>: <kbd class="skey skey-<?=$skey_options['style']?>">Alt</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">Shift</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">+</kbd></p>
                                </td>
                            </tr>
                        </tbody>
                    </table> <!-- end class="form-table" -->
                </div> <!-- end class="inside" -->
            </div> <!-- end class="postbox" -->

            <input type="hidden" name="nonce" value="<?=wp_create_nonce('einstellungen-speichern')?>">
            <input class="button-primary" type="submit" name="submit" value="<?=esc_html__('Speichern', 'skey')?>">
        </form>
        

    </div> <!-- end class="wrap" -->
    <?php
}