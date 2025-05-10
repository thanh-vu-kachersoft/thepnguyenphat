<?php
/*
Plugin Name: Konstic Core
Plugin URI: https://themeforest.net/user/gramentheme/portfolio
Description: Plugin to contain short codes and custom post types of the Konstic theme.
Author: Gramentheme
Author URI: https://gramentheme.com/
Version: 1.2.0
Text Domain: konstic-core
*/


/**
 * If this file is called directly, abort.
 * @package konstic
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Plugin directory path
 * @package konstic
 * @since 1.0.0
 */
define( 'KONSTIC_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'KONSTIC_CORE_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'KONSTIC_CORE_SELF_PATH', 'konstic-core/konstic-core.php' );
define( 'KONSTIC_CORE_VERSION', '2.0.1' );
define( 'KONSTIC_CORE_INC', KONSTIC_CORE_ROOT_PATH .'/inc');
define( 'KONSTIC_CORE_LIB', KONSTIC_CORE_ROOT_PATH .'/lib');
define( 'KONSTIC_CORE_ELEMENTOR', KONSTIC_CORE_ROOT_PATH .'/elementor');
define( 'KONSTIC_CORE_DEMO_IMPORT', KONSTIC_CORE_ROOT_PATH .'/demo-import');
define( 'KONSTIC_CORE_ADMIN', KONSTIC_CORE_ROOT_PATH .'/admin');
define( 'KONSTIC_CORE_ADMIN_ASSETS', KONSTIC_CORE_ROOT_URL .'admin/assets');
define( 'KONSTIC_CORE_WP_WIDGETS', KONSTIC_CORE_ROOT_PATH .'/wp-widgets');
define( 'KONSTIC_CORE_ASSETS', KONSTIC_CORE_ROOT_URL .'assets/');
define( 'KONSTIC_CORE_CSS', KONSTIC_CORE_ASSETS .'css');
define( 'KONSTIC_CORE_JS', KONSTIC_CORE_ASSETS .'js');
define( 'KONSTIC_CORE_IMG', KONSTIC_CORE_ASSETS .'img');


/**
 * Load additional helpers functions
 * @package konstic
 * @since 1.0.0
 */
if (!function_exists('konstic_core')){
	require_once KONSTIC_CORE_INC .'/theme-core-helper-functions.php';
	if (!function_exists('konstic_core')){
		function konstic_core(){
			return class_exists('Konstic_Core_Helper_Functions') ? new Konstic_Core_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


/**
 * Load Codestar Framework Functions
 * @package konstic
 * @since 1.0.0
 */
if ( !konstic_core()->is_konstic_active()) {
	if ( file_exists( KONSTIC_CORE_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once KONSTIC_CORE_ROOT_PATH . '/inc/csf-functions.php';
	}
}



/**
 * Core Plugin Init
 * @package konstic
 * @since 1.0.0
 */
if ( file_exists( KONSTIC_CORE_ROOT_PATH . '/inc/theme-core-init.php' ) ) {
	require_once KONSTIC_CORE_ROOT_PATH . '/inc/theme-core-init.php';
}