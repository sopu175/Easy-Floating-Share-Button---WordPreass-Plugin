<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/sopu175/
 * @since      1.0.0
 *
 * @package    Easy_Floating_Share_Button
 * @subpackage Easy_Floating_Share_Button/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Easy_Floating_Share_Button
 * @subpackage Easy_Floating_Share_Button/includes
 * @author     Saiful Islam <sopu175@gmail.com>
 */
class Easy_Floating_Share_Button_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'easy-floating-share-button',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
