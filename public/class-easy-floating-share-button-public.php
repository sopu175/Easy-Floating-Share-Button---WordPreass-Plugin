<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/sopu175/
 * @since      1.0.0
 *
 * @package    Easy_Floating_Share_Button
 * @subpackage Easy_Floating_Share_Button/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Floating_Share_Button
 * @subpackage Easy_Floating_Share_Button/public
 * @author     Saiful Islam <sopu175@gmail.com>
 */
class Easy_Floating_Share_Button_Public {

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
		 * defined in Easy_Floating_Share_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Floating_Share_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		// Check if Font Awesome is already loaded
		if (!wp_style_is('font-awesome', 'enqueued')) {
			// Font Awesome is not loaded, enqueue the CSS
			wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3', 'all');
		}
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-floating-share-button-public.css', array(), $this->version, 'all' );

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
		 * defined in Easy_Floating_Share_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Floating_Share_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-floating-share-button-public.js', array( 'jquery' ), $this->version, false );

	}




	function efsb_display_floating_button() {
		require 'partials/easy-floating-share-button-public-display.php';
	}

}
