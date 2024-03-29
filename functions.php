<?php
/**
 * igeccorp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package igeccorp
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function igeccorp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on igeccorp, use a find and replace
		* to change 'igeccorp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'igeccorp', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'igeccorp' ),
			'engineering-menu' => esc_html__( 'Engineering Menu', 'igeccorp' ),
			'about-us-menu' => esc_html__( 'About Us Menu', 'igeccorp' ),
			'legal-menu' => esc_html__( 'Legal Menu', 'igeccorp' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'igeccorp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'igeccorp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function igeccorp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'igeccorp_content_width', 640 );
}
add_action( 'after_setup_theme', 'igeccorp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function igeccorp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'igeccorp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'igeccorp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'igeccorp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function igeccorp_scripts() {
	wp_enqueue_style( 'igeccorp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'igeccorp-custon',  get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION );
	wp_style_add_data( 'igeccorp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'igeccorp-jquery', get_template_directory_uri() . '/js/jquery-3.6.3.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'igeccorp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'igeccorp_scripts' );

/**
 * Samir Changes in theme core
 */
add_post_type_support( 'page', 'excerpt' );


function igeccorp_social($wp_customize){

    $wp_customize->add_section('igeccorp_social_handle', array(
        'title'    => __('Site Information', 'igeccorp'),
        'description' => 'i.e., Acme Company\'s Facebook is https://facebook.com/acmecompany then enter "acmecompany"',
        'priority' => 20,
    ));


	// =============================
	// Email
	// =============================
	$wp_customize->add_setting('igeccorp_email_op', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('igeccorp_email', array(
        'label'      => __('Email', 'igeccorp'),
        'section'    => 'igeccorp_social_handle',
        'settings'   => 'igeccorp_email_op',
    ));

	// =============================
	// Phone
	// =============================
	$wp_customize->add_setting('igeccorp_phone_op', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('igeccorp_phone', array(
        'label'      => __('Phone', 'igeccorp'),
        'section'    => 'igeccorp_social_handle',
        'settings'   => 'igeccorp_phone_op',
    ));

	// =============================
	// Address
	// =============================
	$wp_customize->add_setting('igeccorp_address_op', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('igeccorp_address', array(
        'label'      => __('Address', 'igeccorp'),
        'section'    => 'igeccorp_social_handle',
        'settings'   => 'igeccorp_address_op',
    ));

    //  =============================
    //  = Facebook                  =
    //  =============================
    $wp_customize->add_setting('igeccorp_fb_op', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('igeccorp_fb', array(
        'label'      => __('Facebook Handle', 'igeccorp'),
        'section'    => 'igeccorp_social_handle',
        'settings'   => 'igeccorp_fb_op',
    ));

    //  =============================
    //  = Twitter                  =
    //  =============================
    $wp_customize->add_setting('igeccorp_tw_op', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('igeccorp_tw', array(
        'label'      => __('Twitter Handle', 'igeccorp'),
        'section'    => 'igeccorp_social_handle',
        'settings'   => 'igeccorp_tw_op',
    ));

	//  =============================
    //  = LinkedIN                  =
    //  =============================
    $wp_customize->add_setting('igeccorp_in_op', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',

    ));

    $wp_customize->add_control('igeccorp_in', array(
        'label'      => __('LinkedIn Handle', 'igeccorp'),
        'section'    => 'igeccorp_social_handle',
        'settings'   => 'igeccorp_in_op',
    ));

}

//add
add_action( 'customize_register', 'igeccorp_social' );

// Our custom post type function
function igeccorp_create_posttype() {
  
    register_post_type( 'jobs',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Jobs' ),
                'singular_name' => __( 'Job' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'job'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'igeccorp_create_posttype' );
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
 * Load Clone
 */
require get_template_directory() . '/inc/clone.php';