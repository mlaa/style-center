<?php
/**
 * Search result template part
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

?>
<article <?php post_class(); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p class="excerpt"><?php echo wp_kses_post( ThemeHelper::get_search_snippet( get_the_content(), get_the_excerpt() ) ); ?></p>
	<div class="blog-meta">
	<?php

	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		echo wp_kses_post(
			sprintf(
				'<a rel="tag" class="category" href="%1$s">%2$s</a>',
				// @codingStandardsIgnoreStart
				get_category_link( $categories[0]->term_id ),
				// @codingStandardsIgnoreEnd
				$categories[0]->name
			)
		);
	}

	?>
	<?php echo wp_kses_post( ThemeHelper::get_tags() ); ?>
	</div>

</article>
