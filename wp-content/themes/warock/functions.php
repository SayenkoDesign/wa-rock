<?php
/**
 * warock functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package warock
 */

if ( ! function_exists( 'warock_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function warock_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on warock, use a find and replace
	 * to change 'warock' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'warock', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'warock' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'warock_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'warock_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function warock_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'warock_content_width', 640 );
}
add_action( 'after_setup_theme', 'warock_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function warock_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'warock' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'warock_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function warock_scripts() {
	wp_enqueue_style( 'warock-style', get_stylesheet_uri() );
	
	/* Add Foundation CSS */
	wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.css' );
	
	/*Google Fonts*/
	wp_enqueue_style( 'warock-montserrat-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700', array(), null);
	wp_enqueue_style( 'warock-raleway-fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,400', array(), null);
	
	/*Font Awesome*/
	wp_enqueue_style( 'warock-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), null);
	wp_enqueue_style( 'warock-font-awesome-animation', get_stylesheet_directory_uri() . '/inc/font-awesome-animation.css');
	
	
	/* Add Custom CSS */
	wp_enqueue_style( 'warock-slick-style', get_stylesheet_directory_uri() . '/inc/slick/slick.css', array(), '1' );
	wp_enqueue_style( 'warock-slick-theme-style', get_stylesheet_directory_uri() . '/inc/slick/slick-theme.css', array(), '1' );
	wp_enqueue_style( 'warock-custom-style', get_stylesheet_directory_uri() . '/layouts/styles.css', array(), '1' );
	wp_enqueue_style( 'warock-products-style', get_stylesheet_directory_uri() . '/layouts/products.css', array(), '1' );
	wp_enqueue_style( 'warock-blog-style', get_stylesheet_directory_uri() . '/layouts/blog.css', array(), '1' );
	wp_enqueue_style( 'warock-projects-style', get_stylesheet_directory_uri() . '/layouts/projects.css', array(), '1' );
	
	/* Add Calculator */
	wp_enqueue_script( 'calculator-js', get_template_directory_uri() . '/js/calc.js', array( 'jquery' ), '1', true );
	
	
	/* Add Foundation JS */
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/js/foundation.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-js-app', get_template_directory_uri() . '/foundation/js/app.js', array( 'jquery' ), '1', true );
	
	/* Foundation Init JS */
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation/js/foundation.js', array( 'jquery' ), '1', true );
	/*Slick JS*/
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/inc/slick/slick.min.js', array( 'jquery' ), '1', true );


	wp_enqueue_script( 'warock-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'warock-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'warock_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Walker class to add menu-vertical
 */

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"menu vertical\">\n";
  }
}

/**
 * Custom Post Types
 */
 function products_post_type_init() {
    $args = array(
      'public' => true,
      'label'  => 'Products',
	  'taxonomies' => array('product_category'),
	  'supports' => array('title','thumbnail'),
	  'public' => true, 
	  'has_archive' => true
    );
    register_post_type( 'product', $args );
}
add_action( 'init', 'products_post_type_init' );

function projects_post_type_init() {
    $args = array(
      'public' => true,
      'label'  => 'Projects', 
	  'taxonomies' => array('project_category'),
	  'public' => true,
	  'has_archive' => true,
	  'supports' => array('title','thumbnail')
    );
    register_post_type( 'project', $args );
}
add_action( 'init', 'projects_post_type_init' );


//Foundation Shortcode
function found_columns( $atts, $content ) {
    $atts = shortcode_atts( array(
        'number' => 6,
    ), $atts );
    
    return '<div class="short-cols columns medium-' . $atts['number'] . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', 'found_columns');

function found_row( $atts, $content ) {
    $atts = shortcode_atts( array(
        'classes' => '',
    ), $atts );
    
    return '<div class="row ' . $atts['clases'] . '">' . do_shortcode($content) .  '</div>';
}
add_shortcode('row', 'found_row');

/** 
 * Custom Taxonomies for category archives
*/
function build_taxonomies(){
	register_taxonomy(
		'product_category',
		'product',
		array(
			'hierarchical' => true,
			'label' => 'Product Category',
			'query_var' => true,
			'rewrite' => true
		)
	);
	register_taxonomy(
		'project_category',
		'project',
		array(
			'hierarchical' => true,
			'label' => 'Project Category',
			'query_var' => true,
			'rewrite' => true
		)
	);
}
add_action( 'init', 'build_taxonomies', 0 );


/**
 * Add Header/Footer ACF
*/
if( function_exists('acf_add_options_page') ) {
 	
 	// add parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'redirect' 		=> false
	));
	
	
	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title' 	=> 'Header',
		'parent_slug' 	=> $parent['menu_slug'],
		'position'		=> false,
		'icon_url'		=>false,
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title' 	=> 'Footer',
		'parent_slug' 	=> $parent['menu_slug'],
		'position'		=> false,
		'icon_url'		=>false,
	));
	
}



