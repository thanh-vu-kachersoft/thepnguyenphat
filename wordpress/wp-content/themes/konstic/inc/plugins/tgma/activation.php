<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme konstic for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/plugins/tgma/theme-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'konstic_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function konstic_register_required_plugins() {

	$plugins = array(

        array(
            'name'         => 'Konstic Core',
            'slug'         => 'konstic-core',
            'source'       => 'https://gramentheme.com/demo-plugin/konstic/konstic-core.zip',
            'required'     => true,
            'version'      => '1.0.0',

        ),
        array(
            'name'         => 'Elementor Page Builder',
            'slug'         => 'elementor',
            'required'     => false,
            'external_url' => 'https://wordpress.org/plugins/elementor/',
        ),
		array(
			'name'         => 'Contact Form 7',
			'slug'         => 'contact-form-7',
			'required'     => false,
			'external_url' => 'http://wordpress.org/plugins/contact-form-7',
		),
        array(
			'name'         => 'MC4WP: Mailchimp for WordPress',
			'slug'         => 'mailchimp-for-wp',
			'required'     => false,
			'external_url' => 'https://wordpress.org/plugins/mailchimp-for-wp/',
		),
		array(
			'name'         => 'One Click Demo Import',
			'slug'         => 'one-click-demo-import',
			'required'     => false,
			'external_url' => 'https://wordpress.org/plugins/one-click-demo-import',
		),
		array(
			'name'         => 'Classic Editor',
			'slug'         => 'classic-editor',
			'required'     => false,
			'external_url' => 'https://wordpress.org/plugins/classic-editor/',
		),
		array(
			'name'         => 'Classic Widgets',
			'slug'         => 'classic-widgets',
			'required'     => false,
			'external_url' => 'https://wordpress.org/plugins/classic-widgets/',
		),
		array(
			'name'         => 'SVG Support',
			'slug'         => 'svg-support',
			'required'     => false,
			'external_url' => 'https://wordpress.org/plugins/svg-support/',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'konstic',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',

	);

	tgmpa( $plugins, $config );
}