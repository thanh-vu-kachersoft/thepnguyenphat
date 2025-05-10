<?php
/**
 * Theme Options
 * @package konstic
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $allowed_html = konstic()->kses_allowed_html(array('mark'));
    $prefix = 'konstic';
    // Create options
    CSF::createOptions($prefix . '_theme_options', array(
        'menu_title' => esc_html__('Theme Options', 'konstic'),
        'menu_slug' => 'konstic_theme_options',
        'menu_parent' => 'konstic_theme_options',
        'menu_type' => 'submenu',
        'footer_credit' => ' ',
        'menu_icon' => 'fa fa-filter',
        'show_footer' => false,
        'enqueue_webfont' => false,
        'show_search' => true,
        'show_reset_all' => true,
        'show_reset_section' => true,
        'show_all_options' => false,
        'theme' => 'dark',
        'framework_title' => konstic()->get_theme_info('name')
    ));

    /*-------------------------------------------------------
        ** General  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('General', 'konstic'),
        'id' => 'general_options',
        'icon' => 'fas fa-cogs',
    ));
    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Preloader & SVG Enable', 'konstic'),
        'id' => 'theme_general_preloader_options',
        'icon' => 'fa fa-spinner',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Preloader Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'preloader_enable',
                'title' => esc_html__('Preloader', 'konstic'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader', 'konstic'), $allowed_html),
                'default' => false,
            ),
            array(
                'id' => 'preloader_bg_color',
                'title' => esc_html__('Preloader Background Color', 'konstic'),
                'type' => 'color',
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for preloader background image', 'konstic'), $allowed_html),
                'dependency' => array('preloader_enable', '==', 'true')
            ),

            array(
                'id'      => 'preloader_title',
                'type'    => 'text',
                'title'   => esc_html__('Preloader Title', 'konstic'),
                'desc'    => esc_html__('Enter the title to display during preloading. If left empty, the site name will be used.', 'konstic'),
                'default' => get_bloginfo('name'),
                'dependency' => array('preloader_enable', '==', 'true')
            ),

            array(
                'id'      => 'loading_text',
                'type'    => 'text',
                'title'   => esc_html__('Preloader Loading Text', 'konstic'),
                'desc'    => esc_html__('Enter the text to display below the loading animation.', 'konstic'),
                'default' => '',
                'dependency' => array('preloader_enable', '==', 'true')
            ),
              
            array(
                'id' => 'enable_svg_upload',
                'type' => 'switcher',
                'title' => esc_html__('Enable Svg Upload ?', 'konstic'),
                'desc' => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'konstic'),
                'default' => true,
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Typography  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'typography',
        'title' => esc_html__('Typography', 'konstic'),
        'icon' => 'fas fa-text-height',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body Font Options', 'konstic') . '</h3>',
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'konstic'),
                'id' => '_body_font',
                'default' => array(
                    'font-family' => 'Source Sans 3',
                    'font-size' => '16',
                    'line-height' => '26',
                    'unit' => 'px',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'konstic'), $allowed_html),
            ),
            array(
                'id' => 'body_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'konstic'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'konstic'),
                    '400' => esc_html__('Regular 400', 'konstic'),
                    '500' => esc_html__('Medium 500', 'konstic'),
                    '600' => esc_html__('Semi Bold 600', 'konstic'),
                    '700' => esc_html__('Bold 700', 'konstic'),
                    '800' => esc_html__('Extra Bold 800', 'konstic'),
                ),
                'default' => array('400', '500', '600', '700')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading Font Options', 'konstic') . '</h3>',
            ),
            array(
                'type' => 'switcher',
                'id' => 'heading_font_enable',
                'title' => esc_html__('Heading Font', 'konstic'),
                'desc' => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'konstic'), $allowed_html),
                'default' => true
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'konstic'),
                'id' => 'heading_font',
                'default' => array(
                    'font-family' => 'Quicksand',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'font_size' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2,h3,h4,h5,h6', 'konstic'), $allowed_html),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
            array(
                'id' => 'heading_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'konstic'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'konstic'),
                    '400' => esc_html__('Regular 400', 'konstic'),
                    '500' => esc_html__('Medium 500', 'konstic'),
                    '600' => esc_html__('Semi Bold 600', 'konstic'),
                    '700' => esc_html__('Bold 700', 'konstic'),
                    '800' => esc_html__('Extra Bold 800', 'konstic'),
                ),
                'default' => array('400', '500', '600', '700'),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Back To Top  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Back To Top', 'konstic'),
        'id' => 'theme_general_back_top_options',
        'icon' => 'fa fa-arrow-up',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Back Top Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'back_top_enable',
                'title' => esc_html__('Back Top', 'konstic'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'konstic'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'back_top_icon',
                'title' => esc_html__('Back Top Icon', 'konstic'),
                'type' => 'icon',
                'default' => 'fas fa-arrow-up-long',
                'desc' => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'konstic'), $allowed_html),
                'dependency' => array('back_top_enable', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
        ** Menu Sidebar  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Menu Sidebar', 'konstic'),
        'id' => 'theme_general_sidebar_options',
        'icon' => 'fas fa-bars',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Sidebar Option', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'sidebar_logo',
                'type' => 'media',
                'title' => esc_html__('Sidebar Logo', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_text',
                'type' => 'textarea',
                'title' => esc_html__('Sidebar Text', 'konstic'),
                'default' => esc_html__('We understand better that enim ad minim veniam, consectetur adipis cing elit, sed do', 'konstic'),
            ),
            array(
                'id' => 'sidebar_title',
                'type' => 'text',
                'title' => esc_html__('Sidebar Title', 'konstic'),
                'default' => esc_html__('Contact Info', 'konstic'),
            ),
            array(
                'id'        => 'sidebar_contact_info',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'sidebar_contact_icon',
                    'type'  => 'icon',
                    'default' => 'fa-solid fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'sidebar_contact_text',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'sidebar_contact_text_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'sidebar_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Button', 'konstic'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'konstic'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_btn_text',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'konstic'),
                'default' => 'Get A Quote',
                'dependency' => array('sidebar_btn_enabled', '==', 'true')
            ),
            array(
                'id' => 'sidebar_btn_text_url',
                'type' => 'text',
                'title' => esc_html__('Button Url', 'konstic'),
                'default' => esc_html__('#', 'konstic'),
                'dependency' => array('sidebar_btn_enabled', '==', 'true')
            ),
            array(
                'id'        => 'sidebar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'sidebar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'sidebar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Theme Color  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Theme Colors', 'konstic'),
        'id' => 'theme_color',
        'icon' => 'fa fa-palette',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Theme Color Option', 'konstic') . '</h3>'
            ),
            array(
                'id'      => 'theme_color_1',
                'type'    => 'color',
                'title'   => 'Primary Color',
                'default' => '#F55B1F'
              ),
            array(
                'id'      => 'theme_color_2',
                'type'    => 'color',
                'title'   => 'Secondary Color',
                'default' => '#F55B1F'
              ),
            array(
                'id'      => 'theme_body_color',
                'type'    => 'color',
                'title'   => 'Body Color',
                'default' => '#FFFFFF'
              ),
            array(
                'id'      => 'theme_black_color',
                'type'    => 'color',
                'title'   => 'Black Color One',
                'default' => '#000000'
              ),
              array(
                'id'      => 'theme_bg_color',
                'type'    => 'color',
                'title'   => 'Black Color Two',
                'default' => '#1E2023'
              ),
              array(
                'id'      => 'theme_header_color',
                'type'    => 'color',
                'title'   => 'Black Color Three',
                'default' => '#121315'
              ),
            array(
                'id'      => 'theme_white_color',
                'type'    => 'color',
                'title'   => 'White Color',
                'default' => '#FFFFFF'
              ),          
            array(
                'id'      => 'theme_text_color',
                'type'    => 'color',
                'title'   => 'Paragraph Text Color',
                'default' => '#666666'
              ),
            array(
                'id'      => 'theme_border_color',
                'type'    => 'color',
                'title'   => 'Border Color One',
                'default' => '#D4DCED'
              ),
            array(
                'id'      => 'theme_border_color_2',
                'type'    => 'color',
                'title'   => 'Border Color Two',
                'default' => '#D4DCED'
              ),           
              
        )
    ));

    /*----------------------------------
        Header & Footer Style
    -----------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Set Header & Footer Type', 'konstic'),
        'id' => 'header_footer_style_options',
        'icon' => 'eicon-banner',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Header Style', 'konstic'),
            ),
            array(
                'id' => 'navbar_type',
                'title' => esc_html__('Navbar Type', 'konstic'),
                'type' => 'image_select',
                'options' => array(
                    '' => KONSTIC_THEME_SETTINGS_IMAGES . '/header/00.png',
                    'style-01' => KONSTIC_THEME_SETTINGS_IMAGES . '/header/01.png',
                    'style-02' => KONSTIC_THEME_SETTINGS_IMAGES . '/header/02.png',
                    'style-03' => KONSTIC_THEME_SETTINGS_IMAGES . '/header/03.png',
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'konstic'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Footer Style', 'konstic'),
            ),
            array(
                'id' => 'footer_type',
                'title' => esc_html__('Footer Type', 'konstic'),
                'type' => 'image_select',
                'options' => array(
                    '' => KONSTIC_THEME_SETTINGS_IMAGES . '/footer/00.png',
                    'style-01' => KONSTIC_THEME_SETTINGS_IMAGES . '/footer/01.png',
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'konstic'), $allowed_html),
            ),
        )
    ));

    /*-------------------------------------------------------
       ** Entire Site Header Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'headers_settings',
        'title' => esc_html__('Headers', 'konstic'),
        'icon' => 'fa fa-home'
    ));
    /* Default Header Style */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Default Header', 'konstic'),
        'id' => 'theme_header_default_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
       'fields' => array(
        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Default Header Settings', 'konstic') . '</h3>'
        ),
        array(
            'id' => 'header_default_logo',
            'type' => 'media',
            'title' => esc_html__('Logo', 'konstic'),
            'library' => 'image',
            'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
        ),
        array(
            'id' => 'header_default_right_btn_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Right Button', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'konstic'), $allowed_html),
        ),
        array(
            'id' => 'header_default_right_btn_text',
            'type' => 'text',
            'title' => esc_html__('Right Button Text', 'konstic'),
            'default' => 'Get A Quote',
            'dependency' => array('header_default_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_default_right_btn_url',
            'type' => 'text',
            'title' => esc_html__('Right Button Url', 'konstic'),
            'default' => esc_html__('#', 'konstic'),
            'dependency' => array('header_default_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_default_search_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Search Button', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'konstic'), $allowed_html),
        ),
        array(
            'id'          => 'header_default_hamburger_style',
            'type'        => 'select',
            'title'       => 'Hamburger On/Off',
            'placeholder' => 'Select an option',
            'options'     => array(
              'block'  => 'Show',
              'none'  => 'Hide',
            ),
            'default'     => 'block'
          ),

        // header 3 top bar start

        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Top Bar Options', 'konstic') . '</h3>'
        ),
        array(
            'id' => 'header_default_top_bar_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Header Top', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'konstic'), $allowed_html),
        ),          
        array(
            'id'        => 'header_default_top_bar_contacts_repeater',
            'type'      => 'repeater',
            'title'     => 'Contact Info Repeater',
            'dependency' => array('header_default_top_bar_enabled', '==', 'true'),
            'fields'    => array(          
              array(
                'id'    => 'header_default_top_bar_icon',
                'type'  => 'icon',
                'default' => 'fa-solid fa-phone-volume',
                'title' => 'Info Icon',
              ),              
              array(
                'id'    => 'header_default_top_bar_info',
                'type'  => 'text',
                'title' => 'Info Text',
              ),
              array(
                'id'    => 'header_default_top_bar_info_url',
                'type'  => 'text',
                'title' => 'Info Url',
              ),
          
            )
        ),
        array(
            'id' => 'header_default_top_right_title',
            'type' => 'text',
            'title' => esc_html__('Right Title', 'konstic'),
            'default' => 'Follow Us',
            'dependency' => array('header_default_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id'        => 'header_default_top_bar_socials_repeater',
            'type'      => 'repeater',
            'title'     => 'Socials Info Repeater',
            'dependency' => array('header_default_top_bar_enabled', '==', 'true'),
            'fields'    => array(
          
              array(
                'id'    => 'header_default_top_bar_socials_icon',
                'type'  => 'icon',
                'default' => 'fa fa-facebook-f',
                'title' => 'Socials Icon',
              ),   
              array(
                'id'    => 'header_default_top_bar_socials_url',
                'type'  => 'text',
                'title' => 'Socials Url',
              ),
          
            )
        ),
          
        )
    ));

      /* Header Style 01 */
      CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header One', 'konstic'),
        'id' => 'theme_header_one_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Header One Settings', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'header_1_logo',
                'type' => 'media',
                'title' => esc_html__('Logo One', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
            ),            
            array(
                'id'        => 'header_1_contacts_repeater',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'dependency' => array('header_1_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_1_contacts_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Contact Icon',
                  ),              
                  array(
                    'id'    => 'header_1_contacts_title',
                    'type'  => 'text',
                    'title' => 'Contact Title',
                  ),
                  array(
                    'id'    => 'header_1_contacts_info',
                    'type'  => 'text',
                    'title' => 'Contact Text',
                  ),
                  array(
                    'id'    => 'header_1_contacts_url',
                    'type'  => 'text',
                    'title' => 'Contact Url',
                  ),
              
                )
            ),
            array(
                'id' => 'header_1_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'konstic'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'konstic'), $allowed_html),
            ),
            array(
                'id' => 'header_1_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'konstic'),
                'default' => 'Get A Quote',
                'dependency' => array('header_1_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_1_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'konstic'),
                'default' => esc_html__('#', 'konstic'),
                'dependency' => array('header_1_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_1_logo_2',
                'type' => 'media',
                'title' => esc_html__('Logo Two', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
            ), 
            array(
                'id' => 'header_1_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'konstic'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'konstic'), $allowed_html),
            ),
            array(
                'id'          => 'header_1_hamburger_style',
                'type'        => 'select',
                'title'       => 'Hamburger On/Off',
                'placeholder' => 'Select an option',
                'options'     => array(
                  'block'  => 'Show',
                  'none'  => 'Hide',
                ),
                'default'     => 'block'
              ),  

           // header 1 top bar start

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'header_1_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'konstic'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'konstic'), $allowed_html),
            ),  
            array(
                'id'      => 'header_1_top_bar_time_icon',
                'type'    => 'icon',
                'title' => esc_html__('Time Icon', 'konstic'),
                'default' => 'fa fa-clock',
                'dependency' => array('header_1_top_bar_enabled', '==', 'true'),
            ),                     
            array(
                'id' => 'header_1_top_bar_time',
                'type' => 'text',
                'title' => esc_html__('Time Text', 'konstic'),
                'default' => esc_html__('09:00 am - 06:00 pm', 'konstic'),
                'dependency' => array('header_1_top_bar_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_1_top_bar_title',
                'type' => 'text',
                'title' => esc_html__('Follow Us', 'konstic'),
                'default' => esc_html__('Follow Us', 'konstic'),
                'dependency' => array('header_1_top_bar_enabled', '==', 'true'),
            ),
            array(
                'id'        => 'header_1_top_bar_socials_repeater',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'dependency' => array('header_1_top_bar_enabled', '==', 'true'),
                'fields'    => array(              
                  array(
                    'id'    => 'header_1_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_1_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));

   /* Header Style 2*/
   CSF::createSection($prefix . '_theme_options', array(
    'title' => esc_html__('Header Two', 'konstic'),
    'id' => 'theme_header_two_options',
    'icon' => 'fa fa-image',
    'parent' => 'headers_settings',
    'fields' => array(
        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Header Two Settings', 'konstic') . '</h3>'
        ),
        array(
            'id' => 'header_2_logo',
            'type' => 'media',
            'title' => esc_html__('Logo', 'konstic'),
            'library' => 'image',
            'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
        ),
        array(
            'id' => 'header_2_right_btn_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Right Button', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'konstic'), $allowed_html),
        ),
        array(
            'id' => 'header_2_right_btn_text',
            'type' => 'text',
            'title' => esc_html__('Right Button Text', 'konstic'),
            'default' => 'Get A Quote',
            'dependency' => array('header_2_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_2_right_btn_url',
            'type' => 'text',
            'title' => esc_html__('Right Button Url', 'konstic'),
            'default' => esc_html__('#', 'konstic'),
            'dependency' => array('header_2_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_2_search_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Search Button', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'konstic'), $allowed_html),
        ),
        array(
            'id'          => 'header_2_hamburger_style',
            'type'        => 'select',
            'title'       => 'Hamburger On/Off',
            'placeholder' => 'Select an option',
            'options'     => array(
              'block'  => 'Show',
              'none'  => 'Hide',
            ),
            'default'     => 'block'
          ),

        // header 2 top bar start

        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Top Bar Options', 'konstic') . '</h3>'
        ),
        array(
            'id' => 'header_2_top_bar_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Header Top', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'konstic'), $allowed_html),
        ),          
        array(
            'id'        => 'header_2_top_bar_contacts_repeater',
            'type'      => 'repeater',
            'title'     => 'Contact Info Repeater',
            'dependency' => array('header_2_top_bar_enabled', '==', 'true'),
            'fields'    => array(
          
              array(
                'id'    => 'header_2_top_bar_icon',
                'type'  => 'icon',
                'default' => 'fa-solid fa-phone-volume',
                'title' => 'Info Icon',
              ),              
              array(
                'id'    => 'header_2_top_bar_info',
                'type'  => 'text',
                'title' => 'Info Text',
              ),
              array(
                'id'    => 'header_2_top_bar_info_url',
                'type'  => 'text',
                'title' => 'Info Url',
              ),
          
            )
        ),
        array(
            'id'        => 'header_2_privacy_repeater',
            'type'      => 'repeater',
            'title'     => 'Privacy Info Repeater',
            'dependency' => array('header_2_top_bar_enabled', '==', 'true'),
            'fields'    => array(             
              array(
                'id'    => 'header_2_privacy_title',
                'type'  => 'text',
                'title' => 'Privacy title',
              ),
              array(
                'id'    => 'header_2_privacy_url',
                'type'  => 'text',
                'title' => 'Privacy Url',
              ),
          
            )
        ),
        array(
            'id'        => 'header_2_top_bar_socials_repeater',
            'type'      => 'repeater',
            'title'     => 'Socials Info Repeater',
            'dependency' => array('header_2_top_bar_enabled', '==', 'true'),
            'fields'    => array(
          
              array(
                'id'    => 'header_2_top_bar_socials_icon',
                'type'  => 'icon',
                'default' => 'fa fa-facebook-f',
                'title' => 'Socials Icon',
              ),   
              array(
                'id'    => 'header_2_top_bar_socials_url',
                'type'  => 'text',
                'title' => 'Socials Url',
              ),
          
            )
        ),
          
        )
    ));

    /* Header Style 3*/

   CSF::createSection($prefix . '_theme_options', array(
    'title' => esc_html__('Header Three', 'konstic'),
    'id' => 'theme_header_three_options',
    'icon' => 'fa fa-image',
    'parent' => 'headers_settings',
    'fields' => array(
        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Header Three Settings', 'konstic') . '</h3>'
        ),
        array(
            'id' => 'header_3_logo',
            'type' => 'media',
            'title' => esc_html__('Logo', 'konstic'),
            'library' => 'image',
            'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
        ),
        array(
            'id' => 'header_3_right_btn_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Right Button', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'konstic'), $allowed_html),
        ),
        array(
            'id' => 'header_3_right_btn_text',
            'type' => 'text',
            'title' => esc_html__('Right Button Text', 'konstic'),
            'default' => 'Get A Quote',
            'dependency' => array('header_3_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_3_right_btn_url',
            'type' => 'text',
            'title' => esc_html__('Right Button Url', 'konstic'),
            'default' => esc_html__('#', 'konstic'),
            'dependency' => array('header_3_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_3_search_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Search Button', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'konstic'), $allowed_html),
        ),
        array(
            'id'          => 'header_3_hamburger_style',
            'type'        => 'select',
            'title'       => 'Hamburger On/Off',
            'placeholder' => 'Select an option',
            'options'     => array(
              'block'  => 'Show',
              'none'  => 'Hide',
            ),
            'default'     => 'block'
          ),

        // header 3 top bar start

        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Top Bar Options', 'konstic') . '</h3>'
        ),
        array(
            'id' => 'header_3_top_bar_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Header Top', 'konstic'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'konstic'), $allowed_html),
        ),          
        array(
            'id'        => 'header_3_top_bar_contacts_repeater',
            'type'      => 'repeater',
            'title'     => 'Contact Info Repeater',
            'dependency' => array('header_3_top_bar_enabled', '==', 'true'),
            'fields'    => array(          
              array(
                'id'    => 'header_3_top_bar_icon',
                'type'  => 'icon',
                'default' => 'fa-solid fa-phone-volume',
                'title' => 'Info Icon',
              ),              
              array(
                'id'    => 'header_3_top_bar_info',
                'type'  => 'text',
                'title' => 'Info Text',
              ),
              array(
                'id'    => 'header_3_top_bar_info_url',
                'type'  => 'text',
                'title' => 'Info Url',
              ),
          
            )
        ),
        array(
            'id' => 'header_3_top_right_title',
            'type' => 'text',
            'title' => esc_html__('Right Title', 'konstic'),
            'default' => 'Follow Us',
            'dependency' => array('header_3_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id'        => 'header_3_top_bar_socials_repeater',
            'type'      => 'repeater',
            'title'     => 'Socials Info Repeater',
            'dependency' => array('header_3_top_bar_enabled', '==', 'true'),
            'fields'    => array(
          
              array(
                'id'    => 'header_3_top_bar_socials_icon',
                'type'  => 'icon',
                'default' => 'fa fa-facebook-f',
                'title' => 'Socials Icon',
              ),   
              array(
                'id'    => 'header_3_top_bar_socials_url',
                'type'  => 'text',
                'title' => 'Socials Url',
              ),
          
            )
        ),
          
        )
    ));
  

    /* Breadcrumb */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Breadcrumb', 'konstic'),
        'id' => 'breadcrumb_options',
        'icon' => ' eicon-product-breadcrumbs',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Breadcrumb Options', 'konstic') . '</h3>'
            ),
            array(
                'id' => 'breadcrumb_enabled',
                'title' => esc_html__('Breadcrumb', 'konstic'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'konstic'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'breadcrumb_main_image',
                'type' => 'media',
                'title' => esc_html__('Background Image', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>background image</mark> here.', 'konstic'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'konstic'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_2',
                'type' => 'media',
                'title' => esc_html__('Shape Image 2', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'konstic'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_3',
                'type' => 'media',
                'title' => esc_html__('Shape Image 3', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'konstic'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Footer', 'konstic'),
        'id' => 'footer_options',
        'icon' => ' eicon-footer',
    ));
    // Default Footer  Options
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_general_options',
        'title' => esc_html__('Default Footer', 'konstic'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Default Footer Settings', 'konstic') . '</h3>'
            ),          
            array(
                'id' => 'footer_default_bg_shape',
                'type' => 'media',
                'title' => esc_html__('Background Image', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'konstic'), $allowed_html),
            ),  
            array(
                'id'       => 'footer_default_spacing',
                'type'     => 'spacing',
                'title'    => 'Footer Spacing',
                'default'  => array(
                  'top'    => '25',
                  'right'  => '0',
                  'bottom' => '55',
                  'left'   => '0',
                  'unit'   => 'px',
                ),
            ),                      
            array(
                'id' => 'footer_default_top_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Footer Top', 'konstic'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of footer', 'konstic'), $allowed_html),
            ), 
            array(
                'id'       => 'footer_top_default_spacing',
                'type'     => 'spacing',
                'title'    => 'Footer Top Spacing',
                'dependency' => array('footer_default_top_enabled', '==', 'true'),
                'default'  => array(
                  'top'    => '60',
                  'right'  => '0',
                  'bottom' => '60',
                  'left'   => '0',
                  'unit'   => 'px',
                ),
            ),
            array(
                'id' => 'footer_default_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'konstic'),
                'library' => 'image',
                'dependency' => array('footer_default_top_enabled', '==', 'true'),
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
            ),
            array(
                'id'        => 'footer_default_contacts_repeater',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'dependency' => array('footer_default_top_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_default_contacts_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Contact Icon',
                  ),              
                  array(
                    'id'    => 'footer_default_contacts_title',
                    'type'  => 'text',
                    'title' => 'Contact Title',
                  ),
                  array(
                    'id'    => 'footer_default_contacts_info',
                    'type'  => 'text',
                    'title' => 'Contact Text',
                  ),
                  array(
                    'id'    => 'footer_default_contacts_url',
                    'type'  => 'text',
                    'title' => 'Contact Url',
                  ),
              
                )
            ),          
            array(
                'id' => 'footer_default_title',
                'type' => 'text',
                'title' => esc_html__('About Title', 'konstic'),
                'default' => esc_html__('About Company', 'konstic')
            ), 
            array(
                'id' => 'footer_default_text',
                'type' => 'textarea',
                'title' => esc_html__('Paragraph Text Here', 'konstic'),
                'default' => esc_html__('Nullam interdum libero vitae pretium aliquam donec nibh purus laoreet in ullamcorper vel malesuada sit amet enim.', 'konstic')
            ), 
            array(
                'id'        => 'footer_default_socials_repeater',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_default_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_default_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_default_gallery_title',
                'type' => 'text',
                'title' => esc_html__('Instagram', 'konstic'),
                'default' => esc_html__('Instagram', 'konstic')
            ),    
            array(
                'id'        => 'footer_default_gallery_repeater',
                'type'      => 'repeater',
                'title'     => 'Gallery Image Repeater',
                'fields'    => array(              
                    array(
                        'id' => 'footer_default_gallery_img',
                        'type' => 'media',
                        'title' => esc_html__('Instagram Gallery', 'konstic'),
                        'library' => 'image',
                    ),
              
                )
            ), 
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'konstic') . '</h3>'
            ),         
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'konstic'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'konstic'), $allowed_html)
            ),
          
        )
    ));

    /*-------------------------------------------------------
           ** Footer Style One
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_one_options',
        'title' => esc_html__('Footer One', 'konstic'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer One Settings', 'konstic') . '</h3>'
            ),          
            array(
                'id' => 'footer_1_bg_shape',
                'type' => 'media',
                'title' => esc_html__('Background Image', 'konstic'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'konstic'), $allowed_html),
            ),  
            array(
                'id'       => 'footer_1_spacing',
                'type'     => 'spacing',
                'title'    => 'Footer Spacing',
                'default'  => array(
                  'top'    => '25',
                  'right'  => '0',
                  'bottom' => '55',
                  'left'   => '0',
                  'unit'   => 'px',
                ),
            ),                      
            array(
                'id' => 'footer_1_top_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Footer Top', 'konstic'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of footer', 'konstic'), $allowed_html),
            ), 
            array(
                'id'       => 'footer_top_1_spacing',
                'type'     => 'spacing',
                'title'    => 'Footer Top Spacing',
                'dependency' => array('footer_1_top_enabled', '==', 'true'),
                'default'  => array(
                  'top'    => '60',
                  'right'  => '0',
                  'bottom' => '60',
                  'left'   => '0',
                  'unit'   => 'px',
                ),
            ),
            array(
                'id' => 'footer_1_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'konstic'),
                'library' => 'image',
                'dependency' => array('footer_1_top_enabled', '==', 'true'),
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'konstic'), $allowed_html),
            ),
            array(
                'id'        => 'footer_1_contacts_repeater',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'dependency' => array('footer_1_top_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_1_contacts_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Contact Icon',
                  ),              
                  array(
                    'id'    => 'footer_1_contacts_title',
                    'type'  => 'text',
                    'title' => 'Contact Title',
                  ),
                  array(
                    'id'    => 'footer_1_contacts_info',
                    'type'  => 'text',
                    'title' => 'Contact Text',
                  ),
                  array(
                    'id'    => 'footer_1_contacts_url',
                    'type'  => 'text',
                    'title' => 'Contact Url',
                  ),
              
                )
            ),          
            array(
                'id' => 'footer_1_title',
                'type' => 'text',
                'title' => esc_html__('About Title', 'konstic'),
                'default' => esc_html__('About Company', 'konstic')
            ), 
            array(
                'id' => 'footer_1_text',
                'type' => 'textarea',
                'title' => esc_html__('Paragraph Text Here', 'konstic'),
                'default' => esc_html__('Nullam interdum libero vitae pretium aliquam donec nibh purus laoreet in ullamcorper vel malesuada sit amet enim.', 'konstic')
            ), 
            array(
                'id'        => 'footer_1_socials_repeater',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_1_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_1_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_1_gallery_title',
                'type' => 'text',
                'title' => esc_html__('Instagram', 'konstic'),
                'default' => esc_html__('Instagram', 'konstic')
            ),    
            array(
                'id'        => 'footer_1_gallery_repeater',
                'type'      => 'repeater',
                'title'     => 'Gallery Image Repeater',
                'fields'    => array(              
                    array(
                        'id' => 'footer_1_gallery_img',
                        'type' => 'media',
                        'title' => esc_html__('Instagram Gallery', 'konstic'),
                        'library' => 'image',
                    ),
              
                )
            ), 
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'konstic') . '</h3>'
            ),         
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'konstic'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'konstic'), $allowed_html)
            ),
          
        )
    ));


    /*-------------------------------------------------------
          ** Blog  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_settings',
        'title' => esc_html__('Blog Settings', 'konstic'),
        'icon' => 'fa fa-book'
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_post_options',
        'title' => esc_html__('Blog Post', 'konstic'),
        'icon' => 'fa fa-list-ul',
        'fields' => Konstic_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'konstic'))
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_single_post_options',
        'title' => esc_html__('Single Post', 'konstic'),
        'icon' => 'fa fa-list-alt',
        'fields' => Konstic_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'konstic'))
    )); 

    /*-------------------------------------------------------
          ** Pages & templates Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'pages_and_template',
        'title' => esc_html__('Pages Settings', 'konstic'),
        'icon' => 'fa fa-files-o'
    ));
    /*  404 page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => '404_page',
        'title' => esc_html__('404 Page', 'konstic'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-exclamation-triangle',
        'fields' => array(
            array(
                'id' => 'error_bg_switch',
                'title' => esc_html__('404 Image Enable', 'konstic'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'konstic'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'error_bg',
                'title' => esc_html__('404 Image', 'konstic'),
                'type' => 'media',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'konstic'), $allowed_html),
                'dependency' => array('error_bg_switch', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('404 Page Options', 'konstic') . '</h3>',
            ),
            array(
                'id' => '404_title',
                'title' => esc_html__('Title', 'konstic'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>title</mark> of 404 page', 'konstic'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'konstic'))
            ),
            array(
                'id' => '404_paragraph',
                'title' => esc_html__('Paragraph', 'konstic'),
                'type' => 'textarea',
                'info' => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'konstic'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'konstic'))
            ),
            array(
                'id' => '404_button_text',
                'title' => esc_html__('Button Text', 'konstic'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'konstic'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('back to home', 'konstic'))
            ),
        )
    ));

    /*  blog page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_page',
        'title' => esc_html__('Blog Page', 'konstic'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Konstic_Group_Fields::page_layout_options(esc_html__('Blog', 'konstic'), 'blog')
    ));
    /*  blog single page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_single_page',
        'title' => esc_html__('Blog Single Page', 'konstic'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Konstic_Group_Fields::page_layout_options(esc_html__('Blog Single', 'konstic'), 'blog_single')
    ));
    /*  archive page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'archive_page',
        'title' => esc_html__('Archive Page', 'konstic'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-archive',
        'fields' => Konstic_Group_Fields::page_layout_options(esc_html__('Archive', 'konstic'), 'archive')
    ));
    /*  search page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'search_page',
        'title' => esc_html__('Search Page', 'konstic'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-search',
        'fields' => Konstic_Group_Fields::page_layout_options(esc_html__('Search', 'konstic'), 'search')
    ));

    /*-------------------------------------------------------
           ** Backup  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'backup',
        'title' => esc_html__('Import / Export', 'konstic'),
        'icon' => 'eicon-export-kit',
        'fields' => array(
            array(
                'type' => 'notice',
                'style' => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'konstic'),
            ),
            array(
                'type' => 'backup',
                'title' => esc_html__('Backup & Import', 'konstic')
            )
        )
    ));
}
