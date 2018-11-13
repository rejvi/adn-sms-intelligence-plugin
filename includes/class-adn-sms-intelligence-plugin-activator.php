<?php

/**
 * Fired during plugin activation
 *
 * @link       https://adnsms.com/
 * @since      1.0.0
 *
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/includes
 * @author     ADN Digital Software Team <softwareteam@adndigital.com.bd>
 */
class Adn_Sms_Intelligence_Plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

          /**
           * Check if WooCommerce & Cubepoints are active
           **/
          if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

              // Deactivate the plugin
              deactivate_plugins(__FILE__);

              // Throw an error in the wordpress admin console
              $error_message = __('This plugin requires <a href="http://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a> plugins to be active!', 'woocommerce');

              die($error_message);
          }

	if(!get_option('adn_notify_opt')) {

	    $data = array(
        'send_sms_registration' => 'Yes',
	    'registration_msg' =>  'Dear [USER_NAME], thank you for registering at [SITE_NAME].',
	    'send_sms_password_reset' =>  'Yes',
	    'password_reset_msg' =>  'Dear [USER_NAME], you have reset your password successfully. If it’s not you please contact our Operators.',
        'send_sms_new_order' =>  'Yes',
	    'new_order_msg' =>  'Dear [USER_NAME], your order [ORDER_ID] has been placed successfully!',
        'send_sms_on_hold' =>  'Yes',
	    'on_hold_msg' =>  'Dear [USER_NAME], your order [ORDER_ID] is on hold! ',
        'send_sms_pending' =>  'Yes',
        'pending_msg' =>  'Dear [USER_NAME], your order [ORDER_ID] is in review now! Please keep patience.',
	    'send_sms_processing' =>  'Yes',
	    'processing_msg' => 'Dear [USER_NAME], thanks for confirming your payment [AMOUNT] against the order [ORDER_ID].',
	    'send_sms_failed' =>  'Yes',
	    'failed_msg' =>  'Dear [USER_NAME], we are sorry that your order [ORDER_ID] submission is failed!',
	    'send_sms_completed' =>  'Yes',
	    'completed_msg' =>  'Dear [USER_NAME], thank you for shopping with us. We are happy delivering you the service!',
	    'send_sms_cancelled' => 'Yes',
	    'cancelled_msg' =>  'Dear [USER_NAME], we are sorry that the order [ORDER_ID] is cancelled!',
        'send_sms_refunded' =>  'Yes',
        'refunded_msg' =>  'Dear [USER_NAME], sorry for the inconvenience. We are processing your refund request against your order [ORDER_ID].',
        );
        add_option('adn_notify_opt', $data);
    }

	}

}
