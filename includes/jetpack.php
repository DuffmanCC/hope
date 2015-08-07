<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package awg
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function awg_jetpack_setup() {
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'content',
			'footer'    => 'page',
		) );
	}
}
add_action( 'after_setup_theme', 'awg_jetpack_setup' );
