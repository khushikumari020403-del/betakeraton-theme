<?php
/**
 * Produktfordeler Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'prodfordeler-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'prodfordeler';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$prodClass = '';
if( !get_field('djj_prf_forside') ) {
    $prodClass = 'underside';
}

if( get_field('djj_prf_prodside') ) {
    $prodClass = 'prodside';
}
?>


<div class="container alignfull <?php echo $className . ' ' . $prodClass; ?>">
    <div class="row">
        <div class="col-md-12 block-inner-content">
            <?php
            if( get_field('djj_prf_forside') ) : // FORSIDE ?>
                <div class="grid_foto">
                    <div class="grid">
                        <h2><?php echo get_field('djj_prf_head'); ?></h2>
                        <div class="ikon-grid">
                            <div class="ikon">
                                <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/01_ikon_naturlig_gul.svg">
                                <p><?php echo get_field('djj_prf_ikon1'); ?></p>
                            </div>
                            <div class="ikon">
                                <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/04_ikon_opptaksevne_gul.svg">
                                <p><?php echo get_field('djj_prf_ikon2'); ?></p>
                            </div>
                            <div class="ikon">
                                <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/02_ikon_kobber_gul.svg">
                                <p><?php echo get_field('djj_prf_ikon3'); ?></p>
                            </div>
                            <div class="ikon">
                                <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/05_ikon_biotin_gul.svg">
                                <p><?php echo get_field('djj_prf_ikon4'); ?></p>
                            </div>
                            <div class="ikon">
                                <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/03_ikon_veganere_gul.svg">
                                <p><?php echo get_field('djj_prf_ikon5'); ?></p>
                            </div>
                            <div class="ikon">
                                <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/05_ikon_analysert_gul.svg">
                                <p><?php echo get_field('djj_prf_ikon6'); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php if( get_field('djj_prf_img') ) : ?>
                        <div class="foto">
                            <img src="<?php echo get_field('djj_prf_img'); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <?php 
                if( get_field('djj_fv_plakat') ) :
                    $plakat = get_field('djj_prf_vid_pstr');
                else :
                    $plakat = get_stylesheet_directory_uri() . '/blocks/prodfordeler/img/poster.png';
                endif;

                if( get_field('djj_prf_vid_fil') ) : ?>
                    <div class="prf-video">
                        <h2>Hør hva hudekspertene har å si om Betakaroten og dens egenskaper:</h2>

                        <video nocontrols poster="<?php echo $plakat; ?>">
                          <source src="<?php echo get_field('djj_prf_vid_fil'); ?>" type="video/mp4">
                        </video>

                        <div class="overvideo">
                            <div class="overvideo-inner">
                                <div class="overvideo-inner-content">
                                    <div class="inner-content-txt">
                                        <?php echo get_field('djj_fv_txt'); ?>
                                    </div>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/blocks/prodfordeler/img/ikon_play.svg">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php
            else : // UNDERSIDE ?>
                <h2><?php echo get_field('djj_prf_head'); ?></h2>
                <div class="ikon-grid">
                    <div class="ikon">
                        <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/01_ikon_naturlig.svg">
                        <p><?php echo get_field('djj_prf_ikon1'); ?></p>
                    </div>
                    <div class="ikon">
                        <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/04_ikon_opptaksevne.svg">
                        <p><?php echo get_field('djj_prf_ikon2'); ?></p>
                    </div>
                    <div class="ikon">
                        <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/02_ikon_kobber.svg">
                        <p><?php echo get_field('djj_prf_ikon3'); ?></p>
                    </div>
                    <div class="ikon">
                        <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/05_ikon_biotin.svg">
                        <p><?php echo get_field('djj_prf_ikon4'); ?></p>
                    </div>
                    <div class="ikon">
                        <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/03_ikon_veganere.svg">
                        <p><?php echo get_field('djj_prf_ikon5'); ?></p>
                    </div>
                    <div class="ikon">
                        <img src="/wp-content/themes/betakaroten2.0/blocks/prodfordeler/img/05_ikon_analysert.svg">
                        <p><?php echo get_field('djj_prf_ikon6'); ?></p>
                    </div>
                </div>
            <?php
            endif; ?>
        </div>
    </div>
</div>
