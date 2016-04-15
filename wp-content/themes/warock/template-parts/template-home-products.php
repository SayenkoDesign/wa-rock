<?php
/**
 * Template Name: Products Home
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

get_header(); ?>

<div class="secondary-nav-row">
	<div class="row">
    	<div class="column">
			<?php wp_nav_menu( array( 
            'menu' => 'products',
            'walker' => new My_Walker_Nav_Menu(),
            'items_wrap' => '<ul class="vertical medium-horizontal menu" data-dropdown-menu>%3$s</ul>'
            ) ); 
			?>
    	</div>
    </div><!--End Row-->
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
