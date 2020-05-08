<?php
/**
 * Header Template
 *
 * Display the site header content (logo, site title, description).
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#header-php
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gladiador
 * @subpackage TemplatePart
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

	/**
	 * Split the document head into a separate file so that it can more easily be included in different templates.
	 * For example templates that don't include the default site header layout.
	 */
	get_template_part( 'parts/head' );

?>

<body <?php body_class(); ?>>

<?php
	wp_body_open();

	/**
	 * Add support for page builders.
	 *
	 * The default header code is included in parts/header.php
	 * The header is included in inc/wordpress.php > gladiador_include_header function.
	 */
	do_action( 'gladiador_before_header' );
	do_action( 'gladiador_header' );
	do_action( 'gladiador_after_header' );
