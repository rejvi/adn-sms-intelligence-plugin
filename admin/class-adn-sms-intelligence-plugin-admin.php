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
 * @author     ADN Digital Software Team <softwareteam@adndigital.com.bd>
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
        add_submenu_page(
            "adn-sms-intelligence",
            "Custom SMS Send",
            "Custom SMS Send",
            "manage_options",
            "custom-sms-send",
            array($this,'custom_sms_send')
        );
        add_submenu_page(
            "adn-sms-intelligence",
            "SMS Balance",
            "SMS Balance",
            "manage_options",
            "sms-balance",
            array($this,'sms_balance')
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
    public function custom_sms_send()
    {
        include_once PLUGIN_DIR_PATH."/admin/partials/custom_sms_send.php";
    }
    public function sms_balance()
    {
        include_once PLUGIN_DIR_PATH."/admin/partials/sms_balance_info.php";
    }
    public function adn_order_status_completed( $order_id ) {

        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message=$get_settings['completed_msg']; //message body
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
        //send sms
        if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }

    }
    public function adn_order_status_processing( $order_id) {


        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message=$get_settings['processing_msg']; //message body
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
        //send sms
        if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }

        }
    public function adn_order_status_pending( $order_id) {

        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message=$get_settings['pending_msg']; //message body
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
        //send sms
        if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }

    }
    public function adn_order_status_cancelled( $order_id) {

        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message = $get_settings['cancelled_msg']; //message body
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
        //send sms
        if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }

    }
    public function adn_order_status_failed( $order_id) {

        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message=$get_settings['failed_msg']; //message body
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
        //send sms
        if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }
    }
    public function adn_order_status_refunded( $order_id) {

        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message=$get_settings['refunded_msg']; //message body
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
        //send sms
        if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }

    }
    public function adn_order_status_on_hold($order_id){

        $order = wc_get_order( $order_id ); //get order information

        $order_data = $order->get_data(); // get Order data
        $get_settings = get_option('adn_notify_opt');//get and sms send settings option

        $site_name = get_bloginfo( 'name' ); //site name
        $orderID = '#'.$order_id;  //order id
        $amount = $order_data['total'].' '.$order_data['currency'];  //total amount
        $costumer_name = $order_data['billing']['first_name'].' '.$order_data['billing']['last_name']; //customer name

        $message=$get_settings['on_hold_msg']; //message body
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
        //send sms

        if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
        }

	}

    public function adnAjaxNotify(){
    check_ajax_referer('adn_notification_nonce');

    $data=[];
    $data['send_sms_registration'] = $_REQUEST['send_sms_registration'];
    $data['registration_msg'] =  $_REQUEST['registration_msg'];
    $data['send_sms_password_reset'] =  $_REQUEST['send_sms_password_reset'];
    $data['password_reset_msg'] =  $_REQUEST['password_reset_msg'];
    $data['send_sms_new_order'] =  $_REQUEST['send_sms_new_order'];
    $data['new_order_msg'] =  $_REQUEST['new_order_msg'];
    $data['send_sms_on_hold'] =  $_REQUEST['send_sms_on_hold'];
    $data['on_hold_msg'] =  $_REQUEST['on_hold_msg'];
    $data['send_sms_pending'] =  $_REQUEST['send_sms_pending'];
    $data['pending_msg'] =  $_REQUEST['pending_msg'];
    $data['send_sms_processing'] =  $_REQUEST['send_sms_processing'];
    $data['processing_msg'] =  $_REQUEST['processing_msg'];
    $data['send_sms_failed'] =  $_REQUEST['send_sms_failed'];
    $data['failed_msg'] =  $_REQUEST['failed_msg'];
    $data['send_sms_completed'] =  $_REQUEST['send_sms_completed'];
    $data['completed_msg'] =  $_REQUEST['completed_msg'];
    $data['send_sms_cancelled'] =  $_REQUEST['send_sms_cancelled'];
    $data['cancelled_msg'] =  $_REQUEST['cancelled_msg'];
    $data['send_sms_refunded'] =  $_REQUEST['send_sms_refunded'];
    $data['refunded_msg'] =  $_REQUEST['refunded_msg'];


$result = get_option('adn_notify_opt');

if($result != null){
    update_option( 'adn_notify_opt', $data ,'yes');
        echo json_encode(array('status' => 1,'massage'=>'Settings Changed Successfully.' ));
}else{
    add_option( 'adn_notify_opt', $data ,'yes');
    echo json_encode(array('status' => 1,'massage'=>'Settings Saved Successfully.' ));
}
wp_die();
}

public function adnAjaxSettings(){
    check_ajax_referer('adn_settings_nonce');
    $apiKey = $_REQUEST['api_key'];;
    $apiSecrete = $_REQUEST['password'];;
    $config = <<<CONFIG
<?php

if (!defined('API_DOMAIN_URL')) {
  define('API_DOMAIN_URL', 'https://core.adnsms.com');
}

if (!defined('API_KEY')) {
  define('API_KEY', '$apiKey');
}

if (!defined('API_SECRET')) {
  define('API_SECRET', '$apiSecrete');
}

return [
    'domain' => constant("API_DOMAIN_URL"),
    'apiCredentials' => [
        'api_key' => constant("API_KEY"),
        'api_secret' => constant("API_SECRET"),
    ],
    'apiUrl' => [
        'check_balance' => "/api/v1/secure/check-balance",
        'send_sms' => "/api/v1/secure/send-sms",
        'check_campaign_status' => "/api/v1/secure/campaign-status",
        'check_sms_status' => "/api/v1/secure/sms-status",
    ],
];
CONFIG;

file_put_contents(PLUGIN_DIR_PATH . 'library/adn_sms_class/config/config.php',$config);
echo json_encode(array('status' => 1,'massage'=>'Settings Saved Successfully.'));
wp_die();
}

    public function adnAjaxCustomSMS(){
        check_ajax_referer('adn_custom_sms_nonce');
            $message = $_REQUEST['custom_msg'];
        if($_REQUEST['type'] == 'single'){
            $recipient = $_REQUEST['number'];       // For SINGLE_SMS or OTP
            $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
            $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"
            if($recipient != null){
                $sms = new AdnSmsNotification();
                $sms = $sms->sendSms($requestType, $message, $recipient, $messageType);
                $result = json_decode($sms);
             if(isset($result)){
                 if($result->api_response_code==200){
                     echo json_encode(array('status' => 1,'massage'=>'SMS Send Successfully.'));
                 }else{

                     echo json_encode(array('status' => 1,'massage'=> $result->error->error_message));
                 }
             }else{
                 echo json_encode(array('status' => 1,'massage'=>'Something went wrong please try again later'));
             }


            }else{
                echo json_encode(array('status' => 1, 'massage' => 'Please Enter Your Number'));
            }
        }else{
            global $wpdb;

            $myrows = $wpdb->get_results( "SELECT  meta_value FROM $wpdb->usermeta WHERE meta_key='billing_phone'" ,ARRAY_A );
            $new_arr = "";
            foreach ($myrows as $myrow){
                if(is_array($myrow)){
                    $new_arr .= $myrow['meta_value'].',';
                }
            }
            $recipient=substr ( $new_arr , 0 , strlen($new_arr) -1 );// For bulk sms i.e. general campaign
//            echo json_encode(array('status' => 1, 'massage' => $recipient));
            $messageType = 'TEXT'; // option available: "TEXT", "UNICODE"
            $campaignTitle = $_REQUEST['campaign_title']; // set a meaningful campaign title
            if($recipient != null){
            $sms = new AdnSmsNotification();
            $sms=$sms->sendBulkSms($message, $recipient, $messageType, $campaignTitle);

            $result = json_decode($sms);
            if($result->api_response_code == 200){
                echo json_encode(array('status' => 1,'massage'=> $_REQUEST['campaign_title'].' Campaign Successfully Completed.'));
            }else{
                echo json_encode(array('status' => 1,'massage'=> $result->error->error_message));
            }


            }else {
                echo json_encode(array('status' => 1, 'massage' => 'No Number Found.'));
            }

        }

        wp_die();

    }
   public function low_sms_notice() {
        ?>
        <div class="error notice my-acf-notice is-dismissible">
            <p><?php _e( 'Low SMS Balance ! Please Recharge ', '' ); ?></p>
        </div>
        <?php
    }

}
