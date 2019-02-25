<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s comment on &ldquo;%2$s&rdquo;',
							'%1$s comments on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments();
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		$comment_before_markup = '<p>We invite you to comment on this post and exchange ideas with other site visitors. Comments are moderated and subject to the <a href="https://commons.mla.org/terms">terms of service</a>.</p><p>If you have a question for the MLA’s editors, submit it to <a href="/ask-a-question">Ask the MLA</a>!</p>';

		comment_form( [
			'title_reply' => 'Join the Conversation',
			'comment_notes_before' => $comment_before_markup . '<p>Fields marked with <span class="ninja-forms-req-symbol">*</span> are required.</p>',
			'logged_in_as' => $comment_before_markup,
			'label_submit' => 'Submit Comment',
			'class_submit' => 'ninja-forms-field',
		] );
	?>

</div><!-- .comments-area -->
