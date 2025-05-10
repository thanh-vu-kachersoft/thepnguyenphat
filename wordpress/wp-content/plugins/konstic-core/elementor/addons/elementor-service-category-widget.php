<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Service_Category extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-service-category-widget';
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
		return esc_html__( 'Service Category', 'konstic-core' );
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
			'service_category',
			[
				'label' => esc_html__( 'Service Category', 'konstic-core' ),
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

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],
						
						'block_button_link' =>
						[
						  'name' => 'block_button_link',
						  'label' => __( 'Button Url', 'konstic-core' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'konstic-core' ),
						  'show_external' => true,
						  'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						  ],
					   ],

					   'block_active' =>
					   [
						'name' => 'block_active',
						'label' => __( 'Show Active', 'konstic-core' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'konstic-core' ),
						'label_off' => __( 'Hide', 'konstic-core' ),
						'return_value' => 'yes',
						'default' => 'yes',
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


	<div class="main-sidebar">
		<div class="single-sidebar-widget">
			<div class="wid-title">
				<h3><?php echo $settings['title'];?></h3>
			</div>
			<div class="news-widget-categories">
				<ul>
					<?php foreach($settings['repeat'] as $item):?>
						<?php  if ( 'yes' === $item['block_active'] ) : ?>
						<li class="active"><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a><span><i class="fa-regular fa-arrow-right-long"></i></span></li>
						
						<?php else: ?>
						
						<li><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a><span><i class="fa-regular fa-arrow-right-long"></i></span></li>
						<?php endif ;?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>				
             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Service_Category());