<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

get_header(); ?>

<div class="blog-head-row">
<div class="row">
    <div class="column">
		<h1 class="secondary-title"><?php echo apply_filters('the_title',get_page( get_option('page_for_posts') )->post_title); ?></h3>
    </div>
</div><!--End Row-->

</div>
	<div class="row columns"><!-- Foundation .row start -->

		<div class="large-9 medium-8 columns"><!-- Foundation .columns start -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- Foundation .columns end -->

<div class="large-3 medium-4 columns sidebar"><!-- Foundation .columns start -->
    
    <?php get_sidebar(); ?>

</div><!-- Foundation .columns end -->

</div><!-- Foundation .row end -->
    
<?php
get_footer();
