<?php
/**
 * Content "single" template part
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

$post_author_meta_value_map = array(
	'carr'      => 'Nora Carr',
	'foasberg'  => 'Nancy Foasberg',
	'gibson'    => 'Angela Gibson',
	'wirth'     => 'Eric Wirth',
	'woods'     => 'Livia Arndal Woods',
	'kandel'    => 'Michael Kandel',
	'latimer'   => 'Barney Latimer',
	'rappaport' => 'Jennifer Rappaport',
	'grooms'	=> 'Russell Grooms',
	'suffern'	=> 'Erika Suffern',
	'hoffman'	=> 'Joan M. Hoffman',
	'mla'		=> 'Modern Language Association',
);

?>

<div class="block-main <?php if ( empty( $_GET['post_author'] ) ) echo 'no-post-author' ?>">

	<?php if ( ( is_page() || is_category() ) && ! is_home() && ! is_front_page() ) : ?>
	<h1>
		<?php echo wp_kses_post( ThemeHelper::get_page_title() ); ?>
		<?php if ( is_category( 'ask-the-mla' ) ): ?>
			<div class="tile-tag icon-faq">FAQ</div>
		<?php endif; ?>
		<?php if ( is_category( 'behind-the-style' ) ): ?>
			<div class="tile-tag icon-blog">Blog</div>
		<?php endif; ?>
	</h1>
	<?php endif; ?>
	<?php if ( is_tag() ) : ?>
		<p class="tag-meta">
			You are viewing all posts tagged <a href="/tag/<?php single_tag_title(); ?>" rel="tag"><?php single_tag_title(); ?></a>
		</p>
	<?php endif; ?>
	<?php if ( isset( $_GET['post_author'] ) ) : ?>
		<p class="post-author-meta">
			You are viewing all posts by <?php echo $post_author_meta_value_map[$_GET['post_author']] ?>.
		</p>
	<?php endif; ?>

<?php

if ( have_posts() ) :

	$count = 0;

	while ( have_posts() ) :

		the_post();

		$count++;

		$post_category = get_the_category()[0];

		if ( 'post' === get_post_type() ) {
			$custom_fields = get_post_custom();
			$post_author = ( isset ( $custom_fields['post_author'] ) ) ? $custom_fields['post_author'][0] : '';
		}

		$author = parse_post_author( $post_author );

		if ( ! empty( $post_author ) && ! ( is_page() || is_home() || is_front_page() ) ) {

			if( count( $author ) == 1 ) {

				if ( isset( $post_author_meta_value_map[ $post_author ] ) ) {
					$post_author_full = $post_author_meta_value_map[ $post_author ];
				}

			} else {

				$post_author_full = false;

			}
		}

		$post_author_html = call_user_func( function() use ( $post_category, $author, $post_author_full, $post_author_meta_value_map ) {
			$retval = '';

			if (
				! is_category() &&
				! is_search() &&
				in_array( $post_category->slug, ['behind-the-style', 'teaching-resources'] ) && 
				is_array( $author )
			) {

				if( count( $author ) >= 1 ) {
					
					$i = 0;

					foreach( $author as $name ) {

						$author_full_name = $post_author_meta_value_map[ $name ];

						if( $i == 0 ) {

							$retval = sprintf(
								'By <a href="/category/%s?post_author=%s">%s</a>',
								$post_category->slug,
								$name,
								$author_full_name
							);

						} else if( $i == count( $author ) - 1 ) {
							
							$retval = sprintf(
								' <a href="/category/%s?post_author=%s">%s</a>',
								$post_category->slug,
								$name,
								$author_full_name
							);

						} else if( count( $author ) == 2 && $i == 2 ) {
							
							$retval = sprintf(
								' & <a href="/category/%s?post_author=%s">%s</a>',
								$post_category->slug,
								$name,
								$author_full_name
							);

						} else {

							$retval = sprintf(
								', <a href="/category/%s?post_author=%s">%s</a>,',
								$post_category->slug,
								$name,
								$author_full_name
							);
						}

						
						$collection[] = $retval;

						$i++;

					}

				}

			}

			return $collection;
			//return $retval;
		} );

?>

<?php if ( is_category( 'behind-the-style' ) && $count === 2 && 0 === get_query_var( 'paged' ) ) : ?>
	<div class="halves">
<?php endif; ?>

<article <?php post_class( "loop-$count" ); ?>>
<?php

	if ( ! ( is_category() || is_search() || is_front_page() ) ) :
	?>
		<div class="tag-meta">
			<?php echo wp_kses_post( ThemeHelper::get_category() ); ?>
			<?php echo wp_kses_post( ThemeHelper::get_tags() ); ?>
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

	if ( is_category() || is_search() || ! empty( $_GET['post_author'] ) ) :
	?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php

		foreach( $post_author_html as $item ) {
			echo $item;
		}

		the_excerpt();
	else :
		if ( ! ( is_page() || is_home() || is_front_page() ) ) :
	?>
		<h2><?php the_title(); ?></h2>
	<?php

		foreach( $post_author_html as $item ) {
			echo $item;
		}

		endif;

		the_content();

		foreach( $author as $name ) :
		?>

		<div class="author_container">
			<?php
			if ( ! empty( $name ) && ! ( is_page() || is_home() || is_front_page() ) ) :
				get_template_part( "templates/authors/$name" );
			endif;
			?>
		</div> <!-- /.author_template -->
	<?php
		endforeach;?>

<?php
		if ( ! is_page() ): 
			//if( ! is_null( the_date('j F Y') ) ) :
			?>
			<div class="pub_date">
				<p>Published <?php echo the_date('j F Y'); ?></p>
			</div><!-- /.pub_date -->
		<?php 
			//endif;
		endif;
	endif;

	if ( ! is_archive() && ( comments_open() || get_comments_number() ) ) :
		comments_template();
	endif;

	?>
</article>

<?php if ( is_category( 'behind-the-style' ) && $count === 3 && 0 === get_query_var( 'paged' ) ) : ?>
	</div> <!-- halves -->
<?php endif; ?>

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
