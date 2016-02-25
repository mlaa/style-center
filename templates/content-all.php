<?php
/**
 * Content "single" template part
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \comments_template;
use \have_posts;
use \post_class;
use \the_content;
use \the_post;
use \the_title;
use \wp_kses;

?>

<div class="block-main">

	<?php if ( is_page() && ! is_home() && ! is_front_page() ) : ?>
	<h1><?php ThemeHelper::get_page_title(); ?></h1>
	<?php endif; ?>

<?php

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

?>
<article <?php post_class(); ?>>
	<?php if ( ! is_page() ) : ?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php endif; ?>
	<?php

	the_content();

	if ( 'post' === get_post_type() ) {

	?>
	<div class="blog-meta">
	<?php

	$tags_list = get_the_tag_list();
	if ( $tags_list ) {
		printf( '%1$s', $tags_list );
	}

	?>
	</div>
	<?php

	}

	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

	?>
</article>
<?php

	endwhile;

else :
	get_template_part( 'templates/content', 'none' );
endif;
?>
</div>
