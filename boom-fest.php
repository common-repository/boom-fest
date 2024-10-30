<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ibsofts.com
 * @since             2.1.0
 * @package           Boom_Fest
 *
 * @wordpress-plugin
 * Plugin Name:       Boom Fest
 * Plugin URI:        https://www.ibsofts.com/plugins/boom-fest
 * Description:       A layout customization plugin for festival season.
 * Version:           2.1.0
 * Author:            iB Softs
 * Author URI:        https://www.ibsofts.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       boom-fest
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 2.1.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOOM_FEST_VERSION', '2.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-boom-fest-activator.php
 */
function activate_boom_fest() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-boom-fest-activator.php';
	Boom_Fest_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-boom-fest-deactivator.php
 */
function deactivate_boom_fest() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-boom-fest-deactivator.php';
	Boom_Fest_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_boom_fest' );
register_deactivation_hook( __FILE__, 'deactivate_boom_fest' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-boom-fest.php';

/**
 * Inclusion of definitions.php
 */
require_once plugin_dir_path( __FILE__ ) . 'definitions.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.1.0
 */
function run_boom_fest() {

	$plugin = new Boom_Fest();
	$plugin->run();

}
run_boom_fest();
