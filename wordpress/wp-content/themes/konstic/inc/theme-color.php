<?php

function enqueue_custom_color_stylesheet() {

    wp_enqueue_style('konstic-style', get_stylesheet_uri());

    // Retrieve theme color options with fallbacks
    $theme_color_1      = cs_get_option('theme_color_1') ?: '#F55B1F';
    $theme_color_2      = cs_get_option('theme_color_2') ?: '#F55B1F';
    $theme_body_color   = cs_get_option('theme_body_color') ?: '#FFFFFF';
    $theme_black_color  = cs_get_option('theme_black_color') ?: '#000000';
    $theme_white_color  = cs_get_option('theme_white_color') ?: '#FFFFFF';
    $theme_header_color = cs_get_option('theme_header_color') ?: '#121315';
    $theme_text_color   = cs_get_option('theme_text_color') ?: '#666666';
    $theme_border_color = cs_get_option('theme_border_color') ?: '#D4DCED';
    $theme_border_color_2 = cs_get_option('theme_border_color_2') ?: '#D4DCED';
    $theme_bg_color     = cs_get_option('theme_bg_color') ?: '#1E2023';

    wp_enqueue_style('custom-color-theme', get_template_directory_uri() . '/inc/theme-stylesheets/theme-color.css');

    // Inline CSS for theme colors
    $custom_css = "
    :root {
        --body: " . esc_attr($theme_body_color) . ";
        --black: " . esc_attr($theme_black_color) . ";
        --white: " . esc_attr($theme_white_color) . ";
        --theme: " . esc_attr($theme_color_1) . ";
        --theme2: " . esc_attr($theme_color_2) . ";
        --header: " . esc_attr($theme_header_color) . ";
        --text: " . esc_attr($theme_text_color) . ";
        --border: " . esc_attr($theme_border_color) . ";
        --border-2: " . esc_attr($theme_border_color_2) . ";
        --bg: " . esc_attr($theme_bg_color) . ";
        --box-shadow: 0px 1px 14px 0px rgba(0, 0, 0, 0.13);
    }";

    wp_add_inline_style('custom-color-theme', $custom_css);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_color_stylesheet');
?>
