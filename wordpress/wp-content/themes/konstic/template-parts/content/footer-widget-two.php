<?php
/**
 * Theme Footer Widget Template
 * @package konstic
 * @since 1.0.0
 */

if (!is_active_sidebar('footer-widget-two')){
	return;
}
?>

<?php dynamic_sidebar('footer-widget-two');?>