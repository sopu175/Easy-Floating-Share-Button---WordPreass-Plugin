<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/sopu175/
 * @since      1.0.0
 *
 * @package    Easy_Floating_Share_Button
 * @subpackage Easy_Floating_Share_Button/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Easy_Floating_Share_Button
 * @subpackage Easy_Floating_Share_Button/admin
 * @author     Saiful Islam <sopu175@gmail.com>
 */
class Easy_Floating_Share_Button_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

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
		 * defined in Easy_Floating_Share_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Floating_Share_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-floating-share-button-admin.css', array(), $this->version, 'all' );

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
		 * defined in Easy_Floating_Share_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Easy_Floating_Share_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-floating-share-button-admin.js', array( 'jquery' ), $this->version, false );

	}


// Add admin menu for Easy Floating Share Button
	function efsb_add_admin_menu() {
		add_menu_page(
			'Easy Floating Share Button',
			'Floating Share Button',
			'manage_options',
			'efsb-settings',
			array($this, 'efsb_settings_page'), // Update the callback to use $this
			'dashicons-share',
			75
		);
	}

// Create settings page for Easy Floating Share Button
	function efsb_settings_page() {
		?>
        <div class="wrap">
            <h1>Easy Floating Share Button</h1>
            <form method="post" action="options.php">
				<?php
				settings_fields( 'efsb_settings' );
				do_settings_sections( 'efsb_settings' );
				submit_button();
				?>
            </form>
        </div>
		<?php
	}


	// Register and define settings for Easy Floating Share Button
	function efsb_register_settings() {
		add_settings_section(
			'efsb_settings_section',
			'General Settings',
			array($this, 'efsb_settings_section_callback'), // Update the callback to use $this
			'efsb_settings'
		);

		add_settings_field(
			'efsb_button_style',
			'Button Style',
			array($this, 'efsb_button_style_callback'), // Update the callback to use $this
			'efsb_settings',
			'efsb_settings_section'
		);
		add_settings_field(
			'efsb_button_style_font',
			'Icon Size',
			array($this, 'efsb_button_stylefont_callback'), // Update the callback to use $this
			'efsb_settings',
			'efsb_settings_section'
		);


		$social_media_platforms = array(
			'facebook' => 'Facebook',
			'linkedin' => 'LinkedIn',
			'skype' => 'Skype',
			'twitter' => 'Twitter',
			'email' => 'Email',
			'printerest' => 'Printerest',
			'whatsapp' => 'WhatsApp',
			'messenger' => 'Messenger',
			'telegram' => 'Telegram',
			// Add more platforms as needed
		);

		foreach ($social_media_platforms as $platform => $label) {
			add_settings_field(
				"efsb_enable_$platform",
				"$label",
				array($this, 'efsb_enable_platform_callback'),
				'efsb_settings',
				'efsb_settings_section',
				array('platform' => $platform)
			);

			register_setting('efsb_settings', "efsb_enable_$platform");
		}



		// Register the option and the callback for saving the value
		register_setting('efsb_settings', 'efsb_enable_floating_icon', 'efsb_save_enable_floating_icon_option');
		register_setting( 'efsb_settings', 'efsb_button_style' );
		register_setting( 'efsb_settings', 'efsb_button_style_font' );
		// Register more settings fields as needed
	}



// Callback function for enabling each social media platform
	function efsb_enable_platform_callback($args) {
		$platform = $args['platform'];
		$option_value = get_option("efsb_enable_$platform");

		echo "<input type='checkbox' id='efsb_enable_$platform' name='efsb_enable_$platform' value='1' " . checked($option_value, 1, false) . ">";
	}

// Callback function for settings section
	function efsb_settings_section_callback() {
		$efsb_enable_floating_icon = get_option('efsb_enable_floating_icon');

		echo '<label for="efsb_enable_floating_icon">';
		echo '<input type="checkbox" id="efsb_enable_floating_icon" name="efsb_enable_floating_icon" value="1" ' . checked($efsb_enable_floating_icon, 1, false) . '>';
		echo 'Enable Floating Icon</label>';
		echo '<h3>Social Media Platforms</h3>';

		$social_media_platforms = array(
			'facebook' => 'Facebook',
			'linkedin' => 'LinkedIn',
			'skype' => 'Skype',
			'twitter' => 'Twitter',
			'email' => 'Email',
			'printerest' => 'Printerest',
			'whatsapp' => 'WhatsApp',
			'messenger' => 'Messenger',
			'telegram' => 'Telegram',
			// Add more platforms as needed
		);

		foreach ($social_media_platforms as $platform => $label) {
			$option_value = get_option("efsb_enable_$platform");
			echo "<label for='efsb_enable_$platform'>";
			echo "<input type='checkbox' id='efsb_enable_$platform' name='efsb_enable_$platform' value='1' " . checked($option_value, 1, false) . ">";
			echo "$label</label><br>";
		}
	}

// Callback function for saving the option value
	function efsb_save_enable_floating_icon_option($input) {
		return isset($input) ? 1 : 0;
	}

// Callback function for button style setting
	function efsb_button_style_callback() {
		$button_style = get_option( 'efsb_button_style' );
		?>
        <select name="efsb_button_style">
            <option value="style1" <?php selected( $button_style, 'style1' ); ?>>Right</option>
            <option value="style2" <?php selected( $button_style, 'style2' ); ?>>Left</option>
            <option value="style3" <?php selected( $button_style, 'style3' ); ?>>Top Left</option>
            <option value="style4" <?php selected( $button_style, 'style4' ); ?>>Bottom Left</option>
            <option value="style5" <?php selected( $button_style, 'style5' ); ?>>Top Right</option>
            <option value="style6" <?php selected( $button_style, 'style6' ); ?>>Bottom Right</option>


        </select>
		<?php
	}// Callback function for button style setting


	function efsb_button_stylefont_callback() {
		$button_style_font = get_option( 'efsb_button_style_font' );

		?>
        <select name="efsb_button_style_font">
            <option value="small" <?php selected( $button_style_font, 'small' ); ?>>Small</option>
            <option value="medium" <?php selected( $button_style_font, 'medium' ); ?>>Medium</option>
            <option value="large" <?php selected( $button_style_font, 'large' ); ?>>Large</option>
        </select>
		<?php
	}

	function efsb_save_button_stylefont_option($input) {
		return $input; // No need for isset check since it's a select field
	}
}
