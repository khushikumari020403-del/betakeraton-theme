<?php
/**
 * Contaxt box Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contactbox-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contactbox';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container <?php echo $className; ?>">
    <div class="row">
        <div class="col-md-12 block-inner-content">

            <div class="contactbox-cont">
                <p class="header"><?php echo get_field('djj_cb_overskrift'); ?></p>
                <div class="contact">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/contactbox/img/konvolutt.png">
                    <p><?php echo get_field('djj_cb_epost'); ?></p>
                </div>
                <div class="contact">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/contactbox/img/telefon.png">
                    <p><?php echo get_field('djj_cb_tlf'); ?></p>
                </div>
            </div>

        </div>
    </div>
</div>
