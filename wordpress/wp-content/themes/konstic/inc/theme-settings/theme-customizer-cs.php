<?php

/*
 * Theme Customize Options
 * @package konstic
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {
    $prefix = 'konstic';

    CSF::createCustomizeOptions($prefix . '_customize_options');
    /*-------------------------------------
        ** Theme Main panel
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('Konstic Options', 'konstic'),
        'id' => 'konstic_main_panel',
        'priority' => 11,
    ));


    /*-------------------------------------
        ** Theme Main Color
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('01. Main Color', 'konstic'),
        'priority' => 10,
        'parent' => 'konstic_main_panel',
        'fields' => array(
            array(
                'id' => 'heading_color',
                'type' => 'color',
                'title' => esc_html__('Theme Heading Color', 'konstic'),
                'default' => '#0F0D1D',
                'desc' => esc_html__('This is theme heading color, means it\'ll affect all of heading tag like, h1,h2,h3,h4,h5,h6', 'konstic')
            ),
            array(
                'id' => 'paragraph_color',
                'type' => 'color',
                'title' => esc_html__('Theme Paragraph Color', 'konstic'),
                'default' => '#585858',
                'desc' => esc_html__('This is theme paragraph color, means it\'ll affect all of body/paragraph tag like, p,li,a etc', 'konstic')
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Header Options
    -------------------------------------*/

    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('02. Header One Options', 'konstic'),
        'parent' => 'konstic_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Nav Bar Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'header_01_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'konstic'),
                'default' => ''
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dropdown Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'header_01_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Border Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'konstic'),
                'default' => ''
            ),
        )
    ));
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('03. Header Two Options', 'konstic'),
        'parent' => 'konstic_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Option', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'header_02_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Menu Background Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Menu Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Menu Hover Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_top_bar_title_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Title Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_top_bar_text_color',
                'type' => 'color',
                'title' => esc_html__('Menu Info Paragraph Color', 'konstic'),
                'default' => ''
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Bar Button', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'header_02_top_bar_btn_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Background Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_top_bar_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'header_02_top_bar_btn_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Background Color', 'konstic'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_02_top_bar_hover_btn_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Button Hover Color', 'konstic'),
                'default' => '#fff'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Dropdown Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'header_02_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'konstic'),
                'default' => '#101A29'
            ),
            array(
                'id' => 'header_02_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'konstic'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_02_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'konstic'),
                'default' => '#246BFD'
            ),
            array(
                'id' => 'header_02_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'konstic'),
                'default' => '#fff'
            ),

        )
    ));

    /*-------------------------------------
          ** Theme Sidebar Options
      -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('05. Sidebar', 'konstic'),
        'priority' => 13,
        'parent' => 'konstic_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'sidebar_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Title Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'sidebar_widget_title_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Border Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'sidebar_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Text Color', 'konstic'),
                'default' => ''
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Footer One Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer One', 'konstic'),
        'priority' => 14,
        'parent' => 'konstic_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'footer_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'konstic'),
            ),
            array(
                'id' => 'footer_area_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Border Color', 'konstic'),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Title Color', 'konstic'),
            ),
            array(
                'id' => 'footer_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'konstic'),
            ),
            array(
                'id' => 'footer_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'konstic')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Tag Cloud Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_tag_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Text Color', 'konstic'),
                'default' => '#fff'
            ),
            array(
                'id' => 'footer_widget_tag_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Background Color', 'konstic'),
                'default' => '#101A29'
            ),
            array(
                'id' => 'footer_widget_tag_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Tag Border Color', 'konstic'),
                'default' => '#101A29'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Copyright Area Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'copyright_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Background Color', 'konstic'),
                'default' => ''
            ),
            array(
                'id' => 'copyright_area_text_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Text Color', 'konstic'),
                'default' => '#fff'
            ),
        )
    ));

    /*-------------------------------------
     ** Theme Footer Two Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer Two', 'konstic'),
        'priority' => 14,
        'parent' => 'konstic_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'footer_area_two_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'konstic'),
                'default' => '#101A29',
            ),
            array(
                'id' => 'footer_area_two_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Border Color', 'konstic'),
                'default' => 'rgba(255, 255, 255, 0.2)',
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'footer_two_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'konstic'),
                'default' => 'rgba(255,255,255,0.8)'
            ),
            array(
                'id' => 'footer_two_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'konstic'),
                'default' => '#246BFD'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Copyright Area Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'copyright_two_area_text_color',
                'type' => 'color',
                'title' => esc_html__('Copyright Area Text Color', 'konstic'),
                'default' => '#8A8A8A'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Social Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'copyright_two_area_footer_social_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Color', 'konstic'),
                'default' => '#8A8A8A'
            ),
            array(
                'id' => 'copyright_two_area_footer_social_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Background Color', 'konstic'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'copyright_two_area_footer_hover_social_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Hover Color', 'konstic'),
                'default' => '#fff'
            ),
            array(
                'id' => 'copyright_two_area_footer_social_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Social Background Hover Color', 'konstic'),
                'default' => '#246BFD'
            ),
        )
    ));


}//endif