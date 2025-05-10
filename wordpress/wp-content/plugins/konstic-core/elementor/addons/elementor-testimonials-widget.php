<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Testimonials extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-testimonials-widget';
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
		return esc_html__( 'Testimonials Widget', 'konstic-core' );
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
			'testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'konstic-core' ),
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
					'condition'	=> ['style' => ['style1']],
				]
			);

		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'konstic-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image', 'konstic-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
			]
		);

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Image', 'konstic-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
						['block_title' => esc_html__('Projects Completed', 'konstic-core')],
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
							'label' => esc_html__('Subtitle', 'konstic-core'),
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

						'block_rating' =>
						[
							'name' => 'block_rating',
							'label'   => esc_html__( 'Select Rating', 'konstic-core' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'rat1',
							'options' => array(
								'rat1'   => esc_html__( 'Rating One', 'konstic-core' ),
								'rat2'   => esc_html__( 'Rating Two', 'konstic-core' ),
								'rat3'   => esc_html__( 'Rating Three', 'konstic-core' ),
								'rat4'   => esc_html__( 'Rating Four', 'konstic-core' ),
								'rat5'   => esc_html__( 'Rating Five', 'konstic-core' ),
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

<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

// js code start

if($(".testimonial-slider").length > 0) {
	const testimonialSlider = new Swiper(".testimonial-slider", {
		spaceBetween: 30,
		speed: 2000,
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: ".array-prev",
			prevEl: ".array-next",
		},
	});
}

 if($(".testimonial-slider-2").length > 0) {
	const testimonialSlider2 = new Swiper(".testimonial-slider-2", {
		spaceBetween: 30,
		speed: 2000,
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: ".array-prev",
			prevEl: ".array-next",
		},
		breakpoints: {
			991: {
				slidesPerView: 2,
			},
			767: {
				slidesPerView: 1,
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

	<section class="testimonial-section fix section-padding">
		<div class="arrow-shape">
		<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
		<?php endif;?>
		</div>
		<div class="building-shape float-bob-x">
		<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
		<?php endif;?>
		</div>
		<div class="testimonial-image">
		<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
		<?php endif;?>
		</div>
		<div class="container">
			<div class="testimonial-wrapper">
				<div class="row g-4">
					<div class="col-lg-7">
						<div class="testimonial-content">
							<?php if($settings['title']): ?>
							<div class="section-title">
								<h6 class="wow fadeInUp"><i class="fa-sharp fa-solid fa-hammer me-2"></i><?php echo $settings['subtitle'];?></h6>
								<h2 class="text-white wow fadeInUp" data-wow-delay=".3s"><?php echo $settings['title'];?></h2>
							</div>
							<?php endif; ?>
							<div class="swiper testimonial-slider mt-3 mt-md-0">
								<div class="swiper-wrapper">
									<?php foreach($settings['repeat'] as $item):?>	
									<div class="swiper-slide">
										<div class="testi-content">
											<div class="icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
													<path d="M0 4V28L12 16V4H0Z" fill="#F55B1F"/>
													<path d="M20 4V28L32 16V4H20Z" fill="#F55B1F"/>
												</svg>
												<h4>
													<?php echo wp_kses($item['block_title'], $allowed_tags);?>
												</h4>
											</div>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="client-img-items">
								<div class="client-image-area">
									<?php foreach($settings['repeat'] as $item):?>	
									<div class="client-img">
									<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
									</div>
									<?php endforeach; ?>
								</div>
								<div class="array-button">
									<button class="array-prev"><i class="fa-solid fa-arrow-left-long"></i></button>
									<button class="array-next"><i class="fa-solid fa-arrow-right-long"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6"></div>
				</div>
			</div>
		</div>
	</section>

	<?php  elseif ( 'style2' === $settings['style'] ) : ?>	

		<div class="testimonial-section-2">
			<div class="array-button">
				<button class="array-prev"><i class="fa-solid fa-arrow-left-long"></i></button>
				<button class="array-next"><i class="fa-solid fa-arrow-right-long"></i></button>
			</div>
			<div class="swiper testimonial-slider-2">
				<div class="swiper-wrapper">
					<?php foreach($settings['repeat'] as $item):?>	
					<div class="swiper-slide">
						<div class="testimonial-card-items">
							<?php if(!empty(wp_get_attachment_url($item['block_image3']['id']))): ?>
							<div class="shape-img">
								<img src="<?php echo wp_get_attachment_url($item['block_image3']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text3'], $allowed_tags);?>">
							</div>
							<?php endif;?>
							<p>
								<?php echo wp_kses($item['block_text'], $allowed_tags);?>
							</p>
							<div class="client-info-items">
								<div class="client-info">
								<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
									<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
								<?php endif;?>
									<div class="content">
										<h4><?php echo wp_kses($item['block_title'], $allowed_tags);?></h4>
										<span><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></span>
										<div class="star">
										<?php if ( 'rat1' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat2' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat3' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat4' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="far fa-star"></i>
										<?php elseif ( 'rat5' === $item['block_rating'] ) : ?>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										<?php endif; ?>
										</div>
									</div>
								</div>
								<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
									<img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
								<?php endif;?>
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

Plugin::instance()->widgets_manager->register_widget_type(new Testimonials());