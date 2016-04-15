<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package warock
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <?php

		if ( has_post_thumbnail() ) {
			$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
			
			<div class="background-title" style="background: url(<?php echo $src[0]; ?> ) center center; margin-top:-2rem;">
            <div class="row columns">
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
            </div>
		<?php }
		else{ ?>
        	<div class="row"> 
            <?php
				the_title( '<h1 class="entry-title">', '</h1>' ); 
			?>
            </div>
            <?php
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
<div class="row expanded contact-row">
 		<div class="large-12 columns">
        <div class="row">
    	<div class="columns medium-6 col-accordion">
            <ul class="accordion contact-accordion" data-accordion data-allow-all-closed="true">
            <?php

			// check if the repeater field has rows of data
			if( have_rows('accordion') ):
			
				// loop through the rows of data
				while ( have_rows('accordion') ) : the_row();
	
					?>
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title"><?php the_sub_field('header'); ?></a>
						<div class="accordion-content" data-tab-content>
							<?php the_sub_field('content'); ?>
						</div>
					</li>
					<?php
				endwhile;
			
			else :
			
				// no rows found
			
			endif;
			
			?>
            </ul>
        </div>
        <div class="columns medium-6 col-calc">
			
        <div id="contact-form" style="z-index:2; position:relative;">
			<?
                //Gravity forms shortcode
                echo do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' );
            ?>
        </div><!--End calculator-->
        <div class="green-background"></div>
        </div><!--End row-->
        </div><!--End large-12-->
    </div><!--End Row-->
        
    </div><!--End row-->
</article><!-- #post-## -->
