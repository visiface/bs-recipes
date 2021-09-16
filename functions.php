<?php
/**
 * bs-recipes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bs-recipes
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bs_recipes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bs_recipes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bs-recipes, use a find and replace
		 * to change 'bs-recipes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bs-recipes', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'bs-recipes' ),
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
				'bs_recipes_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'bs_recipes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bs_recipes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bs_recipes_content_width', 640 );
}
add_action( 'after_setup_theme', 'bs_recipes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bs_recipes_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bs-recipes' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bs-recipes' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bs_recipes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bs_recipes_scripts() {
	wp_enqueue_style( 'bs-recipes-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bs-recipes-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bs-recipes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bs_recipes_scripts' );

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
 * Create a Custom Post Type
 * RECIPES
 * 
 */
function create_posttype() {
 
    register_post_type( 'recipes',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Recipes' ),
                'singular_name' => __( 'Recipe' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'recipes'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


/*
* Creating a function to create our CPT
*/
 
function custom_recipe_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Recipes', 'Post Type General Name', 'bs-recipes' ),
        'singular_name'       => _x( 'Recipe', 'Post Type Singular Name', 'bs-recipes' ),
        'menu_name'           => __( 'Recipes', 'bs-recipes' ),
        'parent_item_colon'   => __( 'Parent Recipe', 'bs-recipes' ),
        'all_items'           => __( 'All Recipes', 'bs-recipes' ),
        'view_item'           => __( 'View Recipe', 'bs-recipes' ),
        'add_new_item'        => __( 'Add New Recipe', 'bs-recipes' ),
        'add_new'             => __( 'Add New', 'bs-recipes' ),
        'edit_item'           => __( 'Edit Recipe', 'bs-recipes' ),
        'update_item'         => __( 'Update Recipe', 'bs-recipes' ),
        'search_items'        => __( 'Search Recipe', 'bs-recipes' ),
        'not_found'           => __( 'Not Found', 'bs-recipes' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bs-recipes' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Recipes', 'bs-recipes' ),
        'description'         => __( 'Recipes, Ingredients, and Steps', 'bs-recipes' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'ingredient', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'recipe-tags' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'recipes', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_recipe_type', 0 );



 
//create a custom taxonomy
 
function create_recipetags_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Recipe Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'RecipeTag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search RecipeTags' ),
    'all_items' => __( 'All RecipeTags' ),
    'parent_item' => __( 'Parent RecipeTag' ),
    'parent_item_colon' => __( 'Parent RecipeTag:' ),
    'edit_item' => __( 'Edit RecipeTag' ), 
    'update_item' => __( 'Update RecipeTag' ),
    'add_new_item' => __( 'Add New RecipeTag' ),
    'new_item_name' => __( 'New RecipeTag Name' ),
    'menu_name' => __( 'Recipe Tags' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('recipe-tags',
    array('recipes'),
    array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'subject' ),
    )
 );
 
}
add_action( 'init', 'create_recipetags_hierarchical_taxonomy', 0 );