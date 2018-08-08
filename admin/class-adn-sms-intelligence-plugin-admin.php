<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://adnsms.com/
 * @since      1.0.0
 *
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/admin
 * @author     ADN SMS <info@adnsms.com>
 */

require_once(PLUGIN_DIR_PATH."library/adn_sms_class/lib/AdnSmsNotification.php");

use AdnSms\AdnSmsNotification;

class Adn_Sms_Intelligence_Plugin_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/adn-sms-intelligence-plugin-admin.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'bootstrap.min.css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', PLUGIN_VERSION );
        wp_enqueue_style( 'adn-sms-intelligence-plugin-admin.css', plugin_dir_url( __FILE__ ) . 'css/adn-sms-intelligence-plugin-admin.css', PLUGIN_VERSION );

	}

	/**
	 * Register the JavaScript for the admin area.
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

//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/adn-sms-intelligence-plugin-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'bootstrap.min.js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'jquery.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'jquery.notifyBar.js', plugin_dir_url( __FILE__ ) . 'js/jquery.notifyBar.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'jquery.validate.min.js', plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'adn-sms-intelligence-plugin-admin.js', plugin_dir_url( __FILE__ ) . 'js/adn-sms-intelligence-plugin-admin.js', array( 'jquery' ), PLUGIN_VERSION, true );

	}
    public function ADNsms_add_menu() {
        add_menu_page(
            "ADNsms Intelligence", //page title
            "ADN SMS Intelligence",//menu title
            "manage_options", //admin level (capability)
            "adn-sms-intelligence", //page slug
            array($this,'general_settings_page'), //callback function
            "dashicons-email-alt", //icon url
            61); //menu position

        add_submenu_page(
            "adn-sms-intelligence",
            "General Settings",
            "General Settings",
            "manage_options",
            "adn-sms-intelligence",
            array($this,'general_settings_page')
        );
        add_submenu_page(
            "adn-sms-intelligence",
            "Notification Settings",
            "Notification Settings",
            "manage_options",
            "notification-settings",
            array($this,'notification_settings_page')
        );
    }

    public function notification_settings_page()
    {
        include_once PLUGIN_DIR_PATH."/admin/partials/notification_page.php";
    }
    public function general_settings_page()
    {
        include_once PLUGIN_DIR_PATH."/admin/partials/setting_page.php";
    }
    public function adn_order_status_completed( $order_id ) {

        $order = wc_get_order( $order_id );

        $order_data = $order->get_data(); // The Order data
        $order_id = $order_data['id'];
        $order_parent_id = $order_data['parent_id'];
        $order_status = $order_data['status'];
        $order_currency = $order_data['currency'];
        $order_version = $order_data['version'];
        $order_payment_method = $order_data['payment_method'];
        $order_payment_method_title = $order_data['payment_method_title'];
        $order_payment_method = $order_data['payment_method'];
        $order_payment_method = $order_data['payment_method'];

## Creation and modified WC_DateTime Object date string ##

// Using a formated date ( with php date() function as method)
        $order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');
        $order_date_modified = $order_data['date_modified']->date('Y-m-d H:i:s');

// Using a timestamp ( with php getTimestamp() function as method)
        $order_timestamp_created = $order_data['date_created']->getTimestamp();
        $order_timestamp_modified = $order_data['date_modified']->getTimestamp();


        $order_discount_total = $order_data['discount_total'];
        $order_discount_tax = $order_data['discount_tax'];
        $order_shipping_total = $order_data['shipping_total'];
        $order_shipping_tax = $order_data['shipping_tax'];
        $order_total = $order_data['cart_tax'];
        $order_total_tax = $order_data['total_tax'];
        $order_customer_id = $order_data['customer_id']; // ... and so on

## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

## SHIPPING INFORMATION:

        $order_shipping_first_name = $order_data['shipping']['first_name'];
        $order_shipping_last_name = $order_data['shipping']['last_name'];
        $order_shipping_company = $order_data['shipping']['company'];
        $order_shipping_address_1 = $order_data['shipping']['address_1'];
        $order_shipping_address_2 = $order_data['shipping']['address_2'];
        $order_shipping_city = $order_data['shipping']['city'];
        $order_shipping_state = $order_data['shipping']['state'];
        $order_shipping_postcode = $order_data['shipping']['postcode'];
        $order_shipping_country = $order_data['shipping']['country'];


        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', your order is completed.Thank you for your purchase.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);
//from $order you can get all the item information etc
//above is just a simple example how it works
//your code to send data
    }
    public function adn_order_status_processing( $order_id) {


        $order = wc_get_order( $order_id );

        $order_data = $order->get_data(); // The Order data
        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', your order is under processing.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);

        }
    public function adn_order_status_pending( $order_id) {

        $order = wc_get_order( $order_id );

        $order_data = $order->get_data(); // The Order data

        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', your order is pending.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);


    }
    public function adn_order_status_cancelled( $order_id) {

        $order = wc_get_order( $order_id );

        $order_data = $order->get_data(); // The Order data

        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', your order is pending.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);


    }
    public function adn_order_status_failed( $order_id) {

        $order = wc_get_order( $order_id );

        $order_data = $order->get_data(); // The Order data

        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', your order is failed.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);


    }
    public function adn_order_status_refunded( $order_id) {

        $order = wc_get_order( $order_id );

        $order_data = $order->get_data(); // The Order data

        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', your payment is refunded.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);


    }
    public function adn_order_status_on_hold($order_id){
        $order = wc_get_order( $order_id );

        $order_data = $order->get_data(); // The Order data

        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

        $data['order_id']=$order_id;
        $data['costumer_name']=$order_billing_first_name .' '.$order_billing_last_name;
        $data['phone_number']=$order_billing_phone;
        $data['massage_body']='Hi '. $data['costumer_name'].', your order is on hold.';

        $message = $data['massage_body'];
        $recipient= $data['phone_number'];       // For SINGLE_SMS or OTP
        $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
        $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"

        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);
    }

}
