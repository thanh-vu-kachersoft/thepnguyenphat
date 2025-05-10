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

$page_container_meta = Konstic_Group_Fields_Value::page_container('konstic', 'header_options');
?>

</div><!-- #content -->

<?php get_template_part('template-parts/footer/footer', $page_container_meta['footer_type']); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
