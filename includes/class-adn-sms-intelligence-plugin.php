<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://adnsms.com/
 * @since      1.0.0
 *
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Adn_Sms_Intelligence_Plugin
 * @subpackage Adn_Sms_Intelligence_Plugin/includes
 * @author     ADN SMS <info@adnsms.com>
 */
class Adn_Sms_Intelligence_Plugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Adn_Sms_Intelligence_Plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'adn-sms-intelligence-plugin';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Adn_Sms_Intelligence_Plugin_Loader. Orchestrates the hooks of the plugin.
	 * - Adn_Sms_Intelligence_Plugin_i18n. Defines internationalization functionality.
	 * - Adn_Sms_Intelligence_Plugin_Admin. Defines all hooks for the admin area.
	 * - Adn_Sms_Intelligence_Plugin_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-adn-sms-intelligence-plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-adn-sms-intelligence-plugin-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-adn-sms-intelligence-plugin-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-adn-sms-intelligence-plugin-public.php';

		$this->loader = new Adn_Sms_Intelligence_Plugin_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Adn_Sms_Intelligence_Plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Adn_Sms_Intelligence_Plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Adn_Sms_Intelligence_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        //add menu
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'ADNsms_add_menu' );

        require_once  (ABSPATH.'wp-includes/pluggable.php');

        $user = wp_get_current_user();

        if(isset($user->roles[0]) && ($user->roles[0]=='administrator' || $user->roles[0]=='shop_manager')){

        $this->loader->add_action( 'woocommerce_order_status_completed', $plugin_admin, 'adn_sms_send_order_completed' );
        $this->loader->add_action( 'woocommerce_order_status_pending', $plugin_admin, 'adn_order_status_pending' );
        $this->loader->add_action( 'woocommerce_order_status_processing', $plugin_admin, 'adn_order_status_processing' );
        $this->loader->add_action( 'woocommerce_order_status_cancelled', $plugin_admin, 'adn_order_status_cancelled' );
        $this->loader->add_action( 'woocommerce_order_status_failed', $plugin_admin, 'adn_order_status_failed' );
        $this->loader->add_action( 'woocommerce_order_status_refunded', $plugin_admin, 'adn_order_status_refunded' );
        $this->loader->add_action( 'woocommerce_order_status_on-hold', $plugin_admin, 'adn_order_status_on_hold' );
        }




	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Adn_Sms_Intelligence_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
//		$this->loader->add_action( 'user_register', $plugin_public, 'adn_user_register' );
        require_once  (ABSPATH.'wp-includes/pluggable.php');

        $user = wp_get_current_user();

        if(isset($user->roles[0]) && $user->roles[0]=='customer') {
            $this->loader->add_action('woocommerce_new_order', $plugin_public, 'adn_new_order');
        }
		 $this->loader->add_action( 'password_reset', $plugin_public, 'adn_password_reset' ,10,2);
		 $this->loader->add_action( 'send_sms_after_password_reset', $plugin_public, 'adn_send_sms_after_password_reset' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Adn_Sms_Intelligence_Plugin_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
