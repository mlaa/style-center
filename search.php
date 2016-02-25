<?php
/**
 * Search results template
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \get_footer;
use \get_header;
use \get_sidebar;
use \get_template_part;
use \have_posts;

get_header();

?>
<div class="block-main">
<h1><?php ThemeHelper::get_page_title(); ?></h1>

<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'templates/content', 'search' );
	}
} else {
	get_template_part( 'templates/content', 'none' );
}

?>
</div>
<?php

get_sidebar();
get_footer();
