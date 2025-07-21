<?php
/**
 * Ingrediensliste Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'ingrediensliste-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'ingrediensliste';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} 
?>


<div class="container alignfull <?php echo $className; ?>" style="background:#f1f6fc;">
    <div class="row">
        <div class="col-md-12 fullimgtxt block-inner-content">

            <?php
            if(get_field('djj_il_header')) :
                $header = get_field('djj_il_header');
            else:
                $header = '<h2>Tekst her..</h2>';
            endif;

            if( get_field('djj_il_img') ) :
                $img = get_field('djj_il_img');
            else : 
                $img = get_stylesheet_directory_uri() . '/blocks/ingrediensliste/img/prodbilde_strek.png';
            endif;
            ?>

            <div class="mainheader">
                    <?php echo $header; ?>
            </div>

            <div class="liste-content">
                <div class="liste-img">
                    <img src="<?php echo $img; ?>">
                </div>
                <div class="liste-liste">

                    <?php
                    // Outer liste
                    if( have_rows('djj_il_liste') ):
                        while( have_rows('djj_il_liste') ) : the_row();

                            echo '<h4>' . get_sub_field('djj_il_heading') . '</h4>';

                            // Inner liste
                            if( have_rows('djj_il_pkts') ):
                                echo '<ul>';
                                while( have_rows('djj_il_pkts') ) : the_row();

                                    echo '<li>' . get_sub_field('djj_il_listepkt') . '</li>';

                                endwhile;
                                echo '</ul>';
                            endif; // Slutt: inner liste

                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
