<?php
/**
 * Kit contains Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'kitcontains-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'kitcontains';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container alignfull <?php echo $className; ?>" style="background:#f1f6fc;">
    <div class="row">
        <div class="col-md-12 fullimgtxt block-inner-content">

            <?php
            if(get_field('djj_kc_header')) :
                echo '<div class="mainheader">';
                    echo get_field('djj_kc_header');
                    echo '</div>';
            endif;

            if(get_field('djj_kc_biheader')) :
                echo '<div class="biheader">';
                    echo get_field('djj_kc_biheader');
                    echo '</div>';
            endif;
            ?>

            <div class="prodbilde">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/gfx/product_circle_withlines.png" class="big-screen">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/gfx/product_circle_withlines_mob.png" class="small-screen">

                <div class="prodbilde-txt">
                    <div class="prodbilde-txt-1-1">
                        <h3><?php echo get_field('djj_kc_overskrift_1'); ?></h3>
                        <p><?php echo get_field('djj_kc_besk_1'); ?></p>
                    </div>
                    <div class="prodbilde-txt-1-2">
                        <h3><?php echo get_field('djj_kc_overskrift_2'); ?></h3>
                        <p><?php echo get_field('djj_kc_besk_2'); ?></p>
                    </div>
                    <div class="prodbilde-txt-2-1">
                        <h3><?php echo get_field('djj_kc_overskrift_3'); ?></h3>
                        <p><?php echo get_field('djj_kc_besk_3'); ?></p>
                    </div>
                    <div class="prodbilde-txt-2-2">
                        <h3><?php echo get_field('djj_kc_overskrift_4'); ?></h3>
                        <p><?php echo get_field('djj_kc_besk_4'); ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
