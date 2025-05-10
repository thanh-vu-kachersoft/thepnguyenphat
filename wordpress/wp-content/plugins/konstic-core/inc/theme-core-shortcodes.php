<?php
/**
 * Theme Core Shortcodes Function
 * @package konstic
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}


if (!class_exists('Konstic_Core_shortcodes')) {

    class Konstic_Core_shortcodes
    {

        /**
         * $instance
         * @since 1.0.0
         */
        private static $instance;

        /**
         * construct()
         * @since 1.0.0
         */
        public function __construct()
        {
            //social post share
            add_shortcode('konstic_post_share', array($this, 'post_share'));
            //social icon
            add_shortcode('konstic_social_icon_wrap', array(__CLASS__, 'social_icon_wrap'));
            add_shortcode('konstic_social_icon', array(__CLASS__, 'social_icons'));
            //top menu
            add_shortcode('konstic_top_menu_wrap', array(__CLASS__, 'top_menu_wrap'));
            add_shortcode('konstic_top_menu', array(__CLASS__, 'top_menu'));
            //top menu
            add_shortcode('konstic_top_menu_wrap_02', array(__CLASS__, 'top_menu_wrap_02'));
            add_shortcode('konstic_top_menu_02', array(__CLASS__, 'top_menu_02'));
            //info_item
            add_shortcode('konstic_info_item_wrap', array(__CLASS__, 'info_item_wrap'));
            add_shortcode('konstic_info_link', array(__CLASS__, 'info_link'));
            add_shortcode('konstic_info_inline_text', array(__CLASS__, 'info_inline_text'));

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
         * Shortcode post share
         * @since 1.0.0
         */
        public static function post_share($atts, $content = null)
        {

            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));

            global $post;
            $output = '';

            if (is_singular() || is_home()) {

                //get current page url
                $konstic_url = urlencode_deep(get_permalink());
                //get current page title
                $konstic_title = str_replace(' ', '%20', get_the_title($post->ID));
                //get post thumbnail for pinterest
                $konstic_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $konstic_thumbnail = !empty($konstic_thumbnail) ? $konstic_thumbnail[0] : '';

                //all social share link generate
                $facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $konstic_url;
                $twitter_share_link = 'https://twitter.com/intent/tweet?text=' . $konstic_title . '&amp;url=' . $konstic_url . '&amp;via=' . get_bloginfo('url');
                $linkedin_share_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $konstic_url . '&amp;title=' . $konstic_title;
                $instagram_share_link = 'https://www.instagram.com/?url=' . $konstic_url;

                $output .= '<ul class="social-icon">';
                $output .= '<li><a class="facebook" href="' . esc_url($facebook_share_link) . '"><i class="fa fa-facebook-f"></i></a></li>';
                $output .= '<li><a class="twitter" href="' . esc_url($twitter_share_link) . '"><i class="fab fa-twitter"></i></a></li>';
                $output .= '<li><a class="linkedin" href="' . esc_url($linkedin_share_link) . '"><i class="fab fa-linkedin"></i></a></li>';
                $output .= '<li><a class="instagram" href="' . esc_url($instagram_share_link) . '"><i class="fab fa-instagram"></i></a></li>';
                $output .= '</ul>';

                return $output;
            }
        }


        /**
         * Info item wrap
         * @since 1.0.0
         */
        public static function info_item_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="info-items <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }


        /**
         * Info item two wrap
         * @since 1.0.0
         */
        public static function info_text_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="social-icon <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }


        /**
         * Info Item link
         * @since 1.0.0
         */
        public static function info_link($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'icon' => '',
                'text' => '',
                'url' => ''
            ), $atts));

            $icon = (!empty($icon)) ? ' <i class="' . esc_attr($icon) . '"></i> ' : '';
            ob_start();

            ?>
            <li>
                <?php if (!empty($url)) : ?>
                    <a href="<?php echo esc_url($url) ?>"><?php echo wp_kses_post($icon); ?><?php echo esc_html($text); ?></a>
                <?php else: ?>
                    <?php echo esc_html($text); ?>
                <?php endif; ?>
            </li>
            <?php
            return ob_get_clean();
        }

        /**
         * Info text with link
         * @since 1.0.0
         */
        public static function info_inline_text($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'title' => '',
                'url' => ''
            ), $atts));

            ob_start();

            ?>
            <li><a href="<?php echo esc_url($url) ?>"><?php echo esc_html($text); ?></a></li>
            <?php
            return ob_get_clean();
        }

        /**
         * Info Item link
         * @since 1.0.0
         */
        public static function info_text_item($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'icon' => '',
                'text' => '',
            ), $atts));

            $icon = (!empty($icon)) ? ' <i class="' . esc_attr($icon) . '"></i> ' : '';
            ob_start();

            ?>
            <li><?php echo wp_kses_post($icon); ?><?php echo esc_html($text); ?></li>
            <?php
            return ob_get_clean();
        }

        /**
         * Social icon wrap
         * @since 1.0.0
         */
        public static function social_icon_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="social-icon <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }

        /**
         * Social icon
         * @since 1.0.0
         */
        public static function social_icons($atts, $contex = null)
        {
            extract(shortcode_atts(array(
                'social_icon' => '',
                'social_link' => '',
            ), $atts));

            $icon = (!empty($social_icon)) ? ' <i class="' . esc_attr($social_icon) . '"></i> ' : '';
            ob_start();

            ?>
            <li><a href="<?php echo esc_url($social_link); ?>"><?php echo wp_kses_post($icon); ?> </a></li>
            <?php
            return ob_get_clean();
        }

        /**
         * Top menu wrap
         * @since 1.0.0
         */
        public static function top_menu_wrap($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="info-items <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }

        /**
         * Top menu text
         * @since 1.0.0
         */
        public static function top_menu($atts, $contex = null)
        {
            extract(shortcode_atts(array(
                'top_menu_text' => '',
                'top_menu_link' => '',
            ), $atts));
            ob_start();

            ?>
            <li><a href="<?php echo esc_url($top_menu_link); ?>"><?php echo esc_html($top_menu_text); ?></a></li>
            <?php
            return ob_get_clean();
        }

        /**
         * Top menu wrap 02
         * @since 1.0.0
         */
        public static function top_menu_wrap_02($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'custom_class' => '',
            ), $atts));
            ob_start(); ?>
            <ul class="info-items-02 <?php echo esc_attr($custom_class); ?>">
                <?php echo do_shortcode($content); ?>
            </ul>
            <?php
            return ob_get_clean();
        }

        /**
         * Top menu item
         * @since 1.0.0
         */
        public static function top_menu_02($atts, $contex = null)
        {
            extract(shortcode_atts(array(
                'top_menu_title_text' => '',
                'top_menu_text' => '',
                'top_menu_link' => '',
            ), $atts));
            ob_start();

            ?>
            <li>
                <h4 class="title"><?php echo esc_html($top_menu_title_text); ?></h4>
                <a href="<?php echo esc_url($top_menu_link); ?>">
                    <span class="number">
                        <?php echo esc_html($top_menu_text); ?>
                    </span>
                </a>
            </li>
            <?php
            return ob_get_clean();
        }

    }//end class

    if (class_exists('Konstic_Core_shortcodes')) {
        Konstic_Core_shortcodes::getInstance();
    }

}//end if
