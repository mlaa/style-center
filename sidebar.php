<?php
/**
 * Sidebar template
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \dynamic_sidebar;
use \is_active_sidebar;

$sidebar = ThemeHelper::get_sidebar();

if ( ! is_active_sidebar( $sidebar ) ) {
	return;
}

?>
<aside class="sidebar">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside>
