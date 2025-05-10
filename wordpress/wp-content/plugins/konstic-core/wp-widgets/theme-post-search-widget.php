<?php
/**
 * Theme Post Search Widget
 * @package Konstic
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('konstic_post_search_widget', array(
        'title' => esc_html__('Konstic Post Search', 'konstic-core'),
        'classname' => 'widget_search',
        'description' => esc_html__('Display about me widget', 'konstic-core'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'konstic-core'),
            ),
        )
    ));


    if (!function_exists('konstic_post_search_widget')) {
        function konstic_post_search_widget($args, $instance)
        {

            echo $args['before_widget'];
            $title = $instance['title'] ?? '';

            ?>
                <?php if (!empty($title)): ?>
                    <h4 class="widget-headline"><?php echo esc_html($title); ?></h4>
                <?php endif ?>
                <form role="search" action="<?php echo esc_url(home_url('/')) ?>" method="get"
                      class="search-form">
                    <div class="post-inside-wrapper">
                        <div class="form-group">
                            <input class="form-control" type="text" name="s" placeholder="<?php echo esc_html__('Search here','konstic-core')?>">
                            <input type="hidden" name="post_type" value="post">
                        </div>
                        <button type="submit" class="submit-btn">
                         <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>

            <?php
            echo $args['after_widget'];
        }
    }
}
?>