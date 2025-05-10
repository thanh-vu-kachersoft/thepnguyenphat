<?php
/**
 * Theme Metabox Options
 * @package konstic
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = konstic()->kses_allowed_html(array('mark'));

    $prefix = 'konstic';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'konstic'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'konstic'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'konstic'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'konstic'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'konstic'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'konstic'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'konstic'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'konstic'),
        'icon' => 'fa fa-columns',
        'fields' => Konstic_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'konstic'),
        'icon' => 'fa fa-header',
        'fields' => Konstic_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'konstic'),
        'icon' => 'fa fa-file-o',
        'fields' => Konstic_Group_Fields::Page_Container_Options('container_options')
    ));
    //	Service Meta Box
    CSF::createMetabox($prefix . '_service_options', array(
        'title' => esc_html__('Service Options', 'konstic'),
        'post_type' => 'service',
    ));
    CSF::createSection($prefix . '_service_options', array(
        'fields' => array(
            array(
                'id' => 'service_icon',
                'type' => 'media',
                'title' => esc_html__('Icon', 'konstic'),
                'desc' => wp_kses(__('Select Your Icon', 'konstic'), $allowed_html)
            ),
            array(
                'id' => 'service_icon_shape',
                'type' => 'media',
                'title' => esc_html__('Icon Shape', 'konstic'),
                'desc' => wp_kses(__('Select Your Icon Shape', 'konstic'), $allowed_html)
            ),
            array(
                'id' => 'service_icon_shape_2',
                'type' => 'media',
                'title' => esc_html__('Icon Shape 2', 'konstic'),
                'desc' => wp_kses(__('Select Your Icon Shape 2', 'konstic'), $allowed_html)
            ),
            array(
                'id' => 'service_line_shape',
                'type' => 'media',
                'title' => esc_html__('Line Shape', 'konstic'),
                'desc' => wp_kses(__('Select Your Shape', 'konstic'), $allowed_html)
            ),
            array(
                'id' => 'service_content',
                'type' => 'textarea',
                'title' => esc_html__('service content', 'konstic'),
                'desc' => wp_kses(__('Select Your service content', 'konstic'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
     Team Options
    -------------------------------------*/
    
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'konstic'),
        'post_type' => array('team'),
        'priority' => 'high'
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Info', 'konstic'),
        'id' => 'konstic-info',
        'fields' => array(
            array(
                'id' => 'team_shape',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'konstic'), $allowed_html),
            ),
            array(
                'id' => 'team_shape_2',
                'type' => 'media',
                'title' => esc_html__('Background Shape', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'konstic'), $allowed_html),
            ),
            array(
                'id' => 'designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'konstic'),
            ),
            array(
                'id' => 'team_content',
                'type' => 'textarea',
                'title' => esc_html__('Team content', 'konstic'),
                'desc' => wp_kses(__('Write Your content', 'konstic'), $allowed_html)
            )
        )
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Social Info', 'konstic'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'social-icons',
                'type' => 'repeater',
                'title' => esc_html__('Social Info', 'konstic'),
                'fields' => array(
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'konstic'),
                        'default' => 'fa fa-facebook-f'

                    ),
                    array(
                        'id' => 'url',
                        'type' => 'text',
                        'title' => esc_html__('URL', 'konstic')
                    ),

                ),
            ),
        )
    ));

    //	Project Meta Box
    CSF::createMetabox($prefix . '_project_options', array(
        'title' => esc_html__('Project Options', 'konstic'),
        'post_type' => 'project',
    ));

    CSF::createSection($prefix . '_project_options', array(
        'fields' => array(
            array(
                'id' => 'project_icon',
                'type' => 'text',
                'title' => esc_html__('Project Icon', 'konstic'),
                'desc' => wp_kses(__('Write your Project Icon Text', 'konstic'), $allowed_html)
            ),
            array(
                'id' => 'project_subtitle',
                'type' => 'text',
                'title' => esc_html__('Project Subtitle', 'konstic'),
                'desc' => wp_kses(__('Write your Project Subtitle', 'konstic'), $allowed_html)
            ),
            array(
                'id' => 'project_content',
                'type' => 'textarea',
                'title' => esc_html__('Project content', 'konstic'),
                'desc' => wp_kses(__('Write your Project content', 'konstic'), $allowed_html)
            ),
        )
    ));

    //	Product Meta Box
    CSF::createMetabox($prefix . '_product_options', array(
        'title' => esc_html__('Product Options', 'konstic'),
        'post_type' => 'product',
    ));
    CSF::createSection($prefix . '_product_options', array(
        'fields' => array(
            array(
                'id' => 'product_audio_img',
                'type' => 'media',
                'title' => esc_html__('Product audio image', 'konstic'),
            ),
            array(
                'id' => 'product_audio_list',
                'type' => 'text',
                'title' => esc_html__('Product audio url', 'konstic'),
                'default' => esc_html__('http://physical-authority.surge.sh/music/2.mp3', 'konstic'),
            ),
            array(
                'id' => 'product_subtitle',
                'type' => 'text',
                'title' => esc_html__('Product Subtitle', 'konstic'),
                'default' => esc_html__('Ray studio', 'konstic'),
            ),
            array(
                'id' => 'download_text',
                'type' => 'text',
                'title' => esc_html__('download text', 'konstic'),
                'default' => esc_html__('Download: 2.4K', 'konstic'),
            ),
        )
    ));

    //	Courses Meta Box
    CSF::createMetabox($prefix . '_courses_options', array(
        'title' => esc_html__('Courses Options', 'konstic'),
        'post_type' => 'courses',
    ));

    CSF::createSection($prefix . '_courses_options', array(
        'title' => esc_html__('Social Info', 'konstic'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'course_start_date_option',
                'type' => 'text',
                'title' => esc_html__('Start From', 'konstic'),
                'default' => esc_html__('Thursday, Nov 4, 2023', 'konstic'),
            ),
            array(
                'id' => 'study-option',
                'type' => 'repeater',
                'title' => esc_html__('Study Options', 'konstic'),
                'fields' => array(

                    array(
                        'id' => 'qualification',
                        'type' => 'text',
                        'title' => esc_html__('Qualification', 'konstic'),
                        'default' => esc_html__('Bachelor of Aviation (Hons)', 'konstic'),
                    ),
                    array(
                        'id' => 'length',
                        'type' => 'text',
                        'title' => esc_html__('Length', 'konstic'),
                        'default' => esc_html__('9 months full time', 'konstic'),
                    ),
                    array(
                        'id' => 'code',
                        'type' => 'text',
                        'title' => esc_html__('Code', 'konstic'),
                        'default' => esc_html__('ba1x', 'konstic'),
                    ),
                ),
            ),
            array(
                'id' => 'course_module_option',
                'type' => 'text',
                'title' => esc_html__('Course Module Title', 'konstic'),
                'default' => esc_html__('Download full course Module', 'konstic'),
            ),
            array(
                'id' => 'course_module_button_title',
                'type' => 'text',
                'title' => esc_html__('Course Module Button Title', 'konstic'),
                'default' => esc_html__('Download', 'konstic'),
            ),
            array(
                'id' => 'course_module_button_url',
                'type' => 'text',
                'title' => esc_html__('Course Module Button URL', 'konstic'),
                'default' => esc_html__('#', 'konstic'),
            ),
        )
    ));
}//endif