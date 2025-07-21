<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>

	<div class="content-outer">

		<div class="content-main">
			<header class="entry-header">

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">

				<div class="ingress">
					<?php echo get_the_excerpt(); ?>
				</div>

				<?php if( get_field('gravity_forms_id') ) : ?>
					<div class="gravity-forms">
	                    <?php echo do_shortcode('[gravityform id="' . get_field('gravity_forms_id') . '" title="false" description="false" ajax="true" tabindex="49"]'); ?>
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/gfx/step_1.png" id="step1">
	                </div>
	            <?php endif; ?>

				<?php
				the_content();
				understrap_link_pages();

				global $post;
				$currentID = $post->ID;
				?>

			</div><!-- .entry-content -->
		</div>
		<div class="content-sidebar">
			<div class="lesogsaa">
				<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'post__not_in' => array($currentID),
					'posts_per_page' => 4
				);
				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>
					<h3>Les også</h3>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							
							<div class="lesogsaa-art">
								<a href="<?php echo get_the_permalink(); ?>"></a>
								<div class="lesogsaa-art-cont">
									<img src="<?php echo get_the_post_thumbnail_url(null,'thumbnail'); ?>">
									<div class="art-inner">
										<h4><?php the_title(); ?></h4>
										<p class="dato"><?php echo get_the_date('d. F Y'); ?></p>
									</div>
								</div>
							</div>
							
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

				<?php endif; ?>
			</div>
		</div>
	</div>

	<footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
