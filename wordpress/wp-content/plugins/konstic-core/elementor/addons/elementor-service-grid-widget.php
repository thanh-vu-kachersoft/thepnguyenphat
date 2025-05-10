<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Service_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-service-grid-widget';
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
		return esc_html__( 'Service Grid', 'konstic-core' );
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
			'service-grid',
			[
				'label' => esc_html__( 'Service Grid', 'konstic-core' ),
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
					'style4'   => esc_html__( 'Style Four', 'konstic-core' ),
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
					'condition'	=> ['style' => ['style1']],
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
						'label' => esc_html__('Image Text', 'konstic-core'),
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

						'block_image3' =>
						[
							'name' => 'block_image3',
							'label' => __( 'Image', 'konstic-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text3' =>
						[
						'name' => 'block_alt_text3',
						'label' => esc_html__('Image Text', 'konstic-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'konstic-core')
						],

						'block_image4' =>
						[
							'name' => 'block_image4',
							'label' => __( 'Image', 'konstic-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text4' =>
						[
						'name' => 'block_alt_text4',
						'label' => esc_html__('Image Text', 'konstic-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'konstic-core')
						],

						'block_image5' =>
						[
							'name' => 'block_image5',
							'label' => __( 'Image', 'konstic-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text5' =>
						[
						'name' => 'block_alt_text5',
						'label' => esc_html__('Image Text', 'konstic-core'),
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

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],

						'block_text' =>
						[
							'name' => 'block_text',
							'label' => esc_html__('Text', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core')
						],					

						'block_button' =>
						[
							'name' => 'block_button',
							'label'       => __( 'Button', 'konstic-core' ),
							'type'        => Controls_Manager::TEXT,
							'dynamic'     => [
								'active' => true,
							],
							'placeholder' => __( 'Enter your Button Title', 'konstic-core' ),
							'default' => esc_html__('Read More', 'konstic-core'),
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

if($(".service-slider").length > 0) {
	const serviceSlider = new Swiper(".service-slider", {
		spaceBetween: 30,
		speed: 2000,
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".dot",
			clickable: true,
		},
		navigation: {
			nextEl: ".array-prev",
			prevEl: ".array-next",
		},
		breakpoints: {
			1399: {
				slidesPerView: 4,
			},
			1199: {
				slidesPerView: 3,
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

if($(".service-slider-2").length > 0) {
	const serviceSlider2 = new Swiper(".service-slider-2", {
		spaceBetween: 30,
		speed: 2000,
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".service-dot",
		},
		navigation: {
			prevEl: ".array-prev",
			nextEl: ".array-next",
		},
		breakpoints: {
			1399: {
				slidesPerView: 4,
			},
			1199: {
				slidesPerView: 3,
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

<?php  if ( 'style1' === $settings['style'] ) : ?>	

	<section class="service-section fix">
		<?php if($settings['title']): ?>
		<div class="container">
			<div class="section-title text-center">
				<h6 class="wow fadeInUp"><i class="fa-regular fa-arrow-left-long"></i><?php echo $settings['subtitle'];?><i class="fa-regular fa-arrow-right-long"></i></h6>
				<h2 class="wow fadeInUp text-white" data-wow-delay=".3s"><?php echo $settings['title'];?></h2>
			</div>
			<div class="array-button">
				<button class="array-prev"><i class="fa-regular fa-arrow-left-long"></i></button>
				<button class="array-next"><i class="fa-regular fa-arrow-right-long"></i></button>
			</div>
		</div>
		<?php endif; ?>
		<div class="container-fluid">
			<div class="swiper service-slider">
				<div class="swiper-wrapper">
					<?php foreach($settings['repeat'] as $item):?>	
					<div class="swiper-slide">
						<div class="service-box-items">
							<div class="service-thumb">
							<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
								<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
							<?php endif;?>
								<div class="icon">
								<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
									<img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
								<?php endif;?>
								</div>
							</div>
							<div class="service-content">
								<h2 class="number"><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></h2>
								<h3><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h3>
								<p>
									<?php echo wp_kses($item['block_text'], $allowed_tags);?>
								</p>
								<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="link-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?> <i class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>		

	<div class="swiper service-slider-2">
		<div class="swiper-wrapper">
			<?php foreach($settings['repeat'] as $item):?>	
			<div class="swiper-slide">
				<div class="service-card-items">
					<div class="service-image">
					<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
					<?php endif;?>
					</div>
					<div class="bar-shape">
					<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
					<?php endif;?>
					</div>
					<div class="icon">
					<?php if(!empty(wp_get_attachment_url($item['block_image3']['id']))): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image3']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text3'], $allowed_tags);?>">
					<?php endif;?>
					</div>
					<div class="content">
						<h3><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h3>
						<p>
							<?php echo wp_kses($item['block_text'], $allowed_tags);?>
						</p>
						<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="link-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?> <i class="fa-solid fa-arrow-right"></i></a>
					</div>
					<div class="items-shape">
					<?php if(!empty(wp_get_attachment_url($item['block_image4']['id']))): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image4']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text4'], $allowed_tags);?>">
					<?php endif;?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="swiper-dot mt-5">
			<div class="dot"></div>
		</div>
	</div>

	<div class="service-section p-0 m-0">
	<div class="container">
		<div class="service-pagi-items">
			<div class="service-dot"></div>
			<div class="array-buttons">
				<button class="array-prev"><i class="fa-solid fa-arrow-left-long"></i></button>
				<button class="array-next"><i class="fa-solid fa-arrow-right-long"></i></button>
			</div>
		</div>
	</div>
	</div>

	<?php  elseif ( 'style3' === $settings['style'] ) : ?>	

		<div class="row">
			<?php foreach($settings['repeat'] as $item):?>	
			<div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
				<div class="service-box-items items-bg">
					<div class="service-thumb">
						<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
							<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
						<?php endif;?>
						<div class="icon">
						<?php if(!empty(wp_get_attachment_url($item['block_image3']['id']))): ?>
							<img src="<?php echo wp_get_attachment_url($item['block_image3']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text3'], $allowed_tags);?>">
						<?php endif;?>
						</div>
					</div>
					<div class="service-content">
						<h2 class="number"><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></h2>
						<h3><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h3>
						<p>
							<?php echo wp_kses($item['block_text'], $allowed_tags);?>
						</p>
						<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="theme-btn wow fadeInUp" data-wow-delay=".3s"><?php echo wp_kses($item['block_button'], $allowed_tags);?> <i class="fa-regular fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<?php  elseif ( 'style4' === $settings['style'] ) : ?>	

		<div class="">
			<div class="swiper service-slider-2 new fix">
				<div class="swiper-wrapper">
					<?php foreach($settings['repeat'] as $item):?>	
					<div class="swiper-slide">
						<div class="new-service-card-items">
							<div class="service-image">
							<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
								<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
							<?php endif;?>
							</div>                       
							<div class="content">
								<div class="bar-shape">
									<div class="shape-box">
									<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
										<img class="shape-1" src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
									<?php endif;?>
									<?php if(!empty(wp_get_attachment_url($item['block_image3']['id']))): ?>
										<img class="shape-2" src="<?php echo wp_get_attachment_url($item['block_image3']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text3'], $allowed_tags);?>">
									<?php endif;?>
									</div>
								</div>                             
								<div class="items-shape">
									<?php if(!empty(wp_get_attachment_url($item['block_image4']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image4']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text4'], $allowed_tags);?>">
									<?php endif;?>
								</div>
								<div class="icon">
									<?php if(!empty(wp_get_attachment_url($item['block_image5']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image5']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text5'], $allowed_tags);?>">
									<?php endif;?>
								</div>
								<h3><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h3>
								<p class="mb-3">
									<?php echo wp_kses($item['block_text'], $allowed_tags);?>
								</p>
								<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="theme-btn wow fadeInUp" data-wow-delay=".3s"><?php echo wp_kses($item['block_button'], $allowed_tags);?> <i class="fa-regular fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Service_Grid());