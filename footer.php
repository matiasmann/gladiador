<?php
/**
 * Footer Template
 *
 * The template for displaying the site footer. This includes the closing divs
 * that close the content opened in header.php - and all of the content after
 * (credits, widgets etc.)
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#footer-php
 *
 * @package Gladiador
 * @subpackage TemplatePart
 * @author Matias Mann <matias@developress.org>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

	do_action( 'gladiador_after_content' );

	/**
	 * Add support for page builders.
	 *
	 * The default footer code is included in parts/footer.php
	 * The footer is included in inc/wordpress.php > gladiador_include_footer function.
	 */
	do_action( 'gladiador_before_footer' );
	do_action( 'gladiador_footer' );
	do_action( 'gladiador_after_footer' );

	wp_footer();

?>

</body>
</html>
