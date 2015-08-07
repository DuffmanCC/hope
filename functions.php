<?php
/**
 * agw functions and definitions
 *
 * @package agw
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'agw_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function agw_setup() {
	global $cap, $content_width;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Formats
	*/
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'agw_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on agw, use a find and replace
	 * to change 'agw' to the name of your theme in all the template files
	*/
	load_theme_textdomain( 'agw', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Header bottom menu', 'agw' ),
	) );

}
endif; // agw_setup
add_action( 'after_setup_theme', 'agw_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function agw_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'agw' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Contact Form', 'agw' ),
		'id'            => 'contact-form',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer left', 'tsr' ),
		'id'            => 'footer-left-widget',
		'description'   => 'widget for footer info',
		'before_widget' => '<div id="footer-left" class="widget col-xs-8">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer right', 'tsr' ),
		'id'            => 'footer-right-widget',
		'description'   => 'widget for social icons in the footer eg.:<i class="fa fa-facebook"></i>',
		'before_widget' => '<div id="footer-right" class="widget col-xs-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'agw_widgets_init' );


/**
 * new image size for the theme
 */

add_image_size( 'front-page-partners', 200, 250, true ); // image for the partners of the fornt-page
add_image_size( 'front-page-members', 150, 150, true ); // image for the members of the fornt-page
add_image_size( 'front-page-events', 600, 400, true ); // image for the events of the fornt-page
add_image_size( 'front-page-causes', 600, 450, true ); // image for the causes of the fornt-page



/**
 * Enqueue scripts and styles
 */
function agw_scripts() {

	// load bootstrap css CDN
	wp_enqueue_style( 'agw-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' );

	// load Font Awesome css CDN
	wp_enqueue_style( 'agw-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', false, '4.3.0' );

	// load agw styles
	wp_enqueue_style( 'agw-style', get_stylesheet_uri() );

	// load bootstrap js CDN
	wp_enqueue_script( 'agw-bootstrapjs', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( 'agw-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	// load masonry settings
	wp_enqueue_script( 'masonry-settings', get_template_directory_uri() . '/includes/js/settings.js', array('masonry'), '20140401', true );


	wp_enqueue_script( 'agw-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'agw-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

}
add_action( 'wp_enqueue_scripts', 'agw_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';

/**
 * Load Customs file for add custom post type
 */
require get_template_directory() . '/includes/custom-posts-type.php';

/**
 * Load Meta Boxes file for add metaboxes to the custom posts type
 */
require get_template_directory() . '/includes/meta-boxes.php';

