<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Banner extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-banner-widget';
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
		return esc_html__( 'Banner', 'konstic-core' );
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
			'banner',
			[
				'label' => esc_html__( 'Banner', 'konstic-core' ),
			]
		);	

		$this->add_control(
			'bg_image',
			[
				'label' => esc_html__('Background image', 'konstic-core'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'button2',
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

	
      <!-- Hero Section Start -->
	  <section class="hero-section hero-2 bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($settings['bg_image']['id']);?>');">
            <div class="hero-image wow fadeInUp" data-wow-delay=".3s">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
            </div>
            <div class="hero-image-2 wow fadeInUp" data-wow-delay=".7s">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
				<?php if($settings['video_link']): ?>
                <div class="video-box">
                    <div class="video-items">
                        <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn video-popup">
                            <i class="fas fa-play"></i>
                        </a>
                        
                        <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-text video-popup">
							<?php echo $settings['button'];?>
                        </a>
                    </div>
                </div>
				<?php endif; ?>
            </div>
            <div class="container">
                <div class="hero-content">
                    <div class="row g-4">
                        <div class="col-xxl-8 wow fadeInUp" data-wow-delay=".5s">
                            <h1>
								<?php echo $settings['title'];?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="hero-text">
                    <p class="wow fadeInUp" data-wow-delay=".3s">
						<?php echo $settings['text'];?>
                    </p>
                    <a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white wow fadeInUp" data-wow-delay=".5s">
						<?php echo $settings['button2'];?>
                        <i class="fa-regular fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Banner());