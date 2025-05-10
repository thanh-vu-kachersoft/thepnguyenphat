<?php
/**
 * Theme Discover Company Widget
 * @package Konstic
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('konstic_discover_company_widget', array(
        'title' => esc_html__('Konstic: Discover Company', 'konstic-core'),
        'classname' => 'konstic-widget-discover-company',
        'description' => esc_html__('Display Discover Company widget', 'konstic-core'),
        'fields' => array(
            array(
                'id' => 'discover_image',
                'type' => 'media',
                'title' => esc_html__('Upload Your Discover Photo', 'konstic-core'),
            ),
            array(
                'id' => 'discover_btn',
                'type' => 'text',
                'title' => esc_html__('discover btn', 'konstic-core'),
                'default' => esc_html__('Discover our company +', 'konstic-core')
            ),
            array(
                'id' => 'discover_btn_url',
                'type' => 'textarea',
                'title' => esc_html__('discover btn url', 'Konstic-core'),
                'default' => esc_html__('#', 'konstic-core')
            ),
        )
    ));


    if (!function_exists('konstic_discover_company_widget')) {
        function konstic_discover_company_widget($args, $instance)
        {

            echo $args['before_widget'];
            $instance['discover_image'];
            $discover_image = $instance['discover_image'];
            $img_id = $discover_image['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id,'full')[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            // Social media content
            $discover_btn = $instance['discover_btn'] ?? '';
            $discover_btn_url = $instance['discover_btn_url'] ?? '';


            ?>
            <div class="widget widget_author text-center">
                <div class="thumb">
                    <?php
                    if (!empty($img_print)) {
                        printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                    }
                    ?>
                </div>
                <div class="details">
                    <a class="btn btn-base border-radius-5" href="<?php echo esc_url($discover_btn_url); ?>"><?php echo esc_html($discover_btn); ?></a>
                </div>
            </div>
            <?php
            echo $args['after_widget'];

        }
    }

}

?>