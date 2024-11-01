<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.thetradedesk.com
 * @since      1.0.1
 *
 * @package    Tiny_Desk_Pixel
 * @subpackage Tiny_Desk_Pixel/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.1
 * @package    Tiny_Desk_Pixel
 * @subpackage Tiny_Desk_Pixel/includes
 * @author     The Trade Desk <alberto.gil@thetradedesk.com>
 */
class Tiny_Desk_Pixel_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tiny-desk-pixel',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
