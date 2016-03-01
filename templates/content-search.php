<?php
/**
 * Search result template part
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \esc_html;
use \esc_url;
use \get_category_link;
use \get_the_category;
use \get_the_content;
use \get_the_tag_list;
use get_search_snippet;
use \post_class;
use \the_permalink;
use \the_title;

?>
<article <?php post_class(); ?>>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php echo ThemeHelper::get_search_snippet( get_the_content(), get_the_excerpt() );

	?>
	<div class="blog-meta">
	<?php

	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		printf( '<a rel="tag" class="category" href="%1$s">%2$s</a>',
			esc_url( get_category_link( $categories[0]->term_id ) ),
			esc_html( $categories[0]->name )
		);
}
	$tags_list = get_the_tag_list();
	if ( $tags_list ) {
		printf( '%1$s', $tags_list );
	}

	?>
	</div>

</article>
