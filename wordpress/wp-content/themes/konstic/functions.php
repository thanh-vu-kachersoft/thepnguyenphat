<?php
/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package konstic
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package konstic
 * @since 1.0.0
 */

define('KONSTIC_THEME_ROOT', get_template_directory());
define('KONSTIC_THEME_ROOT_URL', get_template_directory_uri());
define('KONSTIC_INC', KONSTIC_THEME_ROOT . '/inc');
define('KONSTIC_THEME_SETTINGS', KONSTIC_INC . '/theme-settings');
define('KONSTIC_THEME_SETTINGS_IMAGES', KONSTIC_THEME_ROOT_URL . '/inc/theme-settings/images');
define('KONSTIC_TGMA', KONSTIC_INC . '/plugins/tgma');
define('KONSTIC_DYNAMIC_STYLESHEETS', KONSTIC_INC . '/theme-stylesheets');
define('KONSTIC_CSS', KONSTIC_THEME_ROOT_URL . '/assets/css');
define('KONSTIC_JS', KONSTIC_THEME_ROOT_URL . '/assets/js');
define('KONSTIC_ASSETS', KONSTIC_THEME_ROOT_URL . '/assets');
define('KONSTIC_DEV', true);


/**
 * Theme Initial File
 * @package konstic
 * @since 1.0.0
 */
if (file_exists(KONSTIC_INC . '/theme-init.php')) {
    require_once KONSTIC_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package konstic
 * @since 1.0.0
 */
if (file_exists(KONSTIC_INC . '/theme-cs-function.php')) {
    require_once KONSTIC_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package konstic
 * @since 1.0.0
 */
if (file_exists(KONSTIC_INC . '/theme-helper-functions.php')) {

    require_once KONSTIC_INC . '/theme-helper-functions.php';
    if (!function_exists('konstic')) {
        function konstic()
        {
            return class_exists('Konstic_Helper_Functions') ? new Konstic_Helper_Functions() : false;
        }
    }
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
    function konstic_theme_fallback_menu()
    {
        get_template_part('template-parts/default', 'menu');
    }
}

// theme-color

if (file_exists(KONSTIC_INC . '/theme-color.php')) {
    require_once KONSTIC_INC . '/theme-color.php';
}



// register_block_style

function konstic_register_block_styles() {
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'fancy-paragraph',
            'label' => __( 'Fancy Paragraph', 'konstic' ),
        )
    );
}
add_action( 'init', 'konstic_register_block_styles' );


// register_block_pattern

function konstic_register_block_patterns() {
    register_block_pattern(
        'konstic/hero-section',
        array(
            'title'       => __( 'Hero Section', 'konstic' ),
            'description' => _x( 'A custom hero section with image and text', 'Block pattern description', 'konstic' ),
            'content'     => '<!-- wp:paragraph --><p>Your content here...</p><!-- /wp:paragraph -->',
        )
    );
}
add_action( 'init', 'konstic_register_block_patterns' );


// custom-header

function konstic_custom_header_setup() {
    add_theme_support( 'custom-header', array(
        'default-image' => get_template_directory_uri() . '/inc/theme-settings/images/header/00.png',
        'width'         => 1000,
        'height'        => 250,
        'flex-width'    => true,
        'flex-height'   => true,
    ) );
}
add_action( 'after_setup_theme', 'konstic_custom_header_setup' );


// custom-background

function konstic_custom_background_setup() {
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );
}
add_action( 'after_setup_theme', 'konstic_custom_background_setup' );


add_theme_support( 'woocommerce' );
add_theme_support( 'woocommerce-page-layouts' );
add_theme_support( 'elementor-pro' );


// Đổi chữ "Read more" thành "Xem thêm" trong WooCommerce Archive Products
add_filter('woocommerce_product_add_to_cart_text', 'custom_woocommerce_product_read_more_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'custom_woocommerce_product_read_more_text');

function custom_woocommerce_product_read_more_text($text) {
    if ($text === 'Read more') {
        return 'Xem thêm';
    }
    return $text;
}

// Đổi tiêu đề "Related products" thành "Sản phẩm tương tự"
add_filter('woocommerce_product_related_products_heading', function($heading) {
    return 'Sản phẩm tương tự';
});