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
		<div class="tag-meta">
	<?php echo wp_kses_post( ThemeHelper::get_category() ); ?>
	<?php echo wp_kses_post( ThemeHelper::get_tags() ); ?>
		</div>
	</div>

</article>
