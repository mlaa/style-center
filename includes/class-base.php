<?php
/**
 * Base class
 *
 * @package MLAStyleCenter
 */

namespace MLA\Commons\Theme\MLAStyleCenter;

/**
 * Base class
 *
 * @package MLAStyleCenter
 * @subpackage Base
 */
class Base {

	/**
	 * Name/slug of package. Create a constructor to override this.
	 *
	 * @var string
	 */
	public static $name = 'wp-base';

	/**
	 * WP actions
	 *
	 * @var array
	 */
	protected $actions = array();

	/**
	 * WP filters
	 *
	 * @var array
	 */
	protected $filters = array();

	/**
	 * WP scripts
	 *
	 * @var array
	 */
	protected $scripts = array();

	/**
	 * WP styles
	 *
	 * @var array
	 */
	protected $styles = array();

	/**
	 * Data storage
	 *
	 * @var array
	 */
	protected $data_cache = array();

	/**
	 * Add action to awaiting stack.
	 *
	 * @param string $hook           WordPress hook.
	 * @param object $component      Instance containing callback.
	 * @param string $callback       Method name.
	 * @param int    $priority       Priority of action.
	 * @param int    $accepted_args  Number of accepted arguments.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
			'processed'     => false,
		);
	}

	/**
	 * Add filter to awaiting stack.
	 *
	 * @param string $hook           WordPress hook.
	 * @param object $component      Instance containing callback.
	 * @param string $callback       Method name.
	 * @param int    $priority       Priority of filter.
	 * @param int    $accepted_args  Number of accepted arguments.
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
			'processed'     => false,
		);
	}

	/**
	 * Add script to awaiting stack.
	 *
	 * @param string  $name         Name of resource.
	 * @param string  $path         Path (relative to plugin) to the resource.
	 * @param mixed   $dependencies Array of dependency names.
	 * @param boolean $in_footer    Whether to enqueue script in footer.
	 * @param array   $data         Array of data to pass via wp_localize_script.
	 */
	public function enqueue_script( $name, $path = false, $dependencies = false, $in_footer = false, $data = array() ) {

		// Check if the passed path is a URL. If not, get relative path.
		$is_url = preg_match( '/\/\//', $path );
		$path = ( $path && ! $is_url ) ? get_stylesheet_directory_uri() . '/' . $path : $path;

		$this->scripts[] = array(
			'name'         => self::$name . '-' . $name,
			'path'         => $path,
			'dependencies' => $dependencies,
			'in_footer'    => $in_footer,
			'data'         => $data,
			'processed'    => false,
		);

	}

	/**
	 * Add stylesheet to awaiting stack.
	 *
	 * @param string $name         Name of resource.
	 * @param string $path         Path (relative to plugin) to the resource.
	 * @param mixed  $dependencies Array of dependency names.
	 */
	public function enqueue_style( $name, $path = false, $dependencies = null ) {

		// Check if the passed path is a URL. If not, get relative path.
		$is_url = preg_match( '/^https\:/', $path );
		$path = ( $path && ! $is_url ) ? get_stylesheet_directory_uri() . '/' . $path : $path;

		$this->styles[] = array(
			'name'         => self::$name . '-' . $name,
			'path'         => $path,
			'dependencies' => $dependencies,
			'processed'     => false,
		);

	}

	/**
	 * Enqueue Typekit.
	 *
	 * @param string $typekit_id Typekit ID.
	 */
	public function enqueue_typekit( $typekit_id ) {
		$this->enqueue_script( 'typekit', '//use.typekit.net/' . $typekit_id . '.js' );
		$this->add_action( 'wp_head', $this, 'insert_typekit_inline' );
		$this->run_actions();
	}

	/**
	 * Insert Typekit inline script.
	 */
	public function insert_typekit_inline() {
		if ( wp_script_is( self::$name . '-typekit', 'done' ) ) { ?>
			<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php }
	}

	/**
	 * Process actions queue.
	 */
	protected function run_actions() {
		foreach ( $this->actions as $item ) {
			if ( ! $item['processed'] ) {
				add_action( $item['hook'], array( $item['component'], $item['callback'] ), $item['priority'], $item['accepted_args'] );
				$item['processed'] = true;
			}
		}
	}

	/**
	 * Process filters queue.
	 */
	protected function run_filters() {
		foreach ( $this->filters as $item ) {
			if ( ! $item['processed'] ) {
				add_filter( $item['hook'], array( $item['component'], $item['callback'] ), $item['priority'], $item['accepted_args'] );
				$item['processed'] = true;
			}
		}
	}

	/**
	 * Process scripts queue.
	 */
	protected function run_scripts() {
		$site_parameters = array(
			'site_url' => get_site_url(),
			'theme_directory' => get_template_directory_uri(),
		);
		foreach ( $this->scripts as $item ) {
			if ( ! $item['processed'] ) {
				wp_register_script( $item['name'], $item['path'], $item['dependencies'], null, $item['in_footer'] );
				if ( ! empty( $item['data'] ) ) {
					wp_localize_script( $item['name'], 'wp_theme', $item['data'] );
				}
				wp_enqueue_script( $item['name'] );
				$item['processed'] = true;
			}
		}
	}

	/**
	 * Process styles queue.
	 */
	protected function run_styles() {
		foreach ( $this->styles as $item ) {
			if ( ! $item['processed'] ) {
				wp_enqueue_style( $item['name'], $item['path'], $item['dependencies'] );
				$item['processed'] = true;
			}
		}
	}

	/**
	 * Process all queues.
	 */
	public function run() {
		$this->run_actions();
		$this->run_filters();
		$this->run_scripts();
		$this->run_styles();
	}

	/**
	 * Put data into data cache.
	 *
	 * @param string $key   Data key.
	 * @param mixed  $value Data value.
	 */
	public function set_cache( $key, $value ) {
		$this->data_cache[ $key ] = $value;
	}

	/**
	 * Get superglobal value while properly checking and sanitizing.
	 *
	 * @param string $type Superglobal constant, e.g., INPUT_GET, INPUT_SERVER.
	 * @param string $key  Key of superglobal to get.
	 * @return mixed Superglobal value.
	 */
	public function get_superglobal( $type, $key ) {
		$value = ( filter_has_var( $type, $key ) ) ? filter_input( $type, $key ) : null;
		return ( is_string( $value ) ) ? sanitize_text_field( wp_unslash( $value ) ) : $value;
	}

	/**
	 * Get object property or return default value.
	 *
	 * @param object $obj      Object.
	 * @param string $property Property name.
	 * @param mixed  $default  Default value.
	 * @return mixed Property value or default value.
	 */
	protected function get_object_property( $obj, $property, $default ) {
		return ( property_exists( $obj, $property ) ) ? $obj->$property : $default;
	}
}
