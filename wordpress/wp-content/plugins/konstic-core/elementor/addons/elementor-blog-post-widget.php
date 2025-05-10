<?php
/**
 * Elementor Widget
 * @package Konstic
 * @since 1.0.0
 */

namespace Elementor;

class Blog_Post extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'konstic-blog-post-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Blog Post', 'konstic-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-post';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['konstic_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'konstic-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
        
        $this->add_control('blog_grid', [
            'label' => esc_html__('Blog Grid', 'konstic-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'konstic-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'konstic-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'konstic-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'konstic-core'),
                'col-lg-12' => esc_html__('col-lg-12', 'konstic-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Blog Grid', 'konstic-core')
        ]);   
        
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
            'word_limit',
            [
                'label' => esc_html__('Word Limit', 'konstic-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
                'description' => esc_html__('Set the number of words to display from the post content.', 'konstic-core'),
            ]
        );

        $this->add_control(
            'more_text',
            [
                'label' => esc_html__('More Text', 'konstic-core'),
                'type' => Controls_Manager::TEXT,
                'default' => '...',
                'description' => esc_html__('Set the text to append after the trimmed words, e.g., "Read More". Leave blank for no text.', 'konstic-core'),
            ]
        );
   
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'konstic-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('offset', [
            'label' => esc_html__('Offset Posts', 'konstic-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '0',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'konstic-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => konstic_core()->get_terms_names('category', 'id'),
            'description' => esc_html__('Select category as you want, leave it blank for all categories', 'konstic-core'),
        ]);        

        $this->add_control('order', [
            'label' => esc_html__('Order', 'konstic-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'konstic-core'),
                'DESC' => esc_html__('Descending', 'konstic-core'),
            ),
            'default' => 'DESC',
            'description' => esc_html__('select order', 'konstic-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'konstic-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'konstic-core'),
                'title' => esc_html__('Title', 'konstic-core'),
                'date' => esc_html__('Date', 'konstic-core'),
                'rand' => esc_html__('Random', 'konstic-core'),
                'comment_count' => esc_html__('Most Comments', 'konstic-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'konstic-core')
        ]);      
        
           $this->add_control(
            'image_thumb_display',
            [
                'label' => esc_html__('Image Display', 'konstic-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'konstic-core'),
                'condition'	=> ['style' => ['style2','style3']],
            ]
        );
        
        $this->add_control(
            'thumb_date',
            [
                'label' => esc_html__('Thumb Date Show/Hide', 'konstic-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'konstic-core'),
            ]
        );
      
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'konstic-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'konstic-core'),
                'default' => 'no',
                'condition'	=> ['style' => ['style1','style3']],
            ]
        );
        
          $this->add_control(
            'category_display',
            [
                'label' => esc_html__('Category Display', 'konstic-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('Show  Or Hide Category.', 'konstic-core'),
            ]
        );

          $this->add_control(
            'tag_display',
            [
                'label' => esc_html__('Tags Display', 'konstic-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('Show  Or Hide Tags.', 'konstic-core'),
            ]
        );
        
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'konstic-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'start' => esc_html__('Left Align', 'konstic-core'),
                    'center' => esc_html__('Center Align', 'konstic-core'),
                    'end' => esc_html__('Right Align', 'konstic-core'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'konstic-core'),
                'default' => 'start',
                'condition' => array('pagination' => 'yes'),
            ]
        );
        $this->end_controls_section();


    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $rand_numb = rand(333, 999999999);
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        $offset = $settings['offset'];
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query       

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'paged' => $paged, // Use paged instead of offset
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );
        
        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        
        $post_data = new \WP_Query($args);
        

        ?>

        
        <?php  if ( 'style1' === $settings['style'] ) : ?>

        <div class="row">
            <?php while ($post_data->have_posts()):$post_data->the_post(); 
                $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'konstic_grid_blog_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
            ?> 
            <div class="<?php echo esc_attr($settings['blog_grid']); ?>">
                <div class="news-image-items bg-cover" style="background-image: url('<?php echo esc_url($img_url); ?>');">
                    <div class="news-content">
                        <ul>
                            <li>
                                <i class="fa-regular fa-user"></i>
                                By <?php the_author(); ?>
                            </li>
                            <?php if(!empty($settings['tag_display'])) : ?>
                            <li>
                                <i class="fas fa-tag"></i> 
                                <?php
                                    $post_tags = get_the_tags();
                                    if ($post_tags) {
                                        $first_tag = reset($post_tags);
                                        echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                    } else {
                                        echo "No tags found";
                                    }
                                ?>                       
                            </li>
                            <?php endif; ?>

                            <?php if(!empty($settings['category_display'])) : ?>
                            <li>
                                <i class="fa-solid fa-folder-open"></i> 
                                <?php
                                    $post_category = get_the_category();
                                    if ($post_category) {
                                        $first_category = reset($post_category);
                                        echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                    } else {
                                        echo "No category found";
                                    }
                                ?>                       
                            </li>
                            <?php endif; ?>

                            <?php if(!empty($settings['thumb_date'])) : ?>
                            <li>
                                <i class="fa-solid fa-calendar-days"></i> 
                                <?php echo get_the_date('F j, Y');?>                    
                            </li>
                            <?php endif; ?>

                        </ul>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-white">
                            <?php print wp_trim_words(get_the_content(), $settings['word_limit'], $settings['more_text']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            ?>
            <?php if (!$pagination) { ?>
                <div class="col-lg-12">
                    <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?> margin-top-20">
                        
                            <?php konstic()->post_pagination($post_data); ?>

                    </div>
                </div>
            <?php } ?>
        </div>


        <?php  elseif ( 'style2' === $settings['style'] ) : ?>

        <div class="row">
            <div class="<?php echo esc_attr($settings['blog_grid']); ?>">
                <div class="news-right-items">
                    <?php while ($post_data->have_posts()):$post_data->the_post(); 
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'konstic_grid_blog_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                    ?> 
                    <div class="news-card-items">
                        <div class="news-content">
                            <ul>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By <?php the_author(); ?>
                                </li>
                                <?php if(!empty($settings['tag_display'])) : ?>
                                <li>
                                    <i class="fas fa-tag"></i> 
                                    <?php
                                        $post_tags = get_the_tags();
                                        if ($post_tags) {
                                            $first_tag = reset($post_tags);
                                            echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                        } else {
                                            echo "No tags found";
                                        }
                                    ?>                       
                                </li>
                                <?php endif; ?>

                                <?php if(!empty($settings['category_display'])) : ?>
                                <li>
                                    <i class="fa-solid fa-folder-open"></i> 
                                    <?php
                                        $post_category = get_the_category();
                                        if ($post_category) {
                                            $first_category = reset($post_category);
                                            echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                        } else {
                                            echo "No category found";
                                        }
                                    ?>                       
                                </li>
                                <?php endif; ?>
                                <?php if(!empty($settings['thumb_date'])) : ?>
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i> 
                                    <?php echo get_the_date('F j, Y');?>                    
                                </li>
                                <?php endif; ?>
                            </ul>
                            <h4>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <p>
                                <?php print wp_trim_words(get_the_content(), $settings['word_limit'], $settings['more_text']); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="link-btn"><?php echo $settings['button'];?> <i class="fa-regular fa-arrow-right-long"></i></a>
                        </div>
                        <?php if(!empty($settings['image_thumb_display'])) : ?>
                        <div class="news-image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div>
            </div>         
        </div>

        <?php  elseif ( 'style3' === $settings['style'] ) : ?>

            <div class="row">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'konstic_grid_blog_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                ?> 
                <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-md-6">
                    <div class="news-box-items">
                        <?php if(!empty($settings['image_thumb_display'])) : ?>
                        <div class="news-image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        </div>
                        <?php endif; ?>
                        <div class="news-content">
                            <ul class="post-list">
                            <?php if(!empty($settings['tag_display'])) : ?>
                                <li>
                                    <i class="fas fa-tag me-2"></i> 
                                    <?php
                                        $post_tags = get_the_tags();
                                        if ($post_tags) {
                                            $first_tag = reset($post_tags);
                                            echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                        } else {
                                            echo "No tags found";
                                        }
                                    ?>                       
                                </li>
                                <?php endif; ?>

                                <?php if(!empty($settings['category_display'])) : ?>
                                <li>
                                    <i class="fa-solid fa-folder-open me-2"></i> 
                                    <?php
                                        $post_category = get_the_category();
                                        if ($post_category) {
                                            $first_category = reset($post_category);
                                            echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                        } else {
                                            echo "No category found";
                                        }
                                    ?>                       
                                </li>
                                <?php endif; ?>
                                <?php if(!empty($settings['thumb_date'])) : ?>
                                <li>
                                    <i class="fa-solid fa-calendar-days me-2"></i> 
                                    <?php echo get_the_date('F j, Y');?>                    
                                </li>
                                <?php endif; ?>
                            </ul>
                            <h4>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <div class="author-items">
                                <div class="author-info">
                                    <?php
                                        $author_id = get_the_author_meta('ID');
                                        $author_avatar = get_avatar_url($author_id);
                                        if ($author_avatar) {
                                            echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr(get_the_author()) . '" />';
                                        } else {                                         
                                            echo 'No Image';
                                        }
                                    ?>
                                    <div class="content">
                                        <h6>Posted By</h6>
                                        <p><?php the_author(); ?></p>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="link-btn"><?php echo $settings['button'];?> <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_query();
                ?>
                <?php if (!$pagination) { ?>
                    <div class="col-lg-12">
                        <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?> margin-top-20">
                            
                                <?php konstic()->post_pagination($post_data); ?>

                        </div>
                    </div>
                <?php } ?>
            </div>

        <?php endif ;?>	

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Blog_Post());