<?php
/**
 * Header Style 3
 * @package konstic
 * @since 1.0.0
 */
?>

<?php
 $header_3_top_bar_enabled = cs_get_option('header_3_top_bar_enabled'); 
 $header_3_top_bar_contacts_repeater = cs_get_option('header_3_top_bar_contacts_repeater');
 $header_3_top_right_title = cs_get_option('header_3_top_right_title');
 $header_3_top_bar_socials_repeater = cs_get_option('header_3_top_bar_socials_repeater');

 $header_3_logo = cs_get_option('header_3_logo');
 $header_3_right_btn_text = cs_get_option('header_3_right_btn_text');
 $header_3_right_btn_url = cs_get_option('header_3_right_btn_url'); 
 $header_3_right_btn_enabled = cs_get_option('header_3_right_btn_enabled');  
 $header_3_search_enabled = cs_get_option('header_3_search_enabled'); 
 $header_3_hamburger_visibility = cs_get_option('header_3_hamburger_style');
 $header_3_hamburger_style = ($header_3_hamburger_visibility == 'block') ? 'block' : 'none';

?> 



<header class="header-section-new">
    <?php 
    if( $header_3_top_bar_enabled ): ?>
    <div class="header-top-wrapper-new">
        <div class="container-fluid">
            <?php
                if ( $header_3_top_bar_contacts_repeater ) {
                    echo '<ul class="contact-list">';
                    foreach ( $header_3_top_bar_contacts_repeater as $item ) {
                        echo '<li>';
                        if ( isset( $item['header_3_top_bar_icon'] ) ) {
                            echo '<i class="' . esc_attr( $item['header_3_top_bar_icon'] ) . '"></i>';
                        }
                        if ( isset( $item['header_3_top_bar_info'] ) ) {
                            echo '<a href="'. esc_url( $item['header_3_top_bar_info_url'] ) .'" class="link">' . esc_html( $item['header_3_top_bar_info'] ) . '</a>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                }          
            ?>
            <div class="shape-box">
            </div>
            <div class="top-right">
                <div class="social-icon d-flex align-items-center">
                    <span><?php echo esc_html($header_3_top_right_title); ?></span>
                    <?php  
                    if ( $header_3_top_bar_socials_repeater ) {
                            foreach ( $header_3_top_bar_socials_repeater as $item ) {
                                if ( isset( $item['header_3_top_bar_socials_icon'] ) && isset( $item['header_3_top_bar_socials_url'] ) ) {
                                    echo '<a href="' . esc_url( $item['header_3_top_bar_socials_url'] ) . '">';
                                    echo '<i class="' . esc_attr( $item['header_3_top_bar_socials_icon'] ) . '"></i>';
                                    echo '</a>';
                                }
                            }                            
                        }                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    endif; ?> 
    <div class="container-fluid">               
        <div id="header-sticky" class="header-new">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo">
                            <?php                               
                            if (has_custom_logo() && empty($header_3_logo['id'])) {
                                the_custom_logo();
                            } elseif (!empty($header_3_logo['id'])) {
                                printf('<a class="header-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_3_logo['url'], $header_3_logo['alt']);
                            } else {
                                printf('<a class="header-logo d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                            }
                            ?>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => '',
                                    'container' => 'div',
                                    'container_class' => '',
                                    'container_id' => 'konstic_main_menu',
                                    'fallback_cb' => 'konstic_theme_fallback_menu',
                                ));
                            ?>
                            </div>
                        </div>
                        <div class="header-button">
                            <?php 
                            if( $header_3_search_enabled ): ?>
                            <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                            <?php 
                            endif; ?> 
                            <?php 
                            if( $header_3_right_btn_enabled ): ?>
                            <a href="<?php echo esc_url($header_3_right_btn_url); ?>" class="theme-btn black"><?php echo esc_html($header_3_right_btn_text); ?> <i class="fa-regular fa-arrow-right"></i></a>
                            <?php 
                            endif; ?> 
                            
                            <div class="header__hamburger d-xl-<?php echo esc_attr($header_3_hamburger_style); ?> my-auto">
                                <div class="sidebar__toggle">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header> 