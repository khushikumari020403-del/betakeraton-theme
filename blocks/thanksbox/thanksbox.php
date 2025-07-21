<?php
/**
 * Thank you box Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'thanksbox-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'thanksbox';
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

            <div class="thanksbox-cont">
                <?php
                if( get_field('djj_tb_cont') ) :
                    echo get_field('djj_tb_cont');
                else : ?>
                    <p class="header">Innhold her...</p>
                <?php
                endif; ?>
                
                <a href="<?php echo get_home_url(); ?>" class="close-btn">x</a>
            </div>

        </div>
    </div>
</div>
