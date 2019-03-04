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
		<div class="page-subtitle">
			Get started with MLA style. Learn how to document your sources, 
			set up your paper, and learn to write and teach better.
		</div>


		<!-- Column container. This uses flexbox to accommodate between 1 and 4 columns -->
		<div class="column--container">
			
			<div class="column">
				<img src="" class="column--icon">
				<h3 class="column--header">Documenting Sources</h3>
				<ul class="column--list">
					<li>Learn how to use our template of core elements, or build citations with an interactive template.</li>
					<li>Read our guide about using notes and posts about in-text citations.</li>
					<li>Get tips on citing digital works and learn how to cite an e-book.</li>
				</ul>
			</div>

			<div class="column">
				<img src="" class="column--icon">
				<h3 class="column--header">Setting Up Your Paper</h3>
				<ul class="column--list">
					<li>Get our formatting guidelines for academic research papers.</li>
					<li>Read sample papers written and formatted in MLA style.</li>
					<li>Learn how to create an annotated bibliography.</li>
				</ul>
			</div>

			<div class="column">
				<img src="" class="column--icon">
				<h3 class="column--header">Writing Tips and Resources</h3>
				<ul class="column--list">
					<li>Browse answers and ask MLA editors your style and formatting questions.</li>
					<li>Improve your writing with these articles.</li>
					<li>Get classroom-tested lesson plans, activities, and other resources to help teach MLA style.</li>
				</ul>
			</div>

		</div>

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
