<?php
/**
 * Sidebar setup for footer full
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<?php if( !get_field('skjul_pkt_footer') && have_rows('djj_salgspkter_footer','options') ) :

		if( get_field('pkt_bgfarge')) :
			$bgfarge = '#F6DFA4';
		else:
			$bgfarge = 'transparent';
		endif;
		?>

		<div class="footer-above-pkt-outer alignfull" style="background:<?php echo $bgfarge; ?>">
			<div class="footer-above-pkt">
				<ul>
					<?php while( have_rows('djj_salgspkter_footer','options') ) : the_row(); ?>

				        <li><span class="pkt-header"><?php echo get_sub_field('djj_salgsheader'); ?></span><p><?php echo get_sub_field('djj_salgspkt'); ?></p></li>

				    <?php endwhile; ?>
				</ul>
			</div>
		</div>

	<?php endif; ?>

	<div class="wrapper" id="wrapper-footer-full" role="complementary">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">
				<?php dynamic_sidebar( 'footfulltop' ); ?>
				<?php dynamic_sidebar( 'footerfull' ); ?>
				<div class="bunntekst">
					<?php dynamic_sidebar( 'footfullbtm' ); ?>
				</div>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

	<?php
endif;
