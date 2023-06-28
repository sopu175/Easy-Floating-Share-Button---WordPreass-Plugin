<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/sopu175/
 * @since             1.0.0
 * @package           Easy_Floating_Share_Button
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Floating Share Button
 * Plugin URI:        https://sopu.live/easy-floating-share-button
 * Description:       Easy Floating Share Button is a powerful and customizable WordPress plugin that adds stylish floating share buttons to your website, making it effortless for visitors to share your content on their favorite social media platforms. Increase your website's reach and engagement with this user-friendly and feature-rich sharing solution.
 * Version:           1.0.0
 * Author:            Saiful Islam
 * Author URI:        https://github.com/sopu175/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-floating-share-button
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EASY_FLOATING_SHARE_BUTTON_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-floating-share-button-activator.php
 */
function activate_easy_floating_share_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-floating-share-button-activator.php';
	Easy_Floating_Share_Button_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-floating-share-button-deactivator.php
 */
function deactivate_easy_floating_share_button() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-easy-floating-share-button-deactivator.php';
	Easy_Floating_Share_Button_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_easy_floating_share_button' );
register_deactivation_hook( __FILE__, 'deactivate_easy_floating_share_button' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-easy-floating-share-button.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_easy_floating_share_button() {

	$plugin = new Easy_Floating_Share_Button();
	$plugin->run();

}
run_easy_floating_share_button();
