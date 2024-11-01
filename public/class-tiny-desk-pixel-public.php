<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.thetradedesk.com
 * @since      1.0.1
 *
 * @package    Tiny_Desk_Pixel
 * @subpackage Tiny_Desk_Pixel/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tiny_Desk_Pixel
 * @subpackage Tiny_Desk_Pixel/public
 * @author     The Trade Desk <alberto.gil@thetradedesk.com>
 */
class Tiny_Desk_Pixel_Public {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tiny-desk-pixel-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tiny-desk-pixel-public.js', array( 'jquery' ), $this->version, false );

		$advertiserId = get_option('tiny-desk-advertiser-id');
		$pixelId = get_option('tiny-desk-pixel-id');
		$ttdConfig = array( 'advertiserId' => $advertiserId, 'pixelId' => $pixelId );

		wp_localize_script( $this->plugin_name, 'ttdConfig', $ttdConfig );
	}

	/**
	 * Outputs the user pixel code if the conditions are valid
	 *
	 * @since    1.0.1
	 */
	function tiny_desk_add_header_code() {
		// Ignores admin, feed, robots or trackbacks
		if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
			return;
		}

			// Get pixel Id
			$advertiserId = get_option('tiny-desk-advertiser-id');
			$pixelId = get_option('tiny-desk-pixel-id');

			if (empty($advertiserId) || empty($pixelId)) {
				return;
			}

			if (trim($advertiserId) == '' || trim($pixelId) == '') {
				return;
			}

			// Output
			?>
			<script src="https://js.adsrvr.org/up_loader.1.1.0.js" type="text/javascript"></script>
			<script type="text/javascript">
				ttd_dom_ready( function() {
						if (typeof TTDUniversalPixelApi === "function") {
								var universalPixelApi = new TTDUniversalPixelApi();
								universalPixelApi.init('<?php echo wp_unslash($advertiserId) ?>', ['<?php echo wp_unslash($pixelId) ?>'], "https://insight.adsrvr.org/track/up");
						}
				});
			</script>
			<?php
			/*echo wp_unslash('<script type="text/javascript">
				ttd_dom_ready( function() {
						if (typeof TTDUniversalPixelApi === "function") {
								var universalPixelApi = new TTDUniversalPixelApi();
								universalPixelApi.init("' . $advertiserId . '", ["' . $pixelId . '"], "https://insight.adsrvr.org/track/up");
						}
				});
			</script>');*/
	}
}
