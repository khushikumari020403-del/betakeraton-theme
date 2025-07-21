<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-lg navbar-light" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="<?php echo esc_attr( $container ); ?>">

		<!-- Your site branding in the menu -->
		<?php get_template_part( 'global-templates/navbar-branding' ); ?>

		<?php if( get_field('vis_checktxt', 'options') ) : ?>
			<div class="header-check-outer">
				<div class="check-img">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/gfx/checkmark.png">
				</div>
				<div class="check-txt">
					<p class="p-black"><?php echo get_field('djj_check_txt1', 'options'); ?></p>
					<p class="p-blue"><?php echo get_field('djj_check_txt2', 'options'); ?></p>
				</div>
			</div>
		<?php endif; ?>

		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
		>
			<!-- <span class="navbar-toggler-icon"></span> -->
			<div class="open">
				<svg xmlns="http://www.w3.org/2000/svg" width="28" height="15.5" viewBox="0 0 28 15.5">
				  <g id="Group_507" data-name="Group 507" transform="translate(-288 -26.25)">
				    <line id="Line_71" data-name="Line 71" x2="28" transform="translate(288 27)" fill="none" stroke="#fff" stroke-width="1.5"/>
				    <line id="Line_72" data-name="Line 72" x2="28" transform="translate(288 34)" fill="none" stroke="#fff" stroke-width="1.5"/>
				    <line id="Line_73" data-name="Line 73" x2="28" transform="translate(288 41)" fill="none" stroke="#fff" stroke-width="1.5"/>
				  </g>
				</svg>
			</div>
			<div class="close hidden">
				<svg xmlns="http://www.w3.org/2000/svg" width="20.86" height="20.86" viewBox="0 0 20.86 20.86">
				  <g id="Group_702" data-name="Group 702" transform="translate(-291.57 -16.57)">
				    <line id="Line_71" data-name="Line 71" x2="28" transform="translate(292.1 17.101) rotate(45)" fill="none" stroke="#fff" stroke-width="1.5"/>
				    <line id="Line_73" data-name="Line 73" x2="28" transform="translate(292.1 36.899) rotate(-45)" fill="none" stroke="#fff" stroke-width="1.5"/>
				  </g>
				</svg>

			</div>

		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ms-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>

		<?php wp_nav_menu( array( 'theme_location' => 'hovedmeny2' ) ); ?>

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->
