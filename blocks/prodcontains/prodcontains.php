<?php
/**
 * Prod contains Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'forsidehoved-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'prodcontains';
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

            <?php
            if(get_field('djj_pi_header')) :
                echo '<div class="mainheader">';
                    echo get_field('djj_pi_header');
                    echo '</div>';
            endif;

            if(get_field('djj_pi_biheader')) :
                echo '<div class="biheader">';
                    echo get_field('djj_pi_biheader');
                    echo '</div>';
            endif;
            ?>
            <div class="steps-outer">
                <div class="step step1">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/prodcontains/img/step1_container.svg" class="big-screen">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/prodcontains/img/step1_container_mob.svg" class="small-screen">
                    <div class="step-inner">
                        <div class="step-inner-content step-inner-content1">
                            <div class="sirkel-outer">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/prodcontains/img/sirkel.svg">
                                <div class="sirkel-txt">
                                    <h3><?php echo get_field('djj_pi_stegtxt'); ?></h3>
                                    <h2>1</h2>
                                </div>
                            </div>
                            <h4><?php echo get_field('djj_pi_steg1head'); ?></h4>
                            <div class="step-list">
                                <ul>
                                    <?php
                                    if( have_rows('djj_liste_steg1') ):
                                        while( have_rows('djj_liste_steg1') ) : the_row();
                                            echo '<li>' . get_sub_field('steg1_listepkt') . '</li>';
                                        endwhile;
                                    endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step step2">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/prodcontains/img/step2_container.svg" class="big-screen">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/prodcontains/img/step2_container_mob.svg" class="small-screen">
                    <div class="step-inner">
                        <div class="step-inner-content step-inner-content2">
                            <div class="sirkel-outer">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/prodcontains/img/sirkel.svg">
                                <div class="sirkel-txt">
                                    <h3><?php echo get_field('djj_pi_stegtxt'); ?></h3>
                                    <h2>2</h2>
                                </div>
                            </div>
                            <h4><?php echo get_field('djj_pi_steg2head'); ?></h4>
                            <div class="step-list step2-list">
                                <ul>
                                    <?php
                                    if( have_rows('djj_liste_steg2') ):
                                        while( have_rows('djj_liste_steg2') ) : the_row();
                                            echo '<li>' . get_sub_field('steg2_listepunkt') . '</li>';
                                        endwhile;
                                    endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <a href="#bestilling" class="bestillbutton"><?php echo get_field('djj_pi_button'); ?></a>

        </div>
    </div>
</div>
