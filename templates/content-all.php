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
	'carillo' => 'Ellen Carillo',
	'yang' => 'Alice Yang',
	'wallace' => 'Joseph Wallace',
	'brookbank-christenberry' => 'Elizabeth Brookbank and H. Faye Christenberry',
	'duffy' => 'Caitlin Duffy',
	'smith' => 'Bradley Smith',
	'burke' => 'Mike Burke',
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
	<?php if ( isset( $_GET['post_author'] ) ) :
        $author =  get_term_by( 'slug', sanitize_text_field($_GET['post_author']), 'author' );
		add_filter('pre_get_posts', function($query) use ($author) {
			$query->set('post_type', 'post');
			$query->set('posts_per_page', -1);
			$query->set('tax_query', array(
				array(
					'taxonomy' => 'author', //or tag or custom taxonomy
					'field' => 'slug',
					'terms' => array($author->slug)
				)
			) );
        });
        ?>
		<p class="post-author-meta">
			You are viewing all posts by <?php echo $author->name ?>.
		</p>
	<?php endif; ?>

<?php

if ( have_posts() ) :
	$count = 0;

	while ( have_posts() ) :

		the_post();

		$count++;

		$post_category = get_the_category()[0];
		$post_thumbnail_class = '';

		if ( 'post' === get_post_type() ) {
			$custom_fields = get_post_custom();

			$post_author = ( !empty( $author ) ) ? $author->slug : !empty(get_the_terms( get_the_ID(), 'author' ))?get_the_terms( get_the_ID(), 'author' )[0]:'';

			$post_thumbnail_class = (
				isset( $custom_fields['autocrop_featured_image'] ) &&
				'false' === $custom_fields['autocrop_featured_image'][0]
			) ? 'no-crop' : '';
		}

		$post_author_html = call_user_func( function() use ( $post_category) {
			$retval = '';
			$collection = false;
			if (
				! is_category() &&
				! is_search() &&
				in_array( $post_category->slug, ['behind-the-style', 'teaching-resources'] )
			) {
				$authors = get_the_terms( get_the_ID(), 'author' );
				if( count( $authors ) >= 1 ) {

					$i = 0;
                    $author_count = count( $authors );
					$collection = array();
					foreach( $authors as $author ) {

						if( $i == 0 ) {

							$retval = 'By <a href="/category/%s?post_author=%s">%s</a>';

						} else if( $i == $author_count - 1 ) {

                            if( $author_count == 2 ) {

                                $retval = ' and <a href="/category/%s?post_author=%s">%s</a>';

                            }

                            else {

                                $retval = ', <a href="/category/%s?post_author=%s">%s</a>';

                            }

						}

                        else {

							$retval = ', <a href="/category/%s?post_author=%s">%s</a>';

						}


						$collection[] = sprintf( $retval, $post_category->slug, $author->slug, $author->name );

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

	if (
		( in_array( get_query_var('paged'), [1, 0] ) && is_category( 'behind-the-style' ) && $count < 4 && has_post_thumbnail() ) ||
		( ! is_category( 'behind-the-style' ) && has_post_thumbnail() )
	) :
	?>
		<div class="post-thumbnail <?php echo $post_thumbnail_class; ?>">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php
	endif;

	if ( is_category() || is_search() || ! empty( $_GET['post_author'] ) ) :
	?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php

		foreach( (array)$post_author_html as $item ) {
			echo $item;
		}

		the_excerpt();
	else :
		if ( ! ( is_page() || is_home() || is_front_page() ) ) :
	?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php

		foreach( (array)$post_author_html as $item ) {
			echo $item;
		}

		endif;

		//outputs excerpt if in tag page and content if in single page or front-page
		if( is_single() || is_page() ) {
			the_content();

		} else if( is_archive() ) {
			the_excerpt();

		} else if( is_front_page() ) {
			the_content();
		}

		if ( ! is_page() ):
			//if( ! is_null( the_date('j F Y') ) ) :
			?>
			<div class="pub_date">
				<p>Published <?php echo get_the_date('j F Y'); ?></p>
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
