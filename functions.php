<?php
/**
 * Functions: list
 *
 * @version 2020.09.1
 * @package wp-theme-openglam
 */

/* Theme Constants (to speed up some common things) ------*/
define( 'HOME_URI', get_bloginfo( 'url' ) );
define( 'PRE_HOME_URI', get_bloginfo( 'url' ) . '/wp-content/themes' );
define( 'SITE_NAME', get_bloginfo( 'name' ) );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_IMG', THEME_URI . '/assets/img' );
define( 'THEME_CSS', THEME_URI . '/assets/css' );
define( 'THEME_FONTS', THEME_URI . '/assets/fonts' );
define( 'THEME_JS', THEME_URI . '/assets/js' );

/**
* Calling related files
*/
include TEMPLATEPATH . '/inc/customizer.php';
include TEMPLATEPATH . '/inc/site.php';
include TEMPLATEPATH . '/inc/widgets.php';
/**
 * Images
 * ------
 * */

// Add theme suppor for post thumbnails
add_theme_support( 'post-thumbnails' );

// Define custom thumbnail sizes
add_image_size( 'squared', 300, 300, true );
add_image_size( 'landscape-small', 550, 300, true );
add_image_size( 'landscape-medium', 740, 416, true );
add_image_size( 'landscape-featured', 1100, 170, true );

/**
*  THEME SIDEBARS
*  Default sidebars availables
*/
$mandatory_sidebars = array(
	'Footer' => array(
		'name' => 'footer',
	)
);

foreach ( $mandatory_sidebars as $sidebar => $id_sidebar ) {
	register_sidebar(
		array(
			'name'          => $sidebar,
			'id'            => $id_sidebar['name'],
			'before_widget' => '<section id="%1$s" class="widget %2$s">' . "\n",
			'after_widget'  => '</section>',
			'before_title'  => '<header class="widget-header"><h3 class="widget-title">',
			'after_title'   => '</h3></header>',
		)
	);
}

/**
 * Theme singleton class
 * ---------------------
 * Stores various theme and site specific info and groups custom methods
 **/
class Site {
	private static $instance;

	const id        = __CLASS__;
	const theme_ver = '2020.04.1';
	private function __construct() {
		$this->actions_manager();

	}
	public function __get( $key ) {
		return isset( $this->$key ) ? $this->$key : null;
	}
	public function __isset( $key ) {
		return isset( $this->$key );
	}
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}
		return self::$instance;
	}
	public function __clone() {
		trigger_error( 'Clone is not allowed.', E_USER_ERROR );
	}
	/**
	 * Setup theme actions, both in the front and back end
	 * */
	public function actions_manager() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'init', array( $this, 'init_functions' ) );
		add_action( 'init', array( $this, 'register_menus_locations' ) );
    add_action( 'admin_init', array( $this, 'openglam_add_editor_styles' ) );
	}
	public function init_functions() {
		add_post_type_support( 'page', 'excerpt' );
	}
	public function setup_theme() {
		$available_post_formats = array( 'gallery', 'image', 'video' );
		add_theme_support( 'post-formats', $available_post_formats );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles');
    add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Light Yellow', 'openglam' ),
				'slug'  => 'og-light-yellow',
				'color'	=> '#FFF2DF',
			),
			array(
				'name'  => __( 'Light Orange', 'openglam' ),
				'slug'  => 'og-light-orange',
				'color' => '#FFEFEB',
			),
			array(
				'name'  => __( 'Light Green', 'openglam' ),
				'slug'  => 'og-light-green',
				'color' => '#E6F4F1',
			),
			array(
				'name'	=> __( 'Green', 'openglam' ),
				'slug'	=> 'og-green',
				'color'	=> '#0D7D72',
			),
			array(
				'name'	=> __( 'Orange', 'openglam' ),
				'slug'	=> 'og-orange',
				'color'	=> '#CC3A00',
			),
      array(
				'name'	=> __( 'Brown', 'openglam' ),
				'slug'	=> 'og-brown',
				'color'	=> '#BD7800',
			),
		) );
	}

	public function register_menus_locations() {
		$theme_menus = array(
			'main-navigation'   => 'Main navigation',
			'footer-navigation' => 'Footer navigation',
			'404-navigation'    => '404 Navigation',
		);
		register_nav_menus( $theme_menus );
	}

	public function get_post_thumbnail_url( $postid = null, $size = 'landscape-medium' ) {
		if ( is_null( $postid ) ) {
			global $post;
			$postid = $post->ID;
		}
		$thumb_id = get_post_thumbnail_id( $postid );
		$img_src  = wp_get_attachment_image_src( $thumb_id, $size );
		return $img_src ? current( $img_src ) : '';
	}
  public function openglam_add_editor_styles() {
    add_editor_style( 'assets/css/editor-styles.css' );
  }
	public function enqueue_styles() {
		// Front-end styles
		wp_enqueue_style( 'gfonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap' );
		wp_enqueue_style( 'vocabulary_fonts', 'https://unpkg.com/@creativecommons/fonts/css/fonts.css', self::theme_ver );
		wp_enqueue_style( 'cc_base_style', THEME_CSS . '/styles.css', self::theme_ver );
	}

	function enqueue_scripts() {
		// front-end scripts
		wp_enqueue_script( 'jquery', true );
		wp_enqueue_script( 'vocabulary', THEME_JS . '/script.js', array('jquery'), self::theme_ver, true );
	}
}

/**
 * Instantiate the class object
 * */

$_s = Site::get_instance();

