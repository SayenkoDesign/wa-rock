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
    			<div class="columns medium-offset-1 medium-10">
				<?php
                    the_title( '<h1 class="entry-title">', '</h1>' ); 
                ?>
            	</div>
            </div>
            <?php
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <div class="row column">
    	<div class="columns medium-offset-1 medium-10">
		<?php
			the_content();
		?>
        </div>
    </div><!--End row-->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'warock' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
