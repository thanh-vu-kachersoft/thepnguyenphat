<?php
/**
 * Header Style 2
 * @package konstic
 * @since 1.0.0
 */
?>

<?php 

    $header_1_top_bar_enabled = cs_get_option('header_1_top_bar_enabled');
    $header_1_top_bar_time_icon = cs_get_option('header_1_top_bar_time_icon');
    $header_1_top_bar_time = cs_get_option('header_1_top_bar_time');
    $header_1_top_bar_title = cs_get_option('header_1_top_bar_title');
    $header_1_top_bar_socials_repeater = cs_get_option('header_1_top_bar_socials_repeater');

    $header_1_logo = cs_get_option('header_1_logo');
    $header_1_contacts_repeater = cs_get_option('header_1_contacts_repeater');
    $header_1_right_btn_text = cs_get_option('header_1_right_btn_text');
    $header_1_right_btn_url = cs_get_option('header_1_right_btn_url'); 
    $header_1_right_btn_enabled = cs_get_option('header_1_right_btn_enabled');  
    $header_1_logo_2 = cs_get_option('header_1_logo_2');  
    $header_1_search_enabled = cs_get_option('header_1_search_enabled');  
    $header_1_hamburger_visibility = cs_get_option('header_1_hamburger_style');
    $header_1_hamburger_style = ($header_1_hamburger_visibility == 'block') ? 'block' : 'none';
 
?> 

   <!-- Header Top Section Start -->
   <?php 
    if( $header_1_top_bar_enabled ): ?>
   <div class="header-top-section section-bg pt-3 pb-3">
        <div class="container-fluid">
            <div class="header-top-wrapper">
                <span><i class="<?php echo esc_attr($header_1_top_bar_time_icon); ?>"></i> <?php echo esc_html($header_1_top_bar_time); ?></span>
                <div class="social-icon d-flex align-items-center">
                    <span><?php echo esc_html($header_1_top_bar_title); ?></span>
                    <?php  
                        if ( ! empty( $header_1_top_bar_socials_repeater ) && is_array( $header_1_top_bar_socials_repeater ) ) {
                            foreach ( $header_1_top_bar_socials_repeater as $item ) {
                                if ( isset( $item['header_1_top_bar_socials_icon'] ) && isset( $item['header_1_top_bar_socials_icon_url'] ) ) {
                                    echo '<a href="' . esc_url( $item['header_1_top_bar_socials_icon_url'] ) . '">';
                                    echo '<i class="' . esc_attr( $item['header_1_top_bar_socials_icon'] ) . '"></i>';
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

        
    <!-- Header Section Start -->
    <div class="header-section">
        <div class="container-fluid">
            <div class="main-header-wrapper">
                <div class="logo-image">
                    <?php
                        if (has_custom_logo() && empty($header_1_logo['id'])) {
                            the_custom_logo();
                        } elseif (!empty($header_1_logo['id'])) {
                            printf('<a class="" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_1_logo['url'], $header_1_logo['alt']);
                        } else {
                            printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                        }
                    ?>
                </div>
                <div class="main-header-items">
                    <div class="header-contact-info-area">

                        <?php
                            if ( ! empty( $header_1_contacts_repeater ) ) :
                            foreach ( $header_1_contacts_repeater as $contact ) :
                                $icon = ! empty( $contact['header_1_contacts_icon'] ) ? $contact['header_1_contacts_icon'] : 'fas fa-phone-volume';
                                $title = ! empty( $contact['header_1_contacts_title'] ) ? $contact['header_1_contacts_title'] : '';
                                $info = ! empty( $contact['header_1_contacts_info'] ) ? $contact['header_1_contacts_info'] : '';
                                $url = ! empty( $contact['header_1_contacts_url'] ) ? $contact['header_1_contacts_url'] : '';
                                $url_prefix = ( strpos( $url, 'mailto:' ) !== false ) ? 'mailto:' : ( ( strpos( $url, 'tel:' ) !== false ) ? 'tel:' : '' );
                                $url = str_replace( array( 'mailto:', 'tel:' ), '', $url );
                                ?>
                                <div class="contact-info-items">
                                <div class="icon">
                                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                </div>
                                <div class="content">
                                    <p><?php echo esc_html( $title ); ?></p>
                                    <h3>
                                    <a href="<?php echo esc_url( $url_prefix . $url ); ?>"><?php echo esc_html( $info ); ?></a>
                                    </h3>
                                </div>
                                </div>
                                <?php
                            endforeach;
                            endif;
                        ?>

                        <?php 
                            if( $header_1_right_btn_enabled ): ?>
                        <div class="header-button">
                            <a href="<?php echo esc_url($header_1_right_btn_url); ?>" class="theme-btn"><?php echo esc_html($header_1_right_btn_text); ?> <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                        <?php 
                        endif; ?> 

                    </div>
                    <div id="header-sticky" class="header-1">
                        <div class="mega-menu-wrapper">
                            <div class="header-main">
                                <div class="logo">
                                    <?php
                                        if (has_custom_logo() && empty($header_1_logo_2['id'])) {
                                            the_custom_logo();
                                        } elseif (!empty($header_1_logo_2['id'])) {
                                            printf('<a class="header-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_1_logo_2['url'], $header_1_logo_2['alt']);
                                        } else {
                                            printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                                        }
                                    ?>
                                </div>
                                <div class="header-left">
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
                                </div>
                                <div class="header-right d-flex justify-content-end align-items-center">
                                    <?php 
                                    if( $header_1_search_enabled ): ?>
                                        <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                                        <?php 
                                    endif; ?> 
                                    <div class="header__hamburger d-xl-<?php echo esc_attr($header_1_hamburger_style); ?> my-auto">
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
        </div>
    </div> 
