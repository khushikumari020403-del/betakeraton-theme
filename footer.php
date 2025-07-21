<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<?php //understrap_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/BeerSlider.js"></script>
<script src="https://kit.fontawesome.com/ac3843b8d2.js" crossorigin="anonymous"></script>
<script>
  var slider = new BeerSlider( document.getElementById( "foretter" ) );
</script>

<script>
	function changeImageOnClicks(event) {
	  // debugger;
	  var targetElement = event.srcElement;
	  // debugger;
	  if (targetElement.tagName === "IMG") {
	    mainImage.src = targetElement.getAttribute("src");
	  }
	}
</script>

</body>

</html>

