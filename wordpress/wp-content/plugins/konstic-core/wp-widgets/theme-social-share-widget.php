<?php
/**
 * Theme Social Share Widget
 * @package Konstic
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('konstic_social_share_widget', array(
        'title' => esc_html__('Konstic: Social Share', 'konstic-core'),
        'classname' => 'konstic-social-share-about',
        'description' => esc_html__('Display Social Share widget', 'konstic-core'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'konstic-core'),
                'default' => esc_html__('Never Miss News', 'konstic-core')
            ),
            array(
                'id' => 'konstic-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'konstic-core'),
                'fields' => array(
                    array(
                        'id' => 'konstic-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'konstic-core'),
                        'default' => 'fab fa-facebook'
                    ),
                    array(
                        'id' => 'konstic-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'konstic-core'),
                        'default' => '#'
                    ),
                ),
            ),
        )
    ));


    if (!function_exists('konstic_social_share_widget')) {
        function konstic_social_share_widget($args, $instance)
        {

            echo $args['before_widget'];
            

            $heading_title = $instance['heading'] ?? '';
            $socialIcon = is_array($instance['konstic-social-icon-repeater']) && !empty($instance['konstic-social-icon-repeater']) ? $instance['konstic-social-icon-repeater'] : [];


            ?>
            <div class="social-share-widget">
                <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
                <ul class="social-icon style-03">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['konstic-social-icon']), esc_url($icon['konstic-social-text']));
                    };
                    ?>
                </ul>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>