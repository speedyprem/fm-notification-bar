<?php
/**
 * FM Notification Bar settings page.
 * @author Prem Tiwari
 */

add_action('admin_menu', 'fm_notification_bar_settings');

function fm_notification_bar_settings() {
    add_options_page('WordPress Notification Bar Setting', 'Notification Bar', 'manage_options', 'fm-notification-bar', 'fm_notification_bar_init');
}

function fm_notification_bar_init() {
    global $fmnb_options;
    global $wp_version;
?>
    <div>   
        <h2 class="smsb_pluginheader"><?php _e("FM Notification Bar - Settings", fm_notification_bar); ?></h2>      
        <?php _e("<p>You are using Wordpress: ".$wp_version." and Fee Version of Notification Bar: ".fm_notification_bar_version."</p>", fm_notification_bar); ?>
        
        <form method="post" action="options.php">
            <?php settings_fields('fm_settings_group'); ?>
            <hr>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="fm_enabled">Enable</label>
                        </th>
                        <td class="forminp">
                            <fieldset>
                                <label for="fmnb_settings[fm_enabled]">
                                    <input type="checkbox" name="fmnb_settings[fm_enabled]" id="fmnb_settings[fm_enabled]" value="1" <?php checked(1, isset($fmnb_options['fm_enabled'])); ?>> Check if you want to enable the notification bar on your website.</label><br>
                            </fieldset>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="fmnb_settings[fm_notification_message]">Your Message</label>
                        <td class="forminp">
                            <fieldset>
                                <input class="regular-input" type="text" name="fmnb_settings[fm_notification_message]" id="fmnb_settings[fm_notification_message]" value="<?php echo $fmnb_options['fm_notification_message']; ?>">
                            </fieldset>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="fmnb_settings[fm_button_label]">Button Label</label> </th>
                        <td class="forminp">
                            <fieldset>
                                <input class="regular-input" type="text" name="fmnb_settings[fm_button_label]" id="fmnb_settings[fm_button_label]" value="<?php echo $fmnb_options['fm_button_label']; ?>">
                            </fieldset>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="fmnb_settings[fm_hyperlink]">Button Hyperlink</label> </th>
                        <td class="forminp">
                            <fieldset>
                                <input class="regular-input" type="text" name="fmnb_settings[fm_hyperlink]" id="fmnb_settings[fm_hyperlink]" value="<?php echo $fmnb_options['fm_hyperlink']; ?>">
                            </fieldset>
                        </td>
                    </tr>
                     <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="fmnb_settings[fm_background_color]">Background Color</label> </th>
                        <td class="forminp">
                            <fieldset>
                                <input class="input-type-color" type="color" name="fmnb_settings[fm_background_color]" id="fmnb_settings[fm_background_color]" value="<?php echo $fmnb_options['fm_background_color']; ?>">
                            </fieldset>
                        </td>
                    </tr>
                                     
                </tbody>
            </table>
            <p>&nbsp;</p>
            <p><input type="submit" name="Submit" class="button-primary" value="<?php _e("Save Changes", fm_notification_bar); ?>"></p>
        </form>                    
    </div>
<?php
}
function fm_notification_bar_register_settings() {
    register_setting('fm_settings_group', 'fmnb_settings');
}
add_action('admin_init', 'fm_notification_bar_register_settings');