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

		<div class="tile tile-content  tile-sidebar" style="background-color: transparent"> <!-- Removed class tile-buy -->
			<!--<a class="order-link" href="https://www.mla.org/Publications/Bookstore/Nonseries/MLA-Handbook-Eighth-Edition">
				<div class="order-button-container">
					<span class="order-button button">Get the e-book now</span>
				</div>
			</a>-->
			<?php get_template_part( "templates/buttons/buy-handbook-button" ); ?>
		</div>

		<?php get_sidebar( 'homepage-bottom' ); ?>

		<?php get_sidebar( 'homepage-side' ); ?>

	</article>

</div> <!-- /.block-main -->

<?php

get_footer();
