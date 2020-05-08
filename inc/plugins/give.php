<?php
/**
 * Add support for the GiveWP plugin.
 *
 * @package Gladiador
 */

/**
 * Remove some of the default Give styles.
 *
 * The styles are taken care of by the theme styles, so custom styles are not
 * required.
 */
function gladiador_remove_give_stylesheets() {

	wp_dequeue_style( 'give-styles' );

}

add_action( 'wp_enqueue_scripts', 'gladiador_remove_give_stylesheets', 100 );


/**
 * Display Plugin Styles.
 */
function gladiador_give_styles() {

	gladiador_print_plugin_css( 'give' );

}

add_action( 'wp_body_open', 'gladiador_give_styles' );

