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
	    'registration_msg' =>  'massage',
	    'send_sms_password_reset' =>  'Yes',
	    'password_reset_msg' =>  'massage',
	    'send_sms_birthday' =>  'Yes',
	    'birthday_msg' =>  'massage',
	    'send_sms_pending' =>  'Yes',
	    'pending_msg' =>  'massage',
	    'send_sms_processing' =>  'Yes',
	    'processing_msg' => 'massage',
	    'send_sms_failed' =>  'Yes',
	    'failed_msg' =>  'massage',
	    'send_sms_completed' =>  'Yes',
	    'completed_msg' =>  'massage',
	    'send_sms_cancelled' => 'Yes',
	    'cancelled_msg' =>  'massage',
        );
        add_option('adn_notify_opt', $data);
    }

	}

}
