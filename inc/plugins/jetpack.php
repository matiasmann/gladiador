<?php
/**
 * Jetpack Compatibility File
 *
 * @package Gladiador
 * @subpackage Jetpack
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @link https://jetpack.com/
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

/**
 * Remove some of the default Jetpack styles.
 *
 * The styles are taken care of by the theme styles, so custom styles are not
 * required.
 */
function gladiador_remove_jetpack_stylesheets() {

	// Remove related posts styles.
	wp_dequeue_style( 'jetpack_related-posts' );

	// Remove top posts styles.
	wp_dequeue_style( 'jetpack-top-posts-widget' );

	// Remove subscription.
	wp_dequeue_style( 'jetpack-subscriptions' );

	// Remove devicepx script.
	wp_dequeue_script( 'devicepx' );

}

add_action( 'wp_enqueue_scripts', 'gladiador_remove_jetpack_stylesheets', 100 );


/**
 * Remove Grunion styles.
 *
 * @link https://github.com/Automattic/jetpack/blob/89a9af96b669e2e5a2ed47d3f3e07c804d6e0dd0/modules/contact-form/grunion-contact-form.php#L235-L244
 */
function gladiador_remove_grunion_style() {

	wp_deregister_style( 'grunion.css' );

}

add_action( 'wp_print_styles', 'gladiador_remove_grunion_style' );


/**
 * Stop Jetpack from concatenating internal CSS.
 *
 * We dequeue a number of the Jetpack styles so this stops them from being loaded.
 */
add_filter( 'jetpack_implode_frontend_css', '__return_false' );


/**
 * Change the size of the Related Posts thumbnail images.
 *
 * This improves display of the related posts images on larger screens and
 * retina screens. It also makes the responsive styles work more nicely since
 * the images fill the screen better.
 *
 * @param array $thumbnail_size Default thumbnail properties.
 * @return array
 */
function gladiador_related_posts_thumbnail_size( $thumbnail_size ) {

	$thumbnail_size['width'] = 500;
	$thumbnail_size['height'] = 330;

	return $thumbnail_size;

}

add_filter( 'jetpack_relatedposts_filter_thumbnail_size', 'gladiador_related_posts_thumbnail_size' );


/**
 * Display Plugin Styles.
 */
function gladiador_jetpack_styles() {

	if ( defined( 'JETPACK__VERSION' ) ) {
		gladiador_print_plugin_css( 'jetpack' );
	}

}

add_action( 'wp_body_open', 'gladiador_jetpack_styles' );

