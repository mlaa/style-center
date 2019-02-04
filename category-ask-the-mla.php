<?php
/**
 * Content "single" template part
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

global $wp_query;
$args = array_merge( $wp_query->query_vars, array( 'posts_per_page' => 10 ) );
query_posts( $args );

$the_category = get_the_category();
$search_form = get_search_form( false );
$search_form = preg_replace(
	'/action=".*">/',
	'action="' . get_category_link( $the_category[0]->cat_ID ) . '">',
	$search_form
);

get_header();

?>

<div class="block-main <?php if ( isset( $_GET['s'] ) ): ?> faq-search-active<?php endif ?>">

	<h1>
		<?php echo wp_kses_post( ThemeHelper::get_page_title() ); ?>
		<div class="tile-tag icon-faq">FAQ</div>
	</h1>

	<div class="faq-search">
		<p>Search our list of frequently asked questions.</p>
		<?php echo $search_form; ?>
		Haven't found what you're looking for? <a href="/ask-a-question">Submit a question.</a>
	</div>

	<div class="nav-head">
	<p>Recently Answered Questions</p>
		<?php
			the_posts_pagination( array(
				'mid_size'  => 4,
				'prev_text' => __( '≪ Previous', 'textdomain' ),
				'next_text' => __( 'Next ≫', 'textdomain' ),
			) );
		?>
	</div>

	<br>

<?php

if ( have_posts() ) :

	$count = 0;

	while ( have_posts() ) :

		the_post();
		$count++;

?>

<article <?php post_class( "loop-$count" ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<a href="#" class="toggle-answer">Answer</a>
	<div class="answer" style="display: none;"><?php the_content(); ?></div>

</article>

<?php

	endwhile;

else :

	get_template_part( 'templates/content', 'no-results' );

endif;

?>

<?php
	the_posts_pagination( array(
		'mid_size'  => 4,
		'prev_text' => __( '≪ Previous', 'textdomain' ),
		'next_text' => __( 'Next ≫', 'textdomain' ),
	) );
?>

</div>

<?php

get_sidebar();
get_footer();

?>
