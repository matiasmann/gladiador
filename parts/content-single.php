<?php
/**
 * Single Post Content Template Partial
 *
 * This is the default content layout for all single posts (all custom post
 * types). It can be overriden by creating a new template in the parts folder
 * with the name content-single-[CUSTOM-POST-TYPE].php.
 *
 * @package Gladiador
 * @subpackage TemplatePart
 * @author Matias Mann <matias@developress.org>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

<?php

	get_template_part( 'parts/entry-meta' );

	the_title( '<h1 class="entry-title p-name">', '</h1>' );

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
			'before' => '<div class="pagination"><div class="nav-links">',
			'after' => '</div></div>',
			'pagelink' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'gladiador' ) . ' </span>%',
		)
	);

	if ( is_singular( array( 'post' ) ) && ! post_password_required() ) {

		gladiador_contributor();

	}

?>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
	the_post_navigation(
		array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'gladiador' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previously', 'gladiador' ) . '</span> ' .
				'<span class="post-title">%title</span>',
		)
	);
