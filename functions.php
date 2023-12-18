<?php
/**
 * wp_dev functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_dev
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function wp_dev_setup() {
	load_theme_textdomain( 'wp_dev', get_template_directory() . '/languages' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wp_dev' ),
		)
	);
}
add_action( 'after_setup_theme', 'wp_dev_setup' );

function wp_dev_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp_dev' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp_dev' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_dev_widgets_init' );

function wp_dev_scripts() {
	wp_enqueue_style( 'wp_dev-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'wp_dev_scripts' );

require get_template_directory() . '/inc/remove.php';

require get_template_directory() . '/inc/custom-menu.php';

require get_template_directory() . '/inc/custom_posts.php';