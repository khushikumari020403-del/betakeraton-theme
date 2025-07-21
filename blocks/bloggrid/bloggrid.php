<?php
/**
 * Blogg grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'bloggrid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bloggrid';
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
            $args = array(
                'post_type' => 'post',
            );
            $the_query = new WP_Query( $args ); ?>

            <?php if ( $the_query->have_posts() ) : ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <div class="bloggrid-post">
                    <a href="<?php echo get_the_permalink(); ?>"></a>
                    <div class="bgbilde" style="background:url(<?php echo get_the_post_thumbnail_url(); ?>);background-size:cover;background-repeat:no-repeat;">
                        <?php if( get_field('vis_kategorier') ) : ?>
                            <div class="cat">
                                <?php $category = get_the_category(); ?>
                                <div class="kategoriknapp"><?php echo $category[0]->cat_name; ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="bloggrid-txt">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo get_the_date('d. F Y'); ?></p>
                        <a href="<?php echo get_the_permalink(); ?>"><?php if( get_field('djj_ba_lesmertxt') ): echo get_field('djj_ba_lesmertxt'); else : echo 'LES MER'; endif; ?></a>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
