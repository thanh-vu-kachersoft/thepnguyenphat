<?php
/**
 * Theme Footer Template
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package konstic
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2023 konstic All Rights Reserved.','konstic');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);
$footer_shortcodes = cs_get_option('footer_shortcode');
$footer_one_logo = cs_get_option('footer_one_logo');
$footer_one_bg_image = cs_get_option('footer_one_bg_image');
$footer_one_info_item_repeater = cs_get_option('footer_one_info_item_repeater');
$footer_one_social_item_repeater = cs_get_option('footer_one_social_item_repeater');

$footer_shortcode_class = '';
if (!empty($footer_shortcodes)) {
    $footer_shortcode_class = 'footer-top-space';
}

if (!empty($footer_one_bg_image['url'])) { ?>
    <div class="footer-style footer-style-page-2 footer-bottom-margin bg-black-after bg-cover" style="background-image: url('<?php echo esc_url($footer_one_bg_image['url']); ?>');">
<?php }else { ?>
<div class="footer-style footer-style-page-2 bg-black bg-cover">
<?php } ?>
    <footer class="footer-wrap">
        <?php if (!empty($footer_one_logo)) { ?>
            <div class="container">
    	        <div class="footer-top-logo text-md-center border-bottom-1">
    	           	<a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_one_logo['url']); ?>" alt=""></a>
                </div>
	        </div>
        <?php } ?>
        <div class="container">
            <?php get_template_part('template-parts/content/footer-widget'); ?>
        </div>
        <div class="container d-xl-none">
            <div class="copyright-wrap text-center">
                <div class="copyright-content">
                    <div class="copyright-text">
                        <?php
                        	echo wp_kses($copyright_text, konstic()->kses_allowed_html(array('a')));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
