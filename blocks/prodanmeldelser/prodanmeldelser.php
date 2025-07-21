<?php
/**
 * Prodanmeldelser Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'prodanmeldelser-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'prodanmeldelser';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container alignfull <?php echo $className; ?>">
    <div class="row">
        <div class="col-md-12 block-inner-content">

           <h2><?php echo get_field('djj_pan_heading'); ?></h2>

            <div class="anm-grid">
                <div class="anm-pitch">
                    <h3><?php echo get_field('djj_pan_underhead'); ?></h3>
                </div>
                <div class="anm-txt">
                    <?php echo get_field('djj_pan_txt'); ?>
                </div>
            </div>

            <div class="anm-anmeldelser">

                <?php
                if( have_rows('djj_pan_anm') ):
                    while( have_rows('djj_pan_anm') ) : the_row(); ?>

                        <div class="anm-anmeldelse">
                            <div class="anm-inner">
                                <img src="<?php echo get_sub_field('djj_anm_img'); ?>">
                                <div class="anm-inner-info">
                                    <h4><?php echo get_sub_field('djj_anm_navn'); ?></h4>

                                    <?php $stjerner = get_sub_field('djj_anm_stars'); ?>
                                    <div class="stars stars<?php echo $stjerner; ?>">
                                        <?php
                                        for ($x = 0; $x < $stjerner; $x++) {
                                          echo '<img src="' . get_stylesheet_directory_uri() . '/blocks/prodanmeldelser/img/stjerne_fill.svg">';
                                        }
                                        for ($x = 0; $x < 5 - $stjerner; $x++) {
                                          echo '<img src="' . get_stylesheet_directory_uri() . '/blocks/prodanmeldelser/img/stjerne_outline.svg">';
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>  
                            <div class="anm-txt">
                                <p><?php echo get_sub_field('djj_anm_txt'); ?></p>
                            </div>
                        </div>

                    <?php endwhile;
                endif; ?>

            </div>

            <?php if( get_field('djj_pan_insta_url') ) : ?>
                <div class="insta">
                    <p>@betakarotenofficial</p>
                    <button><a href="<?php echo get_field('djj_pan_insta_url'); ?>">Følg oss på Instagram</a></button>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
