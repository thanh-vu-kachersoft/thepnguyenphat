<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Pricing extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-pricing-widget';
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
		return esc_html__( 'Pricing Widgets', 'konstic-core' );
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
			'pricing',
			[
				'label' => esc_html__( 'Pricing', 'konstic-core' ),
			]
		);	

			$this->add_control(
				'image',
					[
					'label' => __( 'Image', 'konstic-core' ),
					'type' => Controls_Manager::MEDIA,
					'default' => ['url' => Utils::get_placeholder_image_src(),],
					]
			);	
		
			$this->add_control(
				'alt_text',
				[
					'label'       => __( 'Alt text', 'konstic-core' ),
					'type'        => Controls_Manager::TEXTAREA,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => __( 'Enter Your Text', 'konstic-core' ),
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
				'text',
				[
					'label'       => __( 'Description Text', 'konstic-core' ),
					'type'        => Controls_Manager::TEXTAREA,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => __( 'Enter Your Text', 'konstic-core' ),
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

			$this->add_control(
				'image2',
					[
					'label' => __( 'Tag image', 'konstic-core' ),
					'type' => Controls_Manager::MEDIA,
					'default' => ['url' => Utils::get_placeholder_image_src(),],
					]
			);	
		
			$this->add_control(
				'alt_text2',
				[
					'label'       => __( 'Alt text', 'konstic-core' ),
					'type'        => Controls_Manager::TEXTAREA,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => __( 'Enter Your Text', 'konstic-core' ),
				]
			);

			$this->add_control(
				'active_class',
				[
					'label'   => esc_html__( 'Active Options', 'konstic-core' ),
					'type' => Controls_Manager::SELECT,
					'options' => array(
					'active'   => esc_html__( 'Active', 'konstic-core' ),
					'inactive'   => esc_html__( 'Inactive', 'konstic-core' ),
					),
					'default' => 'inactive',
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


<div class="pricing-card-items box-shadow <?php echo esc_attr($settings['active_class']);?>">

	<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?> 
	<div class="tag-img">  
		<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>	
	</div>
	<?php endif;?>

	<div class="pricing-shape">
	<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
		<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
	<?php endif;?>
	</div>
	<div class="pricing-header">
		<h3><?php echo $settings['subtitle'];?></h3>
		<h2><?php echo $settings['title'];?></h2>
	</div>
	<ul class="pricing-list">

		<?php echo $settings['text'];?>

	</ul>
	<div class="header-button">
		<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn style-2"><span></span><?php echo $settings['button'];?> <i class="fa-regular fa-arrow-right"></i></a>
	</div>
</div>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Pricing());