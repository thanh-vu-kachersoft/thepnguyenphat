<?php
/**
 * Theme Hooks Customize
 * @package konstic
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('Konstic_Customize')) {

    class Konstic_Customize
    {
        /**
         * $instance
         * @since 1.0.0
         */
        protected static $instance;

        public function __construct()
        {
            //excerpt more
            add_action('excerpt_more', array($this, 'excerpt_more'));
            //search popup
            add_action('konstic_after_body', array($this, 'search_popup'));
            //breadcrumb
            add_action('konstic_before_page_content', array($this, 'breadcrumb'));      
            //order comment form
            add_filter('comment_form_fields', array($this, 'comment_fields_reorder'));
            // contact form 7
            add_filter('wpcf7_autop_or_not', '__return_false');
            //mouse move
            add_action('konstic_after_body', array($this, 'mouse_move'));
            // theme_preloader
            add_action('konstic_after_body', array($this, 'theme_preloader'));
             // sidebar
             add_action('konstic_after_body', array($this, 'menu_sidebar'));
             // back_to_top
             add_action('konstic_after_body', array($this, 'back_to_top'));
            
        }

        /**
         * getInstance()
         * @since 1.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Excerpt More
         * @since 1.0.0
         */
        public function excerpt_more($more)
        {
            $more = cs_get_option('blog_post_excerpt_more');
            return $more;
        }

        /**
         * Breadcrumb
         * @since 1.0.0
         */
        public function breadcrumb()
        {
            $page_id = konstic()->page_id();
            $check_page = (!is_home() && !is_front_page() && is_singular()) || is_search() || is_author() || is_404() || is_archive() ? true : false;
            $check_home_page = konstic()->is_home_page();
            $page_header_meta = Konstic_Group_Fields_Value::page_container('konstic', 'header_options');
            $header_variant_class = isset($page_header_meta['navbar_type']) ? 'navbar-' . $page_header_meta['navbar_type'] : 'navbar-default';         
            $header_variant_class .= !empty(cs_get_option('header_two_top_bar_shortcode')) && $page_header_meta['navbar_type'] == 'style-01' ? ' header-style-02-has-topbar ' : '';
         
            $breadcrumb_shape_image = cs_get_option('breadcrumb_shape_image');
            $breadcrumb_shape_image_2 = cs_get_option('breadcrumb_shape_image_2');
            $breadcrumb_shape_image_3 = cs_get_option('breadcrumb_shape_image_3');

            $page_breadcrumb_enable = isset($page_header_meta['page_breadcrumb_enable']) && $page_header_meta['page_breadcrumb_enable'] ? $page_header_meta['page_breadcrumb_enable'] : false;
            $breadcrumb_enable = false;

            
            if (!$check_home_page && !$check_page) {
                $breadcrumb_enable = true;
            } elseif (!$page_breadcrumb_enable && $check_page) {
                $breadcrumb_enable = true;
            }
            $breadcrumb_enable = !cs_get_switcher_option('breadcrumb_enabled') ? false : $breadcrumb_enable;

            if (!$breadcrumb_enable) {
                return;
            }



            $breadcrumb_main_image = cs_get_option('breadcrumb_main_image');
            
            if (isset($breadcrumb_main_image['url']) && !empty($breadcrumb_main_image['url'])) {
                $background_image_url = esc_url($breadcrumb_main_image['url']);
            } else {
                $background_image_url = '';
            }

            ?>

        <div class="breadcrumb-wrapper bg-cover <?php echo esc_attr($header_variant_class); ?>" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">

            <?php
            if (!empty($breadcrumb_shape_image['url'])): ?>
                <div class="shape-image float-bob-y">
                    <img src="<?php echo esc_url($breadcrumb_shape_image['url']); ?>" alt="">
                </div>
            <?php endif; ?>

            <div class="container">
                <div class="breadcrumb-wrapper-items">
                    <div class="page-heading">

                    <?php
                          echo "<div class='breadcrumb-sub-title'>";
                        if (is_archive()) {
                            if (class_exists('WooCommerce') && is_shop()) {
                                printf('<h1 class="wow fadeInUp" data-wow-delay=".3s">%1$s </h1>', str_replace("Archives: ", "", get_the_archive_title()));
                            } else {
                                the_archive_title('<h1 class="wow fadeInUp" data-wow-delay=".3s">', '</h1>');
                            }
                        } elseif (is_404()) {
                            printf('<h1 class="wow fadeInUp" data-wow-delay=".3s">%1$s</h1>', esc_html__('Error 404', 'konstic'));
                        } elseif (is_search()) {
                            printf('<h1 class="wow fadeInUp" data-wow-delay=".3s">%1$s %2$s</h1>', esc_html__('Search Results for:', 'konstic'), get_search_query());
                        } elseif (is_singular('post')) {
                            printf('<h1 class="wow fadeInUp" data-wow-delay=".3s">%1$s </h1>', 'Blog Details');
                        } elseif (is_singular('page')) {
                            if ($page_header_meta['page_title']) {
                                printf('<h1 class="wow fadeInUp" data-wow-delay=".3s">%1$s </h1>', get_the_title());
                            }
                        } else {
                            printf('<h1 class="wow fadeInUp" data-wow-delay=".3s">%1$s </h1>', get_the_title($page_id));
                        }
                        echo "</div>";

                        if ($page_header_meta['page_breadcrumb']) {
                            konstic_breadcrumb();
                        }
                    ?>

                    </div>
                    <?php
                    if (!empty($breadcrumb_shape_image_2['url']) && !empty($breadcrumb_shape_image_3['url'])): ?>
                        <div class="breadcrumb-image">
                            <img class="float-bob-x" src="<?php echo esc_url($breadcrumb_shape_image_2['url']); ?>" alt="">
                            <div class="bar-shape">
                                <img src="<?php echo esc_url($breadcrumb_shape_image_3['url']); ?>" alt="">
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
         

            <?php
        }

           /**
         * Mouse Move
         * @since 1.0.0
         */
        public function mouse_move()
        {
            ?>
              <!--<< Mouse Cursor Start >>-->  
            <div class="mouse-cursor cursor-outer"></div>
            <div class="mouse-cursor cursor-inner"></div>
            <?php
        }
        
           /**
         * Theme Preloader
         * @since 1.0.0
         */

        public function theme_preloader()
        {
            $preloader_enable = cs_get_option('preloader_enable'); 
            
            if ($preloader_enable == 1) {
                get_template_part('template-parts/preloader');
            }
        }



             /**
         * Menu Sidebar
         * @since 1.0.0
         */
       
         public function menu_sidebar()
        {            
            $sidebar_logo = cs_get_option('sidebar_logo');
            $sidebar_text = cs_get_option('sidebar_text');
            $sidebar_title = cs_get_option('sidebar_title');
            $sidebar_contact_info = cs_get_option('sidebar_contact_info');
            $sidebar_btn_enabled = cs_get_option('sidebar_btn_enabled');
            $sidebar_btn_text = cs_get_option('sidebar_btn_text');
            $sidebar_btn_text_url = cs_get_option('sidebar_btn_text_url');
            $sidebar_socials = cs_get_option('sidebar_socials');            
            ?>
            <div class="fix-area">
                <div class="offcanvas__info">
                    <div class="offcanvas__wrapper">
                        <div class="offcanvas__content">
                            <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                                <div class="offcanvas__logo">
                                    <?php
                                    if (has_custom_logo() && empty($sidebar_logo['id'])) {
                                        the_custom_logo();
                                    } elseif (!empty($sidebar_logo['id'])) {
                                        printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $sidebar_logo['url'], $sidebar_logo['alt']);
                                    } else {
                                        printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                                    }
                                    ?>
                                </div>
                                <div class="offcanvas__close">
                                    <button>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <p class="text d-none d-lg-block">
                                <?php echo esc_html($sidebar_text); ?>
                            </p>
                            <div class="mobile-menu fix mb-3"></div>
                            <div class="offcanvas__contact">
                                <h4><?php echo esc_html($sidebar_title); ?></h4>
                                <?php                       
                                if (!empty($sidebar_contact_info)) {
                                    echo '<ul>';
                                    foreach ($sidebar_contact_info as $contact_info) {
                                        echo '<li class="d-flex align-items-center">';
                                        echo '<div class="offcanvas__contact-icon mr-15">';
                                        echo '<i class="' . esc_attr($contact_info['sidebar_contact_icon']) . '"></i>';
                                        echo '</div>';
                                        echo '<div class="offcanvas__contact-text">';
                                        echo '<a href="' . esc_url($contact_info['sidebar_contact_text_url']) . '">' . esc_html($contact_info['sidebar_contact_text']) . '</a>';
                                        echo '</div>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>

                                <?php 
                                if( $sidebar_btn_enabled ): ?>
                                    <div class="header-button mt-4">
                                        <a href="<?php echo esc_url($sidebar_btn_text_url); ?>" class="theme-btn text-center">
                                            <span>
                                                <?php echo esc_html($sidebar_btn_text); ?>
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </span>
                                        </a>
                                    </div>
                                <?php 
                                endif; ?>

                                <?php                   
                                if (!empty($sidebar_socials)) {
                                    echo '<div class="social-icon d-flex align-items-center">';
                                    foreach ($sidebar_socials as $icon) {
                                        echo '<a href="' . esc_url($icon['sidebar_socials_icon_url']) . '"><i class="' . esc_attr($icon['sidebar_socials_icon']) . '"></i></a>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas__overlay"></div>
        <?php
        }
        

        /**
         * Reorder comments form
         * @since 1.0.0
         */
        public function comment_fields_reorder($fileds)
        {
            $comment_filed = $fileds['comment'];
            unset($fileds['comment']);
            $fileds['comment'] = $comment_filed;

            if (isset($fileds['cookies'])) {
                $comment_cookies = $fileds['cookies'];
                unset($fileds['cookies']);
                $fileds['cookies'] = $comment_cookies;
            }

            return $fileds;
        }

        /**
         * @since 1.0.0
         * Search Popup
         */
        public function search_popup()
        {
            ?>
            <div class="search-wrap">
                <div class="search-inner">
                    <i class="fas fa-times search-close" id="search-close"></i>
                    <div class="search-cell">
                        <form action="<?php echo esc_url(home_url('/')) ?>">
                            <div class="search-field-holder">
                            <input type="text" name="s" class="main-search-input"
                               placeholder="<?php echo esc_attr__('Search....', 'konstic'); ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }

        /**
         * @since 1.0.0
         * Back To Top
         */
        
        public function back_to_top() {
            // Retrieve the option values with fallbacks
            $back_top_enable = cs_get_option('back_top_enable') !== null ? cs_get_option('back_top_enable') : true;
            $back_top_icon = cs_get_option('back_top_icon') ?: 'fas fa-arrow-up-long';
        
            if ($back_top_enable) {
                ?>
                <button id="back-top" class="back-to-top">
                    <i class="<?php echo esc_attr($back_top_icon); ?>"></i>
                </button>
                <?php
            }
        }
        


    }//end class
    if (class_exists('Konstic_Customize')) {
        Konstic_Customize::getInstance();
    }
}
