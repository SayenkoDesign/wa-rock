<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays the contact form
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-page-contact', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
