<?php
/**
 * Header Template
 *
 * Includes the site header.
 *
 * Traditionally this file is included in theme-root/header.php however in
 * Gladiador it has been split out into a partial so that page builders can
 * customize the header more easily.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gladiador
 * @subpackage TemplatePart
 * @author Matias Mann <matias@developress.org>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

?>

<div class="webpage">

	<a href="#site-content" class="screen-reader-shortcut"><?php esc_html_e( 'Skip to content', 'gladiador' ); ?></a>

	<header class="site-header" id="header" role="banner">

		<div class="site-header-content container">

			<?php the_custom_logo(); ?>

			<div class="branding">

<?php
	if ( is_front_page() && ! is_paged() ) {
?>
				<h1 class="site-title">
					<?php bloginfo( 'name' ); ?>
				</h1>
<?php
	} else {
?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</p>
<?php
	}

	// Get site description.
	$description = get_bloginfo( 'description', 'display' );

	if ( $description || is_customize_preview() ) {
?>
				<p class="site-description">
					<?php echo esc_html( $description ); ?>
				</p>
<?php
	}
?>

			</div>

			<?php get_template_part( 'parts/navigation' ); ?>

		</div>

	</header>

	<div class="container" id="site-content">

	<?php do_action( 'gladiador_before_content' ); ?>
