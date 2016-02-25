<?php
/**
 * Theme helper class
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

use \add_theme_support;
use \comments_open;
use \get_option;
use \get_permalink;
use \get_search_query;
use \get_template_directory;
use \get_the_archive_title;
use \get_the_title;
use \is_404;
use \is_archive;
use \is_front_page;
use \is_home;
use \is_page;
use \is_search;
use \is_single;
use \load_theme_textdomain;
use \wp_dequeue_style;
use \wp_kses;

/**
 * Theme helper class
 *
 * @package MLAStyleCenter
 * @subpackage ThemeHelper
 */
class ThemeHelper extends Base {

	/**
	 * Associative array of sidebars ($id => $title).
	 *
	 * @var array
	 */
	private $sidebars;

	/**
	 * Constructor.
	 *
	 * @param string $name     Name/slug of theme.
	 * @param array  $sidebars Associative array of sidebars.
	 */
	public function __construct( $name, $sidebars = array() ) {

		self::$name = $name;
		$this->sidebars = $sidebars;

		$this->add_action( 'after_setup_theme', $this, 'setup' );
		$this->add_action( 'wp_enqueue_scripts', $this, 'assets', 100 );
		$this->add_action( 'widgets_init', $this, 'register_sidebars' );
		$this->add_filter( 'body_class', $this, 'add_body_class' );
		$this->run();

	}

	/**
	 * Theme setup.
	 */
	public function setup() {

		// Make theme available for translation.
		load_theme_textdomain( self::$name, get_template_directory() . '/lang' );

		// Enable plugins to manage the document title.
		add_theme_support( 'title-tag' );

		// Enable post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enable post formats.
		add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ] );

		// Enable HTML5 markup support.
		add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );

		// Remove autoclosing p tags.
		remove_filter( 'the_content', 'wpautop' );

	}

	/**
	 * Enqueue theme assets. This will also pick up any assets you enqueue yourself.
	 */
	public function assets() {
		if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
			$this->enqueue_script( 'comment-reply' );
		}
		$this->run_scripts();
		$this->run_styles();
	}

	/**
	 * Add page slug as class on <body>.
	 *
	 * @param array $classes Array of class names.
	 */
	public function add_body_class( $classes ) {

		// Add page slug if it doesn't exist.
		if ( is_single() || is_page() && ! is_front_page() ) {
			if ( ! in_array( basename( get_permalink() ), $classes, true ) ) {
				$classes[] = basename( get_permalink() );
			}
		}

		return $classes;

	}

	/**
	 * Register sidebars in widget area.
	 */
	public function register_sidebars() {
		foreach ( $this->sidebars as $id => $title ) {
			register_sidebar( array(
				'name'          => esc_html__( $title . ' sidebar', '_s' ),
				'id'            => $id . '-sidebar',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );
		}
	}

	/**
	 * Get title of page.
	 */
	public static function get_page_title() {

		$title = __( 'Not Found', self::$name );

		if ( is_archive() ) {
			$title = get_the_archive_title();
		} elseif ( is_search() ) {
			$title = sprintf( __( 'Search results for “%s”', self::$name ), get_search_query() );
		} else {
			$title = get_the_title();
		}

		echo wp_kses( $title, array( 'em', 'strong' ) );
		return null;

	}

	/**
	 * Get sidebar for page.
	 */
	public static function get_sidebar() {

		if ( is_search() ) {
			return 'search-sidebar';
		}

		if ( is_page() ) {
			return basename( get_permalink() ) . '-sidebar';
		}

		$categories = get_the_category();

		if ( 'Ask the Experts' === $categories[0]->name ) {
			return 'faq-sidebar';
		}

		if ( 'Behind the Style' === $categories[0]->name ) {
			return 'blog-sidebar';
		}
	}
}
