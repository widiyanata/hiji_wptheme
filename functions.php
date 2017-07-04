<?php
/**
 * Hiji functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hiji
 */

// Register Custom Navigation Walker
require_once('inc/wp-bootstrap-navwalker/wp-bootstrap-navwalker.php');

if ( ! function_exists( 'hiji_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hiji_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Hiji, use a find and replace
	 * to change 'hiji' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hiji', get_template_directory() . '/languages' );

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
		// 'menu-1' => esc_html__( 'Primary', 'hiji' ),
		'primary' => esc_html__( 'Primary', 'hiji' ),
		'secondary' => esc_html__( 'Secondary', 'hiji' ),
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
	add_theme_support( 'custom-background', apply_filters( 'hiji_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'hiji_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hiji_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hiji_content_width', 640 );
}
add_action( 'after_setup_theme', 'hiji_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hiji_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hiji' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hiji' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'hiji_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hiji_scripts() {
	/* Include Style*/
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome-latest', 'http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
	wp_enqueue_style( 'pe-icon', get_template_directory_uri().'/assets/css/fonts/pe-icon-7-stroke.css' );
	//	wp_enqueue_style( 'ionicon', get_template_directory_uri().'/assets/css/ionicons.css' );
	//	wp_enqueue_style( 'owlcarousel', get_template_directory_uri().'/assets/css/owl.carousel.css' );

	// Font family
	wp_enqueue_style( 'font-family', 'https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' );

	wp_enqueue_style( 'gaia-style', get_template_directory_uri().'/assets/css/gaia.css' );
	wp_enqueue_style( 'hiji-main-style', get_stylesheet_uri() );

	/* Include Script in footer */
	wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '20151215', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array(), '20151215', true );
	// wp_enqueue_script( 'bootstrap-toolkit', get_template_directory_uri() . '/assets/js/bootstrap-toolkit.js', array(), '20151215', true );
	//	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '20151215', true );
	wp_enqueue_script( 'gaia-script', get_template_directory_uri() . '/assets/js/gaia.js', array(), '20151215', true );

	wp_enqueue_script( 'hiji-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'hiji-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hiji_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Include Kirki Customizer.
 */
require get_template_directory() . '/inc/customizer/kirki.php';

/**
 * Load fallback class.
 */
require get_template_directory() . '/inc/customizer/fallback.php';

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


function add_ajaxurl_cdata_to_front(){ ?>
    <script type="text/javascript"> //<![CDATA[
        ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
    //]]> </script>
<?php }
add_action( 'wp_head', 'add_ajaxurl_cdata_to_front', 1);

/**
 * Processing User Contact Form
 */
 function ajaxcontact_send_mail() {
	 $send_mail = get_theme_mod('contact_mail', '');
	$result='';
	// Get and sanitize form values
	$name    = $_POST["cname"];
	$email   = $_POST["cemail"];
	// $subject = "Message From Contact Form";
	$message = $_POST["cmessage"];

	$headers = 'From:'.$email. "\r\n";

	// Send Email
	if ( wp_mail($send_mail, "Pesan", $message, $headers ) ) {
		$result = "<div class='alert alert-success'>Thank you for your message, we will response soon</div>";
	} else {
		$result = "<div class='alert alert-warning'>Sorry, there is error!!</div>";
	}
	// Return
	die( $result);
 }
 // creating Ajax call for WordPress
 add_action( 'wp_ajax_nopriv_ajaxcontact_send_mail', 'ajaxcontact_send_mail' );
 add_action( 'wp_ajax_ajaxcontact_send_mail', 'ajaxcontact_send_mail' );
