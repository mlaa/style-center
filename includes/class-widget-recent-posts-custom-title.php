<?php

namespace MLA\Commons\Theme\MLAStyleCenter;

/**
 * Just like the real thing, except use a custom field for title rather than the actual title.
 */
class Widget_Recent_Posts_Custom_Title extends \WP_Widget_Recent_Posts {

	const POST_TITLE_CUSTOM_FIELD_IDENTIFIER = 'post_short_title';

	public function __construct() {
		$widget_ops = array('classname' => 'widget_recent_entries_custom_title', 'description' => __( "Your site&#8217;s most recent Posts, using the '" . self::POST_TITLE_CUSTOM_FIELD_IDENTIFIER . "' custom field for post title.") );
		\WP_Widget::__construct('recent-posts-custom-title', __('Recent Posts (Custom Title)'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries_custom_title';
	}

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new \WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
		<?php
			$custom_fields = get_post_custom();
			$custom_title = $custom_fields[self::POST_TITLE_CUSTOM_FIELD_IDENTIFIER][0];
		?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php echo ( empty( $custom_title ) ) ? get_the_title() : $custom_title; ?></a>
			<?php if ( $show_date ) : ?>
				<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

}
