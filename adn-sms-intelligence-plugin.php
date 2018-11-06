<?php

/**
 * @link              https://adnsms.com/
 * @since             1.0.0
 * @package           Adn_Sms_Intelligence_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       ADNsms Intelligence Plugin
 * Plugin URI:        https://adnsms.com/
 * Description:       This is an Intelligence Plugin. By Using this plugin customer can get notification after login registration placing order via sms using ADNsms Intelligence Plugin.
 * Version:           1.0.0
 * Author:            ADN Digital Software Team
 * Author URI:        https://adndigital.com.bd/
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       adn-sms-intelligence-plugin
 */

// If this file is called directly, abort.
use AdnSms\AdnSmsNotification;
if ( ! defined( 'WPINC' ) ) {
	die;
}

if(!defined("PLUGIN_DIR_PATH"))
    define('PLUGIN_DIR_PATH',plugin_dir_path(__FILE__));
if(!defined("PLUGIN_URL"))
    define('PLUGIN_URL',plugins_url()."/adn-sms-intelligence-plugin");
if(!defined("PLUGIN_VERSION"))
    define('PLUGIN_VERSION','1.0.0');

/**
 * Currently plugin version.
 */

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-adn-sms-intelligence-plugin-activator.php
 */
function activate_adn_sms_intelligence_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-adn-sms-intelligence-plugin-activator.php';
	Adn_Sms_Intelligence_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-adn-sms-intelligence-plugin-deactivator.php
 */
function deactivate_adn_sms_intelligence_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-adn-sms-intelligence-plugin-deactivator.php';
	Adn_Sms_Intelligence_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_adn_sms_intelligence_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_adn_sms_intelligence_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-adn-sms-intelligence-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_adn_sms_intelligence_plugin() {

	$plugin = new Adn_Sms_Intelligence_Plugin();
	$plugin->run();

}
run_adn_sms_intelligence_plugin();
