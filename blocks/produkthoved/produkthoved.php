<?php
/**
 * Produktside hoved Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'produkthoved-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'produkthoved';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container alignfull <?php echo $className; ?>">
    <div class="row">
        <div class="col-md-12 fullimgtxt block-inner-content">

            <div class="forsidehoved-inner">
                <div class="forsidehoved-content">
                    <h1><?php echo get_field('djj_psh_heading'); ?></h1>
                    <?php echo get_field('djj_psh_ingr'); ?>
                    <span class="liste"><?php echo get_field('djj_psh_ingr_under'); ?></span>
                </div>
                <div class="forsidehoved-img">
                    <div class="prodbilde-outer">
                        <img src="<?php echo get_field('djj_psh_prodbilde'); ?>">
                    </div>
                    <?php if( get_field('djj_psh_vis_boble') ) : ?>
                        <div class="sirkel">
                            <div class="sirkel-txt">
                                <p>Kun</p>
                                <h3 class="responsive_headline"><?php echo get_field('djj_psh_naa'); ?></h3>
                                <div class="forpris">
                                    <p><?php echo get_field('djj_psh_for'); ?></p>
                                    <p class="overstrek"></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="forsidehoved-mob">
                <div class="prodbilde">
                    <img src="<?php echo get_field('djj_psh_prodbilde'); ?>">
                </div>
                <div class="prodikon">
                    <img src="<?php echo get_field('djj_psh_ikon_mob'); ?>">
                </div>
            </div>

            <div class="forsidehoved-mob-liste">
                <?php echo get_field('djj_psh_ingr_under'); ?>
            </div>

            <?php if( get_field('djj_psh_formid') ) : ?>
                <div class="forsidehoved-inner2" id="bestilling">
                    <div class="gravity-forms">
                        <div class="gravity-forms-inner">
                            <div class="form-left">
                                <div class="form-left-inner-top">
                                    <?php echo get_field('djj_psh_skjema_head'); ?>
                                </div>
                                <div class="form-left-inner-bottom">
                                    <div class="step-outer">
                                        <p>Steg</p>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/gfx/steg_bestilling_01.svg" id="step1">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-right">
                                <?php echo do_shortcode('[gravityform id="' . get_field('djj_psh_formid') . '" title="false" description="false" ajax="true" tabindex="49"]'); ?>
                            </div>
                            <div class="form-right2" style="display:none;">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
