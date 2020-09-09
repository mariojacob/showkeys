<?php

// Abort by direct access
if (!defined('ABSPATH')) {
    die;
}

if (current_user_can(SKEY__STANDARD_USER_ROLE)) {

    $skey_options = get_option('skey_options');

    ////////////////////
    // Update settings
    ////////////////////
    if (isset($_POST['submit']) && wp_verify_nonce($_POST['nonce'], 'update-settings')) {

        // Layout
        $skey_options['key_layout'] = trim(sanitize_text_field($_POST['key-layout']));
        // Style
        $skey_options['style'] = trim(sanitize_text_field($_POST['style']));
        // Separator symbol
        $skey_options['key_separator'] = trim(sanitize_text_field($_POST['separator-symbol']));

        // Update options
        if (add_option('skey_options', $skey_options) === FALSE) {
            update_option('skey_options', $skey_options);
            $status = 1;
        }

        $skey_options = get_option('skey_options');
    }

    ////////////////////
    // Reset settings
    ////////////////////
    if (isset($_GET['reset_settings']) && wp_verify_nonce($_GET['nonce'], 'reset-settings')) {

        if ($_GET['reset_settings'] == 'true') {

            flush_rewrite_rules();

            if (get_option('skey_options')) {
                update_option('skey_options', SKEY__OPTIONS);
                $skey_options = get_option('skey_options');
            }

            $skey_settings_url = 'admin.php?page=' . SKEY__SLUG . '-skeys';
            wp_redirect($skey_settings_url);
            exit;
        }
    }

    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline"><?=SKEY__TITLE?> <?=esc_html__('Settings', 'skey')?></h1>

        <hr class="wp-header-end">
        
        <form action="" method="post">

            <div class="postbox">
                <div class="inside">
                    <h3><?=esc_html__('Output', 'skey')?></h3>
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
                                    <div class="skey-help-text"><?=esc_html__('Specifies whether the keys are output in short form or in long form in a specific language (DE = German, EN = English).', 'skey')?></div>
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
                                    <div class="skey-help-text"><?=esc_html__('Determines the basic look either bright or dark.', 'skey')?></div>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Separator symbol', 'skey')?>:</th>
                                <td valign="middle">
                                    <input type="text" name="separator-symbol" size="5" minlength="1" maxlength="5" value="<?=esc_attr($skey_options['key_separator'])?>" autocomplete="off">
                                    <br>
                                    <div class="skey-help-text"><?=esc_html__('With this symbol you separate the keys in the shortcode.', 'skey')?></div>
                                    <div class="skey-help-text"><?=esc_html__('Example', 'skey')?>: <code>[skey k="Alt<?=esc_attr($skey_options['key_separator'])?>Shift<?=esc_attr($skey_options['key_separator'])?>T"]</code></div>
                                    <div class="skey-help-text"><?=esc_html__('Caution: if you change this separator symbol, this also applies to all previously created shortcodes.', 'skey')?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table> <!-- end class="form-table" -->
                    <h3><?=esc_html__('Extended', 'skey')?></h3>
                    <hr>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Reset settings', 'skey')?>:</th>
                                <td valign="middle">
                                    <a href="admin.php?page=<?=SKEY__SLUG?>-skeys&reset_settings=true&nonce=<?=wp_create_nonce('reset-settings')?>" class="button button-secondary"><?=esc_html__('Reset settings', 'skey')?></a>
                                    <div class="zdm-help-text"><?=esc_html__('Here you can reset all settings to the factory settings.', 'skey')?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table> <!-- end class="form-table" -->
                </div> <!-- end class="inside" -->
            </div> <!-- end class="postbox" -->

            <div class="postbox">
                <div class="inside">
                    <h3><?=esc_html__('Help', 'skey')?></h3>
                    <hr>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Simple output', 'skey')?>:</th>
                                <td valign="middle">
                                    <p><?=esc_html__('Here you can see how to issue a single key.', 'skey')?></p>
                                    <br>
                                    <p><?=esc_html__('Example', 'skey')?>: <code>[skey k="T"]</code></p>
                                    <br>
                                    <p><?=esc_html__('Output', 'skey')?>: <kbd class="skey skey-<?=$skey_options['style']?>">T</kbd></p>
                                    <br>
                                    <hr>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Multiple output', 'skey')?>:</th>
                                <td valign="middle">
                                    <p><?=esc_html__('Here you can see how to issue a key combination, i.e. several keys.', 'skey')?></p>
                                    <br>
                                    <p><?=esc_html__('Example', 'skey')?>: <code>[skey k="Alt+Shift+T"]</code></p>
                                    <br>
                                    <p><?=esc_html__('Output', 'skey')?>: <kbd class="skey skey-<?=$skey_options['style']?>">Alt</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">Shift</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">T</kbd></p>
                                    <br>
                                    <hr>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Other', 'skey')?>:</th>
                                <td valign="middle">
                                    <p><?=esc_html__('If you', 'skey')?> <code>Alt Shift +</code> <?=esc_html__('but your separator symbol is "+", then you can choose the option', 'skey')?> <code>s="#"</code> <?=esc_html__('to change the separator symbol to "#", or any other character, just for that shortcode output', 'skey')?>.</p>
                                    <p><?=esc_html__('Example', 'skey')?>: <code>[skey k="Alt#Shift#+" s="#"]</code></p>
                                    <br>
                                    <p><?=esc_html__('Output', 'skey')?>: <kbd class="skey skey-<?=$skey_options['style']?>">Alt</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">Shift</kbd> + <kbd class="skey skey-<?=$skey_options['style']?>">+</kbd></p>
                                </td>
                            </tr>
                        </tbody>
                    </table> <!-- end class="form-table" -->
                </div> <!-- end class="inside" -->
            </div> <!-- end class="postbox" -->

            <div class="postbox">
                <div class="inside">
                    <h3><?=esc_html__('Info', 'skey')?></h3>
                    <hr>
                    <table class="form-table">
                        <tbody>
                            <tr valign="top">
                                <th scope="row"><?=SKEY__TITLE?> <?=esc_html__('Version', 'skey')?>:</th>
                                <td valign="middle">
                                    <?=esc_attr($skey_options['version'])?> - <a href="https://code.urban-base.net/showkeys/release-notes/?utm_source=skey_backend" target="_blank" title="<?=esc_html__('Release notes', 'skey')?>"><?=esc_html__('release notes', 'skey')?></a>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Website', 'skey')?>:</th>
                                <td valign="middle">
                                    <a href="https://code.urban-base.net/showkeys/?utm_source=skey_backend" target="_blank" title="<?=SKEY__TITLE?> <?=esc_html__('Website', 'skey')?>">code.urban-base.net/showkeys</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p><?=esc_html__('Do you have suggestions for improvement or suggestions for the plugin, then write me', 'skey')?>: <a href="mailto:info@code.urban-base.net?subject=<?=SKEY__TITLE?> Verbesserungsvorschläge" target="_blank">info@code.urban-base.net</a></p>
                    <p><?=esc_html__('If you', 'skey')?> <?=SKEY__TITLE?> <?=esc_html__('like, then write a', 'skey')?> <a href="https://wordpress.org/support/plugin/showkeys/reviews/?filter=5#postform" target="_blank" title="<?=SKEY__TITLE?> ">★★★★★ <?=esc_html__('rating.', 'skey')?></a> <?=esc_html__('You would help me a lot to make the plugin known.', 'skey')?></p>
                </div>
            </div>

            <input type="hidden" name="nonce" value="<?=wp_create_nonce('update-settings')?>">
            <input class="button-primary" type="submit" name="submit" value="<?=esc_html__('Save', 'skey')?>">
        </form>
        

    </div> <!-- end class="wrap" -->
    <?php
}