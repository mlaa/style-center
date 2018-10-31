<?php
/**
 * Template Name: Home
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

get_header('home');

?>

<div class="block-main no-post-author">

	<article <?php post_class(); ?>>

		<?php get_sidebar( 'homepage-top' ); ?>

		<div class="tile tile-content tile-buy tile-sidebar">
			<a class="order-link" href="https://www.mla.org/Publications/Bookstore/Nonseries/MLA-Handbook-Eighth-Edition">
				<div class="order-button-container">
					<span class="order-button button">Order your copy today</span>
				</div>
			</a>
		</div>

		<?php get_sidebar( 'homepage-bottom' ); ?>

		<?php get_sidebar( 'homepage-side' ); ?>

	</article>

</div> <!-- /.block-main -->

<?php

get_footer();
