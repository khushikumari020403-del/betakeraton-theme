<?php
/**
 * Step by step Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'stepbystep-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'stepbystep';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container alignfull <?php echo $className; ?>">
    <div class="row">
        <div class="col-12 col-md-12 block-inner-content">

            <?php
            if(get_field('djj_sbs_header')) :
                echo '<div class="mainheader">';
                    echo get_field('djj_sbs_header');
                    echo '</div>';
            endif;

            if(get_field('djj_sbs_biheader')) :
                echo '<div class="biheader">';
                    echo get_field('djj_sbs_biheader');
                    echo '</div>';
            endif;
            ?>

            <?php
            if( have_rows('djj_sbs_steps') ): ?>
                <div class="steps-outer small-screen">
                    <div class="step-slider">
                        <?php
                        $i = 1;
                        while( have_rows('djj_sbs_steps') ) : the_row();

                            $overskrift = get_sub_field('djj_sbs_step_headl');
                            $tekst = get_sub_field('djj_sbs_step_txt'); ?>

                            <div class="step step<?php echo $i; ?>">
                                <?php
                                if( $i == 1 || $i == 13 ) { ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/box1.svg" class="bilde1">
                                <?php
                                }
                                if( $i == 2 || $i == 3 || $i == 4|| $i == 5 || $i == 6 || $i == 7 || $i == 9 || $i == 10 || $i == 11 ) { ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/box2-3.svg" class="bilde2">
                                <?php
                                }
                                if( $i == 8 || $i == 16 ) { ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/box4.svg" class="bilde4">
                                <?php
                                }
                                ?>
                                <div class="step-content">
                                    <div class="step-cont-header">
                                        <div class="step-tall">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/sirkel.svg">
                                            <p><?php echo $i; ?></p>
                                        </div>
                                        <div class="step-ikon">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/ikon.svg">
                                        </div>
                                    </div>
                                    <div class="step-txt">
                                        <h4><?php echo get_sub_field('djj_sbs_step_headl'); ?></h4>
                                        <p><?php echo get_sub_field('djj_sbs_step_txt'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $i++;
                        endwhile; ?>
                    </div>
                </div>

                <div class="steps-outer big-screen">
                    <?php
                    $i = 1;
                    while( have_rows('djj_sbs_steps') ) : the_row();

                        $overskrift = get_sub_field('djj_sbs_step_headl');
                        $tekst = get_sub_field('djj_sbs_step_txt'); ?>

                        <div class="step step<?php echo $i; ?>">
                            <?php
                            if( $i == 1 || $i == 5 || $i == 9 || $i == 13 ) { ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/box1.svg" class="bilde1">
                            <?php
                            }
                            if( $i == 2 || $i == 6 || $i == 10 ) { ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/box2-3.svg" class="bilde2">
                            <?php
                            }
                            if( $i == 3 || $i == 7 || $i == 11 ) { ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/box2-3.svg" class="bilde3">
                            <?php
                            }
                            if( $i == 4 || $i == 8 || $i == 12 || $i == 16 ) { ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/box4.svg" class="bilde4">
                            <?php
                            }
                            ?>
                            <div class="step-content">
                                <div class="step-cont-header">
                                    <div class="step-tall">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/sirkel.svg">
                                        <p><?php echo $i; ?></p>
                                    </div>
                                    <div class="step-ikon">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/stepbystep/img/ikon.svg">
                                    </div>
                                </div>
                                <div class="step-txt">
                                    <h4><?php echo get_sub_field('djj_sbs_step_headl'); ?></h4>
                                    <p><?php echo get_sub_field('djj_sbs_step_txt'); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                        $i++;
                    endwhile; ?>
                </div>
            <?php
            endif;
            ?>

        </div>
    </div>
</div>
