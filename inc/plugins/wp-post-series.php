<?php
/**
 * WP Post Series
 *
 * @package Gladiador
 */

/**
 * Remove WP Post Series external files.
 */
function gladiador_remove_wp_post_series_dequeue() {

	// Dequeue stylesheets.
	wp_dequeue_style( 'wp-post-series-frontend' );

	// Deregister scripts so that it can't be enqueued.
	wp_deregister_script( 'wp-post-series' );

}

add_action( 'wp_enqueue_scripts', 'gladiador_remove_wp_post_series_dequeue', 100 );


/**
 * Display Plugin Styles.
 */
function gladiador_wp_post_series_styles() {

	gladiador_print_plugin_css( 'wp-post-series' );

}

add_action( 'wp_body_open', 'gladiador_wp_post_series_styles' );
