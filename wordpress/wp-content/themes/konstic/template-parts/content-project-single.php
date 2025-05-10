<?php
/**
 * Template part for displaying single package post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package konstic
 */

$konstic = konstic();
$project_single_meta_data = get_post_meta(get_the_ID(), 'konstic_project_options', true);
$project_clients = isset($konstic_projec_meta['project_clients']) && !empty($konstic_projec_meta['project_clients']) ? $konstic_projec_meta['project_clients'] : '';
$project_cat = isset($konstic_projec_meta['project_cat']) && !empty($konstic_projec_meta['project_cat']) ? $konstic_projec_meta['project_cat'] : '';
$project_date = isset($konstic_projec_meta['project_date']) && !empty($konstic_projec_meta['project_date']) ? $konstic_projec_meta['project_date'] : '';
$project_location = isset($konstic_projec_meta['project_location']) && !empty($konstic_projec_meta['project_location']) ? $konstic_projec_meta['project_location'] : '';
$project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('projec-details-item'); ?>>
    <div class="entry-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="td-sidebar service-sidebar">
                    <div class="widget widget_info">
                        <h5 class="widget-title"><i class="fas fa-arrow-right"></i> Project Info</h5>               
                        <div class="widget-info-inner">
                            <?php
                                if (!empty($project_clients)) { ?>
                                    <h6><?php echo esc_html('Clients:', 'konstic'); ?></h6>  
                                    <p><?php echo esc_html($project_clients); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_cat)) { ?>
                                    <h6><?php echo esc_html('Category:', 'konstic'); ?></h6>  
                                    <p><?php echo esc_html($project_cat); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_date)) { ?>
                                    <h6><?php echo esc_html('Date:', 'konstic'); ?></h6>  
                                    <p><?php echo esc_html($project_date); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_location)) { ?>
                                    <h6><?php echo esc_html('Location:', 'konstic'); ?></h6>  
                                    <p><?php echo esc_html($project_location); ?></p>    
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <?php
                    the_content();
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->