<?php
/**
 * Footer Style 01
 * @package konstic
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2024 konstic All Rights Reserved.','konstic');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);

$footer_1_top_enabled = cs_get_option('footer_1_top_enabled');
$footer_1_logo = cs_get_option('footer_1_logo');
$footer_1_contacts_repeater = cs_get_option( 'footer_1_contacts_repeater' );

$footer_1_title = cs_get_option( 'footer_1_title' );
$footer_1_text = cs_get_option( 'footer_1_text' );
$footer_1_socials_repeater = cs_get_option( 'footer_1_socials_repeater' );
$footer_1_gallery_title = cs_get_option( 'footer_1_gallery_title' );
$footer_1_gallery_repeater = cs_get_option( 'footer_1_gallery_repeater' );


$footer_1_spacing = cs_get_option('footer_1_spacing');

$footer_top = isset($footer_1_spacing['top']) ? $footer_1_spacing['top'] : '0';
$footer_right = isset($footer_1_spacing['right']) ? $footer_1_spacing['right'] : '0';
$footer_bottom = isset($footer_1_spacing['bottom']) ? $footer_1_spacing['bottom'] : '0';
$footer_left = isset($footer_1_spacing['left']) ? $footer_1_spacing['left'] : '0';
$footer_unit = isset($footer_1_spacing['unit']) ? $footer_1_spacing['unit'] : 'px';


$footer_top_1_spacing = cs_get_option('footer_top_1_spacing');

$top = isset($footer_top_1_spacing['top']) ? $footer_top_1_spacing['top'] : '0';
$right = isset($footer_top_1_spacing['right']) ? $footer_top_1_spacing['right'] : '0';
$bottom = isset($footer_top_1_spacing['bottom']) ? $footer_top_1_spacing['bottom'] : '0';
$left = isset($footer_top_1_spacing['left']) ? $footer_top_1_spacing['left'] : '0';
$unit = isset($footer_top_1_spacing['unit']) ? $footer_top_1_spacing['unit'] : 'px';


$footer_1_bg_shape = cs_get_option('footer_1_bg_shape');
if (isset($footer_1_bg_shape['url']) && !empty($footer_1_bg_shape['url'])) {
    $background_image_url = esc_url($footer_1_bg_shape['url']);
} else {
    $background_image_url = '';
}


?>

<footer class="footer-section bg-cover bg-cover" style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
    <div class="container">
        <?php if ( in_array( 'konstic-core/konstic-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>

        <?php 
        if( $footer_1_top_enabled ): ?>

        <div class="contact-info-area" style="padding-top: <?php echo esc_attr($top . $unit); ?>; padding-right: <?php echo esc_attr($right . $unit); ?>; padding-bottom: <?php echo esc_attr($bottom . $unit); ?>; padding-left: <?php echo esc_attr($left . $unit); ?>;">

            <?php if (!empty($footer_1_logo)) { ?>
                    <a class="logo-img wow fadeInUp" data-wow-delay=".2s" href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_1_logo['url']); ?>" alt="footer-logo"></a>
            <?php } ?>

            <?php          

            if ( ! empty( $footer_1_contacts_repeater ) ) {
                foreach ( $footer_1_contacts_repeater as $index => $contact ) {
                    $delay = 0.6 + ($index * 0.2); // Adjust the delay for each item
                    ?>
                    <div class="contact-info-items wow fadeInUp" data-wow-delay="<?php echo esc_attr( $delay . 's' ); ?>">
                        <div class="icon">
                            <i class="<?php echo esc_attr( $contact['footer_1_contacts_icon'] ); ?>"></i>
                        </div>
                        <div class="content">
                            <p><?php echo esc_html( $contact['footer_1_contacts_title'] ); ?></p>
                            <h3>
                                <a href="<?php echo esc_url( $contact['footer_1_contacts_url'] ); ?>">
                                    <?php echo esc_html( $contact['footer_1_contacts_info'] ); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
          
        </div>
        <?php 
        endif; ?>

        <div class="footer-widgets-wrapper" style="padding-top: <?php echo esc_attr($footer_top . $footer_unit); ?>; padding-right: <?php echo esc_attr($footer_right . $footer_unit); ?>; padding-bottom: <?php echo esc_attr($footer_bottom . $footer_unit); ?>; padding-left: <?php echo esc_attr($footer_left . $footer_unit); ?>;">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5><?php echo esc_html($footer_1_title); ?></h5>
                        </div>
                        <div class="footer-content">
                            <p>
                                <?php
                                if (!empty($footer_1_text)) {
                                    echo wp_kses_post($footer_1_text);
                                }                                
                                ?>
                            </p>
                            <div class="social-icon d-flex align-items-center">
                                <?php   
                                if ( $footer_1_socials_repeater ) {
                                        foreach ( $footer_1_socials_repeater as $item ) {
                                            if ( isset( $item['footer_1_socials_icon'] ) && isset( $item['footer_1_socials_icon_url'] ) ) {
                                                echo '<a href="' . esc_url( $item['footer_1_socials_icon_url'] ) . '">';
                                                echo '<i class="' . esc_attr( $item['footer_1_socials_icon'] ) . '"></i>';
                                                echo '</a>';
                                            }
                                        }                            
                                    }                    
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <!-- footer menu 1 -->
                    <?php get_template_part('template-parts/content/footer-widget'); ?>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                    <!-- footer menu 2 -->
                    <?php get_template_part('template-parts/content/footer-widget-two'); ?>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h5><?php echo esc_html($footer_1_gallery_title); ?></h5>
                        </div>
                        <div class="footer-gallery">
                            <?php
                                if (is_array($footer_1_gallery_repeater) && !empty($footer_1_gallery_repeater)) {
                                ?>
                                    <div class="gallery-wrap">
                                        <div class="gallery-item">
                                            <?php
                                            foreach ($footer_1_gallery_repeater as $image) {
                                                if (isset($image['footer_1_gallery_img']['url'])) {
                                                    $image_url = $image['footer_1_gallery_img']['url'];
                                            ?>
                                                    <div class="thumb">
                                                        <a href="<?php echo esc_url($image_url); ?>" class="img-popup">
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="gallery-img">
                                                            <div class="icon">
                                                                <i class="far fa-plus"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    echo 'No images found.';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        endif; ?> 
        <div class="footer-bottom">
            <p>
                <?php
                    echo wp_kses($copyright_text, konstic()->kses_allowed_html(array('a')));
                ?>
            </p>
        </div>
    </div>
</footer> 