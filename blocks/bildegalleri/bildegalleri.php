<?php
/**
 * Bildegalleri Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'bildegalleri-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bildegalleri';
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

            <div class="product-media-container">
                <div class="product-media">
                    <div class="product-carousel">
                        <div class="product-carousel__thumbnail-container" id="divId" onclick="changeImageOnClicks(event)">

                            <?php
                            $i = 0;
                            if( have_rows('djj_bgb_bilder') ):
                                while( have_rows('djj_bgb_bilder') ) : the_row(); 

                                    if( $i == 0 ) {
                                        $class = ' aktiv';
                                    } else {
                                        $class = '';
                                    }

                                    ?>

                                    <div class="product-carousel__thumbnail">
                                        <div class="component-image-container">
                                            <img class="imgStyle lazyloaded <?php echo $class; ?>" src="<?php echo get_sub_field('djj_bgb_bilde'); ?>" />
                                        </div>
                                    </div>
                                
                                    <?php $i++; ?>
                                <?php endwhile;
                                reset_rows();
                            endif; ?>
                            
                        </div>

                        <?php
                        $i = 0;
                        if( have_rows('djj_bgb_bilder') ):
                            while( have_rows('djj_bgb_bilder') ) : the_row(); 
                                if( $i != 0 ) { break; $i++; } ?>


                                <div class="product-carousel__image">
                                    <div class="media-insert-container">
                                        <div class="component-image-container">
                                            <img id="mainImage" src="<?php echo get_sub_field('djj_bgb_bilde'); ?>"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php $i++; ?>
                            <?php endwhile;
                            reset_rows();
                        endif; ?>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
