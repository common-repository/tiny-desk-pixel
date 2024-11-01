<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.thetradedesk.com
 * @since      1.0.1
 *
 * @package    Tiny_Desk_Pixel
 * @subpackage Tiny_Desk_Pixel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tiny_Desk_Pixel
 * @subpackage Tiny_Desk_Pixel/admin
 * @author     The Trade Desk <alberto.gil@thetradedesk.com>
 */
class Tiny_Desk_Pixel_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.1
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
	 * @since    1.0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tiny_Desk_Pixel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tiny_Desk_Pixel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tiny-desk-pixel-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tiny_Desk_Pixel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tiny_Desk_Pixel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tiny-desk-pixel-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Adding Admin menu
	 *
	 * @since    1.0.1
	 */
	function tiny_desk_add_menu() {
		add_submenu_page ( 'options-general.php', 'Tiny Desk Pixel', 'Tiny Desk Pixel', 'manage_options', 'tiny-desk-pixel', array($this, 'tiny_desk_settings_page'));
	}

	/**
	 * Settings Page
	 *
	 * @since    1.0.1
	 */
	function tiny_desk_settings_page() {
		?>
		<div class='wrap'>
			<h1>Tiny Desk Pixel Configuration 3</h1>
	
			<form method='post' action='options.php'>
		<?php
			settings_fields('tiny_desk_pixel_config');
		?>
			<p>Type your given advertiser id and pixel id to start tracking the interaction on you website.</p>
		<?php
			do_settings_sections('tiny-desk-pixel');
			submit_button();
		?>
			</form>
		</div>
		<?php
	}

	/**
	 * 
	 *
	 * @since    1.0.1
	 */
	function tiny_desk_settings() {
		add_settings_section('tiny_desk_pixel_config', '', null, 'tiny-desk-pixel');
		add_settings_field('tiny-desk-advertiser-id', 'Advertiser Id', array($this, 'tiny_desk_advertiser_id_input'), 'tiny-desk-pixel', 'tiny_desk_pixel_config');
		add_settings_field('tiny-desk-pixel-id', 'Pixel Id', array($this, 'tiny_desk_pixel_id_input'), 'tiny-desk-pixel', 'tiny_desk_pixel_config');
		register_setting('tiny_desk_pixel_config', 'tiny-desk-advertiser-id');
		register_setting('tiny_desk_pixel_config', 'tiny-desk-pixel-id');
	}

	/**
	 * Advertiser Id input
	 *
	 * @since    1.0.1
	 */
	function tiny_desk_advertiser_id_input() {
		?>
			<input type='text' name='tiny-desk-advertiser-id'
				value='<?php
			echo stripslashes_deep(esc_attr(get_option('tiny-desk-advertiser-id'))); ?>' />
		<?php
	}

	/**
	 * PIxel Id Input
	 *
	 * @since    1.0.1
	 */
	function tiny_desk_pixel_id_input() {
		?>
			<input type='text' name='tiny-desk-pixel-id'
				value='<?php
			echo stripslashes_deep(esc_attr(get_option('tiny-desk-pixel-id'))); ?>' />
		<?php
	}
}
