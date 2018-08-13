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
 * @author     ADN SMS <info@adnsms.com>
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
	if(!get_option('adn_notify_opt')) {

	    $data = array(
        'send_sms_registration' => 'Yes',
	    'registration_msg' =>  'Your registration is successfully completed.',
	    'send_sms_password_reset' =>  'Yes',
	    'password_reset_msg' =>  'Your password is successfully reset.',
	    'send_sms_birthday' =>  'Yes',
	    'birthday_msg' =>  'Happy Birthday,Wishing you a very happy birthday.',
        'send_sms_new_order' =>  'Yes',
	    'new_order_msg' =>  'Thank you. Your order has been received.',
        'send_sms_on_hold' =>  'Yes',
	    'on_hold_msg' =>  'Your order is on hold.',
        'send_sms_pending' =>  'Yes',
        'pending_msg' =>  'Your order is pending.',
	    'send_sms_processing' =>  'Yes',
	    'processing_msg' => 'Your order is under processing.',
	    'send_sms_failed' =>  'Yes',
	    'failed_msg' =>  'Your order is failed.',
	    'send_sms_completed' =>  'Yes',
	    'completed_msg' =>  'Your order is completed.Thank you for your purchase.',
	    'send_sms_cancelled' => 'Yes',
	    'cancelled_msg' =>  'Your order is cancelled.',
        'send_sms_refunded' =>  'Yes',
        'refunded_msg' =>  'Your payment is refunded.',
        );
        add_option('adn_notify_opt', $data);
    }

	}

}
