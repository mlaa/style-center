<?php
/**
 * Template Name: Landing Page
 *
 * @package MLAStyleCenter
 */



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
		};

		wp_reset_postdata();
		 ?>
		

	</article> <!-- /.feature-container blade -->

	<!-- bottom blade -->
	<div class="column--container">
		<div class="column col-2-of-3">
			<h3>Recent questions from Ask the MLA</h3>

			<?php $args = array('cat' => 3);

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
} ?>
			
			<ul class="question-list">
				<li class="question-list--question">Six most recent questions</li>
				<li class="question-list--question">Six most recent questions</li>
				<li class="question-list--question">Six most recent questions</li>
				<li class="question-list--question">Six most recent questions</li>
				<li class="question-list--question">Six most recent questions</li>
				<li class="question-list--question">Six most recent questions</li>
			</ul>
		</div>

		<div class="column col-1-of-3">
			<!-- Handbook button -->
			<?php get_template_part( "templates/buttons/buy-handbook-button" ); ?>
		</div>	
	</div>
	

</div> <!-- /.block-main -->

<?php

get_footer();
