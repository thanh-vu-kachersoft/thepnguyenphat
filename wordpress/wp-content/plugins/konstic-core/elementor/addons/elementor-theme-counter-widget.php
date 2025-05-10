<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Theme_Counter extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-theme-counter-widget';
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
		return esc_html__( 'Theme Counter', 'konstic-core' );
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
			'theme_counter',
			[
				'label' => esc_html__( 'Theme Counter', 'konstic-core' ),
			]
		);	

		$this->end_controls_section();

		// Tab Start - 2

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Block', 'konstic-core' ),
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

						'block_image' =>
						[
							'name' => 'block_image',
							'label' => __( 'Image', 'konstic-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text' =>
						
						[
						'name' => 'block_alt_text',
						'label' => esc_html__('Image Alt Text', 'konstic-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'konstic-core')
						],	

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],
						
						'block_title2' =>
						[
							'name' => 'block_title2',
							'label' => esc_html__('Title 2', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],
						
						'block_subtitle' =>
						
						[
							'name' => 'block_subtitle',
							'label' => esc_html__('Subtitle', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],

						[
							'name' => 'block_column',
							'label'   => esc_html__( 'Column', 'konstic-core' ),
							'type'    => Controls_Manager::SELECT,
							'default' => '6',
							'options' => array(
								'12'   => esc_html__( 'One Column', 'konstic-core' ),
								'6'   => esc_html__( 'Two Column', 'konstic-core' ),
								'4'   => esc_html__( 'Three Column', 'konstic-core' ),
								'3'   => esc_html__( 'Four Column', 'konstic-core' ),
								'2'   => esc_html__( 'Six Column', 'konstic-core' ),
							),
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


	<div class="achivements-wrapper">
		<div class="row">
			<?php foreach($settings['repeat'] as $item):?>	
			<div class="col-lg-<?php echo esc_attr($item['block_column'], true );?> wow fadeInUp" data-wow-delay=".3s">
				<div class="achivements-content">
					<div class="counter-items">
						<div class="content">
							<div class="icon">
								<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
									<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
								<?php endif;?>
							</div>
							<h2><span class="count"><?php echo wp_kses($item['block_title'], $allowed_tags);?></span><?php echo wp_kses($item['block_title2'], $allowed_tags);?></h2>
							<p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>


             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Theme_Counter());