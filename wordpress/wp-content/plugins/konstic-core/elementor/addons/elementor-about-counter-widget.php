<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class About_Counter extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-about-counter-widget';
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
		return esc_html__( 'About Counter', 'konstic-core' );
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
			'about_counter',
			[
				'label' => esc_html__( 'About Counter', 'konstic-core' ),
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
			'image2',
				[
				  'label' => __( 'Image', 'konstic-core' ),
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
			'image3',
				[
				  'label' => __( 'Image', 'konstic-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text3',
			[
				'label'       => __( 'Alt text', 'konstic-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'konstic-core' ),
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
						['block_title' => esc_html__('Projects Completed', 'konstic-core')],
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
						'label' => esc_html__('Image Text', 'konstic-core'),
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
						'block_title3' =>
						[
							'name' => 'block_title3',
							'label' => esc_html__('Title 3', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],					
					

						'block_image2' =>
						[
							'name' => 'block_image2',
							'label' => __( 'Image', 'konstic-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text2' =>
						[
						'name' => 'block_alt_text2',
						'label' => esc_html__('Image Text', 'konstic-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'konstic-core')
						],

						'block_title4' =>
						[
							'name' => 'block_title4',
							'label' => esc_html__('Title 4', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],
						'block_title5' =>
						[
							'name' => 'block_title5',
							'label' => esc_html__('Title 5', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],
						'block_title6' =>
						[
							'name' => 'block_title6',
							'label' => esc_html__('Title 6', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],	

						'block_class' => 					   
						[
						'name' => 'block_class',
						'label' => __( 'Style Options', 'konstic-core' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'style-1' => __( 'Style 1', 'konstic-core' ),
							'style-2' => __( 'Style 2', 'konstic-core' ),
						],
						'default' => 'style-1',
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



	<section class="achivements-section fix">
		<div class="container">
			<div class="achivements-wrapper-2 section-padding">
				<div class="bg-shape">
				<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
				<?php endif;?>
				</div>
				<div class="row g-4">
					<div class="col-lg-6">
						<div class="achivements-content">
							<div class="section-title">
								<h6 class="wow fadeInUp"><i class="fa-regular fa-arrow-left-long"></i><?php echo $settings['subtitle'];?><i class="fa-regular fa-arrow-right-long"></i></h6>
								<h2 class="wow fadeInUp" data-wow-delay=".3s"><?php echo $settings['title'];?></h2>
							</div>
							<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
								<?php echo $settings['button'];?>
								<i class="fa-regular fa-arrow-right"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="achivements-right-items">
							<div class="border-shape">
							<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
								<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
							<?php endif;?>
							</div>
							<?php foreach($settings['repeat'] as $item):?>	
							<div class="achivements-item">
								<div class="counter-items <?php echo esc_attr($item['block_class']); ?> wow fadeInUp" data-wow-delay=".3s">
									<div class="icon">
									<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
									</div>
									<div class="content">
										<h2><span class="count"><?php echo wp_kses($item['block_title'], $allowed_tags);?></span><?php echo wp_kses($item['block_title2'], $allowed_tags);?></h2>
										<p><?php echo wp_kses($item['block_title3'], $allowed_tags);?></p>
									</div>
								</div>
								<div class="counter-items <?php echo esc_attr($item['block_class']); ?> wow fadeInUp" data-wow-delay=".5s">
									<div class="icon">
									<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
									<?php endif;?>
									</div>
									<div class="content">
										<h2><span class="count"><?php echo wp_kses($item['block_title4'], $allowed_tags);?></span><?php echo wp_kses($item['block_title5'], $allowed_tags);?></h2>
										<p><?php echo wp_kses($item['block_title6'], $allowed_tags);?></p>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="man-image float-bob-x ">
		<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
		<?php endif;?>
		</div>
	</section>


             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new About_Counter());