<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

<?php if ( get_theme_mod( 'full_page_header', 1 ) ) : ?>

	<?php
		while ( have_posts() ) : the_post();
			$bg_img_url = get_the_post_thumbnail_url();
			$full_page_title = get_the_title();
		endwhile;
	?>

	<section class="wp-bp-full-page-header" <?php if ( $bg_img_url ) : ?> style="background-image: url( <?php echo esc_url( $bg_img_url ); ?> )" <?php endif; ?>>
		<div class="page-header-overlay" <?php if ( $bg_img_url ) : ?> style="background-color: rgba(0, 0, 0, 0.5);" <?php endif; ?>>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<h1><?php echo $full_page_title; ?></h1>
						<?php if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php wp_bootstrap_4_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

	<div class="container">
		<div class="row">

			<?php if ( $default_sidebar_position === 'no' ) : ?>
				<div class="col-md-12 wp-bp-content-width">
			<?php else : ?>
				<div class="col-md-8 wp-bp-content-width">
			<?php endif; ?>

				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(array(
				            'prev_text' => esc_html__( '&laquo; Previous Post', 'wp-bootstrap-4' ),
				            'next_text' => esc_html__( 'Next Post &raquo;', 'wp-bootstrap-4' ),
				        ) );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<!-- /.col-md-8 -->

			<?php if ( $default_sidebar_position != 'no' ) : ?>
				<?php if ( $default_sidebar_position === 'right' ) : ?>
					<div class="col-md-4 wp-bp-sidebar-width">
				<?php elseif ( $default_sidebar_position === 'left' ) : ?>
					<div class="col-md-4 order-md-first wp-bp-sidebar-width">
				<?php endif; ?>
						<?php get_sidebar(); ?>
					</div>
					<!-- /.col-md-4 -->
			<?php endif; ?>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

<?php
get_footer();
