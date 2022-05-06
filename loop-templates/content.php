<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-4">
	<div class="card my-2">
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<a class="text-decoration-none text-dark article-link" href="<?= $display_post_url ?>">
				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
				<div class="card-body">
					<header class="entry-header">

						<?php
						the_title(
							sprintf( '<h5 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
							'</a></h5>'
						);
						?>

						<?php if ( 'post' === get_post_type() ) : ?>

							<div class="entry-meta card-sub-title">
								<?php understrap_posted_on(); ?>
							</div><!-- .entry-meta -->

						<?php endif; ?>

					</header><!-- .entry-header -->

					<div class="entry-content">
						<p class="card-text">
							<?php
							the_excerpt();
							understrap_link_pages();
							?>
						</p>
					</div><!-- .entry-content -->
				</div><!-- .card-body -->
			</a><!-- .article-link -->
		</article><!-- #post-## -->
	</div><!-- .card -->
</div><!-- .col -->
