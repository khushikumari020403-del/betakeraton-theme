<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<script>
	  jQuery(document).on('gform_page_loaded', function(event, form_id, current_page) {
	  	if (jQuery('body').hasClass('page-id-1045')) {
	      if (form_id === 5 && current_page === 2) {
					console.log("gform_page_loaded event:", form_id, current_page);
	      	jQuery('#label_5_21_1').html('Ja takk! Jeg vil bestille <strong>Betakaroten Premium</strong> til kun <span style="color: #f47a41;">79,-</span> for en måneds forbruk. Selges som abonnement uten bindingstid. Etter velkomsttilbudet vil du annenhver måned motta Betakaroten Premium for kun <span style="color: #f47a41;">449,- per måned</span> (kr 898,- annenhver måned). Alle forsendelser har <em>GRATIS frakt</em>. For å si opp abonnementet må du kontakte kundeservice innen 14 dager etter fakturadato, ved for sen oppsigelse forplikter du å motta neste planlagte levering. Vi er tilgjengelig for deg! * Tilbudet gjelder kun første pakke per nytegning av abonnement');
		
	      }
	    }
	  });
	</script>

	<?php wp_head(); ?>

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;600;700&family=Inter:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/slick.css"/>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/slick.min.js"></script>

	<!-- Beerslider (before/after) -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/BeerSlider.css">

</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<!-- POPUP -->
<?php
$showPopup = !strpos($_SERVER['REQUEST_URI'], 'page-id-524');
$showPopup = false;
if ($showPopup): ?>
<div id="popup" style="display:none;">
  <div class="popup-content">
  	<div class="heart-background">
  		<button class="close-button">
	      <i class="fa-light fa-xmark-large"></i>
	    </button>
	    <div class="popup-content-inner">
	    	<h2>Happy Valentines! </h2>
	    	<p>Delta i vår konkurranse og vinn en romatisk spa-opplevelse for to! &#x1F929; <span class="hjerte">&#x2764;</span></p>
	    	<a href="/valentines" class="button">Delta her</a>
	    </div>
  	</div>
  </div>
</div>
<?php endif; ?>
<!-- SLUTT POPUP -->

<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<?php if( !get_field('tlv1_skjul_header') ) : ?>
		<header id="wrapper-navbar">

			<?php get_template_part( 'global-templates/navbar', $navbar_type . '-' . $bootstrap_version ); ?>

		</header><!-- #wrapper-navbar -->
	<?php endif; ?>
