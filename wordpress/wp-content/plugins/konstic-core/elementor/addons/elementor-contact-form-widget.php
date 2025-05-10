<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Contact_Form extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-contact-form-widget';
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
		return esc_html__( 'Contact Form', 'konstic-core' );
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
			'contact_form',
			[
				'label' => esc_html__( 'Contact Form', 'konstic-core' ),
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
				),
			]
		);
		

		$this->add_control(
				'title',
				[
					'label'       => __( 'Title', 'konstic-core' ),
					'type'        => Controls_Manager::TEXTAREA,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your title', 'konstic-core' ),
				]
			);

		$this->add_control(
			'contact_form_7',
			[
				'label'       => __( 'Contact Form 7 Url', 'konstic-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'konstic-core' ),
				'default'     => __( '', 'konstic-core' ),
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

	<div class="contact-wrapper">
		<div class="contact-items">
			<h3><?php echo esc_attr($settings['title']);?></h3>
			<?php echo do_shortcode( $settings['contact_form_7'] );?>
		</div>    
    </div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>
   		<section class="contact-section-22">
            <div class="container">
                <div class="contact-form-items">
                    <div class="title text-center">
                        <h2><?php echo esc_attr($settings['title']);?></h2>
                    </div>
					<?php echo do_shortcode( $settings['contact_form_7'] );?>
                </div>
            </div>
        </section>
<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Contact_Form());