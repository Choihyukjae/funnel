<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// function prac_test_menu(){

// 	add_menu_page(  'TEST',  
// 					'TEST',  
// 					'manage_options',  
// 					'test_menu', 
// 					'custom_menu_callback',  
// 					$icon_url = '',  
// 					$position = null 
// 				);
// 	}

// function custom_menu_callback(){
// 	echo '<h1>prac custom<h1>';
// 	}


// add_action('admin_menu' , 'prac_test_menu');

// function prac_add_menu() {
//     add_submenu_page(
//         'test_menu',          // 부모 메뉴의 슬러그
//         'Practice Submenu',  // 하위 메뉴 제목
//         'Practice Menu',     // 메뉴 이름 
//         'manage_options',    //  권한 (일반적으로 manage_options)
//         'test_menu',         // 하위 메뉴의 슬러그 (고유해야 함)
//         'prac_callback'      // 출력할 내용을 처리하는 콜백 함수 이름
// 					);
// 	}

// function prac_callback() {
//     echo '<h3>Practice Submenu<h3>';
// }

// add_action('admin_menu', 'prac_add_menu');

echo get_option('blogname');