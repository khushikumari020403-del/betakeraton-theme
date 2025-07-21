<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! has_custom_logo() ) { ?>

	<?php if ( is_front_page() || is_home() || is_page(524) || is_page(566) ) : ?>

		<h1 class="navbar-brand mb-0">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<img src="<?php echo get_stylesheet_directory_uri() . '/inc/gfx/logo_betakaroten_hvit.svg'; ?>">
			</a>
		</h1>

	<?php else : ?>

		<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
			<img src="<?php echo get_stylesheet_directory_uri() . '/inc/gfx/logo_betakaroten_brun.svg'; ?>">
		</a>

	<?php endif; ?>

	<?php
} else {
	the_custom_logo();
}
