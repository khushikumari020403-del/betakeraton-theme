<?php
/**
 * Kudene våre sier Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'kundersier-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'kundersier';
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

            <h2><?php echo get_field('djj_kvs_heading'); ?></h2>
            <h3><?php echo get_field('djj_kvs_ingress'); ?></h3>

            <p><?php echo get_field('djj_kvs_overtall'); ?></p>

            

            <?php 
            if( have_rows('djj_kvs_tallene') ):
                echo '<div class="tallene">';

                    while( have_rows('djj_kvs_tallene') ) : the_row(); ?>

                        <div class="tall">
                            <h4><?php echo get_sub_field('djj_kvs_prst'); ?> <span class="prst">%</span></h4>
                            <p><?php echo get_sub_field('djj_kvs_beskr'); ?></p>
                        </div>

                    <?php
                    endwhile;

                echo '</div>';
            endif; ?>


            <div class="lenke">
                <a href="#bestilling"><?php echo get_field('djj_kvs_urltxt'); ?></a>
            </div>

        </div>
    </div>
</div>
