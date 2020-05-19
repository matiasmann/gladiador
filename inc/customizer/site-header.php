<?php
/**
 * Single Post Layout Settings
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/
 *
 * @package Gladiador
 * @subpackage ThemeCustomizerSettings
 * @author Matias Mann <matias@developress.org>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

/**
 * Theme Customizer properties
 *
 * @param WP_Customize_Manager $wp_customize WP Customize object. Passed by WordPress.
 */
function gladiador_customizer_header( WP_Customize_Manager $wp_customize ) {

	/**
	 * Gladiador theme options section.
	 */
	$wp_customize->add_section(
		'gladiador_header',
		array(
			'title' => esc_html__( 'Header', 'gladiador' ),
			'panel' => 'gladiador_site_layout',
		)
	);

	/**
	 * Setting to change the layout of the homepage.
	 */
	$wp_customize->add_setting(
		'gladiador_header_layout',
		array(
			'default' => 0,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_int',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_header_layout',
		array(
			'label' => esc_html__( 'Header Layout', 'gladiador' ),
			'section' => 'gladiador_header',
			'type' => 'radio',
			'choices' => array(
				0 => esc_html__( 'Default', 'gladiador' ),
				1 => esc_html__( 'Center', 'gladiador' ),
				2 => esc_html__( 'Side Fixed', 'gladiador' ),
			),
		)
	);

	/**
	 * Setting to change the site title and description display.
	 */
	$wp_customize->add_setting(
		'gladiador_site_title',
		array(
			'default' => 0,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_int',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_site_title',
		array(
			'label' => esc_html__( 'Title Display', 'gladiador' ),
			'section' => 'title_tagline',
			'type' => 'radio',
			'choices' => array(
				0 => esc_html__( 'Display Title and Description', 'gladiador' ),
				1 => esc_html__( 'Display Title only', 'gladiador' ),
				2 => esc_html__( 'Hide Title and Description', 'gladiador' ),
			),
		)
	);

}
