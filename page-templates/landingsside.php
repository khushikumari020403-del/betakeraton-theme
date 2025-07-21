<?php
/**
 * Template Name: Landingsside v1
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

$wrapper_id = 'full-width-page-wrapper';
if ( is_page_template( 'page-templates/no-title.php' ) ) {
	$wrapper_id = 'no-title-page-wrapper';
}
?>
<div class="wrapper" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">

	<?php if( have_rows('djj_scroll_txts') ): // Sjekk om repeaterfeltet har noen rader ?>
	    <div class="scrollebanner scrollebanner-gul">
	        <div class="marqueebanner">
	            <?php 
	            $texts = [];
	            while( have_rows('djj_scroll_txts') ) : the_row();
	                $text = get_sub_field('djj_scroll_txt');
	                if( !empty($text) ) $texts[] = $text;
	            endwhile;

	            $count = count($texts);
	            $repeat_times = max(1, 8 / $count); // Beregner antall ganger hver tekst skal gjentas, minimum 1
	            for( $i = 0; $i < $repeat_times; $i++ ):
	                foreach( $texts as $text ):
	                    echo "<span class='marquee-txt'>{$text}</span><span class='marquee-dot'>·</span>";
	                endforeach;
	            endfor;
	            ?>
	        </div>
	    </div>
	<?php elseif( is_page(204) ) : ?>
		<div class="scrollebanner scrollebanner-gul">
			<div class="marqueebanner"><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 72% RABATT!</span><span class="marquee-dot">·</span><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 72% RABATT!</span><span class="marquee-dot">·</span><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 72% RABATT!</span><span class="marquee-dot">·</span><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 72% RABATT!</span><span class="marquee-dot">·</span></div>
		</div>
	<?php elseif( is_page(388) ) : ?>
		<div class="scrollebanner scrollebanner-gul">
			<div class="marqueebanner"><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 50% RABATT!</span><span class="marquee-dot">·</span><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 50% RABATT!</span><span class="marquee-dot">·</span><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 50% RABATT!</span><span class="marquee-dot">·</span><span class="marquee-txt">NORGES KRAFTIGSTE</span><span class="marquee-dot">·</span><span class="marquee-txt">HELE 50% RABATT!</span><span class="marquee-dot">·</span></div>
		</div>
	<?php elseif( is_page(343) ) : ?>
		<div class="scrollebanner scrollebanner-gul">
			<div class="marqueebanner"><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span><span class="marquee-txt">FAST LAVPRIS</span><span class="marquee-dot">·</span></div>
		</div>
	<?php elseif( is_page(352) ) : ?>
		<div class="scrollebanner scrollebanner-gul">
			<div class="marqueebanner"><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span><span class="marquee-txt">VÅR LAVESTE PRIS NOENSINNE</span><span class="marquee-dot">·</span></div>
		</div>
	<?php elseif( is_page( 431 ) ) : ?>
		<div class="scrollebanner scrollebanner-svart">
			<div class="marqueebanner"><span class="marquee-txt">72% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span><span class="marquee-txt">72% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span><span class="marquee-txt">72% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span><span class="marquee-txt">72% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span></div>
		</div>
	<?php elseif( is_page( 449 ) ) : ?>
		<div class="scrollebanner scrollebanner-svart">
			<div class="marqueebanner"><span class="marquee-txt">40% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span><span class="marquee-txt">40% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span><span class="marquee-txt">40% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span><span class="marquee-txt">40% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">ELLEVILT NYTTÅRSTILBUD</span><span class="marquee-dot">·</span></div>
		</div>
	<?php elseif( is_page( 709 ) ) : ?>
		<div class="scrollebanner scrollebanner-gul">
			<div class="marqueebanner"><span class="marquee-txt">50% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">FRI FRAKT</span><span class="marquee-dot">·</span><span class="marquee-txt">50% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">FRI FRAKT</span><span class="marquee-dot">·</span><span class="marquee-txt">50% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">FRI FRAKT</span><span class="marquee-dot">·</span><span class="marquee-txt">50% RABATT</span><span class="marquee-dot">·</span><span class="marquee-txt">FRI FRAKT</span><span class="marquee-dot">·</span></div>
		</div>
	<?php else : ?>
		<div class="scrollebanner scrollebanner-gul">
			<div class="marqueebanner"><span class="marquee-txt">FÅ MED GRATIS VIPPESERUM (VERDI 556,-)</span><span class="marquee-dot">·</span><span class="marquee-txt">50% rabatt</span><span class="marquee-dot">·</span><span class="marquee-txt">FÅ MED GRATIS VIPPESERUM (VERDI 556,-)</span><span class="marquee-dot">·</span><span class="marquee-txt">50% rabatt</span><span class="marquee-dot">·</span><span class="marquee-txt">FÅ MED GRATIS VIPPESERUM (VERDI 556,-)</span><span class="marquee-dot">·</span><span class="marquee-txt">50% rabatt</span><span class="marquee-dot">·</span><span class="marquee-txt">FÅ MED GRATIS VIPPESERUM (VERDI 556,-)</span><span class="marquee-dot">·</span><span class="marquee-txt">50% rabatt</span><span class="marquee-dot">·</span></div>
		</div>
	<?php endif; ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
