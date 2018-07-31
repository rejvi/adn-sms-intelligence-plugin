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
}
