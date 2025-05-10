<?php
/**
 * Post Thumbnail 
 * @package konstic
 * @since 1.0.0
 */
?>

 <div class="thumbnail">
    <?php
    if (has_post_thumbnail() && get_post_type() == 'post') {
        konstic()->post_thumbnail('post-thumbnail');
    }
    ?>
</div>
