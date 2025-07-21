<?php
/**
 * Fullbredde bilde og text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'fullimgtxt-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'fullimgtxt';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} ?>

<?php
// Bakgrunn
$bgstyle = '';
if( get_field('djj_fbt_bg') ) :
    $bgstyle = 'background:#' . get_field('djj_fbt_bg') . ';';
else :
    $bgstyle = 'background:#5ec9e2;';
endif;
if( get_field('djj_fbt_bg') && get_field('djj_fbt_bg2') ) :
    $bgstyle = 'background:linear-gradient(to top right,#' . get_field('djj_fbt_bg') . ' 39.9%,#' . get_field('djj_fbt_bg2') . ');';
endif;

// Tekst
if( get_field('djj_fbt_txt') ) :
    $txt = get_field('djj_fbt_txt');
else : 
    $txt = '<h3>Skriv inn <strong>en tekst</strong>...</h3>';
endif;

// Bilde
if( get_field('djj_fbt_img') ) :
    $img = get_field('djj_fbt_img');
else : 
    $img = get_stylesheet_directory_uri() . '/inc/gfx/head_blank.png';
endif;
?>

<div class="container alignfull" style="<?php echo $bgstyle; ?>">
    <div class="row">
        <div class="col-md-12 fullimgtxt block-inner-content">

            <div class="fullimgtxt-inner">
                <div class="fullimgtxt-img">
                    <img src="<?php echo $img; ?>">
                </div>
                <div class="fullimgtxt-txt">
                    <?php echo $txt; ?>
                </div>
            </div>

        </div>
    </div>
</div>
