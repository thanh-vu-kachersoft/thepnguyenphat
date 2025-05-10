<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Theme_Image_Box extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-theme-image-box-widget';
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
		return esc_html__( 'Theme Image Box', 'konstic-core' );
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
			'theme_image_box',
			[
				'label' => esc_html__( 'Theme Image Box', 'konstic-core' ),
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
				),
			]
		);
		
		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'konstic-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2','style3']],
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
				'condition'	=> ['style' => ['style1','style2','style3']],
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image', 'konstic-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2','style3']],
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
				'condition'	=> ['style' => ['style1','style2','style3']],
			]
		);

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Image', 'konstic-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1','style2']],
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
				'condition'	=> ['style' => ['style1','style2']],
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
			  'condition'	=> ['style' => ['style1','style2']],
			
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
				'condition'	=> ['style' => ['style2']],
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

	
<?php  if ( 'style1' === $settings['style'] ) : ?>

    <div class="about-wrapper">
		<div class="about-image">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img class="wow fadeInLeft" data-wow-delay=".3s" src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
			<div class="about-image-2 wow fadeInUp" data-wow-delay=".5s">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
				<div class="video-box">
					<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn video-popup">
						<i class="fas fa-play"></i>
					</a>
				</div>
			</div>
			<div class="about-line-shape">
			<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
			<?php endif;?>
			</div>
		</div>
    </div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<div class="about-wrapper-2">
		<div class="about-image">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img class="wow fadeInLeft" data-wow-delay=".3s" src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
			<div class="about-image-2 wow fadeInUp" data-wow-delay=".5s">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
			</div>
			<div class="video-items wow fadeInUp">
				<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-btn video-popup">
					<i class="fas fa-play"></i>
				</a>
				
				<a href="<?php echo esc_url($settings['video_link']['url']);?>" class="video-text video-popup">
					<?php echo $settings['button'];?>
				</a>
			</div>
			<div class="bar-shape">
			<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
			<?php endif;?>
			</div>
		</div>
	</div>

	<?php  elseif ( 'style3' === $settings['style'] ) : ?>

		<div class="achivements-wrapper">
			<div class="achivements-image">
				<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
					<img class="wow fadeInLeft" data-wow-delay=".3s" src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
				<?php endif;?>
				<div class="achivements-image-2 float-bob-y">
				<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
				<?php endif;?>
				</div>
			</div>
        </div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Theme_Image_Box());