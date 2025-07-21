<?php
/**
 * Before & After Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'beforeafter-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'beforeafter';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container alignfull <?php echo $className; ?>" style="background:#f1f6fc;">
    <div class="row">
        <div class="col-md-12 block-inner-content">

            <?php
            if(get_field('djj_bfa_overskrift')) :
                echo '<div class="mainheader">';
                    echo get_field('djj_bfa_overskrift');
                    echo '</div>';
            endif;
            ?>
            
            <div id="foretter" class="beer-slider" data-beer-label="before">
              <img src="<?php echo get_field('djj_bfa_before'); ?>">
              <div class="beer-reveal" data-beer-label="after">
                <img src="<?php echo get_field('djj_bfa_after'); ?>">
              </div>
            </div>

        </div>
    </div>
</div>
