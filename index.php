<?php
/**
 * Main template
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \get_footer;
use \get_header;
use \get_post_format;
use \get_sidebar;
use \get_template_part;

get_header();
get_template_part( 'templates/content', 'all' );
get_sidebar();
get_footer();
