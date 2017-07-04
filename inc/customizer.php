<?php
/**
 * Hiji Theme Customizer
 *
 * @package Hiji
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hiji_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'hiji_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hiji_customize_preview_js() {
	wp_enqueue_script( 'hiji_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hiji_customize_preview_js' );

/**
 * Set Default Background Color of Hero
 * https://code.tutsplus.com/tutorials/adding-the-css-for-a-color-scheme-in-the-theme-customizer--cms-21351
 */
function hero_bg_color() {
	$bg = get_theme_mod('hero_bg_clr', '#333');
	?>
	<style media="screen">
		/* background color */
	.section-header .filter::before {
		background-color: <?php echo $bg ?>;
	}
	</style>
<?php
}
add_action('wp_head', 'hero_bg_color');

/**
 * Add Theme Configuration
 */
Wd_Hiji::add_config( 'hiji_theme', array(
	'option_type' => 'theme_mod',
	'capability' => 'edit_theme_options',
) );

/**
 * Add the typography section
 */
Wd_Hiji::add_section( 'typography', array(
	'title'      => esc_attr__( 'Typography', 'hiji' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the body-typography control
 */
Wd_Hiji::add_field( 'hiji_theme', array(
	'type'        => 'typography',
	'settings'    => 'body_typography',
	'label'       => esc_attr__( 'Body Typography', 'hiji' ),
	'description' => esc_attr__( 'Select the main typography options for your site.', 'hiji' ),
	'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'hiji' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => 'body',
		),
	),
) );

/**
 * Add the header-typography control
 */
Wd_Hiji::add_field( 'hiji_theme', array(
	'type'        => 'typography',
	'settings'    => 'headers_typography',
	'label'       => esc_attr__( 'Headers Typography', 'hiji' ),
	'description' => esc_attr__( 'Select the typography options for your headers.', 'hiji' ),
	'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'hiji' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		// 'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
		),
	),
) );


/**
 * Add Panel Frontpage
 */
Wd_Hiji::add_panel( 'front', array(
	'title' => __( 'Front Page Setting', 'hiji'),
	'capability' => 'edit_theme_options',
	'priority' => 1,
) );

/**
 * Add the Section in Customizer for Frontpage
 */

// Logo Section
Wd_Hiji::add_section( 'logo', array(
	'title'      => esc_attr__( 'Logo', 'hiji' ),
	'priority'   => 1,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Contact Section
Wd_Hiji::add_section( 'contact', array(
	'title'      => esc_attr__( 'Contact', 'hiji' ),
	'priority'   => 2,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Slider Section
Wd_Hiji::add_section( 'slider', array(
	'title'      => esc_attr__( 'Image Slider', 'hiji' ),
	'priority'   => 3,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Hero Section
Wd_Hiji::add_section( 'hero', array(
	'title'      => esc_attr__( 'Hero Image', 'hiji' ),
	'priority'   => 4,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// teams Section
Wd_Hiji::add_section( 'services', array(
	'title'      => esc_attr__( 'Services Section', 'hiji' ),
	'priority'   => 4,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Team Section
Wd_Hiji::add_section( 'team', array(
	'title'      => esc_attr__( 'Team Section', 'hiji' ),
	'priority'   => 4,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Blog Section
Wd_Hiji::add_section( 'blog', array(
	'title'      => esc_attr__( 'Blog Section', 'hiji' ),
	'priority'   => 5,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Testimoni Section
Wd_Hiji::add_section( 'testi', array(
	'title'      => esc_attr__( 'Testimoni Section', 'hiji' ),
	'priority'   => 6,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Contact Section
Wd_Hiji::add_section( 'contact_mail', array(
	'title'      => esc_attr__( 'Contact Section', 'hiji' ),
	'priority'   => 6,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

// Footer Section
Wd_Hiji::add_section( 'footer', array(
	'title'      => esc_attr__( 'Review Section', 'hiji' ),
	'priority'   => 7,
	'capability' => 'edit_theme_options',
	'panel' => 'front',
) );

/**
*	LOGO
*	Add Field to Logo
*/
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'image',
			'settings'    => 'logo',
			'label'       => esc_attr__( 'logo', 'hiji' ),
			'description' => esc_attr__( 'Your Logo', 'hiji' ),
			'help'        => esc_attr__( 'If logo not specified, navigation will contain website\'s name', 'hiji' ),
			'section'     => 'logo',
			'priority'    => 10,
			'default' => 'http://placehold.it/104x120',
		) );

/**
* Contact
*	Add Field to Contact
*/
		/* Whatsapp */
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'whatsapp',
			'label'       => esc_attr__( 'Whatsapp Number', 'hiji' ),
			'description' => esc_attr__( 'Your Whatsapp number', 'hiji' ),
			//	'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'hiji' ),
			'section'     => 'contact',
			'priority'    => 10,
		) );

		/* Skype */
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'skype',
			'label'       => esc_attr__( 'Skype ID', 'hiji' ),
			'description' => esc_attr__( 'Your Skype ID', 'hiji' ),
			'section'     => 'contact',
			'priority'    => 10,
		) );

		/* Email */
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'email',
			'label'       => esc_attr__( 'Your Email', 'hiji' ),
			'description' => esc_attr__( 'Your Email Address', 'hiji' ),
			'section'     => 'contact',
			'priority'    => 10,
		) );


		/* Location */
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'location',
			'label'       => esc_attr__( 'Location', 'hiji' ),
			'description' => esc_attr__( 'Your Location', 'hiji' ),
			'section'     => 'contact',
			'priority'    => 10,
		) );

		/* Work Hours */
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'work1',
			'label'       => esc_attr__( 'Working hours', 'hiji' ),
			'section'     => 'contact',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'work2',
			'label'       => esc_attr__( 'working Hours 2', 'hiji' ),
			'section'     => 'contact',
			'priority'    => 10,
		) );



/**
*	Slider
*	Add field to Slider
* img - title - link - desc
*/
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'repeater',
			'settings'    => 'slider',
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__( 'Slider', 'hiji' ),
			),
			'section'     => 'slider',
			'priority'    => 10,
			'fields' => array(
				'img'	=> array(
					'type' => 'image',
					'label' => esc_attr__( 'Add Image Slider', 'hiji' ),
					'default' => '',
				),
				'title'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Add Title Slider', 'hiji' ),
				),
				'link'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Add Link', 'hiji' ),
					'default' => '#',
				),
				'link_text'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Add Link Text', 'hiji' ),
					'default' => 'More',
				),
				'desc'	=> array(
					'type' => 'textarea',
					'label' => esc_attr__( 'Add Description', 'hiji' ),
					'default' => '',
				),
			),
		) );

/**
*	Hero
*	Add field to Hero sectionn
*/

		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'image',
			'settings'    => 'hero_bg',
			'label'       => esc_attr__( 'Hero Background Image', 'hiji' ),
			'section'     => 'hero',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'color',
			'settings'    => 'hero_bg_clr',
			'label'       => 	esc_attr__( 'Hero Background Color', 'hiji' ),
			'help' 				=>	esc_attr__( 'If background image not specified', 'hiji' ),
			'section'     => 'hero',
			'priority'    => 10,
			'default' 		=> '#333333',
			'choices' 		=> array(
					'alpha' => true,
				)
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'hero_title',
			'label'       => esc_attr__( 'Hero Title', 'hiji' ),
			'section'     => 'hero',
			'priority'    => 10,
			'default'			=> 'Hero Title'
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'textarea',
			'settings'    => 'hero_desc',
			'label'       => esc_attr__( 'Hero Description', 'hiji' ),
			'section'     => 'hero',
			'priority'    => 10,
			'default'			=> 'This is Our Hero Description, edit this'
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'hero_link_text',
			'label'       => esc_attr__( 'Hero Link Text', 'hiji' ),
			'section'     => 'hero',
			'priority'    => 10,
			'default' 		=> 'More'
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'hero_link',
			'label'       => esc_attr__( 'Hero Link Read more', 'hiji' ),
			'section'     => 'hero',
			'priority'    => 10,
			'default' 		=> '#'
		) );

/**
*	Services
*	Add field to Services sectionn
*/

		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'services_title',
			'label'       => esc_attr__( 'Services Title', 'hiji' ),
			'section'     => 'services',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'textarea',
			'settings'    => 'services_desc',
			'label'       => esc_attr__( 'Services Description', 'hiji' ),
			'section'     => 'services',
			'priority'    => 10,
		) );
		// Wd_Hiji::add_field( 'hiji_theme', array(
		// 	'type'        => 'text',
		// 	'settings'    => 'services_link',
		// 	'label'       => esc_attr__( 'Services Link Read more', 'hiji' ),
		// 	'section'     => 'services',
		// 	'priority'    => 10,
		// ) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'repeater',
			'settings'    => 'services_type',
			'label'       => esc_attr__( 'Your Services', 'my_textdomain' ),
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__( 'Services', 'hiji' ),
			),
			'section'     => 'services',
			'priority'    => 10,
			'fields' => array(
				'img'	=> array(
					'type' => 'image',
					'label' => esc_attr__( 'Add Image to Service', 'hiji' ),
					'default' => '',
				),
				'title'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Add Title Service', 'hiji' ),
				),
				'link'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Add Link', 'hiji' ),
					'help' => esc_attr__('Leave empty to disable link', 'hiji'),
					'default' => '#',
				),
				'link_text'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Add Link Text', 'hiji' ),
					'default' => 'More',
				),
				'desc'	=> array(
					'type' => 'textarea',
					'label' => esc_attr__( 'Add Short Description', 'hiji' ),
					'default' => '',
				),
			),
		) );

/**
*	Team
*	Add field to team sectionn
*/

		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'image',
			'settings'    => 'team_bg_img',
			'label'       => esc_attr__( 'Team Section Background Image', 'hiji' ),
			'section'     => 'team',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'team_title',
			'label'       => esc_attr__( 'Team Section Title', 'hiji' ),
			'section'     => 'team',
			'default'			=> 'Who We Are',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'textarea',
			'settings'    => 'team_desc',
			'label'       => esc_attr__( 'Team Section Description', 'hiji' ),
			'section'     => 'team',
			'default' 		=> 'We promise you a new look and more importantly, a new attitude. We build that by getting to know you, your needs and creating the best looking clothes.',
			'priority'    => 10,
		) );

		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'repeater',
			'settings'    => 'team_type',
			'label'       => esc_attr__( 'Your team', 'my_textdomain' ),
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__( 'team', 'hiji' ),
			),
			'section'     => 'team',
			'priority'    => 10,
			'fields' => array(
				'img'	=> array(
					'type' => 'image',
					'label' => esc_attr__( 'Profil Image', 'hiji' ),
					'default' => '',
				),
				'name'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Name', 'hiji' ),
				),
				'position'	=> array(
					'type' => 'text',
					'label' => esc_attr__( 'Position', 'hiji' ),
				),

				'desc'	=> array(
					'type' => 'textarea',
					'label' => esc_attr__( 'Team Job Description', 'hiji' ),
					'default' => '',
				),
			),
		) );

/**
*	Blog
*	Add field to Blog sectionn
*/
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'select',
			'settings'    => 'blog',
			'label'       => esc_attr__( 'Add Blog Post', 'hiji' ),
			'section'     => 'blog',
			'priority'    => 10,
			'multiple' => 1,
			'default' => 'blog-post',
			'choices' => Kirki_Helper::get_posts( array( 'posts_per_page' => 5, 'post_type' => 'post' ) ),
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'select',
			'settings'    => 'blog2',
			'label'       => esc_attr__( 'Add Blog Post', 'hiji' ),
			'section'     => 'blog',
			'priority'    => 10,
			'multiple' => 1,
			'default' => 'blog-post',
			'choices' => Kirki_Helper::get_posts( array( 'posts_per_page' => 5, 'post_type' => 'post' ) ),
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'blog_more',
			'label'       => esc_attr__( 'More Blog Link', 'hiji' ),
			'section'     => 'blog',
			'priority'    => 10,
		) );

/**
*	Testimoni
*	Add field to Testimoni section
*/

		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'image',
			'settings'    => 'testi_bg_img',
			'label'       => esc_attr__( 'Testi Section Background Image', 'hiji' ),
			'section'     => 'testimoni',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'testi_title',
			'label'       => esc_attr__( 'Testimoni Section Title', 'hiji' ),
			'section'     => 'testi',
			'default'			=> 'Clients Testimonials',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'testi_sub_title',
			'label'       => esc_attr__( 'Testimoni Section Sub Title', 'hiji' ),
			'section'     => 'testi',
			'default'			=> 'Here are some',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
					'type'        => 'repeater',
					'settings'    => 'testimoni',
					'label'       => esc_attr__( 'Testimoni', 'hiji' ),
					'row_label' => array(
						'type' => 'text',
						'value' => esc_attr__( 'Testimoni', 'hiji' ),
					),
					'section'     => 'testi',
					'priority'    => 10,
					'fields' => array(
						'testimoni_img'	=> array(
							'type'        => 'image',
							'label'       => esc_attr__( 'Image', 'hiji' ),
							'default' => '',
						),
						'testimoni_name'	=> array(
							'type'        => 'text',
							'label'       => esc_attr__( 'Name', 'hiji' ),
							'default' => '',
						),
						// 'testimoni_date'	=> array(
						// 	'type'        => 'date',
						// 	'label'       => esc_attr__( 'Testimoni Date', 'hiji' ),
						// 	'default' => '',
						// ),
						'testimoni_text'	=> array(
							'type' => 'textarea',
							'label' => esc_attr__( 'Testimoni text', 'hiji' ),
							'default' => '',
						),

					),
				) );

/**
*	Contact
*	Add field to Contact section
*/

		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'contact_title',
			'label'       => esc_attr__( 'Contact Section Title', 'hiji' ),
			'section'     => 'contact_mail',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'contact_desc',
			'label'       => esc_attr__( 'Contact Section Description', 'hiji' ),
			'section'     => 'contact_mail',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'image',
			'settings'    => 'contact_bg',
			'label'       => esc_attr__( 'Contact Section Background Image', 'hiji' ),
			'section'     => 'contact_mail',
			'priority'    => 10,
		) );
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'contact_mail',
			'label'       => esc_attr__( 'Email Recipient', 'hiji' ),
			'section'     => 'contact_mail',
			'default'			=> 'mail@mail.com',
			'priority'    => 10,
		) );




/**
*	Footer
*	Add field to Footer section
*/

		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'image',
			'settings'    => 'footer_bg',
			'label'       => esc_attr__( 'Background Footer', 'hiji' ),
			'section'     => 'footer',
			'priority'    => 10,
		) );

		// Social Media

		// - Facebook
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'fb',
			'label'       => esc_attr__( 'Facebook Url', 'hiji' ),
			'section'     => 'footer',
			'priority'    => 10,
		) );

		// - Twitter
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'tw',
			'label'       => esc_attr__( 'Twitter', 'hiji' ),
			'section'     => 'footer',
			'priority'    => 10,
		) );

		// - Twitter Link
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'tw_link',
			'label'       => esc_attr__( 'Twitter Url', 'hiji' ),
			'section'     => 'footer',
			'priority'    => 10,
		) );

		// - Google +
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'gp',
			'label'       => esc_attr__( 'Google Plus Url', 'hiji' ),
			'section'     => 'footer',
			'priority'    => 10,
		) );

		// - Youtube
		Wd_Hiji::add_field( 'hiji_theme', array(
			'type'        => 'text',
			'settings'    => 'yt',
			'label'       => esc_attr__( 'Youtube Url', 'hiji' ),
			'section'     => 'footer',
			'priority'    => 10,
		) );
