<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.ibsofts.com
 * @since      2.1.0
 *
 * @package    Boom_Fest
 * @subpackage Boom_Fest/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      2.1.0
 * @package    Boom_Fest
 * @subpackage Boom_Fest/includes
 * @author     iB Arts Pvt. Ltd. <support@ibarts.in>
 */
class Boom_Fest_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    2.1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'boom-fest',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
