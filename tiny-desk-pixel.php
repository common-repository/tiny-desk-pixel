<?php

/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.thetradedesk.com
 * @since             1.0.1
 * @package           Tiny_Desk_Pixel
 *
 * @wordpress-plugin
 * Plugin Name:       Tiny Desk Pixel
 * Plugin URI:        www.thetradedesk.com
 * Description:       It helps you add easily your tracking tag from Tiny Desk by just giving your advertiser id and pixel id.
 * Version:           1.0.5
 * Author:            The Trade Desk
 * Author URI:        https://profiles.wordpress.org/thetinydesk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tiny-desk-pixel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TINY_DESK_PIXEL_VERSION', '1.0.5' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tiny-desk-pixel-activator.php
 */
function activate_tiny_desk_pixel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tiny-desk-pixel-activator.php';
	Tiny_Desk_Pixel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tiny-desk-pixel-deactivator.php
 */
function deactivate_tiny_desk_pixel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tiny-desk-pixel-deactivator.php';
	Tiny_Desk_Pixel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tiny_desk_pixel' );
register_deactivation_hook( __FILE__, 'deactivate_tiny_desk_pixel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tiny-desk-pixel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.1
 */
function run_tiny_desk_pixel() {
	$plugin = new Tiny_Desk_Pixel();
	$plugin->run();
}

run_tiny_desk_pixel();
