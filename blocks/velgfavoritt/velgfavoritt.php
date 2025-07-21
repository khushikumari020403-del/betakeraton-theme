<?php
/**
 * Velg din favoritt Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'velgfavoritt-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'velgfavoritt';
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
            <h2><?php echo get_field('djj_vdf_header'); ?></h2>
            <div class="velgfavoritt-content">
                <?php if ( get_field('djj_vdf_img1') ): ?>
                    <div class="prod-content">
                        <a href="<?php echo get_field('djj_vdf_url1'); ?>"></a>
                        <div class="pakke-outer">
                            <img src="<?php echo get_field('djj_vdf_img1'); ?>">
                        </div>
                        <div class="header-outer">
                            <div class="header-main">
                                <h4>Betakaroten</h4>
                                <h3><?php echo get_field('djj_vdf_pnavn1'); ?></h3>
                            </div>
                            <div class="header-pitch">
                                <p>– <?php echo get_field('djj_vdf_besk1'); ?></p>
                            </div>
                        </div>
                        <div class="pakke-facts">
                            <?php if( have_rows('djj_vdf_facts1') ): ?>
                                <ul>
                                <?php while( have_rows('djj_vdf_facts1') ): the_row(); 
                                    $pkt = get_sub_field('djj_vdf_pkt1');
                                    ?>
                                    <li>
                                        <?php echo $pkt; ?>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( get_field('djj_vdf_img2') ): ?>
                    <div class="prod-content">
                        <a href="<?php echo get_field('djj_vdf_url2'); ?>"></a>
                        <div class="pakke-outer">
                            <img src="<?php echo get_field('djj_vdf_img2'); ?>">
                        </div>
                        <div class="header-outer">
                            <div class="header-main">
                                <h4>Betakaroten</h4>
                                <h3><?php echo get_field('djj_vdf_pnavn2'); ?></h3>
                            </div>
                            <div class="header-pitch">
                                <p>– <?php echo get_field('djj_vdf_besk2'); ?></p>
                            </div>
                        </div>
                        <div class="pakke-facts">
                            <?php if( have_rows('djj_vdf_facts2') ): ?>
                                <ul>
                                <?php while( have_rows('djj_vdf_facts2') ): the_row(); 
                                    $pkt = get_sub_field('djj_vdf_pkt2');
                                    ?>
                                    <li>
                                        <?php echo $pkt; ?>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
