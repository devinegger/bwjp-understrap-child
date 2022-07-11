<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( 'post' === get_post_type() ) :
	$display_class = "post";	
elseif (get_post_type() === 'page'):
	$display_class = "page";
endif;

?>

<div class="col-md-4 p-3 <?= $display_class ?>">
	<div class="article-wrap border p-3">
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<header class="entry-header">

				<?php
				the_title(
					sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h3>'
				);
				?>
				<div class="entry-meta">

					<?php understrap_posted_on(); ?>

				</div><!-- .entry-meta -->

			</header><!-- .entry-header -->

			<div class="entry-summary">

				<?php the_excerpt(); ?>

			</div><!-- .entry-summary -->

			<footer class="entry-footer">

				<?php understrap_entry_footer(); ?>

			</footer><!-- .entry-footer -->

		</article><!-- #post-## -->
	</div>
</div>
