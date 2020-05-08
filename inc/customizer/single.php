<?php
/**
 * Single Post Layout Settings
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/
 *
 * @package Gladiador
 * @subpackage ThemeCustomizerSettings
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

/**
 * Theme Customizer properties
 *
 * @param WP_Customize_Manager $wp_customize WP Customize object. Passed by WordPress.
 */
function gladiador_customizer_single( WP_Customize_Manager $wp_customize ) {

	/**
	 * Gladiador theme options section.
	 */
	$wp_customize->add_section(
		'gladiador_single',
		array(
			'title' => esc_html__( 'Single Post & Page', 'gladiador' ),
			'panel' => 'gladiador_site_layout',
		)
	);

	/**
	 * Setting to change the single header height.
	 */
	$wp_customize->add_setting(
		'gladiador_single_header_height',
		array(
			'default' => 1,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_int',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_single_header_height',
		array(
			'label' => esc_html__( 'Header Height', 'gladiador' ),
			'section' => 'gladiador_single',
			'type' => 'radio',
			'choices' => array(
				0 => esc_html__( 'Small', 'gladiador' ),
				1 => esc_html__( 'Medium (Default)', 'gladiador' ),
				2 => esc_html__( 'Full Height', 'gladiador' ),
			),
		)
	);

	/**
	 * Setting to use the featured image as a header image.
	 *
	 * Unfortunately I have yet to work out a way to make this a function that
	 * can be live previewed.
	 */
	$wp_customize->add_setting(
		'gladiador_single_header',
		array(
			'default' => false,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'gladiador_single_header',
		array(
			'label' => esc_html__( 'Use Featured Image as header image.', 'gladiador' ),
			'section' => 'gladiador_single',
			'type' => 'checkbox',
		)
	);

	/**
	 * Setting to show/ hide the post date.
	 */
	$wp_customize->add_setting(
		'gladiador_single_show_date',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_single_show_date',
		array(
			'label' => esc_html__( 'Display Post Date', 'gladiador' ),
			'section' => 'gladiador_single',
			'type' => 'checkbox',
		)
	);

	/**
	 * Setting to show/ hide the post author.
	 */
	$wp_customize->add_setting(
		'gladiador_single_show_author',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_single_show_author',
		array(
			'label' => esc_html__( 'Display Post Author', 'gladiador' ),
			'section' => 'gladiador_single',
			'type' => 'checkbox',
		)
	);

	/**
	 * Setting to show/ hide the post author details.
	 */
	$wp_customize->add_setting(
		'gladiador_single_show_author_details',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_single_show_author_details',
		array(
			'label' => esc_html__( 'Display Post Author Details', 'gladiador' ),
			'section' => 'gladiador_single',
			'type' => 'checkbox',
		)
	);

	/**
	 * Setting to show/ hide post tags and categories.
	 */
	$wp_customize->add_setting(
		'gladiador_single_show_categories',
		array(
			'default' => true,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_single_show_categories',
		array(
			'label' => esc_html__( 'Display Categories and Tags', 'gladiador' ),
			'section' => 'gladiador_single',
			'type' => 'checkbox',
		)
	);

}
