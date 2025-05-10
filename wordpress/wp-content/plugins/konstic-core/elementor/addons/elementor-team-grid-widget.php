<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */ 
 
class Team_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'konstic-team-grid-widget';
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
		return esc_html__( 'Team Grid', 'konstic-core' );
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
			'team_grid',
			[
				'label' => esc_html__( 'Team Grid', 'konstic-core' ),
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
			'show_area',
			[
				'label' => __( 'Show Socials Icon', 'konstic-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'konstic-core' ),
				'label_off' => __( 'Hide', 'konstic-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	
	
		$this->add_control(
			'active_class',
			[
				'label'   => esc_html__( 'Hover Options', 'konstic-core' ),
				'type' => Controls_Manager::SELECT,
				'options' => array(
				'active'   => esc_html__( 'Hover Active', 'konstic-core' ),
				'inactive'   => esc_html__( 'Hover Inactive', 'konstic-core' ),
				),
				'default' => 'inactive',
			]
		);

		$this->end_controls_section();

		// Tab Start - 2

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Team Grid Block', 'konstic-core' ),
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

						'block_icons' =>
						[
							'name' => 'block_icons',
							'label' => esc_html__('Enter The icons', 'konstic-core'),
							'type' => Controls_Manager::ICONS,							
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



<?php  if ( 'style1' === $settings['style'] ) : ?>	

	<div class="team-card-items <?php echo esc_attr($settings['active_class']);?>">
		<div class="team-image">
		<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
		<?php endif;?>

		<?php  if ( 'yes' === $settings['show_area'] ) : ?>
	
			<div class="social-icon d-flex align-items-center">
			<?php foreach($settings['repeat'] as $item):?>	
				<a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="<?php echo str_replace("icon ", " ", esc_attr( $item['block_icons']['value']));?>"></i></a>
			<?php endforeach; ?>
			</div>

		<?php endif ;?>	

		</div>
		<div class="team-content">
			<span><?php echo $settings['subtitle'];?></span>
			<h3><a href="<?php echo esc_url($settings['button_link']['url']);?>"><?php echo $settings['title'];?></a></h3>
		</div>
	</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>		

	<div class="team-box-items <?php echo esc_attr($settings['active_class']);?>">
		<?php  if ( 'yes' === $settings['show_area'] ) : ?>
		<div class="social-icon d-grid align-items-center">
			<?php foreach($settings['repeat'] as $item):?>	
				<a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="<?php echo str_replace("icon ", " ", esc_attr( $item['block_icons']['value']));?>"></i></a>
			<?php endforeach; ?>
		</div>
		<?php endif ;?>	
		<div class="team-image">
		<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
			<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
		<?php endif;?>
		</div>
		<div class="team-content">
			<h5><a href="<?php echo esc_url($settings['button_link']['url']);?>"><?php echo $settings['title'];?></a></h5>
			<p><?php echo $settings['subtitle'];?></p>
			<a href="team-details" class="icon"><i class="fa-sharp fa-regular fa-square-up-right"></i></a>
		</div>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Team_Grid());