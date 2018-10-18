<?php
/*
 * Plugin Name: Notification Bar
 * Plugin URI: https://www.freewebmentor.com/
 * Description: Notification Bar is a quick and easy notification bar and call to action for your site.
 * Version: 1.0.1
 * Author: Prem Tiwari
 * Author URI: https://www.freewebmentor.com/
 */

if (!defined('ABSPATH')){ exit; }

// Define plugin name
define('fm_notification_bar', 'FM Notification Bar');

// Define plugin version
define('fm_notification_bar_version', '1.0.0');


if (is_admin()) {
    include_once('admin/settings.php');
}

$fmnb_options = get_option('fmnb_settings');

add_action('admin_head', 'fm_extra_fee_style');
add_action('wp_head', 'fm_notification_bar_style');

function fm_extra_fee_style() {
    wp_enqueue_style('fm_admin_style',plugins_url("css/admin.css",__FILE__));  
}

function fm_notification_bar_style() {
    wp_enqueue_style('fm_font_awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('fm_notification_bar_style',plugins_url("css/style.css",__FILE__));
}

// Add notification bar to the front-end
function fm_notification_bar() {
  global $fmnb_options;
  $fm_enabled = $fmnb_options['fm_enabled'];
  $fm_notification_message = $fmnb_options['fm_notification_message'];
  $fm_button_label = $fmnb_options['fm_button_label'];
  $fm_hyperlink = $fmnb_options['fm_hyperlink'];
  $fm_background_color = $fmnb_options['fm_background_color'];
  if($fm_enabled==1){
?>
<label for="notify-2">
   <input id="notify-2" type="checkbox">
   <i class="fa fa-long-arrow-down"></i>
   <div id="notification-bar" style="background: <?php echo $fm_background_color;?>">
      <div class="container">
         <i class="fa fa-times-circle"></i>
         <p></i><?php echo $fm_notification_message;?>
         </p>
         <a href="<?php echo $fm_hyperlink;?>" target="_blank"> <button ><?php echo $fm_button_label;?></button></a>
      </div>
   </div>
</label>
<?php } }

add_action( 'wp_head', 'fm_notification_bar' );
