<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Theme_Button extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-theme-button-widget';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Theme Button', 'konstic-core' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-flash';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories()
    {
        return ['konstic_widgets'];
    }
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// Tab Start - 1

		$this->start_controls_section(
			'theme_button',
			[
				'label' => esc_html__( 'Theme Button', 'konstic-core' ),
			]
		);	
		
		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Select Style', 'konstic-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => array(
					'style1'   => esc_html__( 'Style One', 'konstic-core' ),
					'style2'   => esc_html__( 'Style Two', 'konstic-core' ),
					'style3'   => esc_html__( 'Style Three', 'konstic-core' ),
					'style4'   => esc_html__( 'Slider Arrow', 'konstic-core' ),
				),
			]
		);
		
		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'konstic-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your button text', 'konstic-core' ),
				'default' => esc_html__('Read More', 'konstic-core'),
			]
		);	

		$this->add_control(
			'button_link',
			[
			  'label' => __( 'Button Url', 'konstic-core' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'konstic-core' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			  ],
			
		   ]
		);



		$this->end_controls_section();

	
		}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>

	
<?php  if ( 'style1' === $settings['style'] ) : ?>

    <a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white">
		<?php echo $settings['button'];?>
		<i class="fa-regular fa-arrow-right"></i>
	</a>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn"><?php echo $settings['button'];?> <i class="fa-regular fa-arrow-right"></i></a>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

	<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn hover-new"><?php echo $settings['button'];?> <i class="fa-regular fa-arrow-right"></i></a>

<?php  elseif ( 'style4' === $settings['style'] ) : ?>

	<div class="array-button">
		<button class="array-next me-2"><i class="fal fa-arrow-left"></i></button>
		<button class="array-prev"><i class="fal fa-arrow-right"></i></button>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Theme_Button());