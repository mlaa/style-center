<?php
/**
 * Content "single" template part
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

?>

<div class="block-main">

	<?php if ( ( is_page() || is_category() ) && ! is_home() && ! is_front_page() ) : ?>
	<h1><?php echo wp_kses_post( ThemeHelper::get_page_title() ); ?></h1>
	<?php endif; ?>

<?php

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

?>
<article <?php post_class(); ?>>
<?php

	if ( ! ( is_category() || is_search() ) ) :
	?>
		<div class="tag-meta">
			<?php echo wp_kses_post( ThemeHelper::get_category() ); ?>
		</div>
	<?php
	endif;

	if ( has_post_thumbnail() ) :
	?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php
	endif;

	if ( is_category() || is_search() ) :
	?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php

		the_excerpt();
	else :
		if ( ! ( is_page() || is_home() || is_front_page() ) ) :
	?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php
		endif;

		the_content();

		if ( 'post' === get_post_type() ) :
			$custom_fields = get_post_custom();
			$author_meta_class = ( isset( $custom_fields['post_author'] ) ) ? 'author-meta-' . $custom_fields['post_author'][0] : '';
		endif;
	?>
	<div class="blog-meta">
		<div class="author-meta <?php echo wp_kses_post( $author_meta_class ); ?>">
			<?php echo wp_kses_post( ThemeHelper::get_author_link( 36 ) ); ?>
		</div>
		<div class="tag-meta">
			<?php echo wp_kses_post( ThemeHelper::get_tags() ); ?>
		</div>
	</div>
	<?php

	endif;

	if ( ! is_archive() && ( comments_open() || get_comments_number() ) ) :
		comment_form();
	endif;

	?>
</article>
<?php

	endwhile;

else :
	get_template_part( 'templates/content', 'none' );
endif;
?>

<div class="pagination">
	<div class="nav-previous"><?php next_posts_link( 'Older posts' ); ?></div>
	<div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
</div>

</div>
