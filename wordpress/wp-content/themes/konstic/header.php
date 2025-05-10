<?php
/**
 * Theme Header Template
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package konstic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
do_action( 'konstic_after_body' );
$page_container_meta = Konstic_Group_Fields_Value::page_container( 'konstic', 'header_options' );
?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'konstic' ); ?></a>
    <header id="masthead" class="site-header">
    <?php get_template_part('template-parts/header/header',$page_container_meta['navbar_type']);?>
    </header><!-- #masthead -->
	<?php do_action( 'konstic_before_page_content' ) ?>
    <div id="content" class="site-content">
