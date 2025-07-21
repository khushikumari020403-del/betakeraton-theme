<?php
/**
 * Fullskjerm video Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'fullvideo-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'fullvideo';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( get_field('djj_fv_plakat') ) :
    $plakat = get_field('djj_fv_plakat');
else :
    $plakat = get_stylesheet_directory_uri() . '/blocks/fullvideo/img/poster.png';
endif;
?>


<div class="container alignfull <?php echo $className; ?>">
    <video nocontrols poster="<?php echo $plakat; ?>">
      <source src="<?php echo get_field('djj_fv_video'); ?>" type="video/mp4">
    </video>

    <div class="overvideo">
        <div class="overvideo-inner">
            <div class="overvideo-inner-content">
                <div class="inner-content-txt">
                    <?php echo get_field('djj_fv_txt'); ?>
                </div>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/fullvideo/img/play.svg">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 block-inner-content">

            
        </div>
    </div>
</div>
