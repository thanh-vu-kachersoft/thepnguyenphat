<?php
/**
 * Theme Init Functions
 * @package konstic
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('Konstic_Init')) {

    class Konstic_Init
    {
       /**
        * $instance
        * @since 1.0.0
        */
        protected static $instance;

        public function __construct()
        {
            /*
             * theme setup
             */
            add_action('after_setup_theme', array($this, 'theme_setup'));
            /**
             * Widget Init
             */
            add_action('widgets_init', array($this, 'theme_widgets_init'));
            /**
             * Theme Assets
             */
            add_action('wp_enqueue_scripts', array($this, 'theme_assets'));
            /**
             * Registers an editor stylesheet for the theme.
             */
            add_action('admin_init', array($this, 'add_editor_styles'));
        }

        /**
         * getInstance()
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Theme Setup
         * @since 1.0.0
         */
        public function theme_setup()
        {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             */
            load_theme_textdomain('konstic', get_template_directory() . '/languages');

            // Add default posts and comments RSS feed links to head.
            add_theme_support('automatic-feed-links');

            /*
             * Let WordPress manage the document title.
             */
            add_theme_support('title-tag');

            /*
             * Enable support for Post Thumbnails on posts and pages.
             *
             * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
             */
            add_theme_support('post-thumbnails');

            // This theme uses wp_nav_menu() in one location.
            register_nav_menus(array(
                'main-menu' => esc_html__('Primary Menu', 'konstic'),
                'main-menu-2' => esc_html__('Primary Menu Two', 'konstic'),
                'category-menu' => esc_html__('Category Menu', 'konstic'),
                'footer-menu' => esc_html__('Footer Menu', 'konstic'),
            ));

            /*
             * Switch default core markup for search form, comment form, and comments
             * to output valid HTML5.
             */
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));

            // Add theme support for selective wp block styles
            add_theme_support("wp-block-styles");
            // Add theme support for selective align wide
            add_theme_support("align-wide");
            // Add theme support for selective responsive embeds
            add_theme_support("responsive-embeds");

            // Add theme support for selective refresh for widgets.
            add_theme_support('customize-selective-refresh-widgets');

            /**
             * Add support for core custom logo.
             *
             * @link https://codex.wordpress.org/Theme_Logo
             */
            add_theme_support('custom-logo', array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            ));

 


            //add theme support for post format
            add_theme_support('post-formats', array('image', 'video', 'gallery', 'link', 'quote'));

            // This variable is intended to be overruled from themes.
            $GLOBALS['content_width'] = apply_filters('konstic_content_width', 740);

            //add image sizes
            add_image_size('konstic_classic', 750, 400, true);
            add_image_size('konstic_grid', 370, 270, true);
            add_image_size('konstic_medium', 550, 380, true);
            add_image_size('konstic-team-slider-one', 450, 460, true);
            add_image_size('konstic-team-classic', 550, 530, true);


            self::load_theme_dependency_files();
        }

        /**
         * Theme Widget Init
         * @since 1.0.0
         * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
         */
        public function theme_widgets_init()
        {
            register_sidebar(array(
                'name' => esc_html__('Sidebar', 'konstic'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Add widgets here.', 'konstic'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-headline style-01">',
                'after_title' => '</h4>',
            ));
            register_sidebar(array(
                'name' => esc_html__('Footer Menu Widget', 'konstic'),
                'id' => 'footer-widget',
                'description' => esc_html__('Add widgets here.', 'konstic'),
                'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="widget-head"><h5>',
                'after_title' => '</h5> </div>',
            ));
            register_sidebar(array(
                'name' => esc_html__('Footer Menu Widget Two', 'konstic'),
                'id' => 'footer-widget-two',
                'description' => esc_html__('Add widgets here.', 'konstic'),
                'before_widget' => '<div id="%1$s" class="single-footer-widget style-margin %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="widget-head"><h5>',
                'after_title' => '</h5> </div>',
            ));
        }

        /**
         * Theme Assets
         * @since 1.0.0
         */
        public function theme_assets()
        {
            self::load_theme_css();
            self::load_theme_js();
        }

      /*
       * Load theme options google fonts css
       * @since 1.0.0
       */

        public static function load_google_fonts() {
            $enqueue_fonts = array();
        
            // Body font enqueue
            $body_font = cs_get_option('_body_font') ? cs_get_option('_body_font') : [];
            $body_font_variant = cs_get_option('body_font_variant') ? cs_get_option('body_font_variant') : array(400, 500, 600, 700);
            $body_font['family'] = isset($body_font['font-family']) && !empty($body_font['font-family']) ? $body_font['font-family'] : 'DM Sans';
            $body_font['font'] = isset($body_font['type']) && !empty($body_font['type']) ? $body_font['type'] : 'google';
        
            $google_fonts = array();
        
            if (!empty($body_font_variant)) {
                foreach ($body_font_variant as $variant) {
                    $google_fonts[] = array(
                        'family' => $body_font['family'],
                        'variant' => $variant,
                        'font' => $body_font['font']
                    );
                }
            }
        
            // Heading font enqueue
            $heading_font_enable = cs_get_option('heading_font_enable') === '0';
            $heading_font = cs_get_option('heading_font') ? cs_get_option('heading_font') : [];
            $heading_font_variant = cs_get_option('heading_font_variant') ? cs_get_option('heading_font_variant') : array(400, 500, 600, 700);
            $heading_font['family'] = isset($heading_font['font-family']) && !empty($heading_font['font-family']) ? $heading_font['font-family'] : 'DM Sans';
            $heading_font['font'] = isset($heading_font['type']) && !empty($heading_font['type']) ? $heading_font['type'] : 'google';
        
            if (!empty($heading_font_variant) && !$heading_font_enable) {
                foreach ($heading_font_variant as $variant) {
                    $google_fonts[] = array(
                        'family' => $heading_font['family'],
                        'variant' => $variant,
                        'font' => $heading_font['font']
                    );
                }
            }
        
            if (!empty($google_fonts)) {
                foreach ($google_fonts as $font) {
                    if (!empty($font['font']) && $font['font'] == 'google') {
                        $variant = (!empty($font['variant']) && $font['variant'] !== 'regular') ? ':' . $font['variant'] : '';
                        if (!empty($font['family'])) {
                            $enqueue_fonts[] = $font['family'] . $variant;
                        }
                    }
                }
            }
        
            $enqueue_fonts = array_unique($enqueue_fonts);
            return $enqueue_fonts;
        }

        /**
         * Load Theme Css
         * @since 1.0.0
         */
        public function load_theme_css()
        {
            $theme_version = KONSTIC_DEV ? time() : konstic()->get_theme_info('version');
            $css_ext = '.css';
            // load google fonts
            $enqueue_google_fonts = self::load_google_fonts();
            if (!empty($enqueue_google_fonts)) {
                wp_enqueue_style('konstic-google-fonts', esc_url(add_query_arg('family', urlencode(implode('|', $enqueue_google_fonts)), '//fonts.googleapis.com/css')), array(), null);
            }
            $all_css_files = array(
                array(
                    'handle' => 'bootstrap',
                    'src' => KONSTIC_CSS . '/bootstrap.min.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'font-awesome',
                    'src' => KONSTIC_CSS . '/all.min.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'animate',
                    'src' => KONSTIC_CSS . '/animate.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'magnific-popup',
                    'src' => KONSTIC_CSS . '/magnific-popup.css',
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'meanmenu',
                    'src' => KONSTIC_CSS . '/meanmenu' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'nice-select',
                    'src' => KONSTIC_CSS . '/nice-select' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),
                array(
                    'handle' => 'swiper-bundle',
                    'src' => KONSTIC_CSS . '/swiper-bundle.min' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),                  
                array(
                    'handle' => 'konstic-main-style',
                    'src' => KONSTIC_CSS . '/main' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),   
                array(
                    'handle' => 'wp-fix',
                    'src' => KONSTIC_CSS . '/wp-fix' . $css_ext,
                    'deps' => array(),
                    'ver' => $theme_version,
                    'media' => 'all',
                ),          
            );
         
            $all_css_files = apply_filters('konstic_theme_enqueue_style', $all_css_files);

            if (is_array($all_css_files) && !empty($all_css_files)) {
                foreach ($all_css_files as $css) {
                    call_user_func_array('wp_enqueue_style', $css);
                }
            }
            wp_enqueue_style('konstic-style', get_stylesheet_uri());

            if (konstic()->is_konstic_core_active()) {
                if (file_exists(KONSTIC_DYNAMIC_STYLESHEETS . '/theme-inline-css-style.php')) {
                    require_once KONSTIC_DYNAMIC_STYLESHEETS . '/theme-inline-css-style.php';
                    require_once KONSTIC_DYNAMIC_STYLESHEETS . '/theme-option-css-style.php';
                    wp_add_inline_style('konstic-style', konstic()->minify_css_lines($GLOBALS['konstic_inline_css']));
                    wp_add_inline_style('konstic-style', konstic()->minify_css_lines($GLOBALS['theme_customize_css']));
                }

            }
        }

        /**
         * Load Theme js
         * @since 1.0.0
         */
        public function load_theme_js()
        {
            // all js files
            wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '5.3.2', true );
            wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '1.0.0', true );
            wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
            wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), '2.0.8', true );
            wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'), '1.0.0', true );
            wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.js', array('jquery'), '4.0.1', true );
            wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '8.3.2', true );
            wp_enqueue_script( 'viewport', get_template_directory_uri() . '/assets/js/viewport.jquery.js', array('jquery'), '1.0.0', true );
            wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.3.0', true );
            wp_enqueue_script( 'konstic-main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), time(), true );

            if (is_singular() && comments_open() && get_option('thread_comments')) {
                wp_enqueue_script('comment-reply');
            }
            
        }

        /**
         * Load THeme Dependency Files
         * @since 1.0.0
         */
        public function load_theme_dependency_files()
        {
            $includes_files = array(
                array(
                    'file-name' => 'activation',
                    'file-path' => KONSTIC_TGMA
                ),
                array(
                    'file-name' => 'theme-breadcrumb',
                    'file-path' => KONSTIC_INC
                ),
                array(
                    'file-name' => 'theme-excerpt',
                    'file-path' => KONSTIC_INC
                ),
                array(
                    'file-name' => 'theme-hook-customize',
                    'file-path' => KONSTIC_INC
                ),
                array(
                    'file-name' => 'theme-comments-modifications',
                    'file-path' => KONSTIC_INC
                ),
                array(
                    'file-name' => 'customizer',
                    'file-path' => KONSTIC_INC
                ),
                array(
                    'file-name' => 'theme-group-fields-cs',
                    'file-path' => KONSTIC_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-group-fields-value-cs',
                    'file-path' => KONSTIC_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-metabox-cs',
                    'file-path' => KONSTIC_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-userprofile-cs',
                    'file-path' => KONSTIC_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-shortcode-option-cs',
                    'file-path' => KONSTIC_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-customizer-cs',
                    'file-path' => KONSTIC_THEME_SETTINGS
                ),
                array(
                    'file-name' => 'theme-option-cs',
                    'file-path' => KONSTIC_THEME_SETTINGS
                ),
            );

            if (is_array($includes_files) && !empty($includes_files)) {
                foreach ($includes_files as $file) {
                    if (file_exists($file['file-path'] . '/' . $file['file-name'] . '.php')) {
                        require_once $file['file-path'] . '/' . $file['file-name'] . '.php';
                    }
                }
            }


        }

        /**
         * Add editor style
         * @since 1.0.0
         */
        public function add_editor_styles()
        {
            add_editor_style(get_template_directory_uri() . '/assets/css/editor-style.css');
        }

    }//end class
    if (class_exists('Konstic_Init')) {
        Konstic_Init::getInstance();
    }
}
