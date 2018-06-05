<?php
/**
 * Homepage tile widget class.
 *
 * @package MLAStyleCenter
 */


namespace MLA\Commons\Theme\MLAStyleCenter;

use WP_Widget;
use WP_Widget_Media;
use WP_Widget_Text;

/**
 * Homepage tile widget.
 */
class Widget_Homepage_Tile extends WP_Widget_Text {

	/**
	 * Identifiers for various visual styles.
	 *
	 * @var array
	 */
	public static $styles = [
		'citation',
		'sidebar',
		'teaching',
		'about',
		'faq',
		'blog',
		'formatting-papers',
		'chapter',
		'recent-posts',
	];

	/**
	 * Constructor.
	 */
	public function __construct() {
		$widget_ops = [
			'classname' => 'homepage_tile',
			'description' => 'Homepage tile.'
		];
		WP_Widget::__construct( 'homepage_tile', 'Homepage Tile', $widget_ops );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// Title & body (visual editor) fields.
		parent::form( $instance );

		// Additional fields.
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$style = ! empty( $instance['style'] ) ? $instance['style'] : '';
		$href = ! empty( $instance['href'] ) ? $instance['href'] : '';
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>">Image src:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>">
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'wide' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'wide' ); ?>" name="<?php echo $this->get_field_name( 'wide' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'wide' ); ?>">Double wide</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'style' ); ?>">Style</label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>">
				<?php
				foreach ( self::$styles as $style_option ) {
					printf(
						'<option value="%s" %s>%s</option>',
						$style_option,
						( $style === $style_option ) ? 'selected' : '',
						ucfirst( $style_option )
					);
				}
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'href' ) ); ?>">Link href:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'href' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'href' ) ); ?>" type="text" value="<?php echo esc_attr( $href ); ?>">
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = parent::update( $new_instance, $old_instance );

		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? sanitize_text_field( $new_instance['image'] ) : '';
		$instance['wide'] = ( ! empty( $new_instance['wide'] ) ) ? $new_instance['wide'] : '';
		$instance['style'] = ( ! empty( $new_instance['style'] ) ) ? $new_instance['style'] : '';
		$instance['href'] = ( ! empty( $new_instance['href'] ) ) ? sanitize_text_field( $new_instance['href'] ) : '';

		return $instance;
	}

	/**
	 * Outputs the content for the current widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Tag Cloud widget instance.
	 */
	public function widget( $args, $instance ) {
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$text = ! empty( $instance['text'] ) ? $instance['text'] : '';
		$wide = $instance[ 'wide' ] ? 'tile-wide' : '';
		$style = ! empty( $instance['style'] ) ? $instance['style'] : '';
		$href = ! empty( $instance['href'] ) ? $instance['href'] : '';

		// Custom classes.
		$classes = [ 'tile' ];
		if ( ! in_array( $style, [ 'formatting-papers', 'chapter', 'recent-posts' ] ) ) {
			$classes[] = 'tile-featured';
		}
		if ( $wide ) {
			$classes[] = 'tile-wide';
		}
		if ( $style ) {
			$classes[] = sprintf( 'tile-%s', esc_attr( $style ) );
		}

		// Custom CSS.
		$css = [];
		if ( $image ) {
			$css[] = sprintf( "background-image: url( '%s' );", esc_attr( $image ) );
		}
		if ( 'formatting-papers' === $style ) {
			$h3_attrs = 'class="icon-inline-tag icon-format"';
		}
		if ( 'chapter' === $style ) {
			$h3_attrs = 'class="icon-inline-tag icon-plagiarism"';
		}

		// Extra markup.
		$extra = '';
		if ( 'blog' === $style ) {
			$extra = '<div class="tile-tag icon-blog">Blog</div>';
		}
		if ( 'faq' === $style ) {
			$extra = '<div class="tile-tag icon-faq">FAQ</div>';
		}

		?>

		<div class="<?php esc_attr_e( implode( ' ', $classes ) ); ?>" style="<?php echo implode( '', $css ); ?>">
			<a class="tile-link" href="<?php esc_attr_e( esc_url ( $href ) ); ?>">
				<?php echo $extra; ?>
				<div class="tile-body">
					<h3 <?php echo $h3_attrs; ?>><?php echo $title; ?></h3>
					<p><?php echo $text; ?></p>
				</div>
			</a>
		</div>

		<?php
	}

}
