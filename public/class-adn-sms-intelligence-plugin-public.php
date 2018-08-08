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
 * @author     ADN SMS <info@adnsms.com>
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
        $order = wc_get_order( $order_id );
        $order_data = $order->get_data(); // The Order data


        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_phone = $order_data['billing']['phone'];

        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', Thank you. Your order has been received.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"
//

        /**
         * send sms new registration
         */
        $customer_orders = get_posts( array(
            'numberposts' => -1,
            'meta_key'    => '_customer_user',
            'meta_value'  => get_current_user_id(),
            'post_type'   => wc_get_order_types(),
            'post_status' => array_keys( wc_get_order_statuses() ),  //'post_status' => array('wc-completed', 'wc-processing'),
        ) );

        if(count($customer_orders)==1){
            $new_reg_message = 'Hi '. $data['costumer_name'].', Your registration is successful.';
            $new_reg_sms = new AdnSmsNotification();
            $new_reg_sms->sendSms($requestType, $new_reg_message, $recipient, $messageType);
        }

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);
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
        $data['first_name'] = get_user_meta( $user->ID,'first_name',true);
        $data['last_name']= get_user_meta( $user->ID,'last_name',true);
        $data['phone_number']= get_user_meta( $user->ID,'billing_phone',true);

        $data['costumer_name']= $data['first_name']  .' '.$data['last_name'];
        $data['massage_body']='Hi '. $data['costumer_name'].', your password is successfully reset.';
        if( $data['phone_number']!=null){

            $message = $data['massage_body'];
            $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
            $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
            $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }

    }

}
