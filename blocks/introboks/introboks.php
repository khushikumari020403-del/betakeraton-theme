<?php
/**
 * Introboks Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'introboks-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'introboks';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container alignfull <?php echo $className; ?>" style="background:<?php echo get_field('djj2_intro_bg'); ?>">
    <div class="row">
        <div class="col-md-12 block-inner-content">
            <div class="introboks-content">
                <div class="txt">
                    <?php
                    if( get_field('djj2_intro_txt') ) :
                        echo get_field('djj2_intro_txt');
                    else:
                        echo '<p>Tekst her</p>';
                    endif; ?>
                </div>
                <div class="img">
                    <?php
                    if( get_field('djj2_intro_img') ) :
                        echo '<img src="' . get_field('djj2_intro_img') . '">';
                    else:
                        echo '';
                    endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
