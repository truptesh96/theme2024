<?php
/**
 * Wp Front functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wp_Front
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
function wp_front_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wp Front, use a find and replace
		* to change 'wp-front' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wp-front', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'wp-front' ),
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
			'wp_front_custom_background_args',
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
add_action( 'after_setup_theme', 'wp_front_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_front_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_front_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_front_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_front_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-front' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-front' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_front_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_front_scripts() {
	wp_enqueue_style( 'wp-front-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wp-front-style', 'rtl', 'replace' );

	/** add default Jquery **/
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'wp-front-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'wp-front-theme', get_template_directory_uri() . '/js/theme.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_front_scripts' );

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

/* Theme Options */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Page Settings',
		'menu_title'	=> 'General Page',
		'parent_slug'	=> 'theme-general-settings',
		'redirect'		=> false
	));
}
/* Theme Options Ends */



/*--- ACF Color Picker Options ---*/
function acf_colorpicker_set() { ?>
	<script type="text/javascript">
		(function($) {
			acf.add_filter('color_picker_args', function( args, $field ){
				args.palettes = [ '#667DB7', '#5FB77B', '#EC8B6B']
				return args;
			});
		})(jQuery);
	</script><?php 
}
add_action('acf/input/admin_footer', 'acf_colorpicker_set');
/*--- ACF Color Picker Options Ends ---*/




function create_acf_link($link) {
	
	$target = $link['target'] ? $link['target'] : '_self';
	echo '<a target="'.$target.'" href="'.$link['url'].'">'.$link['title'].'</a>';

	return false;
}


function eveal_password_form() {
    global $post;
    $label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
    $output = '<form class="passform" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <label class="mt16" for="' . $label . '">' . __( "Enter Password:" ) . ' </label>
    <div class="dflex">
    <input placeholder="Enter Password" name="post_password" id="' . $label . '" type="password" />
    <input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </div>
    </form>
    ';
    return $output;
}
add_filter( 'the_password_form', 'eveal_password_form' );



// Function to enqueue CSS files based on flexible rows
function enqueue_custom_css_based_on_flexible_rows() {
    // Array to store CSS file paths based on flexible rows
    $css_files = array();

    // Check if flexible rows are used on the page
    if (is_page()) {
        $post_id = get_the_ID();
        $flexible_rows = get_field('flexible_content_field_name', $post_id);

        if ($flexible_rows) {
            foreach ($flexible_rows as $row) {
                // Check the row type or other condition to determine CSS file
                	
                echo $row['acf_fc_layout'];

                if ($row['acf_fc_layout'] == 'your_flexible_row_layout_name') {
                    // Add CSS file path to the array
                
                    // $css_files[] = 'path/to/your/css/file.css';
                
                }
                // Add more conditions for other flexible rows if needed
            }
        }
    }

    // Combine CSS files into one URL
    $combined_css_url = ''; // Combine CSS files here

    // Enqueue combined CSS file
    if (!empty($combined_css_url)) {
      // wp_enqueue_style('combined-css', $combined_css_url, array(), '1.0', 'all');
    }
}

// Hook into wp_enqueue_scripts to enqueue CSS files
add_action('wp_enqueue_scripts', 'enqueue_custom_css_based_on_flexible_rows');
