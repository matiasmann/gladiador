<?php
/**
 * Page Content Template Partial
 *
 * Display page content.
 *
 * @package Gladiador
 * @subpackage TemplatePart
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

<?php

	// If page is set as static homepage.
	if ( is_front_page() ) {

		the_title( '<h2 class="entry-title p-name">', '</h2>' );

	} else {

		gladiador_breadcrumbs();

		the_title( '<h1 class="entry-title p-name">', '</h1>' );

	}

?>

	</header>

	<section class="entry entry-single e-content" itemprop="description text">

<?php
	the_content(
		sprintf(
			/* Translators: %s: Post title */
			esc_html__( 'Read more %s', 'gladiador' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		)
	);

	wp_link_pages(
		array(
			'before' => '<div class="pagination">',
			'after' => '</div>',
			'pagelink' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'gladiador' ) . ' </span>%',
		)
	);
?>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->
