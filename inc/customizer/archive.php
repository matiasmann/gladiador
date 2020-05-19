<?php
/**
 * Archive Layout Settings
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
function gladiador_customizer_archive( WP_Customize_Manager $wp_customize ) {

	/**
	 * Gladiador theme options section.
	 */
	$wp_customize->add_section(
		'gladiador_archive',
		array(
			'title' => esc_html__( 'Homepage & Archive', 'gladiador' ),
			'panel' => 'gladiador_site_layout',
		)
	);

	/**
	 * Setting to change the archive header height.
	 */
	$wp_customize->add_setting(
		'gladiador_archive_header_height',
		array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_int',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_archive_header_height',
		array(
			'label' => esc_html__( 'Header Height', 'gladiador' ),
			'section' => 'gladiador_archive',
			'type' => 'radio',
			'choices' => array(
				0 => esc_html__( 'Small', 'gladiador' ),
				1 => esc_html__( 'Medium (Default)', 'gladiador' ),
				2 => esc_html__( 'Full Height', 'gladiador' ),
			),
		)
	);

	/**
	 * Setting to change the archive article layout.
	 */
	$wp_customize->add_setting(
		'gladiador_archive_articles',
		array(
			'default' => 0,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_int',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_archive_articles',
		array(
			'label' => esc_html__( 'Archive Post Layout', 'gladiador' ),
			'section' => 'gladiador_archive',
			'type' => 'radio',
			'choices' => array(
				0 => esc_html__( 'Rows, no images (Default)', 'gladiador' ),
				1 => esc_html__( '2 Columns, Featured Image', 'gladiador' ),
				2 => esc_html__( '3 Columns, Featured Image (large screens only)', 'gladiador' ),
				3 => esc_html__( 'Rows, with Featured Image on left', 'gladiador' ),
				4 => esc_html__( 'Rows, with Featured Image on right', 'gladiador' ),
			),
		)
	);

}


