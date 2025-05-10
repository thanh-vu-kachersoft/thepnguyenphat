<?php
/**
 * The header for our theme
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage konstic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div class="has-smooth" id="has_smooth"></div>
	
<?php 
$preloader_enable = cs_get_option('preloader_enable'); 
$header_sticky_enable = cs_get_option('header_sticky_enable'); 
if (konstic()->is_konstic_core_active()) { 
    if ($header_sticky_enable == 1) { ?>
        <style>
            .sticky-active {
                -webkit-animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;
                animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;
                left: 0;
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 9999;
                -webkit-box-shadow: 0 10px 20px 0 rgb(46 56 220 / 5%);
                box-shadow: 0 10px 20px 0 rgb(46 56 220 / 5%);
                border-bottom: 0;
                background: #0F0F0F;
                transition: 0.5s;
            }
        </style>    
    <?php }
} ?>

<?php if ($preloader_enable == 1) { ?>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <svg class="pl" viewBox="0 0 128 128" width="128px" height="128px">
                <defs>
                    <linearGradient id="pl-grad" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#000" />
                        <stop offset="100%" stop-color="#fff" />
                    </linearGradient>
                    <mask id="pl-mask">
                        <rect x="0" y="0" width="128" height="128" fill="url(#pl-grad)" />
                    </mask>
                </defs>
                <g stroke-linecap="round" stroke-width="8" stroke-dasharray="32 32">
                    <g stroke="hsl(193,90%,50%)">
                        <line class="pl__line1" x1="4" y1="48" x2="4" y2="80" />
                        <line class="pl__line2" x1="19" y1="48" x2="19" y2="80" />
                        <line class="pl__line3" x1="34" y1="48" x2="34" y2="80" />
                        <line class="pl__line4" x1="49" y1="48" x2="49" y2="80" />
                        <line class="pl__line5" x1="64" y1="48" x2="64" y2="80" />
                        <g transform="rotate(180,79,64)">
                            <line class="pl__line6" x1="79" y1="48" x2="79" y2="80" />
                        </g>
                        <g transform="rotate(180,94,64)">
                            <line class="pl__line7" x1="94" y1="48" x2="94" y2="80" />
                        </g>
                        <g transform="rotate(180,109,64)">
                            <line class="pl__line8" x1="109" y1="48" x2="109" y2="80" />
                        </g>
                        <g transform="rotate(180,124,64)">
                            <line class="pl__line9" x1="124" y1="48" x2="124" y2="80" />
                        </g>
                    </g>
                    <g stroke="hsl(283,90%,50%)" mask="url(#pl-mask)">
                        <line class="pl__line1" x1="4" y1="48" x2="4" y2="80" />
                        <line class="pl__line2" x1="19" y1="48" x2="19" y2="80" />
                        <line class="pl__line3" x1="34" y1="48" x2="34" y2="80" />
                        <line class="pl__line4" x1="49" y1="48" x2="49" y2="80" />
                        <line class="pl__line5" x1="64" y1="48" x2="64" y2="80" />
                        <g transform="rotate(180,79,64)">
                            <line class="pl__line6" x1="79" y1="48" x2="79" y2="80" />
                        </g>
                        <g transform="rotate(180,94,64)">
                            <line class="pl__line7" x1="94" y1="48" x2="94" y2="80" />
                        </g>
                        <g transform="rotate(180,109,64)">
                            <line class="pl__line8" x1="109" y1="48" x2="109" y2="80" />
                        </g>
                        <g transform="rotate(180,124,64)">
                            <line class="pl__line9" x1="124" y1="48" x2="124" y2="80" />
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <!-- preloader area end -->
<?php } ?>

<div class="left-top-fixed-page-template d-xl-block d-none">
    <div class="main-menu-sidebar-wrap">
        <div class="logo-wrapper">
            <?php
                $header_three_logo = cs_get_option('header_three_logo');
                if (has_custom_logo() && empty($header_three_logo['id'])) {
                    the_custom_logo();
                } elseif (!empty($header_three_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_three_logo['url'], $header_three_logo['alt']);
                } else {
                    printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                }
            ?>
        </div>
        <div class="main-menu-sidebar-nav">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'menu_class' => 'navbar-nav',
                    'container' => 'div',
                    'container_class' => 'menu-main-menu-container',
                    'container_id' => 'konstic_main_menu',
                    'fallback_cb' => 'konstic_theme_fallback_menu',
                ));
            ?>
        </div>
        <div class="copy-right d-lg-block d-none">
            <?php
                $copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2023 konstic All Rights Reserved.','konstic');
                $copyright_text = str_replace('{copy}','&copy;',$copyright_text);
                $copyright_text = str_replace('{year}',date('Y'),$copyright_text);
            ?>
            <p>
                <?php  echo wp_kses($copyright_text, konstic()->kses_allowed_html(array('a'))); ?>
            </p>
        </div>
    </div>
    <div class="navbar-3-area">
        <div class="row">
            <?php
                $header_three_search_item = cs_get_option('header_three_search_item');
                $header_three_dark_light_item = cs_get_option('header_three_dark_light_item');
                $header_three_btn_1_text = cs_get_option('header_three_btn_1_text');
                $header_three_btn_1_url = cs_get_option('header_three_btn_1_url');
                $header_three_btn_2_text = cs_get_option('header_three_btn_2_text');
                $header_three_btn_2_url = cs_get_option('header_three_btn_2_url');
            ?>
            <?php
                if ($header_three_search_item == 1) { ?>
                    <div class="col-lg-6 align-self-center ps-xl-4">
                        <div class="header-3-search mx-lg-4 mx-3">
                            <input type="text" placeholder="Search Music">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                <?php }

                if ($header_three_search_item == 1) {
                    $text_lg_end = 'text-lg-end';
                }else {
                    $text_lg_end = 'ps-xl-5';
                }
            ?>
            <div class="col-lg-6 <?php echo esc_attr($text_lg_end); ?> pe-xl-4 align-self-center">
                <?php if ($header_three_dark_light_item == 1) { ?>
                    <div class="dark-area me-xl-3">
                        <label class="change-mode switch">
                            <input type="checkbox" data-active="true">
                            <span class="slider round">
                                <i class="fas fa-moon"></i>
                                <i class="fas fa-sun"></i>
                            </span>
                        </label>
                    </div>
                <?php } ?>
                <?php
                    if (!empty($header_three_btn_1_text)) { ?>
                        <a class="btn btn-base border-radius-40 ms-xl-3 tt-catepalize" href="<?php echo esc_url($header_three_btn_1_url); ?>"><?php echo esc_html($header_three_btn_1_text); ?></a>
                    <?php }
                ?>
                <?php
                    if (!empty($header_three_btn_2_text)) { ?>
                        <a class="btn btn-two btn-base border-radius-40 ms-xl-2 tt-catepalize" href="<?php echo esc_url($header_three_btn_2_url); ?>"><?php echo esc_html($header_three_btn_2_text); ?></a>
                    <?php }
                ?>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-area navbar-expand-lg navigation-style-01 navbar-area-2 navbar-default d-xl-none">
    <div class="container custom-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <?php
                $header_three_logo = cs_get_option('header_three_logo');
                if (has_custom_logo() && empty($header_three_logo['id'])) {
                    the_custom_logo();
                } elseif (!empty($header_three_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_three_logo['url'], $header_three_logo['alt']);
                } else {
                    printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                }
                ?>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#konstic_main_menu" aria-controls="konstic_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <form action="<?php echo esc_url(home_url('/')) ?>" method="get" class="nav-left-search">
            <input type="text" name="s" placeholder="<?php echo esc_attr__('Search here','konstic')?>">
            <input type="hidden" name="post_type" value="post">
            <button><i class="fa fa-search"></i></button>
        </form>

        <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class' => 'navbar-nav',
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'konstic_main_menu',
                'fallback_cb' => 'konstic_theme_fallback_menu',
            ));
        ?>
        <?php if (konstic()->is_konstic_core_active()) : ?>
            <div class="nav-right-part nav-right-part-desktop align-self-center">
                <?php
                    $header_right_btn_text = cs_get_option('header_right_btn_text');
                    $header_right_btn_url = cs_get_option('header_right_btn_url');
                ?>
                <a class="right-btn-text" href="<?php echo esc_url($header_right_btn_url); ?>">
                    <?php echo esc_html($header_right_btn_text); ?>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.8 18.4001H9.99996C9.66836 18.4001 9.39996 18.1317 9.39996 17.8001C9.39996 17.4685 9.66836 17.2001 9.99996 17.2001H14.8C15.7926 17.2001 16.6 16.3927 16.6 15.4001V4.6001C16.6 3.6075 15.7926 2.8001 14.8 2.8001H9.99996C9.66836 2.8001 9.39996 2.5317 9.39996 2.2001C9.39996 1.8685 9.66836 1.6001 9.99996 1.6001H14.8C16.4542 1.6001 17.8 2.9459 17.8 4.6001V15.4001C17.8 17.0543 16.4542 18.4001 14.8 18.4001ZM12.8242 9.5759L9.82416 6.5759C9.58976 6.3415 9.21016 6.3415 8.97576 6.5759C8.74136 6.8103 8.74136 7.1899 8.97576 7.4243L10.9516 9.4001H2.79995C2.46835 9.4001 2.19995 9.6685 2.19995 10.0001C2.19995 10.3317 2.46835 10.6001 2.79995 10.6001H10.9516L8.97576 12.5759C8.74136 12.8103 8.74136 13.1899 8.97576 13.4243C9.09296 13.5415 9.24636 13.6001 9.39996 13.6001C9.55356 13.6001 9.70696 13.5415 9.82416 13.4243L12.8242 10.4243C13.0586 10.1899 13.0586 9.8103 12.8242 9.5759Z" fill="#4569E7"/>
                    </svg>

                </a>
            </div>
        <?php endif; ?>
    </div>
</nav>