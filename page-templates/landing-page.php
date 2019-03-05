<?php
/**
 * Template Name: Landing Page
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

get_header();

?>

<div class="block-main no-post-author feature-page">


	<!-- Top feature blade start -->
	<article <?php post_class('feature-container'); ?>>

		<!-- Page name and subtitle -->
		<h1><?php echo get_the_title(); ?></h1>

		<?php if ( have_posts() ){
			while ( have_posts() ){
				the_post();
				the_content();
			};
		}; ?>
		

	</article> <!-- /.feature-container blade -->

	<!-- bottom blade -->
	<div class="column--container">
		<div class="column col-2-of-3">
			<h3>Recent questions from Ask the MLA</h3>
			<!-- Ask the MLA loop -->
		</div>

		<div class="column col-1-of-3">
			<!-- Handbook button -->
			<?php get_template_part( "templates/buttons/buy-handbook-button" ); ?>
		</div>	
	</div>
	

</div> <!-- /.block-main -->

<?php

get_footer();
