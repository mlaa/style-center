<?php
/**
 * Search result template part
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \post_class;
use \the_content;
use \the_title;

?>
<article <?php post_class(); ?>>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php the_excerpt(); ?>
</article>
