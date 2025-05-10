<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Project_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-project-grid-widget';
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
		return esc_html__( 'Project Grid', 'konstic-core' );
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
			'project_grid',
			[
				'label' => esc_html__( 'Project Grid', 'konstic-core' ),
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

		$this->end_controls_section();

		// Tab Start - 2

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Project Grid Block', 'konstic-core' ),
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
						'block_style' =>
						[
							'name' => 'block_style',
							'label' => __( 'Select Style', 'konstic-core' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'block_style1' => __( 'Style 1', 'konstic-core' ),
								'block_style2' => __( 'Style 2', 'konstic-core' ),
								'block_style3' => __( 'Style 3', 'konstic-core' ),
								'block_style4' => __( 'Style 4', 'konstic-core' ),
								],
								'default' => 'block_style1',
						],					

						'block_bg_image' =>
						[
							'name' => 'block_bg_image',
							'label' => esc_html__('Background image', 'konstic-core'),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
							'condition' => ['block_style' => ['block_style1', 'block_style2', 'block_style3', 'block_style4']],
						],

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core'),
							'condition' => ['block_style' => ['block_style1', 'block_style2', 'block_style3', 'block_style4']],
						],

						'block_subtitle' =>
						[
							'name' => 'block_subtitle',
							'label' => esc_html__('Subtitle', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core'),
							'condition'	=> ['block_style' => ['block_style2', 'block_style3', 'block_style4']],
						],	

						'block_title2' =>
						[
							'name' => 'block_title2',
							'label' => esc_html__('Title 2', 'konstic-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'konstic-core'),
							'condition'	=> ['block_style' => ['block_style2']],
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
						  'condition' => ['block_style' => ['block_style1', 'block_style2', 'block_style3', 'block_style4']],
					   ],

					   'block_class' => 					   
						[
						'name' => 'block_class',
						'label' => __( 'Hover Options', 'konstic-core' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'active' => __( 'Hover Active', 'konstic-core' ),
							'inactive' => __( 'Hover Inactive', 'konstic-core' ),
						],
						'default' => 'inactive',
						'condition'	=> ['block_style' => ['block_style1']],
						],

						'block_image' => 	
						[
						'name' => 'block_image',
						'label' => __( 'Image', 'konstic-core' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'condition'	=> ['block_style' => ['block_style3']],
						],	

						'block_alt_text' => 	
						[
						'name' => 'block_alt_text',
						'label' => esc_html__('Image Text', 'konstic-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'konstic-core'),
						'condition'	=> ['block_style' => ['block_style3']],
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

if($(".project-slider").length > 0) {
	const projectSlider = new Swiper(".project-slider", {
		spaceBetween: 30,
		speed: 2000,
		loop: true,
		centeredSlides: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".project-dot",
		},
		breakpoints: {
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

	<div class="project-wrapper">
		<div class="main-box">
			<?php foreach($settings['repeat'] as $item):?>	
			<div class="box <?php echo esc_attr($item['block_class']); ?> wow fadeInUp" style="background-image: url(<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>);">
				<div class="project-content">
					<h3><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h3>
					<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="icon"><i class="fa-solid fa-arrow-right"></i></a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>		

   <div class="project-section p-0">
	<div class="project-wrapper-2">
		<div class="swiper project-slider">
			<div class="swiper-wrapper">
				<?php foreach($settings['repeat'] as $item):?>	
				<div class="swiper-slide">
					<div class="project-thumb">
						<img src="<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>" alt="img">
						<div class="project-content">
							<div class="content">
								<h3><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h3>
								<span><i class="fa-sharp fa-solid fa-location-dot"></i> <?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></span>
							</div>
							<h2 class="number"><?php echo wp_kses($item['block_title2'], $allowed_tags);?></h2>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="project-dot"></div>
		</div>
	</div>
	</div>

	<?php  elseif ( 'style3' === $settings['style'] ) : ?>	

		<div class="row g-4">
			<?php foreach($settings['repeat'] as $item):?>	
			<div class="col-xl-4 col-lg-6 col-md-6">
				<div class="project-card-items">
					<div class="project-image">
						<img src="<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>" alt="img">
						<img src="<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>" alt="img">
					</div>
					<div class="project-content">
						<h3><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h3>
						<p>
							<?php echo wp_kses($item['block_subtitle'], $allowed_tags);?>
						</p>
						<a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="theme-btn mt-3 wow fadeInUp" data-wow-delay=".3s"><?php echo wp_kses($item['block_button'], $allowed_tags);?> <i class="fa-regular fa-arrow-right"></i></a>
					</div>
					<div class="shape-img">
					<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
					<?php endif;?>
					</div>					
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<?php  elseif ( 'style4' === $settings['style'] ) : ?>	

		<div class="project-wrapper-new">
            <div class="swiper project-slider">
                <div class="swiper-wrapper">
				<?php foreach($settings['repeat'] as $item):?>	
                    <div class="swiper-slide">
                        <div class="new-project-area">
                            <div class="project-image">
                                <img src="<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>" alt="">
                            </div>
                            <div class="content">
                                <span><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></span>
                                <h4><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h4>                         
                            </div>
                            <div class="arrow-btn">
                                <a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
					<?php endforeach; ?>
                </div>
                <div class="project-dot new mt-4 text-center"></div>
            </div>
        </div>

		<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Project_Grid());