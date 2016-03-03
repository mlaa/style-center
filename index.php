<?php
/**
 * Main template
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

get_header();
get_template_part( 'templates/content', 'all' );
get_sidebar();
get_footer();
