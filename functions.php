<?php
/**
 * molakat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package molakat
 */

if ( ! function_exists( 'molakat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function molakat_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on molakat, use a find and replace
		 * to change 'molakat' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'molakat', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'molakat-larg-x', 900, 420, true );
		add_image_size( 'molakat-large-x', 900, 420, true );
		add_image_size( 'molakat-large', 800, 460, true );
		add_image_size( 'molakat-large-s', 800, 320, true );
		add_image_size( 'molakat-large-sl', 600, 350, true );
		add_image_size( 'molakat-large-slx', 600, 300, true );
		add_image_size( 'molakat-large-sm', 500, 220, true );

		add_image_size( 'molakat-small', 300, 150, true );
		add_image_size( 'molakat-small-x', 280, 180, true );
		add_image_size( 'molakat-small-ss', 200, 150, true );
		add_image_size( 'molakat-small-sx', 200, 120, true );
		add_image_size( 'molakat-small-s', 180, 100, true );
		add_image_size( 'molakat-sm', 120, 80, true );
		add_image_size( 'molakat-sm-s', 100, 60, true );
		add_image_size( 'butterfly-author', 80, 80, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'molakat' ),
			'social' => esc_html__( 'Social Links Menu', 'molakat' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'molakat_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 177,
			'width'       => 345,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'molakat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function molakat_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'molakat_content_width', 640 );
}
add_action( 'after_setup_theme', 'molakat_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function molakat_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Front page sidebar', 'molakat' ),
		'id'            => 'front-page',
		'description'   => esc_html__( 'Add widgets here to appear in your front-page.', 'molakat' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="section_header mb-2"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'molakat' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'molakat' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	// for($i=1;$i<=3;$i++){
	// 	register_sidebar( array(
	// 		'name'          => esc_attr__( 'Footer ', 'molakat' ).($i),
	// 		'id'            => 'footer-'.($i),
	// 		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'butterfly' ),
	// 		'before_widget' => '<div id="%1$s" class="col-md-4 widget-box %2$s">',
	// 		'after_widget'  => '</div>',
	// 		'before_title'  => '<h4 class="widget-title">',
	// 		'after_title'   => '</h4>',
	// 	) );
	// }


}
add_action( 'widgets_init', 'molakat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function molakat_scripts() {
	// wp_enqueue_style( 'molakat-style', get_stylesheet_uri() );

    wp_enqueue_style( 'molakat-font','https://fonts.maateen.me/bangla/font.css?ver=4.9.10' );
    wp_enqueue_style( 'molakat-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0' );

    wp_enqueue_style( 'molakat-animate', get_stylesheet_directory_uri() . '/assets/css/animate.css', array(), '1.0' );
    wp_enqueue_style( 'molakat-owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0' );


    wp_enqueue_style( 'molakat-owl-theme', get_stylesheet_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '1.0' );

    wp_enqueue_style( 'molakat-global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), '1.0' );


    wp_enqueue_style( 'molakat-menu', get_stylesheet_directory_uri() . '/assets/css/menu.css', array(), '1.0' );
    wp_enqueue_style( 'molakat-footer', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), '1.0' );
    wp_enqueue_style( 'molakat-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '1.0' );
    wp_enqueue_style( 'molakat-globalResponsive', get_stylesheet_directory_uri() . '/assets/css/globalResponsive.css', array(), '1.0' );
    wp_enqueue_style( 'molakat-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array(), '1.0' );

	if ( is_single() ) {
	    wp_enqueue_style( 'molakat-single-post', get_stylesheet_directory_uri() . '/assets/css/singleNewsPage.css', array(), '1.0' );
	    //wp_enqueue_style( 'molakat-single-post-responsive', get_stylesheet_directory_uri() . '/assets/css/singleNewsPageResponsive.css', array(), '1.0' );
	}

wp_enqueue_style( 'molakat-single-page', get_stylesheet_directory_uri() . '/assets/css/singlePage.css', array(), '1.0' );
wp_enqueue_style( 'molakat-single-page-responsive', get_stylesheet_directory_uri() . '/assets/css/singleNewsPageResponsive.css', array(), '1.0' );	



    //cript src="js/jquery-slim.min.js"></script>

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'molakat-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script( 'molakat-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
	wp_enqueue_script( 'molakat-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.2.0', true);
	wp_enqueue_script( 'molakat-main', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);












	wp_enqueue_script( 'molakat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'molakat-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'molakat_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Custom Navigation Walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement related post feature.
 */
require get_template_directory() . '/inc/class-magazil-related-posts.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';

// add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);
// function add_classes_on_li($classes, $item, $args)
// {
//     $classes[] = 'nav-item';

//     return $classes;
// }

// add_filter('wp_nav_menu', 'add_classes_on_a');
// function add_classes_on_a($ulclass)
// {
//     return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
// }
