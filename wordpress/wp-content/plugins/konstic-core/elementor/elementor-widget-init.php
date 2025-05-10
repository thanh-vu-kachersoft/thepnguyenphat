<?php

/**
 * Elementor Addons Init
 * @package konstic
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly
}

if ( ! class_exists( 'Konstic_Elementor_Widget_Init' ) ) {

	class Konstic_Elementor_Widget_Init {
	   /**
		* $instance
		* @since 1.0.0
		*/
		private static $instance;

	   /**
		* construct()
		* @since 1.0.0
		*/
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array( $this, '_widget_categories' ) );
			//elementor widget registered
			add_action( 'elementor/widgets/widgets_registered', array( $this, '_widget_registered' ) );
			// elementor editor css
			add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'load_assets_for_elementor' ) );

		
		}

		public function i18n() {
			load_plugin_textdomain( 'konstic-core' );
		}

		/**
	     * getInstance()
	     * @since 1.0.0
	     */
		public static function getInstance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * _widget_categories()
		 * @since 1.0.0
		 */
		public function _widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'konstic_widgets',
				[
					'title' => esc_html__( 'Konstic Widgets', 'konstic-core' ),
					'icon'  => 'fas fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 */
		public function _widget_registered() {
			if ( ! class_exists( 'Elementor\Widget_Base' ) ) {
				return;
			}
			$elementor_widgets = array(
				
				'banner-slider',
				'banner',
				'heading-title',
				'theme-image-box',
				'service-grid',
				'theme-button',
				'progress-bar',
				'testimonials',
				'project-grid',
				'theme-accordion',
				'team-grid',
				'contact-form',
				'blog-post',
				'pricing',
				'theme-counter',
				'service-category',
				'service-download',
				'project-info',
				'about-counter',

			);

			$elementor_widgets = apply_filters( 'konstic_elementor_widget', $elementor_widgets );
			ksort( $elementor_widgets );
			if ( is_array( $elementor_widgets ) && ! empty( $elementor_widgets ) ) {
				foreach ( $elementor_widgets as $widget ) {
					if ( file_exists( KONSTIC_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php' ) ) {
						require_once KONSTIC_CORE_ELEMENTOR . '/addons/elementor-' . $widget . '-widget.php';
					}
				}
			}
		}	

		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		*/
		public function load_assets_for_elementor() {
			wp_enqueue_style( 'konstic-core-elementor-style', KONSTIC_CORE_ADMIN_ASSETS . '/css/elementor-editor.css' );
		}

		/**
		 * load custom icons for elementor
		 * @since 1.0.0
		*/

		public function init() {
			add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
		}

		public function init_widgets() {
			require_once plugin_dir_path( __FILE__ ) . '../customicon/icon.php';
		}
	}

	if ( class_exists( 'Konstic_Elementor_Widget_Init' ) ) {
		Konstic_Elementor_Widget_Init::getInstance();
	}
}//end if
