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

<?php

/*
if ( is_category( 'questions-and-answers' ) ) {
?>
	<div class="faq-search">
		<h3>Search our list of frequently asked questions.</h3>
		<?php echo preg_replace(
			'#</form>#',
			'<input type="hidden" name="cat" id="cat" value="3" /></form>',
			get_search_form( false )
		); ?>
		Haven't found what you're looking for? <a href="/ask-a-question">Submit a question.</a>
	</div>
<?php
}
*/

if ( have_posts() ) :

	$count = 0;

	while ( have_posts() ) :

		the_post();
		$count++;

?>

<?php if ( is_category( 'behind-the-style' ) && $count === 2 ) : ?>
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

	if ( is_category() || is_search() ) :
	?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php

		the_excerpt();
	else :
		if ( ! ( is_page() || is_home() || is_front_page() ) ) :
	?>
		<h2><?php the_title(); ?></h2>
	<?php
		endif;

		the_content();

		if ( 'post' === get_post_type() ) :
			$custom_fields = get_post_custom();
			$post_author = $custom_fields['post_author'][0];
		endif;

		if ( ! empty( $post_author ) && ! ( is_page() || is_home() || is_front_page() ) ) :
			get_template_part( "templates/authors/$post_author" );
		endif;

	endif;

	if ( ! is_archive() && ( comments_open() || get_comments_number() ) ) :
		comment_form( array(
			'title_reply' => 'Join the Conversation',
			'comment_notes_before' => '<p>We invite you to comment on this post. Comments are moderated and subject to the <a href="https://commons.mla.org/terms">terms of service</a>.</p><p>If you have a question about MLA style, <a href="/ask-a-question">ask us</a>! Questions submitted through this comment form will not be answered.</p><p>Fields marked with <span class="ninja-forms-req-symbol">*</span> are required.</p>',
			'label_submit' => 'Submit Comment',
			'class_submit' => 'ninja-forms-field',
		) );
	endif;

	?>
</article>

<?php if ( is_category( 'behind-the-style' ) && $count === 3 ) : ?>
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
