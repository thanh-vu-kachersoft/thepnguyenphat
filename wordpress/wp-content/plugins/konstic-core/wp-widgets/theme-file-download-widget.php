<?php
/**
 * Theme File Download Widget
 * @package Konstic
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('konstic_file_download_widget', array(
        'title' => esc_html__('Konstic: File Download', 'konstic-core'),
        'classname' => 'konstic-widget-file-download',
        'description' => esc_html__('Display File Download widget', 'konstic-core'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'Konstic-core'),
                'default' => esc_html__('Download', 'konstic-core')
            ),

            array(
                'id' => 'konstic-file-download-repeater',
                'type' => 'repeater',
                'title' => esc_html__('File Download', 'konstic-core'),
                'fields' => array(
                    array(
                        'id' => 'konstic-file-download',
                        'type' => 'media',
                        'title' => esc_html__('File', 'konstic-core'),
                    ),
                    array(
                        'id' => 'konstic-file-download-text',
                        'type' => 'text',
                        'title' => esc_html__('File Text', 'konstic-core'),
                        'default' => esc_html__('Company Profile', 'konstic-core')
                    ),

                ),
            ),
        )
    ));


    if (!function_exists('konstic_file_download_widget')) {
        function konstic_file_download_widget($args, $instance)
        {

            echo $args['before_widget'];

            $title = $instance['title'] ?? '';
            $file_download = is_array($instance['konstic-file-download-repeater']) && !empty($instance['konstic-file-download-repeater']) ? $instance['konstic-file-download-repeater'] : [];


            ?>
            <div class="widget_download">
                <h5 class="widget-headline style-01"><?php echo esc_html($title); ?></h5>               
                <ul>
                    <?php
                        foreach ($file_download as $file) {
                            echo '<li class="mb-0 mt-0">
                                <a download href="'.$file['konstic-file-download']['url'].'">
                                    ' . $file['konstic-file-download-text'] . '
                                    <i class="fa fa-angle-double-right"></i>
                                </a>
                            </li>';
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