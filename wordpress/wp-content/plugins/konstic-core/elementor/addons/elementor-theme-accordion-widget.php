<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Theme_Accordion extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-theme-accordion-widget';
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
		return esc_html__( 'Theme Accordion', 'konstic-core' );
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
			'content_section',
			[
				'label' => __( 'Accordion Repeater', 'konstic-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
		  'repeat', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Hello World', 'konstic-core')],
					],
				'fields' => 
					[	

						'block_title' =>

						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],

						'block_subtitle' =>
						
						[
							'name' => 'block_subtitle',
							'label' => esc_html__('Progress Value', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],
						
					],
				'title_field' => '{{block_title}}',
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

<div class="faq-wrapper">
	<div class="faq-accordion ms-0">
		<div class="accordion" id="accordion">
			<?php foreach($settings['repeat'] as $key=>$item):?>
			<div class="accordion-item mb-3">
				<h5 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo esc_attr($key);?>" aria-expanded="true" aria-controls="faq<?php echo esc_attr($key);?>">
						<?php echo wp_kses($item['block_title'], $allowed_tags);?>
					</button>
				</h5>
				<div id="faq<?php echo esc_attr($key);?>" class="accordion-collapse collapse <?php if($key == 1) echo 'show';?>" data-bs-parent="#accordion">
					<div class="accordion-body">
						<?php echo wp_kses($item['block_subtitle'], $allowed_tags);?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>


             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Theme_Accordion());