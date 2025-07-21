<?php
/**
 * Template for displaying all pages
 */

get_header();
?>

<main id="primary" class="site-main container">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content(); // This will render your ACF blocks if added in editor.
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
