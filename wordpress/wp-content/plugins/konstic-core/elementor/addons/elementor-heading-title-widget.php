<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Heading_Title extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-heading-title-widget';
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
		return esc_html__( 'Heading Title', 'konstic-core' );
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
			'heading_title',
			[
				'label' => esc_html__( 'Heading Title', 'konstic-core' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'konstic-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'konstic-core' ),
				'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style2']],
			]
		);



		$this->end_controls_section();


		// Section Sub Title Settings ==================
		$this->start_controls_section(
			'section_subtitle_settings',
			[
				'label' => __( 'Section Sub Title Setting', 'konstic-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Show Section Sub Title Control
		$this->add_control(
			'show_section_subtitle',
			[
				'label' => esc_html__( 'Show Section Sub Title', 'konstic-core' ),
				'type'  => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'title' => esc_html__( 'Show', 'konstic-core' ),
						'icon'  => 'eicon-check-circle',
					],
					'none' => [
						'title' => esc_html__( 'Hide', 'konstic-core' ),
						'icon'  => 'eicon-close-circle',
					],
				],
				'default'   => 'show',
				'selectors' => [
					'{{WRAPPER}} .section-title h6' => 'display: {{VALUE}} !important',
				],
			]
		);

		// Section Sub Title Alignment Control
		$this->add_control(
			'section_subtitle_alignment',
			[
				'label'     => esc_html__( 'Alignment', 'konstic-core' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'konstic-core' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'konstic-core' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'konstic-core' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => '',
				'condition' => [
					'show_section_subtitle' => 'show',
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .title-box' => 'text-align: {{VALUE}} !important',
				],
			]
		);

		// Section Sub Title Margin Control
		$this->add_control(
			'section_subtitle_margin',
			[
				'label'     => __( 'Margin', 'konstic-core' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'=> ['px', '%', 'em'],
				'condition' => [
					'show_section_subtitle' => 'show',
				],
				'selectors' => [
					'{{WRAPPER}} .section-title h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			]
		);

		// Section Sub Title Padding Control
		$this->add_control(
			'section_subtitle_padding',
			[
				'label'     => __( 'Padding', 'konstic-core' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units'=> ['px', '%', 'em'],
				'condition' => [
					'show_section_subtitle' => 'show',
				],
				'selectors' => [
					'{{WRAPPER}} .section-title h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			]
		);

		// Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'      => 'section_subtitle_typography',
				'label'     => __( 'Typography', 'konstic-core' ),
				'condition' => [
					'show_section_subtitle' => 'show',
				],
				'selector'  => '{{WRAPPER}} .section-title h6',
			]
		);

		// Section Sub Title Color Control
		$this->add_control(
			'section_subtitle_color',
			[
				'label'     => __( 'Color', 'konstic-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'show_section_subtitle' => 'show',
				],
				'selectors' => [
					'{{WRAPPER}} .section-title h6' => 'color: {{VALUE}} !important',
				],
			]
		);

		// Section Sub Title Background Color Control
		$this->add_control(
			'section_subtitle_bg_color',
			[
				'label'     => __( 'Background Color', 'konstic-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'show_section_subtitle' => 'show',
				],
				'selectors' => [
					'{{WRAPPER}} .section-title h6' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();
		// End of Section Sub Title Setting ==================



	
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

<div class="section-title m-0">
	<h6><i class="fa-sharp fa-solid fa-hammer me-2"></i><?php echo $settings['subtitle'];?></h6>
</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<div class="cta-banner-wrapper p-0">
		<h2>
			<?php echo $settings['title'];?>
		</h2>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Heading_Title());