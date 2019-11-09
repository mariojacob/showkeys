<?php

// Abbruch bei direktem Zugriff
if (!defined('ABSPATH')) {
    die;
}

if (current_user_can(SKEY__STANDARD_USER_ROLE)) {

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
                                        <option value="de_DE">de_DE</option>
                                    </select>
                                    <br>
                                    <div class="skey-help-text"><?=esc_html__('Gibt an...', 'skey')?></div>
                                </td>
                            </tr>
                            <tr valign="top">
                                <th scope="row"><?=esc_html__('Style', 'skey')?>:</th>
                                <td valign="middle">
                                    <select name="key-layout">
                                        <option value="light"><?=esc_html__('Hell', 'skey')?></option>
                                        <option value="dark"><?=esc_html__('Dunkel', 'skey')?></option>
                                    </select>
                                    <br>
                                    <div class="skey-help-text"><?=esc_html__('Der grundlegende Style.', 'skey')?></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <input type="hidden" name="nonce" value="<?=wp_create_nonce('einstellungen-speichern')?>">
            <input class="button-primary" type="submit" name="submit" value="<?=esc_html__('Speichern', 'skey')?>">
        </form>
        

    </div>
    <?php
}