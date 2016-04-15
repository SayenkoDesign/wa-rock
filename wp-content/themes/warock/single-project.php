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
    	<div class="column breadcrumbs"> 
			<?php if ( function_exists('yoast_breadcrumb') ) 
			{yoast_breadcrumb('<span id="breadcrumbs">','</span>');} ?>
    	</div>
    </div><!--End Row-->
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="row column">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-project', get_post_format() );
?>
            

            <?php

		endwhile; // End of the loop.
		?>
		</div><!--End Row-->			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
