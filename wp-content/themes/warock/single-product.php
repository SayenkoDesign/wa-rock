<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package warock
 */

get_header(); ?>

<div class="secondary-nav-row">
	<div class="row collapse">
    	<div class="column show-for-medium">
			<?php wp_nav_menu( array( 
            'menu' => 'products',
            'walker' => new My_Walker_Nav_Menu(),
            'items_wrap' => '<ul class="dropdown menu" data-dropdown-menu>%3$s</ul>'
            ) ); 
			?>
    	</div>
        <div class="column hide-for-medium">
        	<?php wp_nav_menu( array( 
            'menu' => 'products',
            'walker' => new My_Walker_Nav_Menu(),
            'items_wrap' => '<ul class="vertical menu" data-dropdown-menu>%3$s</ul>'
            ) ); 
			?>
        </div>
    </div><!--End Row-->
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="row column">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-product', get_post_format() );
?>
            

            <?php

		endwhile; // End of the loop.
		?>

		</div><!--End Row-->			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
