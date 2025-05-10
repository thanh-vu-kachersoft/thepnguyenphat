<?php
/**
 * Post Thumbnail Functions
 * @package konstic
 * @since 1.0.0
 */

$konstic = konstic();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $konstic->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>