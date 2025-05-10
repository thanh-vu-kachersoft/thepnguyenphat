<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Banner_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-banner-slider-widget';
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
		return esc_html__( 'Banner Slider', 'konstic-core' );
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
			'banner_slider',
			[
				'label' => esc_html__( 'Banner Slider', 'konstic-core' ),
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
			'play_button',
			[
				'label'       => __( 'Play Button', 'konstic-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your button text', 'konstic-core' ),
				'default' => esc_html__('Read More', 'konstic-core'),
			]
		);	

		$this->add_control(
			'video_link',
			[
			  'label' => __( 'Video Url', 'konstic-core' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'konstic-core' ),
			  'show_external' => true,
			  'default' => [
				'url' => 'https://www.youtube.com/watch?v=Cn4G2lZ_g2I',
				'is_external' => true,
				'nofollow' => true,
			  ],
			
		   ]
		);	

		$this->add_control(
			'image',
				[
				  'label' => __( 'Shape Image', 'konstic-core' ),
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
				  'label' => __( 'Shape Image', 'konstic-core' ),
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
				  'label' => __( 'Shape Image', 'konstic-core' ),
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

<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

// js code start

if($(".hero-slider").length > 0) {
	const heroSlider = new Swiper(".hero-slider", {
		spaceBetween: 30,
		speed: 2000,
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		navigation: {
			prevEl: ".array-prevs",
			nextEl: ".array-nexts",
		},
		breakpoints: {
			1199: {
				slidesPerView: 2,
			},
			991: {
				slidesPerView: 2,
			},
			767: {
				slidesPerView: 2,
			},
			575: {
				slidesPerView: 1,
			},
			0: {
				slidesPerView: 1,
			},
		},
	});
}

// js code end 

  });
</script>';


?>

	<section class="hero-section hero-1 fix">
		<div class="line-shape">
		<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
		<?php endif;?>
		</div>
		<div class="container-fluid">
			<div class="row g-4">
				<div class="col-lg-7">
					<div class="hero-content">
						<div class="vector-shape">
						<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
						<?php endif;?>
						</div>
						<div class="vector-shape-2">
						<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
						<?php endif;?>
						</div>
						<h1 class="wow fadeInUp" data-wow-delay=".3s">
							<?php echo $settings['title'];?>
						</h1>
						<p class="wow fadeInUp" data-wow-delay=".5s">
							<?php echo $settings['text'];?>
						</p>
						<div class="hero-button">
							<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white wow fadeInUp" data-wow-delay=".3s">
								<?php echo $settings['button'];?>
								<i class="fa-regular fa-arrow-right"></i>
							</a>
							<span class="button-text wow fadeInUp" data-wow-delay=".5s">
								<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn video-popup">
									<i class="fa-solid fa-play"></i>
								</a>
								<span class="ms-3 d-line"><?php echo $settings['play_button'];?></span>
							</span>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="hero-image-items">
						<div class="swiper hero-slider">
							<div class="swiper-wrapper">
							<?php foreach($settings['repeat'] as $item):?>	
								<div class="swiper-slide">
									<div class="hero-image">
									<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
									</div>
								</div>
							<?php endforeach; ?>
							</div>
							<div class="array-button">
								<button class="array-prevs">
									
								<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_1_245)">
								<path d="M15.085 6.59957L1.88566 11.3136L15.085 16.0277L12.2566 11.3136L15.085 6.59957Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
								</g>
								<defs>
								<clipPath id="clip0_1_245">
								<rect width="16" height="16" fill="white" transform="matrix(-0.707107 0.707107 0.707107 0.707107 11.3137 0)"/>
								</clipPath>
								</defs>
								</svg>
								
								Previews
								</button>
								<button class="array-nexts">
									Next 

									<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_1_241)">
									<path d="M7.54248 6.59957L20.7418 11.3136L7.54248 16.0277L10.3709 11.3136L7.54248 6.59957Z" stroke="#F55B1F" stroke-linecap="round" stroke-linejoin="round"/>
									</g>
									<defs>
									<clipPath id="clip0_1_241">
									<rect width="16" height="16" fill="white" transform="translate(11.3137) rotate(45)"/>
									</clipPath>
									</defs>
									</svg>

								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Banner_Slider());