<?php
/**
 * Search results template
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

get_header();

?>
<div class="block-main">
<h1 class="search-results-title"><?php echo wp_kses_post( ThemeHelper::get_page_title() ); ?></h1>

<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'templates/content', 'search' );
	}
} else {
	get_template_part( 'templates/content', 'no-results' );
}

?>
</div>
<?php

get_sidebar();
get_footer();
