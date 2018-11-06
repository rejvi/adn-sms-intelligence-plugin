<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://adnsms.com/
 * @since      1.0.0
 *
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/public
 * @author     ADN Digital Software Team <softwareteam@adndigital.com.bd>
 */

require_once(PLUGIN_DIR_PATH."library/adn_sms_class/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;
class Adn_Sms_Intelligence_Plugin_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Adn_Sms_Intelligence_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Adn_Sms_Intelligence_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/adn-sms-intelligence-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Adn_Sms_Intelligence_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Adn_Sms_Intelligence_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/adn-sms-intelligence-plugin-public.js', array( 'jquery' ), $this->version, false );

	}

	public function adn_new_order($order_id){
        /**
         *  Send SMS  in new order.
         *
         */
        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message = $get_settings['new_order_msg']; // new order message body
        $recipient = $order_data['billing']['phone'];  // phone number
        $requestType = 'SINGLE_SMS';    // single sms request
        $messageType = 'TEXT';         // sms type text
        //dynamic sms body
        if (strpos($message, '[USER_NAME]') !== false) {
            $message = str_replace("[USER_NAME]",$costumer_name,$message);
        }
        if (strpos($message, '[AMOUNT]') !== false) {
            $message = str_replace("[AMOUNT]",$amount,$message);
        }
        if (strpos($message, '[ORDER_ID]') !== false) {
            $message = str_replace("[ORDER_ID]",$orderID,$message);
        }
        if (strpos($message, '[SITE_NAME]') !== false) {
            $message = str_replace("[SITE_NAME]",$site_name,$message);
        }

        /**
         * send sms new registration
         */
        if($get_settings['send_sms_registration'] == 'Yes') {
            $customer_orders = get_posts(array(
                'numberposts' => -1,
                'meta_key' => '_customer_user',
                'meta_value' => get_current_user_id(),
                'post_type' => wc_get_order_types(),
                'post_status' => array_keys(wc_get_order_statuses()),  //'post_status' => array('wc-completed', 'wc-processing'),
            ));

            if (count($customer_orders) == 1) {
                $new_reg_message = $get_settings['registration_msg']; //new user registration message body
                //dynamic sms body
                if (strpos($new_reg_message, '[USER_NAME]') !== false) {
                    $new_reg_message = str_replace("[USER_NAME]",$costumer_name,$new_reg_message);
                }
                if (strpos($new_reg_message, '[SITE_NAME]') !== false) {
                    $new_reg_message = str_replace("[SITE_NAME]",$site_name,$new_reg_message);
                }
                //send sms on new user registration
                if($recipient != null) {
                    $new_reg_sms = new AdnSmsNotification();
                    $new_reg_sms->sendSms($requestType, $new_reg_message, $recipient, $messageType);
                }
            }
        }
        //send sms on new order
        if($recipient != null && $get_settings['send_sms_new_order'] == 'Yes'){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }
    }

    public function adn_password_reset( $user, $new_pass ) {

        wp_set_password( $new_pass, $user->ID );
        update_user_option( $user->ID, 'default_password_nag', false, true );

        /**
         * Fires after the user's password is reset.
         *
         * @since 4.4.0
         *
         * @param WP_User $user     The user.
         * @param string  $new_pass New user password.
         * send_sms_after_password_reset Custom adn hook.
         */
        do_action( 'send_sms_after_password_reset', $user);

        wp_password_change_notification( $user );
    }
    public function adn_send_sms_after_password_reset($user){
        /**
         *  Send SMS after password rest.
         *
         */
        $get_settings = get_option('adn_notify_opt'); //get and sms send settings option
        $first_name = get_user_meta( $user->ID,'first_name',true); //first name
        $last_name = get_user_meta( $user->ID,'last_name',true); //last name
        $recipient = get_user_meta( $user->ID,'billing_phone',true); // phone number
        $site_name = get_bloginfo( 'name' ); //site name
        $costumer_name = $first_name.' '.$last_name; //customer name
        $message = $get_settings['password_reset_msg']; //message body
        $requestType = 'SINGLE_SMS';    // single sms request
        $messageType = 'TEXT';         // sms type text
        //dynamic sms body
        if (strpos($message, '[USER_NAME]') !== false) {
            $message = str_replace("[USER_NAME]",$costumer_name,$message);
        }
        if (strpos($message, '[SITE_NAME]') !== false) {
            $message = str_replace("[SITE_NAME]",$site_name,$message);
        }
        //send sms
        if($recipient!=null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }


    }

}
