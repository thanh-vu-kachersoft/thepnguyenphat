<?php
$preloader_title = !empty(cs_get_option('preloader_title')) ? strtoupper(cs_get_option('preloader_title')) : strtoupper(get_bloginfo('name'));
$preloader_title_array = str_split($preloader_title);
?>
<div id="preloader" class="preloader">
    <div class="animation-preloader">
        <div class="spinner">                
        </div>
        <div class="txt-loading">
        <?php
            if (is_array($preloader_title_array)) {
                foreach ($preloader_title_array as $preloader_main_text) {
                    ?>
                    <span data-text-preloader="<?php echo esc_attr($preloader_main_text); ?>" class="letters-loading">
                        <?php echo esc_html($preloader_main_text); ?>
                    </span>
                    <?php
                }
            }
        ?>
        </div>
        <?php if (!empty(cs_get_option('loading_text'))) : ?>
            <p class="text-center"><?php echo esc_html(cs_get_option('loading_text')); ?></p>
        <?php endif; ?>
    </div>
    <div class="loader">
        <div class="row">
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
        </div>
    </div>
</div>
