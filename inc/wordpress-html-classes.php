<?php
/**
 * Actions and Filters That Modify WordPress html & css classes.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Gladiador
 * @subpackage WordPress
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

/**
 * Add additional body classes to body_class function call.
 *
 * @param array $classes Array of body classes.
 * @return array
 */
function gladiador_body_class( $classes ) {

	if ( display_header_text() ) {
		$classes[] = 'has-site-title';
	}

	if ( ! is_singular() && ! is_404() ) {
		$classes[] = 'hfeed';
	}

	// Archive article layout.
	$classes[] = 'archive-articles-' . (int) get_theme_mod( 'gladiador_archive_articles', '0' );

	// Header layout.
	$classes[] = 'header-layout-' . (int) get_theme_mod( 'gladiador_header_layout', '0' );

	// Header layout.
	$classes[] = gladiador_header_height();

	// Site header image.
	if ( gladiador_has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	return $classes;

}

add_filter( 'body_class', 'gladiador_body_class' );


/**
 * Add additional post classes to post_class function call.
 *
 * @link https://core.trac.wordpress.org/ticket/28482
 * @param array  $classes Array of post classes.
 * @param string $class An array of additional class names added to the post.
 * @param int    $post_id The id of the post.
 * @return array
 */
function gladiador_post_class( $classes, $class, $post_id ) {

	if ( is_admin() ) {
		return $classes;
	}

	$post = get_post( $post_id );

	// Entry class.
	$classes[] = 'entry';
	$classes[] = 'h-entry';

	// Post field classes.
	$classes[] = sprintf( 'entry-type-%s', get_post_type() );

	// Author class.
	$classes[] = sprintf(
		'entry-author-%s',
		sanitize_html_class( get_the_author_meta( 'user_nicename' ), get_the_author_meta( 'ID' ) )
	);

	return $classes;

}

add_filter( 'post_class', 'gladiador_post_class', 10, 3 );
